<?PHP
require_once("../Includes/BackOfficeIncludesFiles.php");
//--------------Checking for right---------------------
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=206;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{
	//////////////Checking for Values///////////////////
	if(!isset($_REQUEST['hdnPageId']))
	{
		header("location:ManagePages.php?intMessage=351");
		exit;
	}
	///////////Creating Objects of Classes/////////////
	$objPages = new clsPages();
	$objLang  = new clsLanguage();
	////////////////Initializing Variables//////////////
	$nLangId = $_SESSION['intLangId'];
	$intPageId = "";
	$nParentId = "";
	$strSearch = "";
	$nPage = "";
	/////////Getting values from the query string///////
	if(isset($_REQUEST['hdnPageId']))
		$intPageId = $_REQUEST['hdnPageId'];
	if(isset($_SESSION['intLangId']))
		$intLangId = $_SESSION['intLangId'];
	if(isset($_REQUEST['hdnParentId']))
		$nParentId = $_REQUEST['hdnParentId'];
	if(isset($_REQUEST['hdnPage']))
		$intPage = $_REQUEST['hdnPage'];
	if(isset($_REQUEST['hdnSearch']))
		$strSearch = $_REQUEST['hdnSearch'];
	///////////Transfering values to class variables/////////	
	$objPages->m_intPageId = $intPageId;
	$objPages->m_intLangId = $intLangId;
	$objPages->m_intParentId = $nParentId;
	$arrPage = $objPages->GetPageDetail();
	$arrRecPage = mysql_fetch_object($arrPage);
	$strPageName = stripcslashes($arrRecPage->PageName);
	$strPageTitle = stripcslashes($arrRecPage->PageTitle);
	$strMetatagsDesc  = stripcslashes($arrRecPage->MetatagsDesc);
	$strMetatagsKW  = stripcslashes($arrRecPage->MetatagsKW);
	$strContents = stripcslashes($arrRecPage->PageContents);
	$intShowMenu = stripcslashes($arrRecPage->ShowMenu);
	$intPageRank = $arrRecPage->PageRank;
	$intShowInTopMenu = $arrRecPage->ShowInTopMenu;
	$intShowInLeftMenu = $arrRecPage->ShowInLeftMenu;
	$intShowInFooter = $arrRecPage->ShowInFooter;
	///////////////////////////////////////
	if(isset($_REQUEST['txtPageName'])) 
		$strPageName = $_REQUEST['txtPageName'];
	if(isset($_REQUEST['txtPageTitle'])) 
		$strPageTitle = $_REQUEST['txtPageTitle'];
	if(isset($_REQUEST['lstRank'])) 
		$intPageRank = $_REQUEST['lstRank'];
}//End Right If
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?>Edit Pages<?=CONST_BACKOFFICE_TITLE_END?></title>
<?php include("Tiny.php"); ?>
<script language="JavaScript" type="text/javascript" src="EditorFiles/richtext.php"></script>
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
			function submitForm(f) {
				if(f.txtPageName.value == "")
				{
					alert("Please fill page name");
					f.txtPageName.focus();
					return false;
				}
			
				else if(f.txtPageTitle.value == "")
				{
					alert("Please fill page title");
					f.txtPageTitle.focus();
					return false;
				}
				else if (f.lstRank.value==0)
				{
					alert("Please fill page rank");
					f.lstRank.focus();
					return false;
				}
				else
				{
					return true;
				}
			}
			</script>
            <br>
		  <table width="99%" border="0" cellspacing="0" cellpadding="2" align="center">
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
              <td><? if ($nParentId==0){?><a href="ManagePages.php"><span class="txtBld_ornge">Page Manager</span></a>&nbsp;&gt;&gt;&nbsp;<span class="hdng_sandy">Edit Page info</span><? } else {?><a href="ManagePages.php"><span class="txtBld_ornge">Page Manager</span></a>&nbsp;&gt;&gt;&nbsp;<a href="ManagePages.php?hdnParentId=<?=$nParentId?>"><span class="txtBld_ornge">SubPages</span></a>&nbsp;&gt;&gt;&nbsp;<span class="hdng_sandy">Edit SubPage Info</span><? }?></td> 
			  </tr>
			<tr>
                <td class="txtBld_grn" colspan="3" align="center"><? include('../Includes/DisplayConfirmMessage.php');?>&nbsp;</td>
            </tr>
            <tr>
              <td><form action="EditPageAction.php" method="post" enctype="multipart/form-data" name="form1" onSubmit="return submitForm(this)">
                  <table width="99%"  border="0" cellspacing="2" cellpadding="2" class="TabBorderLightGreyBG">
                <tr>
						<td height="6" colspan="3"></td>
                    </tr>
                    <tr>
                      <td width="34%" class="txtBld_grn">Page Name<span class="txt_red">*</span></td>
                      <td colspan="2"><input name="txtPageName" type="text" id="txtPageName" value="<?=$strPageName?>"></td>
                    </tr>
                    <tr>
                      <td class="txtBld_grn"> Page Title<span class="txt_red">*</span></td>
                      <td colspan="2"><input name="txtPageTitle" type="text" id="txtPageTitle" value="<?=$strPageTitle?>"></td>
                     
                    </tr>
                    <tr>
                      <td><span class="txtBld_grn">Show page link in </span> </td>
                      <td class="txtBld_grn" colspan="2"><input name="chkShowTopMenu" type="checkbox" id="chkShowTopMenu" value="1" <? if ($intShowInTopMenu == 1) print "checked"; ?>>
						<label for="chkShowTopMenu">Top Menu</label>
						  <input name="chkShowLeftMenu" type="checkbox" id="chkShowLeftMenu" value="1" <? if ($intShowInLeftMenu == 1) print "checked"; ?>>
                        <label for="chkShowLeftMenu">Left Menu</label>
						<input name="chkShowFooter" type="checkbox" id="chkShowFooter" value="1" <? if ($intShowInFooter == 1) print "checked"; ?>>
                        <label for="chkShowFooter">Footer</label>
						</td>
                    </tr>
                    <tr>
                      <td class="txtBld_grn">Page Rank<span class="txt_red">*</span></td>
                      <td align="left" colspan="2">
					  	<? 
					  	$rsSelect=$objPages->GetAllRanks($intPageId);
					  	$nMaxRank=$objPages->GetLastPageRank();
					  	$i=1;
						if($rsSelect)
						while($row=mysql_fetch_array($rsSelect))
				  	  		$arrtemp[$i]=$row["PageRank"];$i++;
						?>
					  	<select name="lstRank">
							<?
							for($i=1;$i<=$nMaxRank+10;$i++)
							if(!array_search($i,$arrtemp))
							{
							?>
								<option value="<?=$i?>" <? if($intPageRank==$i) print "selected";?>><?=$i?></option>
							<? 
							}
							?>
						</select>
					  </td>
					  </tr>
