<?php	session_start();
	include("config.inc.php");
	if($act  != "ok") {
		echo "ต้องเข้าสู่ระบบปกติ";
	exit();
	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"[]>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo $mess_title?></title>

    <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->

    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="script.js"></script>
</head>
<body onload='document.form1.ok_.focus()'>
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
						<h2 class="rnut-postheader" style="text-align: center;">สถานศึกษาล้างเงินยืม</h2>

<!-- start การแก้ไขข้อมูล -->
<br><hr>
<?php

echo"<CENTER>";
//echo $hid1;

$i_del = $_REQUEST['i_del'];

	echo"<font size='3' color='#0000cc'>ลบ ข้อมูลการเบิกจ่ายงบประมาณ  </font>";
	echo "<BR>";
		echo "<BR>";
		//echo $w_del;
				echo "<BR>";
 echo "<body onload='document.form1.ok_.focus()'>";

	echo"<font size='3' color='#990000'>การลบ จะทำให้ข้อมูลหายไปทันที  ยืนยันการลบ กด Y</font>";
	echo "<FORM name='form1' METHOD=POST ACTION=prov_del_list_3.php>";
	echo "<br><div align='center'><table><tr><td width='20px'><INPUT TYPE='text' NAME='ok_' size = '1' style='font: 12pt tahoma; color: #ff0000;background: #83deca; border: 1px black solid'></td></tr></table></div> ";
	echo "<INPUT TYPE='hidden' name='i_del' value='$i_del'>";
	echo "<br><INPUT TYPE='submit' value = 'ยืนยัน'>";
	echo"</FORM>";
	echo"</CENTER>";


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
