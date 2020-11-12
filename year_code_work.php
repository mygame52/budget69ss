<?php
session_start();
require_once('config.inc.php');
// start หากไม่ได้เข้าใช้งานจากเมนู
if (trim($hid1) <> "03") {
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=menu_pro.php\" />";
}
// end หากไม่ได้เข้าใช้งานจากเมนู
$l = 0;

mysql_select_db($dbname, $objConnect);
$query_Recordset1 = "SELECT * FROM work  ORDER BY w_code ASC";
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
                                    <h2 class="rnut-postheader" style="text-align: center;">ข้อมูลเกี่ยวกับ:รหัสงาน / โครงการ</h2>
                                    <!-- <div class="rnut-postcontent">
                                                                    <p style="text-align: center;">test1</p>
                                                                    <p style="text-align: center;">test2</p>
                                            </div> -->
                                    <!-- start การแก้ไขข้อมูล -->
                                    <br>
                                        <div align="center">
                                            <TABLE width="70%" align="center" border="0" cellspacing="1" cellpadding="3"bgcolor = '#FFFF99'>
                                                <TR>
                                                    <TD><CENTER><font size="3" color="#ff66ff">กำหนด รหัสงาน โครงการ ไว้ก่อนการจัดสรร งปม.</font></CENTER></TD>
                                                    <TD rowspan="2"><div align='center'><a href="year_code_work_add.php"><img src="image/filesaveas.jpg" width="24" height="24" border="0" alt="เพิ่มข้อมูล"><br>เพิ่มข้อมูล</a></div></TD>
                                                                    </tr><tr>
                                                                    <TD><CENTER><font size="3" color="#8000ff">รหัส งปม.(4) + ชื่องาน / โครงการ(2)</font> </CENTER></TD>


                                                                </TR>
                                                                </TABLE>

                                                                <P>
                                                                    <table width="70%" align="center" border="0" cellspacing="1" cellpadding="3">
                                                                        <tr bgcolor = '#FFCC00'>
                                                                            <!th scope="col"></th>
                                                                            <th scope="col">รหัสงาน</th>
                                                                            <th scope="col">ชื่องาน / โครงการ</th>
                                                                            <th scope="col">ลบ</th>
                                                                            <th scope="col">แก้ไข</th>

                                                                        </tr>
                                                                        <?php
                                                                        do {
                                                                            $l++;
                                                                            $ii = ($l % 2)
                                                                            ?>
                                                                            <tr <?if($ii !=1){echo "bgcolor='#eaeaea'";}?> class='off unamed1' onmouseover=this.className='onping' onmouseout=this.className='off' style='cursor:hand' >	

                                                                                <?php $w_del = $row_Recordset1['w_code']; ?>
                                                                                <?php $cod = substr($row_Recordset1['w_code'], 0, 4) . ' ' . substr($row_Recordset1['w_code'], 4, 2); ?>
                                                                                <td style="text-align:center;vertical-align:middle"><font size="2" color="#000099"><?php echo $cod; ?></font></td>
                                                                                <td style="text-align:left;vertical-align:middle"><font size="2" color="#000099">&nbsp;<?php echo $row_Recordset1['w_name']; ?></font></td>
                                                                                <td><div align="center"><a href="year_code_work_del.php?w_del=<?echo"$w_del"; ?>"><img src="image/icon/cross.png" width="16" height="16" border="0" alt="ลบ"></a></div></td>
                                                                                <td><div align="center"><a href="year_code_work_edit.php?w_del=<?echo"$w_del"; ?>"><img src="image/icon/edit.gif" width="16" height="16" border="0" alt="แก้ไข"></a></div></td>

                                                                            </tr>
                                                                        <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
                                                                    </table>
                                                                    </div>
                                                                    <!-- end การแก้ไขข้อมูล -->
                                                                    <?php include("./include/footer.inc"); ?>
                                                                    </body>
                                                                    </html>