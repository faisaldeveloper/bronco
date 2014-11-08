<?php
require_once("../Includes/BackOfficeIncludesFiles.php");
//--------------Checking for right---------------------
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=23;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{
/////////////////Server Side Validation//////////////////
	
		if(!isset($_REQUEST['hdnParentId']))
		{
			header("location:ManagePages.php");
			exit;
		}
		//////////////////// Initialize variables ////////////////////////
		$nLangId=$_SESSION['intLangId'];
		$nParentId = 0;
		$arrQryStr[] = "";
		$strSearch = "";
		$nPage = "";
		//////////////////Getting Values from query string/////////////////////
		if(isset($_REQUEST['hdnLangId']))
			$nLangId = $_REQUEST['hdnLangId'];
		if(isset($_REQUEST['hdnPageId']))
			$intPageId = $_REQUEST['hdnPageId'];
		if(isset($_REQUEST['hdnParentId'])) 
			$nParentId = $_REQUEST['hdnParentId'];
		if(isset($_REQUEST['hdnSearch'])) 
			$strSearch = $_REQUEST['hdnSearch'];
		if(isset($_REQUEST['hdnPage'])) 
			$nPage = $_REQUEST['hdnPage'];
		////////////////Store the values in the query string////////////////////////
		$arrQryStr[]="hdnParentId=".$nParentId;
		$arrQryStr[]="txtSearch=".$strSearch;
		$arrQryStr[]="lstLanguage=".$nLangId;
		$arrQryStr[]="txtSearch=".$strSearch;
		$arrQryStr[]="intPage=".$nPage;
		$strQryStr=implode('&',$arrQryStr);
}//End Right If
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?>Add New Page<?=CONST_BACKOFFICE_TITLE_END?></title>
<?php include("Tiny.php"); ?>
<script language="JavaScript" type="text/javascript" src="EditorFiles/richtext.php"></script>
<script language="javascript" src="../Script/JavaScript.js"></script>
<script language="javascript">

