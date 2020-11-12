<?php	session_start();
	include("config.inc.php");
?>

<!-- start การแก้ไขข้อมูล -->

			<?php
			// ------------- ล้างเงินยืม ---------------------

			$datetime = date($timeformat,$THdt);
			$item_ = $_REQUEST['item_'];
			$doc_ = $_REQUEST['doc_'];
			$aa2 = $_REQUEST['aa2'];
			$id_item_update = $_REQUEST['id_item_update'];
			if(!isset($bath_)){$bath_ = 0; } 
			if(!isset($bath_t)){$bath_t = 0; } 
			if(!isset($check_yuem)){$check_yuem = 0; } 
			if(!isset($bath_use)){$bath_use = 0; } 
//			echo "--------เงินที่ใช้ไป -------".$aa2;   //เงินที่ใช้ไป

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


			$y_money =  (isset($_REQUEST['$yuem_noney'])) ;

//			echo "------ y_money -------".$bath;  // เงินยืม

			if ($item_==""){
							echo "<h3> ERROR : กรุณากรอกข้อมูลให้ครบ</h3>";  
							exit();
							}
							if (empty($sele_amp)){
								echo " อินเตอร์เน็ตช้า ข้อมูลรายการนี้อาจบันทึกไม่ได้โปรดตรวจสอบ รายการนี้อีกครั้ง";
								exit();
							}
				{
//					 echo "<br>----------ล้างเงินยืม----------",$bath_use;
					// ให้เปลี่ยน chk_id เป็น 2 เพื่อบอกให้รู้ว่า เกี่ยวข้องกับการล้างเงินยืม	

					$sqladd="INSERT INTO `item` ( `id_item` , `amp_item` , `c_khong` , `item` , `doc` , `date_time` , `bath` , `staus` , `user`, `egp11`, `egp12`, `egp21`, `egp22`, `egp31`, `egp32`, `egp41`, `egp42`, `egp51`, `egp52`, `egp61`, `egp62`,`chk_id`,`id_yuem` )VALUES ('',  '$sele_amp','$sel3', '$item_', '$doc_', '$datetime', '$aa2','0', '$sele_amp', '$egp11', '$egp12', '$egp21', '$egp22', '$egp31', '$egp32', '$egp41', '$egp42', '$egp51', '$egp52', '$egp61', '$egp62', '0', '$id_yuem')";
				$money_add = 0;
				$money_add = $bath - $aa2;
				$sqlupdate2 = "UPDATE  judsun SET rua = rua-'$money_add'  WHERE code = '$sel3'" ;

				$sqlupdate3 = "UPDATE  item SET chk_id = '2' WHERE id_item = '$id_item_update'" ;

//				$sqlupdate4 = "UPDATE  person_yuem SET chk_status = '0' WHERE id_yuem = '$id_yuem_update'" ;

				}

//			echo "-----------------------".$id_yuem;

			// เพิ่มรายการ ใน item
						$resultadd = mysql_query($sqladd);
							if (!$resultadd) {
								echo ("เอ็กซิคิวต์คำสั่ง SQL ไม่ได้" . mysql_error() );
								exit();
							} 
			// Update เงินคงเหลือทั้งหมด
						$resul_up = mysql_query($sqlupdate2);
							if (!$resul_up) {
								echo ("เอ็กซิคิวต์คำสั่ง SQL ไม่ได้" . mysql_error() );
								exit("");
							}

				$sql_personyuem = "UPDATE  person_yuem SET chk_status = 0  WHERE id_yuem = '$id_yuem' and amp = $sele_amp" ;
			// Update รายชื่อผู้ยืมเงิน
						$result_yuem = mysql_query($sql_personyuem);
							if (!$result_yuem) {
								echo ("เอ็กซิคิวต์คำสั่ง SQL ไม่ได้" . mysql_error() );
								exit("");
							}

			// Update chk_id โดยแก้ที่  ID เดิมของเงินยืม ให้ chk_id เป็น 2 เพื่อให้รู้ว่าเงินยืมนั้น ล้างแล้ว
			// chk_id = 0  = เบิก
			// chk_id = 1  = ยืม
			// chk_id = 2  = ล้าง


						$resul_up2 = mysql_query($sqlupdate3);
							if (!$resul_up2) {
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
					echo "<div align='center'>";
					echo "<table width='75%' border='0' align='center' cellpadding='1' cellspacing='1'>";
					echo"<TR>";
					echo"<TD bgcolor='#FFCC99'>
						<FORM METHOD=POST ACTION='menu_amp.php'>";
					echo"<INPUT TYPE='hidden'  name= 'hid1' value= '25'>";
					echo"<BR>";
					echo"<font size='3' color='006633'><CENTER>รหัสการ บันทึกข้อมูลการเบิกจ่าย งบประมาณ          : </font><font size='4' color='ff0000'> $max   </CENTER><BR></font>";
					echo"<CENTER><input type='submit' name='Submit' value=' บันทึกข้อมูลรายการต่อไป ' /></CENTER>";
					echo"</FORM></TD>";
					echo"</TR>";
					echo"</TABLE>";
					echo "</div>";
								
			?>
<!-- end การแก้ไขข้อมูล -->

<?php include("./include/footer.inc");?>
                                    </body>
                                    </html>
