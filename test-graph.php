<?php
include("config.inc.php");
mysql_connect($dbserver, $dbuser, $dbpass) or
        die("<hr><b> can't connect to database");

mysql_select_db($dbname) or die("can't to database");

    $animateChart = "1";

//$strXML will be used to store the entire XML document generated
//Generate the chart element
$strXML = "<chart caption='graph' pieSliceDepth='30' showBorder='1' formatNumberScale='0' numberSuffix=' �ѹ' animation=' " . $animateChart . "'>";

$strQuery = "select distinct(work) as work , sum(rab) as rab, sum(rab2) as rab2, sum(rab3) as rab3, sum(rab4) as rab4, sum(rua) as rua from judsun where amp = '00' group by work";
$result2 = mysql_query($strQuery) or die(mysql_error());

if ($result2) {
    while ($ors2 = mysql_fetch_array($result2)) {
        $d1 = $ors2['work'];
        $sql_d1 = mysql_query("select * from samnak where code_sam='$d1'");
        $row_d1 = mysql_fetch_array($sql_d1);
        $rab_total = $ors2['rab']+$ors2['rab2']+$ors2['rab3']+$ors2['rab4'];
        
        $strXML .= "<set label='" . $row_d1['nam_sam'] . "' value='" .$rab_total . "' />";
    }
}

$strXML .= "</chart>";

//Create the chart - Pie 3D Chart with data from strXML
echo renderChart("Column3D.swf", "", $strXML, "FactorySum", 600, 300, false, false);

?> 