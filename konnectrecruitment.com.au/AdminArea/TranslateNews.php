<?php
include("../Includes/BackOfficeIncludesFiles.php");
//--------------Checking for right---------------------
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=52;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{
	/**
	Creating objects of the class
	**/
	$objNews  = new clsNews();
	$objLang  = new clsLanguage();
	/**
	Initializing Variables
	**/
	$intNewsId="";
	$intLangId = $_SESSION['intLangId'];
	if(isset($_REQUEST['NewsId']))
		$intNewsId = $_REQUEST['NewsId'];
	$objNews->m_intNewsId = $intNewsId;
	if(isset($_REQUEST['intLangId']))
		$intLangId = $_REQUEST['intLangId'];
	$objNews->m_intLangId = $intLangId;
	/**
	call class functions
	**/
	$arrNews = $objNews->GetNewsById();
	$arrNewsImgInfo = $objNews->getNewsImgInfo();
	if(!empty($arrNews))
	{
		$arrRecNews = mysql_fetch_object($arrNews);
	}
	/**
	Taking default Language values
	**/
	$arrLang = $objLang->GetLanguages();
	$nDefaultLang=$objLang->GetDefaultLangId();
	$objNews->m_intLangId = $nDefaultLang;
	$rsSql = $objNews->GetNewsByLangId();
	if($rsSql != false)
	{
		$row = mysql_fetch_object($rsSql);
		$strDefTitle = $row->NewsTitle;
		$strDefSDesc = $row->ShortDesc;
		$strDefLDesc = $row->LongDesc;
	}
	/////////////////////////////////////////////////
	if($arrNewsImgInfo!=NULL && $arrRecNewsImgInfo!=FALSE)
	$arrRecNewsImgInfo = mysql_fetch_object($arrNewsImgInfo);
	$intEventId = $arrRecNews->fkEventId;
	$intLangId = $arrRecNews->fkLangID;
	$strNewsTitle = $arrRecNews->NewsTitle;
	$strShortDesc  = $arrRecNews->ShortDesc;
	$strContents = $arrRecNews->LongDesc;
	//////////////////////////////////////////////
	if(isset($_REQUEST['txtNewsTitle'])) 
		$strNewsTitle = $_REQUEST['txtNewsTitle'];
	if(isset($_REQUEST['txrShortDesc'])) 
		$strShortDesc = $_REQUEST['txrShortDesc'];
	
	$intModuleID=$_REQUEST['hdnModuleId'];
	
	$strGalleryName = $objNews->GetGalleryName($intModuleID);
	$strGalleryNewsTitle = $objNews->GetGalleryNewsName($intModuleID);

}//End Right If
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
	function Validate(f)
	{
		if(f.txtNewsTitle.value=="")
		{
			alert("Please enter title");
			f.txtNewsTitle.focus();
			return false;
		}
		if(f.txrShortDesc.value=="")
		{
			alert("Please enter short description");
			f.txrShortDesc.focus();
			return false;
		}
	f.submit(); //submitForm();
	return true;
	}
