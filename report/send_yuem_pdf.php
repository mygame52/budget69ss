<?php session_start();
ob_start();
include("../config.inc.php");
//echo $id_item_pdf;        
// กำหนด เปลี่ยนเลข อารบิก เป็นเลขไทย 
include ('../include/function.php');
require('../fpdf/fpdf.php');


$pdf = new FPDF('P', 'mm', 'A4');

$pdf->AddFont('THSarabunNew', '', 'THSarabunNew.php');
// $pdf->Open();
$pdf->AliasNbPages();
$pdf->SetMargins(20, 5, 1);

//$amp_ = $_REQUEST['amp_pdf'];
$amp_ = $_REQUEST['amp_pdf'];
$id_item_ = $_REQUEST['id_item_pdf'];
if (isset($person_)==""){
	$person_="...................................................";
}
if (isset($citizenid_)==""){
	$citizenid_="...................................................";
}



//----------------------------------------------------------------------------------------------------------------------------------- หน้า 1
$pdf->AddPage();
//กำหนดตัวแปร บรรทัด
// เพิ่มรูปครุฑ 
$pdf->Image('../images/krut.jpg', 95, 10, 25, 0, '', '');
// Set font
$pdf->SetFont('THSarabunNew', '', 16);
// ค้นหาที่อยู่ หัวหนังสือ จะต้องเป็นของ จังหวัด
$sql = "select * from amp where id='00'";
$dbquery = mysql_db_query($dbname, $sql);
@mysql_query("SET NAMES UTF8");
$num_rows = mysql_num_rows($dbquery);
$i = 0;
while ($i < $num_rows) {
    $result = mysql_fetch_array($dbquery);
    $code = $result['id'];
    $name = $result['Name'];
    $numbook = $result['numbook'];
    $add1 = $result['add1'];
    $add2 = $result['add2'];
    $add3 = $result['add3'];
    $director = $result['director'];
    $tel = $result['tel'];
    $fax = $result['fax'];
    $i++;
}
// ค้นหาที่อยู่ หัวหนังสือ จะต้องเป็นของ กศน.อำเภอที่ต้างเงินยืม
$sql = "select * from amp where id='$amp_'";
$dbquery = mysql_db_query($dbname, $sql);
@mysql_query("SET NAMES UTF8");
$num_rows = mysql_num_rows($dbquery);
$ii = 0;
while ($ii < $num_rows) {
    $result_amp = mysql_fetch_array($dbquery);
    $codeS_amp = $result_amp['id'];
    $name_amp = $result_amp['Name'];
    $numbook_amp = $result_amp['numbook'];
    $add1_amp = $result_amp['add1'];
    $add2_amp = $result_amp['add2'];
    $add3_amp = $result_amp['add3'];
    $director_amp = $result_amp['director'];
    $tel_amp = $result_amp['tel'];
    $fax_amp = $result_amp['fax'];
    $ii++;
}

//พิมพ์หัวหนังสือ
$pdf->SetXY(20, 30);
$pdf->Write(10, thainumDigit(iconv('UTF-8', 'TIS620', 'ที่ ' . $numbook)));
$pdf->SetXY(140, 30);
$pdf->Write(10, thainumDigit(iconv('UTF-8', 'TIS620', $add1)));
$pdf->SetXY(140, 37);
$pdf->Write(10, thainumDigit(iconv('UTF-8', 'TIS620', $add2)));
$pdf->SetXY(140, 44);
$pdf->Write(10, thainumDigit(iconv('UTF-8', 'TIS620', $add3)));
//
//  -------- ค้นหา รายการเงินยืม -------------
//  -------------- Connect Database -----------------------

$sql = "SELECT * FROM `item` where id_item= '$id_item_' ";
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$i = 1;

