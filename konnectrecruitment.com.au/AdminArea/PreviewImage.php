<?
	require_once("../Includes/BackOfficeIncludesFiles.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?=CONST_BACKOFFICE_TITLE?>Image Preview<?=CONST_BACKOFFICE_TITLE_END?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="websitebuilder.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="100%" border="0" height="100%" bgcolor="#FFFFFF">
<tr><td></td></tr>
<tr><td align="center">
<strong>Detail view of Image.</strong>
</td></tr>
<tr><td>

</td></tr>
  <tr>
    <td align="center"><img src="<?=$_REQUEST['id']?>"></td>
  </tr>
  <tr>
    <td align="center"><input type="button"  value="close" onClick="window.close()" ></td>
  </tr>
</table>
</body>
</html>
