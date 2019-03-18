 <?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {
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
	 $data['event_data'] = $this->common_model->getData('event',array('user_id'=>0,'delete_status'=>0),'Event_id','DESC');

	 $this->load->view('admin/event/event_detail',$data);	
}

public function add_event()
{ 
	if($this->input->server('REQUEST_METHOD') === 'POST')
	{ 
		  	$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('description', 'Description', 'required');

			if($this->form_validation->run() == TRUE)
			{ 
	  				
			 	// 	$start_date = $this->input->post('start_date');
			 	// 	$end_date = $this->input->post('end_date');
			 	// 	if($end_date < $start_date)
			 	// 	{
			 	// 	  $this->session->set_flashdata('datefailed', 'End date should not be less from start date.');
					//   redirect('event/add_event');
			 	// 	}	

					// //$start_time  = date("H:i", strtotime($this->input->post('start_time')));
			 	//     //$end_time = date("H:i", strtotime($this->input->post('end_time')));			 		
          
     //      			$event = array(
					// 'title' =>$this->input->post('title'),
					// 'description' =>$this->input->post('description'),
					// 'start_date_time' =>$this->input->post('start_date').' '.$this->input->post('start_time').':00',
					// 'end_date_time'=>$this->input->post('end_date').' '.$this->input->post('end_time').':00',
					// 'hosted_by'=>$this->input->post('hosted_by'),
					// // 'avaibility_url'=>$this->input->post('url'),
					// 'address'=>$this->input->post('address'),
					// 'lat'=>$this->input->post('lat'),
					// 'lng'=>$this->input->post('lng'),
					// 'type'=>0,
					// 'admin_status'=>1,
					// 'create_at'=>militime,
					// 'update_at'=>militime
					// );

					// $title = $this->input->post('title');
					
					// $insert_id = $this->common_model->common_insert('event',$event);

	        		//if($insert_id)
	        		//{ 
					 	if(isset($_FILES['image']['name'][0]) && $_FILES['image']['name'][0] != '')
		        		{  
				            $files = $_FILES;	
				        	$filesCount1 = count($_FILES['image']['name']);
		        	    
		        	        for($i = 0; $i < $filesCount1; $i++)
		        	        {
			        	            $_FILES['image']['name'] =  $files['image']['name'][$i];
			        	            $_FILES['image']['type'] =   $files['image']['type'][$i];
					                $_FILES['image']['tmp_name'] =  $files['image']['tmp_name'][$i];
					                $_FILES['image']['error'] =  $files['image']['error'][$i];
					                $_FILES['image']['size'] =  $files['image']['size'][$i];

					                $date = date("ymdhis"); 	
			        	            $uploadPath = 'uploads/event_image/';
			                        $config['upload_path'] = $uploadPath;
			                        $config['allowed_types'] = 'jpeg|png|jpg';
			                        $config['max_size']      = 500; 
					                $config['max_width'] = '700';
					                $config['max_height'] = '500';


				                        $subFileName = explode('.',$_FILES['image']['name']);
				                        $ExtFileName = end($subFileName);

		                      	    	$config['file_name'] = md5($date.$_FILES['image']['name']).'.'.$ExtFileName;

		                            	$fileName = $config['file_name'];
		                           		$fileName11[] = $config['file_name'];
		                           		//$fileName[] = $_FILES['image']['name'];

			                       		$this->load->library('upload', $config);
			                       		$this->upload->initialize($config);

		                       		    if($this->upload->do_upload('image'))
	                           		 	{
				                        	$fileData = $this->upload->data();
				                        	$uploadData[$i]['file_name'] = $fileData['file_name'];
				                            $image_arr[] = $uploadData[$i]['file_name'];
	                            		}
	                            		else
	                            		{
		                            		$this->data['err'] = $this->upload->display_errors();
		                            		$this->session->set_flashdata('image_error', $this->data['err']);
		                            		redirect('event/add_event/');exit;
	                            		}	
		        	        } 

		        	          $image = $fileName11[0];
		              	}


		              		$start_date = $this->input->post('start_date');
			 				$end_date = $this->input->post('end_date');

					 		if($end_date < $start_date)
					 		{
					 		  $this->session->set_flashdata('datefailed', 'End date should not be less from start date.');
							  redirect('event/add_event');
					 		}
          
		          			$event = array(
							'title' =>$this->input->post('title'),
							'description' =>$this->input->post('description'),
							'start_date_time' =>$this->input->post('start_date').' '.$this->input->post('start_time').':00',
							'end_date_time'=>$this->input->post('end_date').' '.$this->input->post('end_time').':00',
							'hosted_by'=>$this->input->post('hosted_by'),
							'address'=>$this->input->post('address'),
							'lat'=>$this->input->post('lat'),
							'lng'=>$this->input->post('lng'),
							'type'=>0,
							'admin_status'=>1,
							'create_at'=>militime,
							'update_at'=>militime
							);

								$title = $this->input->post('title');
								
								$insert_id = $this->common_model->common_insert('event',$event);

							if($insert_id)
							{
								for($i = 0; $i < count($image_arr); $i++)
		        	        	{
		        	        		$event_image = array('event_id'=>$insert_id,'image'=>$image_arr[$i],'create_at'=>militime,'update_at'=>militime);

		                        	$insert = $this->common_model->common_insert('event_image',$event_image);
		        	        	}

							}


	        			$user_data = $this->common_model->getDataField('device_token,user_id','users',array());

                    	$gcmRegIds = array();
                		$i = 0;
                		foreach($user_data as $user_device_token)
                		{
                		  $i++;
                          $gcmRegIds[floor($i/1000)][] = $user_device_token->device_token;

                          $userid_arr[] = $user_device_token->user_id;
                		}
                            $msg = $title.' '.'Event Added';
                		    $pushMessage=array("title" =>$title,"user_id"=>'',"section_id"=>$insert_id,"message" => $msg,"image"=>base_url().'uploads/event_image/'.$image,"type"=>'2',"currenttime"=>militime);
                       
                			if(isset($gcmRegIds)) 
                			{  
		                    	$message = $pushMessage;
		                    	$pushStatus = array();
	                    
	                    		foreach($gcmRegIds as $val){ $pushStatus[] = $this->common_model->sendNotification($val, $message);
                     			}

                      $user_id_in_comma = implode(",",$userid_arr);	
                      $insertnoti = $this->common_model->common_insert('notification',array('sender_id'=>'0','receiver_id'=>$user_id_in_comma,'section_id'=>$insert_id,'type'=>'2','title'=>$title,'msg'=>$msg,'image'=>$image,'create_at'=>militime,'update_at'=>militime));

                 			}
	        				//End Notification
		              		$this->session->set_flashdata('success', 'Event Inserted Successfully.');
					  		redirect('event');
	        			//}
	  			
			}
	} 
          	$this->load->view('admin/event/add_event');
}

