<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Api extends MY_Controller {
function __construct() {
		parent::__construct();

		date_default_timezone_set('Asia/Kolkata');
		$militime =round(microtime(true) * 1000);
		$datetime =date('Y-m-d h:i:s');
		define('militime', $militime);
		define('datetime', $datetime);
		//$this->load->library('encrypt');

	}
public function test()
{
	/**/
	 //sprintf("%08d",'110');exit;
}

// public function Invite_by_admin(){
// 	$json1 = file_get_contents('php://input');
// 	if(!empty($json1))
// 	{
// 	    $data = json_decode($json1);

// 	   // print_r($data);exit;
// 		$user_name= $data->username;
// 		$user_surname = $data->usersurname;
// 		$user_email= $data->useremail;
// 		$user_mobile = $data->usermobile;
// 		$mobile_code = $data->mobile_code;
// 		$country_name = $data->countryname;
// 		$user_country = $data->usercountryid;
// 		$user_state = $data->userstateid;
// 		$state_name = $data->statename;
// 		$city_name = $data->cityname;
// 		$user_city = $data->cityid;
// 		$user_pincode = $data->userpincode;
// 		$device_type = $data->devicetype;
// 		$device_id = $data->deviceid;
// 		//$referral_code = $data->referral_code;
// 		$existing_userid = $data->existing_userid;
// 		$type = $data->type;
// 		if(!empty($user_email) && !empty($user_mobile) && !empty($type))
// 		{
// 			global $db;
// 			//$Otp = '123456';
// 			$Otp = $this->randno(6);
// 			$code = $this->common_model->randomuniqueCode();
// 			$user_data = array('username'=>$user_name,
// 				'user_surname'=>$user_surname,
// 				'email'=>$user_email,
// 				'mobileno'=>$user_mobile,
// 				'mobile_code'=>$mobile_code,
// 				'country_name'=>$country_name,
// 				'country_id'=>$user_country,
// 				'state_id'=>$user_state,
// 				'state_name'=>$state_name,
// 				'city_name'=>$city_name,
// 				'city_id'=>$user_city,
// 				'pincode'=>$user_pincode,
// 				'device_id'=>$device_id,
// 				'device_type'=>$device_type,
// 				'refer_by_uniqueid'=>$existing_userid,
// 				'month'=>date('M'),
//                 'year'=>date('Y'),
// 				'code'=>hash('sha256',$code),
// 				'otp'=>hash('sha256',$Otp),
// 				'create_at'=>militime,
// 				'update_at'=>militime
// 				);
// 			$array_object = array();
// 			$query_login = $this->common_model->common_getRow("users",array('email'=>$user_email));
// 			//sendsms($mobile,$Otp);
// 			if($query_login)
// 			{	
// 				if($query_login->mobileno == $user_mobile)
// 				{
// 		            /*if($query_login->mobile_status == 0)
// 		            {
// 		            	$array_object['status'] = "failed";
// 						$array_object['message'] ="Mobile number already registered! Please login.";

// 		            }elseif($query_login->email_status == 0)
// 		            {
// 			            $array_object['status'] = "failed";
// 						$array_object['message'] ="Email Address already registered! Please login.";
// 		            }else
// 		            {*/
// 			            $array_object['status'] = "failed";
// 						$array_object['message'] ="Mobile Number & Email Address Already Exists.";
// 		            //}
// 				}
// 		    	else
// 				{
// 					$array_object['status'] = "failed";
// 					$array_object['message'] ="Email Address Already Exists.";
// 				}
// 			}
// 			else
// 			{ 
// 				//Device id unique condition here
// 				$deviceidcheck = $this->db->query("SELECT device_id FROM users WHERE device_id = '$device_id' AND device_id != '358223072168715'")->row();
// 				//$deviceidcheck = $this->common_model->common_getRow("users",array('device_id'=>$device_id)); 
// 				if($deviceidcheck)
// 				{
// 					$array_object['status'] = "failed";
// 					$array_object['message'] ="This device already registered with another email! please registered on other device.";
// 				}else
// 				{
// 					$query_login = $this->common_model->common_getRow("users",array('mobileno'=>$user_mobile));
// 					if($query_login)
// 					{
// 					    $array_object['status'] = "failed";
// 						$array_object['message'] ="Mobile Number Already Exists.";
// 					}else
// 					{
// 						/*if($type==2)
// 						{
// 							if(empty($existing_userid))
// 							{
// 								$query_login_existing['status'] = "failed";
// 								$query_login_existing['message'] ="Existing User Id Required";
// 								header("content-type: application/json");
// 								echo json_encode($query_login_existing);
// 								exit;
// 							}
// 							$query_login_existing = $this->common_model->common_getRow("users",array('user_unique_id'=>$existing_userid));
// 							if($query_login_existing)
// 							{
// 							}else
// 							{
// 								$query_login_existing['status'] = "failed";
// 								$query_login_existing['message'] ="Invalid Existing User Id";
// 								header("content-type: application/json");
// 								echo json_encode($query_login_existing);
// 								exit;
// 							}		
// 						}*/
// 						if($existing_userid != ''){ $refercode = "WHERE referral_code = '$existing_userid'"; }else{ $refercode = ''; }	
// 						$check_refercode = $this->db->query("SELECT referral_code FROM users $refercode LIMIT 1")->row();
// 						//$check_refercode = $this->common_model->getDataField("referral_code","users",array('referral_code'=>$existing_userid));
// 						if($check_refercode || empty($check_refercode))
// 						{
// 							$insert_user = $this->common_model->common_insert("users",$user_data,array());
// 							if($insert_user)
// 							{
// 					          	$my_referral_code = sprintf("%08d",$insert_user);
// 								$update_referral = $this->common_model->updateData("users",array('referral_code'=>$my_referral_code),array('user_id'=>$insert_user));						
// 								if($type==1)
// 								{
// 									// $config = Array(        
// 									    //                 'mailtype'  => 'html',
// 									    //                 'charset'   => 'utf-8'
// 									    //                 );
// 									$url  =	"<a href=".base_url()."Api/Email_verification?secretid=".base64_encode($insert_user)."&secret_key=".hash('sha256',$code)."&type=".base64_encode(1).">CLICK HERE</a>";

// 									$config = array(
// 								    'protocol'  => 'smtp',
// 								    'smtp_host' => 'tls://email-smtp.us-east-1.amazonaws.com',
// 								    'smtp_port' => 465,
// 								    'smtp_user' => 'AKIAICNSFZPHBSERLD7Q',
// 								    'smtp_pass' => 'Ah0FhRHpJX8HayAk9zrTijV7CGxIWNoFr1y48lstX9b6',
// 								    'mailtype'  => 'html',
// 								    'charset'   => 'utf-8'
// 									);

// 									$this->load->library('email', $config);
// 				                    //$this->email->initialize($config);
// 			                        $this->email->set_newline("\r\n");
// 			                        $this->email->from('noreply@kartavya.me', 'Kartavya');
// 			                        $this->email->to($user_email);
// 			                        $this->email->subject('Kartavya Verification Link');
// 			                        $this->email->set_mailtype('html');

// 			                        $data = array('email'=>$user_email,
// 			                                      'url'=>$url
// 			                                    );

// 			                        $message = $this->load->view('admin/email_template/kartavya3.php',$data,TRUE);
// 			                        $this->email->message($message);
// 									$this->email->send();
									
// 									//$url1  =	"<a href=".base_url()."";
// 				                    $this->email->initialize($config);
// 			                        $this->email->set_newline("\r\n");
// 			                        $this->email->from('noreply@kartavya.me', 'Kartavya');
// 			                        $this->email->to($user_email);
// 			                        $this->email->subject('Registration Request');
// 			                        $this->email->set_mailtype('html');

// 			                        $data1 = array('username'=>$user_name.' '.$user_surname
// 			                                      //'url'=>$url1
// 			                                    );

// 			                        $message = $this->load->view('admin/email_template/kartavya1.php',$data1,TRUE);
// 			                        $this->email->message($message);
// 									$this->email->send();
// 									$mobile_msg = "OTP to login your kartavya app account is ".$Otp;
// 							        $this->common_model->sms_send($user_mobile,$mobile_msg);
// 									$insert_noti = $this->common_model->common_insert("notification",array('sender_id'=>$insert_user,'receiver_id'=>0,'title'=>'New user registered','type'=>15,'msg'=>$user_name.' '.$user_surname.' has registered','create_at'=>militime,'update_at'=>militime),array());

// 					          		$array_object['status']="success";
// 						            $array_object["message"] = "Verification mail has been sent to your registered email address";
// 									$array_object['data'] = array('user_id'=>$insert_user,'type'=>1,'usermobile'=>$user_mobile);

// 								}elseif($type==2)
// 								{	
// 									$msg = "";
// 									$insert_nori = $this->common_model->common_insert("notification",array('sender_id'=>$insert_user,'receiver_id'=>$query_login_existing->user_id,'type'=>1,'msg'=>$msg,'create_at'=>militime,'update_at'=>militime),array());
// 									$array_object['status']="success";
// 						            $array_object["message"] = "Your request has been succesfully send to ".$query_login_existing->username.' '.$query_login_existing->user_surname;
// 									$array_object['data'] = array('user_id'=>$insert_user);
// 								}
// 						  		//$senddd = Send_Mail($email_from,$email,$cc,$subject,$message);
// 							}else
// 							{
// 								$array_object['status']="failed";
// 					            $array_object["message"] = "Registration failed.";
// 							}
// 						}else
// 						{
// 							$array_object['status'] = "failed";
// 							$array_object['message'] ="Invalid Referral Code";
// 						}	
// 					}		
// 				}
// 			}
// 		}
// 		else
// 		{
// 			$array_object['status']="failed";
// 			$array_object['message']= "Invalid Request parameter";
// 		}
// 	}else
// 	{
// 		$array_object['status']="failed";
// 		$array_object['message'] ="No Request parameter";
// 	}
// 	header("content-type: application/json");
// 	echo json_encode($array_object);
// } date 16-sep-17

public function Invite_by_admin(){
	$json1 = file_get_contents('php://input');
	if(!empty($json1))
	{
	    $data = json_decode($json1);

	   // print_r($data);exit;
		$user_name= $data->username;
		$user_surname = $data->usersurname;
		$user_email= $data->useremail;
		$user_mobile = $data->usermobile;
		$mobile_code = $data->mobile_code;
		$country_name = $data->countryname;
		$user_country = $data->usercountryid;
		$user_state = $data->userstateid;
		$state_name = $data->statename;
		$city_name = $data->cityname;
		$user_city = $data->cityid;
		$user_pincode = $data->userpincode;
		$device_type = $data->devicetype;
		$device_id = $data->deviceid;
		//$referral_code = $data->referral_code;
		$existing_userid = $data->existing_userid;
		$type = $data->type;
		if(!empty($user_email) && !empty($user_mobile) && !empty($type))
		{
			global $db;
			//$Otp = '123456';
			$Otp = $this->randno(6);
			$code = $this->common_model->randomuniqueCode();
			$user_data = array('username'=>$user_name,
				'user_surname'=>$user_surname,
				'email'=>$user_email,
				'mobileno'=>$user_mobile,
				'mobile_code'=>$mobile_code,
				'country_name'=>$country_name,
				'country_id'=>$user_country,
				'state_id'=>$user_state,
				'state_name'=>$state_name,
				'city_name'=>$city_name,
				'city_id'=>$user_city,
				'pincode'=>$user_pincode,
				'device_id'=>$device_id,
				'device_type'=>$device_type,
				'refer_by_uniqueid'=>$existing_userid,
				'month'=>date('M'),
                'year'=>date('Y'),
				'code'=>hash('sha256',$code),
				'otp'=>hash('sha256',$Otp),
				'create_at'=>militime,
				'update_at'=>militime
				);
			$array_object = array();
			$query_login = $this->common_model->common_getRow("users",array('email'=>$user_email));
			//sendsms($mobile,$Otp);
			if($query_login)
			{	
				if($query_login->mobileno == $user_mobile)
				{
		            /*if($query_login->mobile_status == 0)
		            {
		            	$array_object['status'] = "failed";
						$array_object['message'] ="Mobile number already registered! Please login.";

		            }elseif($query_login->email_status == 0)
		            {
			            $array_object['status'] = "failed";
						$array_object['message'] ="Email Address already registered! Please login.";
		            }else
		            {*/
			            $array_object['status'] = "failed";
						$array_object['message'] ="Mobile Number & Email Address Already Exists.";
		            //}
				}
		    	else
				{
					$array_object['status'] = "failed";
					$array_object['message'] ="Email Address Already Exists.";
				}
			}
			else
			{ 
				//Device id unique condition here
				$deviceidcheck = $this->db->query("SELECT device_id FROM users WHERE device_id = '$device_id' AND device_id != '358223072168715'")->row();
				//$deviceidcheck = $this->common_model->common_getRow("users",array('device_id'=>$device_id)); 
				if($deviceidcheck)
				{
					$array_object['status'] = "failed";
					$array_object['message'] ="This device already registered with another email! please registered on other device.";
				}else
				{
					$query_login = $this->common_model->common_getRow("users",array('mobileno'=>$user_mobile));
					if($query_login)
					{
					    $array_object['status'] = "failed";
						$array_object['message'] ="Mobile Number Already Exists.";
					}else
					{
						if($existing_userid != ''){ $refercode = "WHERE referral_code = '$existing_userid'"; }else{ $refercode = ''; }	
						$check_refercode = $this->db->query("SELECT referral_code FROM users $refercode LIMIT 1")->row();
						//$check_refercode = $this->common_model->getDataField("referral_code","users",array('referral_code'=>$existing_userid));
						if($check_refercode || empty($check_refercode))
						{
							$insert_user = $this->common_model->common_insert("users",$user_data,array());
							if($insert_user)
							{
					          	$my_referral_code = sprintf("%08d",$insert_user);
								$update_referral = $this->common_model->updateData("users",array('referral_code'=>$my_referral_code),array('user_id'=>$insert_user));						
								if($type==1)
								{
									
									$url  =	"<a href=".base_url()."Api/Email_verification?secretid=".base64_encode($insert_user)."&secret_key=".hash('sha256',$code)."&type=".base64_encode(1).">CLICK HERE</a>";

									$config = array(
								    'protocol'  => 'smtp',
								    'smtp_host' => 'tls://email-smtp.us-east-1.amazonaws.com',
								    'smtp_port' => 465,
								    'smtp_user' => 'AKIAICNSFZPHBSERLD7Q',
								    'smtp_pass' => 'Ah0FhRHpJX8HayAk9zrTijV7CGxIWNoFr1y48lstX9b6',
								    'mailtype'  => 'html',
								    'charset'   => 'utf-8',
									'wordwrap'  => TRUE
									);

									$this->load->library('email', $config);
				                    $this->email->initialize($config);
				                    $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
              						$this->email->set_header('Content-type', 'text/html');
			                        $this->email->set_newline("\r\n");
			                        $this->email->from('noreply@kartavya.me', 'Kartavya');
			                        $this->email->to($user_email);
			                        $this->email->subject('Kartavya Verification Link');
			                        $this->email->set_mailtype('html');

			                        $data = array('email'=>$user_email,
			                                      'url'=>$url
			                                    );

			                        $message = $this->load->view('admin/email_template/kartavya3.php',$data,TRUE);
			                        $this->email->message($message);
									$this->email->send();
									
									
			                        $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
              						$this->email->set_header('Content-type', 'text/html');
			                        $this->email->set_newline("\r\n");
			                        $this->email->from('noreply@kartavya.me', 'Kartavya');
			                        $this->email->to($user_email);
			                        $this->email->subject('Registration Request');
			                        $this->email->set_mailtype('html');

			                        $data1 = array('username'=>$user_name.' '.$user_surname
			                                    );

			                        $message = $this->load->view('admin/email_template/kartavya1.php',$data1,TRUE);
			                        $this->email->message($message);
									$this->email->send();
									$mobile_msg = "OTP to login your kartavya app account is ".$Otp;
							        $this->common_model->sms_send($user_mobile,$mobile_msg);
									$insert_noti = $this->common_model->common_insert("notification",array('sender_id'=>$insert_user,'receiver_id'=>0,'title'=>'New user registered','type'=>15,'msg'=>$user_name.' '.$user_surname.' has registered','create_at'=>militime,'update_at'=>militime),array());

					          		$array_object['status']="success";
						            $array_object["message"] = "Verification mail has been sent to your registered email address";
									$array_object['data'] = array('user_id'=>$insert_user,'type'=>1,'usermobile'=>$user_mobile);

								}elseif($type==2)
								{	
									$msg = "";
									$insert_nori = $this->common_model->common_insert("notification",array('sender_id'=>$insert_user,'receiver_id'=>$query_login_existing->user_id,'type'=>1,'msg'=>$msg,'create_at'=>militime,'update_at'=>militime),array());
									$array_object['status']="success";
						            $array_object["message"] = "Your request has been succesfully send to ".$query_login_existing->username.' '.$query_login_existing->user_surname;
									$array_object['data'] = array('user_id'=>$insert_user);
								}
						  		//$senddd = Send_Mail($email_from,$email,$cc,$subject,$message);
							}else
							{
								$array_object['status']="failed";
					            $array_object["message"] = "Registration failed.";
							}
						}else
						{
							$array_object['status'] = "failed";
							$array_object['message'] ="Invalid Referral Code";
						}	
					}		
				}
			}
		}
		else
		{
			$array_object['status']="failed";
			$array_object['message']= "Invalid Request parameter";
		}
	}else
	{
		$array_object['status']="failed";
		$array_object['message'] ="No Request parameter";
	}
	header("content-type: application/json");
	echo json_encode($array_object);
}
public function Email_verification()
{
	$user_id = base64_decode($this->input->get('secretid'));
    $code = $this->input->get('secret_key');
    $type = $this->input->get('type');

    $content = '';
    $rows = $this->common_model->common_getRow("users",array('user_id'=>$user_id));
    
    if($rows)
    {
        if($code != '' && $code != 'null')
        {
        	$verify_code = $rows->code;
        	if($verify_code == '' || $rows->email_status==1)
	        {
	        	//$message = "Your email has been already verified";
	    		$message = "<img src=".base_url()."uploads/template_img/invalid_link.jpg style='width:70%; height:100%; margin-left: 15%;'>";
	            echo $message;exit;
	        }elseif($code == $verify_code)
	        {
	            $rows3 = $this->common_model->updateData("users",array("email_status"=>1,'code'=>''),array('user_id'=>$user_id));
	            
	            $message = "<img src=".base_url()."uploads/template_img/verification.jpg style='width:70%; height:100%; margin-left: 15%;'>";
	            echo $message;exit;
	        }else
	        {
	    		$message = "<img src=".base_url()."uploads/template_img/invalid_link.jpg style='width:70%; height:100%; margin-left: 15%;'>";
	            echo $message;exit;
	        }	
	    }else
	    {
	    	$message = "<img src=".base_url()."uploads/template_img/invalid_link.jpg style='width:70%; height:100%; margin-left: 15%;'>";
	        echo $message;exit;	
	    }
    }else
    {
	    $message = "<img src=".base_url()."uploads/template_img/invalid_link.jpg style='width:70%; height:100%; margin-left: 15%;'>";
	    echo $message;exit;
    }
}

//new Mobile verification
public function Mobile_verification_new()
{		
	$json1 = file_get_contents('php://input');
    if(!empty($json1))
    {
    	$json_array = json_decode($json1);
	    if(strlen($json_array->mobile_otp)==6 && !empty($json_array->mobileno) && !empty($json_array->type))
		{
	     	$final_output = array();
	     	$image = '';
			$query_login = $this->common_model->common_getRow("users",array('mobileno'=>$json_array->mobileno,'otp'=>hash('sha256',$json_array->mobile_otp)));
		 	if($query_login)
	     	{  
 				$auth_key1 = bin2hex(openssl_random_pseudo_bytes(16));
				$auth_key = $auth_key1.militime;
				
		    	if($query_login->admin_status == 2)
				{
					$final_output['status'] = "1000";
					$final_output['message'] ="Your Kartvya account has been temporarily suspended as a security precaution.";
				}else
				{
					$update = $this->common_model->updateData("users",array('token'=>$auth_key,'mobile_status'=>1,'otp'=>'','update_at'=>militime),array('user_id'=>$query_login->user_id));
					if($update)
					{  
						if($json_array->type == 1)
						{
							$message = "Thank you for registering at Kartavya, It's great to have you on board!. We have received your registration request and is currently under scrutinzation by our	Admin Team. You will soon receive your App Login credentials via sms once your provided details are verified and Approved.";
						}elseif($json_array->type==2)
						{
							$message = 'Your Mobile No. has been verified successfully';
						}	
						if($query_login->image)
						{
							$image = base_url().'uploads/user_image/'.$query_login->image;
						}
			     		$final_output['status'] = 'success';
						$final_output['message'] = $message;	
						$final_output['data'] = array('user_id'=>$query_login->user_id,'username'=>$query_login->username,'usersurname'=>$query_login->user_surname,'useremail'=>$query_login->email,'token'=>$auth_key,'mobile_code'=>$query_login->mobile_code,'mobileno'=>$query_login->mobileno,'profile_pic'=>$image,'country_id'=>$query_login->country_id,'country_name'=>$query_login->country_name,
						'state_id'=>$query_login->state_id,'state_name'=>$query_login->state_name,'cityid'=>$query_login->city_id,'cityname'=>$query_login->city_name,'pincode'=>$query_login->pincode,'referral_code'=>$query_login->referral_code,'user_unique_id'=>$query_login->user_unique_id,'dob'=>$query_login->dob,'gender'=>$query_login->gender,'device_token'=>$query_login->device_token,'device_id'=>$query_login->device_id,'aboutme'=>$query_login->about_me);
					}
					else
					{ 
						$final_output['status']= 'failed';
						$final_output['message']= "Something went wrong! Please try again later.";
						unset($final_output['data']);
					}
		 		}
		 	}
	     	else
	     	{
				$final_output['status'] = 'failed';	
				$final_output['message'] = 'Otp not matched';	
			}
     	}else
     	{
     		$final_output['status']= "failed";
     		$final_output['message']= "Request parameter not valid";
	 	}
    }else
    {
     	$final_output['status']= "failed";
     	$final_output['message'] = 'No Request parameter';
    }
     header("content-type: application/json");
     echo json_encode($final_output);
}

//new login api
public function Login_new()
{
	$json1 = file_get_contents('php://input');
	if(!empty($json1))
	{
	    $data = json_decode($json1);
		$mobile_no = $data->usermobile;
		$device_id = $data->deviceid;
		$device_type = $data->devicetype;
		$device_token = $data->devicetoken;
		$token = bin2hex(openssl_random_pseudo_bytes(16));
		$token = $token.militime;
		
		if(!empty($mobile_no))
		{
			global $db;
			
			$array_object = array();
			$image = '';
			$query_login = $this->common_model->common_getRow("users",array('mobileno'=>$mobile_no));
			if($query_login)
			{	
				if($query_login->admin_status == 0)
				{
					$array_object['status'] = "1000";
					$array_object['message'] ="your account has not been verified from admin";
				}elseif($query_login->admin_status == 2)
				{
					$array_object['status'] = "1000";
					$array_object['message'] ="Suspicious activity has been detected on your Kartavya account and it has been temporarily suspended as a security precaution.";
				}
				else
				{
					//$otp = '123456';
					$otp = $this->randno(6);
					$token = '';
					$mobile_msg = "OTP to login your kartavya app account is ".$otp;
					$this->common_model->sms_send($mobile_no,$mobile_msg);
		        	$update = $this->common_model->updateData("users",array('device_token'=>$device_token,'otp'=>hash('sha256',$otp),'update_at'=>militime),array('user_id'=>$query_login->user_id));
					if($update) 
					{
						if($query_login->mobile_status==1){ $type = 2;}else{ $type = 1;}
						$array_object['status'] = "success";
						$array_object['message'] ="Successfully Login";
						$array_object['data'] = array('user_id'=>$query_login->user_id,'type'=>$type,'mobileno'=>$mobile_no,'mobile_code'=>$query_login->mobile_code,'device_id'=>$device_id,'device_type'=>$device_type,'device_token'=>$device_token);
					}else
					{
						$array_object['status'] = "failed";
						$array_object['message'] ="Something went wrong! please try again later";
					}
				}
			}else
			{
				$array_object['status'] = "failed";
				$array_object['message'] ="User does not exists";
			}
		}
		else
		{
			$array_object['status']="failed";
			$array_object['message']= "Invalid Request parameter";
		}
	}else
	{
		$array_object['status']="failed";
		$array_object['message'] ="No Request parameter";
	}
	header("content-type: application/json");
	echo json_encode($array_object);
}
//Resend otp
public function Resend_otp()
{
	$json1 = file_get_contents('php://input');
	if(!empty($json1))
	{
	    $data = json_decode($json1);
		$mobile_no = $data->usermobile;
		$type = $data->type;
		
		if(!empty($mobile_no))
		{
			global $db;
			
			$array_object = array();
			$query_login = $this->common_model->common_getRow("users",array('mobileno'=>$mobile_no));
			if($query_login)
			{	
				if($query_login->admin_status == 2)
				{
					$array_object['status'] = "1000";
					$array_object['message'] ="Suspicious activity has been detected on your Kartavya account and it has been temporarily suspended as a security precaution.";
				}
				else
				{
					$otp = $this->randno(6);
					$token = '';
					$mobile_msg = "OTP to login your kartavya app account is ".$otp;
					$this->common_model->sms_send($mobile_no,$mobile_msg);
		        	$update = $this->common_model->updateData("users",array('otp'=>hash('sha256',$otp),'update_at'=>militime),array('user_id'=>$query_login->user_id));
					if($update) 
					{
						$array_object['status'] = "success";
						$array_object['message'] ="Successfully";
						$array_object['data'] = array('user_id'=>$query_login->user_id,'type'=>$type,'mobileno'=>$mobile_no,'mobile_code'=>$query_login->mobile_code);
					}
				}
			}else
			{
				$array_object['status'] = "failed";
				$array_object['message'] ="User does not exists";
			}
		}
		else
		{
			$array_object['status']="failed";
			$array_object['message']= "Invalid Request parameter";
		}
	}else
	{
		$array_object['status']="failed";
		$array_object['message'] ="No Request parameter";
	}
	header("content-type: application/json");
	echo json_encode($array_object);
}
public function Home()
{	
	$headers = apache_request_headers();
	if($headers['secret_key'] !='')
	{
		$check_key = $this->checktoken($headers['secret_key']);
		if($check_key['status'] == 'true')
		{
			if($check_key['data']->admin_status == 2)
			{
				$final_output['status'] = "1000";
				$final_output['message'] ="Suspicious activity has been detected on your Kartavya account and it has been temporarily suspended as a security precaution.";
			}elseif($check_key['data']->email_status == 2)
			{
				$final_output['status'] = "1000";
				$final_output['message'] ="This account is no longer registered on Kartavya.";
			}else
			{
			    $user_id = $check_key['data']->user_id;
				$final_output = array();
				$eventcount = 0; $projeccount=0; $arr = array(); $groupcount=0; $taskcount =0;
				$bannert = $this->db->get_where("banner",array("status"=>0))->result();
				if($bannert)
				{
	   				foreach ($bannert as $key) {
	   					if(!empty($key->banner_image))
	   					{
	   						$arr[] = base_url().'uploads/banner_image/'.$key->banner_image;
	   					}
	   				}
				}
				$evencnt = $this->db->query("SELECT count(event_id) as eventcount FROM event WHERE admin_status= 1 AND delete_status = 0 ")->row()->eventcount;
				if(!empty($evencnt))
				{
					$eventcount = $evencnt;
				}
				$projectcnt = $this->db->query("SELECT count(project_id) as projectcount FROM project WHERE admin_status= 1 AND delete_status = 0")->row()->projectcount;
				if(!empty($projectcnt))
				{
					$projeccount = $projectcnt;
				}
				$groupcont = $this->db->query("SELECT count(group_id) as groupcount FROM `group` WHERE admin_status= 1 AND delete_status = 0")->row()->groupcount;
				if(!empty($groupcont))
				{
					$groupcount = $groupcont;
				}
				$taskcont = $this->db->query("SELECT count(task_id) as taskcount FROM task WHERE admin_status= 1 AND delete_status = 0")->row()->taskcount;
				if(!empty($taskcont))
				{
					$taskcount = $taskcont;
				}

				$final_output['status']='success';
				$final_output['message']='Successfully';
				$final_output['data']=$arr;
				$final_output['event_count']=$eventcount;
				$final_output['project_count']=$projeccount;
				$final_output['group_count']=$groupcount;
				$final_output['task_count']=$taskcount;
			}
		}else
		{
	    	$final_output['status'] = 'false';
	    	$final_output['message'] = 'Invalid Token';
		}
	}else
	{
	    $final_output['status'] = 'false';
	    $final_output['message'] = 'Unauthorised Access';
	}	
	header("content-type: application/json");
    echo json_encode($final_output);
}

public function Forgot_password()
{
	$json1 = file_get_contents('php://input');
	if(!empty($json1))
	{
	    $data = json_decode($json1);
		$email_id= $data->useremail;
		if(!empty($email_id))
		{
			global $db;
			
			$array_object = array();
			$code = $this->common_model->randomuniqueCode(); 
			$type = $this->common_model->encryptor('encrypt',5);
			$encryted_code = $this->common_model->encryptor('encrypt',$code);
			$query_login = $this->common_model->common_getRow("users",array('email'=>$email_id));
			if($query_login)
			{	
				if($query_login->email_status == 0)
				{
		            $array_object['status'] = "failed";
					$array_object['message'] ="Please verify email address first";
				}
		    	elseif($query_login->admin_status == 0)
				{
					$array_object['status'] = "1000";
					$array_object['message'] ="your account has not been verified from admin";
				}
				elseif($query_login->admin_status == 2)
				{
					$array_object['status'] = "1000";
					$array_object['message'] ="Suspicious activity has been detected on your Kartavya account and it has been temporarily suspended as a security precaution.";
				}
				elseif($query_login->email_status == 2)
				{
					$array_object['status'] = "1000";
					$array_object['message'] ="This account is no longer registered on Kartavya.";
				}
				else
				{
					$update = $this->common_model->updateData("users",array('code'=>$code,'update_at'=>militime),array('user_id'=>$query_login->user_id));
					if($update) 
					{
					 	$url = base_url().'forget/changepassword/?8f14e45fceea167a5a36dedd4bea2543='.base64_encode($query_login->user_id).'&type='.$type.'&code='.$encryted_code;
			          	
		                $config = Array(        
			                    'mailtype'  => 'html',
			                    'charset'   => 'utf-8'
			                    );
                        $this->email->initialize($config);
                        $this->email->set_newline("\r\n");
                        $this->email->from('Test@kartavya.me', 'Kartavya');
                        $this->email->to($email_id);
                        $this->email->subject('Kartavya Password Assistance');
                        $this->email->set_mailtype('html');

                        $data = array('username'=>$query_login->username.' '.$query_login->user_surname,
                                      'url'=>$url
                                    );

                        $message = $this->load->view('admin/email_template/kartavya2.php',$data,TRUE);
                        $this->email->message($message);
				        $this->email->send();   
			            /*$message = "Your New Login Password is: ".$code; 
			            $email_from ='no-reply@kartvyaapp.com';
			        	$headers  = 'MIME-Version: 1.0' . "\r\n";
			            $headers .= 'Content-type: text/html; charset=iso-8859-1'. "\r\n";
			            $headers .= 'From: '.$email_from. '\r\n';
			            $cc = '';*/
				      //  @mail($email_id, $subject, $message,$headers);
						$array_object['status'] = "success";
						$array_object['message'] ="New Password has been send to your registered email address.";
						unset($array_object['data']);
					}
				}
			}else
			{
				$array_object['status'] = "failed";
				$array_object['message'] ="User does not exists";
			}
		}
		else
		{
			$array_object['status']="failed";
			$array_object['message']= "Invalid Request parameter";
		}
	}else
	{
		$array_object['status']="failed";
		$array_object['message'] ="No Request parameter";
	}
	header("content-type: application/json");
	echo json_encode($array_object);
}

public function Change_password()
{
	$headers = apache_request_headers();
	$old_pass = $this->input->post('oldpass');
	$new_pass = $this->input->post('newpass');

	if($headers['secret_key'] !='')
    {
   	   $check_key = $this->checktoken($headers['secret_key']);
   	   if($check_key['status'] == 'true' && $check_key['data']->admin_status == 1)
	   {
			$user_id = $check_key['data']->user_id;
	   	    $final_output = array();
	   	    if($check_key['data']->admin_status == 2)
			{
				$final_output['status'] = "1000";
				$final_output['message'] ="Suspicious activity has been detected on your Kartavya account and it has been temporarily suspended as a security precaution.";
			}elseif($check_key['data']->email_status == 2)
			{
				$final_output['status'] = "1000";
				$final_output['message'] ="This account is no longer registered on Kartavya.";
			}else
			{
		   	    if($check_key['data']->password == sha1($old_pass))
		   	    {
					$this->common_model->updateData('users',array('password'=>sha1($new_pass)),array('user_id'=>$user_id));
		   	   		
		   	   		$final_output['status'] = 'success';
					$final_output['message'] = 'Password Successfully Changed';
				}
		   	    else
		   	    {
		   	 	    $final_output['status'] = 'failed';
			    	$final_output['message'] = 'Old password not matched.';
		   	    }
	   		}
	   }
	   else
	   {
	   	  $final_output['status'] = 'false';
          $final_output['message'] = 'failed';
	      $final_output['msg'] = 'Invalid Token';
	   }
   }
   else
   {
   	 $final_output['status'] = 'false';
	 $final_output['message'] = 'failed';
 	 $final_output['msg'] = 'Unauthorised Access';
   }
   header("content-type: application/json");
   echo json_encode($final_output);
}
public function Update_profile()
{
	$headers = apache_request_headers();
	if($headers['secret_key'] !='')
	{
		$check_key = $this->checktoken($headers['secret_key']);
		if($check_key['status'] == 'true')
		{
			if($check_key['data']->admin_status == 2)
			{
				$final_output['status'] = "1000";
				$final_output['message'] ="Suspicious activity has been detected on your Kartavya account and it has been temporarily suspended as a security precaution.";
			}elseif($check_key['data']->email_status == 2)
			{
				$final_output['status'] = "1000";
				$final_output['message'] ="This account is no longer registered on Kartavya.";
			}else
			{
			    $userid = $check_key['data']->user_id;
				$user_name= $this->input->post('username');
				$user_surname = $this->input->post('usersurname');
				$about_me = $this->input->post('aboutme');
				$dob = $this->input->post('dob');
				$gender = $this->input->post('gender');

				$final_output = array();
				if(!isset($_FILES["profile_pic"]) || $_FILES["profile_pic"]=='')
	            {
	                $images = ''; $image='';
	    			if($check_key['data']->image)
	    			{
	    				$image = $check_key['data']->image;
	    				$images = base_url().'uploads/user_image/'.$check_key['data']->image;
	    			}
	            }
	            else
	            {
	                $image=$_FILES["profile_pic"]["name"];
	                $image=md5(militime.$image).".png";
	                move_uploaded_file($_FILES["profile_pic"]["tmp_name"],"uploads/user_image/".$image);
	               	$images = base_url().'uploads/user_image/'.$image;
	            }
	    		$arr = array(
	    				'username'=>$user_name,
	    				'user_surname'=>$user_surname,
	    				'image'=>$image,
	    				'dob'=>$dob,
	    				'gender'=>$gender,
	    				'about_me'=>$about_me,
	    				'update_at'=>militime
	    				);
		    	$update = $this->common_model->updateData("users",$arr,array('user_id' => $userid));
    			if($update)
    			{	
    				$select = $this->common_model->common_getRow("users",array('user_id'=>$userid));
    				$dataar = array(
    						'username'=>$select->username,
		    				'usersurname'=>$select->user_surname,
		    				'profile_pic'=>$images,
		    				'aboutme'=>$select->about_me,
	    					'dob'=>$select->dob,
		    				'gender'=>$select->gender
		    				);

    				$final_output['status'] = "success";
    				$final_output['message'] = "Profile Successfully Updated";
    				$final_output['data'] = $dataar;
    			}else
    			{
     				$final_output['failed'] = 'failed';
     				$final_output['status'] = 'Something went wrong! Please try again later.';
    			}	
			}
		}else
		{
	    	$final_output['status'] = 'false';
	    	$final_output['message'] = 'Invalid Token';
		}
	}else
	{
	    $final_output['status'] = 'false';
	    $final_output['message'] = 'Unauthorised Access';
	}	
	header("content-type: application/json");
    echo json_encode($final_output);
}

//EVENT API = Create event ,upcoming event load and pull, past event load and pull, user response on event, get response user list
public function Create_event()
{
	$headers = apache_request_headers();
	if($headers['secret_key'] !='')
	{
		$check_key = $this->checktoken($headers['secret_key']);
		if($check_key['status'] == 'true')
		{
		    if($check_key['data']->admin_status == 2)
			{
				$final_output['status'] = "1000";
				$final_output['message'] ="Suspicious activity has been detected on your Kartavya account and it has been temporarily suspended as a security precaution.";
			}elseif($check_key['data']->email_status == 2)
			{
				$final_output['status'] = "1000";
				$final_output['message'] ="This account is no longer registered on Kartavya.";
			}else
			{
			    $userid = $check_key['data']->user_id;
				$event_title= $this->input->post('title');
				$event_desc = $this->input->post('description');
				$event_brief_desc = $this->input->post('brief_description');
				$start_date = $this->input->post('start_date');
				$end_date = $this->input->post('end_date');
				$start_time = $this->input->post('start_time');
				$end_time = $this->input->post('end_time');
				//$ticket_url = $this->input->post('ticket_url');
				$event_location = $this->input->post('event_location');
				$event_lat = $this->input->post('event_lat');
				$event_lng = $this->input->post('event_lng');
				$event_type = $this->input->post('event_type');
				$hosted_by = $check_key['data']->username.' '.$check_key['data']->user_surname;
				$final_output = array();
				$product_image = '';
				$cert_image = '';
				//$start_dt_milisecond = 1000 * strtotime($start_date.$start_time);
		    	$arr = array(
		    				'user_id'=>$userid,
		    				'title'=>$event_title,
		    				'description'=>$event_desc,
		    				'brief_description'=>$event_brief_desc,
		    				//'image'=>$image,
		    				'address'=>$event_location,
		    				'lat'=>$event_lat,
		    				'lng'=>$event_lng,
		    				'start_date_time'=>$start_date.' '.$start_time,
		    				'end_date_time'=>$end_date.' '.$end_time,
		    				'type'=>1,
		    				//'avaibility_url'=>$ticket_url,
		    				'hosted_by'=>$hosted_by,
		    				'create_at'=>militime,
		    				'update_at'=>militime
		    				);
		    	$eventcrt = $this->common_model->common_insert("event",$arr,array());
				if($eventcrt)
				{	
		    		$eventresponse = $this->common_model->common_insert("event_response",array('user_id'=>$userid,'event_id'=>$eventcrt,'response_status'=>1,'create_at'=>militime,'update_at'=>militime),array());
					if(isset($_FILES['event_pic']['name']) && !empty($_FILES['event_pic']['name']))
					{
						$file_count=count($_FILES['event_pic']['name']);
						for ($i=0; $i < $file_count; $i++) 
						{ 
					        $_FILES['file_url']['name']= $_FILES['event_pic']['name'][$i];
					        $_FILES['file_url']['type']= $_FILES['event_pic']['type'][$i];
					        $_FILES['file_url']['tmp_name']= $_FILES['event_pic']['tmp_name'][$i];
					        $_FILES['file_url']['error']= $_FILES['event_pic']['error'][$i];
					        $_FILES['file_url']['size']= $_FILES['event_pic']['size'][$i];  

							$config = array();
							$config['upload_path']   = 'uploads/event_image/';
							$config['allowed_types'] = 'jpg|jpeg|png|pdf';

							$subFileName = explode('.',$_FILES['file_url']['name']);
							$ExtFileName = end($subFileName);
						    $config['file_name'] = md5(militime.$_FILES['file_url']['name']).'.'.$ExtFileName;

							$this->load->library('upload',$config);
					        $this->upload->initialize($config);
							if($this->upload->do_upload('file_url'))
							{ 
								$image_data = $this->upload->data();
								$product_image =  $image_data['file_name'];
								$cert_image[] = base_url().'uploads/event_image/'.$image_data['file_name'];
								$insertimage = $this->common_model->common_insert("event_image",array('event_id'=>$eventcrt,'image'=>$product_image,'create_at'=>militime,'update_at'=>militime));
								$singleimg = $image_data['file_name'];
							}/*else
							{  
								$err[]= $this->upload->display_errors();
							 	//$final_output = $this->session->set_flashdata('error_pic', $err);
								header("content-type: application/json");
	    						echo json_encode($file_count);
	    						exit;
	    					}*/
						} 
					}else
					{
						$cert_image = array();
						$singleimg = '';
					}
						
                    $pushMessage=array("title" =>"New Event Added",'message'=>'New Event '.$event_title.' created by '.$check_key['data']->username.' '.$check_key['data']->user_surname,'type'=>21,'image'=>$singleimg,"currenttime"=>militime);
                      
                    $insertnoti = $this->common_model->common_insert("notification",array('section_id'=>$eventcrt,'user_id'=>$userid,'title'=>'New Event Created','type'=>21,'image'=>$singleimg,'msg'=>'New Event '.$event_title.' created by '.$check_key['data']->username.' '.$check_key['data']->user_surname,'create_at'=>militime,'update_at'=>militime));
					$final_output['status'] = "success";
					$final_output['message'] = "Event Successfully Created.";
					$arr['event_id'] = $eventcrt;
					$arr['image']= $cert_image;
					$final_output['data'] = $arr;
				}else
				{
	 				$final_output['failed'] = 'failed';
	 				$final_output['status'] = 'Something went wrong! Please try again later.';
				}	
			}
		}else
		{
	    	$final_output['status'] = 'false';
	    	$final_output['message'] = 'Invalid Token';
		}
	}else
	{
	    $final_output['status'] = 'false';
	    $final_output['message'] = 'Unauthorised Access';
	}	
	header("content-type: application/json");
    echo json_encode($final_output);
}

public function Upcoming_event()
{
	$headers = apache_request_headers();
	if($headers['secret_key'] !='')
	{
		$check_key = $this->checktoken($headers['secret_key']);
		if($check_key['status'] == 'true')
		{
			if($check_key['data']->admin_status == 2)
			{
				$final_output['status'] = "1000";
				$final_output['message'] ="Suspicious activity has been detected on your Kartavya account and it has been temporarily suspended as a security precaution.";
			}elseif($check_key['data']->email_status == 2)
			{
				$final_output['status'] = "1000";
				$final_output['message'] ="This account is no longer registered on Kartavya.";
			}else
			{
			    $userid = $check_key['data']->user_id;
				$create_at = $this->input->post('create_at');	///2017-02-15 01:00:00	
				$type = $this->input->post('type');	
				$final_output = array();
				$create = '';
				$date = date('Y-m-d H:i:s');
				if($create_at !=0)
				{
					$create = "AND start_date_time > '$create_at'";	
				}
				if($type==2)
				{	
					$condition = "AND start_date_time <= '$date' AND end_date_time >= '$date' AND user_id != '$userid'";
				}elseif($type==3)
				{
					$condition = "AND user_id = '$userid'";
				}else
				{
					$condition = "AND start_date_time > '$date' AND user_id != '$userid'";
				}
				/*$arr = array(
		    				'user_id'=>$userid,
		    				'title'=>$event_title,
		    				'description'=>$event_desc,
		    				'image'=>$image,
		    				'address'=>$event_location,
		    				'lat'=>$event_lat,
		    				'lng'=>$event_lng,
		    				'start_date_time'=>$start_date.' '.$start_time,
		    				'end_date_time'=>$end_date.' '.$end_time,
		    				'type'=>$event_type,
		    				'avaibility_url'=>$ticket_url,
		    				'hosted_by'=>$hosted_by,
		    				'create_at'=>militime,
		    				'update_at'=>militime
		    				);*/

				$arr = array();
				$eventcrt = $this->db->query("SELECT * FROM event WHERE admin_status = 1 AND delete_status = 0 $condition $create ORDER BY start_date_time ASC LIMIT 2")->result();
				$count = $this->db->query("SELECT count(event_id) as ecount FROM event WHERE admin_status = 1 AND delete_status = 0 $condition $create")->row()->ecount;
				if($eventcrt)
				{	
					foreach ($eventcrt as $key) {
						$resselect = $this->db->query("SELECT count(user_id) as goresponce FROM event_response WHERE event_id = ".$key->event_id." AND response_status=1 ")->row()->goresponce;
						if($resselect)
						{
							$going_response = $resselect;
						}else
						{
							$going_response = 0;
						}
						$resselectmay = $this->db->query("SELECT count(user_id) as mayberesponce FROM event_response WHERE event_id = ".$key->event_id." AND response_status=2 ")->row()->mayberesponce;
						if($resselectmay)
						{
							$maybe_response = $resselectmay;
						}else
						{
							$maybe_response = 0;
						}
						$event_google_id = '';
						$resselect = $this->common_model->common_getRow("event_response",array('event_id'=>$key->event_id,'user_id'=>$userid));
						if($resselect)
						{
							$response_status = $resselect->response_status;
							if($response_status==1)
							{
								$event_google_id = $resselect->event_google_id;
							}	
						}else
						{
							$response_status = 0;
						}

						if($key->user_id==0)
						{
							//$key->hosted_by ='admin';
						}else
						{
							$username = $this->db->select('username,user_surname')->get_where('users',array('user_id'=>$key->user_id))->row();
							if(!empty($username))
							{
								$key->hosted_by = $username->username.' '.$username->user_surname;
							}else
							{
								$key->hosted_by = '';
							}
						}
						$shortmonth = date('M',strtotime($key->start_date_time));
						$shortdt = date('d',strtotime($key->start_date_time));
						$fulldtst = date('Y-m-d H:i:s A',strtotime($key->start_date_time));
						$fulldted = date('Y-m-d H:i:s A',strtotime($key->end_date_time));
						$key->full_st_dt = $fulldtst;
						$key->full_ed_dt = $fulldted;
						$key->shortm = $shortmonth;
						$key->shortd = $shortdt;
						$key->going_response = $going_response;
						$key->maybe_response = $maybe_response;
						$event_img2 = array();
						$event_img ='';
						$sele_img = $this->common_model->getData("event_image",array('event_id'=>$key->event_id));
						if($sele_img)
						{
								$event_img = base_url().'uploads/event_image/'.$sele_img[0]->image;
							foreach ($sele_img as $value) {
								$event_img2[] = base_url().'uploads/event_image/'.$value->image;
							}
						}
						$key->image = $event_img;
						$key->image2 = $event_img2;
						$key->my_response = $response_status;
						$key->event_google_id = $event_google_id;
						$arr[] = $key;
					}
					$final_output['status'] = "success";
					$final_output['message'] = "Successfull";
					$final_output['data'] = $arr;
					$final_output['event_count'] = $count;
				}else
				{
	 				$final_output['status'] = 'failed';
	 				$final_output['message'] = 'No event found';
				}	
			}
		}else
		{
	    	$final_output['status'] = 'false';
	    	$final_output['message'] = 'Invalid Token';
		}
	}else
	{
	    $final_output['status'] = 'false';
	    $final_output['message'] = 'Unauthorised Access';
	}	
	header("content-type: application/json");
    echo json_encode($final_output);
}

public function Upcoming_event_pulltorefresh()
{
	$headers = apache_request_headers();
	if($headers['secret_key'] !='')
	{
		$check_key = $this->checktoken($headers['secret_key']);
		if($check_key['status'] == 'true')
		{
		    if($check_key['data']->admin_status == 2)
			{
				$final_output['status'] = "1000";
				$final_output['message'] ="Suspicious activity has been detected on your Kartavya account and it has been temporarily suspended as a security precaution.";
			}elseif($check_key['data']->email_status == 2)
			{
				$final_output['status'] = "1000";
				$final_output['message'] ="This account is no longer registered on Kartavya.";
			}else
			{
			    $userid = $check_key['data']->user_id;
				$create_at = $this->input->post('create_at');	///2017-02-15 01:00:00	
				$type = $this->input->post('type');	
				$final_output = array();
				$create = '';
				if($create_at !=0)
				{
					$create = "AND start_date_time < '$create_at'";	
				}
				if($type==2)
				{	
					$condition = "AND start_date_time <= '$date' AND end_date_time >= '$date' AND user_id != '$userid'";
				}elseif($type==3)
				{
					$condition = "AND user_id = '$userid'";
				}else
				{
					$condition = "AND start_date_time > '$date' AND user_id != '$userid'";
				}
				/*$arr = array(
	    				'user_id'=>$userid,
	    				'title'=>$event_title,
	    				'description'=>$event_desc,
	    				'image'=>$image,
	    				'address'=>$event_location,
	    				'lat'=>$event_lat,
	    				'lng'=>$event_lng,
	    				'start_date_time'=>$start_date.' '.$start_time,
	    				'end_date_time'=>$end_date.' '.$end_time,
	    				'type'=>$event_type,
	    				'avaibility_url'=>$ticket_url,
	    				'hosted_by'=>$hosted_by,
	    				'create_at'=>militime,
	    				'update_at'=>militime
	    				);*/
				$arr = array();
				$date = date('Y-m-d H:i:s');
				$eventcrt = $this->db->query("SELECT * FROM event WHERE admin_status = 1 AND delete_status = 0 $condition $create ORDER BY start_date_time ASC LIMIT 2")->result();
				$count = $this->db->query("SELECT count(event_id) as ecount FROM event WHERE admin_status = 1 AND delete_status = 0 $condition $create")->row()->ecount;
				if($eventcrt)
				{	
					foreach ($eventcrt as $key) {

						$resselect = $this->db->query("SELECT count(user_id) as goresponce FROM event_response WHERE event_id = ".$key->event_id." AND response_status=1 ")->row()->goresponce;
						if($resselect)
						{
							$going_response = $resselect;
						}else
						{
							$going_response = 0;
						}
						$resselectmay = $this->db->query("SELECT count(user_id) as mayberesponce FROM event_response WHERE event_id = ".$key->event_id." AND response_status=2 ")->row()->mayberesponce;
						if($resselectmay)
						{
							$maybe_response = $resselectmay;
						}else
						{
							$maybe_response = 0;
						}
						$event_google_id = '';	
						$resselect = $this->common_model->common_getRow("event_response",array('event_id'=>$key->event_id,'user_id'=>$userid));
						if($resselect)
						{
							$response_status = $resselect->response_status;
							if($response_status==1)
							{
								$event_google_id = $resselect->event_google_id;
							}
						}else
						{
							$response_status = 0;
						}
						if($key->user_id==0)
						{
							//$key->hosted_by = 'Admin';
						}else
						{
							$key->hosted_by = '';
							$username = $this->db->select('username,user_surname')->get_where('users',array('user_id'=>$key->user_id))->row();
							if(!empty($username))
							{
								$key->hosted_by = $username->username.' '.$username->user_surname;
							}
						}
						$shortmonth = date('M',strtotime($key->start_date_time));
						$shortdt = date('d',strtotime($key->start_date_time));
						$fulldtst = date('Y-m-d H:i:s A',strtotime($key->start_date_time));
						$fulldted = date('Y-m-d H:i:s A',strtotime($key->end_date_time));
						$key->full_st_dt = $fulldtst;
						$key->full_ed_dt = $fulldted;
						$key->shortm = $shortmonth;
						$key->shortd = $shortdt;
						$key->going_response = $going_response;
						$key->maybe_response = $maybe_response;
						$event_img2 = array();
						$event_img ='';
						$sele_img = $this->common_model->getData("event_image",array('event_id'=>$key->event_id));
						if($sele_img)
						{
							$event_img = base_url().'uploads/event_image/'.$sele_img[0]->image;
							foreach ($sele_img as $value) {
								$event_img2[] = base_url().'uploads/event_image/'.$value->image;
							}
						}
						$key->image = $event_img;
						$key->image2 = $event_img2;
						$key->my_response = $response_status;
						$key->event_google_id = $event_google_id;
						$arr[] = $key;
					}
					$final_output['status'] = "success";
					$final_output['message'] = "Successfull";
					$final_output['data'] = $arr;
					$final_output['event_count'] = $count;
				}else
				{
	 				$final_output['status'] = 'failed';
	 				$final_output['message'] = 'No event found';
				}
			}	
		}else
		{
	    	$final_output['status'] = 'false';
	    	$final_output['message'] = 'Invalid Token';
		}
	}else
	{
	    $final_output['status'] = 'false';
	    $final_output['message'] = 'Unauthorised Access';
	}	
	header("content-type: application/json");
    echo json_encode($final_output);
}

public function Past_event()
{
	$headers = apache_request_headers();
	if($headers['secret_key'] !='')
	{
		$check_key = $this->checktoken($headers['secret_key']);
		if($check_key['status'] == 'true')
		{
		 	if($check_key['data']->admin_status == 2)
			{
				$final_output['status'] = "1000";
				$final_output['message'] ="Suspicious activity has been detected on your Kartavya account and it has been temporarily suspended as a security precaution.";
			}elseif($check_key['data']->email_status == 2)
			{
				$final_output['status'] = "1000";
				$final_output['message'] ="This account is no longer registered on Kartavya.";
			}else
			{
			  // echo date('Y-m-d H:i:s', strtotime(' - 30 days')); exit;
			    $userid = $check_key['data']->user_id;
				$create_at = $this->input->post('create_at');	///2017-02-15 01:00:00	
				$final_output = array();
				$create = '';
				if($create_at !=0)
				{
					$create = "AND end_date_time < '$create_at'";	
				}
				$date = date('Y-m-d 00:00:00');
				$arr = array();
				$eventcrt = $this->db->query("SELECT * FROM event WHERE admin_status = 1 AND delete_status = 0 AND `end_date_time` > DATE_SUB(CURDATE(), INTERVAL 1 MONTH) AND end_date_time < '$date' AND user_id != '$userid' $create ORDER BY end_date_time DESC LIMIT 2")->result();
				$count = $this->db->query("SELECT count(event_id) as ecount FROM event WHERE admin_status = 1 AND delete_status = 0 AND `end_date_time` > DATE_SUB(CURDATE(), INTERVAL 1 MONTH) AND end_date_time < '$date' AND user_id != '$userid' $create")->row()->ecount;
				 
				if($eventcrt)
				{	
					foreach ($eventcrt as $key) {
						$event_img2 = array();
						$event_img = '';
						$sele_img = $this->common_model->getData("event_image",array('event_id'=>$key->event_id),'image_id','ASC');
						if($sele_img)
						{
							$event_img = base_url().'uploads/event_image/'.$sele_img[0]->image;
							foreach ($sele_img as $value) {
								
								$event_img2[] = base_url().'uploads/event_image/'.$value->image;
							}
						}
						$resselect = $this->db->query("SELECT count(user_id) as goresponce FROM event_response WHERE event_id = ".$key->event_id." AND response_status=1")->row()->goresponce;
						if($resselect)
						{
							$going_response = $resselect;
						}else
						{
							$going_response = 0;
						}
						$resselectmay = $this->db->query("SELECT count(user_id) as mayberesponce FROM event_response WHERE event_id = ".$key->event_id." AND response_status=2")->row()->mayberesponce;
						if($resselectmay)
						{
							$maybe_response = $resselectmay;
						}else
						{
							$maybe_response = 0;
						}
						$event_google_id = '';	
						$resselect = $this->common_model->common_getRow("event_response",array('event_id'=>$key->event_id,'user_id'=>$userid));
						if($resselect)
						{
							$response_status = $resselect->response_status;
							if($response_status==1)
							{
								$event_google_id = $resselect->event_google_id;
							}
						}else
						{
							$response_status = 0;
						}
						if($key->user_id==0)
						{
							//$key->hosted_by = 'Admin';
						}else
						{
							$key->hosted_by = '';
							$username = $this->db->select('username,user_surname')->get_where('users',array('user_id'=>$key->user_id))->row();
							if(!empty($username))
							{
								$key->hosted_by = $username->username.' '.$username->user_surname;
							}
						}
						$shortmonth = date('M',strtotime($key->start_date_time));
						$shortdt = date('d',strtotime($key->start_date_time));
						$fulldtst = date('Y-m-d H:i:s A',strtotime($key->start_date_time));
						$fulldted = date('Y-m-d H:i:s A',strtotime($key->end_date_time));
						$key->full_st_dt = $fulldtst;
						$key->full_ed_dt = $fulldted;
						$key->shortm = $shortmonth;
						$key->shortd = $shortdt;
						$key->image2 = $event_img2;
						$key->image = $event_img;
						$key->going_response = $going_response;
						$key->maybe_response = $maybe_response;
						$key->my_response = $response_status;
						$key->event_google_id = $event_google_id;
						$arr[] = $key;
					}
				
					//$eventcrt['shortdate'] = $shortdate;
					$final_output['status'] = "success";
					$final_output['message'] = "Successfull";
					$final_output['data'] = $arr;
					$final_output['event_count'] = $count;
				}else
				{
						$final_output['status'] = 'failed';
						$final_output['message'] = 'No event found';
				}	
			}
		}else
		{
	    	$final_output['status'] = 'false';
	    	$final_output['message'] = 'Invalid Token';
		}
	}else
	{
	    $final_output['status'] = 'false';
	    $final_output['message'] = 'Unauthorised Access';
	}	
	header("content-type: application/json");
    echo json_encode($final_output);
}

public function Past_event_pulltorefresh()
{
	$headers = apache_request_headers();
	if($headers['secret_key'] !='')
	{
		$check_key = $this->checktoken($headers['secret_key']);
		if($check_key['status'] == 'true')
		{
		    if($check_key['data']->admin_status == 2)
			{
				$final_output['status'] = "1000";
				$final_output['message'] ="Suspicious activity has been detected on your Kartavya account and it has been temporarily suspended as a security precaution.";
			}elseif($check_key['data']->email_status == 2)
			{
				$final_output['status'] = "1000";
				$final_output['message'] ="This account is no longer registered on Kartavya.";
			}else
			{
			    $userid = $check_key['data']->user_id;
				$create_at = $this->input->post('create_at');	///2017-02-15 01:00:00	
				$final_output = array();
				$create = '';
				if($create_at !=0)
				{
					$create = "AND end_date_time > '$create_at'";	
				}
				$date = date('Y-m-d H:i:s');
				$arr = array();
				$event_img = '';
				$eventcrt = $this->db->query("SELECT * FROM event WHERE admin_status = 1 AND delete_status = 0 AND `end_date_time` > DATE_SUB(CURDATE(), INTERVAL 1 MONTH) AND end_date_time < '$date' AND user_id != '$userid' $create ORDER BY end_date_time DESC LIMIT 2")->result();
				$count = $this->db->query("SELECT count(event_id) as ecount FROM event WHERE admin_status = 1 AND delete_status = 0 AND `end_date_time` > DATE_SUB(CURDATE(), INTERVAL 1 MONTH) AND end_date_time < '$date' AND user_id != '$userid' $create")->row()->ecount;
				if($eventcrt)
				{	
					foreach ($eventcrt as $key) {
						$shortmonth = date('M',strtotime($key->start_date_time));
						$shortdt = date('d',strtotime($key->start_date_time));
						$fulldtst = date('Y-m-d H:i:s A',strtotime($key->start_date_time));
						$fulldted = date('Y-m-d H:i:s A',strtotime($key->end_date_time));
						$key->full_st_dt = $fulldtst;
						$key->full_ed_dt = $fulldted;
						$key->shortm = $shortmonth;
						$key->shortd = $shortdt;
						$event_img2 = array();
						$event_img = '';
						$sele_img = $this->common_model->getData("event_image",array('event_id'=>$key->event_id));
						if($sele_img)
						{
							$event_img = base_url().'uploads/event_image/'.$sele_img[0]->image;
							foreach ($sele_img as $value) {
								
								$event_img2[] = base_url().'uploads/event_image/'.$value->image;
							}
						}
						$resselect = $this->db->query("SELECT count(user_id) as goresponce FROM event_response WHERE event_id = ".$key->event_id." AND response_status=1")->row()->goresponce;
						if($resselect)
						{
							$going_response = $resselect;
						}else
						{
							$going_response = 0;
						}
						$resselectmay = $this->db->query("SELECT count(user_id) as mayberesponce FROM event_response WHERE event_id = ".$key->event_id." AND response_status=2")->row()->mayberesponce;
						if($resselectmay)
						{
							$maybe_response = $resselectmay;
						}else
						{
							$maybe_response = 0;
						}	
						$event_google_id = '';
						$resselect = $this->common_model->common_getRow("event_response",array('event_id'=>$key->event_id,'user_id'=>$userid));
						if($resselect)
						{
							$response_status = $resselect->response_status;
							if($response_status==1)
							{
								$event_google_id = $resselect->event_google_id;
							}
						}else
						{
							$response_status = 0;
						}
						if($key->user_id==0)
						{
							//$key->hosted_by = 'Admin';
						}else
						{
							$key->hosted_by = '';
							$username = $this->db->select('username,user_surname')->get_where('users',array('user_id'=>$key->user_id))->row();
							if(!empty($username)){
							$key->hosted_by = $username->username.' '.$username->user_surname;
							}
						}
						$key->image = $event_img;
						$key->image2 = $event_img2;
						$key->going_response = $going_response;
						$key->maybe_response = $maybe_response;
						$key->my_response = $response_status;
						$key->event_google_id = $event_google_id;
						$arr[] = $key;
					}
					$final_output['status'] = "success";
					$final_output['message'] = "Successfull";
					$final_output['data'] = $eventcrt;
					$final_output['event_count'] = $count;
				}else
				{
	 				$final_output['status'] = 'failed';
	 				$final_output['message'] = 'No event found';
				}	
			}
		}else
		{
	    	$final_output['status'] = 'false';
	    	$final_output['message'] = 'Invalid Token';
		}
	}else
	{
	    $final_output['status'] = 'false';
	    $final_output['message'] = 'Unauthorised Access';
	}	
	header("content-type: application/json");
    echo json_encode($final_output);
}

public function User_response_on_event()
{
	$headers = apache_request_headers();
	if($headers['secret_key'] !='')
	{
		$check_key = $this->checktoken($headers['secret_key']);
		if($check_key['status'] == 'true')
		{
		    if($check_key['data']->admin_status == 2)
			{
				$final_output['status'] = "1000";
				$final_output['message'] ="Suspicious activity has been detected on your Kartavya account and it has been temporarily suspended as a security precaution.";
			}elseif($check_key['data']->email_status == 2)
			{
				$final_output['status'] = "1000";
				$final_output['message'] ="This account is no longer registered on Kartavya.";
			}else
			{
			    $userid = $check_key['data']->user_id;
				$event_id = $this->input->post('event_id');
				$status = $this->input->post('status');
				$event_google_id = $this->input->post('event_google_id');
				$final_output = array();
				if($status!='' && $status!=0)
				{
			    	$selectevent = $this->common_model->common_getRow("event",array('event_id'=>$event_id));
					if($selectevent)
					{	
						$select = $this->common_model->common_getRow("event_response",array('user_id'=>$userid,'event_id'=>$event_id));
						if($select)
						{
							if($select->response_status == $status)
							{
								$final_output['status'] = 'success';
								$final_output['message'] = 'Your Response Successfully Added';
							}else
							{
								/*if($status==3)
								{
									$change_status = $this->common_model->deleteData("event_response",array('user_id'=>$userid,'event_id'=>$event_id));
								}else
								{*/
								$change_status=$this->common_model->updateData("event_response",array('response_status'=>$status,'event_google_id'=>$event_google_id,'update_at'=>militime),array('user_id'=>$userid,'event_id'=>$event_id));
								//}
								if($change_status)
								{
									$final_output['status'] = 'success';
		 							$final_output['message'] = 'Your Response Successfully Added';
								}else
								{
									$final_output['status'] = 'failed';
		 							$final_output['message'] = 'Something went wrong! please try again later';
								}
							}
						}else
						{
						
							$change_status = $this->common_model->common_insert('event_response',array('response_status'=>$status,'user_id'=>$userid,'event_id'=>$event_id,'event_google_id'=>$event_google_id,'create_at'=>militime,'update_at'=>militime),array());
							if($change_status)
							{
								$final_output['status'] = 'success';
	 							$final_output['message'] = 'Your Response Successfully Added';
							}else
							{
								$final_output['status'] = 'failed';
	 							$final_output['message'] = 'Something went wrong! please try again later';
							}
						}
					}else
					{
		 				$final_output['status'] = 'failed';
		 				$final_output['message'] = 'No Event Found';
					}
				}else
				{
					$final_output['status'] = 'failed';
		 			$final_output['message'] = 'Invalid Request Parameter';
				}	
			}
		}else
		{
	    	$final_output['status'] = 'false';
	    	$final_output['message'] = 'Invalid Token';
		}
	}else
	{
	    $final_output['status'] = 'false';
	    $final_output['message'] = 'Unauthorised Access';
	}	
	header("content-type: application/json");
    echo json_encode($final_output);
}

public function Get_responding_user_list()
{
	$headers = apache_request_headers();
	if($headers['secret_key'] !='')
	{
		$check_key = $this->checktoken($headers['secret_key']);
		if($check_key['status'] == 'true')
		{
		    if($check_key['data']->admin_status == 2)
			{
				$final_output['status'] = "1000";
				$final_output['message'] ="Suspicious activity has been detected on your Kartavya account and it has been temporarily suspended as a security precaution.";
			}elseif($check_key['data']->email_status == 2)
			{
				$final_output['status'] = "1000";
				$final_output['message'] ="This account is no longer registered on Kartavya.";
			}else
			{
			    $userid = $check_key['data']->user_id;
				$event_id = $this->input->post('event_id');
				$status = $this->input->post('status');
				$create_at = $this->input->post('create_at');
				$final_output = array();
				if($event_id!='' && $event_id!=0)
				{
			    	$crateat = '';
			    	if($create_at!=0)
			    	{
			    		$crateat = "AND event_response.update_at < '$create_at'";
			    	}
			    	$selectevent = $this->common_model->common_getRow("event",array('event_id'=>$event_id));
					if($selectevent)
					{	
						$arr = array();
						$select = $this->db->query("SELECT users.username,users.user_surname,users.image,event_response.event_id,event_response.update_at FROM event_response LEFT JOIN users ON event_response.user_id=users.user_id WHERE event_response.event_id ='$event_id' AND event_response.response_status='$status' ".$crateat." ORDER BY event_response.response_id LIMIT 10")->result();
						if($select)
						{
							$resselect = $this->db->query("SELECT count(user_id) as goresponce FROM event_response WHERE event_id = ".$event_id." AND response_status='$status'")->row()->goresponce;
							if($resselect)
							{
								$going_response = $resselect;
							}else
							{
								$going_response = 0;
							}
							foreach ($select as $key) {
								
								if(!empty($key->image))
								{
									$image = base_url().'uploads/user_image/'.$key->image;
								}else
								{
									$image ='';
								}
								$key->create_at = $key->update_at;
								$key->image = $image;
							
								$arr[] = $key;				
							}
						}
						if(!empty($arr))
						{
							$final_output['status'] = 'success';
							$final_output['message'] = 'User list';
							$final_output['data'] = $arr;
							$final_output['res_count'] = $going_response;
						}else
						{
							$final_output['status'] = 'failed';
							$final_output['message'] = 'Not found';
						}		
					}else
					{
		 				$final_output['status'] = 'failed';
		 				$final_output['message'] = 'No Event Found';
					}
				}else
				{
					$final_output['status'] = 'failed';
		 			$final_output['message'] = 'Invalid Request Parameter';
				}	
			}
		}else
		{
	    	$final_output['status'] = 'false';
	    	$final_output['message'] = 'Invalid Token';
		}
	}else
	{
	    $final_output['status'] = 'false';
	    $final_output['message'] = 'Unauthorised Access';
	}	
	header("content-type: application/json");
    echo json_encode($final_output);
}

// public function Event_remainder_notification()
// {
// 	$fromcur =	date('Y-m-d H:i:s');
    
//     $eventcrt = $this->db->query("SELECT * FROM event WHERE admin_status = 1 AND delete_status = 0 AND start_date_time > '$fromcur' AND notifi_status = 0 ORDER BY start_date_time DESC")->result();
//    //$eventcrt = $this->db->query("SELECT * FROM event WHERE event_id = 11")->row();
//    if($eventcrt){ 
		
//    		foreach ($eventcrt as $key) {
// 			$date1 = strtotime($key->start_date_time);
// 			$date2 = strtotime($fromcur);
// 			$diffHours = round(($date1 - $date2) / 3600);
// 			if($diffHours==24 && $diffHours > 23)
// 			{
// 				$notifiquer = $this->db->query("SELECT user_id FROM event_response WHERE event_id = ".$key['event_id']." AND response_status != 3");
			
// 				$notifiquer = $this->db->query("SELECT * FROM notification WHERE (FIND_IN_SET($user_id,receiver_id) OR receiver_id = '7')  ORDER BY notify_id");
// 				//$message = array('title'=>'');
// 				//send notification
// 			}
//    		}
//     }
// }

public function Add_news()
{
	$headers = apache_request_headers();
	if($headers['secret_key'] !='')
	{
		$check_key = $this->checktoken($headers['secret_key']);
		if($check_key['status'] == 'true')
		{
		    if($check_key['data']->admin_status == 2)
			{
				$final_output['status'] = "1000";
				$final_output['message'] ="Suspicious activity has been detected on your Kartavya account and it has been temporarily suspended as a security precaution.";
			}elseif($check_key['data']->email_status == 2)
			{
				$final_output['status'] = "1000";
				$final_output['message'] ="This account is no longer registered on Kartavya.";
			}else
			{
			    $userid = $check_key['data']->user_id;
				$news_title= $this->input->post('news_title');
				$news_descr = $this->input->post('news_description');
				$brief_descr = $this->input->post('brief_description');
				$news_type = $this->input->post('news_type');
				$news_langauge = $this->input->post('news_langauge');
				$news_url = $this->input->post('news_url');
				$final_output = array();
				$news_image = array();
				//$start_dt_milisecond = 1000 * strtotime($start_date.$start_time);
		    	$arr = array(
		    				'user_id'=>$userid,
		    				'title'=>$news_title,
		    				'description'=>$news_descr,
		    				'brief_description'=>$brief_descr,
		    				'news_type'=>$news_type,
		    				'news_langauge'=>$news_langauge,
		    				'news_url'=>$news_url,
		    				'post_by'=>1,
		    				'create_at'=>militime,
		    				'update_at'=>militime
		    				);
				if(isset($_FILES['news_pic']['name']) && !empty($_FILES['news_pic']['name']))
				{
					$file_count=count($_FILES['news_pic']['name']);
					for ($i=0; $i < $file_count; $i++) 
					{ 
				        $_FILES['file_url']['name']= $_FILES['news_pic']['name'][$i];
				        $_FILES['file_url']['type']= $_FILES['news_pic']['type'][$i];
				        $_FILES['file_url']['tmp_name']= $_FILES['news_pic']['tmp_name'][$i];
				        $_FILES['file_url']['error']= $_FILES['news_pic']['error'][$i];
				        $_FILES['file_url']['size']= $_FILES['news_pic']['size'][$i];  

						$config = array();
						$config['upload_path']   = 'uploads/news_image/';
						$config['allowed_types'] = 'jpg|jpeg|png|pdf';

						$subFileName = explode('.',$_FILES['file_url']['name']);
						$ExtFileName = end($subFileName);
					    $config['file_name'] = md5(militime.$_FILES['file_url']['name']).'.'.$ExtFileName;

						$this->load->library('upload',$config);
				        $this->upload->initialize($config);
						if($this->upload->do_upload('file_url'))
						{ 
							$image_data = $this->upload->data();
							$product_image =  $image_data['file_name'];
							$news_image = base_url().'uploads/news_image/'.$image_data['file_name'];
						}else
						{  
							$err= $this->upload->display_errors();
						 	$final_output = $this->session->set_flashdata('error_pic', $err);
						 	$final_output['status'] = 'failed';
		    				$final_output['message'] = $err;
							header("content-type: application/json");
	    					echo json_encode($final_output); exit;
						}
					} 
				}else
				{
					$final_output['status'] = 'failed';
		    		$final_output['message'] = 'News Image Required';
		    		header("content-type: application/json");
	    			echo json_encode($final_output); exit;
				}
		    	$newsinst = $this->common_model->common_insert("news",$arr,array());
				if($newsinst)
				{	
					$insertimage = $this->common_model->common_insert("news_image",array('news_id'=>$newsinst,'image'=>$product_image,'create_at'=>militime,'update_at'=>militime));
					$insert_noti = $this->common_model->common_insert("notification",array('user_id'=>$userid,'section_id'=>$newsinst,'title'=>'News Added','type'=>16,'msg'=>'News Added By '.$check_key['data']->username.' '.$check_key['data']->user_surname,'create_at'=>militime,'update_at'=>militime),array());
					$final_output['status'] = "success";
					$final_output['message'] = "News Successfully Added.";
					$arr['news_id'] = $newsinst;
					$arr['image']=$news_image;
					$final_output['data'] = $arr;
				}else
				{
	 				$final_output['status'] = 'failed';
	 				$final_output['message'] = 'Something went wrong! Please try again later.';
				}
			}	
		}else
		{
	    	$final_output['status'] = 'false';
	    	$final_output['message'] = 'Invalid Token';
		}
	}else
	{
	    $final_output['status'] = 'false';
	    $final_output['message'] = 'Unauthorised Access';
	}	
	header("content-type: application/json");
    echo json_encode($final_output);
}

public function News_list()
{
	$headers = apache_request_headers();
	if($headers['secret_key'] !='')
	{
		$check_key = $this->checktoken($headers['secret_key']);
		if($check_key['status'] == 'true')
		{
		    if($check_key['data']->admin_status == 2)
			{
				$final_output['status'] = "1000";
				$final_output['message'] ="Suspicious activity has been detected on your Kartavya account and it has been temporarily suspended as a security precaution.";
			}elseif($check_key['data']->email_status == 2)
			{
				$final_output['status'] = "1000";
				$final_output['message'] ="This account is no longer registered on Kartavya.";
			}else
			{
			    $userid = $check_key['data']->user_id;
				$create_at = $this->input->post('create_at');	///2017-02-15 01:00:00	
				$category_id = $this->input->post('category_id');
				$language = $this->input->post('language');
				$final_output = array();
				$create = ''; $cate = '';
				if($create_at !=0)
				{
					$create = "AND publish_date < '$create_at'";	
				}
				if($category_id!=0)
				{
					$cate = "AND news_type = '$category_id'";
				}

				$arr =array();
				$news_img = '';
				$newsdata = $this->db->query("SELECT * FROM news WHERE admin_status = 1 AND news_langauge = '$language' ".$cate." $create ORDER BY news_id DESC LIMIT 10")->result();
				if($newsdata)
				{	
					foreach ($newsdata as $key) {
						$news_img2 = array(); $news_img = '';
						$sele_img = $this->common_model->getData("news_image",array('news_id'=>$key->news_id));
						if($sele_img)
						{
							foreach ($sele_img as $value) {
								
								$news_img2[] = base_url().'uploads/news_image/'.$value->image;
								$news_img = base_url().'uploads/news_image/'.$value->image;
							}
						}
	   					$isbookmark = 0;
	   					$selbookmark = $this->db->query("SELECT bookmark_id FROM bookmark WHERE news_id='".$key->news_id."' AND user_id='$userid'")->row();
	   					if($selbookmark)
	   					{
	   						$isbookmark = 1;
	   					}
					$key->image = $news_img;
					$key->image2 = $news_img2;
					$key->isbookmarked = $isbookmark;
					$arr[] = $key;
					}

					$final_output['status'] = "success";
					$final_output['message'] = "Successfull";
					$final_output['data'] = $arr;
				}else
				{
	 				$final_output['status'] = 'failed';
	 				$final_output['message'] = 'No data found';
				}	
			}
		}else
		{
	    	$final_output['status'] = 'false';
	    	$final_output['message'] = 'Invalid Token';
		}
	}else
	{
	    $final_output['status'] = 'false';
	    $final_output['message'] = 'Unauthorised Access';
	}	
	header("content-type: application/json");
    echo json_encode($final_output);
}

public function News_list_pulltorefresh()
{
	$headers = apache_request_headers();
	if($headers['secret_key'] !='')
	{
		$check_key = $this->checktoken($headers['secret_key']);
		if($check_key['status'] == 'true')
		{
		    if($check_key['data']->admin_status == 2)
			{
				$final_output['status'] = "1000";
				$final_output['message'] ="Suspicious activity has been detected on your Kartavya account and it has been temporarily suspended as a security precaution.";
			}elseif($check_key['data']->email_status == 2)
			{
				$final_output['status'] = "1000";
				$final_output['message'] ="This account is no longer registered on Kartavya.";
			}else
			{
			    $userid = $check_key['data']->user_id;
				$create_at = $this->input->post('create_at');	///2017-02-15 01:00:00	
				$category_id = $this->input->post('category_id');
				$language = $this->input->post('language');
				$final_output = array();
				$create = ''; $cate = '';
				if($create_at !=0)
				{
					$create = "AND publish_date > '$create_at'";	
				}
				if($category_id!=0)
				{
					$cate = "AND news_type = '$category_id'";
				}
				$arr =array();
				
				$newsdata = $this->db->query("SELECT * FROM news WHERE admin_status = 1 AND news_langauge = '$language' $cate $create ORDER BY news_id DESC LIMIT 10")->result();
				if($newsdata)
				{	
					foreach ($newsdata as $key) {
						$news_img2 = array(); $news_img = '';
						$sele_img = $this->common_model->getData("news_image",array('news_id'=>$key->news_id));
						if($sele_img)
						{
							foreach ($sele_img as $value) {
								
								$news_img2[] = base_url().'uploads/news_image/'.$value->image;
								$news_img = base_url().'uploads/news_image/'.$value->image;
							}
						}
						$isbookmark = 0;
	   					$selbookmark = $this->db->query("SELECT bookmark_id FROM bookmark WHERE news_id='".$key->news_id."' AND user_id='$userid'")->row();
	   					if($selbookmark)
	   					{
	   						$isbookmark = 1;
	   					}
					$key->isbookmarked = $isbookmark;
					$key->image = $news_img;
					$key->image2 = $news_img2;
					$arr[] = $key;
					}
					$final_output['status'] = "success";
					$final_output['message'] = "Successfull";
					$final_output['data'] = $arr;
				}else
				{
	 				$final_output['status'] = 'failed';
	 				$final_output['message'] = 'No data found';
				}
			}	
		}else
		{
	    	$final_output['status'] = 'false';
	    	$final_output['message'] = 'Invalid Token';
		}
	}else
	{
	    $final_output['status'] = 'false';
	    $final_output['message'] = 'Unauthorised Access';
	}	
	header("content-type: application/json");
    echo json_encode($final_output);
}

public function Bookmark()
{	
	$headers = apache_request_headers();
	if($headers['secret_key'] !='')
	{
		$check_key = $this->checktoken($headers['secret_key']);
		if($check_key['status'] == 'true')
		{
		    if($check_key['data']->admin_status == 2)
			{
				$array_object['status'] = "1000";
				$array_object['message'] ="Suspicious activity has been detected on your Kartavya account and it has been temporarily suspended as a security precaution.";
			}elseif($check_key['data']->email_status == 2)
			{
				$array_object['status'] = "1000";
				$array_object['message'] ="This account is no longer registered on Kartavya.";
			}else
			{
			    $user_id = $check_key['data']->user_id;
				$news_id = $this->input->post('news_id');
				$status = $this->input->post('status');
				$final_output = array();
				if(!empty($news_id) && $news_id != 0)
			   	{
			   		$select = $this->common_model->getDataField("news_id","news",array('news_id'=>$news_id));
			   		if($select)
			   		{
	   					$selbookmark = $this->db->query("SELECT bookmark_id FROM bookmark WHERE news_id='$news_id' AND user_id='$user_id'")->row();
	   					if(!empty($selbookmark))
			   			{
			   				if($status==0)
			   				{
			   					$favolist = $this->common_model->deleteData("bookmark",array('bookmark_id'=>$selbookmark->bookmark_id));
			   					if($favolist)
			   					{
			   						$final_output['status'] = 'success';
					   	  			$final_output['message'] = 'Successfully Unbookmarked';
						    	}else
					   	 		{
					   	 			$final_output['status'] = 'failed';
					   	  			$final_output['message'] = 'Something went wrong! please try again later.';
						  		}
			   				}else{
			   					$final_output['status'] = 'success';
				   	  			$final_output['message'] = 'Already Bookmarked';
					       }	
			   			}else
			   			{
			   				if($status==1)
			   				{
			   					$favolist = $this->common_model->common_insert("bookmark",array('news_id'=>$news_id,'user_id'=>$user_id,'create_at'=>militime));
			   					if($favolist)
			   					{
			   						$final_output['status'] = 'success';
					   	  			$final_output['message'] = 'Successfully Bookmarked';
						 		}else
					   	 		{
					   	 			$final_output['status'] = 'failed';
					   	  			$final_output['message'] = 'Something went wrong! please try again later.';
						        }
			   				}else{
			   					$final_output['status'] = 'success';
				   	  			$final_output['message'] = 'Already Unbookmarked';
					        }
			   			}
			   		}else
			   		{
			   			$final_output['status'] = 'failed';
		   	  			$final_output['message'] = 'News not found';
			   		}
			   	}else
			   	{
					$final_output['status'] = 'failed';
	   	  			$final_output['message'] = 'failed';
		       		$final_output['msg'] = 'Invalid Request parameter';
			   	}
			}
		}else
		{
	    	$final_output['status'] = 'false';
	    	$final_output['message'] = 'Invalid Token';
		}
	}else
	{
	    $final_output['status'] = 'false';
	    $final_output['message'] = 'Unauthorised Access';
	}	
	header("content-type: application/json");
    echo json_encode($final_output);
}

public function Bookmark_List()
{	
	$headers = apache_request_headers();
	if($headers['secret_key'] !='')
	{
		$check_key = $this->checktoken($headers['secret_key']);
		if($check_key['status'] == 'true')
		{
		    $user_id = $check_key['data']->user_id;
			$news_id = $this->input->post('news_id');
			$status = $this->input->post('status');
			$create_at = $this->input->post('create_at');
			$final_output = array();
			$arr =array();
			$create = '';
			if($create_at != 0)
			{
				$create = "AND bookmark.create_at < '$create_at'";
			}
		   	//$selbookmark = $this->common_model->getDataField("bookmark.bookmark_id,news.*","bookmark",array('bookmark.user_id'=>$user_id),'','',array('news'=>'bookmark.news_id=news.news_id'));
			$selbookmark = $this->db->query("SELECT bookmark.bookmark_id,news.* FROM bookmark INNER JOIN news ON bookmark.news_id = news.news_id WHERE bookmark.user_id = '$user_id' $create ")->result();
			if(!empty($selbookmark))
   			{
				foreach ($selbookmark as $key) {
					$news_img = '';
					$sele_img = $this->common_model->getData("news_image",array('news_id'=>$key->news_id));
					if($sele_img)
					{
						foreach ($sele_img as $value) {
							//$news_img2[] = base_url().'uploads/news_image/'.$value->image;
							$news_img = base_url().'uploads/news_image/'.$value->image;
						}
					}
				$key->image = $news_img;
				$arr[] = $key;
				}
				if(!empty($arr))
				{
					$final_output['status'] = 'success';
	    			$final_output['message'] = 'Bookmark list';
	    			$final_output['data'] = $arr;
				}else
				{
					$final_output['status'] = 'failed';
	    			$final_output['message'] = 'Bookmark list not found';		
				}
			}else
			{
				$final_output['status'] = 'failed';
	    		$final_output['message'] = 'Bookmark list not found';
			}
		}else
		{
	    	$final_output['status'] = 'false';
	    	$final_output['message'] = 'Invalid Token';
		}
	}else
	{
	    $final_output['status'] = 'false';
	    $final_output['message'] = 'Unauthorised Access';
	}	
	header("content-type: application/json");
    echo json_encode($final_output);
}

public function Bookmark_List_pulltorefresh()
{	
	$headers = apache_request_headers();
	if($headers['secret_key'] !='')
	{
		$check_key = $this->checktoken($headers['secret_key']);
		if($check_key['status'] == 'true')
		{
		    $user_id = $check_key['data']->user_id;
			$news_id = $this->input->post('news_id');
			$status = $this->input->post('status');
			$create_at = $this->input->post('create_at');
			$final_output = array();
			$arr =array();
			$create = '';
			if($create_at != 0)
			{
				$create = "AND bookmark.create_at > '$create_at'";
			}
		   	//$selbookmark = $this->common_model->getDataField("bookmark.bookmark_id,news.*","bookmark",array('bookmark.user_id'=>$user_id),'','',array('news'=>'bookmark.news_id=news.news_id'));
			$selbookmark = $this->db->query("SELECT bookmark.bookmark_id,news.* FROM bookmark INNER JOIN news ON bookmark.news_id = news.news_id WHERE bookmark.user_id = '$user_id' $create ")->result();
			if(!empty($selbookmark))
   			{
				foreach ($selbookmark as $key) {
					$news_img = '';
					$sele_img = $this->common_model->getData("news_image",array('news_id'=>$key->news_id));
					if($sele_img)
					{
						foreach ($sele_img as $value) {
							//$news_img2[] = base_url().'uploads/news_image/'.$value->image;
							$news_img = base_url().'uploads/news_image/'.$value->image;
						}
					}
				$key->image = $news_img;
				$arr[] = $key;
				}
				if(!empty($arr))
				{
					$final_output['status'] = 'success';
	    			$final_output['message'] = 'Bookmark list';
	    			$final_output['data'] = $arr;
				}else
				{
					$final_output['status'] = 'failed';
	    			$final_output['message'] = 'Bookmark list not found';		
				}
			}else
			{
				$final_output['status'] = 'failed';
	    		$final_output['message'] = 'Bookmark list not found';
			}
		}else
		{
	    	$final_output['status'] = 'false';
	    	$final_output['message'] = 'Invalid Token';
		}
	}else
	{
	    $final_output['status'] = 'false';
	    $final_output['message'] = 'Unauthorised Access';
	}	
	header("content-type: application/json");
    echo json_encode($final_output);
}

//BLOG API =  Add Blog, blog list load more and pull to refresh
public function Add_blog()
{
	$headers = apache_request_headers();
	if($headers['secret_key'] !='')
	{
		$check_key = $this->checktoken($headers['secret_key']);
		if($check_key['status'] == 'true')
		{
		    $userid = $check_key['data']->user_id;
			$blog_title = $this->input->post('blog_title');
			$blog_description = $this->input->post('blog_description');
			$final_output = array();
			$blog_image = array();
			if(isset($_FILES['blog_pic']['name']) && $_FILES['blog_pic']['name'] != '')
    		{
    			$image = md5(militime.$_FILES['blog_pic']['name']).".jpg";
    			move_uploaded_file($_FILES['blog_pic']['tmp_name'],'uploads/blog_image/'.$image);
    			$images = base_url().'uploads/blog_image/'.$image;
    		}else
    		{
    			$images = ''; $image='';
    		}
    		//$start_dt_milisecond = 1000 * strtotime($start_date.$start_time);
	    	$arr = array(
	    				'user_id'=>$userid,
	    				'title'=>$blog_title,
	    				'description'=>$blog_description,
	    				'publish_by'=>$check_key['data']->username.' '.$check_key['data']->user_surname,
	    				'create_at'=>militime,
	    				'update_at'=>militime
	    				);
	    	$bloginsert = $this->common_model->common_insert("blog",$arr,array());
			if($bloginsert)
			{	
				$insertimage = $this->common_model->common_insert("blog_image",array('blog_id'=>$bloginsert,'image'=>$image,'create_at'=>militime,'update_at'=>militime));
				/*if(isset($_FILES['blog_pic']['name']) && !empty($_FILES['blog_pic']['name']))
				{
					$file_count=count($_FILES['blog_pic']['name']);
					for ($i=0; $i < $file_count; $i++) 
					{ 
				        $_FILES['file_url']['name']= $_FILES['blog_pic']['name'][$i];
				        $_FILES['file_url']['type']= $_FILES['blog_pic']['type'][$i];
				        $_FILES['file_url']['tmp_name']= $_FILES['blog_pic']['tmp_name'][$i];
				        $_FILES['file_url']['error']= $_FILES['blog_pic']['error'][$i];
				        $_FILES['file_url']['size']= $_FILES['blog_pic']['size'][$i];  

						$config = array();
						$config['upload_path']   = 'uploads/blog_image/';
						$config['allowed_types'] = 'jpg|jpeg|png|pdf';

						$subFileName = explode('.',$_FILES['file_url']['name']);
						$ExtFileName = end($subFileName);
					    $config['file_name'] = md5(militime.$_FILES['file_url']['name']).'.'.$ExtFileName;

						$this->load->library('upload',$config);
				        $this->upload->initialize($config);
						if($this->upload->do_upload('file_url'))
						{ 
							$image_data = $this->upload->data();
							$product_image =  $image_data['file_name'];
							$blog_image[] = base_url().'uploads/blog_image/'.$image_data['file_name'];
							$insertimage = $this->common_model->common_insert("blog_image",array('blog_id'=>$bloginsert,'image'=>$product_image,'create_at'=>militime,'update_at'=>militime));
						}else
						{  
							$err[]= $this->upload->display_errors();
						 	$final_output = $this->session->set_flashdata('error_pic', $err);
						}
					} 
				}else
				{
					$blog_image = array();
				}*/
				$insert_noti = $this->common_model->common_insert("notification",array('user_id'=>$userid,'receiver_id'=>0,'section_id'=>$bloginsert,'title'=>'New blog Added','type'=>20,'msg'=>'New blog added by '.$check_key['data']->username.' '.$check_key['data']->user_surname,'create_at'=>militime,'update_at'=>militime),array());

				$final_output['status'] = "success";
				$final_output['message'] = "Blog Successfully Added.";
				$arr['blog_id'] = $bloginsert;
				$arr['image']=$blog_image;
				$final_output['data'] = $arr;
			}else
			{
 				$final_output['status'] = 'failed';
 				$final_output['message'] = 'Something went wrong! Please try again later.';
			}	
		}else
		{
	    	$final_output['status'] = 'false';
	    	$final_output['message'] = 'Invalid Token';
		}
	}else
	{
	    $final_output['status'] = 'false';
	    $final_output['message'] = 'Unauthorised Access';
	}	
	header("content-type: application/json");
    echo json_encode($final_output);
}

public function Blog_list()
{
	$headers = apache_request_headers();
	if($headers['secret_key'] !='')
	{
		$check_key = $this->checktoken($headers['secret_key']);
		if($check_key['status'] == 'true')
		{
		    $userid = $check_key['data']->user_id;
			$create_at = $this->input->post('create_at');	///2017-02-15 01:00:00	
			$blog_flag = $this->input->post('blog_flag');	//ADMINISTRATOR = 1,MEMBERS = 2
			$final_output = array();
			$create = '';
			$arr = array();
			if($create_at !=0)
			{
				$create = "AND publish_date < '$create_at'";	
			}

			$blogdata = '';
			$currdt = date('Y-m-d H:i:s');
			if($blog_flag==1)
			{
			//	$username = 'Admin';
				$blogdata = $this->db->query("SELECT blog_id,title,description,user_id,publish_date,create_at FROM blog WHERE admin_status = 1 AND delete_status = 0 AND user_id = 0  $create ORDER BY publish_date DESC LIMIT 2")->result();
				$count = $this->db->query("SELECT count(blog_id) as bcount FROM blog WHERE admin_status = 1 AND delete_status = 0 AND user_id = 0  $create")->row()->bcount;

			}elseif($blog_flag==2)
			{
				$blogdata = $this->db->query("SELECT blog_id,title,description,user_id,publish_date,create_at FROM blog WHERE admin_status = 1 AND delete_status = 0 AND user_id != 0 $create ORDER BY publish_date DESC LIMIT 2")->result();
				$count = $this->db->query("SELECT count(blog_id) as bcount FROM blog WHERE admin_status = 1 AND delete_status = 0 AND user_id != 0  $create")->row()->bcount;
			}
			if($blogdata)
			{	
				foreach ($blogdata as $key) {
					
					$userimage = '';
					$user = $this->common_model->getDataField("username,image","users",array('user_id'=>$key->user_id)); 
					if($user)
					{
						if($user[0]->image)
						{
							$userimage = base_url().'uploads/user_image/'.$user[0]->image;
						}
						$username = $user[0]->username;
					}else
					{
						 $username = 'Admin';
					}
					$blog_img2 = array(); $blog_img = '';
					$sele_img = $this->common_model->getData("blog_image",array('blog_id'=>$key->blog_id));
					if($sele_img)
					{
						foreach ($sele_img as $value) {
							
							$blog_img2[] = base_url().'uploads/blog_image/'.$value->image;
							$blog_img = base_url().'uploads/blog_image/'.$value->image;
						}
					}
					$like_count = '';  $comment_count = '';
					$likecount = $this->db->query("SELECT count(like_unlike_id) as Like_Unlike_count FROM Like_Unlike WHERE section_id = ".$key->blog_id." AND type = 'blog'")->row()->Like_Unlike_count;
					if(!empty($likecount))
					{
						$like_count = $likecount;
					}
					$commentcont = $this->db->query("SELECT count(comment_id) as comment_count FROM comment WHERE project_id = ".$key->blog_id." AND type = 'blog'")->row()->comment_count;
					if(!empty($commentcont))
					{
						$comment_count = $commentcont;
					}
					$likecount = $this->db->query("SELECT like_unlike_id FROM Like_Unlike WHERE section_id = ".$key->blog_id." AND type = 'blog' AND user_id = '$userid'")->row();
					if(!empty($likecount))
					{
						$my_like = 1;
					}else
					{
						$my_like = 0;
					}

					$key->image2 = $blog_img2;
					$key->image = $blog_img;
					$key->user_name = $username;
					$key->user_image = $userimage;
					$key->like_count = (int)$like_count;
					$key->comment_count = (int)$comment_count;
					$key->my_response = $my_like;
					//$des = strip_tags($key->description);
					//$key->description = $des;
					$arr[] = $key;
				}
				$final_output['status'] = "success";
				$final_output['message'] = "Successfull";
				$final_output['data'] = $arr;
				$final_output['blog_count'] = $count;
			}else
			{
 				$final_output['status'] = 'failed';
 				$final_output['message'] = 'No data found';
			}	
		}else
		{
	    	$final_output['status'] = 'false';
	    	$final_output['message'] = 'Invalid Token';
		}
	}else
	{
	    $final_output['status'] = 'false';
	    $final_output['message'] = 'Unauthorised Access';
	}	
	header("content-type: application/json");
    echo json_encode($final_output);
}

public function Blog_list_pulltorefresh()
{
	$headers = apache_request_headers();
	if($headers['secret_key'] !='')
	{
		$check_key = $this->checktoken($headers['secret_key']);
		if($check_key['status'] == 'true')
		{
		    $userid = $check_key['data']->user_id;
			$create_at = $this->input->post('create_at');	///2017-02-15 01:00:00	
			$blog_flag = $this->input->post('blog_flag');	//ADMINISTRATOR = 1,MEMBERS = 2
			$final_output = array();
			$create = '';
			$arr = array();
			if($create_at !=0)
			{
				$create = "AND publish_date > '$create_at'";	
			}

			$blogdata = '';
			$currdt = date('Y-m-d H:i:s');
			if($blog_flag==1)
			{
			//	$username = 'Admin';
				$blogdata = $this->db->query("SELECT blog_id,title,description,user_id,publish_date,create_at FROM blog WHERE admin_status = 1 AND delete_status = 0 AND user_id = 0  $create ORDER BY publish_date DESC LIMIT 2")->result();
				$count = $this->db->query("SELECT count(blog_id) as bcount FROM blog WHERE admin_status = 1 AND delete_status = 0 AND user_id = 0  $create")->row()->bcount;
			}elseif($blog_flag==2)
			{
				$blogdata = $this->db->query("SELECT blog_id,title,description,user_id,publish_date,create_at FROM blog WHERE admin_status = 1 AND delete_status = 0 AND user_id != 0 $create ORDER BY publish_date DESC LIMIT 2")->result();
				$count = $this->db->query("SELECT count(blog_id) as bcount FROM blog WHERE admin_status = 1 AND delete_status = 0 AND user_id != 0  $create")->row()->bcount;
			}
			if($blogdata)
			{	
				foreach ($blogdata as $key) {
					
					$userimage = '';
					$user = $this->common_model->getDataField("username,image","users",array('user_id'=>$key->user_id)); 
					if($user)
					{
						if($user[0]->image)
						{
							$userimage = base_url().'uploads/user_image/'.$user[0]->image;
						}
						$username = $user[0]->username;
					}else
					{
						 $username = 'Admin';
					}
					$blog_img2 = array(); $blog_img = '';
					$sele_img = $this->common_model->getData("blog_image",array('blog_id'=>$key->blog_id));
					if($sele_img)
					{
						foreach ($sele_img as $value) {
							
							$blog_img2[] = base_url().'uploads/blog_image/'.$value->image;
							$blog_img = base_url().'uploads/blog_image/'.$value->image;
						}
					}
					$like_count = '';  $comment_count = '';
					$likecount = $this->db->query("SELECT count(like_unlike_id) as Like_Unlike_count FROM Like_Unlike WHERE section_id = ".$key->blog_id." AND type = 'blog'")->row()->Like_Unlike_count;
					if(!empty($likecount))
					{
						$like_count = $likecount;
					}
					$commentcont = $this->db->query("SELECT count(comment_id) as comment_count FROM comment WHERE project_id = ".$key->blog_id." AND type = 'blog'")->row()->comment_count;
					if(!empty($commentcont))
					{
						$comment_count = $commentcont;
					}
					$likecount = $this->db->query("SELECT like_unlike_id FROM Like_Unlike WHERE section_id = ".$key->blog_id." AND type = 'blog' AND user_id = '$userid'")->row();
					if(!empty($likecount))
					{
						$my_like = 1;
					}else
					{
						$my_like = 0;
					}

					$key->image2 = $blog_img2;
					$key->image = $blog_img;
					$key->user_name = $username;
					$key->user_image = $userimage;
					$key->like_count = (int)$like_count;
					$key->comment_count = (int)$comment_count;
					$key->my_response = (int)$my_like;
					//$des = strip_tags($key->description);
					//$key->description = $des;
					$arr[] = $key;
				}
				$final_output['status'] = "success";
				$final_output['message'] = "Successfull";
				$final_output['data'] = $arr;
				$final_output['blog_count'] = $count;
			}else
			{
 				$final_output['status'] = 'failed';
 				$final_output['message'] = 'No data found';
			}	
		}else
		{
	    	$final_output['status'] = 'false';
	    	$final_output['message'] = 'Invalid Token';
		}
	}else
	{
	    $final_output['status'] = 'false';
	    $final_output['message'] = 'Unauthorised Access';
	}	
	header("content-type: application/json");
    echo json_encode($final_output);
}

public function Like_unlike_blog()
{	
	$headers = apache_request_headers();
	if($headers['secret_key'] !='')
	{
		$check_key = $this->checktoken($headers['secret_key']);
		if($check_key['status'] == 'true')
		{
		    $user_id = $check_key['data']->user_id;
			$blog_id = $this->input->post('blog_id');
			$like_status = $this->input->post('like_status');
			$final_output = array();
			if(!empty($blog_id) && $blog_id != 0)
		   	{
		   		$select = $this->common_model->getDataField("blog_id","blog",array('blog_id'=>$blog_id,'delete_status'=>0));
		   		if($select)
		   		{
   					$seluservote = $this->db->query("SELECT like_unlike_id FROM Like_Unlike WHERE section_id ='$blog_id' AND user_id='$user_id' AND type = 'blog'")->row();
   					if(!empty($seluservote))
		   			{
	   					if($like_status!= 1)
	   					{
   							$unlike = $this->common_model->deleteData("Like_Unlike",array('section_id'=>$blog_id,'user_id'=>$user_id,'type'=>'blog'));
	   						if($unlike==TRUE)
	   						{
		   						$response = 'true';
					    	}else
				   	 		{
		   						$response = 'failed';
					  		}
		   				}else{
		   					$response = 'false';
				        }	
   					}else
   					{
   						if($like_status== 1)
	   					{
   							$likes = $this->common_model->common_insert("Like_Unlike",array('section_id'=>$blog_id,'user_id'=>$user_id,'type'=>'blog','create_at'=>date('d-m-Y H:i:s')));
	   						if($likes==TRUE)
	   						{
		   						$response = 'true';
		   					}else
				   	 		{
		   						$response = 'failed';
					  		}
		   				}else{
		   					$response = 'false';
		   		        }	
   					}
   					if($response != 'failed')
   					{
   						$like_count = 0;
   						$likecount = $this->db->query("SELECT count(like_unlike_id) as Like_Unlike_count FROM Like_Unlike WHERE section_id = '$blog_id' AND type = 'blog'")->row()->Like_Unlike_count;
						if(!empty($likecount))
						{
							$like_count = $likecount;
						}
   						if($response=='true')
   						{
   							if($like_status == 1){ $msg = 'Successfully Liked'; }else{ $msg = 'Successfully Unliked'; }
   							$final_output['status'] = 'success';
				   	  		$final_output['message'] = $msg;
				   	  		$final_output['data'] = array('like_count'=>$like_count);
   						}else
   						{
   							if($like_status == 1){ $msg = 'Already Liked'; }else{ $msg = 'Already Unliked'; }
   							$final_output['status'] = 'failed';
				   	  		$final_output['message'] = $msg;
				   	  		$final_output['data'] = array('like_count'=>$like_count);
   						}
   					}else
   					{
		   	 			$final_output['status'] = 'failed';
		   	  			$final_output['message'] = 'Something went wrong! please try again later.';
   					}
	   	   		}else
		   		{
		   			$final_output['status'] = 'failed';
	   	  			$final_output['message'] = 'Blog not found';
		   		}
		   	}else
		   	{
				$final_output['status'] = 'failed';
	       		$final_output['message'] = 'Invalid Request parameter';
		   	}
		}else
		{
	    	$final_output['status'] = 'false';
	    	$final_output['message'] = 'Invalid Token';
		}
	}else
	{
	    $final_output['status'] = 'false';
	    $final_output['message'] = 'Unauthorised Access';
	}	
	header("content-type: application/json");
    echo json_encode($final_output);
}

public function Comment_on_blog()
{	
	$headers = apache_request_headers();
	if($headers['secret_key'] !='')
	{
		$check_key = $this->checktoken($headers['secret_key']);
		if($check_key['status'] == 'true')
		{
		    $user_id = $check_key['data']->user_id;
			$blog_id = $this->input->post('blog_id');
			$comment = $this->input->post('comment');
			$final_output = array();
			if(!empty($comment))
		   	{
		   		$select = $this->db->select('user_id,title')->get_where("blog",array('blog_id'=>$blog_id,'delete_status'=>0))->row();
		 		if($select)
		   		{
   					$result = $this->common_model->common_insert('comment',array('project_id'=>$blog_id,'user_id'=>$user_id,'comment'=>$comment,'type'=>'blog','create_at'=>date('Y-m-d H:i:s')));
					if($result)
					{
						if($user_id!=$select->user_id && $select->user_id != 0 && $select->user_id != ''){
						$devicetoken = $this->db->select('device_token')->get_where("users",array('user_id'=>$select->user_id))->row();
						$message = array('title'=>'Comment on blog','message'=>$check_key['data']->username.' '.$check_key['data']->user_surname.' has commented on your blog '.$select->title,'type'=>10,'section_id'=>$blog_id,'currenttime'=>militime);
						$this->common_model->sendPushNotification($devicetoken->device_token,$message);
						$insert_noti = $this->common_model->common_insert("notification",array('sender_id'=>$user_id,'receiver_id'=>$select->user_id,'section_id'=>$blog_id,'title'=>'Comment on blog','type'=>10,'msg'=>$check_key['data']->username.' '.$check_key['data']->user_surname.' has commented on your blog '.$select->title,'create_at'=>militime,'update_at'=>militime),array());
					}
						$final_output['status'] = 'success';
						$final_output['message'] = 'Successfully Commented';
					}else
					{
						$final_output['status'] = 'failed';
						$final_output['message'] = 'Something went wrong! please try again later.';
					}
	   	   		}else
		   		{
		   			$final_output['status'] = 'failed';
	   	  			$final_output['message'] = 'Blog not found';
		   		}
		   	}else
		   	{
				$final_output['status'] = 'failed';
   	  			$final_output['message'] = 'No Request parameter';
		   	}
		}else
		{
	    	$final_output['status'] = 'false';
	    	$final_output['message'] = 'Invalid Token';
		}
	}else
	{
	    $final_output['status'] = 'false';
	    $final_output['message'] = 'Unauthorised Access';
	}	
	header("content-type: application/json");
    echo json_encode($final_output);
}

public function Blog_Comment_List()
{	
	$headers = apache_request_headers();
	if($headers['secret_key'] !='')
	{
		$check_key = $this->checktoken($headers['secret_key']);
		if($check_key['status'] == 'true')
		{
		    $user_id = $check_key['data']->user_id;
			$blog_id = $this->input->post('blog_id');
			$final_output = array();
			$arr =array();
			$projectcomnt = 0;
		   	$this->db->select('comment.comment,users.username,users.user_surname,users.image');
		   	$sel_coment = $this->db->join('comment','comment.user_id=users.user_id','inner')->get_where("users",array('comment.project_id'=>$blog_id,'comment.type'=>'blog'))->result();
	 		if(!empty($sel_coment))
	   		{
				foreach ($sel_coment as $key) {
					
					if($key->image!='')
					{
						$image = base_url().'uploads/user_image/'.$key->image;
					}else
					{
						$image = '';
					}

					$arr[] = array(
								'username' => $key->username.' '.$key->user_surname,
								'comment'=>$key->comment,	
								'image'=>$image	
								);
				}
				$commentcont = $this->db->query("SELECT count(comment_id) as comment_count FROM comment WHERE project_id = ".$blog_id." AND type = 'blog'")->row()->comment_count;
				if(!empty($commentcont))
				{
					$projectcomnt = $commentcont;
				}
			}
	   		if(!empty($arr))
	   		{
   				$final_output['status'] = 'success';
				$final_output['message'] = 'Comment List';
				$final_output['data'] = $arr;
				$final_output['comment_count'] = $projectcomnt;
	   		}else
	   		{
   				$final_output['status'] = 'failed';
				$final_output['message'] = 'No comment found';
			}
		}else
		{
	    	$final_output['status'] = 'false';
	    	$final_output['message'] = 'Invalid Token';
		}
	}else
	{
	    $final_output['status'] = 'false';
	    $final_output['message'] = 'Unauthorised Access';
	}	
	header("content-type: application/json");
    echo json_encode($final_output);
}

//PROJECT API =  Add project, upcoming pull and load, past pull and load, project upvote, comment on project, comment list

public function Add_project()
{
	$headers = apache_request_headers();
	if($headers['secret_key'] !='')
	{
		$check_key = $this->checktoken($headers['secret_key']);
		if($check_key['status'] == 'true')
		{
		    $userid = $check_key['data']->user_id;
			$project_title = $this->input->post('project_title');
			$project_description = $this->input->post('project_description');
			$brief_description = $this->input->post('brief_description');
			$address = $this->input->post('address');
			$start_date = $this->input->post('start_date');
			$end_date = $this->input->post('end_date');
			$lat = $this->input->post('lat');
			$lng = $this->input->post('lng');
			$hosted_by = $this->input->post('hosted_by');
			//$ticket_url = $this->input->post('ticket_url');
			$final_output = array();
			$blog_image = array();
			$arr = array(
	    				'user_id'=>$userid,
	    				'title'=>$project_title,
	    				'description'=>$project_description,
	    				'brief_description'=>$brief_description,
	    				'address'=>$address,
	    				'start_date'=>$start_date,
	    				'end_date'=>$end_date,
	    				'lat'=>$lat,
	    				'lng'=>$lng,
	    				'hosted_by'=>$hosted_by,
	    				'create_at'=>militime,
	    				'update_at'=>militime
	    				);
	    	$projectinsert = $this->common_model->common_insert("project",$arr,array());
			if($projectinsert)
			{	
				if(isset($_FILES['project_pic']['name']) && !empty($_FILES['project_pic']['name']))
				{
					$file_count=count($_FILES['project_pic']['name']);
					for ($i=0; $i < $file_count; $i++) 
					{ 
				        $_FILES['file_url']['name']= $_FILES['project_pic']['name'][$i];
				        $_FILES['file_url']['type']= $_FILES['project_pic']['type'][$i];
				        $_FILES['file_url']['tmp_name']= $_FILES['project_pic']['tmp_name'][$i];
				        $_FILES['file_url']['error']= $_FILES['project_pic']['error'][$i];
				        $_FILES['file_url']['size']= $_FILES['project_pic']['size'][$i];  

						$config = array();
						$config['upload_path']   = 'uploads/project_image/';
						$config['allowed_types'] = 'jpg|jpeg|png|pdf';

						$subFileName = explode('.',$_FILES['file_url']['name']);
						$ExtFileName = end($subFileName);
					    $config['file_name'] = md5(militime.$_FILES['file_url']['name']).'.'.$ExtFileName;

						$this->load->library('upload',$config);
				        $this->upload->initialize($config);
						if($this->upload->do_upload('file_url'))
						{ 
							$image_data = $this->upload->data();
							$product_image =  $image_data['file_name'];
							$project_image[] = base_url().'uploads/project_image/'.$image_data['file_name'];
							$insertimage = $this->common_model->common_insert("project_image",array('project_id'=>$projectinsert,'image'=>$product_image,'create_at'=>militime,'update_at'=>militime));
						}/*else
						{  
							$err[]= $this->upload->display_errors();
						 	$final_output = $this->session->set_flashdata('error_pic', $err);
						}*/
					} 
				}else
				{
					$project_image = array();
				}
				$insert_noti = $this->common_model->common_insert("notification",array('user_id'=>$userid,'section_id'=>$projectinsert,'title'=>'New Project Added','type'=>17,'msg'=>'Project Added By '.$check_key['data']->username.' '.$check_key['data']->user_surname,'create_at'=>militime,'update_at'=>militime),array());
				$final_output['status'] = "success";
				$final_output['message'] = "Project Successfully Added.";
				$arr['project_id'] = $projectinsert;
				$arr['image']=$project_image;
				$final_output['data'] = $arr;
			}else
			{
 				$final_output['status'] = 'failed';
 				$final_output['message'] = 'Something went wrong! Please try again later.';
			}	
		}else
		{
	    	$final_output['status'] = 'false';
	    	$final_output['message'] = 'Invalid Token';
		}
	}else
	{
	    $final_output['status'] = 'false';
	    $final_output['message'] = 'Unauthorised Access';
	}	
	header("content-type: application/json");
    echo json_encode($final_output);
}

public function Upcoming_project()
{
	$headers = apache_request_headers();
	if($headers['secret_key'] !='')
	{
		$check_key = $this->checktoken($headers['secret_key']);
		if($check_key['status'] == 'true')
		{
		    $userid = $check_key['data']->user_id;
			$create_at = $this->input->post('create_at');	///2017-02-15 01:00:00	
			$type = $this->input->post('type');	
			$final_output = array();
			$create = '';
			$date = date('Y-m-d H:i:s');
			if($create_at !=0)
			{
				$create = "AND start_date > '$create_at'";	
			}
			if($type==1)
			{	
				$condition = "AND start_date <= '$date' AND end_date >= '$date'";
			}elseif($type==2)
			{
				$condition = "AND start_date > '$date'";
			}else
			{
				$condition = "AND user_id = '$userid'";
			}
			$arr = array();
			$projectsel = $this->db->query("SELECT * FROM project WHERE admin_status = 1 AND delete_status = 0 $condition $create ORDER BY start_date ASC LIMIT 2")->result();
			$count = $this->db->query("SELECT count(project_id) as pcount FROM project WHERE admin_status = 1 AND delete_status = 0 $condition $create")->row()->pcount;		
			if($projectsel)
			{	
				foreach ($projectsel as $key) {

					$resselect = $this->db->query("SELECT count(user_id) as upvotecount FROM project_upvote WHERE project_id = ".$key->project_id." AND vote_status=1 ")->row()->upvotecount;
					if(!empty($resselect))
					{
						$upvote_count = $resselect;
					}else
					{
						$upvote_count = 0;
					}

					$resselectd = $this->db->query("SELECT count(user_id) as downvotecount FROM project_upvote WHERE project_id = ".$key->project_id." AND vote_status=2 ")->row()->downvotecount;
					if(!empty($resselectd))
					{
						$downvote_count = $resselectd;
					}else
					{
						$downvote_count = 0;
					}

					$myresselect = $this->db->query("SELECT vote_status FROM project_upvote WHERE project_id = ".$key->project_id." AND user_id = '$userid'")->row();
					if($myresselect)
					{
						$my_vote = $myresselect->vote_status;
					}else
					{
						$my_vote = 0;
					}
					$commentcont = $this->db->query("SELECT count(comment_id) as comment_count FROM comment WHERE project_id = ".$key->project_id." AND type = 'project'")->row()->comment_count;
					if(!empty($commentcont))
					{
						$projectcomnt = $commentcont;
					}else
					{
						$projectcomnt = 0;
					}
					$project_img_arr = array();
					$project_img ='';
					$sele_img = $this->common_model->getData("project_image",array('project_id'=>$key->project_id));
					if($sele_img)
					{
						$project_img = base_url().'uploads/project_image/'.$sele_img[0]->image;
						foreach ($sele_img as $value) {
							$project_img_arr[] = base_url().'uploads/project_image/'.$value->image;
						}
					}
					if($key->user_id != 0 ){
					$hostname1 = $this->db->select('username,user_surname')->get_where("users",array('user_id'=>$key->user_id))->row();
					$hostname = $hostname1->username.' '.$hostname1->user_surname;
					}else{ 
					$hostname = $key->hosted_by;	
					}
					$shortmonth = date('M',strtotime($key->start_date));
					$shortdt = date('d',strtotime($key->start_date));
					$fulldtst = date('Y-m-d',strtotime($key->start_date));
					$fulldted = date('Y-m-d',strtotime($key->end_date));
					$key->comment_count = $projectcomnt;
					$key->hosted_by = $hostname;
					$key->st_dt = $fulldtst;
					$key->ed_dt = $fulldted;
					$key->shortm = $shortmonth;
					$key->shortd = $shortdt;
					$key->upvote = $upvote_count;
					$key->downvote = $downvote_count;
					$key->my_vote = $my_vote;
					$key->image = $project_img;
					$key->image2 = $project_img_arr;
					$arr[] = $key;
				}
				$final_output['status'] = "success";
				$final_output['message'] = "Successfull";
				$final_output['data'] = $arr;
				$final_output['project_count'] = $count;
			}else
			{
 				$final_output['status'] = 'failed';
 				$final_output['message'] = 'No project found';
			}	
		}else
		{
	    	$final_output['status'] = 'false';
	    	$final_output['message'] = 'Invalid Token';
		}
	}else
	{
	    $final_output['status'] = 'false';
	    $final_output['message'] = 'Unauthorised Access';
	}	
	header("content-type: application/json");
    echo json_encode($final_output);
}

public function Upcoming_project_Pulltorefresh()
{
	$headers = apache_request_headers();
	if($headers['secret_key'] !='')
	{
		$check_key = $this->checktoken($headers['secret_key']);
		if($check_key['status'] == 'true')
		{
		    $userid = $check_key['data']->user_id;
			$create_at = $this->input->post('create_at');	///2017-02-15 01:00:00	
			$type = $this->input->post('type');	
			$final_output = array();
			$create = '';
			$date = date('Y-m-d H:i:s');
			if($create_at !=0)
			{
				$create = "AND start_date < '$create_at'";	
			}
			if($type==1)
			{	
				$condition = "AND start_date <= '$date' AND end_date >= '$date'";
			}elseif($type==2)
			{
				$condition = "AND start_date > '$date'";
			}else
			{
				$condition = "AND user_id = '$userid'";
			}
			$arr = array();
			$projectsel = $this->db->query("SELECT * FROM project WHERE admin_status = 1 AND delete_status = 0 $condition $create ORDER BY start_date ASC LIMIT 2")->result();
			$count = $this->db->query("SELECT count(project_id) as pcount FROM project WHERE admin_status = 1 AND delete_status = 0 $condition $create")->row()->pcount;			
			if($projectsel)
			{	
				foreach ($projectsel as $key) {

					$resselect = $this->db->query("SELECT count(user_id) as upvotecount FROM project_upvote WHERE project_id = ".$key->project_id." AND vote_status=1 ")->row()->upvotecount;
					if(!empty($resselect))
					{
						$upvote_count = $resselect;
					}else
					{
						$upvote_count = 0;
					}
					$resselectd = $this->db->query("SELECT count(user_id) as downvotecount FROM project_upvote WHERE project_id = ".$key->project_id." AND vote_status=2 ")->row()->downvotecount;
					if(!empty($resselectd))
					{
						$downvote_count = $resselectd;
					}else
					{
						$downvote_count = 0;
					}

					$myresselect = $this->db->query("SELECT vote_status FROM project_upvote WHERE project_id = ".$key->project_id." AND user_id = '$userid'")->row();
					if($myresselect)
					{
						$my_vote = $myresselect->vote_statu;
					}else
					{
						$my_vote = 0;
					}

					$commentcont = $this->db->query("SELECT count(comment_id) as comment_count FROM comment WHERE project_id = ".$key->project_id." AND type = 'project'")->row()->comment_count;
					if(!empty($commentcont))
					{
						$projectcomnt = $commentcont;
					}else
					{
						$projectcomnt = 0;
					}
					$key->comment_count = $projectcomnt;
					$project_img_arr = array();
					$project_img ='';
					$sele_img = $this->common_model->getData("project_image",array('project_id'=>$key->project_id));
					if($sele_img)
					{
						$project_img = base_url().'uploads/project_image/'.$sele_img[0]->image;
						foreach ($sele_img as $value) {
							$project_img_arr[] = base_url().'uploads/project_image/'.$value->image;
						}
					}
					if($key->user_id != 0 ){
					$hostname1 = $this->db->select('username,user_surname')->get_where("users",array('user_id'=>$key->user_id))->row();
					$hostname = $hostname1->username.' '.$hostname1->user_surname;
					}else{ 
					$hostname = $key->hosted_by;	
					}
					$key->hosted_by = $hostname;
					$shortmonth = date('M',strtotime($key->start_date));
					$shortdt = date('d',strtotime($key->start_date));
					$fulldtst = date('Y-m-d',strtotime($key->start_date));
					$fulldted = date('Y-m-d',strtotime($key->end_date));
					$key->st_dt = $fulldtst;
					$key->ed_dt = $fulldted;
					$key->shortm = $shortmonth;
					$key->shortd = $shortdt;
					$key->upvote = $upvote_count;
					$key->downvote = $downvote_count;
					$key->my_vote = $my_vote;
					$key->image = $project_img;
					$key->image2 = $project_img_arr;
					$arr[] = $key;
				}
				$final_output['status'] = "success";
				$final_output['message'] = "Successfull";
				$final_output['data'] = $arr;
				$final_output['project_count'] = $count;

			}else
			{
 				$final_output['status'] = 'failed';
 				$final_output['message'] = 'No project found';
			}	
		}else
		{
	    	$final_output['status'] = 'false';
	    	$final_output['message'] = 'Invalid Token';
		}
	}else
	{
	    $final_output['status'] = 'false';
	    $final_output['message'] = 'Unauthorised Access';
	}	
	header("content-type: application/json");
    echo json_encode($final_output);
}

public function Past_project()
{
	$headers = apache_request_headers();
	if($headers['secret_key'] !='')
	{
		$check_key = $this->checktoken($headers['secret_key']);
		if($check_key['status'] == 'true')
		{
		    $userid = $check_key['data']->user_id;
			$create_at = $this->input->post('create_at');	///2017-02-15 01:00:00	
			//$type = $this->input->post('type');	
			$final_output = array();
			$create = '';
			$date = date('Y-m-d H:i:s');
			if($create_at !=0)
			{
				$create = "AND end_date < '$create_at'";	
			}
			$condition = "AND end_date < '$date'";
			
			$arr = array();
			$projectsel = $this->db->query("SELECT * FROM project WHERE admin_status = 1 AND delete_status = 0 $condition $create ORDER BY end_date DESC LIMIT 2")->result();
			$count = $this->db->query("SELECT count(project_id) as pcount FROM project WHERE admin_status = 1 AND delete_status = 0 $condition $create")->row()->pcount;
			if($projectsel)
			{	
				foreach ($projectsel as $key) {

					$resselect = $this->db->query("SELECT count(user_id) as upvotecount FROM project_upvote WHERE project_id = ".$key->project_id." AND vote_status=1 ")->row()->upvotecount;
					if(!empty($resselect))
					{
						$upvote_count = $resselect;
					}else
					{
						$upvote_count = 0;
					}
					$resselectd = $this->db->query("SELECT count(user_id) as downvotecount FROM project_upvote WHERE project_id = ".$key->project_id." AND vote_status=2 ")->row()->downvotecount;
					if(!empty($resselectd))
					{
						$downvote_count = $resselectd;
					}else
					{
						$downvote_count = 0;
					}

					$myresselect = $this->db->query("SELECT vote_status FROM project_upvote WHERE project_id = ".$key->project_id." AND user_id = '$userid'")->row();
					if($myresselect)
					{
						$my_vote = $myresselect->vote_status;
					}else
					{
						$my_vote = 0;
					}
					$commentcont = $this->db->query("SELECT count(comment_id) as comment_count FROM comment WHERE project_id = ".$key->project_id." AND type = 'project'")->row()->comment_count;
					if(!empty($commentcont))
					{
						$projectcomnt = $commentcont;
					}else
					{
						$projectcomnt = 0;
					}
					$key->comment_count = $projectcomnt;
					$project_img_arr = array();
					$project_img ='';
					$sele_img = $this->common_model->getData("project_image",array('project_id'=>$key->project_id));
					if($sele_img)
					{
						$project_img = base_url().'uploads/project_image/'.$sele_img[0]->image;
						foreach ($sele_img as $value) {
							$project_img_arr[] = base_url().'uploads/project_image/'.$value->image;
						}
					}
					if($key->user_id != 0 ){
					$hostname1 = $this->db->select('username,user_surname')->get_where("users",array('user_id'=>$key->user_id))->row();
					$hostname = $hostname1->username.' '.$hostname1->user_surname;
					}else{ 
					$hostname = $key->hosted_by;	
					}
					$key->hosted_by = $hostname;

					$shortmonth = date('M',strtotime($key->start_date));
					$shortdt = date('d',strtotime($key->start_date));
					$fulldtst = date('Y-m-d',strtotime($key->start_date));
					$fulldted = date('Y-m-d',strtotime($key->end_date));
					$key->st_dt = $fulldtst;
					$key->ed_dt = $fulldted;
					$key->shortm = $shortmonth;
					$key->shortd = $shortdt;
					$key->upvote = $upvote_count;
					$key->downvote = $downvote_count;
					$key->my_vote = $my_vote;
					$key->image = $project_img;
					$key->image2 = $project_img_arr;
					$arr[] = $key;
				}
				$final_output['status'] = "success";
				$final_output['message'] = "Successfull";
				$final_output['data'] = $arr;
				$final_output['project_count'] = $count;
			}else
			{
 				$final_output['status'] = 'failed';
 				$final_output['message'] = 'No project found';
			}	
		}else
		{
	    	$final_output['status'] = 'false';
	    	$final_output['message'] = 'Invalid Token';
		}
	}else
	{
	    $final_output['status'] = 'false';
	    $final_output['message'] = 'Unauthorised Access';
	}	
	header("content-type: application/json");
    echo json_encode($final_output);
}

public function Past_project_Pulltorefresh()
{
	$headers = apache_request_headers();
	if($headers['secret_key'] !='')
	{
		$check_key = $this->checktoken($headers['secret_key']);
		if($check_key['status'] == 'true')
		{
		    $userid = $check_key['data']->user_id;
			$create_at = $this->input->post('create_at');	///2017-02-15 01:00:00	
			//$type = $this->input->post('type');	
			$final_output = array();
			$create = '';
			$date = date('Y-m-d H:i:s');
			if($create_at !=0)
			{
				$create = "AND end_date > '$create_at'";	
			}
			$condition = "AND end_date < '$date'";
			
			$arr = array();
			$projectsel = $this->db->query("SELECT * FROM project WHERE admin_status = 1 AND delete_status = 0 $condition $create ORDER BY end_date DESC LIMIT 2")->result();
			$count = $this->db->query("SELECT count(project_id) as pcount FROM project WHERE admin_status = 1 AND delete_status = 0 $condition $create")->row()->pcount;
			if($projectsel)
			{	
				foreach ($projectsel as $key) {

					$resselect = $this->db->query("SELECT count(user_id) as upvotecount FROM project_upvote WHERE project_id = ".$key->project_id." AND vote_status=1 ")->row()->upvotecount;
					if(!empty($resselect))
					{
						$upvote_count = $resselect;
					}else
					{
						$upvote_count = 0;
					}
					$resselectd = $this->db->query("SELECT count(user_id) as downvotecount FROM project_upvote WHERE project_id = ".$key->project_id." AND vote_status=2 ")->row()->downvotecount;
					if(!empty($resselectd))
					{
						$downvote_count = $resselectd;
					}else
					{
						$downvote_count = 0;
					}

					$myresselect = $this->db->query("SELECT vote_status FROM project_upvote WHERE project_id = ".$key->project_id." AND user_id = '$userid'")->row();
					if($myresselect)
					{
						$my_vote = $myresselect->vote_status;
					}else
					{
						$my_vote = 0;
					}

					$commentcont = $this->db->query("SELECT count(comment_id) as comment_count FROM comment WHERE project_id = ".$key->project_id." AND type = 'project'")->row()->comment_count;
					if(!empty($commentcont))
					{
						$projectcomnt = $commentcont;
					}else
					{
						$projectcomnt = 0;
					}
					$key->comment_count = $projectcomnt;

					$project_img_arr = array();
					$project_img ='';
					$sele_img = $this->common_model->getData("project_image",array('project_id'=>$key->project_id));
					if($sele_img)
					{
						$project_img = base_url().'uploads/project_image/'.$sele_img[0]->image;
						foreach ($sele_img as $value) {
							$project_img_arr[] = base_url().'uploads/project_image/'.$value->image;
						}
					}
					if($key->user_id != 0 ){
					$hostname1 = $this->db->select('username,user_surname')->get_where("users",array('user_id'=>$key->user_id))->row();
					$hostname = $hostname1->username.' '.$hostname1->user_surname;
					}else{ 
					$hostname = $key->hosted_by;	
					}
					$key->hosted_by = $hostname;
					$shortmonth = date('M',strtotime($key->start_date));
					$shortdt = date('d',strtotime($key->start_date));
					$fulldtst = date('Y-m-d',strtotime($key->start_date));
					$fulldted = date('Y-m-d',strtotime($key->end_date));
					$key->st_dt = $fulldtst;
					$key->ed_dt = $fulldted;
					$key->shortm = $shortmonth;
					$key->shortd = $shortdt;
					$key->upvote = $upvote_count;
					$key->downvote = $downvote_count;
					$key->my_vote = $my_vote;
					$key->image = $project_img;
					$key->image2 = $project_img_arr;
					$arr[] = $key;
				}
				$final_output['status'] = "success";
				$final_output['message'] = "Successfull";
				$final_output['data'] = $arr;
				$final_output['project_count'] = $count;
			}else
			{
 				$final_output['status'] = 'failed';
 				$final_output['message'] = 'No project found';
			}	
		}else
		{
	    	$final_output['status'] = 'false';
	    	$final_output['message'] = 'Invalid Token';
		}
	}else
	{
	    $final_output['status'] = 'false';
	    $final_output['message'] = 'Unauthorised Access';
	}	
	header("content-type: application/json");
    echo json_encode($final_output);
}

public function Project_upvote_downvote()
{	
	$headers = apache_request_headers();
	if($headers['secret_key'] !='')
	{
		$check_key = $this->checktoken($headers['secret_key']);
		if($check_key['status'] == 'true')
		{
		    $user_id = $check_key['data']->user_id;
			$project_id = $this->input->post('project_id');
			$vote_key = $this->input->post('vote_key');
			$final_output = array();
			if(!empty($project_id) && $project_id != 0)
		   	{
		   		$select = $this->common_model->getDataField("project_id","project",array('project_id'=>$project_id,'delete_status' => 0));
		   		if($select)
		   		{
   					$seluservote = $this->db->query("SELECT vote_status FROM project_upvote WHERE project_id='$project_id' AND user_id='$user_id'")->row();
   					if(!empty($seluservote))
		   			{
	   					if($seluservote->vote_status!= $vote_key)
	   					{
   							$votedown = $this->common_model->updateData("project_upvote",array('vote_status'=>$vote_key,'create_at'=>militime),array('project_id'=>$project_id,'user_id'=>$user_id));
	   						if($votedown==TRUE)
	   						{
		   						$response = 'true';
		   			    	}else
				   	 		{
		   						$response = 'failed';
				   	  		}
		   				}else{
		   					$response = 'false';
				        }	
   					}else
   					{
   						$votedown = $this->common_model->common_insert("project_upvote",array("project_id"=>$project_id,"user_id"=>$user_id,"vote_status"=>$vote_key,'create_at'=>militime));
   						if($votedown)
   						{
		   					$response = 'true';
		   				}else
			   	 		{
		   					$response = 'failed';
			   	 		}
   					}
   					if($response != 'failed')
   					{
						$upvote = $this->db->query("SELECT count(user_id) as upvotecount FROM project_upvote WHERE project_id = ".$project_id." AND vote_status=1 ")->row()->upvotecount;
						if(!empty($upvote))
						{
							$upvote_count = $upvote;
						}else
						{
							$upvote_count = 0;
						}
						$downvote = $this->db->query("SELECT count(user_id) as downvotecount FROM project_upvote WHERE project_id = ".$project_id." AND vote_status=2 ")->row()->downvotecount;
						if(!empty($downvote))
						{
							$downvote_count = $downvote;
						}else
						{
							$downvote_count = 0;
						}

						if($response == 'true')
						{
							if($vote_key==2){ $msg = 'Successfully Downvoted'; }else{ $msg = 'Successfully Upvoted'; }
	   						$final_output['status'] = 'success';
			   	  			$final_output['message'] = $msg;
				    		$final_output['data'] = array( 'upvote' => $upvote_count,'downvote' => $downvote_count);

						}elseif($response == 'false')
						{
							if($vote_key==2){ $msg = 'Already Downvoted'; }else{ $msg = 'Already Upvoted'; }
		   					$final_output['status'] = 'failed';
			   	  			$final_output['message'] = $msg;
			   	  			$final_output['data'] = array( 'upvote' => $upvote_count,'downvote' => $downvote_count);
						}
   					}else
   					{
   						$final_output['status'] = 'failed';
			   	  		$final_output['message'] = 'Something went wrong! please try again later.';
   					}
   				}else
		   		{
		   			$final_output['status'] = 'failed';
	   	  			$final_output['message'] = 'Project not found';
		   		}
		   	}else
		   	{
				$final_output['status'] = 'false';
   	  	   		$final_output['message'] = 'Invalid Request parameter';
		   	}
		}else
		{
	    	$final_output['status'] = 'false';
	    	$final_output['message'] = 'Invalid Token';
		}
	}else
	{
	    $final_output['status'] = 'false';
	    $final_output['message'] = 'Unauthorised Access';
	}	
	header("content-type: application/json");
    echo json_encode($final_output);
}

public function Comment_on_project()
{	
	$headers = apache_request_headers();
	if($headers['secret_key'] !='')
	{
		$check_key = $this->checktoken($headers['secret_key']);
		if($check_key['status'] == 'true')
		{
		    $user_id = $check_key['data']->user_id;
			$project_id = $this->input->post('project_id');
			$comment = $this->input->post('comment');
			$final_output = array();
			if(!empty($comment))
		   	{
		   		$select = $this->db->select('user_id,title')->get_where("project",array('project_id'=>$project_id,'delete_status' => 0))->row();
		 		if($select)
		   		{
   					$result = $this->common_model->common_insert('comment',array('project_id'=>$project_id,'user_id'=>$user_id,'comment'=>$comment,'type'=>'project','create_at'=>date('Y-m-d H:i:s')));
					if($result)
					{
                       if($user_id!=$select->user_id && $select->user_id != 0 && $select->user_id != ''){

		   				$devicetoken = $this->db->select('device_token')->get_where("users",array('user_id'=>$select->user_id))->row();
						$message = array('title'=>'Comment on project','message'=>$check_key['data']->username.' '.$check_key['data']->user_surname.' has commented on your project'. $select->title,'type'=>6,'section_id'=>$project_id,'currenttime'=>militime);
						$this->common_model->sendPushNotification($devicetoken->device_token,$message);
						$insert_noti = $this->common_model->common_insert("notification",array('sender_id'=>$user_id,'receiver_id'=>$select->user_id,'section_id'=>$project_id,'title'=>'Comment on project','type'=>6,'msg'=>$check_key['data']->username.' '.$check_key['data']->user_surname.' has commented on your project '.$select->title,'create_at'=>militime,'update_at'=>militime),array());
					}	

						$final_output['status'] = 'success';
						$final_output['message'] = 'Successfully Commented';
					}else
					{
						$final_output['status'] = 'failed';
						$final_output['message'] = 'Something went wrong! please try again later.';
					}
	   	   		}else
		   		{
		   			$final_output['status'] = 'failed';
	   	  			$final_output['message'] = 'Project not found';
		   		}
		   	}else
		   	{
				$final_output['status'] = 'failed';
   	  			$final_output['message'] = 'No Request parameter';
		   	}
		}else
		{
	    	$final_output['status'] = 'false';
	    	$final_output['message'] = 'Invalid Token';
		}
	}else
	{
	    $final_output['status'] = 'false';
	    $final_output['message'] = 'Unauthorised Access';
	}	
	header("content-type: application/json");
    echo json_encode($final_output);
}

public function Project_Comment_List()
{	
	$headers = apache_request_headers();
	if($headers['secret_key'] !='')
	{
		$check_key = $this->checktoken($headers['secret_key']);
		if($check_key['status'] == 'true')
		{
		    $user_id = $check_key['data']->user_id;
			$project_id = $this->input->post('project_id');
			$final_output = array();
			$arr =array();
		   	$this->db->select('comment.comment,users.username,users.user_surname,users.image');
		   	$sel_coment = $this->db->join('comment','comment.user_id=users.user_id','inner')->get_where("users",array('comment.project_id'=>$project_id,'comment.type'=>'project'))->result();
	 		if(!empty($sel_coment))
	   		{
				foreach ($sel_coment as $key) {
					
					if($key->image!='')
					{
						$image = base_url().'uploads/user_image/'.$key->image;
					}else
					{
						$image = '';
					}
					$arr[] = array(
								'username' => $key->username.' '.$key->user_surname,
								'comment'=>$key->comment,
								'image'=>$image	
								);
				}
				$commentcont = $this->db->query("SELECT count(comment_id) as comment_count FROM comment WHERE project_id = ".$project_id." AND type = 'project'")->row()->comment_count;
				if(!empty($commentcont))
				{
					$projectcomnt = $commentcont;
				}else
				{
					$projectcomnt = 0;
				}
			}
	   		if(!empty($arr))
	   		{
   				$final_output['status'] = 'success';
				$final_output['message'] = 'Comment List';
				$final_output['data'] = $arr;
				$final_output['comment_count'] = $projectcomnt;
	   		}else
	   		{
   				$final_output['status'] = 'failed';
				$final_output['message'] = 'No comment found';
			}
		}else
		{
	    	$final_output['status'] = 'false';
	    	$final_output['message'] = 'Invalid Token';
		}
	}else
	{
	    $final_output['status'] = 'false';
	    $final_output['message'] = 'Unauthorised Access';
	}	
	header("content-type: application/json");
    echo json_encode($final_output);
}
// Category APi
public function Get_category_list()
{	
	$headers = apache_request_headers();
	if($headers['secret_key'] !='')
	{
		$check_key = $this->checktoken($headers['secret_key']);
		if($check_key['status'] == 'true')
		{
		    $user_id = $check_key['data']->user_id;
			$type = $this->input->post('type');
			$final_output = array();
			$arr =array();
		   	$sel_category = $this->common_model->getData('category',array('admin_status'=>1),'category_name','ASC');
	 		if(!empty($sel_category))
	   		{
				foreach ($sel_category as $key) {
					
					if($key->image!='')
					{
						$image = base_url().'uploads/category_image/'.$key->image;
					}else
					{
						$image = '';
					}

					$group_task_count = $this->db->query("SELECT count(".$type."_id) as group_task_count FROM `$type` WHERE category_id = ".$key->category_id." AND admin_status = 1")->row()->group_task_count;
					if(!empty($group_task_count))
					{
						$g_t_count = $group_task_count;
					}else
					{
						$g_t_count = 0;
					}
					$arr[] = array(
							'category_id'=>$key->category_id,
							'category_name' => $key->category_name,
							'image'=>$image,
							'group_task_count'=>$g_t_count
							);
				}
			}
	   		if(!empty($arr))
	   		{
   				$final_output['status'] = 'success';
				$final_output['message'] = 'Category List';
				$final_output['data'] = $arr;
			}else
	   		{
   				$final_output['status'] = 'failed';
				$final_output['message'] = 'Category not found';
			}
		}else
		{
	    	$final_output['status'] = 'false';
	    	$final_output['message'] = 'Invalid Token';
		}
	}else
	{
	    $final_output['status'] = 'false';
	    $final_output['message'] = 'Unauthorised Access';
	}	
	header("content-type: application/json");
    echo json_encode($final_output);
}
//GROUP & TASK API = Get group and task, Join group and task 
public function Get_group_and_task_bycategory()
{	
	$headers = apache_request_headers();
	if($headers['secret_key'] !='')
	{
		$check_key = $this->checktoken($headers['secret_key']);
		if($check_key['status'] == 'true')
		{
		    $user_id = $check_key['data']->user_id;
			$category_id = $this->input->post('category_id');
			$type = $this->input->post('type');
			$create_at = $this->input->post('create_at');
			$sort_key = $this->input->post('sort_key');
			$sort_key_new = '';
			if($type=='task')
			{
				$sort_key_new = "AND task_type = '$sort_key'";
			}
			$create = '';
			if($create_at!=0)
			{
				$create = "AND create_at < '$create_at'";
			}
			$final_output = array();
			$arr =array();
		   	$group = $this->db->query("SELECT * FROM `".$type."` WHERE category_id = '$category_id' AND admin_status = 1 AND delete_status = 0 $create $sort_key_new ORDER BY create_at DESC LIMIT 2")->result();
	 		if(!empty($group))
	   		{
				$groupcount = $this->db->query("SELECT count(".$type."_id) as group_task_count FROM `$type` WHERE category_id = '$category_id' AND admin_status = 1 AND delete_status = 0")->row()->group_task_count;
				if(!empty($groupcount))
				{
					$g_t_count = $groupcount;
				}else
				{
					$g_t_count = 0;
				}
				foreach ($group as $key) {
					
					if($key->image!='')
					{
						$image = base_url().'uploads/'.$type.'_image/'.$key->image;
					}else
					{
						$image = '';
					}
					$id = $type.'_id';
					$membercount = $this->db->query("SELECT count(user_id) as group_member_count FROM join_user WHERE section_id = ".$key->$id." AND type = '$type' AND admin_status = 1")->row()->group_member_count;
					if(!empty($membercount))
					{
						$member_count = $membercount;
					}else
					{
						$member_count = 0;
					}
					$my_join_status = $this->db->query("SELECT admin_status as my_status FROM join_user WHERE section_id = ".$key->$id." AND type = '$type' AND user_id = '$user_id'")->row();
					if(!empty($my_join_status))
					{
						$my_status = $my_join_status->my_status;
					}else
					{
						$my_status = 2;
					}
					if($type=='task')
					{
						$organisby = $key->organised_by;
						$start_date = date('d-m-Y',strtotime($key->start_date));
						$end_date = date('d-m-Y',strtotime($key->end_date));
					}else
					{
						$organisby = '';
						$start_date = '';
						$end_date = '';
					}
					$id = $type.'_id';
					$arr[] = array(
							'id'=>$key->$id,
							'title' => $key->title,
							'description' => $key->description,
							'image'=>$image,
							'create_at'=>$key->create_at,
							'group_task_count'=>(int)$g_t_count,
							'group_member_count'=>(int)$member_count,
							'my_join_status'=>(int)$my_status,
							'organised_by'=>$organisby,
							'start_date'=>$start_date,
							'end_date'=>$end_date
							);
				}
			}
	   		if(!empty($arr))
	   		{
   				$final_output['status'] = 'success';
				$final_output['message'] = $type.' List';
				$final_output['data'] = $arr;
			}else
	   		{
   				$final_output['status'] = 'failed';
				$final_output['message'] = $type.' not found';
			}
		}else
		{
	    	$final_output['status'] = 'false';
	    	$final_output['message'] = 'Invalid Token';
		}
	}else
	{
	    $final_output['status'] = 'false';
	    $final_output['message'] = 'Unauthorised Access';
	}	
	header("content-type: application/json");
    echo json_encode($final_output);
}

public function Get_group_and_task_bycategory_pulltorefresh()
{	
	$headers = apache_request_headers();
	if($headers['secret_key'] !='')
	{
		$check_key = $this->checktoken($headers['secret_key']);
		if($check_key['status'] == 'true')
		{
		    $user_id = $check_key['data']->user_id;
			$category_id = $this->input->post('category_id');
			$type = $this->input->post('type');
			$create_at = $this->input->post('create_at');
			$sort_key = $this->input->post('sort_key');
			$sort_key_new = '';
			if($type=='task')
			{
				$sort_key_new = "AND task_type = '$sort_key'";
			}
			$create = '';
			if($create_at!=0)
			{
				$create = "AND create_at > '$create_at'";
			}
			$final_output = array();
			$arr =array();
		   	$group = $this->db->query("SELECT * FROM `".$type."` WHERE category_id = '$category_id' AND admin_status = 1 AND delete_status = 0 $create $sort_key_new ORDER BY create_at DESC LIMIT 2")->result();
	 		if(!empty($group))
	   		{
				$groupcount = $this->db->query("SELECT count(".$type."_id) as group_task_count FROM `$type` WHERE category_id = '$category_id' AND admin_status = 1 AND delete_status = 0")->row()->group_task_count;
				if(!empty($groupcount))
				{
					$g_t_count = $groupcount;
				}else
				{
					$g_t_count = 0;
				}
				foreach ($group as $key) {
					
					if($key->image!='')
					{
						$image = base_url().'uploads/'.$type.'_image/'.$key->image;
					}else
					{
						$image = '';
					}
					$id = $type.'_id';
					$membercount = $this->db->query("SELECT count(user_id) as group_member_count FROM join_user WHERE section_id = ".$key->$id." AND type = '$type' AND admin_status = 1")->row()->group_member_count;
					if(!empty($membercount))
					{
						$member_count = $membercount;
					}else
					{
						$member_count = 0;
					}
					$my_join_status = $this->db->query("SELECT admin_status as my_status FROM join_user WHERE section_id = ".$key->$id." AND type = '$type' AND user_id = '$user_id'")->row();
					if(!empty($my_join_status))
					{
						$my_status = $my_join_status->my_status;
					}else
					{
						$my_status = 2;
					}
					if($type=='task')
					{
						$organisby = $key->organised_by;
						$start_date = date('d-m-Y',strtotime($key->start_date));
						$end_date = date('d-m-Y',strtotime($key->end_date));
					}else
					{
						$organisby = '';
						$start_date = '';
						$end_date = '';
					}
					$id = $type.'_id';
					$arr[] = array(
							'id'=>$key->$id,
							'title' => $key->title,
							'description' => $key->description,
							'image'=>$image,
							'create_at'=>$key->create_at,
							'group_task_count'=>(int)$g_t_count,
							'group_member_count'=>(int)$member_count,
							'my_join_status'=>(int)$my_status,
							'organised_by'=>$organisby,
							'start_date'=>$start_date,
							'end_date'=>$end_date
							);
				}
			}
	   		if(!empty($arr))
	   		{
   				$final_output['status'] = 'success';
				$final_output['message'] = $type.' List';
				$final_output['data'] = $arr;
			}else
	   		{
   				$final_output['status'] = 'failed';
				$final_output['message'] = $type.' not found';
			}
		}else
		{
	    	$final_output['status'] = 'false';
	    	$final_output['message'] = 'Invalid Token';
		}
	}else
	{
	    $final_output['status'] = 'false';
	    $final_output['message'] = 'Unauthorised Access';
	}	
	header("content-type: application/json");
    echo json_encode($final_output);
}

public function Join()
{	
	$headers = apache_request_headers();
	if($headers['secret_key'] !='')
	{
		$check_key = $this->checktoken($headers['secret_key']);
		if($check_key['status'] == 'true')
		{
		    $user_id = $check_key['data']->user_id;
			$type_id = $this->input->post('type_id');
			$join_flag = $this->input->post('join_flag');  //1 join, 2 remove
			$type = $this->input->post('type');
			
			$final_output = array();
			$arr = array();
		   	$selected = $this->db->query("SELECT * FROM `".$type."`	WHERE ".$type.'_id'."  = '$type_id'")->row();
	 		if(!empty($selected))
	   		{
				$joinuser = $this->common_model->common_getRow('join_user',array('section_id'=>$type_id,'type'=>$type,'user_id'=>$user_id));
				if(!empty($joinuser))
				{
					if($join_flag == 1)
					{
						$response = 'false';
					}else
					{
						$delete = $this->common_model->deleteData('join_user',array('section_id'=>$type_id,'type'=>$type,'user_id'=>$user_id));
						if(!empty($delete))
						{
							$response = 'success';
						}else
						{
							$response = 'failed';
						}
					}
				}else
				{
					if($join_flag == 2)
					{
						$response = 'false';
					}else
					{
						$insertt = $this->common_model->common_insert('join_user',array('section_id'=>$type_id,'type'=>$type,'user_id'=>$user_id,'join_date'=>date('Y-m-d H:i:s')));
						if(!empty($insertt))
						{
							$response = 'success';
						}else
						{
							$response = 'failed';
						}
					}
				}
		   		if($response != 'failed')
		   		{
	   				$my_join_status = $this->db->query("SELECT admin_status as my_status FROM join_user WHERE section_id = ".$type_id." AND type = '$type' AND user_id = '$user_id'")->row();
					if(!empty($my_join_status))
					{
						$my_status = $my_join_status->my_status;
					}else
					{
						$my_status = 2;
					}
					$membercount = $this->db->query("SELECT count(user_id) as group_member_count FROM join_user WHERE section_id = ".$type_id." AND type = '$type' AND admin_status = 1")->row()->group_member_count;
					if(!empty($membercount))
					{
						$member_count = $membercount;
					}else
					{
						$member_count = 0;
					}

	   				if($response =='success')
	   				{
		   				if($join_flag==2){ $msg ='Successfully Exited '.$type; }else{ $msg ='Successfully Joined '.$type;  
							if($type =='group'){
								$insert_noti = $this->common_model->common_insert("notification",array('sender_id'=>$user_id,'section_id'=>$type_id,'receiver_id'=>0,'title'=>'Group Joined by user','type'=>18,'msg'=>$selected->title.' joined By '.$check_key['data']->username.' '.$check_key['data']->user_surname,'create_at'=>militime,'update_at'=>militime),array());
							}else
							{
								$insert_noti = $this->common_model->common_insert("notification",array('sender_id'=>$user_id,'section_id'=>$type_id,'receiver_id'=>0,'title'=>'Task Joined by user','type'=>19,'msg'=>$selected->title.' joined By '.$check_key['data']->username.' '.$check_key['data']->user_surname,'create_at'=>militime,'update_at'=>militime),array());
							}
		   				}
		   				$final_output['status'] = 'success';
						$final_output['message'] = $msg;
						$final_output['data'] = array('group_member_count'=>$member_count,'my_join_status'=>(int)$my_status);
					}else
					{
						if($join_flag==2){ $msg ='Already Exited '.$type; }else{ $msg ='Already Joined '.$type; }
		   				$final_output['status'] = 'failed';
						$final_output['message'] = $msg;
						$final_output['data'] = array('group_member_count'=>$member_count,'my_join_status'=>(int)$my_status);
					}
				}else
		   		{
	   				$final_output['status'] = 'failed';
					$final_output['message'] = 'Something went wrong! please try again later';
				}
			}else
	   		{
   				$final_output['status'] = 'failed';
				$final_output['message'] = $type.' not found';
			}
		}else
		{
	    	$final_output['status'] = 'false';
	    	$final_output['message'] = 'Invalid Token';
		}
	}else
	{
	    $final_output['status'] = 'false';
	    $final_output['message'] = 'Unauthorised Access';
	}	
	header("content-type: application/json");
    echo json_encode($final_output);
}

public function post()
{
	$headers = apache_request_headers();
	if($headers['secret_key'] !='')
	{
		$check_key = $this->checktoken($headers['secret_key']);
		if($check_key['status'] == 'true')
		{
		    $userid = $check_key['data']->user_id;
			//$title = $this->input->post('title');
			$message = $this->input->post('message');
			$type_id = $this->input->post('type_id');
			$type = $this->input->post('type');
			$final_output = array();

		   	$selected = $this->db->query("SELECT * FROM `".$type."`	WHERE ".$type.'_id'."  = '$type_id'")->row();
			if(!empty($selected))
			{
		   		$selectedjoin = $this->db->query("SELECT * FROM join_user WHERE section_id = '$type_id' AND user_id = '$userid' AND type = '$type'")->row();
		   		if(!empty($selectedjoin))
		   		{
					if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != '')
		    		{
		    			$image = md5(militime.$_FILES['image']['name']).".jpg";
		    			move_uploaded_file($_FILES['image']['tmp_name'],'uploads/post_image/'.$image);
		    			$images = base_url().'uploads/'.$type.'_image/'.$image;
		    		}else
		    		{
		    			$images = ''; $image='';
		    		}
		    		//$start_dt_milisecond = 1000 * strtotime($start_date.$start_time);
			    	$arr = array(
			    				'user_id'=>$userid,
			    				'message'=>$message,
			    				'image'=>$image,
			    				'section_id'=>$type_id,
			    				'type'=>$type,
			    				'create_at'=>date('Y-m-d H:i:s'),
			    				'update_at'=>date('Y-m-d H:i:s')
			    				);
			    	$postinsert = $this->common_model->common_insert("post",$arr,array());
					if($postinsert)
					{	
						$final_output['status'] = "success";
						$final_output['message'] = "Successfully Added.";
						$arr['id'] = $postinsert;
						$arr['image']=$images;
						
						$final_output['data'] = $arr;
					}else
					{
		 				$final_output['status'] = 'failed';
		 				$final_output['message'] = 'Something went wrong! Please try again later.';
					}	
		   		}else
		   		{
		   			$final_output['status'] = 'failed';
	    			$final_output['message'] = 'please join '.$type. 'first';
		   		}
			}else
			{
				$final_output['status'] = 'failed';
	    		$final_output['message'] = $type.' not found';
			}
		}else
		{
	    	$final_output['status'] = 'false';
	    	$final_output['message'] = 'Invalid Token';
		}
	}else
	{
	    $final_output['status'] = 'false';
	    $final_output['message'] = 'Unauthorised Access';
	}	
	header("content-type: application/json");
    echo json_encode($final_output);
}
	
