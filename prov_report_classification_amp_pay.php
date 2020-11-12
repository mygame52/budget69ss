<?php
session_start();
include("config.inc.php");
error_reporting(0);
mysql_select_db($dbname, $objConnect);
$query_amp = "SELECT * FROM amp ORDER BY id ASC";
$amp = mysql_query($query_amp, $objConnect) or die(mysql_error());
$row_amp = mysql_fetch_assoc($amp);
$totalRows_amp = mysql_num_rows($amp);
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
                                    <h2 class="rnut-postheader" style="text-align: center;">รายงานงบประมาณ : จำแนกตามสถานศึกษา-เฉพาะที่เบิกจ่ายแล้ว</h2>

                                    <!-- start การแก้ไขข้อมูล -->
                                    <div align="center">
                                        <form name="form1" id="form1" method="post" action="prov_report_classification_amp_show_pay.php">
                                            <table width="70%" border="0" cellspacing="0" cellpadding="7" align="center">
                                                <tr>
                                                    <th width="70%">
                                                        <div align="center">เลือกหน่วยงาน </div>
                                                        <select name="select" style="font: 11pt tahoma; color: #000000;background: #33ff66; border: 1px black solid" align="center" >
                                                            <option value="99">--ภาพรวมทั้งจังหวัด--</option>                                                           
                                                            <?php do { ?>
                                                                <option value="<?php echo $row_amp['id'] ?>">
                                                                    <?php echo $row_amp['Name'] ?></option>
                                                                <?php
                                                            } while ($row_amp = mysql_fetch_assoc($amp));
                                                            $rows = mysql_num_rows($amp);
                                                            if ($rows > 0) {
                                                                mysql_data_seek($amp, 0);
                                                                $row_amp = mysql_fetch_assoc($amp);
                                                            }
                                                            ?>
                                                        </select>
                                                        <input type="submit" name="Submit" value="Go">
                                                    </th>
                                                </tr>
                                            </table>
                                        </form>
                                    </div>
                                    <!-- end การแก้ไขข้อมูล -->
                                    <?php include("./include/footer.inc"); ?>
                                    </body>
                                    </html>