<?php require_once("../config.inc.php");  
session_register("sel" );
$sel = $_REQUEST['sel'];
mysql_select_db($dbname, $objConnect);
//$query_Recordset2 = "SELECT * FROM judsun where left(code,2) like '$sel' ORDER BY code ASC";
$query_Recordset2 = "SELECT * FROM judsun  left join work on judsun.cod = work.w_code where  judsun.amp like '$sel' ORDER BY code ASC";
$Recordset2 = mysql_query($query_Recordset2, $objConnect) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);
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

    <link rel="stylesheet" href="../style.css" type="text/css" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->

    <script type="text/javascript" src="../jquery.js"></script>
    <script type="text/javascript" src="../script.js"></script>

</head>
<body>
<?php include '../include/header.inc.php'; ?>
            <div class="cleared reset-box"></div>
<div class="rnut-bar rnut-nav">
<div class="rnut-nav-outer">
	<ul class="rnut-hmenu">
		<li>
			<a href="../menu_director" class="active">Back</a>
		</li>	
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
						<h2 class="rnut-postheader" style="text-align: center;">รายงานงบประมาณ:รายการเบิกจ่าย</h2>
                        <!-- <div class="rnut-postcontent">
							<p style="text-align: center;">test1</p>
							<p style="text-align: center;">test2</p>
		                </div> -->
<!-- start การแก้ไขข้อมูล -->
					<form id="form1" name="form1" method="post" action="./prov_report_item3.php">
						<table width="90%" border="0" cellspacing="0" cellpadding="7">
						  <tr>
							<td width="42%" scope="col">
								<div align="right">รหัสอำเภอ Amp </div>
							</td>
							<td width="58%" scope="col">
								<div align="left">								
									<? echo $sel;
										include("../help_re1.php");
										echo "  :  ".$nam;
									?>
								</div>
							</td>
						  </tr>
						  <tr>
							<td><div align="right">รหัสงาน/โครงการ</div></td>
							<td>
							  <label>
								<select name="sel3">
								  <?php 
									do {  
								  ?>
										<option value="<?php echo $row_Recordset2['code']?>"><?php echo $row_Recordset2['w_name']?></option>
										  <?php
										} while ($row_Recordset2 = mysql_fetch_assoc($Recordset2));
										  $rows = mysql_num_rows($Recordset2);
									  if($rows > 0) {
										  mysql_data_seek($Recordset2, 0);
										  $row_Recordset2 = mysql_fetch_assoc($Recordset2);
									  }
								  ?>
								</select>
								</label>
							    <input name="Submit" type="submit" id="Submit" value="Go" />
							   </td>
						  </tr>
						</table>	
				</form> 
							<?php
							 mysql_free_result($Recordset2);
							?>

						<p>&nbsp;</p>

<!-- end การแก้ไขข้อมูล -->
                <div class="cleared"></div>
                </div>

		<div class="cleared"></div>
    </div>
</div>

                          <div class="cleared"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cleared"></div>
            <div class="rnut-footer">
                <div class="rnut-footer-body">
                    <a href="#" class="rnut-rss-tag-icon" title="RSS"></a>
                            <div class="rnut-footer-text">
                                <p><?php echo $mess_header2?></p>

<p>Rnut@Surat</p>

<p>Copyright © 2014. All Rights Reserved.</p>
                                                            </div>
                    <div class="cleared"></div>
                </div>
            </div>
    		<div class="cleared"></div>
        </div>
    </div>
    <div class="cleared"></div>
    <p class="rnut-page-footer"><a href="http://www.artisteer.com/?p=website_templates" target="_blank">Website Template</a> created with Artisteer by <a href="surat.nfe.go.th" target="_blank">Rnut@Surat</a>.</p>
    <div class="cleared"></div>
</div>

</body>
</html>