if ($i == $num_rows) {
    $row_reg = mysql_fetch_array($dbquery);
    $idd = $row_reg['id_item'];
    $i3d = $idd;
    $amp = $row_reg['amp_item'];
    $doc = $row_reg['doc'];
    $c_khong = $row_reg['c_khong'];
    $item = $row_reg['item'];
    $bath = $row_reg['bath'];
    $staus = $row_reg['staus'];
    $date_time_pdf = $row_reg['date_time'];
    $datepay2 = $row_reg['date_pay'];
    $chk_id = $row_reg['chk_id'];
    $id_yuem_update2 = $row_reg['id_yuem'];
    $dateInput = $row_reg['note_item'];
}
// วันที่
//$pdf->SetXY(105,55);$pdf->Write(10,'๑๐ ตุลาคม ๒๕๕๕');
$thai_n = array("มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
$d_ = date("j");
$d = iconv('UTF-8', 'TIS620', thainumDigit($d_));

$m_ = $thai_n[date("n") - 1];
$m = iconv('UTF-8', 'TIS620', $m_);

$y_ = date("Y") + 543;
$y = iconv('UTF-8', 'TIS620', thainumDigit($y_));

$pdf->SetXY(105, 55);
$pdf->Write(10, thainumDigit($d . ' ' . $m . ' ' . $y));

//$pdf->Write(10,$today));
// เรื่อง
$pdf->SetXY(20, 64);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'เรื่อง'));
$pdf->SetXY(30, 64);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'ติดตามการใช้จ่ายเงินงบประมาณ (เงินยืม)'));
// เรียน
$pdf->SetXY(20, 74);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'เรียน'));
$pdf->SetXY(30, 74);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'ผู้อำนวยการ' . $add1_amp));
// สิ่งที่ส่งมาด้วย
$pdf->SetXY(20, 84);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'สิ่งที่ส่งมาด้วย'));
$pdf->SetXY(45, 84);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'สำเนาสัญญาเงินยืม'));
//$pdf->Write(10,thainumDigit($foryear));  //ปีงบประมาณ
$pdf->Write(10, iconv('UTF-8', 'TIS620', ' จำนวน ๑ ฉบับ'));
//$month_s = substr($monthpay,0,2);  // เดือนที่เลือก
// เนื้อความ หนังสือ
$pdf->SetXY(35, 94);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'ด้วยสำนักงานส่งเสริมการศึกษานอกระบบและการศึกษาตามอัธยาศัยจังหวัดสุราษฎร์ธานี ขอเรียนให้ทราบว่า'));
$pdf->SetXY(20, 101);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'ตามที่หน่วยงานของท่านได้ดำเนินจัดทำสัญญาเงินยืม เพื่อเป็นค่าใช้จ่ายสำหรับการดำเนินงานของส่วนราชการ ดังนี้.'));
$pdf->SetXY(20, 108);
$pdf->Write(10, iconv('UTF-8', 'TIS620', "รายการ : " . thainumDigit($item)));
$pdf->Write(10, iconv('UTF-8', 'TIS620', ' จำนวนเงิน : ' . thainumDigit(number_format($bath, 2)) . '  บาท'));
$pdf->SetXY(20, 115);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'ตั้งแต่วันที่ : ' . thainumDigit($datepay2)));

// ค้นหาข้อมูลผู้ค้างเงินยืม 
$sql = "select * from person_yuem where id_yuem='$id_yuem_update2'";
$dbquery = mysql_db_query($dbname, $sql);
@mysql_query("SET NAMES UTF8");
$num_rows = mysql_num_rows($dbquery);
$i2 = 0;
while ($i2 < $num_rows) {
    $result_person = mysql_fetch_array($dbquery);
    $id_yuem_ = $result_person['id_yuem'];
    $citizenid_ = $result_person['citizenid'];
    $person_ = $result_person['person'];
    $i2++;
}

