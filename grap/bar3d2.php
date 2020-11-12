<?php		# bar3d2.php
$image = imagecreate(290, 170);
$bg = imagecolorallocate($image, 0xFF, 0xDE, 0xBB); # 
$edge = imagecolorallocate($image, 40, 50, 40);

$y_org = 130;
$x = 20;
$y = $y_org;
$h = 50;
$w = 25;
$t = 7;
$dist=$w+15;
barver($image,$x+10,$y-10,$w, $h+10,$t, 100,50,200);
barver($image,$x,$y,$w, $h,$t, 160,50,200);
$x = $x+$dist;
$h = 70;
barver($image,$x+10,$y-10,$w, $h+10,$t, 100,50,200);
barver($image,$x,$y,$w, $h,$t, 60,150,200);
$x = $x+$dist;
$h = 30;
barver($image,$x+10,$y-10,$w, $h+20,$t, 100,50,200);
barver($image,$x,$y,$w, $h,$t, 40,200,70);
$x = $x+$dist;
$h = 60;
barver($image,$x+10,$y-10,$w, $h+10,$t, 100,50,200);
barver($image,$x,$y,$w, $h,$t, 40,200,170);
$x = $x+$dist;
$h = 75;
barver($image,$x+10,$y-10,$w, $h+10,$t, 100,50,200);
barver($image,$x,$y,$w, $h,$t, 210,80,40);
$x = $x+$dist;
$h = 60;
barver($image,$x+10,$y-10,$w, $h+30,$t, 100,50,200);
barver($image,$x,$y,$w, $h,$t, 210,180,60);

function barver( $image,$x,$y,$w,$h,$t, $r,$g,$b) {
	global  $y_org , $edge;

	$front = imagecolorallocate($image, $r, $g, $b);
	$side = imagecolorallocate($image, $r-25, $g-25, $b-25);
	$top = imagecolorallocate($image, $r+40, $g+40, $b+40);
	imagefilledRectangle($image, $x, $y, $x+$w, $y-$h, $front);
	imageRectangle($image, $x, $y, $x+$w, $y-$h, $edge);
	$x1= $x +$w;
	$y1= $y;
	$x2= $x+$w +  $t;
	$y2= $y1 - $t;
	$x3= $x2;
	$y3= $y2-$h;
	$x4=$x1;
	$y4=$y1-$h;
	$pts=array($x1,$y1, $x2,$y2, $x3,$y3, $x4,$y4 );
	imagefilledPolygon($image, $pts,4, $side);
	imagePolygon($image, $pts,4, $edge);
	$tx1=$x;
	$ty1=$y4;
	$tx2=$x3-$w;
	$ty2=$y3;
	$pts=array($tx1,$ty1, $tx2,$ty2, $x3,$y3, $x4,$y4 );
	imagefilledPolygon($image, $pts,4, $top);
	imagePolygon($image, $pts,4, $edge);

}

imageLine($image,20,$y_org,280,$y_org,$edge);	# hor
imageLine($image,20, $y_org,20,20,$edge);

$txt = imagecolorallocate($image, 10, 10, 10);
$str_y = $y_org+25;
$str_x = 25;
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
imageString($image, 5, 70,3,"My 3D Bar Chart", $txt);
#$font = "dsefh___.ttf";
#ImageTTFText ($image, 25, 0,40, 22, $txt, $font,  "My 3D Bar Chart");

header("Content-type: image/png");
imagepng($image);
imagedestroy($image);	
?> 