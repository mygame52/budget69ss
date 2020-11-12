<?php
session_start();
@ini_set("display_errors", "0"); //ใส่บรรทัดแรก
include("config.inc.php");
include("code2name_amp.php");
include("code2name_work.php");
// start หากไม่ได้เข้าใช้งานจากเมนู
if (trim($hid1) <> "03") {
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=menu_pro.php\" />";
}
// end หากไม่ได้เข้าใช้งานจากเมน

$sel = $_REQUEST['sel_2'];
$sel3 = $_REQUEST['sel3'];
if (!isset($F1)) {
    $F1 = "";
} // บรรทัดที่ 113
if (!isset($F2)) {
    $F2 = "";
} // บรรทัดที่ 113

$r = 0;
mysql_select_db($dbname, $objConnect);
$query_Recordset1 = "SELECT * FROM item where c_khong like '$sel3' ORDER BY id_item DESC";
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
                        <a href="prov_report.php" class="active">Back</a>
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
                                    <h2 class="rnut-postheader" style="text-align: center;">รายงานสถานะการเบิกจ่ายงบประมาณ <font size="3" color="#ff0000">[&nbsp;<?php echo $w_name[substr($sel3, 2, 6)] . " :  " . $xxx[$sel]; ?>&nbsp;]</font></h2>
                                    <!-- <div class="rnut-postcontent">
                                                                    <p style="text-align: center;">test1</p>
                                                                    <p style="text-align: center;">test2</p>
                                            </div> -->
                                    <!-- start การแก้ไขข้อมูล -->


                                    <div align="center">
                                        <table width="95%" align="center" border="0" cellspacing="1" cellpadding="3">
                                            <tr bgcolor="#00ff99" align="center"><font size="2" color="#3300ff">
                                                    <th width="10%" scope="col">ID</th>
                                                    <th width="30%" scope="col">รายการ</th>
                                                    <th width="10%" scope="col">ที่เอกสาร</th>
                                                    <th width="10%" scope="col">เวลาที่บันทึก</th>
                                                    <th width="10%" scope="col">จำนวนเงิน</th>
                                                    <th width="10%" scope="col">สถานะ</th>
                                                </font>
                                            </tr>
                                            <?php
                                            if ($totalRows_Recordset1 < 1) {
                                                echo "<tr><td colspan='7' bgcolor='#ffffff'><div align='center'>";
                                                echo"<CENTER> <FONT SIZE=\"3\" COLOR=\"#ff0000\"><B>ไม่พบข้อมูล</B> </FONT></CENTER>";
                                                echo"</div></td></tr>";
                                            } else {
                                                ?>

                                                <?php
                                                $total = 0;
                                                do {
                                                    $r++;
                                                    $rol = ($r % 2);
                                                    ?>

                                                    <tr <?if($rol !=1){echo "bgcolor='#ccffff'";}?> class='off unamed1' onmouseover=this.className='onping' onmouseout=this.className='off' style='cursor:hand' >

                                                        <font size="2" color="#003333">
                                                                <?php $i_del = $row_Recordset1['id_item']; ?>	  
                                                                <?php $am_del = $row_Recordset1['amp_item']; ?>	  
                                                                <?php $id_yuem_del = $row_Recordset1['id_yuem']; ?>	  
                                                            <td style="text-align: center;vertical-align:middle;"><?php echo $row_Recordset1['id_item']; ?></td>
                                                            <?php $i_tem = $row_Recordset1['item'];
                                                            ?>	  
                                                            <td style="vertical-align:middle;"><?php echo $row_Recordset1['item']; ?></td>
                                                            <td style="vertical-align:middle;"><?php echo $row_Recordset1['doc']; ?></td>
                                                            <td style="text-align: center;vertical-align:middle;"><?php echo $row_Recordset1['date_time']; ?></td>
                                                            <td style="vertical-align:middle;"><div align="right">

                                                                    <?php
                                                                    $bath = $row_Recordset1['bath'];
                                                                    if (substr($i_tem, 0, 37) == "ล้างเงินยืม :- ") {
                                                                        $total = $total + 0;
                                                                    } else {
                                                                        $total = $total + $row_Recordset1['bath'];
                                                                    }
                                                                    echo number_format($bath, 2);
                                                                    ?> 

                                                                    <div>
                                                                        </td>
                                                                        <td><?php
                                                                            $ta = $row_Recordset1['staus'];
                                                                            if ($row_Recordset1['bath'] < 1) {
                                                                                
                                                                            } else {

                                                                                if ($ta == 0) {
                                                                                    $pic = "image/status0.png";
                                                                                    $mes = "0/4-หน่วยงานส่งขอเบิก";
                                                                                } elseif ($ta == 1) {
                                                                                    $pic = "image/status1.png";
                                                                                    $mes = "1/4-ตรวจสอบหลักฐานแล้ว";
                                                                                } elseif ($ta == 2) {
                                                                                    $pic = "image/status2.png";
                                                                                    $mes = "2/4-ตัดยอดเงินงยประมาณแล้ว";
                                                                                } elseif ($ta == 3) {
                                                                                    $pic = "image/status3.png";
                                                                                    $mes = "3/4-พัสดุทำ -PO-แล้ว";
                                                                                } elseif ($ta == 4) {
                                                                                    $pic = "image/status4.png";
                                                                                    $mes = "5/5-เบิกจ่ายแล้ว";
                                                                                } elseif ($ta == 5) {
                                                                                    $pic = "image/status5.png";
                                                                                    $mes = "มีข้อผิดพลาด";
                                                                                }

                                                                                if ($ta == 5) {
                                                                                    echo "<div align='center'><A HREF='e_rror1.php?i_del=$i_del' target='blank'><img src='$pic' width='85%' border='0' alt='$mes'></A></div> ";
                                                                                } else {
                                                                                    echo "<div align='center' width='100'><img src='$pic' width='85%' border='0' alt='$mes'></div> ";
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </td>

                                                                          <!-- <td  style="vertical-align:middle;"><?php echo $row_Recordset1['user']; ?></td> -->							 
                                                                        </font>
                                                                        </tr>
                                                                    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
                                                                    </table>
                                                                    <!-- /////////////สรุป////////////  -->

                                                                    <?php
                                                                    //////////////////ต่อ แสดงยอดจัดสรร
                                                                    $codework = $sel3;
                                                                    ///echo "							สรุป";
                                                                    mysql_free_result($Recordset1);
                                                                    //mysql_select_db($database_budget, $budget);
                                                                    mysql_select_db($dbname, $objConnect);

                                                                    $query_ijud = "SELECT * FROM judsun where code like '$codework' ";
                                                                    $ijud = mysql_query($query_ijud, $objConnect) or die(mysql_error());
                                                                    $row_ijud = mysql_fetch_assoc($ijud);
                                                                    ?> 


                                                                    <table width="95%" align="center" border="0" cellspacing="1" cellpadding="3">
                                                                        <TR>
                                                                            <TD bgcolor="#FFFF99"><CENTER><?php echo "รวมเป็นเงิน " . number_format($row_ijud['rua'], 2); ?>&nbsp;&nbsp;บาท</CENTER></TD>
                                                                        </TR>
                                                                    </TABLE>

                                                                    <table width="95%" align="center" border="0" cellspacing="1" cellpadding="3">
                                                                        <TR>
                                                                            <TD bgcolor="#E9E4FA">  สรุป</TD>
                                                                        </TR>
                                                                    </TABLE>
                                                                    <table width="95%" align="center" border="0" cellspacing="2" cellpadding="5">
                                                                        <tr bgcolor="#FFFF99">
                                                                              <!-- <th scope="col">รหัส ศบอ.</th> -->
                                                                            <th scope="col">รหัสโครงการ</th>
                                                                            <th scope="col">ชื่อ งาน </th>
                                                                            <th scope="col">จัดสรร</th>
                                                                            <th scope="col">จ่าย</th>
                                                                            <th scope="col">เหลือ </th>
                                                                            <th scope="col">หมายเหตุ</th>
                                                                        </tr>
                                                                        <tr><font size="3" color="#ff0000">
                                                                              <!-- <td><?php echo $row_item['amp_item']; ?></td> -->
                                                                                <td style="text-align:center;"><?php echo $row_ijud['code']; ?></td>
                                                                                <td style="text-align:center;"><?php echo $w_name[substr($sel3, 2, 6)]; ?></td>
                                                                                <?php $trab = $row_ijud['rab'] + $row_ijud['rab2'] + $row_ijud['rab3'] + $row_ijud['rab4']; ?>
                                                                                <td style="text-align:center;"><?php echo number_format($trab, 2); ?></td>
                                                                                <td style="text-align:center;"><?php echo number_format($row_ijud['rua'], 2); ?></td>
                                                                                <td style="text-align:center;"><?php echo number_format($trab - $row_ijud['rua'], 2); ?></td>
                                                                                <td></td></font>
                                                                        </tr>
                                                                    <?php } ?>
                                                                </table>
                                                            </div>


                                                            <!-- end การแก้ไขข้อมูล -->
                                                            <?php include("./include/footer.inc"); ?>
                                                            </body>
                                                            </html>