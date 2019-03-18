 <?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Group extends CI_Controller {
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

	$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
	$this->output->set_header('Pragma: no-cache');
		
}
public function index()
{ 
	$data['group_data'] = $this->common_model->getData('group',array('delete_status'=>0),'group_id','DESC');

	$this->load->view('admin/group/group_detail',$data);	
}

public function add_Group()
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
	        	            $uploadPath = 'uploads/group_image/';
	                        $config['upload_path'] = $uploadPath;
	                        $config['allowed_types'] = 'jpg|jpeg|png';
	                        $config['max_size']      = 500; 
					        $config['max_width'] = '700';
					        $config['max_height'] = '500';

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
			 	 				redirect('group/add_group');
			 	 				exit;
                            }
		        	         
		        }
		        else
		        {
		        	$image = '';
		        }	
          			$group = array(
					'title' =>$this->input->post('title'),
					'category_id'=>$this->input->post('category_id'),
					'description' =>$this->input->post('description'),
					'image'=>$image,
					'admin_status'=>1,
					'create_at' =>militime,
					'update_at'=>militime
					);

					$insert_id = $this->common_model->common_insert('group',$group);
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

                		    $msg = $this->input->post('title').' '.'Group Added';		

                		    $pushMessage=array("title" =>$title,"user_id"=>'','section_id'=>$insert_id,"message" =>$msg,'image'=>base_url().'uploads/group_image/'.$image,"type"=>'12',"currenttime"=>militime);
                       
                			if(isset($gcmRegIds)) 
                			{  
		                    	$message = $pushMessage;
		                    	$pushStatus = array();
	                    
	                    		foreach($gcmRegIds as $val){ $pushStatus[] = $this->common_model->sendNotification($val, $message);
                     			}

                      $user_id_in_comma = implode(",",$userid_arr);			
                      $insertnoti = $this->common_model->common_insert('notification',array('sender_id'=>'0','receiver_id'=>$user_id_in_comma,'section_id'=>$insert_id,'type'=>'12','title'=>$this->input->post('title'),'msg'=>$msg,'image'=>$image,'create_at'=>militime,'update_at'=>militime));

                 			}	

		              	$this->session->set_flashdata('success', 'Group Inserted Successfully.');
					  	redirect('group');
	        		}

			}
	}

	$data['category'] = $this->common_model->getData('category',array(),'category_name','ASC');

    $this->load->view('admin/group/add_group',$data);
}

public function edit($group_id=false)
{ 
	$data['group_data'] = $this->common_model->common_getRow('group',array('group_id'=>$group_id));
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
	        	            $uploadPath = 'uploads/group_image/';
	                        $config['upload_path'] = $uploadPath;
	                        $config['allowed_types'] = 'jpg|jpeg|png';
	                        $config['max_size']      = 500; 
					        $config['max_width'] = '700';
					        $config['max_height'] = '500';

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
			 	 				redirect('group/edit/'.$group_id);
			 	 				exit;
                            }
		        }
		        else
		        {
		        	$image = $data['group_data']->image;
		        }
          			$group = array(
					'title' =>$this->input->post('title'),
					'category_id'=>$this->input->post('category_id'),
					'description' =>$this->input->post('description'),
					'image'=>$image,
					'admin_status'=>1,
					'create_at' =>militime,
					'update_at'=>militime
					);
					
          		    $update = $this->common_model->updateData('group',$group,array('group_id'=>$group_id));
        			if($update)
        			{
	              		$this->session->set_flashdata('success', 'Group Updated Successfully.');
				  		redirect('group');
        			}
	  			
			}
	} 
		 $data['category'] = $this->common_model->getData('category',array());
         $this->load->view('admin/group/edit_group',$data);

}
//All details of Article
public function detail($group_id=false)
{
   $data['group_data'] = $this->common_model->common_getRow('group',array('group_id'=>$group_id)); 
   
   $this->load->view('admin/group/detail',$data);

}

public function archive()
{  
    $group_id = $this->input->post('group_id');
    $status = $this->input->post('status');

    $status_update = $this->db->query("UPDATE `group` SET `delete_status` = $status WHERE `group_id` IN($group_id)");
	
	if($status_update)
	{
		echo $group_id;
	}
}

