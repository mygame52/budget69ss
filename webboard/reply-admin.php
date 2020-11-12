 <?
	include("./config.php");	//ตั้งค่าต่างๆของเว็บบอร์ด
	include("./function.php");		//ฟังก์ชั่นที่ใช้ในเว็บบอร์ด

	$fileupload=$_FILES["fileupload"];

	$Msg = $HTTP_POST_VARS['Msg'];
	$Byname = $HTTP_POST_VARS['Byname'];
	$Email = $HTTP_POST_VARS['Email'];
	$No = $HTTP_GET_VARS['No'];

	$nByname = strlen($Byname);
	$nMsg = strlen($Msg);

	// ตรวจสอบค่าที่ส่งมาอักครั้ง เพื่อความชัวร์
	if($nByname<=0 && $nMsg<=0) {
		echo Message(50,"red","ข้อความส่งมาไม่สมบูรณ์","อาจใส่ข้อมูลไม่ครบ หรือตกหล่นระหว่างการส่งข้อมูล กรุณาส่งข้อความอีกครั้ง","<a href='javascript:history.back(1)'> กลับไปแก้ไข </a>");
		exit();
	}

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

	// ตรวจสอบว่า มีการป้อน url หรือ email มาหรือไม่ ถ้ามีให้ทำ link  *** ต้องอยู่ก่อนพวกเลย.. เดี๋ยววุ่น.....
	$Msg = CheckTag($Msg);

	$Byname = stripslashes(htmlspecialchars($Byname));

	// ป้องกันคำหยาบ
	$Byname = CheckRude($Byname);
	$Email = CheckRude($Email);
	$Msg = CheckRude($Msg);

	// ตรวจสอบการแทรกรูปภาพ และโลโก้
	$Msg = CheckSmile($Msg);

	// ตรวจสอบการแสดงรูปกราฟฟิกซองจดหมาย และสร้าง Link
	if(eregi("^.+@.+\..+$",$Email)) {
		$Byname = "โดยคุณ <a href=\"./mail2me/mail2me.php?wemail=$Email&name=$Byname\" target=\"_blank\">$Byname <img src='./pic/email.gif' border=0 alt='ส่งเมล์ถึง $Byname'></a>";
	}
	else {
		$Byname ="โดยคุณ <b>$Byname</b>";
	}

	//อ่านข้อมูลจำนวนคนตอบคำถามจากไฟล์
	$fileVisitor = $config[dataDir]."$No.dat";
	if(file_exists($fileVisitor)) {
		$lineVisitor = file($fileVisitor);
		// แยกข้อมูลในแต่ละบรรทัด ออกเป็นฟิลด์ย่อย
		$chkVisitor = explode("||",$lineVisitor[0]);
		$num = $chkVisitor[0];	
		$Visitor = $chkVisitor[1];	
	}
	$num++; 	// เพิ่มจำนวนคนตอบคำถาม
	
	// ถ้าอนุญาตให้อัปโหลดรูปได้	(1 ตัวแรกนั่นคือการอัปโหลดรูปจากการตอบกระทู้)
	if($config[SendImageByTopic]>=1){
		if($config[SendImageByTopic]==2){
			if($isMember)
			$ImgDisplay = Send_Img(1, $No, $category, $fileupload);
		}
		else
			$ImgDisplay = Send_Img(1, $No, $category, $fileupload);
	}

	//บันทึกคำตอบลงไฟล์ โดยคำตอบล่าสุดจะอยู่ล่าง
	$filename=$config[dataDir]."R$No.txt";
	$FILE=fopen("$filename","a");
	flock($FILE,2);

	if($config[BorderR]){
		//กรอบโค้งมน
		fputs($FILE,"<table width=600 border=0 cellspacing=0 cellpadding=0 align=center bgcolor=#99CCFF>\n");
		fputs($FILE,"<tr valign=top><td width=9><img src=\"pic/b_top_left1.gif\"></td>\n");
		fputs($FILE,"<td width=580 background=\"pic/b_line_top.gif\"><img src=\"pic/tc.gif\"><img src=\"pic/b_line_top.gif\"></td>\n");
		fputs($FILE,"<td align=right width=9><img src=\"pic/b_top_right1.gif\"></td></tr>\n");
		fputs($FILE,"<tr><td width=9 background=\"pic/b_line_left.gif\" valign=top><img src=\"pic/tc.gif\"></td>\n");
		fputs($FILE,"<td width=581><table width=100% border=0 cellspacing=0 cellpadding=5><tr valign=top> \n");
		fputs($FILE,"<td height=50>");

		if($config[SendImageByReply]>0 && strlen($ImgDisplay)>1)
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

		fputs($FILE,"$Msg</td></tr></table></td>\n");	
		fputs($FILE,"<td width=9 background=\"pic/b_line_right.gif\" valign=top align=right><img src=\"pic/tc.gif\"></td>\n");
		fputs($FILE,"</tr><tr><td width=9 valign=top background=\"pic/b_line_left.gif\"><img src=\"pic/tc.gif\"></td>\n");
		fputs($FILE,"<td width=581><img src=\"pic/tc.gif\"><img src=\"pic/tc.gif\"></td>\n");
		fputs($FILE,"<td width=9 align=right valign=top background=\"pic/b_line_right.gif\"><img src=\"pic/tc.gif\"></td></tr>\n");
		fputs($FILE,"<tr><td width=9 background=\"pic/b_line_left.gif\" valign=top><img src=\"pic/tc.gif\"></td>\n");
		fputs($FILE,"<td width=581>$Byname $IP [ $ThaiDateFull ] ผู้ตอบคนที่ $num</td>\n");
		fputs($FILE,"<td width=9 background=\"pic/b_line_right.gif\" valign=top align=right><img src=\"pic/tc.gif\"></td>\n");
		fputs($FILE,"</tr><tr><td width=9 valign=top height=9> <img src=\"pic/b_bottom_left1.gif\"></td>\n");
		fputs($FILE,"<td width=581 background=\"pic/b_line_bottom.gif\" height=9 valign=top><img src=\"pic/tc.gif\"></td>\n");
		fputs($FILE,"<td width=9 align=right valign=top height=9><img src=\"pic/b_bottom_right1.gif\"></td></tr></table>\n");
	}
	else{
		// กรอบสี่เหลี่ยมธรรมดา
		fputs($FILE,"<table width=600 border=0 cellspacing=0 cellpadding=0 bgcolor=#0000FF><tr><td><table border=0 width=600 cellpadding=0 cellspacing=1><tr bgcolor=#99CCFF>\n");
		fputs($FILE,"<td><table border=0 width=100% align=center height=30 cellpadding=3 cellspacing=3><tr valign=top><td>");

		if($config[SendImageByReply]>0 && strlen($ImgDisplay)>1)
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

		fputs($FILE,"$Msg</td></tr></table>\n");
		fputs($FILE,"<table border=0 width=100% align=center cellpadding=3 cellspacing=3>\n");
		fputs($FILE,"<tr><td align=left>$Byname $IP [ $ThaiDateFull ] ผู้ตอบคนที่ $num</td></tr>\n");
		fputs($FILE,"</table></td></tr></table></td></tr></table>\n");
	}

	fputs($FILE,"IS_reply$num||\n\n\n");  //สำหรับแบ่งว่าเป็นคำถามที่เท่าไหร่ (ใช้ในการลบคำตอบ สำมะคัญนะ) 
	flock($FILE,3);
	fclose($FILE);

	//บันทึกจำนวนคนตอบคำถาม
	$mdate=trim($mdate);
	$Creply=fopen($config[dataDir]."$No.dat","w");
	flock($Creply,2);
	fputs($Creply,"$num||$Visitor||$mdate||\n");
	flock($Creply,3);
	fclose($Creply);


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
				if($chk[0]==$No){
					fputs( $FILE , "$chk[0]|X|$chk[1]|X|$chk[2]|X|$chk[3]|X|$chk[4]|X|$chk[5]|X|$Logtime|X|\n");   //$Logtime ตัวแปรจากไฟล์ function.php
					if($chk[4]!="-" && $chk[5]!=0) { $emailTo = $chk[4]; $emailOK = 1; $topic=$chk[1];}
				}
				else{
					fputs( $FILE , "$chk[0]|X|$chk[1]|X|$chk[2]|X|$chk[3]|X|$chk[4]|X|$chk[5]|X|$chk[6]|X|\n");
				}
			} //จบลูป for $j

	flock($FILE,3);
	fclose($FILE);

	//ส่งเมล์บอกผู้ตั้งคำถาม กรณีที่ผู้ตั้งคำถามต้องการ
	if($emailOK){
		$subject ="มีผู้ตอบคำถามของคุณในเว็บบอร์ดแล้ว";
		$msg  = "มีผู้ตอบคำถาม [$topic]\n";
		$msg .= "ของคุณแล้ว และคุณสามารถเข้าไปดูคำตอบได้ที่\n";
		$msg .= $config[url].$config[webboard]."view-admin.php?No=$No\n\n";
		$from = "From: $config[email]\nReply-To: $config[email]\nReturn-Path: $config[email]";
		mail($emailTo , $subject , $msg , $from);
	}

	// เพิ่มเลข ศูนย์ หน้าหมายเลขคำถาม 4 ตัว
	$ShowNo = sprintf("%04d",$No);


?>

<html>
<head>
<title><?=$config[title]?></title>
<meta http-equiv="Content-Type" content="text/html; charset=Windows-874">
<META HTTP-EQUIV="REFRESH" CONTENT="2; URL=view-admin.php?No=<? echo $No; ?>&visitOK=1">
<link href="./style.css" rel="stylesheet" type="text/css">
</head>

<body bgcolor=#FFFFE0>
<br>
<?
		echo Message(60,"green","ได้รับข้อมูลแล้วครับ","เราจะพาคุณกลับไปสู่ <font color=red><b>Webboard</b></font> คำถามที่ <font color=blue><b>$ShowNo</b></font> โดยไม่ต้องกดปุ่มใดๆ","");
?>
</body>
</html>
