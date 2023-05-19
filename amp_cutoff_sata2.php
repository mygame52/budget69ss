<?php
session_start();
@ini_set("display_errors", "0"); //ใส่บรรทัดแรก
include("config.inc.php");
if ($act != "ok") {
    echo "	<SCRIPT language='JavaScript'>";
    echo "			alert('ท่านเข้าสู่ระบบไม่ถูกต้อง')";
    echo"			location.href='index.php'";
    echo"	</SCRIPT>";
    exit();
}
session_unregister('M_rab');
session_unregister('M_rab2');
session_unregister('M_rab3');
session_unregister('M_rab4');
session_unregister('M_rua');
session_unregister('cmoney');
session_unregister('check_yuem');
session_unregister('aa3');


//session_unregister('yuem_money');
require_once('config.inc.php');
$cmoney = '';

$jsel3 = $_REQUEST['sel3'];
session_register('sel3', 'work');

$cmoney = isset($_REQUEST['cmoney']);
//$cmoneyid_ = $_REQUEST['cmoneyid']; 

$sel_pub44 = $_REQUEST['sel_pub33'];  // ส่งข้อมูลรายการค่า สาธาฯ
$sel_month44 = $_REQUEST['sel_month33'];  // ส่งข้อมูลรายการค่า สาธาฯ	

$text_save = "สาธาฯ : " . $sel_pub44 . " : " . $sel_month44 . " : ";

