<?php

session_start();
@ini_set("display_errors", "0");
require_once('config.inc.php');
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
if ($act != "ok") {
    echo "เข้าสู่ระบบไม่ถูกต้อง";
    exit();
}

$name_saler_ = $_REQUEST['name_saler'];
$address_saler_ = $_REQUEST['address_saler'];
$account_bank_ = $_REQUEST['account_bank'];
$bank_saler_ = $_REQUEST['bank_saler'];
$branch_bank_ = $_REQUEST['branch_bank'];
$tel_saler_ = $_REQUEST['tel_saler'];

if (($name_saler_ == "")) {
    echo "<script language=\"JavaScript\">";
    echo "alert('input data for saler');";
    echo "</script>";
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=saler_add.php\" />";
} else {
    if ($_REQUEST['edit'] == "edit") {
        //echo "แก้ไข";
        $id_saler_ = $_REQUEST['idsalersave'];
        $sql = "UPDATE saler SET name_saler='$name_saler_', address_saler='$address_saler_', account_bank='$account_bank_', bank_saler = '$bank_saler_',branch_bank='$branch_bank_',tel_saler='$tel_saler_'  where id_saler='$id_saler_'";
    } else {
        //echo "เพิ่ม";
        $sql = "INSERT INTO saler (`id_saler` ,`name_saler`,`address_saler`,`account_bank`,`bank_saler`,`branch_bank`,`tel_saler`,`id_amp`) VALUES ('','$name_saler_','$address_saler_','$account_bank_','$bank_saler_','$branch_bank_','$tel_saler_','$sele_amp')";
    }
}

$result_saler = mysql_query($sql);



echo "<meta http-equiv=\"refresh\" content=\"0;URL=saler.php\" />";
?>