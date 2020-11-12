<?php
session_start();
@ini_set("display_errors", "0"); //ใส่บรรทัดแรก
include("config.inc.php");
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

    </head>
    <body>
        <?php include 'include/header.inc.php'; ?>

        <div class="cleared reset-box"></div>
        <div class="rnut-bar rnut-nav">
            <div class="rnut-nav-outer">
                <ul class="rnut-hmenu">
                    <li>
                        <a href="./" class="active">Home</a>
                    </li>	
                </ul>
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
                                    <h2 class="rnut-postheader" style="text-align: center;">ตรวจสอบสิทธิการใช้งาน</h2>
                                    <!-- start การแก้ไขข้อมูล -->
                                    <!-- <div class="rnut-postcontent">
                                                                    <p style="text-align: center;">test1</p>
                                                                    <p style="text-align: center;">test2</p>
                                            </div> -->
                                    <?php
                                    $user_ = $_REQUEST['user_'];
                                    $pass_ = $_REQUEST['pass'];
                                    $hid = $_REQUEST['hid'];


                                    if ($hid <> 13) {
                                        echo "<h3> ขออนุญาตตรวจสอบสิทธิ์อีกครั้ง !ผมงง  : ต้องปิด Browser ออกไปก่อน แล้วค่อยเข้ามาใหม่ครับ </h3>";
                                        exit();
                                    }

                                    if ($user_ == "" or $pass_ == "") {
                                        echo "<h3> ERROR : กรุณากรอกข้อมูลให้ครบ </h3>";
                                        exit();
                                    }

                                    require("config.inc.php");
                                    mysql_connect($dbserver, $dbuser, $dbpass) or
                                            die("<hr><b> ติดต่อ server ไม่ได้>");

                                    mysql_select_db($dbname) or die("ติดฐานข้อมูลไม่ได้");

                                    $w_pas = base64_encode($pass);
                                    $sql = "select * from  you_ser where u_ser = '$user_' and pass = '$w_pas' ";
                                    $result = mysql_query($sql) or die("ข้อมูลไม่ครบ");
                                    $num_rows = mysql_num_rows($result) or die("<div align='center'><br>&nbsp;<font size='3' color='ff0000'>ไม่พบข้อมูล</font><br><br></div>"); //จำนวน  record  ที่พบ

                                    if ($num_rows >= 1) {
                                        session_register("sess_id");
                                        session_register('set_del');
                                        session_register('set_add');
                                        session_register('set_work');

                                        $_SESSION['sess_id'] = session_id();   //ประกาศตัวแปร session อีกแบบหนึ่ง
                                        session_register('user_');     //ประกาศตัวแปร session อีกแบบหนึ่ง
                                        session_register('sit_');     //ประกาศตัวแปร session อีกแบบหนึ่ง
                                        session_register('work_');     //ประกาศตัวแปร session อีกแบบหนึ่ง

                                        $row_Rec = mysql_fetch_assoc($result);
                                        $set_del = $row_Rec['set_del'];
                                        $set_add = $row_Rec['set_add'];
                                        $set_work = $row_Rec['set_work'];
                                        $ip_ = @$REMOTE_ADDR;
                                        session_register('set_add');
                                        session_register('set_del');
                                        session_register('hid1');

                                        session_register('ip_');
                                        $hid1 = "03";

                                        session_register('set_work');
                                        $set_work = $row_Rec['set_work'];




//---------------------------------------- กำหนดสิทธิให้ ในกรณีที่ เป็น สิทธิสถานศึกษา

                                        $sql = ("select * from  amp  where   id = '00'");
                                        $result = mysql_query($sql);
                                        if (!$result) {
                                            echo "ไม่ถูกต้อง";
                                        }
                                        $num_rows = mysql_num_rows($result); //จำนวน  record  ที่พบ

                                        if ($num_rows >= 1) {
                                            $fet = mysql_fetch_array($result);
                                            $full_name = $fet['Name'];   //เก็บชื่อ ศบอ
                                            $doc = $fet['doc'];
                                            $sit = $fet['sit'];   //เก็บสิทธิ์ในการตัดยอด
                                            $act = "ok";
                                            $_SESSION['sess_id'] = session_id();  //ประกาศตัวแปร session อีกแบบหนึ่ง
                                            session_register('sele_amp');     //ประกาศตัวแปร session อีกแบบหนึ่ง
                                            session_register('full_name');
                                            session_register('doc');
                                            session_register('sit');
                                            session_register('hid8');
                                            session_register('act');
                                            $date2 = date("d/m/Y H:i:s");
                                            $ip = @$REMOTE_ADDR;
                                            $sqladdlogout = "INSERT INTO `history_detail` (`id_login` , `user_login` , `date_time` , `operate` , `budget_note`,`ip`)VALUES ('',  '$user_','$date2', 'Login main Page Province', '-','$ip')";
                                            $result_detail2 = mysql_query($sqladdlogout);
                                        }


//-------------------------------

                                        $aa = addhistorydetail($user_, "Login Main Page Province", "-", "$ip_");

                                        echo "<div align='center'><BR><BR>";
                                        echo"<table width='60%' border='0' align='center' cellpadding='10' cellspacing='0'>";
                                        echo"<tr bgcolor='#c0ffff'>";
                                        echo "<TD><CENTER><FONT SIZE='4' COLOR='#FF0000'><B> User name / Password ถูกต้อง </B></FONT></CENTER></td>";
                                        echo "</tr>";
                                        echo"<tr bgcolor='#c0ffc0'>";
                                        echo "<td>   <FONT SIZE='4' COLOR='#c0ffc0'>$user_</FONT></td>";
                                        echo"</tr>";
                                        echo "<tr bgcolor='#c0ffa0'>";
                                        echo "<td>";
                                        echo "<meta http-equiv=\"refresh\" content=\"0;URL=menu_pro.php\" />";
                                        echo"</td>";
                                        echo "</tr>";
                                        echo"</table></div>";
                                    } else {
                                        echo "<div align='center'><br><CENTER><font size='3' color='ff0000'>คุณไม่มีสิทธิ์ ในการใช้งาน</font></CENTER>";
                                        echo '<BR>';
                                        echo "<center><A HREF='logout.php'><B>ยกเลิก</B></A></center></div>";
                                    }
                                    ?>



                                    <!-- end การแก้ไขข้อมูล -->
<?php include("./include/footer.inc"); ?>
                                    </body>
                                    </html>
