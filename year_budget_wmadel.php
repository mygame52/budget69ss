<?php	session_start();
	include("config.inc.php");
	include("code2name_work.php");


	if (trim($hid1) <> "03") {
		echo "	<SCRIPT language='JavaScript'>";
		echo "			alert('ท่านเข้าสู่ระบบไม่ถูกต้อง')";
		echo"			location.href='index.php'";
		echo"	</SCRIPT>";
	   exit();
	}

//mysql_select_db($database_budget, $budget);
$query_Recordset1 = "SELECT * FROM samnakma  ORDER BY code_ma ASC";
$Recordset1 = mysql_query($query_Recordset1) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
$j=0;
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
<body onload='document.form1.ok_.focus()'>
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
                             <h1 class="rnut-logo-name"><a href="./index.html"><?php echo $mess_budget?></a></h1>
                             <h2 class="rnut-logo-text"><?php echo $mess_header1?></h2>
                             <h2 class="rnut-logo-text"><?php echo $mess_header2?></h2>
			   </div>
                
            </div>
            <div class="cleared reset-box"></div>
<div class="rnut-bar rnut-nav">
<div class="rnut-nav-outer">
	<ul class="rnut-hmenu">
		<li>
			<a href="year_budget_come.php" class="active">Back</a>
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
						<h2 class="rnut-postheader" style="text-align:center;"><CENTER>บันทึกการรับโอบงบประมาณ</CENTER>
						<?php //echo $w_name[$c_jud]; ?>
						</h2>

<!-- start การแก้ไขข้อมูล -->
<?php
						mysql_connect($dbserver, $dbuser,$dbpass) or
										die("<hr><b> ติดต่อ server ไม่ได้>");

						mysql_select_db($dbname) or  die("ติดฐานข้อมูลไม่ได้");
						$w_del = $_REQUEST['w_del'];

						$sql_del = ("delete from  samnakma where id_auto = '$w_del'");
						$result = mysql_query($sql_del);
						echo "<center><font size='3' color='#ff0000'>ลบข้อมูล  Record : $w_del  แล้ว</font></center>";
                                                echo "<meta http-equiv=\"refresh\" content=\"0;URL=year_budget_come.php\" />";						
//header("location:re1.php");  

						?>
<!-- end การแก้ไขข้อมูล -->
										<?php include("./include/footer.inc");?>
                                    </body>
                                    </html>
<?php
mysql_free_result($Recordset1);
?>