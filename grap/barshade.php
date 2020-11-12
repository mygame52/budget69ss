<?php		# barshade.php

$im = imagecreate(225,105);
$back = ImageColorAllocate($im,240,255,5);

$blk = ImageColorAllocate($im,0,0,200);
drawbar($im,45,5,15,'Sony');
drawbar($im,45,20,5,'BenQ');
drawbar($im,45,35,10,'Moto');
drawbar($im,45,50,22,'Pana');
drawbar($im,45,65,38,'Nokia');

$shadow = ImageColorAllocate($im,170,170,170);
imagestring($im, 5, 61, 86, "My Bar Chart!", $shadow);
imagestring($im, 5, 60, 85, "My Bar Chart!", $blk);

Header("Content-type: image/png");
imagePNG($im);
imagedestroy($im);

function drawbar($im,$x1,$y1,$rating,$txt) {
	$barlen=$rating * 4; // scale
	$red = ImageColorAllocate($im,200,0,0);
	$y=0 ;
	for ($i = 50; $i <= 250; $i+=50) {
	   $fill = ImageColorAllocate($im,0,$i,0);
	   ImageFilledRectangle($im,$x1,$y1+$y, $x1+$barlen, $y1+$y,$fill);
	   $y=$y+1;
	}
	for ($i = 250; $i >= 50; $i-=30) {
	   $fill = ImageColorAllocate($im,0,$i,0);
	   ImageFilledRectangle($im,$x1,$y1+$y, $x1+$barlen, $y1+$y,$fill);
	   $y=$y+1;
	}
	imagestring($im, 3, 4, $y1-1, $txt , $red);
	imagestring($im, 2, $barlen+49, $y1-1, $rating. '%' , $red);
}
?> 
