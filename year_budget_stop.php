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
                                        การกำหนดสถานะ งบประมาณ ON - OFF
                                    </h2>
                                    <!-- start การแก้ไขข้อมูล -->
                                    <?php
                                    if (($user_ <> "admin") and ( $set_add <> "1")) {
                                        echo "<BR><CENTER><h2> คุณ <font color='#ff0000'>$user_</font>  ไม่มีสิทธิ์ในเมนูนี้ : ต้องเป็น Admin เท่านั้น  ครับ</h2>";
                                        exit();
                                    }
                                    ?>

                                    <table width="80%" align="center" border="0" cellspacing="1" cellpadding="3">
                                        <tr bgcolor="#c4f2a8">
                                            <th scope="col">รหัส สถานศึกษา</th>
                                            <th scope="col">ชื่อ สถานศึกษา</th>
                                            <th scope="col">สถานะการเบิกจ่าย</th>
<!--							 <th scope="col">Password</th>-->
                                            <th scope="col">แก้ไขสถานะ</th>
                                        </tr>

                                        <?php
                                        $a = 0;
                                        $psql = "select * from amp order by id";
                                        $dbquery = mysql_db_query($dbname, $psql);
                                        $num_rows = mysql_num_rows($dbquery);
                                        $result = mysql_fetch_array($dbquery);
                                        $w_del = $result['id'];
                                        while ($result = mysql_fetch_array($dbquery)) {
                                            $id = $result['id'];
                                            $w_del = $id;
                                            $name = $result['Name'];
                                            $sit = $result['sit'];
                                            $pass = $result['pass'];
                                            $a++;

                                            echo "<tr <?php if($a%2==0)";
                                            echo "bgcolor='#eaeaea'";
                                            echo "class='off unamed1' onmouseover=this.className='ongreen' onmouseout=this.className='off' style='cursor:hand' >";
                                            echo "  <td style='text-align:center;vertical-align:middle;'>$id</div></td>";
                                            echo "  <td style='text-align:left;vertical-align:middle;'>$name</td>  ";
                                            echo "  <td style='text-align:center;vertical-align:middle;'>";
                                            if ($sit == 1) {
                                                echo "<img src='image/onoff-status.jpg' width='64' height='19' border='0' alt=''>";
                                            } else if ($sit == 0) {
                                                echo "<img src='image/offon-status.jpg' width='64' height='19' border='0' alt=''>";
                                            }
                                            //echo $sit;
                                            echo "  </td>";
                                            //echo "<td style='text-align:left;vertical-align:middle;'>".$pass."</td>";
                                            ?>
                                            <td><font size="3" color="#660000"><div align="center">
                                                        <a href="year_amp_edit.php?w_del=<?php echo"$w_del"; ?>">
                                                            <img src="image/icon/edit.gif" width="16" height="16" border="0" alt=""></a></div></td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                    <!-- end การแก้ไขข้อมูล -->
 										<?php include("./include/footer.inc");?>
                                    </body>
                                    </html>