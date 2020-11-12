<?php

session_start();
@ini_set("display_errors", "0"); //ใส่บรรทัดแรก
require_once('config.inc.php');

if (trim($hid1) <> "03") {
    echo "	<SCRIPT language='JavaScript'>";
    echo "			alert('ท่านเข้าสู่ระบบไม่ถูกต้อง')";
    echo"			location.href='index.php'";
    echo"	</SCRIPT>";
    exit();
} {
    $position_save = $_REQUEST['position_'];
    if ($position_save == "") {
        echo "<meta http-equiv=\"refresh\" content=\"0;URL=prov_position_error.php\" />";
    } else {
        $sqlu = "INSERT INTO position (`idp` ,`position`) VALUES ('','$position_save');";
    }
}
//							echo $sql;
$dbquery = mysql_db_query($dbname, $sqlu);
//							mysql_close();

echo "<meta http-equiv=\"refresh\" content=\"0;URL=prov_position_add.php\" />";
?>