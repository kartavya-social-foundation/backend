 <?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Controller {
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
	
public function index($notify_id = false,$type= false)
{ 
	$update = $this->common_model->updateData('notification',array('counter_status'=>'1'),array('notify_id'=>$notify_id));
	if($update)
	{
		 if($type == 15)
		 {
		 	redirect('user/unverified_user');

		 }
		 else if($type == 16)
		 {
  		    redirect('news/user_news');		

		 }
		 else if($type == 17)
		 {
		 	redirect('project/user_project');

		 }
		 else if($type == 18)
		 {
		 	redirect('group/join_request');
		 }	
		 else if($type == 19)
		 {
		 	redirect('task/join_request');
		 }
		 else if($type == 20)
		 {
		 	 redirect('blog/user_blog');
		 }	
		 else if($type == 21)
		 {
		 	 redirect('event/user_event');
		 }
	}
	else
	{
		redirect('dashboard');
	}	
	
}

}





