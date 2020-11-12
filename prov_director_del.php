<?php
require("config.inc.php");
mysql_connect($dbserver, $dbuser,$dbpass) or
				die("<hr><b> ติดต่อ server ไม่ได้>");

mysql_select_db($dbname) or  die("ติดฐานข้อมูลไม่ได้");
$w_del = $_REQUEST['w_del'];

//$id_item = $_REQUEST['w_del'];
$sql = ("select * from  director  where di= '$w_del'");
$result = mysql_query($sql);
$num_rows = mysql_num_rows($result); //จำนวน  record  ที่พบ


$sql_del = ("delete from  director where di = '$w_del'");
$result = mysql_query($sql_del);
echo "<CENTER>ลบข้อมูล  Record : $w_del  แล้ว </CENTER>";
//header("location:re1.php");  
echo "<meta http-equiv=\"refresh\" content=\"0;URL=prov_director.php\" />";
?>