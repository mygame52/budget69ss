<?php
session_start();
include("config.inc.php");
if (trim($hid1) <> "03") {
    echo "	<SCRIPT language='JavaScript'>";
    echo "			alert('ท่านเข้าสู่ระบบไม่ถูกต้อง')";
    echo"			location.href='index.php'";
    echo"	</SCRIPT>";
    exit();
}

mysql_select_db($dbname, $objConnect);
$query_work1 = "SELECT * FROM amp ORDER BY id ASC";
$work1 = mysql_query($query_work1, $objConnect) or die(mysql_error());
$row_work1 = mysql_fetch_assoc($work1);
$totalRows_work1 = mysql_num_rows($work1);

mysql_select_db($dbname, $objConnect);
$query_work2 = "SELECT * FROM `work` ORDER BY w_code ASC";
$work2 = mysql_query($query_work2, $objConnect) or die(mysql_error());
$row_work2 = mysql_fetch_assoc($work2);
$totalRows_work2 = mysql_num_rows($work2);
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
                        <a href="./menu_pro.php" class="active">Back</a>
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
                                    <h2 class="rnut-postheader" style="text-align: center;">การจัดสรรงบประมาณ (**ได้รับครั้งแรก)</h2>

                                    <!-- start การแก้ไขข้อมูล -->
                                    <div align="center">
                                        <br>
                                            <form name="form1" method="post" action="year_budget_new_save.php" onSubmit="JavaScript:return fncSubmit_budgetnew();">
                                                <table width="60%">
                                                    <tr>
                                                        <td width="49%"><div align="right">สถานศึกษา&nbsp;&nbsp;</div></td>
                                                        <td width="49%"><select name="sel1">
                                                                <?php
                                                                do {
                                                                    ?><option value="<?php echo $row_work1['id'] ?>"><?php echo $row_work1['Name'] ?></option>
                                                                    <?php
                                                                } while ($row_work1 = mysql_fetch_assoc($work1));
                                                                $rows = mysql_num_rows($work1);
                                                                if ($rows > 0) {
                                                                    mysql_data_seek($work1, 0);
                                                                    $row_work1 = mysql_fetch_assoc($work1);
                                                                }
                                                                ?>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><div align="right">เลือกงาน / โครงการ&nbsp;&nbsp;</div></td>
                                                        <td><select name="sel2">
                                                                <?php
                                                                do {
                                                                    ?>
                                                                    <option value="<?php echo $row_work2['w_code'] ?>"><?php echo $row_work2['w_name'] ?></option>
                                                                    <?php
                                                                } while ($row_work2 = mysql_fetch_assoc($work2));
                                                                $rows = mysql_num_rows($work2);
                                                                if ($rows > 0) {
                                                                    mysql_data_seek($work2, 0);
                                                                    $row_work2 = mysql_fetch_assoc($work2);
                                                                }
                                                                ?>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><div align="right">จำนวนเงินจัดสรรครั้งที่ 1 ใน 4  (ครั้งที่ 2-4 ใช้เมนูแก้ไข)&nbsp;&nbsp;</div></td>
                                                        <td>
                                                            <label>
                                                                <input size="10" type="text" name="jud1" class="style1" id="jud1" onKeyup="JavaScript:return isNumeric(this, 'กรุณาป้อน ค่าน้ำประปา เป็นตัวเลขครับ');" />								  
                                                                              <!-- <input type="text" name="jud1"> --> บาท
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <td><div align="right"><input type="reset" value ="ยกเลิก">&nbsp;&nbsp;</td>
                                                                <td>&nbsp;&nbsp;<input type="submit" name="Submit" value="ตกลง" /></td>
                                                                </tr> 
                                                                </table>
                                                                </form> 
                                                        </div><br><br>
                                                                <?php
                                                                mysql_free_result($work1);
                                                                mysql_free_result($work2);
                                                                ?>

                                                                <!-- end การแก้ไขข้อมูล -->
                                                        										<?php include("./include/footer.inc");?>
                                    </body>
                                    </html>

                                                                <script language="javascript">

                                                                    function chksumit()
                                                                    {
                                                                        if (document.form1.monthpay.value == "")
                                                                        {
                                                                            alert("กรุณากรอกเลือก ข้อมูลของเดือนที่จะบันทึกด้วยครับ");
                                                                            document.form1.numberbook.focus();
                                                                        } else
                                                                        {
                                                                            document.form1.submit();
                                                                        }
                                                                    }

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