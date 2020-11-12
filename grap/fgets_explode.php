<?
$f1= "grap_bar.ini";
$fp=fopen($f1,"r");
$i=0;
while(!feof($fp))
{
	$i++;
$exp[$i]=explode("  ",fgets($fp));
//echo $i."= ".$exp[$i][0]." = ".$exp[$i][1]." = ".$exp[$i][2]." = ".$exp[$i][3]." = ".$exp[$i][4]." = ".$exp[$i][5]." = ".$exp[$i][6]." = ".$exp[$i][7]." = "."<BR>";
}
//echo $exp[8][1]."<BR>";
$arr_total = $i;
fclose($fp);

//อ่านค่าแท่งของกราฟ

$f2= "grap_bar.ini";		
$fp2=fopen($f2,"r");
$theng= fgets($fp2);
fclose($fp2);

?>