function submitForm(f) 
{
	if(f.lstLangId.value == 0)
	{
		alert("Please select language");
		f.lstLangId.focus();
		return false;
	}
	else if(f.txtPageName.value == "")
	{
		alert("Please fill page name");
		f.txtPageName.focus();
		return false;
	}

	else if(f.lstPageRank.value == "0")
	{
		alert("Please fill rank name");
		f.lstPageRank.focus();
		return false;
	}

	else if(f.txtPageTitle.value == "")
	{
		alert("Please fill page title");
		f.txtPageTitle.focus();
		return false;
	}
	else
	{
		return true;
	}
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
	      <table width="99%" border="0" cellspacing="0" cellpadding="2" align="center">
		  <?
		  if($objAdminUser->CheckRightForAdmin()!=1) //Start Right If
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
				<td><? if ($nParentId==0){?><a href="ManagePages.php?<?=$strQryStr?>"><span class="txtBld_ornge">Page Manager</span></a>&nbsp;&gt;&gt;&nbsp;<span class="hdng_sandy">Add New Page</span><? } else {?><a href="ManagePages.php?<?=$strQryStr?>"><span class="txtBld_ornge">Page Manager</span></a>&nbsp;&gt;&gt;&nbsp;<a href="ManagePages.php?<?=$strQryStr?>"><span class="txtBld_ornge">SubPages</span></a>&nbsp;&gt;&gt;&nbsp;<span class="hdng_sandy">Add New SubPage</span><? }?></td>
            </tr>
            <tr>
              <td><form action="AddPageAction.php" method="post" enctype="multipart/form-data" name="form1" onSubmit="return submitForm(this);">
                  <table border="0" cellspacing="0" cellpadding="2" width="100%" align="center" class="TabBorderLightGreyBG">
                    <tr>
                      <td class="txtBld_grn" colspan="3" align="center"><? include('../Includes/DisplayConfirmMessage.php');?>&nbsp;</td>
                    </tr>
                    <?php if($MultiLangCheck){?>
                    <tr>
                      <td width="36%" class="txtBld_grn">Select Language </td>
                      <td colspan="2">
                        <select name="lstLangId" id="lstLangId">
                          <option value="0">Select</option>
                          <?php 
						   $arrLang = $objLang->GetLanguages();
						   if($arrLang != FALSE){ 
						   		while($arrRecLang = mysql_fetch_object($arrLang)){
						  ?>
								  <option value="<?=$arrRecLang->pkLangId?>" <?php if($arrRecLang->pkLangId == $_SESSION['intLangId']) echo "selected"?>>
								  	<?=$arrRecLang->LangDesc?>
								  </option>
						  <?php 
						  		}
						  	}
						  ?>
                      </select></td>
                    </tr>
                    <?php }?>
                    <tr>
                      <td class="txtBld_grn">Page Name<span class="txt_red">*</span></td>
                      <td colspan="2"><input name="txtPageName" type="text" id="txtPageName" value="<? if(isset($_REQUEST['txtPageName'])) echo $_REQUEST['txtPageName'];?>"></td>
                    </tr>
                    <tr>
                      <td class="txtBld_grn"> Page Title<span class="txt_red">*</span></td>
                      <td colspan="2"><input name="txtPageTitle" type="text" id="txtPageTitle"  value="<? if(isset($_REQUEST['txtPageTitle'])) echo $_REQUEST['txtPageTitle'];?>"></td>
                    </tr>
                    
                    <tr>
                      <td align="left" class="txtBld_grn">Page Rank<span class="txt_red">*</span></td>
                      <td align="left" colspan="2">
                       <? 
					    $rsSelect=$objPages->GetAllRanks();
					    $nMaxRank=$objPages->GetLastPageRank();
					  	$i=1;
						if($rsSelect && mysql_num_rows($rsSelect))
						while($row=mysql_fetch_array($rsSelect))
						{
							$arrtemp[$i]=$row["PageRank"];$i++;
						}
						?>
						<select name="lstPageRank" id="lstPageRank">
					    <?
						for($i=1;$i<=$nMaxRank+10;$i++)
						if(!array_search($i,$arrtemp))
						{
						?>
							<option value="<?=$i?>"><?=$i?></option>
						<?
						}
						?>
						</select>
                        </td>
                    </tr>
<?php /*?>					<tr>
                      <td class="txtBld_grn">Select Layout</td>
					  <td width="39%"><a href="#" onClick="return addPageLayout('report')">Select Layout</a></td>
					  <td width="24%" id="des">&nbsp;</td>
                    </tr>
<?php */?>
					<tr>
                      <td class="txtBld_grn">Show page link in</td>
                      <td colspan="2" class="txtBld_grn">
					  	<input name="chkShowTopMenu" type="checkbox" id="chkShowTopMenu" value="checkbox">
						<label for="chkShowTopMenu">Top Menu</label>
                        <input name="chkShowLeftMenu" type="checkbox" id="chkShowLeftMenu" value="checkbox">
                        <label for="chkShowLeftMenu">Left Menu</label>
                        <input name="chkShowFooter" type="checkbox" id="chkShowFooter" value="checkbox">
                        <label for="chkShowFooter">Footer</label>
                        </td>
                      </tr>
					  <tr><td colspan="3">&nbsp;</td></tr>
					  <tr>
					  <td colspan="3" class="hdng_sandy">Search Engine Optimization</td>
					  </tr>
					    <tr>
                      <td class="txtBld_grn">Meta Tags Desc</td>
                      <td colspan="2"><input name="txtMetatagDesc" type="text" id="txtMetatagDesc" size="50" maxlength="500"></td>                     
                    </tr>
					    <tr>
					      <td class="txtBld_grn">&nbsp;</td>
					      <td colspan="2"><span class="txt_red">Note: 2-3 Sentence (without Enter)</span></td>
			        </tr>
                    <tr>
                      <td class="txtBld_grn">Meta Tags Keywords</td>
                      <td colspan="2"><input name="txtMetaTagKW" type="text" id="txtMetaTagKW" size="50" maxlength="255"></td>
                    </tr>
					    <tr>
					      <td class="txtBld_grn">&nbsp;</td>
					      <td colspan="2"><span class="txt_red">Note: 255 characters (Seperated by commas)</span></td>
			        </tr>
                    <tr>
                      <td colspan="3" class="txtBld_grn">&nbsp;</td>
                      </tr>
                    <tr>
                      <td valign="top" class="txtBld_grn">Page Contents</td>
                      <td colspan="2" valign="top"><textarea name="report" id="report" cols="50" rows="30"><?=$strContents?></textarea></td>
                    </tr>
                      <tr>
                      <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>
						<input type="hidden" name="hdnParentId" value="<?=$nParentId?>">
						 <input name="Submit" type="submit" class="button" value="Save">
                         </td>
                    </tr>
                    <tr><td>&nbsp;</td></tr>
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