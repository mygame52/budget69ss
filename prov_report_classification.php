<?php
session_start();
require_once("config.inc.php");
mysql_select_db($dbname, $objConnect);
$query_Recordset1 = "SELECT * FROM `work` ORDER BY w_code ASC";
$Recordset1 = mysql_query($query_Recordset1, $objConnect) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($dbname, $objConnect);
$query_Recordset2 = "SELECT * FROM samnak ORDER BY code_sam ASC";
$Recordset2 = mysql_query($query_Recordset2, $objConnect) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);
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
                        <a href="menu_pro.php" class="active">Back</a>
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
                                    <h2 class="rnut-postheader" style="text-align: center;">รายงานงบประมาณ:จำแนกตามการจัดสรร</h2>

                                    <!-- start การแก้ไขข้อมูล -->
                                    <br>
                                        <div align="center"><font size="3">โปรดเลือก หมวดงบประมาณ</font></div><br>
                                            <div align="center">
                                                <form name="form1" method="post" action="prov_report_classification2.php"> 
                                                    <select name="menu1"  style="font: 11pt tahoma; color: #000000;background: #00ffcc; border: 1px black solid" align="center" >
                                                        <?php
                                                        do {
                                                            ?>
                                                            <option value="<?php echo $row_Recordset2['code_sam'] ?>"><?php echo $row_Recordset2['name_sam'] ?></option>
                                                            <?php
                                                        } while ($row_Recordset2 = mysql_fetch_assoc($Recordset2));
                                                        $rows = mysql_num_rows($Recordset2);
                                                        if ($rows > 0) {
                                                            mysql_data_seek($Recordset2, 0);
                                                            $row_Recordset2 = mysql_fetch_assoc($Recordset2);
                                                        }
                                                        ?>
                                                    </select>
                                                    <input type="submit" name="Submit" value=" ตกลง " />
                                                </form>
                                                <br />
                                                <br />
                                            </div>
                                            </body>
                                            </html>
                                            <?php
                                            mysql_free_result($Recordset1);
                                            mysql_free_result($Recordset2);
                                            ?>



                                            <!-- end การแก้ไขข้อมูล -->
                                            <?php include("./include/footer.inc"); ?>
                                            </body>
                                            </html>