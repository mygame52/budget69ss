<?php session_start();
	include("config.inc.php");
	if (trim($hid1) <> "03") {
		   echo "	<SCRIPT language='JavaScript'>";
		   echo "			alert('ท่านเข้าสู่ระบบไม่ถูกต้อง')";
		   echo "			location.href='index.php'";
		   echo "	</SCRIPT>";
	   exit();
	}
$chk_idt = isset($_REQUEST['sele_berg']);

//-- start ตรวจสอบ การทำรายการ หากไม่มี ให้กลับไปป้อน ID ใหม่
if($chk_idt=="") { echo "<meta http-equiv=\"refresh\" content=\"0;URL=status-yuem.php\" />";}
//-- end ตรวจสอบ การทำรายการ หากไม่มี ให้กลับไปป้อน ID ใหม่

$timeformat="d/m/y - H:i";
$THdt= mktime(gmdate("H")+7,gmdate("i")+4,gmdate("s"),gmdate("m")  ,gmdate("d"),gmdate("Y"));
$datepay2= date($timeformat,$THdt);
$i3d;
$idd;
$amp;
$c_khong;
$item21;
$bath;
$status;
$cname_new="";
//echo "---------------- ".$chk_idt;
mysql_select_db($dbname, $objConnect);
$query_Recordset1 = "SELECT * FROM item ";
$Recordset1 = mysql_query($query_Recordset1, $objConnect) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
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
<div id="rnut-page-background-glare-wrapper">
    <div id="rnut-page-background-glare"></div>
</div>
<div id="rnut-main">
    <div class="cleared reset-box"></div>
    <div class="rnut-box rnut-sheet">
        <div class="rnut-box-body rnut-sheet-body">
            <div class="rnut-header">
                <div class="rnut-headerobject"></div>
                        <div class="rnut-logo">
                             <h1 class="rnut-logo-name"><a href="./index.html">e-Budget58</a></h1>
                             <h2 class="rnut-logo-text"><?php echo $mess_header1?></h2>
                             <h2 class="rnut-logo-text"><?php echo $mess_header2?></h2>
			   </div>
            </div>
            <div class="cleared reset-box"></div>
<div class="rnut-bar rnut-nav">
<div class="rnut-nav-outer">
	<ul class="rnut-hmenu">
		<li>
			<a href="menu_pro.php" class="active">Back</a>
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
						<div class="rnut-post-inner rnut-article" >
						<h2 class="rnut-postheader" style="text-align: center;">เปลี่ยนประเภทการตั้งเบิกเรียบร้อยแล้ว</h2><br>
                        <!-- <div class="rnut-postcontent">
							<p style="text-align: center;">test1</p>
							<p style="text-align: center;">test2</p>
		                </div> -->

<!-- start การแก้ไขข้อมูล -->

						 <table width="50%" border="0" cellspacing="0" cellpadding="3" align="center">
						<!-- แถวเลือกสถานะ -->
							<td width="35%"><div align="center">&nbsp;<br><font size="3" color="#ff0000">สถานะปัจจุบัน</font></div></td>
							<td width="35%"><div align="center">&nbsp;<br><font size="3" color="#3300ff">

							<?php
								$chk_idt = $_REQUEST['sele_berg'];
								if($chk_idt==0)
								{
									if (substr($item21,0,24)=="เงินยืม :-")
									{
										$cname_new=substr($item21,24);
									}else {
										$cname_new=$item21;			
									}
								} else {
									if (substr($item21,0,24)=="เงินยืม :-")
									{
										$cname_new=$item21;			
									}else {
										$cname_new="เงินยืม :-".$item21;
									}
								}
								echo $cname_new;
								echo "<br>";
								$sql_up_ = "UPDATE item SET `item` ='$cname_new', `chk_id` = '$chk_idt' where `id_item` = '$idd'";								
								$dbquery = mysql_db_query($dbname, $sql_up_);
							?>

							</font></div><br>
							</td>
							<tr><td colspan="2">
							<div class="rnut-bar rnut-nav">
							<div class="rnut-nav-outer" style="text-alien:center;">
								<ul class="rnut-hmenu">
									<li>
										<a href="status-yuem.php" class="active">ตกลง</a>
									</li>	
								</ul>
							</div>
							</div>
						  </td>
						  </tr>
						</table>
<!-- end การแก้ไขข้อมูล -->
										<?php include("./include/footer.inc");?>
                                    </body>
                                    </html>