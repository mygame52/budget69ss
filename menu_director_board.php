<?php
	session_start(); 
	if ($hid <> 85) {
		echo "	<SCRIPT language='JavaScript'>";
		echo "			alert('ท่านเข้าสู่ระบบไม่ถูกต้อง')";
		echo"			location.href='login_director.php'";
		echo"	</SCRIPT>";
	   exit();
	}
	
	include("grap1.php");
    session_register("hid1");
	session_register("hid1");
?>

<?include("config.inc.php");?>
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
<?include("calculate_bar.php");?>
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
                             <h1 class="rnut-logo-name"><a href="./index.html"><?php echo $mess_budget?></a></h1>
                             <h2 class="rnut-logo-text"><?php echo $mess_header1?></h2>
                             <h2 class="rnut-logo-text"><?php echo $mess_header2?></h2>
                        </div>
                
            </div>

<div class="cleared reset-box"></div>
<div class="rnut-bar rnut-nav">
<div class="rnut-nav-outer">
	<ul class="rnut-hmenu">
		<li>
			<a href="#" class="active">สำหรับผู้บริหาร</a>
		</li>	

		<li>
<!--			  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
			<a href="./menu_director">Home</a>
		</li>	
		<li>
			<a href="#">รายงานข้อมูล</a>
			<ul>
				<li>
                    <a href="./report_director/prov_report_sum"><img src="image/icon/block.png" width="16" height="16" border="0" alt="">&nbsp;&nbsp;สรุปภาพรวมทั้งจังหวัด</a>
                </li>
				<li>
                    <a href="./report_director/prov_report_classification"><img src="image/icon/blog.png" width="16" height="16" border="0" alt="">&nbsp;&nbsp;จำแนกตามการจัดสรร</a>
                </li>
				<li>
                    <a href="./report_director/prov_report_item.php?hid1=13"><img src="image/icon/building.png" width="16" height="16" border="0" alt="">&nbsp;&nbsp;รายการตัดยอดงบประมาณ</a>
                </li>
				<li>
					<a href="#"><img src="image/icon/blog-blue.png" width="16" height="16" border="0" alt="">&nbsp;&nbsp;การเบิกจ่าย&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="image/25.gif" width="5" height="9" border="0" alt=""></a>
					<ul>
						<li>
							<a href="./report_director/prov_report_peramp12"><img src="image/serverstatus.png" width="16" height="16" border="0" alt="">&nbsp;&nbsp;เรียงจาก น้อย --> มาก</a>
						</li>
						<li>
							<a href="./report_director/prov_report_peramp21"><img src="image/serverstatus.png" width="16" height="16" border="0" alt="">&nbsp;&nbsp;เรียงจาก มาก --> น้อย</a>
						</li>
					</ul>
                </li>
				<li>
                    <a href="./report_director/prov_report_classification_amp"><img src="image/icon/database.png" width="16" height="16" border="0" alt="">&nbsp;&nbsp;จำแนกตามสถานศึกษา</a>
                </li>
				<li>
                    <a href="./report_director/prov_report_classification_work"><img src="image/icon/db-pencil.png" width="16" height="16" border="0" alt="">&nbsp;&nbsp;จำแนกตาม งาน / โครงการ</a>
                </li>
				<li>
                    <a href="./report_director/prov_report_classification_job"><img src="image/icon/download.png" width="16" height="16" border="0" alt="">&nbsp;&nbsp;ค้นหารายการเบิกจ่าย</a>
                </li>
			</ul>
		</li>	
		<li>
			<a href="./logout">Exit</a>
		</li>	
	</ul>
</div>
</div>

<div class="cleared reset-box"></div>
<div class="rnut-layout-wrapper">
                <div class="rnut-content-layout">
                    <div class="rnut-content-layout-row">
                        <div class="rnut-layout-cell rnut-sidebar1">
<div class="rnut-box rnut-vmenublock">
    <div class="rnut-box-body rnut-vmenublock-body">
                <div class="rnut-box rnut-vmenublockcontent">
                    <div class="rnut-box-body rnut-vmenublockcontent-body">
                <ul class="rnut-vmenu">
	<li>
		<a href="./home.html" class="active">สถานะ สกร.อำเภอ</a>
	</li>	
	<li>
		<a href="./new-page.html">ตรวจสอบ:ค้างเงินยืม</a>
	</li>	
	<li>
		<a href="./new-page-2.html">ตรวจสอบ:สิทธิการยืมเงิน</a>
	</li>
</ul>
                
                                		<div class="cleared"></div>
                    </div>
                </div>
		<div class="cleared"></div>
    </div>
</div>

                          <div class="cleared"></div>
                        </div>
                        <div class="rnut-layout-cell rnut-content">
<div class="rnut-box rnut-post">
    <div class="rnut-box-body rnut-post-body">
<div class="rnut-post-inner rnut-article">
<!-- start Block center -->
				<h2 class="rnut-postheader">กระดานสนทนา / BG-Board</h2>
                <div class="rnut-postcontent">

					<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
					  <tr>
						<td>
							<iframe width="100%" height="430" src="webboard/webboard-admin.php" border="1" frameBorder=1 >	</iframe>
						</td>
					  </tr>
					</table>
				</div>
<!-- end Block center -->
<?php include("./include/footer.inc");?>
                                    </body>
                                    </html>

