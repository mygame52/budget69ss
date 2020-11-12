<?	session_start();
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
<body onload='document.form1.ok_.focus()'>
<?php include 'include/header.inc.php'; ?>

            <div class="cleared reset-box"></div>
<div class="rnut-bar rnut-nav">
<div class="rnut-nav-outer">
	<ul class="rnut-hmenu">
		<li>
			<a href="prov_codename.php" class="active">Back</a>
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
						<h2 class="rnut-postheader" style="text-align:center;">แก้ไขข้อมูลหน่วยรับงบประมาณ 
						<?php //echo $w_name[$c_jud]; ?>
						</h2>
						<!-- <div class="rnut-postcontent">
							<p style="text-align: center;">test1</p>
							<p style="text-align: center;">test2</p>
		                </div> -->
<!-- start การแก้ไขข้อมูล -->

<?php
	/*** Edit Record ***/
	$idd=$_REQUEST['idd'];
	$strSQL = "SELECT * FROM amp where id='$idd'";
	$objQuery= mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	//echo $objResult["name"];
	?>
	<TABLE align="center">
			<form name="frmMain" method="post" action="prov_codename_up.php">
<br>
			<INPUT TYPE="hidden" NAME="h1" value="<?=$objResult['id']; ?>">
			<tr>
				<td>ชื่อ - สกุล	</td><td><input name="t2" type="text" size="35" value="<?=$objResult['Name']; ?>"></td>
			</tr>
			<tr>
				<td>เลขที่เอกสาร	</td><td><input name="t3" type="text" size="25" value="<?=$objResult['doc']; ?>"></td>
			</tr>
			<tr>
                            <td>รหัสผ่าน	</td> <td><input name="t4" type="text" size="25" disabled value="<?=$objResult['pass']; ?>"></td>
			</tr>
		
				<tr>
				<td> &nbsp;</td><td><input name="btnSubmit" type="submit" id="btnSubmit" value="แก้ไข"></td>
			</tr>
	</TABLE>
		</form><br>
		


<!-- end การแก้ไขข้อมูล -->
										<?php include("./include/footer.inc");?>
                                    </body>
                                    </html>