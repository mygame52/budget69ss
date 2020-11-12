<?php	session_start();
	@ini_set("display_errors", "0"); //ใส่บรรทัดแรก
	
	include("config.inc.php");
	 $j=0;
	if($act  != "ok") {
		echo "ต้องเข้าสู่ระบบปกติ";
		exit();
	}

	error_reporting(0);
	mysql_select_db($dbname, $objConnect);
	$query_Recordset1 = "SELECT * FROM item where amp_item = '$sele_amp' and chk_id='1' and staus='4' ORDER BY id_item ASC";

	$Recordset1 = mysql_query($query_Recordset1, $objConnect) or die(mysql_error());
	$row_Recordset1 = mysql_fetch_assoc($Recordset1);
	$totalRows_Recordset1 = mysql_num_rows($Recordset1);

	error_reporting(0);
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
<body onload='document.form1.doc_.focus()'>
<?php include 'include/header.inc.php'; ?>
            <div class="cleared reset-box"></div>
<div class="rnut-bar rnut-nav">
<div class="rnut-nav-outer">
	<ul class="rnut-hmenu">
		<li>
			<a href="./menu_pro" class="active">Back</a>
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
						<h2 class="rnut-postheader" style="text-align: center;">ตรวจสอบข้อมูล ผู้มีสิทธิยืมเงิน</h2>
                        <!-- <div class="rnut-postcontent">
							<p style="text-align: center;">test1</p>
							<p style="text-align: center;">test2</p>
		                </div> -->
<!-- start การแก้ไขข้อมูล -->

		<TABLE width="100%" border="1" cellspacing="0" cellpadding="5" align="center">
		  <tr>
			<td colspan="5" style="text-align:left;vertical-align:middle"><H3>ข้อมูลผู้ที่มีสิทธิยืมเงิน<?php echo "&nbsp;:&nbsp;".$full_name;?></H3></td>
		  </tr>	
		  <tr bgcolor="#CCFFFF">
		    <th scope="col">ลำดับ</th>
		    <th scope="col">เลขบัตร ปชช.</th>
		    <th scope="col">ชื่อ-สกุล</th>
			<th scope="col">สถานนะเงินยืม</th>
	      </tr>
			<tr bgcolor="#FFCCFF">
	
			<!-- ดึงข้อมูล ผู้ยืมเงินจาก ฐานข้อมูล item_yuem  -->
	<?php
				$a=0;
				$psql="SELECT * FROM person_yuem where amp = $sele_amp order by id_yuem";
				$dbquery = mysql_db_query($dbname, $psql);
				$num_rows = mysql_num_rows($dbquery);
				while ($result = mysql_fetch_array($dbquery))
				{
					$id_item_ = $result[0];
					$citizenid_ = $result[1];
					$person_ = $result[2];
					$chk_status_ = $result[4];
					$a++;

								$j++;
								$i=($j%2);
				?>
						     <tr <?php if($i !=1){echo "bgcolor='#FFCCFF'";}?> class='off unamed1' onmouseover=this.className='ongreen' onmouseout=this.className='off' style='cursor:hand' >  
				<?php
					echo "  <td align='center' width='10%' style='text-align:center;vertical-align:middle'><div width='100'>&nbsp;$a</div></td>";
					echo "  <td align='center' width='20%' style='text-align:center;vertical-align:middle'>$citizenid_</td>  ";
					echo "  <td align='left' width='50%' style='text-align:left;vertical-align:middle'>&nbsp;&nbsp;&nbsp;&nbsp;$person_</td>  ";
					if($chk_status_=="1")
					{$mes_chk = "ค้างเงินยืม";}
					else
					{$mes_chk = "-";}
					echo "  <td align='left' width='50%' style='text-align:left;vertical-align:middle'>&nbsp;&nbsp;&nbsp;&nbsp;$mes_chk</td>  ";
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
