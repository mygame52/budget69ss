<?php
session_start();
require_once("config.inc.php");
require_once('call_work.php');
$j = 0;
$p_size = 5; //จำนวนแถวที่ใหแสดงต่อ 1 หน้า
error_reporting(0);
mysql_select_db($dbname, $objConnect);
$typeInput_from = $_REQUEST['sel_pub2'];
$yearInput = $_REQUEST['sel_month2'];

list($typeInput, $FullnamePub) = explode("-", $typeInput_from);

if ($typeInput == "alltype") {
    $typeInput = " ทั้งหมด ";
}
if ($yearInput == "allmonth") {
    $yearInput = " ทั้งปี ";
}

$thai_month = array("มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");

$mm = $typeInput;
$yy = $yearInput + 543;
$yy2 = substr($yearInput, 2, 2);

$tmm = $thai_month[date($mm) - 1];
$date_show = $tmm . " " . $yy;
$date_select = $mm . "/" . $yy2;
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
                                                <h3 class="rnut-postheader" style="text-align: center;">รายงานค่าสาธารณูปโภค <br>
                                                        &nbsp;<?php echo "<FONT SIZE='3' COLOR='#3333CC'><B>$FullnamePub :&nbsp;$yearInput&nbsp;:&nbsp; $mess_header2</B></FONT>"; ?></h2>

                                                        <!-- start การแก้ไขข้อมูล -->
                                                        <br>
                                                            <div align="center">

                                                                <?php if ($typeInput == " ทั้งหมด ") { //start header table?>

                                                                    <table width="100%" border="1" cellpadding="3" cellspacing="0"align="center"   bordercolordark="#FFFFFF"  bordercolorlight="#8297b1" >
                                                                        <tr bgcolor="#E1DFB3">
                                                                            <th scope="col">No.</th> 
                                                                            <th scope="col">หน่วยงาน</th> 

                                                                            <?php
                                                                            // ประกาศ หัวตาราง
                                                                            $i = 0;
                                                                            $sql = "select name_pub from public_utility order by idu";
                                                                            $dbquery = mysql_db_query($dbname, $sql);
                                                                            $num_rows = mysql_num_rows($dbquery);
                                                                            while ($i < $num_rows) {
                                                                                $i++;
                                                                                $result = mysql_fetch_array($dbquery);
                                                                                $name_pub_ = $result[name_pub];
                                                                                echo "<th scope='col'>$name_pub_</th>";
                                                                            }
                                                                            echo "<th scope='col'>รวม (บาท)</th> ";
                                                                        } else {
                                                                            ?>
                                                                            <table width="70%" border="1" cellpadding="3" cellspacing="0"align="center"   bordercolordark="#FFFFFF"  bordercolorlight="#8297b1" >
                                                                                <tr bgcolor="#E1DFB3">
                                                                                    <th scope="col">No.</th> 
                                                                                    <th scope="col">หน่วยงาน</th>                                                                             
                                                                                    <th scope="col">รวม (บาท)</th> 
                                                                                </tr>
                                                                            <?php } // end header table?>


                                                                            <?php
                                                                            if ((($typeInput == " ทั้งหมด ") and ( $yearInput == " ทั้งปี ")) or ( ($typeInput == " ทั้งหมด ") and ( $yearInput !== " ทั้งปี "))) {
                                                                                //$psql = "SELECT * FROM item where amp_item = $sele_amp  and item like '%สาธา%' ORDER BY id_item ";
                                                                                //$psql = "SELECT DISTINCT amp.`Name`, item.item, Sum(item.bath) FROM item INNER JOIN amp ON item.amp_item = amp.id  WHERE  item.item LIKE '%สาธา%' GROUP BY amp.id";
                                                                                // สถานศึกษา
                                                                                $i = 0;
                                                                                $total_sata = 0;
                                                                                $sqlAmp = "select id, Name from amp order by id";
                                                                                $dbqueryAmp = mysql_db_query($dbname, $sqlAmp);
                                                                                $num_rowsAmp = mysql_num_rows($dbqueryAmp);
                                                                                while ($i < $num_rowsAmp) {
                                                                                    $i++;
                                                                                    $result_Amp = mysql_fetch_array($dbqueryAmp);
                                                                                    $id_amp = $result_Amp[id];
                                                                                    $Name_amp = $result_Amp[Name];
                                                                                    echo "<tr>  ";
                                                                                    echo "<td scope='col' style='text-align:center;'>$i</td>";
                                                                                    echo "<td scope='col'  style='text-align:l;'>$Name_amp</td>";


                                                                                    // รายการค่า สาณู
                                                                                    $ii = 0;
                                                                                    $total_sata_amp = 0;
                                                                                    $total_sata_each = 0;
                                                                                    $sqlSata = "select name_pub,name_shot from public_utility order by idu";
                                                                                    $dbquerySata = mysql_db_query($dbname, $sqlSata);
                                                                                    $num_rowsSata = mysql_num_rows($dbquerySata);
                                                                                    while ($ii < $num_rowsSata) {
                                                                                        $resultSata = mysql_fetch_array($dbquerySata);
                                                                                        $name_pub_ = $resultSata[name_pub];
                                                                                        $name_shot_ = $resultSata[name_shot];

                                                                                        //echo "<td style='text-align:right;'>" . number_format($result['Sum(bath)'], 2) . "</td>";    
                                                                                        // รายการ ค่าจาก item
                                                                                        if (( $yearInput == " ทั้งปี ")) {
                                                                                            $psql = "SELECT Sum(bath) FROM item  WHERE (amp_item = '$id_amp') and (item LIKE '%สาธา%') and (item LIKE '%$name_shot_%')";
                                                                                        } else {
                                                                                            $psql = "SELECT Sum(bath) FROM item  WHERE (amp_item = '$id_amp') and (item LIKE '%สาธา%') and (item LIKE '%$name_shot_%')and (item LIKE '%$yearInput%')";
                                                                                        }
                                                                                        //$psql = "SELECT Sum(bath) FROM item  WHERE (amp_item = '$id_amp') and (item LIKE '%$name_shot_%')";
                                                                                        $dbqueryItem = mysql_db_query($dbname, $psql);
                                                                                        $num_rowsItem = mysql_num_rows($dbqueryItem);
                                                                                        $j = 0;
                                                                                        $bt = 0;

                                                                                        while ($j < $num_rowsItem) {
                                                                                            $resultItem = mysql_fetch_array($dbqueryItem);
                                                                                            echo "<td style='text-align:right;'>" . number_format($resultItem['Sum(bath)'], 2) . "</td>"; // แสดงผลในตาราง      
                                                                                            $total_sata_amp = $total_sata_amp + $resultItem['Sum(bath)']; // รวมทุกอย่างเป็นรายอำเภอ
                                                                                            $j++;
                                                                                        }  // end รายการค่า จาก item
                                                                                        $ii++;
                                                                                        $totalbt[$ii] = $totalbt[$ii] + $bt[$ii];
                                                                                    } // end รายการค่าสาณู

                                                                                    echo "<td style='text-align:right;' bgcolor='#EEFFEE'>" . number_format($total_sata_amp, 2) . "</td>";
                                                                                    echo "</tr>";
                                                                                    $total_sata = $total_sata + $total_sata_amp;
                                                                                }   // end สถานศึกษา
                                                                                $col_span = $num_rowsSata + 2; //คำนวณ ช่อง colspan สำหรับจำนวนรายการค่าสาณู
                                                                                echo "<tr bgcolor='#FFBBEE'><td colspan=$col_span style='text-align:right;'>";
                                                                                echo "รวม : ";
                                                                                echo "</td>";
                                                                                echo "<td style='text-align:right;'>";
                                                                                echo "<font size='3' color='ff0000'>" . number_format($total_sata) . "</font>";
                                                                                echo "</td></tr>";
                                                                            }

                                                                            //-------------------------------------