mysql_select_db($dbname, $objConnect);
$rand = rand();
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

        <!-- start script  -->
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
            }

            //-->
        </script>

        <!-- end script  -->
    </head>
    <body onload='document.form1.doc_.focus()'>
        <?php include 'include/header.inc.php'; ?>
        <div class="cleared reset-box"></div>
        <div class="rnut-bar rnut-nav">
            <div class="rnut-nav-outer">
                <ul class="rnut-hmenu">
                    <li>
                        <a href="./amp_cutoff_sata.php" class="active">Back</a>
                    </li>	
                    <li><font size="3" color="#ffcccc">
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

                                    <h2 class="rnut-postheader" style="text-align: center;">การตั้งเบิกค่าสาธารณูปโภค<FONT COLOR="#FF0000"> :  <?php echo $sel_pub44; ?> : <?php echo $sel_month44; ?></FONT></h2>				

                                    <br>
                                        <!-- start การแก้ไขข้อมูล -->
                                        <div align="center">
                                            <?php
                                            if ($act <> "ok") {
//									  echo $hid8;
                                                echo "<h3> ERROR : --- ไม่ถูกต้อง ---  </h3>";
                                                exit();
                                            }
                                            Session_register("sele_amp");
                                            ?>
                                            <form name="form1" method="post" action="amp_cutoff_sata_save2.php?rand=<?= $rand ?>">
                                                <table width="70%" border="0" align="center" cellpadding="1" cellspacing="2">
                                                    <tr>
                                                        <td width="42%" scope="col">
                                                            <div align="right"><font size="3" color="">หน่วยงานขอเบิก</font> </div>
                                                        </td>
                                                        <td width="58%" scope="col">
                                                            <div align="left"><font size="3" color="000099">
                                                                    <?php
                                                                    echo $sele_amp . "  :  ";
                                                                    echo "" . $full_name;  //ชื่อ ศสกร.อำเภอ
                                                                    ?></font>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><div align="right"><font size="3" color="">รหัสงาน/โครงการ</font></div></td>
                                                        <td><font size="3" color="000099">
                                                                <?php
                                                                include("help_yod4.php");
                                                                echo "     " . $cod_work;
                                                                echo " =>   " . $work;
                                                                ?></font>
                                                        </td>
                                                    </tr>


                                                    <tr>
                                                        <td><div align="right"><font size="3" color=""><font size="3" color="">จำนวนเงินจัดสรร</font></font></div></td>
                                                        <td><div align="left"> <font size="3" color="0033cc">
                                                                    <?php
                                                                    $trab = $M_rab + $M_rab2 + $M_rab3 + $M_rab4;
                                                                    echo number_format($trab, 2), "  บาท ";
                                                                    ?> </font>
                                                            </div></td>
                                                    </tr>
                                                    <tr>
                                                        <td><div align="right"><font size="3" color=""><font size="3" color="">จำนวนเงินคงเหลือ</font></font></div></td>
                                                        <td><div align="left"><font size="3" color="0033cc">
                                                                    <?php
                                                                    $M_ = $trab - $M_rua;
                                                                    echo number_format($M_, 2), "  บาท";
                                                                    ?></font>
                                                            </div></td>
                                                    </tr>						
                                                    <tr>
                                                        <td><div align="right"><font size="3" color="">เลขที่เอกสาร</font> </div></td>
                                                        <td><div align="left">
                                                                <input type="text" value='<?php echo $doc; ?>' size = "40" name="doc_" id="doc_" style="font: 12pt tahoma; color: #000066;background: #C0F9BD; border: 1px black solid" >
                                                            </div></td>
                                                    </tr>
                                                    <tr>
                                                        <td><div align="right"><font size="3" color="">จ่ายค่า</font> </div></td>
                                                        <td><div align="left">
                                                                <input type="text" value='<?php echo $text_save; ?>' size = "40" name="text_save" id="doc_" style="font: 12pt tahoma; color: #0033ff;background: #ff99ff; border: 1px black solid" readonly >
                                                            </div></td>
                                                    </tr>
                                                    <tr>
                                                        <td><div align="right"><font size="3" color=""><font size="3" color="">ของหน่วยงาน (ระบุ สถานที่)</font></font></div></td>
                                                        <td><div align="left">
                                                                <?php
                                                                if (isset($cname_item) != "") {
                                                                    $item_ = $cname_item;
                                                                    echo $item_p;
                                                                    echo "<INPUT TYPE='hidden' NAME='item_p' value='$cname_item'>";
                                                                    echo "</td></td></tr>";
                                                                } else {
                                                                    echo "<input type='text' name='item_p' size= '50' style='font: 12pt tahoma; color: #990066;background: #C0F9BD; border: 1px black solid'>";
                                                                    echo "</td></td></tr>";
                                                                }

                                                                echo "<INPUT TYPE='hidden' NAME='sel3' value ='$sel3'>";
                                                                //------------- ตรวจสอบการยืมเงิน  ------------------------
                                                                if ($cmoney == "check") {
                                                                    // ---------------------ถ้ายืมเงิน --> ล้างเงินยืม
                                                                    echo "<tr>";
                                                                    echo "<td><div align='right'>";
                                                                    echo "เงินยืม";
                                                                    echo "</div></td>";
                                                                    echo "<td>";
                                                                    //			  echo "<input type='text' name='bath' value='$bath' onKeyUp='chk_cal(this.value)' readonly='readonly'>&nbsp;&nbsp;บาท ";
                                                                    echo "<input type='text' name='aa1' value='$bath' onKeyUp='chk_cal(this.value)' readonly='readonly'>&nbsp;&nbsp;บาท ";

                                                                    echo "</td></tr>";

                                                                    echo "<tr><td><div align='right'>";
                                                                    echo "ใช้จริง </div> </td><td>";
                                                                    //			  echo "<input type='text' name='bath_use' onKeyUp='chk_cal(this.value)'>&nbsp; บาท ";
                                                                    echo "<input type='text' name='aa2' id='aa2' onKeyUp='chk_cal(this.value)'>&nbsp; บาท ";
                                                                    echo "<br></td></tr>";
                                                                    echo "<tr>";
                                                                    echo "<td><div align='right'> เงินคืน </div></td>";
                                                                    echo "<td>";
                                                                    //			  echo "<input type='text' name='bath_t' onKeyUp='chk_cal(this.value)' readonly='readonly'>&nbsp;&nbsp; บาท";
                                                                    echo "<input type='text' name='aa3' onKeyUp='chk_cal(this.value)' readonly='readonly'>&nbsp;&nbsp; บาท";
                                                                    echo "</div></td>";
                                                                    echo "</tr>";
                                                                } else {    // ---------------------ถ้าไม่ได้ยืม (ตั้งเบิกปกติ) 
                                                                    ?>

                                                                    <tr>
                                                                        <td><div align='right'>
                                                                                <font size='3' color=''>จำนวนเงิน</font>
                                                                            </div>
                                                                            <div align='left'>
                                                                                <td>
                                                                                    <table cellpadding="0" border="0" cellspacing="0">
                                                                                        <tr>
                                                                                            <td>
                                                                                                <input type="text" name="bath_berg" onKeyup="JavaScript:return isNumeric(this, 'กรุณาป้อน เป็นตัวเลขครับ')"; style="font: 12pt tahoma; color: #ff0000;background: #C0F9BD; border: 1px black solid" />
                                                                                            </td>
                                                                                            <td>
                                                                                                &nbsp;&nbsp;<font size="3" color="">บาท</font>  <br/>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </td>
                                                                            </div>
                                                                        </td>
                                                                    </tr>



                                                                <?php } ?>                                                        
                                                                <tr>
                                                                    <td colspan="2"><div align="center">
                                                                            <INPUT TYPE="hidden" NAME="trab" value="<?= $trab ?>"><!-- จัดสรร -->
                                                                                <INPUT TYPE="hidden" NAME="M_" value="<?= $M_ ?>"><!-- เหลือ -->
                                                                                    <INPUT TYPE="hidden" NAME="cmoney" value="<?= session_register('cmoney'); ?>"><!-- เหลือ			-->
                                                                                        <INPUT TYPE="hidden" NAME="id_item_update" value="<?= $id_item_update ?>">
                                                                                            <INPUT TYPE="hidden" NAME="bath_use" value="<?= $bath_use ?>">
                                                                                                <INPUT TYPE="hidden" NAME="bath" value="<?= $bath ?>">
                                                                                                    <INPUT TYPE="hidden" NAME="text_save" value="<?= $text_save ?>">									

                                                                                                        <input type="submit" name="Submit" value=" ตกลง ">
                                                                                                            </DIV>
                                                                                                            </td>
                                                                                                            </tr>
                                                                                                            </tr>
                                                                                                            </table>
                                                                                                            </form>
                                                                                                            </div>
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
