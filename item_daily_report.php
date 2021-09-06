<?php
session_start();
require_once('config.inc.php');
// start หากไม่ได้เข้าใช้งานจากเมนู
if (trim($hid1) <> "03") {
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=menu_pro.php\" />";
}
// end หากไม่ได้เข้าใช้งานจากเมนู


$date = NULL;
$time = NULL;
if (!empty($_REQUEST['dateInput'])) {
    $date = $_REQUEST['dateInput'];
    $time = strtotime($date);
    $time = date('d/m/y', $time);
} else {
    $time = date('d/m/y');
}

$dateInput = $time;

$l = 0;

// TODO: change dateInput to date_time

$date_time = substr($time, 0, 8);
$date_time = '%' . $date_time . '%';

mysql_select_db($dbname, $objConnect);
$item_sql_1 = "SELECT i.amp_item, 
                    i.id_item, 
                    i.doc,
                    i.item, 
                    i.date_time, 
                    i.bath, 
                    i.staus,
                    amp.`Name` AS amp_name
                    FROM item as i
                    INNER JOIN amp ON amp.id = i.amp_item
                    WHERE date_time LIKE '$date_time'
                    ORDER BY i.id_item DESC
                    LIMIT 300";
// $item_sql_1 = "SELECT * 
//                         FROM item
//                         WHERE date_time LIKE '$date_time'
//                         ORDER BY id_item DESC
//                         LIMIT 300";
$item_query_1 = mysql_query($item_sql_1, $objConnect) or die(mysql_error());
$row_count = mysql_num_rows($item_query_1);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd" []>
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
    
    <!-- start Input Date  -->
    <link rel="stylesheet" type="text/css" href="css/smoothness/jquery-ui-1.7.2.custom.css">  
    <script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>  
    <script type="text/javascript" src="js/jquery-ui-1.7.2.custom.min.js"></script>  
    <script type="text/javascript">  
		$(function(){  
		    // แทรกโค้ต jquery  
		    $("#dateInput").datepicker({
                // dateFormat: 'd/m/y',
                onSelect: function (dateText) {
                    $('#item_daily_report_form').submit();
                },
            });  
		});  
		</script> 
    <!-- end Input Date  -->

</head>

