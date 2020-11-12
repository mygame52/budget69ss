<?php	session_start();
	include("config.inc.php");
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
                    <a href="./prov_person.php" class="active">Back</a>
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
						<h2 class="rnut-postheader" style="text-align:center;">
						เพิ่ม : ชื่อ รหัสผ่าน และงาน สำหรับเจ้าหน้าที่จังหวัด
						</h2>

<!-- start การแก้ไขข้อมูล -->
<br>							<?php
							$acod = $_REQUEST['acod'];
							$anam = $_REQUEST['anam'];

							if ($acod == "" or $anam == "") 	{
								echo ("<center>กรุณากรอกข้อมูลให้ครบ</center> ");
								exit;
							}

							mysql_connect($dbserver, $dbuser, $dbpass) or 
							  die("<br><hr><b>เชื่อมต่อฐานข้อมูลไม่ได้ ");
							mysql_select_db($dbname) or die("เลือกฐานข้อมูลไม่ได้");
							 $pp=base64_encode($_REQUEST['anam']);

							//$sql = "insert  into you_ser (u_ser, pass) values ('$acod',PASSWORD('$anam')) ";
							$sql = "insert  into you_ser (u_ser, pass) values ('$acod','$pp') ";
							$result = mysql_query($sql);

							if (!$result)  { 
								echo("เอ็กซิคิวต์คำสั่ง SQL ไม่ได้ " . mysql_error() ); 
							} 	else {
								echo "<CENTER><font size=3>บันทึกข้อมูลเรียบร้อยแล้ว</Font> <br><hr>";
								echo "<meta http-equiv=\"refresh\" content=\"2;URL=prov_person.php\" />";                                                                
							}
							?>
 
<!-- end การแก้ไขข้อมูล -->
<?php include("./include/footer.inc");?>
                                    </body>
                                    </html>
