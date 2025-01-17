 <?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {
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
	 $data['project_data'] = $this->common_model->getData('project',array('user_id'=>0,'delete_status'=>0),'project_id','DESC');

	  $this->load->view('admin/project/project_detail',$data);	
}

public function add_project()
{ 
	if($this->input->server('REQUEST_METHOD') === 'POST')
	{ 
		  	$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('description', 'Description', 'required');

			if($this->form_validation->run() == TRUE)
			{ 
	  				
			 	// 	$address = $this->input->post('address');

			 	// 	$string = str_replace(" ","+",$address);
					// $chk_url='http://maps.google.com/maps/api/geocode/json?address='.$string.'&sensor=false';
					// $geocode = file_get_contents($chk_url);
					// $output = json_decode($geocode);
				
					// $lat = $output->results[0]->geometry->location->lat;
					// $lng = $output->results[0]->geometry->location->lng;
          
     //      			$project = array(
					// 'title' =>$this->input->post('title'),
					// 'description' =>$this->input->post('description'),
					// 'brief_description'=>$this->input->post('brief_description'),
					// 'admin_status'=>1,
					// 'lat'=>$lat,
					// 'lng'=>$lng,
					// 'start_date'=>$this->input->post('start_date'),
					// 'end_date'=>$this->input->post('end_date'),
					// 'address'=>$this->input->post('address'),
					// 'create_at' =>militime,
					// 'update_at'=>militime
					
					// );

					// $insert_id = $this->common_model->common_insert('project',$project);
	        		/*if($insert_id)
	        		{*/
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
			        	             $uploadPath = 'uploads/project_image/';
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
	                            			redirect('project/add_project/');exit;
		                            	}	
		        	        } 

		        	          $image = $fileName11[0];
		              	}

		              	$address = $this->input->post('address');

				 		$string = str_replace(" ","+",$address);
						$chk_url='http://maps.google.com/maps/api/geocode/json?address='.$string.'&sensor=false';
						$geocode = file_get_contents($chk_url);
						$output = json_decode($geocode);

						if(!empty($output->results))
						{
							$lat = $output->results[0]->geometry->location->lat;
						    $lng = $output->results[0]->geometry->location->lng;
						}
						else
						{
						   $lat  = '';
						   $lng = '';
						}
					
						//$lat = $output->results[0]->geometry->location->lat;
						//$lng = $output->results[0]->geometry->location->lng;
	          
	          			$project = array(
						'title' =>$this->input->post('title'),
						'description' =>$this->input->post('description'),
						'brief_description'=>$this->input->post('brief_description'),
						'admin_status'=>1,
						'lat'=>$lat,
						'lng'=>$lng,
						'hosted_by'=>$this->input->post('hosted_by'),
						'start_date'=>$this->input->post('start_date'),
						'end_date'=>$this->input->post('end_date'),
						'address'=>$this->input->post('address'),
						'create_at' =>militime,
						'update_at'=>militime
						
						);

						$insert_id = $this->common_model->common_insert('project',$project);

						if($insert_id)
						{
							for($i = 0; $i < count($image_arr); $i++)
		        	        {
	        	        		$project_image = array('project_id'=>$insert_id,'image'=>$image_arr[$i],'create_at'=>militime,'update_at'=>militime);

	                        	$insert = $this->common_model->common_insert('project_image',$project_image);
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
                            $msg = $this->input->post('title').' '.'Project Added'; 
                		    $pushMessage=array("title" =>$title,"user_id"=>'','section_id'=>$insert_id,"message" =>$msg,'image'=>base_url().'uploads/project_image/'.$image,"type"=>'7',"currenttime"=>militime);
                       
                			if(isset($gcmRegIds)) 
                			{  
		                    	$message = $pushMessage;
		                    	$pushStatus = array();
	                    
	                    		foreach($gcmRegIds as $val){ $pushStatus[] = $this->common_model->sendNotification($val, $message);
                     			}

                      $user_id_in_comma = implode(",",$userid_arr);			
                      $insertnoti = $this->common_model->common_insert('notification',array('sender_id'=>'0','receiver_id'=>$user_id_in_comma,'section_id'=>$insert_id,'type'=>'7','title'=>$this->input->post('title'),'msg'=>$msg,'image'=>$image,'create_at'=>militime,'update_at'=>militime));

                 			}	

		              	$this->session->set_flashdata('success', 'Project Inserted Successfully.');
					  	redirect('project');
	        		//}

			}
	} 
          	$this->load->view('admin/project/add_project');
}

