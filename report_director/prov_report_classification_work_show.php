<?php
session_start();
include('../config.inc.php');
$sel_w = $_REQUEST['sel_work'];
include("../help_jud.php");
$cod = substr($sel_w, 1, 4) . '-' . substr($sel_w, 4, 2);
$query_ = "SELECT * FROM amp order by id asc";
$Recordamp1 = mysql_query($query_, $objConnect) or die(mysql_error());
$totalRows_amp = mysql_num_rows($Recordamp1);

for ($i = 0; $i <= $totalRows_amp; $i++) {
    $row_Recordamp = mysql_fetch_assoc($Recordamp1);
    $i_amp = $row_Recordamp['id'];
    $n_amp[$i_amp] = $row_Recordamp['Name'];
}

mysql_select_db($dbname, $objConnect);
$query_Recordset1 = "SELECT * FROM judsun where right(code,6) like '$sel_w' ORDER BY amp  ASC";
//	$query_Recordset1 = "SELECT * FROM judsun where right(code,6) like '$sel_w' ORDER BY ((rua*100)/	(rab+rab2+rab3+rab4)) ASC";

$sql_sum_rab = "select sum(rab) from judsun where right(code,6) like '$sel_w' ORDER BY ((rua*100)/ (rab+rab2+rab3+rab4)) ASC";
$resault_sum_rab = mysql_query($sql_sum_rab);
$Recordset1 = mysql_query($query_Recordset1, $objConnect) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
if ($totalRows_Recordset1 < 1) {
    echo "<CENTER>งานนี้ยังไม่ได้จัดสรรให้สถานศึกษาใด ๆ  ครับ ต้องไปจัดสรรก่อน</CENTER>";
    exit();
}
$total_rab = 0;
$t_pay = 0;
$total_rua = 0;
$j = 0;
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
                        <a href="./prov_report_classification_work.php" class="active">Back</a>
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
                                    <h2 class="rnut-postheader" style="text-align: center;">รายงานการเบิกจ่ายงบประมาณ :&nbsp;<?echo "<FONT SIZE='3' COLOR='#3333CC'><B>$cod     :&nbsp;$nam</B></FONT>";?></h2>
                                    <!-- <div class="rnut-postcontent">
                                                                    <p style="text-align: center;">test1</p>
                                                                    <p style="text-align: center;">test2</p>
                                            </div> -->
                                    <!-- start การแก้ไขข้อมูล -->
                                    <div align="center">
                                        <BR>
                                            <table width="80%" align="center" border="0" cellspacing="1" cellpadding="4">
                                                <tr bgcolor="#FFCC99">
                                                    <th scope="col">สถานศึกษา</th>
                                                    <!-- <th scope="col">ชื่องาน / โครงการ</th> -->
                                                    <th scope="col">จำนวนจัดสรร</th>
                                                    <th scope="col">จำนวนจ่าย</th>
                                                    <th scope="col">จ่าย %</th>
                                                    <th scope="col">จำนวนเหลือ</th>
                                                </tr>

                                                <?php
                                                do {
                                                    $j++;
                                                    $i = ($j % 2);
                                                    ?>

                                                    <tr <?php
                                                    if ($i != 1) {
                                                        echo "bgcolor='#eaeaea'";
                                                    }
                                                    ?> class='off unamed1' onmouseover=this.className = 'onping' onmouseout=this.className = 'off' style='cursor:hand' >	
                                                        <?php //php $w_del=$row_Recordset1['w_code'];  ?>
                                                        <td><?php
                                                            $cod = substr($row_Recordset1['code'], 0, 2);
                                                            echo $cod . " = " . $n_amp[$cod];
                                                            ?>
                                                        </td> 
                                                         <!-- <td><?php echo $row_Recordset1['work']; ?></td> -->
                                                        <td><!-- จัดสรร --><div align="right"><?php
                                                                $trab = $row_Recordset1['rab'] + $row_Recordset1['rab2'] + $row_Recordset1['rab3'] + $row_Recordset1['rab4'];
                                                                echo number_format($trab, 2);
                                                                $total_rab = $total_rab + $trab
                                                                ?></div></td>

                                                        <td><!--จ่าย --><div align="right"><?php
                                                                $pay = $row_Recordset1['rua'];
                                                                echo number_format($pay, 2);
                                                                $t_pay = $t_pay + $pay;
                                                                ?></div></td>
                                                        <td><!--จ่าย %--><div align="right"><?php
                                                                $per = ($row_Recordset1['rua'] * 100) / (($row_Recordset1['rab'] + $row_Recordset1['rab2'] + $row_Recordset1['rab3'] + $row_Recordset1['rab4']));
//		 $per = $pay * 100 / $trab;
                                                                echo number_format($per, 2);
                                                                ?></div></td>


                                                        <td><!-- เหลือ --><div align="right"><?php
                                                                if ($trab - $row_Recordset1['rua'] < 0) {
                                                                    echo "<FONT SIZE='' COLOR='#FF0000'>";
                                                                    echo number_format($trab - $row_Recordset1['rua'], 2);
                                                                    echo "</FONT>";
                                                                } else {
                                                                    echo number_format($trab - $row_Recordset1['rua'], 2);
                                                                }
                                                                $total_rua = $total_rua + $trab - $row_Recordset1['rua'];
                                                                ?></div></td>
                                                    </tr>
                                                <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
                                                <tr bgcolor="#FFCC99">
                                                    <td>รวม</td>
                                                    <td><div align="right"><?php echo number_format($total_rab, 2); ?></div></td>
                                                    <td><div align="right"><?php echo number_format($t_pay, 2); ?></div></td>
                                                    <?php $t_per = $t_pay * 100 / $total_rab; ?>
                                                    <td><div align="right"><?php echo number_format($t_per, 2); ?></div></td>
                                                    <td><div align="right"><?php echo number_format($total_rua, 2); ?></div></td>
                                                </tr>
                                            </table>
                                            <P>
                                                <?php
                                                mysql_free_result($Recordset1);
                                                ?>


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