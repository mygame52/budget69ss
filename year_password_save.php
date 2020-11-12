<?php

session_start();
include("config.inc.php");
if (trim($hid1) <> "03") {
    echo "	<SCRIPT language='JavaScript'>";
    echo "			alert('ท่านเข้าสู่ระบบไม่ถูกต้อง')";
    echo"			location.href='index.php'";
    echo"	</SCRIPT>";
    exit();
}

mysql_connect($dbserver, $dbuser, $dbpass) or
        die("<hr><b> ติดต่อ server ไม่ได้>");
mysql_select_db($dbname) or die("ติดต่อฐานข้อมูลไม่ได้");
$w_code = $_REQUEST['w_code'];
$w_nam = $_REQUEST['name'];
//$w_sit  = $_REQUEST['sit'];
$w_pas = $_REQUEST['pass'];

$sql = ("select * from  amp  where id= '$w_code'");
$result = mysql_query($sql);
$num_rows = mysql_num_rows($result); //จำนวน  record  ที่พบ

$password = base64_encode(trim($w_pas));
$sql_up = ("update  amp set pass= '$password' where id='$w_code' ");
$result = mysql_query($sql_up);


echo "<meta http-equiv=\"refresh\" content=\"0;URL=./year_budget_password.php\" />";
?>
