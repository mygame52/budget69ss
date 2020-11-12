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

if (!isset($bath_berg)) {
    $bath_berg = '0';
}
if (!isset($check_yuem)) {
    $check_yuem = '0';
}

if (!isset($sav)) {
    $sav = " ";
}
if (!isset($bath_t)) {
    $bath_t = " ";
}
if (!isset($date_work)) {
    $bath_work = "";
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
    <body>
        <?php include 'include/header.inc.php'; ?>
        <div class="cleared reset-box"></div>
        <div class="rnut-bar rnut-nav">
            <div class="rnut-nav-outer">
                <ul class="rnut-hmenu">
                    <li>
                        <a href="./amp_yuem.php" class="active">Back</a>
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
                                    <h2 class="rnut-postheader" style="text-align: center;">บันทึกการยืมเงิน : โครงการ - ทั่วไป</h2>
                                    <!-- <div class="rnut-postcontent">
                                                                    <p style="text-align: center;">test1</p>
                                                                    <p style="text-align: center;">test2</p>
                                            </div> -->
                                    <!-- start การแก้ไขข้อมูล -->
                                    <?php
                                    if ($sav != "savesave") {
                                        $item_ = $_REQUEST['item_'];
                                        $doc_ = $_REQUEST['doc_'];
                                        $yuem_money = isset($_REQUEST['yuem_money']);
                                        $sel3 = $_REQUEST['sel3'];
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
                                        $id_personyuem = $_REQUEST['id_personyuem'];
                                        ?>					

                                        <?php
                                        $id_item_update = $_REQUEST['id_item_update'];
                                        /* ($bath_berg=="" or $item_=="" or $egp11=="" or $egp12=="" or $id_personyuem=="") {
                                         */
                                        if ($bath_berg == "" or $item_ == "") {
                                            echo "<h3> Error : กรุณากรอกข้อมูลให้ครบ : <br>";
                                            echo "ข้อมูลที่ต้องบันทึกประกอบด้วย <br>";
                                            echo "<ul>";
                                            echo "<li>รายการยืมเงิน </li>";
                                            echo "<li>จำนวนเงิน </li>";
                                            echo "</ul>";
                                            echo "<hr>";
                                            //echo "ในช่อง e-GP ให้ใส่ <br>";
                                            //echo "&nbsp;&nbsp;&nbsp;&nbsp;: เลขโครงการและเลขสัญญา  จาก e-GP <br>";
                                            //echo "&nbsp;&nbsp;&nbsp;&nbsp;: หากไม่มีให้ใส่ - ในช่องเลขที่โครงการ1 และ ช่องเลขสัญญา1 </font></h3><br>";
                                            exit();
                                        }

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
                                    }
                                    ?> 
                                    <br>
                                        <div align="center">
                                            <table width="70%" border="0" cellspacing="0" cellpadding="7"  align="center" >
                                                <tr bgcolor="e2c4f2">
                                                    <td width="42%" scope="col"><div align="right"><font size="3" color="000000">หน่วยงานผู้ยืมเงิน&nbsp; 	</font> </div></td>
                                                    <td width="58%" scope="col">
                                                        <div align="left"><font size="3" color="000099">
                                                                <?php
                                                                $date_work = $_REQUEST['date_work'];
                                                                $judson_total = $_SESSION[$trab];

                                                                $_SESSION[$date_work] = $date_work;
//echo $_SESSION[$date_work];
                                                                echo $sele_amp . "  :  ";
                                                                echo "" . $full_name;  //ชื่อ กศน.อำเภอ
                                                                $id_yuem_ = $id_personyuem;
// ------------ ดึงข้อมูล ผู้ยืมเงิน
                                                                $psqls = "SELECT * FROM person_yuem where id_yuem =$id_yuem_";
                                                                $dbquerys = mysql_db_query($dbname, $psqls);
                                                                $num_rowss = mysql_num_rows($dbquerys);
                                                                while ($results = mysql_fetch_array($dbquerys)) {
                                                                    $citizenid_ = $results[citizenid];
                                                                    $person_ = $results[person];
                                                                    echo "<br> ผู้ยืมคือ  " . $person_ . " : " . $citizenid_;
                                                                }

// ------------- สินสุดดึงข้อมูล ผู้ยืมเงิน										
//										echo " ผู้ยืมคือ  ".$id_personyuem;
                                                                ?></font>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><div align="right"><font size="3" color="000000">รหัสงาน/โครงการ&nbsp;</font></div></td>
                                                    <td>
                                                        <font size="3" color="006666">&nbsp;<?echo $work;'<BR>';	echo  "   :   ".$sel3;	?></font>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><div align="right"><font size="3" color="000000">จำนวนเงินจัดสรร&nbsp;</font></div></td>
                                                    <td><div align="left"> <font size="3" color="6600ff">                                                    

                                                                <?php
                                                                $judsun2 = ($M_rab + $M_rab2 + $M_rab3 + $M_rab4);
                                                                $_SESSION["judson2"] = $judsun2;
                                                                echo number_format($judsun2, 2);
                                                                ?>
                                                                &nbsp;&nbsp;บาท</font> </div></td>
                                                </tr>
                                                <tr>
                                                    <td><div align="right"><font size="3" color="000000">จำนวนเงินคงเหลือ&nbsp;</font></div></td>
                                                    <td><div align="left"><font size="3" color="ff0000">
                                                                <?php
                                                                $lua = ($M_rab + $M_rab2 + $M_rab3 + $M_rab4 - $M_rua);
                                                                $_SESSION["lua"] = $lua;
                                                                echo number_format($lua, 2);
                                                                ?>                                                                                                                                                                   

                                                                &nbsp;&nbsp;บาท</font></div></td>
                                                </tr>
                                                <tr>
                                                    <td><div align="right"><font size="3" color="000000">รายการจ่าย&nbsp;</font></div></td>
                                                    <td><font size="3" color="ff0000">&nbsp;<?php echo "เงินยืม :-" . $item_; ?>	</font></td>
                                                </tr>
                                                <tr>
                                                    <td><div align="right"><font size="3" color="000000">ที่เอกสาร&nbsp;</font></div></td>
                                                    <td> <font size="3" color="ff0000">&nbsp;<?php echo $doc_; ?>  </font></td>
                                                </tr>

                                                <!--  คำนวณเงินคงเหลือ -->
                                                <?php
                                                echo "<tr>";
                                                if ($cmoney == 1) {
                                                    echo "<td><div align='right'><font size='3' color=''>จำนวนเงินเหลือ&nbsp;</font></div></td>";
                                                    echo "<td>";
                                                    echo number_format($bath_t, 2) . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เงินยืม : " . number_format($bath, 2);
                                                } else {
                                                    echo "<td><div align='right'><font size='3' color=''>จำนวนเงิน&nbsp;</font></div></td>";
                                                    echo "<td>";
                                                    echo "<font size='3' color='ff0000'>&nbsp;" . number_format($bath_berg, 2) . "&nbsp;&nbsp;บาท</font>";
                                                }
                                                echo "</td>  </tr>";
                                                ?>
                                                <?php
                                                echo "<tr><td><div align='right'></div></td><td>";
                                                if ((($bath1 > $lua) and ( $cmoney != 1)) or ( ($bath_berg > $lua) and ( $cmoney != 1))) {
                                                    echo "<font color='#ff0000' size='3'><h2>จำนวนเงินไม่พอ </h2></font><br>";
                                                    exit();
                                                }
                                                echo "  </td> </tr>";
                                                ?>
                                                <tr>
                                                    <td><div align="right"><font size="3" color="990066">ถ้าดำเนินการ จะเหลือ &nbsp;</font></div></td>
                                                    <td> <?php
                                                        session_register('$bath1');
                                                        $bath_rnut = $bath1 - $bath_berg;  // $bath_rnut = เงินที่ยืม - เงินที่ใช้
                                                        if ($cmoney == 1) {    //echo "ยืมเงิน";
                                                            $remain = $M_rab + $M_rab2 + $M_rab3 + $M_rab4 - $M_rua + $bath_t;
                                                        } else {      //echo "ไม่ได้ยืม";			
                                                            $remain = $M_rab + $M_rab2 + $M_rab3 + $M_rab4 - $M_rua - $bath_berg;
                                                        }
                                                        echo "<font size='3' color='cc0099'>&nbsp;" . number_format($remain, 2) . "&nbsp;&nbsp;บาท</font>";
                                                        ?>
                                                    </td>
                                                </tr>                                           
                                            </table>
                                        </div>

                                        <!-- //-------------สิ้นสุด การแสดงเลขโครงการ eGP ---------- -->

                                        <!-- <FORM METHOD="POST" ACTION="amp_yuem_data2_save2.php"> -->
                                        <div align="center">
                                            <FORM METHOD="POST" ACTION="./amp_yuem_data2_save2.php?date_work=<?php echo $_SESSION[$date_work]; ?>">
                                                <TABLE width="70%" border="0" align="center" cellpadding="10" cellspacing="0">
                                                    <TR><td> <div align="center">
                                                                            <!--	<INPUT TYPE="hidden" NAME="sel" value="<?php echo $sele_amp ?>">-->
                                                                <INPUT TYPE="hidden" NAME="sel3" value="<?php echo $sel3 ?>"/>	
                                                                <INPUT TYPE="hidden" NAME="doc_"php  value="<?php echo $doc_ ?>"/>
                                                                <INPUT TYPE="hidden" NAME="bath" value="<?php echo $bath ?> ">
                                                                    <INPUT TYPE="hidden" NAME="bath1" value="<?php echo $bath1 ?> "/>
                                                                    <INPUT TYPE="hidden" NAME="bath_t" value="<?php echo $bath_t ?> "/> 
                                                                    <INPUT TYPE="hidden" NAME="bath_berg" value="<?php echo $bath_berg ?> "/>
                                                                    <INPUT TYPE="hidden" NAME="bath_use" value="<?php echo $bath_use ?> "/>
                                                                    <INPUT TYPE="hidden" NAME="item_" value="<?php echo $item_ ?> "/>
                                                                    <INPUT TYPE="hidden" NAME="egp11" value="<?php echo $egp11 ?> "/>
                                                                    <INPUT TYPE="hidden" NAME="egp12" value="<?php echo $egp12 ?> "/>
                                                                    <INPUT TYPE="hidden" NAME="egp21" value="<?php echo $egp21 ?> "/>
                                                                    <INPUT TYPE="hidden" NAME="egp22" value="<?php echo $egp22 ?> "/>
                                                                    <INPUT TYPE="hidden" NAME="egp31" value="<?php echo $egp31 ?> "/>
                                                                    <INPUT TYPE="hidden" NAME="egp32" value="<?php echo $egp32 ?> "/>
                                                                    <INPUT TYPE="hidden" NAME="egp41" value="<?php echo $egp41 ?> "/>
                                                                    <INPUT TYPE="hidden" NAME="egp42" value="<?php echo $egp42 ?> "/>
                                                                    <INPUT TYPE="hidden" NAME="egp51" value="<?php echo $egp51 ?> "/>
                                                                    <INPUT TYPE="hidden" NAME="egp52" value="<?php echo $egp52 ?> "/>
                                                                    <INPUT TYPE="hidden" NAME="egp61" value="<?php echo $egp61 ?> "/>
                                                                    <INPUT TYPE="hidden" NAME="egp62" value="<?php echo $egp62 ?> "/>                                                               
                                                                    <INPUT TYPE="hidden" NAME="id_personyuem" value="<?php echo $id_personyuem ?> "/>
                                                                    <INPUT TYPE="hidden" NAME="id_item_update" value="<?php echo $id_item_update ?>"/>
                                                                    <INPUT TYPE="hidden" NAME="yuem_money" value="<?php echo $yuem_money ?>"/>
                                                                    <?php
                                                                    if ($sav != "savesave") {
                                                                        echo "<INPUT TYPE='submit' value=' บันทึกข้อมูล '>";
                                                                    } else {
                                                                        echo" บันทึกข้อมูลแล้ว ";
                                                                        //////////////// ช่วงบันทึกข้อมูล ใน {  ของ else
                                                                        include("amp_yuem_data2_save.php");
                                                                        ///////////////////////////////////////////// ปิดช่วงบันทึก }   
                                                                    }
                                                                    ?>
                                                            </div></TD></TR></TABLE>
                                            </FORM>
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