public function Get_post()
{	
	$headers = apache_request_headers();
	if($headers['secret_key'] !='')
	{
		$check_key = $this->checktoken($headers['secret_key']);
		if($check_key['status'] == 'true')
		{
		    $user_id = $check_key['data']->user_id;
			$group_id = $this->input->post('group_id');
			$type = $this->input->post('type');
			$create_at = $this->input->post('create_at');
			$final_output = array();
			$arr =array();
			$create = '';
			if($create_at != 0)
			{
				$create = "AND create_at < '$create_at'";
			}
		   	$getpost = $this->db->query("SELECT post_id,message,image,create_at,user_id FROM `post` WHERE section_id = '$group_id' AND type='$type' $create ORDER BY create_at DESC LIMIT 2")->result();
		   	if(!empty($getpost))
	   		{
				foreach ($getpost as $key) {
					
					if($key->image!='')
					{
						$image = base_url().'uploads/post_image/'.$key->image;
					}else
					{
						$image = '';
					}
					$userimage = '';	$username = '';
					$user = $this->db->select('username,user_surname,image')->get_where('users',array('user_id'=>$key->user_id))->row();
					if($user)
					{
						if($user->image!='')
						{
							$userimage = base_url().'uploads/user_image/'.$user->image;
						}
						$username = $user->username.' '.$user->user_surname;
					}
					$like_count = 0;
					$likecount = $this->db->query("SELECT count(like_id) as post_like_count FROM group_like WHERE post_id = ".$key->post_id."")->row()->post_like_count;
					if(!empty($likecount))
					{
						$like_count = $likecount;
					}
					$comment_count = 0;
					$comment_counts = $this->db->query("SELECT count(comment_id) as comment_counts FROM group_post_comment WHERE post_id = ".$key->post_id."")->row()->comment_counts;
					if(!empty($comment_counts))
					{
						$comment_count = $comment_counts;
					}
					$mylikestatus = $this->db->query("SELECT like_id as myresponse FROM group_like WHERE post_id = ".$key->post_id." AND user_id = ".$user_id."")->row();
					if(!empty($mylikestatus))
					{
						$my_response = 1;
					}else
					{
						$my_response = 0;
					}

					$arr[] = array(
								'post_id' => $key->post_id,
								'message'=>$key->message,
								'image'=>$image,
								'user_name'=>$username,
								'user_image'=>$userimage,
								'comment_count'=>(int)$comment_count,
								'like_count'=>(int)$like_count,
								'my_response'=>(int)$my_response,
								'create_at'=>$key->create_at	
								);
				}
			} 
	   		if(!empty($arr))
	   		{
   				$final_output['status'] = 'success';
				$final_output['message'] = 'Post List';
				$final_output['data'] = $arr;
	  		}else
	   		{
   				$final_output['status'] = 'failed';
				$final_output['message'] = 'No post found';
			}
		}else
		{
	    	$final_output['status'] = 'false';
	    	$final_output['message'] = 'Invalid Token';
		}
	}else
	{
	    $final_output['status'] = 'false';
	    $final_output['message'] = 'Unauthorised Access';
	}	
	header("content-type: application/json");
    echo json_encode($final_output);
}

