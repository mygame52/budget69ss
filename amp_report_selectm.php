<?php	session_start();
//	@ini_set("display_errors", "0"); //ใส่บรรทัดแรก
	include("config.inc.php");
	if($act  != "ok") {
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
                    <a href="./menu_amp.php" class="active">Back</a>
		</li>	
		<li><font size="3" color="#FFCCCC">
			<?php 
			echo "หน่วยงาน   : ".$sele_amp;
			echo " : ".$full_name;  
			?></font>
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
						<h2 class="rnut-postheader" style="text-align: center;">เลือกเดือนที่ต้องการรายงาน : </h2>

<!-- start การแก้ไขข้อมูล -->
<br>
						<div align="center">
						<form id="form1" name="form1" method="post" action="amp_report_month.php" target="new">
						<table width="40%" border="0" cellspacing="0" cellpadding="7">
						  <tr>
							<td><div align="right"><font size="3" color="#0000cc">เดือน : &nbsp;</font></div></td>
							<td>	

										<select name="mmonth" id="mmonth" style="font: 12pt tahoma; color: #ff0000;background: #eff48a; border: 1px black solid" align="center" />
												<option value="00">เลือกเดือน</option>
												<option value="01">มกราคม</option>
												<option value="02">กุมภาพันธ์</option>
												<option value="03">มีนาคม</option>
												<option value="04">เมษายน</option>
												<option value="05">พฤษภาคม</option>
												<option value="06">มิถุนายน</option>
												<option value="07">กรกฎาคม</option>
												<option value="08">สิงหาคม</option>
												<option value="09">กันยายน</option>
												<option value="10">ตุลาคม</option>
												<option value="11">พฤศจิกายน</option>
												<option value="12">ธันวาคม</option>
										</select>
										<?php
												$datenow1 = date("Y")-1;
												$datenow2 = date("Y");
												$datenow3 = date("Y")+1;
												$datenowthai1 = date("Y")+542;
												$datenowthai2 = date("Y")+543;
												$datenowthai3 = date("Y")+544;
										?>										
										<select name="yyear" id="yyear" style="font: 12pt tahoma; color: #ff0000;background: #eff48a; border: 1px black solid" align="center" />
												<option value="00">เลือกปี</option>
												<option value="<?=$datenow1?>"><?=$datenowthai1?></option>
												<option value="<?=$datenow2?>"><?=$datenowthai2?></option>
												<option value="<?=$datenow3?>"><?=$datenowthai3?></option>
										</select>
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
