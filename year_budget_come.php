<?php
session_start();
include("config.inc.php");
include("code2name_work.php");


if (trim($hid1) <> "03") {
    echo "	<SCRIPT language='JavaScript'>";
    echo "			alert('ท่านเข้าสู่ระบบไม่ถูกต้อง')";
    echo"			location.href='index.php'";
    echo"	</SCRIPT>";
    exit();
}

//mysql_select_db($database_budget, $budget);
$query_Recordset1 = "SELECT * FROM samnakma  ORDER BY code_ma ASC";
$Recordset1 = mysql_query($query_Recordset1) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
$j = 0;
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
    <body onload='document.form1.ok_.focus()'>
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
                                    <h2 class="rnut-postheader" style="text-align:center;"><CENTER>บันทึกการรับโอบงบประมาณ</CENTER>
                                        <?php //echo $w_name[$c_jud];  ?>
                                    </h2>
                                    <!-- <div class="rnut-postcontent">
                                            <p style="text-align: center;">test1</p>
                                            <p style="text-align: center;">test2</p>
                    </div> -->
                                    <!-- start การแก้ไขข้อมูล -->
                                    <div align="center">
                                        <br>
                                            <TABLE width="80%" align="center" border="2" cellspacing="1" cellpadding="3" bgcolor="#DEDCAB">
                                                <TR>
                                                    <TD ></TD>
                                                    <TD rowspan="2"> <div align= "center">
                                                            <ul class="rnut-hmenu">
                                                                <li>
                                                                    <a href="./year_budget_come2.php" class="active"><font size="3" color="#000066">เพิ่มข้อมูลการรับโอนเงินงบประมาณจากสำนักฯ</font></a>
                                                                </li>	</ul>
                                                        </div></TD>                                       
                                                    <tr border='0' ><td colspan="3"><div align="right"><FONT SIZE="3" COLOR="#FF0000">คำเตือน!! ถ้าคลิก ลบ ข้อมูลจะหายทันที</FONT></div></td></tr>
                                            </TABLE>

                                            <P>
                                                <table width="80%" align="center" border="0" cellspacing="0" cellpadding="5">
                                                    <tr bgcolor="#D6C069">
                                                        <th scope="col"><font size="3" color="#6600cc">รหัส งปม.</font></th>
                                                        <th scope="col"><font size="3" color="#6600cc">วันที่</font></th>
                                                        <th scope="col"><font size="3" color="#6600cc">ที่เอกสาร</font></th>
                                                        <th scope="col"><font size="3" color="#6600cc">โอนครั้งนี้</font></th>
                                                        <th scope="col"><font size="3" color="#6600cc">หมายเหตุ</font></th>
                                                        <th scope="col"><font size="3" color="#6600cc">ลบ</font></th>
                                                        <th scope="col"><font size="3" color="#6600cc">แก้ไข</font></th>
                                                    </tr>
                                                    <?php
                                                    do {
                                                        $j++;
                                                        $i = ($j % 2);
                                                        ?>
                                                        <tr <?if($i==1){echo "bgcolor='#FFFFCC'";}?> >
                                                        <?php $w_del = $row_Recordset1['id_auto']; ?>
                                                            <td><?php echo $row_Recordset1['code_ma']; ?></td>
                                                            <td><?php echo $row_Recordset1['date']; ?></td>
                                                            <td><?php echo $row_Recordset1['doc']; ?></td>
                                                            <td align="right"><?php echo number_format($row_Recordset1['mony_ma'], 2); ?></td>
                                                            <td><?php echo nl2br($row_Recordset1['detail']); ?></td>
                                                            <td><div align="center"><a href="year_budget_wmadel.php?w_del=<?echo"$w_del"; ?>"><img src="image/icon/cross.png" width="16" height="16" border="0" alt="ลบ"></a></div></td>
                                                            <td><div align="center"><a href="year_budget_wmaedit.php?w_del=<?echo"$w_del"; ?>"><img src="image/icon/edit.gif" width="16" height="16" border="0" alt="แก้ไข"></a></div></td>
                                                        </tr>
                                                    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
                                                </table>

                                                </div>

                                                <!-- end การแก้ไขข้อมูล -->
                                                <?php include("./include/footer.inc"); ?>
                                                </body>
                                                </html>
                                                <?php
                                                mysql_free_result($Recordset1);
                                                ?>