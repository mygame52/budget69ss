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
                        <a href="prov_update_calc.php" class="active">Back</a>
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
                                    <h2 class="rnut-postheader" style="text-align: center;">ปรับปรุงรายการ : เบิก-ยืม-คืน <font size="3" color="#ff0000">[&nbsp;<?php echo $w_name[substr($sel3, 2, 6)] . " :  " . $xxx[$sel]; ?>&nbsp;]</font></h2>
                                    <!-- <div class="rnut-postcontent">
                                                                    <p style="text-align: center;">test1</p>
                                                                    <p style="text-align: center;">test2</p>
                                            </div> -->
                                    <!-- start การแก้ไขข้อมูล -->



                                    <table width="95%" align="center" border="0" cellspacing="1" cellpadding="3">
                                        <tr bgcolor="#00ff99" align="center"><font size="2" color="#3300ff">
                                                <th width="5%" scope="col">ID</th>
                                                <th width="50%" scope="col">รายการ</th>
                                                <th width="10%" scope="col">ที่เอกสาร</th>
                                                <th width="10%" scope="col">เวลาที่บันทึก</th>
                                                <th width="10%" scope="col">จำนวนเงิน</th>
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

                                                    <?php
                                                    $i_del = $row_Recordset1['id_item'];
                                                    $am_del = $row_Recordset1['amp_item'];
                                                    $id_yuem_del = $row_Recordset1['id_yuem'];
                                                    if (substr($row_Recordset1['item'], 0, 37) == "ล้างเงินยืม :- ") {
                                                        echo "<font size='3' color='#990066'>";
                                                    } else {
                                                        echo "<font size='3' color='#003333'>";
                                                    }
                                                    ?>							
                                                        <?php $i_tem = $row_Recordset1['item']; ?>	  
                                                    <td style="text-align: center;"><?php echo $row_Recordset1['id_item']; ?></font></td>
                                                    <td style="text-align:middle;">

                                                            <?php
                                                            if (substr($row_Recordset1['item'], 0, 37) == "ล้างเงินยืม :- ") {
                                                                echo "<font size='3' color='#990066'>";
                                                            } else {
                                                                echo "<font size='3' color='#003333'>";
                                                            }
                                                            echo $row_Recordset1['item'];
                                                            ?></font></td>
                                                    <td style="text-align:middle;"><?php echo $row_Recordset1['doc']; ?></font></td>
                                                    <td style="text-align: center;"><?php echo $row_Recordset1['date_time']; ?></font></td>
                                                    <td style="text-align:middle;"><div align="right">													  
                                                            <?php
                                                            $i_tem = $row_Recordset1['item'];
                                                            $bath = $row_Recordset1['bath'];

                                                            if (substr($i_tem, 0, 37) == "ล้างเงินยืม :- ") {
                                                                $id_item_ = explode("-", $i_tem);
                                                                $id_berg = $id_iterm_[1];
                                                                $i = 0;
                                                                $sql_qberg = "SELECT * FROM item where id_item='$id_berg'";
                                                                $dbqueryberg = mysql_db_query($dbname, $sql_qberg);
                                                                $num_rows = mysql_num_rows($dbqueryberg);
                                                                while ($i < $num_rows) {
                                                                    $i++;
                                                                    $result = mysql_fetch_array($dbqueryberg);
                                                                    $bath_ = $result['bath'];
                                                                }
                                                                $money_hl = $bath - $bath_;
                                                                $total = $total + $money_hl;
                                                            } else {
                                                                $total = $total + $row_Recordset1['bath'];
                                                            }
                                                            echo number_format($total, 2);
                                                            ?> 
                                                            </font>
                                                    </td>
                                                    </font>
                                                </tr>
                                        <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
                                        </table>
                                        <!-- /////////////สรุป////////////  -->

                                        <?php
                                        //////////////////แสดงยอดจัดสรร
                                        $codework = $sel3;
                                        mysql_free_result($Recordset1);
                                        mysql_select_db($dbname, $objConnect);

                                        $query_ijud = "SELECT * FROM judsun where code like '$codework' ";
                                        $ijud = mysql_query($query_ijud, $objConnect) or die(mysql_error());
                                        $row_ijud = mysql_fetch_assoc($ijud);
                                        ?> 


                                        <table width="95%" align="center" border="0" cellspacing="1" cellpadding="3">
                                            <TR>
                                                <TD bgcolor="#FFFF99">
                                                    <CENTER>
    <?php //echo "รวมเป็นเงิน ".number_format($row_ijud['rua'],2); ?>
    <?php echo "รวมเป็นเงิน " . number_format($total, 2); ?>
                                                        &nbsp;&nbsp;บาท							
                                                    </CENTER>
                                                </TD>
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



                                    <!-- end การแก้ไขข้อมูล -->
										<?php include("./include/footer.inc");?>
                                    </body>
                                    </html>