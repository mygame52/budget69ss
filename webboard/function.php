<?
//(1) ปรับเวลาให้ตรงกับเวลาเมืองไทย กรณีที่ server อยู่ที่เมืองนอก โดยความสำคัญอยู่ที่ตัวแปร $hour และ $min 
	$hour = 0;   //ปรับให้ตรงตามต้องการ
	$min = 10;  //ปรับให้ตรงตามต้องการ
	$Year = date("Y")+543;
	$thaiweekFull=array("วันอาทิตย์ ที่","วันจันทร์ ที่","วันอังคาร ที่","วันพุธ ที่","วันพฤหัสบดี ที่","วันศุกร์ ที่","วันเสาร์ ที่");
	$thaimonthFull=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม", "พฤศจิกายน","ธันวาคม");
	$thaimonth=array("ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.", "พ.ย.","ธ.ค.");

	//คุณสามารถเลือกใช้งานได้ 3 อย่างคือ.. $mdate หรือ $ThaiDate หรือ $ThaiDateFull

	// 3 ส.ค. 2544
	$mdate = date("j ",mktime( date("H")+$hour, date("i")+$min )). $thaimonth[date("m")-1]." ".$Year; 

	// 3 ส.ค. 2544 เวลา 12:36 น.
	$ThaiDate = date("j ").$thaimonth[date("m")-1]." ".$Year.date(" เวลา H:i น.",mktime( date("H")+$hour, date("i")+$min )); 
	
	// วันศุกร์ที่ 3 ส.ค. 2544 เวลา 12:36 น.
	$ThaiDateFull = $thaiweekFull[date("w")]. date(" j "). $thaimonthFull[date("m")-1]. " ". $Year . date(" เวลา H:i น.",mktime( date("H")+$hour, date("i")+$min )); 

	// ได้ค่าเป็น วินาที นับจากปี ค.ศ.1900
	$Logtime = date("U",mktime( date("H")+$hour, date("i")+$min ));


//(2) ฟังก์ชั่นตัดคำหยาบซึ่งสามารถเพิ่มคำที่ต้องการตัดได้
	function CheckRude($temp){
		$wordrude = array("ashole","a s h o l e","a.s.h.o.l.e","bitch","b i t c h","b.i.t.c.h","shit","s h i t","s.h.i.t","fuck","dick","f u c k","d i c k","f.u.c.k","d.i.c.k","มึง","มึ ง","ม ึ ง","ม ึง","มงึ","มึ.ง","มึ_ง","มึ-ง","มึ+ง","กู","ควย","ค ว ย","ค.ว.ย","คอ วอ ยอ","คอ-วอ-ยอ","ปี้","เหี้ย","ไอ้เหี้ย","เฮี้ย","ชาติหมา","ชาดหมา","ช า ด ห ม า","ช.า.ด.ห.ม.า","ช า ติ ห ม า","ช.า.ติ.ห.ม.า","สัดหมา","สัด","เย็ด","หี","สันดาน","แม่ง","ระยำ","ส้นตีน","แตด") ;
		$wordchange = ("<font color=red>+++</font>") ;

		for ( $i=0 ; $i<sizeof($wordrude) ; $i++ ){
			$temp = eregi_replace ($wordrude[$i] ,$wordchange ,$temp);
		}
		return ( $temp ) ;
	}


