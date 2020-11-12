<?php
	require_once('config.inc.php');  
	mysql_select_db($dbname, $objConnect);
	$query_Recordset1 = "SELECT * FROM amp";
	$Recordset1 = mysql_query($query_Recordset1, $objConnect) or die(mysql_error());
	$totalRows_Recordset1 = mysql_num_rows($Recordset1);
	$i=1;
	while($row_ = mysql_fetch_assoc($Recordset1)){
	   $a=intval($row_['id']);
	   $am[$a] = $row_['Name'];
	    $i++;
	}
?>