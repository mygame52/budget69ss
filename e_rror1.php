<?php session_start();
include('config.inc.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"[]>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo $mess_title?></title>

    <link rel="stylesheet" href="style.css" type="text/css" media="screen" />

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
			<a href="menu_pro.php" class="active">Back</a>
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
						<h2 class="rnut-postheader" style="text-align: center;">บันทึกข้อผิดของเอกสารชุดตั้งเบิก</h2>

<!-- start การแก้ไขข้อมูล -->
				
					 <?php $i_del = $_REQUEST['i_del'];?>
						<TABLE width="55%" border="1" align="center">
						<tr><td> 
								<?php
										$id_view=trim($i_del);
									//	$title=$_GET[title];
										$filerab = trim($id_view)." ."."txt";   ///กำหนดชื่อไฟล์ ตาม id view
										$filename = trim("../$path/error/$filerab");   //กำหนดชื่อไฟล์ ไว้ในโพลเดอร์
										if (file_exists($filename)){
												$fileread=fopen($filename,"r");
												/*fpassthru($fileread);
												echo "ความยาว ".$len;
												$red = fread($fileread,$len);
												echo $red;
												*/
												$te=1;

												echo "<table width='100%' border='2'>";
												echo "<tr BGCOLOR='#D4D4D4'><td>ที่ </td><td> <CENTER>เวลาที่บันทึก</CENTER> </td><td><CENTER>ข้อคิดเห็น</CENTER></td></tr>";
												while(!feof($fileread))
														{
															$pp = fgets($fileread);
															$len = strlen($pp);
															// echo $len;
															$col1 = substr($pp,0,16);
															$col2 = substr($pp,16,$len);
															 if ($len > 0){
															echo "<tr><td>$te</td><td>$col1 </td>";
															echo "<td>$col2  </td> </tr>";
															$te = $te +1;
														}
													}
													fclose($fileread);
													echo "</table>";
												}else{
													//echo $filename;
													echo "	ยังไม่มี ข้อคิดเห็นในรายการเบิกจ่ายนี้";
													//exit();
												}
												?>
						  </td>
						  </TR>
						<TR bgcolor="#D4D4D4">
							<TD><CENTER><FONT SIZE="3" COLOR="#6600FF">บันทึกข้อความ  </FONT></CENTER></TD>
						</TR>
						<TR>
							<TD bgcolor="#D4D4D4" style="text-align:center"><FORM METHOD=POST ACTION="e_rror2.php">
								<TEXTAREA NAME="char" ROWS="7" COLS="120"></TEXTAREA>
								<INPUT TYPE="hidden" name="i_del" value =<?php echo $i_del?>>
								<CENTER>ผู้บันทึก &nbsp;<INPUT TYPE="text" NAME="who">&nbsp;&nbsp;&nbsp;<INPUT TYPE="submit" value="บันทึก / กลับ"></A>&nbsp;&nbsp;&nbsp;
								<INPUT TYPE="button" value = "ปิดหน้าต่าง" onClick = "window.close();">		</CENTER>
								</FORM>
								
						</TD>
						</TR>
						</TABLE>
						</CENTER>
<!-- end การแก้ไขข้อมูล -->
<?php include("./include/footer.inc");?>
                                    </body>
                                    </html>