public function Get_post_pulltorefresh()
{	
	$headers = apache_request_headers();
	if($headers['secret_key'] !='')
	{
		$check_key = $this->checktoken($headers['secret_key']);
		if($check_key['status'] == 'true')
		{
		    $user_id = $check_key['data']->user_id;
			$group_id = $this->input->post('group_id');
			$create_at = $this->input->post('create_at');
			$final_output = array();
			$arr =array();
			$create = '';
			if($create_at != 0)
			{
				$create = "AND create_at > '$create_at'";
			}
		   	$getpost = $this->db->query("SELECT post_id,message,image,create_at,user_id FROM `post` WHERE section_id = '$group_id' $create ORDER BY create_at DESC LIMIT 2")->result();
		   	if(!empty($getpost))
	   		{
				foreach ($getpost as $key) {
					
					if($key->image!='')
					{
						$image = base_url().'uploads/post_image/'.$key->image;
					}else
					{
						$image = '';
					}
					$user = $this->db->select('username,user_surname,image')->get_where('users',array('user_id'=>$key->user_id))->row();
					if($user->image!='')
					{
						$userimage = base_url().'uploads/user_image/'.$user->image;
					}else
					{
						$userimage = '';
					}
					$like_count = 0;
					$likecount = $this->db->query("SELECT count(like_id) as post_like_count FROM group_like WHERE post_id = ".$key->post_id."")->row()->post_like_count;
					if(!empty($likecount))
					{
						$like_count = $likecount;
					}
					$comment_count = 0;
					$comment_counts = $this->db->query("SELECT count(comment_id) as comment_counts FROM group_post_comment WHERE post_id = ".$key->post_id."")->row()->comment_counts;
					if(!empty($comment_counts))
					{
						$comment_count = $comment_counts;
					}
					$mylikestatus = $this->db->query("SELECT like_id as myresponse FROM group_like WHERE post_id = ".$key->post_id." AND user_id = ".$user_id."")->row();
					if(!empty($mylikestatus))
					{
						$my_response = 1;
					}else
					{
						$my_response = 0;
					}

					$arr[] = array(
								'post_id' => $key->post_id,
								'message'=>$key->message,
								'image'=>$image,
								'user_name'=>$user->username.' '.$user->user_surname,
								'user_image'=>$userimage,
								'comment_count'=>(int)$comment_count,
								'like_count'=>(int)$like_count,
								'my_response'=>$my_response,
								'create_at'=>$key->create_at	
								);

				}
			}
	   		if(!empty($arr))
	   		{
   				$final_output['status'] = 'success';
				$final_output['message'] = 'Post List';
				$final_output['data'] = $arr;
	  		}else
	   		{
   				$final_output['status'] = 'failed';
				$final_output['message'] = 'No post found';
			}
		}else
		{
	    	$final_output['status'] = 'false';
	    	$final_output['message'] = 'Invalid Token';
		}
	}else
	{
	    $final_output['status'] = 'false';
	    $final_output['message'] = 'Unauthorised Access';
	}	
	header("content-type: application/json");
    echo json_encode($final_output);
}

