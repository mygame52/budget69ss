<?php
session_start();

if ($hid <> 85) {
    echo "	<SCRIPT language='JavaScript'>";
    echo "			alert('ท่านเข้าสู่ระบบไม่ถูกต้อง')";
    echo"			location.href='login_director.php'";
    echo"	</SCRIPT>";
    exit();
}
include("grap1.php");
session_register("hid3");
session_register("hid1");
$hid1 = "03";
?>

<?php include("config.inc.php"); ?>
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
        <?php //include("calculate_bar.php"); // ใช้ Script tag ด้านล่างทดแทน calculate_bar?>

        <?php
        //include("calculate_bar.php");

        mysql_connect($dbserver, $dbuser, $dbpass) or
                die("<hr><b> เชื่อมต่อฐานข้อมูลไม่ได้>");

        mysql_select_db($dbname) or die("เลือกฐานข้อมูลไม่ได้");

        $sql = ("select * from samnak ORDER BY code_sam ASC");
        $result = mysql_query($sql);
        $num_rows = mysql_num_rows($result); //จำนวนที่เลือกได้

        $t_pay = 0;
        $tr_rab = 0;
        $tr_rua = 0;
        $tpee = 0;
        for ($i = 1; $i <= $num_rows; $i++) {
            $fet_work = mysql_fetch_array($result);
            $code_w[$i] = trim($fet_work['code_sam']);
            $nam_w[$i] = $fet_work['nam_sam'];
            $ngen_p[$i] = $fet_work['mony_pee'];
            $r_rab = 0;
            $r_pay = 0;
            $sql_j = ("select * from judsun where mid(code,3,4) like '$code_w[$i]'");
            $result_j = mysql_query($sql_j);
            echo mysql_error();

            $num_rows_j = mysql_num_rows($result_j); //จำนวนที่เลือกได้
            for ($j = 1; $j <= $num_rows_j; $j++) {
                $fetcharr = mysql_fetch_array($result_j);
                $r_pay = $r_pay + $fetcharr['rua'];
            }
            $mony_pay[$i] = $r_pay;
        }
        ?>

        <?php include 'include/header.inc.php'; ?>
        <div class="cleared reset-box"></div>
        <div class="rnut-bar rnut-nav">
            <div class="rnut-nav-outer">
                <ul class="rnut-hmenu">
                    <li>
                        <a href="#" class="active">สำหรับผู้บริหาร</a>
                    </li>	

                    <li>
                        <!--			  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
                        <a href="./menu_director.php">Home</a>
                    </li>	
                    <li>
                        <a href="#">รายงานข้อมูล</a>
                        <ul>
                            <li>
                                <a href="./report_director/prov_report_sum.php"><img src="image/icon/block.png" width="16" height="16" border="0" alt="">&nbsp;&nbsp;สรุปภาพรวมทั้งจังหวัด</a>
                            </li>
                            <li>
                                <a href="./report_director/prov_report_classification.php"><img src="image/icon/blog.png" width="16" height="16" border="0" alt="">&nbsp;&nbsp;จำแนกตามการจัดสรร</a>
                            </li>
                            <li>
                                <a href="./report_director/prov_report_item.php?hid1=13"><img src="image/icon/building.png" width="16" height="16" border="0" alt="">&nbsp;&nbsp;รายการตัดยอดงบประมาณ</a>
                            </li>
                            <li>
                                <a href="#"><img src="image/icon/blog-blue.png" width="16" height="16" border="0" alt="">&nbsp;&nbsp;การเบิกจ่าย&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="image/25.gif" width="5" height="9" border="0" alt=""></a>
                                            <ul>
                                                <li>
                                                    <a href="./report_director/prov_report_peramp12.php"><img src="image/serverstatus.png" width="16" height="16" border="0" alt="">&nbsp;&nbsp;เรียงจาก น้อย --> มาก</a>
                                                </li>
                                                <li>
                                                    <a href="./report_director/prov_report_peramp21.php"><img src="image/serverstatus.png" width="16" height="16" border="0" alt="">&nbsp;&nbsp;เรียงจาก มาก --> น้อย</a>
                                                </li>
                                            </ul>
                                            </li>
                                            <li>
                                                <a href="./report_director/prov_report_classification_amp.php"><img src="image/icon/database.png" width="16" height="16" border="0" alt="">&nbsp;&nbsp;จำแนกตามสถานศึกษา</a>
                                            </li>
                                            <li>
                                                <a href="./report_director/prov_report_classification_work.php"><img src="image/icon/db-pencil.png" width="16" height="16" border="0" alt="">&nbsp;&nbsp;จำแนกตาม งาน / โครงการ</a>
                                            </li>
                                            <li>
                                                <a href="./report_director/prov_report_classification_job.php"><img src="image/icon/download.png" width="16" height="16" border="0" alt="">&nbsp;&nbsp;ค้นหารายการเบิกจ่าย</a>
                                            </li>
                                            </ul>
                                            </li>	
                                            <li>
                                                <a href="./logout_director.php">Exit</a>
                                            </li>	
                                            </ul>
                                            </div>
                                            </div>

                                            <div class="cleared reset-box"></div>
                                            <div class="rnut-layout-wrapper">
                                                <div class="rnut-content-layout">
                                                    <div class="rnut-content-layout-row">
                                                        <div class="rnut-layout-cell rnut-sidebar1">
                                                            <div class="rnut-block clearfix">
                                                                <div class="rnut-blockheader">
                                                                    <h2 class="t"><font size="3">มุมบริการ</font></h2>
                                                                </div>
                                                                <div class="rnut-postcontent">
                                                                    <font size="3">: กศน.จังหวัด</font>
                                                                    <ul class="rnut-vmenu">
                                                                        <li>    
                                                                            <font size="2"><a href="./direct_remain_yuem.php">ตรวจสอบ:ผู้ค้างเงินยืม</a></font>
                                                                        </li>                                                                                                                                                                                                                                                                                                        
                                                                        <li>
                                                                            <font size="2"><a href="./direct_yuem_person_show.php">ตรวจสอบ:สิทธิยืมเงิน</a></font>
                                                                        </li>
                                                                    </ul>
                                                                    <font size="3">: กศน.อำเภอ</font>                                                                                                                                                 
                                                                    <ul class="rnut-vmenu">                                                                                                                                                    
                                                                        <li>
                                                                            <font size="2"><a href="./direct_remain_yuem_amp.php">ตรวจสอบ:ค้างเงินยืม</a></font>
                                                                        </li>	                                                                                                                                                                                                                                                                                                        
                                                                        <li>
                                                                            <font size="2"><a href="./direct_yuem_person_amp.php">ตรวจสอบ:สิทธิยืมเงิน</a></font>
                                                                        </li>                                                                                                                                                                                                                                                                                                        
                                                                    </ul>                                                                                                                                                   
                                                                </div>
                                                            </div>   





                                                            <div class="cleared"></div>
                                                        </div>
                                                        <div class="rnut-layout-cell rnut-content">
                                                            <div class="rnut-box rnut-post">
                                                                <div class="rnut-box-body rnut-post-body">
                                                                    <div class="rnut-post-inner rnut-article">
                                                                        <!-- start Block center -->
                                                                        <h2 class="rnut-postheader">กราฟแสดงการใช้งบประมาณ</h2>

                                                                        <TABLE width="100%"  border="1" cellpadding="3" cellspacing="0" bordercolordark="#FFFFFF"    bordercolorlight="#8297b1"align="center">
                                                                            <TR>
                                                                                <TD width =30% align="top">
                                                                                    <CENTER>แผนภูมิแสดงสถานะ<BR>การเบิกจ่ายงบประมาณ</CENTER>
                                                                                    <BR>
                                                                                        <div align="center"><img  src="pie.php"></div>
                                                                                        <BR>
                                                                                            <CENTER><img src="image/R.jpg"> = เบิกจ่ายแล้ว  
                                                                                                    <?php echo number_format($grap1, 2); ?> % </CENTER>
                                                                            <!-- <img src="image/p.jpg"> = คงเหลือ</TD> -->

                                                                                            </TD>
                                                                                            </TR>
                                                                                            <TR>
                                                                                                <TD width=70%>
                                                                                                    <!-- ใส่ webboard -->
                                                                                                    <P><B><FONT style="BACKGROUND-COLOR: #ffffcc" color=#ff0000>
                                                                                                                <CENTER>

                                                                                                                    <p><br>
                                                                                                                            <?php echo $path ?>
                                                                                                                            <div align="center"><img  src="bar4.php"></div><BR>
                                                                                                                                แสดงการเบิกจ่าย จำแนกตามงบประมาณ
                                                                                                                                </CENTER> 
                                                                                                                                </FONT></B></P>
                                                                                                                                </TD>
                                                                                                                                </TR>

                                                                                                                                </TABLE>

                                                                                                                                <h2 class="rnut-postheader">กระดานสนทนา / BG-Board</h2>
                                                                                                                                <div class="rnut-postcontent">
                                                                                                                                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                                                                                                                        <tr>
                                                                                                                                            <td>
                                                                                                                                                <iframe width="100%" height="430" src="./webboard/webboard-admin.php" border="1" frameBorder=1 >	</iframe>
                                                                                                                                            </td>
                                                                                                                                        </tr>
                                                                                                                                    </table>

                                                                                                                                </div>




                                                                                                                                <!-- end Block center -->
  <?php include("./include/footer.inc");?>
                                    </body>
                                    </html>
