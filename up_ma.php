<?php include('config.inc.php'); 
//////////////////////////////////////////////////////////////////////////////////////////////
mysql_select_db($dbname, $objConnect);
$query_Recordset1 = "SELECT * FROM samnak  ORDER BY code_sam ASC";
$Recordset1 = mysql_query($query_Recordset1,$objConnect) or die(mysql_error());
//$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
////////////////////////////////////////////////////////  เก็บค่ารหัส งปม.จากไฟล์ samnak
	for ($i=1; $i <= $totalRows_Recordset1;$i++){
		$row_Recordset1 = mysql_fetch_assoc($Recordset1);
		$cod[$i]=$row_Recordset1['code_sam'];
		///echo $i."=".$cod[$i]."<BR>";  /////////////////แสดงการหารหัส 4 หลักของ งปม ในsamnak
	 }
				/*			echo "<BR>";
				 // $dbserver = 'localhost';
					 // $dbuser = 'root';
					 // $dbname= 'budget_data';
					 // $dbpass= "";
					  mysql_connect($dbserver, $dbuser,$dbpass) or
														die("<hr><b> ติดต่อ server ไม่ได้>");

					mysql_select_db($dbname) or  die("ติดฐานข้อมูลไม่ได้");
    */                
					mysql_select_db($dbname, $objConnect);
	for ($i=1; $i <= $totalRows_Recordset1;$i++){
					  $sql = "select  sum(mony_ma) from samnakma where code_ma ='$cod[$i]'";
					  $result = mysql_query($sql);
					  $row=mysql_fetch_row($result);
					  $sumdai = $row[0];

			//echo "รวมได้".$cod[$i].$sumdai."<BR>";    ///////////แสดงผลรวมที่ได้
           $sql_up = ("update  samnak set  mony_ma='$sumdai' where code_sam= '$cod[$i]'");
           $result = mysql_query($sql_up);
 
	}


?>
