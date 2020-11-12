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

//-----------------------------------------------------------------------------
// หน้า ที่ 2 รายงานสรุป  - เอกสารแนบ
//$pdf=new FPDF('P','mm','A4');
//---------------------------------------------------------------------------- หน้า 2
//
//$pdf->AddPage( 'L' ,'A4' ); 
//สิ้นสุดการประมวลผลและส่งออกไฟล์เป็น PDF ไฟล์ 

$pdf->AddPage();
//กำหนดตัวแปร บรรทัด
// SetXY( column, row );

// ตีกรอบสี่เหลี่ยม	 
//(แนวนอน 1, แนวตั้ง 1,แนวนอน 1 + จำนวนขยาย, แนวตั้ง1+จำนวนขยาย 

//$pdf->Rect(10, 20, 190,265 , 'D'); // กรอบสี่เหลี่ยม
$pdf->SetFont('THSarabunNew', '', 24);
$pdf->SetXY(70, 13);
$pdf->Write(10, iconv('UTF-8', 'TIS620',' รายการส่งใช้เงินยืม'));
$pdf->SetFont('THSarabunNew', '', 24);

$pdf->Rect(10, 50, 190,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(150,20, 0,30, 'D'); // เส้นตรง  แนวตั้ง

$pdf->Rect(10, 50, 190,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(10, 60, 190,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(10, 70, 190,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(10, 80, 190,0, 'D'); // เส้นตรง แนวนอน
$pdf->Rect(10, 90, 190,0, 'D'); // เส้นตรง แนวนอน




$pdf->Rect(150,84, 0,33, 'D'); // เส้นตรง  แนวตั้ง

$pdf->SetFont('THSarabunNew', '', 16);

// การใส่ข้อความ
//$pdf->SetXY(13, 124);
//$pdf->Write(10, iconv('UTF-8', 'TIS620','อิทยา'));









$date_file = date("dmY-His");
//$pdf->Output($date_file, 'F');
$pdf->Output();
?>