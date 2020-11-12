<?php
include("config.inc.php");
$h1 = $_REQUEST['h1'];
$t2 = $_REQUEST['t2'];
$t3 = $_REQUEST['t3'];
//$t4=$_REQUEST['t4'];
$sql_up = "update amp set Name='$t2',doc='$t3' where id='$h1'";
mysql_query($sql_up);

echo "<meta http-equiv=\"refresh\" content=\"0;URL=prov_codename.php\" />";
?>			 