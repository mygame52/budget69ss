<?php

   //$bar_T  = array(61.04,43.76,48.12,88.46,0,0,21.96,0,3.91);

include("fgets_explode.php");
//ช่วงต่อไปจะสร้างกราฟแท่งโดยนำโค้ดมาจากไฟล์ bar1.php /////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//$theng=$bar;  //จำนวนกราฟแท่ง จะต้องสัมพันธ์ กับ บรรทัดที่ 6 ด้วย
$high=250;  //ความสูงของ พท.
$width = ($theng*50)+20;   // ความก้าวงของ พท.80
$line=200;  //ค่าตัวล่างของแถวแต่ละแท่งเท่ากันที่ line
 
$image = imagecreate($width, $high);
$bg = imagecolorallocate($image, 255, 255, 204); 
$red = imagecolorallocate($image, 0xFF, 0x00, 0x00); 
$edge = imagecolorallocate($image, 40, 50, 40);
$blue = imagecolorallocate($image, 40, 50, 255);
Imageline($image,30,50,30,$line,$blue);
ImageTTFText($image, 18, 0, 20, 40, $blue, "2005_iannnnnMTV.ttf", utf8_encode("100"));
ImageTTFText($image, 18, 0, 10, 125, $blue, "2005_iannnnnMTV.ttf", utf8_encode("50--"));
ImageTTFText($image, 18, 0, 10, 200, $blue, "2005_iannnnnMTV.ttf", utf8_encode(" 0--"));

$t = 0;
for ($i=1; $i<=$theng; $i++){
//	echo "<BR>";
	$t=$t+40;  //ความห่างกันของแต่ละแท่ง60
$x1=0+$t;
//$y1 = ($line+50)-($bar_T[$i] * $line/$max) ;    //  หาค่าที่จะเริ่มวาด x1 ค่า 30 คือเอาหัวกราฟไว้ด้านบน 50
//$y1 = 200-($bar_T[$i]*1.5) ;    //  หาค่าที่จะเริ่มวาด x1 ค่า 30 คือเอาหัวกราฟไว้ด้านบน 50
$y1 = 200-($exp[$i][1]*1.5) ;    //  หาค่าที่จะเริ่มวาด x1 ค่า 30 คือเอาหัวกราฟไว้ด้านบน 50
$y2= $line;

$x2=$x1+25;  //ความกว้างของแท่งกราฟ30
//echo $x1;

imagefilledRectangle($image, $x1+5, $y1-5, $x2+5, $y2-5, $edge);
imagefilledRectangle($image, $x1, $y1, $x2, $y2, $red);
ImageTTFText($image, 20, 0, $x1, $y1-10, $blue, "2005_iannnnnMTV.ttf", utf8_encode($exp[$i][1]));
//ImageTTFText($image, 14, 270, $x2-20, $y2+10, $blue, "2005_iannnnnMTV.ttf", utf8_encode($exp[$i][0]));
//ImageTTFText($image, 14, 330, $x2-20, $y2+10, $blue, "dsnangb.ttf", utf8_encode($exp[$i][0]));
ImageTTFText($image, 15, 330, $x2-20, $y2+10, $blue, "2005_iannnnnMTV.ttf", $exp[$i][0]);

}



header("Content-type: image/png");
imagepng($image);
imagedestroy($image);	

		  
?> 
