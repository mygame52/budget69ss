<?php
session_start();
require("config.inc.php");


mysql_connect($dbserver, $dbuser, $dbpass) or
	die("<hr><b> ติดต่อ server ไม่ได้>");

mysql_select_db($dbname) or  die("ติดฐานข้อมูลไม่ได้");

$cover_sheet_id = $_REQUEST['cover_sheet_id'];

$cover_sheet_sql = "SELECT * FROM cover_sheet WHERE id=$cover_sheet_id";
$cover_sheet_query = mysql_query($cover_sheet_sql);
$cover_sheet = mysql_fetch_assoc($cover_sheet_query);

$cover_sheet_title = $cover_sheet["title"];
$cover_sheet_status = $cover_sheet["status"];
$cover_sheet_user = $cover_sheet["u_ser"];

// LOG
// echo "cover_sheet_id=" . $cover_sheet_id;
// echo "cover_sheet_title=" . $cover_sheet_title;
// echo "cover_sheet_status=" . $cover_sheet_status;
// echo "cover_sheet_user=" . $cover_sheet_user;

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"
    []>
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
                    <a href="cover_sheet.php" class="active">Back</a>
                </li>
            </ul>
            <font size="4" color="ffffff">Login โดย :&nbsp;<?php echo $user_ ?></font>
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
                                <h2 class="rnut-postheader" style="text-align: center;">แก้ไขข้อมูลใบปะหน้า</h2>
								<br>
								<div align="center">

									<a href="cover_sheet_detail.php?cover_sheet_id=<? echo $cover_sheet_id; ?>">
										<button>รายงาน</button>
									</a>
								</div>
                                <br>
                                <div align="center">
                                    <form name="cover_sheet_form" action="cover_sheet_edit1.php" method="post">
                                        <input type="hidden" name="cover_sheet_id"
                                            value="<? echo $cover_sheet_id; ?>" />
                                        <table width="60%">
                                            <tr>
                                                <td width="49%">
                                                    <div align="right">ชื่อ</div>
                                                </td>
                                                <td width="49%">
                                                    <input type="text" size="10" name="title"
                                                        value="<? echo $cover_sheet_title; ?>" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="49%">
                                                    <div align="right">สถานะ</div>
                                                </td>
                                                <td width="49%">
                                                    <input type="radio" name="status" <? if (isset($cover_sheet_status)
                                                        && $cover_sheet_status=="IN_PROGRESS" ) { echo "checked" ; } ?> <?php 
														
													?> value="IN_PROGRESS"> กำลังดำเนินการ </input>

                                                    <input type="radio" name="status" <? if (isset($cover_sheet_status)
                                                        && $cover_sheet_status=="SUCCESS" ) { echo "checked" ; } ?>
                                                    value="SUCCESS"> เสร็จสิ้น
                                                    </input>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="49%"></td>
                                                <td width="49%">
                                                    <input name="cover_sheet_form_submit" type="submit"
                                                        id="cover_sheet_form_submit" value="แก้ไข">

                                                </td>
                                            </tr>
                                        </table>
                                    </form>
                                </div>
                                <br>
                                <!-- start การแก้ไขข้อมูล -->

                                <?php
								$total_bath = 0;
								$sqlStr = "SELECT cover_sheet_item.id AS cover_sheet_item_id,
									cover_sheet_item.remark AS cover_sheet_item_remark,
									item.amp_item, 
									amp.`Name` AS amp_name,
									item.c_khong, 
									item.id_item, 
									item.item AS item_item,
									item.doc AS item_doc,
									item.bath AS item_bath,
									item.staus AS item_status
									FROM cover_sheet_item
									INNER JOIN cover_sheet ON cover_sheet.id = cover_sheet_item.cover_sheet_id
									INNER JOIN item ON cover_sheet_item.item_id = item.id_item
									INNER JOIN amp ON item.amp_item = amp.id
									WHERE u_ser = '$user_' and cover_sheet_item.cover_sheet_id = $cover_sheet_id
									ORDER BY cover_sheet_item.id";

								$objQuery = mysql_query($sqlStr) or die("Error Query [" . $sqlStr . "]");
								$j = 0;
								?>

                                <div align="center">    
                                    <a href="#bottom">Bottom</button></a>             
                                    <table width="80%" border="0" align="center" >
                                        <tr bgcolor="#43d1eb">
                                            <!-- <th scope="col">csi_id</th> -->
                                            <th scope="col"> ที่ </th>
                                            <th scope="col"> หน่วยงาน/สถานศึกษา</th>
                                            <th scope="col"> ID</th>
                                            <th scope="col"> เลขที่เอกสาร</th>
                                            <th style="col"> รายการ</th>
                                            <th scope="col"> งบประมาณ</th>
                                            <th scope="col"> หมายเหตุ</th>
                                            <th scope="col"> สถานะ</th>
                                            <th scope="col"></th>
                                        </tr>
                                        <?
                                            while($objResult = mysql_fetch_array($objQuery)) {
                                                    $j++;
                                                    $i=($j%2);
                                                    $total_bath = $total_bath + $objResult["item_bath"];
                                                    ?>
                                        <tr <?if($i==1){echo "bgcolor='#FFFFCC'" ;}?> >
                                            <td style="text-align:center;vertical-align:middle;">
                                                <font size="3" color="#000099">
                                                    <? echo $j ?>
                                                </font>
                                            </td>
                                            <td style="text-align:left;vertical-align:middle;">
                                                <font size="3" color="#000099">
                                                    <? echo $objResult["amp_name"]; ?>
                                                </font>
                                            </td>
                                            <td style="text-align:right;vertical-align:middle;">
                                                <font size="3" color="#000099">
                                                    <? echo $objResult["id_item"]; ?>
                                                </font>
                                            </td>
                                            <td style="text-align:right;vertical-align:middle;">
                                                <font size="3" color="#000099">
                                                    <? 
                                                        $item_doc_result = $objResult["item_doc"];
                                                        $running = true;
                                                        $findme_1 = "ลว";
                                                        $findme_2 = "ลงวัน";

                                                        $pos_1 = strpos($objResult["item_doc"], $findme_1);
                                                        $pos_2 = strpos($objResult["item_doc"], $findme_2);

                                                        // echo "pos_1=" . $pos_1;
                                                        // echo "<br>";
                                                        // echo "pos_2=" . $pos_2;

                                                        if ($pos_1 !== false) {
                                                        $item_doc_result = substr($objResult["item_doc"], 0, $pos_1);
                                                        } 

                                                        if ($pos_2 !== false) {
                                                        $item_doc_result = substr($objResult["item_doc"], 0, $pos_2);
                                                        }

                                                        echo $item_doc_result;
                                                    ?>
                                                </font>
                                            </td>
                                            <td style="text-align:right;vertical-align:middle;">
                                                <font size="3" color="#000099">
                                                    <? echo $objResult["item_item"]; ?>
                                                </font>
                                            </td>
                                            <td style="text-align:right;vertical-align:middle;">
                                                <font size="3" color="#000099">
                                                    <? echo number_format($objResult["item_bath"], 2) ?>
                                                </font>
                                            </td>
                                            <td style="text-align:right;vertical-align:middle;">
                                                <font size="3" color="#000099">
                                                    <? echo $objResult["cover_sheet_item_remark"]; ?>
                                                </font>
                                                <form method="post" action="cover_sheet_item_edit.php">
                                                    <input type="text" name="remark" />

                                                    <input type="hidden" name="cover_sheet_id"
                                                        value="<? echo $cover_sheet_id ?>" />
                                                    <input type="hidden" name="cover_sheet_item_id"
                                                        value="<? echo $objResult['cover_sheet_item_id']; ?>" />
                                                    <input type="submit" name="cover_sheet_item_edit_submit"
                                                        value="แก้ไข" />
                                                </form>
                                            </td>
                                            
                                            <td style="text-align:right;vertical-align:middle;">
                                                <?php
                                                    $pic = NULL;
                                                    $_status = $objResult['item_status'];
                                                    $_statusStr = "";
                                                    if ($_status == 0) {
                                                        $pic = "image/status0.png";
                                                        $_statusStr = "สถานศึกษา ขอเบิก"; // สีแดง
                                                    } elseif ($_status == 1) {
                                                        $pic = "image/status1.png";
                                                        $_statusStr = "ตรวจสอบหลักฐานแล้ว"; // สีแดง
                                                    } elseif ($_status == 2) {
                                                        $pic = "image/status2.png";
                                                        $_statusStr = "ตัดยอดงบประมาณแล้ว"; // สีเขียว
                                                    } elseif ($_status == 3) {
                                                        $pic = "image/status3.png";
                                                        $_statusStr = "ทำระบบ PO แล้ว"; // สีฟ้า
                                                    } elseif ($_status == 4) {
                                                        $pic = "image/status4.png";
                                                        $_statusStr = "เบิกจ่ายแล้ว"; // สีน้ำเงิน
                                                    } elseif ($_status == 5) {
                                                        $pic = "image/status5.png";
                                                        $_statusStr = "เอกสารผิดพลาด"; // เหลือง
                                                    }

                                                    // echo "<font size='3' color='#000099'>$_status : $_statusStr</font>"
                                                    if ($_status == 5){
                                                        echo "<div align='center'><img src='$pic' width='90%' border='0' alt='$_statusStr'></div> "; 
                                                    }else{
                                                        echo "<div align='center' width='100'><img src='$pic' width='90%' border='0' alt='$_statusStr'></div> "; 
                                                    }
                                                ?>
                                            </td style="text-align:right;vertical-align:middle">
                                    
                                            <td style="text-align:center;vertical-align:middle;">
                                                <a href="cover_sheet_item_del.php?cover_sheet_item_id=<?= $objResult['cover_sheet_item_id']; ?>&cover_sheet_id=<?= $cover_sheet_id?>">
                                                    <img 
                                                        src="image/icon/cross.png" 
                                                        width="16" 
                                                        height="16" border="0"
                                                        alt="ลบ"
                                                    >
                                                </a>
                                            </td>
                                        </tr>
                                        <? } ?>
                                        <tr bgcolor="#FFCCCC">
                                            <!-- <td></td> -->
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div style="text-align:right;">รวมงบประมาณ</div>
                                            </td>
                                            <td>
                                            <font size="3" color="#000099">
                                                    <? echo number_format($total_bath, 2); ?>
                                                </font>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <form name="frmMain" method="post" action="cover_sheet_item_add.php">
                                            <input type="hidden" name="cover_sheet_id"
                                                value="<? echo $cover_sheet_id ?>" />
                                            <tr bgcolor="#FFCCCC">
                                                <!-- <td></td> -->
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <input size="5" name="item_id" id="item_id" type="number"
                                                        placeholder="กรอก ID" />
                                                    <input name="cover_sheet_but_submit" type="submit" id="btnSubmit" value="เพิ่ม">
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </form>
                                    </table>
                                </div>
                                <!-- end การแก้ไขข้อมูล -->
                                
                                <br>

                                <a name="bottom"></a>

                                <div align="center">
                                    <a href="cover_sheet.php"><-Back</a>
                                    &nbsp;&nbsp;
                                    <a href="#top">Top</a>
                                </div>

                                <?php include("./include/footer.inc"); ?>
</body>

</html>