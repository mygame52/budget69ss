<?php
session_start();
include("calculate_per.php");
require_once("config.inc.php");

mysql_select_db($dbname, $objConnect);
$query_Recordset1 = "SELECT * FROM amp  ORDER BY per ASC";
$Recordset1 = mysql_query($query_Recordset1, $objConnect) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
$j = 0;
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
                                    <h2 class="rnut-postheader" style="text-align: center;">รายงานการเบิกจ่ายงบประมาณ: เรียงจาก น้อยไปมาก</h2>
                                    <!-- <div class="rnut-postcontent">
                                                                    <p style="text-align: center;">test1</p>
                                                                    <p style="text-align: center;">test2</p>
                                            </div> -->
                                    <!-- start การแก้ไขข้อมูล -->
                                    <div align="center">
                                        <table width="50%" align="center" border="0" cellspacing="0" cellpadding="4">
                                            <tr bgcolor="#FFCC99">
                                                <th scope="col">รหัส</th>
                                                <th scope="col">ชื่อสถานศึกษา</th>
                                                <th scope="col">ร้อยละของการเบิกจ่าย</th>
                                                <th scope="col">รายละเอียดทั้งหมด</th>
                                            </tr>
                                            <?php
                                            do {
                                                $j++;
                                                $i = ($j % 2);
                                                ?>
                                                <tr <?if($i !=1){echo "bgcolor='#FFFFCC'";}?> class='off unamed1' onmouseover=this.className='onping' onmouseout=this.className='off' style='cursor:hand' >    

                                                    <?php $w_del = $row_Recordset1['id']; ?>
                                                    <td style="text-align:center;"><?php echo $row_Recordset1['id']; ?></td>
                                                    <td><?php echo $row_Recordset1['Name']; ?></td>
                                                    <td ><div align="center"><?php echo $row_Recordset1['per']; ?></div></td>
                                                    <td><div align="center"><a href="prov_report_peramp_show.php?sel=<?echo"$w_del"; ?>&nam= <?echo $row_Recordset1['Name']; ?>">รายละเอียด</a></div></td>
                                                </tr>
                                            <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
                                        </table>
                                    </div>

                                    <!-- end การแก้ไขข้อมูล -->
                                    <?php include("./include/footer.inc"); ?>
                                    </body>
                                    </html>