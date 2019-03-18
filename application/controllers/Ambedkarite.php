 <?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Ambedkarite extends CI_Controller {
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
	

public function organization()
{ 
   $data = '';	
   $data['organization'] = $this->common_model->getData('organization',array('admin_status'=>0),'organization_id','DESC');
   
   $this->load->view('admin/ambadkarite/organization',$data);
}

public function add_organization()
{ 
	if($this->input->server('REQUEST_METHOD') === 'POST')
	{ 
			$organization = array(
				'organization_name' =>$this->input->post('organization_name'),
				'organization_type' =>$this->input->post('organization_type'),
				'registration_no'=>$this->input->post('registration_no'),
				'city'=>$this->input->post('city'),
				'founded_on'=>$this->input->post('fonded_on'),
				'location'=>$this->input->post('address'),
				'countributed_by'=>$this->input->post('contributed_by'),
				'activities'=>$this->input->post('activities'),
				'leaders'=>$this->input->post('leader'),
				'contact_details'=>$this->input->post('contact_detail'),
				'admin_status'=>0,
				'create_at' =>militime,
		      );

		$insert_id = $this->common_model->common_insert('organization',$organization);
		if($insert_id)
		{
			$this->session->set_flashdata('success', 'organization Inserted Successfully.');
		  	redirect('ambedkarite/organization');
     	}
     	else
     	{
     		$this->session->set_flashdata('error', 'organization Insertion failed.');
		  	redirect('ambedkarite/organization');
     	}	
	}

    $this->load->view('admin/ambadkarite/add_organization');
}

public function edit_organization($organization_id= false)
{
	if($this->input->server('REQUEST_METHOD') === 'POST')
	{ 
			$organization = array(
				'organization_name' =>$this->input->post('Organization_name'),
				'organization_type' =>$this->input->post('organization_type'),
				'registration_no'=>$this->input->post('registration_no'),
				'city'=>$this->input->post('city'),
				'founded_on'=>$this->input->post('fonded_on'),
				'location'=>$this->input->post('address'),
				'countributed_by'=>$this->input->post('contributed_by'),
				'activities'=>$this->input->post('activities'),
				'leaders'=>$this->input->post('leader'),
				'contact_details'=>$this->input->post('contact_detail'),
				'admin_status'=>0,
				'create_at' =>militime,
		      );

        $update = $this->common_model->updateData('organization',$organization,array('organization_id'=>$organization_id));
		
		if($update)
		{
			$this->session->set_flashdata('success', 'Organization Updated Successfully.');
		  	redirect('ambedkarite/organization');
     	}
     	else
     	{
     		$this->session->set_flashdata('error', 'Organization Updation failed.');
		  	redirect('ambedkarite/organization');
     	}	
	}

	$data['organization'] = $this->common_model->common_getRow('organization',array('organization_id'=>$organization_id));
    
    $this->load->view('admin/ambadkarite/edit_organization',$data);

}
public function budhavihar()
{
   $data = '';	
   $data['buddhavihar'] = $this->common_model->getData('budhavihar',array('admin_status'=>0),'budhavihar_id','DESC');
   $this->load->view('admin/ambadkarite/budhavihar',$data);
}

public function add_budhavihar()
{

	if($this->input->server('REQUEST_METHOD') === 'POST')
	{ 
			$budhavihar = array(
				'budhavihar_name' =>$this->input->post('budhavihar_name'),
				'budhavihar_type' =>$this->input->post('budhavihar_type'),
				'registration_no'=>$this->input->post('registration_no'),
				'city'=>$this->input->post('city'),
				'founded_on'=>$this->input->post('fonded_on'),
				'location'=>$this->input->post('address'),
				'countributed_by'=>$this->input->post('contributed_by'),
				'activities'=>$this->input->post('activities'),
				'leaders'=>$this->input->post('leader'),
				'contact_details'=>$this->input->post('contact_detail'),
				'admin_status'=>0,
				'create_at' =>militime,
		      );

		$insert_id = $this->common_model->common_insert('budhavihar',$budhavihar);

		if($insert_id)
		{
			$this->session->set_flashdata('success', 'Budhavihar Inserted Successfully.');
		  	redirect('ambedkarite/budhavihar');
     	}
     	else
     	{
     		$this->session->set_flashdata('error', 'Budhavihar Insertion failed.');
		  	redirect('ambedkarite/budhavihar');
     	}	
	}

    $this->load->view('admin/ambadkarite/add_buddhavihar');

}

public function edit_budhavihar($budhavihar_id= false)
{
	if($this->input->server('REQUEST_METHOD') === 'POST')
	{ 
			$budhavihar = array(
				'budhavihar_name' =>$this->input->post('budhavihar_name'),
				'budhavihar_type' =>$this->input->post('budhavihar_type'),
				'registration_no'=>$this->input->post('registration_no'),
				'city'=>$this->input->post('city'),
				'founded_on'=>$this->input->post('fonded_on'),
				'location'=>$this->input->post('address'),
				'countributed_by'=>$this->input->post('contributed_by'),
				'activities'=>$this->input->post('activities'),
				'leaders'=>$this->input->post('leader'),
				'contact_details'=>$this->input->post('contact_detail'),
				'admin_status'=>0,
				'create_at' =>militime,
		      );

        $update = $this->common_model->updateData('budhavihar',$budhavihar,array('budhavihar_id'=>$budhavihar_id));
		
		if($update)
		{
			$this->session->set_flashdata('success', 'Budhavihar Updated Successfully.');
		  	redirect('ambedkarite/budhavihar');
     	}
     	else
     	{
     		$this->session->set_flashdata('error', 'Budhavihar Updation failed.');
		  	redirect('ambedkarite/budhavihar');
     	}	
	}

	$data['budhavihar'] = $this->common_model->common_getRow('budhavihar',array('budhavihar_id'=>$budhavihar_id));
    
    $this->load->view('admin/ambadkarite/edit_budhavihar',$data);

}

}





