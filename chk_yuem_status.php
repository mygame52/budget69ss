<?php session_start(); ?>
<?php include("config.inc.php");?>

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
                        <a href="./" class="active">Home</a>
                    </li>	
                </ul>
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
                                    <form id="form1" name="form1" method="post" action="./chk_yuem_status_show.php?rand=<?= $rand ?>"></th>       
                                        <table width="60%" border="1" cellspacing="0" cellpadding="3" align="center">
                                            <tr>  <? $rand = rand(); ?>
                                                <td width="60%" colspan="2">
                                                    <h2 class="rnut-postheader" style="text-align: center;">ตรวจสอบสิทธิการยืมเงิน</h2><br>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><div align="right"><br><font size="3" color="#0033cc">ป้อนเลขบัตรประชาชน</font>&nbsp;&nbsp;&nbsp; </div></td>
                                                <td>&nbsp;<INPUT TYPE="text" NAME="idc2" SIZE="20" style="font: 12pt tahoma; color: #ff0000;background: #C0F9BD; border: 1px black solid" ></INPUT>
                                                    <input type="submit" name="Submit" value="ตกลง"></td>
                                            </tr> 					 
                                            <!-- <?php mysql_free_result($Recordset1); ?> -->
                                        </table>
                                    </form>
									</div>
                                    <br>
                                        <!-- end การแก้ไขข้อมูล -->
<?php include("./include/footer.inc");?>
                                    </body>
                                    </html>
