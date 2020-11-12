<?php
session_start();
require_once('config.inc.php');
require_once('call_work.php');
$j = 0;
if ($act != "ok") {
    echo "ต้องเข้าสู่ระบบปกติ";
    exit();
}
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
                        <a href="./menu_amp" class="active">Back</a>
                    </li>
                    <li><font size="3" color="#FFCCCC">
                            <?php
                            echo "หน่วยงาน   : " . $sele_amp;
                            echo " : " . $full_name;
                            ?></font>
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
                                    <h2 class="rnut-postheader" style="text-align: center;">รายงานสรุป การเบิกจ่ายร้านค้าและผู้เกี่ยวข้อง</h2>

                                    <!-- // Start editor -->


                                    <br>
                                        <body width="100%">
                                            <div align="center">
                                                <TABLE width="80%" border="1" cellspacing="0" cellpadding="5" align="center">
                                                    <tr bgcolor="#E3E1B7">
                                                        <th scope="col" style="text-align:center"><font size="3" color="#6633ff">ลำดับ</font></th>
                                                        <th scope="col" style="text-align:center"><font size="3" color="#6633ff">ร้านค้า</font></th>
                                                        <th scope="col" style="text-align:center"><font size="3" color="#6633ff">ที่อยู่</font></th>
                                                        <th scope="col" style="text-align:center"><font size="3" color="#6633ff">จำนวน</font></th>
                                                        <!-- <td scope="col" style="text-align:center"><font size="3" color="#6633ff">หมายเหตุ</font></td> -->
                                                    </tr>
                                                    <?php
                                                    $sql = "SELECT DISTINCT item.amp_item, saler.id_saler, saler.name_saler, "
                                                            . "saler.address_saler, Sum(item.bath) AS sum_bath FROM item "
                                                            . "INNER JOIN saler ON item.id_sale = saler.id_saler "
                                                            . "WHERE amp_item='$sele_amp' GROUP BY saler.id_saler";
                                                    $i = 0;
                                                    $dbquery = mysql_db_query($dbname, $sql);
                                                    $num_rows = mysql_num_rows($dbquery);
                                                    while ($i < $num_rows) {
                                                        $i++;
                                                        $row_Rec_saler = mysql_fetch_array($dbquery);
                                                        echo "<tr>";
                                                        echo "<td style='text-align:center;vertical-align:middle'>" . $row_Rec_saler['id_saler'] . "</td>";
                                                        echo "<td style='text-align:left;vertical-align:middle'>" . $row_Rec_saler['name_saler'] . "</td>";
                                                        echo "<td style='text-align:left;vertical-align:middle'>" . $row_Rec_saler['address_saler'] . "</td>";
                                                        echo "<td style='text-align:right;vertical-align:middle'>" . number_format($row_Rec_saler['sum_bath'],2) . "</td>";
                                                        echo "</tr>";
                                                    }
                                                    ?>


                                                </table>
                                                </div>
                                                <br>

                                                    <!-- end การแก้ไขข้อมูล -->
                                                    <?php include("./include/footer.inc"); ?>
                                                    </body>
                                                    </html>
                                                    <?php
                                                    mysql_free_result($Recordset1);
                                                    ?>