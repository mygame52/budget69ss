<?php session_start();
require("config.inc.php");

$w_code = $_REQUEST['u_ser'];
$w_name = $_REQUEST['pass'];
$set_del = $_REQUEST['set_del'];
$set_add = $_REQUEST['set_add'];
$set_work = $_REQUEST['set_work'];
$sql = ("select * from  you_ser  where u_ser= '$w_code'");
$result = mysql_query($sql);
$num_rows = mysql_num_rows($result); //จำนวน  record  ที่พบ
$pp=base64_encode($_REQUEST['pass']);
//echo "<center>";
//echo $pp;
//echo"<BR>";

//$sql_up = ("update  you_ser set pass= PASSWORD('$w_name'),set_del='$set_del' , set_add='$set_add' where u_ser='$w_code' ");

$sql_up = ("update  you_ser set pass= '$pp',set_del='$set_del' , set_add='$set_add' , set_work='$set_work' where u_ser='$w_code' ");

$result = mysql_query($sql_up);
//echo "แก้ไขข้อมูล  Record : $w_code  แล้ว";
//header("location:re1.php");  
echo "<meta http-equiv=\"refresh\" content=\"0;URL=./prov_person\" />";

?>