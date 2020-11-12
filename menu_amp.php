<?php
session_start();
@ini_set("display_errors", "0"); //ใส่บรรทัดแรก
include("config.inc.php");
if (trim($hid8) <> "908") {
    echo "	<SCRIPT language='JavaScript'>";
    echo "			alert('ท่านเข้าสู่ระบบไม่ถูกต้อง')";
    echo"			location.href='index.php'";
    echo"	</SCRIPT>";
    exit();
}
$ae = "on";
Session_register("ae");
$_SESSION["amp_bar"] = $sele_amp;
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
                        <a href="#" class="active">สำหรับอำเภอ</a>
                    </li>	
                    <li>
                        <a href="./menu_amp.php">Home</a>
                    </li>	
                    <?php
                    if ($sit == 0) {
                        echo "<li>";
                        echo "<a href='#'>งานรายวัน</a>";
                        echo "</li>";
                    }
                    if ($sit == 1) {
                        ?>
                        <li>
                            <a href="#">งานรายวัน</a>
                            <ul>
                                <li>
                                    <a href="#"><img src="image/icon/edit.gif" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;ตั้งเบิก  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img src="image/25.gif" width="5" height="9" border="0" alt=""></a>
                                    <ul>
                                        <li>				
                                            <a href="./amp_cutoff.php"><img src="image/icon/icon-doc1.gif" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;ตั้งเบิก:ทั่วไป</a>
                                        </li>
                                        <li>
                                            <a href="./amp_cutoff_sata.php"><img src="image/icon/folder-open-doc-text.png" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;ตั้งเบิก:ค่าสาธาฯ</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#"><img src="image/icon/icon-doc.gif" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;ยืมเงิน &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img src="image/25.gif" width="5" height="9" border="0" alt=""></a>
                                    <ul>
                                        <li>				
                                            <a href="./amp_yuem.php"><img src="./images/bar_graph.png" width="22" height="20" border="0" alt=""/>&nbsp;&nbsp;ยืมเงิน:ทั่วไป</a>
                                        </li>
                                        <li>
                                            <a href="./amp_yuem_serv.php"><img src="./images/govt-icon-orange.png" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;&nbsp;&nbsp;ยืมเงิน:ไปราชการ</a>
                                        </li>
                                    </ul>

                                </li>
                                <li>
                                    <a href="./amp_yuem_person_clear_list.php"><img src="./image/icon/blog-blue.png" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;ล้างเงินยืม </a>
                                </li>

                                <li>
                                    <a href="./amp_del_list.php"><img src="image/cross.png" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;ลบ / ถอน การเบิกจ่าย</a>
                                </li>
                            </ul>
                        </li>	
                    <?php } ?>
                    <li>
                        <a href="#">รายงาน</a>
                        <ul>
                            <li>
                                <a href="./amp_report_sum.php"><img src="image/icon/block.png" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;รายงานสรุป ทั้งอำเภอ</a>
                            </li>

                            <li>
                                <a href="#"><img src="image/icon/database.png" width="16" height="16" border="0" alt="">&nbsp;&nbsp;รายงานการเบิกจ่าย&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img src="image/25.gif" width="5" height="9" border="0" alt=""></a>
                                            <ul>
                                                <li>
                                                    <a href="./amp_report_classification_work.php"><img src="image/serverstatus.png" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;แยก งาน / โครงการ:<font color="3300ff">ทุกสถานะ</font></a>
                                                </li>
                                                <li>
                                                    <a href="./amp_report_classification_work_pay.php"><img src="image/serverstatus.png" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;แยก งาน / โครงการ:<font color="3300ff">เบิกจ่ายแล้ว</font></a>
                                                </li>
                                                <li>
                                                    <a href="./amp_report_classification_all.php"><img src="image/serverstatus.png" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;ทั้งหมด:ทุกสถานะ</a>
                                                </li>

                                            </ul>
                                            </li>
                                            <li>
                                                <a href="./amp_yuem_person_show.php"><img src="image/icon/blog.png" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;รายงาน:ข้อมูลผู้ยืมเงิน</a>
                                            </li>
                                            <li>
                                                <a href="./amp_remain_yuem.php"><img src="image/icon/database.png" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;รายงาน:เงินยืมคงค้าง</a>
                                            </li>
                                            <li>
                                            </li>
                                            <li>
                                                <a href="./amp_report_yuem_show.php"><img src="image/icon/icon-doc1.gif" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;รายงาน:สมุดคุมเงินยืม</a>
                                            </li>
                                            <li>
                                                <a href="./amp_yuem_report.php"><img src="image/icon/blog-blue.png" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;รายงาน:เงินยืมทุกโครงการ</a>
                                            </li>
                                            <li>
                                                <a href="./amp_remain_yuem_check.php"><img src="image/icon/blogs.png" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;รายงาน:การล้างเงินยืมทุกโครงการ</a>
                                            </li>
                                            <li>
                                                <a href="./amp_report_selectst.php"/><img src="image/contact.png" width="16" height="16" border="0" alt="">&nbsp;&nbsp;รายงานค่าสาธารณูปโภค</a>
                                            </li>
                                            <li>
                                                <a href="./amp_report_saler.php"/><img src="image/icon/ico_cate_mobile.gif" width="16" height="16" border="0" alt="">&nbsp;&nbsp;รายงานสรุปยอดเบิกจ่าย-ร้านค้า</a>
                                            </li>
                                            <li>
                                                <a href="#"><img src="image/cart.png" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;รายงานผลการปฏิบัติงาน&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="image/25.gif" width="5" height="9" border="0" alt=""></a>
                                                <ul>
                                                    <li>
                                                        <a href="./amp_report_selectd.php"><img src="image/icon/icon-doc2.gif" width="16" height="16" border="0" alt="">&nbsp;&nbsp;รายวัน:<font color="3300ff">Date</font></a>
                                                    </li>
                                                    <li>
                                                        <a href="./amp_report_selectm.php"><img src="image/icon/folder-open-doc-text.png" width="16" height="16" border="0" alt="">&nbsp;&nbsp;รายเดือน:<font color="3300ff">Month</font></a>
                                                    </li>
                                                </ul>
                                            </li>			
                                            <li>
                                                <a href="./amp_report_delete.php"><img src="image/icon/trash.gif" width="16" height="16" border="0" alt="">&nbsp;&nbsp;รายการที่ยกเลิก</a>
                                            </li>
                                            </ul>
                                            </li>	
                                            <li>
                                                <a href="#">การตั้งค่าโปรแกรม</a>
                                                <ul>
                                                    <li>				
                                                        <a href="./amp_cp.php?ch_p=<?php echo $sele_amp ?>"><img src="image/admin.png" width="16" height="16" border="0" alt="">&nbsp;&nbsp;เปลี่ยนรหัสผ่าน</a>
                                                    </li>
                                                    <li>
                                                        <a href="./amp_yuem_person.php"><img src="image/icon/friends16.gif" width="16" height="16" border="0" alt="">&nbsp;&nbsp;ข้อมูลผู้ยืมเงิน</a>
                                                    </li>
                                                    <li>
                                                        <a href="./amp_book.php?ch_book=<?php echo $sele_amp ?>"><img src="image/icon/ico_cate_utilities.gif" width="16" height="16" border="0" alt="">&nbsp;&nbsp;ตั้งค่าหน่วยงาน</a>
                                                    </li>
                                                    <li>
                                                        <a href="./saler.php"><img src="image/icon/shop-icon.png" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;ข้อมูลผู้ขาย/ร้านค้า</a>
                                                    </li>
                                                </ul>
                                            </li>	

                                            <li>                                                                                                            
                                                <a href="./logout_amp.php">Exit</a>
                                            </li>
                                            <li><a href="#"><font color="#FF00FF" >
                                                        <?php
                                                        echo "หน่วยงาน   : " . $sele_amp;
                                                        echo " : " . $full_name;
                                                        ?></font></a>
                                            </li>
                                            </ul>
                                            </div>
                                            </div>
                                            <div class="cleared reset-box"></div>
                                            <div class="rnut-layout-wrapper">
                                                <div class="rnut-content-layout">
                                                    <div class="rnut-content-layout-row">
                                                        <div class="rnut-layout-cell rnut-sidebar1">
                                                            <div class="rnut-box rnut-vmenublock">
                                                                <div class="rnut-block clearfix">
                                                                    <div class="rnut-blockheader">
                                                                        <h2 class="t"><font size="2" class="rnut-postcontent">มุมบริการ</font></h2>
                                                                    </div>
                                                                    <div class="rnut-postcontent">
                                                                        <img width="22" height="21" alt="" class="rnut-lightbox" src="image/cart.png" style="margin-top:"></img>
                                                                        <font size="2" class="rnut-postcontent"><a href="./amp_remain_yuem.php"/>ตรวจสอบ:ค้างเงินยืม</a></font>
                                                                    </div>
                                                                    <div class="rnut-postcontent">
                                                                        <img width="22" height="21" alt="" class="rnut-lightbox" src="images/history-large.png" style="margin-top:"></img>
                                                                        <font size="2" class="rnut-postcontent"><a href="./amp_yuem_person_show.php"/>ตรวจสอบ:สิทธิการยืมเงิน</a></font>
                                                                    </div>
                                                                    <div class="rnut-postcontent">
                                                                        <img width="22" height="21" alt="" class="rnut-lightbox" src="images/graph.png" style="margin-top:"></img>
                                                                        <font size="2" class="rnut-postcontent"><a href="./amp_bar.php"/>กราฟงบประมาณ</a></font>
                                                                    </div>

                                                                </div>    

                                                            </div>
                                                            <div class="cleared"></div>
                                                        </div>
                                                        <div class="rnut-layout-cell rnut-content">
                                                            <div class="rnut-box rnut-post">
                                                                <div class="rnut-box-body rnut-post-body">
                                                                    <div class="rnut-post-inner rnut-article">
                                                                        <!-- start Block center -->
                                                                        <h2 class="rnut-postheader">กระดานสนทนา / BG-Board</h2>
                                                                        <div class="rnut-postcontent">

                                                                            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                                                                <tr>
                                                                                    <td>
                                                                                        <iframe width="100%" height="430" src="webboard/webboard.php" border="1" frameBorder=1 >	</iframe>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </div></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            </div>

                                            <!-- end Block center -->
                                            <?php include("./include/footer.inc"); ?>
                                            </body>
                                            </html>
