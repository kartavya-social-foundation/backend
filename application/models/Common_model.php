<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

	class Common_model extends CI_Model {
	public function __construct()
    {
        parent::__construct();
	}
	
	public function common_insert($tbl_name = false, $data_array = false)
	{
		$ins_data = $this->db->insert($tbl_name, $data_array);
		if($ins_data){
			return $last_id = $this->db->insert_id();
		}
		else{
			return false;
		}
	}

	public function updateData($table,$data,$where_array)
	{ 
	    $this->db->where($where_array);
		if($this->db->update($table,$data)){
			//print_r($this->db->last_query()); exit;
			return true;
		}
		else{
			//print_r($this->db->last_query()); exit;
			return false;
		}
	}

	// Function for select data
	public function getData($table,$where='', $order_by = false, $order = false, $join_array = false, $limit = false)
	{
		//$this->db->select('*');
		$this->db->from($table);

		if(!empty($where))
		{
			$this->db->where($where);
		}
		
		if(!empty($order_by))
		{
			$this->db->order_by($order_by, $order); 	
		}



		if(!empty($join_array))
		{
			foreach ($join_array as $key => $value) {

				$this->db->join($key, $value); 	
			}
			
		}

		if(!empty($limit))
		{
			$this->db->limit($limit); 	
		}

		$result = $this->db->get();
		

		//print_r($this->db->last_query()); exit;
		return $result->result();
		//return $result;
	}

	// Function for select data
	public function getDataField($field = false, $table, $where='', $order_by = false, $order = false, $join_array = false, $limit = false, $join_type = false )
	{
		$this->db->select($field);

		$this->db->from($table);

		if(!empty($where))
		{
			$this->db->where($where);
		}
		
		if(!empty($order_by))
		{
			$this->db->order_by($order_by, $order); 	
		}



		if(!empty($join_array))
		{
			foreach ($join_array as $key => $value) {

				if(!empty($join_type))
					$this->db->join($key, $value, 'left');
				else
					$this->db->join($key, $value); 	
			}
			
		}

		if(!empty($limit))
		{
			$this->db->limit($limit); 	
		}

		$result = $this->db->get();
		

		//print_r($this->db->last_query()); exit;
		return $result->result();
		//return $result;
	}

	public function common_getRow($tbl_name = false, $where = false, $join_array = false)
	{
		$this->db->select('*');
		$this->db->from($tbl_name);
		
		if(isset($where) && !empty($where))
		{
			$this->db->where($where);	
		}
		
		if(!empty($join_array))
		{
			foreach($join_array as $key=>$value){
				$this->db->join($key,$value);
			}	
		}
		
		$query = $this->db->get();
		
		$data_array = $query->row();
		//print_r($this->db->last_query()); exit;
		if($data_array)
		{
			return $data_array;
		}
		else{
			return false;
		}
	}
	public function deleteData($table,$where)
	{ 
		$this->db->where($where);
		if($this->db->delete($table))
		{
			return true;
		}
		else{
			return false;
		}
	}
	
	public function sqlcount($table = false,$where = false)
	{
		$this->db->select('*');	
		$this->db->from($table); 
		if(isset($where) && !empty($where))
		{
			$this->db->where($where);	
		}
		//$this->db->limit($limit, $start);       
		$query = $this->db->get();
		//print_r($this->db->last_query()); exit;
		return $query->num_rows(); 
	}
	
	public function sms_send($mobileNumber,$message1)
	{
		$request =""; //initialise the request variable
		$param['method']= "sendMessage";
		$param['send_to'] = $mobileNumber;
		$param['msg'] = $message1;
		$param['userid'] = "2000166862";
		$param['password'] = "NiNlP5fDK";
		$param['v'] = "1.1";
		$param['msg_type'] = "TEXT"; //Can be "FLASH”/"UNICODE_TEXT"/”BINARY”
		$param['auth_scheme'] = "PLAIN";
		//Have to URL encode the values
		foreach($param as $key=>$val) {
		$request.= $key."=".urlencode($val);
		//we have to urlencode the values
		$request.= "&";
		//append the ampersand (&) sign after each parameter/value pair
		}
		$request = substr($request, 0, strlen($request)-1);
		//remove final (&) sign from the request
		$url = "http://enterprise.smsgupshup.com/GatewayAPI/rest?".$request;
		//print_r($url);exit;
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$curl_scraped_page = curl_exec($ch);
		curl_close($ch);
		//echo $curl_scraped_page;exit;
	   // echo $output;exit;
	}

	public function id_encrypt($str = false) // Id Encryption
	{
		return (56*$str);
	}
	
	public function id_decrypt($str = false) // Id Decryption
	{
		return ($str/56);
	}
	
	public function id_encrypt_zub($str = false) // Id Encryption
	{
		$str=(56*$str)+111;
		return ($str);
	}
	
	public function id_decrypt_zub($str = false) // Id Decryption
	{
		$str=($str-111)/56;
		return ($str);
	}
	public function milliseconds() // Id Decryption
	{
		$str = round(microtime(true) * 1000);
		return ($str);
	}
	public function getAddress($lat, $lon)
	{
		$url  = "http://maps.googleapis.com/maps/api/geocode/json?latlng=".$lat.",".$lon."&sensor=false";
		$json = @file_get_contents($url);
		$data = json_decode($json);
		$status = $data->status;
		$address = '';
		if($status == "OK")
		{
			$address = $data->results[0]->formatted_address;
		}
		return $address;
	}
	public function randomuniqueCode() 
	{
	    $alphabet = "0123456789";
	    $pass = array(); /*remember to declare $pass as an array*/
	    $alphaLength = strlen($alphabet) - 1; /*put the length -1 in cache*/
	    for ($i = 0; $i < 6; $i++) {
	        $n = rand(0, $alphaLength);
	        $pass[] = $alphabet[$n];
	    }
	    return implode($pass); /*turn the array into a string*/
	}

	function sendPushNotification($registration_ids, $message)
	{
	  
	   $url = 'https://fcm.googleapis.com/fcm/send';
	   $fields = array(
	       'registration_ids' => array($registration_ids),
	       'data' => $message,
	   );
	   $headers = array(
	       'Authorization:key=' . GOOGLE_API_KEY,
	       'Content-Type: application/json'
	   );

	   $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, $url); 
	    curl_setopt($ch, CURLOPT_POST, true);
	    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	   // curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4 ); 
	    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

	    $result = curl_exec($ch);
	    curl_close($ch);
	 
	   //return $result;
	  //echo $result; exit;
	}

	function sendNotification($registration_ids, $message)
	{
	  // echo '<pre>';	
	  // print_r($registration_ids);exit;
	   $url = 'https://fcm.googleapis.com/fcm/send';
	   $fields = array(
	       'registration_ids' => $registration_ids,
	       'data' => $message
	   );

	   // echo '<pre>';
	   // print_r($fields);exit;
	   $headers = array(
	       'Authorization:key=' . GOOGLE_API_KEY,
	       'Content-Type: application/json'
	   );

	   $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, $url); 
	    curl_setopt($ch, CURLOPT_POST, true);
	    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	   // curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4 ); 
	    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

	    $result = curl_exec($ch);
	    curl_close($ch);
	   //print_r($result);exit;
	   //return $result;
	   //$result; 
	}

