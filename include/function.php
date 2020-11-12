<?php
function get_real_ip()
{
		$ip = false;
		if(!empty($_SERVER['HTTP_CLIENT_IP']))
		{
		$ip = $_SERVER['HTTP_CLIENT_IP'];
		}
		if(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
		{
		$ips = explode(", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
		if($ip)
		{
		array_unshift($ips, $ip);
		$ip = false;
		}
		for($i = 0; $i < count($ips); $i++)
		{
		if(!preg_match("/^(10|172\.16|192\.168)\./i", $ips[$i]))
		{
		if(version_compare(phpversion(), "5.0.0", ">="))
		{
		if(ip2long($ips[$i]) != false)
		{
		$ip = $ips[$i];
		break;
		}
		}
		else
		{
		if(ip2long($ips[$i]) != - 1)
		{
		$ip = $ips[$i];
		break;
		}
		}
		}
		}
		}
return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
}


function ThaiTimeMini($timestamp="",$mini=""){
	global $SHORT_MONTH, $FULL_MONTH, $DAY_SHORT_TEXT, $DAY_FULL_TEXT;
	$day = date("l",$timestamp);
	$month = date("n",$timestamp);
	$year = date("Y",$timestamp);
	$time = date("H:i:s",$timestamp);
	$times = date("H:i",$timestamp);

	    $ThaiText = date("j",$timestamp);

return $ThaiText;
}

//convert thai
function ThaiTimeConvert($timestamp="",$full="",$showtime=""){
	global $SHORT_MONTH, $FULL_MONTH, $DAY_SHORT_TEXT, $DAY_FULL_TEXT;
	$day = date("l",$timestamp);
	$month = date("n",$timestamp);
	$year = date("Y",$timestamp);
	$time = date("H:i:s",$timestamp);
	$times = date("H:i",$timestamp);
	if($full){
		$ThaiText = $DAY_FULL_TEXT[$day]." "._TIME_AT." ".date("j",$timestamp)." "._MONTH_AT." ".$FULL_MONTH[$month]." "._YEAR_AT."".($year+543) ;
	}else{
		$ThaiText = date("j",$timestamp)."/".$SHORT_MONTH[$month]."/".($year+543);
	}

	if($showtime == "1"){
		return $ThaiText." "._TIMES_AT." ".$time;
	}else if($showtime == "2"){
		$ThaiText = date("j",$timestamp)." ".$SHORT_MONTH[$month]." ".($year+543);
		return $ThaiText." : ".$times;
	}else{
		return $ThaiText;
	}
}

//--
function formatDateThai($date){
$list= array("",""._Month_1."",""._Month_2."",""._Month_3."",""._Month_4."",""._Month_5."",""._Month_6."",""._Month_7."",""._Month_8."",""._Month_9."",""._Month_10."",""._Month_11."",""._Month_12."");
list($d,$m,$y) =preg_split("/\//",$date);
return "$d {$list[$m]} $y";
}


function CheckAdmin($user = "", $pwd =""){
	global $db ;
	$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
	$res['user'] = $db->select_query("SELECT id FROM ".TB_ADMIN." WHERE username='$user' AND password='$pwd' ");
	$arr['user'] = $db->fetch($res['user']);
	if(!$arr['user']['id']){
		echo "<script language='javascript'>" ;
		echo "alert('"._ADMIN_SIT."')" ;
		echo "</script>" ;
		echo "<meta http-equiv='refresh' content='1; url=?name=admin'>";
		exit();
	}
}


function CheckUser($user = "", $pwd =""){
	global $db ;
	$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
	$res['user'] = $db->select_query("SELECT id FROM ".TB_MEMBER." WHERE user='$user' AND password='$pwd' ");
	$arr['user'] = $db->fetch($res['user']);
	if(!$arr['user']['id']){
		echo "<script language='javascript'>" ;
		echo "alert('"._MEMBER_SIT."')" ;
		echo "</script>" ;
		echo "<script language='javascript'>javascript:history.go(-1)</script>";
		exit();
	}
}


// save login record database //
function addhistorydetail($user_login_,$date_time_,$operate_,$budget_note_){ 
 $sqladdhistorydetail = "INSERT INTO `histosy_detail` (`id_login` , `user_login` , `date_time` , `operate` , `budget_note`)VALUES ('',  '$$user_login_','$date_time_', '$operate_', '$budget_note_')";
 $result_detail = mysql_query($sqladdhistorydetail);
 exit();
}

function f_x_numofdate($selname,$dfvalue,$selvalue){
  $strday="<select name=$selname size=1>";
  $strday.=$dfvalue;
  for ($i=1;$i<=31;$i++) {
     $sel="";
     if ($selvalue==$i) {$sel="selected";}
     $strday.="<option value=$i $sel>$i</option>";
  } 
  $strday.="</select>";
  return $strday;
}

function f_x_getofmonth($selname,$dfvalue,$selvalue) {
  $monthTH = array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
  $strvalue="<select name=$selname size=1>";
  $strvalue.=$dfvalue;
  for ($i=1;$i<=12;$i++) {
     $sel="";
     if ($selvalue==$i) {$sel="selected";}
     $strvalue.="<option value=$i $sel>".$monthTH[$i]."</option>";
  } 
  $strvalue.="</select>";
  return $strvalue;

}

function f_x_getofyear($selname,$dfvalue,$selvalue,$pyear) {
   $curryear=date("Y")+543;
   $preyear=$curryear-$pyear;
  $strvalue="<select name=$selname size=1>";
  $strvalue.=$dfvalue;
  for ($i=$preyear;$i<=$curryear;$i++) {
     $sel="";
     if ($selvalue==$i) {$sel="selected";}
     $strvalue.="<option value=$i $sel>".$i."</option>";
  } 
  $strvalue.="</select>";
  return $strvalue;

}

function thainumDigit($num){
    return str_replace(array( '0' , '1' , '2' , '3' , '4' , '5' , '6' ,'7' , '8' , '9' ,'&nbsp;','-'),
	array( "๐" , "๑" , "๒" , "๓" , "๔" , "๕" , "๖" , "๗" , "๘" , "๙" ,"&nbsp;","-"),
    $num);
}

function ThaiBahtConversion($amount_number)
 {
     $amount_number = number_format($amount_number, 2, ".","");
     //echo "<br/>amount = " . $amount_number . "<br/>";
     $pt = strpos($amount_number , ".");
     $number = $fraction = "";
     if ($pt === false) 
         $number = $amount_number;
     else
     {
         $number = substr($amount_number, 0, $pt);
         $fraction = substr($amount_number, $pt + 1);
     }
     
     //list($number, $fraction) = explode(".", $number);
     $ret = "";
     $baht = ReadNumber ($number);
     if ($baht != "")
         $ret .= $baht . "บาท";
     
     $satang = ReadNumber($fraction);
     if ($satang != "")
         $ret .=  $satang . "สตางค์";
     else 
         $ret .= "ถ้วน";
     //return iconv("UTF-8", "TIS-620", $ret);
     return $ret;
 }

 function ReadNumber($number)
 {
     $position_call = array("แสน", "หมื่น", "พัน", "ร้อย", "สิบ", "");
     $number_call = array("", "หนึ่ง", "สอง", "สาม", "สี่", "ห้า", "หก", "เจ็ด", "แปด", "เก้า");
     $number = $number + 0;
     $ret = "";
     if ($number == 0) return $ret;
     if ($number > 1000000)
     {
         $ret .= ReadNumber(intval($number / 1000000)) . "ล้าน";
         $number = intval(fmod($number, 1000000));
     }
     
     $divider = 100000;
     $pos = 0;
     while($number > 0)
     {
         $d = intval($number / $divider);
         $ret .= (($divider == 10) && ($d == 2)) ? "ยี่" : 
             ((($divider == 10) && ($d == 1)) ? "" :
             ((($divider == 1) && ($d == 1) && ($ret != "")) ? "เอ็ด" : $number_call[$d]));
         $ret .= ($d ? $position_call[$pos] : "");
         $number = $number % $divider;
         $divider = $divider / 10;
         $pos++;
     }
     return $ret;
 } 


?>