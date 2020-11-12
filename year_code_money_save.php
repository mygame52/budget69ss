<?php
include("config.inc.php");
	$h1=$_REQUEST['h1'];
	$t1=$_REQUEST['t1'];
	$t2=$_REQUEST['t2'];
	$t3=$_REQUEST['t3'];

		$sql_up = "update samnak set name_sam='$t1',nam_sam='$t2',mony_pee='$t3' where code_sam='$h1'";
		mysql_query($sql_up);
	 	header("location:year_code_money.php");
  ?>			 