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
                                    <br> <h2 class="rnut-postheader" style="text-align:center;">
                                            การลบข้อมูลการเบิกจ่ายงบประมาณ
                                        </h2> 
                                        <!-- start การแก้ไขข้อมูล -->

                                        <?php
                                        $ok_ = $_REQUEST['ok_'];
                                        if ($ok_ == '9') {
                                            $sql = ("TRUNCATE TABLE `item` ");
                                            $result = mysql_query($sql);
                                            $sql = ("TRUNCATE TABLE `chk_balance` ");
                                            $result = mysql_query($sql);
                                            $sql = ("TRUNCATE TABLE `del_item` ");
                                            $result = mysql_query($sql);
                                            $sql = ("TRUNCATE TABLE `history_detail` ");
                                            $result = mysql_query($sql);

                                            $sql = ("TRUNCATE TABLE `judsun` ");
                                            $result = mysql_query($sql);
                                            $sql = ("TRUNCATE TABLE `logfile` ");
                                            $result = mysql_query($sql);
                                          /*  $sql = ("TRUNCATE TABLE `samnak` ");
                                            $result = mysql_query($sql);


                                            $sql = ("TRUNCATE TABLE `samnakma` ");
                                            $result = mysql_query($sql);
                                            $sql = ("TRUNCATE TABLE `work` ");
                                            $result = mysql_query($sql);
*/

                                            $sql_up = ("update  person_yuem set chk_status='0'");

                                            $result = mysql_query($sql_up);


                                            echo "<div align='center'><font size='4' color='ff00ff'>ลบข้อมูล รายการ งบประมาณทั้งหมดแล้ว </font></div><BR>";
                                            echo "<meta http-equiv=\"refresh\" content=\"1;URL=./menu_pro.php\" />";
                                        } else {
                                            echo " ยกเลิก การลบข้อมูล";
                                        }
                                        ?>


                                        <!-- end การแก้ไขข้อมูล -->
                                        <?php include("./include/footer.inc"); ?>
                                        </body>
                                        </html>