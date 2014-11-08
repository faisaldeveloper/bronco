<?php
	require_once("../Includes/BackOfficeIncludesFiles.php");
//--------------Checking for right---------------------
	$objAdminUser=new clsAdminUser();
	$objAdminUser->m_objRoles=new clsRoles();
	$objAdminUser->m_intUserId=$_SESSION['intUserId'];
	$objAdminUser->m_objRoles->m_intRightId=27;
	if($objAdminUser->CheckRightForAdmin()==1)
	{
		$rsLangOutlet = $objLanguage->GetLanguages();
		$objLanguage = new clsLanguage();
		$strLang='';
		if(isset($_GET['strLang']))
		$strLang = $_GET['strLang'];
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?>Add New Language<?=CONST_BACKOFFICE_TITLE_END?></title>
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
<script>
	function Validate(f)
	{
	 if(f.txtLangName.value=="")
		{
			alert("Please enter language name");
			f.txtLangName.focus();
			return false;
		}
		else true;
	}	
</script>
	<br>
	  <table width="99%"  border="0" cellspacing="0" cellpadding="0" align="center">
		  <?
		  if($objAdminUser->CheckRightForAdmin()!=1)
			{
			?>
            <tr>
              <td class="txtBld_ornge">You are not authorised to view this page. <a href="<?=$_SERVER['HTTP_REFERER']?>"><< Back </a></td>
            </tr>
			<?
			}
			else {
			?>		  
	   <tr>
		   <td><a href="ManageInterfaceLang.php"><span class="txtBld_ornge">Language Manager</span></a>&nbsp;&gt;&gt;&nbsp;<span class="hdng_sandy">Add New Interface Language</span></td>
	    </tr>
		<tr>
		   <td align="center"><? include('../Includes/DisplayConfirmMessage.php');?>&nbsp;</td>
		</tr>
		<tr>
		  <td><table width="100%"  border="0" cellspacing="0" cellpadding="2">
            <tr>
              <td colspan="2"><form action="AddInterfaceLangAction.php" method="post" enctype="multipart/form-data" name="form1" onSubmit="return Validate(this)"  >
				  <table width="97%"  border="0" cellspacing="2" cellpadding="2" align="center" class="TabBorderLightGreyBG">
                      <tr>
                        <td align="right" class="txtBld_grn" colspan="2" height="6"></td>
                      </tr>
                      <tr>
                      <td width="30%" align="right" class="txtBld_grn">Language Name<span class="txt_red">*</span></td>
                      <td width="70%" align="left" valign="middle"><input name="txtLangName" type="text" id="txtLangName" size="45" value="<?=$strLang?>"> </td>
                    </tr>
                    <tr>
                      <td align="right" class="txtBld_grn">Language Flag/Image </td>
                      <td align="left" valign="middle"><input name="flLangFlag" type="file" id="flLangFlag" size="45"></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td align="left" valign="middle"><input name="Submit" type="submit" class="button" value="Add"></td>
                    </tr>
                    <tr>
                      <td height="4"></td>
                    </tr>
                  </table>
              </form></td>
            </tr>
            <tr>
              <td colspan="2">&nbsp;</td>
            </tr>
          </table></td>
            </tr>
			<?
			}
			?>
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
