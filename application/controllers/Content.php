 <?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Content extends CI_Controller {
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
	$data['content_data'] = $this->common_model->getData('content',array(),'id','DESC');

	$this->load->view('admin/content/detail',$data);	
} 
	
public function aboutus()
{ 
	 $page_id =  $this->input->post('page_id');

	 if($this->input->server('REQUEST_METHOD') === 'POST')
	 {

	 	$content = array(
					'Title' =>$this->input->post('title'),
					'Content' =>$this->input->post('description')
					);

	 	$update = $this->common_model->updateData('content',$content,array('id'=>$page_id));

	 	if($update)
		{
      		$this->session->set_flashdata('success', 'About us Updated Successfully.');
	  		redirect('content/aboutus');
		}
	 } 

	 $data['aboutus'] = $this->common_model->common_getRow('Pages',array('Page_id'=>'1'));

	 $this->load->view('admin/pages/aboutus',$data);	
}

	
}
