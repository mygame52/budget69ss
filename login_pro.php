<?php include("config.inc.php"); ?>
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

        </div>
        <div class="cleared reset-box"></div>
        <div class="rnut-bar rnut-nav">
            <div class="rnut-nav-outer">
                <ul class="rnut-hmenu">
                    <li>
                        <a href="./" class="active">Home</a>
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

                                    <h2 class="rnut-postheader" style="text-align: center;">เจ้าหน้าที่จังหวัด Login</h2>
                                    <!-- <div class="rnut-postcontent">
                                                                    <p style="text-align: center;">test1</p>
                                                                    <p style="text-align: center;">test2</p>
                                            </div> -->
                                    <!-- start การแก้ไขข้อมูล -->
                                    <body onload="document.form1.user_.focus()">
                                        <div align="center">
                                            <BR><form id="form1" name="form1" method="post" action="login.php"/>
                                                <table width="60%" border="0" align="center" cellpadding="3" cellspacing="1">
                                                    <tr bgcolor="#ffffff">
                                                        <th scope="row"  bgcolor="#ffffff">UserName</th>
                                                        <td >	
                                                            <INPUT TYPE="text" NAME="user_" SIZE="16" style="font: 12pt tahoma; color: #ff0000;background: #C0F9BD; border: 1px black solid" />
                                                        </td>
                                                    </tr>
                                                    <tr bgcolor="#ffffff">
                                                        <th scope="row"   bgcolor="#ffffff">Password</th>
                                                        <td>

                                                            <INPUT TYPE="password" NAME="pass" SIZE="16" style="font: 12pt tahoma; color: #ff0000;background: #C0F9BD; border: 1px black solid" />
                                                            <INPUT TYPE="hidden"  name= "hid" value= "13"/>    
                                                        </td>
                                                    </tr>
                                                    <tr bgcolor="#bef8f0">
                                                        <td style="text-align: center;">
                                                        </td>
                                                        <td>
                                                            <input type="submit" name="Submit" value="ตกลง" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <input type="reset" value ="ล้าง"/>
                                                        </td>
                                                    </tr> 

                                                </table>
                                                </form>  
                                        </div>
                                    </body><br>

                                        <!-- end การแก้ไขข้อมูล -->
                                        <?php include("./include/footer.inc"); ?>
                                        </body>
                                        </html>
