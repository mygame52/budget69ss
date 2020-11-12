<?php	session_start();
//	@ini_set("display_errors", "0"); //ใส่บรรทัดแรก
	include("config.inc.php");
	if($act  != "ok") {
			echo "	<SCRIPT language='JavaScript'>";
			echo "			alert('ท่านเข้าสู่ระบบไม่ถูกต้อง')";
			echo"			location.href='index.php'";
			echo"	</SCRIPT>";
		   exit();
		}

	session_unregister('work');

$sele_amp;
mysql_select_db($dbname, $objConnect);

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
                    <a href="./menu_amp.php" class="active">Back</a>
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
						<h2 class="rnut-postheader" style="text-align: center;">เลือกรายการ ค่าสาธาฯ ที่ต้องการตั้งเบิก</h2>
<!-- start การแก้ไขข้อมูล -->
<br>
						<div align="center">
						<form id="form1" name="form1" method="post" action="amp_cutoff_sata1.php">
						<table width="40%" border="0" cellspacing="0" cellpadding="7">
						  <tr>
							<td><div align="right"><font size="3">ค่าสาธารณูปโภค&nbsp;:</font></div></td>
							<td>	
							  <label>
								<select name="sel_pub2" size="1" id="sel_pub2" tabindex="0" style="font: 11pt tahoma; color: #000000;background: #ccffff; border: 1px black solid" align="center" >
								  <option value=''>เลือกข้อมูล...</option>
								  <?php 
									$i=0;
									$sql="select * from public_utility order by idu";
									$dbquery = mysql_db_query($dbname, $sql);
									$num_rows = mysql_num_rows($dbquery);
									while ($i < $num_rows)
										{
											$i++;
											$result = mysql_fetch_array($dbquery);	
											$idu_ = $result[0];
											$name_pub_ = $result[1];
											$name_shot_ = $result[2];
											echo"<option value='$name_shot_'>$name_pub_</option>";
										}
								  ?>
								</select>
							  </td>
						  </tr>

						  <tr>
							<td><div align="right"><font size="3">ประจำเดือน&nbsp;:</font></div></td>
							<td>	
							  <label>
								<select name="sel_month2" id="sel_month2" tabindex="1" style="font: 11pt tahoma; color: #000000;background: #ffff99; border: 1px black solid" align="center" >
								  <option value=''>เลือกเดือน...</option>
								  <option value='เดือนมกราคม'>เดือนมกราคม</option>
								  <option value='เดือนกุมภาพันธ์'>เดือนกุมภาพันธ์</option>
								  <option value='เดือนมีนาคม'>เดือนมีนาคม</option>
								  <option value='เดือนเมษายน'>เดือนเมษายน</option>
								  <option value='เดือนพฤษภาคม'>เดือนพฤษภาคม</option>
								  <option value='เดือนมิถุนายน'>เดือนมิถุนายน</option>
								  <option value='เดือนกรกฏาคม'>เดือนกรกฎาคม</option>
								  <option value='เดือนสิงหาคม'>เดือนสิงหาคม</option>
								  <option value='เดือนกันยายน'>เดือนกันยายน</option>
								  <option value='เดือนตุลาคม'>เดือนตุลาคม</option>
								  <option value='เดือนพฤศจิกายน'>เดือนพฤศจิกายน</option>
								  <option value='เดือนธันวาคม'>เดือนธันวาคม</option>
								</select>
							  </td>
						  </tr>
						  <tr>
							<td>&nbsp;</td>
							<td>
							<input name="Submit" type="submit" id="Submit" value="   ตกลง   "/>
						</td>
						  </tr>
						</table>
						</form>
						</div>
						<p>&nbsp;</p>

<!-- end การแก้ไขข้อมูล -->
<?php include("./include/footer.inc");?>
                                    </body>
                                    </html>
