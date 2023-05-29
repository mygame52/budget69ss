<?php
session_start();
@ini_set("display_errors", "0"); //ใส่บรรทัดแรก
include("config.inc.php");

if ($act != "ok") {
    echo "	<SCRIPT language='JavaScript'>";
    echo "			alert('ท่านเข้าสู่ระบบไม่ถูกต้อง')";
    echo"			location.href='index.php'";
    echo"	</SCRIPT>";
    exit();
}
$query_search = "SELECT * FROM amp where id = '$ch_book'";
$result = mysql_query($query_search);
$nums_rows = mysql_num_rows($result);
if ($nums_rows >= 1) {
    $fet = mysql_fetch_array($result);
    $name = $fet['Name'];
    $add1 = $fet['add1'];
    $add2 = $fet['add2'];
    $add3 = $fet['add3'];
    $numbook = $fet['numbook'];
    $director = $fet['director'];
    $tel = $fet['tel'];
    $fax = $fet['fax'];
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
                        <a href="./menu_amp" class="active">Back</a>
                    </li>	
                    <li><font size="3" color="#ffffcc">
                            <?php
                            echo "หน่วยงาน   : " . $sele_amp;
                            echo " : " . $full_name;
                            ?></font>
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
                                    <h2 class="rnut-postheader" style="text-align: center;">ตั้งค่าหน่วยงาน / หนังสือ</h2>

                                    <!-- start การแก้ไขข้อมูล -->
                                    <div align="center">
                                        <br>
                                            <FORM METHOD=POST ACTION="amp_book_update.php">
                                                <TABLE align="center" width="50%">
                                                    <TR>
                                                        <TD style="text-align: right;vertical-align: middle">สกร.อำเภอ </TD>
                                                        <TD>
                                                            <INPUT TYPE="text" NAME="name" value="<?php echo $name ?>" readonly>
                                                                <INPUT TYPE="hidden" name="ch_book" value="<?echo $ch_book?>"/>
                                                        </TD>
                                                    </TR>
                                                    <TR>
                                                        <TD style="text-align: right;vertical-align: middle">เลขสารบัญ. </TD>
                                                        <TD>
                                                            <INPUT TYPE="text" NAME="numbook" value="<?php echo $numbook ?>"/>						
                                                        </TD>
                                                    </TR>
                                                    <TR>
                                                        <TD style="text-align: right;vertical-align: middle">ผู้อำนวยการ</TD>
                                                        <TD><INPUT TYPE="text" name="director" value="<?php echo $director ?>"/></TD>
                                                    </TR>
                                                    <TR>
                                                        <TD style="text-align: right;vertical-align: middle">ที่อยู่ : แถวที่ 1</TD>
                                                        <TD><INPUT TYPE="text" name="add1" value="<?php echo $add1 ?>"/></TD>
                                                    </TR>
                                                    <TR>
                                                        <TD style="text-align: right;vertical-align: middle">ที่อยู่ : แถวที่ 2</TD>
                                                        <TD><INPUT TYPE="text" name="add2" value="<?php echo $add2 ?>"/></TD>
                                                    </TR>
                                                    <TR>
                                                        <TD style="text-align: right;vertical-align: middle">ที่อยู่ : แถวที่ 3</TD>
                                                        <TD><INPUT TYPE="text" name="add3" value="<?php echo $add3 ?>"/></TD>
                                                    </TR>

                                                    <TR>
                                                        <TD style="text-align: right;vertical-align: middle">โทรศัพท์</TD>
                                                        <TD><INPUT TYPE="text" name="tel" value="<?php echo $tel ?>"/></TD>
                                                    </TR>
                                                    <TR>
                                                        <TD style="text-align: right;vertical-align: middle">โทรสาร</TD>
                                                        <TD><INPUT TYPE="text" name="fax" value="<?php echo $fax ?>"/></TD>
                                                    </TR>

                                                    <TR>					
                                                        <TD colspan="2"><div align= "center"><INPUT TYPE="submit" value="บันทึก"/> </div>
                                                        </TD>
                                                    </TR>
                                                </table>
                                            </FORM>
                                    </div>
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
