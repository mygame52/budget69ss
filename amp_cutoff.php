<?php
session_start();
//	@ini_set("display_errors", "0"); //ใส่บรรทัดแรก
include("config.inc.php");
if ($act != "ok") {
    echo "	<SCRIPT language='JavaScript'>";
    echo "			alert('ท่านเข้าสู่ระบบไม่ถูกต้อง')";
    echo"			location.href='index.php'";
    echo"	</SCRIPT>";
    exit();
}
session_unregister('sel3');
session_unregister('work');



$sele_amp;
mysql_select_db($dbname, $objConnect);

$query_Recordset2 = "SELECT * FROM judsun left join work on judsun.cod = work.w_code where  judsun.amp like '$sele_amp' ORDER BY code ASC";
//echo "ค่า sel".$sel;
$Recordset2 = mysql_query($query_Recordset2, $objConnect) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);
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
                        <a href="./menu_amp.php" class="active">Back</a>
                    </li>	
                    <li><font size="3" color="#ffcccc">
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
                                    <h2 class="rnut-postheader" style="text-align: center;">เจ้าหน้าที่อำเภอ ตัดยอดงบประมาณ</h2>

                                    <div class="rnut-postcontent">
                                        <?php
                                        if ($totalRows_Recordset2 == 0) {
                                            echo "<div align='center'><font size='3' color=''> ยังไม่ได้รับการจัดสรรงบประมาณ </font><br></div>";
                                            echo "<div align='center'><font size='3' color=''> กรุณาติดต่อ สำนักงาน กศน.จังหวัด </font></div>";
                                            echo "<meta http-equiv=\"refresh\" content=\"5;URL=menu_amp.php\" />";
                                        }else{
                                        ?>

                                    </div> 

                                    <!-- start การแก้ไขข้อมูล -->

                                    <br>
                                        <div align="center">
                                            <form id="form1" name="form1" method="post" action="amp_cutoff_data.php">
                                                <table width="50%" border="0" cellspacing="0" cellpadding="7">
                                                    <tr>
                                                        <td><div align="right"><font size="3" color="">รหัสงาน/โครงการ</font></div></td>
                                                        <td>	
                                                            <label>
                                                                <select name="sel3" style="font: 11pt tahoma; color: #000000;background: #ccffff; border: 1px black solid" align="center" >
                                                                    <?php
                                                                    do {
                                                                        ?>
                                                                        <option value="<?php echo $row_Recordset2['code'] ?>"><?php echo $row_Recordset2['w_name'] ?></option>
                                                                        <?php
                                                                    } while ($row_Recordset2 = mysql_fetch_assoc($Recordset2));
                                                                    $rows = mysql_num_rows($Recordset2);
                                                                    if ($rows > 0) {
                                                                        mysql_data_seek($Recordset2, 0);
                                                                        $row_Recordset2 = mysql_fetch_assoc($Recordset2);
                                                                    }
                                                                    ?>
                                                                </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>
                                                            <input name="Submit" type="submit" id="Submit" value="   ตกลง  " style="font: 12pt tahoma; color: #ff0000;background: #eff48a; border: 1px black solid" align="center" />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </form>
                                        </div>
                                        <?php
                                        mysql_free_result($Recordset2);
                                        ?> 
                                        <p>&nbsp;</p>
                                        <?php } ?>
                                        <!-- end การแก้ไขข้อมูล -->
                                        <?php include("./include/footer.inc"); ?>
                                        </body>
                                        </html>
