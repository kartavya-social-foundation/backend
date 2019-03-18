<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if(!$userid = $this->session->userdata('admin_id')){
			redirect(base_url('login'));
		}
		date_default_timezone_set('Asia/Kolkata');
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
	   $data['admin_data'] = $this->common_model->common_getRow('admin_tb',array('admin_id'=>$this->session->userdata('admin_id')));
	   $this->load->view('admin/profile',$data);

}
  
public function user_detail()
{
   $data['user_data'] = $this->common_model->getData('signup',array('del_status'=>0),'user_id','DESC');
   //print_r($data['user_data']);exit;
   $this->load->view('admin/user/user_detail',$data);

}
public function check_password()
{
	$password = $this->input->post('password'); 
	$query=$this->db->query("SELECT `password` FROM `admin_tb` WHERE `password` = '".$password."'");
	if ($query->num_rows() > 0){
		echo "10000";
	}
}

public function edit()
{ //die('nmbhsd');
   $admin_id = $this->session->userdata('admin_id');
   $data['admin_data'] = $this->common_model->common_getRow('admin_tb',array('admin_id'=>$admin_id));

   if(isset($_POST['submit']))
   { 
      if(isset($_FILES['admin_img']['name']) && $_FILES['admin_img']['name'] != '')
	  { 
	  	    $this->load->library('image_lib');

            $date = date("ymdhis");
            $config['upload_path'] = 'uploads/admin_image/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $subFileName = explode('.',$_FILES['admin_img']['name']);
            $ExtFileName = end($subFileName);
            $config['file_name'] = md5($date.$_FILES['admin_img']['name']).'.'.$ExtFileName;
                      
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if($this->upload->do_upload('admin_img'))
            { 
              $fileData = $this->upload->data();
              $uploadData['file_name'] = $fileData['file_name'];
              $admin_image = $uploadData['file_name'];
            }
            else
            { 
              $this->data['err']= $this->upload->display_errors();
              $this->session->set_flashdata('error_pic', 'Please Select png,jpg,jpeg File Type.');
              redirect('profile');
              exit;
            }



	  //       $this->load->library('image_lib');

			// $date = date("ymdhis");
			// $config['upload_path'] = 'uploads/admin_image/';
			// $config['allowed_types'] = 'jpg|png|jpeg';
			
			// $subFileName = explode('.',$_FILES['admin_img']['name']);
			// $ExtFileName = end($subFileName);
			// $config['file_name'] = md5($date.$_FILES['admin_img']['name']).'.'.$ExtFileName;

			// $this->load->library('upload', $config);
			// $this->upload->initialize($config);

			// if($this->upload->do_upload('image'))
   //          { die('sucess');
   //            $fileData = $this->upload->data();
   //            $uploadData['file_name'] = $fileData['file_name'];
   //            $admin_image = $uploadData['file_name'];
   //          }
   //          else
   //          { die('failed');
   //            $this->data['err']= $this->upload->display_errors();
   //            $this->session->set_flashdata('error_pic', 'Please Select png,jpg,jpeg File Type.');
   //            redirect('profile');
   //            exit;
   //          }

			// if($this->upload->do_upload('admin_img'))
			// { 
             // $upload_data = $this->upload->data();
				
			// 	 $admin_image =  $upload_data['file_name'];

			//$this->load->library('image_lib');
      
	        //ini_set("memory_limit", "-1");
	                
//             $config['image_library']  = 'gd2';
//             $config['source_image']   = 'uploads/admin_image/'.$admin_image;
//             $config['create_thumb']   = TRUE;
//             $config['maintain_ratio'] = TRUE;
//             $config['width']          = "80";
//             $config['height']         = "90";
//             $config['new_image'] = 'uploads/admin_image1/'.$admin_image;
//             $this->image_lib->initialize($config);
//             $newimage =  $this->image_lib->resize();
//             $this->image_lib->clear();
//             $x12 = explode('.', $admin_image);//for extension
//             $thumb_img =  $x12[0].'_thumb.'.$x12[1];

			// }else
			// {  
			// 	$this->data['err']= $this->upload->display_errors();
			// 	$this->session->set_flashdata('error_pic', 'Please Select png,jpg,jpeg File Type.');		
			// 	redirect('profile');
			// }
		
	 }
	 else
	 { 
	   $admin_image = $data['admin_data']->image;
	  //$thumb_img = $admin_image;
	 }
   	   $admin_data = array(
					'name'=>$this->input->post('name'),
					'email' =>$this->input->post('email'),
					'image'=>$admin_image
					);
   	   
   	 }
   	 
   	 if(isset($_POST['submit1']))
   	 {
   	 	$old_password = md5($this->input->post('O_password')); 
        $data['admin_data'] = $this->common_model->common_getRow('admin_tb',array('admin_id'=>$admin_id));
        if($data['admin_data']->password!=$old_password)
		{ 
			$this->session->set_flashdata('fail', 'Invalid old password');
			redirect('profile/');
		}
		
   	 	$admin_data = array(
					'password'=>md5($this->input->post('c_password'))
					);

   	 }	
	     $update = $this->common_model->updateData('admin_tb',$admin_data,array('admin_id'=>$admin_id));
	  

   	  $this->session->set_flashdata('success', 'Updated Successfully.');
      redirect('profile');
  	  //$this->load->view('admin/tender/edit_tender',$data);
}

}
