<?php

session_start();
include("config.inc.php");
if (trim($hid1) <> "03") {
    echo "	<SCRIPT language='JavaScript'>";
    echo "			alert('��ҹ�������к����١��ͧ')";
    echo"			location.href='index.php'";
    echo"	</SCRIPT>";
    exit();
}

$w_del = $_REQUEST['w_del'];

$sql = ("select * from  you_ser  where u_ser= '$w_del'");
$result = mysql_query($sql);
$num_rows = mysql_num_rows($result); //�ӹǹ  record  ��辺

$sql_del = ("delete from  you_ser where u_ser = '$w_del'");
$result = mysql_query($sql_del);
echo "<meta http-equiv=\"refresh\" content=\"0;URL=./prov_person.php\" />";
?>