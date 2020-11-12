<?php	session_start();
	include("config.inc.php");
	if (trim($hid1) <> "03") {
		echo "	<SCRIPT language='JavaScript'>";
		echo "			alert('ท่านเข้าสู่ระบบไม่ถูกต้อง')";
		echo"			location.href='index.php'";
		echo"	</SCRIPT>";
	   exit();
	}
/*
	mysql_connect($dbserver, $dbuser,$dbpass) or
				die("<hr><b> ติดต่อ server ไม่ได้>");			
	mysql_select_db($dbname) or  die("ติดต่อฐานข้อมูลไม่ได้");
*/

    $id_item_ = $_REQUEST['id_update'];
	$person_ = $_REQUEST['person'];
	$citizenid_ = $_REQUEST['citizenid'];
	$chk_status_  = $_REQUEST['chk_status'];


    $sql = ("select * from  person_yuem  where id_yuem= '$id_item_'");
	$result = mysql_query($sql);
	$num_rows = mysql_num_rows($result); //จำนวน  record  ที่พบ

	$sql_up = ("update  person_yuem set person= '$person_', citizenid='$citizenid_', chk_status='$chk_status_' where id_yuem='$id_item_' ");
//	echo $sql_up;
	$result = mysql_query($sql_up);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"[]>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
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
						<h2 class="rnut-postheader" style="text-align:center;">
						แก้ไขข้อมูลเรียบร้อยแล้ว
						</h2>
						<!-- <div class="rnut-postcontent">
							<p style="text-align: center;">test1</p>
							<p style="text-align: center;">test2</p>
		                </div> -->
<!-- start การแก้ไขข้อมูล -->
						<?php
						echo "<br><center><font size='3' color='#990000'>";
						echo "แก้ไขข้อมูล  ของ  : ". $person . " แล้ว";
						echo "</font></center><br>";
						echo "<meta http-equiv=\"refresh\" content=\"2;URL=./prov_yuem_ampher_add.php\" />";

						?>
<!-- end การแก้ไขข้อมูล -->
<?php include("./include/footer.inc");?>
                                    </body>
                                    </html>
