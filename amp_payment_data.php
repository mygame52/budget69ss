<?php session_start();
	if($cmoney<>"check")
	{   
		include("amp_payment.php"); 
	}
	else
	{
		include("amp_payment_data2.php"); 
	}

?>

