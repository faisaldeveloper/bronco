<?PHP
require_once("../Includes/BackOfficeIncludesFiles.php");
//--------------Checking for right---------------------
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=22;
if($objAdminUser->CheckRightForAdmin()==1)
{

//////////////Object Creation///////////////////
$objPages = new clsPages();
$objLang  = new clsLanguage();
/////////////Serverside Validation///////////////
if(!isset($_REQUEST['hdnPageId']))
{
	header("location:ManagePages.php?intMessage=355");
	exit;
}
///////////////Initializing Variables/////////////////
$intPageId = "";
$intLangId = $_SESSION['intLangId'];
$nParentId = "";
$intPage = "";
$strSearch = "";
//////////Getting Values from query string////////////
if(isset($_REQUEST['hdnPageId']))
	$intPageId = $_REQUEST['hdnPageId'];
if(isset($_REQUEST['intLangId']))
	$intLangId = $_REQUEST['intLangId'];
if(isset($_REQUEST['hdnParentId']))
	$nParentId = $_REQUEST['hdnParentId'];
if(isset($_REQUEST['hdnPage']))
	$intPage = $_REQUEST['hdnPage'];
if(isset($_REQUEST['hdnSearch']))
	$strSearch = $_REQUEST['hdnSearch'];
if (isset($_REQUEST['txtPageName']) && !empty($_REQUEST['txtPageName']))
	$strPageName = $_REQUEST['txtPageName'];
if (!empty($_REQUEST['txtPageTitle']) && !empty($_REQUEST['txtPageTitle']))
	$strPageTitle=$_REQUEST['txtPageTitle'];
////////////////////////////////////////////////////
$arrLang = $objLang->GetLanguages();
$nDefaultLang=$objLang->GetDefaultLangId();

////////////Transfering Values to class variables///////////////
$objPages->m_intPageId = $intPageId;
$objPages->m_intLangId = $nDefaultLang;
//echo $nDefaultLang;exit;
$objPages->m_intParentId = $nParentId;
$arrPage = $objPages->GetPageDetail();

while($nstatus==0 && $arrRecPage = mysql_fetch_object($arrPage))
{
	$strPageNameOriginal = stripcslashes($arrRecPage->PageName);
	$strPageTitleOriginal = stripcslashes($arrRecPage->PageTitle);
	$strMetatagsDescOriginal  = stripcslashes($arrRecPage->MetatagsDesc);
	$strMetatagsKWOriginal  = stripcslashes($arrRecPage->MetatagsKW);
	$strContentsOriginal = stripcslashes($arrRecPage->PageContents);
	if($objLang->GetDefaultLangId() != $arrRecPage->fkLangID)
		$nstatus=1;
	}		
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?>Translation Manager<?=CONST_BACKOFFICE_TITLE_END?></title>
<?php include("Tiny.php"); ?>
<script language="JavaScript" type="text/javascript" src="EditorFiles/richtext.php"></script>

<script language="javascript" src="../Script/JavaScript.js"></script>          
<script language="javascript">
function submitForm(f) 
{
	if(f.txtPageName.value == "")
	{
		alert("Please fill Page Name");
		f.txtPageName.focus();
		return false;
	}

	else if(f.txtPageTitle.value == "")
	{
		alert("Please fill Page Title");
		f.txtPageTitle.focus();
		return false;
	}
	else
	{
		return true;
	}
}
function ChangeLanguage()
{//This function is activated when the language is changed.
	var a=window.document.TranslatePage.lstLang.value;
	window.document.TranslatePage.hdnLangId.value=a;
	var f=window.document.TranslatePage;
	var a=f.lstLang.value;
	if(document.getElementById("hdnlist_"+a))
		f.txtPageName.value=document.getElementById("hdnlist_"+a).value;
	else 
	f.txtPageName.value="";
	if(document.getElementById("hdnlist2_"+a))
		f.txtPageTitle.value=document.getElementById("hdnlist2_"+a).value;
	else
	f.txtPageTitle.value="";
	if(document.getElementById("hdnlist3_"+a))
		f.txtMetatagDesc.value=document.getElementById("hdnlist3_"+a).value;
	else 
	f.txtMetatagDesc.value="";
	if(document.getElementById("hdnlist4_"+a))
		f.txtMetaTagKW.value=document.getElementById("hdnlist4_"+a).value;
	else 
	f.txtMetaTagKW.value="";
	if(document.getElementById("hdnlist5_"+a))
		var strContents=document.getElementById("hdnlist5_"+a).value;
	else 
		var strContents="";
		//var strWYSWIGName="txtPageContents";
		//populateWYSWIG(strWYSWIGName,strContents)
}
</script>
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
    <br>
		<table width="99%" border="0" cellspacing="2" cellpadding="2" align="center">
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
              <td><a href="ManagePages.php"><span class="txtBld_ornge">Page Manager</span></a><? if ($nParentId != 0){?>&nbsp;&gt;&gt;&nbsp;<a href="ManagePages.php?hdnParentId=<?=$nParentId?>"><span class="txtBld_ornge">SubPages</span></a><? }?>&nbsp;&gt;&gt;&nbsp;<span class="hdng_sandy">Translate Info</span></td> 
			</tr>
            <tr>
              <td class="txtBld_grn" colspan="3" align="center"><? include('../Includes/DisplayConfirmMessage.php');?>&nbsp;</td>
            </tr>
            <tr>
              <td><form action="TranslatePageAction.php" method="post" enctype="multipart/form-data" name="TranslatePage" onSubmit="return submitForm(this)">
                  <table width="99%" border="0" cellspacing="2" cellpadding="2" class="TabBorderLightGreyBG" align="center">
                    <tr>
                      <td class="txtBld_grn">Select Language<span class="txt_red">*</span></td>
                      <td colspan="2">
					  <select name="lstLang" id="select" onChange="ChangeLanguage()">
                      <?php 
						$arrLang = $objLang->GetLanguages();
						$nDefaultLang=$objLang->GetDefaultLangId();
						$nStatus=0;
						if($arrLang != FALSE)
						while($arrRecLang = mysql_fetch_object($arrLang))
						{
							if($arrRecLang->pkLangId != $nDefaultLang)
							{
								if($nStatus==0)
									$nDefLang=$arrRecLang->pkLangId;
									?>
									<option value="<?=$arrRecLang->pkLangId?>" <? if($nStatus==0) {echo "selected";$nCurrLang=$arrRecLang->pkLangId;}?>>
									<?=$arrRecLang->LangDesc?>
									</option>
									<?php
									$nStatus=1;
							}
						}
						?>
                    </select>
					  <input name="hdnLangId" type="hidden" id="hdnLangId" value="<?=$nCurrLang?>"></td>
                    </tr>
						<?
						$objPages->m_intLangId = $nCurrLang;
						
						$arrPage = $objPages->GetPageDetail();
						while($nstatus==0 && $arrRecPage = mysql_fetch_object($arrPage))
						{
							$strPageName = stripcslashes($arrRecPage->PageName);
							$strPageTitle = stripcslashes($arrRecPage->PageTitle);
							$strMetatagsDesc  = stripcslashes($arrRecPage->MetatagsDesc);
							$strMetatagsKW  = stripcslashes($arrRecPage->MetatagsKW);
							$strContents = stripcslashes($arrRecPage->PageContents);
							if($objLang->GetDefaultLangId() != $arrRecPage->fkLangID)
								$nstatus=1;
						}
						?>
                    <tr>
                      <td width="21%" class="txtBld_grn">Page Name</td>
                      <td colspan="2"><?=$strPageNameOriginal?></td>
                    </tr>
                    <tr>
                      <td width="21%" class="txtBld_grn">Page Name<span class="txt_red">*</span></td>
                      <td colspan="2"><input name="txtPageName" type="text" id="txtPageName" value="<?=$strPageName?>"></td>
                    </tr>
                    <tr>
                      <td class="txtBld_grn">Page Title</td>
                      <td colspan="2"><?=$strPageTitleOriginal;?></td>
                    </tr>
                    <tr>
                      <td class="txtBld_grn">Page Title<span class="txt_red">*</span></td>
                      <td colspan="2"><input name="txtPageTitle" type="text" id="txtPageTitle" value="<?=$strPageTitle;?>"></td>
                    </tr>
                      <tr>
                        <td colspan="3">&nbsp;</td>
                      </tr>
                      <tr>
                      <td colspan="3"><span class="hdng_sandy">Search Engine Optimization</span></td>
                    </tr>
                    <tr>
                      <td class="txtBld_grn">Meta Tags Desc</td>
                      <td colspan="2"><?=$strMetatagsDescOriginal?></td>
                    </tr>
                    <tr>
                      <td class="txtBld_grn">Meta Tags Desc</td>
                      <td colspan="2"><input name="txtMetatagDesc" type="text" id="txtMetatagDesc" value="<?=$strMetatagsDesc?>" size="50"></td>
                    </tr>
                    <tr>
                      <td class="txtBld_grn">&nbsp;</td>
                      <td colspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                      <td class="txtBld_grn">Meta Tags Keywords</td>
                      <td colspan="2"><?=$strMetatagsKWOriginal?></td>
                    </tr>
                    <tr>
                      <td class="txtBld_grn">Meta Tags Keywords</td>
                      <td colspan="2"><input name="txtMetaTagKW" type="text" id="txtMetaTagKW" value="<?=$strMetatagsKW?>" size="50"></td>
                    </tr>
                    <tr>
                      <td valign="top"></td>
                      <td colspan="2" valign="top"></td>
                    </tr>
                    <tr>
                      <td valign="top" class="txtBld_grn">&nbsp;</td>
                      <td colspan="2" valign="top">&nbsp;</td>
                    </tr>
                    <tr>
                      <td valign="top" class="txtBld_grn">Page Contents <br>(Original text)
                      </td>
                      <td colspan="2" valign="top">
                      	<table width="100%">
                        	<tr>
                            	<td><textarea name="txtOriginal"  id="txtOriginal" cols="50" rows="30" ><?=$strContentsOriginal?></textarea></td>
                            </tr>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td valign="top" class="txtBld_grn">Page Contents <br>(Modify here)</td>
                      <td colspan="2" valign="top">
					  <textarea name="report" id="report" cols="50" rows="30"><?=$strContents?></textarea></td>
                    </tr>
                    <tr>
                      <td colspan="3">
					  <?
					  $rsSql=$objPages->GetPageDescById();				  
					  if($rsSql != NULL)
					  if(mysql_num_rows($rsSql)>0)
					  while($row2=mysql_fetch_object($rsSql))
					  { /*
						  ?>
						 <input type="hidden" id="hdnlist_<?=$row2->fkLangID?>" value="<?=$row2->PageName?>">
						 <input type="hidden" id="hdnlist2_<?=$row2->fkLangID?>" value="<?=$row2->PageTitle?>">
						 <input type="hidden" id="hdnlist3_<?=$row2->fkLangID?>" value="<?=$row2->MetatagsDesc?>">
						 <input type="hidden" id="hdnlist4_<?=$row2->fkLangID?>" value="<?=$row2->MetatagsKW?>">
						 <input type="hidden" id="hdnlist5_<?=$row2->fkLangID?>" value="<?=addslashes($row2->PageContents)?>">
						 <?
						 */
					  }
					  ?>
                      </td>
                    </tr>
                    <tr>
                     <td width="79%">
					  	<input type="hidden" name="hdnPageId" value="<?=$intPageId?>">
                        <input type="hidden" name="hdnParentId" value="<?=$nParentId?>">
						<input name="hdnSearch" type="hidden" id="hdnSearch" value="<?=$strSearch?>">
                        <input name="intPage" type="hidden" id="intPage" value="<?=$intPage?>">
						<input name="btnEdit" type="submit" class="button" value="Translate"></td>
                    </tr>
                    <tr><td colspan="2">&nbsp;</td></tr>
                  </table>
              </form></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
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