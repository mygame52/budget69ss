<?php		
	session_start();
	@ini_set("display_errors", "0"); 
	require_once('config.inc.php');  

if($act  != "ok") {
	echo "เข้าสู่ระบบไม่ถูกต้อง";
	exit();
}
					{
							$id_yuem_ = $_REQUEST['id_yuem_'];
							$person_save = $_REQUEST['person_'];
							$citizenid_save = $_REQUEST['citizenid_'];
                                                        $position_save = $_REQUEST['position_'];
							if(($person_save=="")or($citizenid_save=="")or($position_save==""))
							{							
								echo "<meta http-equiv=\"refresh\" content=\"0;URL=person_error_prov.php\" />";
							}
							else{
                                                        $sql = ("UPDATE person_yuem set person= '$person_save', citizenid='$citizenid_save', position='$position_save' where id_yuem='$id_yuem_' ");                                                                                                                
							}
					}
							$dbquery = mysql_db_query($dbname, $sql);
							echo "<meta http-equiv=\"refresh\" content=\"0;URL=prov_yuem_person_add.php\" />";
						?>
