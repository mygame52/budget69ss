<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>---</title>
</head>
<body>
<?php require_once('Connections/budget.php'); 
//$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
  $insertSQL = sprintf("INSERT INTO item (amp_item, c_tang, item, mony) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['amp_item'], "text"),
                       GetSQLValueString($_POST['c_tang'], "text"),
                       GetSQLValueString($_POST['item'], "text"),
                       GetSQLValueString($_POST['mony'], "double"));

  mysql_select_db($database_budget, $budget);
  $Result1 = mysql_query($insertSQL, $budget) or die(mysql_error());

  //$insertGoTo = "in_item_ok.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
echo "Å§ºÑ¹·Ö¡áÅéÇ   add record";
?>
</body>
</html>