//(3) ฟังก์ชั่นแทรกรูปภาพสามารถเพิ่มรูปได้
	function CheckSmile($temp){
		global $url;
		$text = array(
		":sad:",":red:", ":big:", ":ent:", ":shy:", ":sleepy:", ":sun:", ":sg:", ":embarass:", 
		":dead:", ":cool:", ":clown:", ":pukey:", ":eek:", ":roll:", ":smoke:", ":angry:", ":confused:", ":cry:", 
		":lol:", ":yawn:", ":devil:", ":tongue:", ":alien:",":tasty:",":crazy:",":agree:",":disagree:",":bawling:", 
		":crap:",":crying1:",":dunce:",":error:",":evil:",":lookaroundb:",":laugh:",":pimp:",":spiny:",":wavey:",":smash:",":angry:",
		":brain:",":phone:",":zip:",":download:",":beer:",":censore:",":nolove:",":cranium:");

		$pic =array(
		"frown.gif","redface.gif","biggrin.gif","blue.gif","shy.gif","sleepy.gif","sunglasses.gif", "supergrin.gif","embarass.gif",
		"dead.gif","cool.gif","clown.gif","pukey.gif","eek.gif","sarcblink.gif","smokin.gif","reallymad.gif","confused.gif","crying.gif",
		"lol.gif","yawn.gif","devil.gif","tongue.gif","aysmile.gif","tasty.gif","grazy.gif","agree.gif","disagree.gif","bawling.gif",
		"crap.gif","crying1.gif","dunce.gif","error.gif","evil.gif","lookaroundb.gif","laugh.gif","pimp.gif","spiny.gif","wavey.gif","smash.gif","angry.gif",
		"brain.gif","phone.gif","zip.gif","download.gif","beer.gif","censore.gif","nolove.gif","cranium.gif");

		for ($i=0 ; $i<sizeof($text) ; $i++) {
			$temp = eregi_replace($text[$i],"<img src=\"./pic/$pic[$i]\">",$temp);
		}
		return($temp);
	}


//(4) ฟังก์ชั่นตรวจสอบการแทรก Link และ Tag 
	function CheckTag($temp){
		global $url;
		$temp = stripslashes(htmlspecialchars($temp));
		$temp = eregi_replace ( "<" , "&lt;" , $temp ) ;
		$temp = eregi_replace ( ">" , "&gt;" , $temp ) ;
		$temp = eregi_replace ( "\n", "<br>" , $temp ) ;

		//สำหรับเปลี่ยนอักขระที่กำหนด ให้เป็นแทก html ต่างๆ
		$temp = eregi_replace ( "\[b\]", "<b>" , $temp ) ;
		$temp = eregi_replace ( "\[/b\]", "</b>" , $temp ) ;
		$temp = eregi_replace ( "\[i\]", "<i>" , $temp ) ;
		$temp = eregi_replace ( "\[/i\]", "</i>" , $temp ) ;
		$temp = eregi_replace ( "\[u\]", "<u>" , $temp ) ;
		$temp = eregi_replace ( "\[/u\]", "</u>" , $temp ) ;
		$temp = eregi_replace ( "\[\-\-\-\]", "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" , $temp ) ;
		$temp = eregi_replace ( "\[color=red\]", "<font color=red>" , $temp ) ;
		$temp = eregi_replace ( "\[color=green\]", "<font color=green>" , $temp ) ;
		$temp = eregi_replace ( "\[color=blue\]", "<font color=blue>" , $temp ) ;
		$temp = eregi_replace ( "\[color=orange\]", "<font color=FF6600>" , $temp ) ;
		$temp = eregi_replace ( "\[color=pink\]", "<font color=FF00FF>" , $temp ) ;
		$temp = eregi_replace ( "\[color=gray\]", "<font color=999999>" , $temp ) ;
		$temp = eregi_replace ( "\[/color\]", "</font>" , $temp ) ;

		// คำสั่งแสดงรูปที่แทรกคำสั่งเข้ามา
		$temp = eregi_replace ("\[img\]([[:alnum:]]+)://([^[:space:]]*)([[:alnum:]])\[/img\]", "<img src=\"\\1://\\2\\3\">",$temp ) ;

		// สร้างลิงค์ URL ที่แทรกคำสั่งเข้ามา (กรณีให้คำสั่ง url เข้ามา)
		$temp = eregi_replace ("\[url\]([[:alnum:]]+)://([^[:space:]]*)([[:alnum:]#?/&=])\[/url\]","<a href=\"\\1://\\2\\3\" target=\"_blank\">\\1://\\2\\3</a>",$temp ) ;

		// สร้างลิงค์ URL ที่แทรกคำสั่งเข้ามา (ต่างกันที่การเว้นช่องว่างหน้าหลัง)
		$temp = eregi_replace (" ([[:alnum:]]+)://([^[:space:]]*)([[:alnum:]#?/&=]) "," <a href=\"\\1://\\2\\3\" target=\"_blank\">\\1://\\2\\3</a> ",$temp ) ;

		// สร้างลิงค์ URL ที่แทรกคำสั่งเข้ามา (ต่างกันที่การเว้นช่องว่างหลังอย่างเดียว)
		$temp = eregi_replace ("([[:alnum:]]+)://([^[:space:]]*)([[:alnum:]#?/&=]) "," <a href=\"\\1://\\2\\3\" target=\"_blank\">\\1://\\2\\3</a> ",$temp ) ;

		//สร้างลิงค์อีเมล์
		$temp = eregi_replace ("([^[:space:]]*)@([^[:space:]]*)([[:alnum:]])","<a href=\"./mail2me/mail2me.php?wemail=\\1@\\2\\3&name=\\1@\\2\\3\" target=\"_blank\">\\1@\\2\\3</a>",$temp ) ;

		return ( $temp ) ;
	}

