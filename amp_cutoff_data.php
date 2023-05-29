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
    <body onload='document.form1.item_.focus()'>
        <?php include 'include/header.inc.php'; ?>
        <div class="cleared reset-box"></div>
        <div class="rnut-bar rnut-nav">
            <div class="rnut-nav-outer">
                <ul class="rnut-hmenu">
                    <li>
                        <a href="./menu_amp.php" class="active">Back</a>
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
                                    <h2 class="rnut-postheader" style="text-align: center;">บันทึกการใช้จ่ายงบประมาณ</h2>
                                    <br>
                                        <!-- start การแก้ไขข้อมูล -->
                                        <?php
                                        if ($act <> "ok") {
//									  echo $hid8;
                                            echo "<h3> ERROR : --- ไม่ถูกต้อง ---  </h3>";
                                            exit();
                                        }
                                        Session_register("sele_amp");
                                        ?>
                                        <div align="center">
                                            <form name="form1" method="post" action="amp_cutoff_data2.php?rand=<?= $rand ?>">
                                                <table width="70%" border="0" align="center" cellpadding="1" cellspacing="2">
                                                    <tr bgcolor="#ff77dd">
                                                        <td width="30%" scope="col">
                                                            <div align="right"><font size="3" color="">หน่วยงานขอเบิก</font> </div>
                                                        </td>
                                                        <td width="58%" scope="col">
                                                            <div align="left"><font size="3" color="000099">
                                                                    <?php
                                                                    echo $sele_amp . "  :  ";
                                                                    echo "" . $full_name;  //ชื่อ สกร.อำเภอ
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
                                                                echo " :   " . $work;
                                                                ?>
                                                            </font>
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
                                                        <td><div align="right"><font size="3" color=""><font size="3" color="">รายการจ่าย</font></font></div></td>
                                                        <td><div align="left">
                                                                <?php
                                                                if (isset($cname_item) != "") {
                                                                    $item_ = $cname_item;
                                                                    echo $item_;
                                                                    echo "<INPUT TYPE='hidden' NAME='item_' value='$cname_item'>";
                                                                    echo "</td></td></tr>";
                                                                } else {
                                                                    echo "<input type='text' name='item_' size= '50' style='font: 12pt tahoma; color: #ff0000;background: #C0F9BD; border: 1px black solid' >";
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
                                                                                    <table>
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
                                                                    <td><div align="right"><font size="3" color="">ผู้ขาย-ร้านค้า-จ่ายให้</font> </div></td>
                                                                    <td><div align="left">
                                                                            <select name="id_saler" size="1" id="id_saler" tabindex="0" style="font: 11pt tahoma; color: #000000;background: #ccffff; border: 1px black solid" align="center" >
                                                                                <option value=''>เลือกข้อมูล...</option>
                                                                                <?php
                                                                                $i = 0;
                                                                                $sql = "select id_saler,name_saler,address_saler from saler where id_amp='$sele_amp' order by id_saler";
                                                                                $dbquery = mysql_db_query($dbname, $sql);
                                                                                $num_rows = mysql_num_rows($dbquery);
                                                                                while ($i < $num_rows) {
                                                                                    $i++;
                                                                                    $result = mysql_fetch_array($dbquery);
                                                                                    echo"<option value='$result[0]'>$result[0]-$result[1]-$result[2]</option>";
                                                                                }
                                                                                ?>
                                                                            </select>


                                                                        </div></td>
                                                                </tr>                
                                                                <tr>
                                                                    <td><div align="right"><font size="3" color="">เลขที่เอกสาร</font> </div></td>
                                                                    <td><div align="left">
                                                                            <input type="text" value='<?php echo $doc; ?>' size = "40" name="doc_" style="font: 12pt tahoma; color: #337744;background: #7777FF; border: 1px black solid" >
                                                                        </div></td>
                                                                </tr>
                                                                <tr><td colspan="3" align="center">
                                                                        <fieldset>    <legend>Link-โครงการ e-GP</legend>
                                                                            <table border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#ccffff">
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
                                                                                    <td><div align="center">
                                                                                            <input name="egp11_" type="text" size="15" maxlength="20" value="-"/>
                                                                                        </div></td>
                                                                                    <td><div align="center">
                                                                                            <input name="egp21_" type="text" size="15" maxlength="20" value="-"/>
                                                                                        </div></td>
                                                                                    <td><div align="center">
                                                                                            <input name="egp31_" type="text" size="15" maxlength="20" value="-"/>
                                                                                        </div></td>
                                                                                    <td><div align="center">
                                                                                            <input name="egp41_" type="text" size="15" maxlength="20" value="-"/>
                                                                                        </div></td>
                                                                                    <td><div align="center">
                                                                                            <input name="egp51_" type="text" size="15" maxlength="20" value="-"/>
                                                                                        </div></td>
                                                                                    <td><div align="center">
                                                                                            <input name="egp61_" type="text" size="15" maxlength="20" value="-"/>
                                                                                        </div></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><div align="right">เลขที่สัญญา : </div></td>
                                                                                    <td><div align="center">
                                                                                            <input name="egp12_" type="text" size="15" maxlength="20"  value="-"/>
                                                                                        </div></td>
                                                                                    <td><div align="center">
                                                                                            <input name="egp22_" type="text" size="15" maxlength="20" value="-"/>
                                                                                        </div></td>
                                                                                    <td><div align="center">
                                                                                            <input name="egp32_" type="text" size="15" maxlength="20" value="-"/>
                                                                                        </div></td>
                                                                                    <td><div align="center">
                                                                                            <input name="egp42_" type="text" size="15" maxlength="20" value="-"/>
                                                                                        </div></td>
                                                                                    <td><div align="center">
                                                                                            <input name="egp52_" type="text" size="15" maxlength="20" value="-"/>
                                                                                        </div></td>
                                                                                    <td><div align="center">
                                                                                            <input name="egp62_" type="text" size="15" maxlength="20" value="-"/>
                                                                                        </div></td>
                                                                                </tr>
                                                                            </table>
                                                                        </fieldset>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2"><div align="center">
                                                                            <INPUT TYPE="hidden" NAME="trab" value="<?php echo $trab ?>"/><!-- จัดสรร -->
                                                                            <INPUT TYPE="hidden" NAME="M_" value="<?php echo $M_ ?>"/><!-- เหลือ -->
                                                                            <INPUT TYPE="hidden" NAME="cmoney" value="<?php echo session_register('cmoney'); ?>"/><!-- เหลือ			-->
                                                                            <INPUT TYPE="hidden" NAME="id_item_update" value="<?php echo $id_item_update ?>"/>
                                                                            <INPUT TYPE="hidden" NAME="bath_use" value="<?php echo $bath_use ?>"/>
                                                                            <INPUT TYPE="hidden" NAME="bath" value="<?php echo $bath ?>"/>
                                                                            <input type="submit" name="Submit" value=" ตกลง "/>
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
