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

mysql_select_db($dbname, $objConnect);
$query_amp = "SELECT * FROM amp ORDER BY id ASC";
$amp = mysql_query($query_amp, $objConnect) or die(mysql_error());
$row_amp = mysql_fetch_assoc($amp);
$totalRows_amp = mysql_num_rows($amp);
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
                                    <h2 class="rnut-postheader" style="text-align: center;">แสดงข้อมูลการจัดสรร</h2>
                                    <!-- start การแก้ไขข้อมูล -->
                                    <div align="center">
                                        <?php
                                        mysql_select_db($dbname, $objConnect);
                                        $query_Recordset1 = "SELECT * FROM `work` ORDER BY w_code ASC";
                                        $Recordset1 = mysql_query($query_Recordset1, $objConnect) or die(mysql_error());
                                        $row_Recordset1 = mysql_fetch_assoc($Recordset1);
                                        $totalRows_Recordset1 = mysql_num_rows($Recordset1);
                                        ?>

                                        <form id="form1" name="form1" method="post" action="year_budget_edit_show2.php">
                                            <table width="60%" align="center" >
                                                <tr>
                                                    <td style="text-align:left">
                                                        <label><FONT SIZE="3" COLOR="#6600ff">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; จากงาน / โครงการ </font>:</label>
                                                        <select name="sel_work">
                                                            <?php
                                                            do {
                                                                ?>
                                                                <option value="<?php echo $row_Recordset1['w_code'] ?>"><?php echo $row_Recordset1['w_name'] ?></option>
                                                                <?php
                                                            } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
                                                            $rows = mysql_num_rows($Recordset1);
                                                            if ($rows > 0) {
                                                                mysql_data_seek($Recordset1, 0);
                                                                $row_Recordset1 = mysql_fetch_assoc($Recordset1);
                                                            }
                                                            ?>
                                                        </select>
                                                        </label>
                                                        <label></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <input type="submit" name="Submit2" value=" ตกลง " />
                                                    </td>
                                                </tr>
                                            </table>
                                        </form>

                                        </TD>
                                        </TR>
                                        </TABLE><!-- จบตารางของการแสดง -->
                                    </div>
                                    <!-- end การแก้ไขข้อมูล -->
                                    <?php include("./include/footer.inc"); ?>
                                    </body>
                                    </html>