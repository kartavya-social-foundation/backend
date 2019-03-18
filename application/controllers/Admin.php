 <?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
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
	$data['news_data'] = $this->common_model->getData('news',array('user_id'=>0,'admin_status'=>1),'news_id','DESC');

	$this->load->view('admin/news/news_detail',$data);	
}

public function administrator()
{
	//$data['administrator_data'] = $this->common_model->getData('admin_tb',array(),'admin_id','DESC');
	$query = $this->db->query("SELECT * FROM `admin_tb` WHERE `role` != 1 ORDER BY `admin_id` DESC");
	$data['administrator_data'] = $query->result();
	$this->load->view('admin/administrator/administrator',$data);
}

public function add_administrator()
{ 
	if($this->input->server('REQUEST_METHOD') === 'POST')
	{ 
		    if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != '')
        { 

            $this->load->library('image_lib');

            $date = date("ymdhis");
            $config['upload_path'] = 'uploads/admin_image/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']      = 200; 
            $config['max_width'] = '200';
            $config['max_height'] = '150';

            $subFileName = explode('.',$_FILES['image']['name']);
            $ExtFileName = end($subFileName);
            $config['file_name'] = md5($date.$_FILES['image']['name']).'.'.$ExtFileName;
                      
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
              redirect('admin/add_administrator');
              exit;
            }
            // if($this->upload->do_upload('image'))
            // { 
            //   $upload_data = $this->upload->data();
            //   $image = $upload_data['file_name'];

            //   $this->load->library('image_lib');
      
            //   ini_set("memory_limit", "-1");
                
            //   $config['image_library']  = 'gd2';
            //   $config['source_image']   = 'uploads/admin_image/'.$image;
            //   $config['create_thumb']   = TRUE;
            //   $config['maintain_ratio'] = TRUE;
            //   $config['width']          = "80";
            //   $config['height']         = "90";
            //   $config['new_image'] = 'uploads/admin_image1/'.$image;
            //   $this->image_lib->initialize($config);
            //   $newimage =  $this->image_lib->resize();
            //   $this->image_lib->clear();
            //   $x12 = explode('.', $image);//for extension
            //   $thumb_img =  $x12[0].'_thumb.'.$x12[1];
            // }
            // else
            // {   
            //    $this->data['err']= $this->upload->display_errors();
            //    $this->session->set_flashdata('error_pic', 'Please Select png,jpg,jpeg File Type.');
            //    redirect('admin/add_administrator');
            // }
            //ImageJPEG(ImageCreateFromString(file_get_contents($image1)), 'uploads/admin_image/'.$image, 30);
        }
        else
        { 
            $image = '';
        }

		$administrator = array(
		'name' =>$this->input->post('name'),
		'email' =>$this->input->post('email'),
		'image'=>$image,
		'mobile_no'=>$this->input->post('mobile_no'),
		'role'=> $this->input->post('role'),
		'status'=>0,
		'date' =>date('Y-m-d')
		);
            
        $insert_id = $this->common_model->common_insert('admin_tb',$administrator);
    		if($insert_id)
    		{
    			 $email = $this->input->post('email');

    			  $password =  $this->randno(8);

            $sha_password = md5($password);
         
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
  					

						$data = array('username'=>$this->input->post('name'),
									  'email'=>$email,
									  'password'=>$password
									);

						$message = $this->load->view('admin/email_template/kartavya.php',$data,TRUE);
           
         		$this->email->message($message); 

         		if($this->email->send())
         		{
         		     $update_info = $this->common_model->updateData('admin_tb',array('password'=>$sha_password),array('admin_id'=>$insert_id));	

         		     $this->session->set_flashdata('success', 'Administrator registered successfully and password sent his email address.');
			  		    redirect('admin/administrator');
         		  
         		}
    		}
			
	} 

    $this->load->view('admin/administrator/add_administrator');
}

public function resize($image_name)
{
      $this->load->library('image_lib');
      
      ini_set("memory_limit", "-1");
        
      $config['image_library']  = 'gd2';
      $config['source_image']   = 'uploads/admin_image/'.$image_name;
      $config['create_thumb']   = TRUE;
      $config['maintain_ratio'] = TRUE;
      $config['width']          = "80";
      $config['height']         = "80";
      $config['new_image'] = 'uploads/admin_image1/'.$image_name;
      $this->image_lib->initialize($config);
      $newimage =  $this->image_lib->resize();
      $this->image_lib->clear();
    
} 

public function randno($tot=false)
{
    if($tot=='')
    {
        $tot=8;    
    }
    return $randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $tot);    
}

public function check_email()
{
	$email = $this->input->post('email'); 
	$query=$this->db->query("SELECT `email` FROM `admin_tb` WHERE `email` = '".$email."'");
	if ($query->num_rows() > 0){
		echo "10000";
	}
}

public function change_status()
{
   $status = $this->input->post('status');
   $admin_id = $this->input->post('admin_id'); 
   
    $status_data = array('status'=>$status);
   	$status_update = $this->common_model->updateData('admin_tb',$status_data,array('admin_id'=>$admin_id));

   	if($status_update)
   	{
   		echo '1000'; exit;
   	}	

}

public function change_role()
{
   $role = $this->input->post('role');
   $admin_id = $this->input->post('admin_id'); 

   if($role == 2)
   {
   	  $update_role = '3';

   }else if($role == 3)
   {
   	  $update_role = '2';
   }
   
    $status_data = array('role'=>$update_role);
   	$status_update = $this->common_model->updateData('admin_tb',$status_data,array('admin_id'=>$admin_id));

   	if($status_update)
   	{
   		echo '1000'; exit;
   	}	

}


}





