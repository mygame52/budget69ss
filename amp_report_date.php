<?php
session_start();
require_once("config.inc.php");
require_once('call_work.php');
$j = 0;
$p_size = 5; //จำนวนแถวที่ใหแสดงต่อ 1 หน้า
error_reporting(0);
mysql_select_db($dbname, $objConnect);
$dateInput = $_REQUEST['dateInput'];

$thai_month = array("มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");

$dd = substr($dateInput, 3, 2);
$mm = substr($dateInput, 0, 2);
$yy = substr($dateInput, 6, 4) + 543;
$yy2 = substr($dateInput, 8, 2);

$tmm = $thai_month[date($mm) - 1];
$date_show = $dd . " " . $tmm . " " . $yy;
$date_select = $dd . "/" . $mm . "/" . $yy2;


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
        <div id="rnut-page-background-glare-wrapper">
            <div id="rnut-page-background-glare"></div>
        </div>
        <div id="rnut-main">
            <div class="cleared reset-box"></div>
            <div class="rnut-box rnut-sheet">
                <div class="rnut-box-body rnut-sheet-body">

                    <div class="cleared reset-box"></div>

                    <div class="cleared reset-box"></div>
                    <div class="rnut-layout-wrapper">
                        <div class="rnut-content-layout">
                            <div class="rnut-content-layout-row">
                                <div class="rnut-layout-cell rnut-content">
                                    <div class="rnut-box rnut-post">
                                        <div class="rnut-box-body rnut-post-body">
                                            <div class="rnut-post-inner rnut-article">
                                                <h2 class="rnut-postheader" style="text-align: center;">รายงานผลการปฏิบัติงาน (e-Budget) <br>
                                                        วันที่  :&nbsp;<?echo "<FONT SIZE='3' COLOR='#3333CC'><B>$date_show :&nbsp;$aa $full_name</B></FONT>";?></h2>
                                                <!-- <div class="rnut-postcontent">
                                                                                <p style="text-align: center;">test1</p>
                                                                                <p style="text-align: center;">test2</p>
                                                        </div> -->
                                                <!-- start การแก้ไขข้อมูล -->
                                                <!-- start การแก้ไขข้อมูล -->
                                                <br>
                                                    <table width="100%" border="1" cellpadding="3" cellspacing="0"align="center"   bordercolordark="#FFFFFF"  bordercolorlight="#8297b1" >
                                                        <tr bgcolor="#E1DFB3">
                                                            <th scope="col">ลำดับ</th> 
                                                            <th scope="col">ID</th> 
                                                            <th scope="col">งบ</th> 
                                                            <th scope="col">รายการ</th>
                                                            <th scope="col">ที่เอกสาร</th>
                                                            <th scope="col">จำนวนเงิน</th>
                                                            <th scope="col">เวลา</th>
                                                        </tr>
                                                        <?php
                                                        /*
                                                          $cod_work = trim(substr($codework,2));
                                                          $query_search1 = "SELECT w_name FROM work where w_code =	'$cod_work'";
                                                          $result1 = mysql_query($query_search1);
                                                          $fet1 = mysql_fetch_array($result1);
                                                          $aa = $fet1['w_name'] ;
                                                         */

                                                        $psql = "SELECT * FROM item where amp_item = $sele_amp ORDER BY id_item DESC";
                                                        $dbquery = mysql_db_query($dbname, $psql);
                                                        $num_rows = mysql_num_rows($dbquery);
                                                        $j = 0;
                                                        while ($result = mysql_fetch_array($dbquery)) {
                                                            /* 													$id_item_= $result[id_item];
                                                              $c_khong_ = $result[c_khong];
                                                              $item_= $result[item];
                                                              $doc_ = $result[doc];
                                                              $bath = $result[bath];
                                                             */
                                                            $date_time_ = $result[date_time];

                                                            //echo "----date_time_ ใน database---".(substr($date_time_,0,8))."<br>";
                                                            //echo "----date_time_ ที่เลือกรายงาน---".$date_select ."<br><br><br>";

                                                            if (substr($date_time_, 0, 8) == $date_select) {
                                                                $j++;
                                                                echo "<tr>  ";
                                                                echo "<td style='text-align:center;'>$j</td>";
                                                                echo "<td style='text-align:center;'>" . $result['id_item'] . "</td>";
                                                                echo "<td>" . $work[substr($result['c_khong'], 2, 6)] . "</td>";
                                                                echo "<td style='text-align:left;'>" . $result['item'] . "</td>";
                                                                echo "<td>" . $result['doc'] . "</td>";
                                                                echo "<td style='text-align:right;'>" . number_format($result['bath'], 2) . "</td>";
                                                                echo "<td style='text-align:center;'>" . substr($result['date_time'], 11, 5) . " น.</td>";
                                                                echo "</tr>";
                                                            }
                                                        }
                                                        if ($j == 0) {
                                                            echo "<tr><td colspan=7 style='text-align:center;'><font size='4' color='ff0000'><br>ขออภัยครับ ไม่มีการทำรายการในวันนี้</font><br><br>";
                                                            echo "</td></tr>";
                                                        }
                                                        echo "<tr><td colspan=7 style='text-align:center;'><br>";
                                                        echo "		<form>";
                                                        echo "		<p align='right'>";
                                                        echo "<input name='Submit' type='submit'  value='   Close   ' style='font: 12pt tahoma; color: #ffffff;background: #ff0033; border: 1px black solid' align='center' onClick='javascript:window.close();'/>";
                                                        echo "		</form>";
                                                        echo "</td></tr>";
                                                        ?>

                                                    </table>

                                                    <!-- end การแก้ไขข้อมูล -->

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
                    <hr>
                        
                            <table>
                                <tr>
                                    <td>รายงานโดย</td>	<td>...................................</td>
                                </tr>
                                <tr>
                                    <td></td>	<td>...................................</td>
                                </tr>
                                <tr>
                                    <td></td>	<td>เจ้าหน้าที่ e-Budget</td>
                                </tr>

                            </table>

                            <?php require_once('./include/foot_print.html'); ?>

                        
                   

                </div>
            </div>

        </div>

    </body>
</html>