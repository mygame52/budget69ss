<?php
session_start();
require_once('config.inc.php');
// start หากไม่ได้เข้าใช้งานจากเมนู
if (trim($hid1) <> "03") {
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=menu_pro.php\" />";
}
// end หากไม่ได้เข้าใช้งานจากเมนู


$month = NULL;
$monthInput = NULL;

if (!empty($_REQUEST['monthInput'])) {
    $monthInput = $_REQUEST['monthInput'];
} else {
    $date = date('d/m/y');
    $monthInput = substr($date, 3, 7);
}


$l = 0;


$month = '%' . $monthInput . '%';

mysql_select_db($dbname, $objConnect);
$item_sql_1 = "SELECT
                    i.amp_item,	
                    amp.`Name` AS amp_name,
                    i.id_item,
                    i.doc,
                    i.item,
                    i.date_time,
                    i.bath,
                    i.staus,
                    i.c_khong
                FROM
                    item AS i
                INNER JOIN amp ON amp.id = i.amp_item
                WHERE
                    i.date_time LIKE '$month'
                ORDER BY
                    i.c_khong ASC";
                    
$item_query_1 = mysql_query($item_sql_1, $objConnect) or die(mysql_error());
$row_count = mysql_num_rows($item_query_1);

$total_1111 = 0;
$total_2222 = 0;
$total_3333 = 0;
$total_4444 = 0;
$total_5555 = 0;
$total_6666 = 0;
$total_7777 = 0;
$total_8888 = 0;

$status0_1111 = 0;
$status1_1111 = 0;
$status2_1111 = 0;
$status3_1111 = 0;
$status4_1111 = 0;
$status5_1111 = 0;

$status0_2222 = 0;
$status1_2222 = 0;
$status2_2222 = 0;
$status3_2222 = 0;
$status4_2222 = 0;
$status5_2222 = 0;

$status0_3333 = 0;
$status1_3333 = 0;
$status2_3333 = 0;
$status3_3333 = 0;
$status4_3333 = 0;
$status5_3333 = 0;

$status0_4444 = 0;
$status1_4444 = 0;
$status2_4444 = 0;
$status3_4444 = 0;
$status4_4444 = 0;
$status5_4444 = 0;

$status0_5555 = 0;
$status1_5555 = 0;
$status2_5555 = 0;
$status3_5555 = 0;
$status4_5555 = 0;
$status5_5555 = 0;

$status0_6666 = 0;
$status1_6666 = 0;
$status2_6666 = 0;
$status3_6666 = 0;
$status4_6666 = 0;
$status5_6666 = 0;

$status0_7777 = 0;
$status1_7777 = 0;
$status2_7777 = 0;
$status3_7777 = 0;
$status4_7777 = 0;
$status5_7777 = 0;

$status0_8888 = 0;
$status1_8888 = 0;
$status2_8888 = 0;
$status3_8888 = 0;
$status4_8888 = 0;
$status5_8888 = 0;

$item_query_calc = mysql_query($item_sql_1, $objConnect) or die(mysql_error());

