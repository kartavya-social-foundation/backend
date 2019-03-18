 <?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller {
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
	$data['task_data'] = $this->common_model->getData('task',array('delete_status'=>0),'task_id','DESC');

	$this->load->view('admin/task/task_detail',$data);	
}

public function add_task()
{ 
	if($this->input->server('REQUEST_METHOD') === 'POST')
	{ 
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');

			if($this->form_validation->run() == TRUE)
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
	        	            $uploadPath = 'uploads/task_image/';
	                        $config['upload_path'] = $uploadPath;
	                        $config['allowed_types'] = 'jpg|jpeg|gif|png';

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
				 				$this->session->set_flashdata('error_pic', 'Please Select png,jpg,jpeg File Type.');
			 	 				redirect('task/add_task');
			 	 				exit;
                            }
		        	         
		        }
		        else
		        {
		        	$image = '';
		        }	
          			$task = array(
					'title' =>$this->input->post('title'),
					'category_id'=>$this->input->post('category_id'),
					'description' =>$this->input->post('description'),
					'organised_by'=>'Admin',
					'task_type'=>$this->input->post('task_type'),
					'start_date'=>$this->input->post('start_date'),
					'end_date'=>$this->input->post('end_date'),
					'image'=>$image,
					'admin_status'=>1,
					'create_at' =>militime,
					'update_at'=>militime
					);

					$insert_id = $this->common_model->common_insert('task',$task);
	        		if($insert_id)
	        		{
		              	$user_data = $this->common_model->getDataField('device_token,user_id','users',array());

                    	$gcmRegIds = array();
                		$i = 0;
                		foreach($user_data as $user_device_token)
                		{
                		  $i++;
                          $gcmRegIds[floor($i/1000)][] = $user_device_token->device_token;
                          $userid_arr[] = $user_device_token->user_id;
                		}
                            $msg  = $this->input->post('title').' '.'Task Added';
                		    $pushMessage=array("title" =>$this->input->post('title'),"user_id"=>'','section_id'=>$insert_id,"message" =>$msg,'image'=>'',"type"=>'13',"currenttime"=>militime);
                       
                			if(isset($gcmRegIds)) 
                			{  
		                    	$message = $pushMessage;
		                    	$pushStatus = array();
	                    
	                    		foreach($gcmRegIds as $val){ $pushStatus[] = $this->common_model->sendNotification($val, $message);
                     			}
                      $user_id_in_comma = implode(",",$userid_arr);				
                      $insertnoti = $this->common_model->common_insert('notification',array('sender_id'=>'0','receiver_id'=>$user_id_in_comma,'section_id'=>$insert_id,'type'=>'13','title'=>$this->input->post('title'),'msg'=>$msg,'image'=>'','create_at'=>militime,'update_at'=>militime));

                 			}	

		              	$this->session->set_flashdata('success', 'Task Inserted Successfully.');
					  	redirect('task');
	        		}

			}
	}

	$data['category'] = $this->common_model->getData('category',array(),'category_name','ASC');

    $this->load->view('admin/task/add_task',$data);
}

public function edit($task_id=false)
{ 
	$data['task_data'] = $this->common_model->common_getRow('task',array('task_id'=>$task_id));
	$data['category_data'] = $this->common_model->getData('category',array());

	if($this->input->server('REQUEST_METHOD') === 'POST')
	{ 
		  	$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('description', 'Description', 'required');

			if($this->form_validation->run() == TRUE)
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
	        	            $uploadPath = 'uploads/task_image/';
	                        $config['upload_path'] = $uploadPath;
	                        $config['allowed_types'] = 'jpg|jpeg|gif|png';

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
				 				$this->session->set_flashdata('error_pic', 'Please Select png,jpg,jpeg,gif File Type.');
			 	 				redirect('task/edit/'.$task_id);
			 	 				exit;
                            }
		        }
		        else
		        {
		        	$image = $data['task_data']->image;
		        }
          			$group = array(
					'title' =>$this->input->post('title'),
					'category_id'=>$this->input->post('category_id'),
					'description' =>$this->input->post('description'),
					'task_type'=>$this->input->post('task_type'),
					'end_date'=>$this->input->post('end_date'),
					'image'=>$image,
					'admin_status'=>1,
					'create_at' =>militime,
					'update_at'=>militime
					);

          		    $update = $this->common_model->updateData('task',$group,array('task_id'=>$task_id));
        			if($update)
        			{
	              		$this->session->set_flashdata('success', 'Task Updated Successfully.');
				  		redirect('task');
        			}
	  			
			}
	} 
		 $data['category'] = $this->common_model->getData('category',array());
         $this->load->view('admin/task/edit_task',$data);

}

