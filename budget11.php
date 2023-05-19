<? session_start(); 
	include("top16.php");
	include("grap1.php");
?>
<html>
<head>
<title>โปรแกรมบริหารงบประมาณ</title>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
</head>
<body topmargin=0>
<?php

	if (trim($hid1) <>"03") {

   echo "<h3>เพื่อความปลอดภัย  : ควรเข้าสู่ระบบใหม่อีกครั้ง</h3>"; 
     echo $hid1;
   exit();
	}
?>
<table width="780" border="0" cellspacing="3" align="center" cellpadding="3">
  <tr>
    <th scope="col">
	<table width="100%" border="0" cellspacing="0" cellpadding="3">
      <tr>   <td >

<!-- แสดง Header Image -->
	<IMG SRC="image/head-admin.png" WIDTH="1026" HEIGHT="112" BORDER="0" ALT="">
<!-- สิ้นสุด Header Image -->
		  </td>
      </tr>
      <tr>
        <td>
			<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolordark="#FFFFFF"  bordercolorlight="#8297b1"  background="image/blue_litel.gif">
	        <tr>
            <td ><div align="center">
			<!-- บันทึกข้อมูล -->
			<script type="text/JavaScript">
				<!--
				function MM_jumpMenu(targ,selObj,restore){ //v3.0
				eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
				if (restore) selObj.selectedIndex=0;
				}
			//-->
			</script>

			<form name="form1" id="form1">
			<INPUT TYPE='hidden'  name= 'hid1' value= '03'>
        <select name="menu1" onChange="MM_jumpMenu('parent',this,1)">
          <option> <<<งานรายวัน>>> </option>
         <option value="statuss.php">...บันทึก สถานะการเบิกจ่าย</option>
<!--           <option value="tad1_n.php">...บันทึกข้อมูลการเบิกจ่าย</option>	-->
		  <option value="tadyodprovince.php">...บันทึกข้อมูลการเบิกจ่าย</option>
          <option value="#">------------------------------------------</option>
		  <option value="status-yuem.php">...เปลี่ยนประเภทการตั้งเบิก</option>
		  <option value="r_yuem_all.php">...ตรวจสอบเงินยืม (ค้างส่ง)</option>
          <option value="red1.php">...แก้ไข / ลบ / แสดงข้อคิดเห็น</option>
          <option value="../BackupData/">...BackUp/Restore</option>
<!-- 		  <option value="wysiwyg/main_input.php">...Edit Note</option>   -->	   
            <option value="re1.php">...ตรวจสอบข้อมูลที่ลบ</option> -->
                </select>
              </form>
			</div></td>
            
            <td><div align="center">
				<!-- รายงาน -->
			<script type="text/JavaScript">
			<!--
			function MM_jumpMenu(targ,selObj,restore){ //v3.0
			eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
			if (restore) selObj.selectedIndex=0;
			}
			//-->
			</script>
			<form name="form1" id="form1">
			<INPUT TYPE='hidden'  name= 'hid2' value= '30'>
        <select name="menu1" onChange="MM_jumpMenu('parent',this,1)">
          <option> <<<งานรายงาน >>></option>
		  <option value="report2.php">รายงานสรุปรวมทั้งหมดจังหวัด </option>
          <option value="re_4lag.php">รายงานจำแนกตามการจัดสรร ...</option> 
	      <option value="per_amp.php">รายงานเบิกจ่าย เรียงจากน้อยไปมาก</option> 
          <option value="fream3.php">รายงานจำแนกตามสถานศึกษา ...</option>
          <option value="fream4.php">รายงานจำแนกตาม งาน/โครงการ ...</option>
          <option value="search1.php">ค้นหารายการที่เบิกจ่าย...</option>
          <option value="calculate_up.php">ส่งรายงานให้สำนักงานส่งเสริมการเรียนรู้</option>
          <option value="#">------------------------------------------</option>
		   <option value="check_yuem.php">ตรวจสอบสถานศึกษาที่ค้างเงินยืม</option>

 
                </select>
              </form>	
					</div>			   </td>
            <td><div align="center">
			<!-- จัดการระบบ -->
			   <script type="text/JavaScript">
			<!--
			function MM_jumpMenu(targ,selObj,restore){ //v3.0
			eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
			if (restore) selObj.selectedIndex=0;
			}
			//-->
			</script>

		<form name="form1" id="form1">
			<INPUT TYPE='hidden'  name= 'hid1' value= '30'>
           <select name="menu1" onChange="MM_jumpMenu('parent',this,1)">
			<option> <<<งานรายปี>>>  </option> 	 
