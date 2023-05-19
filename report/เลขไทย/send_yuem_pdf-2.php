<?php	session_start();
	//session_register("session");
	//$session[id]=$id;
	include("../config.inc.php");

//echo $id_item_pdf;        
// กำหนด เปลี่ยนเลข อารบิก เป็นเลขไทย 
include ('../include/function.php');
require('../fpdf/fpdf.php'); 


$pdf=new FPDF('P','mm','A4');

$pdf->AddFont('THSarabunNew','','THSarabunNew.php');
$pdf->Open();
$pdf->AliasNbPages();
$pdf->SetMargins(20,5,1);

//$amp_ = $_REQUEST['amp_pdf'];
$amp_ = $_REQUEST['amp_pdf'];
$id_item_ = $_REQUEST['id_item_pdf'];
//----------------------------------------------------------------------------------------------------------------------------------- หน้า 1
$pdf->AddPage();
//กำหนดวาดรูปสี่เหลี่ยม (rectangle) ไม่มีพื้นหลัง (no fill) 
//$pdf->Rect(20, 25, 175, 250 , 'D');


// --------------------------------------------- รายงาน  การจ่ายค่าสาธารณูปโภค ------------------------//


//กำหนดตัวแปร บรรทัด
//$cline == 25;

// เพิ่มรูปครุฑ 
$pdf->Image('../images/krut.jpg',95,10,25,0,'','');
//$pdf->Image('logo.png',5,12,25,0,'','http://www.select2web.com');

// Set font
$pdf->SetFont('THSarabunNew','',16);

// ค้นหาที่อยู่ หัวหนังสือ
			$sql="select * from amp where id=$amp_";	
			$dbquery = mysql_db_query($dbname, $sql);
			$num_rows = mysql_num_rows($dbquery);
			$i=0;
			while ($i < $num_rows)
				{
					$result = mysql_fetch_array($dbquery);
					$code = $result['id'];
                                        $name = $result['Name'];
                                        $numbook = $result['numbook'];
					$add1 = $result['add1'];
					$add2 = $result['add2'];
					$add3 = $result['add3'];
					$director = $result['director'];
					$tel_org = $result['tel'];
					$fax = $result['fax'];
					$i++;
				}

//พิมพ์หัวหนังสือ
$pdf->SetXY(20,30);$pdf->Write(10,thainumDigit("ที่ $numbook"));
$pdf->SetXY(140,30);$pdf->Write(10,thainumDigit($add1));
$pdf->SetXY(140,37);$pdf->Write(10,thainumDigit($add2));
$pdf->SetXY(140,44);$pdf->Write(10,thainumDigit($add3));

//

//  -------- ค้นหา รายการจ่ายประจำเดือน -------------
//  -------------- Connect Database -----------------------

$sql="SELECT * FROM `item` where id_item= '$id_item_' ";
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$i=1;

if ($i == $num_rows)
{
	$result = mysql_fetch_array($dbquery);
	$id =$result[0];
	$fire = $result[1];
	$water = $result[2];
	$tel = $result[3];
	$post =  $result[4];
	$oil =  $result[5];
	$note =  $result[6];
	$foryear =  $result[7];
	$monthpay =   trim($result[8]);
	$fireunit = $result[9];
	$waterunit = $result[10];
	$oilunit = $result[11];
}
// วันที่
//$pdf->SetXY(105,55);$pdf->Write(10,'๑๐ ตุลาคม ๒๕๕๕');
$thai_n=array("มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม","กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
$d=date("d");
$m=$thai_n[date("n") -1];
$y=date("Y") +543;
$pdf->SetXY(105,55);$pdf->Write(10,thainumDigit("$d $m $y"));

//$pdf->Write(10,$today));

// เรื่อง
$pdf->SetXY(20,64);$pdf->Write(10,'เรื่อง');
$pdf->SetXY(30,64);$pdf->Write(10,'ขอส่งแบบรายงานค่าสาธารณูปโภค');
// เรียน
$pdf->SetXY(20,74);$pdf->Write(10,'เรียน');
$pdf->SetXY(30,74);$pdf->Write(10,'อธิบดีกรมส่งเสริมการเรียนรู้');
// สิ่งที่ส่งมาด้วย
$pdf->SetXY(20,84);$pdf->Write(10,'สิ่งที่ส่งมาด้วย');
$pdf->SetXY(45,84);$pdf->Write(10,'แบบรายงานค่าสาธารณูปโภค (รายเดือน) ปีงบประมาณ ');
$pdf->Write(10,thainumDigit($foryear));
$pdf->Write(10,' จำนวน ๑ ชุด');
$month_s = substr($monthpay,0,2);  // เดือนที่เลือก
	if ($month_s=='10'){ $month_select = 1;}
	if ($month_s=='11'){ $month_select = 2;}
	if ($month_s=='12'){ $month_select = 3;}
	if ($month_s=='01'){ $month_select = 4;}
	if ($month_s=='02'){ $month_select = 5;}
	if ($month_s=='03'){ $month_select = 6;}
	if ($month_s=='04'){ $month_select = 7;}
	if ($month_s=='05'){ $month_select = 8;}
	if ($month_s=='06'){ $month_select = 9;}
	if ($month_s=='07'){ $month_select = 10;}
	if ($month_s=='08'){ $month_select = 11;}
	if ($month_s=='09'){ $month_select = 12;}

// เนื้อความ หนังสือ
$pdf->SetXY(35,94);$pdf->Write(10,'ด้วยสำนักงานส่งเสริมการศึกษานอกระบบและการศึกษาตามอัธยาศัย จังหวัดสุราษฎร์ธานี  ได้จัดทำแบบ');
$pdf->SetXY(20,101);$pdf->Write(10,"รายงานค่าสาธารณูปโภคและดัชนีพลังงาน ประจำเดือน");
$pdf->Write(10,substr($monthpay,3,10));
$pdf->Write(10," ปีงบประมาณ ");
$pdf->Write(10,thainumDigit($foryear));
$pdf->Write(10,' เสร็จเรียบร้อยแล้ว จึงขอนำส่ง');
$pdf->SetXY(20,108);
$pdf->Write(10,'มาพร้อม หนังสือฉบับนี้');


// ลงท้ายหนังสือ
$pdf->SetXY(35,125);$pdf->Write(10,'จึงเรียนมาเพื่อโปรดทราบ');
$pdf->SetXY(104,135);$pdf->Write(10,'ขอแสดงความนับถือ');

// ลงท้ายหนังสือ ชื่อ ผอ.  ในบางกรณี ผู้บริหารไปราชการ
//$pdf->SetXY(101,160);$pdf->Write(10,"( $director )");
//$pdf->SetXY(55,167);$pdf->Write(10,'ผู้อำนวยการศูนย์การศึกษานอกระบบและการศึกษาตามอัธยาศัย');
//$pdf->Write(10,substr($name,4,25));


// ลงท้ายหนังสือ  จากหน่วยงาน
$pdf->SetXY(20,240);$pdf->Write(10,$name);
$pdf->SetXY(20,247);$pdf->Write(10,thainumDigit("โทร. $tel"));
$pdf->SetXY(20,254);$pdf->Write(10,thainumDigit("โทรสาร $fax"));


//-------------------------------------------------------
// หน้า ที่ 2 รายงานสรุป  - เอกสารแนบ
//$pdf=new FPDF('P','mm','A4');


//----------------------------------------------------------------------------------------- หน้า 2
//$pdf->AddPage( 'L' ,'A4' ); 

//สิ้นสุดการประมวลผลและส่งออกไฟล์เป็น PDF ไฟล์ 
$pdf->Output();

?>