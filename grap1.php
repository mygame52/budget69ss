<?php
// Files Name : report1.php
// For   :แสดงข้อมูลยอดรวมของจัดสรร  
require("config.inc.php");
mysql_connect($dbserver, $dbuser,$dbpass) or
				die("<hr><b> เชื่อมต่อฐานข้อมูลไม่ได้>");
				
mysql_select_db($dbname) or  die("เลือกฐานข้อมูลไม่ได้");
 
$sql = ("select * from samnak ORDER BY code_sam ASC");
$result = mysql_query($sql);
$num_rows = mysql_num_rows($result); //จำนวนที่เลือกได้
?>

 <?php
	$t_pay = 0;
 	$tr_rab = 0;
	$tr_rua = 0;
	$tpee = 0;
 	for ($i = 1;$i <= $num_rows ; $i++) {
		$fet_work = mysql_fetch_array($result);
		$code_w = trim($fet_work['code_sam']); 
		$name_w = $fet_work['name_sam']; 
		$ngen_w = $fet_work['mony_pee'];
	$r_rab = 0;
	$r_pay = 0;
	$sql_j = ("select * from judsun where mid(code,3,4) like '$code_w'");
	$result_j = mysql_query($sql_j);
	$num_rows_j = mysql_num_rows($result_j); //จำนวนที่เลือกได้
    //echo "จำนวนในจัดสรร".$num_rows_j."<BR>";
	for ($j=1;$j <= $num_rows_j;$j++){
		$fetcharr = mysql_fetch_array($result_j);
		//$id = $fetcharr['code'];
		//$name = $fetcharr['work'];
		$r_rab = $r_rab + $fetcharr['rab']+$fetcharr['rab2'];
		$r_pay = $r_pay + $fetcharr['rua'];
	}
	
				$t_pay=$t_pay + $r_pay;		
				$tpee=$tpee+$ngen_w;  
		
			    $tr_rab=$tr_rab + $r_rab;	  

	}
	?>
	<?php 
	    //echo $tpee."<BR>";
		//echo $tr_rab."<BR>";
		//echo $t_pay."<BR>";
		if(($t_pay<>0) or ($tpee<>0))
		{}else
			{$t_pay=1;	
			  $tpee=1;
			}
		 
		 $grap1 = ($t_pay * 100) / $tpee ;

		 //echo $grap1 ; 

$jp = 360*$grap1/100;
//session_register("grap");
$k = 360-$jp;
$f1= fopen("grap.ini","w");
	fputs($f1,$jp);
fclose($f1);
?>
