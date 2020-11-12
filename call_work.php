<?php
	require_once('config.inc.php');  
	mysql_select_db($dbname, $objConnect);
	$query_Recordset1 = "SELECT * FROM work";
	$Recordset1 = mysql_query($query_Recordset1, $objConnect) or die(mysql_error());
	$totalRows_Recordset1 = mysql_num_rows($Recordset1);

	while($row_ = mysql_fetch_assoc($Recordset1)){
	 $work[$row_['w_code']] = $row_['w_name'];
	}
?>