<?php session_start();
include("config.inc.php");?>

<?php
$user_ = "บุคคลทั่วไป";
$num_rows=0;

$num_rows="0";  // เคลียค่านับแถว
$amp= " ";
$idd= " ";
$sta= " ";
$doc= " ";
$c_kong= " ";
$item= " ";
$bath= "0";

mysql_select_db($dbname, $objConnect);
$query_Recordset1 = "SELECT * FROM amp ORDER BY id ASC";
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
<body onload="document.form1.idd.focus()">
<?php include 'include/header.inc.php'; ?>
            <div class="cleared reset-box"></div>
<div class="rnut-bar rnut-nav">
<div class="rnut-nav-outer">
	<ul class="rnut-hmenu">
		<li>
			<a href="index.php" class="active">Back</a>
		</li>	
		<li>
	
			<font size="3" color="ffffff">Login โดย : &nbsp;<?php echo $user_?></font>
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
                       
<!-- start การแก้ไขข้อมูล -->
<div align="center">
				<form id="form1" name="form1" method="post" action="person_showstatus.php?rand=<?= $rand ?>"></th>       
						<table width="60%" border="1" cellspacing="0" cellpadding="3" align="center">
						  <tr>  <? $rand = rand(); ?>
							<td width="60%" colspan="2">
							<h2 class="rnut-postheader" style="text-align: center;">ป้อนหมายเลข ID ที่ต้องการตรวจสอบ</h2><br>
							</td>
						   </tr>
						  <tr>
							<td><div align="right"><br><font size="3" color="#0033cc"> รหัส ID</font>&nbsp;&nbsp;&nbsp; </div></td>
							<td>&nbsp;<INPUT TYPE="text" NAME="idd" SIZE="20" style="font: 12pt tahoma; color: #ff0000;background: #C0F9BD; border: 1px black solid" >
							<input type="submit" name="Submit" value="ตกลง">
							</td>
						  </tr> 					 
							<?php mysql_free_result($Recordset1); ?>
						</table>
					   </form>
					   <br>
					   </div>
<!-- end การแก้ไขข้อมูล -->
										<?php include("./include/footer.inc");?>
                                    </body>
                                    </html>