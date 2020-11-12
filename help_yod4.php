<?php //session_start( );

 require_once('config.inc.php');  
mysql_select_db($dbname, $objConnect);
$query_search = "SELECT * FROM judsun where code = $jsel3";
$result = mysql_query($query_search);
$nums_rows = mysql_num_rows($result);

if ($nums_rows >= 1)
  {
		$fet = mysql_fetch_array($result);
		//$aa = $fet['work'] ;
		$bb = $fet['rab'] ;
		$bb2 = $fet['rab2'] ;
		$bb3 = $fet['rab3'] ;
		$bb4 = $fet['rab4'] ;

		$cc = $fet['rua'] ;


		session_unregister('M_rab');
		session_unregister('M_rab2');
		session_unregister('M_rab3');
		session_unregister('M_rab4');
		session_unregister('M_rua');
		//session_unregister('N_work');
		//$_SESSION['C_work'] = $sel3 ;
		SESSION_REGISTER('M_rab','M_rua','M_rab2','M_rab3','M_rab4','N_work');
		$_SESSION['M_rab'] = $bb ;
		$_SESSION['M_rab2'] = $bb2 ;
		$_SESSION['M_rab3'] = $bb3 ;
		$_SESSION['M_rab4'] = $bb4 ;
		$_SESSION['M_rua']= $cc;
		//$_SESSION['N_work']  = $aa;
		$cod_work = trim(substr($jsel3,2));
		//หาชื่องานใหม่ใน work
		//$query_search1 = "SELECT w_name FROM work where w_code = trim(substr($sel3,2))";
		$query_search1 = "SELECT w_name FROM work where w_code = '$cod_work'";
		$result1 = mysql_query($query_search1);
		$fet1 = mysql_fetch_array($result1);
		//$numrows = mysql_num_rows($result1);
		$aa = $fet1['w_name'] ;
		session_register('cod_work');
		session_register('work');
		$work=$aa;
		//echo " help".$work;
		//echo " aa".$cod_work; 

	} else {
		echo "ไม่พบ <br>";

}

?>