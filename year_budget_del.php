<?	session_start();
	include("config.inc.php");
	include("code2name_work.php");


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
			<a href="year_budget_edit_edu.php" class="active">Back</a>
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
						<h2 class="rnut-postheader" style="text-align:center;">ข้อมูลการจัดสรรงบประมาณ : 
						<?php //echo $w_name[$c_jud]; ?>
						</h2>
						<!-- <div class="rnut-postcontent">
							<p style="text-align: center;">test1</p>
							<p style="text-align: center;">test2</p>
		                </div> -->
<!-- start การแก้ไขข้อมูล -->

						<?	

							echo"<CENTER>";
							$c_jud = $_REQUEST['c_jud'];
								require("config.inc.php");
								include("code2name_work.php");
								mysql_connect($dbserver, $dbuser,$dbpass) or
											die("<hr><b> ติดต่อ server ไม่ได้>");				
							mysql_select_db($dbname) or  die("ติดฐานข้อมูลไม่ได้");
							$sql = ("select * from  item  where c_khong = '$c_jud'");
							$result = mysql_query($sql);
							$num_rows = mysql_num_rows($result); //จำนวน  record  ที่พบ
							if ($num_rows >= 1){
								echo "<BR><font size='3' color='#ff00ff'>งาน/โครงการนี้ มีการเบิกจ่ายแล้ว ".$num_rows." รายการ";
								echo "<BR><BR>ต้องกลับไปลบรายการจ่ายนี้ก่อน</font>";
								echo "<meta http-equiv=\"refresh\" content=\"3;URL=year_budget_edit_edu.php\" />";

								exit();
							}
							/////////////////////////////////////////////////
							?>
							<table width="60%" border="0" align="center" cellpadding="7" cellspacing="1">
							<TR>
								<td bgcolor="#FFFFCC"><p><FONT SIZE="4" COLOR="#330099"> <CENTER><B></B></CENTER>ลบ ข้อมูลการจัดสรร     </FONT></TD>
								<TD bgcolor="#FFFF99">
								<?php
										echo "<FORM METHOD=POST ACTION=''>";
											echo "  <INPUT TYPE='hidden'  name= 'hid1' value= '03'>";

										echo "</FORM>";
								?> 
								</TD>

							</TR>
							  <? $nw=substr($c_jud,2,6); ?>
							<tr bgcolor="#FFCC66"><td colspan="3">รหัส : <?echo  $c_jud ."   :    ". $w_name[$nw];  ?></td></tr>
							</TABLE>
							<?
								///////////////////////$w_name[substr($c_jud,2,6)]
						   
							   echo"<BR><BR>ควรลบ ในช่วงที่ขึ้นต้นปีงบประมาณใหม่ เท่านั้น ยืนยันการลบ กด 9";

								echo "<FORM name='form1' METHOD=POST ACTION=kjud_del.php>";
								echo "<INPUT TYPE='text' NAME='ok_' size = '1'>";
								echo "<INPUT TYPE='hidden' name='c_jud' value='$c_jud'>";
								echo "<INPUT TYPE='submit' value = 'ยืนยัน นะ'>";
								echo"</FORM>";
								echo"</CENTER>";

							?>
						
						?>


<!-- end การแก้ไขข้อมูล -->
										<?php include("./include/footer.inc");?>
                                    </body>
                                    </html>