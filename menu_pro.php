<?php
session_start();
if (trim($hid1) <> "03") {
    echo "	<SCRIPT language='JavaScript'>";
    echo "			alert('ท่านเข้าสู่ระบบไม่ถูกต้อง')";
    echo"			location.href='index.php'";
    echo"	</SCRIPT>";
    exit();
}
?>

<?php include("config.inc.php"); ?>
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
        <?php include("calculate_bar.php"); ?>
        <?php include 'include/header.inc.php'; ?>
        <div class="cleared reset-box"></div>
        <div class="rnut-bar rnut-nav">
            <div class="rnut-nav-outer">
                <ul class="rnut-hmenu">
                    <li>
                        <a href="#" class="active">สำหรับจังหวัด</a>
                    </li>	
                    <li>
                        <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
                        <a href="./menu_pro.php">Home</a>
                    </li>	
                    <li>
                        <a href="#">งานรายวัน</a>
                        <ul>
                            <li>
                                <a href="./prov_statuss.php"><img src="image/icon/edit.gif" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;บันทึกสถานะการเบิกจ่าย</a>
                            </li>
                            <?php
                            if ($sit == 9) {
                                ?>
                                <li>
                                    <a href="#"><img src="image/icon/edit.gif" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;ตั้งเบิก  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img src="image/25.gif" width="5" height="9" border="0" alt=""/></a>
                                    <ul>
                                        <li>				
                                            <a href="./prov_cutoff.php"><img src="image/icon/icon-doc1.gif" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;ตั้งเบิก:ทั่วไป</a>
                                        </li>
                                        <li>
                                            <a href="./prov_cutoff_sata.php"><img src="image/icon/folder-open-doc-text.png" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;ตั้งเบิก:ค่าสาธาฯ</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#"><img src="image/icon/icon-doc.gif" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;ยืมเงิน &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img src="image/25.gif" width="5" height="9" border="0" alt=""/></a>
                                    <ul>
                                        <li>				
                                            <a href="./prov_yuem.php"><img src="./images/bar_graph.png" width="22" height="20" border="0" alt=""/>&nbsp;&nbsp;ยืมเงิน:ทั่วไป</a>
                                        </li>
                                        <li>
                                            <a href="./prov_yuem_serv.php"><img src="./images/govt-icon-orange.png" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;&nbsp;&nbsp;ยืมเงิน:ไปราชการ</a>
                                        </li>
                                    </ul>

                                </li>
                                <li>
                                    <a href="./prov_yuem_person_clear_list.php"><img src="./image/icon/blog-blue.png" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;ล้างเงินยืม </a>
                                </li>
                            <?php } ?>
                            <li>
                                <a href="./prov_del_list.php"><img src="image/cross.png" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;ลบ:ถอน ในจังหวัด</a>
                            </li>
                            <li>            
                                <a href="./prov_update.php"><img src="image/cross.png" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;ลบ:ถอน ในอำเภอ&nbsp;&nbsp;</a>
                            </li>                                                	

                            <li>
                                <a href="./prov_remain_yuem_sum.php"><img src="image/icon/c_5.gif" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;ออกหนังสือติดตามเงินยืม</a>
                            </li>                            
                            <li>
                                <a href="./prov_report_classification_job.php"><img src="image/icon/download.png" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;ค้นหารายการเบิกจ่าย</a>
                            </li>


                        </ul>
                    </li>	
                    <li>
                        <a href="#">รายงานข้อมูล</a>
                        <ul>
                            <li>
                                <a href="./prov_report_sum.php"><img src="image/icon/block.png" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;สรุปภาพรวมทั้งจังหวัด</a>
                            </li>
                            <li>
                                <a href="#"><img src="image/icon/database.png" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;จำแนกตามสถานศึกษา&nbsp;&nbsp;&nbsp; <img src="image/25.gif" width="5" height="9" border="0" alt=""/></a>
                                <ul>
                                    <li>
                                        <a href="./prov_report_classification_amp.php"><img src="image/serverstatus.png" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;การตั้งเบิกทุกสถานะ</a>
                                    </li>
                                    <li>
                                        <a href="./prov_report_classification_amp_pay.php"><img src="image/serverstatus.png" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;เฉพาะที่เบิกจ่ายแล้ว-GF</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="./prov_report_classification.php"><img src="image/icon/blog.png" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;จำแนกตามการจัดสรร</a>
                            </li>
                            <li>
                                <a href="./prov_report.php"><img src="image/icon/blog.png" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;สถานะการเบิกจ่าย</a>
                            </li>                            
                            <li>
                                <a href="#"><img src="image/icon/blog-blue.png" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;% เบิกจ่าย รายอำเภอ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="image/25.gif" width="5" height="9" border="0" alt=""/></a>
                                <ul>
                                    <li>
                                        <a href="./prov_report_peramp12.php"><img src="image/serverstatus.png" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;เรียงจาก น้อย --> มาก</a>
                                    </li>
                                    <li>
                                        <a href="./prov_report_peramp21.php"><img src="image/serverstatus.png" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;เรียงจาก มาก --> น้อย</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="./prov_report_classification_work.php"><img src="image/icon/db-pencil.png" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;% เบิกจ่าย รายโครงการ</a>
                            </li>
                            <li>
                                <a href="./prov_report_saler.php"/><img src="image/icon/ico_cate_mobile.gif" width="16" height="16" border="0" alt="">&nbsp;&nbsp;สรุปยอดเบิกจ่าย-ร้านค้า</a>
                            </li>
                            <!-- เมนูรายการเงินยืม -->
                            <li>
                                <a href="#"><img src="image/icon/blog-blue.png" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;เงินยืม-เงินล้าง&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="image/25.gif" width="5" height="9" border="0" alt=""/></a>
                                <ul>
                                    <li>
                                        <a href="./prov_report_yuem_select.php"><img src="image/icon/icon-doc1.gif" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;สมุดคุมเงินยืม</a>
                                    </li>
                                    <li>
                                        <a href="./prov_report_num_yuem.php"><img src="image/serverstatus.png" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;รายการเงินยืม</a>
                                    </li>
                                    <li>
                                        <a href="./prov_remain_yuem_amp.php"><img src="image/serverstatus.png" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;สถานศึกษาที่ค้างส่งเงินยืม</a>
                                    </li>

                                </ul>
                            </li>                            

                            <!--end เมนูรายการเงินยืม -->



                            <li>
                                <a href="#"><img src="image/cart.png" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;รายงานค่าสาธารณูปโภค&nbsp;&nbsp;<img src="image/25.gif" width="5" height="9" border="0" alt=""/></a>
                                <ul>
                                    <li>
                                        <a href="./prov_report_selectst.php"><img src="image/icon/icon-doc2.gif" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;ทั้งจังหวัด:<font color="3300ff">สรุปรวม</font></a>
                                    </li>
                                    <li>
                                        <a href="./prov_report_selectm.php"><img src="image/icon/folder-open-doc-text.png" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp:<font color="3300ff">แยก</font></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="./prov_report_delete.php"><img src="image/icon/cross.png" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;ตรวจสอบ id ที่ลบ</a>
                            </li>

                        </ul>
                    </li>	
                    <li>
                        <a href="#">จัดการงบประมาณ</a>

                        <?php
                        if (($set_add == "1") or ( $user_ == "admin")) {
                            ?>
                            <ul>
                                <li>
                                    <a href="./year_set_code_money.php"><img src="image/cart.png" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;กำหนดรหัส/จำนวนเงิน</a>
                                </li>
                                <li>
                                    <a href="./year_code_work.php"><img src="image/icon/calendar-select-month.png" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;กำหนด งาน/โครงการ</a>
                                </li>
                                <li>
                                    <a href="#"><img src="image/icon/chart.png" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;การจัดสรรงบประมาณ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="image/25.gif" width="5" height="9" border="0" alt=""/></a>
                                    <ul>
                                        <li>
                                            <a href="year_budget_new.php"><img src="image/icon/drawer.png" width="16" height="16" border="0" alt=""/>&nbsp;งปม.ใหม่</a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="image/icon/icon-news2.gif" width="16" height="15" border="0" alt=""/>&nbsp;งปม.(รับเพิ่ม) &nbsp;<img src="image/25.gif" width="5" height="9" border="0" alt=""/></a>
                                            <ul>
                                                <li>
                                                    <a href="./year_budget_edit_edu.php"><img src="image/icon/chart.png" width="16" height="16" border="0" alt=""/>&nbsp;สถานศึกษา</a>
                                                </li>
                                                <li>
                                                    <a href="./year_budget_edit_work.php"><img src="image/icon/tables--arrow.png" width="16" height="16" border="0" alt=""/>&nbsp;งาน/โครงการ</a>
                                                </li>
                                            </ul>

                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="./year_budget_come.php"><img src="image/icon/download.png" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;บันทึกการรับโอนงบประมาณ</a>
                                </li>
                                <li>
                                    <a href="#"/><img src="image/icon/icon-cal-blue-1.png" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;สถานะการตั้งเบิก งปม.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="image/25.gif" width="5" height="9" border="0" alt=""/></a>
                                    <ul>
                                        <li>
                                            <a href="./year_budget_stop_all.php"/><img src="image/service-on.png" width="16" height="16" border="0" alt=""/>&nbsp;เปิด-การตั้งเบิก งปม. -&nbsp;<b><font color="000000">ทั้งหมด</font></b></a>
                                        </li>
                                        <li>
                                            <a href="./year_budget_run_all.php"/><img src="image/service-off.png" width="16" height="16" border="0" alt=""/>&nbsp; ปิด-การตั้งเบิก งปม.  -&nbsp;<b><font color="000000">ทั้งหมด</font></b></a>
                                        </li>
                                        <li>
                                            <a href="./year_budget_stop.php"/><img src="image/icon/block.png" width="16" height="16" border="0" alt=""/>&nbsp;การตั้งเบิก งปม. -&nbsp;<b><font color="000000">รายอำเภอ</font></b></a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="./prov_update_calc.php"><img src="image/icon/ico_cate_mobile.gif" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;Update-คำนวณ : การใช้จ่าย</a>
                                </li>
                                <li>
                                    <a href="./year_budget_delete.php"><img src="image/icon/trash.gif" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;ลบรายการจ่ายปีปัจจุบัน</a>
                                </li>
                            </ul>
                        <?php } ?>
                    </li>	
                    <li>
                        <a href="#">การตั้งค่าโปรแกรม</a>
                        <?php
                        if ($user_ == "admin") {
                            ?>
                            <ul>
                                <li>
                                    <a href="./prov_codename.php"><img src="image/add.png" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;กำหนดรหัส/ชื่อสถานศึกษา</a>
                                </li>
                                <li>
                                    <a href="./prov_person.php"><img src="image/admin.png" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;กำหนดสิทธิ์เจ้าหน้าที่จังหวัด</a>
                                </li>
                                <li>
                                    <a href="./year_budget_password.php"><img src="image/admin.png" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;กำหนดรหัสผ่านสถานศึกษา</a>
                                </li>
                                <li>
                                    <a href="./prov_director.php"><img src="image/admin.png" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;กำหนดสิทธิ์ผู้บริหารจังหวัด</a>
                                </li>
                                <li>
                                    <a href="./prov_position_add.php"><img src="images/user_empty.png" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;ตำแหน่งงาน</a>
                                </li>                                    
                                <li>
                                    <a href="./prov_yuem_person_add.php"><img src="image/icon/friends16.gif" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;ข้อมูลผู้ยืมเงิน-จังหวัด</a>
                                </li>

                                <li>
                                    <a href="./prov_yuem_ampher_add.php"><img src="image/icon/friends16.gif" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;แก้ไขสิทธิการยืมเงิน</a>
                                </li>
                                <li>
                                    <a href="./prov_sata_add.php"><img src="image/icon/building.png" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;ข้อมูลสาธารณูปโภค</a>
                                </li>
                                <li>
                                    <a href="./saler.php"><img src="image/icon/shop-icon.png" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;ข้อมูลผู้ขาย/ร้านค้า</a>
                                </li>
                                <li>  
                                    <a href="./prov_history_select.php"><img src="images/postauthoricon.png" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;Logs File</a>
                                </li> 
                            </ul>
                        <?php } else { ?>
                            <ul>																															
                                <li>   
                                    <a href="./prov_history_select.php"><img src="images/postauthoricon.png" width="16" height="16" border="0" alt=""/>&nbsp;&nbsp;Logs File</a>
                                </li> 																									  </ul>					
                        <?php } ?>
                    </li>

                    <li>
                        <a href="./logout.php">Exit</a>
                    </li>	
                </ul>

