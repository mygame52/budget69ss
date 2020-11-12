<?php		
	session_start();
	@ini_set("display_errors", "0"); 
	require_once('config.inc.php');  

if($act  != "ok") {
	echo "เข้าสู่ระบบไม่ถูกต้อง";
	exit();
}
					{
							$person_save = $_REQUEST['person_'];
							$citizenid_save = $_REQUEST['citizenid_'];
                                                        $position_save = $_REQUEST['position_'];
							if(($person_save=="")or($citizenid_save=="")or($position_save==""))
							{							
								echo "<meta http-equiv=\"refresh\" content=\"0;URL=person_error.php\" />";
							}
							else{
							$sql = "INSERT INTO person_yuem (`id_yuem` ,`citizenid`,`person`,`amp`,`position`) VALUES (NULL,'$citizenid_','$person_','$sele_amp','$position_save');";
							}
					}
//							echo $sql;
							$dbquery = mysql_db_query($dbname, $sql);
//							mysql_close();

							echo "<meta http-equiv=\"refresh\" content=\"0;URL=amp_yuem_person\" />";
						?>