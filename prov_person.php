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
$a = 0;
//	if(!isset($Action)){$Action = " "; } 	
// ข้อมูลใน รหัสงาน 6 หลัก (รหัสเงิน 4 หลัก+ งานย่อย 2 หลัก)work
//require_once("in.html");
//require("in.html");
// set_work
// 1 : งาน/ฝ่าย
// 2 : แผน
// 3 : พัสดุ
// 4 : การเงิน/บัญช
// จัดการสิทธิ์ จนท.
//echo "	user=".$user_;
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
                        <a href="./menu_pro.php" class="active">Back</a>
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
                                    <h2 class="rnut-postheader" style="text-align:center;">
                                        กำหนด : ชื่อ รหัสผ่าน และงาน สำหรับเจ้าหน้าที่จังหวัด
                                    </h2>
                                    <!-- <div class="rnut-postcontent">
                                                                    <p style="text-align: center;">test1</p>
                                                                    <p style="text-align: center;">test2</p>
                                            </div> -->
                                    <!-- start การแก้ไขข้อมูล -->
                                    <div align="center">
                                        <?php
                                        mysql_select_db($dbname, $objConnect);
                                        $query_Recordset1 = "SELECT * FROM you_ser ORDER BY u_ser ASC";
                                        $Recordset1 = mysql_query($query_Recordset1, $objConnect) or die(mysql_error());
                                        $row_Recordset1 = mysql_fetch_assoc($Recordset1);
                                        $totalRows_Recordset1 = mysql_num_rows($Recordset1);
                                        ?>


                                        <BR>
                                            <CENTER><!-- รหัสสถานศึกษา(2) + ชื่อสถานศึกษา  --></CENTER>

                                            <TABLE width="80%" align="center" border="0" cellspacing="1" cellpadding="3">
                                                <TR>
                                                    <td>
                                                        <ul class="rnut-hmenu">
                                                            <li>
                                                                <a href="./prov_person_add.php" class="active">เพิ่มข้อมูล</a>
                                                            </li>	
                                                        </ul>
                                                        <input type="hidden" name="hid1" value="03"> 
                                                    </td>
                                                    <td style="text-align:left;vertical-align:middle;"> 
                                                        <FONT COLOR="#FF3300">คำเตือน คลิก "ลบ" ข้อมูลจะหายไปทันที่	</FONT>
                                                    </td>
                                                </TR>
                                            </TABLE>

                                            <BR>
                                                <table width="80%" align="center" border="2" cellspacing="1" cellpadding="3">
                                                    <tr bgcolor="#00ffcc">
                                                        <th scope="col">username</th>
                                                        <th scope="col">password</th>
                                                        <th scope="col">ลบเบิกจ่าย</th>
                                                        <th scope="col">แก้ไขจัดสรร</th>
                                                        <th scope="col">งาน/ฝ่าย</th>
                                                        <th scope="col">ลบ</th>
                                                        <th scope="col">แก้ไข</th>

                                                    </tr>
                                                    <?php do { ?>
                                                        <tr>
                                                            <?php $w_del = $row_Recordset1['u_ser']; ?>
                                                            <td style="text-align:left;vertical-align:middle;">
                                                                <?php echo $row_Recordset1['u_ser']; ?></td>
                                                            <td style="text-align:center;vertical-align:middle;">
                                                                <img src="image/admin.png" width="20" height="20" border="0" alt="<?php echo $row_Recordset1['pass']; ?>"></td>
                                                            <td style="text-align:center;vertical-align:middle;">
                                                                <?php
                                                                //echo $row_Recordset1['set_del']; 

                                                                if ($row_Recordset1['set_del'] == 1) {
                                                                    echo "<img src='image/icon/icon-true.gif'/>";
                                                                }
                                                                if ($row_Recordset1['set_del'] == 0) {
                                                                    echo "<img src='image/icon/cross.png'/>";
                                                                }
                                                                ?></td>
                                                            <td style="text-align:center;vertical-align:middle;">
                                                                <?php
                                                                if ($row_Recordset1['set_add'] == 1) {
                                                                    echo "<img src='image/icon/icon-true.gif'/>";
                                                                }
                                                                if ($row_Recordset1['set_add'] == 0) {
                                                                    echo "<img src='image/icon/cross.png'/>";
                                                                }
                                                                ?></td>
                                                            <td style="text-align:left;vertical-align:middle;">
                                                                <?php
                                                                echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                                                                //						echo $row_Recordset1['set_work'];
                                                                if ($row_Recordset1['set_work'] == 1) {
                                                                    echo "งานฯ - ตรวจสอบ";
                                                                }
                                                                if ($row_Recordset1['set_work'] == 2) {
                                                                    echo "งานแผน - ตัดยอด งปม.";
                                                                }
                                                                if ($row_Recordset1['set_work'] == 3) {
                                                                    echo "พัสดุ - P/O";
                                                                }
                                                                if ($row_Recordset1['set_work'] == 4) {
                                                                    echo "การเงิน - เบิกจ่าย";
                                                                }
                                                                if ($row_Recordset1['set_work'] == 9) {
                                                                    echo "Admin - Admin";
                                                                }
                                                                if (($row_Recordset1['set_work'] == "") or ( $row_Recordset1['set_work'] == 0)) {
                                                                    echo "-";
                                                                }

                                                                // 1 : งานฯ - ตรวจสอบ
                                                                // 2 : งานแผน - ตัดยอด งปม.
                                                                // 3 : พัสดุ - P/O
                                                                // 4 : การเงิน - เบิกจ่าย
                                                                ?>

                                                            </td>							  
                                                            <td style="text-align:center;vertical-align:middle;"><a href="prov_person_del.php?w_del=<?echo"$w_del"; ?>"><img src="image/icon/cross.png" width="16" height="16" border="0" alt="ลบ"></a></td>
                                                            <td style="text-align:center">
                                                                <a href="prov_person_edit.php?w_del=<?echo"$w_del"; ?>"><img src="image/icon/edit.gif" width="16" height="16" border="0" alt="แก้ไข"></a></td>
                                                        </tr>
                                                    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
                                                </table>
                                                <br>
                                                    </div>
                                                    <!-- end การแก้ไขข้อมูล -->
                                                    <?php include("./include/footer.inc"); ?>
                                                    </body>
                                                    </html>
