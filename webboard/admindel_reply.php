<?
	session_start();

	$user_wb=(isset($_POST["user_wb"]))?$_POST["user_wb"]:$_SESSION["sesuser_wb"];
	$passwd_wb=(isset($_POST["passwd_wb"])) ?$_POST["passwd_wb"]:$_SESSION["sespasswd_wb"];

	include("./config.php");	//ตั้งค่าต่างๆของเว็บบอร์ด
	include("./function.php");		//ฟังก์ชั่นที่ใช้ในเว็บบอร์ด
?>

<html>
<head>
<title><?=$config[title]?> (สำหรับ Admin)</title>
<meta http-equiv="Content-Type" content="text/html; charset=Windows-874">
<META HTTP-EQUIV="Expires" CONTENT="0">
<link href="./style.css" rel="stylesheet" type="text/css">
<script language="JavaScript">

function R_confirm(num)
{
	if(num<10) num = "000"+num;
	else if(num<100) num = "00"+num;
	else if(num<1000) num = "0"+num;

	var x=window.confirm("ต้องการลบคำตอบจากผู้ตอบคนที่ "+num+" ใช่หรือไม่");
	return (x);
}

</script>
</head>

<body bgcolor=#FFFFE0 background="pic/background.jpg">
<?
	if($user_wb != $config[adminuser] || $passwd_wb != $config[adminpwd]){
		echo Message(45,"red","ไม่อนุญาตให้เข้าระบบ","","<a href='./login.php'>Login อีกครั้ง</a> || <a href='./webboard.php'>กลับหน้าหลักเว็บบอร์ด</a>");
		exit();
	}	
?>
<center><p align="CENTER"><br>
<b><font face="LilyUPC" size="+4" color=#9400d3><?=$config[txtheader]?></font></b><br><?=$config[headerdetail]?> 
<br><br><font color=green class=size3><b>สำหรับเว็บมาสซะเตอร์ (ลบคำถาม - คำตอบ)</b></font>
</p>
<div align="center">[ <a href="./admin.php?key=<?echo$key;?>">กลับหน้าหลัก Admin</a> ]</div><br>
  <?
	$No = $HTTP_GET_VARS['No'];
	// อ่านข้อมูลจากไฟล์ คำถามขึ้นมาแสดง
	if(file_exists($config[dataDir]."$No.txt")) {
		$FILE=file($config[dataDir]."$No.txt");
		for ($i=0;$i<count($FILE);$i++){
			echo $FILE[$i];
		}
	}

	echo "<br>";

	// ตรวจสอบว่ามีไฟล์ คำตอบ หรือไม่ ถ้ามีให้อ่านและแสดงคำตอบ
	if(file_exists($config[dataDir]."R$No.txt")) {
		$FReply=file($config[dataDir]."R$No.txt");

		for ($i=0 ; $i<sizeof($FReply) ; $i++) {
			$display=explode("||",$FReply[$i]);  // แบ่งข้อมูลออกเป็น ฟิลด์ ย่อย
		
			// ถ้าฟิลด์ที่ 0 ของข้อมูลที่แบ่งออกมา มีค่าไม่ตรงกับ "IS_reply" (ตัวแบ่งที่สร้างไว้)
			// ให้แสดงข้อมูลในบรรทัดนั้นๆ กล่าวคือถ้าตรงกัน จะไม่แสดง เพราะฉะนั้นบรรทัดที่มีข้อความว่า "IS_reply" จึงไม่ปรากฎออกมาให้เห็น
			if(substr($display[0],0,8) != "IS_reply"){ 
				echo $FReply[$i]; 
			}else{
				$N = substr($display[0],8);
				echo "[ <a href=\"./edit.php?select=1&admin_Q=$No&admin_R=$N\" onClick='return R_confirm(\"$N\");'>ลบคำตอบที่ $N</a> ]<br><br>\n";
			}

		}//จบลูป for i
	}//จบ if

?>

<br>
</center>
<br>
</body>
</html>