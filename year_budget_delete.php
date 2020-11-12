<?php
session_start();
include("config.inc.php");
if (trim($hid1) <> "03") {
    echo "	<SCRIPT language='JavaScript'>";
    echo "			alert('ท่านเข้าสู่ระบบไม่ถูกต้อง')";
    echo"			location.href='index.php'";
    echo"	</SCRIPT>";
    exit();
}
$a = 0;
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
                        <a href="./menu_pro.php" class="active">Back</a>
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
                                    <br><!-- <h2 class="rnut-postheader" style="text-align:center;">
                                    การเปิด - ปิด สถานะการตัดยอดงบประมาณ
                                    </h2> -->
                                        <!-- start การแก้ไขข้อมูล -->



                                        <!--                                        ลบข้อมูล รายการจ่ายปีปัจจุบัน-->
                                        <CENTER> ลบข้อมูลในปีปัจจุบัน เพื่อเตรียมบริหารงานในปีงบประมาณใหม่ประกอบด้วย <BR>

                                                <table width='60%'>
                                                    <tr><td bgcolor='#ff0000'  style="text-align: center">** ระบบจะลบข้อมูล</td><td bgcolor='#00CC00' style="text-align: center">** ระบบการจะเก็บรักษา</td></tr>
                                                    <tr><td>- รายการจ่ายทั้งหมด </td><td>- ข้อมูลหน่วยงานเบิกจ่าย</td></tr>
                                                    <tr><td>- รายการจัดสรรทั้งหมด</td><td>- ข้อมูลบุคลากร(ยืมเงิน)</td></tr>
                                                    <tr><td>- รายการรับโอนงบประมาณ</td><td>- ข้อมูลผู้ขาย</td></tr>
                                                    <tr><td>- ประวัติการเข้าใช้งานและการทำรายการ</td><td>- ข้อมูลผู้ใช้และรหัสผ่าน</td></tr>
                                                    <tr><td>- รายการยืม-คืน</td><td>- ข้อมูลประเภทงบประมาณ-โครงการ</td></tr>
                                                </table>
                                                <?php
                                                if ($user_ <> "admin") {
                                                    echo "<BR><CENTER><h2> คุณ <font color='#ff0000'>$user_</font>  ไม่มีสิทธิ์ในเมนูนี้ : ต้องเป็น Admin เท่านั้น  ครับ</h2>";
                                                    exit();
                                                }
                                                echo "<BR>";
                                                echo "ยืนยันการลบโดย กด 9 " . "<br><br>";
                                                echo "<FORM METHOD=POST ACTION='year_budget_deletes.php'>";
                                                echo "<table width=20%><tr><td align='center'>";
                                                echo "<INPUT TYPE='text' NAME='ok_' size = '1'>";
                                                echo "</td></tr>";
                                                echo "<tr><td><div align='center'>";
                                                echo "<INPUT TYPE='submit' value = 'ยืนยัน'>";
                                                echo "</div></td></tr></table>";
                                                echo"</FORM>";
                                                echo"</CENTER>";
                                                ?>

                                                <!-- end การแก้ไขข้อมูล -->
                                                <?php include("./include/footer.inc"); ?>
                                                </body>
                                                </html>