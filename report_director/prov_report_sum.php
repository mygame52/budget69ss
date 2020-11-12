<?php
session_start();
include("../config.inc.php");
include("../edit_mony_pee.php");
include("../up_ma.php");
$l = 0;
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
                                    <h2 class="rnut-postheader" style="text-align: center;">รายงานงบประมาณทั้งหมด</h2>
                                    <!-- <div class="rnut-postcontent">
                                                                    <p style="text-align: center;">test1</p>
                                                                    <p style="text-align: center;">test2</p>
                                            </div> -->
                                    <!-- start การแก้ไขข้อมูล -->
                                    <div align="center">
                                        <P>
                                            <?php
                                            $sql = ("select * from samnak ORDER BY code_sam ASC");
                                            $result = mysql_query($sql);
                                            $num_rows = mysql_num_rows($result); //จำนวนที่เลือกได้
                                            ?>
                                            <table width="80%" align="center" border="0" cellspacing="1" cellpadding="3">
                                                <tr bgcolor = '#ccb0f2'>
                                                    <th scope="col" width="2.5%">ที่</th>
                                                    <th scope="col" width="2.5%">รหัส</th>
                                                    <th scope="col" width="20%">ชื่องาน / โครงการ</th>
                                                    <th scope="col" width="10%">เงิน ทั้งปี<br>(1)</th>
                                                    <th scope="col" width="10%">เงิน โอนมาแล้ว<br>(2)</th>
                                                    <th scope="col" width="10%">เงินจัดสรรแล้ว<br>(3)</th>
                                                    <th scope="col" width="10%">รอการจัดสรร<br>(1-3)</th>
                                                    <th scope="col" width="10%">เงินเบิกแล้ว<br>(4)</th>
                                                    <th scope="col" width="5%">คิดเป็น %</th>
                                                </tr>
                                                <?php
                                                $tr_rab = 0;
                                                $tr_rua = 0;
                                                $tpee = 0;
                                                $tma = 0;
                                                $t_long = 0;
                                                for ($i = 1; $i <= $num_rows; $i++) {
                                                    $fet_work = mysql_fetch_array($result);
                                                    $code_w = $fet_work['code_sam'];
                                                    $name_w = $fet_work['name_sam'];
                                                    $ngen_w = $fet_work['mony_pee'];
                                                    $ngen_m = $fet_work['mony_ma'];
                                                    $r_rab = 0;
                                                    $r_rua = 0;
                                                    $sql_j = "SELECT * FROM `judsun` WHERE `work` LIKE  $code_w  ";
                                                    $result_j = mysql_query($sql_j);
                                                    if (!$result_j) {
                                                        echo "ไม่พบ";
                                                        exit();
                                                    }
                                                    $num_rows_j = mysql_num_rows($result_j); //จำนวนที่เลือกได้
                                                    for ($j = 1; $j <= $num_rows_j; $j++) {
                                                        $fetcharr = mysql_fetch_array($result_j);
                                                        $r_rab = $r_rab + $fetcharr['rab'] + $fetcharr['rab2'] + $fetcharr['rab3'] + $fetcharr['rab4'];
                                                        $r_rua = $r_rua + $fetcharr['rua'];
                                                    }

                                                    $l++;
                                                    $ii = ($l % 2)
                                                    ?>
                                                    <tr <?php
                                                    if ($ii != 1) {
                                                        echo "bgcolor='#FFFF99'";
                                                    }
                                                    ?> class='off unamed1' onmouseover=this.className = 'ongreen' onmouseout=this.className = 'off' style='cursor:hand' >  

                                                        <td style="text-align:center;"><? echo $i; ?></td>
                                                        <td><?php echo $code_w; ?></td>
                                                        <td><?php echo $name_w; ?></td>
                                                        <td><div align="right"><?php
                                                                echo number_format($ngen_w, 2);
                                                                $tpee = $tpee + $ngen_w;
                                                                ?> </div></td>
                                                        <td><div align="right"><?php
                                                                echo number_format($ngen_m, 2);
                                                                $tma = $tma + $ngen_m;
                                                                ?> </div></td>
                                                        <td><div align="right"><?php
                                                                echo number_format($r_rab, 2);
                                                                $tr_rab = $tr_rab + $r_rab;
                                                                ?>	
                                                            </div></td>
                                                        <td><div align="right">
                                                                <?php
                                                                $long = $ngen_w - $r_rab;

                                                                if ($long < 0) {
                                                                    echo "<FONT COLOR='#FF0000'>";
                                                                    echo number_format($long, 3);
                                                                    echo "</FONT>";
                                                                } else {
                                                                    echo number_format($long, 3);
                                                                }
                                                                $t_long = $t_long + $long;
                                                                ?>	
                                                            </div></td>

                                                        <td><div align="right"><?php
                                                                echo number_format($r_rua, 2);
                                                                $tr_rua = $tr_rua + $r_rua;
                                                                ?>	
                                                            </div></td>
                                                        <td><div align="right">
                                                                <?php
                                                                if (($r_rua == 0) or ( $ngen_w == 0)) {
                                                                    echo "0";
                                                                } else {
                                                                    echo number_format(($r_rua) * 100 / $ngen_w, 2);
                                                                }
                                                                ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }  //น่าจะเป็นปิด for  นอกสุด
                                                ?>
                                                <tr bgcolor = '#FFCC00'>
                                                    <td></td>
                                                    <td></td>
                                                    <td>รวม</td>
                                                    <td><div align="right"><?php echo number_format($tpee, 2); ?> </div></td>	
                                                    <td><div align="right"><?php echo number_format($tma, 2); ?> </div></td>
                                                    <td><div align="right"><?php echo number_format($tr_rab, 2); ?></div></td>
                                                    <td><div align="right"><?php echo number_format($tpee - $tr_rab, 2); ?></div></td>
                                                    <td><div align="right"><?php echo number_format($tr_rua, 2); ?> </div></td>
                                                    <td><div align="right"><?php echo number_format(($tr_rua) * 100 / $tpee, 2); ?> </div></td>
                                                </tr>
                                            </TABLE>
                                            <P>
                                                <table width="80%" align="center" border="0" cellspacing="3" cellpadding="3">
                                                    <TR>
                                                        <TD colspan="3"><B>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;หมายเหตุ</B> คิดเป็นเปอร์เซนต์ คิดจากเงิน ทั้งปี </TD>
                                                        <TD><CENTER><input type="submit" name="Submit" value="Print" onClick="window.print()"></CENTER></TD>
                                                    </TR>
                                                </TABLE>

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

                                                </body>
                                                </html>