//(5) ฟังก์ชั่นแสดงข้อความ ผลการกระทำการ
	function Message($Size,$Color,$Message,$Comment,$Link){
		$temp = "<br><center>\n";
		$temp .= "<table width=$Size% border=0 cellspacing=0 cellpadding=0 bgcolor=#000000>\n";
		$temp .= "<tr><td><table width=100% border=0 cellpadding=2 cellspacing=1>\n";
    	$temp .= "<tr bgcolor=#FFFF99>\n"; 
    	$temp .= "<td align=center><br>\n";
		$temp .= "<font color=$Color class=size3><b>$Message</b></font>\n";
		$temp .= "<br><br>$Comment<br><br>\n";
	    $temp .= "</td></tr></table></td></tr></table><br>\n";
		if(strlen($Link)>0) $temp .= "[ $Link ]\n";
		$temp .= "</center>\n";
		return ( $temp ) ;
	}


//(7) ฟังก์ชั่นตรวจสอบการโพส.. ให้โพสติดกันได้มากสุด 3 กระทู้
	function CheckFlood($IP) { 
		include("./config.php");	//ตั้งค่าต่างๆของเวปบอร์ด
		echo "<body bgcolor=#FFFFE0 background='pic/background.jpg'>\n\n";

		$fileLastIP = "lastip.txt";

		if(file_exists($fileLastIP)) {
			$FILE=fopen($fileLastIP,"rt");
			$last_ip = fgets($FILE,20);
			fclose($FILE);
	
			$last_ip = Chop($last_ip);
			list ($ipx, $xnum,) = split ('[,]', $last_ip);
		}

		if($ipx == $IP) {
			if ($xnum>=$config[flood]){
				$check='no';
			} else {
				$check='yes';
			}
		}else{
			$check='yes';
			$xnum=0;
		}

		if ($check=='no'){
			echo Message(55,"red","ขออภัยครับ!! อนุญาตให้โพสติดกันได้เพียง $config[flood]  กระทู้","กรุณากลับมาโพสใหม่ในคราวหน้า","<a href='javascript:history.back(1)'>กลับไปแก้ไข</a>");
			exit();
		} else {
			$xnum++;
			$FILE = fopen ( $fileLastIP , "w+" );
				fputs ($FILE , "$IP,$xnum");
			fclose( $FILE);
		}
		return (1);
	}


//(8) ฟังก์ชั่นตรวจสอบการโพสกระทู้ซ้ำ.. 
	function CheckRepeated($QTitle) { 
		include("./config.php");	//ตั้งค่าต่างๆของเวปบอร์ด
		echo "<body bgcolor=#FFFFE0 background='pic/background.jpg'>\n\n";

		if(file_exists($config[fileQuestion])) {
			$question = file($config[fileQuestion]);
	
			// แยกข้อมูลในแต่ละบรรทัด ออกเป็นฟิลด์ย่อย $question[0] คือกระทู้ล่าสุด
			$split = explode("|X|",$question[0]);
			$topic = $split[1];

			if ($QTitle == $topic){
				echo Message(40,"red","ขออภัยครับ!! คุณโพสกระทู้ซ้ำ","กรุณาตรวจสอบ","<a href='javascript:history.back(1)'>กลับไปแก้ไข</a>");
				exit();
			}
		}
		return (1);
	}


