<?php
session_start();
@ini_set("display_errors", "0"); //ใส่บรรทัดแรก
include("config.inc.php");
$num_rows = 0;
$user_ = "บุคคลทั่วไป";

$idd_ = $_REQUEST['idd'];

//echo "-----------".$idd_;

if ($idd_ == " ") {
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=./person_checkid.php\" />";
}
$i3d = trim($idd);
//echo "ค่าไอสามดี".$i3d;
$sql = ("select * from item where id_item = '$i3d' ");
$result = mysql_query($sql);
$row_reg = mysql_fetch_assoc($result);
$num_rows = mysql_num_rows($result); //จำนวนที่เลือกได้

if ($num_rows >= 1) {
    $idd = $row_reg['id_item'];
    $i3d = $idd;
    $amp = $row_reg['amp_item'];
    $doc = $row_reg['doc'];
    $c_khong = $row_reg['c_khong'];
    $item = $row_reg['item'];
    $bath = $row_reg['bath'];
    $staus = $row_reg['staus'];
    $datepay2 = $row_reg['date_pay'];
    $egp11 = $row_reg['egp11'];
    $egp12 = $row_reg['egp12'];
    $egp21 = $row_reg['egp21'];
    $egp22 = $row_reg['egp22'];
    $egp31 = $row_reg['egp31'];
    $egp32 = $row_reg['egp32'];
    $egp41 = $row_reg['egp41'];
    $egp42 = $row_reg['egp42'];
    $egp51 = $row_reg['egp51'];
    $egp52 = $row_reg['egp52'];
    $egp61 = $row_reg['egp61'];
    $egp62 = $row_reg['egp62'];
    $chk_id = $row_reg['chk_id'];
    $id_yuem_update2 = $row_reg['id_yuem'];
    $dateInput = $row_reg['note_item'];

    session_register("c_khong");
    session_register("id_yuem_update2");
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
                            <a href="./person_checkid.php" class="active">Back</a>
                        </li>		
                    </ul><font size="1" color="ffffff">Login โดย :&nbsp;<?php echo $user_ ?></font>
                </div>
            </div>
            <div class="cleared reset-box"></div>
            <div class="rnut-layout-wrapper">
                <div class="rnut-content-layout">
                    <div class="rnut-content-layout-row">
                        <div class="rnut-layout-cell rnut-content">
                            <div class="rnut-box rnut-post">
                                <div class="rnut-box-body rnut-post-body">
                                    <div class="rnut-post-inner rnut-article" >
                                        <h2 class="rnut-postheader" style="text-align: center;">การทำรายการ</h2>

                                        <!-- start การแก้ไขข้อมูล -->
										<div align="center">
                                        <table width="80%" border="2" cellspacing="10" cellpadding="10" align="center" bordercolor="#000000">

                                            <tr bgcolor="#e69b64">
                                                <td width="10%" bgcolor="#e69b64"><div align="right">&nbsp;
                                                        <font size="3" color="#000000">รหัส ID</font>&nbsp;</div></td>
                                                <td width="15%"  bgcolor="#ffccbb">&nbsp;<font size="3" color="#0033cc">
                                                        <?php echo $idd; ?></font></td>
                                                <td width="10%"><div align="right">&nbsp;
                                                        <font size="3" color="#000000">สถานศึกษา</font>&nbsp;&nbsp;</div></td>
                                                <td width="15%" bgcolor="#ffccbb"><font size="3" color="#0033cc">
                                                        <?php
                                                        echo "&nbsp;" . $amp;
                                                        include("amp.inc.php");
                                                        ?></font></td>
                                            </tr>
                                            <tr>
                                                <td width="10%" bgcolor="#00eeff"><div align="right">&nbsp;<font size="3" color="#990000">เลขที่เอกสาร</font>&nbsp;&nbsp;</div></td>
                                                <td width="20%" bgcolor="#aaeeff">&nbsp;<font size="3" color="#0033cc"><?php echo $doc; ?></font></td>
                                                <td width="10%"  bgcolor="#00eeff"><div align="right">&nbsp;<font size="3" color="#990000">รหัสงาน/โครงการ</font>&nbsp;&nbsp;</div></td>
                                                <td width="20%"  bgcolor="#aaeeff">&nbsp;<font size="3" color="#0033cc">

                                                        <?php include("work.inc.php"); ?>
                                                </td>
                                            </tr>
                                            <tr bgcolor="#e0a9e7">
                                                <td><div align="right">&nbsp;<font size="3" color="#990000">รายการจ่าย</font>&nbsp;&nbsp;</div></td>
                                                <td colspan="3" bgcolor="#fbeefb"><font size="3" color="#0033cc">
                                                        <?php
                                                        //echo (substr($item,0,36));
                                                        if (($chk_id == "1") or ( substr($item, 0, 24) == "เงินยืม :-")) {
                                                            echo $item . "<br>";
                                                            // ------------ ดึงข้อมูล ผู้ยืมเงิน
                                                            $psqls = "SELECT * FROM person_yuem where id_yuem =$id_yuem_update2";
                                                            $dbquerys = mysql_db_query($dbname, $psqls);
                                                            $num_rowss = mysql_num_rows($dbquerys);
                                                            while ($results = mysql_fetch_array($dbquerys)) {
                                                                $citizenid_ = $results[citizenid];
                                                                $person_ = $results[person];
                                                                echo "<font color='ff3300'>ผู้ยืม :  " . $citizenid_ . " : " . $person_ . "</font>";
                                                            }
                                                        } else {
                                                            if ((substr($item, 0, 36) == "ล้างเงินยืม :-")) {
                                                                $mess = explode("-", $item);
                                                                echo $mess[0] . " ID " . $mess[1] . "<br>";
                                                                echo "เลขหนังสือ : " . $mess[2] . "<br>";
                                                                echo $mess[3] . $mess[4] . "<br>";
                                                            } else {
                                                                echo $item;
                                                            }
                                                        }
                                                        ?>				  </td>
                                            </tr>
                                            <?php
                                            $id_yueam_ = explode("-", $item);
                                            $id_yueam2 = $id_yueam_[1];
                                            // เริ่มการค้นหาข้อมูลจำนวนเงินเดิมที่เคยยืมไว
                                            {
                                                $sqlb = ("select * from  item where id_item = '$id_yueam2'");
                                                $resultb = mysql_query($sqlb);
                                                $num_rowsb = mysql_num_rows($resultb);
                                                if ($num_rowsb = 1) {
                                                    $fetch_recb = mysql_fetch_array($resultb);
                                                    $id_person_ = $fetch_recb['id_yuem'];
                                                }
                                            }
                                            ?>
                                            <tr bgcolor="#fcf3d8">
                                                <td bgcolor="#fbe3b3"><div align="right">&nbsp;<font size="3" color="#990000">จำนวนเงิน</font>&nbsp;&nbsp;</div></td>
                                                <td>&nbsp;<font size="3" color="#0033cc"><?php echo number_format($row_reg['bath'], 2); ?>&nbsp;&nbsp;บาท</font></td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td colspan=4>
                                                    <fieldset>    <legend>Link-โครงการ e-GP</legend>
                                                        <table border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#ccffff" width="100%">
                                                            <tr>
                                                                <td width="132"><div align="center" class="style1" ></div></td>
                                                                <td width="90"><div align="center" class="style1">โครงการ 1 </div></td>
                                                                <td width="90"><div align="center" class="style1">โครงการ 2 </div></td>
                                                                <td width="90"><div align="center" class="style1">โครงการ 3 </div></td>
                                                                <td width="90"><div align="center" class="style1">โครงการ 4 </div></td>
                                                                <td width="90"><div align="center" class="style1">โครงการ 5 </div></td>
                                                                <td width="90"><div align="center" class="style1">โครงการ 6 </div></td>
                                                            </tr>
                                                            <tr>
                                                                <td><div align="right">เลขโครงการ : </div></td>
                                                                <td><div align="center">      <?php echo $egp11 ?>    </div></td>
                                                                <td><div align="center">      <?php echo $egp21 ?>    </div></td>
                                                                <td><div align="center">      <?php echo $egp31 ?>    </div></td>
                                                                <td><div align="center">      <?php echo $egp41 ?>    </div></td>
                                                                <td><div align="center">      <?php echo $egp51 ?>    </div></td>
                                                                <td><div align="center">      <?php echo $egp61 ?>    </div></td>
                                                            </tr>
                                                            <tr>
                                                                <td><div align="right">เลขที่สัญญา : </div></td>
                                                                <td><div align="center">      <?php echo $egp12 ?>    </div></td>
                                                                <td><div align="center">      <?php echo $egp22 ?>    </div></td>
                                                                <td><div align="center">      <?php echo $egp32 ?>    </div></td>
                                                                <td><div align="center">      <?php echo $egp42 ?>    </div></td>
                                                                <td><div align="center">      <?php echo $egp52 ?>    </div></td>
                                                                <td><div align="center">      <?php echo $egp62 ?>    </div></td>
                                                            </tr>
                                                        </table>
                                                    </fieldset>							</td>
                                            </tr>

                                            <tr bgcolor="#ccffcc"><!-- แถวเลือกสถานะ -->
                                                <td colspan="4"><tr>
                                                        <td bgcolor="#66ff66"><div align="right">&nbsp;<font size="3" color="#000000" >สถานะปัจจุบัน :&nbsp;</font></div><td>
                                                                <?php
                                                                if ($row_reg['staus'] == 0) {
                                                                    $sta_ = " สถานศึกษา ขอเบิก";
                                                                } elseif ($staus == 1) {
                                                                    $sta_ = "ตรวจสอบหลักฐานแล้ว";
                                                                } elseif ($staus == 2) {
                                                                    $sta_ = "ตัดยอดงบประมาณแล้ว";
                                                                } elseif ($staus == 3) {
                                                                    $sta_ = "ทำระบบ PO แล้ว";
                                                                } elseif ($staus == 4) {
                                                                    $sta_ = "เบิกจ่ายแล้ว : [" . $dateInput . "]";
                                                                } elseif ($staus == 5) {
                                                                    $sta_ = "เอกสารผิดพลาด";
                                                                }
                                                                echo "<div align='center'>&nbsp;<FONT SIZE='3' COLOR='#ff0066'>$sta_</FONT></div>";
                                                                echo "</td><td  bgcolor='#66ff66'><div align='right' width='30%'><font size='3'color='#000000'>ทำรายการเมื่อ :&nbsp;</font></td><td>&nbsp;&nbsp;&nbsp;&nbsp;<FONT SIZE='' COLOR='#FF3300'>$datepay2&nbsp;&nbsp;น.</FONT></div>";
                                                                session_register('id_person_');
                                                                ?>		</td></tr>

                                                    <?php if (($staus == 4) and ( $user_ == "admin")) { ?>
                                                        <tr>
                                                            <td colspan="4" width="100%">
                                                                <table width="100%" border="2" cellpadding="10" cellspacing="2" bordercolor="#FF0000">
                                                                    <tr>																				<td bgcolor="#FF9900" width="10%"><div align="right">
                                                                                <font size="3" color="#000000">เลือกสถานะ</font></div>
                                                                        </td>
                                                                        <td bgcolor="#d7ffb3" width="30%">
                                                                            <font size="3" color="#ff0000">
                                                                                <input type="radio" name="sta"value="1">ตรวจสอบหลักฐานแล้ว->งานฯ</input>  
                                                                            </font>
                                                                        </td>
                                                                        <td  bgcolor="#d7ffb3" width="30%">
                                                                            <font size="3" color="#ff0000">                                                <input type="radio" name="sta" value="2">ตัดยอดงบประมาณแล้ว->งานแผนฯ</input> 
                                                                            </font>
                                                                        </td>
                                                                        <td bgcolor="#d7ffb3" width="30%">
                                                                            <font size="3" color="#ff0000">
                                                                                <input type="radio" name="sta" value="3">ทำ PO แล้ว -> งานพัสดุ</input>
                                                                            </font>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td> 
                                                        </tr>
                                                        <tr><td colspan="4" width="100%">
                                                                <table width="100%" border="2" cellpadding="10" cellspacing="2" bordercolor="#FF0000">
                                                                    <tr>
                                                                        <td width="20%">
                                                                            <font size="3" color="#FF0000"><input type="radio" name="sta" value="4">เบิกจ่ายแล้ว -> งานการเงิน</input></font> 
                                                                            <!-- บันทึกวันที่ ที่ดำเนินการเบิกจ่าย -->
                                                                        </td>
                                                                        <td width="15%">
                                                                            <font size="3" color="#0000cc">จ่ายโดย <input type="radio" name="payby"value="1" default> โอนเงิน</input></font><br>
                                                                                <font size="3" color="#0000cc">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="payby"value="2"> เช็ค</input></font></td>
                                                                        <td width="15%" align="center"><div align="center">
                                                                                <font size="3" color="#ff0000">&nbsp; :  เมื่อวันที่ </font><input type="text" name="dateInput" id="dateInput" style="font: 10pt tahoma; color: #ff0000;background: #eff48a; border: 1px black solid" align="center" /></div>
                                                                        </td>
                                                                        <td width="20%">
                                                                            <!-- สิ้นสุดบันทึกวันที่ ที่ดำเนินการเบิกจ่าย -->				
                                                                            <input type="radio" name="sta" value="5"><font size="3" color="#FF0000">เอกสารผิดพลาด&nbsp;&nbsp;&nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp;	<A HREF="e_rror1.php?i_del=<?= $idd ?>"target='_blank'>บันทึก Comment</A></font>
                                                                                <INPUT TYPE="hidden" name="idd" value=<?= $idd ?>>					
                                                                                    </td>
                                                                                    </tr>
                                                                                    </table>
                                                                                    </td>
                                                                                    </tr>

                                                                                <?php } ?>


                                                                                <?php if (($staus == 4) and ( $user_ != "admin")) { ?>
                                                                                    <td style="text-align:center">
                                                                                        <img src="images/arare.gif" width="100" height="120" border="0" alt="">
                                                                                    </td>
                                                                                    <td align="center" colspan="3"><br><br>
                                                                                                <font size="4" color="#ff0000">รายการนี้ ทำการเบิกจ่ายเรียบร้อยแล้วจ้า..</font><br><br>
                                                                                                        <font size="2" color="#b1b1b1"> หากจะแก้ไข ติดต่อ Admin.</font>	
                                                                                                        </td>

                                                                                                    <?php } ?>
                                                                                                    </tr>                                                                                                                                
                                                                                                    </table>

                                                                                                    <?php
                                                                                                } else {
                                                                                                    echo "<meta http-equiv=\"refresh\" content=\"0;URL=./person_checkid.php\" />";
                                                                                                }
                                                                                                ?>


</div>
                                                                                                <!-- end การแก้ไขข้อมูล -->
                                                                                                <?php include("./include/footer.inc"); ?>
                                                                                                </body>
                                                                                                </html>