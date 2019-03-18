 <?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Forget extends CI_Controller {
public function __construct()
{
	parent::__construct();
	
	date_default_timezone_set('Asia/Kolkata');
	$militime =round(microtime(true) * 1000);
	$datetime =date('Y-m-d h:i:s');
	define('militime', $militime);
	define('datetime', $datetime);

	/*cache control*/
	$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
	$this->output->set_header('Pragma: no-cache');
		
}

public function forgetpassword()
{
	if($this->input->server('REQUEST_METHOD') === 'POST')
	{
		$email = $this->input->post('email1');

		$query = $this->db->query('SELECT * FROM `admin_tb` where email="'.$email.'"')->row();
		if(empty($query))
		{ 
		   $this->session->set_flashdata('email_err','1000');
		   redirect('login');
		}
		else{
				$admin_id = $query->admin_id;
				$admin_name = $query->name;

				//$base_url = urlencode(base_url().'forget/changepassword/');
				$code =  $this->common_model->randomuniqueCode();
				$encryted_code = $this->common_model->encryptor('encrypt', $code);
				$type = $this->common_model->encryptor('encrypt', 1);
				$url = base_url().'forget/changepassword/?8f14e45fceea167a5a36dedd4bea2543='.base64_encode($admin_id).'&type='.$type.'&code='.$encryted_code;

						// $config = array(
						// 'protocol'  => 'smtp',
						//     'smtp_host' => 'tls://email-smtp.us-east-1.amazonaws.com',//email-smtp.us-east-1.amazonaws.com
						//  'smtp_port' => 465,
						//  'smtp_user' => 'AKIAICNSFZPHBSERLD7Q',
						//     'smtp_pass' => 'Ah0FhRHpJX8HayAk9zrTijV7CGxIWNoFr1y48lstX9b6',
						//     'mailtype'  => 'html',
						//     'charset'   => 'utf-8',
						//     'wordwrap'  => TRUE
						// );

						// $this->load->library('email');
						// $this->email->initialize($config);
						
						// $this->email->set_newline("\r\n");
						$config = Array(
							    'protocol' => 'smtp',
							    'smtp_host' => 'tls://smtp.gmail.com',
							    'smtp_port' => 465,
							    'smtp_user' => 'kartavya.master@gmail.com',
							    'smtp_pass' => '!L0vekartavya',
							    'mailtype'  => 'html', 
							    'charset'   => 'utf-8',
							    'wordwrap'  => TRUE
							);

						$this->load->library('email', $config);
						
						$this->email->set_header('MIME-Version', '1.0; charset=utf-8');
						$this->email->set_header('Content-type', 'text/html');

						$this->email->set_newline("\r\n");

						$this->email->from('noreply@kartavya.me','Kartavya');
						$this->email->to($email); 
						$this->email->subject('Kartavya Password Assistance');

						$data = array('username'=>$admin_name,
									  'url'=>$url
									);

						$message = $this->load->view('admin/email_template/kartavya2.php',$data,TRUE);
						$this->email->message($message);
						if($this->email->send())
						{  //die('successs');
	 	   				  $this->common_model->updateData('admin_tb',array('code'=>$code),array('admin_id'=>$admin_id));

		        	       $this->session->set_flashdata('email_sent','2000');
						   redirect('login');
		        	    }
		        	    else
		        	    { //die('failed');
		        	    	 show_error($this->email->print_debugger());

		        	    }	

			}	
	}
}

public function changepassword()
{
  $admin_id = base64_decode($this->input->get('8f14e45fceea167a5a36dedd4bea2543'));
  $type = $this->input->get('type');
  $ENC_code = 	$this->input->get('code');
  $e_code =  $this->common_model->encryptor('decrypt', $ENC_code);
	
   if(isset($_POST['submit']))
   {
		$type = $this->common_model->encryptor('decrypt', $type);

		if($type==1)
		{
	 	    $check_encrypted_code = $this->common_model->common_getRow('admin_tb',array('admin_id'=>$admin_id));

	 	    if($check_encrypted_code->code == $e_code)
	 	    {
	 	        $new_password = $this->input->post('password');

				$new_arr = array('password'=>md5($new_password),'code'=>'');

	 	        $update = $this->common_model->updateData('admin_tb',$new_arr,array('admin_id'=>$admin_id));
	 	        if($update)
	 	        { 
	 	        	$message = "<img src=".base_url()."uploads/template_img/change_pass.jpg style='width:70%;margin-left: 15%; height:100%;'>";
                    echo $message;exit;
	 	        }	
	 	    }else
	 	    {
	 	    	$message = "<img src=".base_url()."uploads/template_img/invalid_link.jpg style='width:70%; height:100%;margin-left: 15%;'>";
                echo $message;exit;
	 	    }	
		}elseif($type==5)
		{

			$check_encrypted_code1 = $this->common_model->common_getRow('users',array('user_id'=>$admin_id));

	 	    if($check_encrypted_code1->code == $e_code)
	 	    {
		 	    $new_password = $this->input->post('password');

				$new_arr = array('password'=>sha1($new_password),'code'=>'');

		 	    $update = $this->common_model->updateData('users',$new_arr,array('user_id'=>$admin_id));
		 	    if($update)
		 	    {
		 	        $message = "<img src=".base_url()."uploads/template_img/change_pass.jpg style='width:70%; height:100%;margin-left: 15%;'>";
	                echo $message;exit;
		 	    }
		 	}else
		 	{
		 	        $message = "<img src=".base_url()."uploads/template_img/invalid_link.jpg style='width:70%; height:100%;margin-left: 15%;'>";
	                 echo $message;exit;
		 	}
	 	}	
   }	

  $this->load->view('admin/email_template/changepassword');

}

public function checkstatus()
{
  $check_encrypted_code = $this->common_model->common_getRow('users',array());

  $check_encrypted_code = $this->common_model->common_getRow('admin_tb',array());


  if($check_encrypted_code->code == '')
  {
     echo '1000'; exit;
  }	
}

}