public function Like_unlike_group_post()
{	
	$headers = apache_request_headers();
	if($headers['secret_key'] !='')
	{
		$check_key = $this->checktoken($headers['secret_key']);
		if($check_key['status'] == 'true')
		{
		    $user_id = $check_key['data']->user_id;
			$post_id = $this->input->post('post_id');
			$like_status = $this->input->post('like_status');
			$final_output = array();
			if(!empty($post_id) && $post_id != 0)
		   	{
		   		$select = $this->common_model->getDataField("post_id","post",array('post_id'=>$post_id));
		   		if($select)
		   		{
   					$seluservote = $this->db->query("SELECT like_id FROM group_like WHERE post_id ='$post_id' AND user_id='$user_id'")->row();
   					if(!empty($seluservote))
		   			{
	   					if($like_status!= 1)
	   					{
   							$unlike = $this->common_model->deleteData("group_like",array('post_id'=>$post_id,'user_id'=>$user_id));
	   						if($unlike==TRUE)
	   						{
		   						$response = 'true';
					    	}else
				   	 		{
		   						$response = 'failed';
					  		}
		   				}else{
		   					$response = 'false';
				        }	
   					}else
   					{
   						if($like_status== 1)
	   					{
   							$likes = $this->common_model->common_insert("group_like",array('post_id'=>$post_id,'user_id'=>$user_id,'like_date'=>date('Y-m-d H:i:s')));
	   						if($likes==TRUE)
	   						{
		   						$response = 'true';
		   					}else
				   	 		{
		   						$response = 'failed';
					  		}
		   				}else{
		   					$response = 'false';
		   		        }	
   					}
   					if($response != 'failed')
   					{
   						$like_count = 0;
   						$likecount = $this->db->query("SELECT count(like_id) as group_like_count FROM group_like WHERE post_id = '$post_id'")->row()->group_like_count;
						if(!empty($likecount))
						{
							$like_count = $likecount;
						}
   						if($response=='true')
   						{
   							if($like_status == 1){ $msg = 'Successfully Liked'; }else{ $msg = 'Successfully Unliked'; }
   							$final_output['status'] = 'success';
				   	  		$final_output['message'] = $msg;
				   	  		$final_output['data'] = array('like_count'=>$like_count);
   						}else
   						{
   							if($like_status == 1){ $msg = 'Already Liked'; }else{ $msg = 'Already Unliked'; }
   							$final_output['status'] = 'failed';
				   	  		$final_output['message'] = $msg;
				   	  		$final_output['data'] = array('like_count'=>$like_count);
   						}
   					}else
   					{
		   	 			$final_output['status'] = 'failed';
		   	  			$final_output['message'] = 'Something went wrong! please try again later.';
   					}
	   	   		}else
		   		{
		   			$final_output['status'] = 'failed';
	   	  			$final_output['message'] = 'Group not found';
		   		}
		   	}else
		   	{
				$final_output['status'] = 'failed';
   	  			$final_output['message'] = 'Invalid Request parameter';
	       	}
		}else
		{
	    	$final_output['status'] = 'false';
	    	$final_output['message'] = 'Invalid Token';
		}
	}else
	{
	    $final_output['status'] = 'false';
	    $final_output['message'] = 'Unauthorised Access';
	}	
	header("content-type: application/json");
    echo json_encode($final_output);
}

