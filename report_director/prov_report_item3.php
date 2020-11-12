<?php require_once("../config.inc.php");  
	session_unregister('sel3');
	$jsel3 = $_REQUEST['sel3'];
	include("../help_yod4.php");  //ไปอ่านค่ามาแล้ว
	session_register('sel3','work');

	mysql_select_db($dbname, $objConnect);
	$j=0;



	mysql_select_db($dbname, $objConnect);
	$query_Recordset1 = "SELECT * FROM item where amp_item like '$sel' and c_khong like '$jsel3' ORDER BY id_item DESC";
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

    <link rel="stylesheet" href="../style.css" type="text/css" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->

    <script type="text/javascript" src="../jquery.js"></script>
    <script type="text/javascript" src="../script.js"></script>

</head>
<body>
<?php include '../include/header.inc.php'; ?>
            <div class="cleared reset-box"></div>
<div class="rnut-bar rnut-nav">
<div class="rnut-nav-outer">
	<ul class="rnut-hmenu">
		<li>
                    <a href="../menu_director.php" class="active">Back</a>
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
						<h2 class="rnut-postheader" style="text-align: center;">รายงานงบประมาณ:รายการเบิกจ่าย</h2>
                        <!-- <div class="rnut-postcontent">
							<p style="text-align: center;">test1</p>
							<p style="text-align: center;">test2</p>
		                </div> -->
