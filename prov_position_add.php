<?php
session_start();
@ini_set("display_errors", "0"); //ใส่บรรทัดแรก

include("config.inc.php");
$j = 0;
if (trim($hid1) <> "03") {
    echo "	<SCRIPT language='JavaScript'>";
    echo "			alert('ท่านเข้าสู่ระบบไม่ถูกต้อง')";
    echo"			location.href='index.php'";
    echo"	</SCRIPT>";
    exit();
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
    <body onload='document.form1.doc_.focus()'>
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
                                    <h2 class="rnut-postheader" style="text-align: center;">จัดการข้อมูล:ตำแหน่งงาน</h2>
                                    <!-- <div class="rnut-postcontent">
                                                                    <p style="text-align: center;">test1</p>
                                                                    <p style="text-align: center;">test2</p>
                                            </div> -->
                                    <!-- start การแก้ไขข้อมูล -->

                                    <TABLE width="100%" border="1" cellspacing="0" cellpadding="5" align="center">
                                        <tr>
                                            <td colspan="2" style="text-align:left;vertical-align:middle"><H3>ตำแหน่งงาน</H3></td>
                                            <td align="center"><a href="prov_position_add1.php"><IMG SRC='./image/users--plus.png' WIDTH='24' HEIGHT='24' BORDER='0' ALT='เพิ่ม' onClick='return Conf(this)'></a>
                                            </td>
                                        </tr>	
                                        <tr bgcolor="#E3E1B7">
                                            <th scope="col">id</th>
                                            <th scope="col">ชื่อตำแหน่ง</th>		    
                                            <th scope="col">จัดการ</th>
                                        </tr>

                                        <!-- ดึงข้อมูล ค่าสาธาฯ จาก ฐานข้อมูล public  -->
                                        <?php
                                        $a = 0;
//				$sele_amp = "00";
                                        $psql = "SELECT * FROM position order by idp";
                                        $dbquery = mysql_db_query($dbname, $psql);
                                        $num_rows = mysql_num_rows($dbquery);
                                        while ($result = mysql_fetch_array($dbquery)) {
                                            $idp_ = $result[0];
                                            $position_ = $result[1];
                                            $a++;

                                            if ($a % 2 == 0) {
                                                echo"<tr onmouseover=this.className='ongreen' onmouseout=this.className='off2' style='cursor:hand' bgcolor='#EAEAEA'>";
                                            } else {
                                                echo"<tr onmouseover=this.className='ongreen' onmouseout=this.className='off'		style='cursor:hand' bgcolor='#FFFFFF'>";
                                            }
                                            echo "  <td align='center' width='10%' style='text-align:center;vertical-align:middle'><div width='100'>&nbsp;$a</div></td>";
                                            echo "  <td align='center' width='50%' style='text-align:left;vertical-align:middle'>$position_</td>  ";
                                            echo "  <td align='center' width='10%' style='text-align:center;vertical-align:middle'><a href='prov_position_delete.php?idp_=$idp_'><IMG SRC='./image/cross.png' WIDTH='16' HEIGHT='16' BORDER='0' ALT='ลบ' onClick='return Conf(this)'></a></td>  ";
                                        }
                                        echo "</tr>";
                                        echo"</table>";
                                        echo "<br><br><br>";
                                        ?>

                                        <!-- end การแก้ไขข้อมูล -->
                                        <?php include("./include/footer.inc"); ?>
                                        </body>
                                        </html>



                                        <script language="javascript">

                                            function isNumeric(elem, helperMsg)  //ตรวจสอบการป้อนตัวเลข
                                            {
                                                var numericExpression = /^[0-9.]+$/; // ตัวเลขและทศนิยม
                                                if (elem.value.match(numericExpression)) {
                                                    return true;
                                                } else {
                                                    //                 alert(helperMsg);  
                                                    elem.value = elem.value.substr(0, elem.value.length - 1);
                                                    elem.focus();
                                                    return false;
                                                }
                                            }


                                        </script>
