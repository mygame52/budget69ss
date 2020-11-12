<?php //	session_start();
include("top16.php");?>
<?php require_once('config.inc.php');  
//------------

//------------
 $j=0;
if($act  != "ok") {
	echo "ต้องเข้าสู่ระบบปกติ";
	exit();
}

mysql_select_db($dbname, $objConnect);
$query_Recordset1 = "SELECT * FROM item where amp_item = '$sele_amp' and chk_id='1' and staus='4' ORDER BY id_item ASC";

$Recordset1 = mysql_query($query_Recordset1, $objConnect) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

error_reporting(0);
mysql_select_db($dbname, $objConnect);

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">

<title>รายงาน :: รายการค้างเงินยืม</title>
</head>

<body>
<table width="1000" border="0" cellspacing="1" cellpadding="3" align="center">
<TR>
	<TD bgcolor="#FFFFCC">
		<?php echo "<FONT SIZE='3' COLOR='#3300CC'><B>"; 
			echo "รายการค้างเงินยืม   :" ;
			echo $codework." =>  ".  $full_name;
			echo "</B></FONT>";  
          ?>
</TD>
<td bgcolor="#FFFFCC">
	<?php
			echo "<FORM METHOD=POST ACTION='sob1.php'>";
		    echo "<CENTER><input type='submit' name='Submit' value=' back' /></CENTER>";
			echo "</FORM>";
    ?> 
</td>
</TR>
</TABLE>

<TABLE width="1000" border="1" cellspacing="0" cellpadding="5" align="center">
  <tr bgcolor="#E3E1B7">
    <th scope="col">เลข ID</th>
    <th scope="col">รายการเงินยืม / โครงการ</th>
    <th scope="col">ผู้ยืม</th>
	<th scope="col"> จำนวนเงิน</th>
    <th scope="col"> ได้รับเมื่อ</th>
    </tr>
  <?php do { 
	$j++; 	$i=($j%2); 
  ?>
  <tr <?php if($i !=1){echo "bgcolor='#EAE8C8'";}?> >
    <td><?php echo $row_Recordset1['id_item'];?></td>
    <td><?php echo $row_Recordset1['item'];?></td>

<!-- ดึงข้อมูล ผู้ยืมเงินจาก ฐานข้อมูล item_yuem  -->
<?php
	$id_yuem_ = $row_Recordset1['id_yuem'];
//	mysql_select_db($dbname, $objConnect);
	$sql="SELECT * FROM item_yuem where id_yuem =$id_yuem_";

	$dbquery = mysql_db_query($dbname, $sql);
	$num_rows = mysql_num_rows($dbquery);$i=1;
	if ($i == $num_rows)
	{ 
		$result = mysql_fetch_array($dbquery);
		$citizenid_ = $result[1];
		$person_ = $result[2];
	}
?>
	<td><?php echo $citizenid_,':',$person_;?></td>
<!-- สิ้นสุดการดึงข้อมูล ผู้ยืมเงินจาก ฐานข้อมูล item_yuem  -->

	<td><div align="right"> <!-- จำนวนเงินยืม -->
		<?php echo "<font color='#990000'><strong>".number_format($row_Recordset1['bath'],2)."</strong></font>"; 
		$bath_total = $bath_total+$row_Recordset1['bath'];
		?>
     </div></td>				    
	<td><div align="right"><!-- วันที่ -->
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

  </tr>
   <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
    <tr bgcolor="#E9E7C7">
    <td scope="col" colspan="3" align="right">รวม </td>
    <td ><div align="right"><?php echo number_format($bath_total,2);?></div></td>
    <th ><div align="right"><?php echo "-";  ?></div></th>
    </tr>
</table>
</body>
</html>
<?php
	mysql_free_result($Recordset1);
?>
