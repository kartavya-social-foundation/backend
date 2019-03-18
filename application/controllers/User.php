<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
public function __construct()
{
	parent::__construct();
	if(!$userid = $this->session->userdata('admin_id')){
		redirect(base_url('login'));
	}
	date_default_timezone_set('Asia/Kolkata');
	$militime =round(microtime(true) * 1000);
	$datetime =date('Y-m-d h:i:s');
	define('militime', $militime);
	define('datetime', $datetime);

  /*cache control*/
    $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
    $this->output->set_header('Pragma: no-cache');
		
}
	
public function index($user_id = false)
{ 
	//$data['user_data'] = $this->common_model->getData('users',array('refer_by_uniqueid'=>''),'user_id','DESC');
  if(!empty($user_id))
  {
     $user_arr = "AND user_id = '$user_id'";
  }
  else
  {
    $user_arr = '';
  }  

	$data['user_data'] = $this->db->query('SELECT * FROM `users` WHERE  `admin_status` = "1"  '.$user_arr.'')->result();

	$this->load->view('admin/user/show_user',$data);	
}

public function unverified_user()
{ 

  $data['user_data'] = $this->db->query('SELECT * FROM `users` WHERE  `admin_status` = "0"')->result();

  $this->load->view('admin/user/unverified_user',$data);  
}

public function deleted_user()
{ 

  $data['user_data'] = $this->db->query('SELECT * FROM `users` WHERE  `admin_status` = "2"')->result();

  $this->load->view('admin/user/deleted_user',$data);  
}
public function rejected_user()
{ 

  $data['user_data'] = $this->db->query('SELECT * FROM `users` WHERE  `admin_status` = "3"')->result();

  $this->load->view('admin/user/rejected_user',$data);  
}

public function refered($refferal_code = false)
{ 
	$data = ''; 
	$data['user_data'] = $this->db->query("SELECT * FROM `users` WHERE `refer_by_uniqueid` = $refferal_code ")->result();

	$this->load->view('admin/user/refferal',$data);	
}

public function randno($tot=false)
{
    if($tot=='')
    {
        $tot=8;    
    }
    return $randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $tot);    
}

public function change_status()
{
   $user_id = $this->input->post('user_id'); 

   $user_id_arr = explode(",",$user_id);
   
  for($i = 0;$i<count($user_id_arr);$i++)
  {
     $userinfo = $this->common_model->common_getRow('users',array('user_id'=>$user_id_arr[$i]));

     if($userinfo->admin_status == 1)
     {
        /*$this->output->set_content_type("application/json")->set_output(json_encode(array('status'=>false, 'error'=>'This user already activated')));*/
     } 
     else 
     {
         $status_update = $this->common_model->updateData('users',array('admin_status'=>1),array('user_id'=>$user_id_arr[$i]));

         if($status_update)
         {
            $email = $userinfo->email;
            $username = $userinfo->username.' '.$userinfo->user_surname;
            $user_countryid = $userinfo->country_id;
            $usercontactno = $userinfo->mobileno;

            $usercountry = $this->common_model->common_getRow('country',array('CountryId'=>$user_countryid));

            if(!empty($usercountry->FIPS104))
            {
               $countrycode = $usercountry->FIPS104;
            }  

            $userstate = substr($userinfo->state_name, 0,3);

            $useruniqueid = $countrycode.'-'.$userstate.'-'.$userinfo->pincode.'-'.sprintf("%08d",$user_id_arr[$i]);
            //Country Code | 3-State digit | Pin code | 8 Digit of 0 and unique user_id 
           
             $config = Array(
                  'protocol' => 'smtp',
                  'smtp_host' => 'tls://email-smtp.us-east-1.amazonaws.com',
                  'smtp_port' => 465,
                  'smtp_user' => 'AKIAICNSFZPHBSERLD7Q',
                  'smtp_pass' => 'Ah0FhRHpJX8HayAk9zrTijV7CGxIWNoFr1y48lstX9b6',
                  'mailtype'  => 'html', 
                  'charset'   => 'utf-8',
                  'wordwrap'  => TRUE
              );

              $this->load->library('email', $config);

              $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
              $this->email->set_header('Content-type', 'text/html');

              $this->email->set_newline("\r\n");
              $this->email->from('noreply@kartavya.me', 'Kartavya');
              $this->email->to($email); 
              $this->email->subject('Jai Bhim, Welcome to the Kartavya Family..!');
            

            $data = array('username'=>$username,
                         
                        );
            $message = $this->load->view('admin/email_template/kartavya.php',$data,TRUE);
            $this->email->message($message);
            if($this->email->send())
            {
              $msg = "Jai Bhim ".$username.", Welcome to the Kartavya family your account is successfully verified and It's great to have you on board..!";

             $this->common_model->sms_send($usercontactno,$msg);

              $update_info = $this->common_model->updateData('users',array('user_unique_id'=>$useruniqueid),array('user_id'=>$user_id_arr[$i])); 


            }

         }
     } 
  } 
  if($update_info)
  {
     echo $user_id;
  }  
    //$this->load->library('user_agent');

    //$this->output->set_content_type("application/json")->set_output(json_encode(array('status'=>true, 'redirect'=>$this->agent->referrer())));
    
}

