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
$query_Recordset1 = "SELECT * 
                        FROM cover_sheet 
                        WHERE u_ser='$user_'
                        ORDER BY status ASC";
$Recordset1 = mysql_query($query_Recordset1, $objConnect) or die(mysql_error());
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd" []>
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
            <font size="4" color="ffffff">Login โดย :&nbsp;<?php echo $user_ ?></font>
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
                                <h2 class="rnut-postheader" style="text-align: center;">รายการใบปะหน้า</h2>
             
                                <br>
                                <div align="center">
                                    <TABLE width="70%" align="center" border="0" cellspacing="1" cellpadding="3" bgcolor='#FFFF99'>
                                        <TR>
                                            <TD rowspan="2">
                                                <div align='right'><a href="cover_sheet_add.php"><img src="image/filesaveas.jpg" width="24" height="24" border="0" alt="เพิ่มข้อมูล"><br>เพิ่มข้อมูล</a></div>
                                            </TD>
                                        </tr>
                                        <tr>
                                        </TR>
                                    </TABLE>

                                    <P>
                                        <table width="70%" align="center" border="0" cellspacing="1" cellpadding="3">
                                            <tr bgcolor='#FFCC00'>
                                                <!th scope="col">
                                                    </th>
                                                    <th scope="col">id</th>
                                                    <th scope="col">ชื่อใบปะหน้า</th>
                                                    <th scope="col">สถานะ</th>
                                                    <th scope="col">แก้ไข</th>
                                                    <th scope="col">ลบ</th>

                                            </tr>
                                            <?php
                                            $row = mysql_fetch_assoc($Recordset1);

                                            do {
                                                $l++;
                                                $ii = ($l % 2)
                                            ?>
                                                <tr <?if($ii !=1){echo "bgcolor='#eaeaea'" ;}?> class='off unamed1' onmouseover=this.className='onping' onmouseout=this.className='off' style='cursor:hand' >

                                                    <?php $id = $row['id']; ?>

                                                    <td style="text-align:center;vertical-align:middle">
                                                        <font size="2" color="#000099"><?php echo $row['id']; ?></font>
                                                    </td>
                                                    <td style="text-align:center;vertical-align:middle">
                                                        <font size="2" color="#000099"><?php echo $row['title']; ?></font>
                                                    </td>
                                                    <td style="text-align:center;vertical-align:middle">
                                                        <font size="2" color="#000099"><?php 
                                                        
                                                        if ($row['status'] == "IN_PROGRESS") {
                                                            echo "กำลังดำเนินการ";
                                                        }

                                                        if ($row['status'] == "SUCCESS") {
                                                            echo "เสร็จสิ้น";
                                                        }
                                                        
                                                        
                                                        ?></font>
                                                    </td>
                                                    <td>
                                                        <div align="center"><a href="cover_sheet_edit.php?cover_sheet_id=<?echo"$id"; ?>"><img src="image/icon/edit.gif" width="16" height="16" border="0" alt="แก้ไข"></a></div>
                                                    </td>
                                                    <td>
                                                        <div align="center"><a href="cover_sheet_del.php?id=<?echo" $id"; ?>"><img src="image/icon/cross.png" width="16" height="16" border="0" alt="ลบ"></a></div>
                                                    </td>
                                                </tr>
                                            <?php } while ($row = mysql_fetch_assoc($Recordset1)); ?>
                                        </table>
                                </div>
                                <!-- end การแก้ไขข้อมูล -->
                                <?php include("./include/footer.inc"); ?>
</body>

</html>

<!-- TODO: cover_sheet_aad -->
<!-- TODO: cover_sheet_edit -->
<!-- TODO: cover_sheet_del -->