<html>
<head>
<title>แบบฟอร์มส่งเมล์ </title>
<meta http-equiv="Content-Type" content="text/html; charset=Windows-874">
<link href="../style.css" rel="stylesheet" type="text/css">
</head>

<body bgcolor=#FFFFE0 background="../pic/background.jpg">
<br>
<center>
<font color=blue class=size3><b>แบบฟอร์มส่งเมล์ถึง <? 
	$wemail = $HTTP_GET_VARS['wemail'];
	$name = $HTTP_GET_VARS['name'];
	$question = $HTTP_GET_VARS['question'];
                     echo stripslashes(htmlspecialchars($name)); ?>

 </b></font><br><br>

  <table border=0 bordercolor=686898 bgcolor=#CCCCFF cellpadding=0 cellspacing=0 width="440" height="31">
    <tr> 
      <td colspan="2" height="10"> 
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td valign="top" width="4%"><img src="../pic/topleft.gif" width="14" height="14"></td>
            <td width="92%">&nbsp;</td>
            <td width="4%" valign="top" align="right"><img src="../pic/topright.gif" width="14" height="14"></td>
          </tr>
        </table>
      </td>
    </tr>
    <form method=post action="boardmail.php" name="mailForm" onsubmit="return check()">
      <tr> 
        <td colspan="2"> 
          <div align="center"> 
            <table width="100%" border="0">
              <tr> 
                <td width="16%"> 
                  <div align="right"><font color="FF8C00"><b><font color="686898">เรื่อง 
                    </font></b></font></div>
                </td>
                <td width="84%"> 
<?		
		if($question){
			$question = stripslashes(htmlspecialchars($question));
			echo "<input type=text name='subject' size=51 maxlength=80 value='$question'>";
		}
		else{
			echo "<input type=text name='subject' size=51 maxlength=80>";
		}
?>
				</td>
              </tr>
              <tr> 
                <td width="16%"> 
                  <div align="right"><font color="FF8C00"><b><font color="686898">ข้อความ 
                    </font></b></font></div>
                </td>
                <td width="84%"> 
                  <textarea name="message" cols=50 rows= 8 ></textarea>
                </td>
              </tr>
              <tr> 
                <td width="16%"> 
                  <div align="right"><font color="FF8C00"><b><font color="686898">โดยคุณ 
                    </font></b></font></div>
                </td>
                <td width="84%"> 
                  <input type=text name="name" size=51 maxlength=50>
                </td>
              </tr>
              <tr> 
                <td width="16%"> 
                  <div align="right"><font color="FF8C00"><b><font color="686898">อีเมล์ 
                    </font></b></font></div>
                </td>
                <td width="84%"> 
                  <input type=text name="email" size=51 maxlength=60>
                </td>
              </tr>
            </table>
          </div>
        </td>
      </tr>
      <tr valign="bottom"> 
        <td colspan="2" height="17"> 
          <div align="center"> 
            <input type="hidden" name="mailto" value="<?echo $wemail;?>">
            <input type=submit value="ส่งเมล์" name="submit" class=button>
            <input type=reset value="เคลียร์" name="reset" class=button>
          </div>
        </td>
      </tr>
      <tr>
        <td colspan="2" height="8"> 
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr> 
              <td valign="bottom" width="4%"><img src="../pic/bottomleft.gif" width="14" height="14"></td>
              <td width="92%">&nbsp;</td>
              <td width="4%" valign="bottom" align="right"><img src="../pic/bottomright.gif" width="14" height="14"></td>
            </tr>
          </table>
        </td>
      </tr>
    </form>
  </table>
	<br>
    <br>
</center>

<div align="center">
  <script language="JavaScript">
<!--
function check()
{
      var v1 = document.mailForm.subject.value;
      var v2 = document.mailForm.message.value;
      var v3 = document.mailForm.name.value;
        if ( v1.length==0)
           {
           alert("กรุณาป้อนคำถามครับ");
           document.mailForm.subject.focus();           
           return false;
           }
        else if (v2.length==0)
           {
           alert("กรุณาป้อนรายละเอียด");
           document.mailForm.message.focus();           
		   return false;
           }
        else if (v3.length==0)
           {
           alert("กรุณาป้อนชื่อผู้ถาม");
           document.mailForm.name.focus();           
		   return false;
           }
        else
           return true;
}
//-->
</script>
  [ <a href="javascript:window.close()">ปิดหน้าต่างนี้</a> ]

</div>
</body>
</html>