public function notification($user_id)
{
   $update = $this->common_model->updateData('users',array('counter_status'=>'1'),array('user_id'=>$user_id));
   if($update)
   {
     redirect('user/index/'.$user_id);
   }     

}

public function edit($user_id = false)
{
  
   $data['user_data'] = $this->common_model->common_getRow('users',array('user_id'=>$user_id));

   $data['advanceuser_data'] = $this->common_model->common_getRow('advance_userdata',array('user_id'=>$user_id));

   $data['degree'] = $this->common_model->getData('degree',array());

    if($this->input->server('REQUEST_METHOD') === 'POST')
    {
       
          if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != '')
          { 
            $date = date("ymdhis");
            $config['upload_path'] = 'uploads/user_image/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            
            $subFileName = explode('.',$_FILES['image']['name']);
            $ExtFileName = end($subFileName);
            $config['file_name'] = md5($date.$_FILES['image']['name']).'.'.$ExtFileName;
                      
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if($this->upload->do_upload('image'))
            { 
              $upload_data = $this->upload->data();
               $image = $upload_data['file_name'];
            }
            else
            {   
               $this->data['err']= $this->upload->display_errors();
               $this->session->set_flashdata('error_pic', 'Please Select png,jpg,jpeg File Type.');
              
               redirect('user/edit/'.$user_id);
            }
          }
          else
          { 
            $image = $data['user_data']->image; 
          }

          $country_id = $this->input->post('country');

          $country_data = $this->common_model->common_getRow('country',array('CountryId'=>$country_id));

          $country_name = $country_data->Country;

          $state_id = $this->input->post('state');

          $state_data = $this->common_model->common_getRow('region',array('RegionId'=>$state_id));

          $state_name = $state_data->Region;

          $city_id = $this->input->post('city');

          $city_data = $this->common_model->common_getRow('city',array('CityId'=>$city_id));

          $city_name = $city_data->City;

          
          $user_data = array(
          'username' =>$this->input->post('u_name'),
          'user_surname' =>$this->input->post('l_name'),
          'image' =>$image,
          'gender'=>$this->input->post('gender'),
          'about_me' =>$this->input->post('aboutme'),
          'dob'=>$this->input->post('dob'),
          'country_id'=>$country_id,
          'country_name'=>$country_name,
          'state_id'=>$state_id,
          'state_name'=>$state_name,
          'city_id'=>$city_id,
          'city_name'=> $city_name,
          'pincode'=>$this->input->post('zip_code'),
          'update_at'=>militime
          );

          if($this->input->post('isvolunteer') == '2')
          {
             $time_periodeforvolunteer = '';
          }
          else
          {
              $time_periodeforvolunteer = $this->input->post('volunteer_period');
          }  

          if($this->input->post('employstatus') == 'employed')
          {
             $sector = $this->input->post('sector');
             
             $company_name = $this->input->post('company_name');
             $company_name1 = $this->input->post('company_name1');
             $company_name2 = $this->input->post('company_name2');
             $company_name3 = $this->input->post('company_name3'); 
             
             $company = '';
             if(!empty($company_name1))
             {
                $company = $this->input->post('company_name1');
             }
             else if(!empty($company_name2)) 
             {
                $company = $this->input->post('company_name2');
             } 
             else if(!empty($company_name3))
             {
                $company = $this->input->post('company_name3');
             }
             else if(!empty($company_name)) 
             {
                $company = $this->input->post('company_name');
             } 

             $other = $this->input->post('other');
             $emp_start_date =  $this->input->post('emp_start_date');
             $emp_end_date = $this->input->post('emp_end_date');
             $total_experience =  $this->input->post('total_experience');
             $unpaid_worker = $this->input->post('unpaid_workers');

             $seeking_for_job = '';
             $reason_for_unemployment = '';
             $industry_type = '';
             $location = '';

          } 
          else
          {
             $sector = '';
             $company = '';
             $other = '';
             $emp_start_date =  '';
             $emp_end_date = '';
             $total_experience =  '';
             $unpaid_worker = '';

             $seeking_for_job = $this->input->post('Isjobseeker');
             $reason_for_unemployment = $this->input->post('Reason_for_unemployment');

             if($seeking_for_job == 1)
             {
                $industry_type = $this->input->post('industry_type'); 
                $location  =  $this->input->post('location'); 
             }
             else
             {
                $industry_type = '';
                $location = '';
             } 
          } 

            $advance_userdata = array(
                    'user_id'=>$user_id,
                    'age'=>$this->input->post('age'),
                    'blood_group'=>$this->input->post('blood_group'),
                    'marital_status'=>$this->input->post('marital_status'),
                    'height' =>$this->input->post('height'),             
                    'weight'=>$this->input->post('weight'),
                    'body_type'=>$this->input->post('body_type'),
                    'complexion'=>$this->input->post('complexion'),
                    'future_plans'=>$this->input->post('future_plans'),
                    'hobby'=>$this->input->post('hobby'),
                    'other_hobby'=>$this->input->post('other_hobby'),
                    'permanent_address'=>$this->input->post('p_address'),
                    'temparary_address'=>$this->input->post('t_address'),
                    'native_place'=>$this->input->post('native_place'),
                    'whatsapp_no'=>$this->input->post('whatsapp_no'),
                    'facebook_id'=>$this->input->post('facebook_id'),
                    'linkedin'=>$this->input->post('linkdin'),
                    'website'=>$this->input->post('website'),
                    'highest_qualification'=>$this->input->post('highest_qualification'),
                    'employ_status'=>$this->input->post('employstatus'),
                    'occupation'=>'',
                    'sector'=>$sector,
                    'company_name'=>$company,
                    'unpaid_worker'=>$unpaid_worker,
                    'other'=> $other,
                    'reason_for_unemployment'=>$reason_for_unemployment,
                    'seeking_for_job'=>$seeking_for_job,
                    'industry_type'=>$industry_type,
                    'location'=>$location,
                    'emp_start_date'=>$emp_start_date,
                    'emp_end_date'=>$emp_end_date,
                    'total_experience'=>$total_experience,
                    'total_member'=>$this->input->post('total_member'),
                    'earning_member'=>$this->input->post('earning_member'),
                    'head_of_family'=>$this->input->post('head_of_family'),
                    'ambedkarite_organisations'=>$this->input->post('ambedkar_organisation'),
                    'nearest_buddhavihar'=>$this->input->post('nearest_budhavihar'),
                    'social_contibution'=>$this->input->post('social_contribution'),
                    'social_cuase_volunteer'=>$this->input->post('isvolunteer'),
                    'timeperiod_for_volunteer'=>$time_periodeforvolunteer,
                    'create_at'=>militime,
                    'update_at'=>militime
                    );  

              $update = $this->common_model->updateData('users',$user_data,array('user_id'=>$user_id));
              if($update)
              {
                $exist_advance_user_id = $this->common_model->common_getRow('advance_userdata',array('user_id'=>$user_id));

                if(!empty($exist_advance_user_id))
                {
                    $advance_userinfo_update = $this->common_model->updateData('advance_userdata',$advance_userdata,array('user_id'=>$user_id));
                }
                else
                {
                   $insert_advance_user = $this->common_model->common_insert('advance_userdata',$advance_userdata);
                }  

                  $this->session->set_flashdata('success', 'Userinfo Updated Successfully.');
                  redirect('user');
              }
      
    } 
            $data['public_companies'] = $this->common_model->getData('sector',array('sector_type'=>1));

            $data['private_companies'] = $this->common_model->getData('sector',array('sector_type'=>2));
            $data['government_companies'] = $this->common_model->getData('sector',array('sector_type'=>3));
            $data['self_employed'] = $this->common_model->getData('sector',array('sector_type'=>4));

            $data['country'] = $this->common_model->getData('country',array());

            $data['region'] = $this->common_model->getData('region',array());

            $data['city'] = $this->common_model->getData('city',array());

            $this->load->view('admin/user/edit_user',$data);

    }

