<?
	session_start();

	$user_wb=(isset($_POST["user_wb"]))?$_POST["user_wb"]:$_SESSION["sesuser_wb"];
	$passwd_wb=(isset($_POST["passwd_wb"])) ?$_POST["passwd_wb"]:$_SESSION["sespasswd_wb"];

	include("./config.php");	//ตั้งค่าต่างๆของเว็บบอร์ด
	include("./function.php");		//ฟังก์ชั่นที่ใช้ในเว็บบอร์ด
?>

<head>
<title>ผลการลบข้อมูล คำถาม - คำตอบ ของเว็บบอร์ด</title>
<meta http-equiv="Content-Type" content="text/html; charset=Windows-874">
<META HTTP-EQUIV="Expires" CONTENT="1">
<link href="./style.css" rel="stylesheet" type="text/css">
</head>

<body bgcolor=#FFFFE0 background="pic/background.jpg">
 <?

	if($user_wb != $config[adminuser] || $passwd_wb != $config[adminpwd]){
		echo Message(45,"red","ไม่อนุญาตให้เข้าระบบ","","<a href='./login.php'>Login อีกครั้ง</a> || <a href='./webboard.php'>กลับหน้าหลักเว็บบอร์ด</a>");
		exit();
	}

	// ถ้ามี "ไฟล์หัวข้อคำถาม" อยู่ให้ทำต่อ..
	if(file_exists($config[fileQuestion])) {

	$select = $HTTP_GET_VARS['select'];
	$admin_Q = $HTTP_GET_VARS['admin_Q'];
	$admin_R = $HTTP_GET_VARS['admin_R'];

	if($select==0){ // มีค่าเป็นศูนย์ (0) คือการลบคำถาม

		// เพิ่มเลข ศูนย์ หน้าหมายเลขคำถาม 4 ตัว (สำหรับแสดงผล)
		$number = sprintf("%04d",$admin_Q);

		// อ่านข้อมูลจาก "ไฟล์หัวข้อคำถาม" ไปเก็บในตัวแปร Array
		$question = file($config[fileQuestion]);

		// วนลูปอ่านข้อมูล เพื่อตรวจสอบ "การมีอยู่" ของคำถามที่ต้องการลบ
		$Yes=0;
		for ($i=0 ; $i<sizeof($question) ; $i++){
			// แยกข้อมูลในแต่ละบรรทัด ออกเป็นฟิลด์ย่อย
			$split = explode("|X|",$question[$i]);
			if($split[0] == $admin_Q){$Yes=1;}  //ถ้ามีหมายเลขคำถามที่ต้องการลบ ให้ตัวแปร $Yes = 1 
		} //จบลูป for i

		// ถ้ามีหมายเลขคำถาม ($Yes = 1) ให้ทำตามนี้ 
		if($Yes==1){  
			for ($i=0 ; $i<sizeof($question) ; $i++){
				// แยกข้อมูลในแต่ละบรรทัด ออกเป็นฟิลด์ย่อย
				$split = explode("|X|",$question[$i]);
				if($split[0] == $admin_Q){$pos=$i;}  // เก็บค่าตำแหน่งของหมายเลขคำถามที่ต้องการลบออกจากไฟล์
			} //จบลูป for i

			// บันทึกหัวข้อคำถามไว้ใน "ไฟล์หัวข้อคำถาม" (จะไม่รวมคำถามที่ต้องการลบ)
			$save=fopen($config[fileQuestion],"w");
			flock($save,2);
			for ($j=0 ; $j<sizeof($question) ; $j++){
				// ถ้าค่า $j ไม่ตรงกับค่าตำแหน่งของคำถามที่ต้องการลบ ให้บันทึกข้อมูลลง List หรือ "ไฟล์หัวข้อคำถาม"
				//เพราะฉะนั้นคำถามที่ต้องการลบจึงไม่ถูกบันทึกลงใน "ไฟล์หัวข้อคำถาม"
				if($j!=$pos){ fputs($save,$question[$j]); } 
			}
			flock($save,3);
			fclose($save);

			// ลบไฟล์ที่เก็บคำถาม
			$fileQ=$config[dataDir]."$admin_Q.txt";
			if(file_exists($fileQ)) unlink($fileQ);

			// ลบไฟล์รูปที่อยู่ในคำถาม
			$fileQImg=$config[dataDir]."imagefiles/$admin_Q";
			if(file_exists("$fileQImg.jpg")) unlink("$fileQImg.jpg");
			if(file_exists("$fileQImg.gif")) unlink("$fileQImg.gif");

			// ลบไฟล์ที่เก็บจำนวนคนตอบ
			$fileNum=$config[dataDir]."$admin_Q.dat";
			if(file_exists($fileNum)) unlink($fileNum);

			// ลบไฟล์ที่เก็บคำตอบ
			$fileR=$config[dataDir]."R$admin_Q.txt";
			if(file_exists($fileR)) unlink($fileR);

			// ลบไฟล์รูปที่อยู่ในคำตอบ
			$fileNumImgR=$config[dataDir]."imagefiles/Img$admin_Q.txt";
			$fileImgR=$config[dataDir]."imagefiles/R$admin_Q";
			if(file_exists($fileNumImgR)) {
				// อ่านจำนวนของรูปจากไฟล์
				if(file_exists($fileNumImgR)) {
					$FILE=fopen($fileNumImgR,"rt");
						$numImg=fgets($FILE,10);
					fclose($FILE);
				}
				for ($i=1 ; $i<=$numImg ; $i++){
					if(file_exists("$fileImgR-$i.jpg")) unlink("$fileImgR-$i.jpg");
					if(file_exists("$fileImgR-$i.gif")) unlink("$fileImgR-$i.gif");
				}
				unlink($fileNumImgR);
			}

			echo Message(50,"green","ลบคำถามหมายเลข <font color=black>$number</font> ออกจากระบบแล้ว","พร้อมทั้งลบข้อมูลคำตอบของคำถามนี้ด้วย","<a href='admin.php'>กลับหน้าหลัก Admin</a>");
			exit();
		}

		// ถ้าไม่มีหมายเลขคำถามให้แสดงข้อความนี้
		else{
			echo Message(50,"red","คำถามหมายเลข <font color=black>$number</font> ไม่มีอยู่ในระบบ!!","กรุณาตรวจสอบ คำถาม ที่ต้องการลบอีกครั้ง","<a href='javascript:history.back(1)'>กลับไปตรวจสอบ</a>");
			exit();
		}
	}
	else{ // มีค่าเป็นหนึ่ง (1) หรือไม่เท่ากับศูนย์คือการลบคำตอบ

		// เพิ่มเลข ศูนย์ หน้าหมายเลขคำถาม 4 ตัว (สำหรับแสดงผล)
		$number = sprintf("%04d",$admin_Q);

		// อ่านข้อมูลจาก "ไฟล์หัวข้อคำถาม" ไปเก็บในตัวแปร Array
		if(file_exists($config[fileQuestion])) {
			$question = file($config[fileQuestion]);
		}

		// วนลูปอ่านข้อมูล เพื่อตรวจสอบ "การมีอยู่" ของคำถามที่ต้องการลบ
		$qYes=0;
		for ($i=0 ; $i<sizeof($question) ; $i++){
			// แยกข้อมูลในแต่ละบรรทัด ออกเป็นฟิลด์ย่อย
			$split = explode("|X|",$question[$i]);
			if($split[0] == $admin_Q){$qYes=1;} //ถ้ามีหมายเลขคำถาม ของคำตอบที่ต้องการลบ ให้ตัวแปร $qYes = 1 
		} //จบลูป for i

		// ถ้ามีหมายเลขคำถาม ($qYes = 1) ให้ทำตามนี้ 
		if($qYes==1){
			//อ่านข้อมูลจากไฟล์ ที่เก็บคำตอบ มาเก็บไว้ในตัวแปร Array ชื่อ $Reply
			$fileReply=$config[dataDir]."R$admin_Q.txt";
			if(file_exists($fileReply)) {
				$Reply = file($fileReply);
			}

			// วนลูปอ่านข้อมูล เพื่อตรวจสอบ "การมีอยู่" ของคำตอบที่ต้องการลบ
			$Yes=0;
			$countR=0; // เป็นตัวบอกว่ามีจำนวนคนตอบกี่คน ขั้นแรกกำหนดเป็นศูนย์ก่อน

			for ($j=0 ; $j<sizeof($Reply) ; $j++) {
				// แยกข้อมูลในแต่ละบรรทัด ออกเป็นฟิลด์ย่อย
				$chk = explode("||",$Reply[$j]);

				// ตรวจสอบการมีอยู่ของคำตอบ
				if($chk[0]=="IS_reply$admin_R"){ $Yes=1; $position=$countR; }

				// ถ้าฟิลด์ที่ 0 ของข้อมูลที่แบ่งออกมา เท่ากับ "IS_reply" (ตัวแบ่งหมายเลขคำถาม) ให้เพิ่มค่า $countR
				if(substr($chk[0],0,8) == "IS_reply"){ $countR++; }
			}// จบลูป for j

			// ถ้ามีคำตอบหมายเลขที่ต้องการลบ ($Yes = 1) ให้ทำตามนี้ 
			if($Yes==1){
				$count=0;
				// วนลูปอ่านข้อมูล และบันทึกลง "ไฟล์คำตอบ" ยกเว้นคำตอบที่ต้องการลบ
				$save=fopen($fileReply,"w");
				flock($save,2);
				for ($i=0 ; $i<sizeof($Reply) ; $i++) {
					// แยกข้อมูลในแต่ละบรรทัด ออกเป็นฟิลด์ย่อย
					$split = explode("||",$Reply[$i]);

					// ถ้าค่า $count ไม่ตรงกับค่าของ $position ให้บันทึกข้อมูล
					// เพราะฉะนั้นคำตอบที่ต้องการลบจึงไม่ถูกบันทึกลงไปด้วย
					if($count!=$position){ fputs($save,$Reply[$i]); }

					// ถ้าฟิลด์ที่ 0 ของข้อมูลที่แบ่งออกมา เท่ากับ "IS_reply" (ตัวแบ่งหมายเลขคำถาม) ให้เพิ่มค่า $count
					if(substr($split[0],0,8) == "IS_reply"){ $count++; }
				}// จบลูป for i
				flock($save,3);
				fclose($save);

				// ลบไฟล์รูปที่อยู่ในคำตอบที่ต้องการลบ นี้ด้วย
				$fileImgR=$config[dataDir]."imagefiles/R$admin_Q";
				if(file_exists("$fileImgR-$admin_R.jpg")) unlink("$fileImgR-$admin_R.jpg");
				if(file_exists("$fileImgR-$admin_R.gif")) unlink("$fileImgR-$admin_R.gif");

				echo Message(50,"green","ลบคำตอบที่ <font color=black>$admin_R</font> ออกจากระบบแล้ว","โดยลบคำตอบของคำถามหมายเลข $number","<a href='./admindel_reply.php?No=$admin_Q'>ต้องการลบคำตอบจากกระทู้นี้อีก</a> | <a href='admin.php'>กลับหน้าหลัก Admin</a>");
				exit();
			}
			// ถ้าไม่มีคำตอบหมายเลขที่ต้องการลบ ให้แสดงข้อความนี้
			else{
				echo Message(60,"red","คำตอบที่ <font color=black>$admin_R</font> ของคำถามหมายเลข <font color=black>$number</font> ไม่มีอยู่ในระบบ","กรุณาตรวจสอบ คำถาม - คำตอบที่ต้องการลบอีกครั้ง","<a href='javascript:history.back(1)'>กลับไปตรวจสอบ</a>");
				exit();
			}//end if
		}

		// ถ้าไม่มีคำถามหมายเลขที่ต้องการลบ ให้แสดงข้อความนี้
		else{
			echo Message(60,"red","คำถามหมายเลข <font color=black>$number</font> ไม่มีอยู่ในระบบ","กรุณาตรวจสอบคำถามที่ต้องการลบอีกครั้ง","<a href='javascript:history.back(1)'>กลับไปตรวจสอบ</a>");
			exit();
		}
	}//end if

	} // จบส่วนของ if ที่ตรวจสอบว่าไฟล์ หัวข้อคำถาม มีหรือไม่ 
	else{ // ถ้าไม่มีไฟล์ หัวข้อคำถาม (ซึ่งจะเป็นได้เมื่อยังไม่มีใครตั้งกระทู้แรก หรือกระทู้ที่ 0001) จะแสดงข้อความนี้
		echo Message(50,"red","ยังไม่มีคำถาม - คำตอบอยู่ในระบบ","กรุณาตรวจสอบอีกครั้ง","<a href='logout.php'>กลับไปเว็บบอร์ด</a>");
	}
?>
</body>
</html>