<?php
session_start();
@ini_set("display_errors", "0"); //ใส่บรรทัดแรก
include("config.inc.php");
include("code2name_work.php");
$l = 0;

$query_ = "SELECT * FROM amp order by id asc";
$Recordamp1 = mysql_query($query_, $objConnect) or die(mysql_error());
$totalRows_amp = mysql_num_rows($Recordamp1);

for ($i = 0; $i <= $totalRows_amp; $i++) {
    $row_Recordamp = mysql_fetch_assoc($Recordamp1);
    $i_amp = $row_Recordamp['id'];
    $n_amp[$i_amp] = $row_Recordamp['Name'];
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
                                    <h2 class="rnut-postheader" style="text-align: center;">รายการ id ที่อำเภอทำการลบไปแล้ว</h2>
                                    <!-- <div class="rnut-postcontent">
                                                                    <p style="text-align: center;">test1</p>
                                                                    <p style="text-align: center;">test2</p>
                                            </div> -->
                                    <!-- start การแก้ไขข้อมูล -->

                                    <P>
                                        <?

                                        ?>
                                        <br>
                                            <TABLE width="90%" border="1" cellspacing="0" cellpadding="5" align="center" bgcolor = '#ccffcc'>
                                                <tr bgcolor = '#ccffff'>
                                                    <th width="1%">ที่</th>
                                                    <th width="1%">ID</th>
                                                    <th width="10%">สถานศึกษา</th>
                                                    <th width="10%">ชื่องาน / โครงการ</th>
                                                    <th width="10%">รายการ</th>
                                                    <th width="10%">เลขหนังสือ</th>
                                                    <th width="5%">วันที่</th>
                                                    <th width="5%">จำนวนเงิน</th>
                                                    <th width="10%">ผู้ลบ</th>
                                                    <th width="5%">วันที่ลบ</th>
                                                    <th width="5%">เหตุผล</th>
                                                </tr>
                                                <tr>	
                                                    <!-- ดึงข้อมูล ผู้ยืมเงินจาก ฐานข้อมูล item_yuem  -->
                                                    <?php
                                                    $a = 0;
                                                    $psql = "SELECT * FROM amp_del_item order by id_item";
                                                    $dbquery = mysql_db_query($dbname, $psql);
                                                    $num_rows = mysql_num_rows($dbquery);
                                                    while ($result = mysql_fetch_array($dbquery)) {
                                                        $id_item_ = $result[0];
                                                        $amp_item_ = $result[1];
                                                        $c_khong_ = $result[2];
                                                        $item_ = $result[3];
                                                        $doc_ = $result[4];
                                                        $date_time_ = $result[5];
                                                        $bath_ = $result[6];
                                                        $user_del_ = $result[9];
                                                        $time_del_ = $result[10];
                                                        $hadpol_ = $result[11];
                                                        $a++;
                                                        ?>
                                                        <tr <?if($i !=1){echo "bgcolor='#ffffee'";}?> class='off unamed1' onmouseover=this.className='onping' onmouseout=this.className='off' style='cursor:hand' > 
                                                        <?php
                                                        echo "  <td width='10%' style='text-align:center;vertical-align:middle'>&nbsp;$a</td>";
                                                        echo "  <td width='10%' style='text-align:center;vertical-align:middle'>$id_item_</td>  ";
                                                        echo "  <td width='10%' style='text-align:left;vertical-align:middle'>$amp_item_.$n_amp[$amp_item_]</td>  ";

//						$query_ = "SELECT w_name FROM work  where w_code like $c_khong_";
//						$Record= mysql_query($query_, $objConnect) or die(mysql_error());
//						$row_ = mysql_fetch_assoc($Record);
//					 echo $row_['w_name'];

                                                        echo "<td width='10%'style='text-align:left;vertical-align:middle'>$c_khong_</td>  ";

                                                        echo "  <td width='10%' style='text-align:left;vertical-align:middle'>$item_</td>  ";
                                                        echo "  <td width='10%' style='text-align:left;vertical-align:middle'>$doc_</td>  ";
                                                        echo "  <td width='10%' style='text-align:center;vertical-align:middle'>$date_time_</td>  ";
                                                        echo "  <td width='10%' style='text-align:right;vertical-align:middle'>" . number_format($bath_, 2) . "</td>  ";
                                                        echo "  <td width='10%' style='text-align:left;vertical-align:middle'>$user_del_</td>  ";
                                                        echo "  <td width='10%' style='text-align:center;vertical-align:middle'>$time_del_</td>  ";
                                                        echo "  <td width='10%' style='text-align:left;vertical-align:middle'>$hadpol_</td>  ";
                                                        echo "</tr>";
                                                    }
                                                    echo "</table>";
                                                    echo "<br><br><br>";
                                                    ?>


                                                        <!-- end การแก้ไขข้อมูล -->
                                                        <?php include("./include/footer.inc"); ?>
                                                        </body>
                                                        </html>