public function  delete()
{  
  $user_id = $this->input->post('user_id');
  $delete = $this->db->query("DELETE FROM `users` WHERE `user_id` IN($user_id)");
  if($delete)
  {
    echo $user_id; exit;
  }
}  

public function  user_reject()
{  
  $comment = $this->input->post('comment');
  $user_id = $this->input->post('userid'); 
   
  $status_data = array('admin_status'=>3,'comment_for_rejection'=>$comment);
  $status_update = $this->common_model->updateData('users',$status_data,array('user_id'=>$user_id));

  if($status_update)
  {
      $this->load->library('user_agent');
      redirect($this->agent->referrer());
  }
}

public function refferal_tracking()
{
  $arr = array();
  $data = '';
   $refferal_data = $this->db->query("SELECT refer_by_uniqueid, COUNT(refer_by_uniqueid) AS refferal_count FROM `users` WHERE `refer_by_uniqueid` !='' GROUP BY refer_by_uniqueid  ORDER BY `refferal_count` DESC")->result(); 

   if($refferal_data)
   {
      foreach($refferal_data as $reff)
      {
          $referral_user = $this->db->query("SELECT referral_code,username,user_surname,email,state_name,city_name FROM users WHERE referral_code = '".$reff->refer_by_uniqueid."'")->row();

          if(!empty($referral_user))
          {

           
          $arr[] = array('referral_count'=>$reff->refferal_count,
                          'username'=>$referral_user->username,
                          'user_surname'=>$referral_user->user_surname,
                          'email'=>$referral_user->email,
                          'state_name'=>$referral_user->state_name,
                          'city_name'=>$referral_user->city_name,
                          'referral_code'=>$referral_user->referral_code

                          );
          } 
      } 

     $data['refferal_data'] = $arr;
   } 

   $this->load->view('admin/user/refferal_view',$data);
} 

