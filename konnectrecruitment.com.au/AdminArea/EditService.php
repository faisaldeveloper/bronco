<?
require_once("../Includes/BackOfficeIncludesFiles.php");
if(isset($_REQUEST['hdnServiceId']) && !empty($_REQUEST['hdnServiceId'])) 
	$nServiceId=$_REQUEST['hdnServiceId'];

$objServices->m_npkServiceId=$nServiceId;
$rsService=$objServices->GetServicesById();
if($rsService!=FALSE)
{
	$rowService=mysql_fetch_object($rsService);
	$strServiceName=$rowService->ServiceTitle;
	
}
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
   if(f.txtCat.value == "")
	{
		alert("Please enter category name");
		f.txtCat.focus();
		return false;
	}
}
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="2">
	  <tr>
	    <td align="right"><a href="ManageServices.php">&lt;&lt;back</a></td>
	    </tr>
	  <tr>
	    <td class="hdng_sandy">Edit Service</td>
	    </tr>
	  <tr>
	    <td><form name="frmService" id="frmService" method="post" action=" EditServiceAction.php" onSubmit="return ValidateForm(this);">
	      <table width="50%" border="0" cellspacing="0" cellpadding="2" align="center">
	        <tr>
	          <td align="right">Name:</td>
	          <td><input type="text" name="txtService" id="txtService" value="<?=$strServiceName?>"></td>
	          </tr>
	        <tr>
	          <td>&nbsp;</td>
	          <td><input name="btnEdit" type="submit" class="button" id="btnEdit" value="Update">
                   <input type="hidden" name="hdnServiceId" value="<?=$nServiceId?>">
              </td>
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