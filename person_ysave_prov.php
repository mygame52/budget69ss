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
} 

{
    $person_save = $_REQUEST['person_'];
    $citizenid_save = $_REQUEST['citizenid_'];
    if (($person_save == "")or ( $citizenid_save == "")) {
        echo "<meta http-equiv=\"refresh\" content=\"0;URL=person_error_prov.php\" />";
    } else {
        if (empty($citizenid_)){
           echo "sfdsfasfasfasasdf";
        }
        $sql = "INSERT INTO person_yuem (`id_yuem` ,`citizenid`,`person`,`amp`) VALUES (NULL,'$citizenid_','$person_','$sele_amp');";
    }
}
//							echo $sql;
$dbquery = mysql_db_query($dbname, $sql);
//							mysql_close();

echo "<meta http-equiv=\"refresh\" content=\"0;URL=prov_yuem_person_add.php\" />";
?>