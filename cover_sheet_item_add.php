<?php
    session_start();
    include("config.inc.php");

    // REQUEST
    $item_id = $_REQUEST['item_id'];
    // echo "item_id".$item_id;
    $cover_sheet_id = $_REQUEST['cover_sheet_id'];
    // echo "cover_sheet_id" . $cover_sheet_id;

    // Connect to Databases
    mysql_connect($dbserver, $dbuser, $dbpass) or die("<hr><b>เชื่อมต่อฐานข้อมูลไม่ได้");
    mysql_select_db($dbname) or die("เลือกฐานข้อมูลไม่ได้");


    // ------------------------------ Solution 1 ---------------------------------------------
    // TODO: 1.ตรวจสอบว่ามี $item_id อยู่ไหน table item ไหม
    $check_item_id_sql_1 = "SELECT * FROM item WHERE id_item=$item_id";
    $check_item_id_result_1 = mysql_query($check_item_id_sql_1);

    if (mysql_num_rows($check_item_id_result_1) > 0) {
        // $item = mysql_fetch_assoc($check_item_id_result_1);
        // TODO: 2.ตรวจสอบว่า $item_id นี้ ได้เพิ่มไว้ใน cover sheet ไหน แล้วหรือยัง
        $check_item_id_sql_2 = "SELECT * FROM cover_sheet_item WHERE item_id=$item_id";
        $check_item_id_result_2 = mysql_query($check_item_id_sql_2);

        if (mysql_num_rows($check_item_id_result_2) > 0) {
            echo "รายการ id = " . $item_id . " ถูกนำไปสร้างใบปะหน้าแล้ว";
        } else {
            // ยังไม่มี item_id นี้ ใน table cover_sheet_item ก็ให้เพิ่ม cover_sheet_item ได้
            
            $created_date = date($timeformat,$THdt);
            $insert_cover_sheet_item_sql = "INSERT INTO cover_sheet_item(cover_sheet_id, item_id, created_date) VALUES ($cover_sheet_id, $item_id, '$created_date')";
            $result = mysql_query($insert_cover_sheet_item_sql);
            

            // after instert cover sheet item. handle result
            // if insert not success  -> display error message and back to cover sheet buttos
            // else redirect to cover_sheet_edit?cover_sheet_id=$cover_sheet_id

            if (!$result) {
                echo "Error! บันทึก รายการไม่สำเร็จ " . mysql_error();
                // echo "<a href="cover_sheet.php" class="active">Back</a>";
                // <input type="button" 
            } else {
                echo "<meta http-equiv=\"refresh\" content=\"0;URL=cover_sheet_edit.php?cover_sheet_id=$cover_sheet_id\" />";
            }

        }


    } else {
        echo "ไม่มีรายการเบิกจ่าย id = " . $item_id . "ในฐานข้อมูล";
        
    }



    // -------------------------------- Solution 2 ---------------------------------------------------
    // $insert_cover_sheet_item_sql = "INSERT INTO cover_sheet_item(cover_sheet_id, item_id) VALUES ($cover_sheet_id, $item_id)";
    // $result = mysql_query($insert_cover_sheet_item_sql);

    // // after instert cover sheet item. handle result
    // // if insert not success  -> display error message and back to cover sheet buttos
    // // else redirect to cover_sheet_edit?cover_sheet_id=$cover_sheet_id

    // if (!$result) {
    //     echo "Error! บันทึก รายการไม่สำเร็จ";
    //     // echo "<a href="cover_sheet.php" class="active">Back</a>";
    //     // <input type="button" 
    // } else {
    //     echo "<meta http-equiv=\"refresh\" content=\"0;URL=cover_sheet_edit.php?cover_sheet_id=$cover_sheet_id\" />";
    // }
    

?>
