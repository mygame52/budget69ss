<?
$f1= "grap/grap_bar.ini";		
$fp=fopen($f1,"r");
$i=0;
while(!feof($fp))
{
	$i++;
$exp[$i]=explode("  ",fgets($fp));
}

fclose($fp);


$f2= "grap/bar_bar.ini";		
$fp2=fopen($f2,"r");
$arr_total= fgets($fp2);
fclose($fp2);

?>