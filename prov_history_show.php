<?php
session_start();
	if (trim($hid1) <> "03") {
		echo "	<SCRIPT language='JavaScript'>";
		echo "			alert('ท่านเข้าสู่ระบบไม่ถูกต้อง')";
		echo"			location.href='index.php'";
		echo"	</SCRIPT>";
	   exit();
	}

$sel = $_REQUEST['select'];
//if ($sel = )

if($sel==""){
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=prov_history_select.php\" />";
}else if($sel=="00"){
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=prov_history_select_prov.php\" />";    
}else{
echo "<meta http-equiv=\"refresh\" content=\"0;URL=prov_history_show_amp.php?select=$sel\" />";        
}
    
?>