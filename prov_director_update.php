<?php
require("config.inc.php");
mysql_connect($dbserver, $dbuser,$dbpass) or
	die("<hr><b> ติดต่อ server ไม่ได้>");
mysql_select_db($dbname) or  die("ติดฐานข้อมูลไม่ได้");
$w_code = $_REQUEST['di'];
$w_name = $_REQUEST['p_di'];

$sql = ("select * from  director  where di= '$w_code'");
$result = mysql_query($sql);
$num_rows = mysql_num_rows($result); //จำนวน  record  ที่พบ
$pp=base64_encode($w_name);
 
$sql_up = "update  director set p_di= '$pp'  where di='$w_code' ";
$result = mysql_query($sql_up);
echo "<meta http-equiv=\"refresh\" content=\"0;URL=prov_director.php\" />";
?>