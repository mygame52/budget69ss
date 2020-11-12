<?php
$image = imagecreate(280, 170);

$bg = imagecolorallocate($image, 0xFF, 0xDE, 0xBB); 
$red = imagecolorallocate($image, 0xFF, 0x00, 0x00); 
$edge = imagecolorallocate($image, 40, 50, 40);

$y_org = 130;

$x = 30;
$y = $y_org;
$w = 25;
$dist=$w+15;

$h = 50;
imagefilledRectangle($image, $x, $y, $x+$w, $y-$h, $red);
$x = $x+$dist;
$h = 30;
imagefilledRectangle($image, $x, $y, $x+$w, $y-$h, $red);
$x = $x+$dist;
$h = 70;
imagefilledRectangle($image, $x, $y, $x+$w, $y-$h, $red);
$x = $x+$dist;
$h = 40;
imagefilledRectangle($image, $x, $y, $x+$w, $y-$h, $red);
$x = $x+$dist;
$h = 20;
imagefilledRectangle($image, $x, $y, $x+$w, $y-$h, $red);
$x = $x+$dist;
$h = 80;
imagefilledRectangle($image, $x, $y, $x+$w, $y-$h, $red);
imageLine($image,20,$y_org,275,$y_org,$edge);	# hor
imageLine($image,20, $y_org,20,20,$edge);
$txt = imagecolorallocate($image, 10, 10, 10);
$str_y = $y_org+25;
$str_x = 34;
imageStringUp($image, 3, $str_x,$str_y,"Jan", $edge);
$str_x = $str_x +$dist;
imageStringUp($image, 3, $str_x,$str_y,"Feb", $edge);
$str_x = $str_x +$dist;
imageStringUp($image, 3, $str_x,$str_y,"Mar", $edge);
$str_x = $str_x +$dist;
imageStringUp($image, 3, $str_x,$str_y,"Apr", $edge);
$str_x = $str_x +$dist;
imageStringUp($image, 3, $str_x,$str_y,"May", $edge);
$str_x = $str_x +$dist;
imageStringUp($image, 3, $str_x,$str_y,"Jun", $edge);
imageStringUp($image, 3, 6,70,"Space %", $txt);
imageString($image, 5, 85,3,"My Bar Chart", $txt);
#$font = "arial.ttf";
#ImageTTFText ($image, 25, 0,40, 22, $txt, $font,  "My 2D Bar Chart");
header("Content-type: image/png");
imagepng($image);
imagedestroy($image);	
?> 