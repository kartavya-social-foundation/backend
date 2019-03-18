 <?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {
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

public function add_news()
{ 
	if($this->input->server('REQUEST_METHOD') === 'POST')
	{ 
		  	$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('description', 'Description', 'required');

			if($this->form_validation->run() == TRUE)
			{ 
          			$news = array(
					'title' =>$this->input->post('title'),
					'description' =>$this->input->post('description'),
					'news_langauge'=>$this->input->post('news_language'),
					'news_type'=>$this->input->post('news_type'),
					'admin_status'=>1,
					'publish_status'=>1,
					'publish_date'=>date('Y-m-d H:i:s'),
					'create_at' =>militime,
					'update_at'=>militime
					);

        			if(isset($_FILES['image']['name'][0]) && $_FILES['image']['name'][0] != '')
	        		{  
			            $files = $_FILES;	
			        	$filesCount1 = count($_FILES['image']['name']);
	        	       
	        	            $_FILES['image']['name'] =  $files['image']['name'];
	        	            $_FILES['image']['type'] =   $files['image']['type'];
			                $_FILES['image']['tmp_name'] =  $files['image']['tmp_name'];
			                $_FILES['image']['error'] =  $files['image']['error'];
			                $_FILES['image']['size'] =  $files['image']['size'];

			                 $date = date("ymdhis"); 	
	        	             $uploadPath = 'uploads/news_image/';
	                         $config['upload_path'] = $uploadPath;
	                         $config['allowed_types'] = 'jpg|png|jpeg';
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
        	        				$image = $fileName; 
                            	}
                            	else
                            	{
                            		$this->data['err']= $this->upload->display_errors();
					 				$this->session->set_flashdata('image_error', $this->data['err']);
				 	 				redirect('news/add_news');
				 	 				exit;
                            	}
	        	        
	              	}
	              	$insert_id = $this->common_model->common_insert('news',$news);
	        		if($insert_id)
	        		{
                		$news_image = array('news_id'=>$insert_id,'image'=>$uploadData['file_name'],'create_at'=>militime,'update_at'=>militime);
            	       	$insert = $this->common_model->common_insert('news_image',$news_image);	

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
                            $msg = $title.' '.'News Added'; 
                		    $pushMessage=array("title" =>$title,"user_id"=>'','section_id'=>$insert_id,"message" =>$msg,'image'=>base_url().'uploads/news_image/'.$image,"type"=>'3',"currenttime"=>militime);
                       
                			if(isset($gcmRegIds)) 
                			{  
		                    	$message = $pushMessage;
		                    	$pushStatus = array();
	                    
	                    		foreach($gcmRegIds as $val){ $pushStatus[] = $this->common_model->sendNotification($val, $message);
                     			}
                     			    $user_id_in_comma = implode(",",$userid_arr);	
                      				$insertnoti = $this->common_model->common_insert('notification',array('sender_id'=>'0','receiver_id'=>$user_id_in_comma,'section_id'=>$insert_id,'type'=>'3','title'=>$title,'msg'=>$msg,'image'=>$image,'create_at'=>militime,'update_at'=>militime));

                 			}
		              		$this->session->set_flashdata('success', 'News Inserted Successfully.');
					  		redirect('news');
	        		}
	  			
			}
	} 
          	$this->load->view('admin/news/add_news');
}

