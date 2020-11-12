<?php include('config.inc.php'); 
@ini_set("display_errors", "0"); //ใส่บรรทัดแรก
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
                        <a href="menu_pro.php" class="active">Back</a>
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
                                    <h2 class="rnut-postheader" style="text-align: center;">บันทึกข้อผิดของเอกสารชุดตั้งเบิก</h2>
                                    <!-- <div class="rnut-postcontent">
                                                                    <p style="text-align: center;">test1</p>
                                                                    <p style="text-align: center;">test2</p>
                                            </div> -->
                                    <!-- start การแก้ไขข้อมูล -->

                                    <?php
                                    $i_del = $_REQUEST['i_del'];
                                    $char = $_REQUEST['char'];
                                    $who = $_REQUEST['who'];

                                    $timeformat = "d/m/y - H:i";
                                    $THdt = mktime(gmdate("H") + 7, gmdate("i") + 4, gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y"));
                                    $datetime = date($timeformat, $THdt);

                                    $filerab = $i_del . " ." . "txt";   ///กำหนดชื่อไฟล์ ตาม id view
//$file = fopen("c:/appserv/www/e_office/rab/$filerab","a");
                                    $filename = "../$path/error/$filerab";   //กำหนดชื่อไฟล์ ไว้ในโพลเดอร์
                                    $file = fopen($filename, "a");
                                    if (strlen($char) >= "3") {
                                        fputs($file, $datetime . $char . "&nbsp; : &nbsp; ผู้บันทึก ->" . $who . "<BR>\n");  //เขียนลงในไฟล์
                                    }
                                    fclose($file);
                                    $fileread = fopen($filename, "r");
//fpassthru($fileread);
///////////////ใหม
                                    $te = 1;
                                    echo "<CENTER><table width ='570' border='1'>";
                                    echo "<tr BGCOLOR='#D4D4D4'><td>ที่ </td><td> <CENTER>เวลาที่บันทึก</CENTER> </td><td><CENTER>ข้อคิดเห็น</CENTER></td></tr>";
                                    while (!feof($fileread)) {
                                        $pp = fgets($fileread);
                                        $len = strlen($pp);
                                        $col1 = substr($pp, 0, 16);
                                        $col2 = substr($pp, 16, $len);
                                        if ($len > 0) {
                                            echo "<tr><td>$te</td><td>$col1 </td>";
                                            echo "<td>$col2  </td> </tr>";
                                            $te = $te + 1;
                                        }
                                    }
                                    fclose($fileread);

                                    echo "<TR> <TD ></TD><TD ></TD><TD> <A HREF='menu_pro.php'><INPUT TYPE='button' value = 'ปิดหน้าต่าง' onClick = 'window.close();'></A></TD>	</TR>";
                                    //echo "<TR BGCOLOR='#D4D4D4'><TD ></TD><TD align='right'><A HREF='view.php?id_view=$id_v'>เปิดอ่าน</A></TD>	<TD align='right'><a href ='javascript:window.close()'>Close</a></TD>	</TR>";

                                    echo "</table>";
                                    echo "</CENTER>";
                                    ?>

                                    <!-- end การแก้ไขข้อมูล -->
<?php include("./include/footer.inc"); ?>
                                    </body>
                                    </html>