/*	function ChangeLanguage()
	{//This function is activated when the language is changed.
		var a=window.document.TranslateNews.lstLang.value;
		window.document.TranslateNews.hdnLangId.value=a;
		var f=window.document.TranslateNews;
		var a=f.lstLang.value;
		if(document.getElementById("hdnlist_"+a))
			f.txtNewsTitle.value=document.getElementById("hdnlist_"+a).value;
		else 
			f.txtNewsTitle.value="";
		if(document.getElementById("hdnlist2_"+a))
			f.txrShortDesc.value=document.getElementById("hdnlist2_"+a).value;
		else 
			f.txrShortDesc.value="";
		if(document.getElementById("hdnlist3_"+a))
			var strContents=document.getElementById("hdnlist3_"+a).value;
		else 
			var strContents="";
			var strWYSWIGName="txtHeader";
			populateWYSWIG(strWYSWIGName,strContents)
	}
	/*function populateWYSWIG(strWYSWIGName,strContents)
	{
		if(window.frames && window.frames[strWYSWIGName]) //IE 5 (Win/Mac), Konqueror, Safari
		  cWindow = window.frames[strWYSWIGName];
		else if(window.document.getElementById(strWYSWIGName).contentWindow) //IE 5.5+, Mozilla 0.9+, Opera
		  cWindow = window.document.getElementById(strWYSWIGName).contentWindow;
		else //Moz < 0.9 (Netscape 6.0)
		  cWindow = window.document.getElementById(strWYSWIGName);
		cDocument = cWindow.document;
		cDocument.open();
		cDocument.write(strContents);
		cDocument.close();
	}*/
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
          <table width="100%"  border="0" align="center" cellpadding="2" cellspacing="0">
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
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><a href="ManageNews.php?hdnModuleId=<?=$intModuleID?>"><span class="txtBld_ornge">News Manager</span></a>&nbsp;&gt;&gt;&nbsp;<span class="hdng_sandy">Translate News (<?=$strGalleryName?> -&gt; <?=$strGalleryNewsTitle?>)</span></td>
              </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><form action="TranslateNewsAction.php" method="post" enctype="multipart/form-data" name="TranslateNews" onSubmit="return Validate(this)">
                  <table width="99%"  border="0" align="center" cellpadding="0" cellspacing="2" class="TabBorderLightGreyBG">
                    <tr>
                      <td align="center" class="txtBld_grn" colspan="3"><? include('../Includes/DisplayConfirmMessage.php');?>&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="20%" align="left" class="txtBld_grn">Select Language </td>
                      <td><select name="lstLang" id="select" >
                      <?php //onChange="ChangeLanguage()"
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
					  <input name="hdnLangId" type="hidden" id="hdnLangId" value="<?=$nCurrLang?>">
                      </td>
                    </tr>
					<?
					$rsSql=$objNews->SelectNewsById();
						if($rsSql != NULL)
						while($row=mysql_fetch_object($rsSql))
							{?>
							 <input type="hidden" id="hdnlist_<?=$row->fkLangID?>" value="<?=$row->NewsTitle?>">
							 <input type="hidden" id="hdnlist2_<?=$row->fkLangID?>" value="<? //$row->ShortDesc?>">
							 <input type="hidden" id="hdnlist3_<?=$row->fkLangID?>" value="<? //$row->LongDesc?>">
							<?
							}
							$rsSql = $objNews->SelectNewsByIdAndLang($nCurrLang);
							if($rsSql != NULL)
							$row=mysql_fetch_object($rsSql);
							///////////////If the values are back from server validation/////////////
							if(isset($_REQUEST['txtNewsTitle'])) 
								$strNewsTitle = $_REQUEST['txtNewsTitle'];
							else 
								$strNewsTitle = $row->NewsTitle;
							if(isset($_REQUEST['txrShortDesc'])) 
								$strShortDesc = $_REQUEST['txrShortDesc'];
							else
								$strShortDesc = $row->ShortDesc;
							?>
                            <tr>
                              <td align="left" class="txtBld_grn">&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td align="left" class="txtBld_grn">Title Original</td>
                              <td><?=$strDefTitle?></td>
                            </tr>
                      <tr>
                      <td align="left" class="txtBld_grn">Title<span class="txt_red">*</span></td>
                      <td width="372"><input name="txtNewsTitle" type="text" id="txtNewsTitle" value="<?=$strNewsTitle?>" size="40"></td>
                    </tr>
                      <tr>
                        <td align="left" class="txtBld_grn">&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="left" class="txtBld_grn">Short Description Original</td>
                        <td>
                      	<table width="100%">
                        	<tr>
                            	<td><?=$strDefSDesc?></td>
                            </tr>
                        </table>						</td>
                      </tr>
                      <tr>
                      <td align="left" class="txtBld_grn">Short Description</td>
                      <td><textarea name="txrShortDesc" cols="40" rows="7" id="txrShortDesc"><?=$strShortDesc?></textarea></td>
                    </tr>
                      <tr>
                        <td align="left" class="txtBld_grn">&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="left" class="txtBld_grn">Long Description Original</td>
                        <td>
                      	<table width="100%">
                        	<tr>
                            	<td><textarea name="report123" id="report123" cols="50" rows="30"><?=$strDefLDesc?></textarea></td>
                            </tr>
                        </table>
                        </td>
                      </tr>
                      <tr>
                        <td align="left" valign="top" class="txtBld_grn">&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                      <td align="left" valign="top" class="txtBld_grn">Long Description</td>
                      <td><textarea name="report" id="report" cols="50" rows="30"><?=$strContents?></textarea>
					  <script>//ChangeLanguage();</script>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="left">&nbsp;</td>
                      <td align="left"><input name="Submit" type="submit" class="button" value="Save">
                        <input type="hidden" name="hdnNewsId" value="<?=$intNewsId?>">
                        <input type="hidden" name="hdnModuleId" value="<?=$intModuleID?>"></td>
                    </tr>
					<tr><td height="6"></td></tr>                    
                  </table>
              </form></td>
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