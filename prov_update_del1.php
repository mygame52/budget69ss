<?php
session_start();
@ini_set("display_errors", "0"); //ใส่บรรทัดแรก
include("config.inc.php");
include("code2name_amp.php");
include("code2name_work.php");
// start หากไม่ได้เข้าใช้งานจากเมนู
if (trim($hid1) <> "03") {
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=menu_pro.php\" />";
}
// end หากไม่ได้เข้าใช้งานจากเมนู
$lmoney22 = $_SESSION["lmoney"];
$bath_yuem22 = $_SESSION["bath_yuem2"];
$bath_del22 = $_REQUEST['bath'];
$id_person_yuem22 = $_SESSION["id_person_yuem"];
$id_up22 = $_SESSION["id_yueam2"];

//echo "----------------".$id_up22;
$i_del = !isset($_REQUEST['i_del']);
$am_del = !isset($_REQUEST['am_del']);
$i_tem = !isset($_REQUEST['i_tem']);
//	$bath = !isset($_REQUEST['bath']);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"[]>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
    <head>
        <!--
        Created by Artisteer v3.1.0.48375
        Base template (without user's data) checked by http://validator.w3.org : "This page is valid XHTML 1.0 Transitional"
        -->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title><?php echo $mess_title ?></title>

        <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
        <!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
        <!--[if IE 7]><link rel="stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->

        <script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript" src="script.js"></script>

    </head>
    <body>
        <?php include 'include/header.inc.php'; ?>
        <div class="cleared reset-box"></div>
        <div class="rnut-bar rnut-nav">
            <div class="rnut-nav-outer">
                <ul class="rnut-hmenu">
                    <li>
                        <a href="prov_update.php" class="active">Back</a>
                    </li>	
                </ul><font size="4" color="ffffff">Login โดย :&nbsp;<?php echo $user_ ?></font>

            </div>
        </div>
        <div class="cleared reset-box"></div>
        <div class="rnut-layout-wrapper">
            <div class="rnut-content-layout">
                <div class="rnut-content-layout-row">
                    <div class="rnut-layout-cell rnut-content">
                        <div class="rnut-box rnut-post">
                            <div class="rnut-box-body rnut-post-body">
                                <div class="rnut-post-inner rnut-article">

                                    <!-- start การแก้ไขข้อมูล -->
                                    <div align="center">
                                        <TABLE width="60%" border="1"align="center">
                                            <!-- ตารางเส้นกรอบ  มี 1 แถว 1 คอลัมน์ -->
                                            <TR>
                                                <TD>

                                                    <?PHP
                                                    $ok_ = $_REQUEST['ok_'];
                                                    $id_item = $_REQUEST['i_del'];
                                                    $hadpol = $_REQUEST['hadpol'];
                                                    if ($ok_ != 'Y') {
                                                        echo " <font size='3' color='#ff0000'><CENTER>ยกเลิก การลบข้อมูล</CENTER></font><BR><BR>";
                                                        echo "<meta http-equiv=\"refresh\" content=\"2;URL=prov_update.php\" />";
                                                        exit();
                                                    }

                                                    if ($hadpol == "") {
                                                        echo "<font size='3' color='#ff0000'><CENTER>ต้องระบุเหตุผลที่จะลบข้อมูล</CENTER></font><BR><BR>";
                                                        exit();
                                                    }

                                                    if ($user_ == "") {
                                                        echo "<CENTER>มีข้อผิดพลาดต้องเข้าสู่ระบบใหม่</CENTER><BR><BR>";
                                                        exit();
                                                    }
                                                    mysql_connect($dbserver, $dbuser, $dbpass) or
                                                            die("<hr><b> ติดต่อ server ไม่ได้>");
                                                    mysql_select_db($dbname) or die("ติดฐานข้อมูลไม่ได้");

                                                    $sql = ("select * from  item where id_item= '$id_item'");
                                                    $result = mysql_query($sql);
                                                    $num_rows = mysql_num_rows($result); //จำนวน  record  ที่พบ

                                                    if ($num_rows = 1) {
                                                        $fetch_rec = mysql_fetch_array($result);
                                                        $kong = $fetch_rec['c_khong'];  //ได้ค่าตัวแปร kong   (รหัสงานจาก item)
                                                        $ngn = $fetch_rec['bath']; // เก็บค่าเงินของรายการที่ลบ	
                                                        $chk_id_ = $fetch_rec['chk_id'];
                                                        $id_person_yuem_del = $fetch_rec['id_yuem'];
                                                    } else {
                                                        echo "<CENTER>ไม่มีข้อมูลนี้ครับ";
                                                        echo "  กลับไปเริ่มต้นใหม่</CENTER>";
                                                        exit();
                                                        echo "<meta http-equiv=\"refresh\" content=\"2;URL=prov_update.php\" />";
                                                    }

                                                    if ($chk_id_ == "2") {
                                                        echo "<center><font size='3' color='ff0000'>รายการนี้ได้ ล้างเงินยืมแล้ว ไม่สามารถลบได้ !! ท่านต้องลบรายการล้างเงินยืมก่อน</font></center>";
                                                        echo "<meta http-equiv=\"refresh\" content=\"10;URL=prov_update.php\" />";
                                                        exit();
                                                    }

                                                    $sql_jud = ("select * from judsun where code= '$kong'");
                                                    $result_jud = mysql_query($sql_jud);
                                                    $rows_jud = mysql_num_rows($result_jud); //จำนวน  record  ที่พบ	
                                                    if ($rows_jud = 1) {
                                                        $fetch_rec = mysql_fetch_array($result_jud);
                                                        $rua_old = $fetch_rec['rua'];

                                                        if ($lmoney22 == "A") {
                                                            $rua_new = $rua_old + ($bath_yuem22 - $bath_del22);
                                                            $lmoney22 = "A";
//								echo "-----------A-------------";
                                                        } else {
                                                            if ($lmoney22 == "B") {
//								echo "-----------B-------------";
                                                                $rua_new = $rua_old - $bath_del22;
                                                                $lmoney22 == "B";
                                                            }
                                                        }
                                                    }

                                                    $sql_update = ("update judsun set rua = '$rua_new' where code = '$kong'");
                                                    $result = mysql_query($sql_update);

                                                    //echo " แก้ไขจำนวนเงินคงเหลือแล้ว  $rua_old";
                                                    //<!-- เก็บข้อมูลก่อนลบ   -->

                                                    $sql_in = "insert into del_item ( `id_item` , `amp_item` , `c_khong` , `item` , `doc` , `date_time` , `bath` , `staus` , `user` ) select id_item , amp_item , c_khong , item , doc , date_time , bath , staus , user from  item where id_item= '$id_item'";
                                                    $result = mysql_query($sql_in);

                                                    $datetime = date($timeformat, $THdt);
                                                    $sql_update2 = ("UPDATE del_item SET  user_del ='$user_' , time_del = '$datetime' , hadpol ='$hadpol' where id_item= '$id_item'");
                                                    $result = mysql_query($sql_update2);
                                                    //<!-- เก็บข้อมูลก่อนลบ   -->
// start update ค่า status ของ ผู้ยืมเงิน

                                                    if ($lmoney22 == "A") {
                                                        // ถ้าเป็นการลบ   รายการล้างเงินยืม ให้ ไป set ค่า chk_id เป็น 1 ว่ายังค้างเงินยืมอยู่
                                                        echo "<center>ID update : &nbsp;" . $id_up22 . "&nbsp;สถานะการยืมแล้ว</center>";
                                                        $sql_updatep = ("UPDATE item SET chk_id='1' WHERE id_item='$id_up22'");
                                                        $resultp = mysql_query($sql_updatep);
                                                        echo "<center>Update สถานะการยืมแล้ว</center>";
                                                        // ถ้าเป็นการลบ   รายการล้างเงินยืม ให้ ไป set ค่า person_yuem เป็น 1 สิทธิของบุคคลยังค้างเงินยืมอยู่
                                                        $sql_updatey2 = ("UPDATE person_yuem SET chk_status = '1' WHERE id_yuem='$id_person_yuem22'");
                                                        $result2 = mysql_query($sql_updatey2);
                                                    } else {
                                                        //		echo "--------------------------ลบการยืม------------------------".$id_yuem_del2;
                                                        // ถ้าเป็นการลบ การยืมเงิน ให้ ไป set ค่า person  ให้ว่าง
                                                        $sql_updatep2 = ("UPDATE person_yuem SET chk_status = '0' WHERE id_yuem='$id_person_yuem_del'");
                                                        $resultp2 = mysql_query($sql_updatep2);
                                                    }
                                                    session_unregister("lmoney");

// end update ค่า status ของผู้ยืมเงิน

                                                    $sql_del = ("delete from  item where id_item= '$id_item'");
                                                    $result = mysql_query($sql_del);
                                                    echo "<font size='3' color='#ff0000'><CENTER><BR>.ลบข้อมูล  Record : $id_item  แล้ว</CENTER></font><br>";
                                                    echo "<meta http-equiv=\"refresh\" content=\"2;URL=prov_update.php\" />";
                                                    ?>
                                                    <!-- ปิดตารางเส้นกรอบ -->
                                                </TD>
                                            </TR>
                                        </TABLE>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- end การแก้ไขข้อมูล -->
                        <?php include("./include/footer.inc"); ?>
                        </body>
                        </html>