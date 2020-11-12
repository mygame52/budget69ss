<html>
<?
	include("./config.php");	//ตั้งค่าต่างๆของเว็บบอร์ด
	include("./function.php");		//ฟังก์ชั่นที่ใช้ในเว็บบอร์ด
?>
<head>
<title><?=$config[title]?></title>
<meta http-equiv="Content-Type" content="text/html; charset=Windows-874">
<link href="./style.css" rel="stylesheet" type="text/css">
</head>

<body bgcolor=#FFFFE0>

<?
	$fileupload=$_FILES["fileupload"];
    $QName = $HTTP_POST_VARS['QName'];
	$QTitle = $HTTP_POST_VARS['QTitle'];
	$QNote = $HTTP_POST_VARS['QNote'];
	$QEmail = $HTTP_POST_VARS['QEmail'];
	$emailOK = $HTTP_POST_VARS['emailOK'];

	$nQName = strlen($QName);
	$nQTitle = strlen($QTitle);
	$nQNote = strlen($QNote);

	// ตรวจสอบค่าที่ส่งมาอักครั้ง เพื่อความชัวร์
	if($nQName<=0 && $nQTitle<=0 && $nQNote<=0) {
		echo Message(45,"red","ข้อความส่งมาไม่สมบูรณ์","อาจใส่ข้อมูลไม่ครบ หรือตกหล่นระหว่างการส่งข้อมูล กรุณาส่งข้อความอีกครั้ง","<a href='javascript:history.back(1)'> กลับไปแก้ไข </a>");
		exit();
	}

	$IP = getenv("REMOTE_ADDR");
	$IP = "(".substr($IP,0,strrpos($IP,".")).".*)";

	//หาค่า IP Address ที่ถูกต้องจากเครื่องนั้นๆ
	if ($_SERVER["HTTP_X_FORWARDED_FOR"]) {
		$IP = $_SERVER["HTTP_X_FORWARDED_FOR"]; 
	} else { 
		$IP = $_SERVER["REMOTE_ADDR"];
	}

	// ตรวจสอบรูปแบบการแสดง IP Address 
	switch ($config[showip]) {
		case "ALL" : $IP = $IP; break;
		case "BAN" : $IP = substr($IP,0,strrpos($IP,".")).".*"; break;
		case "NONE": $IP = ""; break;
	}
	
	// ตรวจสอบว่า มีการป้อน Tag html หรือเปล่า และป้อน url หรือ email มาหรือไม่ ถ้ามีให้ทำ link  *** ต้องอยู่ก่อนพวกเลย.. เดี๋ยววุ่น.....
	$QNote = CheckTag($QNote);

	// ไม่ตรวจสอบการแทรก Tag ใดๆ แต่ถ้าใส่ Tag Html มาให้เปลี่ยนเป็นข้อความธรรมดา
	$QTitle = stripslashes(htmlspecialchars($QTitle));
	$QName = stripslashes(htmlspecialchars($QName));

	// ป้องกันคำหยาบ
	$QTitle = CheckRude($QTitle);
	$QNote = CheckRude($QNote);
	$QName = CheckRude($QName);

	// ตรวจสอบการแทรกรูปภาพเล็กๆ
	$QNote = CheckSmile($QNote);

	// เอาไว้ใช้ ในการ Add ลง List เพราะจะไม่มี Link อีเมล์
	$name = $QName;

	// ตรวจสอบว่าส่งเป็นชื่ออีเมล์มาหรือไม่ ถ้าส่งมาให้แสดงรูปกราฟฟิกซองจดหมาย และสร้าง Link
	if(eregi("^.+@.+\..+$",$QEmail)) {
		$QName = "<a href=\"./mail2me/mail2me.php?wemail=$QEmail&name=$QName&question=$QTitle\" target=\"_blank\">$QName <img src='./pic/email.gif' border=0 alt='ส่งเมล์ถึง $QName'></a>";
	}else {
		$QName = "<b>$QName</b>";
		$QEmail = "-";
	}

	//ถ้า $emailOK ไม่ได้เลือกให้ค่าเป็น 0
	if(!isset($emailOK)) $emailOK = 0;

	//ตรวจสอบการโพสกระทู้
	CheckFlood(getenv("REMOTE_ADDR"));
	CheckRepeated($QTitle);
		
		
		// อ่านจำนวนของกระทู้จากไฟล์
		if(file_exists("number.txt")) {
			$FILE=fopen("number.txt","rt");
			$num=fgets($FILE,10);
			fclose($FILE);
		}
		else{
			$num=0;
		}

		$num++;  //เพิ่มค่าขึ้น 1
		// บันทึกค่าจำนวนกระทู้ลงในไฟล์
		$FILE=fopen("number.txt","w+");
		flock($FILE,2);
		fputs($FILE,$num);
		flock($FILE,3);
		fclose($FILE);

		// ตรวจสอบว่ามีไดเรคทอรี่ชื่อ data อยู่หรือไม่ ถ้าไม่มีให้สร้างขึ้นใหม่
		$DirOK = 0;
		$DIR = opendir("./");
		while ($text = readdir($DIR)){
		if($text == substr($config[dataDir],0,strlen($config[dataDir])-1)) $DirOK = 1;
		}
		if(!$DirOK) mkdir($config[dataDir],0777);

		// ถ้าอนุญาตให้อัปโหลดรูปได้	(0 ตัวแรกนั่นคือการอัปโหลดรูปจากการตั้งกระทู้)
		if($config[SendImageByTopic]>=1){
			if($config[SendImageByTopic]==2){
			//	if($isMember)
				$ImgDisplay = Send_Img(0, $num, "category", $fileupload);
			}
			else
				$ImgDisplay = Send_Img(0, $num, "category", $fileupload);
		}
		//$p=($config[SendImageByTopic] && strlen($ImgDisplay)>0)? $ImgDisplay : "";
		// เขียนข้อมูลลงแฟ้ม  และตัวแปร $ThaiDateFull มาจาไฟล์ config
		$FILE=fopen($config[dataDir]."$num.txt","w+");
		flock($FILE,2);

		if($config[BorderQ]){
			//กรอบโค้งมน
			fputs($FILE,"<table width=600 border=0 cellspacing=0 cellpadding=0 align=center bgcolor=#FFFFFF>\n");
			fputs($FILE,"<tr><td valign=top width=9 bgcolor=#0000FF><img src=\"pic/b_top_left.gif\" border=0></td>\n");
			fputs($FILE,"<td width=583 bgcolor=#0000FF><table width=100% border=0 cellspacing=0 cellpadding=5>\n");
			fputs($FILE,"<tr align=center><td><font color=#FFFFFF class=size3><b>$QTitle</b></font></td></tr>\n");
			fputs($FILE,"</table></td><td width=9 align=right valign=top bgcolor=#0000FF><img src=\"pic/b_top_right.gif\"></td></tr>\n");
			fputs($FILE,"<tr><td width=9 background=\"pic/b_line_left.gif\" valign=top><img src=\"pic/tc.gif\"></td>\n");
			fputs($FILE,"<td width=583><table width=100% border=0 cellspacing=0 cellpadding=5>\n");
			fputs($FILE,"<tr><td height=50>");

			if($config[SendImageByTopic]>0 && strlen($ImgDisplay)>1)
			{
				if(substr($ImgDisplay,-3,3)=="swf"){ //ถ้ามีไฟล์ flash ให้แสดงด้วย
				$size = getimagesize($config[dataDir]."imagefiles/".$ImgDisplay);	
				fputs($FILE,"<object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" ");
				fputs($FILE, "codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0\" $size[3]>\n");
				fputs($FILE, "<param name=movie value=\"".$config[dataDir]."imagefiles/".$ImgDisplay."\">\n");
				fputs($FILE, "<param name=quality value=high>\n");
				fputs($FILE, "<embed src=\"".$config[dataDir]."imagefiles/".$ImgDisplay."\" quality=high pluginspage=\"http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash\" type=\"application/x-shockwave-flash\" $size[3]>\n");
				fputs($FILE, "</embed>\n");
				fputs($FILE, "</object><br>\n");
				}
				else if(strlen($ImgDisplay)>1) //ถ้ามีรูปภาพ ให้แสดงภาพด้วย
				fputs($FILE, "<img src='".$config[dataDir]."imagefiles/".$ImgDisplay."' border=0><br><br>");
			}

			fputs($FILE,"$QNote</td></tr></table></td>\n");
			fputs($FILE,"<td width=9 background=\"pic/b_line_right.gif\" valign=top align=right><img src=\"pic/tc.gif\"></td></tr>\n");
			fputs($FILE,"<tr><td width=9 valign=top background=\"pic/b_line_ver1.gif\"><img src=\"pic/b_line_ver1.gif\"></td>\n");
			fputs($FILE,"<td width=583 background=\"pic/b_line_ver2.gif\"><img src=\"pic/tc.gif\"></td>\n");
			fputs($FILE,"<td width=9 align=right valign=top background=\"pic/b_line_ver2.gif\"><img src=\"pic/b_line_ver3.gif\"></td></tr>\n");
			fputs($FILE,"<tr><td width=9 background=\"pic/b_line_left.gif\" valign=top><img src=\"pic/tc.gif\"></td>\n");
			fputs($FILE,"<td width=583 align=right>$QName $IP [ $ThaiDateFull ]</td>\n");
			fputs($FILE,"<td width=9 background=\"pic/b_line_right.gif\" valign=top align=right><img src=\"pic/tc.gif\"></td>\n");
			fputs($FILE,"</tr><tr><td width=9 valign=top height=9><img src=\"pic/b_bottom_left.gif\"></td>\n");
			fputs($FILE,"<td width=583 background=\"pic/b_line_bottom.gif\" height=9 valign=top><img src=\"pic/tc.gif\"></td>\n");
			fputs($FILE,"<td width=9 align=right valign=top height=9><img src=\"pic/b_bottom_right.gif\"></td></tr></table>\n");
		}
		else{
			//กรอบสี่เหลี่ยมธรรมดา
			fputs($FILE,"<table width=600 border=0 cellspacing=0 cellpadding=0 bgcolor=#0000FF><tr><td><table border=0 width=600 cellspacing=1 cellpadding=5>\n");
			fputs($FILE,"<tr><td align=center><font color=#FFF5EE class=size3><b>$QTitle</b></font></td></tr>\n");
			fputs($FILE,"<tr><td bgcolor=#FFFFFF><br><table border=0 width=590 align=center><tr><td>");

			if($config[SendImageByTopic]>0 && strlen($ImgDisplay)>1)
			{
				if(substr($ImgDisplay,-3,3)=="swf"){ //ถ้ามีไฟล์ flash ให้แสดงด้วย
				$size = getimagesize($config[dataDir]."imagefiles/".$ImgDisplay);	
				fputs($FILE,"<object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" ");
				fputs($FILE, "codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0\" $size[3]>\n");
				fputs($FILE, "<param name=movie value=\"".$config[dataDir]."imagefiles/".$ImgDisplay."\">\n");
				fputs($FILE, "<param name=quality value=high>\n");
				fputs($FILE, "<embed src=\"".$config[dataDir]."imagefiles/".$ImgDisplay."\" quality=high pluginspage=\"http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash\" type=\"application/x-shockwave-flash\" $size[3]>\n");
				fputs($FILE, "</embed>\n");
				fputs($FILE, "</object><br>\n");
				}
				else if(strlen($ImgDisplay)>1) //ถ้ามีรูปภาพ ให้แสดงภาพด้วย
				fputs($FILE, "<img src='".$config[dataDir]."imagefiles/".$ImgDisplay."' border=0><br><br>");
			}
				
			fputs($FILE,"$QNote</td></tr></table><br></td></tr>\n");
			fputs($FILE,"<tr><td bgcolor=#FFFFFF><table border=0 align=center width=100%><tr><td align=right>$QName $IP [ $ThaiDateFull ]</td></tr></table></td></tr></table></td></tr>\n");
			fputs($FILE,"</table>\n");
		}

		flock($FILE,3);
		fclose($FILE);
	
	// อ่านข้อมูลจากไฟล์ ไปเก็บในตัวแปร Array 
	if(file_exists($config[fileQuestion])) { // ตัวแปร $fileQuestion อยู่ในไฟล์ config แทนชื่อไฟล์หัวข้อคำถาม
		$question = file($config[fileQuestion]);
	}

	// บันทึกหัวข้อคำถามไว้ใน List โดยคำถามใหม่จะอยู่บนสุด
	$FILE=fopen($config[fileQuestion],"w+");
	flock($FILE,2);
	fputs( $FILE , "$num|X|$QTitle|X|$name|X|$mdate|X|$QEmail|X|$emailOK|X|0|X|\n");

	if(file_exists($config[fileQuestion])) {
		for ($i=0 ; $i<sizeof($question) ; $i++) {
			fputs($FILE,$question[$i]);
		}	
	} // end if

	flock($FILE,3);
	fclose($FILE);

	// บันทึกค่าเริ่มต้นเป็น ศูนย์ ให้กับการนับจำนวนคำตอบ
	$FILE=fopen($config[dataDir]."$num.dat","w+");
	flock($FILE,2);
	fputs($FILE,"0||0||-||");
	flock($FILE,3);
	fclose($FILE);	

	echo Message(60,"green","กระทู้ของคุณถูกบันทึกลงฐานข้อมูลเรียบร้อยแล้ว","","<a href='new.php'>ตั้งคำถามใหม่</a> | <a href='webboard.php'>แสดงคำถาม</a>");

?>
</body>
</html>