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


$id_item = $_REQUEST['w_del'];
$sql = ("select * from  director where di= '$w_del'");
$result = mysql_query($sql);
$num_rows = mysql_num_rows($result); //จำนวน  record  ที่พบ

$resultedit = mysql_fetch_array($result);
$w_code = $resultedit['di'];
$w_name = $resultedit['p_di'];
$w_pas = base64_decode($w_name);
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
                        <a href="./prov_director.php" class="active">Back</a>
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
                                    <h2 class="rnut-postheader" style="text-align:center;">
                                        แก้ไข : ชื่อ รหัสผ่าน และงาน สำหรับผู้บริหาร &nbsp;<?php echo $mess_header2 ?>
                                    </h2>

                                    <!-- start การแก้ไขข้อมูล -->

                                    <?php
                                    echo "<CENTER>";
                                    echo'<BR>';
                                    echo"<FONT SIZE='3' COLOR='#339900'>กำหนด Password  ของผู้บริหารระดับจังหวัด</FONT> <br>";
                                    echo "<form action='prov_director_update.php' method='post'>";
                                    echo "<INPUT TYPE='hidden' NAME='di' value='$w_code'>";
                                    echo " <br>แก้ไข Password  ของ    " . $w_code;
                                    echo"<BR><br>";
                                    echo "<INPUT TYPE='text' NAME='p_di' width='20' value='$w_pas'>";
                                    echo "<INPUT TYPE='submit' value= 'Update'>";
                                    echo "</form>";
                                    echo "</CENTER> <br>";
                                    ?>

                                    <!-- end การแก้ไขข้อมูล -->
                                    <?php include("./include/footer.inc"); ?>
                                    </body>
                                    </html>