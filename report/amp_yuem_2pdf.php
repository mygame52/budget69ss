<?php session_start();
ob_start();
include("../config.inc.php");
//echo $id_item_pdf;        
// กำหนด เปลี่ยนเลข อารบิก เป็นเลขไทย 
include ('../include/function.php');
require('../fpdf/fpdf.php');

$pdf = new FPDF('P', 'mm', 'A4');

$pdf->AddFont('THSarabunNew', '', 'THSarabunNew.php');
$pdf->Open();
$pdf->AliasNbPages();
$pdf->SetMargins(20, 5, 1);

//$amp_ = $_REQUEST['amp_pdf'];
$amp_ = $_REQUEST['amp_pdf'];
$id_item_ = $_REQUEST['id_item_pdf'];
$date_pdf2 = $_REQUEST['date_workpdf'];
$doc_ = $_REQUEST['doc_'];
$date_check = strpos($date_pdf2,"-");
$lua_ = $_SESSION["lua"];
$judson_ = $_SESSION["judson2"];

$date_check2 = str_replace(" ", " ", $date_pdf2);


//-----------------------------------------------------------------------------
// หน้า ที่ 1 หนังสือนำส่ง
//$pdf=new FPDF('P','mm','A4');
//---------------------------------------------------------------------------- หน้า 2
//
//$pdf->AddPage( 'L' ,'A4' ); 
//สิ้นสุดการประมวลผลและส่งออกไฟล์เป็น PDF ไฟล์ 
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
$pdf->Write(10, iconv('UTF-8', 'TIS620','ที่ '));
$pdf->Write(10, iconv('UTF-8', 'TIS620',$numbook_amp));
$pdf->SetXY(140, 30);
$pdf->Write(10, iconv('UTF-8', 'TIS620', ($add1_amp)));
$pdf->SetXY(140, 37);
$pdf->Write(10, iconv('UTF-8', 'TIS620', ($add2_amp)));
$pdf->SetXY(140, 44);
$pdf->Write(10, iconv('UTF-8', 'TIS620', ($add3_amp)));
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
    $item2 = substr($item,24);
    $bath = $row_reg['bath'];
    $staus = $row_reg['staus'];
    $date_time_pdf = $row_reg['date_time'];
    $datepay2 = $row_reg['date_pay'];
    $chk_id = $row_reg['chk_id'];
    $id_yuem_2 = $row_reg['id_yuem'];
    $dateInput = $row_reg['note_item'];
}
// แปลงตัวเลข -> ตัวหนังสือ
$num2thai = ThaiBahtConversion($bath);
// วันที่
//$pdf->SetXY(105,55);$pdf->Write(10,'๑๐ ตุลาคม ๒๕๕๕');
$thai_n = array("มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
$d_ = date("j");
$d = iconv('UTF-8', 'TIS620', ($d_));

$m_ = $thai_n[date("n") - 1];
$m = iconv('UTF-8', 'TIS620', $m_);

$y_ = date("Y") + 543;
$y = iconv('UTF-8', 'TIS620', ($y_));

$pdf->SetXY(105, 55);
$pdf->Write(10, ($d . ' ' . $m . ' ' . $y));

//$pdf->Write(10,$today));
// เรื่อง
$pdf->SetXY(20, 64);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'เรื่อง'));
$pdf->SetXY(30, 64);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'ขอยืมเงินงบประมาณ'));
// เรียน
$pdf->SetXY(20, 74);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'เรียน'));
$pdf->SetXY(30, 74);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'ผู้อำนวยการ'. $add1));
// สิ่งที่ส่งมาด้วย
$pdf->SetXY(20, 84);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'สิ่งที่ส่งมาด้วย'));
$pdf->SetXY(45, 84);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'หลักฐานยืมเงิน'));
//$pdf->Write(10,($foryear));  //ปีงบประมาณ
$pdf->Write(10, iconv('UTF-8', 'TIS620', ' จำนวน 1 ชุด'));
//$month_s = substr($monthpay,0,2);  // เดือนที่เลือก
// เนื้อความ หนังสือ
$pdf->SetXY(30, 96);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'ด้วย '.$add1_amp.' มีความประสงค์จะยืมเงินงบประมาณ จาก'.$mess_book));

//  -------------- Connect samnak database เพื่อ ตรวจสอบงบประมาณ -----------------------
$c_khong1 = substr($c_khong,2,4);
$c_khong2 = substr($c_khong,2,6);
//  -------------- Connect work database เพื่อ ตรวจสอบงบประมาณ -----------------------
$sqlwork = "SELECT * FROM `samnak` where code_sam = $c_khong1 ";
$dbquery = mysql_db_query($dbname, $sqlwork);
$num_rowsam = mysql_num_rows($dbquery);
$iworksam = 1;
if ($iworksam == $num_rowsam) {
    $row_reg = mysql_fetch_array($dbquery);
    $code_sam = $row_reg['code_sam'];    
    $nam_sam = $row_reg['nam_sam'];    
}
//  -------------- Connect work database เพื่อ ตรวจสอบงบประมาณ -----------------------
$sqlwork = "SELECT * FROM `work` where w_code = $c_khong2 ";
$dbquery = mysql_db_query($dbname, $sqlwork);
$num_rowswork = mysql_num_rows($dbquery);
$iwork = 1;
if ($iwork == $num_rowswork) {
    $row_reg = mysql_fetch_array($dbquery);
    $w_code = $row_reg['w_code'];    
    $w_name = $row_reg['w_name'];    
}

//$pdf->Rect(10, 50, 190,0, 'D'); // เส้นตรง แนวนอน
//$pdf->Rect(150,20, 0,30, 'D'); // เส้นตรง  แนวตั้ง


//echo "--".$nam_sam."--";
$pdf->SetXY(20, 103);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'โดยมีรายละเอียดดังนี้'));
//$pdf->Write(10, iconv('UTF-8', 'TIS620',$nam_sam_.' อยู๋ในส่วนของ'.$w_name));
$a=0;
$b=40;
$pdf->Rect(24,113, 140,90, 'D'); // เส้นตรง  แนวตั้ง (column,row,0,ความสูง);
$pdf->Rect(24, 113, 140,0, 'D'); // เส้นตรง แนวนอน
$pdf->SetXY(30, 113+$a);
$pdf->Write(10, iconv('UTF-8', 'TIS620', '     หมายเลข ID '));
$pdf->SetXY(20+$b, 113+$a); 
//$pdf->Write(10, iconv('UTF-8', 'TIS620',($id_item_)));
$pdf->Cell(20  , 10 , iconv('UTF-8', 'TIS620',($id_item_)) , 0 , 1 , 'L' );
$pdf->SetXY(85, 113+$a);
$pdf->Write(10, iconv('UTF-8', 'TIS620', ' ผู้บันทึก : '));


$pdf->Rect(57,113, 0,90, 'D'); // เส้นตรง  แนวตั้ง (column,row,0,ความสูง);
$pdf->Rect(24, 123, 140,0, 'D'); // เส้นตรง แนวนอน
$pdf->SetXY(33, 123+$a);
$pdf->Write(10, iconv('UTF-8','TIS620','เพื่อดำเนินการ '));
$pdf->SetXY(20+$b, 123+$a);
$pdf->Cell(20  , 10 , iconv('UTF-8','TIS620',($item2)) , 0 , 1 , 'L' );

$pdf->Rect(24, 133, 140,0, 'D'); // เส้นตรง แนวนอน
$pdf->SetXY(43, 133+$a);
$pdf->Write(10, iconv('UTF-8', 'TIS620','ในวันที่   '));
$pdf->SetXY(20+$b, 133+$a);

$pdf->Write(10, iconv('UTF-8','TIS620',$date_check2));

$pdf->Rect(24, 143, 140,0, 'D'); // เส้นตรง แนวนอน
$pdf->SetXY(30, 143+$a);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'งบประมาณหลัก  '));
$pdf->SetXY(20+$b, 143+$a);
$pdf->Cell(20  , 10 , iconv('UTF-8', 'TIS620',($nam_sam)) , 0 , 1 , 'L' );

$pdf->Rect(24, 153, 140,0, 'D'); // เส้นตรง แนวนอน
$pdf->SetXY(30, 153+$a);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'งบประมาณย่อย'));
$pdf->SetXY(20+$b, 153+$a);
$pdf->Cell(20  , 10 , iconv('UTF-8', 'TIS620',($w_name)) , 0 , 1 , 'L' );


$pdf->Rect(24, 163, 140,0, 'D'); // เส้นตรง แนวนอน
$pdf->SetXY(36, 163+$a);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'ได้รับจัดสรร'));
$pdf->SetXY(40+$b, 163+$a);
$pdf->Cell(20  , 10 , iconv('UTF-8', 'TIS620',(number_format($judson_,2)).'   บาท') , 0 , 1 , 'R' );

