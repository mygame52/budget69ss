<?php	session_start();
//	@ini_set("display_errors", "0"); //ใส่บรรทัดแรก
	include("config.inc.php");
	if (trim($hid1) <> "03") {
		echo "	<SCRIPT language='JavaScript'>";
		echo "			alert('ท่านเข้าสู่ระบบไม่ถูกต้อง')";
		echo"			location.href='index.php'";
		echo"	</SCRIPT>";
	   exit();
	}

	session_unregister('work');

$sele_amp;
mysql_select_db($dbname, $objConnect);

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
	<!-- start Input Date  -->
		<link rel="stylesheet" type="text/css" href="css/smoothness/jquery-ui-1.7.2.custom.css">  
		<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>  
		<script type="text/javascript" src="js/jquery-ui-1.7.2.custom.min.js"></script>  
		<script type="text/javascript">  
		$(function(){  
		    // แทรกโค้ต jquery  
		    $("#dateInput").datepicker();  
		});  
		</script> 
	<!-- end Input Date  -->


</head>
<body>
<?php include 'include/header.inc.php';?>
            <div class="cleared reset-box"></div>
<div class="rnut-bar rnut-nav">
<div class="rnut-nav-outer">
	<ul class="rnut-hmenu">
		<li>
                    <a href="./menu_pro.php" class="active">Back</a>
		</li></ul>	
		<font size="4" color="ffffff">Login โดย :&nbsp;<?php echo $user_?></font>
		
	
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
						<h2 class="rnut-postheader" style="text-align: center;">เลือกวัน ที่ต้องการรายงาน : </h2>

<!-- start การแก้ไขข้อมูล -->
<br>
						<div align="center">
						<form id="form1" name="form1" method="post" action="prov_report_date.php" target="new">
						<table width="40%" border="0" cellspacing="0" cellpadding="7">
						  <tr>
							<td><div align="right"><font size="3" color="#0000cc">วันที่รายงาน : &nbsp;</font></div></td>
							<td>	
									<input type="text" name="dateInput" id="dateInput" size="13" style="font: 12pt tahoma; color: #ff0000;background: #eff48a; border: 1px black solid" align="center" />
									<br>
									<?php $dateInput=''?>
									
									<INPUT TYPE="hidden" name="dateinput" value=<?=$dateInput?>>
						    </td>
						  </tr>
						  <tr>
							<td>&nbsp;</td>
							<td>
							<input name="Submit" type="submit" id="Submit" value="   ตกลง   " style="font: 12pt tahoma; color: #000066;background: #ccffff; border: 1px black solid" align="center" />
						</td>
						  </tr>
						</table>
						</form>
						</div>
						<p>&nbsp;</p>

<!-- end การแก้ไขข้อมูล -->
<?php include("./include/footer.inc");?>
                                    </body>
                                    </html>


<script language="javascript">
function kod_pum() {
alert('การใส่วันที่ต้องทำการกดปุ่ม Date เท่านั้นครับ');
		event.returnValue = false;
} 
</script>
