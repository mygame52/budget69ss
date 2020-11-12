<?php
session_start();
require_once("config.inc.php");
$j = 0;
$p_size = 5; //จำนวนแถวที่ใหแสดงต่อ 1 หน้า
error_reporting(0);
mysql_select_db($dbname, $objConnect);
//$query_item = "SELECT * FROM item where c_khong like '$codework' ORDER BY doc ASC";   ของเดิม
if (empty($search)) {
    // $query_item = "SELECT * FROM item where c_khong like '$codework' and staus ='4' ORDER BY id_item DESC";
    $query_item = "SELECT item.id_item, item.amp_item, item.c_khong, item.item, item.doc, item.date_time, "
            . "item.bath, item.staus, item.date_pay, item.`user`, item.note_item, item.chk_id, item.pay_by, "
            . "item.id_sale, item.id_yuem, item.doc_date, item.num_yuem, item.num_chq, saler.name_saler, "
            . "saler.address_saler FROM item INNER JOIN saler ON item.id_sale = saler.id_saler "
            . "where item.c_khong like '%$codework' and item.staus ='4' ORDER BY id_item DESC ";
} else {
    $query_item = "SELECT item.id_item, item.amp_item, item.c_khong, item.item, item.doc, "
            . "item.date_time, item.bath, item.staus, item.date_pay, item.`user`, "
            . "item.note_item, item.chk_id, item.pay_by, item.id_sale, item.id_yuem, "
            . "item.doc_date, item.num_yuem, item.num_chq, saler.name_saler, saler.address_saler "
            . "FROM item INNER JOIN saler ON item.id_sale = saler.id_saler "
            . "where item.c_khong like '%$codework%' and (item.item like '%$search%' or name_saler like '%$search%') "
            . "and item.staus ='4' ORDER BY item.id_item DESC";
}
$item = mysql_query($query_item, $objConnect) or die(mysql_error());
$row_item = mysql_fetch_assoc($item);
$totalRows_item = mysql_num_rows($item);
$total_p = (int) ($totalRows_item / $p_size);


$cod_work = trim(substr($codework, 2));
$query_search1 = "SELECT w_name FROM work where w_code = '$cod_work'";
$result1 = mysql_query($query_search1);
$fet1 = mysql_fetch_array($result1);
$aa = $fet1['w_name'];
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
                        <a href="amp_report_classification_work_pay.php" class="active">Back</a>
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
                                    <h2 class="rnut-postheader" style="text-align: center;">รายงานงบประมาณที่เบิกจ่ายแล้ว :&nbsp;<?echo "<FONT SIZE='3' COLOR='#3333CC'><B>$cod_work :&nbsp;$aa $full_name</B></FONT>";?></h2>
                                    <!-- <div class="rnut-postcontent">
                                                                    <p style="text-align: center;">test1</p>
                                                                    <p style="text-align: center;">test2</p>
                                            </div> -->
                                    <!-- start การแก้ไขข้อมูล -->
                                    <br>
                                        <table width="100%" border="1" cellpadding="3" cellspacing="0"align="center"   bordercolordark="#FFFFFF"  bordercolorlight="#8297b1" >
                                            <tr bgcolor="#E1DFB3">
                                                <th scope="col">ID</th> 
                                                <th scope="col">รายการจ่าย</th>
                                                <th scope="col">ที่เอกสาร</th>
                                                <th scope="col">จ่ายให้</th>
                                                <th scope="col">จำนวนเงิน</th>
                                                <th scope="col">จ่าย</th>
                                                <th scope="col">วันทำรายการ</th>
                                                <th scope="col">เงินเข้า</th>
                                            </tr>
                                            <?php
                                            do {
                                                $j++;
                                                $i = ($j % 2);
                                                ?>
                                                <tr <?php
                                                if ($i != 1) {
                                                    echo "bgcolor='#CCFFCC'";
                                                }
                                                ?> class='off unamed1' onmouseover=this.className = 'onping' onmouseout=this.className = 'off' style='cursor:hand' >  
                                         <!-- <td><?php echo $row_item['amp_item']; ?></td> -->
                                                    <td style="text-align:center;vertical-align:middle"><?php
                                                        echo $row_item['id_item'];
                                                        $i_del = $row_item['id_item'];
                                                        ?>	</td>
                                                    <td style="vertical-align:middle"><?php echo $row_item['item']; ?></td>
                                                    <td style="vertical-align:middle"><?php echo $row_item['doc']; ?></td>
                                                    <td style="vertical-align:middle"><?php echo $row_item['name_saler'];
                                                        ?></td>
                                                    <td style="vertical-align:middle"><div align="right"> 

                                                            <?php
                                                            echo number_format($row_item['bath'], 2);

                                                            if (trim(substr($row_item['item'], 0, 33)) != "ล้างเงินยืม") {
                                                                //echo "<br>";
                                                                //echo trim(substr($row_item['item'],0,33));
                                                                $total = $total + $row_item['bath'];
                                                            }
                                                            ?>

                                                        </div></td>
                                                    <td style="vertical-align:middle"><?php
                                                        $tas = $row_item['pay_by'];

                                                        if ($tas == 1) {
                                                            echo "<div align='center' width='100'><img src='./images/ling1.jpg' width='50%' border='0' alt='โอนเงิน'></div> ";
                                                        }
                                                        if ($tas == 2) {
                                                            echo "<div align='center' width='100'><img src='./images/line2.jpg' width='50%' border='0' alt='จ่ายเช็ค'></div><br<div align='center'>";
															echo $row_item['num_chq']."</div>";
                                                        }
                                                        ?>
                                                    </td>
                                                    <?php
                                                    if ($tas == 0) {
                                                        echo "<td style='vertical-align:middle'><div align='center'>-</div></td>";
                                                    } else
                                                        echo "<td style='vertical-align:middle'><div align='center'>" . $row_item['date_pay'] . " น.</div></td>";
                                                    ?>
                                                    <td style="vertical-align:middle">
                                                        <?php
                                                        if ($row_item['note_item'] <> "") {
                                                            $m_ = substr($row_item['note_item'], 0, 2);
                                                            $d_ = substr($row_item['note_item'], 3, 2);
                                                            $y_ = substr($row_item['note_item'], 6, 4);
//									  $t_=substr($row_item['note_item'],11,8);	
                                                            //echo $row_item['note_item']; 
                                                            echo $d_ . "/" . $m_ . "/" . $y_;
                                                        } else {
                                                            echo "<font color='ff0000'>เงินยังไม่เข้า</font>";
                                                        }
                                                        ?>
                                                    </td>

                                                </tr>
                                            <?php } while ($row_item = mysql_fetch_assoc($item)); ?>
                                            <tr>
                                                <td colspan="6" style="text-align:right"><font size="4" color="#ff0000">รวมเงินที่เบิกจ่ายแล้ว&nbsp;&nbsp;</font>
                                                </td>
                                                <td colspan="2" style="text-align:right">
                                                    <font size="3" color="#ff0000"><?php echo number_format($total, 2); ?>&nbsp;&nbsp;บาท</font>
                                                </td>
                                            </tr>


                                        </table>
                                        <?php
// include("sarup_pay.php");
                                        ?>

                                        <!-- end การแก้ไขข้อมูล -->
                                        <?php include("./include/footer.inc"); ?>
                                        </body>
                                        </html>