for ($i = 0; $i < $row_count; $i++) {
    $item_array = mysql_fetch_array($item_query_calc);
    $samnak_code_sam =  substr(trim($item_array['c_khong']), 2, 4);

    // ----------------- 1111 -----------------------
    if ($samnak_code_sam == '1111') {
        $total_1111++;

        if ($item_array['staus'] == 0) {
            $status0_1111++;
        }
        
        if ($item_array['staus'] == 1) {
            $status1_1111++;
        }

        if ($item_array['staus'] == 2) {
            $status2_1111++;
        }

        if ($item_array['staus'] == 3) {
            $status3_1111++;
        }

        if ($item_array['staus'] == 4) {
            $status4_1111++;
        }

        if ($item_array['staus'] == 5) {
            $status5_1111++;
        }
    }

    // ----------------- 2222 -----------------------
    if ($samnak_code_sam == '2222') {
        $total_2222++;

        if ($item_array['staus'] == 0) {
            $status0_2222++;
        }
        
        if ($item_array['staus'] == 1) {
            $status1_2222++;
        }

        if ($item_array['staus'] == 2) {
            $status2_2222++;
        }

        if ($item_array['staus'] == 3) {
            $status3_2222++;
        }

        if ($item_array['staus'] == 4) {
            $status4_2222++;
        }

        if ($item_array['staus'] == 5) {
            $status5_2222++;
        }
    }

    // ----------------- 3333 -----------------------
    if ($samnak_code_sam == '3333') {
        $total_3333++;

        if ($item_array['staus'] == 0) {
            $status0_3333++;
        }
        
        if ($item_array['staus'] == 1) {
            $status1_3333++;
        }

        if ($item_array['staus'] == 2) {
            $status2_3333++;
        }

        if ($item_array['staus'] == 3) {
            $status3_3333++;
        }

        if ($item_array['staus'] == 4) {
            $status4_3333++;
        }

        if ($item_array['staus'] == 5) {
            $status5_3333++;
        }
    }

    // ----------------- 4444 -----------------------
    if ($samnak_code_sam == '4444') {
        $total_4444++;

        if ($item_array['staus'] == 0) {
            $status0_4444++;
        }
        
        if ($item_array['staus'] == 1) {
            $status1_4444++;
        }

        if ($item_array['staus'] == 2) {
            $status2_4444++;
        }

        if ($item_array['staus'] == 3) {
            $status3_4444++;
        }

        if ($item_array['staus'] == 4) {
            $status4_4444++;
        }

        if ($item_array['staus'] == 5) {
            $status5_4444++;
        }
        
    }
    
    // ----------------- 5555 -----------------------
    if ($samnak_code_sam == '5555') {
        $total_5555++;
  
        if ($item_array['staus'] == 0) {
            $status0_5555++;
        }
        
        if ($item_array['staus'] == 1) {
            $status1_5555++;
        }

        if ($item_array['staus'] == 2) {
            $status2_5555++;
        }

        if ($item_array['staus'] == 3) {
            $status3_5555++;
        }

        if ($item_array['staus'] == 4) {
            $status4_5555++;
        }

        if ($item_array['staus'] == 5) {
            $status5_5555++;
        }
        
    }

    // ----------------- 6666 -----------------------
    if ($samnak_code_sam == '6666') {
        $total_6666++;

        if ($item_array['staus'] == 0) {
            $status0_6666++;
        }
        
        if ($item_array['staus'] == 1) {
            $status1_6666++;
        }

        if ($item_array['staus'] == 2) {
            $status2_6666++;
        }

        if ($item_array['staus'] == 3) {
            $status3_6666++;
        }

        if ($item_array['staus'] == 4) {
            $status4_6666++;
        }

        if ($item_array['staus'] == 5) {
            $status5_6666++;
        }
        
    }

    // ----------------- 7777 -----------------------
    if ($samnak_code_sam == '7777') {
        $total_7777++;

        if ($item_array['staus'] == 0) {
            $status0_7777++;
        }
        
        if ($item_array['staus'] == 1) {
            $status1_7777++;
        }

        if ($item_array['staus'] == 2) {
            $status2_7777++;
        }

        if ($item_array['staus'] == 3) {
            $status3_7777++;
        }

        if ($item_array['staus'] == 4) {
            $status4_7777++;
        }

        if ($item_array['staus'] == 5) {
            $status5_7777++;
        }
        
    }

    // ----------------- 8888 -----------------------
    if ($samnak_code_sam == '8888') {
        $total_8888++;

        if ($item_array['staus'] == 0) {
            $status0_8888++;
        }
        
        if ($item_array['staus'] == 1) {
            $status1_8888++;
        }

        if ($item_array['staus'] == 2) {
            $status2_8888++;
        }

        if ($item_array['staus'] == 3) {
            $status3_8888++;
        }

        if ($item_array['staus'] == 4) {
            $status4_8888++;
        }

        if ($item_array['staus'] == 5) {
            $status5_8888++;
        }
        
    }

}


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
                                <h2 class="rnut-postheader" style="text-align: center;">รายงานบันทึกการเบิกจ่ายรายเดือน</h2>
                                <br/>
                                <div align="center">
                                    <form id="item_monthly_report_form" action="item_monthly_report.php" method="post">
                                        <table width="90%" align="center" border="0" cellspacing="1" cellpadding="3" bgcolor='#FFFF99'>
                                            <tr>
                                                <th width="90%">	
                                                    <select name="monthInput"  style="font: 11pt tahoma; color: #000000;background: #ffff66; border: 1px black solid" align="center" >
                                                        <option value="10/22" <?php if($monthInput == '10/22') echo 'selected' ?>>ตุลาคม 2565</option>
                                                        <option value="11/22" <?php if($monthInput == '11/22') echo 'selected' ?> >พฤศจิกายน 2565</option>
                                                        <option value="12/22" <?php if($monthInput == '12/22') echo 'selected' ?>>ธันวาคม 2565</option>
                                                        <option value="01/23" <?php if($monthInput == '01/23') echo 'selected' ?>>มกราคม 2566</option>
                                                        <option value="02/23" <?php if($monthInput == '02/23') echo 'selected' ?>>กุมภาพันธ์ 2566</option>
                                                        <option value="03/23" <?php if($monthInput == '03/23') echo 'selected' ?>>มีนาคม 2566</option>
                                                        <option value="04/23" <?php if($monthInput == '04/23') echo 'selected' ?>>เมษายน 2566</option>
                                                        <option value="05/23" <?php if($monthInput == '05/23') echo 'selected' ?>>พฤษภาคม 2566</option>
                                                        <option value="06/23" <?php if($monthInput == '06/23') echo 'selected' ?>>มิถุนายน 2566</option>
                                                        <option value="07/23" <?php if($monthInput == '07/23') echo 'selected' ?>>กรกฎาคม 2566</option>
                                                        <option value="08/23" <?php if($monthInput == '08/23') echo 'selected' ?>>สิงหาคม 2566</option>
                                                        <option value="09/23" <?php if($monthInput == '09/23') echo 'selected' ?>>กันยายน 2566</option>

                                                    </select>
                                                    <input type="submit" name="Submit" value="Go">
                                                </th>
                                            </tr>
                                        </table>
                                    </form>
                                </div>
                                <div align="center">
                                    <font size="5" color="blue"> <?php echo "จำนวน: " . $row_count . " รายการ"; ?></font size="5" color="blue">    
                                </div>

                                <div align="center">
                                    <table width="90%" align="center" border="0" cellspacing="1" cellpadding="3" bgcolor='#FFFF99'>
                                        <tr style="background-color: aqua;">
                                            <th scope="col"></th>
                                            <!-- 1111 บุคลากร -->
                                            <th scope="col"><font size="4">1111 <br>บุคลากร</font></th> 
                                            <th scope="col"><font size="4">2222 <br>งบลงทุน ผลผลิตที่ 4</font></th> 
                                            <th scope="col"><font size="4">3333 <br>งบลงทุน ผลผลิตที่ 5</font></th> 
                                            <th scope="col"><font size="4">4444 <br>งบดำเนินงาน ผลผลิตที่ 4</font></th>
                                            <th scope="col"><font size="4">5555 <br>งบดำเนินงาน ผลผลิตที่ 5</font></th>
                                            <th scope="col"><font size="4">6666 <br>งบเงินอุดหนุน</font></th>
                                            <th scope="col"><font size="4">7777 <br>งบประมาณอื่นๆ</font></th>
                                            <th scope="col"><font size="4">8888 <br>งบรายจ่ายอื่น</font></th>
                                        </tr>    
                                        <tr class='off unamed1' onmouseover=this.className='onping' onmouseout=this.className='off' style='cursor:hand'>
                                            <td><div align="center"><font size="5">ทั้งหมด</font></div></td>
                                            <td style="text-align:center;vertical-align:middle"><font size="4"><?php echo $total_1111; ?></font></td>
                                            <td style="text-align:center;vertical-align:middle"><font size="4"><?php echo $total_2222; ?></font></td>
                                            <td style="text-align:center;vertical-align:middle"><font size="4"><?php echo $total_3333; ?></font></td>
                                            <td style="text-align:center;vertical-align:middle"><font size="4"><?php echo $total_4444; ?></font></td>
                                            <td style="text-align:center;vertical-align:middle"><font size="4"><?php echo $total_5555; ?></font></td>
                                            <td style="text-align:center;vertical-align:middle"><font size="4"><?php echo $total_6666; ?></font></td>
                                            <td style="text-align:center;vertical-align:middle"><font size="4"><?php echo $total_7777; ?></font></td>
                                            <td style="text-align:center;vertical-align:middle"><font size="4"><?php echo $total_8888; ?></font></td>
                                        </tr>
                                        <tr class='off unamed1' onmouseover=this.className='onping' onmouseout=this.className='off' style='cursor:hand'>
                                            <td style="text-align:center;vertical-align:middle"><div align='center'><img src='image/status0.png' width='120px' border='0' alt='ส่งเอกสาร'></div></td>
                                            <td style="text-align:center;vertical-align:middle"><font size="4"><?php echo $status0_1111; ?></font></td>
                                            <td style="text-align:center;vertical-align:middle"><font size="4"><?php echo $status0_2222; ?></font></td>
                                            <td style="text-align:center;vertical-align:middle"><font size="4"><?php echo $status0_3333; ?></font></td>
                                            <td style="text-align:center;vertical-align:middle"><font size="4"><?php echo $status0_4444; ?></font></td>
                                            <td style="text-align:center;vertical-align:middle"><font size="4"><?php echo $status0_5555; ?></font></td>
                                            <td style="text-align:center;vertical-align:middle"><font size="4"><?php echo $status0_6666; ?></font></td>
                                            <td style="text-align:center;vertical-align:middle"><font size="4"><?php echo $status0_7777; ?></font></td>
                                            <td style="text-align:center;vertical-align:middle"><font size="4"><?php echo $status0_8888; ?></font></td>
                                        </tr>
                                        <tr class='off unamed1' onmouseover=this.className='onping' onmouseout=this.className='off' style='cursor:hand'>
                                            <td style="text-align:center;vertical-align:middle"><div align='center'><img src='image/status1.png' width='120px' border='0' alt='ส่งเอกสาร'></div></td>
                                            <td style="text-align:center;vertical-align:middle"><font size="4"><?php echo $status1_1111; ?></font></td>
                                            <td style="text-align:center;vertical-align:middle"><font size="4"><?php echo $status1_2222; ?></font></td>
                                            <td style="text-align:center;vertical-align:middle"><font size="4"><?php echo $status1_3333; ?></font></td>
                                            <td style="text-align:center;vertical-align:middle"><font size="4"><?php echo $status1_4444; ?></font></td>
                                            <td style="text-align:center;vertical-align:middle"><font size="4"><?php echo $status1_5555; ?></font></td>
                                            <td style="text-align:center;vertical-align:middle"><font size="4"><?php echo $status1_6666; ?></font></td>
                                            <td style="text-align:center;vertical-align:middle"><font size="4"><?php echo $status1_7777; ?></font></td>
                                            <td style="text-align:center;vertical-align:middle"><font size="4"><?php echo $status1_8888; ?></font></td>
                                        </tr>
                                        <tr class='off unamed1' onmouseover=this.className='onping' onmouseout=this.className='off' style='cursor:hand'>
                                            <td style="text-align:center;vertical-align:middle"><div align='center'><img src='image/status2.png' width='120px' border='0' alt='ส่งเอกสาร'></div></td>
                                            <td style="text-align:center;vertical-align:middle"><font size="4"><?php echo $status2_1111; ?></font></td>
                                            <td style="text-align:center;vertical-align:middle"><font size="4"><?php echo $status2_2222; ?></font></td>
                                            <td style="text-align:center;vertical-align:middle"><font size="4"><?php echo $status2_3333; ?></font></td>
                                            <td style="text-align:center;vertical-align:middle"><font size="4"><?php echo $status2_4444; ?></font></td>
                                            <td style="text-align:center;vertical-align:middle"><font size="4"><?php echo $status2_5555; ?></font></td>
                                            <td style="text-align:center;vertical-align:middle"><font size="4"><?php echo $status2_6666; ?></font></td>
                                            <td style="text-align:center;vertical-align:middle"><font size="4"><?php echo $status2_7777; ?></font></td>
                                            <td style="text-align:center;vertical-align:middle"><font size="4"><?php echo $status2_8888; ?></font></td>
                                        </tr>
                                        <tr class='off unamed1' onmouseover=this.className='onping' onmouseout=this.className='off' style='cursor:hand'>
                                            <td style="text-align:center;vertical-align:middle"><div align='center'><img src='image/status3.png' width='120px' border='0' alt='ส่งเอกสาร'></div></td>
                                            <td style="text-align:center;vertical-align:middle"><font size="4"><?php echo $status3_1111; ?></font></td>
                                            <td style="text-align:center;vertical-align:middle"><font size="4"><?php echo $status3_2222; ?></font></td>
                                            <td style="text-align:center;vertical-align:middle"><font size="4"><?php echo $status3_3333; ?></font></td>
                                            <td style="text-align:center;vertical-align:middle"><font size="4"><?php echo $status3_4444; ?></font></td>
                                            <td style="text-align:center;vertical-align:middle"><font size="4"><?php echo $status3_5555; ?></font></td>
                                            <td style="text-align:center;vertical-align:middle"><font size="4"><?php echo $status3_6666; ?></font></td>
                                            <td style="text-align:center;vertical-align:middle"><font size="4"><?php echo $status3_7777; ?></font></td>
                                            <td style="text-align:center;vertical-align:middle"><font size="4"><?php echo $status3_8888; ?></font></td>
                                        </tr>
                                        <tr class='off unamed1' onmouseover=this.className='onping' onmouseout=this.className='off' style='cursor:hand'>
                                            <td><div align='center'><img src='image/status4.png' width='120px' border='0' alt='ส่งเอกสาร'></div></td>
                                            <td style="text-align:center;vertical-align:middle"><font size="4"><?php echo $status4_1111; ?></font></td>
                                            <td style="text-align:center;vertical-align:middle"><font size="4"><?php echo $status4_2222; ?></font></td>
                                            <td style="text-align:center;vertical-align:middle"><font size="4"><?php echo $status4_3333; ?></font></td>
                                            <td style="text-align:center;vertical-align:middle"><font size="4"><?php echo $status4_4444; ?></font></td>
                                            <td style="text-align:center;vertical-align:middle"><font size="4"><?php echo $status4_5555; ?></font></td>
                                            <td style="text-align:center;vertical-align:middle"><font size="4"><?php echo $status4_6666; ?></font></td>
                                            <td style="text-align:center;vertical-align:middle"><font size="4"><?php echo $status4_7777; ?></font></td>
                                            <td style="text-align:center;vertical-align:middle"><font size="4"><?php echo $status4_8888; ?></font></td>
                                        </tr>
                                        <tr class='off unamed1' onmouseover=this.className='onping' onmouseout=this.className='off' style='cursor:hand'>
                                            <td><div align='center'><img src='image/status5.png' width='120px' border='0' alt='ส่งเอกสาร'></div></td>
                                            <td style="text-align:center;vertical-align:middle"><font size="4"><?php echo $status5_1111; ?></font></td>
                                            <td style="text-align:center;vertical-align:middle"><font size="4"><?php echo $status5_2222; ?></font></td>
                                            <td style="text-align:center;vertical-align:middle"><font size="4"><?php echo $status5_3333; ?></font></td>
                                            <td style="text-align:center;vertical-align:middle"><font size="4"><?php echo $status5_4444; ?></font></td>
                                            <td style="text-align:center;vertical-align:middle"><font size="4"><?php echo $status5_5555; ?></font></td>
                                            <td style="text-align:center;vertical-align:middle"><font size="4"><?php echo $status5_6666; ?></font></td>
                                            <td style="text-align:center;vertical-align:middle"><font size="4"><?php echo $status5_7777; ?></font></td>
                                            <td style="text-align:center;vertical-align:middle"><font size="4"><?php echo $status5_8888; ?></font></td>
                                        </tr>
                                    </table>
                                </div>

                                <br>
                                
                                <div align="center">
                                  <!-- ตารางแสดงรายการ -->

                                   
                                </div>
                                <!-- end การแก้ไขข้อมูล -->
                                <?php include("./include/footer.inc"); ?>
</body>

</html>

<!-- TODO: cover_sheet_aad -->
<!-- TODO: cover_sheet_edit -->
<!-- TODO: cover_sheet_del -->