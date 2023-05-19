<?php	session_start();
	@ini_set("display_errors", "0"); //ใส่บรรทัดแรก
	include("config.inc.php");
	 $j=0;
	if($act  != "ok") {
		echo "ต้องเข้าสู่ระบบปกติ";
		exit();
	}
//	session_unregister('sel3');
//	session_unregister('work');

	$sele_amp;

	mysql_select_db($dbname, $objConnect);

	$query_Recordset2 = "SELECT * FROM judsun   left join work on judsun.cod = work.w_code where  judsun.amp like '$sele_amp' ORDER BY code ASC";
	//echo "ค่า sel".$sel;
	$Recordset2 = mysql_query($query_Recordset2, $objConnect) or die(mysql_error());
	$row_Recordset2 = mysql_fetch_assoc($Recordset2);
	$totalRows_Recordset2 = mysql_num_rows($Recordset2);

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
<body onload='document.form1.cmoneyid.focus()'>
<?php include 'include/header.inc.php';?>
            <div class="cleared reset-box"></div>
<div class="rnut-bar rnut-nav">
<div class="rnut-nav-outer">
	<ul class="rnut-hmenu">
		<li>
			<a href="./menu_amp" class="active">Back</a>
		</li>	
		<li><font size="3" color="#FFCCCC">
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
						<h2 class="rnut-postheader" style="text-align: center;">การล้างเงินยืม : ศสกร.อำเภอ<?echo " : ".$full_name;  ?> </h2>

<!-- start การแก้ไขข้อมูล -->
<br>
					<form id="form1" name="form1" method="post" action="amp_payment_data.php">
					<table width="80%" border="0" cellspacing="0" cellpadding="7" align="center">
					  <tr>
						<td><div align="right">รหัสงาน/โครงการ</div></td>
						<td>	
						  <label>
							<select name="sel3">
							  <?php
					do {  
					?>
						  <option value="<?php echo $row_Recordset2['code']?>"><?php echo $row_Recordset2['w_name']?></option>
							  <?php
					} while ($row_Recordset2 = mysql_fetch_assoc($Recordset2));
					  $rows = mysql_num_rows($Recordset2);
					  if($rows > 0) {
						  mysql_data_seek($Recordset2, 0);
						  $row_Recordset2 = mysql_fetch_assoc($Recordset2);
					  }
					?>
							</select>
						  </td>
					  </tr>
						<tr>
					  <td colspan="2">&nbsp;<hr></td>
					  </tr>
					  <tr>
						<td>&nbsp;</td>
						<td><p>
					  <input type="checkbox" name="cmoney" value="check"/>
					  &nbsp;&nbsp;ล้างเงินยืม &nbsp;&nbsp;&nbsp;<br>
					  <font color="#FF0000">(กรณีล้างเงินยืม ต้องระบุหมายเลข ID ของเงินยืมด้วย)</font><br>
							</p>
						  </td>
					  </tr>
					  <tr>
						<td>&nbsp;</td>
						<td>หมายเลข ID เงินยืม
						<input type="text" name="cmoneyid" value="0" SIZE="16" style="font: 12pt tahoma; color: #000099;background: #83de91; border: 1px black solid" > </td>
					  </tr>
					  <tr>
					  <td colspan="2">&nbsp;<hr></td>
					  </tr>
					  <tr>
						<td width="150">&nbsp;</td>
						<td>
						<font color="#FF0000"size="5">(ท่านแน่ใจว่า ได้เลือก รหัสงาน/โครงการ ถูกต้องหรือยัง )</font><br><br>
						<div align="center"><input name="Submit" type="submit" id="Submit" value="   Go   "/> </div>
						</td>
					  </tr>
					</table>
					</form>
					<p>&nbsp;</p>

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