$pdf->SetXY(20, 122);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'ผู้ยืมเงินคือ : ' . $person_ . '   หมายเลขบัตรประชาชน : ' . thainumDigit($citizenid_)));
$pdf->SetXY(20, 129);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'เลขที่หนังสือ : ' . thainumDigit($doc) . '   ลงวันที่ : ' . thainumDigit($date_time_pdf)));
//$pdf->Write(10,iconv('UTF-8','TIS620','มาพร้อม หนังสือฉบับนี้'));
//$pdf->Write(10,iconv('UTF-8','TIS620',thainumDigit($foryear)));
//$pdf->Write(10,iconv('UTF-8','TIS620',substr($monthpay,3,10)));
// ลงท้ายหนังสือ

$pdf->SetXY(35, 139);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'ทั้งนี้สัญญาเงินยืมดังกล่าวได้ล่วงเลยกำหนดล้างเงินยืมมาหลายวันแล้ว จึงขอความกรุณาให้ท่าน'));
$pdf->SetXY(20, 146);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'เร่งติดตามการส่งคืนเงินยืมดังกล่าวโดยเร็ว'));


$pdf->SetXY(35, 160);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'จึงเรียนมาเพื่อทราบและดำเนินการต่อไป'));
$pdf->SetXY(104, 170);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'ขอแสดงความนับถือ'));

// ลงท้ายหนังสือ ชื่อ ผอ.  ในบางกรณี ผู้บริหารไปราชการ
//$pdf->SetXY(101,160);$pdf->Write(10,"( $director )");
//$pdf->SetXY(55,167);$pdf->Write(10,'ผู้อำนวยการศูนย์การศึกษานอกระบบและการศึกษาตามอัธยาศัย');
//$pdf->Write(10,substr($name,4,25));
// ลงท้ายหนังสือ  จากหน่วยงาน
$pdf->SetXY(20, 240);
$pdf->Write(10, iconv('UTF-8', 'TIS620', "งานการเงินและบัญชี"));
$pdf->SetXY(20, 247);
$pdf->Write(10, thainumDigit(iconv('UTF-8', 'TIS620', thainumDigit("โทรศัพท์ " . $tel))));
$pdf->SetXY(20, 254);
$pdf->Write(10, thainumDigit(iconv('UTF-8', 'TIS620', thainumDigit("โทรสาร " . $fax))));
$d = iconv('UTF-8', 'TIS620', thainumDigit($d_));






//-----------------------------------------------------------------------------
// หน้า ที่ 2 รายงานสรุป  - เอกสารแนบ
//$pdf=new FPDF('P','mm','A4');
//---------------------------------------------------------------------------- หน้า 2
//
//$pdf->AddPage( 'L' ,'A4' ); 
//สิ้นสุดการประมวลผลและส่งออกไฟล์เป็น PDF ไฟล์ 

$pdf->AddPage();
//กำหนดตัวแปร บรรทัด
// เพิ่มรูปครุฑ 
$pdf->SetFont('THSarabunNew', '', 32);

$pdf->Image('../images/copy.png', 90, 30, 25, 0, '', '');

