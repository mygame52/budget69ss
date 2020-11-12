<?php
session_start();
include("config.inc.php");
include("FusionCharts.php");   // manage graph
include("fgets_explode.php"); // manage graph


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
            $sql_j = ("select * from judsun where mid(code,3,4) like '$code_w[$i]'");
            $result_j = mysql_query($sql_j);
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

        $f1 = fopen("grap/grap_bar.ini", "w");
        for ($i = 1; $i <= $num_rows; $i++) {
//		fputs($f1,$code_w[$i]."  ".$nam_w[$i]."   ".$pee[$i]."  ".$pay[$i]."  ".$per[$i]."<BR>\n");
            fputs($f1, $nam_w[$i] . "   " . $per[$i] . "  " . "<BR>\n");
        }
        fclose($f1);
        $tt = number_format($num_rows, 2);
        $f2 = fopen("grap/bar_bar.ini", "w");  //เก็บจำนวนแท่งกราฟ
        fputs($f2, $tt);
        fclose($f2);

        //ไฟล์  อ่านและแยกคำอยู่ที่ fgets_explode.php
        ?>

        <?php include 'include/header.inc.php'; ?>

        
            <div class="rnut-content-layout">
                <div class="rnut-content-layout-row">

                    <div class="rnut-layout-cell rnut-content">
                        <div class="rnut-box rnut-post">
                            <div class="rnut-box-body rnut-post-body">
                                <div class="rnut-post-inner rnut-article">
                                    <!-- start Block center -->
                                    <h2 class="rnut-postheader">กราฟแสดงการใช้งบประมาณ</h2>
                                    <div class="rnut-postcontent" height="800">
                                        <?php
                                        $animateChart = "1";
                                        $cap2 = $mess_header_graph;

                                        $strXML = "<chart caption='$cap2' pieSliceDepth='30' showBorder='1' formatNumberScale='0' numberSuffix='  ' animation=' " . $animateChart . "'>";

                                        for ($i = 1; $i <= $arr_total; $i++) {

                                            $strXML .= "<set label='" . $exp[$i][0] . "' value='" . $exp[$i][1] . "' />";
                                        }

                                        $strXML .= "</chart>";
                                        // Column2D.swf  Column3D.swf  Pie3D.swf

                                        echo renderChart("Column3D.swf", "", $strXML, "FactorySum", "100%", "400px", false, false);
                                        ?> 
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
