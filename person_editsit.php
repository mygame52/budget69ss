<?php	session_start();
	include("config.inc.php");
	if (trim($hid1) <> "03") {
		echo "	<SCRIPT language='JavaScript'>";
		echo "			alert('ท่านเข้าสู่ระบบไม่ถูกต้อง')";
		echo"			location.href='index.php'";
		echo"	</SCRIPT>";
	   exit();
	}

	mysql_connect($dbserver, $dbuser,$dbpass) or
				die("<hr><b> ติดต่อ server ไม่ได้>");			
	mysql_select_db($dbname) or  die("ติดต่อฐานข้อมูลไม่ได้");
	
	$id_item_ = $_REQUEST['id_yuem_'];
	$id_item = $_REQUEST['chk_sta'];
	$sql = ("select * from  person_yuem  where id_yuem = '$id_item_'");
	
	$result = mysql_query($sql);
	$num_rows = mysql_num_rows($result); //จำนวน  record  ที่พบ

		$resultedit=mysql_fetch_array($result);
		$citizenid=$resultedit['citizenid'];
		$person=$resultedit['person'];
		$chk_status=$resultedit['chk_status'];
		$amp= $resultedit['amp'];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"[]>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
    <!--
    Created by Artisteer v3.1.0.48375
    Base template (without user's data) checked by http://validator.w3.org : "This page is valid XHTML 1.0 Transitional"
    -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo $mess_title?></title>

    <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->

    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="script.js"></script>

</head>
<body>
<?php include 'include/header.inc.php'; ?>

            <div class="cleared reset-box"></div>
<div class="rnut-bar rnut-nav">
<div class="rnut-nav-outer">
	<ul class="rnut-hmenu">
		<li>
			<a href="./prov_yuem_ampher_add.php" class="active">Back</a>
		</li>	
	</ul><font size="4" color="ffffff">Login โดย :&nbsp;<?php echo $user_?></font>
</div>
</div>
<div class="cleared reset-box"></div>
<div class="rnut-layout-wrapper">
                <div class="rnut-content-layout">
                    <div class="rnut-content-layout-row">
                        <div class="rnut-layout-cell rnut-content">
						<div class="rnut-box rnut-post">
						<div class="rnut-box-body rnut-post-body">
						<div class="rnut-post-inner rnut-article">
						<h2 class="rnut-postheader" style="text-align:center;">แก้ไขสิทธิ์  การยืมเงิน
						</h2>
<!-- start การแก้ไขข้อมูล -->
<br>
<CENTER><TABLE width="60%" border="0"cellpadding="7" cellspacing="1">
<form action='person_editsit_save.php?id_update=<?php echo $id_item_;?>' method='post' >
<TR>
	<TD style="text-align:right;vertical-align:middle;" >
	   <font size="3" color="#3333cc">รหัสสถานศึกษา  : </font>
	</TD>
	<TD><font size="3" color="#ff0000">
	    <?php echo $amp."   Person ID : ".$id_item_;?>
		</font>
	</TD>
</TR>
<TR>
	<TD style="text-align:right;vertical-align:middle;"><font size="3" color="#3333cc">เลขบัตรประชาชน : </font></TD>
	<TD>
	     <?php echo "<INPUT TYPE='text' NAME='citizenid' SIZE='20' style='font: 12pt tahoma; color: #444444;background: #C0F9BD; border: 1px black solid' value='$citizenid'>";  	?>
    </TD>
</TR>

<TR>
	<TD style="text-align:right;vertical-align:middle;"><font size="3" color="#3333cc">ชื่อ-สกุล : </font></TD>
	<TD>
	     <?php echo "<INPUT TYPE='text' NAME='person' SIZE='70' style='font: 12pt tahoma; color: #444444;background: #C0F9BD; border: 1px black solid' value='$person'>";  	?>
    </TD>
</TR>

<TR>
	<TD style="text-align:right;vertical-align:middle;"><font size="3" color="#3333cc">สิทธิ์ในการยืมเงิน : </font></TD>
	<TD><?php 
	
	echo "<INPUT TYPE='text' NAME='chk_status' SIZE='1' style='font: 12pt tahoma; color: #444444;background: #C0F9BD; border: 1px black solid' value='$chk_status'>";
	?>
	(1= ค้างเงินยืม) (0 = ว่าง)</TD>
</TR>

 <TR>
	<TD colspan='2' style="text-align:left;vertical-align:middle;"><font size="3" color="#ff0000">** หมายเหตุ : การแก้ไขสิทธิการยืมเงิน กรุณาตรวจสอบให้แน่ใจ !! ก่อนทำการแก้ไข</font></TD>
</TR>
<TR>
<td>  </td>
	<TD><INPUT TYPE='submit' value= 'Update'></TD>
</TR>
			<INPUT TYPE="hidden" NAME="id_item" value="<?=$id_item_?> ">

</form>
</TABLE></CENTER>


<!-- end การแก้ไขข้อมูล -->
<?php include("./include/footer.inc");?>
                                    </body>
                                    </html>
