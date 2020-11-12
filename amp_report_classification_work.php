<?php
session_start();
require_once("config.inc.php");

mysql_select_db($dbname, $objConnect);
$query_Recordset1 = "SELECT * FROM judsun   left join work on judsun.cod = work.w_code where  judsun.amp like '$sele_amp' ORDER BY code ASC";

$Recordset1 = mysql_query($query_Recordset1, $objConnect) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
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
                        <a href="menu_amp.php" class="active">Back</a>
                    </li>	
                    <li><font size="3" color="#FFCCCC">
                            <?php
                            echo "หน่วยงาน   : " . $sele_amp;
                            echo " : " . $full_name;
                            ?></font>
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
                                    <h2 class="rnut-postheader" style="text-align: center;">รายงานการเบิกจ่ายงบประมาณ</h2>

                                    <!-- start การแก้ไขข้อมูล -->
                                    <br>
                                        <div align="center">
                                            <form id="form2" name="form2" method="post" action="amp_report_classification_job.php" > 
                                                <table width="70%" border="0" align="center">
                                                    <tr>
                                                        <td bgcolor="#E4E2BA" style="vertical-align:middle" width="60%"><div align="center">เลือกงาน / โครงการ
                                                                <select name="codework">
                                                                    <?php do { ?>
                                                                        <option value="<?php echo $row_Recordset1['code'] ?>"><?php echo $row_Recordset1['w_name'] ?></option>
                                                                        <?php
                                                                    } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
                                                                    $rows = mysql_num_rows($Recordset1);
                                                                    if ($rows > 0) {
                                                                        mysql_data_seek($Recordset1, 0);
                                                                        $row_Recordset1 = mysql_fetch_assoc($Recordset1);
                                                                    }
                                                                    ?>
                                                                </select>

                                                                <td bgcolor="#E4E2BA" style="vertical-align:middle" width="20%"><div align="center" >ใส่คำค้น (ถ้าต้องการ)</div></td>
                                                                <td bgcolor="#E4E2BA" style="vertical-align:middle">
                                                                    <input type ="text" name ="search">
                                                                </td>
                                                                <td bgcolor="#E4E2BA"><div align="center">
                                                                        <INPUT TYPE="submit" value = " ตกลง "></div></td>

                                                                </tr>
                                                                </table>
                                                                </form>


                                                            </div>

                                                            <!-- end การแก้ไขข้อมูล -->
                                                            <?php include("./include/footer.inc"); ?>
                                                            </body>
                                                            </html>