public function Comment_on_group_post()
{	
	$headers = apache_request_headers();
	if($headers['secret_key'] !='')
	{
		$check_key = $this->checktoken($headers['secret_key']);
		if($check_key['status'] == 'true')
		{
		    $user_id = $check_key['data']->user_id;
			$post_id = $this->input->post('post_id');
			$comment = $this->input->post('comment');
			$final_output = array();
			if(!empty($comment))
		   	{
		   		$select = $this->db->select('user_id,post_id,message')->get_where("post",array('post_id'=>$post_id,'type'=>'group'))->row();
		 		if($select)
		   		{
   					$result = $this->common_model->common_insert('group_post_comment',array('post_id'=>$post_id,'user_id'=>$user_id,'comment'=>$comment,'comment_date'=>date('Y-m-d H:i:s')));
					if($result)
					{
		   				if($select->user_id != $user_id && $select->user_id != 0 && $select->user_id != ''){
		   				$devicetoken = $this->db->select('device_token')->get_where("users",array('user_id'=>$select->user_id))->row();
						$message = array('title'=>'Comment on group post','message'=>$check_key['data']->username.' '.$check_key['data']->user_surname.' has commented on your post'. $select->message,'type'=>24,'section_id'=>$post_id,'currenttime'=>militime);
						$this->common_model->sendPushNotification($devicetoken->device_token,$message);
						$insert_noti = $this->common_model->common_insert("notification",array('sender_id'=>$user_id,'receiver_id'=>$select->user_id,'section_id'=>$post_id,'title'=>'Comment on post','type'=>24,'msg'=>$check_key['data']->username.' '.$check_key['data']->user_surname.' has commented on your post '.$select->message,'create_at'=>militime,'update_at'=>militime),array());
						}
						$final_output['status'] = 'success';
						$final_output['message'] = 'Successfully Commented';
					}else
					{
						$final_output['status'] = 'failed';
						$final_output['message'] = 'Something went wrong! please try again later.';
					}
	   	   		}else
		   		{
		   			$final_output['status'] = 'failed';
	   	  			$final_output['message'] = 'Post not found';
		   		}
		   	}else
		   	{
				$final_output['status'] = 'failed';
   	  			$final_output['message'] = 'No Request parameter';
		   	}
		}else
		{
	    	$final_output['status'] = 'false';
	    	$final_output['message'] = 'Invalid Token';
		}
	}else
	{
	    $final_output['status'] = 'false';
	    $final_output['message'] = 'Unauthorised Access';
	}	
	header("content-type: application/json");
    echo json_encode($final_output);
}

