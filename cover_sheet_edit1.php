<?php
	require("config.inc.php");
	mysql_connect($dbserver, $dbuser,$dbpass) or die("<hr><b> ติดต่อ server ไม่ได้>");
	mysql_select_db($dbname) or  die("ติดฐานข้อมูลไม่ได้");
	$cover_sheet_id = $_REQUEST["cover_sheet_id"];
	$title = $_REQUEST["title"];
	$status = $_REQUEST["status"];
	$sql = "UPDATE cover_sheet 
			SET title='$title', status='$status' 
			WHERE id=$cover_sheet_id";

	$result = mysql_query($sql);

	if (!result) {
		// display error message
		echo "Error! อัพเดทใบปะหน้าไม่สำเร็จ";
		// back button to cover_sheet_edit.php?cover_sheet_id=$cover_sheet_id
	} else {
		// redirect to cover_sheet_edit.php?cover_sheet_id=$cover_sheet_id
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=cover_sheet_edit.php?cover_sheet_id=$cover_sheet_id\" />";
	}
	?>