<?php session_start();
include("config.inc.php");
 $user_ = $_SESSION['full_name'];
 $ip=@$REMOTE_ADDR; 
 $date2 = date("d/m/Y H:i:s");
 $sqladdlogout = "INSERT INTO `history_detail` (`id_login` , `user_login` , `date_time` , `operate` , `budget_note`, `ip`)VALUES('',  '$user_','$date2', 'Log Out', '-','$ip')";
 $result_detail2 = mysql_query($sqladdlogout);

 

 
// Files Name : logout.php

//require("config.inc.php");
session_unregister('sel3');
session_unregister('item_');
session_unregister('doc_');
session_unregister('bath_');
session_unregister('sele_amp');
session_unregister('full_name');
session_unregister('user_');
session_unregister('set_del');
session_unregister('set_add');

unset($_SESSION["hid1"]);  
unset($_SESSION["act"]);  
session_destroy(); //

echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\" />";

?>