// Set font
$pdf->SetFont('THSarabunNew', '', 16);
// ค้นหาที่อยู่ หัวหนังสือ จะต้องเป็นของ จังหวัด
$sql = "select * from amp where id='00'";
$dbquery = mysql_db_query($dbname, $sql);
@mysql_query("SET NAMES UTF8");
$num_rows = mysql_num_rows($dbquery);
$i = 0;
while ($i < $num_rows) {
    $result = mysql_fetch_array($dbquery);
    $code = $result['id'];
    $name = $result['Name'];
    $numbook = $result['numbook'];
    $add1 = $result['add1'];
    $add2 = $result['add2'];
    $add3 = $result['add3'];
    $director = $result['director'];
    $tel = $result['tel'];
    $fax = $result['fax'];
    $i++;
}
// ค้นหาที่อยู่ หัวหนังสือ จะต้องเป็นของ กศน.อำเภอที่ต้างเงินยืม
/*$sql = "select * from amp where id='$amp_'";
$dbquery = mysql_db_query($dbname, $sql);
@mysql_query("SET NAMES UTF8");
$num_rows = mysql_num_rows($dbquery);
$ii = 0;
while ($ii < $num_rows) {
    $result_amp = mysql_fetch_array($dbquery);
    $codeS_amp = $result_amp['id'];
    $name_amp = $result_amp['Name'];
    $numbook_amp = $result_amp['numbook'];
    $add1_amp = $result_amp['add1'];
    $add2_amp = $result_amp['add2'];
    $add3_amp = $result_amp['add3'];
    $director_amp = $result_amp['director'];
    $tel_amp = $result_amp['tel'];
    $fax_amp = $result_amp['fax'];
    $ii++;
}
*/
//พิมพ์หัวหนังสือ
$pdf->SetXY(20, 30);
$pdf->Write(10, thainumDigit(iconv('UTF-8', 'TIS620', 'ที่ ' . $numbook)));
$pdf->SetXY(140, 30);
$pdf->Write(10, thainumDigit(iconv('UTF-8', 'TIS620', $add1)));
$pdf->SetXY(140, 37);
$pdf->Write(10, thainumDigit(iconv('UTF-8', 'TIS620', $add2)));
$pdf->SetXY(140, 44);
$pdf->Write(10, thainumDigit(iconv('UTF-8', 'TIS620', $add3)));
//
//  -------- ค้นหา รายการเงินยืม -------------
//  -------------- Connect Database -----------------------

/*$sql = "SELECT * FROM `item` where id_item= '$id_item_' ";
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$i = 1;

if ($i == $num_rows) {
    $row_reg = mysql_fetch_array($dbquery);
    $idd = $row_reg['id_item'];
    $i3d = $idd;
    $amp = $row_reg['amp_item'];
    $doc = $row_reg['doc'];
    $c_khong = $row_reg['c_khong'];
    $item = $row_reg['item'];
    $bath = $row_reg['bath'];
    $staus = $row_reg['staus'];
    $date_time_pdf = $row_reg['date_time'];
    $datepay2 = $row_reg['date_pay'];
    $chk_id = $row_reg['chk_id'];
    $id_yuem_update2 = $row_reg['id_yuem'];
    $dateInput = $row_reg['note_item'];
}*/
// วันที่
//$pdf->SetXY(105,55);$pdf->Write(10,'๑๐ ตุลาคม ๒๕๕๕');
$thai_n = array("มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
$d_ = date("j");
$d = iconv('UTF-8', 'TIS620', thainumDigit($d_));

$m_ = $thai_n[date("n") - 1];
$m = iconv('UTF-8', 'TIS620', $m_);

$y_ = date("Y") + 543;
$y = iconv('UTF-8', 'TIS620', thainumDigit($y_));

$pdf->SetXY(105, 55);
$pdf->Write(10, thainumDigit($d . ' ' . $m . ' ' . $y));

//$pdf->Write(10,$today));
// เรื่อง
$pdf->SetXY(20, 64);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'เรื่อง'));
$pdf->SetXY(30, 64);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'ติดตามการใช้จ่ายเงินงบประมาณ (เงินยืม)'));
// เรียน
$pdf->SetXY(20, 74);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'เรียน'));
$pdf->SetXY(30, 74);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'ผู้อำนวยการ' . $add1_amp));
// สิ่งที่ส่งมาด้วย
$pdf->SetXY(20, 84);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'สิ่งที่ส่งมาด้วย'));
$pdf->SetXY(45, 84);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'สำเนาสัญญาเงินยืม'));
//$pdf->Write(10,thainumDigit($foryear));  //ปีงบประมาณ
$pdf->Write(10, iconv('UTF-8', 'TIS620', ' จำนวน ๑ ฉบับ'));
//$month_s = substr($monthpay,0,2);  // เดือนที่เลือก
// เนื้อความ หนังสือ
$pdf->SetXY(35, 94);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'ด้วยสำนักงานส่งเสริมการศึกษานอกระบบและการศึกษาตามอัธยาศัยจังหวัดสุราษฎร์ธานี ขอเรียนให้ทราบว่า'));
$pdf->SetXY(20, 101);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'ตามที่หน่วยงานของท่านได้ดำเนินจัดทำสัญญาเงินยืม เพื่อเป็นค่าใช้จ่ายสำหรับการดำเนินงานของส่วนราชการ ดังนี้.'));
$pdf->SetXY(20, 108);
$pdf->Write(10, iconv('UTF-8', 'TIS620', "รายการ : " . thainumDigit($item)));
$pdf->Write(10, iconv('UTF-8', 'TIS620', ' จำนวนเงิน : ' . thainumDigit(number_format($bath, 2)) . '  บาท'));
$pdf->SetXY(20, 115);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'ตั้งแต่วันที่ : ' . thainumDigit($datepay2)));

