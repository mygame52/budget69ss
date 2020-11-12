<?php
session_start();
if (!$Action) {
    $Action = " ";
}
require_once('config.inc.php');
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

    </head>
    <body>
        <?php include 'include/header.inc.php'; ?>
        <div class="cleared reset-box"></div>
        <div class="rnut-bar rnut-nav">
            <div class="rnut-nav-outer">
                <ul class="rnut-hmenu">
                    <li>
                        <a href="menu_pro.php" class="active">Back</a>
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
                                    <h2 class="rnut-postheader" style="text-align: center;">ข้อมูลเกี่ยวกับงบประมาณ </h2>
                                    <!-- <div class="rnut-postcontent">
                                                                    <p style="text-align: center;">test1</p>
                                                                    <p style="text-align: center;">test2</p>
                                            </div> -->
                                    <!-- start การแก้ไขข้อมูล -->
                                    <BR>
                                        <div align="center">
                                            <?PHP
                                            /*                                             * * Add Record ** */
                                            if ($Action == "Save") {
                                                $strSQL = "INSERT INTO samnak (code_sam, name_sam,nam_sam,mony_pee) VALUES 
							(' " . $_POST["txtcod"] . " ','" . $_POST["txtname"] . "','" . $_POST["txtnam"] . "',' " . $_POST["txtpee"] . " ')";
                                                mysql_query($strSQL);
                                            }

                                            /*                                             * * Delete Record ** */
                                            if ($Action == "Del") {
                                                echo"<TABLE width='80%' border='0' align='center' cellspacing='3'>	<TR>";
                                                echo "<TD>การลบรายการนี้มีผลต่อการดำเนินงานที่ผ่านมา ควรดำเนินการในต้นปีงบประมาณเท่านั้น" . "<BR>";
                                                echo"<FORM METHOD='POST' ACTION='year_code_money_del.php'>";
                                                echo "<CENTER>ยืนยันการลบ กด 9 " . "<INPUT TYPE='text' NAME='box' size='1'>";
                                                echo "<INPUT TYPE='hidden' NAME='h1' value='$idd'>";
                                                echo "<INPUT TYPE='submit' value='ยืนยัน'></CENTER>";
                                                echo "</FORM>";
                                                echo "</TD></TR> </TABLE>";
                                            }

                                            /*                                             * * List Record ** */
                                            $strSQL = "SELECT * FROM samnak order by code_sam";
                                            $objQuery = mysql_query($strSQL) or die("Error Query [" . $strSQL . "]");
                                            $j = 0;
                                            ?>
                                            <table width="80%" border="0" align="center" cellspacing="3">
                                                <tr bgcolor="#43d1eb">
                                                    <th scope="col" > รหัส งปม. </th>
                                                    <th scope="col" > ชื่องบประมาณ</th>
                                                    <th scope="col" > ชื่อย่อ</th>
                                                    <th scope="col" > จำนวนเงิน<br>ตลอดปี งปม.</th>
                                                    <th scope="col" > จำนวนเงิน<br>ที่โอนมาแล้ว</th>
                                                    <th scope="col" > ดำเนินการ</th>
                                                </tr>
                                                <?
                                                while($objResult = mysql_fetch_array($objQuery))
                                                {
                                                $j++;
                                                $i=($j%2);
                                                ?>
                                                <tr <?if($i==1){echo "bgcolor='#FFFFCC'";}?> >
                                                    <td  style="text-align:center;vertical-align:middle;"><font size="3" color="#000099"><?= $objResult["code_sam"]; ?></font></td>
                                                    <td style="text-align:left;vertical-align:middle;"><font size="3" color="#000099"><?= $objResult["name_sam"]; ?></font></td>
                                                    <td style="text-align:left;vertical-align:middle;"><font size="3" color="#000099"><?= $objResult["nam_sam"]; ?></font></td>
                                                    <td style="text-align:right;vertical-align:middle;"><font size="3" color="#000099"><?= number_format($objResult["mony_pee"], 2); ?></font></td>
                                                    <td style="text-align:right;vertical-align:middle;"><font size="3" color="#000099"><?= number_format($objResult["mony_ma"], 2); ?></font></td>

                                                    <?	if ( $set_add ==1){?>
                                                    <td style="text-align:center;vertical-align:middle;">
                                                        <A HREF="year_code_money_edit.php?idd=<?= $objResult['code_sam']; ?>">
                                                            <img src="image/icon/edit.gif" width="16" height="16" border="0" alt="แก้ไข"></A>
                                                        <A HREF="<?= $PHP_SELF ?>?Action=Del&idd=<?= $objResult['code_sam']; ?>"><img src="image/icon/cross.png" width="16" height="16" border="0" alt="ลบ"></A>
                                                    </td>

                                                    <?	}else{
                                                    echo "<td>&nbsp;</td>"; 
                                                    }
                                                    ?>
                                                </tr>
                                                <? } ?> 
                                                <form name="frmMain" method="post" action="<?= $PHP_SELF ?>?Action=Save">
                                                    <tr bgcolor="#FFCCCC">
                                                        <td><input name="txtcod" type="text" id="txtcod" size="10"></td>
                                                        <td><input name="txtname" type="text" id="txtname"size="50"></td>
                                                        <td><input name="txtnam" type="text" id="txtnam"size="50"></td>
                                                        <td><input name="txtpee" type="text" id="txtpee" ></td>
                                                        <td> </td>
                                                        <td><input name="btnSubmit" type="submit" id="btnSubmit" value="เพิ่ม"></td>
                                                    </tr>
                                                </form> 
                                            </table><br>
                                                <hr><br>
                                                        <table width="80%" border="0" align="center" cellspacing="3">
                                                            <tr bgcolor="#c7cbbc">
                                                                <td style="text-align:center;text-vertical:middle"><font size="3" color="#000099"><br><br><br>คำอธิบาย</font></th>
                                                                                    <td style="text-align:left"><font size="3" color="#990000">1. รหัสงบประมาณ 4 หลัก เป็นการกำหนด กลุ่ม/หมวดของเงิน ตามผลผลิต<br>  และจะแสดงเป็นกราฟแท่ง  1 แท่ง/รายการ ซึ่งต่อไปจะถูกนำไปใช้ในส่วนต่างๆ ของ<br>โปรแกรม 
                                                                                                    ดังนั้นต้องไม่เปลี่ยนแปลงในระหว่างปีงบประมาณ
                                                                                                    <br><hr>
                                                                                                            2. จำนวนเงินตลอดปีงบประมาณ วัตถุประสงค์เพื่อการ คำนวณเท่านั้น และภายในปี งปม. หนึ่ง ๆ จะมีการเปลี่ยนแปลงบ่อย ๆ
                                                                                                            <BR> ก็ให้แก้ไขจำนวนเงินได้ตามที่เปลี่ยนแปลง</font>  
                                                                                                                </td>
                                                                                                                </tr>
                                                                                                                </table>
                                                                                                                <? mysql_close($objConnect); ?>
                                                                                                                </div>
                                                                                                                <!-- end การแก้ไขข้อมูล -->
                                                                                                                <?php include("./include/footer.inc"); ?>
                                                                                                                </body>
                                                                                                                </html>