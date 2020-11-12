<?php
session_start();
include("config.inc.php");
include("code2name_amp.php");
if (!isset($Action)) {
    $Action = "ze";
}
if (!isset($F1)) {
    $F1 = "";
} // บรรทัดที่ 113
if (!isset($F2)) {
    $F2 = "";
} // บรรทัดที่ 113


if (!isset($sel)) {
    $sel = "";
}
if (!isset($sel_2)) {
    $sel_2 = "";
}

// start หากไม่ได้เข้าใช้งานจากเมนู
if (trim($hid1) <> "03") {
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=menu_pro.php\" />";
}
// end หากไม่ได้เข้าใช้งานจากเมน
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"[]>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
    <head>

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
                                <div align="center">
                                    <div class="rnut-post-inner rnut-article">                                   
                                        <h2 class="rnut-postheader" style="text-align: center;">ถอน/ลบ : รายการเบิกจ่ายงบประมาณ</h2>

                                        <!-- start การแก้ไขข้อมูล -->

                                        <table width="90%" border="0" cellspacing="0" cellpadding="7" align="center">
                                            <tr>
                                                <th width="40%" scope="col"><div align="right">เลือกหน่วยงาน </div></th>
                                                <th width="60%" scope="col">
                                                    <form id="form1" name="form1" method="post" action="?F1=Yes">
                                                        <label> 
                                                            <div align="left">
                                                                <select name="sel_2" size="1" id="sel_2" tabindex="0" style="font: 11pt tahoma; color: #000000;background: #ccffff; border: 1px black solid" align="center" ฝ>
                                                                    <option value=''>เลือกข้อมูล...</option>
                                                                    <?php
                                                                    $i = 0;
                                                                    $sql = "SELECT * FROM amp ORDER BY id ASC";
                                                                    $dbquery = mysql_db_query($dbname, $sql);
                                                                    $num_rows = mysql_num_rows($dbquery);
                                                                    while ($i < $num_rows) {
                                                                        $i++;
                                                                        $result = mysql_fetch_array($dbquery);
                                                                        $id_ = $result[0];
                                                                        $name_ = $result[1];
                                                                        echo"<option value='$id_'>$id_ : $name_</option>";
                                                                    }
                                                                    ?>
                                                                </select>

                                                                <input type="submit" name="Submit" value=" ตกลง " />
                                                            </div>
                                                        </label>
                                                    </form>
                                                </th>
                                                <th width="30%">
                                                    <div align="left"><font size="3" color="990000">
                                                            <?php
                                                            if ($F1 == "Yes") {
                                                                echo $sel_2 . ":" . $xxx[$sel_2];
                                                            }
                                                            ?> </font>	
                                                    </div>
                                                </th>	  				  
                                            </tr>

                                            <?php
                                            if ($F1 == "Yes") {   ////////////// if ชุดที่ 1  เลือกงานโครงการ
                                                echo" <tr><td width='30%'><div align='right'>เลือกงาน/โครงการ</div></td>";
                                                $query_Recordset_ = "SELECT * FROM judsun  left join work on judsun.cod = work.w_code where  judsun.amp like '$sel_2' ORDER BY code ASC";

                                                //session_register("sel" );
                                                $Recordset_ = mysql_query($query_Recordset_, $objConnect) or die(mysql_error());
                                                $row_Recordset2 = mysql_fetch_assoc($Recordset_);
                                                $totalRows_Recordset2 = mysql_num_rows($Recordset_);
                                                ?>
                                                <td>

                                                    <form id="form2" name="form2" method="post" action="prov_update1.php"> 
                                                        <label>
                                                            &nbsp;&nbsp;<select name="sel3" id="sel3" style="font: 11pt tahoma; color: #000000;background: #ffff66; border: 1px black solid" align="center" >
                                                                <?php
                                                                do {
                                                                    ?>
                                                                    <option value="<?php echo $row_Recordset2['code'] ?>"><?php echo $row_Recordset2['w_name'] ?></option>
                                                                    <?php
                                                                } while ($row_Recordset2 = mysql_fetch_assoc($Recordset_));
                                                                $rows = mysql_num_rows($Recordset_);
                                                                if ($rows > 0) {
                                                                    mysql_data_seek($Recordset_, 0);
                                                                    $row_Recordset2 = mysql_fetch_assoc($Recordset_);
                                                                }
                                                                ?>
                                                            </select>
                                                        </label>	
                                                        <INPUT TYPE="hidden" NAME="sel_2" value="<?php echo $sel_2; ?>">
                                                            <input name="Submit" type="submit" id="Submit" value=" ตกลง " />
                                                    </form>
                                                </td>
                                                </tr>
                                                <? }?> <!-- ปิด IF ชุดที่ 1 เลือกงานโครงการ -->  



                                            </table>
                                        </div>


                                        <!-- end การแก้ไขข้อมูล -->
                                    </div>
                                    <?php include("./include/footer.inc"); ?>

                                </body>
                                </html>