public  function king_time($a) {
  
   $b = strtotime("now");
   //get timestamp when tweet created
   $c = strtotime($a);
   //get difference
   $d = $b - $c;
   //calculate different time values
   $minute = 60;
   $hour = $minute * 60;
   $day = $hour * 24;
   $week = $day * 7;
       
   if(is_numeric($d) && $d > 0) {
       //if less then 3 seconds
       if($d < 3) return "Just now";
       //if less then minute
       if($d < $minute) return floor($d) . " seconds ago";
       //if less then 2 minutes
       if($d < $minute * 2) return "1 minute ago";
       //if less then hour
       if($d < $hour) return floor($d / $minute) . " minutes ago";
       //if less then 2 hours
       if($d < $hour * 2) return "1 hour ago";
       //if less then day
       if($d < $day) return floor($d / $hour) . " hours ago";
       //if more then day, but less then 2 days
       if($d > $day && $d < $day * 2) return "yesterday";
       //if less then year
       if($d < $day * 365) return floor($d / $day) . " days ago";
       //else return more than a year
       return "a year ago";
   }
}

public function encryptor($action, $string) {
    $output = false;

    $encrypt_method = "AES-256-CBC";
    //pls set your unique hashing key
    $secret_key = 'muni';
    $secret_iv = 'muni123';

    // hash
    $key = hash('sha256', $secret_key);

    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    //do the encyption given text/string/number
    if( $action == 'encrypt' ) {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    }
    else if( $action == 'decrypt' ){
    	//decrypt the given text/string/number
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }

    return $output;
}


}

?>