public function edit($event_id=false)
{ 
	$data['event_data'] = $this->common_model->common_getRow('event',array('event_id'=>$event_id));

	$data['event_image'] = $this->common_model->getData('event_image',array('event_id'=>$event_id));



	if($this->input->server('REQUEST_METHOD') === 'POST')
	{ 
		  	$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('description', 'Description', 'required');

			if($this->form_validation->run() == TRUE)
			{ 
				if(isset($_FILES['image']['name'][0]) && $_FILES['image']['name'][0] != '')
		        {  
				            $files = $_FILES;	
				        	$filesCount1 = count($_FILES['image']['name']);
		        	    
		        	        for($i = 0; $i < $filesCount1; $i++)
		        	        {
			        	            $_FILES['image']['name'] =  $files['image']['name'][$i];
			        	            $_FILES['image']['type'] =   $files['image']['type'][$i];
					                $_FILES['image']['tmp_name'] =  $files['image']['tmp_name'][$i];
					                $_FILES['image']['error'] =  $files['image']['error'][$i];
					                $_FILES['image']['size'] =  $files['image']['size'][$i];

					                 $date = date("ymdhis"); 	
			        	             $uploadPath = 'uploads/event_image/';
			                         $config['upload_path'] = $uploadPath;
			                         $config['allowed_types'] = 'jpg|png|jpeg';
			                         $config['max_size']      = 500; 
					                 $config['max_width'] = '700';
					                 $config['max_height'] = '500';


				                        $subFileName = explode('.',$_FILES['image']['name']);
				                        $ExtFileName = end($subFileName);

		                      	    	$config['file_name'] = md5($date.$_FILES['image']['name']).'.'.$ExtFileName;

		                            	$fileName = $config['file_name'];
		                            	$fileName11[] = $config['file_name'];
		                           		
			                       		$this->load->library('upload', $config);
			                       		$this->upload->initialize($config);

		                       			if($this->upload->do_upload('image'))
		                           		{
			                        	  $fileData = $this->upload->data();
			                              $uploadData[$i]['file_name'] = $fileData['file_name'];

			                               $event_image = array('event_id'=>$event_id,'image'=>$uploadData[$i]['file_name'],'create_at'=>militime,'update_at'=>militime);

		                        			$insert = $this->common_model->common_insert('event_image',$event_image);
		                            	}
		                            	else
		                            	{
		                            		$this->data['err'] = $this->upload->display_errors();
		                            		$this->session->set_flashdata('image_error', $this->data['err']);
		                            		redirect('event/edit/'.$event_id);exit;
		                            	}
		        	        } 
		        	    $image = $fileName11[0];         
		        }
		        else
		        {
		        	if(!empty($data['event_image'][0]->image))
		        	{
		        		$image = $data['event_image'][0]->image;
		        	}	
		        	else
		        	{
		        		$image = '';
		        	}	

		        }	
          			$event = array(
					'title' =>$this->input->post('title'),
					'description' =>$this->input->post('description'),
					'start_date_time' =>$this->input->post('start_date').' '.$this->input->post('start_time').':00',
					'end_date_time'=>$this->input->post('end_date').' '.$this->input->post('end_time').':00',
					'hosted_by'=>$this->input->post('hosted_by'),
					// 'avaibility_url'=>$this->input->post('url'),
					'address'=>$this->input->post('address'),
					'lat'=>$this->input->post('lat'),
					'lng'=>$this->input->post('lng'),
					'create_at'=>militime,
					'update_at'=>militime
					);
					
          		    $update = $this->common_model->updateData('event',$event,array('event_id'=>$event_id));

        			if($update)
        			{
                        $title = $this->input->post('title');
        				$user_data = $this->common_model->getDataField('device_token,user_id','users',array());

                   
                    	$gcmRegIds = array();
                		$i = 0;
                		foreach($user_data as $user_device_token)
                		{    
                     		$i++;
                    		$gcmRegIds[floor($i/1000)][] = $user_device_token->device_token;
                    		$userid_arr[] = $user_device_token->user_id;
                		}
                          
                            $msg = $title.' '.'Event Has Been Updated'; 
                		    $pushMessage=array("title" =>$title,"user_id"=>'','section_id'=>$event_id,"message" =>$msg,'image'=>base_url().'uploads/event_image/'.$image,"type"=>'2',"currenttime"=>militime);
                       
                			if(isset($gcmRegIds)) 
                			{  
		                    	$message = $pushMessage;
		                    	$pushStatus = array();
	                    
	                    		foreach($gcmRegIds as $val){ $pushStatus[] = $this->common_model->sendNotification($val, $message);
                     			}

                      $user_id_in_comma = implode(",",$userid_arr);			
                      $insertnoti = $this->common_model->common_insert('notification',array('sender_id'=>'0','receiver_id'=>$user_id_in_comma,'section_id'=>$event_id,'type'=>'2','title'=>$title,'msg'=>$msg,'image'=>$image,'create_at'=>militime,'update_at'=>militime));

                 			}

	              		$this->session->set_flashdata('success', 'Event Updated Successfully.');
				  		redirect('event');
        			}
	  			
			}
	} 
          	$this->load->view('admin/event/edit_event',$data);

}

