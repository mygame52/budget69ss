<?php session_start(); 
  include("config.inc.php");
	if (trim($hid1) <> "03") {
		echo "	<SCRIPT language='JavaScript'>";
		echo "			alert('ท่านเข้าสู่ระบบไม่ถูกต้อง')";
		echo"			location.href='index.php'";
		echo"	</SCRIPT>";
	   exit();
	}

$idd = $_REQUEST['idd'];
	if($idd=="")
		{ echo "<meta http-equiv=\"refresh\" content=\"0;URL=status-yuem.php\" />";}

$i3d=trim($idd);
$sql = ("select * from item where id_item = '$i3d' ");
$result = mysql_query($sql);
$row_reg=mysql_fetch_assoc($result);
$num_rows = mysql_num_rows($result); //จำนวนที่เลือกได้

if ($num_rows >= 1){
$idd= $row_reg['id_item'];
$i3d=$idd;
$amp=$row_reg['amp_item'];
$doc=$row_reg['doc'];
$c_khong=$row_reg['c_khong'];
$item=$row_reg['item'];
$bath=$row_reg['bath'];
$staus=$row_reg['staus'];
$datepay2=$row_reg['date_pay'];
$egp11=$row_reg['egp11'];
$egp12=$row_reg['egp12'];
$egp21=$row_reg['egp21'];
$egp22=$row_reg['egp22'];
$egp31=$row_reg['egp31'];
$egp32=$row_reg['egp32'];
$egp41=$row_reg['egp41'];
$egp42=$row_reg['egp42'];
$egp51=$row_reg['egp51'];
$egp52=$row_reg['egp52'];
$egp61=$row_reg['egp61'];
$egp62=$row_reg['egp62'];
$chk_idt=$row_reg['chk_id'];
$sele_berg=0;

session_register("c_khong" );
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
			<a href="status-yuem.php" class="active">Back</a>
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
						<h2 class="rnut-postheader" style="text-align: center;">เปลี่ยนประเภทการตั้งเบิก</h2><br>
                        <!-- <div class="rnut-postcontent">
							<p style="text-align: center;">test1</p>
							<p style="text-align: center;">test2</p>
		                </div> -->
<!-- start การแก้ไขข้อมูล -->
						 <table width="70%" border="0" cellspacing="0" cellpadding="10" align="center">
						  <tr bgcolor="#F9F9EE">
							<td width="40%"><div align="right">&nbsp;<font size="3" color="#ff0000">รหัส ID</font>&nbsp;&nbsp;</div></td>
							<td width="60%">&nbsp;<font size="3" color="#0033cc"><?php echo $idd;?></font></td>
						  </tr>
						  <tr>
							<td width="40%"><div align="right">&nbsp;<font size="3" color="#ff0000">สถานศึกษา</font>&nbsp;&nbsp;</div></td>
							<td width="60%">&nbsp;<font size="3" color="#0033cc"><?php echo $amp;
									include("amp.inc.php");
								?></font>
							</td>
						  </tr>
						  <tr bgcolor="#F9F9EE">
							<td><div align="right">&nbsp;<font size="3" color="#ff0000">ที่เอกสาร</font>&nbsp;&nbsp; </div></td>
							<td>&nbsp;<font size="3" color="#0033cc"><?php echo $doc;?></font></td>
						  </tr>
							  <tr>
							<td><div align="right">&nbsp;<font size="3" color="#ff0000">รหัสงาน/โครงการ</font>&nbsp;&nbsp;</div></td>
							<td>&nbsp;<font size="3" color="#0033cc">php echo $c_khong;
								include("work.inc.php");
								?></font></td>
						  </tr>
						  <tr bgcolor="#F9F9EE">
							<td><div align="right">&nbsp;<font size="3" color="#ff0000">รายการจ่าย</font>&nbsp;&nbsp;</div></td>
							<td>&nbsp;<font size="3" color="#0033cc">
							<?php $item21=$item;
								echo $item21;					    
							?></font></td>
						  </tr>
						  <tr>
							<td><div align="right">&nbsp;<font size="3" color="#ff0000">จำนวนเงิน</font>&nbsp;&nbsp;</div></td>
							<td>&nbsp;<font size="3" color="#0033cc"><?php echo number_format($row_reg['bath'],2);?></font></td>
						  </tr>
							<?php  $mess_yuem="";
									if($chk_idt == 0){
									$mess_yuem = " ตั้งเบิก / ปกติ";
									}elseif($chk_idt == 1){
									$mess_yuem = "เงินยืม / ยืมเงิน";
									}elseif($chk_idt == 2){
									$mess_yuem = "เงินล้าง / ล้างเงินยืมแล้ว";}?>				  
						  <tr>
							<td><div align="right">&nbsp;<font size="3" color="#3300ff">ประเภท</font>&nbsp;&nbsp;</div></td>
							<td>&nbsp;<FONT COLOR="#CC0000" size="3">
							<?php echo $mess_yuem;
									
									if($chk_idt == 2){
									echo "<br><br><br>"."<FONT COLOR='#FF0000'>รายการนี้ได้ เสร็จสมบูรณ์แล้ว ไม่สามารถทำรายการต่อได้</FONT><br>";
									exit;
									}					
							
							?>							
							</FONT></td>
						  </tr>

						<tr bgcolor="#F9F9EE"><!-- แถวเลือกสถานะ -->
					<td><br><br><div align="center">&nbsp;<font size="3" color="#009900">สถานะปัจจุบัน </font></div>
					<?php  if($row_reg['staus'] == 0){
							$sta_ = " สถานศึกษา ขอเบิก";
							}elseif($staus == 1){
							$sta_ = "ตรวจสอบหลักฐานแล้ว";
							}elseif($staus == 2){
							$sta_ = "ตัดยอดงบประมาณแล้ว";
							}elseif($staus == 3){
							$sta_ = "ทำระบบ PO แล้ว";
							}elseif($staus == 4){
							$sta_ = "เบิกจ่ายแล้ว";
							}elseif($staus == 5){
							$sta_ = "เอกสารผิดพลาด";
							}
							echo "<div align='center'>&nbsp;<FONT SIZE='3' COLOR='#ff0066'>$sta_</FONT></div>";
							echo "<br><div align='center'>&nbsp;<FONT SIZE='' COLOR='#FF3300'>เมื่อวันที่ : $datepay2</FONT></div>";
					?>
							</td>
							<td  bgcolor="#ccff99"><br>
							<form name="form1" method="post" action="status-yuem2.php">
								<font size="3" color="#c524db">เลือกประเภท<BR></font><font size="3" color="#330000">
								<input type="radio" name="sele_berg" value="0">ตั้งเบิก / ปกติ<BR>
								<input type="radio" name="sele_berg" value="1">เงินยืม / ยืมเงิน<BR></font> 
								
								 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<INPUT TYPE="hidden" name="idd" value=<?php echo $idd?>>
								<INPUT TYPE="hidden" name="item21" value=<?php echo $item21?>>
								
								<?php 
									session_register("item21" );
									session_register("sele_berg");
								?>
								<br>	</td>
							   </tr>
							   <TR><TD></TD>
								<TD>
								<!-- <INPUT TYPE="hidden" name="sele_berg" value="<?php echo $sele_berg?>"> -->
								<input type="submit" name="Submit" value="ตกลงเปลี่ยนประเภทการตั้งเบิก">				
								<br></TD>
								</TR>	
								</form>
							<?php
									 // mysql_free_result($Recordset1);
							   } else{
									//header("Location:status-yuem.php");
								echo "<meta http-equiv=\"refresh\" content=\"0;URL=status-yuem.php\" />";
							   ?>
							  <BR><BR> <table  width="60%" align="center">
						   <tr>
							<!-- <td width="50%"><div align="right">&nbsp;ไม่พบข้อมูลครับ</div></td>
							<td width="50%">&nbsp; <A HREF="status-yuem.php">กลับ</A></td>
 -->						  </tr>
						  </table>
							<?php   }    ?>
						</table>
						<?php 	if ($num_rows < 1){ 
							exit(); } ?>

<!-- end การแก้ไขข้อมูล -->
										<?php include("./include/footer.inc");?>
                                    </body>
                                    </html>