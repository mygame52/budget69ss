<?php
require("config.inc.php");
mysql_connect($dbserver, $dbuser,$dbpass) or
				die("<hr><b> เชื่อมต่อฐานข้อมูลไม่ได้>");			
mysql_select_db($dbname) or  die("เลือกฐานข้อมูลไม่ได้");
 $sql = ("select * from amp ORDER BY id ASC");
$result_a = mysql_query($sql);
$fet_work = mysql_fetch_row($result_a);
$row_amp = mysql_num_rows($result_a); //จำนวนที่เลือกได้
do{
		$code_am = $fet_work['0']; 
//		echo $code_am."<BR>";
  	$tr_rab = 0;
	$tr_rua = 0;
	$sql_j = ("select * from judsun where amp like '$code_am'");
	$result_j = mysql_query($sql_j);
	$row_jud = mysql_num_rows($result_j);
 	//echo $fetcharr['1'];
 	for ($i=1; $i<= $row_jud; $i++){ 
	$fetcharr = mysql_fetch_row($result_j);
 		$tr_rab = $tr_rab + $fetcharr['4']+$fetcharr['5']+$fetcharr['6']+$fetcharr['7'];
	 	$tr_rua = $tr_rua + $fetcharr['8'];
	}
if ($tr_rab >= 1){
$per = $tr_rua * 100/ $tr_rab;
	}else{
	$per=0;
}
//	echo "รวมรับ".$tr_rab."<BR>";
//	echo "รวมจ่าย".$tr_rua."<BR>";
//	echo "เปอร์".$per."<BR>";

$sql_up = ("update  amp set per='$per' where id= '$code_am'");
$result = mysql_query($sql_up);

}while($fet_work = mysql_fetch_row($result_a))

?>
	  