public function  delete()
{  
	$task_id = $this->input->post('task_id');
    $status = $this->input->post('status');
	//$status_update = $this->common_model->updateData('task',array('delete_status'=>$status),array('task_id'=>$task_id));
    $status_update = $this->db->query("UPDATE `task` SET `delete_status` = $status WHERE `task_id` IN($task_id)");
	
	if($status_update)
	{
		echo $task_id;
	}
}

public function detail($task_id=false)
{
   $data['task_data'] = $this->common_model->common_getRow('task',array('task_id'=>$task_id)); 

   $this->load->view('admin/task/detail',$data);

}

public function join_request()
{ 
	$join_arr = array();
	$data = '';
	$request_data = $this->common_model->getData('join_user',array('type'=>'task'),'join_id','DESC');

	if(!empty($request_data))
    {
    	foreach($request_data as $request)
    	{
    	 	$userdata = $this->common_model->common_getRow('users',array('user_id'=>$request->user_id)); 

    	 	$username = '';
    	 	$lastname = '';
    	 	if(!empty($userdata))
    	 	{
    	 		$username = $userdata->username;
    	 		$lastname = $userdata->user_surname;
    	 	}	

    	 	$groupdata = $this->common_model->common_getRow('task',array('task_id'=>$request->section_id));

    	 	$title = '';
    	 	if(!empty($groupdata))
    	    {
               $title = $groupdata->title;
    	    }		

    	 	      $join_arr[] = array(
    	 	      				'join_id'=>$request->join_id,
    	 	      				'user_id'=>$request->user_id,
    	 						'username'=>$username,
    	 						'user_surname'=>$lastname,
    	 						'title'=>$title,
    	 						'join_date'=>substr($request->join_date, 0,10),
    	 						'admin_status'=>$request->admin_status
    	 						);

    	}

    	$data['joining_request']  = $join_arr;
    	
	}

	 $this->load->view('admin/task/request_detail',$data);

}


public function join_status()
{
    $status = $this->input->post('status');
    $join_id = $this->input->post('join_id'); 
    $user_id = $this->input->post('user_id'); 
    $title = $this->input->post('title'); 
 
   	  $status_data = array('admin_status'=>$status);
   	  $status_update = $this->common_model->updateData('join_user',$status_data,array('join_id'=>$join_id));

   	  if($status_update)
   	  {
	  	    if($status == 1)
	  		{
	  	 		$msg = "Admin approved your request to join the task ".$title.". You can now post and comment in this task."; 
		        
		        $user_devicetoken = $this->common_model->common_getRow('users',array('user_id'=>$user_id));

		        if(!empty($user_devicetoken->device_token))
		        {
		            $message = array("title"=>$title,"type"=>19,"message" =>$msg,"image" =>'',"currenttime"=>militime);

		            $this->common_model->sendPushNotification($user_devicetoken->device_token,$message);

		             $insertnoti = $this->common_model->common_insert('notification',array('sender_id'=>'0','receiver_id'=>$user_id,'type'=>'19','title'=>$title,'msg'=>$msg,'create_at'=>militime,'update_at'=>militime));
		            echo '1000'; exit;
		        }	
	        }
	        else
	        {
	        	 echo '1000'; exit; 
	        } 
   	  
	    }

}

public function user_post()
{ 
    $arr = array();
	$data = '';
	$post_data = $this->common_model->getData('post',array('type'=>'task'));

	if(!empty($post_data))
	{
		foreach($post_data as $post)
		{
		 	 $task_id = $post->section_id;

		     $task_data = $this->common_model->common_getRow('task',array('task_id'=>$task_id));

		     $task_title = 'NA';
		     if(!empty($task_data))
		     {
		     	$task_title = $task_data->title;
		     }	

		 	 $user_id = $post->user_id;

		     $user_data = $this->common_model->common_getRow('users',array('user_id'=>$user_id));

		     $username =  $user_data->username.' '.$user_data->user_surname;

		 	 $message = $post->message;

		 	 if(!empty($post->image)){ $image = $post->image;} else{ $image = ''; }
		 	 $create_at = $post->create_at;

		 	 $arr[] = array(
		 	 				'post_id'=>$post->post_id,
		 	 				'task_title'=>$task_title,
		 					'post_image'=>$image,
		 					'username'=>$username,
		 					'post_message'=> $message,
		 					'create_at'=>substr($create_at, 0,10)
		 		       );

		}
		
	}	
	    $data['postdata'] =  $arr;
		$this->load->view('admin/task/user_post',$data);
}

