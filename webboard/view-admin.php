<?
	session_Start();
	include("./config.php");	//ตั้งค่าต่างๆของเว็บบอร์ด
	include("./function.php");		//ฟังก์ชั่นที่ใช้ในเว็บบอร์ด
?>
<head>
<title><?=$config[title]?></title>
<meta http-equiv="Content-Type" content="text/html; charset=Windows-874">
<link href="./style.css" rel="stylesheet" type="text/css">
</head>

<body bgcolor=#FFFFE0 background="pic/background.jpg">
<div align="center"><b><font face="LilyUPC" size="+4" color=#9400d3> <?//=$config[txtheader]?></font></b>
<?//=$config[headerdetail]?>
<table width="98%" border="0" align="center" cellpadding="2" cellspacing="0">
<tr> 
<td width="40%">[ <a href="webboard-admin.php">กลับหน้าหลักเว็บบอร์ด</a>]</td>
<td width="60%" align="left"><font color=green class=size3><b>ขอเชิญร่วมตอบคำถามครับ</b></font></td>
</tr>
</table>
<br>
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
			}else {
				echo "<br>";
			}

		}
	}

	//เพิ่มจำนวนผู้เข้าชม
	$fileVisitor = $config[dataDir]."$No.dat";
	if(file_exists($fileVisitor)) {
		$lineVisitor = file($fileVisitor);
		// แยกข้อมูลในแต่ละบรรทัด ออกเป็นฟิลด์ย่อย
		$chkVisitor = explode("||",$lineVisitor[0]);
		$num = $chkVisitor[0];	
		$Visitor = $chkVisitor[1];	
		$ReplyDate = trim($chkVisitor[2]);	
		
		if(!isset($visitOK)) $Visitor++; //เพิ่มจำนวนคนเข้าชม

		//บันทึกจำนวนคนเข้าชม
		$cReply=fopen($fileVisitor,"w");
		flock($cReply,2);
		fputs($cReply,"$num||$Visitor||$ReplyDate||");
		flock($cReply,3);
		fclose($cReply);
	}

?>

<br>
</div>
<table width="600" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FF8C00">
  <?
	if($config[SendImageByReply])
		echo "<form method=post action=\"reply-admin.php?No=$No\" name=\"webForm\" onSubmit=\"return check()\" enctype=\"multipart/form-data\">";
	else
		echo "<form method=post action=\"reply-admin.php?No=$No\" name=\"webForm\" onSubmit=\"return check()\">";
?> 
  <tr> 
    <td> 
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td valign="top" width="3%"><img src="pic/topleft.gif" width="14" height="14"></td>
          <td width="94%">
            <table width="100%" border="0" cellspacing="0" cellpadding="2">
              <tr align="center"> 
                <td><font color="#FFFFFF" class=size3><b>ขอเชิญร่วมตอบคำถามครับ</b></font></td>
              </tr>
            </table>
          </td>
          <td width="3%" valign="top" align="right"><img src="pic/topright.gif" width="14" height="14"></td>
        </tr>
      </table>
    </td>
  </tr>
    <tr> 
      <td> 
        <table width=100% border=0 bordercolor=#FF8C00 cellpadding=2 cellspacing=1 align="center">
          <tr bgcolor="#FFDEAD"> 
            <td> 
              <table border=0 width=100% cellpadding="2" cellspacing="0">
                <tr> 
                  <td align=right valign=top><font color="#FF9900"><b>ความคิดเห็น</b></font></td>
                  <td> 
                    <textarea  name="Msg" cols=65 rows=10 class=orenge></textarea>
                  </td>
                </tr>
                <tr> 
                  <td align=right><font color="#FF9900"><b>โดย</b></font></td>
                  <td> 
					<?php
						$user_conv = iconv('UTF-8','TIS-620',$user_);
					?>
					
					<input size=66 type=text name="Byname" maxlength=50 class=orenge  
					  value="<?php echo "จังหวัด".' : '.$user_conv ?>" readonly="readonly">
				  </td>
                </tr>
                <tr> 
                  <td align=right><font color="#FF9900"><b>E-mail</b></font></td>
                  <td> 
                    <input  size=35 type=text name="Email" maxlength=50 class=orenge>
                  </td>
                </tr>

<?
	if($config[SendImageByReply]){
		echo "<tr><td align=right><font color=#FF9900><b>ส่งไฟล์ภาพ</b></font></td>\n";
        echo "<td><input type=\"file\" name=\"fileupload\" class=orenge size=24><font color=#FF0033> (รูป ". ($config[imgSize_limit]/1024) ." Kb, Flash ".($config[flashSize_limit]/1024)." Kb)</font> </td></tr>\n";
	}
