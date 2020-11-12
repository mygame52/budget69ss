<?php session_start();
	@ini_set("display_errors", "0"); 
	session_unregister('sele_amp');
        session_unregister('full_name');
        session_unregister('sit');
	require("config.inc.php");
        
	$user_= $_REQUEST['sele_amp'];
	$pass_= $_REQUEST['pass_amp'];
	$hid = $_REQUEST['hid_re'];
	$hid8 = $_REQUEST['hid8'];
	$sit = $_REQUEST['sit'];

		if ($hid8 <> 908)
			{
			  exit();
			}else{
				$hid8=908;
				Session_register('hid8');
			} 
		if ($hid_re <> 85) {
			   exit();
			}
	
		if  ($sele_amp ==" " or $pass_amp ==" ") {
				exit();
			}
$enpass=base64_encode(trim($pass_));

mysql_connect($dbserver, $dbuser,$dbpass) or
				die("<hr><b> ติดต่อ server ไม่ได้>");
				
mysql_select_db($dbname) or  die("ติดฐานข้อมูลไม่ได้");

$sql = ("select * from  amp  where   id = '$user_' and pass = '$enpass' ");
 $result = mysql_query($sql);
	 if (!$result) {
		 echo "ไม่ถูกต้อง";
	 }
$num_rows = mysql_num_rows($result); //จำนวน  record  ที่พบ

if ($num_rows >= 1) 
  {
	$fet = mysql_fetch_array($result);
    $full_name = $fet['Name'] ;   //เก็บชื่อ ศบอ
	$doc = $fet['doc'];
    $sit = $fet['sit'] ;   //เก็บสิทธิ์ในการตัดยอด
	$act = "ok";
	$_SESSION['sess_id']=session_id();  //ประกาศตัวแปร session อีกแบบหนึ่ง
	session_register('sele_amp');					//ประกาศตัวแปร session อีกแบบหนึ่ง
	session_register('full_name');
	session_register('doc');
	session_register('sit');
	session_register('hid8');
	session_register('act');
//	setcookie("act" ,"ok" );
//        $user_ = $sele_amp;
//        $amp2 = addhistorydetail($user_,"Login Main Page","-");
        
        $date2 = date("d/m/Y H:i:s");
        $ip=@$REMOTE_ADDR; 
        $sqladdlogout = "INSERT INTO `history_detail` (`id_login` , `user_login` , `date_time` , `operate` , `budget_note`,`ip`)VALUES ('',  '$user_','$date2', 'Login main Page Amphur', '-','$ip')";
        $result_detail2 = mysql_query($sqladdlogout);

        
        echo "<meta http-equiv=\"refresh\" content=\"0;URL=menu_amp.php\" />";
} else {
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=login_amp-error.php\" />";
}

?>