public function edit($project_id=false)
{ 
	$data['project_data'] = $this->common_model->common_getRow('project',array('project_id'=>$project_id));
	$data['project_image'] = $this->common_model->getData('project_image',array('project_id'=>$project_id));

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
			        	             $uploadPath = 'uploads/project_image/';
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

			                              $project_image = array('project_id'=>$project_id,'image'=>$uploadData[$i]['file_name'],'create_at'=>militime,'update_at'=>militime);

		                        		  $insert = $this->common_model->common_insert('project_image',$project_image);
		                            	}
		                            	else
		                            	{
		                            		$this->data['err'] = $this->upload->display_errors();
		                            		$this->session->set_flashdata('image_error', $this->data['err']);
		                            		redirect('project/edit/'.$project_id);exit;
		                            	}	
		        	        } 
		        	    $image = $fileName11[0];         
		        }
		        else
		        {
		        	if(!empty($data['project_image'][0]->image))
		        	{
		        		$image = $data['project_image'][0]->image;
		        	}
		        	else
		        	{
		        		$image = '';
		        	}	
		        	
		        }

		            $address = $this->input->post('address');

			 		$string = str_replace(" ","+",$address);
					$chk_url='http://maps.google.com/maps/api/geocode/json?address='.$string.'&sensor=false';
					$geocode = file_get_contents($chk_url);
					$output = json_decode($geocode);
					if(!empty($output))
					{ 
						$lat = $output->results[0]->geometry->location->lat;
					    $lng = $output->results[0]->geometry->location->lng;
					}	
					else
					{
						 $lat ='';
						 $lng = '';
					}	
				
					
          			$project = array(
					'title' =>$this->input->post('title'),
					'description' =>$this->input->post('description'),
					'brief_description'=>$this->input->post('brief_description'),
					'lat'=>$lat,
					'lng'=>$lng,
					'hosted_by'=>$this->input->post('hosted_by'),
					'start_date'=>$this->input->post('start_date'),
					'end_date'=>$this->input->post('end_date'),
					'address'=>$this->input->post('address'),
					'create_at'=>militime,
					'update_at'=>militime
					);
					
          		    $update = $this->common_model->updateData('project',$project,array('project_id'=>$project_id));
        			if($update)
        			{
	              		$this->session->set_flashdata('success', 'Project Updated Successfully.');
				  		redirect('project');
        			}
	  			
			}
	} 
          	$this->load->view('admin/project/edit_project',$data);

}
//All details of Article
public function detail($project_id=false)
{
   $data['project_data'] = $this->common_model->common_getRow('project',array('project_id'=>$project_id)); 

   $data['project_image'] = $this->common_model->getData('project_image',array('project_id'=>$project_id));
   
   $this->load->view('admin/project/details',$data);

}

public function delete()
{  
	$project_id = $this->input->post('project_id');

	$delete = $this->db->query("DELETE FROM `project` WHERE `project_id` IN($project_id)");

	if($delete)
	{
        $this->db->query("DELETE FROM `project_image` WHERE `project_id` IN($project_id)");

        $this->db->query("DELETE FROM `project_upvote` WHERE `project_id` IN($project_id)");

        $this->db->query("DELETE FROM `comment` WHERE `project_id` IN($project_id) AND `type`='project'");

        $this->db->query("DELETE FROM `notification` WHERE `section_id` IN($project_id) AND `type` IN(6,17,7,8)");
	}

	echo $project_id;
}

public function user_project()
{
  $data['project_data'] = $this->db->query("SELECT * FROM `project` WHERE `user_id` != 0 AND `delete_status`= 0 AND `admin_status` IN(0,1)")->result();
  $this->load->view('admin/project/project_detail',$data);	
}

public function remove_img()
{	
	$image_id =  $this->input->post('image_id');

	$delete = $this->common_model->deleteData('project_image',array('image_id'=>$image_id));

	if($delete)
	{
		echo $image_id;
	}

}

public function project_status()
{
   $status = $this->input->post('status');
   $project_id = $this->input->post('project_id'); 
 
   	  $status_data = array('admin_status'=>$status);
   	  $status_update = $this->common_model->updateData('project',$status_data,array('project_id'=>$project_id));

   	  if($status_update)
   	  {
   	  	    if($status == 1)
   	  		{
   	  	 		$msg = "Your Project has been Verified by Admin."; 
   	  	 		$title = 'Verified';
   	  		}
   	  		else if($status == 2)
   	  		{
            	$msg = "Your Project has been Rejected by Admin."; 
            	$title = 'Rejected';
   	  		}	

   	  	    $get_user_id = $this->common_model->common_getRow('project',array('project_id'=>$project_id));

   	  	    if(!empty($get_user_id))
   	  	    { 
	        	    $user_id = $get_user_id->user_id;

	            	$user_devicetoken = $this->common_model->common_getRow('users',array('user_id'=>$user_id));

	            	if(!empty($user_devicetoken->device_token))
	            	{
	            		 $message = array("title"=>$title,"type"=>8,"message" =>$msg,"image"=>'',"currenttime"=>militime);

	                     $this->common_model->sendPushNotification($user_devicetoken->device_token,$message);
	            	}	

	            $insertnoti = $this->common_model->common_insert('notification',array('sender_id'=>'0','receiver_id'=>$user_id,'type'=>'8','title'=>$title,'msg'=>$msg,'create_at'=>militime,'update_at'=>militime));
	            echo '1000'; exit;
   	  	   }
   	  	   else
   	  	   {
   	  		 echo '1000';exit;
   	  	   }	
   	  }	
}

