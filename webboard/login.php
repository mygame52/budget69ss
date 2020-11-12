<html>
<?
	include("./config.php");	//ตั้งค่าต่างๆของเว็บบอร์ด
	include("./function.php");		//ฟังก์ชั่นที่ใช้ในเว็บบอร์ด
?>
<head>
<title>Login เข้าระบบ Admin <?=$config[title]?></title>
<meta http-equiv="Content-Type" content="text/html; charset=Windows-874">
<link href="./style.css" rel="stylesheet" type="text/css">
</head>

<body bgcolor=#FFFFE0 background="pic/background.jpg">
<br><br><div align="center">
  <table width="300" border="0" cellspacing="0" cellpadding="0" bgcolor="686898">
  <form method=post action="admin.php" name="login_form" onSubmit="return check()">
    <tr>
      <td>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td valign="top" width="4%"><img src="pic/topleft.gif" width="14" height="14"></td>
            <td width="92%">
              <table width="100%" border="0" cellspacing="0" cellpadding="3">
                <tr align="center"> 
                  <td><b><font color="#FFFFFF" class=size3>Login เข้าระบบ เพื่อลบคำถาม - คำตอบ</font></b></td>
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
        <table border=0 cellpadding=2 cellspacing=1 width="314" align="center">
            <tr bgcolor="#E5E5FF"> 
              <td> 
                <table border=0 width="100%" cellpadding="3" cellspacing="0">
                  <tr> 
                    <td width="113" align="right"><b><font color="686898">Username 
                      :</font></b></td>
                    <td width="239"> 
                      <input size=26 type=text name="user_wb" maxlength=30>
                    </td>
                  </tr>
                  <tr> 
                    <td align="right"><b><font color="686898">Password :</font></b></td>
                    <td> 
                      <input size=26 type=password name="passwd_wb" maxlength=30>
                    </td>
                  </tr>
                </table>
             
        </table>
      </td>
    </tr>
    <tr> 
      <td>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td valign="bottom" width="4%"><img src="pic/bottomleft.gif" width="14" height="14"></td>
            <td width="92%"> 
              <table width="100%" border="0" cellspacing="0" cellpadding="3">
                <tr align="center"> 
                  <td><b>
                      <script language="JavaScript">
function check()
{
      var v1 = document.login_form.user_wb.value;
      var v2 = document.login_form.passwd_wb.value;

        if (v1.length==0)
           {
           alert("กรุณาป้อน Username ด้วยครับ");
           document.login_form.user_wb.focus();           
           return false;
           }
        else if (v2.length==0)
           {
           alert("กรุณาป้อน password ด้วยครับ") ;
           document.login_form.passwd_wb.focus();           
           return false;
           }
        else
           return true;
}
</script>
                    <input type=submit value='เข้าระบบ' name="submit" class=button>
                    <input type=reset value='เคลียร์' name="reset" class=button>
                    </b></td>
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
[ <a href='./webboard.php'>กลับไปเว็บบอร์ด</a> ]<br><br>

</div>
</body>
</html>
