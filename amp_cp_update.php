<?php	session_start();
	@ini_set("display_errors", "0"); //ใส่บรรทัดแรก
	include("config.inc.php");
	mysql_connect($dbserver, $dbuser,$dbpass) or
					die("<hr><b> ติดต่อ server ไม่ได้>");
					
	mysql_select_db($dbname) or  die("ติดฐานข้อมูลไม่ได้");
	$id_in = $_REQUEST['id_in'];
	$pass_in = base64_encode($_REQUEST['pass_in']);
	$pass_new = $_REQUEST['pass_new'];
	$pass_new2 = $_REQUEST['pass_new2'];
	$new_pas = base64_encode(trim($pass_new));
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
						<h2 class="rnut-postheader" style="text-align: center;">เปลี่ยนรหัสผ่าน สถานศึกษา / อำเภอ</h2>

<!-- start การแก้ไขข้อมูล -->
			<?php
				if ($id_in <> $ch_p) {
					echo "<BR><CENTER>ไม่สามารถแก้ไขข้อมูล กศน.อำเภอนี้ได้ครับ </CENTER>";
					exit();
				}

				if ($pass_new <> $pass_new2) {
					echo " Password ไม่ถูกต้อง";
					exit();
				}
				$sql = ("select * from  amp where id= '$id_in' and pass = '$pass_in'");
				$result = mysql_query($sql);
				$num_rows = mysql_num_rows($result); //จำนวน  record  ที่พบ

				if ($num_rows < 1){
					echo " <br><br><CENTER> <font size='3' color='#ff0000'>ไม่พบข้อมูล ของรหัสนี้   </font><BR><BR></CENTER>";
					exit();
				}

				$resultedit=mysql_fetch_array($result);
				$w_code=$resultedit['id'];
				$w_name=$resultedit['Name'];
				$w_pass=$resultedit['pass'];

				echo "<CENTER>";
				echo'<BR>';	

				$sql = "update amp set pass ='$new_pas' where id='$id_in'";
				$result=mysql_db_query($dbname,$sql);

				?>
					<font size="3" color="#ff0000">เปลี่ยน Password เสร็จเรียบร้อยแล้ว </font><BR><br>
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
