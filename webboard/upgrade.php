<head>
<title>[อัปเกรดข้อมูล] เว็บบอร์ดแบบเก็บข้อมูลใน Text File :: By "พีกับยู" (upgrade v2.0 to v3.57)</title>
<meta http-equiv="Content-Type" content="text/html; charset=Windows-874">
<link href="./style.css" rel="stylesheet" type="text/css">
</head>

<?
	include("./config.php");	//ตั้งค่าต่างๆของเว็บบอร์ด
	include("./function.php");		//ฟังก์ชั่นที่ใช้ในเว็บบอร์ด

	// อ่านข้อมูลจากไฟล์ ไปเก็บในตัวแปร Array 
	if(file_exists($config[fileQuestion])) { // ตัวแปร $fileQuestion อยู่ในไฟล์ config แทนชื่อไฟล์หัวข้อคำถาม
		$question = file($config[fileQuestion]);
	}

	// บันทึกหัวข้อคำถามไว้ใน List โดยคำถามใหม่จะอยู่บนสุด
	$FILE=fopen($config[fileQuestion],"w");
	flock($FILE,2);

			for ($j=0 ; $j<sizeof($question) ; $j++) {

				// แยกข้อมูลในแต่ละบรรทัด ออกเป็นฟิลด์ย่อย
				$chk = explode("|X|",$question[$j]);
				if(!isset($chk[4])) {$chk[4] = "-";}	
				if(!isset($chk[5])) {$chk[5] = 0;}
				if(!isset($chk[6])) $chk[6] = 0;

				fputs( $FILE , "$chk[0]|X|$chk[1]|X|$chk[2]|X|$chk[3]|X|$chk[4]|X|$chk[5]|X|$chk[6]|X|\n");

			} //จบลูป for $j

	flock($FILE,3);
	fclose($FILE);

	echo Message(60,"green","ทำการอัปเกรดข้อมูลเว็บบอร์ด v2.0 เป็นเว็บบอร์ด v3.57 เรียบร้อยแล้ว","ควรตรวจสอบข้อมูลอีกครั้ง","<a href='./webboard.php'>กลับไปหน้าหลักเว็บบอร์ด</a>");

?>
