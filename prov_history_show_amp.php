<?php
session_start();
if (trim($hid1) <> "03") {
    echo "	<SCRIPT language='JavaScript'>";
    echo "			alert('ท่านเข้าสู่ระบบไม่ถูกต้อง')";
    echo"			location.href='index.php'";
    echo"	</SCRIPT>";
    exit();
}
require_once("config.inc.php");
$sel = $_REQUEST['select'];

$query_search = "SELECT * FROM amp where id = '$sel'";
$result = mysql_query($query_search);
$nums_rows = mysql_num_rows($result);
if ($nums_rows >= 1) {
    $fet = mysql_fetch_array($result);
    $nam = $fet['Name'];
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"[]>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
    <head>
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
                        <a href="prov_history_select.php" class="active">Back</a>
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
                                    <h2 class="rnut-postheader" style="text-align: center;">รายงานประวัติการใช้งาน (Logs file) :&nbsp;<?php echo "<FONT SIZE='3' COLOR='#3333CC'><B>&nbsp;$sel:&nbsp;$nam</B></FONT>"; ?></h2>
                                    <!-- start การแก้ไขข้อมูล -->
                                    <!-- start การแก้ไขข้อมูล -->

                                    <TABLE width="100%" border="1" cellspacing="0" cellpadding="5" align="center">
                                        <tr bgcolor="#E3E1B7">                                            
                                            <th scope="col">Date - Time</th>
                                            <th scope="col">Detail</th>
                                            <th scope="col">Note</th>
                                            <th scope="col">IP</th>
                                        </tr>

                                        <!-- ดึงข้อมูล การ Log in ใช้งาน -->
                                        <?php
                                        $a = 0;
                                        $psql = "SELECT * FROM history_detail where user_login = '$sel' order by date_time ASC";
                                        $dbquery = mysql_db_query($dbname, $psql);
                                        $num_rows = mysql_num_rows($dbquery);
                                        while ($result = mysql_fetch_array($dbquery)) {
                                            $id_login_ = $result[0];
                                            $user_login = $result[1];
                                            $date_time_ = $result[2];
                                            $detail_ = $result[3];
                                            $note_ = $result[4];
                                            $ip_ = $result[5];
                                            $a++;

                                            if ($a % 2 == 0) {
                                                echo"<tr onmouseover=this.className='on' onmouseout=this.className='off2' style='cursor:hand' bgcolor='#EAEAEA'>";
                                            } else {
                                                echo"<tr onmouseover=this.className='on' onmouseout=this.className='off' style='cursor:hand' bgcolor='#FFFFFF'>";
                                            }
                                            echo "  <td align='center' width='20%' style='text-align:center;vertical-align:middle'>$date_time_</td>  ";
                                            echo "  <td align='left' width='50%' style='text-align:left;vertical-align:middle'>&nbsp;$detail_</td>  ";
                                            echo "  <td align='left' width='50%' style='text-align:left;vertical-align:middle'>&nbsp;$note_</td>  ";
                                            echo "  <td align='center' width='10%' style='text-align:center;vertical-align:middle'>$ip_</td>  ";
                                        }
                                        echo "</tr>";
                                        echo"</table>";
                                        echo "<br><br><br>";
                                        ?>                                    
                                        <!-- end การแก้ไขข้อมูล -->
										<?php include("./include/footer.inc");?>
                                    </body>
                                    </html>
