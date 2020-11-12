<?php
session_start();
@ini_set("display_errors", "0"); //ใส่บรรทัดแรก
include("config.inc.php");
//include("./include/function.php");

if (trim($hid1) <> "03") {
    echo "	<SCRIPT language='JavaScript'>";
    echo "			alert('ท่านเข้าสู่ระบบไม่ถูกต้อง')";
    echo"			location.href='index.php'";
    echo"	</SCRIPT>";
    exit();
}

$timeformat = "d/m/Y - H:i";
$THdt = mktime(gmdate("H") + 7, gmdate("i") + 4, gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y"));
$datepay2 = date($timeformat, $THdt);
$i3d;
$idd;
$amp;
$c_khong;
$item;
$bath;
$status;
$dateInput;
$num_chq;

$num_yuem_ = $_REQUEST['num_yuem'];
$num_chq_ = $_REQUEST['num_chq'];
$pay_by_ = $_REQUEST['pay_by'];

//mysql_select_db($dbname, $objConnect);
//$query_Recordset1 = "SELECT * FROM item ";
//$Recordset1 = mysql_query($query_Recordset1, $objConnect) or die(mysql_error());
//$row_Recordset1 = mysql_fetch_assoc($Recordset1);
//$totalRows_Recordset1 = mysql_num_rows($Recordset1);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"[]>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
    <head>

        <!--
        Created by Artisteer v3.1.0.48375
        Base template (without user's data) checked by http://validator.w3.org : "This page is valid XHTML 1.0 Transitional"
        -->

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title><?php echo $mess_title ?></title>

        <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
        <!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
        <!--[if IE 7]><link rel="stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->

        <script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript" src="script.js"></script>
        <!-- start Input Date  -->
        <link rel="stylesheet" type="text/css" href="css/smoothness/jquery-ui-1.7.2.custom.css">  
            <script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>  
            <script type="text/javascript" src="js/jquery-ui-1.7.2.custom.min.js"></script>  
            <script type="text/javascript">
                $(function () {
                    // แทรกโค้ต jquery  
                    $("#dateInput").datepicker();
                });
            </script> 
            <!-- end Input Date  -->

    </head>
    <body>
        <?php include("./include/header.inc.php"); ?>
        <div class="cleared reset-box"></div>
        <div class="rnut-bar rnut-nav">
            <div class="rnut-nav-outer">
                <ul class="rnut-hmenu">
                    <li>
                        <a href="prov_statuss" class="active">Back</a>
                    </li>		
                </ul><font size="4" color="ffffff">Login โดย :&nbsp;<?php echo $user_ ?></font>
            </div>
        </div>
        <div class="cleared reset-box"></div>
        <div class="rnut-layout-wrapper">
            <div class="rnut-content-layout">
                <div class="rnut-content-layout-row">
                    <div class="rnut-layout-cell rnut-content">
                        <div class="rnut-box rnut-post">
                            <div class="rnut-box-body rnut-post-body">
                                <div class="rnut-post-inner rnut-article" >
                                    <h2 class="rnut-postheader" style="text-align: center;">บันทึกสถานะดำเนินการ</h2>
                                    <!-- start การแก้ไขข้อมูล -->
                                    <div align="center">
                                    <table width="70%" border="1" cellspacing="0" cellpadding="7" align="center">
                                        <!-- แถวเลือกสถานะ -->
                                        <td>&nbsp; 
                                            <?php
                                            
                                            if ($sta > 0) {
                                                $sql_up = "UPDATE item SET date_pay = '$datepay2',note_item = '$dateInput',staus = '$sta',pay_by = '$pay_by_', num_yuem = '$num_yuem_', num_chq = '$num_chq_' WHERE id_item = '$idd'";
                                                $result = mysql_query($sql_up);

                                                $sqlups = "UPDATE  person_yuem SET chk_status = '0' WHERE id_yuem = '$id_person_'";
                                                $result_cperson = mysql_query($sqlups);
                                                echo "<font size='3' color='#ff0000'><CENTER>ปรับปรุงสถานะแล้วครับ</CENTER></font>";
                                                echo "<br><meta http-equiv=\"refresh\" content=\"1;URL=prov_statuss.php\" />";
                                                echo "<font size='3' color='#ff0000'><CENTER><A HREF='prov_statuss.php'>บันทึกรายการต่อไป</A></CENTER></font>";

                                                $date_operat_ = date("d-m-Y H:i:s"); //date("d-m-Y H:i:s"); //$timeformat("d/m/Y - H:i");

                                                if ($sta == 1) {
                                                    $sta_ = "ตรวจสอบหลักฐานแล้ว";
                                                } elseif ($sta == 2) {
                                                    $sta_ = "ตัดยอดงบประมาณแล้ว";
                                                } elseif ($sta == 3) {
                                                    $sta_ = "ทำระบบ PO แล้ว";
                                                } elseif ($sta == 4) {
                                                    $sta_ = "เบิกจ่ายแล้ว : [" . $dateInput . "]";
                                                } elseif ($sta == 5) {
                                                    $sta_ = "เอกสารผิดพลาด";
                                                }
                                                $detail_ = $idd . "-" . $sta_;
                                                $note2_ = "";
                                                $sqladd = "INSERT INTO `history_detail` (`id_login` , `user_login` , `date_time` , `operate` , `budget_note`,`ip`)VALUES('',  '$user_','$date_operat_', '$detail_', '$note2_','$ip_')";
                                                
                                                $result_detail = mysql_query($sqladd);
                                                $result_detail;
                                            } else {
                                                echo "<div align='center'><br><font size='2' color='#ff0000'>ท่านไม่ได้ทำรายการใด ๆ </font><br></div>";
                                                echo "<br><meta http-equiv=\"refresh\" content=\"2;URL=prov_statuss.php\" />";
                                            }
                                            ?>

                                        </td>
                                        </tr>
                                    </table>
                                    </div>
                                    <p>&nbsp;</p>


                                    <!-- end การแก้ไขข้อมูล -->
                                    <?php include("./include/footer.inc"); ?>
                                    </body>
                                    </html>