//(9) ฟังก์ชั่นหาจำนวนผู้ตอบคำถาม
	function CountReply($numQuestion) { 
		include("./config.php");	//ตั้งค่าต่างๆของเวปบอร์ด

		// วนลูปอ่านข้อมูล ของคำตอบ แล้วหาจำนวนคำตอบทั้งหมด
		$fileReply = $config[dataDir]."R$numQuestion.txt";
		$countR=0; // เป็นตัวบอกว่ามีจำนวนคนตอบกี่คน

		if(file_exists($fileReply)) {
			$Reply = file($fileReply);
			for ($j=0 ; $j<sizeof($Reply) ; $j++) {

				// แยกข้อมูลในแต่ละบรรทัด ออกเป็นฟิลด์ย่อย
				$chk = explode("||",$Reply[$j]);

				// ถ้าฟิลด์ที่ 0 ของข้อมูลที่แบ่งออกมา เท่ากับ "IS_reply" (ตัวแบ่งหมายเลขคำถาม) ให้เพิ่มค่า $countR
				if(substr($chk[0],0,8) == "IS_reply"){ $countR++; }
			}// end for j
		}//end if
		return $countR;
	}

//(9) ฟังก์ชั่นตรวจสอบว่าในกระทู้มี การแทรกไฟล์ มาหรือเปล่า
//	function CheckInsertFile($category, $wb_id) { 
	function CheckImage($No) { 
		include("./config.php");	//ตั้งค่าต่างๆของเวปบอร์ด
		$fileOK=array();
		$fileOK[0] = 0;
		$fileOK[1] = 0;

		// ค้นหาไฟล์รูปที่อยู่ในคำถาม
		$fileQImg=$config[dataDir]."imagefiles/$No";
		if(file_exists("$fileQImg.jpg")) $fileOK[1]=1; //มีการแทรกไฟล์รูป
		else if(file_exists("$fileQImg.gif")) $fileOK[1]=1; //มีการแทรกไฟล์รูป
		else if(file_exists("$fileQImg.swf")) $fileOK[0]=1; //มีการแทรกไฟล์ flash

		// ค้นหาไฟล์รูปที่อยู่ในคำตอบ
		$fileNumImgR=$config[dataDir]."imagefiles/Img$No.txt";
		$fileImgR=$config[dataDir]."imagefiles/R$No";
		if(file_exists($fileNumImgR)) {
			// อ่านจำนวนของรูปจากไฟล์
			if(file_exists($fileNumImgR)) {
				$FILE=fopen($fileNumImgR,"rt");
					$numImg=fgets($FILE,10);
				fclose($FILE);
			}
			for ($i=1 ; $i<=$numImg ; $i++){
				if(file_exists("$fileImgR-$i.jpg")) $fileOK[1]=1; //มีการแทรกไฟล์รูป
				else if(file_exists("$fileImgR-$i.gif")) $fileOK[1]=1; //มีการแทรกไฟล์รูป
				else if(file_exists("$fileImgR-$i.swf")) $fileOK[0]=1; //มีการแทรกไฟล์ flash
			}
		}
		return $fileOK;
	}

