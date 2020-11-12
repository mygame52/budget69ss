<?php	session_start();
	include("config.inc.php");
	if (trim($hid1) <> "03") {
		echo "	<SCRIPT language='JavaScript'>";
		echo "			alert('ท่านเข้าสู่ระบบไม่ถูกต้อง')";
		echo"			location.href='index.php'";
		echo"	</SCRIPT>";
	   exit();
	}
			include("code2name_amp.php");
			include("code2name_work.php");

		$sel_w = $_REQUEST['sel_work'];
		if($sel_w == "<<เลือกงาน/โครงการ>>"){
			 echo"<BR><CENTER>";
			 exit("ต้องเลือกรายการก่อนครับ");
 	         echo"</CENTER>";
		}
//พิมพ์ค่า อำเภอมาดู
$total_rab=0;
$total_rab2=0;
$total_rab3=0;
$total_rab4=0;
$total_rua=0;
$j=0;

mysql_select_db($dbname, $objConnect);
$query_Recordset1 = "SELECT * FROM judsun where right(code,6) like '$sel_w' ORDER BY code ASC";
$sql_sum_rab="select sum(rab) from judsun where right(code,6) like '$sel_w'";
$resault_sum_rab= mysql_query($sql_sum_rab);
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
<body>
<?php include 'include/header.inc.php'; ?>

            <div class="cleared reset-box"></div>
<div class="rnut-bar rnut-nav">
<div class="rnut-nav-outer">
	<ul class="rnut-hmenu">
		<li>
			<a href="year_budget_edit_work.php" class="active">Back</a>
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
						<h2 class="rnut-postheader" style="text-align:center;">ข้อมูลการจัดสรรงบประมาณ : 
						<?php echo $w_name[$sel_work]; ?></h2>
						<!-- <div class="rnut-postcontent">
							<p style="text-align: center;">test1</p>
							<p style="text-align: center;">test2</p>
		                </div> -->
<!-- start การแก้ไขข้อมูล -->
<?php
if ($totalRows_Recordset1< 1){
	echo "<CENTER><BR><h2 class='rnut-postheader' style='text-align:center;' >ยังไม่มีการจัดสรรงบประมาณ งาน/โครงการนี้</h2></CENTER>";
//	echo "<meta http-equiv=\"refresh\" content=\"3;URL=year_budget_edit.php\" />";
	exit();
}
?>
<div align="center">
<BR>
<table width="80%" border="0" cellspacing="1" cellpadding="3" style="table-align:center">
    <tr bgcolor="#FFCC99">
     <th scope="col">สถานศึกษา</th>
    <th scope="col">จัดสรร1</th>
    <th scope="col">จัดสรร2</th>
    <th scope="col">จัดสรร3</th>
    <th scope="col">จัดสรร4</th>
	 <th scope="col">เบิกจ่ายแล้ว</th>
    <th scope="col">ลบ</th>
    <th scope="col">แก้ไข</th>
   </tr>
   <?php do { 
	$j++;
	$i=($j%2);
?>
     <tr <?if($i !=1){echo "bgcolor='#FFFFCC'";}?> class='off unamed1' onmouseover=this.className='onping' onmouseout=this.className='off' style='cursor:hand' >  
	 <?php $c_jud=$row_Recordset1['code']; ?>
	  <td style="text-align:left;vertical-align:middle">
	  <?php $cod=substr($row_Recordset1['code'],0,2); 
		echo $cod." = ".$xxx[$cod];
	  ?>
	  </td>
	  <!-- <td><?php echo $row_Recordset1['work']; ?></td> -->
	  <td style="vertical-align:middle"><div align="right"><?php echo number_format($row_Recordset1['rab'],2);  
				$total_rab = $total_rab + $row_Recordset1['rab'];?></div></td>
	  <td style="vertical-align:middle"><div align="right"><?php echo number_format($row_Recordset1['rab2'],2);  
				$total_rab2 = $total_rab2 + $row_Recordset1['rab2'];?></div></td>
	  <td style="vertical-align:middle"><div align="right"><?php echo number_format($row_Recordset1['rab3'],2);  
				$total_rab3 = $total_rab3 + $row_Recordset1['rab3'];?></div></td>	
		<td style="vertical-align:middle"><div align="right"><?php echo number_format($row_Recordset1['rab4'],2);  
				$total_rab4 = $total_rab4 + $row_Recordset1['rab4'];?></div></td>
	<?php
				$rumrab=$row_Recordset1['rab']+$row_Recordset1['rab2']+$row_Recordset1['rab3']+$row_Recordset1['rab4'];
	?>
	  <td style="vertical-align:middle"><div align="right"><?php 
		  if ($row_Recordset1['rua'] > $rumrab ){
			echo "<FONT SIZE='2' COLOR='#FF0000'>";
				echo number_format($row_Recordset1['rua'],2); 
			echo "</FONT>";
		}else{		
				echo number_format($row_Recordset1['rua'],2); 
		}
	   $total_rua = $total_rua + $row_Recordset1['rua'];  ?></div></td>
	<?   if ($set_add ==1){  ?>
	   <td style="vertical-align:middle"><div align="center"><a href="year_budget_del.php?c_jud=<?echo"$c_jud"; ?>"><img src="image/icon/cross.png" width="16" height="16" border="0" alt=""></a></div></td>
	   <td style="vertical-align:middle"><div align="center"><a href="year_budget_editmes.php?w_del=<?echo"$c_jud"; ?>"><img src="image/icon/edit.gif" width="16" height="16" border="0" alt=""></a></div></td>
<?   } else{ ?>
	   <td><div align="center">-</div></td>
	   <td><div align="center">-</div></td>
<?	   }     ?>
<!-- 	   <td><div align="center"><a href="kong2.php">เพิ่ม</a></div></td> -->	 
</tr>
    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
      <tr bgcolor="#FFCC99">
		<td>รวม</td>
		<td><div align="right"><?php echo number_format($total_rab,2); ?></div></td>
		<td><div align="right"><?php echo number_format($total_rab2,2); ?></div></td>
		<td><div align="right"><?php echo number_format($total_rab3,2); ?></div></td>
		<td><div align="right"><?php echo number_format($total_rab4,2); ?></div></td>
		<td><div align="right"><?php echo number_format($total_rua,2); ?></div></td>
		<td></td>
		<td></td>
	</tr>
</table>
<P>
<?php

mysql_free_result($Recordset1);
?>
<div align="center">
<!-- end การแก้ไขข้อมูล -->
										<?php include("./include/footer.inc");?>
                                    </body>
                                    </html>