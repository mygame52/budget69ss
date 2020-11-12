<?php
session_start();
include("config.inc.php");
include("code2name_work.php");


if (trim($hid1) <> "03") {
    echo "	<SCRIPT language='JavaScript'>";
    echo "			alert('ท่านเข้าสู่ระบบไม่ถูกต้อง')";
    echo"			location.href='index.php'";
    echo"	</SCRIPT>";
    exit();
}

//mysql_select_db($database_budget, $budget);
$query_Recordset1 = "SELECT * FROM samnakma  ORDER BY code_ma ASC";
$Recordset1 = mysql_query($query_Recordset1) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
$j = 0;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"[]>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
    <head>
        <!--
        Created by Artisteer v3.1.0.48375
        Base template (without user's data) checked by http://validator.w3.org : "This page is valid XHTML 1.0 Transitional"
        -->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title><?php echo $mess_title ?></title>

        <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
        <!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
        <!--[if IE 7]><link rel="stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->

        <script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript" src="script.js"></script>
        <script>
            function addCommas(nStr)
            {
                nStr += '';
                x = nStr.split('.');
                x1 = x[0];
                x2 = x.length > 1 ? '.' + x[1] : '';
                var rgx = /(\d+)(\d{3})/;
                while (rgx.test(x1)) {
                    x1 = x1.replace(rgx, '$1' + ',' + '$2');
                }
                document.getElementById('mony_ma').value = x1 + x2;
            }
        </script> 
    </head>
    <body onload='document.form1.ok_.focus()'>
<?php include 'include/header.inc.php'; ?>

        <div class="cleared reset-box"></div>
        <div class="rnut-bar rnut-nav">
            <div class="rnut-nav-outer">
                <ul class="rnut-hmenu">
                    <li>
                        <a href="./year_budget_come.php" class="active">Back</a>
                    </li>	
                </ul><font size="4" color="ffffff">Login โดย :&nbsp;<?php echo $user_ ?></font>
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
                                    <h2 class="rnut-postheader" style="text-align:center;"><CENTER>บันทึกการรับโอนงบประมาณจากส่วนกลาง</CENTER>
<?php //echo $w_name[$c_jud];  ?>
                                    </h2>
                                    <!-- <div class="rnut-postcontent">
                                            <p style="text-align: center;">test1</p>
                                            <p style="text-align: center;">test2</p>
                    </div> -->
                                    <!-- start การแก้ไขข้อมูล -->
                                    <center>
                                        <Form Action="year_budget_comesave.php" Method=post>
                                            <br> 
                                                <Table border=1 cellspacing=3 cellpadding=3 bgcolor="#E9E7C7" width="70%">
                                                    <tr><td>ชื่องบประมาณ  </td><td>
                                                            <?php
                                                            include("config.inc.php");
                                                            mysql_connect($dbserver, $dbuser, $dbpass) or
                                                                    die("<hr><b> ติดต่อ server ไม่ได้>");

                                                            mysql_select_db($dbname) or die("ติดฐานข้อมูลไม่ได้");

                                                            $sql = "select  * from samnak";
                                                            $result = mysql_query($sql);
                                                            $num_rows = mysql_num_rows($result); //จำนวน  record  ที่พบ
                                                            //echo $num_rows;
                                                            echo "<SELECT NAME='cod'  size='1'>";
                                                            for ($i = 1; $i <= $num_rows; $i++) {
                                                                $read = mysql_fetch_array($result);
                                                                $cod[$i] = $read['code_sam'];
                                                                $name_sam[$i] = $read['name_sam'];

                                                                echo "$cod[$i].'----------'.$name_sam[$i]<BR>";
                                                                echo "<option  value='$cod[$i]'>$name_sam[$i] </option>";
                                                            }
                                                            echo "</SELECT>";
                                                            ?>
                                                        </TD></tr>

                                                    <tr><td>หนังสือลงวันที่ </td><td><input type=text name=date size=40></td></tr>
                                                    <tr><td>เลขที่เอกสาร </td><td><input type=text name=doc size=40></td></tr>
                                                    <tr><td>จำนวนเงินที่รับครั้งนี้ </td><td><input type=text name="mony_ma" size="40" onblur="addCommas(this.value)" ></tr>
                                                                <tr><td>รายละเอียด</td><td><TEXTAREA NAME="detail" COLS="55" ROWS="8"></TEXTAREA></td></tr>
<tr><td>ไฟล์หนังสือรับโอน</td><td><input name="fileupload1" type="file" size="50" /></td></tr>

<tr><td> </td><td><INPUT TYPE=hidden  name= hid_a value= $hid1></td></tr>
</Table>
<TABLE  cellspacing=3 cellpadding=3>
<TR>
	<TD colspan="4"><input type=submit  value=" ตกลง "></TD></Form>
</TR>
</TABLE>
</FORM>
</CENTER>

<!-- end การแก้ไขข้อมูล -->
                                                                <?php include("./include/footer.inc"); ?>
                                    </body>
                                    </html>
                                                                <?php
                                                                mysql_free_result($Recordset1);
                                                                ?>