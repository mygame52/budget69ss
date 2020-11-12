<?//แปลงวันที่ไปเป็น Timestamp
$date1 = mktime(0,0,0,1,1,2007); //15 กันยายน 2550
$date2 = mktime(0,0,0,2,1,2007); //1 พฤศจิกายน 2550

//หาผลต่าง
$diff = $date2-$date1;//ทำการแปลงจากผลต่างเป็นวินาทีเป็นระยะเวลา
$Days = floor($diff / 86400);

echo $Days."<br>";
echo date('Y-m-d',strtotime("now"));
?>



<?php //	session_start();
include("top16.php");
require_once('config.inc.php');  
 $j=0;
if($act  != "ok") {
	echo "ต้องเข้าสู่ระบบปกติ";
	exit();
}
error_reporting(0);
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">

<title>รายงาน ค้างเงินยืม</title>
</head>

<body>
<table width="90%" border="0" cellspacing="1" cellpadding="3" align="center">
<TR>
	<TD bgcolor="#FFFFCC">
		<? echo "<FONT SIZE='3' COLOR='#3300CC'><B>"; 
			echo "รายการค้างเงินยืม   :" ;
			echo $codework." สถานศึกษาต่าง ๆ  ".  $full_name;
			echo "</B></FONT>";  
          ?>
</TD>
<td bgcolor="#FFFFCC">
	<?php
			echo "<FORM METHOD=POST ACTION='budget11.php'>";
		    echo "<CENTER><input type='submit' name='Submit' value=' back' /></CENTER>";
			echo "</FORM>";
    ?> 
</td>
</TR>
</TABLE>

<TABLE width="90%" border="1" cellspacing="0" cellpadding="5" align="center">
  <tr bgcolor="#E3E1B7">
    <th scope="col">เลข ID</th>
    <th scope="col">รายการเงินยืม / โครงการ</th>
    <th scope="col">ผู้ยืม</th>
	<th scope="col"> จำนวนเงิน</th>
    <th scope="col"> ได้รับเมื่อ</th>
    <th scope="col">ยืมมา(วัน)</th>
    </tr>
	<?php
		mysql_select_db($dbname, $objConnect);
		$query_Recordset1 = "SELECT * FROM item where chk_id='1' and staus='4'";

		$dbquery = mysql_db_query($dbname, $query_Recordset1);
		$totalRows_Recordset1 = mysql_num_rows($dbquery);
		while ($result = mysql_fetch_array($dbquery))
			{		

				if ($totalRows_Recordset1==0)
				{
					echo "<tr><td colspan='6' align='center'>";
					echo "<font color='ff0000'>ไม่มีรายค้างเงินยืม</font>";
					echo "</td></tr>";
		//			exit;
				}else
			    { 
					$j++;; 	$i=($j%2); 
				  ?>


  <tr <?if($i !=1){echo "bgcolor='#EAE8C8'";}?> >
    <td><?php echo $row_Recordset1['id_item'];?></td>
    <td><?php echo $row_Recordset1['item'];?></td>
	<td>
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
	<!-- สิ้นสุดการดึงข้อมูล ผู้ยืมเงินจาก ฐานข้อมูล item_yuem  -->

	<td>
			<div align="right"> <!-- จำนวนเงินยืม -->
			<?php 
				echo "<font color='#990000'><strong>".number_format($row_Recordset1['bath'],2)."</strong></font>"; 
				$bath_total = $bath_total+$row_Recordset1['bath'];
			?>
			</div>
	</td>
	<td>
		<?php echo $row_Recordset1['date_pay']; ?>
	</td>
	<td>
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
					if ($Days > 30)
					{
					 echo $Days." วัน ";
					 echo "<img src='image/status-x.gif' width='150' height='43' border='0' alt='เร่งดำเนินการ'>";
					} else
					{
					  echo $Days;
					}

				}
		?>
		</div>
	</td>

	 <td>
		<div align="center"><!-- วันที่ -->
			<?php 
				// เช็คจำนวนวันที่ยืม
				if ($row_Recordset1['date_pay']=0)
					{
						echo "<font color='#ff0000'>";
						$test2 = STR_TO_DATE($row_Recordset1['date_pay']);
						echo $test2;
						echo "</font>";
					} else
					{
						echo "<font color='#ff0000'>";
						$test2 = STR_TO_DATE($row_Recordset1['date_pay']);
						echo $test2;
						echo "</font>";
					}
				// สิ้นสุดการเช็คจำนวนวันที่ยืม
				}

			?>
		</div>
	 </td>
  </tr>

<?php } ?>







    <tr bgcolor="#E9E7C7">
    <td scope="col" colspan="3" align="right">รวม </td>
    <td ><div align="right"><? echo number_format($bath_total,2);?></div></td>
    <th ><div align="right"><? echo "-";  ?></div></th>
    </tr>
</table>
</body>
</html>
<?php
	mysql_free_result($Recordset1);
?>
