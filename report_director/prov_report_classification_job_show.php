<?php
require_once('../config.inc.php');
require_once('../call_work.php');
require_once('../call_amp.php');
include("../code2name_amp.php");
$p_size = 5; //จำนวนแถวที่ใหแสดงต่อ 1 หน้า
error_reporting(0);
session_start();
$sel = $_REQUEST['sel'];  // ศสกร.อำเภอ
$find = $_REQUEST['find'];   // คำค้น
$ser = $_REQUEST['ser'];    // ค้นด้วยเงิน

mysql_select_db($dbname, $objConnect);
if ($ser == "2") {
    if (empty($sel)) {
        $query_item = "SELECT * FROM item  where bath = '$find' ORDER BY id_item DESC";
    } else {
        $query_item = "SELECT * FROM item where ((amp_item like '$sel') and (bath = '$find')) ORDER BY id_item DESC";
    }
} else {
    if (empty($sel)) {
        $query_item = "SELECT * FROM item  where item like '%$find%' ORDER BY id_item DESC";
    } else {
        $query_item = "SELECT * FROM item where ((amp_item like '$sel') and (item like '%$find%')) ORDER BY id_item DESC";
    }
}
$item = mysql_query($query_item, $objConnect) or die(mysql_error());
$row_item = mysql_fetch_assoc($item);
$totalRows_item = mysql_num_rows($item);
$total_p = (int) ($totalRows_item / $p_size);
if ($totalRows_item < 1) {
    ?>

    <script type="text/javascript">
        <!--
            alert('ไม่มีข้อมูล');
        //-->
    </script>
    <?php
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=./prov_report_classification_job.php\" />";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"[]>
<html>
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
        </div>
        <div class="cleared reset-box"></div>
        <div class="rnut-bar rnut-nav">
            <div class="rnut-nav-outer">
                <ul class="rnut-hmenu">
                    <li>
                        <a href="./prov_report_classification_job.php" class="active">Back</a>
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
                                    <h2 class="rnut-postheader" style="text-align: center;">รายงานการเบิกจ่ายงบประมาณ </h2>

                                    <!-- start การแก้ไขข้อมูล -->

                                    <BR>
                                        <table width="100%" align="center" border="0" cellspacing="1" cellpadding="4">
                                            <TR bgcolor="#FFFFCC">
                                                <TD><div align="center">
                                                        <?php
                                                        echo "<FONT SIZE='4' COLOR='#FF3300'>รหัส สกร. ";
                                                        if (empty($sel)) {
                                                            echo "ทุก สกร.</div></td>";
                                                        } else {
                                                            echo $sel . "&nbsp;:&nbsp;" . $xxx[$sel] . "</div></td>";
                                                        }
                                                        echo "</FONT>";
                                                        echo "<td> <div align='center'><FONT SIZE='4' COLOR='#FF3300'>  คำค้น =>   $find  </FONT> </div></td>  ";
                                                        ?>
                                                        </TR>
                                                        </TABLE>

                                                        <table width="100%" border="2" cellspacing="1" cellpadding="3">
                                                            <tr bgcolor="#FFFF99">
                                                                <th scope="col">รหัส สกร.</th>
                                                                <th scope="col">ชื่องาน/โครงการ</th>
                                                                <th scope="col">รายการจ่าย</th>
                                                                <th scope="col">ที่เอกสาร</th>
                                                                <th scope="col">ว ด ป. ที่บันทึก </th>
                                                                <th scope="col">จำนวนเงิน</th>
                                                            </tr>
<?php do { ?>
                                                                <tr>
                                                                    <td><?php
                                                                        $a = intval($row_item['amp_item']);
                                                                        echo $am[$a];
                                                                        ?></td>
                                                                    <td><?php
                                                                        $midc = substr($row_item['c_khong'], 2, 6);
                                                                        echo $work[$midc];
                                                                        ?></td> 
                                                                    <td><?php echo $row_item['item']; ?></td>
                                                                    <td><?php echo $row_item['doc']; ?></td>
                                                                    <td><?php echo $row_item['date_time']; ?></td>
                                                                    <td><div align="right"> <?php
                                                                            echo number_format($row_item['bath'], 2);
                                                                            $total = $total + $row_item['bath'];
                                                                            ?></div></td>
                                                                </tr>
                                                            <?php } while ($row_item = mysql_fetch_assoc($item)); ?>
                                                        </table>

                                                        <?php
                                                        if ($search == "") {
                                                            $search = "-";
                                                        }
                                                        echo "<BR>";
                                                        echo "<table width='100%' border='0' cellspacing='1' cellpadding='3'>";
                                                        echo "<TR>";
                                                        echo "	<TD bgcolor='#FFCC99' style='text-align:center;'>";
                                                        echo "<font size='3' color='#0000ff'>............รวมคำค้น : $search : ใช้ไปเป็นเงิน&nbsp;&nbsp;&nbsp;";
                                                        echo number_format($total, 2);
                                                        echo "   บาท</font></TD>";
                                                        echo "</TR>";
                                                        echo "</TABLE>";
                                                        
                                                        ?> 



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

                                                    </body>
                                                    </html>