public function user_comment($post_id = false)
{ 
   $arr = array();	
   $data = '';
   $comment =  $this->db->query("SELECT * FROM task_post_comment WHERE `post_id`= $post_id ORDER BY `task_post_comment`.`comment_id` DESC")->result();

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
					   'comment_date'=>$feed->comment_date
					);

    	}	

    	  $data['comment_data'] = $arr;
    } 	
	   $this->load->view('admin/task/user_comment',$data);

}

public function  delete_post()
{  
  $post_id = $this->input->post('post_id');

  $delete = $this->db->query("DELETE FROM `post` WHERE `post_id` IN($post_id) AND `type` = 'task'");
  if($delete)
  {
    echo $post_id; 
  }
}

public function  delete_user_comment($comment_id=false)
{  
	$delete = $this->common_model->deleteData('task_post_comment',array('comment_id'=>$comment_id));

	if($delete)
	{
		echo "1000"; exit;
	}
}

public function task_status()
{
   $status = $this->input->post('status');
   $task_id = $this->input->post('task_id'); 
 
   	  $status_data = array('admin_status'=>$status);
   	  $status_update = $this->common_model->updateData('task',$status_data,array('task_id'=>$task_id));

   	  if($status_update)
   	  {
   	  	echo '1000';exit;
   	  }	
}

public function archived_task()
{ 
	$data['task_data'] = $this->common_model->getData('task',array('delete_status'=>1),'task_id','DESC');

	$this->load->view('admin/task/archived_task',$data);	
}

public function  archive_delete()
{  
	$task_id = $this->input->post('task_id');
    $delete = $this->db->query("DELETE FROM `task` WHERE `task_id` IN($task_id)");

	$delete_post = $this->db->query("DELETE FROM `post` WHERE `section_id` IN($task_id) AND `type` = 'task'");

	$delete_join_request = $this->db->query("DELETE FROM `join_user` WHERE `section_id` IN($task_id) AND `type` = 'task'");

    if($delete_join_request)
    {
    	echo $task_id; 
    }	
}

public function delete_user_request()
{	
	$join_id = $this->input->post('join_id');
	
	$delete = $this->db->query("DELETE FROM `join_user` WHERE `join_id` IN($join_id) AND `type`='task'");
	if($delete)
	{ 
		echo $join_id;
	}

}

public function join_status1()
{
    $join_id = $this->input->post('join_id'); 
   
    $joinid_arr = explode(',',$join_id);
   
    for($i=0;$i<count($joinid_arr);$i++)
    {
        $already_done = $this->common_model->common_getRow('join_user',array('join_id'=>$joinid_arr[$i]));
        if($already_done->admin_status == 1)
        {
        	continue;
        }
        else
        {
   	        $status_update = $this->common_model->updateData('join_user',array('admin_status'=>1),array('join_id'=>$joinid_arr[$i]));

   	        $title_data = $this->common_model->common_getRow('task',array('task_id'=>$already_done->section_id));

        	$title = $title_data->title;

        	$msg = "Admin approved your request to join the task ".$title.". You can now post and comment in this task."; 
        	$user_devicetoken = $this->common_model->common_getRow('users',array('user_id'=>$already_done->user_id));

        	if(!empty($user_devicetoken->device_token))
		    {
		            $message = array("title"=>$title,"section_id"=>$already_done->section_id,"type"=>23,"message" =>$msg,"image" =>'',"currenttime"=>militime);

		            $this->common_model->sendPushNotification($user_devicetoken->device_token,$message);

		             $insertnoti = $this->common_model->common_insert('notification',array('sender_id'=>'0','receiver_id'=>$already_done->user_id,'section_id'=>$already_done->section_id,'type'=>'23','title'=>$title,'msg'=>$msg,'create_at'=>militime,'update_at'=>militime));
		           
		    }
        }	

    }	
    echo $join_id;
}


}