//
                                                                            //
                                                                            if (($typeInput !== " ทั้งหมด ") and ( $yearInput == " ทั้งปี ")) {
                                                                                $psql = "SELECT DISTINCT amp.`Name`, item.item, Sum(item.bath) FROM item INNER JOIN amp ON item.amp_item = amp.id  WHERE  item.item LIKE '%$typeInput%' GROUP BY amp.id";
                                                                            }
                                                                            //
                                                                            if ((($typeInput !== " ทั้งหมด ") and ( $yearInput !== " ทั้งปี "))) {
                                                                                $psql = "SELECT DISTINCT amp.`Name`, item.item, Sum(item.bath) FROM item INNER JOIN amp ON item.amp_item = amp.id  WHERE  item.item LIKE '%$typeInput%' and item.item LIKE '%$yearInput%' GROUP BY amp.id";
                                                                            }
                                                                            // start การค้นหาและสร้างตารางข้อมูล
                                                                            if (($typeInput !== " ทั้งหมด ")) {
                                                                                $dbquery = mysql_db_query($dbname, $psql);
                                                                                $num_rows = mysql_num_rows($dbquery);
                                                                                $j = 0;
                                                                                while ($result = mysql_fetch_array($dbquery)) {
                                                                                    $date_time_ = $result['date_time'];
                                                                                    $j++;
                                                                                    echo "<tr>  ";
                                                                                    echo "<td style='text-align:center;'>$j</td>";
                                                                                    echo "<td style='text-align:left;'>" . $result[0] . "</td>";
                                                                                    echo "<td style='text-align:right;'>" . number_format($result['Sum(item.bath)'], 2) . "</td>";
                                                                                    echo "</tr>";
                                                                                    $total_sata = $total_sata + $result['Sum(item.bath)'];
                                                                                }
                                                                            } else {
                                                                                $dbquery = mysql_db_query($dbname, $psql);
                                                                                $num_rows = mysql_num_rows($dbquery);
                                                                                $j = 0;
                                                                                if ($num_rows == 0) {
                                                                                    while ($result = mysql_fetch_array($dbquery)) {
                                                                                        $date_time_ = $result['date_time'];
                                                                                        $j++;
                                                                                        echo "<tr>  ";
                                                                                        echo "<td style='text-align:center;'>$j</td>";
                                                                                        echo "<td style='text-align:left;'>$result[0]--</td>";
                                                                                        echo "<td style='text-align:right;'>" . number_format($result['Sum(item.bath)'], 2) . "</td>";
                                                                                        echo "</tr>";
                                                                                        $total_sata = $total_sata + $result['Sum(item.bath)'];
                                                                                    }
                                                                                }
                                                                            }

//                                                                            // end การสร้างตารางรายงาน
//                                                                           
                                                                            ?>		

                                                                        </table>
                                                                        <br>
                                                                            <button type="button" style='font: 12pt tahoma; color: #ffffff;background: #ff0033; border: 1px black solid' align='center' onClick='javascript:window.close();'/>&nbsp;close&nbsp;</button>
                                                                            </div>

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