<body>
    <?php include 'include/header.inc.php'; ?>

    <div class="cleared reset-box"></div>
    <div class="rnut-bar rnut-nav">
        <div class="rnut-nav-outer">
            <ul class="rnut-hmenu">
                <li>
                    <a href="menu_pro.php" class="active">Back</a>
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
                                <h2 class="rnut-postheader" style="text-align: center;">รายงานบันทึกการเบิกจ่ายรายวัน</h2>
                                <br/>
                                <div align="center">
                                    <font size="6" color="blue"> <?php echo "วันที่: " . $time; ?></font size="5" color="blue">    
                                </div>
                                <!-- <h3> <?php echo "date: " . $date; ?></h3> -->
                                <!-- <h3> <?php echo "date_time: " . $date_time; ?></h3> -->

                                <br>
                                <div align="center">
                                    <table width="70%" align="center" border="0" cellspacing="1" cellpadding="3" bgcolor='#FFFF99'>
                                        <tr>
                                            
                                            
                                            <form id="item_daily_report_form" action="item_daily_report.php" method="post">
                                                <td>
                                                    <div class="">วันที่</div>
                                                </td>
                                                <td>	
                                                    <input autocomplete="off" type="text" name="dateInput" id="dateInput" size="13" style="font: 12pt tahoma; color: #ff0000;background: #eff48a; border: 1px black solid" align="center" />
                                                    <br>
                                                    <?php $dateInput=''?>

                                                    <INPUT TYPE="hidden" name="dateinput" value=<?=$dateInput?>>
                                                </td>
                                                <!-- <td>
                                                    <input type="submit" value=" ตกลง ">
                                                </td> -->
                                            </form>
                                        </tr>
                                        <tr>
                                        </tr>
                                    </table>

                                    <P>
                                        <table width="70%" align="center" border="0" cellspacing="1" cellpadding="3">
                                            <tr bgcolor='#FFCC00'>
                                        
                                                    <th scope="col">#</th>
                                                    <th scope="col">id</th>
                                                    <th scope="col">หน่วยงาน</th>
                                                    <th scope="col">เลขที่เอกสาร</th>
                                                    <th scope="col">รายการ</th>
                                                    <th scope="col">งบประมาณ</th>
                                                    <th scope="col">สถานะ</th>
                                                    <th scope="col">วันที่บันทึก</th>


                                            </tr>
                                            <?php
                                            if ($row_count > 0) {
                                            $item = mysql_fetch_assoc($item_query_1);
                                            do {
                                                $l++;
                                                $ii = ($l % 2)
                                            ?>
                                                <tr <?if($ii !=1){echo "bgcolor='#eaeaea'" ;}?> class='off unamed1' onmouseover=this.className='onping' onmouseout=this.className='off' style='cursor:hand' >

                                                    <?php $id_item = $item['id_item']; ?>
                                                    <!-- l -->
                                                    <td style="text-align:center;vertical-align:middle">
                                                        <font size="2" color="#000099"><?php echo $l; ?></font>
                                                    </td>
                                                    <!-- id -->
                                                    <td style="text-align:center;vertical-align:middle">
                                                    
                                                        <font size="3" color="red"><?php echo $item['id_item']; ?></font>
                                                    
                                                        <form id="form1" name="form1" method="post" action="prov_statuss1.php?rand=<?php echo rand(); ?>"></th>       
                                                                <input type="submit" name="Submit" value="Go">
                                                                <input type="hidden" name="idd" value="<?php echo $item['id_item']; ?>" />
                                                        </form>
                                                    </td>
                                                    <!-- หน่วยงาน -->
                                                    <td style="text-align:left;vertical-align:middle">
                                                        <font size="2" color="#000099"><?php echo $item['amp_name']; ?></font>
                                                    </td>
                                                    <!-- เลขที่เอกสาร -->
                                                    <td style="text-align:left;vertical-align:middle">
                                                        <font size="2" color="#000099">
                                                            <?php 
                                                                $doc = $item['doc'];

                                                                $findme_1 = "ลว";
                                                                $findme_2 = "ลงวัน";
        
                                                                $pos_1 = strpos($item["doc"], $findme_1);
                                                                $pos_2 = strpos($item["doc"], $findme_2);
        
                                                                // echo "pos_1=" . $pos_1;
                                                                // echo "<br>";
                                                                // echo "pos_2=" . $pos_2;
        
                                                                if ($pos_1 !== false) {
                                                                    $doc = substr($item["doc"], 0, $pos_1);
                                                                } 
        
                                                                if ($pos_2 !== false) {
                                                                    $doc = substr($item["doc"], 0, $pos_2);
                                                                }

                                                                echo $doc;
                                                            ?>
                                                        </font>
                                                    </td>
                                                    <!-- รายการ -->
                                                    <td style="text-align:left;vertical-align:middle">
                                                        <font size="2" color="#000099"><?php echo $item['item']; ?></font>
                                                    </td>
                                                    <!-- งบประมาณ -->
                                                    <td style="text-align:right;vertical-align:middle">
                                                        <font size="2" color="#000099"><?php echo number_format($item['bath'], 2); ?></font>
                                                    </td>
                                                    <!-- สถานะ -->
                                                    <td style="vertical-align:middle">                                                            
                                                        <font size="2" color="#000099">
                                                            <?php
                                                                $pic = NULL;
                                                                $_status = $item['staus'];
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

                                                                if ($_status == 5){
                                                                    echo "<div align='center'><img src='$pic' width='90%' border='0' alt='$_statusStr'></div> "; 
                                                                  }else{
                                                                    echo "<div align='center' width='100'><img src='$pic' width='90%' border='0' alt='$_statusStr'></div> "; 
                                                                  }
                                                                // echo $_statusStr;
                                                                // echo "<font size='3' color='#000099'>$_status : $_statusStr</font>"
                                                            ?>
                                                        </font>
                                                    </td>
                                                    <!-- สถานะ -->
                                                    <td style="vertical-align:middle">
                                                        <font size="2" color="#000099"><?php echo $item['date_time']; ?></font>
                                                    </td>
                                                </tr>
                                                <?php } while ($item = mysql_fetch_assoc($item_query_1)); } ?>
                                        </table>
                                </div>
                                <!-- end การแก้ไขข้อมูล -->
                                <?php include("./include/footer.inc"); ?>
</body>

</html>

<!-- TODO: cover_sheet_aad -->
<!-- TODO: cover_sheet_edit -->
<!-- TODO: cover_sheet_del -->