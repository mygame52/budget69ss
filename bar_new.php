<?
$animateChart = "1"; // �ҡ�� 1 ��� ���ʴ�Ẻ ����͹���  �ҡ�� 0 ���������͹��� ���ͧ�١���
$cap2 = $mess_header_graph;

$strXML = "<chart caption='$cap2' pieSliceDepth='30' showBorder='1' formatNumberScale='0' numberSuffix='  ' animation=' " . $animateChart . "'>";

for ($i=1; $i<=$arr_total; $i++){

	$strXML .= "<set label='" . $exp[$i][0] . "' value='" . $exp[$i][1] . "' />";
	echo $exp[$i][0] . " - " . $exp[$i][1];
	echo "</br>";
}

$strXML .= "</chart>";
// Column2D.swf  Column3D.swf  Pie3D.swf

// echo renderChart("Column3D.swf", "", $strXML, "FactorySum", "100%", "400px", false, false);
		  
?> 