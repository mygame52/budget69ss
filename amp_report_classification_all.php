<?php session_start();
	require_once("config.inc.php"); 
	$j=0;
	$p_size=5; //จำนวนแถวที่ใหแสดงต่อ 1 หน้า
		error_reporting(0);
	mysql_select_db($dbname, $objConnect);

 
			$query_item = "SELECT * FROM item where amp_item = $sele_amp ORDER BY id_item DESC";


	$item = mysql_query($query_item, $objConnect) or die(mysql_error());
	$row_item = mysql_fetch_assoc($item);
	$totalRows_item = mysql_num_rows($item);
	$total_p=(int)($totalRows_item/$p_size);


		$cod_work = trim(substr($codework,2));
		$query_search1 = "SELECT w_name FROM work where w_code =	'$cod_work'";
		$result1 = mysql_query($query_search1);
		$fet1 = mysql_fetch_array($result1);
		$aa = $fet1['w_name'] ;
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
<?php include 'include/header.inc.php';?>
            <div class="cleared reset-box"></div>
<div class="rnut-bar rnut-nav">
<div class="rnut-nav-outer">
	<ul class="rnut-hmenu">
		<li>
                    <a href="menu_amp.php" class="active">Back</a>
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
						<h2 class="rnut-postheader" style="text-align: center;">รายงานการตั้งเบิกทุกงบประมาณ : ทุกสถานะ :&nbsp;<?echo "<FONT SIZE='3' COLOR='#3333CC'><B>$cod_work :&nbsp;$aa $full_name</B></FONT>";?></h2>

<!-- start การแก้ไขข้อมูล -->
<br>
						<table width="100%" border="1" cellpadding="3" cellspacing="0"align="center"   bordercolordark="#FFFFFF"  bordercolorlight="#8297b1" >
						  <tr bgcolor="#E1DFB3">
							<th scope="col">ลำดับ</th> 
							<th scope="col">ID</th> 
							<th scope="col">รายการ</th>
							<th scope="col">ที่เอกสาร</th>
							<th scope="col">บันทึกครั้งแรก</th>
							<th scope="col">จำนวนเงิน</th>
							<th scope="col">สถานะ</th>
							<th scope="col">วันที่ดำเนินการ</th>
						  </tr>
						  <?php
						  if ($totalRows_item!=0)
						  {
						  
							do {   
								$j++;
								$i=($j%2);
							?>
						     <tr <?if($i !=1){echo "bgcolor='#CCFFCC'";}?> class='off unamed1' onmouseover=this.className='onping' onmouseout=this.className='off' style='cursor:hand' >  



							<!-- <td><?php echo $row_item['amp_item']; ?></td> -->
							<td style="text-align:center;vertical-align:middle"><?echo $j; ?>
							 </td>
							 <td style="text-align:center;vertical-align:middle"><?php echo $row_item['id_item']; 
										   $i_del=$row_item['id_item'];?>	</td>
							<td style="vertical-align:middle"><?php echo $row_item['item']; ?></td>
							<td style="vertical-align:middle"><?php echo $row_item['doc']; ?></td>
							<td style="vertical-align:middle"><?php echo $row_item['date_time']; ?></td>
							<td style="vertical-align:middle"><div align="right"> 

							<?php 
								echo number_format($row_item['bath'],2); 
								
								if (trim(substr($row_item['item'],0,33))!="ล้างเงินยืม")
									{  
										//echo "<br>";
										//echo trim(substr($row_item['item'],0,33));
										$total = $total + $row_item['bath']; 		
									}
							?>

								</div></td>
							<td style="vertical-align:middle"><?php 
										$ta=$row_item['staus'];  
													
										if ($ta== 0){
											  $pic = "image/status0.png";
											  $mes = "0/4-หน่วยงานส่งขอเบิก";
										  }elseif($ta == 1){
											  $pic = "image/status1.png";
											  $mes = "1/4-ตรวจสอบหลักฐานแล้ว";
										  }elseif($ta == 2){
											  $pic = "image/status2.png";
											  $mes = "2/4-ตัดยอดเงินงยประมาณแล้ว";
										  }elseif($ta== 3){
											  $pic = "image/status3.png";
											  $mes = "3/4-พัสดุทำ -PO-แล้ว";
										  }elseif($ta== 4){
											  $pic = "image/status4.png";
											  $mes = "4/4-เบิกจ่ายแล้ว";
										  }elseif($ta== 5){
											  $pic = "image/status5.png";
											  $mes = "มีข้อผิดพลาด";				  
										}
										 
											if ($ta== 5){
											  echo "<div align='center'><A HREF='e_rror1.php?i_del=$i_del' target='blank'><img src='$pic' width='50%' border='0' alt='$mes'></A></div> "; 
											}else{
											  echo "<div align='center' width='100'><img src='$pic' width='50%' border='0' alt='$mes'></div> "; 
											}
									?>
							</td>
							<?php
								if ($ta== 0){
								  echo "<td style='vertical-align:middle'><div align='center'>-</div></td>";
								}else
								  echo "<td style='vertical-align:middle'><div align='center'>".$row_item['date_pay']." น.</div></td>";
							?>
						  </tr>
						   <?php } while ($row_item = mysql_fetch_assoc($item)); 
						  }
						  else {

							  echo "<tr><td colspan=7 style='text-align:center'> <font size='4' color='#cc0033'>ไม่มีข้อมูลการเบิกจ่าย </font></td></tr>";
								  

						  }	   
						   ?>
						  


						</table>


<!-- end การแก้ไขข้อมูล -->
<?php include("./include/footer.inc");?>
                                    </body>
                                    </html>
