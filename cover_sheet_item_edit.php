<?php 
session_start();
require("config.inc.php");

mysql_connect($dbserver, $dbuser, $dbpass) or
	die("<hr><b> ติดต่อ server ไม่ได้>");

mysql_select_db($dbname) or  die("ติดฐานข้อมูลไม่ได้");

$cover_sheet_id = $_REQUEST["cover_sheet_id"];

$cover_sheet_item_id = $_REQUEST["cover_sheet_item_id"];
$remark = $_REQUEST["remark"];


// LOG
echo "cover_sheet_id=" . $cover_sheet_id;
echo "<BR>";
echo "cover_sheet_item_id=" . $cover_sheet_item_id;
echo "<BR>";
echo "remark=" . $remark;
echo "<BR>";

$sql = "UPDATE cover_sheet_item SET remark='$remark' WHERE id=$cover_sheet_item_id";

$updated_result = mysql_query($sql);


if (!updated_result) {
    echo "Error! อัพเดทรายการไม่สำเร็จ";
} else {
    // echo "อัพเดทรายการสำเร็จ";
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=cover_sheet_edit.php?cover_sheet_id=$cover_sheet_id\" />";
}


?>