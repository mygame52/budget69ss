<?php
@ini_set("display_errors", "0");
session_start();
session_unregister('sele_dai');

$user_= $_REQUEST['sele_dai'];
@$pass_= $_REQUEST['pass_dai'];
$hid = $_REQUEST['hid_re'];
session_register('hid');
//echo "--------------- hid--------: ".$hid;
if ($hid <> 85) { 	echo "<meta http-equiv=\"refresh\" content=\"0;URL=login_director.php\" />";}
if ($sele_dai ==" " or $pass_dai ==" ") {
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=login_director.php\" />";
	}

include("config.inc.php");
mysql_connect($dbserver, $dbuser,$dbpass) or
				die("<hr><b> ติดต่อ server ไม่ได้>");
				
mysql_select_db($dbname) or  die("ติดฐานข้อมูลไม่ได้");

$w_pas= base64_encode($pass_dai);

$sql = ("select * from  director where di ='$sele_dai' and p_di = '$w_pas' ");
$result = mysql_query($sql);
$num_rows = mysql_num_rows($result); //จำนวน  record  ที่พบ

if ($num_rows >= 1) {	
	$fet = mysql_fetch_array($result);
        $full_name = $fet['di'] ;   
	session_register('full_name');
        
        $ip_=@$REMOTE_ADDR; 
        $user_ = $full_name;
        
        $date2 = date("d/m/Y H:i:s");
        $sqladdlogout = "INSERT INTO `history_detail` (`id_login` , `user_login` , `date_time` , `operate` , `budget_note`, `ip`)VALUES('',  '$user_','$date2', 'Login Main Page Director', '-','$ip_')";
        $result_detail2 = mysql_query($sqladdlogout);
        
        
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=menu_director.php\" />";
} else {
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=login_director.php\" />";
}
?>
</body>
</html>
