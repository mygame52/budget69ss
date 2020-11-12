<?php	session_start();
	@ini_set("display_errors", "0"); //ใส่บรรทัดแรก
	include("config.inc.php");
	$datetime= date($timeformat,$THdt);
	$item_ = $_REQUEST['item_'];
	$doc_ = $_REQUEST['doc_'];
	if(!isset($bath_)){$bath_ = 0; } 
	if(!isset($bath_t)){$bath_t = 0; } 
	if(!isset($check_yuem)){$check_yuem = 0; } 
	if(!isset($bath_use)){$bath_use = 0; } 

	if(!isset($bath_berg)){$bath_berg = $bath_berg; } 

	$egp11 = $_REQUEST['egp11'];
	$egp12 = $_REQUEST['egp12'];
	$egp21 = $_REQUEST['egp21'];
	$egp22 = $_REQUEST['egp22'];
	$egp31 = $_REQUEST['egp31'];
	$egp32 = $_REQUEST['egp32'];
	$egp41 = $_REQUEST['egp41'];
	$egp42 = $_REQUEST['egp42'];
	$egp51 = $_REQUEST['egp51'];
	$egp52 = $_REQUEST['egp52'];
	$egp61 = $_REQUEST['egp61'];
	$egp62 = $_REQUEST['egp62'];
	$id_personyuem = $_REQUEST['id_personyuem'];


	$y_money =  (isset($_REQUEST['$yuem_noney'])) ;


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
<?php include 'include/header.inc.php';?>
            <div class="cleared reset-box"></div>
<div class="rnut-bar rnut-nav">
<div class="rnut-nav-outer">
	<ul class="rnut-hmenu">
		<li>
                    <a href="./prov_cutoff.php" class="active">Back</a>
		</li>	
		<li><font size="3" color="ffcccc">
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
						<h2 class="rnut-postheader" style="text-align: center;">บันทึกการใช้งบประมาณ</h2>