<!--                <font size="4" color="ffffcc">Login โดย :&nbsp;<?php echo $user_ ?></font>-->

            </div>
        </div>

        <div class="cleared reset-box"></div>
        <div class="rnut-layout-wrapper">
            <div class="rnut-content-layout">
                <div class="rnut-content-layout-row">
                    <div class="rnut-layout-cell rnut-sidebar1">
                        <div class="rnut-block clearfix">
                            <div class="rnut-blockheader">
                                <h2 class="t"><font size="4">มุมบริการ</font></h2>
                            </div>
                            <div class="rnut-postcontent">
                                <font size="2">: กศน.จังหวัด</font>
                                <ul class="rnut-vmenu">
                                    <li>    
                                        <font size="2"><a href="./prov_remain_yuem.php">ตรวจสอบ:ผู้ค้างเงินยืม</a></font>
                                    </li>                                                                                                                                                                                                                                                                                                        
                                    <li>
                                        <font size="2"><a href="./prov_yuem_person_show.php">ตรวจสอบ:สิทธิยืมเงิน</a></font>
                                    </li>
                                </ul>
                                <font size="2">: กศน.อำเภอ</font>                                                                                                                                                 
                                <ul class="rnut-vmenu">                                                                                                                                                    
                                    <li>
                                        <font size="2"><a href="./prov_remain_yuem_amp.php">ตรวจสอบ:ค้างเงินยืม</a></font>
                                    </li>	                                                                                                                                                                                                                                                                                                        
                                    <li>
                                        <font size="2"><a href="./prov_yuem_person_amp.php">ตรวจสอบ:สิทธิยืมเงิน</a></font>
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
                                    <h2 class="rnut-postheader">กระดานสนทนา / BG-Board</h2>
                                    <div class="rnut-postcontent">
                                        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td>
                                                    <iframe width="100%" height="430" src="webboard/webboard-admin.php" border="1" frameBorder=1 ></iframe>
                                                </td>
                                            </tr>
                                        </table>
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