$pdf->Rect(104,163, 0,40, 'D'); // เส้นตรง  แนวตั้ง (column,row,0,ความสูง);
$pdf->Rect(24, 173, 80,0, 'D'); // เส้นตรง แนวนอน
$pdf->SetXY(41, 173+$a);
$pdf->Write(10, iconv('UTF-8', 'TIS620', ' คงเหลือ'));
$pdf->SetXY(40+$b, 173+$a);
$pdf->Cell(20  , 10 , iconv('UTF-8', 'TIS620',(number_format($lua_,2)).'   บาท') , 0 , 1 , 'R' );

$pdf->Rect(24, 183, 80,0, 'D'); // เส้นตรง แนวนอน

$pdf->SetXY(34, 183+$a);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'เบิกจ่ายครั้งนี้ '));
$pdf->SetXY(40+$b, 183+$a);
$pdf->Cell(20  , 10 , iconv('UTF-8', 'TIS620',(number_format($bath,2)).'   บาท') , 0 , 1 , 'R' );
$bath_pdf = $bath;

$pdf->Rect(24, 193, 80,0, 'D'); // เส้นตรง แนวนอน
//$bath_pdf = number_format($bath,2);
$pdf->SetXY(25, 193+$a);
$pdf->Write(10, iconv('UTF-8', 'TIS620', '      - คงเหลือสุทธิ : '));

$pdf->SetXY(40+$b, 193+$a);
$pdf->Cell(20  , 10 , iconv('UTF-8', 'TIS620',(number_format($lua_-$bath_pdf,2)).'   บาท') , 0 , 1 , 'R' );



$pdf->SetXY(55, 203);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'จึงเรียนมาเพื่อโปรดพิจารณา'));
$pdf->SetXY(104, 213);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'ขอแสดงความนับถือ'));

// ลงท้ายหนังสือ ชื่อ ผอ.  ในบางกรณี ผู้บริหารไปราชการ
//$pdf->SetXY(101,160);$pdf->Write(10,"( $director )");
//$pdf->SetXY(55,167);$pdf->Write(10,'ผู้อำนวยการศูนย์การศึกษานอกระบบและการศึกษาตามอัธยาศัย');
//$pdf->Write(10,substr($name,4,25));
// ลงท้ายหนังสือ  จากหน่วยงาน


$pdf->SetXY(20, 260);
$pdf->Write(0, iconv('UTF-8', 'TIS620', "งานการเงิน"));
$pdf->SetXY(20, 267);
$pdf->Write(0, (iconv('UTF-8', 'TIS620', ("โทรศัพท์ " . $tel_amp))));
$pdf->SetXY(20, 274);
$pdf->Write(0, (iconv('UTF-8', 'TIS620', ("โทรสาร " . $fax_amp))));



//-----------------------------------------------------------------------------
// หน้า ที่ 2 แบบเงินยืม แบบ 8500
//$pdf=new FPDF('P','mm','A4');
//---------------------------------------------------------------------------- หน้า 2
//
//$pdf->AddPage( 'L' ,'A4' ); 
//สิ้นสุดการประมวลผลและส่งออกไฟล์เป็น PDF ไฟล์ 

$pdf->AddPage();
//กำหนดตัวแปร บรรทัด
// เพิ่มรูปครุฑ 
$pdf->SetFont('THSarabunNew', '', 32);
//$pdf->Image('../images/copy.png', 90, 30, 25, 0, '', '');
// Set font
$pdf->SetFont('THSarabunNew', '', 16);
// ค้นหาที่อยู่ หัวหนังสือ จะต้องเป็นของ จังหวัด

// SetXY( column, row );

// ตีกรอบสี่เหลี่ยม	 
//(แนวนอน 1, แนวตั้ง 1,แนวนอน 1 + จำนวนขยาย, แนวตั้ง1+จำนวนขยาย 

$pdf->Rect(10, 20, 190,265 , 'D'); // กรอบสี่เหลี่ยม
$pdf->SetFont('THSarabunNew', '', 16);
$pdf->SetXY(180, 10);
$pdf->Write(10, iconv('UTF-8', 'TIS620',' แบบ 8500'));
$pdf->SetFont('THSarabunNew', '', 24);
$pdf->SetXY(53, 22);
$pdf->Write(10, iconv('UTF-8', 'TIS620','    สัญญาการยืมเงิน'));

$pdf->Rect(10, 50, 190,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(150,20, 0,30, 'D'); // เส้นตรง  แนวตั้ง

$pdf->SetFont('THSarabunNew', '', 16);
$pdf->SetXY(153, 22);
$pdf->Write(10, iconv('UTF-8', 'TIS620','      เลขที่...............................'));
$pdf->SetXY(170, 31);
$pdf->Write(10, iconv('UTF-8', 'TIS620','วันครบกำหนด'));
$pdf->SetXY(165, 40);
$pdf->Write(10, iconv('UTF-8', 'TIS620','..................................'));
// ยืนต่อ
$pdf->SetXY(13, 40);
$pdf->Write(10, iconv('UTF-8', 'TIS620','ยื่นต่อ  ........................................................................................................(1)'));
$pdf->SetXY(25, 38);
$pdf->Write(10, iconv('UTF-8', 'TIS620','ผู้อำนวยการ'.$mess_book));

// ข้าพเจ้า
$pdf->SetXY(13, 50);
$pdf->Write(10, iconv('UTF-8', 'TIS620','ข้าพเจ้า ......................................................................................................... ตำแหน่ง .................................................................'));

// ค้นหาข้อมูลผู้ยืมเงิน
$sqlperson = "SELECT * FROM `person_yuem` where id_yuem = $id_yuem_2 ";
$dbqueryperson = mysql_db_query($dbname, $sqlperson);
$num_rowperson = mysql_num_rows($dbqueryperson);
$iworkperson = 1;
if ($iworkperson == $num_rowperson) {
    $row_person = mysql_fetch_array($dbqueryperson);
    $name_person = $row_person['person'];    
    $name_position = $row_person['position'];    
}
$pdf->SetXY(35, 48);
$pdf->Write(10, iconv('UTF-8', 'TIS620',$name_person));

$pdf->SetXY(142, 48);
$pdf->Write(10, iconv('UTF-8', 'TIS620',$name_position));


// สังกัด
$pdf->SetXY(13, 58);
$pdf->Write(10, iconv('UTF-8', 'TIS620','สังกัด ............................................................................................................. จังหวัด ...................................................................'));
// สังกัด
$pdf->SetXY(35, 56);
$pdf->Write(10, iconv('UTF-8', 'TIS620', ($add1_amp)));
//จังหวัด
$pdf->SetXY(142, 56);
$pdf->Write(10, iconv('UTF-8', 'TIS620',$mess_province));


// มีความประสงค์
$pdf->SetXY(13, 66);
$pdf->Write(10, iconv('UTF-8', 'TIS620','มีความประสงค์ขอยืมเงินจาก ................................................................................................................................................(2)'));
// มีความประสงค์ขอยืมเงินจาก
$pdf->SetXY(60, 64);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'งบ'.($nam_sam)));
$pdf->Write(10, iconv('UTF-8', 'TIS620', ' / '.($w_name)));

// เพื่อใช้จ่ายเป็นค่า
$pdf->SetXY(13, 74);
$pdf->Write(10, iconv('UTF-8', 'TIS620','เพื่อเป็นค่าใช้จ่ายในการ .........................................................................................................................................................(3)'));
// เพื่อใช้จ่ายในการดำเนินการ
$pdf->SetXY(50, 72);
$pdf->Write(10, iconv('UTF-8','TIS620',($item2)));



$pdf->Rect(10, 84, 190,0, 'D'); // เส้นตรง แนวนอน
$pdf->SetXY(13, 90);
$pdf->Write(10, iconv('UTF-8', 'TIS620',' '));
$pdf->SetXY(13, 96);
$pdf->Write(10, iconv('UTF-8', 'TIS620',' '));
$pdf->SetXY(13, 104);
$pdf->Write(10, iconv('UTF-8', 'TIS620',' '));
// ตัวอักษร - รวมเงิน
$pdf->SetXY(13, 106);
$pdf->Write(10, iconv('UTF-8', 'TIS620','(ตัวอักษร ................................................................................)  รวมเงิน ........................บาท'));

// ใส่จำนวนเงิน
$pdf->SetXY(120, 105);
$pdf->Write(10, iconv('UTF-8', 'TIS620',number_format($bath_pdf,2)));

$pdf->SetXY(165, 99);
$pdf->Write(10, iconv('UTF-8', 'TIS620',number_format($bath_pdf,2)));

