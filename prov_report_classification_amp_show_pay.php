<?php
session_start();
require_once("config.inc.php");
$sel = $_REQUEST['select'];
//include("help_re1.php");

mysql_select_db($dbname, $objConnect);
//$query_Recordset1 = "SELECT * FROM judsun where left(code,2) like '$sel' ORDER BY code ASC";
if ($sel == "99") {
    //$query_Recordset1 = "SELECT * FROM judsun   left join work on judsun.cod = work.w_code ORDER BY code ASC";
    $query_Recordset1 = "SELECT *  FROM judsun left join work on judsun.cod = work.w_code GROUP BY judsun.cod ORDER BY work,code ASC";
    //$query_Recordset1 = "SELECT judsun.`code` AS code , judsun.`cod` AS cod ,judsun.`work`, judsun.cod, `work`.w_name, Sum(judsun.rab+judsun.rab2+judsun.rab3+judsun.rab4)"
    //        . " AS judson1, Sum(judsun.rua) FROM judsun left join work on judsun.cod = work.w_code GROUP BY judsun.cod"; 
} else {
    $query_Recordset1 = "SELECT * FROM judsun   left join work on judsun.cod = work.w_code where  judsun.amp = '$sel' ORDER BY code ASC";
}

$Recordset1 = mysql_query($query_Recordset1, $objConnect) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

if ($totalRows_Recordset1 < 1) {
    echo "<BR><BR><CENTER> ยังไม่ได้รับจัดสรรใดเลย ครับ ";
    echo "<BR><BR>";
    exit('ต้องไปจัดสรรให้เขาก่อน');
    echo "</CENTER>";
}
$total_rab = 0;
$t_pay = 0;
$t_pay_now = 0;
$j = 0;
$taa = 0;
$t_pay_true = 0;
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
                        <a href="prov_report_classification_amp_pay.php" class="active">Back</a>
                    </li>	
                </ul><font size="4" color="ffffff">Login โดย :&nbsp;<?php echo $user_ ?></font>
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
                                    <h2 class="rnut-postheader" style="text-align: center;">รายงานการเบิกจ่ายงบประมาณ :&nbsp;
                                        <?php 
                                        
                                        if($sel=="99"){
                                            echo "<FONT SIZE='3' COLOR='#3333CC'><B>รายงานงบประมาณคงเหลือ : ทั้งจังหวัด</B></FONT>";
                                        }else {
                                           // echo "<FONT SIZE='3' COLOR='#3333CC'><B>$sel     :&nbsp;$nam</B></FONT>";
                                        }
                                        
                                        
                                        ?></h2>
                                    <!-- <div class="rnut-postcontent">
                                                                    <p style="text-align: center;">test1</p>
                                                                    <p style="text-align: center;">test2</p>
                                            </div> -->
                                    <!-- start การแก้ไขข้อมูล -->
                                    <div align="center">
                                        <BR>
                                            <table width="80%" align="center" border="0" cellspacing="1" cellpadding="4">
                                                <tr bgcolor="#FFCC99">
                                                    <th scope="col">รหัสงาน</th>
                                                    <th scope="col">ชื่องาน / โครงการ</th>
                                                    <th scope="col">จำนวนจัดสรร</th>
                                                    <th scope="col">ขอเบิก</th>
                                                    <th scope="col">จ่ายจริง</th>
                                                    <th scope="col">คงเหลือ (GF)</th>
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
                                                    ?> class='off unamed1' onmouseover=this.className = 'ongreen' onmouseout=this.className = 'off' style='cursor:hand' >  
                                                        <?php $c_jud = $row_Recordset1['code']; ?>
                                                        <td style="text-align:center;"><?php
                                                            $cod = substr($c_jud, 2, 4) . '-' . substr($c_jud, 6, 2);
                                                            echo $cod;
                                                            ?></td>
                                                        <td><?php
                                                            echo $row_Recordset1['w_name'];
                                                            ?></td>
                                                        <td><!-- จัดสรร --><div align="right">
                                                                <?php
                                                                $trab = $row_Recordset1['rab'] + $row_Recordset1['rab2'] + $row_Recordset1['rab3'] + $row_Recordset1['rab4'];
                                                                echo number_format($trab, 2);
                                                                $total_rab = $total_rab + $trab;
                                                                ?>
                                                            </div></td>

                                                        <td><!--จ่าย --><div align="right">
                                                                <?php
                                                                $pay = $row_Recordset1['rua'];
                                                                $t_pay = $t_pay + $pay;
                                                                echo number_format($pay, 2);
                                                                ?>
                                                            </div></td>



                                                        <td><!--จ่ายจริง --><div align="right">
                                                                <?php
                                                                $total_bath_pay = 0;
                                                                $code_work = $row_Recordset1['code'];
                                                                $sql_pay = "SELECT c_khong, item, sum(bath) AS bath_pay FROM item where (c_khong like '$code_work') and staus ='4' GROUP BY c_khong";
                                                                $ii = 0;
                                                                $dbquery_pay = mysql_db_query($dbname, $sql_pay);
                                                                $num_rows_pay = mysql_num_rows($dbquery_pay);
                                                                while ($ii < $num_rows_pay) {
                                                                    $ii++;
                                                                    $row_pay = mysql_fetch_array($dbquery_pay);
                                                                    //echo number_format($row_pay['bath_pay'], 2);
                                                                    $t_pay_now = $t_pay_now + $row_pay['bath_pay'];
                                                                }
                                                                if ($num_rows_pay == 0) {
                                                                    $t_pay_now = 0;
                                                                    // echo $t_pay_now;
                                                                }

                                                                echo number_format($t_pay_now, 2);
                                                                $t_pay_true = $t_pay_true + $t_pay_now;
                                                                //                                                  $per = $pay * 100 / $trab;
                                                                //                                                  echo number_format($per, 2);
                                                                ?>
                                                            </div></td>

                                                        <td><!-- คงเหลือ GF -->
                                                            <div align="right">
                                                                <?php {
                                                                    $taa = $trab - $t_pay_now;
                                                                    echo number_format($taa, 2);
                                                                    $trab = 0;
                                                                    $t_pay_now = 0;
                                                                }
                                                                ?>
                                                            </div>
                                                        </td>

                                                    </tr>
                                                <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>

                                                <tr bgcolor="#FFCC99">
                                                    <TD>&nbsp;</TD>
                                                    <TD>รวม</TD>
                                                    <TD><div align="right"><?php echo number_format($total_rab, 2); ?></div></TD>
                                                    <TD><div align="right"><?php echo number_format($t_pay, 2); ?></div></TD>                                                    
                                                    <TD><div align="right"><?php echo number_format($t_pay_true, 2); ?></div></TD>
                                                    <TD><div align="right"><?php echo number_format($total_rab - $t_pay_true, 2); ?></div></TD>
                                                </TR>
                                            </table>
                                    </div>
                                    <p></p>
                                    <?php
                                    mysql_free_result($Recordset1);
                                    ?>

                                    <!-- end การแก้ไขข้อมูล -->
                                    <?php include("./include/footer.inc"); ?>
                                    </body>
                                    </html>