<?php	session_start();
	@ini_set("display_errors", "0"); //ใส่บรรทัดแรก
	include("config.inc.php");
	if($act  != "ok") {
		echo "ต้องเข้าสู่ระบบปกติ";
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
<body onload='document.form1.doc_.focus()'>
<?php include 'include/header.inc.php';?>
            <div class="cleared reset-box"></div>
<div class="rnut-bar rnut-nav">
<div class="rnut-nav-outer">
	<ul class="rnut-hmenu">
		<li>
			<a href="./prov_del_list.php" class="active">Back</a>
		</li>	
		<li><font size="3" color="#ffcccc">
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
						<h2 class="rnut-postheader" style="text-align: center;">ลบรายการ</h2>

<!-- start การแก้ไขข้อมูล -->
			<?php
			$ok_ = $_REQUEST['ok_'];
			$id_item = $_REQUEST['i_del'];
			if ($ok_ != 'Y') {
				echo "<CENTER>ยกเลิก การลบข้อมูล</CENTER><BR><BR>";
				echo"<CENTER><a href=menu_amp.php> << Back.</a></CENTER>";
				exit();
			}
			mysql_connect($dbserver, $dbuser,$dbpass) or
							die("<hr><b> ติดต่อ server ไม่ได้>");				
			mysql_select_db($dbname) or  die("ติดฐานข้อมูลไม่ได้");

			$sql = ("select * from  item where id_item= '$id_item'");
			$result4 = mysql_query($sql);
			$num_rows = mysql_num_rows($result4); //จำนวน  record  ที่พบ

			if ($num_rows = 1) {
				$fetch_rec = mysql_fetch_array($result4);
				$kong = $fetch_rec['c_khong'];//ตัวแปร kong(รหัสงานจาก item)
				$ngn = $fetch_rec['bath'];    // เก็บค่าเงินของรายการที่ลบ
				$id_yuem_old =  $fetch_rec['item']; // id เงินยืม
				$id_yuemm = $fetch_rec['id_yuem']; // id ผู้ยืมเงิน ในกรณีเงินยืม
				list($id_yueam_,$id_itemy) = explode("-", $id_yuem_old);
				
				$mess_yueam = substr("ล้างเงินยืม",0,34);
				$status_yueam = substr($id_yueam_,0,33);

					if ($status_yueam==$mess_yueam){  // หากเป็นการลบ การล้างเงินยืม
							// เริ่มการค้นหาข้อมูลจำนวนเงินเดิมที่เคยยืมไว้
								$sqla = ("select * from  item where id_item = '$id_itemy'");
								$resulta = mysql_query($sqla);
								$num_rowsa = mysql_num_rows($resulta); //จำนวน  record  ที่พบ
								if ($num_rowsa = 1) 
								{
									$fetch_reca = mysql_fetch_array($resulta);
									$bath_yuem2 = $fetch_reca['bath'];
									$id_yuem_old3 = $fetch_reca['id_yuem'];
								}
						// สิ้นสุดการค้นหาข้อมูลจำนวนเงินเดิมที่เคยยืมไว้ 

							/*
											echo "เงินยืมเดิม  =  ".$bath_yuem2."<br>";
											echo "จำนวนเงินใช้้ไป ปัจจุบัน  =  ".$rua_old."<br>";
											echo "จำนวนเงินยกเลิก  =  ".$ngn."<br>";
											echo "จำนวนเงินใช้้ไป  จริง ๆ  =  ".$rua_new;
							*/

								// clear รายการยืมเงินในตารางบุคลากร ให้เป็นไม่ว่าง ไม่สามารถยืมต่อได้ 
								$sql_updatey2 = ("UPDATE person_yuem SET chk_status = '1' WHERE  id_yuem='$id_yuem_old3'");
								$result = mysql_query($sql_updatey2);

								// clear ค่า status การล้างเงินยืม ใน ตาราง item จาก 2 เป็น 1 
								$sql_update = ("UPDATE item SET chk_id  = '1' WHERE  id_item='$id_itemy'");
								$result = mysql_query($sql_update);

								//echo $kong;
								//echo " เงินที่ต้องการลบ  $ngn";
								//เอารหัสงาน มาค้นหา เรคคอร์ด  ในแฟ้มจัดสรร (judsun)
								$sql_jud = ("select * from judsun where code= '$kong'");
								$result_jud = mysql_query($sql_jud);
								$rows_jud = mysql_num_rows($result_jud); //จำนวน  record  ที่พบ

								if ($rows_jud = 1) {
									$fetch_rec = mysql_fetch_array($result_jud);
									$rua_old = $fetch_rec['rua'];
									$rua_new = $rua_old+($bath_yuem2 - $ngn);
								}

								$sql_update = ("UPDATE judsun SET rua  = '$rua_new' WHERE  code = '$kong'");
 								$result = mysql_query($sql_update);
								//echo " แก้ไขจำนวนเงินคงเหลือแล้ว  $rua_old";

								$sql_del = ("delete from  item where id_item= '$id_item'");
 								$result = mysql_query($sql_del);


					} // end หากเป็นเงินล้าง
					else { // หากไม่ใช่เงินล้าง

				
								$sql_jud = ("select * from judsun where code= '$kong'");
								$result_jud = mysql_query($sql_jud);
								$rows_jud = mysql_num_rows($result_jud); //จำนวน  record  ที่พบ

								if ($rows_jud = 1) {
									$fetch_rec = mysql_fetch_array($result_jud);
									$rua_old = $fetch_rec['rua'];
									$rua_new = $rua_old+($bath_yuem2 - $ngn);
								}


								$sql_updatey2 = ("UPDATE person_yuem SET chk_status = '0' WHERE  id_yuem='$id_yuemm'");
								$result = mysql_query($sql_updatey2);
								
								$rua_new = $rua_old-$ngn;
								$sql_update = ("UPDATE judsun SET rua  = '$rua_new' WHERE  code = '$kong'");
								$result = mysql_query($sql_update);
								//echo " แก้ไขจำนวนเงินคงเหลือแล้ว  $rua_old";
								$sql_del = ("delete from  item where id_item= '$id_item'");
								$result = mysql_query($sql_del);

					}// end หากไม่ใช่เงินล้าง
			}

			echo "<div align='center'><BR><font size='3' color='#990033'>.ลบข้อมูล หมายเลข ID: $id_item  แล้ว </font></div><br>";

			echo "<meta http-equiv=\"refresh\" content=\"2;URL=prov_del_list.php\" />";
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
