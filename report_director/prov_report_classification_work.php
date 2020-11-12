<?php
include("../config.inc.php");
error_reporting(0);
mysql_select_db($dbname, $objConnect);
$query_Recordset1 = "SELECT * FROM `work` ORDER BY w_code ASC";
$Recordset1 = mysql_query($query_Recordset1, $objConnect) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"[]>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title><?php echo $mess_title ?></title>

        <link rel="stylesheet" href="../style.css" type="text/css" media="screen" />
        <!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
        <!--[if IE 7]><link rel="stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->

        <script type="text/javascript" src="../jquery.js"></script>
        <script type="text/javascript" src="../script.js"></script>

    </head>
    <body>
        <?php include '../include/header.inc.php'; ?>
        <div class="cleared reset-box"></div>
        <div class="rnut-bar rnut-nav">
            <div class="rnut-nav-outer">
                <ul class="rnut-hmenu">
                    <li>
                        <a href="../menu_director.php" class="active">Back</a>
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
                                    <h2 class="rnut-postheader" style="text-align: center;">รายงานงบประมาณ : จำแนกตาม งาน/โครงการ</h2>
                                    <!-- <div class="rnut-postcontent">
                                                                    <p style="text-align: center;">test1</p>
                                                                    <p style="text-align: center;">test2</p>
                                            </div> -->
                                    <!-- start การแก้ไขข้อมูล -->
                                    <div align="center">
                                        <form name="form1" id="form1" method="post" action="./prov_report_classification_work_show.php">
                                            <table width="70%" border="0" cellspacing="0" cellpadding="7" align="center">
                                                <tr>
                                                    <td style="text-align:center;"><br><font size="3" color="#330099">เลือก งาน/โครงการ</font>&nbsp;&nbsp;
                                                            <select name="sel_work">
                                                                <?php
                                                                do {
                                                                    ?>
                                                                    <option value="<?php echo $row_Recordset1['w_code'] ?>"><?php echo $row_Recordset1['w_name'] ?></option>
                                                                    <?php
                                                                } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
                                                                $rows = mysql_num_rows($Recordset1);
                                                                if ($rows > 0) {
                                                                    mysql_data_seek($Recordset1, 0);
                                                                    $row_Recordset1 = mysql_fetch_assoc($Recordset1);
                                                                }
                                                                ?>
                                                            </select>
                                                            &nbsp;&nbsp;<input type="submit" name="Submit" value=" ตกลง " />
                                                            <br><br></td></tr>
                                                                    </table>
                                                                    </form>

                                                                    </div>
                                                                    <!-- end การแก้ไขข้อมูล -->
                                                                    <div class="cleared"></div>
                                                                    </div>

                                                                    <div class="cleared"></div>
                                                                    </div>
                                                                    </div>

                                                                    <div class="cleared"></div>
                                                                    </div>
                                                                    </div>
                                                                    </div>
                                                                    </div>
                                                                    <div class="cleared"></div>
                                                                    <div class="rnut-footer">
                                                                        <div class="rnut-footer-body">
                                                                            <a href="#" class="rnut-rss-tag-icon" title="RSS"></a>
                                                                            <div class="rnut-footer-text">
                                                                                <p><?php echo $mess_header2 ?></p>

                                                                                <p>Rnut@Surat</p>

                                                                                <p>Copyright © 2014. All Rights Reserved.</p>
                                                                            </div>
                                                                            <div class="cleared"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cleared"></div>
                                                                    </div>
                                                                    </div>

                                                                    </div>

                                                                    </body>
                                                                    </html>