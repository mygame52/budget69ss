<?php 	session_start();
require_once('config.inc.php');  
$j=0;
	if (trim($hid1) <> "03") {
		echo "	<SCRIPT language='JavaScript'>";
		echo "			alert('ท่านเข้าสู่ระบบไม่ถูกต้อง')";
		echo"			location.href='index.php'";
		echo"	</SCRIPT>";
	   exit();
	}
mysql_select_db($dbname, $objConnect);
$query_Recordset1 = "SELECT * FROM item where chk_id='1' and staus='4' and amp_item <> '00' ORDER BY amp_item ASC";

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
<body>
<?php include 'include/header.inc.php'; ?>

            <div class="cleared reset-box"></div>
<div class="rnut-bar rnut-nav">
<div class="rnut-nav-outer">
	<ul class="rnut-hmenu">
		<li>
			<a href="./menu_director.php" class="active">Back</a>
		</li>
		<li><font size="3" color="FFFFFF">
			<?php 
			echo "ผู้ใช้งาน   : ".$user_;
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
						<h2 class="rnut-postheader" style="text-align: center;">รายงานเงินยืม ค้างส่ง  กศน.อำเภอ</h2>


<!-- // Start editor -->

<br>
<body width="100%">
<TABLE width="100%" border="1" cellspacing="0" cellpadding="5" align="center">
					  <tr bgcolor="#E3E1B7">
						<td scope="col" style="text-align:center"><font size="3" color="#6633ff">เลข ID</font></td>
						<td scope="col" style="text-align:center"><font size="3" color="#6633ff">กศน.อำเภอ</font></td>
						<td scope="col" style="text-align:center"><font size="3" color="#6633ff">รายการเงินยืม </font></td>
						<td scope="col" style="text-align:center"><font size="3" color="#6633ff">ผู้ยืม</font></td>
						<td scope="col" style="text-align:center"><font size="3" color="#6633ff">จำนวนเงิน</font></td>
						<td scope="col" style="text-align:center"><font size="3" color="#6633ff">ได้รับเมื่อ</font></td>
						<td scope="col" style="text-align:center"><font size="3" color="#6633ff">จำนวนยืม (วัน)</font></td>
						<td scope="col" style="text-align:center"><font size="3" color="#6633ff">สถานะ</font></td>
						<td scope="col" style="text-align:center"><font size="3" color="#6633ff">งปม.</font></td>

					  </tr>
<?php 
	if($totalRows_Recordset1==0)
	{
		echo "<tr><td colspan='7' style='text-align:center'><font size='3'>ไม่มีข้อมูล</font></td></tr>";
		exit;
	}
