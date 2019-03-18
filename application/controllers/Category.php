<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
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
   $this->db->select('*');
   $this->db->order_by('category_id','DESC');
   $data['category_data'] =  $this->db->get('category')->result_array();

   $this->load->view('admin/category/category_detail',$data);

}

public function add_category()
{ 
   	if(isset($_POST['submit']))
   	{
   	    $this->form_validation->set_rules('category', 'Category Name', 'required|is_unique[category.category_name]');

   	    if($this->form_validation->run() == TRUE)
   	    {
 			$category_name = $this->input->post('category'); 

	   	 	if(isset($_FILES['image']['name'][0]) && $_FILES['image']['name'][0] != '')
	        {  
	            $files = $_FILES;	
	        	$filesCount1 = count($_FILES['image']['name']);
		       
		            $_FILES['image']['name'] =  $files['image']['name'];
	                $_FILES['image']['tmp_name'] =  $files['image']['tmp_name'];

	                 $date = date("ymdhis"); 	
		             $uploadPath = 'uploads/category_image/';
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
		 	 				redirect('category/add_category');
		 	 				exit;
	                	}
	        }
        
       			 $cate_data = array(
					'category_name'=>$category_name,
					'image'=>$image,
					'create_at'=>date('Y-m-d H:i:s')
					);
   	
        $insert = $this->common_model->common_insert('category',$cate_data,array());
	    $this->session->set_flashdata('success', 'Categorty Added Successfully.');
	    redirect('category');

   	    }	
	}	
	  	$this->load->view('admin/category/add_category');
}

public function category_status()
{
    $status = $this->input->post('status');
    $category_id = $this->input->post('category_id');
 
   	  $status_data = array('admin_status'=>$status);
   	  $status_update = $this->common_model->updateData('category',$status_data,array('category_id'=>$category_id));
   	 	
   	  if($status_update)
   	  {
	    echo '1000'; exit;
   	  }

}
public function edit($category_id = false)
{
	$data['category_data'] = $this->common_model->common_getRow('category',array('category_id'=>$category_id));
	//edit_unique[users.user_name.'.$id.']

	if($this->input->server('REQUEST_METHOD') === 'POST')
	{ 
		$this->form_validation->set_rules('category', 'category', 'required');

   	    if($this->form_validation->run() == TRUE)
   	    {
   	    	$category_name = $this->input->post('category'); 

   	    	$cate_name = $this->db->escape_str($category_name);

   	    	$already_exit = $this->db->query("SELECT `category_name` FROM `category` WHERE `category_name`= '".$cate_name."' AND `category_id` != '".$category_id."'")->row();

   	    	if(!empty($already_exit))
   	    	{
   	    		$this->session->set_flashdata('category_exist','The Category Name field must contain a unique value.');
			  	redirect('category/edit/'.$category_id);
   	    	}	

   	    	if(isset($_FILES['image']['name'][0]) && $_FILES['image']['name'][0] != '')
		    {  
	            $files = $_FILES;	
	            $_FILES['image']['name'] =  $files['image']['name'];
                $_FILES['image']['tmp_name'] = $files['image']['tmp_name'];
              
                 $date = date("ymdhis"); 	
	             $uploadPath = 'uploads/category_image/';
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
	 	 				redirect('category/edit/'.$category_id);
	 	 				exit;
                	}	
		                            
			}
			else
	        {
	        	$image =  $data['category_data']->image;
	        }
			       
      			$category = array(
				'category_name' =>$this->input->post('category'),
				'image' =>$image
				);

      		    $update = $this->common_model->updateData('category',$category,array('category_id'=>$category_id));
    			if($update)
    			{
              		$this->session->set_flashdata('success', 'Category Updated Successfully.');
			  		redirect('category');
    			}

   	    }
			
	} 
        $this->load->view('admin/category/edit',$data);
}

   function edit_unique($value, $params)  {
    $CI =& get_instance();
    $CI->load->database();

    $CI->form_validation->set_message('edit_unique', "Category name already exist.");

    list($table, $field, $current_id) = explode(".", $params);

    $query = $CI->db->select()->from($table)->where($field, $value)->limit(1)->get();

    if ($query->row() && $query->row()->id != $current_id)
    {
        return FALSE;
    } else {
        return TRUE;
    }
}

}
