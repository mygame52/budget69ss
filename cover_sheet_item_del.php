<?php
    session_start();
    include("config.inc.php");

    // REQUEST
    $cover_sheet_item_id = $_REQUEST['cover_sheet_item_id'];
    // echo "item_id".$item_id;
    $cover_sheet_id = $_REQUEST['cover_sheet_id'];
    // echo "cover_sheet_id" . $cover_sheet_id;

    if (!$cover_sheet_item_id) {
        // TODO
        // redirect to cover sheet page
    }
    
    if (!cover_sheet_id) {
        // TODO
        // redirect to cover sheet page
    }

    

    // Connect to Databases
    mysql_connect($dbserver, $dbuser, $dbpass) or die("<hr><b>เชื่อมต่อฐานข้อมูลไม่ได้");
    mysql_select_db($dbname) or die("เลือกฐานข้อมูลไม่ได้");
                                                                

    // DELETE cover_sheet_item by id
    $sqlStr = "DELETE FROM cover_sheet_item WHERE id=$cover_sheet_item_id";
    $result = mysql_query($sqlStr);


    // after DELETE cover sheet item. handle result
    // if not success to DELETE  -> display error message and back to cover sheet button
    // else redirect to cover_sheet_edit?cover_sheet_id=$cover_sheet_id

    if (!$result) {
        echo "Error! ลบ รายการไม่สำเร็จ";
        // echo "<a href="cover_sheet.php" class="active">Back</a>";
        // <input type="button" 
    } else {
        echo "<meta http-equiv=\"refresh\" content=\"0;URL=cover_sheet_edit.php?cover_sheet_id=$cover_sheet_id\" />";
    }


?>
