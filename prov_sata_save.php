<?php
	session_start();
	@ini_set("display_errors", "0"); //ใส่บรรทัดแรก
	require_once('config.inc.php');  

	if (trim($hid1) <> "03") {
		echo "	<SCRIPT language='JavaScript'>";
		echo "			alert('ท่านเข้าสู่ระบบไม่ถูกต้อง')";
		echo"			location.href='index.php'";
		echo"	</SCRIPT>";
	   exit();
	}
					{
							$name_pub_save = $_REQUEST['name_pub_'];
							$name_shot_save = $_REQUEST['name_shot_'];
							if(($name_pub_save=="")or($name_shot_save==""))
							{							
								echo "<meta http-equiv=\"refresh\" content=\"0;URL=prov_sata_error.php\" />";
							}
							else{
							$sqlu = "INSERT INTO public_utility (`idu` ,`name_pub`,`name_shot`) VALUES ('','$name_pub_save','$name_shot_save');";
							}
					}
//							echo $sql;
							$dbquery = mysql_db_query($dbname, $sqlu);
//							mysql_close();

							echo "<meta http-equiv=\"refresh\" content=\"0;URL=prov_sata_add.php\" />";
						?>