public function Comment_on_task_post()
{	
	$headers = apache_request_headers();
	if($headers['secret_key'] !='')
	{
		$check_key = $this->checktoken($headers['secret_key']);
		if($check_key['status'] == 'true')
		{
		    $user_id = $check_key['data']->user_id;
			$post_id = $this->input->post('post_id');
			$comment = $this->input->post('comment');
			$final_output = array();
			if(!empty($comment))
		   	{
		   		$select = $this->db->select('post_id')->get_where("post",array('post_id'=>$post_id,'type'=>'task'))->row();
		 		if($select)
		   		{
   					$result = $this->common_model->common_insert('task_post_comment',array('post_id'=>$post_id,'user_id'=>$user_id,'comment'=>$comment,'comment_date'=>date('Y-m-d H:i:s')));
					if($result)
					{
		   				/*$devicetoken = $this->db->select('device_token')->get_where("users",array('user_id'=>$select->user_id))->row();
						$message = array('title'=>'Comment on task','message'=>$check_key['data']->username.' '.$check_key['data']->user_surname.' has commented on task'. $select->message,'type'=>25,'currenttime'=>militime);
						$this->common_model->sendPushNotification($devicetoken->device_token,$message);
						$insert_noti = $this->common_model->common_insert("notification",array('sender_id'=>$user_id,'receiver_id'=>$select->user_id,'title'=>'Comment on task','type'=>25,'msg'=>$check_key['data']->username.' '.$check_key['data']->user_surname.' has commented on task '.$select->message,'create_at'=>militime,'update_at'=>militime),array());*/
						$final_output['status'] = 'success';
						$final_output['message'] = 'Successfully Commented';
					}else
					{
						$final_output['status'] = 'failed';
						$final_output['message'] = 'Something went wrong! please try again later.';
					}
	   	   		}else
		   		{
		   			$final_output['status'] = 'failed';
	   	  			$final_output['message'] = 'Post not found';
		   		}
		   	}else
		   	{
				$final_output['status'] = 'failed';
   	  			$final_output['message'] = 'No Request parameter';
		   	}
		}else
		{
	    	$final_output['status'] = 'false';
	    	$final_output['message'] = 'Invalid Token';
		}
	}else
	{
	    $final_output['status'] = 'false';
	    $final_output['message'] = 'Unauthorised Access';
	}	
	header("content-type: application/json");
    echo json_encode($final_output);
}

