 <?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Poll extends CI_Controller {
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
	$data['poll_data'] = $this->common_model->getData('poll',array(),'poll_id','DESC');

	$this->load->view('admin/poll/poll_detail',$data);	
}

public function add_poll()
{ 
	if($this->input->server('REQUEST_METHOD') === 'POST')
	{ 
		$this->form_validation->set_rules('question', 'Question', 'required');

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
        	            $uploadPath = 'uploads/poll_image/';
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
		 	 				redirect('poll/add_poll');
		 	 				exit;
                        }
		        	         
		        }
		        else
		        {
		        	$image = '';
		        }	
		        	$answer_arr = $this->input->post('answer');

		        	$answer_count = count($answer_arr);

          			$poll_question = array(
					'category_id' =>$this->input->post('category_id'),
					'poll_question'=>$this->input->post('question'),
					'answer_count'=>$answer_count,
					'poll_image'=>$image,
					'admin_status'=>1,
					'create_at' =>date('Y-m-d')
					);

					$insert_id = $this->common_model->common_insert('poll',$poll_question);

	        		if($insert_id)
	        		{
	        			for($i=0;$i < $answer_count;$i++)
	        			{
	        				$answer_data = array(
	        									  'poll_id'=>$insert_id,
	        									  'answer'=>$answer_arr[$i],
	        									  'create_at'=>date('Y-m-d')	
	        					                );
	        				
	        				$insert_answer = $this->common_model->common_insert('poll_answers',$answer_data);
	        					
	        			}	
		              	/*$user_data = $this->common_model->getDataField('device_token','users',array());

                    	$gcmRegIds = array();
                		$i = 0;
                		foreach($user_data as $user_device_token)
                		{
                		  $i++;
                          $gcmRegIds[floor($i/1000)][] = $user_device_token->device_token;
                		}
                
                		    $pushMessage=array("title" =>'',"message" =>'New Poll Added','image'=>base_url().'uploads/poll_image/'.$image,"type"=>'',"currenttime"=>militime);
                       
                			if(isset($gcmRegIds)) 
                			{  
		                    	$message = $pushMessage;
		                    	$pushStatus = array();
	                    
	                    		foreach($gcmRegIds as $val){ $pushStatus[] = $this->common_model->sendNotification($val, $message);
                     			}
                      	$insertnoti = $this->common_model->common_insert('notification',array('sender_id'=>'0','receiver_id'=>'0','type'=>'','title'=>'','msg'=>'New Poll Added','image'=>base_url().'uploads/poll_image/'.$image,'create_at'=>militime,'update_at'=>militime));

                 			}*/	

		              	$this->session->set_flashdata('success', 'Poll Inserted Successfully.');
					  	redirect('Poll');
	        		}

			}
	}

	$data['category'] = $this->common_model->getData('category',array(),'category_name','ASC');

    $this->load->view('admin/poll/add_poll',$data);
}

public function poll_status()
{
    $status = $this->input->post('status');
    $poll_id = $this->input->post('poll_id'); 

    $status_data = array('admin_status'=>$status);
      
   	$status_update = $this->common_model->updateData('poll',$status_data,array('poll_id'=>$poll_id));

   	if($status_update)
   	{
   		echo '1000';  	   	
   	}	
}

public function answer_detail($poll_id = false)
{
   $data['answer_data'] = $this->common_model->getData('poll_answers',array('poll_id'=>$poll_id));

   $this->load->view('admin/poll/answer_detail',$data);    
}

public function delete_answer($answer_id = false)
{
	$delete = $this->common_model->deleteData('poll_answers',array('answer_id'=>$answer_id));
	
	if($delete)
	{
		echo "1000"; exit;
	}   	

}

}





