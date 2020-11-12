<?php 	session_start();
require_once('config.inc.php');  
$j=0;
if($act  != "ok") {
	echo "ต้องเข้าสู่ระบบปกติ";
	exit();
}
mysql_select_db($dbname, $objConnect);
$query_Recordset1 = "SELECT * FROM item where amp_item = '$sele_amp' ORDER BY id_item DESC";

//$query_Recordset1 = "SELECT * FROM item where amp_item = '$sele_amp' and chk_id='2' ORDER BY id_item ASC";

$Recordset2 = mysql_query($query_Recordset1, $objConnect) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset1 = mysql_num_rows($Recordset2);

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
        <title><?php echo $mess_title ?></title>

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
                        <a href="./menu_amp" class="active">Back</a>
                    </li>
                    <li><font size="3" color="#FFCCCC">
                            <?php
                            echo "หน่วยงาน   : " . $sele_amp;
                            echo " : " . $full_name;
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
                                    <h2 class="rnut-postheader" style="text-align: center;">รายการล้างเงินยืม ทั้งหมด</h2>

                                    <!-- // Start editor -->


<br>
<body width="100%">
<TABLE width="100%" border="1" cellspacing="0" cellpadding="5" align="center">
					  <tr bgcolor="#E3E1B7">
						<td scope="col" style="text-align:center"><font size="3" color="#6633ff">เลข ID</font></td>
						<td scope="col" style="text-align:center"><font size="3" color="#6633ff">รายการเงินยืม / โครงการ</font></td>
						<td scope="col" style="text-align:center"><font size="3" color="#6633ff">สถานะ</font></td>
						<td scope="col" style="text-align:center"><font size="3" color="#6633ff">จำนวนเงิน</font></td>
						<td scope="col" style="text-align:center"><font size="3" color="#6633ff">วันที่ล้าง</font></td>
					  </tr>
				<?php if ($totalRows_Recordset1==0)
				{ 
					echo "<tr><td colspan='6'>";
					echo "<br><center> <font size='3' color='cc0033'>ไม่มีรายการค้างเงินยืม</font></center><br>";
					echo "</td></tr>";
				}	
				else
					{
				$ch ==0; // ตัวแปรตรวจสอบจำนวนเงินล้าง
				?>
  <?php do { 
	$j++; 	$i=($j%2); 
	
//-------------------------------------------------
	$check_item = $row_Recordset2['item'];
//	echo "item = ".substr($check_item,0,36)."<br>";
	if ( substr($check_item,0,36) == "ล้างเงินยืม :-")
	{  $ch = 1;
  ?>	 
	 <tr <?if($i !=1){echo "bgcolor='#FFCCFF'";}?> class='off unamed1' onmouseover=this.className='ongreen' onmouseout=this.className='off' style='cursor:hand' > 
    <td style="text-align:center;vertical-align:middle"><?php echo $row_Recordset2['id_item'];?></td>
    <td style="text-align:left;vertical-align:middle"><?php echo $row_Recordset2['item']; ?></td>
    <td style="text-align:left;vertical-align:middle">
	<?php 	
				$ta=$row_Recordset2['staus']; 
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

	
	<td style="text-align:right;vertical-align:middle"><div align="right"> <!-- จำนวนเงินยืม -->
		<?php echo "<font color='#990000'><strong>".number_format($row_Recordset2['bath'],2)."</strong></font>"; 
		$bath_total = $bath_total+$row_Recordset2['bath'];
		?>
		</div>
	 </td>
	<td style="text-align:center;vertical-align:middle"><div align="right"><!-- วันที่ล้าง-->
	<?echo $row_Recordset2['date_time']?>
	</div></td>
  </tr>
   <?php 
		} // end if check ชื่อ การล้างเงินยืม
	  } // end do   
	while ($row_Recordset2 = mysql_fetch_assoc($Recordset2)); 

		if($ch==0)
			{				
					echo "<tr><td colspan='6'>";
					echo "<br><center> <font size='3' color='cc0033'>ยังไม่มีการล้างเงินยืม</font></center><br>";
					echo "</td></tr>";
			}
?>	
 <?php } ?>
</table>
<br>

                                                    <!-- end การแก้ไขข้อมูล -->
<?php include("./include/footer.inc");?>
                                    </body>
                                    </html>
