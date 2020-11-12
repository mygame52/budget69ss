<?php	session_start();
	@ini_set("display_errors", "0"); //ใส่บรรทัดแรก
	
	include("config.inc.php");
	include("code2name_amp.php");
	if (trim($hid1) <> "03") {
		echo "	<SCRIPT language='JavaScript'>";
		echo "			alert('ท่านเข้าสู่ระบบไม่ถูกต้อง')";
		echo"			location.href='index.php'";
		echo"	</SCRIPT>";
	   exit();
	}

	error_reporting(0);

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
<?php include 'include/header.inc.php'; ?>
            <div class="cleared reset-box"></div>
<div class="rnut-bar rnut-nav">
<div class="rnut-nav-outer">
	<ul class="rnut-hmenu">
		<li>
			<a href="./menu_director.php" class="active">Back</a>
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
						<h2 class="rnut-postheader" style="text-align: center;">ตรวจสอบข้อมูล ผู้มีสิทธิยืมเงินระดับอำเภอ</h2>
<!-- start การแก้ไขข้อมูล -->

		<TABLE width="90%" border="1" cellspacing="0" cellpadding="5" align="center" bgcolor="#ffffff">
		  <tr>
			<td colspan="5" style="text-align:left;vertical-align:middle"><H3>ข้อมูลผู้ที่มีสิทธิยืมเงินระดับอำเภอ<?php echo "&nbsp;:&nbsp;".$full_name;?></H3></td>
		  </tr>	
		  <tr bgcolor="#ff9900">
		    <th scope="col"><font size="3" color="#000000">ID</font></th>
		    <th scope="col"><font size="3" color="#000000">สถานศึกษา</font></th>
		    <th scope="col"><font size="3" color="#000000">เลขบัตร ปชช. </font></th>
			<th scope="col"><font size="3" color="#000000">ชื่อ-สกุล </font></th>
			<th scope="col"><font size="3" color="#000000">สถานะเงินยืม </font></th>
	      </tr>
	
			<!-- ดึงข้อมูล ผู้ยืมเงินจาก ฐานข้อมูล item_yuem  -->
	<?php
				$a=0;
				//$psql = "SELECT * FROM person_yuem where chk_status='1' ORDER BY amp ASC";   // แสดงเฉพาะรายการที่ค้าง

				$psql = "SELECT * FROM person_yuem where amp != '00' ORDER BY amp ASC";   // แสดงทั้งหมด

				//$psql="SELECT * FROM person_yuem where amp = '00' order by id_yuem";
				$dbquery = mysql_db_query($dbname, $psql);
				$num_rows = mysql_num_rows($dbquery);
				while ($result = mysql_fetch_array($dbquery))
				{
					$id_item_ = $result[0];
					$citizenid_ = $result[1];
					$person_ = $result[2];
					$amp_ = $result[3];
					$chk_status_ = $result[4];
					$a++;$i++;
					?>
				     <tr <?php if($i !=1){echo "bgcolor='#ccfffc'";}?> class='off unamed1' onmouseover=this.className='onping' onmouseout=this.className='off' style='cursor:hand' >	
					<?php
					echo "  <td align='center' width='5%' style='text-align:center;vertical-align:middle'><div width='100'><font size='3' color='6600ff'>&nbsp;$a</font></div></td>";

					echo "  <td align='center' width='15%' style='text-align:left;vertical-align:middle'><div width='100'><font size='3' color='6600ff'>&nbsp;$amp_:$xxx[$amp_]</font></div></td>";

					echo "  <td align='center' width='20%' style='text-align:center;vertical-align:middle'><font size='3' color='6600ff'>$citizenid_</font></td>  ";
					echo "  <td align='left' width='50%' style='text-align:left;vertical-align:middle'>&nbsp;&nbsp;&nbsp;&nbsp;<font size='3' color='6600ff'>$person_</font></td>  ";
					if($chk_status_=="1")
					{$mes_chk = "ค้างเงินยืม";}
					else
					{$mes_chk = "-";}
					echo "  <td align='left' width='50%' style='text-align:left;vertical-align:middle'>&nbsp;&nbsp;&nbsp;&nbsp;<font size='3' color='6600ff'>$mes_chk</font></td>  ";
					echo "</tr>";

			}
		echo"</table>";
		echo "<br><br><br>";

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
