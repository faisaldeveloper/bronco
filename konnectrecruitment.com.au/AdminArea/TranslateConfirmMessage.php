<?php
include("../Includes/BackOfficeIncludesFiles.php");
//--------------Checking for right---------------------
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=200;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{
	//////////////creating class objects/////////
	$objConfMsg=new clsConfirmMessage();
	$objLang=new clsLanguage();
	
	///////////////////////Initialization/////////////////
	$strDesc ="";
	$nConfMsgId = "";
	$nLangId = "";
	$intPageId = "";
	$rsConfMsg = "";
	
	///////////Copying data from query string////////////
	if(isset($_REQUEST['hdnConfMsgId']))
	{
		$nConfMsgId=$_REQUEST['hdnConfMsgId'];
	}
	if(isset($_REQUEST['hdnLangId']))
	{
		$nLangId = $_REQUEST['hdnLangId'];
	}
	if(isset($_REQUEST['intPage']))
	{
		$intPage = $_REQUEST['intPage'];
	}
		
	//////////coping data to class variables/////////
	$objConfMsg->m_intConfMsgId = $nConfMsgId;
	$objConfMsg->m_intLangId = $nLangId;
	$rsConfMsg=$objConfMsg->GetMessage_BackOffice();
	$strRowConfMsg=mysql_fetch_array($rsConfMsg);
	if(isset($_REQUEST['txtConfMsgDesc']))
		$strDesc = $_REQUEST['txtConfMsgDesc'];
}//End Right If
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?>Translation Manager<?=CONST_BACKOFFICE_TITLE_END?></title>
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
			if(f.lstLangId.value==0)
			{
				alert("Please select langauage");
				f.lstLangId.focus();
				return false;
			}
			else if(f.txtConfMsgDesc.value=="")
			{
				alert("Please enter confirmation message");
				f.txtConfMsgDesc.focus();
				return false;
			}
			else return true;
		  }
		  </script>
		  <table width="99%"  border="0" align="center" cellpadding="2" cellspacing="0">
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
          <td colspan="4"><a href="ManageConfirmMessage.php"><span class="txtBld_ornge">Confirmation Messages</span></a>&nbsp;&gt;&gt;&nbsp;<span class="hdng_sandy">Translate Confirm Message</span></td>
              </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td align="center"><? include('../Includes/DisplayConfirmMessage.php');?>&nbsp;</td>
            </tr>
            <tr>
              <td><form name="form1" method="post" action="TranslateConfirmMessageAction.php" onSubmit="return Validate(this)">
                  <table width="99%"  border="0" align="center" cellpadding="0" cellspacing="2" class="TabBorderLightGreyBG">
                    
                    <tr>
                      <td align="left" class="txtBld_grn">&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="left" class="txtBld_grn">Confirm Message</td>
                      <td><?=$strRowConfMsg['ConfMsgDesc']?></td>
                    </tr>
                    <tr>
                      <td align="left" class="txtBld_grn">Select Language <span class="txt_red">*</span></td>
                      <td><select name="lstLangId" id="lstLangId">
					  	<option value="<?=NULL?>">Select</option>
                        <?php 
						$rsLang=$objConfMsg->GetNonTranlatedLangs('pkLangId','confirmation_messages','pkConfMsgId',$_REQUEST['hdnConfMsgId']);
							if($rsLang != FALSE){
							while($strRowLang=mysql_fetch_array($rsLang)){
							if($strRowLang['pkLangId']!=$_REQUEST['hdnLangId']){
						  ?>
                          <option value="<?=$strRowLang['pkLangId']?>">
                          <?=$strRowLang['LangDesc']?>
                          </option>
                          <?
							  } 
							 }
							}
						  ?>
                      </select>
					  <?php if($rsLang == FALSE) echo "<span class='txt_red'>This Confirm Message is translated in all available languages</span>"; ?>					  </td>
                    </tr>
                    <tr>
                      <td width="37%" align="left" class="txtBld_grn">Translated<span class="txt_red"> *</span></td>
                      <td width="63%"><input name="txtConfMsgDesc" type="text" id="txtConfMsgDesc" size="35" value="<?=$strDesc?>"></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td><input name="Submit" type="submit" class="button" value="Translate">
						  <input name="intPage" type="hidden" id="intPage" value="<?=$intPage?>">
                          <input name="hdnConfMsgId" type="hidden" id="hdnConfMsgId" value="<?=$nConfMsgId?>">
                          <input name="hdnLangId" type="hidden" id="hdnLangId" value="<?=$nLangId?>"></td>
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
			<?
				}//End Right If
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
