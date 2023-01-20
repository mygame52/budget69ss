<?php
$path="budget66";  // ชื่อโฟลเดอร์ของโปรแกรม
$dbserver = 'localhost';  //  
$dbuser = 'root';
$dbname= 'budget_data66';
$dbpass= "q=ku4flry0Gy";
//$objConnect = mysql_connect($dbserver,$dbuser,$dbpass) or die("Error Connect to Database");

 if(mysql_connect($dbserver,$dbuser,$dbpass)){     
       $objConnect = mysql_connect($dbserver,$dbuser,$dbpass);
	   $objDB = mysql_select_db($dbname);         
    } else {     
        include("./cantconnect/php");
    } 


mysql_query("SET NAMES UTF8");
//mysql_query("SET NAMES TIS620");
$timeformat="d/m/y - H:i";
$THdt= mktime(gmdate("H")+7,gmdate("i")+4,gmdate("s"),gmdate("m")  ,gmdate("d"),gmdate("Y"));

error_reporting(E_ALL);
mysql_query("SET NAMES UTF8");
$pro_use = "จังหวัดนครศรีธรรมราช";
$mess_title = "ระบบบริหารงบประมาณ : สำนักงาน กศน.".$pro_use;
$mess_header1 = "ระบบบริหารงบประมาณ e-Budget66";
$mess_header_graph = "Graph for Budget 2566";
$mess_header2 = "<br>สำนักงาน กศน.".$pro_use;
$mess_book = "สำนักงาน กศน.".$pro_use;
$mess_budget = "BMS : Budget Management Nakhon Si Thammarat";
$mess_province = $pro_use;;

?>
