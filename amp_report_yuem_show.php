<?php
session_start();
@ini_set("display_errors", "0"); //ใส่บรรทัดแรก
include("config.inc.php");

$l = 0;

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
                        <a href="./menu_amp.php" class="active">Back</a>
                    </li>	

                </ul>   <div style="vertical-align:middle"><font size="3" color="#FFCCCC">
                        <?php
                        echo "หน่วยงาน   : " . $sele_amp;
                        echo " : " . $full_name;
                        ?></font>
                </div>
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
                                    <h2 class="rnut-postheader" style="text-align: center;">สมุดคุมบัญชีเงินยืม : &nbsp;<?php echo "<FONT SIZE='5' COLOR='#3333CC'>$full_name</FONT>"; ?></h2>

                                    <!-- // Start editor -->

                                    <br>
                                        <body width="100%">
                                            <TABLE width="100%" border="1" cellspacing="0" cellpadding="5" align="center">
                                                <tr bgcolor="#E3E1B7">
                                                    <td rowspan="2" style="text-align:center;vertical-align:middle" scope="col"><font size="3" color="#6633ff">id-ยืม</font></td>
                                                    <td rowspan="2" style="text-align:center;vertical-align:middle" scope="col"><font size="3" color="#6633ff">เลขที่ บย.</font></td>
                                                    <td rowspan="2" style="text-align:center;vertical-align:middle" scope="col"><font size="3" color="#6633ff">งบ</font></td>
                                                    <td rowspan="2" style="text-align:center;vertical-align:middle" scope="col"><font size="3" color="#6633ff">รายการ</font></td>
                                                    <td rowspan="2" style="text-align:center;vertical-align:middle" scope="col"><font size="3" color="#6633ff">ผู้ยืม</font></td>                                                     
                                                    <td colspan="2" style="text-align:center;vertical-align:middle" scope="col"><font color="#6633ff" size="3">เงินยืม</font></td>
                                                    <td rowspan="2" style="text-align:center;vertical-align:middle" scope="col"><font size="3" color="#6633ff">id-ล้าง</font></td>                                                                                                         
                                                    <td colspan="2" style="text-align:center;vertical-align:middle" scope="col"><font color="#6633ff" size="3">เงินล้าง</font></td>
                                                    <td rowspan="2" style="text-align:center;vertical-align:middle" scope="col"><font color="#6633ff" size="3">คงเหลือ</font></td>
                                                </tr>
                                                <tr bgcolor="#E3E1B7">
                                                    <td style="text-align:center" scope="col">ยืม</td>
                                                    <td style="text-align:center" scope="col">เมื่อ</td>
                                                    <td style="text-align:center" scope="col">ล้าง</td>
                                                    <td style="text-align:center" scope="col">เมื่อ</td>
                                                </tr>   

                                                <?php
                                                $a = 0;
                                                $ch = 0;
                                                $bath_total = 0;

                                                $psql = "SELECT person_yuem.person, item.id_item, item.amp_item, item.c_khong,"
                                                        . " item.item, item.num_yuem, item.id_yuem, item.bath, item.note_item, item.doc"
                                                        . " FROM person_yuem INNER JOIN item ON "
                                                        . "item.id_yuem = person_yuem.id_yuem where amp_item = '$sele_amp'";   // แสดงทั้งหมด

                                                $dbquery = mysql_db_query($dbname, $psql);
                                                $num_rows = mysql_num_rows($dbquery);
                                                while ($result = mysql_fetch_array($dbquery)) {
                                                    $a++;

                                                    $check_item = $result[4];
                                                    if (substr($check_item, 0, 24) == "เงินยืม :-") {
                                                        $line2 = $ch % 2;
                                                        $ch++;
                                                        ?>

                                                        <tr <?php
                                                        if ($line2 != 1) {
                                                            echo "bgcolor='#FFFFCC'";
                                                        }
                                                        ?> class='off unamed1' onmouseover=this.className = 'ongreen' onmouseout=this.className = 'off' style='cursor:hand'>
                                                            <td style="text-align:center;vertical-align:middle">
                                                                <font color = '#6600FF'><strong><?php echo $result['id_item']; ?></strong></font>
                                                            </td>
                                                            <td style="text-align:left;vertical-align:middle"><?php echo $result['num_yuem']; ?></td>
                                                            <td style="text-align:left;vertical-align:middle"><?php echo $work[substr($result['c_khong'], 2, 6)]; ?></td>
                                                            <td style="text-align:left;vertical-align:middle"><?php echo $result['item']; ?></td>
                                                            <td style="text-align:left;vertical-align:middle"><?php echo $result['person']; ?></td>
                                                            <!-- จำนวนเงินยืม -->
                                                            <td style="text-align:right;vertical-align:middle">
                                                                <div align="right"> <!-- จำนวนเงินยืม -->
                                                                    <?php
                                                                    $num_yuem = $result['bath'];
                                                                    echo "<font color='#990000'><strong>" . number_format($num_yuem, 2) . "</strong></font>";
                                                                    ?>
                                                                </div>
                                                            </td>
                                                            <!-- วันที่เงินยืม -->
                                                            <td style="text-align:center;vertical-align:middle"><div align="right"><!-- วันที่ ที่ได้รับ -->
                                                                    <?php
                                                                    if ($result['note_item'] == "") {
                                                                        echo "<font color='#ff0000'><center>ยังไม่โอน</center></font>";
                                                                    } else {
                                                                        $dd1 = substr($result['note_item'], 3, 2);
                                                                        $mm1 = substr($result['note_item'], 0, 2);
                                                                        $yy1 = substr($result['note_item'], 6, 4);
                                                                        $note_item_ = $dd1 . "/" . $mm1 . "/" . $yy1 . "";
                                                                        echo "<font color='#000099'><center>" . $note_item_ . "</center></font>";
                                                                    }
                                                                    ?>	
                                                                </div>
                                                            </td>

                                                            <!-- จำนวนเงินล้าง -->

                                                            <?php
                                                            $id_search = $result['id_item'];
                                                            $doc_search = $result['doc'];
                                                            $i = 0;
                                                            $sqlr = "SELECT id_item, amp_item, item, bath, doc, date_pay"
                                                                    . " FROM item where amp_item = '$sele_amp' and (item LIKE '%$doc_search%') and (item LIKE '%$id_search%') ";
                                                            $dbqueryr = mysql_db_query($dbname, $sqlr);
                                                            $num_rowsr = mysql_num_rows($dbqueryr);
                                                            while ($i < $num_rowsr) {
                                                                $i++;
                                                                $result_l = mysql_fetch_array($dbqueryr);
                                                                $id_item_lang = $result_l['id_item'];
                                                                $num_lang = $result_l['bath'];
                                                                $date_pay_ = $result_l['date_pay'];
                                                                echo "<td style='text-align:right;vertical-align:middle'>";
                                                                echo "<div align = 'right'>"; //  จำนวนเงินล้าง 
                                                                echo "<font color = '#6600FF'><strong>" . $id_item_lang . "</strong></font>";
                                                                echo "</div>";
                                                                echo "</td>";

                                                                echo "<td style='text-align:right;vertical-align:middle'>";
                                                                echo "<div align = 'right'>"; //  จำนวนเงินล้าง 
                                                                echo "<font color = '#990000'><strong>" . number_format($num_lang, 2) . "</strong></font>";
                                                                echo "</div>";
                                                                echo "</td>";
                                                            }
                                                            if ($num_rowsr == 0) {
                                                                echo "<td style='text-align:right;vertical-align:middle'>";
                                                                echo "<div align = 'right'>"; //  จำนวนเงินล้าง 
                                                                echo "<font color = '#990000'><strong>-</strong></font>";
                                                                echo "</div>";
                                                                echo "</td>";                                                                
                                                                echo "<td style='text-align:right;vertical-align:middle'>";
                                                                echo "<div align = 'right'>"; //  จำนวนเงินล้าง 
                                                                echo "<font color = '#990000'><strong>-</strong></font>";
                                                                echo "</div>";
                                                                echo "</td>";
                                                                $date_pay_ = "";
                                                                //echo "ไม่ล้าง-".$num_lang;
                                                            }
                                                            ?>

                                                            <!-- วันที่ล้างเงินยืม -->
                                                            <td style="text-align:center;vertical-align:middle">
                                                                <div align="right"><!-- วันที่ ที่ได้รับ -->
                                                                    <?php
                                                                    //echo "num row- lang=".$num_rowsr;                                                                            

                                                                    if ($num_rowsr == 0) {
                                                                        echo "<font color='#ff0000'><center>-</center></font>";
                                                                    } else {
                                                                        $dd1 = substr($date_pay_, 3, 2);
                                                                        $mm1 = substr($date_pay_, 0, 2);
                                                                        $yy1 = substr($date_pay_, 6, 4);
                                                                        $date_pay_ = $dd1 . "/" . $mm1 . "/" . $yy1 . "";
                                                                        echo "<font color='#000099'><center>" . $date_pay_ . "</center></font>";
                                                                    }
                                                                    ?>	 
                                                                </div>
                                                            </td>
                                                            <!-- คงเหลือ ส่วนต่างเงินยืม-ล้างเงินยืม -->
                                                            <td style="text-align:right;vertical-align:middle">
                                                                <div align="right"> 
                                                                    <?php
                                                                     if ($num_rowsr == 0) {
                                                                        echo "<font color='#ff0000'><center>-</center></font>";
                                                                    } else {
                                                                        $diff_yuem = $num_yuem - $num_lang;
                                                                        echo "<font color='#990000'><strong>" . number_format($diff_yuem, 2) . "</strong></font>";
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        <?php
                                                    } // end if check ชื่อ การล้างเงินยืม
                                                } // end while
                                                ?>

                                            </table>
                                            <br>
                                                <div align="left"><font size="3" color="#444433">** หมายเหตุ :</font><font size="3" color="#6633ff"> เงินคงเหลือ ระบบได้นำรวมกับยอดงบประมาณคงเหลือเรียบร้อยแล้ว</font></div>
                                                <!-- end การแก้ไขข้อมูล -->
                                                <?php include("./include/footer.inc"); ?>
                                        </body>
                                        </html>
                                        <?php
                                        mysql_free_result($Recordset1);
                                        ?>