<?php
$jp1= fopen("grap.ini","r");
$jp2=fread($jp1,5);
//echo $jp2;
fclose($jp1);
$k= 360-$jp2;
$im = imagecreate(150, 125);
$white    = imagecolorallocate($im, 0xFF, 0xFF, 0xFF);
$gray     = imagecolorallocate($im, 0xC0, 0xC0, 0xC0);
$darkgray = imagecolorallocate($im, 0x60, 0x60, 0x60);
$navy     = imagecolorallocate($im, 0x15, 0x55, 0xFF);
$darknavy = imagecolorallocate($im, 0x00, 0x00, 0x90);
$red      = imagecolorallocate($im, 0xFF, 0x00, 0x00);
$darkred  = imagecolorallocate($im, 0x90, 0x00, 0x00);
$txtcol = ImageColorAllocate($im,55,77,155); 

for ($i=10; $i>1; $i--) {
//imagefilledArc($im, 72, 55, 100, 100, 0, $jp2, $navy, IMG_ARC_PIE);
imagefilledArc($im, 56, 53+$i, 100, 100, $jp2, 360 , $darkgray, IMG_ARC_PIE);
imagefilledArc($im, 54, 57+$i, 100, 100, 0, $jp2 , $darkred, IMG_ARC_PIE);
}
imagefilledArc($im, 57, 53, 100, 100, $jp2, 360 , $gray, IMG_ARC_PIE);
imagefilledArc($im, 54, 57, 100, 100, 0, $jp2 , $red, IMG_ARC_PIE);
$font = "tahoma.ttf";
//imageTTFText($im,15,0,10, 75, $navy,$font ,"To Pay");
//imageTTFText($im,10,0,65, 40, $darkred,$font ,"To Remain");

header('Content-type: image/png');
imagepng($im);
imagedestroy($im);
?>