 <?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Analytics extends CI_Controller {
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
    $data = '';
    if(isset($_POST['submit']))
    {
	   	$year = $this->input->post('years');

	   	if($this->input->post('advance_data') == 'male')
	   	{
	   		$is_where = 'AND gender = 1';  
	   		$join = '';
	   		$data['male'] = TRUE;
	   	}
	   	else if($this->input->post('advance_data') == 'female')	
	   	{
	   		$is_where = 'AND gender = 2'; 
	   		$join = '';
	   		$data['female'] = TRUE;
	   	}	
	   	else if($this->input->post('advance_data') == 'verified')	
	   	{
	   		$is_where = 'AND admin_status = 1'; 
	   		$join = '';
	   		$data['verified'] = TRUE;
	   	}
	   	else if($this->input->post('advance_data') == 'unverified')	
	   	{
	   		$is_where = 'AND admin_status = 0'; 
	   		$join = '';
	   		$data['unverified'] = TRUE;
	   	}
	   	else if($this->input->post('advance_data') == 'employed')	
	   	{
	   		$is_where = 'AND employ_status = "employed"'; 
	   		$join = 'INNER JOIN advance_userdata ON users.user_id = advance_userdata.user_id';
	   		$data['employed'] = TRUE;
	   	}
	   	else if($this->input->post('advance_data') == 'unemployed')	
	   	{
	   		$is_where = 'AND employ_status = "unemployed"'; 
	   		$join = 'INNER JOIN advance_userdata ON users.user_id = advance_userdata.user_id';
	   		$data['unemployed'] = TRUE;
	   	}
	   	else if($this->input->post('advance_data') == 'married')	
	   	{
	   		$is_where = 'AND marital_status = "Married"'; 
	   		$join = 'INNER JOIN advance_userdata ON users.user_id = advance_userdata.user_id';
	   		$data['married'] = TRUE;
	   	}
	   	else if($this->input->post('advance_data') == 'unmarried')	
	   	{
	   		$is_where = 'AND marital_status = "Unmarried"'; 
	   		$join = 'INNER JOIN advance_userdata ON users.user_id = advance_userdata.user_id';
	   		$data['unmarried'] = TRUE;
	   	}

    }
    else
    {
    	$year = date('Y');
    	$join = '';
    	$data['male'] = TRUE;
    	$is_where = 'AND gender = 1';
    }	

    $month = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');

	    for($i=0;$i<12;$i++)
	    {
	    	$user_count = $this->db->query("SELECT count(users.user_id) AS count,month FROM users ".$join." WHERE month = '".$month[$i]."' AND year = '".$year."' ".$is_where." GROUP BY month,year")->row();


	    	if(!empty($user_count->count))
	    	{  
	    		$arr[] = $user_count->count;
	    	}
	    	else
	    	{
	    		$arr[] = 0;
	    	}	
	    }
	
    $data['yearss'] = $year;
    $data['user_count'] = $arr;

    $data['total_count1'] = $this->db->query("SELECT count(users.user_id) AS total_count FROM users ".$join." WHERE year = '".$year."' ".$is_where."")->result();
   
    $this->load->view('admin/analytics/analytics',$data);
}

public function other_filter()
{
	$data = '';
    if(isset($_POST['submit']))
    { 
       $year = $this->input->post('years');
       $month = $this->input->post('month');
    }
    else
    {
    	$year = date('Y');
    	$month = date('M');
    }	
	  	  $blood_group = array("A+","A-","B+","B-","O+","O-","AB+","AB-");

	       for($i=0;$i<8;$i++)
	       {
	       	    $blood_group_count = $this->db->query("SELECT count(users.user_id) AS count,blood_group,month,year FROM users INNER JOIN advance_userdata ON users.user_id = advance_userdata.user_id WHERE blood_group = '".$blood_group[$i]."' AND month = '".$month."' AND year = '".$year."' GROUP BY month,year")->row();

	            if(!empty($blood_group_count->count))
		    	{  
		    		$arr[] = $blood_group_count->count;
		    	}
		    	else
		    	{
		    		$arr[] = 0;
		    	}	
	       }

	    /*$data['total_count1'] = $this->db->query("SELECT count(users.user_id) AS total_count FROM users INNER JOIN advance_userdata ON users.user_id = advance_userdata.user_id WHERE month = '".$month."' AND year = '".$year."' GROUP BY month,year")->result();*/   

	    $data['blood_group_count'] =  $arr;  
		$data['yearss'] = $year; 
		$data['month'] = $month;

	$this->load->view('admin/analytics/analytics2',$data);
}

public function age_filter()
{
    $data = '';
    if(isset($_POST['submit']))
    { 
       $year = $this->input->post('years');
       $month = $this->input->post('month');
    }
    else
    {
    	$year = date('Y');
    	$month = date('M');
    }	
    	$age_group = array("10-20","21-30","31-40","41-50","51-60","61-70","71-80","81-90");

        for($i=0;$i<8;$i++)
	    {
	       $j = explode('-',$age_group[$i]);
           
           $first_value =  $j[0];
           $second_value = $j[1];
		 
	   	   $age_group_count = $this->db->query("SELECT count(users.user_id) AS count FROM users INNER JOIN advance_userdata ON users.user_id = advance_userdata.user_id WHERE age BETWEEN '".$first_value."' AND '".$second_value."' AND month = '".$month."' AND year = '".$year."' GROUP BY month,year")->row();

	        if(!empty($age_group_count->count))
	    	{  
	    		$arr[] = $age_group_count->count;
	    	}
	    	else
	    	{
	    		$arr[] = 0;
	    	}	
	    }

        $data['age_group_count'] =  $arr;  
        $data['yearss'] = $year; 
		$data['month'] = $month;

        $this->load->view('admin/analytics/analytics3',$data);
}

public function education_filter()
{
	$data = '';
    if(isset($_POST['submit']))
    { 
       $year = $this->input->post('years');
       $education = $this->input->post('education');
    }
    else
    {
    	$year = date('Y');
    	$education = 10;
    }
    $month = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');

        for($i=0;$i<12;$i++)
	    {
	    	$education_count = $this->db->query("SELECT count(users.user_id) AS count FROM users INNER JOIN advance_userdata ON users.user_id = advance_userdata.user_id WHERE highest_qualification = '". $education."' AND month = '".$month[$i]."' AND year = '".$year."' GROUP BY month,year")->row();

	    	if(!empty($education_count->count))
	    	{  
	    		$arr[] = $education_count->count;
	    	}
	    	else
	    	{
	    		$arr[] = 0;
	    	}	
	    }

	$data['education'] = $education;
	$data['education_count'] = $arr;
	$data['yearss'] = $year; 

	$this->load->view('admin/analytics/analytics4',$data);
}

}





