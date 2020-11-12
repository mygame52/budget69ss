<?php	# piechart.php

$im = imagecreate(170, 105);
$white    = imagecolorallocate($im, 0xFF, 0xFF, 0xFF);
$gray     = imagecolorallocate($im, 0xC0, 0xC0, 0xC0);
$darkgray = imagecolorallocate($im, 0x60, 0x60, 0x60);
$navy     = imagecolorallocate($im, 0x15, 0x55, 0xFF);
$darknavy = imagecolorallocate($im, 0x00, 0x00, 0x90);
$red      = imagecolorallocate($im, 0xFF, 0x00, 0x00);
$darkred  = imagecolorallocate($im, 0x90, 0x00, 0x00);
$txtcol = ImageColorAllocate($im,55,77,155); 

for ($i = 60; $i > 50; $i--) {
  imagefilledarc($im, 75, $i+5, 100, 50, 0, 45, $darknavy, IMG_ARC_PIE);
  imagefilledarc($im, 65, $i+10, 100, 50, 45, 75 , $darkgray, IMG_ARC_PIE);
 imagefilledarc($im, 55, $i, 100, 50, 75, 360 , $darkred, IMG_ARC_PIE);

}
imagefilledarc($im, 75, 55, 100, 50, 0, 45, $navy, IMG_ARC_PIE);
imagefilledarc($im, 65, 60, 100, 50, 45, 75 , $gray, IMG_ARC_PIE);
imagefilledarc($im, 55, 50, 100, 50, 75, 360 , $red, IMG_ARC_PIE);
imagestring($im, 5, 14, 6, "Mysite.com", $gray);
imagestring($im, 5, 13, 5, "Mysite.com", $txtcol);
imagestring($im, 2, 99, 87, "Others 30%", $txtcol);
imagestring($im, 2, 7, 85, "Honda 70%", $darkred);
imagestring($im, 2, 109, 39, "Ford 20%", $navy);

header('Content-type: image/png');
imagepng($im);
imagedestroy($im);
?> 