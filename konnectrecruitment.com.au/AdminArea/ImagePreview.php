<?
include("../Includes/BackOfficeIncludesFiles.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?=CONST_BACKOFFICE_TITLE?>Preview Image<?=CONST_BACKOFFICE_TITLE_END?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
<?
if(isset($_REQUEST['nLayoutId']))
{
	if(isset($arrLayoutImage[$_REQUEST['nLayoutId']]))
		print $arrLayoutImage[$_REQUEST['nLayoutId']][1];
}
?>
</body>
</html>