?>
  <?php do { 
	$j++; 	$i=($j%2); 
  ?>
  <tr <?if($i!=1){echo "bgcolor='#EAE8C8'";}?> >
    <td style="text-align:center;vertical-align:middle">
	<?php echo $row_Recordset1['id_item'];?></td>
    <td style="text-align:left;vertical-align:middle">
							<?php
								// ดึงข้อมูล รายชื่ออำเภอจากแฟ้ม Amp
								$amp_itemfrom_ = $row_Recordset1['amp_item'];

									$psql="SELECT * FROM amp where id =$amp_itemfrom_";
									$dbquery = mysql_db_query($dbname, $psql);
									$num_rows = mysql_num_rows($dbquery);
									while ($result = mysql_fetch_array($dbquery))
									{
										$amp_item_= $result[id];
										$Name_ = $result[Name];
										echo $amp_item_." : ".$Name_;
									}

							?>
	
	</td>
    <td style="text-align:left;vertical-align:middle">
	<?php echo $row_Recordset1['item'];	?></td>
    
						<td style="text-align:left;vertical-align:middle">
							<!-- <td><?php echo $row_Recordset1['id_yuem'];?></td> -->
							<!-- ดึงข้อมูล ผู้ยืมเงินจาก ฐานข้อมูล item_yuem  -->
							<?php
								$id_yuem_ = $row_Recordset1['id_yuem'];
								if ($id_yuem_<>0)
								{
									$psql="SELECT * FROM person_yuem where id_yuem =$id_yuem_";
									$dbquery = mysql_db_query($dbname, $psql);
									$num_rows = mysql_num_rows($dbquery);
									while ($result = mysql_fetch_array($dbquery))
									{
										$citizenid_= $result[citizenid];
										$person_ = $result[person];
										echo $citizenid_." : ".$person_;
									}
								} 
								else
								{ 	echo "-";	}
							?>
						</td>

	
	<td style="text-align:right;vertical-align:middle"><div align="right"> <!-- จำนวนเงินยืม -->
		<?php echo "<font color='#990000'><strong>".number_format($row_Recordset1['bath'],2)."</strong></font>"; 
		$bath_total = $bath_total+$row_Recordset1['bath'];
		?>
		</div>
	 </td>
	<td style="text-align:center;vertical-align:middle"><div align="right"><!-- วันที่ ที่ได้ -->
		<?php 
		  if ($row_Recordset1<>0) 
			{
			if ($row_Recordset1['date_pay']=="")
				{
					echo "<font color='#ff0000'>ยังไม่ผ่านการอนุมัติ</font>";
				} else
				{
					echo "<font color='#000099'>".$row_Recordset1['date_pay']."</font>"." น.";
				}
			}
		?>
	 </div></td>

						<td style="text-align:center;vertical-align:middle">  <!-- จำนวนวันที่ยืมมา -->
							<div align="center"><!-- วันที่ -->
							<?php 
								if ($row_Recordset1['date_pay']=='')
									{
										echo "<font color='#ff0000'>ยังไม่อนุมัติ</font>";
									} else
									{
									// แปลงวัันที่จากรายการจ่ายในฐานข้อมูล
										$date_yuem11 = substr($row_Recordset1['date_pay'],0,10);
										$yd = substr($date_yuem11,0,2);
										$ym = substr($date_yuem11,3,2);
										$yy = substr($date_yuem11,6,4);
										$ydd = mktime(0,0,0,$ym,$yd,$yy);
					//					echo $yd."/".$ym."/".$yy;
					//					echo $ydd;
									// แปลงวันที่จากปัจจุบัน
										$date_now = date('Y-m-d',strtotime("now"));
										$ny = substr($date_now,0,4);
										$nm = substr($date_now,5,2);
										$nd = substr($date_now,8,2);
										$ndd = mktime(0,0,0,$nm,$nd,$ny);
					//					echo "  -  ";
					//					echo $nd."/".$nm."/".$ny;
					//					echo $ndd;
									// คำนวณ หาจำนวนวัน
										$diff = $ndd-$ydd;//ทำการแปลงจากผลต่างเป็นวินาทีเป็นระยะเวลา
										$Days = floor($diff / 86400);
										{
										  if($Days<1) { $Days=0;}			
										  echo $Days;
										}

										//$day = floor((strtotime($end_date) – strtotime($start_date))/(60*60*24)); 
										//	echo $day;

									}
							?>
							</div>
						</td>

						 <td width="150" style="text-align:center;vertical-align:middle">
							<div align="center"><!-- ตรวจสอบ status -->
								<?php 
										if ($Days > 30)
										{
										 echo "<img src='image/status-xx.gif' width='60%' border='0'>";
										}else {
										echo "-";
										}
								
								?>
							</div>
						 </td>
						 <td style="text-align:center;">
							 <?echo $row_Recordset1['c_khong'];?>
							 	
						 </td>





  </tr>
   <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
     <tr bgcolor="#E9E7C7">
    <th scope="col" colspan="6" style="text-align:right;vertical-align:middle">รวม </th>
    <th ><div align="right"><? echo number_format($bath_total,2);?></div></th>
    </tr>
</table>


<!-- end การแก้ไขข้อมูล -->
<?php include("./include/footer.inc");?>
                                    </body>
                                    </html>


<?php
	mysql_free_result($Recordset1);
?>