<?php
session_start();
include('../config.inc.php');
// start หากไม่ได้เข้าใช้งานจากเมนู
if (trim($hid) <> "85") {
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=../menu_director.php\" />";
}
// end หากไม่ได้เข้าใช้งานจากเมน
session_unregister('sel');
session_unregister('M_rab');
session_unregister('M_rab2');
session_unregister('M_rua');
session_unregister('N_work');
mysql_select_db($dbname, $objConnect);
$query_Recordset1 = "SELECT * FROM amp ORDER BY id ASC";
$Recordset1 = mysql_query($query_Recordset1, $objConnect) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
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
                        <a href="../menu_director" class="active">Back</a>
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
                                    <h2 class="rnut-postheader" style="text-align: center;">รายงานงบประมาณ : การค้นหา</h2>

                                    <!-- start การแก้ไขข้อมูล -->
                                    <div align="center">
                                        <!---------------------------------  ค้นแบบที่ 1 ---------------------------->
                                        <form id="form1" name="form1" method="post" action="./prov_report_classification_job_show.php">
                                            <table width="70%" border="0" cellspacing="0" cellpadding="7" align="center">
                                                <tr>
                                                    <th><div align="right">แบบที่ 1 &nbsp;&nbsp;&nbsp;ค้นตามรายการจ่ายเงิน </div></th>
                                                    <th width="58%" scope="col"><div align="left">								
                                                            <select name='sel'>
                                                                <?php
                                                                echo "<option value=''> ทั้งหมดทุก ศบอ. </option>";
                                                                do {
                                                                    ?>
                                                                    <option value="<?php echo $row_Recordset1['id'] ?>">
                                                                        <?php echo $row_Recordset1['Name'] ?></option>
                                                                    <?php
                                                                } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
                                                                $rows = mysql_num_rows($Recordset1);
                                                                if ($rows > 0) {
                                                                    mysql_data_seek($Recordset1, 0);
                                                                    $row_Recordset1 = mysql_fetch_assoc($Recordset1);
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th width="42%" scope="col"><div align="right">ใส่คำค้น</th>
                                                    <th width="58%" scope="col"><div align="left"><INPUT TYPE="text" NAME="find" size="20"><FONT SIZE="2" COLOR="#FF0000">&nbsp;ว่าง=ทั้งหมด</FONT>&nbsp;
                                                                <input type="submit" name="Submit" value="Go" />
                                                                </th>
                                                                </tr>
                                                                </table>
                                                                </form>
                                                                <P><br><HR><br>
                                                                                <!---------------------------------  ค้นแบบที่ 2  ---------------------------->
                                                                                <form id="form1" name="form1" method="post" action="./prov_report_classification_job_show.php">
                                                                                    <table width="70%" border="0" cellspacing="0" cellpadding="7" align="center">
                                                                                        <tr><th><div align="right">แบบที่ 2 &nbsp;&nbsp;&nbsp; ค้นตามจำนวนเงินที่เบิกจ่าย</div></th>
                                                                                            <th width="58%" scope="col">
                                                                                                <div align="left">
                                                                                                    <INPUT TYPE="hidden"  name="ser" value="2">	
                                                                                                        <select name='sel'>
                                                                                                            <?php
                                                                                                            echo "<option value=''> ทั้งหมดทุก ศบอ. </option>";
                                                                                                            do {
                                                                                                                ?>
                                                                                                                <option value="<?php echo $row_Recordset1['id'] ?>"><?php echo $row_Recordset1['Name'] ?></option>
                                                                                                                <?php
                                                                                                            } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
                                                                                                            $rows = mysql_num_rows($Recordset1);
                                                                                                            if ($rows > 0) {
                                                                                                                mysql_data_seek($Recordset1, 0);
                                                                                                                $row_Recordset1 = mysql_fetch_assoc($Recordset1);
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                </div>
                                                                                            </th>
                                                                                            <tr>
                                                                                                <th width="42%" scope="col"><div align="right">ใส่จำนวนเงิน</th>
                                                                                                <th width="58%" scope="col"><div align="left"><INPUT TYPE="text" NAME="find" size="20" value="0"><FONT SIZE="2" COLOR="#FF0000">&nbsp;</FONT>&nbsp;
                                                                                                            <input type="submit" name="Submit" value="Go" />
                                                                                                            </th>
                                                                                                            </tr>
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