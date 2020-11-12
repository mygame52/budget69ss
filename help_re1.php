<?php
 //session_unregister("nam");
include("config.inc.php"); 
mysql_select_db($dbname, $objConnect);
$query_search = "SELECT * FROM amp where id = '$sel'";
$result = mysql_query($query_search);
$nums_rows = mysql_num_rows($result);
if ($nums_rows >= 1){
$fet = mysql_fetch_array($result);
$nam = $fet['Name'] ;
 session_register("nam");
}else{ 
	echo "<BR><BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<FONT SIZE='4' COLOR='#FF6600'>โปรดคลิกเลือก  สถานศึกษา.</FONT>";
	exit();
}
 ?>