<!-- start การแก้ไขข้อมูล -->
		<?php
				if ($item_==""){
					echo "<h3> ERROR : กรุณากรอกข้อมูลให้ครบ</h3>";  
					exit();
				}
				if (empty($sele_amp)){
					echo " อินเตอร์เน็ตช้า ข้อมูลรายการนี้อาจบันทึกไม่ได้โปรดตรวจสอบ รายการนี้อีกครั้ง";
					exit();
				}

				if($yuem_money == "1")
				{	
					
					//echo "---------------------------------------- ยืมเงิน ------------";
					$item_ = "เงินยืม :-".$item_;
					$sqladd="INSERT INTO `item` ( `id_item` , `amp_item` , `c_khong` , `item` , `doc` , `date_time` , `bath` , `staus` ,`user`,`chk_id`,`id_yuem` )VALUES ('',  '$sele_amp','$sel3', '$item_', '$doc_', '$datetime', '$bath_berg','0', '$sele_amp', '1','$id_personyuem')";

					$sqlupdate2 = "UPDATE  judsun SET rua = rua+'$bath_berg'  WHERE code = '$sel3'" ;

					// -------------- Mark รายชื่อผู้ยืมเงิน
					$sql_personyuem = "UPDATE  person_yuem SET chk_status = 1  WHERE id_yuem = '$id_personyuem' and amp = $sele_amp" ;

							$resul_yuem = mysql_query($sql_personyuem);
								if (!$resul_yuem) {
									echo ("เอ็กซิคิวต์คำสั่ง SQL ไม่ได้" . mysql_error() );
									exit("");
								}

					// -------------- end Mark รายชื่อผู้ยืมเงิน
				}
				else
				{
					If ($check_yuem == "1")
					{
						 //echo "----------ล้างเงินยืม----------",$bath_use;
						$sqladd="INSERT INTO `item` ( `id_item` , `amp_item` , `c_khong` , `item` , `doc` , `date_time` , `bath` , `staus` , `user`, `egp11`, `egp12`, `egp21`, `egp22`, `egp31`, `egp32`, `egp41`, `egp42`, `egp51`, `egp52`, `egp61`, `egp62`,`chk_id`)VALUES ('',  '$sele_amp','$sel3', '$item_', '$doc_', '$datetime', '$bath_use','0', '$sele_amp', '$egp11', '$egp12', '$egp21', '$egp22', '$egp31', '$egp32', '$egp41', '$egp42', '$egp51', '$egp52', '$egp61', '$egp62', '2')";

						$sqlupdate2 = "UPDATE  judsun SET rua = rua+'$bath_t'  WHERE code = '$sel3'" ;
						// ให้เปลี่ยน chk_id เป็น 2 เพื่อบอกให้รู้ว่า เกี่ยวข้องกับการล้างเงินยืม

						// -------------- Mark รายชื่อผู้ยืมเงิน
							$sql_personyuem = "UPDATE  person_yuem SET chk_status = 0  WHERE id_yuem = '$id_personyuem' and amp = $sele_amp" ;

							$resul_yuem = mysql_query($sql_personyuem);
								if (!$resul_yuem) {
									echo ("เอ็กซิคิวต์คำสั่ง SQL ไม่ได้" . mysql_error() );
									exit("");
								}
						// -------------- end Mark รายชื่อผู้ยืมเงิน
					}
					else
					{
						// echo "---------------------------------------- อื่น ๆ  ------------";
						$sqladd="INSERT INTO `item` ( `id_item`, `amp_item`, `c_khong`, `item`, `doc`, `date_time`, `bath`, `staus`, `user`, `egp11`, `egp12`, `egp21`, `egp22`, `egp31`, `egp32`, `egp41`, `egp42`, `egp51`, `egp52`, `egp61`, `egp62`, `chk_id` ) VALUES ( '', '$sele_amp', '$sel3', '$item_', '$doc_', '$datetime', '$bath_berg', '0', '$sele_amp', '$egp11', '$egp12', '$egp21', '$egp22', '$egp31', '$egp32', '$egp41', '$egp42', '$egp51', '$egp52', '$egp61', '$egp62', '0')";

						$sqlupdate = "UPDATE  item  SET chk_id='2' WHERE id_item = '$id_item_update'" ;
						$resul_up = mysql_query($sqlupdate);
						// sql สำหรับ กำหนด เงินคงเหลือ ใน กรณี ที่ตั้งเบิกปกติ และเงินยืม  แต่ไม่ได้ล้างเงินยืม
						$sqlupdate2 = "UPDATE  judsun SET rua = rua+'$bath_berg'  WHERE code = '$sel3'" ;

						if($id_yuem=''){
						}
						else
						{
							// -------------- Mark รายชื่อผู้ยืมเงิน
							$sql_personyuem = "UPDATE  person_yuem SET chk_status = 0  WHERE id_yuem = '$id_yuem' and amp = $sele_amp" ;

								$resul_yuem = mysql_query($sql_personyuem);
									if (!$resul_yuem) {
										echo ("เอ็กซิคิวต์คำสั่ง SQL ไม่ได้" . mysql_error() );
										exit("");
									}

							// -------------- end Mark รายชื่อผู้ยืมเงิน
						}

						// สิ้นสุดการแก้ไข
						}
					}

					//  สิ้นสุดการบันทึก
											$resultadd = mysql_query($sqladd);
												if (!$resultadd) {
													echo ("เอ็กซิคิวต์คำสั่ง SQL ไม่ได้" . mysql_error() );
													exit();
												} 

											$resul_up = mysql_query($sqlupdate2);
												if (!$resul_up) {
													echo ("เอ็กซิคิวต์คำสั่ง SQL ไม่ได้" . mysql_error() );
													exit("");
												}  								
													//เข้าไปหาค่าสูงสุดที่ได้ซึ่งเป็นรหัส ID_Item
													mysql_connect($dbserver, $dbuser,$dbpass) or
														die("<hr><b> เชื่อมต่อฐานข้อมูลไม่ได้>");
													mysql_select_db($dbname) or die("เลือกฐานข้อมูลไม่ได้");
										$sql = ("select  max(id_item) from item ");
										$result = mysql_query($sql);
										$row=mysql_fetch_row($result);
										$max=$row[0];
										$num_rows = mysql_num_rows($result); //จำนวนที่เลือกได้
										echo "<table width='70%' border='0' align='center' cellpadding='1' cellspacing='1'>";
										echo"<TR>";
											echo"<TD bgcolor='#FFCC99'><FORM METHOD=POST ACTION='sob1.php'>";
											echo"<INPUT TYPE='hidden'  name= 'hid1' value= '25'>";
											echo"<BR>";
											echo"<CENTER>รหัสการ บันทึกข้อมูลการเบิกจ่าย งบประมาณ          :    $max   </CENTER><BR>";
											echo"<CENTER><input type='submit' name='Submit' value=' บันทึกข้อมูลรายการต่อไป ' /></CENTER>";
											echo"</FORM></TD>";
										echo"</TR>";
										echo"</TABLE>";
						?>

<!-- end การแก้ไขข้อมูล -->
<?php include("./include/footer.inc");?>
                                    </body>
                                    </html>

<script language="javascript">

	function isNumeric(elem, helperMsg)  //ตรวจสอบการป้อนตัวเลข
	 {  
		 var numericExpression = /^[0-9.]+$/; // ตัวเลขและทศนิยม
         if(elem.value.match(numericExpression)){  
                 return true;  
         }else{  
//                 alert(helperMsg);  
                 elem.value=elem.value.substr(0,elem.value.length-1);  
                 elem.focus();  
                 return false;  
        }  
	 } 


</script>
