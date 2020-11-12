<?php
mysql_select_db($dbname, $objConnect);
$query_search = "SELECT * FROM work";
$result = mysql_query($query_search);
$nums_rows = mysql_num_rows($result);
 
for($i=1;$i<=$nums_rows; $i++){
     	$fet = mysql_fetch_array($result);
 		$K=$fet['w_code'];
 	 	$w_name[$K] = $fet['w_name'];
	 }
 ?>