?>
              </table>
            </td>
          </tr>
          <tr bgcolor="#FFCC88" valign="bottom"> 
            <td align=center> 
				<a href="javascript:setURL()"><img src="pic/link.gif" border=0 alt="แทรกลิงค์ URL"></a> 
				<a href="javascript:setImage()"><img src="pic/tree.gif" border=0 alt="แทรกรูป"></a> 
                <a href="javascript:setsmile('[---]')"><img src="pic/indent.gif" border=0 alt="ย่อหน้า"></a> 
                <a href="javascript:setBold()"><img src="pic/b.gif" border=0 alt="ตัวหนา"></a> 
                <a href="javascript:setItalic()"><img src="pic/i.gif" border=0 alt="ตัวเอียง"></a> 
                <a href="javascript:setUnderline()"><img src="pic/u.gif" border=0 alt="เส้นใต้"></a> 
                <a href="javascript:setColor('red','แดง')"><img src="pic/redcolor.gif" border=0 alt="สีแดง"></a> 
                <a href="javascript:setColor('green','เขียว')"><img src="pic/greencolor.gif" border=0 alt="สีเขียว"></a> 
                <a href="javascript:setColor('blue','น้ำเงิน')"><img src="pic/bluecolor.gif" border=0 alt="สีน้ำเงิน"></a> 
                <a href="javascript:setColor('orange','ส้ม')"><img src="pic/orangecolor.gif" border=0 alt="สีส้ม"></a> 
                <a href="javascript:setColor('pink','ชมพู')"><img src="pic/pinkcolor.gif" border=0 alt="สีชมพู"></a> 
                <a href="javascript:setColor('gray','เทา')"><img src="pic/graycolor.gif" border=0 alt="สีเทา"></a> 
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <tr> 
      <td>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td valign="bottom" width="3%"><img src="pic/bottomleft.gif" width="14" height="14"></td>
            <td width="94%"> 
              <table width="100%" border="0" cellspacing="0" cellpadding="2">
                <tr align="center" valign="middle"> 
                  <td><font color="#FFFFFF" class=size3> 
                    <input  type=submit value='ส่งคำตอบ' name="submit" class=button>
                    <input  type=reset value='เคลียร์' name="reset" class=button>
                    </font></td>
                </tr>
              </table>
            </td>
            <td width="3%" valign="bottom" align="right"><img src="pic/bottomright.gif" width="14" height="14"></td>
          </tr>
        </table>
      </td>
    </tr>
  </form>
</table>
<br>
<div align="center">  [ <a href="./webboard-admin.php">กลับหน้าหลัก</a> ] <br>
  <script language="JavaScript">

function check()
{
      var v1 = document.webForm.Msg.value;
      var v2 = document.webForm.Byname.value;
        if ( v1.length==0)
           {
           alert("กรุณาป้อนรายละเอียด");
           document.webForm.Msg.focus();           
           return false;
           }
        else if (v2.length==0)
           {
           alert("กรุณาป้อนชื่อ");
           document.webForm.Byname.focus();           
		   return false;
           }
        else
           return true;
}

function setURL()
{
	var temp = window.prompt('ใส่ URL ที่คุณต้องการสร้างเป็นลิงค์','http://'); 
	if(temp) setsmile('[url]'+temp+'[/url]');
}

function setImage()
{
	var temp = window.prompt('ใส่ URL ของรูปที่คุณต้องการให้แสดงในคำตอบของคุณ','http://'); 
	if(temp) setsmile('[img]'+temp+'[/img]');
}

function setBold()
{
	var temp = window.prompt('ใส่ข้อความที่คุณต้องการทำเป็นตัวหนา',''); 
	if(temp) setsmile('[b]'+temp+'[/b]');
}

function setItalic()
{
	var temp = window.prompt('ใส่ข้อความที่คุณต้องการทำเป็นตัวเอียง',''); 
	if(temp) setsmile('[i]'+temp+'[/i]');
}

function setUnderline()
{
	var temp = window.prompt('ใส่ข้อความที่คุณต้องการให้มีเส้นใต้',''); 
	if(temp) setsmile('[u]'+temp+'[/u]');
}

function setColor(color,name)
{
	var temp = window.prompt('ใส่ข้อความที่คุณต้องการให้เป็นสี'+name,''); 
	if(temp) setsmile('[color='+color+']'+temp+'[/color]');
}

function setsmile(what)
{
	document.webForm.Msg.value = document.webForm.elements.Msg.value+" "+what;
	document.webForm.Msg.focus();
}
</script>
<br>
<table width="100%" border="0" cellspacing="0" cellpadding="3" bgcolor="#333333">
  <tr> 
    <td><font color="#FFFFFF"><?=$config[footer]?></font></td>
  </tr>
</table>
</body>
</html>