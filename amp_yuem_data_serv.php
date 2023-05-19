<?php
session_start();
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
//	if(!isset($id_personyuem)){$id_personyuem = ""; } 
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
                        <a href="./amp_yuem_serv.php" class="active">Back</a>
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
                                    <h2 class="rnut-postheader" style="text-align: center;">บันทึกการยืมเงิน : เดินทางไปราชการ</h2>
                                    <br>
                                        <!-- start การแก้ไขข้อมูล -->
                                        <?php
                                        if ($hid8 <> 908) {
                                            echo $hid8;
                                            echo "<h3> ERROR : --- ไม่ถูกต้อง ---  </h3>";
                                            exit();
                                        }
                                        session_register("sele_amp");
                                        ?>
                                        <div align="center">
                                            <form name="form1" method="post" action="./amp_yuem_data2_serv.php?rand=<?php echo $rand ?>">
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
                                                        <td><div align="right"><font size="3" color=""><font size="3" color="">เพิ่อเป็นค่าใช้จ่าย</font></font></div></td>
                                                        <td><div align="left">
                                                                <?php
                                                                if (isset($cname_item) != "") {
                                                                    $item_ = $cname_item;
                                                                    echo $item_;
                                                                    echo "<INPUT TYPE='hidden' NAME='item_' value='$cname_item'>";
                                                                    echo "</td></td></tr>";
                                                                } else {
                                                                    echo "<input type='text' name='item_' size= '300' style='font: 12pt tahoma; color: #ff0000;background: #C0F9BD; border: 1px black solid' >";

                                                                    echo "</td></td></tr>";
                                                                    ?>

                                                                    <tr>
                                                                        <td><div align="right"><font size="3" color="">วันที่ไปราชการ</font> </div></td>
                                                                        <td><div align="left">
                                                                                <input type="text" size = "40" name="date_work" id="date_work" style="font: 12pt tahoma; color: #ff0000;background: #C0F9BD; border: 1px black solid"  placeholder="15-17 มิถุนายน 2558 " >
                                                                            </div></td>
                                                                    </tr>                                                               

                                                                    <tr>
                                                                        <td>
                                                                            <div align="right"> <font size="3" color="">ค่าเบี้ยเลี้ยง 999 x 99 = 9,999  บาท </font> </div>
                                                                        </td>
                                                                        <td> 
                                                                            <div align="right">
                                                                                <input type="text" name="serv1" cols="40" id="serv1" style="font: 12pt tahoma; color: #ff0000;background: #C0F9BD; border: 1px black solid" placeholder="เบี้ยเลี้ยง 240 x 3 = 720 บาท"></input>
                                                                            </div>						
                                                                        </td>
                                                                    </tr>


                                                                    <tr>
                                                                        <td>
                                                                            <div align="right"> <font size="3" color="">พาหนะ 999 x 99 = 9,999  บาท </font> </div>
                                                                        </td>
                                                                        <td> 
                                                                            <div align="right">
                                                                                <input type="text" name="serv2" cols="40" id="serv2" style="font: 12pt tahoma; color: #ff0000;background: #C0F9BD; border: 1px black solid" placeholder="พาหนะ 240 x 3 = 720 บาท"></input>
                                                                            </div>						
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <div align="right"> <font size="3" color="">ที่พัก 999 x 99 = 9,999  บาท </font> </div>
                                                                        </td>
                                                                        <td> 
                                                                            <div align="right">
                                                                                <input type="text" name="serv3" cols="40" id="serv3" style="font: 12pt tahoma; color: #ff0000;background: #C0F9BD; border: 1px black solid" placeholder="ที่พัก 240 x 3 = 720 บาท"></input>
                                                                            </div>						
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>
                                                                            <div align="right"> <font size="3" color="">อื่น ๆ (ระบุ) = 9,999  บาท </font> </div>
                                                                        </td>
                                                                        <td> 
                                                                            <div align="right">
                                                                                <input type="text" name="serv4" cols="40" id="serv4" style="font: 12pt tahoma; color: #ff0000;background: #C0F9BD; border: 1px black solid" placeholder="อื่น ๆ (ระบุ) 9,999 บาท"></input>
                                                                            </div>						
                                                                        </td>
                                                                    </tr>


                                                                    </tr>



                                                                    <?php
                                                                    echo "<tr><td><div align='right'><font size='3' color='cc0000'><font size='3' color='990000'>ยืมเงิน</font></font></div></td>";
                                                                    echo "<td><input type='checkbox' name='yuem_money' value='check' checked='checked'/> ";
                                                                    ?>


                                                                    <!-- ตรวจสอบ ข้อมูลผู้ยืมเงิน  -->
                                                                    <!-- <form name="form1" method="post" action="chk_personyuem.php?citizenid_=<?echo $note_item_;?> "> -->
                                                                    <font size='3' color='#ff0000'><font size="3" color="990000">/ ผู้ยืม </font> </font>

                                                                    <!-- เลือกผู้ที่ต้องการยืมเงิน -->
                                                                    <select name="id_personyuem" size="1" tabindex="0" id="id_personyuem" onChange="JavaScript:sel(this.value)"><>
                                                                        <?php
                                                                        $i = 0;
                                                                        $a = 1;
                                                                        $sql = "SELECT id_yuem, citizenid, person FROM person_yuem where (amp = $sele_amp) and (chk_status <> 1)";
                                                                        $dbquery = mysql_db_query($dbname, $sql);
                                                                        $num_rows = mysql_num_rows($dbquery);
                                                                        while ($i < $num_rows) {
                                                                            $result = mysql_fetch_array($dbquery);
                                                                            $id_yuem_s = $result[id_yuem];
                                                                            $citizenid_ = $result[citizenid];
                                                                            $person_ = $result[person];
                                                                            if ($a == 1) {
                                                                                echo"<option value='$id_yuem_s' selected='selected'>$a. | $citizenid_ | $person_</option>";
                                                                            } else {
                                                                                echo"<option value='$id_yuem_s'>$a. | $citizenid_ | $person_</option>";
                                                                            }
                                                                            $i++;
                                                                            $a++;
                                                                        }
                                                                        ?>					
                                                                    </select>
                                                                </div></td></tr>

                                                        <?php
                                                    }

                                                    echo "<INPUT TYPE='hidden' NAME='sel3' value ='$sel3'>";


                                                    // ---------------------ถ้ายืม (ตั้งเบิกปกติ)
                                                    {
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
                                                        <td><div align="right"><font size="3" color="">เลขที่เอกสาร</font> </div></td>
                                                        <td><div align="left">
                                                                <?php
                                                                $sql = "select * from amp where id='$sele_amp'";
                                                                $dbquery = mysql_db_query($dbname, $sql);
                                                                mysql_query("SET NAMES UTF8");
                                                                $num_rows = mysql_num_rows($dbquery);
                                                                $ii = 0;
                                                                while ($ii < $num_rows) {
                                                                    $result_amp = mysql_fetch_array($dbquery);
                                                                    $doc_book = $result_amp['doc'];
                                                                    $numbook_amp = $result_amp['numbook'];
                                                                    $ii++;
                                                                }
                                                                ?>
                                                                <input type="text" value='<?php echo $doc_book; ?>' size = "40" name="doc_" style="font: 12pt tahoma; color: #ff0000;background: #C0F9BD; border: 1px black solid" >
                                                            </div></td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="2">
                                                            <DIV align="center">
                                                                <INPUT TYPE="hidden" NAME="trab" value="<?php echo $trab ?>"/>
                                                                <!-- จัดสรร -->
                                                                <INPUT TYPE="hidden" NAME="M_" value="<?php echo $M_ ?>"/>
                                                                <!-- เหลือ -->
                                                                <INPUT TYPE="hidden" NAME="cmoney" value="<?php echo session_register('cmoney'); ?>"/>
                                                                <!-- เหลือ	-->
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
