<?php
	require_once("../Includes/BackOfficeIncludesFiles.php");
//--------------Checking for right---------------------
	$objAdminUser=new clsAdminUser();
	$objAdminUser->m_objRoles=new clsRoles();
	$objAdminUser->m_intUserId=$_SESSION['intUserId'];
	$objAdminUser->m_objRoles->m_intRightId=30;
	if($objAdminUser->CheckRightForAdmin()==1)
	{
		if(isset($_REQUEST['intMessage']))
		{
			$_SESSION['intLangId'] = $objLanguage->GetDefaultLang();	//Setting Default Language
			$objCMessage->m_intConfMsgId=$_REQUEST['intMessage'];
			$objCMessage = new clsConfirmMessage();
			$objCMessage->m_intConfMsgId=$_REQUEST['intMessage'];
			$rsCMessage=$objCMessage->GetMessage_BackOffice();
		}
		
			
		if(isset($_REQUEST['nLangId']))
		{
				$arrOutLet='';
			$languageName='';
	
			if(isset($_REQUEST['strLang']))
			$languageName = $_REQUEST['strLang'];
		}
		else
		{
		  $objLang=new clsLanguage();
		  $intLangId = $_REQUEST['hdnLangId'];
		  $objLang->m_intLangId = $intLangId;
		  $rsLang=$objLang->GetLanguageById();
		  if($rsLang!=NULL)
		  $strRowLang=mysql_fetch_array($rsLang);
		  $languageName=$strRowLang['LangDesc'];	
		}
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?>Edit Interface Language<?=CONST_BACKOFFICE_TITLE_END?></title>
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
<script>
	function Validate(f)
	{ 
		if(f.txtLangDesc.value=="")
		{
			alert("Please enter language name!");
			f.txtLangDesc.focus();
			return false;
		}
		else true;
	}
</SCRIPT>
<br>
		<table width="98%"  border="0" cellspacing="0" cellpadding="0" align="center">
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
		   <td><a href="ManageInterfaceLang.php"><span class="txtBld_ornge">Language Manager</span></a>&nbsp;&gt;&gt;&nbsp;<span class="hdng_sandy">Edit Interface Language</span></td>
          </tr>
          <tr><td >&nbsp;</td></tr>
          <tr>
            <td>
<form name="form1" method="post" action="AddInterfaceLangAction.php" onSubmit="return Validate(this)" >
            <table width="99%" border="0" cellspacing="2" cellpadding="4" class="TabBorderLightGreyBG">
			<tr>
			   <td colspan="2" align="center"><? include('../Includes/DisplayConfirmMessage.php');?>&nbsp;</td>
			</tr>
              <tr>
                <td width="28%" align="right" class="txtBld_grn">Language Name<span class="txt_red">*</span></td>
                <td width="72%"><input name="txtLangDesc" type="text" id="txtLangDesc" value="<?=$languageName?>" size="45">
                  <input name="hdnAction" type="hidden" id="hdnAction" value="Edit">
				   <input name="hdnLangId" type="hidden"  value="<?=$intLangId?>">
				   </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><input name="Submit" type="submit" class="button" value="Update"></td>
              </tr>
          <tr><td >&nbsp;</td></tr>
            </table>
        </form>
        </td>
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