public function Post_Comment_List()
{	
	$headers = apache_request_headers();
	if($headers['secret_key'] !='')
	{
		$check_key = $this->checktoken($headers['secret_key']);
		if($check_key['status'] == 'true')
		{
		    $user_id = $check_key['data']->user_id;
			$post_id = $this->input->post('post_id');
			$final_output = array();
			$arr =array();
			$projectcomnt = 0;
		   	$this->db->select('group_post_comment.comment,users.username,users.user_surname,users.image');
		   	$sel_coment = $this->db->join('group_post_comment','group_post_comment.user_id=users.user_id','inner')->get_where("users",array('group_post_comment.post_id'=>$post_id))->result();
	 		if(!empty($sel_coment))
	   		{
				foreach ($sel_coment as $key) {
					
					if($key->image!='')
					{
						$image = base_url().'uploads/user_image/'.$key->image;
					}else
					{
						$image = '';
					}

					$arr[] = array(
								'username' => $key->username.' '.$key->user_surname,
								'comment'=>$key->comment,	
								'image'=>$image	
								);
				}
				$commentcont = $this->db->query("SELECT count(comment_id) as comment_count FROM group_post_comment WHERE post_id = ".$post_id." ")->row()->comment_count;
				if(!empty($commentcont))
				{
					$projectcomnt = $commentcont;
				}
			}
	   		if(!empty($arr))
	   		{
   				$final_output['status'] = 'success';
				$final_output['message'] = 'Comment List';
				$final_output['data'] = $arr;
				$final_output['comment_count'] = $projectcomnt;
	   		}else
	   		{
   				$final_output['status'] = 'failed';
				$final_output['message'] = 'No comment found';
			}
		}else
		{
	    	$final_output['status'] = 'false';
	    	$final_output['message'] = 'Invalid Token';
		}
	}else
	{
	    $final_output['status'] = 'false';
	    $final_output['message'] = 'Unauthorised Access';
	}	
	header("content-type: application/json");
    echo json_encode($final_output);
}

public function Feedback()
{	
	$headers = apache_request_headers();
	if($headers['secret_key'] !='')
	{
		$check_key = $this->checktoken($headers['secret_key']);
		if($check_key['status'] == 'true')
		{
		    $user_id = $check_key['data']->user_id;
			$category_id = $this->input->post('category_id');
			$user_feedback = $this->input->post('user_feedback');
			$final_output = array();
			if(!empty($user_feedback))
		   	{
				$result = $this->common_model->common_insert('feedback',array('category_id'=>$category_id,'user_id'=>$user_id,'user_feedback'=>$user_feedback,'	create_at'=>date('Y-m-d H:i:s')));
				if($result)
				{
	   				$final_output['status'] = 'success';
					$final_output['message'] = 'Feedback submited';
				}else
				{
					$final_output['status'] = 'failed';
					$final_output['message'] = 'Something went wrong! please try again later.';
				}
	   	   	}else
		   	{
				$final_output['status'] = 'failed';
   	  			$final_output['message'] = 'No Request parameter';
		   	}
		}else
		{
	    	$final_output['status'] = 'false';
	    	$final_output['message'] = 'Invalid Token';
		}
	}else
	{
	    $final_output['status'] = 'false';
	    $final_output['message'] = 'Unauthorised Access';
	}	
	header("content-type: application/json");
    echo json_encode($final_output);
}

public function Privacy_Policy()
{	
	$headers = apache_request_headers();
	if($headers['secret_key'] !='')
	{
		$check_key = $this->checktoken($headers['secret_key']);
		if($check_key['status'] == 'true')
		{
		    $user_id = $check_key['data']->user_id;
			$id = $this->input->post('id');
			$final_output = array();
			$arr =array();
			$projectcomnt = 0;
			$image = '';
		   	$content = $this->db->get_where("content",array('id'=>$id))->row();
	 		if(!empty($content))
	   		{
					if($content->image)
					{
						$image = base_url().'uploads/banner_image/'.$content->image;
					}
					$arr = array(
								'title' => $content->title,
								'description'=>$content->description,
								'image'=>$image
								);
			}
	   		if(!empty($arr))
	   		{
   				$final_output['status'] = 'success';
				$final_output['message'] = 'Successfully';
				$final_output['data'] = $arr;
	   		}else
	   		{
   				$final_output['status'] = 'failed';
				$final_output['message'] = 'Content not found';
			}
		}else
		{
	    	$final_output['status'] = 'false';
	    	$final_output['message'] = 'Invalid Token';
		}
	}else
	{
	    $final_output['status'] = 'false';
	    $final_output['message'] = 'Unauthorised Access';
	}	
	header("content-type: application/json");
    echo json_encode($final_output);
}

public function AppVersion()
{
	$app_version = $this->input->get('app_version');
	$type = $this->input->get('type');
	$final_output = '';
	if($app_version==2)
	{
		$version = 2;
	}else
	{
		if($type=='android')
		{
	    	$version = $this->common_model->common_getRow("app_version",array('android_version <='=>$app_version));
		}else
		{
	    	$version = $this->common_model->common_getRow("app_version",array('ios_version'=>$app_version));
		}
		
	}
	if(!empty($version))
    {
            $final_output['status']='success';
            $final_output['message']='Successfull';
            unset($final_output['data']);       
	}else
    {
    	
    	    $final_output['status']='failed';
            $final_output['message']='Plz Update Old Version';
            unset($final_output['data']);       
    }   
	header("content-type: application/json");
    echo json_encode($final_output);	
}
//End app version

public function GetNotificationList() 
{
	$headers = apache_request_headers();
	if(!empty($headers['secret_key']))
	{
		$check = $this->checktoken($headers['secret_key']);
		if($check['status']=="true")
		{
			$create_at=$this->input->post('create_at');
			
			if($create_at=="0")
			{
				$create_at1= '';
			}else
			{
				$create_at1= "AND (create_at < '$create_at')";
			}
			$final_output =array();
			$user_id=$check['data']->user_id;
			$quer = $this->db->query("SELECT * FROM notification WHERE (FIND_IN_SET($user_id,receiver_id) OR receiver_id = '$user_id') AND `create_at` <= DATE_SUB(CURDATE(), INTERVAL 1 MONTH) ".$create_at1." ORDER BY notify_id DESC LIMIT 10");
			//$quer = $this->db->query("SELECT * FROM notification WHERE (receiver_id IN ('$user_id') OR sender_id = '$user_id' OR user_id = '$user_id') ".$create_at1." ORDER BY notify_id DESC LIMIT 10");
			$result = $quer->result();
			$aa=array();
			if($result)
			{
				foreach ($result as $key) 
				{
					$image = '';
					if(!empty($key->image))
					{
						if($key->type == 2 || $key->type == 4 || $key->type == 21 || $key->type == 22)
						{
							$image = base_url().'uploads/event_image/'.$key->image;
						}elseif($key->type == 3 || $key->type == 5 || $key->type == 16)
						{
							$image = base_url().'uploads/news_image/'.$key->image;
						}
						elseif($key->type == 6 || $key->type == 7 || $key->type == 8 || $key->type == 17)
						{
							$image = base_url().'uploads/project_image/'.$key->image;
						}elseif($key->type == 9 || $key->type == 10 || $key->type == 11 || $key->type == 20)
						{
							$image = base_url().'uploads/blog_image/'.$key->image;
						}elseif($key->type == 12 || $key->type == 14 || $key->type == 18)
						{
							$image = base_url().'uploads/group_image/'.$key->image;
						}elseif($key->type == 24)
						{
							$image = base_url().'uploads/post_image/'.$key->image;
						}
						elseif($key->type == 13 || $key->type == 19 || $key->type == 23)
						{
							$image = base_url().'uploads/task_image/'.$key->image;
						}
					}
					if(empty($image))
					{
						$imagese = $this->db->select('image')->get_where('users',array('user_id'=>$key->sender_id))->row();
						if(!empty($imagese))
						{
							$image = base_url().'uploads/user_image/'.$imagese->image;
						}
					}

					$date = date('d M Y',$key->create_at/1000);
					$aa[]=array(
						"notification_id"=>$key->notify_id,
						"sender_id"=>$key->sender_id,
						"user_id"=>$key->user_id,
						"receiver_id"=>$key->receiver_id,
						"section_id"=>$key->section_id,
						"type"=>$key->type,
						"image"=>$image,
						"title"=>$key->title,
						"message"=>$key->msg,
						"create_at"=>$key->create_at,
						"notification_date"=>$date
					);
				}
				$final_output['status'] = 'success';
				$final_output['message'] = 'success';
				$final_output['data'] = $aa;
			}else
			{
				$final_output['status'] = 'failed';
				$final_output['message'] = 'Notifcation list not found';
				unset($final_output['data']);
			}
		}else
		{
			$final_output['status'] = 'false';
			$final_output['message'] = "Invalid Token";
		}
	}
	else
	{
		$final_output['status'] = 'false';
		$final_output['message'] = "Unauthorised access";
	}
	header("content-type: application/json");
    echo json_encode($final_output);
}
//End notification list load more

public function GetNotificationList_pulltorefresh() 
{
	$headers = apache_request_headers();
	if(!empty($headers['secret_key']))
	{
		$check = $this->checktoken($headers['secret_key']);
		if($check['status']=="true")
		{
			$create_at=$this->input->post('create_at');
			
			if($create_at=="0")
			{
				$create_at1= '';
			}else
			{
				$create_at1= "AND (create_at > '$create_at')";
			}
			$final_output =array();
			$user_id=$check['data']->user_id;
			$quer = $this->db->query("SELECT * FROM notification WHERE (FIND_IN_SET($user_id,receiver_id) OR receiver_id = '$user_id') AND `create_at` <= DATE_SUB(CURDATE(), INTERVAL 1 MONTH) ".$create_at1." ORDER BY notify_id DESC LIMIT 10");
			//$quer = $this->db->query("SELECT * FROM notification WHERE (receiver_id IN ('$user_id') OR sender_id = '$user_id' OR user_id = '$user_id') ".$create_at1." ORDER BY notify_id DESC LIMIT 10");
			$result = $quer->result();
			//print_r("SELECT * FROM notification WHERE receiver_id ='".$user_id."' ".$create_at1." ORDER BY notification_id DESC LIMIT 10");exit;
			$aa=array();
			if($result)
			{
				foreach ($result as $key) 
				{
					$image = '';
					if(!empty($key->image))
					{
						if($key->type == 2 || $key->type == 4 || $key->type == 21 || $key->type == 22)
						{
							$image = base_url().'uploads/event_image/'.$key->image;
						}elseif($key->type == 3 || $key->type == 5 || $key->type == 16)
						{
							$image = base_url().'uploads/news_image/'.$key->image;
						}
						elseif($key->type == 6 || $key->type == 7 || $key->type == 8 || $key->type == 17)
						{
							$image = base_url().'uploads/project_image/'.$key->image;
						}elseif($key->type == 9 || $key->type == 10 || $key->type == 11 || $key->type == 20)
						{
							$image = base_url().'uploads/blog_image/'.$key->image;
						}elseif($key->type == 12 || $key->type == 14 || $key->type == 18)
						{
							$image = base_url().'uploads/group_image/'.$key->image;
						}elseif($key->type == 24)
						{
							$image = base_url().'uploads/post_image/'.$key->image;
						}
						elseif($key->type == 13 || $key->type == 19 || $key->type == 23)
						{
							$image = base_url().'uploads/task_image/'.$key->image;
						}
					}
					if(empty($image))
					{
						$imagese = $this->db->select('image')->get_where('users',array('user_id'=>$key->sender_id))->row();
						if(!empty($imagese))
						{
							$image = base_url().'uploads/user_image/'.$imagese->image;
						}
					}
					$date = date('d M Y',$key->create_at/1000);
					$aa[]=array(
						"notification_id"=>$key->notify_id,
						"sender_id"=>$key->sender_id,
						"receiver_id"=>$key->receiver_id,
						"section_id"=>$key->section_id,
						"type"=>$key->type,
						"image"=>$image,
						"title"=>$key->title,
						"message"=>$key->msg,
						"create_at"=>$key->create_at,
						"notification_date"=>$date
					);
				}
				$final_output['status'] = 'success';
				$final_output['message'] = 'success';
				$final_output['data'] = $aa;
			}else
			{
				$final_output['status'] = 'failed';
				$final_output['message'] = 'Notifcation list not found';
				unset($final_output['data']);
			}
		}else
		{
			$final_output['status'] = 'false';
			$final_output['message'] = "Invalid Token";
		}
	}
	else
	{
		$final_output['status'] = 'false';
		$final_output['message'] = "Unauthorised access";
	}
	header("content-type: application/json");
    echo json_encode($final_output);
}
//End notification list pulltorefresh

public function City_by_state()
{
	$state_id = $this->input->get('state_id');
	$final_output = '';
	$city = $this->db->select('CityId,City')->get_where("city",array('RegionID'=>$state_id))->result();
	if(!empty($city))
    {
        foreach ($city as $key ) {
        	$arrr[] = array(
    			'city_id'=>$key->CityId,
    			'city'=>$key->City
       			);
        }
	}
    if(!empty($arrr))
    {
        $final_output['status']='success';
        $final_output['message']='Successfull';
        $final_output['data']=$arrr;       
    }else
    {
        $final_output['status']='failed';
        $final_output['message']='Data not found';
    }
	header("content-type: application/json");
    echo json_encode($final_output);	
}

public function Delete_user_account()
{
	$headers = apache_request_headers();
	if(!empty($headers['secret_key']))
	{
		$check = $this->checktoken($headers['secret_key']);
		if($check['status']=="true")
		{
			$userid  = $check['data']->user_id;
			$final_output = '';
	    	if($check['data']->admin_status!=2)
	    	{
		    	$delete = $this->common_model->updateData("users",array('email_status'=>2),array('user_id'=>$userid));
				if(!empty($delete))
			    {
		            $final_output['status']='success';
		            $final_output['message']='Successfull deleted.';
		            unset($final_output['data']);       
				}else
			    {
		            $final_output['status']='failed';
		            $final_output['message']='Something went wrong! please try again later';
		            unset($final_output['data']);       
			    } 
	    	}else
	    	{
	    		$array_object['status'] = "1000";
				$array_object['message'] ="Suspicious activity has been detected on your Kartavya account and it has been temporarily suspended as a security precaution.";
	    	}
		}else
		{
			$final_output['status'] = 'false';
			$final_output['message'] = "Invalid Token";
		}
	}
	else
	{
		$final_output['status'] = 'false';
		$final_output['message'] = "Unauthorised access";
	}  
	header("content-type: application/json");
    echo json_encode($final_output);	
}

//Poll API = Get poll data
public function Get_poll_by_category()
{	
	$headers = apache_request_headers();
	if($headers['secret_key'] !='')
	{
		$check_key = $this->checktoken($headers['secret_key']);
		if($check_key['status'] == 'true')
		{
		    $user_id = $check_key['data']->user_id;
			$category_id = $this->input->post('category_id');
			$create_at = $this->input->post('create_at');
			$create = '';
			if($create_at!=0)
			{
				$create = "AND create_at < '$create_at'";
			}
			$final_output = array();
			$arr =array();
		   	$polls = $this->db->query("SELECT * FROM poll WHERE category_id = '$category_id' AND admin_status=1 $create ORDER BY create_at DESC")->result();
	 		if(!empty($polls))
	   		{
				foreach ($polls as $key) {
					
					$answers = $this->db->get_where('poll_user_response',array('poll_id'=>$key->poll_id,'user_id'=>$user_id))->row();
					if(!empty($answers))
					{
						$myresponse = 1;				
					}else
					{
						$myresponse = 0;
					}
					$array = array();  $percent = 0;
					$answers = $this->db->select('answer_id,answer,vote_count')->get_where('poll_answers',array('poll_id'=>$key->poll_id))->result();
					if(!empty($answers))
					{
						foreach ($answers as $value) {
							
							if($myresponse ==1)
							{
								$totalsum = $this->db->query("SELECT SUM(vote_count) as totalvote FROM poll_answers WHERE poll_id = ".$key->poll_id."")->row();
								if($totalsum->totalvote==0){ $calculation = 0; }else{
								$calculation = $value->vote_count*100/$totalsum->totalvote; 
								}
								$percent = round($calculation);
							}
							$value->percentage = $percent;
							$array[] = $value;
						}
					} 
					
					if($key->poll_image!='')
					{
						$image = base_url().'uploads/poll_image/'.$key->poll_image;
					}else
					{
						$image = '';
					}
				/*	$id = $type.'_id';
					$membercount = $this->db->query("SELECT count(user_id) as group_member_count FROM join_user WHERE section_id = ".$key->$id." AND type = '$type' AND admin_status = 1")->row()->group_member_count;
					if(!empty($membercount))
					{
						$member_count = $membercount;
					}else
					{
						$member_count = 0;
					}*/
				
					$arr[] = array(
							'poll_id'=>$key->poll_id,
							'question'=>$key->poll_question,
							'my_response'=>$myresponse,
							'answers_count'=>$key->answer_count,
							'poll_image'=>$image,
							'create_at'=>$key->create_at,
							'answers'=>$array
							);
				}
			}
	   		if(!empty($arr))
	   		{
   				$final_output['status'] = 'success';
				$final_output['message'] = 'Poll List';
				$final_output['data'] = $arr;
			}else
	   		{
   				$final_output['status'] = 'failed';
				$final_output['message'] = 'Poll not found';
			}
		}else
		{
	    	$final_output['status'] = 'false';
	    	$final_output['message'] = 'Invalid Token';
		}
	}else
	{
	    $final_output['status'] = 'false';
	    $final_output['message'] = 'Unauthorised Access';
	}	
	header("content-type: application/json");
    echo json_encode($final_output);
}

//Vote API = give vote by user
public function vote_on_poll()
{	
	$headers = apache_request_headers();
	if($headers['secret_key'] !='')
	{
		$check_key = $this->checktoken($headers['secret_key']);
		if($check_key['status'] == 'true')
		{
		    $user_id = $check_key['data']->user_id;
			$poll_id = $this->input->post('poll_id');
			$answer_id = $this->input->post('answer_id');
			$final_output = array();
		   	$array = array();
		   	$polls = $this->db->query("SELECT * FROM poll WHERE poll_id = '$poll_id' AND admin_status = 1")->row();
	 		if(!empty($polls))
	   		{
				$vote = $this->db->insert("poll_user_response",array('poll_id'=>$poll_id,'answer_id'=>$answer_id,'user_id'=>$user_id,'create_at'=>date('Y-m-d H:i:s')));
				if($vote)
				{
					$update = $this->db->query("UPDATE poll_answers SET vote_count = (vote_count+1) WHERE answer_id = '$answer_id'");
				}
				$answers = $this->db->select('answer_id,answer,vote_count')->get_where('poll_answers',array('poll_id'=>$poll_id))->result();
				if(!empty($answers))
				{
					foreach ($answers as $value) {
						
						$totalsum = $this->db->query("SELECT SUM(vote_count) as totalvote FROM poll_answers WHERE poll_id = ".$poll_id."")->row();
						$calculation = $value->vote_count*100/$totalsum->totalvote;
						$percent = round($calculation);
						$value->percentage = $percent;
						$array[] = $value;
					}
				}
				
				/*$arr = array(
						'question'=>$polls->poll_question,
						'my_response'=>$myresponse,
						'answers_count'=>$polls->answer_count,
						'poll_image'=>$image,
						'create_at'=>$polls->create_at,
						'answers'=>$array
						);*/
			}
	   		if(!empty($array))
	   		{
   				$final_output['status'] = 'success';
				$final_output['message'] = 'Successfully voted';
				$final_output['answers'] = $array;
			}else
	   		{
   				$final_output['status'] = 'failed';
				$final_output['message'] = 'Poll not found';
			}
		}else
		{
	    	$final_output['status'] = 'false';
	    	$final_output['message'] = 'Invalid Token';
		}
	}else
	{
	    $final_output['status'] = 'false';
	    $final_output['message'] = 'Unauthorised Access';
	}	
	header("content-type: application/json");
    echo json_encode($final_output);
}

public function Sync_contact()
{
	$headers = apache_request_headers();
    if(!empty($headers['secret_key']))
    {
        $check = $this->checktoken($headers['secret_key']);
        if($check['status']=="true")
        {  
            $user_id = $check['data']->user_id;
       
            $json = file_get_contents('php://input');
            if(!empty($json))
            {   
                $data = json_decode($json);
          	    $userdata = array();
              	$final_output = array();
                $delete = $this->common_model->deleteData("contact_list",array('user_id'=>$user_id));
                $id = ''; $frndid = 0;
                for ($i=0; $i < count($data->friend_data); $i++)
                { 
                    $selectuser = $this->db->query("SELECT * FROM users WHERE CONCAT(users.mobile_code,'',users.mobileno) = '".$data->friend_data[$i]->friend_number."' AND mobile_status = 1 AND email_status = 1 AND admin_status = 1 AND user_id != '$user_id'");
                    $select1 = $selectuser->row();
                    if($select1)
                    {
                        $frndid = $select1->user_id;
                        //$inserfrnd = $this->common_model->common_insert("contact_list",array('user_id'=>$user_id,'contact_no'=>$data->friend_data[$i]->friend_number,'name'=>$data->friend_data[$i]->name,'friend_id'=>$frndid,'create_at'=>date('Y-m-d H:i:s')));
                    }else
                    {
                        $selectuser1 = $this->db->query("SELECT * FROM users WHERE REPLACE(CONCAT(users.mobile_code,'',users.mobileno), '+', '') = '".$data->friend_data[$i]->friend_number."' AND mobile_status = 1 AND email_status = 1 AND admin_status = 1 AND user_id != '$user_id'");
                    	$select2 = $selectuser1->row();
                        if($select2)
                        {
                            $frndid = $select2->user_id;
                            //$inserfrnd = $this->common_model->common_insert("contact_list",array('user_id'=>$user_id,'contact_no'=>$data->friend_data[$i]->friend_number,'name'=>$data->friend_data[$i]->name,'friend_id'=>$frndid,'create_at'=>date('Y-m-d H:i:s')));
                        }else
                        {
                            $selectuser2 = $this->db->query("SELECT * FROM users WHERE CONCAT('0','',users.mobileno) = '".$data->friend_data[$i]->friend_number."' AND mobile_status = 1 AND email_status = 1 AND admin_status = 1 AND user_id != '$user_id'");
                    		$select3 = $selectuser2->row();
                            if($select3)
                            {
                                $frndid = $select3->user_id;
               //                $inserfrnd = $this->common_model->common_insert("contact_list",array('user_id'=>$user_id,'contact_no'=>$data->friend_data[$i]->friend_number,'name'=>$data->friend_data[$i]->name,'friend_id'=>$frndid,'create_at'=>date('Y-m-d H:i:s')));
                            }else
                            {
                                $selectuser3 = $this->db->query("SELECT * FROM users WHERE users.mobileno = '".$data->friend_data[$i]->friend_number."' AND mobile_status = 1 AND email_status = 1 AND admin_status = 1 AND user_id != '$user_id'");
                    			$select4 = $selectuser3->row();
                                if($select4)
                                {
                                    $frndid = $select4->user_id;
                                }
                            }
                        }
                    }
                    if($frndid!=0)
                    {
	                    $selectuser3 = $this->db->query("SELECT * FROM contact_list WHERE user_id = '".$user_id."' AND friend_id = '$frndid'")->row();
	                    if($selectuser3)
	                    {
	                    }else
	                    {
	                        $inserfrnd = $this->common_model->common_insert("contact_list",array('user_id'=>$user_id,'contact_no'=>$data->friend_data[$i]->friend_number,'name'=>$data->friend_data[$i]->name,'friend_id'=>$frndid,'create_at'=>date('Y-m-d H:i:s')));
	                    }
                	}
                }
                $arr = array();
                $selectfrnd = $this->db->query("SELECT * FROM contact_list  WHERE contact_list.user_id = '".$user_id."'")->result();
                if($selectfrnd)
                {
                    foreach ($selectfrnd as $key) {
                    //    $seluserfd = $this->common_model->common_getRow("users",array('user_id'=>$key['friend']));

                           /* $arr[] = array(
                                    'friend_id'=>$key['follow_user_id'],
                                    'friend_name'=>$key['friend_name'],
                                    'display_name'=>$seluserfd->displayname,
                                    'avatar_image'=>base_url()."user_image/".$seluserfd->avatar,
                                    'user_image'=>base_url()."user_image/".$seluserfd->user_image,
                                    'user_status'=>$seluserfd->user_status,
                                    'key_last_seen'=>'',
                                    'mobile_code'=>$seluserfd->country_code,
                                    'user_mobile'=>$seluserfd->mobileno
                                    );*/
                        	$arr[] = array(
                        			'name'=>$key->name,
                        			'contact_no'=>$key->contact_no,
                        			'friend_id'=>$key->friend_id
                        			);
                        }
                      
                    
                }
                if(!empty($arr))
                {
                	$final_output["status"] = "success";
                    $final_output["message"] = "Contact list successfully sync";
                    $final_output["friend_list"] = $arr;
                }
                else
                {
                    $final_output["status"] = "failed";
                    $final_output["message"] = "contact list empty";
                }
            }
            else
            {
                $final_output["status"] = "failed";
                $final_output["message"] = "No required parameter";
            } 
        }
        else
        {
            $final_output["status"] = "false";
            $final_output["message"] = "Invalid Token";
        }
    }
    else
    {
        $final_output["status"] = "false";
        $final_output['message'] = "Unauthorised access";
    }  
	header("content-type: application/json");
	echo json_encode($final_output);
}