$pdf->Rect(10, 117, 190,0, 'D'); // เส้นตรง แนวนอน
// รวมเงิน ขวามือ
$pdf->SetXY(152, 100);
$pdf->Write(10, iconv('UTF-8', 'TIS620','............................................... '));
$pdf->Rect(150,84, 0,33, 'D'); // เส้นตรง  แนวตั้ง
$pdf->SetXY(30, 105);
$pdf->Write(10, iconv('UTF-8', 'TIS620',$num2thai));



$pdf->SetFont('THSarabunNew', '', 16);
// ข้าพเจ้า
$pdf->SetXY(30, 116);
$pdf->Write(10, iconv('UTF-8', 'TIS620','ข้าพเจ้าสัญญาว่าจะปฏิบัติตามระเบียบของทางราชการทุกประการ และจะนำใบสำคัญคู่จ่ายที่ถูกต้อง'));
$pdf->SetXY(13, 124);
$pdf->Write(10, iconv('UTF-8', 'TIS620','พร้อมทั้งเงินเหลือจ่าย (ถ้ามี) ส่งใช้ภายในกำหนดไว้ในระเบียบการเบิกจ่ายเงินจากคลัง คือ ภายใน .......... วัน'));
$pdf->SetXY(13, 132);
$pdf->Write(10, iconv('UTF-8', 'TIS620','นับแต่วันที่ได้รับเงินนี้  ถ้าข้าพเจ้าไม่ส่งตามกำหนด  ข้าพเจ้ายินยอมให้หักเงินเดือน  ค่าจ้าง  เบี้ยหวัด  บำเหน็จ'));
$pdf->SetXY(13, 140);
$pdf->Write(10, iconv('UTF-8', 'TIS620','บำนาญ  หรือเงินอื่นใดที่ข้าพเจ้าพึงได้รับจากทางราชการ  ชดใช้จำนวนเงินที่ยืมไปจนครบถ้วนได้ทันที'));
$pdf->SetXY(13, 150);
$pdf->Write(10, iconv('UTF-8', 'TIS620','ลายมือชื่อ .......................................................................................ผู้ยืม    วันที่  ...................................................'));
// ใส่ชื่อผู้ยืมเงิน
$pdf->SetFont('THSarabunNew', '', 14);
$pdf->SetXY(55, 155);
$pdf->Write(10, iconv('UTF-8', 'TIS620',$name_person));
// วันที่
$pdf->SetFont('THSarabunNew', '', 16);
$pdf->SetXY(137, 148);
$pdf->Write(10, ($d . ' ' . $m . ' ' . $y));



$pdf->SetFont('THSarabunNew', '', 16);
$pdf->Rect(10, 165, 190,0, 'D'); // เส้นตรง แนวนอน

$pdf->SetFont('THSarabunNew', '', 16);
$pdf->SetXY(13, 165);
$pdf->Write(10, iconv('UTF-8', 'TIS620','เสนอ  .....................................................................................................................(4)'));  
$pdf->SetXY(25, 156);
$pdf->Write(25, iconv('UTF-8', 'TIS620','ผู้อำนวยการ'.$mess_book));

// จำนวนเงิน
$pdf->SetXY(30, 173);
$pdf->Write(10, iconv('UTF-8', 'TIS620','ได้ตรวจสอบแล้ว  เห็นสมควรอนุมัติให้ยืมตามใบยืมฉบับนี้ได้  จำนวน............................................บาท'));  
$pdf->SetXY(145, 172);
$pdf->Write(10, iconv('UTF-8', 'TIS620',number_format($bath_pdf,2)));

$pdf->SetXY(13, 180);
$pdf->Write(10, iconv('UTF-8', 'TIS620','(.................................................................................................................................)'));  
// จำนวนเงิน - ตัวหนังสือ

$pdf->SetXY(25, 179);
$pdf->Write(10, iconv('UTF-8', 'TIS620',$num2thai));


$pdf->SetXY(13, 191);
$pdf->Write(10, iconv('UTF-8', 'TIS620','ลงชื่อ ............................................................................                                      วันที่  ...................................................'));

//คำอนุมัติ
$pdf->SetFont('THSarabunNew', '', 24);
$pdf->SetXY(83, 200);
$pdf->Write(10, iconv('UTF-8', 'TIS620','     คำอนุมัติ'));

$pdf->SetFont('THSarabunNew', '', 17);
//อุมัติให้
$pdf->SetXY(17, 208);
$pdf->Write(10, iconv('UTF-8', 'TIS620','อุมัติให้ยืมตามเงื่อนไขข้างต้นได้  เป็นเงิน..............................................................................................บาท'));  
$pdf->SetXY(13, 216);
$pdf->Write(10, iconv('UTF-8', 'TIS620','(.................................................................................................................................)'));  
$pdf->SetXY(13, 225);
$pdf->Write(10, iconv('UTF-8', 'TIS620','ลงชื่อผู้อนุมัติ..............................................................                                  วันที่  ...............................................'));
$pdf->Rect(10, 240, 190,0, 'D'); // เส้นตรง แนวนอน
// ใส่จำนวนเงิน
$pdf->SetXY(120, 207);
$pdf->Write(10, iconv('UTF-8', 'TIS620',number_format($bath_pdf,2)));

$pdf->SetXY(25, 215);
$pdf->Write(10, iconv('UTF-8', 'TIS620',$num2thai));


// ใบรับเงิน
$pdf->SetFont('THSarabunNew', '', 24);
$pdf->SetXY(83, 242);
$pdf->Write(10, iconv('UTF-8', 'TIS620','  ใบรับเงิน'));

$pdf->SetFont('THSarabunNew', '', 17);
//อุมัติให้
$pdf->SetXY(17, 250);
$pdf->Write(10, iconv('UTF-8', 'TIS620','ได้รับเงินยืมจำนวน..................................บาท    (........................................................................................................)'));  

$pdf->SetXY(50, 249);
$pdf->Write(10, iconv('UTF-8', 'TIS620',number_format($bath_pdf,2)));

$pdf->SetXY(100, 249);
$pdf->Write(10, iconv('UTF-8', 'TIS620',$num2thai));


$pdf->SetXY(13, 257);
$pdf->Write(10, iconv('UTF-8', 'TIS620','ไปเป็นการถูกต้องแล้ว'));


$pdf->SetXY(13, 270);
$pdf->Write(1, iconv('UTF-8', 'TIS620','          ลงชื่อ ............................................................................                        วันที่  ..........................................'));
$pdf->SetFont('THSarabunNew', '', 14);
$pdf->SetXY(50, 275);
$pdf->Write(1, iconv('UTF-8', 'TIS620',$name_person));



//-----------------------------------------------------------------------------
// หน้า ที่ 3 หน้าหลังเงินยืม
//$pdf=new FPDF('P','mm','A4');
//---------------------------------------------------------------------------- หน้า 3
//
//$pdf->AddPage( 'L' ,'A4' ); 
//สิ้นสุดการประมวลผลและส่งออกไฟล์เป็น PDF ไฟล์ 

$pdf->AddPage();

$pdf->SetFont('THSarabunNew', '', 24);
$pdf->SetXY(74, 13);
$pdf->Write(10, iconv('UTF-8', 'TIS620',' รายการส่งใช้เงินยืม'));
$pdf->SetXY(74, 13);
$pdf->Write(10, iconv('UTF-8', 'TIS620',' รายการส่งใช้เงินยืม'));
$pdf->SetFont('THSarabunNew', '', 24);

$pdf->Rect(10, 25, 190,0, 'D'); // เส้นตรง แนวนอน
$pdf->SetFont('THSarabunNew', '', 18);
$pdf->SetXY(12, 31);
$pdf->Write(10, iconv('UTF-8', 'TIS620','ครั้งที่'));
$pdf->Rect(25,25, 0,215, 'D'); // เส้นตรง  แนวตั้ง

$pdf->SetXY(27, 31);
$pdf->Write(10, iconv('UTF-8', 'TIS620','วัน  เดือน  ปี  '));
$pdf->Rect(54,25, 0,215, 'D'); // เส้นตรง  แนวตั้ง

$pdf->SetFont('THSarabunNew', '', 15);
$pdf->SetXY(66, 26);
$pdf->Write(10, iconv('UTF-8', 'TIS620','รายการส่งใช้  '));
$pdf->Rect(54, 35, 47,0, 'D'); // เส้นตรง แนวนอน

$pdf->SetFont('THSarabunNew', '', 15);
$pdf->SetXY(56, 35);
$pdf->Write(10, iconv('UTF-8', 'TIS620','เงินสด หรือ  '));
$pdf->SetXY(59, 41);
$pdf->Write(10, iconv('UTF-8', 'TIS620','ใบสำคัญ  '));
$pdf->Rect(76,35, 0,205, 'D'); // เส้นตรง  แนวตั้ง