public function edit($news_id=false)
{ 
	$data['news_data'] = $this->common_model->common_getRow('news',array('news_id'=>$news_id));
	$data['news_image'] = $this->common_model->common_getRow('news_image',array('news_id'=>$news_id));

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
		        	    
		        	        /*for($i = 0; $i < $filesCount1; $i++)
		        	        {*/
		        	            $_FILES['image']['name'] =  $files['image']['name'];
		        	            $_FILES['image']['type'] =   $files['image']['type'];
				                $_FILES['image']['tmp_name'] = $files['image']['tmp_name'];
				                $_FILES['image']['error'] =  $files['image']['error'];
				                $_FILES['image']['size'] =  $files['image']['size'];

				                 $date = date("ymdhis"); 	
		        	             $uploadPath = 'uploads/news_image/';
		                         $config['upload_path'] = $uploadPath;
		                         $config['allowed_types'] = 'jpg|png|jpeg';
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
					 	 				redirect('news/edit/'.$news_id);
					 	 				exit;
	                            	}	
		                            
		        	}
		        	else
		        	{
		        	    if(!empty($data['news_image']->image))
		        	    {
		        	    	$image = $data['news_image']->image;
		        	    }
		        	    else
		        	    {
		        	    	 $image = '';
		        	    } 	
		        	} 

		        	$updateimage = $this->common_model->updateData('news_image',array('image'=>$image),array('news_id'=>$news_id));
		            
          
          			$news = array(
					'title' =>$this->input->post('title'),
					'news_type' =>$this->input->post('news_type'),
					'news_langauge'=>$this->input->post('news_language'),
					'description' =>$this->input->post('description'),
					'create_at'=>militime,
					'update_at'=>militime
					
					);
					
          		    $update = $this->common_model->updateData('news',$news,array('news_id'=>$news_id));
        			if($update)
        			{
	              		$this->session->set_flashdata('success', 'News Updated Successfully.');
				  		redirect('news');
        			}
			}
	} 
          	$this->load->view('admin/news/edit_news',$data);

}

public function detail($news_id=false)
{
   $data['news_data'] = $this->common_model->common_getRow('news',array('news_id'=>$news_id)); 

   $data['news_image'] = $this->common_model->getData('news_image',array('news_id'=>$news_id));
   
   $this->load->view('admin/news/details',$data);

}

public function  delete()
{  
	$news_id = $this->input->post('news_id');

	$delete = $this->db->query("DELETE FROM `news` WHERE `news_id` IN($news_id)");

	if($delete)
	{
		$this->db->query("DELETE FROM `news_image` WHERE `news_id` IN($news_id)");

		$this->db->query("DELETE FROM `notification` WHERE `section_id` IN($news_id) AND `type` IN(3,5,16)");
		echo $news_id;
	}
}

public function news_status()
{
   $status = $this->input->post('status');
   $news_id = $this->input->post('news_id'); 

      if($status == 1)
      {
      	  $status_data = array('admin_status'=>$status,'publish_date'=>date('Y-m-d H:i:s'));
      }
      else
      {
      	  $status_data = array('admin_status'=>$status,'publish_date'=>date('Y-m-d H:i:s'));
      }	
      
   	  $status_update = $this->common_model->updateData('news',$status_data,array('news_id'=>$news_id));

   	  if($status_update)
   	  {
   	  	    if($status == 1)
   	  		{
   	  	 		$msg = "Your News has been Verified by Admin."; 
   	  	 		$title = 'Verified';
   	  		}
   	  		else if($status == 2)
   	  		{
            	$msg = "Your News has been Rejected by Admin."; 
            	$title = 'Rejected';
   	  		}	

   	  	    $get_user_id = $this->common_model->common_getRow('news',array('news_id'=>$news_id));

   	  	    if($get_user_id->post_by == 1)
   	  	    { 
	   	  	
	        	    $user_id = $get_user_id->user_id;

	            	$user_devicetoken = $this->common_model->common_getRow('users',array('user_id'=>$user_id));

	            	if(!empty($user_devicetoken->device_token))
	            	{
	            		 $message = array("title"=>$title,"type"=>5,"message" =>$msg,"currenttime"=>militime);

	                     $this->common_model->sendPushNotification($user_devicetoken->device_token,$message);
	            	}	

	            $insertnoti = $this->common_model->common_insert('notification',array('sender_id'=>'0','receiver_id'=>$user_id,'type'=>'5','title'=>$title,'msg'=>$msg,'create_at'=>militime,'update_at'=>militime));
	            echo '1000'; exit;
   	  	   }


   	  	echo '1000';exit;
   	  }	
	
}

