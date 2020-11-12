<?php
session_start();
@ini_set("display_errors", "0"); //ใส่บรรทัดแรก

include("config.inc.php");
$j = 0;
if ($act != "ok") {
    echo "ต้องเข้าสู่ระบบปกติ";
    exit();
}

error_reporting(0);
mysql_select_db($dbname, $objConnect);
$query_Recordset1 = "SELECT * FROM item where amp_item = '$sele_amp' and chk_id='1' and staus='4' ORDER BY id_item ASC";

$Recordset1 = mysql_query($query_Recordset1, $objConnect) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

error_reporting(0);
mysql_select_db($dbname, $objConnect);
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
    <body onload='document.form1.doc_.focus()'>
<?php include 'include/header.inc.php'; ?>
        <div class="cleared reset-box"></div>
        <div class="rnut-bar rnut-nav">
            <div class="rnut-nav-outer">
                <ul class="rnut-hmenu">
                    <li>
                        <a href="./menu_amp.php" class="active">Back</a>
                    </li>	
                </ul>
                <?php
                if (($sele_amp <> "") and ( $user_ == "")) {
                    echo "<div style='vertical-align:middle'><font size='3' color='#FFCCCC'>";
                    echo "หน่วยงาน   : " . $sele_amp;
                    echo " : " . $full_name;
                    echo "</font>";
                    echo "</div>";
                } else {
                    echo "<font size='4' color='ffffff'>Login โดย :&nbsp;$user_</font>";
                }
                ?>

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
                                    <h2 class="rnut-postheader" style="text-align: center;">จัดการข้อมูลผู้ยืมเงิน</h2>
                                    <!-- <div class="rnut-postcontent">
                                                                    <p style="text-align: center;">test1</p>
                                                                    <p style="text-align: center;">test2</p>
                                            </div> -->
                                    <!-- start การแก้ไขข้อมูล -->

                                    <TABLE width="100%" border="1" cellspacing="0" cellpadding="5" align="center">
                                        <tr>
                                            <td colspan="5" style="text-align:left;vertical-align:middle"><H3>ข้อมูลผู้ที่มีสิทธิยืมเงิน<?php echo "&nbsp;:&nbsp;" . $full_name; ?></H3></td>
                                            <td align="center"><a href="person_yuem_add.php"><IMG SRC='./image/users--plus.png' WIDTH='24' HEIGHT='24' BORDER='0' ALT='เพิ่ม' onClick='return Conf(this)'></a>
                                            </td>
                                        </tr>	
                                        <tr bgcolor="#E3E1B7">
                                            <th width="3">ID</th>
                                            <th width="10">เลขบัตร ปชช.</th>
                                            <th width="20">ชื่อ-สกุล</th>
                                            <th width="10">ตำแหน่ง</th>
                                            <th width="10">สถานะเงินยืม</th>
                                            <th width="45">จัดการ</th>
                                        </tr>
                                        <tr>

                                            <!-- ดึงข้อมูล ผู้ยืมเงินจาก ฐานข้อมูล item_yuem  -->
                                            <?php
                                            $a = 0;
                                            $psql = "SELECT * FROM person_yuem where amp = $sele_amp order by id_yuem";
                                            $dbquery = mysql_db_query($dbname, $psql);
                                            $num_rows = mysql_num_rows($dbquery);
                                            while ($result = mysql_fetch_array($dbquery)) {
                                                $id_item_ = $result[0];
                                                $citizenid_ = $result[1];
                                                $person_ = $result[2];
                                                $chk_status_ = $result[4];
                                                $position_ = $result[5];
                                                $a++;

                                                if ($a % 2 == 0) {
                                                    echo"<tr onmouseover=this.className='on' onmouseout=this.className='off2' style='cursor:hand' bgcolor='#EAEAEA'>";
                                                } else {
                                                    echo"<tr onmouseover=this.className='on' onmouseout=this.className='off'		style='cursor:hand' bgcolor='#FFFFFF'>";
                                                }
                                                echo "  <td align='center' width='5%' style='text-align:center;vertical-align:middle'><div width='100'>&nbsp;$a</div></td>";
                                                echo "  <td align='center' width='10%' style='text-align:center;vertical-align:middle'>$citizenid_</td>  ";
                                                echo "  <td align='left' width='20%' style='text-align:left;vertical-align:middle'>&nbsp;&nbsp;&nbsp;&nbsp;$person_</td>  ";
                                                echo "  <td align='left' width='30%' style='text-align:left;vertical-align:middle'>&nbsp;&nbsp;&nbsp;&nbsp;$position_</td>  ";
                                                if ($chk_status_ == "1") {
                                                    $mes_chk = "ค้างเงินยืม";
                                                } else {
                                                    $mes_chk = "-";
                                                }
                                                echo "  <td align='left' width='20%' style='text-align:left;vertical-align:middle'>&nbsp;&nbsp;&nbsp;&nbsp;$mes_chk</td>  ";
                                                echo "  <td align='center' width='40%' style='text-align:center;vertical-align:middle'><a href='person_ydelete.php?id_yuem_=$id_item_&chk_sta=$chk_status_'><IMG SRC='./image/cross.png' WIDTH='16' HEIGHT='16' BORDER='0' ALT='ลบ' onClick='return Conf(this)'></a> "
                                                        . "<a href='person_yuem_edit.php?id_yuem_=$id_item_&chk_sta=$chk_status_'><IMG SRC='./image/submitticket.png' WIDTH='16' HEIGHT='16' BORDER='0' ALT='แก้ไข' onClick='return Conf(this)'></a>"
                                                        . " </td>  ";
                                                echo "</tr>";
                                            }
                                            echo"</table>";
                                            echo "<br><br><br>";
                                            ?>

                                            <!-- end การแก้ไขข้อมูล -->
<?php include("./include/footer.inc");?>
                                    </body>
                                    </html>

                                            <script language="javascript">

                                                function isNumeric(elem, helperMsg)  //ตรวจสอบการป้อนตัวเลข
                                                {
                                                    var numericExpression = /^[0-9.]+$/; // ตัวเลขและทศนิยม
                                                    if (elem.value.match(numericExpression)) {
                                                        return true;
                                                    } else {
                                            //                 alert(helperMsg);  
                                                        elem.value = elem.value.substr(0, elem.value.length - 1);
                                                        elem.focus();
                                                        return false;
                                                    }
                                                }


                                            </script>
