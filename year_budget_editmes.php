<?php	session_start();
	include("config.inc.php");
	include("code2name_amp.php");
	include("code2name_work.php");
	
$id_item = $_REQUEST['w_del'];
$sql = ("select * from  judsun  where code= '$w_del'");
$result = mysql_query($sql);
$num_rows = mysql_num_rows($result); //จำนวน  record  ที่พบ

$resultedit=mysql_fetch_array($result);
$w_code=$resultedit['code'];
$w_rab=$resultedit['rab'];
$w_rab2=$resultedit['rab2'];
$w_rab3=$resultedit['rab3'];
$w_rab4=$resultedit['rab4'];
$w_rua=$resultedit['rua'];

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
                    <a href="year_budget_edit_work.php" class="active">Back</a>
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
						<h2 class="rnut-postheader" style="text-align: center;">แก้ไขการจัดสรรงบประมาณ งาน/โครงการ</h2>


<!-- start การแก้ไขข้อมูล -->
					   <?php 

							echo "<CENTER><font size='3' color='#0000cc'>";
								echo "<form action='year_budget_editmes_update.php' method='post'>";
                                                                echo "<table width='30%'><tr><td>";
								echo "<INPUT TYPE='hidden' NAME='w_code' value='$w_code'>";
								echo "<INPUT TYPE='hidden' NAME='w_rab' value='$w_rab'>";
								echo "<INPUT TYPE='hidden' NAME='w_rab2' value='$w_rab2'>";
								echo "<INPUT TYPE='hidden' NAME='w_rua' value='$w_rua'>";
								echo "แก้ไขเงินจัดสรรของ รหัส  >>  $w_code <BR><BR>";
								echo "จำนวนเงินจัดสรร ครั้งที่ 1      <INPUT TYPE='text' NAME='w_rab_n' size='20' value='$w_rab'><BR>";
								echo "จำนวนเงินจัดสรร ครั้งที่ 2       <INPUT TYPE='text' NAME='w_rab_n2' size='20' value='$w_rab2'><BR>";
								echo "จำนวนเงินจัดสรร ครั้งที่ 3       <INPUT TYPE='text' NAME='w_rab_n3' size='20' value='$w_rab3'><BR>";
								echo "จำนวนเงินจัดสรร ครั้งที่ 4       <INPUT TYPE='text' NAME='w_rab_n4' size='20' value='$w_rab4'><BR>";
								echo "<BR>";
								echo "<INPUT TYPE='submit' value= 'Update'>";
                                                                 echo "</td></tr></table>";
								echo "</form>";
							echo "</font></CENTER>";						
						?>

<!-- end การแก้ไขข้อมูล -->
										<?php include("./include/footer.inc");?>
                                    </body>
                                    </html>