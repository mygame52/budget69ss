<?php
define('FPDF_FONTPATH','fpdf/font/');
 
require('fpdf/fpdf.php');
$pdf=new FPDF();
 
// เพิ่มฟ้อนต์ภาษาไทยเข้ามา ตัวธรรมดา กำหนด ชื่อ เป็น angsana
$pdf->AddFont('THSarabunNew', '', 'THSarabunNew.php');
$pdf->AddPage();
$pdf->Open();
$pdf->AliasNbPages();
$pdf->SetMargins(20, 5, 1);



   $pdf->MultiCell( 190  , 7 , iconv( 'UTF-8','cp874' , 'รหัสทรัพย์สิน :'.'                    ชื่อทรัพย์สิน :'),'LTR');
  $pdf->MultiCell( 190  , 7 , iconv( 'UTF-8','cp874' , 'รหัสผู้ครอบครองเดิม :'.'                           ชื่อผู้ครอบครอง : ') ,'LR');
  $pdf->MultiCell( 190  , 7 , iconv( 'UTF-8','cp874' , 'รหัสผู้ครอบครองใหม่ :'.'                             ชื่อผู้ครอบครอง :') ,'LBR');
  $pdf->SetLeftMargin(5 );

//connect db

$pdf->Output( 'tmp/report.pdf' , 'F' );
?>

