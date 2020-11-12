<?php session_start(); ?>
<?php include("top16.php");?>

<html >
<head>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<META NAME="AUTHOR" CONTENT="กศน.อุบลราชธานี">
<META NAME="COPYRIGHT" CONTENT="Copyright (c) by กศน.อุบลราชธานี">
<META NAME="KEYWORDS" CONTENT="โปรแกรมบริหารงบประมาณ, อดิศักดิ์  คัมภีระ ,กศน.อุบลราชธานี">
<title>รายงานงบประมาณ สำหรับผู้บริหาร กศน. จังหวัด</title>

</head>

<body>
<?php
	include("grap1.php");
    session_register("hid1");
//	$hid4 = $_REQUEST['hid4']; 
	session_register("hid1");
//	if ($hid4 <> 103) {
//	echo $hid1;

//   echo "<h3> ERROR : อย่าหลอยเข้ามานะ   ต้องเข้าที่ Login ครับ</h3>";  exit();
//	}
?>
<table width="1000" height="160" align="center">
  <tr>
    <td height="110" >
	<?php 	$filename = "wysiwyg/left3_file.php";  //ไฟล์ haad_file.php เรียกชื่อรูปบาร์
	$fd = fopen($filename, "rb");

	$head= fread($fd, filesize($filename));
	fclose($fd);
	echo stripslashes($head);
		?>
	</td>
  </tr>
  <tr>
   <!--  <td background="image/bar3.jpg"> -->
   <td>

<table width="1000"  border="1" cellpadding="3" cellspacing="0" bordercolordark="#FFFFFF"    bordercolorlight="#8297b1"align="center">
<TR>
  <TD colspan="2"><span class="style9"><iframe  marginwidth=0 marginheight=0 src="/<?=$path?>/read.php" frameborder=0 noresize width=100% scrolling=no height=20> </iframe></span></TD>
  </TR>
  <TR>
	<TD width=70%>
	<!-- ใส่ webboard280 -->
	<P><B><FONT style="BACKGROUND-COLOR: #ffffcc" color=#ff0000><CENTER>
              <p>      
                <br>
                 <!--  <IFRAME marginWidth=0 marginHeight=0 src="/<?=$path?>/webboard/show.php" frameBorder=0 noResize width=495 scrolling=yes height=180>
                  </IFRAME> -->
              <div align="center"><img  src="bar4.php"></div><BR>
			  แสดงการเบิกจ่าย จำแนกตามงบประมาณ
                </CENTER> 
              </FONT></B></P>
	  <!-- จบ  Iframe ของ webboard -->	</TD>
	<TD width =30% align="top">
	<CENTER>แผนภูมิแสดงสถานะ<BR>การเบิกจ่ายงบประมาณ</CENTER>
	<BR>
<div align="center"><img  src="pie.php"></div>
<BR>
<CENTER><img src="image/R.jpg"> = เบิกจ่ายแล้ว  <?php echo number_format($grap1,2); ?> % </CENTER>
<!-- <img src="image/p.jpg"> = คงเหลือ</TD> --></TR>
</TABLE>
 
				<TABLE width="1000" border="0"align="center">
				<TR>
					<TD><div align="right">
					<form name="form2" method="post" action="logout.php" target="_parent">
					  <input name="view" type="submit" id="view" value=" ปิดหน้าต่างนี้ ">
					  </div></form>
				</TD>
				</TR>
				</table>
	</TD>
	</TR>
</TABLE>


</body>
</html>
