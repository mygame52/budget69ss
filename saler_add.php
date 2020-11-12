<?php
session_start();
@ini_set("display_errors", "0");
include("config.inc.php");
$j = 0;

if (($act != "ok")) {
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\" />";
    exit();
}

//echo "idsaler=".$id_saler_."<br>";

if (isset($_REQUEST['id_edit_']) == "edit") {
    //echo "แก้ไข";
    $id_saler_ = ($_REQUEST['idsaler']);

    $sqls = "SELECT * FROM saler WHERE id_saler = '$id_saler_'";

    $dbquerys = mysql_db_query($dbname, $sqls);
    $num_rows = mysql_num_rows($dbquerys);
    while ($results = mysql_fetch_array($dbquerys)) {
       // $id_saler_ = $results[0];
        $name_saler_ = $results[1];
        $address_saler_ = $results[2];
        $account_bank_ = $results[3];
        $bank_saler_ = $results[4];
        $branch_bank_ = $results[5];
        $tel_saler_ = $results[6];
    }
} else {
    //echo "เพิ่ม";
    //$id_saler_="";    
    $id_saler_ = "";
    $name_saler_ = "";
    $address_saler_ = "";
    $account_bank_ = "";
    $bank_saler_ = "";
    $branch_bank_ = "";
    $tel_saler_ = "";
}


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
                        <?php
                        if ((trim($hid1) == "03") and ( trim($hid8) <> "908")) {
                            echo "<a href='./saler.php' class='active'>Back</a>";
                            echo "</li></ul>";
                            echo "<font size='4' color='ffffff'> &nbsp;";
                            echo "ผู้ใช้&nbsp;:&nbsp;" . $user_;
                            echo "</font>";
                        }
                        if ((trim($hid1) <> "03") and ( trim($hid8) == "908")) {
                            echo "<a href='./saler.php' class='active'>Back</a>";
                            echo "</li></ul>";
                            ?>
                            <font size="4" color="ffffff">
                                <?php
                                echo "หน่วยงาน   : " . $sele_amp;
                                echo " : " . $full_name;
                                ?></font><?php } ?>

                        <div style="vertical-align:middle">

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
                                                <div class="rnut-post-inner rnut-article" align="center">
                                                    <img src="image/icon/shop-icon.png" width="52" height="52" border="0" alt=""/><h2 class="rnut-postheader" style="text-align:center;">บันทึกข้อมูลผู้ขาย-ร้านค้า-ผู้รับจ่าย</h2>

                                                    <!-- start การแก้ไขข้อมูล -->

                                                    <br>
                                                        <form method="post" action="saler_save.php">
                                                            <TABLE width="60%" border="1" cellspacing="0" cellpadding="5" align="center">
                                                                <tr bgcolor="#E3E1B7">
                                                                    <th scope="10%">ชื่อผู้ขาย-ผู้รับจ่าย</th><td>      
                                                                        <input type="text" name="name_saler" id="name_saler" value="<?php echo $name_saler_; ?>" maxlength="150" title="ป้อนชื่อผู้ขาย" size="50" style="font: 12pt tahoma; color: #ff0000;background: #ccffff; border: 1px black solid"/>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="30%">ที่อยู่</th>
                                                                    <td>
                                                                        <input type="text" name="address_saler" id="address_saler"  value="<?php echo $address_saler_; ?>" maxlength="250" title="ป้อนที่อยู่ผู้ขาย" size="50" style="font: 12pt tahoma; color: #ff0000;background: #ccffff; border: 1px black solid"/>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="10%">เลขที่บัญชีธนาคาร</th>
                                                                    <td>
                                                                        <input type="text" name="account_bank" id="account_bank"  value="<?php echo $account_bank_; ?>" maxlength="20" title="ป้อนเลขที่บัญชี" size="50" style="font: 12pt tahoma; color: #ff0000;background: #ccffff; border: 1px black solid"/>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="10%">ธนาคาร</th>
                                                                    <td>
                                                                        <select name="bank_saler" size="1" id="bank_saler" tabindex="0" style="font: 14pt tahoma; color: #000000;background: #ccffff; border: 1px black solid" align="center" >
                                                                            <option value=''>เลือกข้อมูล...</option>                                                               
                                                                            <option value='ธนาคารกรุงไทย'>ธนาคารกรุงไทย</option>
                                                                            <option value='ธนาคารกรุงเทพ'>ธนาคารกรุงเทพ</option>
                                                                            <option value='ธนาคารไทยพาณิชย์'>ธนาคารไทยพาณิชย์</option>
                                                                            <option value='ธนาคารกสิกรไทย'>ธนาคารกสิกรไทย</option>
                                                                            <option value='ธนาคารทหารไทย'>ธนาคารทหารไทย</option>
																			<option value='ธนาคาร ธกส.'>ธนาคารเพื่อการเกษตรฯ</option>
																			<option value='ธนาคารออมสิน'>ธนาคาออมสิน</option>
																			<option value='ธนาคารกรุงศรีฯ'>ธนาคารกรุงศรีฯ</option>

                                                                        </select></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="10%">สาขา</th>
                                                                    <td>
                                                                        <input type="text" name="branch_bank" id="branch_bank" value="<?php echo $branch_bank_; ?>" maxlength="100" title="ป้อนสาขา" size="50" style="font: 12pt tahoma; color: #ff0000;background: #ccffff; border: 1px black solid"/>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="10%">โทรศัพท์</th>
                                                                    <td>
                                                                        <input type="text" name="tel_saler" id="tel_saler" value="<?php echo $tel_saler_; ?>"maxlength="20" title="ป้อนเบอร์โทรศัพท์" size="50" style="font: 12pt tahoma; color: #ff0000;background: #ccffff; border: 1px black solid"/>
                                                                    </td>

                                                                </tr>
                                                                <tr>
                                                                    <td colspan="4" style="text-align:center;vertical-align:middle">
                                                                        <input type="submit" name="Submit" value="  บันทึก   "/>
                                                                        <input type="hidden"  name="edit" value="<?php echo $_REQUEST['id_edit_']; ?>"/>
                                                                        <input type="hidden"  name="idsalersave" value="<?php echo $id_saler_; ?>"/>


                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </form>

                                                        <!-- end การแก้ไขข้อมูล -->
                                                        <?php include("./include/footer.inc"); ?>
                                                        </body>
                                                        </html>

                                                        <script>
                                                            function check_idcard(idcard) {
                                                                if (idcard.value == "") {
                                                                    return false;
                                                                }
                                                                if (idcard.length < 13) {
                                                                    return false;
                                                                }

                                                                var num = str_split(idcard); // function เพิ่มเติม
                                                                var sum = 0;
                                                                var total = 0;
                                                                var digi = 13;

                                                                for (i = 0; i < 12; i++) {
                                                                    sum = sum + (num[i] * digi);
                                                                    digi--;
                                                                }
                                                                total = ((11 - (sum % 11)) % 10);

                                                                if (total == num[12]) { //	alert('รหัสหมายเลขประจำตัวประชาชนถูกต้อง');
                                                                    return true;
                                                                } else { //	alert('รหัสหมายเลขประจำตัวประชาชนไม่ถูกต้อง');
                                                                    return false;
                                                                }
                                                            }


                                                            function str_split(f_string, f_split_length) {
                                                                f_string += '';
                                                                if (f_split_length == undefined) {
                                                                    f_split_length = 1;
                                                                }
                                                                if (f_split_length > 0) {
                                                                    var result = [];
                                                                    while (f_string.length > f_split_length) {
                                                                        result[result.length] = f_string.substring(0, f_split_length);
                                                                        f_string = f_string.substring(f_split_length);
                                                                    }
                                                                    result[result.length] = f_string;
                                                                    return result;
                                                                }
                                                                return false;
                                                            }

                                                            function id_card(id) {
                                                                if (check_idcard(id.value)) {
                                                                    break;
                                                                }
                                                                else {
                                                                    alert("หมายเลขบัตรประชาชนไม่ถูกต้อง :-( \n กรุณาป้อนใหม่");
                                                                    id.value = "";
                                                                    id.focus();
                                                                }
                                                            }
                                                        </script>


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
