
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
						<h2 class="rnut-postheader" style="text-align: center;">ลบข้อมูลเกี่ยวกับ:รหัสงาน / โครงการ</h2>
                        <!-- <div class="rnut-postcontent">
							<p style="text-align: center;">test1</p>
							<p style="text-align: center;">test2</p>
		                </div> -->

<!-- start การแก้ไขข้อมูล -->
<?php
						echo"<CENTER><br>";
						$w_del = $_REQUEST['w_del'];

							echo "<font size='3' color='#0033ff'>ลบ รหัส ชื่อ งาน/โครงการ&nbsp; :&nbsp;</font>".$w_del;
							echo "<BR><br>";

							echo "<font size='3' color='#ff0033'>ควรลบ ในช่วงที่ขึ้นต้นปีงบประมาณใหม่ เท่านั้น ยืนยันการลบ กด 9 </font><br><br>";
							echo "<FORM name='form1' METHOD=POST ACTION='year_code_work_del1.php'>";
//							echo "<INPUT TYPE='text' NAME='ok_' size = '1'>";

							echo "<INPUT TYPE='text' NAME='ok_' SIZE='1' style='font: 12pt tahoma; color: #ff0000;background: #C0F9BD; border: 1px black solid'>";

							echo "<INPUT TYPE='hidden' name='w_del' value='$w_del'>";
							echo "&nbsp;&nbsp;&nbsp;<INPUT TYPE='submit' value = 'ยืนยัน'>";
							echo"</FORM>";
							echo"<br></CENTER>";
?>
<!-- end การแก้ไขข้อมูล -->

										<?php include("./include/footer.inc");?>
                                    </body>
                                    </html>