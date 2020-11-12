<?php	session_start();
	include("config.inc.php");
	 $j=0;
	if((trim($hid1) <> "03"))
	{
		echo "ต้องเข้าสู่ระบบปกติ";
		exit();
	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"[]>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
    <!--
    Created by Artisteer v3.1.0.48375
    Base template (without user's data) checked by http://validator.w3.org : "This page is valid XHTML 1.0 Transitional"
    -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo $mess_title?></title>

    <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->

    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="script.js"></script>

</head>
<body onload='document.form1.doc_.focus()'>
<?php include 'include/header.inc.php'; ?>

            <div class="cleared reset-box"></div>
<div class="rnut-bar rnut-nav">
<div class="rnut-nav-outer">
	<ul class="rnut-hmenu">
		<li>
			<a href="./person_yuem_add_prov" class="active">Back</a>
		</li>	
	</ul><font size="4" color="ffffff">Login โดย :&nbsp;<?php echo $user_?></font>

</div>
</div>
<div class="cleared reset-box"></div>
<div class="rnut-layout-wrapper">
                <div class="rnut-content-layout">
                    <div class="rnut-content-layout-row">
                        <div class="rnut-layout-cell rnut-content">
						<div class="rnut-box rnut-post">
						<div class="rnut-box-body rnut-post-body">
						<div class="rnut-post-inner rnut-article">
						<h2 class="rnut-postheader" style="text-align: center;">จัดการข้อมูล:ตำแหน่งงาน</h2>

<!-- start การแก้ไขข้อมูล -->
<br>
<center> <font size="3" color="ff0000">กรุณาตรวจสอบการบันทึกข้อมูล</font> </center><br>
<?php 
echo "<meta http-equiv=\"refresh\" content=\"2;URL=prov_position_add1.php\" />"; ?>
<!-- end การแก้ไขข้อมูล -->

<?php include("./include/footer.inc");?>
                                    </body>
                                    </html>



<script>
function check_idcard(idcard){
	if(idcard.value == ""){ return false;}
	if(idcard.length < 13){ return false;}

var num = str_split(idcard); // function เพิ่มเติม
var sum = 0;
var total = 0;
var digi = 13;

	for(i=0;i<12;i++){
		sum = sum + (num[i] * digi);
		digi--;
	}
	total = ((11 - (sum % 11)) % 10);
	
	if(total == num[12]){ //	alert('รหัสหมายเลขประจำตัวประชาชนถูกต้อง');
		return true;
	}else{ //	alert('รหัสหมายเลขประจำตัวประชาชนไม่ถูกต้อง');
		return false;
	}
}


function str_split ( f_string, f_split_length){
    f_string += '';
    if (f_split_length == undefined) {
        f_split_length = 1;
    }
    if(f_split_length > 0){
        var result = [];
        while(f_string.length > f_split_length) {
            result[result.length] = f_string.substring(0, f_split_length);
            f_string = f_string.substring(f_split_length);
        }
        result[result.length] = f_string;
        return result;
    }
    return false;
}

function id_card(id){
	if(check_idcard(id.value)){break;}
	else{
		alert("หมายเลขบัตรประชาชนไม่ถูกต้อง :-( \n กรุณาป้อนใหม่");	
		id.value = "";
		id.focus();
	}
}
</script>

