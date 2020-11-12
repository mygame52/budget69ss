<html>
<head>
<title>ผลการส่งเมล์ ...</title>
<meta http-equiv="Content-Type" content="text/html; charset=Windows-874">
<link href="../style.css" rel="stylesheet" type="text/css">
</head>

<body bgcolor=#FFFFE0 background="../pic/background.jpg">

<?
include("../config.php");	//ตั้งค่าต่างๆของเวปบอร์ด
include("../function.php");		//ฟังก์ชั่นที่ใช้ในเวปบอร์ด

$name = stripslashes($HTTP_POST_VARS['name']);
$subject = stripslashes($HTTP_POST_VARS['subject']);
$message = stripslashes($HTTP_POST_VARS['message']);
$email = $HTTP_POST_VARS['email'];
$mailto = $HTTP_POST_VARS['mailto'];
$url = $config[url];

if($email) {
	$msg = "เรื่อง : $subject\nผู้ส่ง : $name ($email)\n\n$message\n\nส่งมาจาก ฟอร์มส่งเมล์ของ $url";
}
else{
	$msg = "เรื่อง : $subject\nผู้ส่ง : $name\n\n$message\n\nส่งมาจาก ฟอร์มส่งเมล์ของ $config[url]";
	$email = $config[email]; //ค่าอยู่ใน config
}

if(mail($mailto , $subject , $msg , "From: $email\nReply-To: $email\nReturn-Path: $youremail")) {
	echo Message(75,"green","ส่งอีเมล์ถึง <font color=666666>$mailto</font> เรียบร้อยแล้ว","จะรีบตอบกลับโดยเร็วที่สุดครับ","<a href='javascript:window.close()'> ปิดหน้าต่างนี้ </a>");
} else {
	echo Message(75,"red","ไม่สามารถส่งเมล์ถึง <font color=666666>$mailto</font> ได้ในขณะนี้","อาจเกิดจากความผิดพลาดบางประการ","<a href='javascript:window.close()'> ปิดหน้าต่างนี้ </a>");
}

?>
<br>
</body>
</html>