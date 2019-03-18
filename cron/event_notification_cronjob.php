<?php 
$conn        =    mysqli_connect("localhost","BRApp","BRApp") or die('Server Information is not Correct');
mysqli_select_db($conn, "BRApp") or die('Database Information is not correct');
 
date_default_timezone_set("Asia/Kolkata");
$militime=round(microtime(true) * 1000);
$fromcur =  date('Y-m-d H:i:s');
    $userids = array();
    $eventcrt = mysqli_query($conn,"SELECT * FROM event WHERE admin_status = 1 AND delete_status = 0 AND start_date_time > '$fromcur' AND notifi_status = 0 ORDER BY start_date_time DESC");
   //$eventcrt = $this->db->query("SELECT * FROM event WHERE event_id = 11")->row();
if(mysqli_num_rows($eventcrt))
{ 
  while($res=mysqli_fetch_array($eventcrt)) {

      $date1 = strtotime($res['start_date_time']);
      $date2 = strtotime($fromcur);
      $diffHours = round(($date1 - $date2) / 3600);
      if($diffHours<25 || $diffHours >= 23)
      { 
          $responsedata = mysqli_query($conn,"SELECT user_id FROM event_response WHERE event_id = ".$res['event_id']." AND response_status != 3");
          if(mysqli_num_rows($responsedata)>0) 
          {
              $userids = $res_ii = array();
              while($res_ii = mysqli_fetch_assoc($responsedata))
              {
                $userids[] = $res_ii['user_id'];
                
              }
          }
      }
  }
  if(!empty($userids)){

        $user_id = implode(',', $userids);
        $devicetoken=mysqli_query($conn,"SELECT device_token FROM `users` where user_id IN ($user_id) AND device_token != ''");
        $gcmRegIds = array();
          $i = 0;
          while($query_row = mysqli_fetch_assoc($devicetoken)) 
          {
              $i++;
              $gcmRegIds[floor($i/1000)][] = $query_row['device_token'];
          }
        $pushMessage=array("msg"=>"You have a event tommorow ","type"=>"1");
        if(isset($gcmRegIds)) 
        {
          $message = $pushMessage;
          $pushStatus = array();
          foreach($gcmRegIds as $val) $pushStatus[] = sendPushNotification($val, $message);
        }
    }
}

function sendPushNotification($registration_ids, $message)
{
  //print_r($message);exit;
    $url = 'https://android.googleapis.com/gcm/send';
    $fields = array(
        'registration_ids' => $registration_ids,
        'data' => array("message"=>$message),
    );

    define('GOOGLE_API_KEY', '');

    $headers = array(
        'Authorization:key=' . GOOGLE_API_KEY,
        'Content-Type: application/json'
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

     $result = curl_exec($ch);
  //  if($result === false)
       // die('Curl failed ' . curl_error());

    curl_close($ch);
  //echo $result; exit;
}                 
?>
        