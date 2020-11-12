<?php
include("config.inc.php");
	$idd=$_REQUEST['h1'];
	$t2=$_REQUEST['box'];
	if($t2=="9"){
       $sql_del = "delete from samnak where code_sam='$idd'";
       mysql_query($sql_del);
	}else{

                echo "<meta http-equiv=\"refresh\" content=\"0;URL=year_code_money.php\" />";
	}

                echo "<meta http-equiv=\"refresh\" content=\"0;URL=year_code_money.php\" />";

	?>			 