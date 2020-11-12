<?php session_start(); 
  include("config.inc.php");

	if (trim($hid1) <> "03") {
		echo "	<SCRIPT language='JavaScript'>";
		echo "			alert('ท่านเข้าสู่ระบบไม่ถูกต้อง')";
		echo"			location.href='index.php'";
		echo"	</SCRIPT>";
	   exit();
	}

$num_rows=0;
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
			<a href="menu_pro.php" class="active">Back</a>
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
						<? $rand = rand(); ?>
						<form id="form1" name="form1" method="post" action="status-yuem1.php?rand=<?=$rand?>">
						<table width="60%" border="1" cellspacing="0" cellpadding="7"align="center">
						  <tr>
							<td><div align="right"> รหัส ID ที่ต้องการเปลี่ยน </div></td>
							<td>&nbsp;
							<INPUT TYPE="text" NAME="idd" SIZE="20" style="font: 12pt tahoma; color: #3333ff;background: #C0F9BD; border: 1px black solid" >
							<input type="submit" name="Submit" value="Go"></td>
						  </tr>
						 	<?php  mysql_free_result($Recordset1); ?>
						</table>
						</form>

<!-- end การแก้ไขข้อมูล -->
										<?php include("./include/footer.inc");?>
                                    </body>
                                    </html>