public function remove_img()
{	
	$image_id =  $this->input->post('image_id');

	$delete = $this->common_model->deleteData('news_image',array('image_id'=>$image_id));

	if($delete)
	{
		echo "1000"; exit;
	}

}

public function user_news()
{
	$data['news_data'] = $this->common_model->getData('news',array('post_by'=>1),'news_id','DESC');

	 $this->load->view('admin/news/news_detail',$data);	
}

public function archived_news()
{
  $data['news_data'] = $this->db->query("SELECT * FROM `news` WHERE `admin_status`= 2 ORDER BY `news_id` DESC")->result();

   $this->load->view('admin/news/archived_news',$data);
}

public function  active_news1()
{  
	$news_id = $this->input->post('news_id');
	$status_update = $this->db->query("UPDATE `news` SET `admin_status` = 1 WHERE `news_id` IN($news_id)");
	if($status_update)
	{
		echo $news_id;
	}
}

public function  reject_news()
{  
	$news_id = $this->input->post('news_id');
	$status_update = $this->db->query("UPDATE `news` SET `admin_status` = 2 WHERE `news_id` IN($news_id)");
	if($status_update)
	{
		echo $news_id;
	}
}

public function active_news()
{
	$news_id = $this->input->post('news_id');
    $news_arr = explode(",",$news_id);

    for($j=0;$i<count($news_arr);$j++)
    {
        $already_active = $this->common_model->common_getRow('news',array('news_id'=>$news_arr[$j]));

        if($already_active->admin_status == 1)
        {
        	continue;
        }
        else
        { 
            $status_update = $this->common_model->updateData('news',array('admin_status'=>1,'publish_date'=>date('Y-m-d H:i:s')),array('news_id'=>$news_arr[$j]));

            if($status_update)
            {
            	$title = $already_active->title;
            	$user_id = $already_active->user_id;

                $get_image = $this->common_model->common_getRow('news_image',array('news_id'=>$news_arr[$j]));

            	$image = $get_image->image;

            	$msg = "Your '".$title."' News has been Verified by Admin."; 

            	$user_devicetoken = $this->common_model->common_getRow('users',array('user_id'=>$user_id));

            	if(!empty($user_devicetoken->device_token))
            	{
            		$message1 = array("title"=>$title,"user_id"=>'','section_id'=>$news_arr[$j],"type"=>5,"message" =>$msg,"image" =>base_url().'uploads/news_image'.$image,"currenttime"=>militime);

                     $this->common_model->sendPushNotification($user_devicetoken->device_token,$message1);
            	}

	            $insertnoti = $this->common_model->common_insert('notification',array('sender_id'=>'0','receiver_id'=>$user_id,'user_id'=>$user_id,'section_id'=>$news_arr[$j],'type'=>'5','title'=>$title,'msg'=>$msg,'image'=>$image,'create_at'=>militime,'update_at'=>militime));
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
                           $msg1 = $title.' '.'News Added';
                		   $pushMessage=array("title" =>$title,"user_id"=>'','section_id'=>$news_arr[$j],"message" => $msg1,'image'=>base_url().'uploads/news_image/'.$image,"type"=>'3',"currenttime"=>militime);
                       
                			if(isset($gcmRegIds)) 
                			{  
		                    	$message = $pushMessage;
		                    	$pushStatus = array();
	                    
	                    		foreach($gcmRegIds as $val){ $pushStatus[] = $this->common_model->sendNotification($val, $message);
                     			}
                     		$user_id_in_comma = implode(",",$userid_arr);	

                      $insertnotification = $this->common_model->common_insert('notification',array('sender_id'=>'0','receiver_id'=>$user_id_in_comma,'section_id'=>$news_arr[$j],'type'=>'3','title'=>$title,'msg'=>$msg1,'image'=>$image,'create_at'=>militime,'update_at'=>militime));

                 			}

	            }	

            }	

        }	
    }
     echo $news_id;	
}

}





