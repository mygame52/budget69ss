<?php
session_start();
require("config.inc.php");


mysql_connect($dbserver, $dbuser, $dbpass) or
	die("<hr><b> ติดต่อ server ไม่ได้>");

mysql_select_db($dbname) or  die("ติดฐานข้อมูลไม่ได้");

$currentItemStatus = 0;

if ($_POST['itemStatus']) {
    $currentItemStatus = $_POST['itemStatus'];
}


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
                                <a name="top"></a>
                                <h2 class="rnut-postheader" style="text-align: center;">รายงานรายการจ่ายทั้งหมดตามสถานะ</h2>

                                <br>
                                <div align="center">
                                    <form method="POST" action="" id="itemStatusImgForm">
                                        <input type="hidden" name="itemStatus" id="itemStatus"></input>
                                        <img src="image/status0.png" width='10%' border="0" alt="สถานศึกษาขอเบิก" onclick="submitItemStatus(0)" >    
                                        <img src="image/status1.png" width='10%' border="0" alt="สถานศึกษาขอเบิก" onclick="submitItemStatus(1)" >
                                        <img src="image/status2.png" width='10%' border="0" alt="สถานศึกษาขอเบิก" onclick="submitItemStatus(2)" >
                                        <img src="image/status3.png" width='10%' border="0" alt="สถานศึกษาขอเบิก" onclick="submitItemStatus(3)" >
                                        <img src="image/status4.png" width='10%' border="0" alt="สถานศึกษาขอเบิก" onclick="submitItemStatus(4)" >
                                        <img src="image/status5.png" width='10%' border="0" alt="สถานศึกษาขอเบิก" onclick="submitItemStatus(5)" >
                                    </form>
                                </div>
                                <br>

                                <?php
								$total_bath = 0;
                                $sqlStr = "SELECT item.id_item, 
                                    item.amp_item,
                                    amp.Name AS amp_name,
                                    item.`c_khong`,
                                    item.item,
                                    item.doc,
                                    item.date_time,
                                    item.bath,
                                    item.staus,
                                    item.date_pay,
                                    item.user
                                    FROM `item` 
                                    INNER JOIN amp on amp.id = amp_item
                                    WHERE item.staus = $currentItemStatus";

								$objQuery = mysql_query($sqlStr) or die("Error Query [" . $sqlStr . "]");
								$j = 0;
								?>

                                <div align="center">    
                                    <a href="#bottom">Bottom</button></a>             
                                    <table width="80%" border="0" align="center" >
                                        <tr bgcolor="#43d1eb">
                                            <!-- <th scope="col">csi_id</th> -->
                                            <th scope="col"> ที่ </th>
                                            <th scope="col"> ID</th>
                                            <th scope="col"> สถานศึกษา</th>
                                            <th scope="col"> เลขที่เอกสาร</th>
                                            <th scope="col"> รหัสงาน/โครงการ
                                            <th style="col"> รายการจ่าย</th>
                                            <th scope="col"> จำนวนเงิน</th>
                                            <th scope="col"> สถานะ</th>
                                    
                                        </tr>
                                        <?
                                            while($objResult = mysql_fetch_array($objQuery)) {
                                                    $j++;
                                                    $i=($j%2);
                                                    $total_bath = $total_bath + $objResult["bath"];
                                                    ?>
                                        <tr id="<?php echo $objResult["id_item"]; ?>" <?if($i==1){echo "bgcolor='#FFFFCC'" ;}?> >
                                            <td style="text-align:center;vertical-align:middle;">
                                                <font size="3" color="#000099">
                                                    <? echo $j ?>
                                                </font>
                                            </td>
                                            <td style="text-align:center;vertical-align:middle;">
                                                <font size="3" color="#000099">
                                                    <? echo $objResult["id_item"]; ?>
                                                </font>
                                            </td>
                                            <td style="text-align:left;vertical-align:middle;">
                                                <font size="3" color="#000099">
                                                    <? echo $objResult["amp_name"]; ?>
                                                </font>
                                            </td>
                                            <td style="text-align:left;vertical-align:middle;">
                                                <font size="3" color="#000099">
                                                    <? 
                                                        $doc_result = $objResult["doc"];
                                                        $running = true;
                                                        $findme_1 = "ลว";
                                                        $findme_2 = "ลงวัน";

                                                        $pos_1 = strpos($objResult["doc"], $findme_1);
                                                        $pos_2 = strpos($objResult["doc"], $findme_2);

                                                        // echo "pos_1=" . $pos_1;
                                                        // echo "<br>";
                                                        // echo "pos_2=" . $pos_2;

                                                        if ($pos_1 !== false) {
                                                        $doc_result = substr($objResult["doc"], 0, $pos_1);
                                                        } 

                                                        if ($pos_2 !== false) {
                                                        $doc_result = substr($objResult["doc"], 0, $pos_2);
                                                        }

                                                        echo $doc_result;
                                                    ?>
                                                </font>
                                            </td>
                                            <td style="text-align:left;vertical-align:middle;">
                                                <font size="3" color="#000099">
                                                    <? 
                                                        $c_khong = $objResult["c_khong"];
                                                        include("work.inc.php");
                                                     ?>
                                                </font>
                                            </td>
                                            <td style="text-align:left;vertical-align:middle;">
                                                <font size="3" color="#000099">
                                                    <? echo $objResult["item"]; ?>
                                                </font>
                                            </td>
                                            <td style="text-align:right;vertical-align:middle;">
                                                <font size="3" color="#000099">
                                                    <? echo number_format($objResult["bath"], 2) ?>
                                                </font>
                                            </td>
                                            
                                            <td style="text-align:right;vertical-align:middle;">
                                                <?php
                                                    $pic = NULL;
                                                    $_status = $objResult['staus'];
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
                                    
                                        </tr>
                                        <? } ?>
                                        <tr bgcolor="#FFCCCC">
                                            <!-- <td></td> -->
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div style="text-align:right;">รวมงบประมาณ</div>
                                            </td>
                                            <td  style="text-align:right;vertical-align:middle;">
                                            <font size="3" color="#000099">
                                                    <? echo number_format($total_bath, 2); ?>
                                                </font>
                                            </td>
                                            <td></td>
                              
                                        </tr>
                                    </table>
                                </div>
                                <!-- end การแก้ไขข้อมูล -->
                                
                                <br>

                                <a name="bottom"></a>

                                <div align="center">
                                    <!-- <a href="cover_sheet.php"><-Back</a> -->
                                    &nbsp;&nbsp;
                                    <a href="#top">Top</a>
                                </div>

                                <?php include("./include/footer.inc"); ?>
</body>

</html>
<script>
function submitItemStatus(itemStatus) {
  // You can get data related to the image here if needed
  // For example:
    //   var imageSrc = document.querySelector('img').src;
    console.log('item itemstatus', itemStatus)
    document.getElementById('itemStatus').value = itemStatus;

    document.getElementById('itemStatusImgForm').submit();
}

</script>