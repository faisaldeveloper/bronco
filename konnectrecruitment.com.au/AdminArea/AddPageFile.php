<?php
require_once("../Includes/BackOfficeIncludesFiles.php");
$intPageId = $_POST['hdnPageId'];
$intLangId = $_POST['hdnLangId'];
$nParentId = $_POST['hdnParentId'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?>Add Page File<?=CONST_BACKOFFICE_TITLE_END?></title>
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
          <table width="99%"  border="0" align="center" cellpadding="2" cellspacing="0">
<tr>
	              <td><? if ($nParentId==0){?><a href="ManagePages.php"><span class="txtBld_ornge">Manage Pages</span></a>&nbsp;&gt;&gt;&nbsp;<span class="hdng_sandy">Add Page File</span><? } else {?><a href="ManagePages.php"><span class="txtBld_ornge">Manage Pages</span></a>&nbsp;&gt;&gt;&nbsp;<a href="ManagePages.php?hdnParentId=<?=$nParentId?>"><span class="txtBld_ornge">Manage SubPages</span></a>&nbsp;&gt;&gt;&nbsp;<span class="hdng_sandy">Add SubPage File</span><? }?></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td align="center"><form action="AddPageFileAction.php" method="post" enctype="multipart/form-data" name="form1">
                  <table width="88%"  border="0" align="center" cellpadding="2" cellspacing="0" class="TabBorderLightGreyBG">
                    <tr>
                      <td colspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="26%" align="left" class="txtBld_grn">Select File </td>
                      <td width="74%" align="left"><input name="flAddPageFile" type="file" id="flAddNewsImage"></td>
                    </tr>
                    <tr>
                      <td>
                        <input type="hidden" name="hdnPageId" value="<?=$intPageId?>">
                        <input type="hidden" name="hdnLangId" value="<?=$intLangId?>">
						<input type="hidden" name="hdnParentId" value="<?=$nParentId?>">                      </td>
                      <td align="left"><input name="Submit" type="submit" class="button" value="Upload"></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td align="left">&nbsp;</td>
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