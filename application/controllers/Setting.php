 <?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {
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

public function index()
{
	$data['content_data'] = $this->common_model->getData('content',array(),'id','DESC');

	$this->load->view('admin/pages/detail',$data);	
} 

public function edit($id = false)
{ 
	$data['content'] = $this->common_model->common_getRow('content',array('id'=>$id));

	if($this->input->server('REQUEST_METHOD') === 'POST')
	{

		if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != '')
		{  
			    $files = $_FILES;	
	        	    
	            $_FILES['image']['name'] =  $files['image']['name'];
	            $_FILES['image']['type'] =   $files['image']['type'];
                $_FILES['image']['tmp_name'] =  $files['image']['tmp_name'];
                $_FILES['image']['error'] =  $files['image']['error'];
                $_FILES['image']['size'] =  $files['image']['size'];

                $date = date("ymdhis"); 	
	            $uploadPath = 'uploads/banner_image/';
                $config['upload_path'] = $uploadPath;
                $config['min_width'] = '1280';
                $config['min_height'] = '500';
                $config['max_width'] = '1280';
                $config['max_height'] = '500';
                $config['allowed_types'] = 'jpg|jpeg|png';

                $subFileName = explode('.',$_FILES['image']['name']);
                $ExtFileName = end($subFileName);

          	    $config['file_name'] = md5($date.$_FILES['image']['name']).'.'.$ExtFileName;

                $fileName = $config['file_name'];
             
               	$this->load->library('upload', $config);
               	$this->upload->initialize($config);

           		if($this->upload->do_upload('image'))
               	{
                	$fileData = $this->upload->data();
                    $uploadData['file_name'] = $fileData['file_name'];
                    $image = $uploadData['file_name'];
                }
                else
                {
            		$this->data['err']= $this->upload->display_errors();
	 				$this->session->set_flashdata('image_error', $this->data['err']);
 	 				redirect('setting/edit/'.$id);
 	 				exit;
                }
		        	         
		}
        else
        {
        	if($id == 3){ $image = $data['content']->image; }else { $image = '';}
        	
        }

	 	$content = array(
					'title' =>$this->input->post('title'),
					'image'=>$image,
					'description' =>$this->input->post('description')
					);

	 	$update = $this->common_model->updateData('content',$content,array('id'=>$id));

	 	if($update)
		{
      		$this->session->set_flashdata('success', 'Content Updated Successfully.');
	  		redirect('setting');
		}
	} 

	 

	 $this->load->view('admin/pages/edit',$data);	
}

public function banner()
{
	$data['banner_data'] = $this->common_model->getData('banner',array(),'id','DESC');

	$this->load->view('admin/pages/banner_detail',$data);	
}

public function edit_banner($id = false)
{   
	$data = '';
	$data['banner_image'] = $this->common_model->common_getRow('banner',array('id'=>$id));

	if($this->input->server('REQUEST_METHOD') === 'POST')
	{
		if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != '')
		{  
			    $files = $_FILES;	
	        	    
	            $_FILES['image']['name'] =  $files['image']['name'];
	            $_FILES['image']['type'] =   $files['image']['type'];
                $_FILES['image']['tmp_name'] =  $files['image']['tmp_name'];
                $_FILES['image']['error'] =  $files['image']['error'];
                $_FILES['image']['size'] =  $files['image']['size'];

                $date = date("ymdhis"); 	
	            $uploadPath = 'uploads/banner_image/';
                $config['upload_path'] = $uploadPath;
                $config['min_width'] = '1280';
                $config['min_height'] = '500';
                $config['max_width'] = '1280';
                $config['max_height'] = '500';
                $config['allowed_types'] = 'jpg|jpeg|png';

                $subFileName = explode('.',$_FILES['image']['name']);
                $ExtFileName = end($subFileName);

          	    $config['file_name'] = md5($date.$_FILES['image']['name']).'.'.$ExtFileName;

                $fileName = $config['file_name'];
             
               	$this->load->library('upload', $config);
               	$this->upload->initialize($config);

           		if($this->upload->do_upload('image'))
               	{
                	$fileData = $this->upload->data();
                    $uploadData['file_name'] = $fileData['file_name'];
                    $image = $uploadData['file_name'];
                }
                else
                {
            		$this->data['err']= $this->upload->display_errors();
	 				$this->session->set_flashdata('image_error', $this->data['err']);
 	 				redirect('setting/edit_banner/'.$id);
 	 				exit;
                }
		        	         
		}
        else
        {
        	$image = $data['banner_image']->banner_image;
        }

	 	$content = array(
					      'banner_image' =>$image,
					    );

	 	$update = $this->common_model->updateData('banner',$content,array('id'=>$id));

	 	if($update)
		{
      		$this->session->set_flashdata('success', 'Banner Updated Successfully.');
	  		redirect('setting/banner');
		}
	} 
	 $this->load->view('admin/pages/edit_banner',$data);	
}

