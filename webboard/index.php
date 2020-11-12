<?
	include("./config.php");	//ตั้งค่าต่างๆของเว็บบอร์ด
	include("./function.php");		//ฟังก์ชั่นที่ใช้ในเว็บบอร์ด
?>
<head>
<title><?=$config[title]?></title>
<meta http-equiv="Content-Type" content="text/html; charset=Windows-874">
<link href="./style.css" rel="stylesheet" type="text/css">
<script language="JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
</head>

<body bgcolor=#FFFFE0 background="pic/background.jpg">
<p align="CENTER"><br>
<b><font face="LilyUPC" size="+4" color=#9400d3><?=$config[txtheader]?></font></b><br>  <?=$config[headerdetail]?> 
<br><br>
</p>
<table width="98%" border="0" align="center" cellpadding="2" cellspacing="0">
<tr> 
<td width="44%">[ <a href="<?=$config[url]?>">Home</a> | <a href="webboard.php">กลับหน้าหลักเว็บบอร์ด</a> | <a href="new.php">ตั้งกระทู้ใหม่</a> ]</td>
<td width="56%" align="right">[ <a href="login.php">ลบคำถาม - คำตอบ</a> ]</td>
</tr>

<?

	$sequence = $_GET['sequence'];
	$listpage = $_GET['listpage'];
	$page = $_GET['page'];

	if (empty($sequence)) { $selected[0]="selected"; }
	if ($sequence == 1) { $selected[1]="selected"; }
	if ($sequence == 2) { $selected[2]="selected"; }

	if (empty($listpage)) $listpage=10;
	if (empty($page)) $page=1;
	$listpageselected[$listpage]="selected"; //ตัวกำหนดให้แสดงลิสส์จำนวนหน้า ที่ตำแหน่งลิสส์ที่เลือก
	
	$stop = $page * $listpage;
	$start = $stop - $listpage;

	if(file_exists($config[fileQuestion])) {	// ถ้ามีไฟล์หัวข้อคำถาม
		$question = file($config[fileQuestion]);

		// เรียงตาม ( วันที่ ) ที่มีคนตอบ
		if($sequence==1){
			for ($i=0 ; $i<(sizeof($question)-1); $i++) {
				for ($j=0 ; $j<(sizeof($question)-1); $j++) {

					// แยกข้อมูลในแต่ละบรรทัด ออกเป็นฟิลด์ย่อย
					$split = explode("|X|",$question[$j]);
					$split1 = explode("|X|",$question[$j+1]);

					if($split1[6] >= $split[6]){
						$swap = $question[$j];
						$question[$j] = $question[$j+1];
						$question[$j+1] = $swap;
					} //จบ if
				} //จบ for j
			} //จบ for i
		} //จบ if $sequence .. 1


		// เรียงตามจำนวนคนตอบ
		if($sequence==2){
			for ($i=0 ; $i<(sizeof($question)-1); $i++) {
				for ($j=0 ; $j<(sizeof($question)-1); $j++) {

					// แยกข้อมูลในแต่ละบรรทัด ออกเป็นฟิลด์ย่อย
					$split = explode("|X|",$question[$j]);
					$split1 = explode("|X|",$question[$j+1]);

					//========================================
					// วนลูปอ่านข้อมูลหาจำนวนผู้เข้าชม และวันที่ล่าสุดที่ตอบคำถาม
					$fileVisitor = $config[dataDir]."$split[0].dat";
					if(file_exists($fileVisitor)) {
						$lineVisitor = file($fileVisitor);
						// แยกข้อมูลในแต่ละบรรทัด ออกเป็นฟิลด์ย่อย
						$chkVisitor = explode("||",$lineVisitor[0]);
						$ReplyNum = $chkVisitor[0];	 //จำนวนผู้ตอบคำถาม
					}
					$fileVisitor = $config[dataDir]."$split1[0].dat";
					if(file_exists($fileVisitor)) {
						$lineVisitor = file($fileVisitor);
						// แยกข้อมูลในแต่ละบรรทัด ออกเป็นฟิลด์ย่อย
						$chkVisitor = explode("||",$lineVisitor[0]);
						$ReplyNum1 = $chkVisitor[0];	 //จำนวนผู้ตอบคำถาม
					}//========================================

					if($ReplyNum1 >= $ReplyNum){
						$swap = $question[$j];
						$question[$j] = $question[$j+1];
						$question[$j+1] = $swap;

					} //จบ if
				} //จบ for j
			} //จบ for i
		} //จบ if $sequence .. 2

		//จำนวนหัวข้อคำถาม
		$All_Q = sizeof($question);

		// แสดงจำนวนของกระทู้ทั้งหมด และที่เป็นตารางเพราะสืบเนื่องมาจากตารางก่อนหน้านี้  ยังไม่ครบ syntax
  		echo "<tr>";
		echo "<form method=post action=\"./search.php\" name=\"SearchForm\" onsubmit=\"return check();\">";
		echo "<td width='44%'><font color=green>จํานวนกระทู้ทั้งหมด<b><font color=red> $All_Q </font></b>คำถาม</font></td>";
		echo "<td width='56%' align=right valign=baseline><img src=\"./pic/find.gif\"> ค้นหากระทู้ "; 
		echo "<input type=text name=search size=20 maxlength=100 class=violet> ";
		echo "<input type=submit value='ค้นหา' name=submit class=BUTTON>";
		echo "</td>";
  		echo "</form></tr>";
		echo "</table>";

		// แสดงหัวข้อต่างๆ ของตารางแสดงกระทู้
		echo "<TABLE align=center cellSpacing=0 cellPadding=0 width=98% border=0 bgcolor=#000000>";
		echo "<TR><TD>";
		echo "<table width='100%' border=0 cellpadding=3 cellspacing=1 align='center'>";
  		echo "<tr bgcolor=$config[headColor]>";
		echo "<td align=center width=9%><font color=#FFFFFF><b>กระทู้ที่</b></font></td>\n";
		echo "<td align=center width=44%><font color=#FFFFFF><b>กระทู้ / Topic</b></font></td>\n";
		echo "<td align=center width=25%><font color=#FFFFFF><b>ผู้ตั้งกระทู้</b> [วันที่ถาม]</font></td>\n";
		echo "<td align=center width=7%><font color=#FFFFFF><b>อ่าน</b></font></td>\n";
		echo "<td align=center width=15%><font color=#FFFFFF><b>ตอบ</b> [วันที่ตอบ]</font></td>\n";
  		echo "</tr>\n\n";

		for ($i=$start ; $i<$All_Q ; $i++) {

			if($i<$stop){
				// แยกข้อมูลในแต่ละบรรทัด ออกเป็นฟิลด์ย่อย
				$split = explode("|X|",$question[$i]);

				$numQuestion = $split[0]; // หมายเลขคำถามที่ไม่มีเลข ศูนย์ นำหน้า
				$Question = $split[1];  //คำถาม
				$Name = $split[2]; //ผู้ถาม
				$Date = trim($split[3]); //วันที่ถาม
				$NumReplyDate = $split[6]; //วันที่ตอบคำถามล่าสุด (ค่าเป็นวินาทีนับจากปี ค.ศ. 1900)
				
				// เพิ่มเลข ศูนย์ หน้าหมายเลขคำถาม 4 ตัว
				$No = sprintf("%04d",$split[0]);

				// หาจำนวนผู้ตอบทั้งหมด
				$countR = CountReply($numQuestion); // เป็นตัวบอกว่ามีจำนวนคนตอบกี่คน

				// วนลูปอ่านข้อมูลหาจำนวนผู้เข้าชม และวันที่ล่าสุดที่ตอบคำถาม
				$fileVisitor = $config[dataDir]."$numQuestion.dat";
				if(file_exists($fileVisitor)) {
					$lineVisitor = file($fileVisitor);
					// แยกข้อมูลในแต่ละบรรทัด ออกเป็นฟิลด์ย่อย
					$chkVisitor = explode("||",$lineVisitor[0]);
					$Visitor = $chkVisitor[1];	 //จำนวนผู้เข้าชม
					$ReplyDate = $chkVisitor[2];	//วันที่ตอบคำถามล่าสุด
				}

				// กำหนดสีของตาราง เพื่อให้มีการสลับสี ค่าของตัวแปร $rowColor อยู่ในไฟล์ config
				$bgc = ($bgc==$config[rowColor1]) ? $config[rowColor2] : $config[rowColor1]; 

				$flashOK="";
				$imgOK="";
				// ตรวจสอบว่ามี flash หรือ รูป อยู่ในกระทู้หรือเปล่า
				$chkFile=CheckImage($numQuestion);
				if($chkFile[0]==1) $flashOK="<img src='./pic/flash1.gif' alt='มีไฟล์ Flash แทรกอยู่ในกระทู้นี้'>";
				if($chkFile[1]==1)$imgOK="<img src='./pic/cam.gif' alt='มีรูปภาพแทรกอยู่ในกระทู้นี้'>";

				echo "<tr bgcolor=$bgc>\n";
				//ตรวจสอบคนตอบ ในวันนี้
				if($Logtime<=($NumReplyDate+86400)) {  //86400 วินาที = หนึ่งวัน
					$chknew="<img src='./pic/update.gif'>";
				}else {
					$chknew="";
				}

				// กำหนดภาพ icon หน้าหมายเลขกระทู้
				// ถ้าต้องการให้ icon ของคำถามฮอต แสดงที่จำนวนคนตอบ ที่เท่าไหร่ก็เปลี่ยนตัวเลขเองนะครับ 
				//(ในที่นี้คือตอบตั้งแต่ 10 คนขึ้นไป) เปลี่ยนได้ที่ config.php
				if($ReplyDate!="-") {
					$icon = ($countR>=$config[Hot]) ? "<img src='./pic/hot_topic.gif'>" : "<img src='./pic/open_topic.gif'>"; 
				}
				else {
					$icon = ($Date==$mdate) ? "<img src='./pic/new_topic.gif'>" : "<img src='./pic/close_topic.gif'>"; 
				}

				// แสดงคำถาม
				echo "<td align='center'> $icon <b><font color='#666666'>$No</font></b></td>\n";
				echo "<td><a href='./view.php?No=$numQuestion' target=\"_blank\">$Question</a> $imgOK  $flashOK $chknew</td>\n";
				echo "<td><font color='#666666'><b> $Name </b>[$Date]</font></td>\n";
				echo "<td align='center'><font  color='#666666'> $Visitor </font></td>\n";
				if($countR!=0){
					echo "<td><font  color=green><b> $countR</b></font> [$ReplyDate]</td>\n";
				}else {
					echo "<td><font  color=green><b> $countR</b></font></td>\n";
				}
				echo "</tr>\n\n";
			} // end if

		} // end for

		// ปิดตารางแสดงผลกระทู้
		echo "</table>\n";
		echo "</TD></TR>\n";
		echo "</TABLE>\n";

		$rt = $All_Q%$listpage;
		$totalpage = ($rt!=0) ? floor($All_Q/$listpage)+1 : floor($All_Q/$listpage);

		echo "<table width='98%' border=0 cellpadding=2 cellspacing=0 align='center'><tr><td valign=top>\n";
		echo "<img src='./pic/new_topic1.gif'> = คำถามใหม่ \n";
		echo "<img src='./pic/close_topic.gif'> = คำถามที่ยังไม่มีคนตอบ \n";
		echo "<img src='./pic/open_topic.gif'> = คำถามที่ถูกตอบแล้ว \n";
		echo "<img src='./pic/hot_topic.gif'> = คำถามสุดฮอต \n";
		echo "</td><td align=right>\n";

		echo "<select name=\"menu\" onChange=\"MM_jumpMenu('parent',this,0)\" class=violet>\n";
        echo "<option value=\"./webboard.php?listpage=$listpage\" $selected[0]>เรียงตามหมายเลขคำถาม</option>\n";
        echo "<option value=\"./webboard.php?sequence=1&listpage=$listpage\" $selected[1]>เรียงตามวันที่มีคนตอบ</option>\n";
        echo "<option value=\"./webboard.php?sequence=2&listpage=$listpage\" $selected[2]>เรียงตามจำนวนคนตอบ</option>\n";
        echo "</select> "; 
		
		echo "<select name=\"numpagemenu\" onChange=\"MM_jumpMenu('parent',this,0)\" class=violet>\n";
        echo "<option value=\"./webboard.php?sequence=$sequence&listpage=10\" $listpageselected[10]>10 กระทู้/หน้า</option>\n";
        echo "<option value=\"./webboard.php?sequence=$sequence&listpage=15\" $listpageselected[15]>15 กระทู้/หน้า</option>\n";
        echo "<option value=\"./webboard.php?sequence=$sequence&listpage=20\" $listpageselected[20]>20 กระทู้/หน้า</option>\n";
        echo "<option value=\"./webboard.php?sequence=$sequence&listpage=30\" $listpageselected[30]>30 กระทู้/หน้า</option>\n";
        echo "<option value=\"./webboard.php?sequence=$sequence&listpage=50\" $listpageselected[50]>50 กระทู้/หน้า</option>\n";
        echo "</select>\n";
		echo "</td></tr>\n\n";
		echo "<tr><td valign=top colspan='2'>\n";


		// สร้าง link เพื่อไปหน้าก่อน-หน้าถัดไป
		if($page>1 && $page<=$totalpage) {
			$prevpage = $page-1;
			echo "<a href='webboard.php?page=$prevpage&sequence=$sequence&listpage=$listpage'>หน้าก่อนนี้=$prevpage</a> \n";
		}

		echo "<font color=green>กำลังแสดงหน้าที่ $page/$totalpage</font>\n";

		if($page!=$totalpage) {
			$nextpage = $page+1;
			echo " <a href='webboard.php?page=$nextpage&sequence=$sequence&listpage=$listpage'>หน้าถัดไป=$nextpage</a>\n";
		}
		
		echo "<br> ";

		// วนลูปแสดงเลขหน้าทั้งหมด แบบเป็นช่วงๆ ช่วงละ 10 หน้า
		$b=floor($page/10); //หน้า (1 ถึง 9=0) (10 ถึง 19=1) (20 ถึง 29=2)
		$c=(($b*10));

		if($c>1) {
			$prevpage = $c-1;
			echo "<a href='webboard.php?page=$prevpage&sequence=$sequence&listpage=$listpage' title='10 หน้าก่อนนี้'><<</a> \n";
		}
		else{
			echo "<<\n";
		}

		echo " <b>";
		
		for($i=$c; $i<$page ; $i++) {
			if($i>0)
			echo "<a href='webboard.php?page=$i&sequence=$sequence&listpage=$listpage'>$i</a> \n";
		}

		echo "<font size=2 color=red>$page</font> \n";

		for($i=($page+1); $i<($c+10) ; $i++) {
			if($i<=$totalpage)
			echo "<a href='webboard.php?page=$i&sequence=$sequence&listpage=$listpage'>$i</a> \n";
		}

		echo "</b> ";

		if($c>=0) {
			if(($c+10)<$totalpage){
				$nextpage = $c+10;
				echo "<a href='webboard.php?page=$nextpage&sequence=$sequence&listpage=$listpage' title='10 หน้าถัดไป'>>></a> \n";
			}
			else
				echo ">>\n";
		}
		else{
			echo ">>\n";
		}
		
	} 
	// ถ้าไม่มีไฟล์ หัวข้อคำถาม ให้ทำตามนี้
	else {
		echo "</table>"; // ปิดตารางของข้อความ [ ตั้งกระทู้ใหม่ | กลับหน้าแรก ] ที่อยู่ในแทก html
		echo "<br><br><font color=red class=size3><b>\n"; 
		echo "<p align=center>ยังไม่มีกระทู้ในฐานข้อมูล<br></p></b>\n";
		echo "</font> <br><br>\n\n";
	}
?> 

<center>[ <a href="new.php">ตั้งกระทู้ใหม่</a> ]
<br><br>
<< กรุณาใช้ถ้อยคำสุภาพ >><br><br>
</center>

<script language="JavaScript">
function check()
{
      var v1 = document.SearchForm.search.value;
        if ( v1.length==0)
           {
           alert("กรุณาป้อนคำที่ต้องการค้นหา");
           document.SearchForm.search.focus();
           return false;
           }
		 else
           return true;
}
</script>

</body>
</html>