public function  delete()
{  
	$event_id = $this->input->post('event_id');
	$status_update = $this->db->query("UPDATE `event` SET `delete_status` = 1 WHERE `event_id` IN($event_id)");
	if($status_update)
	{
		echo $event_id;
	}
}

public function user_event()
{
	$data['event_data'] = $this->db->query("SELECT * FROM `event` WHERE `type` = 1 AND `admin_status` IN(0,1) AND `delete_status` = 0 ORDER BY `event_id` DESC")->result();
	//= $this->common_model->getData('event',array('type'=>1,'delete_status'=>0),'event_id','DESC');
	$this->load->view('admin/event/event_detail',$data);	

}

public function detail($event_id=false)
{
   $data['event_data'] = $this->common_model->common_getRow('event',array('event_id'=>$event_id)); 

   $data['event_image'] = $this->common_model->getData('event_image',array('event_id'=>$event_id));

   $going = $this->db->query("SELECT COUNT(response_status) as going FROM `event_response` WHERE `event_id`= $event_id AND `response_status`= 1")->result();

   $going_count = '0';

   if(!empty($going))
   {
   	  $going_count = $going[0]->going;
   }

   $may_be = $this->db->query("SELECT COUNT(response_status) as maybe FROM `event_response` WHERE `event_id`= $event_id AND `response_status`= 2")->result();

   $maybe_count = '0';
   
   if(!empty($may_be))
   {
   	  $maybe_count = $may_be[0]->maybe; 
   }

   $not_going = $this->db->query("SELECT COUNT(response_status) as not_going FROM `event_response` WHERE `event_id`= $event_id AND `response_status`= 3")->result();

   $notgoing_count = '0';
   
   if(!empty($not_going))
   {
   	  $notgoing_count = $not_going[0]->not_going; 
   }

	$arr = array('going_count'=>$going_count,
	 			'maybe_count'=>	$maybe_count,
	 			'notgoing_count'=>$notgoing_count
	 	);

	$data['response_count'] = $arr;

   $this->load->view('admin/event/detail',$data);

}

