<?php
session_start();
@ini_set("display_errors", "0"); //ใส่บรรทัดแรก
include("config.inc.php");
include("edit_mony_pee.php");
include("up_ma.php");
$l = 0;

if ($act != "ok") {
    echo "ต้องเข้าสู่ระบบปกติ";
    exit();
}
mysql_select_db($dbname, $objConnect);

$query_Recordset1 = "SELECT * FROM judsun   left join work on judsun.cod = work.w_code where  judsun.amp like '$sele_amp' ORDER BY code ASC";

$Recordset1 = mysql_query($query_Recordset1, $objConnect) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
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
                        <a href="menu_amp.php" class="active">Back</a>
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
                                    <h2 class="rnut-postheader" style="text-align: center;">รายงานสรุปรวมงบประมาณ-โครงการ ทั้งหมด</h2>
                                    <!-- <div class="rnut-postcontent">
                                                                    <p style="text-align: center;">test1</p>
                                                                    <p style="text-align: center;">test2</p>
                                            </div> -->
                                    <!-- start การแก้ไขข้อมูล -->
                                    <div align="center">
                                        <table width="90%" border="2" cellspacing="0" cellpadding="5"align="center"bordercolordark="#FFFFFF"  >
                                            <tr bgcolor="#FFCCFF">
                                                <th scope="col">รหัส</th>
                                                <th scope="col">ชื่องาน / โครงการ</th>
                                                <th scope="col"> จัดสรร</th>
                                                <th scope="col"> ตั้งเบิก</th>
                                                <th scope="col"> %</th>
                                                <th scope="col" > คงเหลือ </th>
                                            </tr>
                                            <?php
                                            do {
                                                $j++;
                                                $i = ($j % 2);
                                                ?>

                                                <tr <?php
                                                if ($i != 1) {
                                                    echo "bgcolor='#ffccff";
                                                }
                                                ?> class='off unamed1' onmouseover=this.className = 'ongreen' onmouseout=this.className = 'off' style='cursor:hand' >  

                                                    <td><?php echo $row_Recordset1['code']; ?></td>
                                                    <td><?php
                                                        //echo $row_Recordset1['work']; 
                                                        echo $row_Recordset1['w_name'];
                                                        ?></td>

                                                    <td><div align="right"> <!-- จัดสรร --><?php
                                                            $trab = $row_Recordset1['rab'] + $row_Recordset1['rab2'] + $row_Recordset1['rab3'] + $row_Recordset1['rab4'];
                                                            echo number_format($trab, 2);
                                                            $totalrab = $totalrab + $trab;
                                                            ?>
                                                        </div></td>


                                                    <td><div align="right"><!-- จ่าย --><?php
                                                            echo number_format($row_Recordset1['rua'], 2);
                                                            $tpay = $tpay + $row_Recordset1['rua'];
                                                            ?>   	             
                                                        </div></td>


                                                    <td><div align="right"><!-- จ่าย% --> <?php
                                                            $per = $row_Recordset1['rua'] * 100 / $trab;
                                                            echo number_format($per, 2);
                                                            ?>   	      

                                                        </div></td>

                                                    <td><div align="right"><!-- คงเหลือ --><?php
                                                            //echo number_format($trab - $row_Recordset1['rua'], 2);
                                                             $totalrua = $trab - $row_Recordset1['rua'];
															 if($totalrua<0){
																 $show_num = $totalrua;
																 $show_ret = preg_replace("-", " ", $show_num);
																echo number_format($show_ret,2);
															 }else{
																echo number_format($totalrua,2);	 
															 }
															 
                                                            ?>

                                                        </div></td>
                                                </tr>
                                            <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>

                                            <tr bgcolor="#E9E7C7">

                                                <th scope="col"></th>
                                                <th scope="col">รวม </th>
                                                <th ><div align="right"><?php echo number_format($totalrab, 2); ?></div></th>
                                                <th ><div align="right"><?php echo number_format($tpay, 2); ?></div></th>
                                                <th ><div align="right"><?php echo number_format($tper = $tpay * 100 / $totalrab, 2); ?></div></th>
                                                <th ><div align="right"><?php echo number_format($totalrab - $tpay, 2); ?> </div></th>
                                            </tr>
                                        </table>
                                    </DIV>

                                    <!-- end การแก้ไขข้อมูล -->
                                    <?php include("./include/footer.inc"); ?>
                                    </body>
                                    </html>

                                    <?
                                    mysql_free_result($Recordset1);
                                    ?>