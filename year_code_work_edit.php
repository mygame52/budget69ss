<?php 
session_start();
require("config.inc.php");
mysql_connect($dbserver, $dbuser,$dbpass) or
				die("<hr><b> ติดต่อ server ไม่ได้>");
				
mysql_select_db($dbname) or  die("ติดฐานข้อมูลไม่ได้");
$id_item = $_REQUEST['w_del'];
$sql = ("select * from  work  where w_code= '$w_del'");
$result = mysql_query($sql);
$num_rows = mysql_num_rows($result); //จำนวน  record  ที่พบ

$resultedit=mysql_fetch_array($result);
$w_code=$resultedit['w_code'];
$w_name=$resultedit['w_name'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"[]>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
    <!--
    Created by Artisteer v3.1.0.48375
    Base template (without user's data) checked by http://validator.w3.org : "This page is valid XHTML 1.0 Transitional"
    -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo $mess_title?></title>

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
			<a href="year_code_work.php" class="active">Back</a>
		</li>	
	</ul><font size="4" color="ffffff">Login โดย :&nbsp;<?php echo $user_?></font>
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
						<h2 class="rnut-postheader" style="text-align: center;">แก้ไขข้อมูลเกี่ยวกับ:รหัสงาน / โครงการ</h2>
                        <!-- <div class="rnut-postcontent">
							<p style="text-align: center;">test1</p>
							<p style="text-align: center;">test2</p>
		                </div> -->

<!-- start การแก้ไขข้อมูล -->
<?php
echo "<CENTER>";
	echo'<BR>';
	echo"แก้ไขชื่อ งาน/โครงการ";
	echo "<form action='year_code_work_edit1.php' method='post'>";
	echo "<INPUT TYPE='hidden' NAME='w_code' value='$w_code'>";
    echo "<INPUT TYPE='text' NAME='w_name' size='50' value='$w_name'>";
	echo "<INPUT TYPE='submit' value= 'Update'>";
	echo "</form>";
echo "</CENTER>";
?>
<!-- end การแก้ไขข้อมูล -->

										<?php include("./include/footer.inc");?>
                                    </body>
                                    </html>