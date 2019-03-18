<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($userid = $this->session->userdata('admin_id')){
			redirect(base_url('dashboard'));
		}

	date_default_timezone_set('Asia/Kolkata');
	$militime =round(microtime(true) * 1000);
	$datetime =date('Y-m-d h:i:s');
	define('militime', $militime);
	define('datetime', $datetime);

		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');	
	}
	
	public function index()
	{ 
		if(isset($_POST['submit']))
		{   
			     $username = $this->input->post ('username');
				 $password = $this->input->post('password') ;
				
				$AdminData = $this->common_model->common_getRow('admin_tb',array('email'=>$username,'password'=>md5($password)));
				if(!empty($AdminData)) 
				{

					if($AdminData->status == 1)
					{
						$this->session->set_flashdata('msg' ,'Your Account Has Been Suspended for Security Precaution.');	
				  		redirect(base_url('login'));exit;
					}	

						$this->session->set_userdata ( array (
								'admin_id'   => $AdminData->admin_id,
								'username'   => $AdminData->email,
								'role' =>$AdminData->role
								));
						   
							redirect(base_url().'dashboard');
					
				}
				else
				{
				  $this->session->set_flashdata('msg' ,'Email or Password Not Matched.');	
				  redirect(base_url('login'));	
				}	
				
		}
		$this->load->view('admin/index');
		
	}
	
	
}