public function user_project()
{
  $data['project_data'] = $this->db->query("SELECT * FROM `project` WHERE `user_id` != 0")->result();
  $this->load->view('admin/project/project_detail',$data);	
}

public function delete_user_request()
{	
	$join_id = $this->input->post('join_id');
	$delete = $this->db->query("DELETE FROM `join_user` WHERE `join_id` IN($join_id) AND `type`= 'group'");
	if($delete)
	{ 
		echo $join_id;
	}

}

public function group_status()
{
   $status = $this->input->post('status');
   $group_id = $this->input->post('group_id'); 
 
   	  $status_data = array('admin_status'=>$status);
   	  $status_update = $this->common_model->updateData('group',$status_data,array('group_id'=>$group_id));

   	  if($status_update)
   	  {
   	  	echo '1000';exit;
   	  }	
}

public function join_request()
{ 
    $join_arr = array(); 
    $data = '';
	$request_data = $this->common_model->getData('join_user',array('type'=>'group'),'join_id','DESC');

	if(!empty($request_data))
    {
    	foreach($request_data as $request)
    	{
    	 	$userdata = $this->common_model->common_getRow('users',array('user_id'=>$request->user_id)); 
    	 	$username = '';
    	 	if(!empty($userdata))
    	 	{
    	 		$username = $userdata->username;
    	 	}	

    	 	$groupdata = $this->common_model->common_getRow('group',array('group_id'=>$request->section_id));
    	 	$title = '';
    	 	if(!empty($groupdata))
    	 	{ 
    	 		$title = $groupdata->title;
    	 	}	

    	 	      $join_arr[] = array(
    	 	      				'join_id'=>$request->join_id,
    	 	      				'user_id'=>$request->user_id,
    	 						'username'=>$username,
    	 						'title'=>$title,
    	 						'join_date'=>substr($request->join_date, 0,10),
    	 						'admin_status'=>$request->admin_status
    	 						);

    	}

    	$data['joining_request']  = $join_arr;
	}

	 $this->load->view('admin/group/request_detail',$data);

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
	  	 		$msg = "Admin approved your request to join the group ".$title.". You can now post and comment in this group."; 
		        
		        $user_devicetoken = $this->common_model->common_getRow('users',array('user_id'=>$user_id));

		        if(!empty($user_devicetoken->device_token))
		        {
		            $message = array("title"=>$title,"type"=>14,"message" =>$msg,"image" =>'',"currenttime"=>militime);

		            $this->common_model->sendPushNotification($user_devicetoken->device_token,$message);

		             $insertnoti = $this->common_model->common_insert('notification',array('sender_id'=>'0','receiver_id'=>$user_id,'type'=>'14','title'=>$title,'msg'=>$msg,'create_at'=>militime,'update_at'=>militime));
		            echo '1000'; exit;
		        }	
	        }
	        else
	        {
	        	 echo '1000'; exit; 
	        } 
   	  
	    }

}


public function user_comment($post_id = false)
{ 
   $arr = array(); 
   $data = '';
   $comment =  $this->db->query("SELECT * FROM group_post_comment WHERE `post_id`= $post_id ORDER BY `group_post_comment`.`comment_id` DESC")->result();

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
	   $this->load->view('admin/group/user_comment',$data);

}

public function user_post()
{  
	$arr = array();
	$data = '';
	$post_data = $this->common_model->getData('post',array('type'=>'group'));

	if(!empty($post_data))
	{
		foreach($post_data as $post)
		{
		 	 $group_id = $post->section_id;

		     $group_data = $this->common_model->common_getRow('group',array('group_id'=>$group_id));

		     $group_title = 'NA';
		     if(!empty($group_data))
		     {
		     	$group_title = $group_data->title;
		     }	

		 	 $user_id = $post->user_id;

		     $user_data = $this->common_model->common_getRow('users',array('user_id'=>$user_id));

		    $username = '';
		    if(!empty($user_data))
		    {
		    	 $username =  $user_data->username.' '.$user_data->user_surname;
		    }	

		    

		 	 $message = $post->message;

		 	 if(!empty($post->image)){ $image = $post->image;} else{ $image = ''; }
		 	 $create_at = $post->create_at;

		 	 $arr[] = array(
		 	 				'post_id'=>$post->post_id,
		 	 				'group_title'=>$group_title,
		 					'post_image'=>$image,
		 					'username'=>$username,
		 					'post_message'=> $message,
		 					'create_at'=>substr($create_at, 0,10)
		 		       );

		}

		
	}	
	    $data['postdata'] =  $arr;
		$this->load->view('admin/group/user_post',$data);
}

