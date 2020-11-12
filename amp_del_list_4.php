<?php	session_start();
	include("config.inc.php");
			if($act  != "ok") {
				exit();
			}

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
			<a href="./menu_amp" class="active">Back</a>
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
						<h2 class="rnut-postheader" style="text-align: center;">ลบ / ถอนรายการ เบิกเงิน </h2>

<!-- start การแก้ไขข้อมูล -->

<br>
			<?php
			//  ช่วงของการลบข้อมูล

			mysql_select_db($dbname, $objConnect);
			$query_Recordset1 = "SELECT * FROM item  where amp_item like '$sele_amp' and staus=0 ORDER BY id_item DESC";
			$Recordset1 = mysql_query($query_Recordset1, $objConnect) or die(mysql_error());
			$row_Recordset1 = mysql_fetch_assoc($Recordset1);
			$totalRows_Recordset1 = mysql_num_rows($Recordset1);
			?>

			<table width="95%" align="center" border="1" cellspacing="1" cellpadding="3"bordercolordark="#FFFFFF"  bordercolorlight="#8297b1">
			  <tr bgcolor="#E7E4C2">
				<th scope="col">ID</th>
				<th scope="col">เงินจาก งาน / โครงการ</th>
				<th scope="col">รายละเอียดค่าใช้จ่าย</th>
				<th scope="col">ที่เอกสาร</th>
				<th scope="col">เมื่อวันที่</th>
				<th scope="col">จำนวนเงิน</th>
				<th scope="col">ดำเนินการ</th>
			  </tr>

			 <?$total=0;?>
			  <?php 
			  if($totalRows_Recordset1==0)
				{ echo "<tr><td colspan=7><center><font size='3' color='#CC0099'>---:    ไม่มีข้อมูล   :---</font></center></td></tr>";		
				}else
				 {	  
			  do { ?>
				<tr>				 
				  <?php $i_del= $row_Recordset1['id_item']; ?>
				  <?php $i_del=$row_Recordset1['id_item']; ?>	  
				  <td style="text-align:center;vertical-align:middle;";><?php echo $row_Recordset1['id_item']; ?></td>
			<!--<td><?php echo $row_Recordset1['c_khong']; ?></td>  -->

			<?php  //เอารหัสงานโครงการ ไปหาชื่องานโครงการใน work
				  $c_ko = substr($row_Recordset1['c_khong'],2,6);
				  //mysql_select_db($database_budget, $budget);
				$query_ = "SELECT w_name FROM work  where w_code like '$c_ko' ";
				$Record= mysql_query($query_, $objConnect) or die(mysql_error());
				$row_ = mysql_fetch_assoc($Record);
				//$totalRows_Recordset1 = mysql_num_rows($Recordset1);
				?>
				  <td><?php echo $row_['w_name']; ?></td>
				  <td><?php echo $row_Recordset1['item']; ?></td>
				  <td><?php echo $row_Recordset1['doc']; ?></td>
				  <td><?php echo $row_Recordset1['date_time']; ?></td>
				  <td style="text-align:right;vertical-align:middle;";><?php echo number_format($row_Recordset1['bath'],2); ?></td>
				  <td><?php echo "<div align='center'><A HREF='amp_del_list_2.php?i_del=$i_del'&dell='dell'>ถอนรายการ</A></div> ";  ?>	</td>
				</tr>
				<?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); 
				
				}
				?>

			</table>

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
