<html>  
<head>
<title>โปรแกรมบริหารงบประมาณ</title>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
</head>
<body>
<?php
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
		//echo $i."<BR>";
		$fet_work = mysql_fetch_array($result);
		$code_w[$i] = trim($fet_work['code_sam']); 
		$nam_w[$i] = $fet_work['nam_sam']; 
		$ngen_p[$i] = $fet_work['mony_pee'];
		//echo $code_w[$i];
	$r_rab = 0;
	$r_pay = 0;
	$sql_j = ("select * from judsun where mid(code,3,4) like '$code_w[$i]'");
	$result_j = mysql_query($sql_j);
echo mysql_error(); 

	$num_rows_j = mysql_num_rows($result_j); //จำนวนที่เลือกได้
    //echo "จำนวนในจัดสรร".$num_rows_j."<BR>";
			for ($j=1;$j <= $num_rows_j;$j++){
				$fetcharr = mysql_fetch_array($result_j);
				//$id = $fetcharr['code'];
				//$name = $fetcharr['work'];
			//	$r_rab = $r_rab + $fetcharr['rab']+$fetcharr['rab2'];
				$r_pay = $r_pay + $fetcharr['rua'];
			}
	
				//$t_pay=$t_pay + $r_pay;		
				//$tpee=$tpee+$ngen_w;  
		
			    $mony_pay[$i]=$r_pay;	  

	}
	//echo $i;
	?>
	
     <?php for ($i=1; $i<= $num_rows; $i++){ 

				$pee[$i]=number_format($ngen_p[$i],2);
				$pay[$i]=number_format($mony_pay[$i],2);
				if ($ngen_p[$i] > 0){
				$per[$i]=number_format($mony_pay[$i]*100/$ngen_p[$i],2);
				}else{ $per[$i]=0;}
       } 

		$f1= fopen("grap/grap_bar.ini","w");				
		for ($i=1; $i<= $num_rows; $i++){
//		fputs($f1,$code_w[$i]."  ".$nam_w[$i]."   ".$pee[$i]."  ".$pay[$i]."  ".$per[$i]."<BR>\n");
		fputs($f1,$nam_w[$i]."   ".$per[$i]."  "."<BR>\n");

		}
		fclose($f1);
		$tt = number_format($num_rows,2);
		$f2= fopen("grap/bar_bar.ini","w");  //เก็บจำนวนแท่งกราฟ
		fputs($f2,$tt);
		fclose($f2);

		//ไฟล์  อ่านและแยกคำอยู่ที่ fgets_explode.php
?>
</body>
</html>