$pdf->SetFont('THSarabunNew', '', 15);
$pdf->SetXY(78, 38);
$pdf->Write(10, iconv('UTF-8', 'TIS620','จำนวนเงิน  '));
$pdf->Rect(96,35, 0,205, 'D'); // เส้นตรง  แนวตั้ง
$pdf->Rect(101,25, 0,215, 'D'); // เส้นตรง  แนวตั้ง

$pdf->SetFont('THSarabunNew', '', 18);
$pdf->SetXY(108, 31);
$pdf->Write(10, iconv('UTF-8', 'TIS620','คงค้าง  '));
$pdf->Rect(122,50, 0,190, 'D'); // เส้นตรง  แนวตั้ง
$pdf->Rect(128,25, 0,215, 'D'); // เส้นตรง  แนวตั้ง

$pdf->SetXY(138, 31);
$pdf->Write(10, iconv('UTF-8', 'TIS620','ลายมือชื่อผู้รับ  '));
$pdf->Rect(172,25, 0,215, 'D'); // เส้นตรง  แนวตั้ง

$pdf->SetXY(177, 31);
$pdf->Write(10, iconv('UTF-8', 'TIS620','ใบรับเลขที่  '));



$pdf->Rect(10, 50, 190,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(10, 60, 190,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(10, 70, 190,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(10, 80, 190,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(10, 90, 190,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(10, 100, 190,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(10, 110, 190,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(10, 120, 190,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(10, 130, 190,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(10, 140, 190,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(10, 150, 190,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(10, 160, 190,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(10, 170, 190,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(10, 180, 190,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(10, 190, 190,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(10, 200, 190,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(10, 210, 190,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(10, 220, 190,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(10, 230, 190,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(10, 240, 190,0, 'D'); // เส้นตรง แนวนอน


$pdf->SetFont('THSarabunNew', '', 16);
$pdf->SetXY(12, 241);
$pdf->Write(10, iconv('UTF-8', 'TIS620','หมายเหตุ  '));
$pdf->SetXY(12, 241);
$pdf->Write(10, iconv('UTF-8', 'TIS620','หมายเหตุ  '));

$pdf->SetXY(35, 241);
$pdf->Write(10, iconv('UTF-8', 'TIS620',' (1)   ยื่นต่อ ผู้อำนวยการกองคลัง หัวหน้ากองคลัง หัวหน้าแผนกคลัง หรือตำแหน่งอื่นใด'));

$pdf->SetXY(44, 247);
$pdf->Write(10, iconv('UTF-8', 'TIS620','กรณีที่ปฏิบัติงานเช่นเดียวกันแล้วแต่ '));

$pdf->SetXY(37, 253);
$pdf->Write(10, iconv('UTF-8', 'TIS620','(2)  ให้ระบุชื่อส่วนราชการที่จ่ายเงินยืม '));

$pdf->SetXY(37, 259);
$pdf->Write(10, iconv('UTF-8', 'TIS620','(3)  ระบุวัตถุประสงค์ที่จะนำเงินยืมไปใช้จ่าย '));

$pdf->SetXY(37, 265);
$pdf->Write(10, iconv('UTF-8', 'TIS620','(4)  เสนอต่อผู้มีอำนาจอนุมัติ '));


//-----------------------------------------------------------------------------
// หน้า ที่ 4 ประมาณการ เงินยืม
//$pdf=new FPDF('P','mm','A4');
//---------------------------------------------------------------------------- หน้า 4
//
//$pdf->AddPage( 'L' ,'A4' ); 
//สิ้นสุดการประมวลผลและส่งออกไฟล์เป็น PDF ไฟล์ 

$pdf->AddPage();

$pdf->SetFont('THSarabunNew', '', 18);
$pdf->SetXY(74, 13);
$pdf->Write(11, iconv('UTF-8', 'TIS620',$mess_book));

$pdf->SetFont('THSarabunNew', '', 18);
$pdf->SetXY(40, 22);
$pdf->Write(10, iconv('UTF-8', 'TIS620',' ประมาณการค่าใช้จ่าย การจัดประชุม/อบรม/สัมมนา/โครงการ'));
$pdf->SetFont('THSarabunNew', '', 16);

$pdf->Rect(10, 33, 190,0, 'D'); // เส้นตรง แนวนอน

$pdf->SetFont('THSarabunNew', '', 16);

// $pdf->SetXY(Coumn, Row);

$pdf->SetXY(30, 40);
$pdf->Write(10, iconv('UTF-8', 'TIS620','วัน เดือน ปี ที่ยืม  : '));
$pdf->Write(10, ($d . ' ' . $m . ' ' . $y));
$pdf->SetXY(30, 48);
$pdf->Write(10, iconv('UTF-8', 'TIS620','ชื่อ-สกุล ผู้ยืมเงิน  : '.$name_person));


$pdf->SetXY(120, 48);
$pdf->Write(10, iconv('UTF-8', 'TIS620','ตำแหน่ง : '.$name_position));

$pdf->SetXY(30, 56);
$pdf->Write(10, iconv('UTF-8', 'TIS620','       รายการยืม  : '));

$pdf->Cell(20  , 10 , iconv('UTF-8','TIS620',($item2)) , 0 , 1 , 'L' );


$pdf->SetFont('THSarabunNew', '', 16);
$pdf->SetXY(28, 70);
$pdf->Write(10, iconv('UTF-8', 'TIS620','รายการยืม'));

$pdf->SetXY(95, 70);
$pdf->Write(10, iconv('UTF-8', 'TIS620','รายละเอียด'));

$pdf->SetXY(163, 70);
$pdf->Write(10, iconv('UTF-8', 'TIS620','จำนวน (บาท)'));

//$pdf->Write(10, iconv('UTF-8', 'TIS620','       เบี้ยเลี้ยง           ค่าที่พัก           ค่าพาหนะ          ค่าวิทยากร         ค่าอาหาร          ค่าวัสดุ          อื่น ๆ       '));

$pdf->SetXY(20, 80);
$pdf->Write(10, iconv('UTF-8', 'TIS620',' - เบี้ยเลี้ยง'));

$pdf->SetXY(20, 90);
$pdf->Write(10, iconv('UTF-8', 'TIS620',' - ค่าที่พัก'));

$pdf->SetXY(20, 100);
$pdf->Write(10, iconv('UTF-8', 'TIS620',' - ค่าพาหนะ'));

$pdf->SetXY(20, 110);
$pdf->Write(10, iconv('UTF-8', 'TIS620',' - ค่าวิทยากร'));

$pdf->SetXY(20, 120);
$pdf->Write(10, iconv('UTF-8', 'TIS620',' - ค่าอาหาร'));

$pdf->SetXY(20, 130);
$pdf->Write(10, iconv('UTF-8', 'TIS620',' - ค่าวัสดุ'));

$pdf->SetXY(20, 140);
$pdf->Write(10, iconv('UTF-8', 'TIS620',' - อื่น'));


//$pdf->Rect(แนวตั้งแรก, แนวนอนแรก, ความกว้างแนวตั้ง, ความยาวแนวนอน, 'D'); // เส้นตรง แนวตั้ง 2
$pdf->Rect(20, 70, 35,130, 'D'); // เส้นตรง แนวตั้ง 1
//$pdf->Rect(70, 70, 25,150, 'D'); // เส้นตรง แนวตั้ง 2
//$pdf->Rect(120, 70, 25,150, 'D'); // เส้นตรง แนวตั้ง 2
$pdf->Rect(160, 70, 30,140, 'D'); // เส้นตรง แนวตั้ง 2


$pdf->Rect(20, 70, 170,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(20, 80, 170,0, 'D'); // เส้นตรง แนวนอน

$pdf->Rect(20, 90, 170,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(20, 100, 170,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(20, 110, 170,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(20, 120, 170,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(20, 130, 170,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(20, 140, 170,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(20, 150, 170,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(20, 160, 170,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(20, 170, 170,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(20, 180, 170,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(20, 190, 170,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(20, 200, 170,0, 'D'); // เส้นตรง แนวนอน

$pdf->SetXY(140, 200);
$pdf->Write(10, iconv('UTF-8', 'TIS620','รวมเงิน  '));

$pdf->SetXY(165, 200);
$pdf->Write(10, iconv('UTF-8', 'TIS620',number_format($bath_pdf,2)));


$pdf->SetFont('THSarabunNew', '', 16);
$pdf->SetXY(20, 240);
$pdf->Write(10, iconv('UTF-8', 'TIS620','ลงชื่อ.....................................................ผู้ยืม/ประมาณการ'));
$pdf->SetXY(20, 250);
$pdf->Write(10, iconv('UTF-8', 'TIS620','     (________________________)'));
$pdf->SetXY(31, 260);
$pdf->Write(10, ($d . ' / ' . $m . ' / ' . $y));


$pdf->SetFont('THSarabunNew', '', 16);
$pdf->SetXY(120, 240);
$pdf->Write(10, iconv('UTF-8', 'TIS620','ลงชื่อ.....................................................ผู้อนุมัติ'));
$pdf->SetXY(120, 250);
$pdf->Write(10, iconv('UTF-8', 'TIS620','      (________________________)'));
$pdf->SetXY(140, 260);
$pdf->Write(10," /             /     ");
//$pdf->Write(10, ($d . ' / ' . $m . ' / ' . $y));



// สำเนา-------------------------------------------------------------------------

//-----------------------------------------------------------------------------
// หน้า ที่ 1 หนังสือนำส่ง
//$pdf=new FPDF('P','mm','A4');
//----------------------------------------------------------------------------- หน้า 1
$pdf->AddPage();
//กำหนดตัวแปร บรรทัด
// เพิ่มรูปครุฑ 
$pdf->Image('../images/copy.png', 85, 30, 25, 0, '', '');
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
$pdf->Write(10, iconv('UTF-8', 'TIS620','ที่ '. ($numbook_amp)));
$pdf->SetXY(140, 30);
$pdf->Write(10, iconv('UTF-8', 'TIS620', ($add1_amp)));
$pdf->SetXY(140, 37);
$pdf->Write(10, iconv('UTF-8', 'TIS620', ($add2_amp)));
$pdf->SetXY(140, 44);
$pdf->Write(10, iconv('UTF-8', 'TIS620', ($add3_amp)));
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
    $item2 = substr($item,24);
    $bath = $row_reg['bath'];
    $staus = $row_reg['staus'];
    $date_time_pdf = $row_reg['date_time'];
    $datepay2 = $row_reg['date_pay'];
    $chk_id = $row_reg['chk_id'];
    $id_yuem_2 = $row_reg['id_yuem'];
    $dateInput = $row_reg['note_item'];
}
// แปลงตัวเลข -> ตัวหนังสือ
$num2thai = ThaiBahtConversion($bath);
// วันที่
//$pdf->SetXY(105,55);$pdf->Write(10,'๑๐ ตุลาคม ๒๕๕๕');
$thai_n = array("มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
$d_ = date("j");
$d = iconv('UTF-8', 'TIS620', ($d_));

$m_ = $thai_n[date("n") - 1];
$m = iconv('UTF-8', 'TIS620', $m_);

$y_ = date("Y") + 543;
$y = iconv('UTF-8', 'TIS620', ($y_));

$pdf->SetXY(105, 55);
$pdf->Write(10, ($d . ' ' . $m . ' ' . $y));

//$pdf->Write(10,$today));
// เรื่อง
$pdf->SetXY(20, 64);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'เรื่อง'));
$pdf->SetXY(30, 64);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'ขอยืมเงินงบประมาณ'));
// เรียน
$pdf->SetXY(20, 74);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'เรียน'));
$pdf->SetXY(30, 74);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'ผู้อำนวยการ'. $add1));
// สิ่งที่ส่งมาด้วย
$pdf->SetXY(20, 84);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'สิ่งที่ส่งมาด้วย'));
$pdf->SetXY(45, 84);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'สัญญาเงินยืม'));
//$pdf->Write(10,($foryear));  //ปีงบประมาณ
$pdf->Write(10, iconv('UTF-8', 'TIS620', ' จำนวน ๑ ฉบับ'));
//$month_s = substr($monthpay,0,2);  // เดือนที่เลือก
// เนื้อความ หนังสือ
$pdf->SetXY(30, 96);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'ด้วย '.$add1_amp.' มีความประสงค์จะยืมเงินงบประมาณ จาก'.$mess_book));

//  -------------- Connect samnak database เพื่อ ตรวจสอบงบประมาณ -----------------------
$c_khong1 = substr($c_khong,2,4);
$c_khong2 = substr($c_khong,2,6);
//  -------------- Connect work database เพื่อ ตรวจสอบงบประมาณ -----------------------
$sqlwork = "SELECT * FROM `samnak` where code_sam = $c_khong1 ";
$dbquery = mysql_db_query($dbname, $sqlwork);
$num_rowsam = mysql_num_rows($dbquery);
$iworksam = 1;
if ($iworksam == $num_rowsam) {
    $row_reg = mysql_fetch_array($dbquery);
    $code_sam = $row_reg['code_sam'];    
    $nam_sam = $row_reg['nam_sam'];    
}
//  -------------- Connect work database เพื่อ ตรวจสอบงบประมาณ -----------------------
$sqlwork = "SELECT * FROM `work` where w_code = $c_khong2 ";
$dbquery = mysql_db_query($dbname, $sqlwork);
$num_rowswork = mysql_num_rows($dbquery);
$iwork = 1;
if ($iwork == $num_rowswork) {
    $row_reg = mysql_fetch_array($dbquery);
    $w_code = $row_reg['w_code'];    
    $w_name = $row_reg['w_name'];    
}

//$pdf->Rect(10, 50, 190,0, 'D'); // เส้นตรง แนวนอน
//$pdf->Rect(150,20, 0,30, 'D'); // เส้นตรง  แนวตั้ง


//echo "--".$nam_sam."--";
$pdf->SetXY(20, 103);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'โดยมีรายละเอียดดังนี้'));
//$pdf->Write(10, iconv('UTF-8', 'TIS620',$nam_sam_.' อยู๋ในส่วนของ'.$w_name));
$a=0;
$b=40;
$pdf->Rect(24,113, 140,90, 'D'); // เส้นตรง  แนวตั้ง (column,row,0,ความสูง);
$pdf->Rect(24, 113, 140,0, 'D'); // เส้นตรง แนวนอน
$pdf->SetXY(30, 113+$a);
$pdf->Write(10, iconv('UTF-8', 'TIS620', '     หมายเลข ID '));
$pdf->SetXY(20+$b, 113+$a); 
//$pdf->Write(10, iconv('UTF-8', 'TIS620',($id_item_)));
$pdf->Cell(20  , 10 , iconv('UTF-8', 'TIS620',($id_item_)) , 0 , 1 , 'L' );
$pdf->SetXY(85, 113+$a);
$pdf->Write(10, iconv('UTF-8', 'TIS620', ' ผู้บันทึก : '));


$pdf->Rect(57,113, 0,90, 'D'); // เส้นตรง  แนวตั้ง (column,row,0,ความสูง);
$pdf->Rect(24, 123, 140,0, 'D'); // เส้นตรง แนวนอน
$pdf->SetXY(33, 123+$a);
$pdf->Write(10, iconv('UTF-8','TIS620','เพื่อดำเนินการ '));
$pdf->SetXY(20+$b, 123+$a);
$pdf->Cell(20  , 10 , iconv('UTF-8','TIS620',($item2)) , 0 , 1 , 'L' );

$pdf->Rect(24, 133, 140,0, 'D'); // เส้นตรง แนวนอน
$pdf->SetXY(43, 133+$a);
$pdf->Write(10, iconv('UTF-8', 'TIS620','ในวันที่   '));
$pdf->SetXY(20+$b, 133+$a);
$pdf->Write(10, $date_check2);

$pdf->Rect(24, 143, 140,0, 'D'); // เส้นตรง แนวนอน
$pdf->SetXY(30, 143+$a);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'งบประมาณหลัก  '));
$pdf->SetXY(20+$b, 143+$a);
$pdf->Cell(20  , 10 , iconv('UTF-8', 'TIS620',($nam_sam)) , 0 , 1 , 'L' );

$pdf->Rect(24, 153, 140,0, 'D'); // เส้นตรง แนวนอน
$pdf->SetXY(30, 153+$a);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'งบประมาณย่อย'));
$pdf->SetXY(20+$b, 153+$a);
$pdf->Cell(20  , 10 , iconv('UTF-8', 'TIS620',($w_name)) , 0 , 1 , 'L' );


$pdf->Rect(24, 163, 140,0, 'D'); // เส้นตรง แนวนอน
$pdf->SetXY(36, 163+$a);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'ได้รับจัดสรร'));
$pdf->SetXY(40+$b, 163+$a);
$pdf->Cell(20  , 10 , iconv('UTF-8', 'TIS620',(number_format($judson_,2)).'   บาท') , 0 , 1 , 'R' );

$pdf->Rect(104,163, 0,40, 'D'); // เส้นตรง  แนวตั้ง (column,row,0,ความสูง);
$pdf->Rect(24, 173, 80,0, 'D'); // เส้นตรง แนวนอน
$pdf->SetXY(41, 173+$a);
$pdf->Write(10, iconv('UTF-8', 'TIS620', ' คงเหลือ'));
$pdf->SetXY(40+$b, 173+$a);
$pdf->Cell(20  , 10 , iconv('UTF-8', 'TIS620',(number_format($lua_,2)).'   บาท') , 0 , 1 , 'R' );

$pdf->Rect(24, 183, 80,0, 'D'); // เส้นตรง แนวนอน

$pdf->SetXY(34, 183+$a);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'เบิกจ่ายครั้งนี้ '));
$pdf->SetXY(40+$b, 183+$a);
$pdf->Cell(20  , 10 , iconv('UTF-8', 'TIS620',(number_format($bath,2)).'   บาท') , 0 , 1 , 'R' );
$bath_pdf = $bath;

$pdf->Rect(24, 193, 80,0, 'D'); // เส้นตรง แนวนอน
//$bath_pdf = number_format($bath,2);
$pdf->SetXY(25, 193+$a);
$pdf->Write(10, iconv('UTF-8', 'TIS620', '      - คงเหลือสุทธิ : '));

$pdf->SetXY(40+$b, 193+$a);
$pdf->Cell(20  , 10 , iconv('UTF-8', 'TIS620',(number_format($lua_-$bath_pdf,2)).'   บาท') , 0 , 1 , 'R' );



$pdf->SetXY(55, 203);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'จึงเรียนมาเพื่อโปรดพิจารณา'));
$pdf->SetXY(104, 213);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'ขอแสดงความนับถือ'));

// ลงท้ายหนังสือ ชื่อ ผอ.  ในบางกรณี ผู้บริหารไปราชการ
//$pdf->SetXY(101,160);$pdf->Write(10,"( $director )");
//$pdf->SetXY(55,167);$pdf->Write(10,'ผู้อำนวยการศูนย์การศึกษานอกระบบและการศึกษาตามอัธยาศัย');
//$pdf->Write(10,substr($name,4,25));
// ลงท้ายหนังสือ  จากหน่วยงาน


$pdf->SetXY(20, 260);
$pdf->Write(0, iconv('UTF-8', 'TIS620', "งานการเงิน"));
$pdf->SetXY(20, 267);
$pdf->Write(0, (iconv('UTF-8', 'TIS620', ("โทรศัพท์ " . $tel_amp))));
$pdf->SetXY(20, 274);
$pdf->Write(0, (iconv('UTF-8', 'TIS620', ("โทรสาร " . $fax_amp))));



//-----------------------------------------------------------------------------
// หน้า ที่ 2 แบบเงินยืม แบบ 8500
//$pdf=new FPDF('P','mm','A4');
//---------------------------------------------------------------------------- หน้า 2
//
//$pdf->AddPage( 'L' ,'A4' ); 
//สิ้นสุดการประมวลผลและส่งออกไฟล์เป็น PDF ไฟล์ 

$pdf->AddPage();
//กำหนดตัวแปร บรรทัด
// เพิ่มรูปครุฑ 
$pdf->SetFont('THSarabunNew', '', 32);
//$pdf->Image('../images/copy.png', 90, 30, 25, 0, '', '');
// Set font
$pdf->SetFont('THSarabunNew', '', 16);
// ค้นหาที่อยู่ หัวหนังสือ จะต้องเป็นของ จังหวัด

// SetXY( column, row );

// ตีกรอบสี่เหลี่ยม	 
//(แนวนอน 1, แนวตั้ง 1,แนวนอน 1 + จำนวนขยาย, แนวตั้ง1+จำนวนขยาย 

$pdf->Image('../images/copy.png', 65, 10, 25, 0, '', '');

$pdf->Rect(10, 20, 190,265 , 'D'); // กรอบสี่เหลี่ยม
$pdf->SetFont('THSarabunNew', '', 16);
$pdf->SetXY(180, 10);
$pdf->Write(10, iconv('UTF-8', 'TIS620',' แบบ 8500'));
$pdf->SetFont('THSarabunNew', '', 24);
$pdf->SetXY(53, 22);
$pdf->Write(10, iconv('UTF-8', 'TIS620','    สัญญาการยืมเงิน'));

$pdf->Rect(10, 50, 190,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(150,20, 0,30, 'D'); // เส้นตรง  แนวตั้ง

$pdf->SetFont('THSarabunNew', '', 16);
$pdf->SetXY(153, 22);
$pdf->Write(10, iconv('UTF-8', 'TIS620','      เลขที่...............................'));
$pdf->SetXY(170, 31);
$pdf->Write(10, iconv('UTF-8', 'TIS620','วันครบกำหนด'));
$pdf->SetXY(165, 40);
$pdf->Write(10, iconv('UTF-8', 'TIS620','..................................'));
// ยืนต่อ
$pdf->SetXY(13, 40);
$pdf->Write(10, iconv('UTF-8', 'TIS620','ยื่นต่อ  ........................................................................................................(1)'));
$pdf->SetXY(25, 38);
$pdf->Write(10, iconv('UTF-8', 'TIS620','ผู้อำนวยการ'.$mess_book));

// ข้าพเจ้า
$pdf->SetXY(13, 50);
$pdf->Write(10, iconv('UTF-8', 'TIS620','ข้าพเจ้า ......................................................................................................... ตำแหน่ง .................................................................'));

// ค้นหาข้อมูลผู้ยืมเงิน
$sqlperson = "SELECT * FROM `person_yuem` where id_yuem = $id_yuem_2 ";
$dbqueryperson = mysql_db_query($dbname, $sqlperson);
$num_rowperson = mysql_num_rows($dbqueryperson);
$iworkperson = 1;
if ($iworkperson == $num_rowperson) {
    $row_person = mysql_fetch_array($dbqueryperson);
    $name_person = $row_person['person'];    
    $name_position = $row_person['position'];    
}
$pdf->SetXY(35, 48);
$pdf->Write(10, iconv('UTF-8', 'TIS620',$name_person));

$pdf->SetXY(142, 48);
$pdf->Write(10, iconv('UTF-8', 'TIS620',$name_position));


// สังกัด
$pdf->SetXY(13, 58);
$pdf->Write(10, iconv('UTF-8', 'TIS620','สังกัด ............................................................................................................. จังหวัด ...................................................................'));
// สังกัด
$pdf->SetXY(35, 56);
$pdf->Write(10, iconv('UTF-8', 'TIS620', ($add1_amp)));
//จังหวัด
$pdf->SetXY(142, 56);
$pdf->Write(10, iconv('UTF-8', 'TIS620',$mess_province));


// มีความประสงค์
$pdf->SetXY(13, 66);
$pdf->Write(10, iconv('UTF-8', 'TIS620','มีความประสงค์ขอยืมเงินจาก ................................................................................................................................................(2)'));
// มีความประสงค์ขอยืมเงินจาก
$pdf->SetXY(60, 64);
$pdf->Write(10, iconv('UTF-8', 'TIS620', 'งบ'.($nam_sam)));
$pdf->Write(10, iconv('UTF-8', 'TIS620', ' / '.($w_name)));

// เพื่อใช้จ่ายเป็นค่า
$pdf->SetXY(13, 74);
$pdf->Write(10, iconv('UTF-8', 'TIS620','เพื่อเป็นค่าใช้จ่ายในการ .........................................................................................................................................................(3)'));
// เพื่อใช้จ่ายในการดำเนินการ
$pdf->SetXY(50, 72);
$pdf->Write(10, iconv('UTF-8','TIS620',($item2)));



$pdf->Rect(10, 84, 190,0, 'D'); // เส้นตรง แนวนอน
$pdf->SetXY(13, 90);
$pdf->Write(10, iconv('UTF-8', 'TIS620',' '));
$pdf->SetXY(13, 96);
$pdf->Write(10, iconv('UTF-8', 'TIS620',' '));
$pdf->SetXY(13, 104);
$pdf->Write(10, iconv('UTF-8', 'TIS620',' '));
// ตัวอักษร - รวมเงิน
$pdf->SetXY(13, 106);
$pdf->Write(10, iconv('UTF-8', 'TIS620','(ตัวอักษร ................................................................................)  รวมเงิน ........................บาท'));

// ใส่จำนวนเงิน
$pdf->SetXY(120, 105);
$pdf->Write(10, iconv('UTF-8', 'TIS620',number_format($bath_pdf,2)));

$pdf->SetXY(165, 99);
$pdf->Write(10, iconv('UTF-8', 'TIS620',number_format($bath_pdf,2)));

$pdf->Rect(10, 117, 190,0, 'D'); // เส้นตรง แนวนอน
// รวมเงิน ขวามือ
$pdf->SetXY(152, 100);
$pdf->Write(10, iconv('UTF-8', 'TIS620','............................................... '));
$pdf->Rect(150,84, 0,33, 'D'); // เส้นตรง  แนวตั้ง
$pdf->SetXY(30, 105);
$pdf->Write(10, iconv('UTF-8', 'TIS620',$num2thai));



$pdf->SetFont('THSarabunNew', '', 16);
// ข้าพเจ้า
$pdf->SetXY(30, 116);
$pdf->Write(10, iconv('UTF-8', 'TIS620','ข้าพเจ้าสัญญาว่าจะปฏิบัติตามระเบียบของทางราชการทุกประการ และจะนำใบสำคัญคู่จ่ายที่ถูกต้อง'));
$pdf->SetXY(13, 124);
$pdf->Write(10, iconv('UTF-8', 'TIS620','พร้อมทั้งเงินเหลือจ่าย (ถ้ามี) ส่งใช้ภายในกำหนดไว้ในระเบียบการเบิกจ่ายเงินจากคลัง คือ ภายใน .......... วัน'));
$pdf->SetXY(13, 132);
$pdf->Write(10, iconv('UTF-8', 'TIS620','นับแต่วันที่ได้รับเงินนี้  ถ้าข้าพเจ้าไม่ส่งตามกำหนด  ข้าพเจ้ายินยอมให้หักเงินเดือน  ค่าจ้าง  เบี้ยหวัด  บำเหน็จ'));
$pdf->SetXY(13, 140);
$pdf->Write(10, iconv('UTF-8', 'TIS620','บำนาญ  หรือเงินอื่นใดที่ข้าพเจ้าพึงได้รับจากทางราชการ  ชดใช้จำนวนเงินที่ยืมไปจนครบถ้วนได้ทันที'));
$pdf->SetXY(13, 150);
$pdf->Write(10, iconv('UTF-8', 'TIS620','ลายมือชื่อ .......................................................................................ผู้ยืม    วันที่  ...................................................'));
// ใส่ชื่อผู้ยืมเงิน
$pdf->SetFont('THSarabunNew', '', 14);
$pdf->SetXY(55, 155);
$pdf->Write(10, iconv('UTF-8', 'TIS620',$name_person));
// วันที่
$pdf->SetFont('THSarabunNew', '', 16);
$pdf->SetXY(137, 148);
$pdf->Write(10, ($d . ' ' . $m . ' ' . $y));



$pdf->SetFont('THSarabunNew', '', 16);
$pdf->Rect(10, 165, 190,0, 'D'); // เส้นตรง แนวนอน

$pdf->SetFont('THSarabunNew', '', 16);
$pdf->SetXY(13, 165);
$pdf->Write(10, iconv('UTF-8', 'TIS620','เสนอ  .....................................................................................................................(4)'));  
$pdf->SetXY(25, 156);
$pdf->Write(25, iconv('UTF-8', 'TIS620','ผู้อำนวยการ'.$mess_book));

// จำนวนเงิน
$pdf->SetXY(30, 173);
$pdf->Write(10, iconv('UTF-8', 'TIS620','ได้ตรวจสอบแล้ว  เห็นสมควรอนุมัติให้ยืมตามใบยืมฉบับนี้ได้  จำนวน............................................บาท'));  
$pdf->SetXY(145, 172);
$pdf->Write(10, iconv('UTF-8', 'TIS620',number_format($bath_pdf,2)));

$pdf->SetXY(13, 180);
$pdf->Write(10, iconv('UTF-8', 'TIS620','(.................................................................................................................................)'));  
// จำนวนเงิน - ตัวหนังสือ

$pdf->SetXY(25, 179);
$pdf->Write(10, iconv('UTF-8', 'TIS620',$num2thai));


$pdf->SetXY(13, 191);
$pdf->Write(10, iconv('UTF-8', 'TIS620','ลงชื่อ ............................................................................                                      วันที่  ...................................................'));

//คำอนุมัติ
$pdf->SetFont('THSarabunNew', '', 24);
$pdf->SetXY(83, 200);
$pdf->Write(10, iconv('UTF-8', 'TIS620','     คำอนุมัติ'));

$pdf->SetFont('THSarabunNew', '', 17);
//อุมัติให้
$pdf->SetXY(17, 208);
$pdf->Write(10, iconv('UTF-8', 'TIS620','อุมัติให้ยืมตามเงื่อนไขข้างต้นได้  เป็นเงิน..............................................................................................บาท'));  
$pdf->SetXY(13, 216);
$pdf->Write(10, iconv('UTF-8', 'TIS620','(.................................................................................................................................)'));  
$pdf->SetXY(13, 225);
$pdf->Write(10, iconv('UTF-8', 'TIS620','ลงชื่อผู้อนุมัติ..............................................................                                  วันที่  ...............................................'));
$pdf->Rect(10, 240, 190,0, 'D'); // เส้นตรง แนวนอน
// ใส่จำนวนเงิน
$pdf->SetXY(120, 207);
$pdf->Write(10, iconv('UTF-8', 'TIS620',number_format($bath_pdf,2)));

$pdf->SetXY(25, 215);
$pdf->Write(10, iconv('UTF-8', 'TIS620',$num2thai));


// ใบรับเงิน
$pdf->SetFont('THSarabunNew', '', 24);
$pdf->SetXY(83, 242);
$pdf->Write(10, iconv('UTF-8', 'TIS620','  ใบรับเงิน'));

$pdf->SetFont('THSarabunNew', '', 17);
//อุมัติให้
$pdf->SetXY(17, 250);
$pdf->Write(10, iconv('UTF-8', 'TIS620','ได้รับเงินยืมจำนวน..................................บาท    (........................................................................................................)'));  

$pdf->SetXY(50, 249);
$pdf->Write(10, iconv('UTF-8', 'TIS620',number_format($bath_pdf,2)));

$pdf->SetXY(100, 249);
$pdf->Write(10, iconv('UTF-8', 'TIS620',$num2thai));


$pdf->SetXY(13, 257);
$pdf->Write(10, iconv('UTF-8', 'TIS620','ไปเป็นการถูกต้องแล้ว'));


$pdf->SetXY(13, 270);
$pdf->Write(1, iconv('UTF-8', 'TIS620','          ลงชื่อ ............................................................................                        วันที่  ..........................................'));
$pdf->SetFont('THSarabunNew', '', 14);
$pdf->SetXY(50, 275);
$pdf->Write(1, iconv('UTF-8', 'TIS620',$name_person));



//-----------------------------------------------------------------------------
// หน้า ที่ 3 หน้าหลังเงินยืม
//$pdf=new FPDF('P','mm','A4');
//---------------------------------------------------------------------------- หน้า 3
//
//$pdf->AddPage( 'L' ,'A4' ); 
//สิ้นสุดการประมวลผลและส่งออกไฟล์เป็น PDF ไฟล์ 

$pdf->AddPage();

$pdf->SetFont('THSarabunNew', '', 24);
$pdf->SetXY(74, 13);
$pdf->Write(10, iconv('UTF-8', 'TIS620',' รายการส่งใช้เงินยืม'));
$pdf->SetXY(74, 13);
$pdf->Write(10, iconv('UTF-8', 'TIS620',' รายการส่งใช้เงินยืม'));
$pdf->SetFont('THSarabunNew', '', 24);

$pdf->Rect(10, 25, 190,0, 'D'); // เส้นตรง แนวนอน
$pdf->SetFont('THSarabunNew', '', 18);
$pdf->SetXY(12, 31);
$pdf->Write(10, iconv('UTF-8', 'TIS620','ครั้งที่'));
$pdf->Rect(25,25, 0,215, 'D'); // เส้นตรง  แนวตั้ง

$pdf->SetXY(27, 31);
$pdf->Write(10, iconv('UTF-8', 'TIS620','วัน  เดือน  ปี  '));
$pdf->Rect(54,25, 0,215, 'D'); // เส้นตรง  แนวตั้ง

$pdf->SetFont('THSarabunNew', '', 15);
$pdf->SetXY(66, 26);
$pdf->Write(10, iconv('UTF-8', 'TIS620','รายการส่งใช้  '));
$pdf->Rect(54, 35, 47,0, 'D'); // เส้นตรง แนวนอน

$pdf->SetFont('THSarabunNew', '', 15);
$pdf->SetXY(56, 35);
$pdf->Write(10, iconv('UTF-8', 'TIS620','เงินสด หรือ  '));
$pdf->SetXY(59, 41);
$pdf->Write(10, iconv('UTF-8', 'TIS620','ใบสำคัญ  '));
$pdf->Rect(76,35, 0,205, 'D'); // เส้นตรง  แนวตั้ง

$pdf->SetFont('THSarabunNew', '', 15);
$pdf->SetXY(78, 38);
$pdf->Write(10, iconv('UTF-8', 'TIS620','จำนวนเงิน  '));
$pdf->Rect(96,35, 0,205, 'D'); // เส้นตรง  แนวตั้ง
$pdf->Rect(101,25, 0,215, 'D'); // เส้นตรง  แนวตั้ง

$pdf->SetFont('THSarabunNew', '', 18);
$pdf->SetXY(108, 31);
$pdf->Write(10, iconv('UTF-8', 'TIS620','คงค้าง  '));
$pdf->Rect(122,50, 0,190, 'D'); // เส้นตรง  แนวตั้ง
$pdf->Rect(128,25, 0,215, 'D'); // เส้นตรง  แนวตั้ง

$pdf->SetXY(138, 31);
$pdf->Write(10, iconv('UTF-8', 'TIS620','ลายมือชื่อผู้รับ  '));
$pdf->Rect(172,25, 0,215, 'D'); // เส้นตรง  แนวตั้ง

$pdf->SetXY(177, 31);
$pdf->Write(10, iconv('UTF-8', 'TIS620','ใบรับเลขที่  '));



$pdf->Rect(10, 50, 190,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(10, 60, 190,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(10, 70, 190,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(10, 80, 190,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(10, 90, 190,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(10, 100, 190,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(10, 110, 190,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(10, 120, 190,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(10, 130, 190,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(10, 140, 190,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(10, 150, 190,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(10, 160, 190,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(10, 170, 190,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(10, 180, 190,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(10, 190, 190,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(10, 200, 190,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(10, 210, 190,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(10, 220, 190,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(10, 230, 190,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(10, 240, 190,0, 'D'); // เส้นตรง แนวนอน


$pdf->SetFont('THSarabunNew', '', 16);
$pdf->SetXY(12, 241);
$pdf->Write(10, iconv('UTF-8', 'TIS620','หมายเหตุ  '));
$pdf->SetXY(12, 241);
$pdf->Write(10, iconv('UTF-8', 'TIS620','หมายเหตุ  '));

$pdf->SetXY(35, 241);
$pdf->Write(10, iconv('UTF-8', 'TIS620',' (1)   ยื่นต่อ ผู้อำนวยการกองคลัง หัวหน้ากองคลัง หัวหน้าแผนกคลัง หรือตำแหน่งอื่นใด'));

$pdf->SetXY(44, 247);
$pdf->Write(10, iconv('UTF-8', 'TIS620','กรณีที่ปฏิบัติงานเช่นเดียวกันแล้วแต่ '));

$pdf->SetXY(37, 253);
$pdf->Write(10, iconv('UTF-8', 'TIS620','(2)  ให้ระบุชื่อส่วนราชการที่จ่ายเงินยืม '));

$pdf->SetXY(37, 259);
$pdf->Write(10, iconv('UTF-8', 'TIS620','(3)  ระบุวัตถุประสงค์ที่จะนำเงินยืมไปใช้จ่าย '));

$pdf->SetXY(37, 265);
$pdf->Write(10, iconv('UTF-8', 'TIS620','(4)  เสนอต่อผู้มีอำนาจอนุมัติ '));




//-----------------------------------------------------------------------------
// หน้า ที่ 4 ประมาณการ เงินยืม สำเนา
//$pdf=new FPDF('P','mm','A4');
//---------------------------------------------------------------------------- หน้า 4
//
//$pdf->AddPage( 'L' ,'A4' ); 
//สิ้นสุดการประมวลผลและส่งออกไฟล์เป็น PDF ไฟล์ 

$pdf->AddPage();

$pdf->Image('../images/copy.png', 165, 10, 25, 0, '', '');

$pdf->SetFont('THSarabunNew', '', 18);
$pdf->SetXY(74, 13);
$pdf->Write(11, iconv('UTF-8', 'TIS620',$mess_book));

$pdf->SetFont('THSarabunNew', '', 18);
$pdf->SetXY(40, 22);
$pdf->Write(10, iconv('UTF-8', 'TIS620',' ประมาณการค่าใช้จ่าย การจัดประชุม/อบรม/สัมมนา/โครงการ'));
$pdf->SetFont('THSarabunNew', '', 16);

$pdf->Rect(10, 33, 190,0, 'D'); // เส้นตรง แนวนอน

$pdf->SetFont('THSarabunNew', '', 16);

// $pdf->SetXY(Coumn, Row);

$pdf->SetXY(30, 40);
$pdf->Write(10, iconv('UTF-8', 'TIS620','วัน เดือน ปี ที่ยืม  : '));
$pdf->Write(10, ($d . ' ' . $m . ' ' . $y));
$pdf->SetXY(30, 48);
$pdf->Write(10, iconv('UTF-8', 'TIS620','ชื่อ-สกุล ผู้ยืมเงิน  : '.$name_person));


$pdf->SetXY(120, 48);
$pdf->Write(10, iconv('UTF-8', 'TIS620','ตำแหน่ง : '.$name_position));

$pdf->SetXY(30, 56);
$pdf->Write(10, iconv('UTF-8', 'TIS620','       รายการยืม  : '));

$pdf->Cell(20  , 10 , iconv('UTF-8','TIS620',($item2)) , 0 , 1 , 'L' );


$pdf->SetFont('THSarabunNew', '', 16);
$pdf->SetXY(28, 70);
$pdf->Write(10, iconv('UTF-8', 'TIS620','รายการยืม'));

$pdf->SetXY(95, 70);
$pdf->Write(10, iconv('UTF-8', 'TIS620','รายละเอียด'));

$pdf->SetXY(163, 70);
$pdf->Write(10, iconv('UTF-8', 'TIS620','จำนวน (บาท)'));

//$pdf->Write(10, iconv('UTF-8', 'TIS620','       เบี้ยเลี้ยง           ค่าที่พัก           ค่าพาหนะ          ค่าวิทยากร         ค่าอาหาร          ค่าวัสดุ          อื่น ๆ       '));

$pdf->SetXY(20, 80);
$pdf->Write(10, iconv('UTF-8', 'TIS620',' - เบี้ยเลี้ยง'));

$pdf->SetXY(20, 90);
$pdf->Write(10, iconv('UTF-8', 'TIS620',' - ค่าที่พัก'));

$pdf->SetXY(20, 100);
$pdf->Write(10, iconv('UTF-8', 'TIS620',' - ค่าพาหนะ'));

$pdf->SetXY(20, 110);
$pdf->Write(10, iconv('UTF-8', 'TIS620',' - ค่าวิทยากร'));

$pdf->SetXY(20, 120);
$pdf->Write(10, iconv('UTF-8', 'TIS620',' - ค่าอาหาร'));

$pdf->SetXY(20, 130);
$pdf->Write(10, iconv('UTF-8', 'TIS620',' - ค่าวัสดุ'));

$pdf->SetXY(20, 140);
$pdf->Write(10, iconv('UTF-8', 'TIS620',' - อื่น'));


//$pdf->Rect(แนวตั้งแรก, แนวนอนแรก, ความกว้างแนวตั้ง, ความยาวแนวนอน, 'D'); // เส้นตรง แนวตั้ง 2
$pdf->Rect(20, 70, 35,130, 'D'); // เส้นตรง แนวตั้ง 1
//$pdf->Rect(70, 70, 25,150, 'D'); // เส้นตรง แนวตั้ง 2
//$pdf->Rect(120, 70, 25,150, 'D'); // เส้นตรง แนวตั้ง 2
$pdf->Rect(160, 70, 30,140, 'D'); // เส้นตรง แนวตั้ง 2


$pdf->Rect(20, 70, 170,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(20, 80, 170,0, 'D'); // เส้นตรง แนวนอน

$pdf->Rect(20, 90, 170,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(20, 100, 170,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(20, 110, 170,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(20, 120, 170,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(20, 130, 170,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(20, 140, 170,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(20, 150, 170,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(20, 160, 170,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(20, 170, 170,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(20, 180, 170,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(20, 190, 170,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(20, 200, 170,0, 'D'); // เส้นตรง แนวนอน

$pdf->SetXY(140, 200);
$pdf->Write(10, iconv('UTF-8', 'TIS620','รวมเงิน  '));

$pdf->SetXY(165, 200);
$pdf->Write(10, iconv('UTF-8', 'TIS620',number_format($bath_pdf,2)));


$pdf->SetFont('THSarabunNew', '', 16);
$pdf->SetXY(20, 240);
$pdf->Write(10, iconv('UTF-8', 'TIS620','ลงชื่อ.....................................................ผู้ยืม/ประมาณการ'));
$pdf->SetXY(20, 250);
$pdf->Write(10, iconv('UTF-8', 'TIS620','     (________________________)'));
$pdf->SetXY(31, 260);
$pdf->Write(10, ($d . ' / ' . $m . ' / ' . $y));


$pdf->SetFont('THSarabunNew', '', 16);
$pdf->SetXY(120, 240);
$pdf->Write(10, iconv('UTF-8', 'TIS620','ลงชื่อ.....................................................ผู้อนุมัติ'));
$pdf->SetXY(120, 250);
$pdf->Write(10, iconv('UTF-8', 'TIS620','      (________________________)'));
$pdf->SetXY(140, 260);
$pdf->Write(10," /             /     ");
//$pdf->Write(10, ($d . ' / ' . $m . ' / ' . $y));





$date_file = date("dmY-His");
//$pdf->Output($date_file, 'F');
$pdf->Output();
?>