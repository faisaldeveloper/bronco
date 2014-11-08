<?php
include("../Includes/BackOfficeIncludesFiles.php");
//--------------Checking for right---------------------
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=258;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{
	//////////// Validation //////////////////////
	if(!isset($_REQUEST['hdnThemeID']))
	{
		header('location:ManageTheme.php');
		exit;
	}
	//////////// Initialization //////////////////////
	$objTheme = new clsTheme();
	$objLang  = new clsLanguage();
	$strHeader = '';
	$strFooter = '';
	$strSelHeader='';
	$strSelFooter='';
	//////////// Getting Values //////////////////////
	$objTheme->m_intID = $_REQUEST['hdnThemeID'];
	$objTheme->m_nLangID = $_SESSION['intLangId'];
	
	$rsTheme = $objTheme->SelectbyID();
	if($rsTheme != FALSE)
	{
		$rowTheme = mysql_fetch_object($rsTheme);
		$strName = $rowTheme->ThemeName;
		$strHeader = $rowTheme->Header;
		$strFooter = $rowTheme->Footer;
	}
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
		if(f.lstLangId.value=="")
		{
			alert("Please select language");
			f.lstLangId.focus();
			return false;
		}
		if(f.txtHeader.value=="")
		{
			alert("Please enter header");
			return false;
		}
		if(f.txtFooter.value=="")
		{
			alert("Please enter footer");
			return false;
		}
		return true;
	}
	function ChangeLanguage()
	{//This function is activated when the language is changed.
		var f=window.document.TranslateTheme;
		var a=f.lstLangId.value;
		//alert('here>>>>'+f);
		strHeader='';
		strFooter='';
		if(document.getElementById("hdnlist_"+a))
			strHeader=document.getElementById("hdnlist_"+a).value;
		if(document.getElementById("hdnlist2_"+a))
			strFooter=document.getElementById("hdnlist2_"+a).value;
		populateWYSWIG('txtHeader',strHeader)
		//alert('here');
		populateWYSWIG('txtFooter',strFooter)
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
	<!-- InstanceBeginEditable name="body" --><br>
          <table width="99%"  border="0" align="center" cellpadding="2" cellspacing="0">
		  <?
		  if($objAdminUser->CheckRightForAdmin()!=1)//Start Right If
			{
			?>
            <tr>
              <td class="txtBld_ornge">You are not authorised to view this page. <a href="<?=$_SERVER['HTTP_REFERER']?>">&gt;&gt;&nbsp;Back </a></td>
            </tr>
			<?
			}
			else {
			?>
            <tr>
    <td><a href="ManageTheme.php"><span class="txtBld_ornge">Theme Manager</span></a>&nbsp;&gt;&gt;&nbsp;<span class="hdng_sandy">Translate Theme</span></td>
              </tr>
            <tr>
              <td>&nbsp;</td>
            </tr> 
            <tr>
              <td><form action="TranslateThemeAction.php" method="post" enctype="multipart/form-data" name="TranslateTheme" onSubmit="return Validate(this)">
                  <table width="99%"  border="0" align="center" cellpadding="0" cellspacing="2" class="TabBorderLightGreyBG">
                    <tr>
                      <td align="left" class="txtBld_grn">&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="20%" align="left" class="txtBld_grn">Select Language </td>
                      <td><select name="lstLangId" id="select" onChange="ChangeLanguage()">
                      <?php 
						$arrLang = $objLang->GetLanguages();
						$nDefaultLang=$objLang->GetDefaultLangId();
						$nCounter=1;
						if($arrLang != FALSE)
						while($arrRecLang = mysql_fetch_object($arrLang))
						{
							if($arrRecLang->pkLangId != $nDefaultLang)
							{
								if($nCounter==1)
									$nSelLang=$arrRecLang->pkLangId;
						?>
								<option value="<?=$arrRecLang->pkLangId?>" <? if($nCounter==1) echo "selected";?>>
									<?=$arrRecLang->LangDesc?>
								</option>
						<?php
								$nCounter++;
							}
						}
						?>
                    </select>					  </td>
                    </tr>
					<?
					$rsSql=$objTheme->GetThemeInNonDefLangs();
					if($rsSql != NULL)
					while($row=mysql_fetch_object($rsSql))
					{
					?>
						 <input type="hidden" id="hdnlist_<?=$row->pkLangId?>" value='<?=$row->Header?>'>
						 <input type="hidden" id="hdnlist2_<?=$row->pkLangId?>" value='<?=$row->Footer?>'>
					<?
						if($nSelLang==$row->pkLangId)
						{
						 	$strSelHeader=$row->Header;
						 	$strSelFooter=$row->Footer;
						}
					}
					?>
					<tr>
					  <td align="left" class="txtBld_grn">&nbsp;</td>
					  <td>&nbsp;</td>
				    </tr>
					<tr>
					  <td align="left" class="txtBld_grn">Header</td>
					  <td><?=$strHeader?></td>
					</tr>
					<tr>
					  <td>&nbsp;</td>
					  <td>&nbsp;</td>
				    </tr>
					<tr>
					  <td>&nbsp;</td>	
                      <td><textarea name="txtHeader" id="txtHeader" cols="50" rows="30"><?=$strHeader?></textarea>
                      <?php 
						//	$strHeader=$strSelHeader;
						//	include('EditorEdit.php');
						?>                        </td>
                    </tr>
					<tr>
					  <td align="left" class="txtBld_grn">&nbsp;</td>
					  <td>&nbsp;</td>
				    </tr>
					<tr>
					  <td align="left" class="txtBld_grn">Footer</td>
					  <td><?=$strFooter?></td>
					</tr>
					<tr>
					  <td>&nbsp;</td>
					  <td>&nbsp;</td>
				    </tr>
					<tr>
					  <td>&nbsp;</td>	
                      <td><textarea name="txtFooter" id="txtFooter" cols="50" rows="30"><?=$strFooter?></textarea>
                      <?php 
							//$strFooter=$strSelFooter;
							//include('EditorEditFooter.php');
						?>                        </td>
                    </tr>
                    <tr>
                      <td colspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="left">&nbsp;</td>
                      <td align="left"><input name="Submit" type="submit" class="button" value="Save">
                        <input type="hidden" name="hdnThemeID" value="<?=$objTheme->m_intID?>"></td>
                    </tr>
                    <tr>
                      <td align="left">&nbsp;</td>
                      <td align="left">&nbsp;</td>
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
