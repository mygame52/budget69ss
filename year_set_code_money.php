<? 
include("config.inc.php");

/*** List Record ***/
$strSQL = "SELECT * FROM samnak ";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
//$objResult = mysql_fetch_array($objQuery);
$rows = mysql_num_rows($objQuery);
for ($i=1; $i <= $rows;$i++){
		$objResult = mysql_fetch_assoc($objQuery);
		$cod[$i]=trim($objResult['code_sam']);
		$pee[$i]=$objResult['mony_pee'];
	 }

for ($i=1; $i <= $rows;$i++){
 $sql = "select  sum(mony_ma) from samnakma where trim(code_ma) ='$cod[$i]'";
					  $result = mysql_query($sql);
					  $row=mysql_fetch_row($result);
					  $sumdai = $row[0];

            $sql_up = ("update  samnak set  mony_ma='$sumdai' where trim(code_sam)= '$cod[$i]'");
           $result = mysql_query($sql_up);
			 if($pee[$i] < $sumdai){	
			   $sql_up = ("update  samnak set  mony_pee='$sumdai' where trim(code_sam)= '$cod[$i]'");
               $result = mysql_query($sql_up);
		   }
}
mysql_close($objConnect);
	 echo "<meta http-equiv=\"refresh\" content=\"0;URL=year_code_money.php\" />";

?>
