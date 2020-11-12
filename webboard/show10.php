<?

// ################################################
// โปรแกรมโชว์กระทู้ตามจำนวนที่ต้องการ (พัฒนาต่อจาก BallkunG)
//
// ไฟล์นี้ผมเอาโค๊ดที่ BallkunG เคยโพสไว้มาปรับปรุงใหม่ให้ใช้งานง่ายขึ้น
// และให้มีความใกล้เคียงกับ ตัวเว็บบอร์ด มากที่สุด และให้สอดคล้องกับ Show10.php
// ของพี่แสนด้วยครับ..
// 
// งานนี้ต้องขอขอบคุณทั้ง พี่แสน และน้อง BallkunG ด้วย โฮะ โฮะ โฮะ
// ################################################


// การนำไปใช้ครับ ก็เอาโค้ดตรงนี้ไปแปะไว้หน้าที่ต้องการเลยครับ สังเกตบรรทัด include ดี ๆ ก่อนนะครับ ใส่ path ที่อยู่ของสคริปต์ให้ถูกด้วยล่ะ
// include("./webboard/show10.php"); 
// showTop(10);
//
// อ่านวิธีการติดตั้งโปรแกรมโชว์กระทู้หน้าแรกที่ไฟล์ โชว์กระทู้หน้าแรก.txt

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Windows-874">
<style type=text/css>
body  {font-family : MS Sans Serif; font-size : 10pt; color : #000000;}
td {font-size : 10pt; font-family : MS Sans Serif;  color : #000000;}
.size3 {font-size : 12pt; font-family : MS Sans Serif;}

A:link {text-decoration: none; color: blue }
A:visited {text-decoration: none; color: #6495ED }
A:active {text-decoration: none; color: blue }
A:hover {text-decoration: none; color: red }
</style>
</head>

<?

function showTop($NumShow) {
	
	// พาธของเว็บบอร์ด (แก้ไขให้ตรงกับพาธเว็บบอร์ดที่คุณใช้ แต่ถ้าตั้งเป็น boardtxt อยู่แล้วก็ไม่ต้องแก้อะไรเลย)
	$Path = "../boardtxt";  // อย่าลืมว่า ../ หน้าชื่อโฟลเดอร์ต้องมี เพราะอยู่ระดับเดียวกับไฟล์ config.php

	include("$Path/config.php");

	// อ่านข้อมูลจาก "ไฟล์หัวข้อคำถาม"
	if(file_exists("$Path/".$config[fileQuestion])) { //ตรวจสอบว่ามีไฟล์นี้อยู่หรือไม่
	$datawb = file("$Path/".$config[fileQuestion]) ; // fileQuestion อยู่ในไฟล์ Config.php

	// ถ้าจำนวนที่ต้องการแสดง มากกว่า จำนวนคำถามที่มี ให้มีค่าเท่ากับ จำนวนคำถามที่มี
	if($NumShow > sizeof($datawb)) $NumShow=sizeof($datawb);

	// วนรอบขอข้อมูล
	for ( $i=0 ; $i<$NumShow ; $i++ ){
		// แกะออกมาทีละเรคคอร์ด (แยกข้อมูลในแต่ละบรรทัด ออกเป็นฟิลด์ย่อย)
		list ( $numQuestion , $Question , $Name , $Date ) = explode ( "|X|" , $datawb[$i] ) ;

		// เพิ่มเลข ศูนย์ หน้าหมายเลขคำถาม 4 ตัว
		$No = sprintf("%04d",$numQuestion);

		// ถ้าคำถามยาวกว่า 45 ตัวอักษร ให้ตัดเหลือแค่ 45 ตัว
		if(strlen($Question)>45) {
			// จำกัดความยาวของกระทู้ที่ 45 ตัวอักษร
			$Question = substr($Question,0,45)."...";
		}

		// ถ้าชื่อผู้ตั้งคำถามยาวกว่า 10 ตัวอักษร ให้ตัดเหลือแค่ 10 ตัว
		if(strlen($Name)>10) {
			// จำกัดความยาวของชื่อที่ 10 ตัวอักษร
			$Name = substr($Name,0,10)."..";
		}

		// วนลูปอ่านข้อมูลในไฟล์คำตอบ แล้วหาจำนวนคำตอบ ** (ที่แท้จริง) **  ทั้งหมด
		$fileReply = "$Path/".$config[dataDir]."R$numQuestion.txt";
		$countR=0; // เป็นตัวบอกว่ามีจำนวนคนตอบกี่คน กำหนดเป็นศูนย์ก่อน

		if(file_exists($fileReply)) {
			$Reply = file($fileReply);
			for ($j=0 ; $j<sizeof($Reply) ; $j++) {

				// แยกข้อมูลในแต่ละบรรทัด ออกเป็นฟิลด์ย่อย
				$chk = explode("||",$Reply[$j]);

				// ถ้าฟิลด์ที่ 0 ของข้อมูลที่แบ่งออกมา เท่ากับ "IS_reply" (ตัวแบ่งหมายเลขคำถาม) ให้เพิ่มค่า $countR
				if(substr($chk[0],0,8) == "IS_reply"){ $countR++; }
			}// จบลูป for j
		}//จบ if

		// วนลูปอ่านข้อมูลหาจำนวนผู้เข้าชม และวันที่ล่าสุดที่ตอบคำถาม
		$fileVisitor = "$Path/".$config[dataDir]."$numQuestion.dat";
		if(file_exists($fileVisitor)) {
			$lineVisitor = file($fileVisitor);
			$chkVisitor = explode("||",$lineVisitor[0]); // แยกข้อมูลในแต่ละบรรทัด ออกเป็นฟิลด์ย่อย
			$ReplyDate = $chkVisitor[2];	//วันที่ตอบคำถามล่าสุด
		}//จบ if

		// กำหนดภาพ icon หน้าหมายเลขกระทู้
		// ถ้าต้องการให้ icon ของคำถามฮอต แสดงที่จำนวนคนตอบ ที่เท่าไหร่ก็เปลี่ยนตัวเลขเองนะครับ (ในที่นี้คือตอบตั้งแต่ 10 คนขึ้นไป)
		if($ReplyDate!="-") {
			$icon = ($countR>=$Hot) ? "<img src='$Path/pic/hotfd.gif'>" : "<img src='$Path/pic/openfd.gif'>"; 
		}
		else {
			$icon = ($Date==$mdate) ? "<img src='$Path/pic/newfd.gif'>" : "<img src='$Path/pic/closefd.gif'>"; 
		}

		// พร้อมแล้ว ลุยโลด (แสดงคำถาม)
		echo "$icon <font color=#666666>$No</font> <a href='$Path/view.php?No=$numQuestion' target=\"_blank\">$Question</a> <font color='#666666'>$Name [$Date]</font> :: (<font color=red>$countR</font>)<br>";

	}// จบ for ครับ
}else { // ถ้าไม่มีไฟล์หัวข้อคำถาม
	echo "<br><br><font color=red class=size3><b>\n"; 
	echo "<p align=center>ยังไม่มีใครตั้งคำถามเลยครับ<br></p></b>\n";
	echo "</font> <br><br>\n\n";
}
}// จบส่วนของฟังก์ชั่น

?> 

</html>
