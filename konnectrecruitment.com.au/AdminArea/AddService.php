<?
require_once("../Includes/BackOfficeIncludesFiles.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?><?=CONST_BACKOFFICE_TITLE_END?></title>
<!-- InstanceEndEditable -->
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
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
function ValidateForm(f) 
{
   if(f.txtService.value == "")
	{
		alert("Please enter service name");
		f.txtService.focus();
		return false;
	}
}
</script>
    <table width="100%" border="0" cellspacing="0" cellpadding="2">
	  <tr>
	    <td align="right"><a href="ManageServices.php">&lt;&lt;back</a></td>
	    </tr>
	  <tr>
	    <td class="hdng_sandy">Add Service</td>
	    </tr>
	  <tr>
	    <td><form name="frmServic" id="frmService" method="post" action="AddServiceAction.php" onSubmit="return ValidateForm(this);">
	      <table width="50%" border="0" cellspacing="0" cellpadding="2" align="center">
	        <tr>
	          <td align="right">Name:</td>
	          <td><input type="text" name="txtService" id="txtService"></td>
	          </tr>
	        <tr>
	          <td>&nbsp;</td>
	          <td><input name="btnAdd" type="submit" class="button" id="btnAdd" value="Add"></td>
	          </tr>
	        <tr>
	          <td>&nbsp;</td>
	          <td>&nbsp;</td>
	          </tr>
	        </table>
	      </form></td>
	    </tr>
	  <tr>
	    <td>&nbsp;</td>
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