
<?php
include("FusionCharts.php");
?>
<SCRIPT LANGUAGE="Javascript" SRC="FusionCharts.js"></SCRIPT>

<?php
$animateChart = "1"; // หากใช้ 1 คือ จะแสดงแบบ เคลื่อนไหว  หากใช้ 0 จะไม่เคลื่อนไหว ทดลองดูก็ได้
$strXML = "<chart caption='Sample Graph Report ' pieSliceDepth='30' showBorder='1' formatNumberScale='0' numberSuffix='  ' animation=' " . $animateChart . "'>";


include("fgets_explode.php");

for ($i=1; $i<=$arr_total; $i++){

	$strXML .= "<set label='" . $exp[$i][0] . "' value='" . $exp[$i][1] . "' />";

}

$strXML .= "</chart>";

//Create the chart - Pie 3D Chart with data from strXML
echo renderChart("Column3D.swf", "", $strXML, "FactorySum", "100%", "100%", false, false);
		  
?> 
