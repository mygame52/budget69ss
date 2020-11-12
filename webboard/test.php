<html>

<head>
<meta http-equiv="Content-Language" content="th">
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<title>ตัวอย่างการแสดงกระทู้ที่โพส 10 กระทู้ล่าสุด</title>
</head>

<body bgcolor="#99FF66">

<p align="center"><u><b><font face="MS Sans Serif" size="5" color="#800080">
ตัวอย่างการแสดงกระทู้ที่โพส 10 กระทู้ล่าสุด</font></b></u></p>
<center>
<table width=520 border="0" cellspacing="1" cellpadding="4" bordercolor="#FFCCFF" bgcolor="#FFCCFF">
<tr><td align="center"><font color=blue size=3><b>10 อันดับกระทู้ล่าสุด</b></font></td></tr>
<tr><td bgcolor="#FFFFFF"> 
<!-- ตรง show10.php คือ ให้คุณใส่ URL ของไฟล์ show10.php ครับ -->
<? 
	include("show10.php"); 
	showTop(10);
?>
<!-- ด้านล่างก็ให้คุณแก้ URL ของไฟล์ webboard.php และ new.php ให้ถูกต้อง -->
<div align="right"><a href="webboard.php">ดูกระทู้ทั้งหมด</a> :: <a href="new.php">ตั้งกระทู้ใหม่</a></div>
</td></tr>
</table>
</center>
</body>

</html>