public function user_comment($project_id = false)
{
   $arr  = array();	
   $data = '';
   $comment =  $this->db->query("SELECT * FROM comment WHERE `project_id`= $project_id AND `type`= 'project' ORDER BY `comment_id` DESC")->result();

    if(!empty($comment))
    {
    	foreach($comment as $feed)
    	{
			$userdata = $this->common_model->common_getRow('users',array('user_id'=>$feed->user_id));

			if(!empty($userdata))
			{
				$useraname = $userdata->username.' '.$userdata->user_surname;
				$userpic = $userdata->image;
			}
			else
			{
				$username = '';	
    			$userpic = '';
			}	

	         
			$arr[] = array(
					   'comment_id'=>$feed->comment_id,
					   'username'=>	$useraname,
					   'userpic'=>$userpic,
					   'comment'=>$feed->comment,
					   'comment_date'=>$feed->create_at
					);

    	}	
    	$data['comment_data'] = $arr;
    } 	
	   $this->load->view('admin/project/user_comment',$data);

}

public function  delete_user_comment($comment_id=false)
{  
	$delete = $this->common_model->deleteData('comment',array('comment_id'=>$comment_id,'type'=>'project'));

	if($delete)
	{
		echo "1000"; exit;
	}
}

public function archived_project()
{ 
	$data['project_data'] = $this->common_model->getData('project',array('admin_status'=>2),'project_id','DESC');

	$this->load->view('admin/project/Archived_project',$data);	
}

public function  reject_project()
{  
	$project_id = $this->input->post('project_id');
	$status_update = $this->db->query("UPDATE `project` SET `admin_status` = 2 WHERE `project_id` IN($project_id)");
	if($status_update)
	{
		echo $project_id;
	}
}

public function active_project1()
{  
	$project_id = $this->input->post('project_id');
	$status_update = $this->db->query("UPDATE `project` SET `admin_status` = 1 WHERE `project_id` IN($project_id)");

	if($status_update)
	{
		echo $project_id;
	}
}

public function active_project()
{
	$project_id = $this->input->post('project_id');
    $project_arr = explode(",",$project_id);

    for($j=0;$j<count($project_arr);$j++)
    {
        $already_active = $this->common_model->common_getRow('project',array('project_id'=>$project_arr[$j]));

        if($already_active->admin_status == 1)
        { 
        	continue;
        }
        else
        { 
            $status_update = $this->common_model->updateData('project',array('admin_status'=>1),array('project_id'=>$project_arr[$j]));

            if($status_update)
            {
            	$title = $already_active->title;
            	$user_id = $already_active->user_id;

                $get_image = $this->common_model->common_getRow('project_image',array('project_id'=>$project_arr[$j]));

                $image = '';
                if(!empty($get_image->image))
                {
                  $image = $get_image->image;
                }	

            	$msg = "Your '".$title."' Project has been Verified by Admin."; 

            	$user_devicetoken = $this->common_model->common_getRow('users',array('user_id'=>$user_id));

            	if(!empty($user_devicetoken->device_token))
            	{
            		$message1 = array("title"=>$title,"user_id"=>'','section_id'=>$project_arr[$j],"type"=>8,"message" =>$msg,"image" =>base_url().'uploads/project_image'.$image,"currenttime"=>militime);

                     $this->common_model->sendPushNotification($user_devicetoken->device_token,$message1);
            	}

	            $insertnoti = $this->common_model->common_insert('notification',array('sender_id'=>'0','receiver_id'=>$user_id,'user_id'=>$user_id,'section_id'=>$project_arr[$j],'type'=>'8','title'=>$title,'msg'=>$msg,'image'=>$image,'create_at'=>militime,'update_at'=>militime));
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
                           $msg1 = $title.' '.'Project Added';
                		   $pushMessage=array("title" =>$title,"user_id"=>'','section_id'=>$project_arr[$j],"message" => $msg1,'image'=>base_url().'uploads/project_image/'.$image,"type"=>'7',"currenttime"=>militime);
                       
                			if(isset($gcmRegIds)) 
                			{  
		                    	$message = $pushMessage;
		                    	$pushStatus = array();
	                    
	                    		foreach($gcmRegIds as $val){ $pushStatus[] = $this->common_model->sendNotification($val, $message);
                     			}
                     		$user_id_in_comma = implode(",",$userid_arr);	

                      $insertnotification = $this->common_model->common_insert('notification',array('sender_id'=>'0','receiver_id'=>$user_id_in_comma,'section_id'=>$project_arr[$j],'type'=>'7','title'=>$title,'msg'=>$msg1,'image'=>$image,'create_at'=>militime,'update_at'=>militime));

                 			}

	            }	

            }	

        }	
    }
   echo $project_id; 	
}

}





