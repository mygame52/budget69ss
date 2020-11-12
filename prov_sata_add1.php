<?php	session_start();
	include("config.inc.php");
	 $j=0;
	if (trim($hid1) <> "03") {
		echo "	<SCRIPT language='JavaScript'>";
		echo "			alert('ท่านเข้าสู่ระบบไม่ถูกต้อง')";
		echo"			location.href='index.php'";
		echo"	</SCRIPT>";
	   exit();
	}
error_reporting(0);

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
			<a href="./prov_sata_add" class="active">Back</a>
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
						<h2 class="rnut-postheader" style="text-align: center;">บันทึกรายละเอียด  : ค่าสาธารณูปโภค</h2>
                        <!-- <div class="rnut-postcontent">
							<p style="text-align: center;">test1</p>
							<p style="text-align: center;">test2</p>
		                </div> -->
<!-- start การแก้ไขข้อมูล -->

<br>
<form method="post" action="prov_sata_save.php">
<TABLE width="60%" border="1" cellspacing="0" cellpadding="5" align="center">
  <tr bgcolor="#E3E1B7">
    <th scope="col">ชื่อย่อ (เช่น ค่าไฟ: ค่าน้ำ : ค่าโทรศัพท์)</th>
    <th scope="col">ชื่อเต็ม (เช่น ค่าไฟฟ้า : ค่าน้ำประปา : ค่าโทรศัพท์สำนักงาน)</th>
    </tr>
	<tr <?if($i !=1){echo "bgcolor='#ffffff'";}?> >
		<td><div align="center">
				<input type="text" name="name_shot_" id="name_shot_" maxlength="100" title="ป้อนชื่อย่อ" size="20" SIZE="16" style="font: 12pt tahoma; color: #ff0000;background: #ccffff; border: 1px black solid">
			</div></td>			 
			<td style="text-align:center">
				<input name="name_pub_" type="text" id="name_pub_"  maxlength="100" SIZE="16" title="ป้อนรายการค่าสาธาฯ" style="font: 12pt tahoma; color: #ff0000;background: #C0F9BD; border: 1px black solid">

		</td>
		    
	  </tr>
	<tr>
	<td colspan="4" style="text-align:center;vertical-align:middle">
	<input type="submit" name="Submit" value="  บันทึก   ">
	
	</td>
	</tr>
</table>
</form>

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

