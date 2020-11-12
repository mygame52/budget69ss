<?php
session_start();
include("config.inc.php");
include("code2name_work.php");


if (trim($hid1) <> "03") {
    echo "	<SCRIPT language='JavaScript'>";
    echo "			alert('ท่านเข้าสู่ระบบไม่ถูกต้อง')";
    echo"			location.href='index.php'";
    echo"	</SCRIPT>";
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
    <body onload='document.form1.ok_.focus()'>
        <?php include 'include/header.inc.php'; ?>
        <div class="cleared reset-box"></div>
        <div class="rnut-bar rnut-nav">
            <div class="rnut-nav-outer">
                <ul class="rnut-hmenu">
                    <li>
                        <a href="menu_pro.php" class="active">Back</a>
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
                                    <h2 class="rnut-postheader" style="text-align:center;"><CENTER>บันทึกการรับโอบงบประมาณ</CENTER>
                                            <?php //echo $w_name[$c_jud]; ?>
                                    </h2>
                                    <!-- <div class="rnut-postcontent">
                                            <p style="text-align: center;">test1</p>
                                            <p style="text-align: center;">test2</p>
                    </div> -->
                                    <!-- start การแก้ไขข้อมูล -->
                                    <div align="center">
                                        <?php
                                        require("config.inc.php");
                                        mysql_connect($dbserver, $dbuser, $dbpass) or
                                                die("<hr><b> ติดต่อ server ไม่ได้>");

                                        mysql_select_db($dbname) or die("ติดฐานข้อมูลไม่ได้");
                                        $id_item = $_REQUEST['w_del'];
                                        $sql = ("select * from  samnakma  where id_auto = '$w_del'");
                                        $result = mysql_query($sql);
                                        $num_rows = mysql_num_rows($result); //จำนวน  record  ที่พบ

                                        $resultedit = mysql_fetch_array($result);
                                        $id = $resultedit['id_auto'];
                                        $w_code = $resultedit['code_ma'];
                                        $w_date = $resultedit['date'];
                                        $w_doc = $resultedit['doc'];
                                        $w_mony = $resultedit['mony_ma'];
                                        $w_detail = $resultedit['detail'];

                                        echo "<CENTER>";
                                        echo'<BR>';

                                        echo"แก้ไขรายการ / จำนวนเงิน ที่ได้รับโอน<BR><BR><BR>";
                                        echo "<table border='0'><tr><td>";
                                        echo "<form action='wma_update.php' method='post'>";
                                        echo "<INPUT TYPE='hidden' NAME='id' value='$id'>";
                                        echo "รหัสงบประมาณ&nbsp;</td>" . "<td>$w_code</td></tr>";
                                        echo "<tr>";
                                        echo "<td>วันที่ &nbsp;&nbsp;</td>" . "<td><INPUT TYPE='text' NAME='w_date' size='50' value='$w_date'></td>";
                                        echo "</tr><tr>";
                                        echo "<td>เลขที่เอกสาร&nbsp;</td>" . "<td><INPUT TYPE='text' NAME='w_doc' size='50' value='$w_doc'></td>";
                                        echo "</tr><tr>";
                                        echo "<td>จำนวนเงิน&nbsp;</td>" . "<td><INPUT TYPE='text' NAME='w_mony' size='50' value='$w_mony'></td>";
                                        echo "</tr><tr>";
                                        echo "<td>หมายเหตุ&nbsp;</td>" . "<td><TEXTAREA  NAME='w_detail' cols='50' rows='8'>$w_detail</textarea></td>";

                                        echo "</tr><tr>";
                                        echo "<td></td><td><INPUT TYPE='submit' value= 'Update'></td>";
                                        echo "</tr>";
                                        echo "</form>";
                                        echo "</CENTER>";
                                        echo "</table>";
                                        ?>
                                    </div>
                                    <!-- end การแก้ไขข้อมูล -->
                                    <?php include("./include/footer.inc"); ?>
                                    </body>
                                    </html>