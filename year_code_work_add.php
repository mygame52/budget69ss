<?php	session_start();
		require_once('config.inc.php');
		// start หากไม่ได้เข้าใช้งานจากเมนู
		if (trim($hid1) <> "03") {
	  	   echo "<meta http-equiv=\"refresh\" content=\"0;URL=menu_pro.php\" />";
		}
		// end หากไม่ได้เข้าใช้งานจากเมนู
		$l=0;

		mysql_select_db($dbname, $objConnect);
		$query_Recordset1 = "SELECT * FROM work  ORDER BY w_code ASC";
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
<?php include 'include/header.inc.php'; ?>
            <div class="cleared reset-box"></div>
<div class="rnut-bar rnut-nav">
<div class="rnut-nav-outer">
	<ul class="rnut-hmenu">
		<li>
                    <a href="./year_code_work.php" class="active">Back</a>
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
						<h2 class="rnut-postheader" style="text-align: center;">เพิ่มข้อมูลเกี่ยวกับ:รหัสงาน / โครงการ</h2>
                        <!-- <div class="rnut-postcontent">
							<p style="text-align: center;">test1</p>
							<p style="text-align: center;">test2</p>
		                </div> -->
<!-- start การแก้ไขข้อมูล -->

						<CENTER><br>
						ประกอบด้วยรหัสงบประมาณ 4 หลัก + รหัสงานย่อย  2 หลัก  เช่น  <BR><BR>
						<TABLE  border = '2' >
						<TR>
							<TD>0104 = งบผลผลิตที่ 4</TD>	<TD> <CENTER>แบ่งจัดสรรให้งานต่างๆ</CENTER></TD><TD>ให้กำหนดรหัส ดังนี้</TD>
						</TR>
						<TR>
							<TD></TD><TD>1. การศึกษาทักษะอาชีพ </TD>	<TD><CENTER>01</CENTER></TD>
						</TR>
						<TR>
							<TD></TD><TD>2. การศึกษาเพื่อทักษะชีวิต </TD>	<TD><CENTER>02</CENTER></TD>
						</TR>
						<TR>
							<TD></TD><TD>3. การศึกษาเพื่อพัฒนาสังคมชุมชน</TD>	<TD><CENTER>03</CENTER></TD>
						</TR>
						</TABLE><BR><BR>

						<Form Action="year_code_work_add1.php" Method=post>
						<Table border=0 cellspacing=3 cellpadding=3>
						<tr><td>ขั้นที่ 1 เลือกเงินงบประมาณ </td><td>
						<?php 
											mysql_connect($dbserver, $dbuser,$dbpass) or die("<hr><b> ติดต่อ server ไม่ได้>");
											mysql_select_db($dbname) or  die("ติดฐานข้อมูลไม่ได้");

											  $sql = "select  * from samnak";
											  $result = mysql_query($sql);
												$num_rows = mysql_num_rows($result); //จำนวน  record  ที่พบ
												//echo $num_rows;
												echo "<SELECT NAME='cod'  size='1'>";
                                                                                                    for ($i = 1 ;$i <= $num_rows; $i++) {
                                                                                                        $read=mysql_fetch_array($result);
                                                                                                        $cod[$i] = $read['code_sam'];	
                                                                                                        $name_sam[$i] = $read['name_sam'];
                                                                                                        echo "$cod[$i].'----------'.$name_sam[$i]<BR>";
                                                                                                        echo "<option  value='$cod[$i]'>$cod[$i]-$name_sam[$i] </option>";
                                                                                                    } 
												echo "</SELECT>";
						 ?>
						</TD></tr>
						<tr><td>ขั้นที่ 2 กำหนด รหัสงาน 2 หลัก </td><td><input type=text name=wcod size=4> &nbsp;&nbsp;ตั้งแต่ 01ถึง  99</td></tr>
						<tr><td>ขั้นที่ 3 ชื่อโครงการ </td><td><input type=text name=wnam size=70></td></tr>
						<tr><td>&nbsp;</td><td>**การตั้งชื่อโครงการ (XXX ชื่อโครงการ) 
                                                        ให้นำเลขตัวสุดท้ายของ งปม.หลัก+เลข 2 ตัวหน้าของรหัสงาน<br>
                                                            เช่น <font color="#ff0000">7</font><font color="#0000cc">13</font> เงินอุดหนุนค่าเช่าสถานที่ในต่างประเทศ<br>                                                           
                                                            หมายความว่า รหัสงบประมาณหลัก คือ<font color="#ff0000">7</font>&nbsp;&nbsp;ลำดับรหัสงานที่&nbsp;&nbsp;<font color="#0000cc">13</font> เงินอุดหนุนค่าเช่าสถานที่ในต่างประเทศ<br>                                                                                                                            
                                                        </br></td></tr>						
                                                
						<TR><td style="text-align:right;">ขั้นที่ 4 ===>><INPUT TYPE=hidden  name= hid_a value= $hid1></TD>
							<TD>&nbsp;&nbsp;&nbsp;<input type=submit  value=" ตกลง ">&nbsp;&nbsp;&nbsp;<INPUT TYPE="reset"></TD>
						</TR>
						</Table>
						</Form>
						</CENTER>


<!-- end การแก้ไขข้อมูล -->
										<?php include("./include/footer.inc");?>
                                    </body>
                                    </html>