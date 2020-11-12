<?php

	include "config.inc.php";


mysql_select_db($dbname) or  die("ติดฐานข้อมูลไม่ได้");

$sql = "SELECT * FROM amp where  id = $amp";
$result = mysql_query($sql);
$r=mysql_fetch_array($result);
$num_rows = mysql_num_rows($result); //จำนวน  record  ที่พบ
//echo "แถว".$num_rows;
if($num_rows > 0){
	$sbo=$r['Name'];
}else{
$sbo="ไม่พบข้อมูลสถานศึกษา";
}
  echo "  : ".$sbo;
