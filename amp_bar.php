<?php
session_start();

include("config.inc.php");
include("FusionCharts.php");   // manage graph
//include("fgets_explode.php"); // manage graph

if (trim($hid8) <> "908") {
    echo "	<SCRIPT language='JavaScript'>";
    echo "			alert('ท่านเข้าสู่ระบบไม่ถูกต้อง')";
    echo"			location.href='index.php'";
    echo"	</SCRIPT>";
    exit();
}
$ae = "on";
Session_register("ae");
$amp_bar = $_SESSION["amp_bar"];
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
        <SCRIPT LANGUAGE="Javascript" SRC="FusionCharts.js"></SCRIPT>
    </head>
    <body>
        <?php
//include("calculate_bar.php");
        mysql_connect($dbserver, $dbuser, $dbpass) or
                die("<hr><b> เชื่อมต่อฐานข้อมูลไม่ได้>");

        mysql_select_db($dbname) or die("เลือกฐานข้อมูลไม่ได้");

        $sql = ("select * from samnak ORDER BY code_sam ASC");
        $result = mysql_query($sql);
        $num_rows = mysql_num_rows($result); //จำนวนที่เลือกได้

        $t_pay = 0;
        $tr_rab = 0;
        $tr_rua = 0;
        $tpee = 0;
        for ($i = 1; $i <= $num_rows; $i++) {
            //echo $i."<BR>";
            $fet_work = mysql_fetch_array($result);
            $code_w[$i] = trim($fet_work['code_sam']);
            $nam_w[$i] = $fet_work['nam_sam'];
            $ngen_p[$i] = $fet_work['mony_pee'];
            //echo $code_w[$i];
            $r_rab = 0;
            $r_pay = 0;
            $sql_j = ("select * from judsun where amp = '$amp_bar' and work = '$code_w[$i]'");

            //echo "sql---".$sql_j ."<br>";

            $result_j = mysql_db_query($dbname, $sql_j);
            echo mysql_error();

            $num_rows_j = mysql_num_rows($result_j); //จำนวนที่เลือกได้
            //echo "จำนวนในจัดสรร".$num_rows_j."<BR>";
            for ($j = 1; $j <= $num_rows_j; $j++) {
                $fetcharr = mysql_fetch_array($result_j);
                //$id = $fetcharr['code'];
                //$name = $fetcharr['work'];
                //	$r_rab = $r_rab + $fetcharr['rab']+$fetcharr['rab2'];
                $r_pay = $r_pay + $fetcharr['rua'];
            }

            //$t_pay=$t_pay + $r_pay;		
            //$tpee=$tpee+$ngen_w;  

            $mony_pay[$i] = $r_pay;
        }
//echo $i;
        ?>
        <?php
        for ($i = 1; $i <= $num_rows; $i++) {

            $pee[$i] = number_format($ngen_p[$i], 2);
            $pay[$i] = number_format($mony_pay[$i], 2);
            if ($ngen_p[$i] > 0) {
                $per[$i] = number_format($mony_pay[$i] * 100 / $ngen_p[$i], 2);
            } else {
                $per[$i] = 0;
            }
        }

        $f1 = fopen("./grap/grap_bar00.ini", "w");
        for ($i = 1; $i <= $num_rows; $i++) {
//		fputs($f1,$code_w[$i]."  ".$nam_w[$i]."   ".$pee[$i]."  ".$pay[$i]."  ".$per[$i]."<BR>\n");
            fputs($f1, $nam_w[$i] . "   " . $per[$i] . "  " . "<BR>\n");
        }
        fclose($f1);
        $tt = number_format($num_rows, 2);
        $f2 = fopen("./grap/bar_bar00.ini", "w");  //เก็บจำนวนแท่งกราฟ
        fputs($f2, $tt);
        fclose($f2);


        $f1 = "grap/grap_bar00.ini";
        $fp = fopen($f1, "r");
        $i = 0;
        while (!feof($fp)) {
            $i++;
            $exp[$i] = explode("  ", fgets($fp));
        }
        $f2 = "./grap/bar_bar00.ini";
        $fp2 = fopen($f2, "r");
        $arr_total = fgets($fp2);
        fclose($fp2);

        //ไฟล์  อ่านและแยกคำอยู่ที่ fgets_explode.php
        ?>        

        <?php include './include/header.inc.php'; ?>

        <div class="cleared reset-box"></div>
        <div class="rnut-bar rnut-nav">
            <div class="rnut-nav-outer">
                <ul class="rnut-hmenu">
                    <li>
                        <a href="#" class="active">สำหรับอำเภอ</a>
                    </li>	
                    <li>
                        <a href="./menu_amp.php">Home</a>
                    </li>	
                </ul>
            </div>
        </div>
        <div class="cleared reset-box"></div>
        <div class="rnut-layout-wrapper">
            <div class="rnut-content-layout">
                <div class="rnut-content-layout-row">
                    <div class="rnut-layout-cell rnut-sidebar1">
                        <div class="rnut-box rnut-vmenublock">
                            <div class="rnut-block clearfix">
                                <div class="rnut-blockheader">
                                    <h2 class="t"><font size="2" class="rnut-postcontent">มุมบริการ</font></h2>
                                </div>
                                <div class="rnut-postcontent">
                                    <img width="22" height="21" alt="" class="rnut-lightbox" src="image/cart.png" style="margin-top:"></img>
                                    <font size="2" class="rnut-postcontent"><a href="./amp_remain_yuem.php">ตรวจสอบ:ค้างเงินยืม</a></font>
                                </div>
                                <div class="rnut-postcontent">
                                    <img width="22" height="21" alt="" class="rnut-lightbox" src="images/history-large.png" style="margin-top:"></img>
                                    <font size="2" class="rnut-postcontent"><a href="./amp_yuem_person_show.php">ตรวจสอบ:สิทธิการยืมเงิน</a></font>
                                </div>
                                <div class="rnut-postcontent">
                                    <img width="22" height="21" alt="" class="rnut-lightbox" src="images/graph.png" style="margin-top:"></img>
                                    <font size="2" class="rnut-postcontent"><a href="./amp_bar.php">กราฟงบประมาณ</a></font>
                                </div>

                            </div>    

                        </div>
                        <div class="cleared"></div>
                    </div>
                    <div class="rnut-layout-cell rnut-content">
                        <div class="rnut-box rnut-post">
                            <div class="rnut-box-body rnut-post-body">
                                <div class="rnut-post-inner rnut-article">
                                    <!-- start Block center -->
                                    <h2 class="rnut-postheader">กราฟแสดงการเบิกจ่าย : <?php echo $full_name; ?></h2>
                                    <div class="rnut-postcontent">
                                        <?php
                                        $animateChart = "1";
                                        $cap2 = "Graph for Budget";

                                        $strXML1 = "<chart caption='$cap2' pieSliceDepth='30' showBorder='1' formatNumberScale='0' numberSuffix='  ' animation=' " . $animateChart . "'>";

                                        for ($i = 1; $i <= $arr_total; $i++) {

                                            $strXML1 .= "<set label='" . $exp[$i][0] . "' value='" . $exp[$i][1] . "' />";
                                        }

                                        $strXML1 .= "</chart>";
                                        // Column2D.swf  Column3D.swf  Pie3D.swf

                                        echo renderChart("Column3D.swf", "", $strXML1, "FactorySum", "100%", "400px", false, false);
                                        ?> 


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- end Block center -->
        <?php include("./include/footer.inc"); ?>
    </body>
</html>
