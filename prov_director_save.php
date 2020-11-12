<?php
require("config.inc.php");

$acod = $_REQUEST['acod'];
$anam = $_REQUEST['anam'];
$pp=base64_encode($anam);
if ($acod == "" or $anam == "") 	{
	exit;
}

$sql = "insert  into director (di, p_di) values ('$acod','$pp') ";
$result = mysql_query($sql);

if (!$result)  { 
	echo("เอ็กซิคิวต์คำสั่ง SQL ไม่ได้ " . mysql_error() ); 
} 	else {
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=prov_director.php\" />";
}
?>