// ค้นหาข้อมูลผู้ค้างเงินยืม 

/*$sql = "select * from person_yuem where id_yuem='$id_yuem_update2'";
$dbquery = mysql_db_query($dbname, $sql);
@mysql_query("SET NAMES UTF8");
$num_rows = mysql_num_rows($dbquery);
$i2 = 0;
while ($i2 < $num_rows) {
    $result_person = mysql_fetch_array($dbquery);
    $id_yuem_ = $result_person['id_yuem'];
    $citizenid_ = $result_person['citizenid'];
    $person_ = $result_person['person'];
    $i2++;
}
*/
$pdf->SetXY(20, 122);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'ผู้ยืมเงินคือ : ' . $person_ . '   หมายเลขบัตรประชาชน : ' . thainumDigit($citizenid_)));
$pdf->SetXY(20, 129);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'เลขที่หนังสือ : ' . thainumDigit($doc) . '   ลงวันที่ : ' . thainumDigit($date_time_pdf)));
//$pdf->Write(10,iconv('UTF-8','TIS620','มาพร้อม หนังสือฉบับนี้'));
//$pdf->Write(10,iconv('UTF-8','TIS620',thainumDigit($foryear)));
//$pdf->Write(10,iconv('UTF-8','TIS620',substr($monthpay,3,10)));
// ลงท้ายหนังสือ

$pdf->SetXY(35, 139);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'ทั้งนี้สัญญาเงินยืมดังกล่าวได้ล่วงเลยกำหนดล้างเงินยืมมาหลายวันแล้ว จึงขอความกรุณาให้ท่าน'));
$pdf->SetXY(20, 146);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'เร่งติดตามการส่งคืนเงินยืมดังกล่าวโดยเร็ว'));


$pdf->SetXY(35, 160);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'จึงเรียนมาเพื่อทราบและดำเนินการต่อไป'));
$pdf->SetXY(104, 170);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'ขอแสดงความนับถือ'));

// ลงท้ายหนังสือ ชื่อ ผอ.  ในบางกรณี ผู้บริหารไปราชการ
//$pdf->SetXY(101,160);$pdf->Write(10,"( $director )");
//$pdf->SetXY(55,167);$pdf->Write(10,'ผู้อำนวยการศูนย์การศึกษานอกระบบและการศึกษาตามอัธยาศัย');
//$pdf->Write(10,substr($name,4,25));
// ลงท้ายหนังสือ  จากหน่วยงาน
$pdf->SetXY(20, 240);
$pdf->Write(10, iconv('UTF-8', 'TIS620', "งานการเงินและบัญชี"));
$pdf->SetXY(20, 247);
$pdf->Write(10, thainumDigit(iconv('UTF-8', 'TIS620', thainumDigit("โทรศัพท์ " . $tel))));
$pdf->SetXY(20, 254);
$pdf->Write(10, thainumDigit(iconv('UTF-8', 'TIS620', thainumDigit("โทรสาร " . $fax))));
$d = iconv('UTF-8', 'TIS620', thainumDigit($d_));





$date_file = date("dmY-His");
$pdf->Output($date_file, 'I');
?>