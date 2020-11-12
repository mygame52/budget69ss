<?php
mysql_select_db($dbname, $objConnect);
$query_search = "SELECT * FROM amp";
$result = mysql_query($query_search);
$nums_rows = mysql_num_rows($result);
 
for($i=1;$i<=$nums_rows; $i++){
     	$fet = mysql_fetch_array($result);
 		$K=$fet['id'];
		$doc[$K] = $fet['doc'];
		$douc[$K] = $fet['doc'];
	 	$xxx[$K] = $fet['Name'];
	 }
 ?>