public function remove_img()
{	
	$image_id =  $this->input->post('image_id');

	$delete = $this->common_model->deleteData('event_image',array('image_id'=>$image_id));

	if($delete)
	{
		echo $image_id;
	}

}

public function event_status()
{
   $status = $this->input->post('status');
   $event_id = $this->input->post('event_id'); 
 
   	  $status_data = array('admin_status'=>$status);
   	  $status_update = $this->common_model->updateData('event',$status_data,array('event_id'=>$event_id));

   	  if($status_update)
   	  {

   	  	    if($status == 1)
   	  		{
   	  	 		$msg = "Your Event has been Verified by Admin."; 
   	  	 		$title = 'Verified';
   	  		}
   	  		else if($status == 2)
   	  		{
            	$msg = "Your Event has been Rejected by Admin."; 
            	$title = 'Rejected';
   	  		}	

   	  	    $get_user_id = $this->common_model->common_getRow('event',array('event_id'=>$event_id));

   	  	    if($get_user_id->type == 1)
   	  	    { 
	   	  	
	        	    $user_id = $get_user_id->user_id;

	           $user_devicetoken = $this->common_model->common_getRow('users',array('user_id'=>$user_id));

	            	if(!empty($user_devicetoken->device_token))
	            	{
	            		 $message = array("title"=>$title,"type"=>4,"message" =>$msg,"image" =>'',"currenttime"=>militime);

	                     $this->common_model->sendPushNotification($user_devicetoken->device_token,$message);
	            	}	

	            $insertnoti = $this->common_model->common_insert('notification',array('sender_id'=>'0','receiver_id'=>$user_id,'type'=>'4','title'=>$title,'msg'=>$msg,'create_at'=>militime,'update_at'=>militime));
	            echo '1000'; exit;
   	  	   }
   	  	else
   	  	{
   	  		echo '1000';exit;
   	  	}	
   	  	 
   	  }	
}
 
public function archived_event()
{ 
	//$data['event_data'] = $this->common_model->getData('event',array('admin_status'=>2),'event_id','DESC');
	$data['event_data'] = $this->db->query("SELECT * FROM `event` WHERE `admin_status`= 2  OR `delete_status` = 1 ORDER BY `event_id` DESC")->result();

	$this->load->view('admin/event/archived_event',$data);	
}

public function going_user($event_id = false)
{   $data = '';
    $user_arr = array();
	$data['going_user'] = $this->common_model->getData('event_response',array('response_status'=>1,'event_id'=>$event_id),'response_id','DESC');

	if(!empty($data['going_user']))
	{
		foreach($data['going_user'] as $userinfo)
		{
			$user_id  = $userinfo->user_id;

   			$user_info = $this->common_model->common_getRow('users',array('user_id'=>$user_id)); 

   			$user_arr[] = $user_info;
		}	
	}	

	$data['user_data'] = $user_arr;

	$this->load->view('admin/event/event_response',$data);
}

public function intrested($event_id = false)
{ 
    $data = '';
    $user_arr = array();
	$data['intrested_user'] = $this->common_model->getData('event_response',array('response_status'=>2,'event_id'=>$event_id),'response_id','DESC');

	if(!empty($data['intrested_user']))
	{
		foreach($data['intrested_user'] as $userinfo)
		{
			$user_id  = $userinfo->user_id;

   			$user_info = $this->common_model->common_getRow('users',array('user_id'=>$user_id)); 

   			$user_arr[] = $user_info;
		}	
	}	

	$data['user_data'] = $user_arr;

	$this->load->view('admin/event/event_response',$data);
}