//(7) ฟังก์ชั่นตรวจสอบการส่งรูป และ copy รูปไว้ในไดเรคทอรี่
	function Send_Img($type, $No, $category, $fileupload){
		include("./config.php");	//ตั้งค่าต่างๆของเว็บบอร์ด
		echo "<link href='./style.css' rel=stylesheet type='text/css'>\n";
		echo "<body bgcolor=#FFFFE0 background='pic/background.jpg'>\n\n";
		if($fileupload[name]!=$config[chkimg]) {		// ถ้ามีการส่งรูปมาด้วย
			$imgtype=0;
			for($i=0;$i<sizeof($config[upfile]);$i++)
			{
				if($fileupload[type]==$config[upfile][$i]) {
					$imgfiles=$config[typeof][$i];
					$imgtype=1;
				}
			}

			if($imgtype==0)
			{
				echo Message(60,"red","ไม่ใช่ไฟล์รูปภาพ .gif .jpg .png หรือไฟล์ Flash","กรุณาตรวจสอบก่อนส่ง","<a href='javascript:history.back(1)'> กลับไปแก้ไข </a>");
				exit();
			}

			if($fileupload[type]=="application/x-shockwave-flash"){
				// ส่ง flash ได้ไม่เกิน ที่กำหนด (เปลี่ยนได้ที่ config.php)
				if($fileupload[size]>$config[flashSize_limit]) {
					echo Message(45,"red","ขนาดความจุของ Flash เกินกว่าที่กำหนด","ต้องมีความจุไม่เกิน ".($config[flashSize_limit]/1024)."Kb กรุณาตรวจสอบก่อนส่ง","<a href='javascript:history.back(1)'> กลับไปแก้ไข </a>");
					exit();
				}
				// ตรวจสอบความกว้างของไฟล์ Flash
				$size = getimagesize($fileupload[tmp_name]);	
				if($size[0] > $config[flashWidth]) {  //ถ้าความกว้างมากกว่า 600 pixels (แก้ไขได้ที่ config)
					echo Message(45,"red","ความกว้างของ Flash มากกว่า $config[flashWidth] pixels","กรุณาตรวจสอบและแก้ไข","<a href='javascript:history.back(1)'>กลับไปแก้ไข</a>");
					exit();
				}
			}
			else{
				// ส่งรูปได้ไม่เกิน ที่กำหนด (เปลี่ยนได้ที่ config.php)
				if($fileupload[size]>$config[imgSize_limit]) {
					echo Message(45,"red","ขนาดความจุของรูปเกินกว่าที่กำหนด","ต้องมีความจุไม่เกิน ".($config[imgSize_limit]/1024)."Kb กรุณาตรวจสอบก่อนส่ง","<a href='javascript:history.back(1)'> กลับไปแก้ไข </a>");
					exit();
				}
				// ตรวจสอบความกว้างของรูป
				$size = getimagesize($fileupload[tmp_name]);	
				if($size[0] > $config[imgWidth]) {  //ถ้าความกว้างมากกว่า 600 pixels (แก้ไขได้ที่ config)
					echo Message(45,"red","ความกว้างของรูปมากกว่า $config[imgWidth] pixels","กรุณาตรวจสอบและแก้ไข","<a href='javascript:history.back(1)'>กลับไปแก้ไข</a>");
					exit();
				}
			}

			// ตรวจสอบว่ามีไดเรคทอรี่ชื่อ imagefiles อยู่หรือไม่ ถ้าไม่มีให้สร้างขึ้นใหม่
			$DirOK = 0;
			$DIR = opendir($config[dataDir]);
			while ($text = readdir($DIR)){
				if($text == "imagefiles") $DirOK = 1;
			}
			if(!$DirOK) mkdir($config[dataDir]."imagefiles/",0777);
		
			// ถ้าเป็นการส่งรูปจากการตอบ (เนื่องจากการตอบจะตอบได้หลายคนและอาจจะส่งมาหลายรูป)
			if($type){
				// อ่านจำนวนของรูปจากไฟล์
				$filename = $config[dataDir]."imagefiles/Img$No.txt"; 
				if(file_exists($filename)) {
					$FILE=fopen($filename,"rt");
					$num=fgets($FILE,10);
					fclose($FILE);
				}
				else{
					$num=0;
				}

				$num++;  //เพิ่มค่าขึ้น 1

				// บันทึกค่าจำนวนรูปลงในไฟล์ดังเดิม ด้วยค่าใหม่
				$FILE=fopen($filename,"w");
				flock($FILE,2);
				fputs($FILE,$num);
				flock($FILE,3);
				fclose($FILE);
				$ImgName = "R$No-$num$imgfiles";
			}
			else {
				$ImgName = "$No$imgfiles";
			}

			// copy ไฟล์รูปไปเก็บไว้ในไดเรคทอรี่ที่ระบุไว้
			copy($fileupload[tmp_name],$config[dataDir]."imagefiles/$ImgName");
			return ($ImgName);
		} // จบการตรวจสอบ ว่าส่งรูปมาหรือเปล่า
		else {
			return (0);
		}
} // จบฟังก์ชั่น

?>