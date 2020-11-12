<?php
 //session_unregister("nam");
 require_once('config.inc.php');  
mysql_select_db($dbname, $objConnect);
$query_search = "SELECT * FROM work where w_code = '$sel_w'";
$result = mysql_query($query_search);
$nums_rows = mysql_num_rows($result);
if ($nums_rows >= 1){
$fet = mysql_fetch_array($result);
$nam = $fet['w_name'] ;
 session_register("nam");
}else{
	echo "<FONT SIZE='4' COLOR='#FF6600'>โปรดคลิกเลือก  งาน / โครงการ ก่อน.</FONT>";
}
 ?>