<?php	session_start();
	@ini_set("display_errors", "0"); //ใส่บรรทัดแรก
	
	include("config.inc.php");
	 $j=0;
	if($act  != "ok") {
		echo "ต้องเข้าสู่ระบบปกติ";
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
<body onload='document.form1.doc_.focus()'>
<?php include 'include/header.inc.php'; ?>
            <div class="cleared reset-box"></div>
<div class="rnut-bar rnut-nav">
<div class="rnut-nav-outer">
	<ul class="rnut-hmenu">
		<li>
			<a href="./amp_yuem_person" class="active">Back</a>
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
						<h2 class="rnut-postheader" style="text-align: center;">จัดการข้อมูลผู้ยืมเงิน</h2>

<!-- start การแก้ไขข้อมูล -->
	<?php	
		$chk_status_ = $_REQUEST['chk_sta'];
		if($chk_status_=="1")
		{ 
			echo "<br>";
			echo "<font size='4' color='#ff0000'><center> ไม่สามารถลบข้อมูล รายนี้ได้  :  เนื่องจากยังค้างเงินยืมอยู่<br> กรุณารอซักครู่</center></font>";
			echo"</br>";
			echo "<meta http-equiv=\"refresh\" content=\"3;URL=amp_yuem_person.php\" />";
			exit();
		}

		$sql = "delete from person_yuem where id_yuem = $id_yuem_";
		$dbquery = mysql_db_query($dbname, $sql);

		echo "<meta http-equiv=\"refresh\" content=\"0;URL=amp_yuem_person.php\" />";
	?>

<!-- end การแก้ไขข้อมูล -->
<?php include("./include/footer.inc");?>
                                    </body>
                                    </html>
