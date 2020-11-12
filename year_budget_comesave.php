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
$realname1 = $_FILES['fileupload1']['name'];
$date_save = date("Y-m-d");
$time_save = date("H:i:s"); {
    $Filename1 = $sele_amp . " - " . $date_save . " - " . $time_save . ".pdf";
    copy($_FILES['fileupload1']['tmp_name'], './document/budget_in/' . $Filename1);
}
//mysql_select_db($database_budget, $budget);
$query_Recordset1 = "SELECT * FROM samnakma  ORDER BY code_ma ASC";
$Recordset1 = mysql_query($query_Recordset1) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
$j = 0;
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
                                            <?php //echo $w_name[$c_jud];     ?>
                                    </h2>
                                    <!-- <div class="rnut-postcontent">
                                            <p style="text-align: center;">test1</p>
                                            <p style="text-align: center;">test2</p>
                    </div> -->
                                    <!-- start การแก้ไขข้อมูล -->
                                    <div align="center"> 
                                        <?php
                                        // addrecord.php
                                        require("config.inc.php");

                                        $wcod = $_REQUEST['cod'];
                                        $wdate = $_REQUEST['date'];
                                        $wdoc = $_REQUEST['doc'];
                                        $bat = $_REQUEST['mony_ma'];
                                        $wdetail = $_REQUEST['detail'];
                                        $bath1 = " ";
                                        if ($wcod == "" or $bat == "") {
                                            echo ("<center>กรุณากรอกข้อมูลให้ครบ</center> ");
                                            exit;
                                        }
                                        for ($i = 0; $i < strlen($bat); $i++) {
                                            $b = substr($bat, $i, 1);
                                            if (ord($b) == 44) {
                                                
                                            } else {
                                                $bath1 .= $b;
                                            }
                                        }
                                        settype($bath1, "double");

                                        mysql_connect($dbserver, $dbuser, $dbpass) or
                                                die("<hr><b>เชื่อมต่อฐานข้อมูลไม่ได้ ");
                                        mysql_select_db($dbname) or die("เลือกฐานข้อมูลไม่ได้");

                                        $sql = "insert  into samnakma (id_auto,code_ma, date,doc,mony_ma,detail,file_detail) values ('','$wcod','$wdate','$wdoc','$bath1','$wdetail','$Filename1') ";
                                        $result = mysql_query($sql);

                                        if (!$result) {
                                            echo("เอ็กซิคิวต์คำสั่ง SQL ไม่ได้ " . mysql_error() );
                                            exit();
                                        } else {
                                            echo "<meta http-equiv=\"refresh\" content=\"5;URL=year_budget_come.php\" />";
                                            echo "<font size=3>บันทึกข้อมูลเรียบร้อยแล้ว</Font> <hr>";
                                            echo "<a href=year_budget_come.php>ลิสข้อมูล</a>";
                                        }
                                        ?>
                                    </div>
                                    <!-- end การแก้ไขข้อมูล -->
                                    <?php include("./include/footer.inc"); ?>
                                    </body>
                                    </html>