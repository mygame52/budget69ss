<?php
session_start();
@ini_set("display_errors", "0"); //ใส่บรรทัดแรก

include("config.inc.php");
$j = 0;

if ((trim($hid1) <> "03") and ( trim($hid8) <> "908")) {
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\" />";
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
    <body onload='document.form1.doc_.focus()'>
        <?php include 'include/header.inc.php'; ?>
        <div class="cleared reset-box"></div>
        <div class="rnut-bar rnut-nav">
            <div class="rnut-nav-outer">
                <ul class="rnut-hmenu">
                    <li>
                        <?php
                        if ((trim($hid1) == "03") and ( trim($hid8) <> "908")) {
                            echo "<a href='./menu_pro.php' class='active'>Back</a>";
                        }
                        if ((trim($hid1) <> "03") and ( trim($hid8) == "908")) {
                            echo "<a href='./menu_amp.php' class='active'>Back</a>";
                        }
                        ?>
                    </li>
                </ul>
                <?php if ((trim($hid1) == "03") and ( trim($hid8) <> "908")) { ?>
                    <font size="4" color="ffffff">Login โดย :&nbsp;<?php echo $user_ ?></font>
                    <?php
                }
                if ((trim($hid1) <> "03") and ( trim($hid8) == "908")) {
                    ?>
                    <font size="4" color="ffffff">
                        <?php
                        echo "หน่วยงาน   : " . $sele_amp;
                        echo " : " . $full_name;
                        ?></font>

                <?php } ?>

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
                                    <h2 class="rnut-postheader" style="text-align: center;">จัดการข้อมูลผู้ขาย-ร้านค้า-ผู้รับจ่าย</h2>

                                    <!-- start การแก้ไขข้อมูล -->

                                    <TABLE width="100%" border="1" cellspacing="0" cellpadding="5" align="center">
                                        <tr>
                                            <td colspan="5" style="text-align:left;vertical-align:middle"><H3>ข้อมูลผู้ขาย-ร้านค้า-ผู้รับจ่าย</H3></td>
                                            <td align="center"><a href="saler_add.php?id_edit_=add"><IMG SRC='./image/icon/shop-icon-add.png' WIDTH='32' HEIGHT='32' BORDER='0' ALT='เพิ่ม' onClick='return Conf(this)'></a>
                                            </td>
                                        </tr>	
                                        <tr bgcolor="#E3E1B7">
                                            <th scope="col">No.</th>
                                            <?php
                                            if ($user_ == "admin") {
                                                echo "<th scope='col'>อำเภอ</th>";
                                            }
                                            ?>
                                            <th scope="col">รหัสผู้ขาย</th>
                                            <th scope="col">ชื่อ</th>
                                            <th scope="col">ที่อยู่</th>
                                            <th scope="col">โทรศัพท์</th>
                                            <th scope="col">เลขบัญชี</th>
                                            <th scope="col">ธนาคาร</th>
                                            <th scope="col">สาขา</th>                                            
                                            <th scope="col">จัดการ</th>                                          
                                        </tr>

                                        <!-- ดึงข้อมูล ผู้ยืมเงินจาก ฐานข้อมูล item_yuem  -->
                                        <?php
                                        $a = 0;
                                        if ($user_ == "admin") {
                                            $psql = "SELECT saler.id_saler, saler.name_saler, saler.address_saler, saler.account_bank, saler.bank_saler, saler.branch_bank, saler.tel_saler, amp.`Name` FROM saler INNER JOIN amp ON saler.id_amp = amp.id order by id_amp,id_saler";
                                        } else {
                                            $psql = "SELECT * FROM saler WHERE id_amp = '$sele_amp' order by id_saler";
                                        }
                                        $dbquery = mysql_db_query($dbname, $psql);
                                        $num_rows = mysql_num_rows($dbquery);
                                        while ($result = mysql_fetch_array($dbquery)) {
                                            $a++;

                                            if ($a % 2 == 0) {
                                                echo"<tr onmouseover=this.className='ongreen' onmouseout=this.className='off2' style='cursor:hand' bgcolor='#EAEAEA'>";
                                            } else {
                                                echo"<tr onmouseover=this.className='ongreen' onmouseout=this.className='off' style='cursor:hand' bgcolor='#FFFFFF'>";
                                            }
                                            echo "  <td align='center' width='7%' style='text-align:center;vertical-align:middle'><div width='100'>&nbsp;$a</div></td>";
                                            if ($user_ == "admin") {
                                                echo "  <td align='center' width='20%' style='text-align:left;vertical-align:middle'>$result[7]</td>  ";
                                            }
                                            echo "  <td align='center' width='20%' style='text-align:left;vertical-align:middle'>$result[0]</td>  ";
                                            echo "  <td align='center' width='20%' style='text-align:left;vertical-align:middle'>$result[1]</td>  ";
                                            echo "  <td align='left' width='30%' style='text-align:left;vertical-align:middle'>&nbsp;&nbsp;&nbsp;&nbsp;$result[2]</td>  ";
                                            echo "  <td align='left' width='10%' style='text-align:left;vertical-align:middle'>&nbsp;&nbsp;&nbsp;&nbsp;$result[6]</td>  ";
                                            echo "  <td align='left' width='10%' style='text-align:left;vertical-align:middle'>&nbsp;&nbsp;&nbsp;&nbsp;$result[3]</td>  ";

                                            echo "  <td align='left' width='10%' style='text-align:left;vertical-align:middle'>&nbsp;&nbsp;&nbsp;&nbsp;$result[4]</td>  ";

                                            echo "  <td align='left' width='10%' style='text-align:left;vertical-align:middle'>&nbsp;&nbsp;&nbsp;&nbsp;$result[5]</td>  ";

                                            // if ($user_ == "admin")
                                            {
                                                echo "  <td align='center' width='10%' style='text-align:center;vertical-align:middle'><a href='saler_add.php?idsaler=$result[id_saler]&id_edit_=edit'>"
                                                . "<IMG SRC='./image/icon/edit.gif' WIDTH='16' HEIGHT='16' BORDER='0' ALT='ลบ' onClick='return Conf(this)'></a>"
                                                . " <a href='saler_delete_prov.php?id_saler_=$result[id_saler]'>"
                                                . "<IMG SRC='./image/cross.png' WIDTH='16' HEIGHT='16' BORDER='0' ALT='ลบ' onClick='return Conf(this)'></a></td>  ";
                                            }
                                        }
                                        echo "</tr>";
                                        echo"</table>";
                                        echo "<br><br><br>";
                                        ?>

                                        <!-- end การแก้ไขข้อมูล -->
                                        <?php include("./include/footer.inc"); ?>
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
