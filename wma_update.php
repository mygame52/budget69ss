<?php	session_start();
	include("config.inc.php");
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
			<a href="menu_pro.php" class="active">Back</a>
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
						<h2 class="rnut-postheader" style="text-align:center;"><CENTER>บันทึกการรับโอบงบประมาณ</CENTER>
						<?php //echo $w_name[$c_jud]; ?>
						</h2>
						<!-- <div class="rnut-postcontent">
							<p style="text-align: center;">test1</p>
							<p style="text-align: center;">test2</p>
		                </div> -->
<!-- start การแก้ไขข้อมูล -->
<?php
mysql_connect($dbserver, $dbuser,$dbpass) or
				die("<hr><b> ติดต่อ server ไม่ได้>");

mysql_select_db($dbname) or  die("ติดฐานข้อมูลไม่ได้");
$id = $_REQUEST['id'];
//$w_code = $_REQUEST['w_code'];
$w_date = $_REQUEST['w_date'];
$w_doc = $_REQUEST['w_doc'];
$w_mony = $_REQUEST['w_mony'];
$w_detail = $_REQUEST['w_detail'];

$sql = ("select * from  samnakma  where id_auto= '$id'");
$result = mysql_query($sql);


$sql_up = ("update samnakma set  date = '$w_date', doc = '$w_doc', mony_ma='$w_mony', detail='$w_detail' where id_auto = '$id'");
$result = mysql_query($sql_up);
if (!$result){
	echo "Update ไม่ได้สำเร็จ";
exit();
}
echo "แก้ไขข้อมูล Record : $id  แล้ว";
echo "<meta http-equiv=\"refresh\" content=\"0;URL=year_budget_come.php\" />";
echo "<FORM METHOD=POST ACTION='year_butget_come.php'>";
echo "<CENTER><input type='submit' name='Submit' value=' ดู/ถอน/แก้ไข รายใหม่ ' /></CENTER>";
echo "</FORM>";
?>
    
<!-- end การแก้ไขข้อมูล -->
										<?php include("./include/footer.inc");?>
                                    </body>
                                    </html>