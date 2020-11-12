<?			# linegraph.php
Header( "Content-type: image/png");
$im=ImageCreate(370,200); 
$bg = ImageColorAllocate($im,250,255,0); 
$line = ImageColorAllocate($im,45,45,45); 
$color1 = ImageColorAllocate($im,55,60,60); 
$grid = ImageColorAllocate($im,170,210,60); 
$txtcol = ImageColorAllocate($im,5,0,0); 
ImageLine($im,0,50,400,50,$grid); 
ImageLine($im,0,100,400,100,$grid); 
ImageLine($im,0,150,400,150,$grid); 

line($im,0,30,50,80,$line);
line($im,50,80,100,55,$line);
line($im,100,55,150,120,$line);
line($im,150,120,200,20,$line);
line($im,200,20,250,160,$line);
line($im,250,160,300,90,$line);
line($im,300,90,350,170,$line);

ImageLine($im,0,199,400,199,$color1); 
#ImageLine($im,0,198,400,198,$color1); 
ImageLine($im,0,0,0,300,$color1); 
#ImageLine($im,1,0,1,301,$color1); 
imagestring($im, 5, 90, 5, "Speed for website.com", $txtcol);
imagestringup($im, 4, 2, 115, "Speed", $txtcol);
imagestring($im, 2, 3, 4, "100 Mbps", $txtcol);
imagestring($im, 4, 320, 180, "Days", $txtcol);
ImagePng($im); 
ImageDestroy($im); 

function line($im , $x1, $y1, $x2, $y2, $col) {
   	$y1=200-$y1;
	$y2=200-$y2;
  	ImageLine($im,$x1,$y1,$x2,$y2,$col);
  #	ImageLine($im,$x1+1,$y1,$x2+1,$y2,$col);
}
?>
