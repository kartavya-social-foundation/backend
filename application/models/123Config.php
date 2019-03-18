<?php
$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="capercrawl_admin"; // Database name
/*$username="craftoon_samart";//"root"; // Mysql username
$password="Year#2013";//""; // Mysql password
$db_name="craftoon_recuiter"*/
$con = mysql_connect("$host","$username","$password");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("$db_name", $con);
ini_set('display_errors', 0);
date_default_timezone_set("Asia/Kolkata");
?>
<?php
//clean the variable start
function clean($str)
{
	$str = @trim($str);
	if (get_magic_quotes_gpc())
	{
		$str =stripslashes($str);
	}
	$str = htmlspecialchars($str, ENT_IGNORE, 'utf-8');
	$str = strip_tags($str);
	$str = stripslashes($str);
	return mysql_real_escape_string($str);
}
foreach(array_keys($_REQUEST) as $key)
{
	$_REQUEST[$key] = clean($_REQUEST[$key]);
}
//clean the variable end

//for getting one value of any table
function getonevalue($table,$column,$condition)
{
	$sql_one="select $column from $table where $condition";
	//echo $sql_one;
	$row_one=mysql_query($sql_one);
	$data_one=mysql_fetch_array($row_one);
	return($data_one[$column]);
}

//for getting one value of any table
function getmultivalue($table,$columns,$condition)
{
	$sql_one="select $columns from $table where $condition";
	//echo $sql_one;
	$row_one=mysql_query($sql_one);
	$data_one=mysql_fetch_array($row_one);
	return($data_one);
}

//for one row
function getrow($table,$condition)
{
	$sql_one="select * from $table where $condition";
	//echo $sql_one;
	$row_one=mysql_query($sql_one);
	$data_one=mysql_fetch_array($row_one);
	return($data_one);
}
//for count record
function countrec($table,$condition)
{
	$sql_one="select * from $table where $condition";
	//echo $sql_one;
	$row_one=mysql_query($sql_one);
	$data_one=mysql_num_rows($row_one);
	return($data_one);
}
//for mail send simple
/*function mailsend($email,$sub,$msg)
{   
	//echo "asdf";  
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
	$headers .= "From: Admin Craftoon<info@craftoon.com/>" . "\r\n";
	//$headers .= 'Cc: anupam@provanic.net' . "\r\n";
	if(mail($email,$sub,$msg,$headers))
		return("1");
	else
		return("0");
}*/
//====================== redirect to file ===================
function redirect($loc)
{
print '<script type="text/javascript">window.location = "'.$loc.'";</script>';
//print '<script type="text/javascript">window.open('.$loc.',_blank);<script>';
}

//send mail
function mailsend($email,$sub,$msg)
{   //echo "asdf";  
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
	$headers .= "From: Admin Cieker via Provanic<admin@provanic.org>" . "\r\n";
	//$headers .= 'Cc: mpdoctors@gmail.com' . "\r\n";
	if(mail($email,$sub,$msg,$headers))
		return("1");
	else
		return("0");
}

function sendenquiry($email,$sub,$msg)
{   //echo "asdf";  
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
	$headers .= "From: Admin CaperCrawl <mail@capercrawl.com>" . "\r\n";
	//$headers .= 'Cc: ansarizubear@gmail.com' . "\r\n";
	if(mail($email,$sub,$msg,$headers))
		return("1");
	else
		return("0");
}

//create array
function create_array($fld,$tbl,$cond,$ord,$lmt)
{ $arr = array();
  $res=selectqry($fld,$tbl,$cond,$ord,$lmt);
while($drows=mysql_fetch_array($res)) 
{
	array_push($arr,$drows[$fld]);
}  
  return $arr;
}

//==================== select query ======================
function selectqry($fld,$tbl,$cond,$ord,$lmt)
{ $sql = "Select ".$fld." from ". $tbl ;
  if($cond)
  $sql = $sql. " where ". $cond;
  if($ord)
  $sql = $sql. " order by ". $ord;
  if($lmt)
  $sql = $sql. $lmt;
  //echo $sql;
  return mysql_query($sql);
 }
?>
<?php
	function time_diff($pass_time)
	{
		$timezone = new DateTimeZone("Asia/Kolkata" );
		$date = new DateTime();
		$date->setTimezone($timezone );
		$cur_date_time=$date->format('Y-m-d H:i:s');
		
		$to_time = strtotime($cur_date_time);
		$from_time = strtotime($pass_time);
		$time = round(abs($to_time - $from_time) / 60,2);
		//echo floor($time). " minutes ago";
		$time=floor($time);
		if($time == 0)
		{
			echo "a few seconds ago";
		}
		else if($time < 60)
		{
			echo floor($time). " minutes ago";
		}
		else if($time >= 60 && $time <= 1440)
		{
			$hour=$time/60;
			echo floor($hour). " hours ago";
		}
		else if($time >= 1440 && $time <= 2880)
		{
			echo "yesterday at ".date("d, M-y h:i A",strtotime($pass_time));
		}
		else if($time >= 2880)
		{
			echo "At ".date("d, M-y h:i A",strtotime($pass_time));
		}
	}
?>