public function Get_event_by_id()
{
	$headers = apache_request_headers();
	if($headers['secret_key'] !='')
	{
		$check_key = $this->checktoken($headers['secret_key']);
		if($check_key['status'] == 'true')
		{
			if($check_key['data']->admin_status == 2)
			{
				$final_output['status'] = "1000";
				$final_output['message'] ="Suspicious activity has been detected on your Kartavya account and it has been temporarily suspended as a security precaution.";
			}elseif($check_key['data']->email_status == 2)
			{
				$final_output['status'] = "1000";
				$final_output['message'] ="This account is no longer registered on Kartavya.";
			}else
			{
			    $userid = $check_key['data']->user_id;
				$event_id = $this->input->post('event_id');	///2017-02-15 01:00:00	
				$final_output = array();
				$date = date('Y-m-d H:i:s');
				$arr = array();
				$key = $this->db->query("SELECT * FROM event WHERE admin_status = 1 AND delete_status = 0 AND event_id = '$event_id' ")->row();
				if($key)
				{	
						$resselect = $this->db->query("SELECT count(user_id) as goresponce FROM event_response WHERE event_id = ".$key->event_id." AND response_status=1 ")->row();
						if($resselect)
						{
							$going_response = $resselect->goresponce;
						}else
						{
							$going_response = 0;
						}
						$resselectmay = $this->db->query("SELECT count(user_id) as mayberesponce FROM event_response WHERE event_id = ".$key->event_id." AND response_status=2 ")->row()->mayberesponce;
						if($resselectmay)
						{
							$maybe_response = $resselectmay;
						}else
						{
							$maybe_response = 0;
						}
						$event_google_id = '';
						$resselect = $this->common_model->common_getRow("event_response",array('event_id'=>$key->event_id,'user_id'=>$userid));
						if($resselect)
						{
							$response_status = $resselect->response_status;
							if($response_status==1)
							{
								$event_google_id = $resselect->event_google_id;
							}	
						}else
						{
							$response_status = 0;
						}

						if($key->user_id==0)
						{
							//$key->hosted_by = 'Admin';
						}else
						{
							$username = $this->db->select('username,user_surname')->get_where('users',array('user_id'=>$key->user_id))->row();
							$key->hosted_by = $username->username.' '.$username->user_surname;
						}
						$shortmonth = date('M',strtotime($key->start_date_time));
						$shortdt = date('d',strtotime($key->start_date_time));
						$fulldtst = date('Y-m-d H:i:s A',strtotime($key->start_date_time));
						$fulldted = date('Y-m-d H:i:s A',strtotime($key->end_date_time));
						$key->full_st_dt = $fulldtst;
						$key->full_ed_dt = $fulldted;
						$key->shortm = $shortmonth;
						$key->shortd = $shortdt;
						$key->going_response = $going_response;
						$key->maybe_response = $maybe_response;
						$event_img2 = array();
						$event_img ='';
						$sele_img = $this->common_model->getData("event_image",array('event_id'=>$key->event_id));
						if($sele_img)
						{
								$event_img = base_url().'uploads/event_image/'.$sele_img[0]->image;
							foreach ($sele_img as $value) {
								$event_img2[] = base_url().'uploads/event_image/'.$value->image;
							}
						}
						$key->image = $event_img;
						$key->image2 = $event_img2;
						$key->my_response = $response_status;
						$key->event_google_id = $event_google_id;
						$arr = $key;
					$final_output['status'] = "success";
					$final_output['message'] = "Successfull";
					$final_output['data'] = $arr;
					//$final_output['event_count'] = $count;
				}else
				{
	 				$final_output['status'] = 'failed';
	 				$final_output['message'] = 'No event found';
				}	
			}
		}else
		{
	    	$final_output['status'] = 'false';
	    	$final_output['message'] = 'Invalid Token';
		}
	}else
	{
	    $final_output['status'] = 'false';
	    $final_output['message'] = 'Unauthorised Access';
	}	
	header("content-type: application/json");
    echo json_encode($final_output);
}

public function Get_project_by_id()
{
	$headers = apache_request_headers();
	if($headers['secret_key'] !='')
	{
		$check_key = $this->checktoken($headers['secret_key']);
		if($check_key['status'] == 'true')
		{
		    $userid = $check_key['data']->user_id;
			$project_id = $this->input->post('project_id');	///2017-02-15 01:00:00	
			//$type = $this->input->post('type');	
			$final_output = array();
			$create = '';
			
			$arr = array();
			$key = $this->db->query("SELECT * FROM project WHERE admin_status = 1 AND delete_status = 0 AND project_id = '$project_id' ")->row();
			if($key)
			{	
					$count = $this->db->query("SELECT count(project_id) as pcount FROM project WHERE admin_status = 1 AND delete_status = 0 ")->row()->pcount;
					$resselect = $this->db->query("SELECT count(user_id) as upvotecount FROM project_upvote WHERE project_id = ".$key->project_id." AND vote_status=1 ")->row()->upvotecount;
					if(!empty($resselect))
					{
						$upvote_count = $resselect;
					}else
					{
						$upvote_count = 0;
					}
					$resselectd = $this->db->query("SELECT count(user_id) as downvotecount FROM project_upvote WHERE project_id = ".$key->project_id." AND vote_status=2 ")->row()->downvotecount;
					if(!empty($resselectd))
					{
						$downvote_count = $resselectd;
					}else
					{
						$downvote_count = 0;
					}

					$myresselect = $this->db->query("SELECT vote_status FROM project_upvote WHERE project_id = ".$key->project_id." AND user_id = '$userid'")->row();
					if($myresselect)
					{
						$my_vote = $myresselect->vote_status;
					}else
					{
						$my_vote = 0;
					}
					$commentcont = $this->db->query("SELECT count(comment_id) as comment_count FROM comment WHERE project_id = ".$key->project_id." AND type = 'project'")->row()->comment_count;
					if(!empty($commentcont))
					{
						$projectcomnt = $commentcont;
					}else
					{
						$projectcomnt = 0;
					}
					$key->comment_count = $projectcomnt;
					$project_img_arr = array();
					$project_img ='';
					$sele_img = $this->common_model->getData("project_image",array('project_id'=>$key->project_id));
					if($sele_img)
					{
						$project_img = base_url().'uploads/project_image/'.$sele_img[0]->image;
						foreach ($sele_img as $value) {
							$project_img_arr[] = base_url().'uploads/project_image/'.$value->image;
						}
					}
					if($key->user_id != 0 ){
						$hostname1 = $this->db->select('username,user_surname')->get_where("users",array('user_id'=>$key->user_id))->row();
						if($hostname1)
						{
							$hostname = $hostname1->username.' '.$hostname1->user_surname;
						}else
						{
							$hostname = '';
						}
					}else{ 
					$hostname = $key->hosted_by;	
					}
					$key->hosted_by = $hostname;

					$shortmonth = date('M',strtotime($key->start_date));
					$shortdt = date('d',strtotime($key->start_date));
					$fulldtst = date('Y-m-d',strtotime($key->start_date));
					$fulldted = date('Y-m-d',strtotime($key->end_date));
					$key->st_dt = $fulldtst;
					$key->ed_dt = $fulldted;
					$key->shortm = $shortmonth;
					$key->shortd = $shortdt;
					$key->upvote = $upvote_count;
					$key->downvote = $downvote_count;
					$key->my_vote = $my_vote;
					$key->image = $project_img;
					$key->image2 = $project_img_arr;
					$arr = $key;
				
				$final_output['status'] = "success";
				$final_output['message'] = "Successfull";
				$final_output['data'] = $arr;
				$final_output['project_count'] = $count;
			}else
			{
 				$final_output['status'] = 'failed';
 				$final_output['message'] = 'No project found';
			}	
		}else
		{
	    	$final_output['status'] = 'false';
	    	$final_output['message'] = 'Invalid Token';
		}
	}else
	{
	    $final_output['status'] = 'false';
	    $final_output['message'] = 'Unauthorised Access';
	}	
	header("content-type: application/json");
    echo json_encode($final_output);
}

public function Get_blog_by_id()
{
	$headers = apache_request_headers();
	if($headers['secret_key'] !='')
	{
		$check_key = $this->checktoken($headers['secret_key']);
		if($check_key['status'] == 'true')
		{
		    $userid = $check_key['data']->user_id;
			$blog_id = $this->input->post('blog_id');	//ADMINISTRATOR = 1,MEMBERS = 2
			$final_output = array();
			$create = '';
			$arr = array();
		
			$blogdata = '';
			$currdt = date('Y-m-d H:i:s');
			$key = $this->db->query("SELECT blog_id,title,description,user_id,publish_date,create_at FROM blog WHERE admin_status = 1 AND delete_status = 0 AND blog_id = '$blog_id'")->row();
			if($key)
			{	
					$count = $this->db->query("SELECT count(blog_id) as bcount FROM blog WHERE admin_status = 1 AND delete_status = 0 ")->row()->bcount;
					$userimage = '';
					$user = $this->common_model->getDataField("username,image","users",array('user_id'=>$key->user_id)); 
					if($user)
					{
						if($user[0]->image)
						{
							$userimage = base_url().'uploads/user_image/'.$user[0]->image;
						}
						$username = $user[0]->username;
					}else
					{
						 $username = 'Admin';
					}
					$blog_img2 = array(); $blog_img = '';
					$sele_img = $this->common_model->getData("blog_image",array('blog_id'=>$key->blog_id));
					if($sele_img)
					{
						foreach ($sele_img as $value) {
							
							$blog_img2[] = base_url().'uploads/blog_image/'.$value->image;
							$blog_img = base_url().'uploads/blog_image/'.$value->image;
						}
					}
					$like_count = '';  $comment_count = '';
					$likecount = $this->db->query("SELECT count(like_unlike_id) as Like_Unlike_count FROM Like_Unlike WHERE section_id = ".$key->blog_id." AND type = 'blog'")->row()->Like_Unlike_count;
					if(!empty($likecount))
					{
						$like_count = $likecount;
					}
					$commentcont = $this->db->query("SELECT count(comment_id) as comment_count FROM comment WHERE project_id = ".$key->blog_id." AND type = 'blog'")->row()->comment_count;
					if(!empty($commentcont))
					{
						$comment_count = $commentcont;
					}
					$likecount = $this->db->query("SELECT like_unlike_id FROM Like_Unlike WHERE section_id = ".$key->blog_id." AND type = 'blog' AND user_id = '$userid'")->row();
					if(!empty($likecount))
					{
						$my_like = 1;
					}else
					{
						$my_like = 0;
					}

					$key->image2 = $blog_img2;
					$key->image = $blog_img;
					$key->user_name = $username;
					$key->user_image = $userimage;
					$key->like_count = (int)$like_count;
					$key->comment_count = (int)$comment_count;
					$key->my_response = $my_like;
					//$des = strip_tags($key->description);
					//$key->description = $des;
					$arr = $key;
				
				$final_output['status'] = "success";
				$final_output['message'] = "Successfull";
				$final_output['data'] = $arr;
				$final_output['blog_count'] = $count;
			}else
			{
 				$final_output['status'] = 'failed';
 				$final_output['message'] = 'No data found';
			}	
		}else
		{
	    	$final_output['status'] = 'false';
	    	$final_output['message'] = 'Invalid Token';
		}
	}else
	{
	    $final_output['status'] = 'false';
	    $final_output['message'] = 'Unauthorised Access';
	}	
	header("content-type: application/json");
    echo json_encode($final_output);
}

public function Get_group_and_task_byid()
{	
	$headers = apache_request_headers();
	if($headers['secret_key'] !='')
	{
		$check_key = $this->checktoken($headers['secret_key']);
		if($check_key['status'] == 'true')
		{
		    $user_id = $check_key['data']->user_id;
			$type = $this->input->post('type');
			$id = $this->input->post('id');
			
			$final_output = array();
			$arr =array();
		   	$key = $this->db->query("SELECT * FROM `".$type."` WHERE admin_status = 1 AND delete_status = 0 AND $type".'_id'." = '$id'")->row();
	 		if(!empty($key))
	   		{
				$groupcount = $this->db->query("SELECT count(".$type."_id) as group_task_count FROM `$type` WHERE admin_status = 1 AND delete_status = 0")->row()->group_task_count;
				if(!empty($groupcount))
				{
					$g_t_count = $groupcount;
				}else
				{
					$g_t_count = 0;
				}
					if($key->image!='')
					{
						$image = base_url().'uploads/'.$type.'_image/'.$key->image;
					}else
					{
						$image = '';
					}
					$id = $type.'_id';
					$membercount = $this->db->query("SELECT count(user_id) as group_member_count FROM join_user WHERE section_id = ".$key->$id." AND type = '$type' AND admin_status = 1")->row()->group_member_count;
					if(!empty($membercount))
					{
						$member_count = $membercount;
					}else
					{
						$member_count = 0;
					}
					$my_join_status = $this->db->query("SELECT admin_status as my_status FROM join_user WHERE section_id = ".$key->$id." AND type = '$type' AND user_id = '$user_id'")->row();
					if(!empty($my_join_status))
					{
						$my_status = $my_join_status->my_status;
					}else
					{
						$my_status = 2;
					}
					if($type=='task')
					{
						$organisby = $key->organised_by;
						$start_date = date('d-m-Y',strtotime($key->start_date));
						$end_date = date('d-m-Y',strtotime($key->end_date));
					}else
					{
						$organisby = '';
						$start_date = '';
						$end_date = '';
					}
					$id = $type.'_id';
					$arr = array(
							'id'=>$key->$id,
							'title' => $key->title,
							'description' => $key->description,
							'image'=>$image,
							'create_at'=>$key->create_at,
							'group_task_count'=>(int)$g_t_count,
							'group_member_count'=>(int)$member_count,
							'my_join_status'=>(int)$my_status,
							'organised_by'=>$organisby,
							'start_date'=>$start_date,
							'end_date'=>$end_date
							);
				
			}
	   		if(!empty($arr))
	   		{
   				$final_output['status'] = 'success';
				$final_output['message'] = $type.' detail';
				$final_output['data'] = $arr;
			}else
	   		{
   				$final_output['status'] = 'failed';
				$final_output['message'] = $type.' not found';
			}
		}else
		{
	    	$final_output['status'] = 'false';
	    	$final_output['message'] = 'Invalid Token';
		}
	}else
	{
	    $final_output['status'] = 'false';
	    $final_output['message'] = 'Unauthorised Access';
	}	
	header("content-type: application/json");
    echo json_encode($final_output);
}

public function Get_news_byid()
{
	$headers = apache_request_headers();
	if($headers['secret_key'] !='')
	{
		$check_key = $this->checktoken($headers['secret_key']);
		if($check_key['status'] == 'true')
		{
		    if($check_key['data']->admin_status == 2)
			{
				$final_output['status'] = "1000";
				$final_output['message'] ="Suspicious activity has been detected on your Kartavya account and it has been temporarily suspended as a security precaution.";
			}elseif($check_key['data']->email_status == 2)
			{
				$final_output['status'] = "1000";
				$final_output['message'] ="This account is no longer registered on Kartavya.";
			}else
			{
			    $userid = $check_key['data']->user_id;
				$news_id = $this->input->post('news_id');
				$final_output = array();
				$news_img = '';
				$key = $this->db->query("SELECT * FROM news WHERE admin_status = 1 AND news_id = '$news_id'")->row();
				if($key)
				{	
						$news_img2 = array();
						$sele_img = $this->common_model->getData("news_image",array('news_id'=>$key->news_id));
						if($sele_img)
						{
							foreach ($sele_img as $value) {
								
								$news_img2[] = base_url().'uploads/news_image/'.$value->image;
								$news_img = base_url().'uploads/news_image/'.$value->image;
							}
						}
	   					$isbookmark = 0;
	   					$selbookmark = $this->db->query("SELECT bookmark_id FROM bookmark WHERE news_id='".$key->news_id."' AND user_id='$userid'")->row();
	   					if($selbookmark)
	   					{
	   						$isbookmark = 1;
	   					}
					$key->image = $news_img;
					$key->image2 = $news_img2;
					$key->isbookmarked = $isbookmark;
					$arr = $key;
		
					$final_output['status'] = "success";
					$final_output['message'] = "Successfull";
					$final_output['data'] = $arr;
				}else
				{
	 				$final_output['status'] = 'failed';
	 				$final_output['message'] = 'No data found';
				}	
			}
		}else
		{
	    	$final_output['status'] = 'false';
	    	$final_output['message'] = 'Invalid Token';
		}
	}else
	{
	    $final_output['status'] = 'false';
	    $final_output['message'] = 'Unauthorised Access';
	}	
	header("content-type: application/json");
    echo json_encode($final_output);
}

public function Get_post_byid()
{
	$headers = apache_request_headers();
	if($headers['secret_key'] !='')
	{
		$check_key = $this->checktoken($headers['secret_key']);
		if($check_key['status'] == 'true')
		{
		    $post_id = $this->input->post('post_id');
		    $user_id = $check_key['data']->user_id;
		    $key = $this->db->query("SELECT post_id,message,image,create_at,user_id FROM `post` WHERE post_id = '$post_id'")->row();
		   	if(!empty($key))
	   		{
				if($key->image!='')
				{
					$image = base_url().'uploads/post_image/'.$key->image;
				}else
				{
					$image = '';
				}
				$userimage = '';	$username = '';
				$user = $this->db->select('username,user_surname,image')->get_where('users',array('user_id'=>$key->user_id))->row();
				if($user)
				{
					if($user->image!='')
					{
						$userimage = base_url().'uploads/user_image/'.$user->image;
					}
					$username = $user->username.' '.$user->user_surname;
				}
				$like_count = 0;
				$likecount = $this->db->query("SELECT count(like_id) as post_like_count FROM group_like WHERE post_id = ".$key->post_id."")->row()->post_like_count;
				if(!empty($likecount))
				{
					$like_count = $likecount;
				}
				$comment_count = 0;
				$comment_counts = $this->db->query("SELECT count(comment_id) as comment_counts FROM group_post_comment WHERE post_id = ".$key->post_id."")->row()->comment_counts;
				if(!empty($comment_counts))
				{
					$comment_count = $comment_counts;
				}
				$mylikestatus = $this->db->query("SELECT like_id as myresponse FROM group_like WHERE post_id = ".$key->post_id." AND user_id = ".$user_id."")->row();
				if(!empty($mylikestatus))
				{
					$my_response = 1;
				}else
				{
					$my_response = 0;
				}

				$arr = array(
							'post_id' => $key->post_id,
							'message'=>$key->message,
							'image'=>$image,
							'user_name'=>$username,
							'user_image'=>$userimage,
							'comment_count'=>(int)$comment_count,
							'like_count'=>(int)$like_count,
							'my_response'=>(int)$my_response,
							'create_at'=>$key->create_at	
							);
				$final_output['status'] = "success";
				$final_output['message'] = "Successfull";
				$final_output['data'] = $arr;
			}else
			{
				$final_output['status'] = "failed";
				$final_output['message'] = "Post not found";
				//$final_output['data'] = $arr;
			}
		}else
		{
	    	$final_output['status'] = 'false';
	    	$final_output['message'] = 'Invalid Token';
		}
	}else
	{
	    $final_output['status'] = 'false';
	    $final_output['message'] = 'Unauthorised Access';
	}	
	header("content-type: application/json");
    echo json_encode($final_output);
}

public function security_center()
{
	$headers = apache_request_headers();
	if($headers['secret_key'] !='')
	{
		$check_key = $this->checktoken($headers['secret_key']);
		if($check_key['status'] == 'true')
		{
		    $userid = $check_key['data']->user_id;
		    if($check_key['data']->admin_status == 2)
			{
				$final_output['status'] = "1000";
				$final_output['message'] ="Suspicious activity has been detected on your Kartavya account and it has been temporarily suspended as a security precaution.";
			}elseif($check_key['data']->email_status == 2)
			{
				$final_output['status'] = "1000";
				$final_output['message'] ="This account is no longer registered on Kartavya.";
			}else
			{
			   $user_id = $this->input->post('user_id');
			   $name = $this->input->post('name');
			   $contact_no = $this->input->post('contact_no');
			   $action = 'encrypt'; 
			   $image = $image1 = '';
			   
			   	if($user_id != 0)
			   	{
			   		$userdat = $this->db->get_where("users",array('user_id'=>$user_id))->row();
			   		if($userdat)
			   		{
			   			$contact_no = $userdat->mobile_code.$userdat->mobileno;
			   		}
			   	}
				$checkuser = $this->db->select('id')->get_where('security_center',array('my_user_id'=>$userid,'contact_no'=>$contact_no))->row();	
				if(empty($checkuser))
				{
					if($user_id != 0)
				   	{
				   		$name = $userdat->username.' '.$userdat->user_surname;
			   			if(!empty($userdat->image))
			   			{
			   				$image = $userdat->image;
			   				$image1 = base_url().'uploads/user_image/'.$userdat->image;
			   			}
				   	}else
				   	{
				   		if(isset($_FILES['image']['name']) && !empty($_FILES['image']['name']))	
				   		{
				   			$image = militime.$_FILES['image']['name'];
				   			move_uploaded_file($_FILES['image']['tmp_name'],'uploads/contact_img/'.$image);
				   			$image1 = base_url().'uploads/user_image/'.$image;
				   		}
				   	}
				   $insertt = $this->common_model->common_insert("security_center",array('my_user_id'=>$userid,'user_id'=>$user_id,'name'=>$name,'contact_no'=>$contact_no,'image'=>$image,'create_at'=>date('Y-m-d H:i:s'),'update_at'=>date('Y-m-d H:i:s')));
				   if($insertt)
				   {
				   		$string = json_encode(array('id'=>$userid,'myid'=>$contact_no));
						$url = $this->common_model->encryptor($action, $string);
						$aa = base64_encode($url);
						$aaa = base_url().$aa;
		    			$final_output['status'] = 'success';
		    			$final_output['message'] = 'successfully Added in security center';
		    			$final_output['data'] = array('id'=>$insertt,'name'=>$name,'contact_no'=>$contact_no,'image'=>$image1,'url'=>$aaa);
				   }else
				   {
		    			$final_output['status'] = 'failed';
		    			$final_output['status'] = 'Something went wrong! please try again later.';
				   }
				}else
				{
					$final_output['status'] = 'failed';
	    			$final_output['message'] = 'Contact already added';
				}
			}
		}else
		{
	    	$final_output['status'] = 'false';
	    	$final_output['message'] = 'Invalid Token';
		}
	}else
	{
	    $final_output['status'] = 'false';
	    $final_output['message'] = 'Unauthorised Access';
	}	
	header("content-type: application/json");
    echo json_encode($final_output);

}


public function delete_security_contact()
{
	$headers = apache_request_headers();
	if($headers['secret_key'] !='')
	{
		$check_key = $this->checktoken($headers['secret_key']);
		if($check_key['status'] == 'true')
		{
			$id =  $this->input->post('id');
			$checkuser = $this->db->select('id')->get_where('security_center',array('id'=>$id))->row();	
			if(!empty($checkuser))
			{
				$del = $this->common_model->deleteData('security_center',array('id'=>$id));
				if($del)
				{
					$final_output['status'] = 'success';
	    			$final_output['message'] = 'Successfull Deleted';
				}else
				{
					$final_output['status'] = 'failed';
	    			$final_output['message'] = 'Something went wrong! please try again later.';
				}
			}else
			{
				$final_output['status'] = 'failed';
	    		$final_output['message'] = 'Contact number not found';
			}
		}else
		{
	    	$final_output['status'] = 'false';
	    	$final_output['message'] = 'Invalid Token';
		}
	}else
	{
	    $final_output['status'] = 'false';
	    $final_output['message'] = 'Unauthorised Access';
	}	
	header("content-type: application/json");
    echo json_encode($final_output);

}

public function geturl()
{
	$a = $this->uri->segment(3);
	$url = $this->common_model->encryptor('decrypt', $a);
	
//	$url = $this->common_model->encryptor('decrypt', $a);
	echo $url;exit;
}
/*public function send_otp()
{
	$mobile_msg = "OTP to login your kartavya app account is 1234";

	$aa = $this->common_model->sms_send('9754743271',$mobile_msg);
	print_r($aa);exit;
}*/

public function checktoken($token)
{
	$auth = $this->common_model->common_getRow('users',array('token'=>$token));
	if(!empty($auth))
	{
		$abc['status'] = "true";
		$abc['data'] =$auth;
		return $abc;
	}else
	{
		$abc['status'] = "false";
		return $abc;
	}
}
public function rand_string($length)
{
    $str="";
    $chars = "subinsblogabcdefghijklmanopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $size = strlen($chars);
    for($i = 0;$i < $length;$i++) {
      $str .= $chars[rand(0,$size-1)];
    }
    return $str;
}
public function randno($tot=false)
{
   if($tot=='')
   {
       $tot=6;    
   }
   return $randomString = substr(str_shuffle("123456789"), 0, $tot);    
}

}
?>
