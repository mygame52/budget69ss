<?php
session_start();
require_once("config.inc.php");
$sel = $_REQUEST['select'];
include("help_re1.php");

require_once('call_work.php');
$j = 0;
if ($act != "ok") {
    echo "ต้องเข้าสู่ระบบปกติ";
    exit();
}
mysql_select_db($dbname, $objConnect);
$query_Recordset1 = "SELECT * FROM item where amp_item = '$sel' ORDER BY id_item desc";

$Recordset1 = mysql_query($query_Recordset1, $objConnect) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

error_reporting(0);
mysql_select_db($dbname, $objConnect);
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
                        <a href="./prov_report_num_yuem.php" class="active">Back</a>
                    </li>
                    <li><font size="4" color="ffffff">Login โดย :&nbsp;<?php echo $user_ ?></font>
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
                                    <h2 class="rnut-postheader" style="text-align: center;">รายการเงินยืม ทั้งหมด : &nbsp;<?php echo "<FONT SIZE='3' COLOR='#3333CC'><B>$sel     :&nbsp;$nam</B></FONT>";?></h2>
                                    <!-- <div class="rnut-postcontent">
                                                                    <p style="text-align: center;">test1</p>
                                                                    <p style="text-align: center;">test2</p>
                                            </div> -->

                                    <!-- // Start editor -->


                                    <br>
                                        <body width="100%">
                                            <TABLE width="100%" border="1" cellspacing="0" cellpadding="5" align="center">
                                                <tr bgcolor="#E3E1B7">
                                                    <td scope="col" style="text-align:center"><font size="3" color="#6633ff">เลข ID</font></td>
                                                    <td scope="col" style="text-align:center"><font size="3" color="#6633ff">เลขที่ บย.</font></td>
                                                    <td scope="col" style="text-align:center"><font size="3" color="#6633ff">งบ</font></td>
                                                    <td scope="col" style="text-align:center"><font size="3" color="#6633ff">รายการเงินยืม</font></td>
                                                    <td scope="col" style="text-align:center"><font size="3" color="#6633ff">ผู้ยืม</font></td>
                                                    <td scope="col" style="text-align:center"><font size="3" color="#6633ff">จำนวนเงิน</font></td>                                                    
                                                    <td scope="col" style="text-align:center"><font size="3" color="#6633ff">ได้รับเมื่อ</font></td>
                                                    <!-- <td scope="col" style="text-align:center"><font size="3" color="#6633ff">หมายเหตุ</font></td> -->
                                                </tr>
                                                <?php
                                                if ($totalRows_Recordset1 == 0) {
                                                    echo "<tr><td colspan='7'>";
                                                    echo "<br><center> <font size='3' color='cc0033'>ไม่มีรายการค้างเงินยืม</font></center><br>";
                                                    echo "</td></tr>";
                                                } else {
                                                    ?>
                                                    <?php
                                                    do {
                                                        $j++;
                                                        $i = ($j % 2);


                                                        $check_item = $row_Recordset1['item'];

                                                        if (substr($check_item, 0, 24) == "เงินยืม :-") {
                                                            $ch = 1;
                                                            ?>

                                                            <tr>
                                                                <td style="text-align:center;vertical-align:middle"><?php echo $row_Recordset1['id_item']; ?></td>
                                                                <td style="text-align:left;vertical-align:middle"><?php echo $row_Recordset1['num_yuem']; ?></td>

                                                                <td style="text-align:left;vertical-align:middle"><?php echo $work[substr($row_Recordset1['c_khong'], 2, 6)]; ?></td>
                                                                <td style="text-align:left;vertical-align:middle"><?php echo $row_Recordset1['item']; ?></td>
                                                                <td style="text-align:left;vertical-align:middle">

                                                                    <!-- ดึงข้อมูล ผู้ยืมเงินจาก ฐานข้อมูล item_yuem  -->
                                                                    <?php
                                                                    $id_yuem_ = $row_Recordset1['id_yuem'];
                                                                    if ($id_yuem_ <> 0) {
                                                                        $psql = "SELECT * FROM person_yuem where id_yuem =$id_yuem_ ";
                                                                        $dbquery = mysql_db_query($dbname, $psql);
                                                                        $num_rows = mysql_num_rows($dbquery);
                                                                        while ($result = mysql_fetch_array($dbquery)) {
                                                                            $citizenid_ = $result[citizenid];
                                                                            $person_ = $result[person];
                                                                            echo $person_;
                                                                        }
                                                                    } else {
                                                                        echo "-";
                                                                    }
                                                                    ?>
                                                                </td>


                                                                <td style="text-align:right;vertical-align:middle"><div align="right"> <!-- จำนวนเงินยืม -->
                                                                        <?php
                                                                        echo "<font color='#990000'><strong>" . number_format($row_Recordset1['bath'], 2) . "</strong></font>";
                                                                        $bath_total = $bath_total + $row_Recordset1['bath'];
                                                                        ?>
                                                                    </div>
                                                                </td>

                                                                <td style="text-align:center;vertical-align:middle"><div align="right"><!-- วันที่ ที่ได้รับ -->
                                                                        <?php
                                                                        if ($row_Recordset1['note_item'] == "") {
                                                                            echo "<font color='#ff0000'><center>ยังไม่โอน</center></font>";
                                                                        } else {
                                                                            $dd1 = substr($row_Recordset1['note_item'], 3, 2);
                                                                            $mm1 = substr($row_Recordset1['note_item'], 0, 2);
                                                                            $yy1 = substr($row_Recordset1['note_item'], 6, 4);
                                                                            $note_item_ = $dd1 . "/" . $mm1 . "/" . $yy1 . "";
                                                                            echo "<font color='#000099'><center>" . $note_item_ . "</center></font>";
                                                                        }
                                                                        ?>	 </div>
                                                                </td>
                                                            </tr>


                                                            <?php
                                                        } // end if check ชื่อ การล้างเงินยืม
                                                    } // end do   
                                                    while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));

                                                    if ($ch == 0) {
                                                        echo "<tr><td colspan='6'>";
                                                        echo "<br><center> <font size='3' color='cc0033'>ยังไม่มีรายการเงินยืม</font></center><br>";
                                                        echo "</td></tr>";
                                                    }
                                                    ?>
                                                <?php } ?>
                                            </table>
                                            <br>

                                                <!-- end การแก้ไขข้อมูล -->
                                                <?php include("./include/footer.inc"); ?>
                                        </body>
                                        </html>
                                        <?php
                                        mysql_free_result($Recordset1);
                                        ?>