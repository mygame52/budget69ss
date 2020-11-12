<?php
//session_start();
$khong= trim(substr($c_khong,2));

 	include "config.inc.php";
 
 mysql_select_db($dbname) or  die("ติดฐานข้อมูลไม่ได้");

$sql = "SELECT * FROM work where  w_code like $khong ";
$result = mysql_query($sql);
$r=mysql_fetch_array($result);
$num_rows = mysql_num_rows($result); //จำนวน  record  ที่พบ

if($num_rows >= 1){
	$nKong=$r['w_name'];
	//session_register("nkong" );
    echo "  : ".$r['w_name'];
}else{
echo "ไม่มี";
}
 
?>