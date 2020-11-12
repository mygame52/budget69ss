<?php
session_start();
include("config.inc.php");
if (trim($hid1) <> "03") {
    echo "	<SCRIPT language='JavaScript'>";
    echo "			alert('ท่านเข้าสู่ระบบไม่ถูกต้อง')";
    echo"			location.href='index.php'";
    echo"	</SCRIPT>";
    exit();
}
$a = 0;
if (!isset($Action)) {
    $Action = " ";
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
                        <a href="./menu_pro.php" class="active">Back</a>
                    </li>	
                </ul>
                <font size="4" color="ffffff">Login โดย :&nbsp;<?php echo $user_ ?></font>

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
                                    <br><h2 class="rnut-postheader" style="text-align:center;">
                                            ข้อมูล หน่วยงานที่รับและใช้งบประมาณ
                                        </h2>
                                        <!-- start การแก้ไขข้อมูล -->
                                        <div align="center">
                                            <?php
                                            /*                                             * * Add Record ** */
                                            if ($Action == "Save") {
                                                $tr1 = trim($_POST['txtid']);
                                                $strSQL = "INSERT INTO amp (id, Name,doc) VALUES				('$tr1','" . $_POST["txtname"] . "','" . $_POST["txtdoc"] . "')";

                                                mysql_query($strSQL);
                                            }


                                            /*                                             * * Delete Record ** */
                                            if ($Action == "Del") {
                                                $sql_del = "delete from amp where id='$idd'";
                                                mysql_query($sql_del);
                                            }

                                            /*                                             * * List Record ** */
                                            $strSQL = "SELECT * FROM amp order by id";
                                            $objQuery = mysql_query($strSQL) or die("Error Query [" . $strSQL . "]");
                                            $j = 0;
                                            ?>
                                            <table width="70%" border="0" align="center" cellspacing="3">
                                                <tr bgcolor="#FFCC99">
                                                    <th scope="col" > รหัส </th>
                                                    <th scope="col" > ชื่อ</th>
                                                    <th scope="col" > เลขที่เอกสาร.  </th>
                                                    <th scope="col" > Edit </th>
                                                </tr>
                                                <?
                                                while($objResult = mysql_fetch_array($objQuery))
                                                {
                                                $j++;
                                                $i=($j%2);
                                                ?>
                                                <tr <?if($i !=1){echo "bgcolor='#eaeaea'";}?> class='off unamed1' onmouseover=this.className='onping' onmouseout=this.className='off' style='cursor:hand' >

                                                    <td style="text-align:center;vertical-align:middle"><?= $objResult["id"]; ?></td>
                                                    <td style="text-align:left;vertical-align:middle"><?= $objResult["Name"]; ?></td>
                                                    <td style="text-align:left;vertical-align:middle"><?= $objResult["doc"]; ?></td>
                                                    <!-- <td><?= $objResult["pass"]; ?></td>	 -->
                                                    <?	if ( $set_add ==1){?>
                                                    <td style="text-align:center;vertical-align:middle"><A HREF="prov_codename_edit.php?idd=<?= $objResult['id']; ?>"><img src="image/icon/edit.gif" width="16" height="16" border="0" alt=""></A>&nbsp;&nbsp;<A HREF="<?= $PHP_SELF ?>?Action=Del&idd=<?= $objResult['id']; ?>"><img src="image/icon/cross.png" width="16" height="16" border="0" alt=""></A></td>
                                                    <?	}else{
                                                    echo "<td>&nbsp;</td>"; 
                                                    }
                                                    ?>
                                                </tr>
                                                <? 	}		?> 
                                                <form name="frmMain" method="post" action="?Action=Save">
                                                    <tr bgcolor="#FFCCCC">
                                                        <td><input name="txtid" type="text" id="txttype" size="10"></td>
                                                        <td><input name="txtname" type="text" id="txtname"size="50"></td>
                                                        <td><input name="txtdoc" type="text" id="txtdoc"></td>
<!--                                                        <td> </td>-->
                                                        <td><input name="btnSubmit" type="submit" id="btnSubmit" value="เพิ่ม"></td>
                                                    </tr>
                                                </form> 

                                            </table>
                                            <?php mysql_close($objConnect); ?>
                                        </div>
                                        <!-- end การแก้ไขข้อมูล -->
                                        <?php include("./include/footer.inc"); ?>
                                        </body>
                                        </html>