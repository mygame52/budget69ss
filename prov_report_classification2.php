<?php
require_once("config.inc.php");
@ini_set("display_errors", "0"); //ใส่บรรทัดแรก
include("code2name_work.php");
$sel = trim($_REQUEST['menu1']); //หารหัส 4 หลัก
mysql_select_db($dbname, $objConnect);
$query_Recordset1 = "SELECT * FROM judsun where work = '$sel' ORDER BY cod ASC";
$Recordset1 = mysql_query($query_Recordset1, $objConnect) or die(mysql_error());
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
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
                        <a href="prov_report_classification.php" class="active">Back</a>
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
                                    <h2 class="rnut-postheader" style="text-align: center;">รายงานงบประมาณ:จำแนกตามงาน / โครงการ :<font size="3" color="#ff0000">[&nbsp;<?php echo $sel ?>&nbsp;]</font></h2>
                                    <!-- <div class="rnut-postcontent">
                                                                    <p style="text-align: center;">test1</p>
                                                                    <p style="text-align: center;">test2</p>
                                            </div> -->
                                    <!-- start การแก้ไขข้อมูล -->
                                    <div align="center">
                                        <?php
                                        $chek = "";
                                        $c = 0;
                                        $chekif[$c] = "xx";
                                        for ($i = 1; $i <= $totalRows_Recordset1; $i++) {
                                            $row_Recordset1 = mysql_fetch_assoc($Recordset1);
                                            $code_j = $row_Recordset1['cod'];
                                            $chek = trim($code_j);
                                            if ($chekif[$c] <> $chek) {
                                                $c = $c + 1;
                                                $chekif[$c] = $chek;
                                                //echo $c."=>".$chekif[$c]."<BR>";
                                                //	$work[$c] = $row_Recordset1['work']; 
                                            }
                                        }
                                        //////////////////////////////////////////////////		
                                        $rab1_j = 0;
                                        for ($p = 1; $p <= count($chekif) - 1; $p++) {
                                            $trab[$p] = 0;
                                            $trua[$p] = 0;
                                            $code_j = 0;
                                            require_once("config.inc.php");
                                            mysql_select_db($dbname, $objConnect);
                                            $query_search = "SELECT * FROM judsun where trim(cod) = '$chekif[$p]' ORDER BY cod ASC";
                                            $result = mysql_query($query_search);
                                            $nums_rows = mysql_num_rows($result);

                                            for ($roww = 1; $roww <= $nums_rows; $roww++) {
                                                $fet = mysql_fetch_array($result);

                                                $code_j = $fet['cod'];
                                                //$work_j= 	$fet['w_name']; 
                                                $rab1_j = $fet['rab'];
                                                $rab2_j = $fet['rab2'];
                                                $rab3_j = $fet['rab3'];
                                                $rab4_j = $fet['rab4'];
                                                $rua_j = $fet['rua'];
                                                $cod[$p] = $fet['cod'];
                                                $trab[$p] = $trab[$p] + $rab1_j + $rab2_j + $rab3_j + $rab4_j;
                                                //echo $p."=>  ".$rab1_j."<BR>";
                                                $trua[$p] = $trua[$p] + $rua_j;
                                            }
                                        }
                                        //echo "แสดงการจัดสรรของ รหัส    ".$sel;
                                        ?>
                                        <BR>
                                            <table width="80%" align="center" border="0" cellspacing="0" cellpadding="3"  bordercolordark="#FFFFFF">
                                                <tr bgcolor="#FFCC99">
                                                    <th scope="col">ที่</th>
                                                    <th scope="col">รหัสงาน</th>
                                                    <th scope="col">ชื่องาน / โครงการ</th>
                                                    <th scope="col">รวมจัดสรร</th>
                                                    <th scope="col">รวมจ่าย</th>
                                                    <th scope="col">คิดเป็น %</th>
                                                    <th scope="col">รวมเหลือ</th>
                                                </tr>
                                                <?php
                                                $ttrab = 0;
                                                $ttrua = 0;
                                                $trab[$p] = 0;
                                                for ($p = 1; $p <= count($chekif) - 1; $p++) {
                                                    $rp = ($p % 2);
                                                    ?>

                                                    <tr <?php if($rp !=1){echo "bgcolor='#FFFFCC'";}?> class='off unamed1' onmouseover=this.className='onping' onmouseout=this.className='off' style='cursor:hand' >  


                                                        <td style="text-align:center;"> <? echo $p; ?></td>
                                                        <?$K= $cod[$p]; ?>
                                                        <td style="text-align:center;"> <? echo $cod[$p]; ?></td>
                                                        <td> <? echo $w_name[$K]; ?></td>
                                                        <td ><div align="right"><? echo number_format($trab[$p],2); 
                                                                $ttrab = $ttrab + $trab[$p];?> </div> </td>
                                                        <td><div align="right"><? echo number_format($trua[$p],2); 
                                                                $ttrua = $ttrua + $trua[$p];?></div></td>

                                                        <td><div align="right"><? $per =  $trua[$p]*100/$trab[$p];
                                                                echo number_format($per,2); ?></div></td>

                                                        <td><div align="right"><? $dis = $trab[$p] - $trua[$p];
                                                                echo number_format($dis,2); ?></div></td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                                <tr colspan="3" bgcolor="FFCC00">
                                                    <td> &nbsp;</td>
                                                    <td> &nbsp;</td>
                                                    <td>รวม</td>
                                                    <td><div align="right"><? echo number_format($ttrab,2); ?></div></td>
                                                    <td><div align="right"><? 
                                                            if($ttrua <=0){
                                                            echo "ยังไม่มีการจัดสรร";
                                                            exit();
                                                            }else{
                                                            echo number_format($ttrua,2); 
                                                            }?></div></td>
                                                    <?	$pers = $ttrua * 100 / $ttrab?>
                                                    <td><div align="right"><? 

                                                            echo number_format($pers,2); ?></div></td>

                                                    <td><div align="right"><? $tdis = $ttrab - $ttrua;
                                                            echo number_format($tdis,2); ?></div></td>
                                                </tr>
                                            </TABLE> 
                                            <?php
                                            //หาเงินปี
                                            mysql_select_db($dbname, $objConnect);
                                            $query_Recordset2 = "SELECT * FROM samnak where trim(code_sam) = '$sel'  ";
                                            $Recordset2 = mysql_query($query_Recordset2, $objConnect) or die(mysql_error());
                                            $row_Recordset2 = mysql_fetch_assoc($Recordset2);
                                            $totalRows_Recordset2 = mysql_num_rows($Recordset2);
                                            $ngen_w = $row_Recordset2['mony_pee'];
                                            ?>

                                            <table width="80%" align="center" border="2" cellspacing="1" cellpadding="3">
                                                <tr><FONT SIZE="3" COLOR="#FF00FF"><B>สรุปการจัดสรร</B></FONT></tr>
                                                <TR bgcolor="#FFCC66">
                                                    <th scope="col">จัดสรร/รายการ </th>
                                                    <th scope="col">จำนวนเงินทั้งปี </th>
                                                    <th scope="col">จำนวนเงิน จัดสรรให้งานต่างๆ  </th>
                                                    <th scope="col">จำนวนเงิน รอการจัดสรร </th>
                                                </TR>
                                                <TR bgcolor="#FFCC99">
                                                    <TD><CENTER><? echo $p-1; ?></CENTER></TD>
                                                    <TD style="text-align:center;"><div><? echo number_format($ngen_w,2); ?></div></TD>
                                                    <TD style="text-align:center;"><div><? echo number_format($ttrab,2); ?></div></TD>
                                                    <TD style="text-align:center;"><div><? $samlong = $ngen_w-$ttrab;
                                                            echo number_format($samlong,2); ?></div></TD>
                                                </TR>
                                            </TABLE>

                                    </div>
                                    <!-- end การแก้ไขข้อมูล -->
                                    <?php include("./include/footer.inc"); ?>
                                    </body>
                                    </html>