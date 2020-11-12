<?php
	session_start();
	include("./config.php");	//ตั้งค่าต่างๆของเว็บบอร์ด
	include("./function.php");		//ฟังก์ชั่นที่ใช้ในเว็บบอร์ด
?>
<html>
<head>
<title><?=$config[title]?></title>
<meta http-equiv="Content-Type" content="text/html; charset=Windows-874">
<link href="./style.css" rel="stylesheet" type="text/css">
</head>

<body bgcolor=#FFFFE0 background="pic/background.jpg">
<!--
<br><p align="CENTER"><b><font face="LilyUPC" size="+4" color=#9400d3><?=$config[txtheader]?></font></b><br>
<?=$config[headerdetail]?> 
</p>
-->
<center>
<table width="98%" border="0" align="center" cellpadding="2" cellspacing="0">
<tr> 
<td width="44%">[ <a href="webboard.php">กลับหน้าหลักเว็บบอร์ด</a>]</td>
<td width="56%" align="right"></td>
</tr>
</table>
<table width="600" border="0" cellspacing="0" cellpadding="0" bgcolor="686898">

<?
	if($config[SendImageByTopic])
		echo "<form method=post action=\"post.php\" name=\"webForm\" onSubmit=\"return check()\"  enctype=\"multipart/form-data\">";
	else
		echo "<form method=post action=\"post.php\" name=\"webForm\" onSubmit=\"return check()\" >";
?>

    <tr> 
      <td>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td valign="top" width="2%"><img src="pic/topleft.gif" width="14" height="14"></td>
            <td width="94%">
              <table width="100%" border="0" cellspacing="0" cellpadding="3">
                <tr align="center"> 
                  <td><b><font color="#FFFFFF" class=size3>ตั้งคำถามของคุณได้ที่นี่ครับ 
                    </font></b></td>
                </tr>
              </table>
            </td>
            <td valign="top" align="right" width="4%"><img src="pic/topright.gif" width="14" height="14"></td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td>
        <table border=0 cellpadding=2 cellspacing=1 width="100%">
            <tr> 
              <td align=center colspan="2" bgcolor="#E5E5FF"> 
                <table width="100%" border="0" cellpadding="2" cellspacing="0">
                  <tr> 
                    <td width="18%"> 
                      <div align="right"><b><font color="686898">คำถาม </font></b></div>
                    </td>
                    <td width="82%"> 
                      <input type=text name="QTitle" size=61 maxlength=100>
                    </td>
                  </tr>
                  <tr> 
                    <td width="18%"> 
                      <div align="right"><b><font color="686898">รายละเอียด</font></b></div>
                    </td>
                    <td width="82%"> 
                      <textarea rows="10" cols="60" name="QNote" class=violet></textarea>
                    </td>
                  </tr>
                  <tr> 
                    <td width="18%"> 
                      <div align="right"><b><font color="686898">โดย </font></b></div>
                    </td>
                    <td width="82%"> 

					<?php
						$full_name_conv = iconv('UTF-8','TIS-620',$full_name);
					?>


					  <input type=text name="QName" size=61 maxlength=50 
					  value="<?php echo $sele_amp.':'.$full_name_conv ?>" readonly="readonly">
					  

<!--					  
					  <input type=text name="QName" size=61 maxlength=50 
					  value="<?php echo $sele_amp ?> ">
-->




                    </td>
                  </tr>
                  <tr> 
                    <td width="18%"> 
                      <div align="right"><b><font color="686898">E-mail</font></b></div>
                    </td>
                    <td width="82%"> 
                      <input type=text name="QEmail" size=35 maxlength=50>
                    &nbsp; 
                    <input type="checkbox" name="emailOK" value="1">
                    <font color="#666666">ส่งเมล์กลับเมื่อมีผู้ตอบคำถาม</font> 
                  </td>
                  </tr>

<?
	if($config[SendImageByTopic]){
		echo "<tr><td width=18% align=right><b><font color=686898>ส่งไฟล์ภาพ</font></b></td><td width=82%>";
		echo "<input type=\"file\" name=\"fileupload\" size=24><font color=#FF0033> (รูป ". ($config[imgSize_limit]/1024) ." Kb, Flash ".($config[flashSize_limit]/1024)." Kb)</font></td></tr>\n";
	}
?>

                </table>
              </td>
            </tr>
            <tr bgcolor="#CCCCFF"> 
              <td align=center colspan=2>
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
            </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td valign="bottom" width="2%"><img src="pic/bottomleft.gif" width="14" height="14"></td>
            <td width="94%"> 
              <table width="100%" border="0" cellspacing="0" cellpadding="3">
                <tr align="center" valign="middle"> 
                  <td><b><font color="#FFFFFF" class=size3> 
                    <input type=submit value='ส่งคำถาม' name="submit" class=button>
                    <input type=reset value='เคลียร์' name="reset" class=button>
                    </font></b></td>
                </tr>
              </table>
            </td>
            <td valign="bottom" align="right" width="4%"><img src="pic/bottomright.gif" width="14" height="14"></td>
          </tr>
        </table>
      </td>
    </tr>
   </form>
  </table>
  <br>
  <script language="JavaScript">
function check()
{
      var v1 = document.webForm.QTitle.value;
      var v2 = document.webForm.QNote.value;
      var v3 = document.webForm.QName.value;
        if ( v1.length<10)
           {
           alert("กรุณาป้อนคำถาม อย่างน้อย 10 ตัวอักษรครับ ");
           document.webForm.QTitle.focus();           
           return false;
           }
        else if (v2.length<10)
           {
           alert("กรุณาป้อนรายละเอียด อย่างน้อย 10 ตัวอักษรครับ");
           document.webForm.QNote.focus();           
		   return false;
           }
        else if (v3.length==0)
           {
           alert("กรุณาป้อนชื่อผู้ถาม");
           document.webForm.QName.focus();           
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
	var temp = window.prompt('ใส่ URL ของรูปที่คุณต้องการให้แสดงในกระทู้ของคุณ','http://'); 
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
	document.webForm.QNote.value = document.webForm.elements.QNote.value+" "+what;
	document.webForm.QNote.focus();
}
</script>
  [ <a href="./webboard.php">กลับหน้าหลัก</a> ] <br>
</center>
<br><br>
<table width="100%" border="0" cellspacing="0" cellpadding="3" bgcolor="#333333">
  <tr> 
    <td><font color="#FFFFFF"><?=$config[footer]?></font></td>
  </tr>
</table>
</body>
</html>