<?php	# pie1.php

include("/budget/grap1.php");
echo $jp;
echo $k;

$im = imagecreate(170, 125);
$white    = imagecolorallocate($im, 0xFF, 0xFF, 0xFF);
$gray     = imagecolorallocate($im, 0xC0, 0xC0, 0xC0);
$navy     = imagecolorallocate($im, 0x15, 0x55, 0xFF);
$red      = imagecolorallocate($im, 0xFF, 0x00, 0x00);

imagefilledArc($im, 72, 55, 100, 100, 0, 45, $navy, IMG_ARC_PIE);
//imagefilledArc($im, 63, 55, 100, 100, 45, 75 , $gray, IMG_ARC_PIE);
//imagefilledArc($im, 55, 50, 100, 100, 75, 360 , $red, IMG_ARC_PIE);

header('Content-type: image/png');
imagepng($im);
imagedestroy($im);
?> 