<?php /*?>
                      <tr>
                      <td class="txtBld_grn">Select Layout </td>
					  <td colspan="2">
					  <a href="#" onClick="return addPageLayout('txtPageContents')">Select Layout</a>
					  </td>
                    </tr>
<?php */?>                    
                      <tr>
                        <td colspan="3">&nbsp;</td>
                      </tr>
                      <tr>
                      <td colspan="3"><span class="hdng_sandy">Search Engine Optimization</span></td>
                    </tr>
                    <tr>
                      <td class="txtBld_grn">Meta Tags Desc</td>
                      <td colspan="2"><input name="txtMetatagDesc" type="text" id="txtMetatagDesc" value="<?=$strMetatagsDesc?>" size="50"></td>
                    
                    </tr>
                    <tr>
                      <td class="txtBld_grn">Meta Tags Keywords</td>
                      <td colspan="2"><input name="txtMetaTagKW" type="text" id="txtMetaTagKW" value="<?=$strMetatagsKW?>" size="50"></td>
                    
                    </tr>
                    <tr>
                      <td valign="top" class="txtBld_grn">Page Contents </td>
                      <td colspan="2" valign="top"><textarea name="txtPageContents" id="txtPageContents" cols="50" rows="30"><?=$strContents?></textarea></td>
                      </tr>
                    <tr>
                      <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td width="21%">
					  	<input type="hidden" name="hdnPageId" value="<?=$intPageId?>">
                        <input type="hidden" name="hdnParentId" value="<?=$nParentId?>">
						<input name="hdnSearch" type="hidden" id="hdnSearch" value="<?=$strSearch?>">
                        <input name="hdnPage" type="hidden" id="hdnPage" value="<?=$intPage?>">
						<input name="btnEdit" type="submit" class="button" value="Update"></td>
                      <td width="44%">&nbsp;</td>
                    </tr>
                    <tr><td>&nbsp;</td></tr>
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