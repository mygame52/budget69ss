<?php
session_start();
@ini_set("display_errors", "0"); //ใส่บรรทัดแรก

include("config.inc.php");
$j = 0;
if (($act != "ok")) {
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\" />";
    exit();
}

if (isset($_POST['delete'])) {
    $idsl = $_REQUEST['id_saler_'];
    echo $sql_sel = "delete from saler where id_saler = '$idsl'";
    $dbquery = mysql_db_query($dbname, $sql_sel);
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=saler.php\" />";
}

if (isset($_POST['cancel'])) {
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=saler.php\" />";
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
    <body onload='document.form1.doc_.focus()'>
        <?php include 'include/header.inc.php'; ?>
        <div class="cleared reset-box"></div>
        <div class="rnut-bar rnut-nav">
            <div class="rnut-nav-outer">
                <ul class="rnut-hmenu">
                    <li>
                        <?php
                        if ((trim($hid1) == "03") and ( trim($hid8) <> "908")) {
                            echo "<a href='./saler.php' class='active'>Back</a>";
                            echo "</li></ul>";
                            echo "<font size='4' color='ffffff'> &nbsp;";
                            echo "ผู้ใช้&nbsp;:&nbsp;" . $user_;
                            echo "</font>";
                        }
                        if ((trim($hid1) <> "03") and ( trim($hid8) == "908")) {
                            echo "<a href='./saler.php' class='active'>Back</a>";
                            echo "</li></ul>";
                            ?>
                            <font size="4" color="ffffff">
                                <?php
                                echo "หน่วยงาน   : " . $sele_amp;
                                echo " : " . $full_name;
                                ?></font><?php } ?>
                </ul>
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
                                    <h2 class="rnut-postheader" style="text-align: center;">ลบข้อมูลผู้ค้า</h2>

                                    <!-- start การแก้ไขข้อมูล -->
                                    <?php
                                    $id_saler_delete = $_REQUEST['id_saler_'];

                                    $sssql = "SELECT id_item,item,bath from item where id_sale = $id_saler_delete";
                                    $dbquery = mysql_db_query($dbname, $sssql);
                                    $num_rowss = mysql_num_rows($dbquery);
                                    if ($num_rowss <> 0) {
                                        echo "<div align='center'>";
                                        echo "<form name='form1' method='post'>";
                                        echo "<table><tr>";
                                        echo "<td>";
                                        echo "** ข้อมูลรายนี้ มีการทำรายการไปแล้ว ท่านต้องการลบหรือไม่<br>";

                                        while ($results = mysql_fetch_array($dbquery)) {
                                            $id_item_ = $results[id_item];
                                            $item_ = $results[item];
                                            $bath_ = $results[bath];
                                            echo $id_item_ . " : " . $item_ . " : " . $bath_ . "บาท<br>";
                                        }

                                        echo "";
                                        echo "</td>";
                                        echo "</tr>";
                                        echo "<tr><td><div align='center'>";
                                        echo "<input type = 'submit' name = 'delete' value = 'delete'>";
                                        ?>
                                        <input type = "hidden" name = "idsl" value = "<?php echo $id_saler_delete ?>"/>
                                        <?php
                                        echo " ";
                                        echo "<input type = 'submit' name = 'cancel' value = 'cancel'>";
                                        echo "</div></td></tr>";
                                        echo "</table>";
                                        echo "</form>";
                                        echo "</div>";
                                    } else {
                                        $sql = "delete from saler where id_saler = $id_saler_delete";
                                        $dbquery = mysql_db_query($dbname, $sql);
                                        echo "<meta http-equiv=\"refresh\" content=\"0;URL=saler.php\" />";
                                    }



                                    exit();
                                    ?>

                                    <!-- end การแก้ไขข้อมูล -->
                                    <?php include("./include/footer.inc"); ?>
                                    </body>
                                    </html>