public function feedback()
{
   $data = '';
   $arr = array();
   $feedback =  $this->db->query("SELECT `feedback`.`feedback_id`,`feedback`.`user_id`,`feedback`.`category_id`,`feedback`.`user_feedback`,`feedback`.`create_at`,`feedback_category`.`category_name` FROM feedback INNER JOIN `feedback_category` ON feedback.category_id = feedback_category.category_id ORDER BY `feedback`.`feedback_id` DESC")->result();

    if(!empty($feedback))
    {
    	foreach($feedback as $feed)
    	{

			$userdata = $this->common_model->common_getRow('users',array('user_id'=>$feed->user_id));

			if(!empty($userdata))
			{
				$username = $userdata->username.' '.$userdata->user_surname;
				$userpic = $userdata->image;
			}
			else
			{
				$username = 'Deleted user';	
    			$userpic = '';
			}	

            $date = $feed->create_at;
            //$feedback_time =  $this->common_model->king_time($date);
            $feedback_time = date('d-M-Y H:s:i A', strtotime($date));

			$arr[] = array(
					   'username'=>	$username,
					   'userpic'=>$userpic,
					   'categoryname'=>$feed->category_name,
					   'feedback'=>$feed->user_feedback,
					   'feedback_time'=>$feedback_time,
					   'feedback_id'=>$feed->feedback_id
					);

    	}	

    	if(!empty($arr))
    	{
    		$data['feedback_data'] = $arr;
    	}	
    } 	
	   $this->load->view('admin/feedback/feedback',$data);
}

public function change_status()
{
   $status = $this->input->post('status');
   $banner_id = $this->input->post('banner_id'); 
 
   	  $status_data = array('status'=>$status);
   	  $status_update = $this->common_model->updateData('banner',$status_data,array('id'=>$banner_id));

   	  if($status_update)
   	  {
   	  		 echo '1000';exit;
   	  }	
}

public function delete_feedback($id = false)
{	
	$delete = $this->common_model->deleteData('feedback',array('feedback_id'=>$id));

	if($delete)
	{
		echo "1000"; exit;
	}
}
public function custom_notification()
{   
	$data = array();
	$data['city_data'] = $this->db->query("SELECT DISTINCT `city_name` FROM `users` WHERE `city_name` != ''")->result();

	$data['event_data'] = $this->db->query("SELECT `title`,`event_id` FROM `event` WHERE `admin_status`='1' AND `delete_status`='0' ORDER BY `event_id` DESC")->result();

	if($this->input->server('REQUEST_METHOD') === 'POST')
	{
		$subject = $this->input->post('subject');
		$city = $this->input->post('city');
		$event_id = $this->input->post('event_id');
		$notification_message = $this->input->post('message');

	    $event_data = $this->common_model->common_getRow('event_image',array('event_id'=>$event_id));

	    if(!empty($event_data->image)) { $image = $event_data->image;} else{ $image = ''; }

	    if($city == '0') { $city1 = '';} else { $city1 = "WHERE `city_name` = '$city'"; } 

	    $user_data = $this->db->query("SELECT `user_id`,`device_token` FROM `users` ".$city1."")->result();

	    //print_r($this->db->last_query());exit;
	    
		    $gcmRegIds = array();
	        $i = 0;
			foreach($user_data as $user_device_token)
			{    
	     		$i++;
	    		$gcmRegIds[floor($i/1000)][] = $user_device_token->device_token;
	    		$userid_arr[] = $user_device_token->user_id;
			}

			//substr(string,start,length)

                	$pushMessage=array("title" =>$subject,"user_id"=>'','section_id'=>$event_id,"message" =>substr($notification_message,0,255).'...','image'=>base_url().'uploads/event_image/'.$image,"type"=>'22',"currenttime"=>militime);
                       
                if(isset($gcmRegIds)) 
                {  
		            $message = $pushMessage;
		            $pushStatus = array();
	                    
	                foreach($gcmRegIds as $val){ $pushStatus[] = $this->common_model->sendNotification($val, $message);
                     	}

                    $user_id_in_comma = implode(",",$userid_arr);			
                    $insertnoti = $this->common_model->common_insert('notification',array('sender_id'=>'0','receiver_id'=>$user_id_in_comma,'section_id'=>$event_id,'type'=>'22','title'=>$subject,'msg'=>$notification_message,'image'=>$image,'create_at'=>militime,'update_at'=>militime));
                }

                if($insertnoti)
				{
					 $this->session->set_flashdata('success', 'Notification sent Succesfully.');
				}
				else
				{
					$this->session->set_flashdata('success', 'Notification sent Failed.');
				}
				redirect('setting/custom_notification');                	
               
	}

	$this->load->view('admin/event/custom_notification',$data);
}

