<?php 
// ไฟล์ แก้ไขจำนวนเงินทั้งปี ถ้าจำนวนเงินที่โอนมาแล้วมากก่วาเงินทั้งปี (แก้ให้มันเท่ากับเงินมา)
//จะถูกเรียกใช้  report2.php รายงานรวม  w_ma2.php เมนูเข้ามาดูเพื่อ แก้ไขเงินมา

//include("top.php");
include('config.inc.php'); 
//////////////////////////////////////////////////////////////////////////////////////////////
mysql_select_db($dbname, $objConnect);
$query_Recordset1 = "SELECT * FROM samnak  ORDER BY code_sam ASC";
$Recordset1 = mysql_query($query_Recordset1, $objConnect) or die(mysql_error());
//$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
////////////////////////////////////////////////////////  เก็บค่ารหัส งปม.จากไฟล์ samnak
	//echo "ทั้งหมด แถว".$totalRows_Recordset1."<BR>";
	for ($i=1; $i <= $totalRows_Recordset1;$i++){
		$row_Recordset1 = mysql_fetch_assoc($Recordset1);
		$cod[$i]=trim($row_Recordset1['code_sam']);
		$pee[$i]=$row_Recordset1['mony_pee'];

		//echo $i."=".$cod[$i]."<BR>";  /////////////////แสดงการหารหัส 4 หลักของ งปม ในsamnak
	 }
					mysql_select_db($dbname, $objConnect);
	for ($i=1; $i <= $totalRows_Recordset1;$i++){
					  $sql = "select  sum(mony_ma) from samnakma where code_ma ='$cod[$i]'";
					  $result = mysql_query($sql);
					  $row=mysql_fetch_row($result);
					  $sumdai = $row[0];
	 //	echo "เงินปี".$pee[$i];
		//echo "<br>";
		//echo  "รีเซา"."<BR>" ;
	//		echo "รวมได้".$cod[$i].$sumdai."<BR>";    ///////////แสดงผลรวมที่ได้
           $sql_up = ("update  samnak set  mony_ma='$sumdai' where code_sam= '$cod[$i]'");
           $result = mysql_query($sql_up);
           if($pee[$i] < $sumdai){	
			   $sql_up = ("update  samnak set  mony_pee='$sumdai' where code_sam= '$cod[$i]'");
               $result = mysql_query($sql_up);
		   }
    }  // ของ for	

?>
