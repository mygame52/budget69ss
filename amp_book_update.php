<?php	session_start();
	@ini_set("display_errors", "0"); //ใส่บรรทัดแรก
	include("config.inc.php");
	mysql_connect($dbserver, $dbuser,$dbpass) or
					die("<hr><b> ติดต่อ server ไม่ได้>");
					
	mysql_select_db($dbname) or  die("ติดฐานข้อมูลไม่ได้");
	$id_in = $_REQUEST['ch_book'];
        $numbook = $_REQUEST['numbook'];
	$director = $_REQUEST['director'];
	$add1 = $_REQUEST['add1'];
	$add2 = $_REQUEST['add2'];
	$add3 = $_REQUEST['add3'];
        $tel = $_REQUEST['tel'];
        $fax = $_REQUEST['fax'];
        
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
                    <a href="./menu_amp.php" class="active">Back</a>
		</li>	
		<li><font size="3" color="#ffffcc">
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
						<h2 class="rnut-postheader" style="text-align: center;">ตั้งค่าหน่วยงาน-หนังสือ</h2>

<!-- start การแก้ไขข้อมูล -->
			<?php
				echo "<CENTER>";
				echo'<BR>';	

				$sql = "update amp set numbook ='$numbook', director='$director', add1='$add1', add2='$add2', add3='$add3', tel='$tel', fax='$fax' where id='$id_in'";
				$result=mysql_db_query($dbname,$sql);
                                //echo $sql;    
				?>
					<font size="3" color="#ff0000">ปรับปรุงข้อมูลเรียบร้อยแล้ว </font><BR><br>
                                        <?php echo "<meta http-equiv=\"refresh\" content=\"3;URL=menu_amp.php\" />"; ?>

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