public function  delete_post($post_id=false)
{  
	$post_id = $this->input->post('post_id');

    $delete = $this->db->query("DELETE FROM `post` WHERE `post_id` IN($post_id) AND `type` = 'group'");

    $delete_comment = $this->db->query("DELETE FROM `group_post_comment` WHERE `post_id` IN($post_id)");

    $delete_like = $this->db->query("DELETE FROM `group_like` WHERE `post_id` IN($post_id)");
    
	if($delete_like)
	{
	  echo $post_id;
	}
}

public function  delete_user_comment($comment_id=false)
{  
	$delete = $this->common_model->deleteData('group_post_comment',array('comment_id'=>$comment_id));

	if($delete)
	{
		echo "1000"; exit;
	}
}

public function archived_group()
{ 
	$data['group_data'] = $this->common_model->getData('group',array('delete_status'=>1),'group_id','DESC');

	$this->load->view('admin/group/archived_group',$data);	
}

public function post_like_user($post_id = false)
{   $user_arr = array();
	$data = ''; 
	$data['group_data'] = $this->common_model->getData('group_like',array('post_id'=>$post_id),'like_id','DESC');

	if($data['group_data'])
	{
		foreach($data['group_data'] as $userinfo)
		{
			$user_id  = $userinfo->user_id;

   			$user_info = $this->common_model->common_getRow('users',array('user_id'=>$user_id)); 

   			$user_arr[] = $user_info;
		    
		}	

		$data['user_data'] = $user_arr;
	}	

	$this->load->view('admin/group/liked_user',$data);
} 


public function delete_group()
{
  $group_id = $this->input->post('group_id');
  $delete = $this->db->query("DELETE FROM `group` WHERE `group_id` IN($group_id)");
  
  $group_id_arr = explode(",",$group_id);

  for($i=0;$i<count($group_id_arr);$i++)
  {
     $post_id = $this->common_model->common_getRow('post',array('section_id'=>$group_id_arr[$i],'type'=>'group'));

     $post_arr[] = $post_id->post_id;

  }
    $post_id_str = implode(',',$post_arr);

  	$delete_post = $this->db->query("DELETE FROM `post` WHERE `section_id` IN($group_id) AND `type` = 'group'");

  	$delete_join_request = $this->db->query("DELETE FROM `join_user` WHERE `section_id` IN($group_id) AND `type` = 'group'");
    $delete_comment = $this->db->query("DELETE FROM `group_post_comment` WHERE `post_id` IN($post_id_str)");

    $delete_like = $this->db->query("DELETE FROM `group_like` WHERE `post_id` IN($post_id_str)");

    if($delete_like)
    {
    	echo $group_id; 
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

        	$title_data = $this->common_model->common_getRow('group',array('group_id'=>$already_done->section_id));

        	$title = $title_data->title;
        	$image = $title_data->image;

        	$msg = "Admin approved your request to join the group ".$title.". You can now post and comment in this group."; 

        	$user_devicetoken = $this->common_model->common_getRow('users',array('user_id'=>$already_done->user_id));

        	if(!empty($user_devicetoken->device_token))
		    {
		            $message = array("title"=>$title,"user_id"=>'',"type"=>14,"section_id"=>$already_done->section_id,"message" =>$msg,"image" =>base_url().'uploads/group_image/'.$image,"currenttime"=>militime);

		            $this->common_model->sendPushNotification($user_devicetoken->device_token,$message);

		            $insertnoti = $this->common_model->common_insert('notification',array('sender_id'=>'0','receiver_id'=>$already_done->user_id,'section_id'=>$already_done->section_id,'type'=>'14','image'=>$image,'title'=>$title,'msg'=>$msg,'create_at'=>militime,'update_at'=>militime));
		           
		    }
        }	

    }	
    echo $join_id;

}

}






