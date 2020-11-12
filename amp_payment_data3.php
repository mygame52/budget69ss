<?php
session_start();
@ini_set("display_errors", "0"); //ใส่บรรทัดแรก
include("config.inc.php");
$j = 0;
if ($act != "ok") {
    exit();
}


require_once('config.inc.php');
if (!isset($bath_berg)) {
    $bath_berg = '0';
}
if (!isset($check_yuem)) {
    $check_yuem = '0';
}
if (!isset($bath_lua)) {
    $bath_lua = '0';
}

if (!isset($sav)) {
    $sav = " ";
}
if (!isset($bath_t)) {
    $bath_t = " ";
}
//if(!isset($aa1s)){$aa1s = 0; } 
//if(!isset($aa2s)){$aa2s = 0; } 


if ($sav != "savesave") {
    $item_ = $_REQUEST['item_'];
    $doc_ = $_REQUEST['doc_'];
    $yuem_money = isset($_REQUEST['yuem_money']);
    $sel3 = $_SESSION["jsel3"];
//	$sel3 = $_REQUEST['sel3'];
    $rand = $_REQUEST['rand'];
    $egp11 = $_REQUEST['egp11_'];
    $egp12 = $_REQUEST['egp12_'];
    $egp21 = $_REQUEST['egp21_'];
    $egp22 = $_REQUEST['egp22_'];
    $egp31 = $_REQUEST['egp31_'];
    $egp32 = $_REQUEST['egp32_'];
    $egp41 = $_REQUEST['egp41_'];
    $egp42 = $_REQUEST['egp42_'];
    $egp51 = $_REQUEST['egp51_'];
    $egp52 = $_REQUEST['egp52_'];
    $egp61 = $_REQUEST['egp61_'];
    $egp62 = $_REQUEST['egp62_'];
    $id_yuem2 = $_REQUEST['id_yuem2'];

    $check_add_del = 0;
    if ($aa3 == 0) {
        $check_add_del = 0;
    } else {
        $check_add_del = 1;
    }
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

        <script type="text/javascript">
        <!--
		

            function addCommas(nStr)
            {
                nStr += '';
                x = nStr.split('.');
                x1 = x[0];
                x2 = x.length > 1 ? '.' + x[1] : '';
                var rgx = /(\d+)(\d{3})/;
                while (rgx.test(x1))
                {
                    x1 = x1.replace(rgx, '$1' + ',' + '$2');
                }
                document.getElementById('bath_t').value = x1 + x2;
            }

            function addComma_berg(nStr)
            {
                nStr += '';
                x = nStr.split('.');
                x1 = x[0];
                x2 = x.length > 1 ? '.' + x[1] : '';
                var rgx = /(\d+)(\d{3})/;
                while (rgx.test(x1))
                {
                    x1 = x1.replace(rgx, '$1' + ',' + '$2');
                }
                document.getElementById('bath_berg').value = x1 + x2;
            }

            function addCommas_cal(nStr)
            {
                nStr += '';
                x = nStr.split('.');
                x1 = x[0];
                x2 = x.length > 1 ? '.' + x[1] : '';
                var rgx = /(\d+)(\d{3})/;
                while (rgx.test(x1)) {
                    x1 = x1.replace(rgx, '$1' + ',' + '$2');
                }
                document.getElementById('bath_use').value = x1 + x2;
            }


            function chk_cal() {
                var a1 = parseFloat(document.form1.aa1.value);
                var a2 = parseFloat(document.form1.aa2.value);

                if (a2 > a1)
                {
                    alert("เงินล้างมากกว่าเงินยืมไม่ได้");
                    return(false);
                }
                document.form1.aa3.value = a1 - a2;

                if (a2 < a1)
                {
                    return(true);
                }
            }

            //-->
        </script>

    </head>
    <body>
        <?php include 'include/header.inc.php'; ?>
        <div align="center">
        <div class="cleared reset-box"></div>
        <div class="rnut-bar rnut-nav">
            <div class="rnut-nav-outer">
                <ul class="rnut-hmenu">
                    <li>
                        <a href="./amp_payment" class="active">Back</a>
                    </li>	
                    <li><font size="3" color="#FFCCCC">
                            <?php
                            echo "หน่วยงาน   : " . $sele_amp;
                            echo " : " . $full_name;
                            ?></font>
                    </li>
                </ul>
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
                                    <h2 class="rnut-postheader" style="text-align: center;">สถานศึกษาล้างเงินยืม</h2>
                                    <!-- <div class="rnut-postcontent">
                                                                    <p style="text-align: center;">test1</p>
                                                                    <p style="text-align: center;">test2</p>
                                            </div> -->
                                    <!-- start การแก้ไขข้อมูล -->
                                    <div align="center">

                                        <?php
                                        if ($bath_berg == "" or $item_ == "" or $egp11 == "" or $egp12 == "") {

                                            echo "<br><hr><h3> Error : กรุณากรอกข้อมูลให้ครบถ้วน ถูกต้อง : <br>";
                                            echo "ข้อมูลที่อาจมีปัญหา คือ<br>";
                                            echo "<ol>";
                                            echo "<li>รายการจ่าย </li>";
                                            echo "<li>จำนวนเงิน </li>";
                                            echo "<li>เลขที่เอกสาร</li>";
                                            echo "</ol>";
                                            echo " <hr>";
                                            echo "ในช่อง e-GP ให้ใส่<br>";
                                            echo "&nbsp;&nbsp;&nbsp;&nbsp;: เลขโครงการและเลขสัญญา  จาก e-GP<br>";
                                            echo "<font color='#ff0000'>&nbsp;&nbsp;&nbsp;&nbsp;: หากไม่มีให้ใส่ '-' ในช่องเลขที่โครงการ1 และ ช่องเลขสัญญา1 </font></h3><br>";
                                            echo"<div align='center'><A HREF='./amp_yuem_person_clear_list'> กลับ </A></div>";
                                            exit();
                                        }
                                        ?>

                                        <div align="center">
                                            <center>
                                                <?php
                                                if (!isset($bath_t)) {
                                                    $bath_t = $aa3;
                                                } else {
                                                    $bath_t = $_REQUEST['aa3'];
                                                }
                                                $id_item_update = $_REQUEST['id_item_update'];


                                                if (!isset($bath1)) {
                                                    $bath1 = " ";
                                                }
                                                for ($i = 0; $i < strlen($bath); $i++) {
                                                    $b = substr($bath, $i, 1);
                                                    if (ord($b) == 44) {
                                                        
                                                    } else {
                                                        $bath1 = $b;
                                                    }
                                                }
                                                settype($bath1, "double");
                                                ?>
                                                <br>


                                                    <!--  คำนวณเงินคงเหลือ -->

                                                    <?php
                                                    if ($cmoney == 1) {    // ถ้ายืมเงิน
                                                        session_register('$bath_yuem'); // เงินยืม
                                                        session_register('$bath_berg'); // เงินที่ใช้จริง
                                                        $bath_rnut = $bath1 - $bath_berg;  // $bath_rnut = เงินที่ยืม  - เงินที่ใช้จริง
                                                        $remain = $M_rab + $M_rab2 + $M_rab3 + $M_rab4 - $M_rua + ($bath - $aa2);
                                                    } else {
                                                        session_register('$bath_yuem'); // เงินยืม
                                                        session_register('$bath_berg'); // เงินที่ใช้จริง
                                                        $bath_rnut = $bath1 - $bath_berg;  // $bath_rnut = เงินที่ยืม  - เงินที่ใช้จริง
                                                        $remain = $M_rab + $M_rab2 + $M_rab3 + $M_rab4 - $M_rua - $bath_berg;
                                                    }
                                                    ?>
                                                    <FORM METHOD="POST" ACTION="?sav=savesave">
                                                        <TABLE width="75%" border="0" align="center" cellpadding="10" cellspacing="0">
                                                            <TR><td colspan="3">
                                                                    <!--	<INPUT TYPE="hidden" NAME="sel" value="<?php echo $sele_amp ?>">-->
                                                                    <INPUT TYPE="hidden" NAME="sel3" value="<?php echo $_SESSION["jsel3"]; ?>"/>	
                                                                    <INPUT TYPE="hidden" NAME="doc_" value="<?php echo $doc_; ?>"/>
                                                                    <INPUT TYPE="hidden" NAME="bath" value="<?php echo $bath; ?> "/>
                                                                    <INPUT TYPE="hidden" NAME="bath1" value="<?php echo $bath1; ?> "/>
                                                                    <INPUT TYPE="hidden" NAME="bath_t" value="<?php echo $bath_t; ?> "/> 
                                                                    <INPUT TYPE="hidden" NAME="bath_berg" value="<?php echo $bath_berg; ?> "/>
                                                                    <INPUT TYPE="hidden" NAME="bath_use" value="<?php echo $bath_use; ?> "/>
                                                                    <INPUT TYPE="hidden" NAME="aa2" value="<?php echo $aa2; ?> "/>

                                                                    <INPUT TYPE="hidden" NAME="item_" value="<?php echo $item_; ?> "/>
                                                                    <INPUT TYPE="hidden" NAME="egp11" value="<?php echo $egp11; ?> "/>
                                                                    <INPUT TYPE="hidden" NAME="egp12" value="<?php echo $egp12; ?> "/>
                                                                    <INPUT TYPE="hidden" NAME="egp21" value="<?php echo $egp21; ?> "/>
                                                                    <INPUT TYPE="hidden" NAME="egp22" value="<?php echo $egp22; ?> "/>
                                                                    <INPUT TYPE="hidden" NAME="egp31" value="<?php echo $egp31; ?> "/>
                                                                    <INPUT TYPE="hidden" NAME="egp32" value="<?php echo $egp32; ?> "/>
                                                                    <INPUT TYPE="hidden" NAME="egp41" value="<?php echo $egp41; ?> "/>
                                                                    <INPUT TYPE="hidden" NAME="egp42" value="<?php echo $egp42; ?> "/>
                                                                    <INPUT TYPE="hidden" NAME="egp51" value="<?php echo $egp51; ?> "/>
                                                                    <INPUT TYPE="hidden" NAME="egp52" value="<?php echo $egp52; ?> "/>
                                                                    <INPUT TYPE="hidden" NAME="egp61" value="<?php echo $egp61; ?> "/>
                                                                    <INPUT TYPE="hidden" NAME="egp62" value="<?php echo $egp62; ?> "/>
                                                                    <INPUT TYPE="hidden" NAME="remain" value="<?php echo $remain; ?> "/>


                                                                    <INPUT TYPE="hidden" NAME="id_item_update" value="<?php echo $id_item_update; ?>"/>
                                                                    <INPUT TYPE="hidden" NAME="yuem_money" value="<?php echo $yuem_money; ?>"/>
                                                                    <div align="center">
                                                                        <?php
                                                                        if ($sav != "savesave") {
                                                                            echo "<INPUT TYPE='submit' value='< บันทึกข้อมูล >'>";
                                                                            echo "</TD></TR></TABLE>";
                                                                            echo "</FORM>";
                                                                        } else {
                                                                            echo"< บันทึกข้อมูลแล้ว >";
                                                                            echo "</TD></TR></TABLE>";
                                                                            echo "</FORM>";
                                                                            //////////////// ช่วงบันทึกข้อมูล ใน {  ของ else

                                                                            include("amp_payment_save.php");
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table> 
                                                        </table>
                                                        </center>
                                                        </div>
                                                        </div>
                                                        <!-- end การแก้ไขข้อมูล -->
                                                        </div>
                                                        <?php include("./include/footer.inc"); ?>
                                                        </body>
                                                        </html>