<?php
require("config.inc.php");
mysql_connect($dbserver, $dbuser, $dbpass) or die("<hr><b> ติดต่อ server ไม่ได้>");
mysql_select_db($dbname) or  die("ติดฐานข้อมูลไม่ได้");
$id = $_REQUEST['id'];
$sql = ("select * from cover_sheet where id= '$id'");
$result = mysql_query($sql);
$num_rows = mysql_num_rows($result); //จำนวน  record  ที่พบ
$ok_ = $_REQUEST['ok_'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd" []>
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
					<a href="year_code_work.php" class="active">Back</a>
				</li>
			</ul>
			<font size="4" color="ffffff">Login โดย :&nbsp;<?php echo $user_ ?></font>
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
								<h2 class="rnut-postheader" style="text-align: center;">ลบข้อมูลใบปะหน้า</h2>

								<!-- start การแก้ไขข้อมูล -->
								<?php
								if ($ok_ == 9) {
									$sql_del = ("delete from cover_sheet where id= '$id'");
									$result = mysql_query($sql_del);
									echo "<CENTER>ลบใบปะหน้า Id : $id  แล้ว</CENTER>";
									//header("location:re1.php");  
									echo "<meta http-equiv=\"refresh\" content=\"0;URL=cover_sheet.php\" />";
								} else {
									echo " ยกเลิก การลบข้อมูล";
								}
								?>

								<!-- end การแก้ไขข้อมูล -->

								<?php include("./include/footer.inc"); ?>
</body>

</html>