public function sector()
{
   $this->db->select('*');
   $this->db->order_by('sector_id','DESC');
   $data['sector_data'] =  $this->db->get('sector')->result_array();
    
   $this->load->view('admin/setting/sector_detail',$data);	
}


public function add_sector()
{

	if($this->input->server('REQUEST_METHOD') === 'POST')
	{ 
		$this->form_validation->set_rules('sector', 'sector', 'required');

   	    if($this->form_validation->run() == TRUE)
   	    {
   	    	    //$sector_name = $this->input->post('sector'); 
   	    	    //$sec_name = $this->db->escape_str($sector_name);
      			$sector = array(
				'sector_name' =>$this->input->post('sector'),
				'sector_type' =>$this->input->post('sector_type'),
				);

				//print_r($sector);exit;

      		    $insert = $this->common_model->common_insert('sector',$sector);
    			if($insert)
    			{
              		$this->session->set_flashdata('success', 'Sector Added Successfully.');
			  		redirect('setting/sector');
    			}
    			else
    			{
    				$this->session->set_flashdata('failed', 'Sector Not Added.');
			  		redirect('setting/sector');
    			}	
   	    }
			
	} 
        $this->load->view('admin/setting/add_sector');

}

public function edit_sector($sector_id = false)
{
	$data['sector_data'] = $this->common_model->common_getRow('sector',array('sector_id'=>$sector_id));
	//edit_unique[users.user_name.'.$id.']

	if($this->input->server('REQUEST_METHOD') === 'POST')
	{ 
		$this->form_validation->set_rules('sector', 'sector', 'required');

   	    if($this->form_validation->run() == TRUE)
   	    {
   	    	$sector_name = $this->input->post('sector'); 

   	    	$sec_name = $this->db->escape_str($sector_name);

   	    	$already_exit = $this->db->query("SELECT `sector_name` FROM `sector` WHERE `sector_name`= '".$sec_name."' AND `sector_id` != '".$sector_id."' AND `sector_type`= '".$this->input->post('sector_type')."'")->row();

   	    	if(!empty($already_exit))
   	    	{
   	    		$this->session->set_flashdata('sector_exist','The sector Name field must contain a unique value.');
			  	redirect('setting/edit_sector/'.$sector_id);
   	    	}	
      			$sector = array(
				'sector_name' =>$this->input->post('sector'),
				'sector_type' =>$this->input->post('sector_type'),
				);

      		    $update = $this->common_model->updateData('sector',$sector,array('sector_id'=>$sector_id));
    			if($update)
    			{
              		$this->session->set_flashdata('success', 'Sector Updated Successfully.');
			  		redirect('setting/sector');
    			}

   	    }
			
	} 
        $this->load->view('admin/setting/edit_sector',$data);
}
	
}
