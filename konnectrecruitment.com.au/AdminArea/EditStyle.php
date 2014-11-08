<?php
include("../Includes/BackOfficeIncludesFiles.php");

if(isset($_REQUEST['hdnStyleId']))
	$intStyleId=$_REQUEST['hdnStyleId'];
if(isset($_REQUEST['hdnThemeId']))
	$intThemeId=$_REQUEST['hdnThemeId'];

$objStyles->m_intStyleID=$intStyleId;
$objStyles->m_intThemeID=$intThemeId;
$StyleColor=$objStyles->SelectThemeColor();

?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?>Edit Styles<?=CONST_BACKOFFICE_TITLE_END?></title>
<!-- InstanceEndEditable -->
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
<LINK REL="SHORTCUT ICON" HREF="Images/favicon.ico">

<link href="AdminArea.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="98%"  border="0" align="center" cellpadding="0" cellspacing="0" class="MailTableBGColor">
  <tr>
    <td colspan="2"><?php $nIsLoginTemplate = 0; include("Header.php");?></td>
  </tr>
  <tr>
    <td width="17%" align="left" valign="top" class="TabBorderLightGreyBG"><?php include("LeftPanel.php");?></td>
    <td width="83%" height="500" align="left" valign="top">
	<!-- InstanceBeginEditable name="body" -->
		<script language="javascript">
function paletteOpen(fieldName) {
	palette = window.open("","paletteWindow","toolbar=0,location=0,menubar=0,scrollbars=0,resizable=0,width=530,height=100");
	palette.location.href = "setgrid.php?fieldName="+fieldName;
	palette.focus();
}
function SetColor(fieldName, hexValue)
{
	//alert(fieldName);
	//alert(document.forms[0].elements[fieldName]);
	document.forms[0].elements[fieldName].value=hexValue;
}

</script>
<table width="99%"  border="0" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <td align="right"><a href="ManageStyles.php?hdnThemeId=<?=$intThemeId?>">&lt;&lt;back</a></td>
  </tr>
  <tr>
    <td class="hdng_sandy">Edit Styles Color </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td> 
	<form name="frmEdit" id="frmEdit" method="post" action="EditStyleAction.php">
	<table width="88%"  border="0" align="center" cellpadding="2" cellspacing="0" class="TabBorderLightGreyBG">
      <tr>
        <td width="32%" align="left">Style Color</td>
        <td width="68%"><input name="txtColor" type="text" id="txtColor" value="<?=$StyleColor?>"><a href="javascript:paletteOpen('txtColor')"><img src="Images/palette.gif" alt="palette" width="21" height="20" border="0"></a></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input name="Submit" type="submit" class="button" value="Update">
          <input name="hdnStyleId" type="hidden" id="hdnStyleId" value="<?=$intStyleId?>">
          <input name="hdnThemeId" type="hidden" id="hdnThemeId" value="<?=$intThemeId?>"></td>
      </tr>
    </table>
	</form>
	</td>
  </tr>
</table>

	  <!-- InstanceEndEditable -->
    </td>	
  </tr>
  <tr>
    <td colspan="2"><?php include("Footer.php");?></td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