public function ignored($event_id = false)
{ 
    $data = '';
    $user_arr = array();
	$data['ignored_user'] = $this->common_model->getData('event_response',array('response_status'=>3,'event_id'=>$event_id),'response_id','DESC');

	if(!empty($data['ignored_user']))
	{
		foreach($data['ignored_user'] as $userinfo)
		{
			$user_id  = $userinfo->user_id;

   			$user_info = $this->common_model->common_getRow('users',array('user_id'=>$user_id)); 

   			$user_arr[] = $user_info;
		}	
	}	

	$data['user_data'] = $user_arr;

	$this->load->view('admin/event/event_response',$data);
}

public function  reject_event()
{  
	$event_id = $this->input->post('event_id');
	$status_update = $this->db->query("UPDATE `event` SET `admin_status` = 2 WHERE `event_id` IN($event_id)");
	if($status_update)
	{
		echo $event_id;
	}
}

public function  active_event1()
{  
	$event_id = $this->input->post('event_id');
	$status_update = $this->db->query("UPDATE `event` SET `admin_status` = 1,`delete_status`= 0 WHERE `event_id` IN($event_id)");
	if($status_update)
	{
		echo $event_id;
	}
}

public function active_event()
{
	$event_id = $this->input->post('event_id');
    $event_arr = explode(",",$event_id);

    for($j=0;$j<count($event_arr);$j++)
    {
        $already_active = $this->common_model->common_getRow('event',array('event_id'=>$event_arr[$j]));

        if($already_active->admin_status == 1)
        {
        	continue;
        }
        else
        { 
            $status_update = $this->common_model->updateData('event',array('admin_status'=>1),array('event_id'=>$event_arr[$j]));

            if($status_update)
            {
            	$title = $already_active->title;
            	$user_id = $already_active->user_id;

                $get_image = $this->common_model->common_getRow('event_image',array('event_id'=>$event_arr[$j]));

                $image = '';
            	if(!empty($get_image->image)) { $image = $get_image->image; }

            	$msg = "Your '".$title."' Event has been Verified by Admin."; 

            	$user_devicetoken = $this->common_model->common_getRow('users',array('user_id'=>$user_id));

            	if(!empty($user_devicetoken->device_token))
            	{
            		$noti_message = array("title"=>$title,"user_id"=>$user_id,"type"=>'4','section_id'=>$event_arr[$j],"message" =>$msg,"image" =>base_url().'uploads/event_image/'.$image,"currenttime"=>militime);

                     $this->common_model->sendPushNotification($user_devicetoken->device_token,$noti_message);
            	}

	            $insertnoti = $this->common_model->common_insert('notification',array('sender_id'=>'0','receiver_id'=>$user_id,'user_id'=>$user_id,'section_id'=>$event_arr[$j],'type'=>'4','title'=>$title,'msg'=>$msg,'image'=>$image,'create_at'=>militime,'update_at'=>militime));
	            if($insertnoti)
	            {
                    $user_data = $this->common_model->getDataField('device_token,user_id','users',array());

                    	$gcmRegIds = array();
                		$i = 0;
                		foreach($user_data as $user_info)
                		{
                		  $i++;

                		  if($user_info->device_token != $user_devicetoken->device_token)
                		  {
                		  	 $gcmRegIds[floor($i/1000)][] = $user_info->device_token;
                              $userid_arr[] = $user_info->user_id;
                		  }	

                		}
                           $msg1 = $title.' '.'Event Added';
                		   $pushMessage=array("title" =>$title,"user_id" => '','section_id' =>$event_arr[$j],"message" =>$msg1,'image'=>base_url().'uploads/event_image/'.$image,"type"=>'2',"currenttime"=>militime);
                       
                			if(isset($gcmRegIds)) 
                			{  
		                    	$message = $pushMessage;
		                    	$pushStatus = array();
	                    
	                    		foreach($gcmRegIds as $val){ $pushStatus[] = $this->common_model->sendNotification($val, $message);
                     			}
                     		$user_id_in_comma = implode(",",$userid_arr);	

                      $insertnotification = $this->common_model->common_insert('notification',array('sender_id'=>'0','receiver_id'=>$user_id_in_comma,'section_id'=>$event_arr[$j],'type'=>'2','title'=>$title,'msg'=>$msg1,'image'=>$image,'create_at'=>militime,'update_at'=>militime));

                 			}

	            }	


            }	

         }	
    }
     echo $event_id;	
}

	
}