<!--             <option value="wphee1_n.php">1. กำหนดรหัสและจำนวนเงิน</option>      ใช้ได้-->
			<option value="sum_mony_pee.php">1. กำหนดรหัสและจำนวนเงิน</option>
			<option value="w1.php">2. กำหนดงานโครงการ</option>
          <!-- <option value="k1.php">...<b>จัดสรร</b> งปม.ให้สถานศึกษา</option> -->
          <!-- <option value="v_jud_amp_del.php">4. การจัดสรร งปม. / สถานศึกษา</option>	
           <option value="v_jud_work_del.php">4. การจัดสรร งปม./ โครงการ</option> -->
		    <option value="fream6.php">3. การจัดสรรงบประมาณ</option>
    	  <option value="w_ma1.php">4. บันทึกข้อมูลการรับโอน งปม.</option>
          <option value="ws1_n1.php">5. เปิดงบประมาณปีปัจจุบัน</option>
          <option value="ws1_n0.php">6. ปิดงบประมาณปีปัจจุบัน</option>
          <option value="item_de1.php">7. ลบรายการจ่ายปีปัจจุบัน</option>
			</select>
            </form>	
			</div></td>
			<td><div align="center">
				<!-- กำหนดสิทธิ์ -->
			<script type="text/JavaScript">
			<!--
			function MM_jumpMenu(targ,selObj,restore){ //v3.0
			eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
			if (restore) selObj.selectedIndex=0;
			}
			//-->
			</script>
			<form name="form1" id="form1">
			<INPUT TYPE='hidden'  name= 'hid2' value= '30'>
        <select name="menu1" onChange="MM_jumpMenu('parent',this,1)">
          <option><<<งานจัดการระบบ>>> </option>
		<option value="wa1_n.php">. กำหนดรหัส/ชื่อสถานศึกษา</option>
          <option value="wy1.php">..กำหนดสิทธิ์ จนท.</option>
          <option value="ws1_n.php">..กำหนดสิทธิ์ สถานศึกษา</option>
          <option value="wd1.php">..กำหนดสิทธิ์ ผู้บริหารจังหวัด</option>
          <option value="wysiwyg/left3_input.php">...เปลี่ยน Banner</option>
          </select>
          </form>	
					</div>			   </td>
			<td><div align="center">
				<?php
				echo "<FORM METHOD=POST ACTION='logout.php'>";
				echo "<CENTER><input type='submit' name='Submit' value=' Logout ' /></CENTER>";
				echo "</FORM>";
			   ?> 		
				</div></td>
            </tr>

        </table></td>
      </tr>
<!-- แสดงกราฟ การใช้งบประมาณ  --

		<tr><td><div align="center"><img src="bar5.php"> <HR> </div> </td></tr>
<!-- สิ้นสุดแสดงกราฟ การใช้งบประมาณ  -->
	<tr><td>
		<iframe width="100%" height="430" src="webboard/webboard-admin.php" border="1" frameBorder=1 >
		</iframe>
	</td></tr>
      <tr>
        <td>
<!-- แสดงผู้พัฒนาโปรแกรม -->
		<IFRAME marginWidth=0 marginHeight=0 src="/<?=$path?>/read.php" frameBorder=0 noResize width=880 scrolling=no height=18>
		</IFRAME><HR>

<!-- สิ้้นสุดการแสดงผู้พัฒนาโปรแกรม  -->

			</td> 
		</tr>

    </table></th>
  </tr>
</table>
</body>
</html>
