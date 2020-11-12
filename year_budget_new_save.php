<?php
session_start();
include("config.inc.php");
if (trim($hid1) <> "03") {
    echo "	<SCRIPT language='JavaScript'>";
    echo "			alert('ท่านเข้าสู่ระบบไม่ถูกต้อง')";
    echo"			location.href='index.php'";
    echo"	</SCRIPT>";
    exit();
}
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
                        <a href="./year_budget_new.php" class="active">Back</a>
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
                                <div class="rnut-post-inner rnut-article">
                                    <h2 class="rnut-postheader" style="text-align: center;">การจัดสรรงบประมาณ</h2>

                                    <!-- start การแก้ไขข้อมูล -->
                                    <div align="center">
                                        <?php
                                        // addrecord.php

                                        $sel1 = $_REQUEST['sel1'];
                                        $sel2 = $_REQUEST['sel2'];
                                        $jud1 = $_REQUEST['jud1'];
                                        echo "<CENTER>";
                                        echo "<font size='3' color='#cc0099'>รหัสสถานศึกษา: $sel1<br>";
                                        echo "รหัสงาน: $sel2<br>";
                                        $cc = trim($sel1) . trim($sel2);

                                        echo "เงินจัดสรร ครั้งที่ 1 : $jud1<br>";
                                        session_register('trim(sel2)');


                                        mysql_select_db($dbname, $objConnect);
                                        $query_Recordset1 = "SELECT * FROM judsun where trim(code) = '$cc'";

                                        $Recordset1 = mysql_query($query_Recordset1, $objConnect) or die(mysql_error());
                                        $row_Recordset1 = mysql_fetch_assoc($Recordset1);
                                        $totalRows_Recordset1 = mysql_num_rows($Recordset1);

                                        error_reporting(0);
                                        /* echo "ค้นหา = ".$totalRows_Recordset1;
                                          echo "<br>";
                                          echo " cc = ".$cc;
                                          echo "<br>"; */
                                        if ($totalRows_Recordset1 <> 1) {
                                            $aa = substr($sel2, 0, 4);
                                            $sql_in2 = "INSERT INTO judsun (code, amp, cod, work, rab, rua) VALUES ('$cc','$sel1','$sel2','$aa', '$jud1', '')";
                                            $result_sqlin = mysql_query($sql_in2);
                                            echo "บันทึกข้อมูลเรียบร้อยแล้ว<hr>";
                                            echo "<meta http-equiv=\"refresh\" content=\"3;URL=year_budget_new.php\" />";
//							echo "<br><a href=year_budget_new.php>จัดสรร งปม.เพิ่ม </a>  ";
                                        } else {
                                            echo "&nbsp;<hr><H3> สถานศึกษานี้ได้รับการจัดสรร ครั้งที่ 1 แล้ว</H3><br><hr>";
//							echo"<a href=year_budget_new.php>กลับไปจัดสรร งปม.</a>";
                                            echo "<meta http-equiv=\"refresh\" content=\"3;URL=year_budget_new.php\" />";
                                        }


                                        echo"</CENTER>";
                                        ?>

                                    </div>
                                    <!-- end การแก้ไขข้อมูล -->
  										<?php include("./include/footer.inc");?>
                                    </body>
                                    </html>