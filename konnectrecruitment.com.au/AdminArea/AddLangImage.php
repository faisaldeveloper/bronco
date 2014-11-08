<?php
require_once("../Includes/BackOfficeIncludesFiles.php");
	//--------------Checking for right---------------------
	$objAdminUser=new clsAdminUser();
	$objAdminUser->m_objRoles=new clsRoles();
	$objAdminUser->m_intUserId=$_SESSION['intUserId'];
	$objAdminUser->m_objRoles->m_intRightId=28;
	if($objAdminUser->CheckRightForAdmin()==1)
	{
		/***
			server side validation
		**/
		if(!isset($_REQUEST['nLangID']) || empty($_REQUEST['nLangID']))
		{
			header("Location:ManageInterfaceLang.php?intMessage=101");
			exit;
		}
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?>Add Language Image<?=CONST_BACKOFFICE_TITLE_END?></title>
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
            </script>
            <table width="100%"  border="0" cellspacing="0" cellpadding="0">
		  <?
		  if($objAdminUser->CheckRightForAdmin()!=1)//Start Right If
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
                <td><table width="99%"  border="0" align="center" cellpadding="2" cellspacing="0">
              <tr>
		 <td colspan="3"><a href="ManageInterfaceLang.php"><span class="txtBld_ornge">Language Manager</span></a>&nbsp;&gt;&gt;&nbsp;<span class="hdng_sandy">Add Language Image</span></td>
              </tr>
			  <? if (!isset($_REQUEST['intMessage'])) {?> <tr><td>&nbsp;</td></tr><? }?>
			<tr>
			   <td colspan="2" align="center">
				<? include('../Includes/DisplayConfirmMessage.php');?>
			  </td>
		</tr>
              <tr>
                <td><form action="AddLangImageAction.php" method="post" enctype="multipart/form-data" name="form1">
                    <table width="98%"  border="0" align="center" cellpadding="2" cellspacing="0" class="TabBorderLightGreyBG">
                      <tr>
                        <td align="left" class="txtBld_grn">&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="left" class="txtBld_grn">Image<span class="txt_red">*</span></td>
                        <td><input name="flItemTypeImg" type="file" id="flItemTypeImg"></td>
                      </tr>
                      <tr>
                        <td align="right">&nbsp;</td>
                        <td><input name="btnSubmit" type="submit" class="button" id="btnSubmit" value="Add Image">
                            <input type="hidden" value="<?=$_REQUEST['nLangID']?>" name="hdnLangID"></td>
                      </tr>
                      <tr>
                        <td align="right">&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                    </table>
                </form></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
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