public function activate_user()
{
  $user_id = $this->input->post('user_id'); 
  $status = $this->input->post('status'); 
  $user_id_arr = explode(",",$user_id); 
  
  for($i = 0;$i<count($user_id_arr);$i++)
  {
    $status_update = $this->common_model->updateData('users',array('admin_status'=>$status),array('user_id'=>$user_id_arr[$i]));
  } 

  if($status_update)
  {
    echo $user_id;
  }

}  

public function  delete_user()
{  
  //$comment = $this->input->post('comment');
  $user_id = $this->input->post('emp_id');
  $status_data = array('admin_status'=>2);

   $status_update = $this->db->query("UPDATE `users` SET `admin_status` = 2 WHERE `user_id` IN($user_id)");
  //$status_update = $this->common_model->updateData('users',$status_data,array('user_id'=>$user_id));
    if($status_update)
    {
        /*$this->load->library('user_agent');
        redirect($this->agent->referrer());*/
        echo $user_id;
    }
}  

public function get_state()
{
    $country_id = $this->input->post('country_id');

    $state_data = $this->common_model->getData('region',array('CountryId'=>$country_id),'Region','ASC');
    ?>
    <option value="">Select State</option>
    <?php

    foreach ($state_data as $key) 
    { ?>
    
      <option value="<?php echo $key->RegionId; ?>"><?php echo $key->Region;?></option>
    <?php }
}

public function get_city()
{
    $state_id = $this->input->post('state_id');

    $city_data = $this->common_model->getData('city',array('RegionID'=>$state_id),'City','ASC');
    ?>
    <option value="">Select City</option>
    <?php

    foreach ($city_data as $key) 
    { ?>
    
      <option value="<?php echo $key->CityId; ?>"><?php echo $key->City;?></option>
    <?php }
}

}