<!-- start การแก้ไขข้อมูล -->

							<table width="95%" align="center" border="0" cellspacing="0" cellpadding="3">
							  <tr bgcolor="#A8A340">
								<th scope="col">รหัสงาน</th>
								<th scope="col">รายการ</th>
								<th scope="col">ที่เอกสาร</th>
								<th scope="col">เวลาที่บันทึก</th>
								<th scope="col">จำนวนเงิน</th>
								<th scope="col">สถานะ</th>
								<th scope="col">เจ้าหน้าที่</th>
								<!--     <th scope="col">ลบ</th> --> 
							</tr>
							 <?php $total=0;?>
							   <?php do {   
									$j++;
									$i=($j%2);
								?>
								<tr <?php if($i!=1){echo "bgcolor='#FFFF99'";}?> >
								 
								  <?php // $row_Recordset1['id_item']; ?>
								  <?php $i_del=$row_Recordset1['id_item']; ?>	  
								  <td><?php echo $row_Recordset1['c_khong']; ?></td>
								  <td><?php echo $row_Recordset1['item']; ?></td>
								  <td><?php echo $row_Recordset1['doc']; ?></td>
								  <td><?php echo $row_Recordset1['date_time']; ?></td>
								  <td><div align ="right">
								  <?php echo number_format($row_Recordset1['bath'],2); 
								   $total = $total+$row_Recordset1['bath'];?></div></td>
									 <td><?php $ta = $row_Recordset1['staus']; 
											 if ($row_Recordset1['bath'] < 1){
											 }else{						
											if ($ta== 0){
												  $pic = "../image/status0.png";
												  $mes = "0/4-หน่วยงานส่งขอเบิก";
											  }elseif($ta == 1){
												  $pic = "../image/status1.png";
												  $mes = "1/4-ตรวจสอบหลักฐานแล้ว";
											  }elseif($ta == 2){
												  $pic = "../image/status2.png";
												  $mes = "2/4-ตัดยอดเงินงยประมาณแล้ว";
											  }elseif($ta== 3){
												  $pic = "../image/status3.png";
												  $mes = "3/4-พัสดุทำ -PO-แล้ว";
											  }elseif($ta== 4){
												  $pic = "../image/status4.png";
												  $mes = "4/4-เบิกจ่ายแล้ว";
											  }elseif($ta== 5){
												  $pic = "../image/status5.png";
												  $mes = "มีข้อผิดพลาด";				  
											}											 
												if ($ta== 5){
												  echo "<div align='center'><A HREF='../e_rror1.php?i_del=$i_del' target='_blank'><img src='$pic'  width='30%' border='0' alt='$mes'></A></div> "; 
												}else{
												  echo "<div align='center'><img src='$pic'  width='60%' border='0' alt='$mes'></div> "; 
												} 
											 }
											   ?>
									</td>
								  <td><?php echo $row_Recordset1['user']; ?></td>
								   <!-- <td><div align="center"><a href="del_up.php?i_del=<?echo"$i_del"; ?>">ลบ</a></div></td> -->
								</tr>
								<?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
							</table>
							<table width="95%" align="center" border="2" cellspacing="1" cellpadding="3">
							<tr bgcolor="#A8A340">
								<TD><CENTER><?php echo "รวมเป็นเงิน ".number_format($total,2);?></CENTER></TD>
							</TR>
							</TABLE>

							<table width="95%" align="center" border="0" cellspacing="1" cellpadding="3">
							<TR>
								<TD>  สรุป</TD>
							</TR>
							</TABLE>
							<?php
							//////////////////ต่อ แสดงยอดจัดสรร
							$codework = $jsel3;
							///echo "							สรุป";
							mysql_free_result($Recordset1);
							mysql_select_db($dbname, $objConnect);
							$query_ijud = "SELECT * FROM judsun where code like '$codework' ";
							$ijud = mysql_query($query_ijud, $objConnect) or die(mysql_error());
							$row_ijud = mysql_fetch_assoc($ijud);

							?> 
							<table width="95%" align="center" border="0" cellspacing="1" cellpadding="3">
							  <tr bgcolor="#B7B146">
								<!-- <th scope="col">รหัส ศบอ.</th> -->
								<th scope="col">รหัสโครงการ</th>
								<th scope="col">ชื่อ งาน </th>
								<th scope="col">จัดสรร</th>
								<th scope="col">จ่าย</th>
								<th scope="col">เหลือ </th>
								<th scope="col">หมายเหตุ</th>
							  </tr>
							  <tr bgcolor="#CDC97C">
								<!-- <td><?php echo $row_item['amp_item']; ?></td> -->
								<td><?php echo $row_ijud['code']; ?></td>
								<td><?php //echo $row_ijud['work']; 
													echo $work;		
										?></td>
								<td><div align="right"><?php  $trab = $row_ijud['rab']+$row_ijud['rab2']+$row_ijud['rab3']+$row_ijud['rab4'];
									echo number_format($trab,2); ?></div></td>
								<td><div align="right"><?php echo number_format($row_ijud['rua'],2); ?></div></td>
								<td><div align="right"><?php echo number_format($trab-$row_ijud['rua'],2); ?></div></td>

								<?php 
									//if (($row_ijud['rab'] - $total) <> $row_ijud['rua'])  {$mark = "ผิดพลาด";}
									//else {$mark = "ถูกต้อง";}   ?>

							   <td><FONT SIZE="" COLOR="#FF0000"><?
							   $per = $row_ijud['rua']*100/$trab;
							   echo "= ".number_format($per,2) ." %"?></FONT> </td>
							  </tr>
							 </table><HR>

<!-- end การแก้ไขข้อมูล -->
                <div class="cleared"></div>
                </div>

		<div class="cleared"></div>
    </div>
</div>

                          <div class="cleared"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cleared"></div>
            <div class="rnut-footer">
                <div class="rnut-footer-body">
                    <a href="#" class="rnut-rss-tag-icon" title="RSS"></a>
                            <div class="rnut-footer-text">
                                <p><?php echo $mess_header2?></p>

<p>Rnut@Surat</p>

<p>Copyright © 2014. All Rights Reserved.</p>
                                                            </div>
                    <div class="cleared"></div>
                </div>
            </div>
    		<div class="cleared"></div>
        </div>
    </div>
    <div class="cleared"></div>
    <p class="rnut-page-footer"><a href="http://www.artisteer.com/?p=website_templates" target="_blank">Website Template</a> created with Artisteer by <a href="surat.nfe.go.th" target="_blank">Rnut@Surat</a>.</p>
    <div class="cleared"></div>
</div>

</body>
</html>