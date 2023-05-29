<?php	session_start();
	include("config.inc.php");
	 $j=0;
	if($act  != "ok") {
		echo "ต้องเข้าสู่ระบบปกติ";
		exit();
	}

		session_unregister('M_rab');
		session_unregister('M_rab2');
		session_unregister('M_rab3');
		session_unregister('M_rab4');
		session_unregister('M_rua');
		session_unregister('cmoney');
		session_unregister('check_yuem');


		@ini_set('display_errors', '0');

		require_once('config.inc.php'); 
		$cmoney = '';

		$jsel3 = $_REQUEST['sel3'];
		session_register('sel3','work');

		$cmoney = isset($_REQUEST['cmoney']); 
		$cmoneyid_ = $_REQUEST['cmoneyid']; 

			mysql_select_db($dbname, $objConnect);
			$rand = rand(); 

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

		<script type="text/javascript">
		<!--
			
		 
		function addCommas(nStr) 
		{     
				nStr += ''; 
				x = nStr.split('.'); 
				x1 = x[0]; 
				x2 = x.length > 1 ? '.' + x[1] : ''; 
				var rgx = /(\d+)(\d{3})/; 
				while (rgx.test(x1)) 
					{ 
						x1 = x1.replace(rgx, '$1' + ',' + '$2'); 
					} 
			document.getElementById('bath_t').value = x1 + x2; 
		}

		function addComma_berg(nStr) 
		{     
				nStr += ''; 
				x = nStr.split('.'); 
				x1 = x[0]; 
				x2 = x.length > 1 ? '.' + x[1] : ''; 
				var rgx = /(\d+)(\d{3})/; 
				while (rgx.test(x1)) 
					{ 
						x1 = x1.replace(rgx, '$1' + ',' + '$2'); 
					} 
			document.getElementById('bath_berg').value = x1 + x2; 
		}

		function addCommas_cal(nStr) 
		{     
			nStr += ''; 
			x = nStr.split('.'); 
			x1 = x[0]; 
			x2 = x.length > 1 ? '.' + x[1] : ''; 
			var rgx = /(\d+)(\d{3})/; 
			while (rgx.test(x1)) { 
				x1 = x1.replace(rgx, '$1' + ',' + '$2'); 
			} 
			document.getElementById('bath_use').value = x1 + x2; 
		} 


		function chk_cal(){
			var a1 = parseFloat(document.form1.aa1.value);
			var a2 = parseFloat(document.form1.aa2.value);

			  if (a2>a1)
				{
					alert("เงินล้างมากกว่าเงินยืมไม่ได้");
					return(false);
				}
			document.form1.aa3.value=a1-a2;

			if (a2<a1)
			{
				return(true);
			}
		}

		//-->
		</script>
</head>
<body onload='document.form1.doc_.focus()'>
<?php include 'include/header.inc.php';?>
            <div class="cleared reset-box"></div>
<div class="rnut-bar rnut-nav">
<div class="rnut-nav-outer">
	<ul class="rnut-hmenu">
		<li>
			<a href="./" class="active">Back</a>
		</li>	
	</ul><div style="vertical-align:middle"><font size="3" color="#FFCCCC">
                            <?php   echo "หน่วยงาน   : " . $sele_amp;
                                    echo " : " . $full_name;
                            ?></font>
                        </div>
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
						<h2 class="rnut-postheader" style="text-align: center;">บันทึกการล้างเงินยืม</h2>
                        <!-- <div class="rnut-postcontent">
							<p style="text-align: center;">test1</p>
							<p style="text-align: center;">test2</p>
		                </div> -->
