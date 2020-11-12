<?php session_start();
@ini_set("display_errors", "0"); //ใส่บรรทัดแรก
	include("config.inc.php");
	include("code2name_amp.php");
	include("code2name_work.php");
// start หากไม่ได้เข้าใช้งานจากเมนู
	if (trim($hid1) <> "03") {
  	   echo "<meta http-equiv=\"refresh\" content=\"0;URL=menu_pro.php\" />";
	}
// end หากไม่ได้เข้าใช้งานจากเมน
	$i_del = $_REQUEST['i_del'];
	$am_del = $_REQUEST['am_del'];
	$i_tem = $_REQUEST['i_tem'];
	$bath = $_REQUEST['bath'];
	$id_yuem_del2 = $_REQUEST['id_yuem_del'];
	$bath_delp = $bath;
//	session_register("bath_delp");
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
<body onload='document.form1.hadpol.focus()'>
<?php include 'include/header.inc.php'; ?>
            <div class="cleared reset-box"></div>
<div class="rnut-bar rnut-nav">
<div class="rnut-nav-outer">
	<ul class="rnut-hmenu">
		<li>
			<a href="prov_update.php" class="active">Back</a>
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

<!-- start การแก้ไขข้อมูล -->

						<table width="100%" border="0" align="center" cellpadding="7" cellspacing="1">
						<tr><td width="30%"><div align="right"><font size="14" color="3333ff">ระวัง !!!</font></div></td><td colspan="1" ><FONT SIZE="3" COLOR="#CC0000">  คุณ <?=$user_?>
						<BR>คุณกำลังจะลบข้อมูล ID : <? echo $i_del;?><br>
						จากสถานศึกษา .<? echo $am_del;?><?=$xxx[$am_del]; ?> <BR>
						รายการ<?echo $i_tem;  ?><BR>
						จำนวนเงิน &nbsp;
						<? $bath_delp = $bath;
						   echo number_format($bath_delp,2); 
						?>&nbsp;บาท</FONT>
						</div></td></tr>
						</TABLE>
						<?php
						$i_del = $_REQUEST['i_del'];
						if(substr($i_tem,0,34)=="ล้างเงินยืม ") // ถ้าเป็นรายการล้างเงินยืม   กำหนดให้ lmoney=A
							{
								$lmoney="A";
								$id_yueam_ = explode("-", $i_tem);
								$id_yueam2 = $id_yueam_[1];
							// เริ่มการค้นหาข้อมูลจำนวนเงินเดิมที่เคยยืมไว้  และ ชื่อผู้ยืมเงิ น
								$sqla = ("select * from  item where id_item = '$id_yueam2'");
								$resulta = mysql_query($sqla);
								$num_rowsa = mysql_num_rows($resulta); //จำนวน  record  ที่พบ
								if ($num_rowsa = 1) 
								{
									$fetch_reca = mysql_fetch_array($resulta);
									$bath_yuem2 = $fetch_reca['bath'];						// เงินที่เคยยืมไว้ 
									$id_person_yuem = $fetch_reca['id_yuem']; 			// ID ของผู้ยืมเงิน
								}
							// สิ้นสุดการค้นหาข้อมูลจำนวนเงินเดิมที่เคยยืมไว้
									session_register("id_yueam2");
									session_register("bath_yuem2");
									session_register("id_person_yuem");
							}else  //  ถ้าไม่ใช่รายการล้างเงินยืมให้เป็นกำหนดให้ . lmoney=B
							{
								$lmoney="B";
								//session_register("id_yuem_del2");
							//		echo "--------------------------ลบการยืม------------------------".$id_yuem_del2;
							}
								session_register("lmoney");
							echo "<BR>";
							echo "<TABLE width=\"100%\" border=\"1\"align=\"center\"> <TR><TD>";

							echo"<CENTER> ";
							echo "<BR>";
								//echo $w_del;

							echo "<FORM name=form1 METHOD=POST ACTION=prov_update_del1.php?bath=$bath_delp>";
							echo "<font size='3' color='#0033ff'>ระบุสาเหตุที่จะลบ</font>&nbsp;&nbsp;
								<INPUT TYPE='text' NAME='hadpol' SIZE='70' style='font: 12pt tahoma; color: #ff0000;background: #C0F9BD; border: 1px black solid'><br><br>";
							echo "ยืนยันการลบ พิมพ์  Y &nbsp;&nbsp;&nbsp;";	
echo "<input type='text' name='ok_' value='N' SIZE='1' max='1' style='font: 12pt tahoma; color: #000099;background: #83de91; border: 1px black solid'>";



							echo "<INPUT TYPE='hidden' name='i_del' value='$i_del'>";
							echo "  &nbsp;&nbsp;  (ตัวใหญ่)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<INPUT TYPE='submit' value = 'ยืนยัน'>";
//							echo "<INPUT TYPE='hidden' name='id_up22' value='id_yueam2'>";
							echo"</FORM>";
							echo"</CENTER>";
							/////action="?Action=Save"
						?>

						 </TD>
						</TR>
						</TABLE>



<!-- end การแก้ไขข้อมูล -->
										<?php include("./include/footer.inc");?>
                                    </body>
                                    </html>