<!-- start การแก้ไขข้อมูล -->

				<table height="45" width="1000" border="0" align="center">
				 <tr>
					<td>

				<!-- คอนเน็กเพื่ออ่านค่ามารายงาน -->

				<?php
					//echo "<HR size='5' color='#FFCC00'>";

					echo " <FONT SIZE='5' COLOR='#FFFFFF'><B>รหัส   :  $sele_amp ";
					Session_register("sele_amp");
					echo "   ".$full_name ."</B></FONT>";
					echo "</td>";
					echo "</tr>";
					echo "</table>";
				?>

				<table width="60%" border="0" align="center" cellpadding="1" cellspacing="7">
				<TR>
					<td bgcolor="#FFFFCC"><p><FONT SIZE="4" COLOR="#CC6600"> <CENTER><B>บันทึกการใช้จ่ายงบประมาณ</B></CENTER>     </FONT>
					</TD>
					<TD bgcolor="#FFFF99">
					<?php
							echo "<FORM METHOD=POST ACTION='sob1.php'><BR>";
								echo "<CENTER><input type='submit' name='Submit' value=' Back ' /></CENTER>";
							echo "</FORM>";
					?> 
					</TD>
				</TR>
				</TABLE>
				<table width="93%" border="0" cellspacing="0" cellpadding="7">
				  <tr>
					<th width="42%" scope="col"><div align="right">หน่วยงานขอเบิก </div></th>
					<th width="58%" scope="col">
						<div align="left">
						
					<? 
						echo "  :  ".$sele_amp;
						echo $full_name;  //ชื่อ สกร.อำเภอ
						?></div></th>
				  </tr>
				  <tr>
					<td><div align="right">รหัสงาน/โครงการ</div></td>
					<td>
							<? 
							include("help_yod4.php");
							echo "     ".$cod_work; 
							echo " =>   ".$work; 
							?></td>
				  </tr>

				<?php //------------- ค้นหารายการยืมเงิน  ----------------------------------------------------------
					if ($cmoney == "check")
						{
							session_register('cmoney');
							$sele_amp;
							mysql_select_db($dbname, $objConnect);

							$sql="SELECT id_item, amp_item, item, doc, date_time, bath, date_pay, c_khong,id_yuem FROM item where id_item=$cmoneyid_ and amp_item=$sele_amp and chk_id=1";
							// and ((substr(c_khong,5,3))= $work)";//ใช้จริง

							$dbquery = mysql_db_query($dbname, $sql);

							$num_rows = mysql_num_rows($dbquery);

							$i=1;$cname_item="";
							if ($i != $num_rows)
								{ 	$doc = $doc; }
									if ($i == $num_rows)
										{
										//	echo "----------------------เจอแล้ว-------------------";
										$result = mysql_fetch_array($dbquery);
										$id_item =$result[0];
										$item =$result[2];
										$docs = $result[3];
										$date_time = $result[4];
										$bath = $result[5];
										$date_pay = $result[6];
										$c_khong = substr($result[7],5,3);
										$id_yuem2 = $result[8];

				//						echo "----work---: ".substr($work,0,3)."<br>";
				//						echo "----c_khong---: ".$c_khong."<br>";


								if ($c_khong == substr($work,0,3))
									{
										$cname_item="ล้างเงินยืม :- ".$id_item."-".$docs."-".$item;
										$id_item_update =$result[0]; 
										$check_yuem = "1";
										session_register('check_yuem');
										if ((strlen($date_pay) < 3) and ($bath!=0))
											{
												echo "<tr>";
												echo "<td colspan=2><font color='#FF0000'><div align='center'><h3>ท่านยังไม่ได้รับเงินยืม :: ไม่สามารถล้างเงินยืมได้</h3></div></font></td>";
												echo "</div></td>";
												echo "</tr>";
												exit;
											}

										echo "<tr>";
										echo "<td><font color='#FF0000'><div align='right'>รายการล้างเงินยืม</div></font></td>";
										echo "<td><font color='#FF0000'><div align='left'>";
										echo $cmoneyid_,"-",$item," - เลขหนังสือ : ",$docs;
										echo "</div></font>";
										echo "<tr>";
										echo "    <td><font color='#FF0000'><div align='right'>วันที่ยืม</div></font></td>";
										echo "    <td><font color='#FF0000'><div align='left'>",$date_time,"   วันที่ได้รับ : ",$date_pay;
										echo "</div></font></td>";
										echo "</tr>";
										echo "  <tr>";
										echo "    <td><font color='#FF0000'><div align='right'>จำนวนเงินยืม</div></font></td>";
										echo "    <td><font color='#FF0000'><div align='left'>",number_format($bath,2),"   บาท  &nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;  </font>";

										// ค้นหา ผู้ยืมเงิน
										$sql11="SELECT * FROM person_yuem where id_yuem =$id_yuem2";
										$dbquery11 = mysql_db_query($dbname, $sql11);
										$num_rows11 = mysql_num_rows($dbquery11);$i=0;
										while ($result = mysql_fetch_array($dbquery11))
										{
											$citizenid_= $result[citizenid];
											$person_ = $result[person];
											echo $citizenid_." : ".$person_;
										}

										// สิ้นสุดการค้นหาผู้ยืมเงิน
										
										echo "&nbsp;&nbsp;&nbsp;:==>&nbsp;&nbsp;เป็นผู้ยืม</div></td>";
										echo "</tr>";
										echo "</div></td>";
										echo "</tr>";
									   }else
									{
										echo "<tr>";
										echo "<td colspan=2><font color='#FF0000'><div align='center'><h3>------ ท่านไม่ได้ยืมเงินใน รหัสงบประมาณนี้ ----</h3></div></font></td>";
										echo "";
									  exit;
									}
								}
							else
								{
									echo "<tr>";
									echo "<td colspan=2><font color='#FF0000'><div align='center'><h3>------ ไม่มี   ID เงินยืมหมายเลขนี้ ------</h3></div></font></td>";
				//					echo "=================".substr($c_khong,5,3)."<br>";
									echo "";
								  exit;
							}
							echo "</div></td>";
							echo "</tr>";
						}
				 //------------- สิ้นสุดค้นหารายการยืมเงิน ---------------------------
				?> 
					<?php 
						// ตรวจสอบรหัสงบประมาณ ว่าเป็น ค่า สาณู หรือว่า เงินยืมหรือไม่
						if ($cod_work=="501") 
							{  echo "-";    }
						//สิ้นสุดการ ตรวจสอบรหัสงบประมาณ ว่าเป็น ค่า สาณู หรือว่า เงินยืมหรือไม่
					?>
				  <tr>
					<td><div align="right">จำนวนเงินจัดสรร</div></td>
					<td><div align="left"> <? $trab = $M_rab+$M_rab2+$M_rab3+$M_rab4;
							echo number_format($trab,2); ?> </div></td>
				  </tr>
				  <tr>
					<td><div align="right">จำนวนเงินคงเหลือ</div></td>
					<td><div align="left">
					   <?php $M_ = $trab-$M_rua;
						  echo number_format($M_,2),"  บาท";
					   ?>
						</div></td>
				  </tr>
				  <tr>
					<td><div align="right">รายการจ่าย</div></td>
					<td><div align="left">
					<form name="form1" method="post" action="tadyod51.php?rand=<?=$rand?>">
						<?php
						 if (isset($cname_item) != "")
							{ 
								$item_ = $cname_item;
								echo $item_;
								echo "<INPUT TYPE='hidden' NAME='item_' value='$cname_item'>";
							}
							else 
							{ echo "<input type='text' name='item_' size= '50'>";   
							  echo "&nbsp;&nbsp;&nbsp;<input type='checkbox' name='yuem_money' value='check'/> <font color='#ff0000'>ยืมเงิน</font>";
							}
							echo "<INPUT TYPE='hidden' NAME='sel3' value ='$sel3'>";

					 //------------- ตรวจสอบการยืมเงิน  -----------------------
						if ($cmoney == "check")   // ------------------ถ้ายืมเงิน --> ล้างเงินยืม
							{
							  echo "<tr>";
							  echo "<td><div align='right'>";
							  echo "เงินยืม";
							  echo "</div></td>";
							  echo "<td>";
							  echo "<input type='text' name='aa1' value='$bath' onKeyUp='chk_cal(this.value)' readonly='readonly'> &nbsp;&nbsp;บาท ";

							  echo "</td></tr>";
							  echo "<tr><td><div align='right'>";
							  echo "ใช้จริง </div> </td><td>";
							  echo "<input type='text' name='aa2' id='aa2' onKeyUp='chk_cal(this.value)'>&nbsp; บาท ";
							  echo "<br></td></tr>";
							  echo "<tr>";
							  echo "<td><div align='right'> เงินคืน </div></td>";
							  echo "<td>";
							  echo "<input type='text' name='aa3' onKeyUp='chk_cal(this.value)' readonly='readonly'>&nbsp;&nbsp; บาท";

							  echo "</div></td>";
							  echo "</tr>";

							}
						else				// ---------------------ถ้าไม่ได้ยืม (ตั้งเบิกปกติ)
							{
							echo "<tr>";
							echo "<td><div align='right'>";
							echo "จำนวนเงิน";
							echo "<td><div align='left'>";
							echo "<input type='text' name='bath_berg' onblur='addComma_berg(this.value)'>&nbsp;&nbsp;บาท  <br></div></td>";
							echo "</tr>";

						}
				//$bath_use='00';
					?>

					  <tr>
							<td><div align="right">เลขที่เอกสาร</div></td>
							<td><div align="left">
								<input type="text" value='<?php echo $doc; ?>' size = "40" name="doc_">
								</div></td>
					  </tr>
					  <tr><td colspan="3" align="center">
						<fieldset>    <legend>Link-โครงการ e-GP</legend>
							<table border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#ccffff">
							  <tr>
								<td width="132"><div align="center" class="style1" ></div></td>
								<td width="90"><div align="center" class="style1">โครงการ 1 </div></td>
								<td width="90"><div align="center" class="style1">โครงการ 2 </div></td>
								<td width="90"><div align="center" class="style1">โครงการ 3 </div></td>
								<td width="90"><div align="center" class="style1">โครงการ 4 </div></td>
								<td width="90"><div align="center" class="style1">โครงการ 5 </div></td>
								<td width="90"><div align="center" class="style1">โครงการ 6 </div></td>
							  </tr>
							  <tr>
								<td><div align="right">เลขโครงการ : </div></td>
								<td><div align="center">
									<input name="egp11_" type="text" size="15" maxlength="20"/>
									</div></td>
								<td><div align="center">
									<input name="egp21_" type="text" size="15" maxlength="20" value="-"/>
									</div></td>
								<td><div align="center">
									<input name="egp31_" type="text" size="15" maxlength="20" value="-"/>
									</div></td>
								<td><div align="center">
									<input name="egp41_" type="text" size="15" maxlength="20" value="-"/>
									</div></td>
								<td><div align="center">
									<input name="egp51_" type="text" size="15" maxlength="20" value="-"/>
									</div></td>
								<td><div align="center">
									<input name="egp61_" type="text" size="15" maxlength="20" value="-"/>
									</div></td>
							</tr>
							  <tr>
								<td><div align="right">เลขที่สัญญา : </div></td>
								<td><div align="center">
									<input name="egp12_" type="text" size="15" maxlength="20" />
									</div></td>
								<td><div align="center">
									<input name="egp22_" type="text" size="15" maxlength="20" value="-"/>
									</div></td>
								<td><div align="center">
									<input name="egp32_" type="text" size="15" maxlength="20" value="-"/>
									</div></td>
								<td><div align="center">
									<input name="egp42_" type="text" size="15" maxlength="20" value="-"/>
									</div></td>
								<td><div align="center">
									<input name="egp52_" type="text" size="15" maxlength="20" value="-"/>
									</div></td>
								<td><div align="center">
									<input name="egp62_" type="text" size="15" maxlength="20" value="-"/>
									 </div></td>
							 </tr>
							</table>
						   </fieldset>
						</td>
						</tr>
						 <tr>
						 <td><div align="right"></div></td>
						 <td><div align="left">
						 <INPUT TYPE="hidden" NAME="trab" value="<?php echo $trab?>"><!-- จัดสรร -->
						 <INPUT TYPE="hidden" NAME="M_" value="<?php echo $M_?>"><!-- เหลือ -->
						 <INPUT TYPE="hidden" NAME="cmoney" value="<?php echo session_register('cmoney');?>">
						 <!-- เหลือ			-->
						 <INPUT TYPE="hidden" NAME="id_item_update" value="<?php echo $id_item_update?>">
						 <INPUT TYPE="hidden" NAME="bath_use" value="<?php echo $bath_use?>">
						 <INPUT TYPE="hidden" NAME="bath" value="<?php echo $bath?>">
						 <INPUT TYPE="hidden" NAME="id_yuem2" value="<?php echo $id_yuem2?>">


						 <input type="submit" name="Submit" value=" ตกลง ">
						
					  </form>
					  </td>
				  </tr>

					<td>  </td></tr>
				</table>
				<p>&nbsp;</p>


<!-- end การแก้ไขข้อมูล -->
  <?php include("./include/footer.inc");?>
                                    </body>
                                    </html>


<script language="javascript">

	function isNumeric(elem, helperMsg)  //ตรวจสอบการป้อนตัวเลข
	 {  
		 var numericExpression = /^[0-9.]+$/; // ตัวเลขและทศนิยม
         if(elem.value.match(numericExpression)){  
                 return true;  
         }else{  
//                 alert(helperMsg);  
                 elem.value=elem.value.substr(0,elem.value.length-1);  
                 elem.focus();  
                 return false;  
        }  
	 } 


</script>
