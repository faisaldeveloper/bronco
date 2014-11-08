<?

	include("../Includes/BackOfficeIncludesFiles.php");
//--------------Checking for right---------------------
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=259;
if($objAdminUser->CheckRightForAdmin()==1)
{
	$nSkinType = TEMPLATE_FORNT;
	$intLangId = $_SESSION['intLangId'];
	if(isset($_POST['lstTemplateID']))
		$nTemplateID = $_POST['lstTemplateID'];	
	else
		$nTemplateID = 0;
	if(isset($_REQUEST['txtName']))
		$strName = $_REQUEST['txtName'];
	if(isset($_REQUEST['txtTableWidth']))
		$nTableWidth = $_REQUEST['txtTableWidth'];
	if(isset($_REQUEST['txtTableBorder']))
		$nTableBorder = $_REQUEST['txtTableBorder'];	
	if(isset($_REQUEST['txtLeftPanWidth']))
		$nLeftPanWidth = $_REQUEST['txtLeftPanWidth'];	
	if(isset($_REQUEST['txtRgtPanWidth']))
		$nRgtPanWidth = $_REQUEST['txtRgtPanWidth'];
	if(isset($_REQUEST['txtHeader']))
		$strHeader = $_REQUEST['txtHeader'];
	if(isset($_REQUEST['txtEmailHeader']))
		$strEmailHeader = $_REQUEST['txtEmailHeader'];
	if(isset($_REQUEST['txtFooter']))
		$strFooter = $_REQUEST['txtFooter'];
		
	if ($nTemplateID > 0)
	{
		$objTheme->m_nLangID=$intLangId;
		$objTheme->m_intID = $nTemplateID;
		$rsTheme = $objTheme->SelectbyID();
		if($rsTheme != FALSE)
		{
			$rowTheme = mysql_fetch_object($rsTheme);
			$nThemeID = $rowTheme->pkThemeID;
			$strName = $rowTheme->ThemeName;
			$nTableWidth = $rowTheme->ExtTabWidth;
			$nTableBorder = $rowTheme->ExtTabBorder;
			$nLeftPanWidth = $rowTheme->LeftPanWidth;
			$nRgtPanWidth = $rowTheme->RgtPanWidth;
			$nMenuOptions = $rowTheme->MenuePosition;
			$nTopMenuStyle = $rowTheme->TopMenuStyle;
			$nLeftMenuStyle = $rowTheme->LeftMenueStyle;
			$strHeader = $rowTheme->Header;
			$strEmailHeader = $rowTheme->EmailHeader;
			$strFooter = $rowTheme->Footer;
			$strMnuBgColor = $rowTheme->MnuBgColor;
			$strMnuMouseOverColor = $rowTheme->MnuMouseOverColor;
			
		}
	}
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?>Add Theme<?=CONST_BACKOFFICE_TITLE_END?></title>
<?php include("Tiny.php"); ?>
<script language="JavaScript" type="text/javascript" src="EditorFiles/richtext.php"></script>
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
	<script src="../Script/JavaScript.js"></script>

<script language="javascript">
	function paletteOpen(fieldName) {
		palette = window.open("","paletteWindow","toolbar=0,location=0,menubar=0,scrollbars=0,resizable=0,width=530,height=100");
		palette.location.href = "setPallet.php?fieldName="+fieldName;
		palette.focus();
	}
	function SetColor(fieldName, hexValue)
	{
		document.forms[0].elements[fieldName].value="#"+hexValue;
	}
function OnChangeSubmit(f)
{
	f.action = "AddTheme.php";
	f.submit();
}
</script>

<script language="javascript"> 
function GetPosition(f)
{
	if(document.frmAdd.rdMenu[0].checked)
	{
		if (document.frmAdd.rdMenu[0].value == <?=CONST_TOP_MENU_POSTION?> )
		{
			 document.getElementById('ABC').innerText = "Menu Types Top Position:";
			 document.getElementById('div1').style.display = 'none';
			 document.getElementById('div2').style.display = '';
			 return true;
		}
	}
	else if(document.frmAdd.rdMenu[1].checked)
	{		
		if (document.frmAdd.rdMenu[1].value == <?=CONST_LEFT_MENU_POSTION?> ) 
		{
			 document.getElementById('ABC').innerText = "Menu Types Left Position:";
			 document.getElementById('div2').style.display = 'none';
			 document.getElementById('div1').style.display = '';
			 return true;		 
		}	 
	}	
	else
	{		
		if (document.frmAdd.rdMenu[1].value == <?=CONST_LEFT_MENU_POSTION?> ) 
		{
			  document.getElementById('ABC').innerText = "Menu Types Top Position:";
			  document.getElementById('div1').style.display = '';
			  document.getElementById('div2').style.display = '';
			 return true;		 
		}	 
	}	

}					
function Validate(f)
{
	if(f.txtTableWidth.value=="" || f.txtTableBorder.value=="" || f.txtLeftPanWidth.value=="" || f.txtRgtPanWidth.value=="" || f.txtName.value=="")
	{
		alert("Please fill information marked with *");
		f.txtName.focus();
		return false;
	}

	if(isNaN(f.txtTableWidth.value))
	{
		alert("Please enter numeric value.");
		f.txtTableWidth.focus();
		return false;
	}
	else if(isNaN(f.txtTableBorder.value))
	{
		alert("Please enter numeric value.");
		f.txtTableBorder.focus();
		return false;
	}
	else if(isNaN(f.txtLeftPanWidth.value))
	{
		alert("Please enter numeric value.");
		f.txtLeftPanWidth.focus();
		return false;
	}
	else if(isNaN(f.txtRgtPanWidth.value))
	{
		alert("Please enter numeric value.");
		f.txtRgtPanWidth.focus();
		return false;
	}
	return true;
} 
</script>
<br>
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
    <td><a href="ManageTheme.php"><span class="txtBld_ornge">Theme Manager</span></a>&nbsp;&gt;&gt;&nbsp;<span class="hdng_sandy">Add Theme</span></td>
  </tr>
	<tr>
	   <td colspan="2" align="center">
		<? include('../Includes/DisplayConfirmMessage.php');?>
	  </td>
	</tr>
  <tr>
    <td>
	<form name="frmAdd" id="frmAdd" method="post" action="AddThemeAction.php" onSubmit="return Validate(this);">
		<table width="99%"  border="0" align="center" cellpadding="1" cellspacing="0" class="TabBorderLightGreyBG">
              
              <tr>
                <td class="txtBld_grn">&nbsp;</td>
                <td class="txtBld_ornge">&nbsp;</td>
              </tr>
              <tr>
                <td class="txtBld_grn">&nbsp;Select Skin:</td>
                <td width="79%" class="txtBld_ornge"><select name="lstTemplateID" id="lstTemplateID" onChange="OnChangeSubmit(frmAdd);">
                    <option value="0">Select template...</option>
                    <?php
					$rsThemeNames = $objTheme->Select();
					if($rsThemeNames != FALSE)
					{
						while($objThemeNames=mysql_fetch_object($rsThemeNames))
						{
						?>
                    <option value="<?php print $objThemeNames->pkThemeID;?>" <?php if($objThemeNames->pkThemeID==$nThemeID) print "selected";?>>
					<?php print $objThemeNames->ThemeName;?></option>
                    <?		
							}						
						}	
						?>
                </select></td>
              </tr>
              <tr>
                <td class="txtBld_grn">&nbsp;Name<span class="txt_red">*</span></td>
                <td ><input name="txtName" type="text" id="txtName" value="<?=$strName?>"></td>
              </tr>
              <tr>
                <td align="left" valign="top">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td colspan="2" align="left" valign="top"><table width="100%"  border="0" cellspacing="0" cellpadding="2">
                  <tr>
                    <td class="hdng_sandy">Table Style</td>
                  </tr>
                  <tr>
                    <td >
                    <table width="100%"  border="0" cellspacing="0" cellpadding="2">
                       <tr>
                      <td width="21%" class="txtBld_grn"> External Table Width <span class="txt_red">*</span> </td>
                      <td width="79%"><input name="txtTableWidth" type="text" id="txtTableWidth" value="<?=$nTableWidth?>">
                        <span class="txtBld_grn">(px)</span></td>
                    </tr>
                    <tr>
                      <td class="txtBld_grn">External Table Border <span class="txt_red">*</span></td>
                      <td><input name="txtTableBorder" type="text" id="txtTableBorder" value="<?=$nTableBorder?>">
                        <span class="txtBld_grn">(px)</span></td>
                    </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td >&nbsp;</td>
                  </tr>
                  <tr>
                    <td class="hdng_sandy">Panel Style: </td>
                  </tr>
                  <tr>
                    <td >
					<table width="100%"  border="0" cellspacing="0" cellpadding="2">
                    <tr>
                      <td width="21%" class="txtBld_grn"> Left Panel Width <span class="txt_red">*</span></td>
                      <td width="79%"><input name="txtLeftPanWidth" type="text" id="txtLeftPanWidth" value="<?=$nLeftPanWidth?>">
                        <span class="txtBld_grn">(px)</span></td>
                    </tr>
                    <tr>
                      <td class="txtBld_grn"> Right Panel Width <span class="txt_red">*</span> </td>
                      <td><input name="txtRgtPanWidth" type="text" id="txtRgtPanWidth" value="<?=$nRgtPanWidth?>">
                        <span class="txtBld_grn">(px)</span></td>
                    </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td class="hdng_sandy">&nbsp;</td>
                  </tr>
                  <tr>
                    <td class="hdng_sandy">Menu Option:</td>
                  </tr>
                  <tr>
                    <td ><table width="100%"  border="0" cellspacing="0" cellpadding="2">
                      <tr class="txtBld_grn">
                        <td width="28%"><input name="rdMenu" id="rdMenu" type="radio" value="<?=CONST_TOP_MENU_POSTION?>" <? if($nMenuOptions==CONST_TOP_MENU_POSTION) echo "checked"; else echo "checked";?> onClick="return GetPosition(this.form);">
      <label for="rdMenu">Top Menu</label></td>
                        <td width="32%"><input name="rdMenu" id="rdMenu1" type="radio" value="<?=CONST_LEFT_MENU_POSTION?>" onClick="return GetPosition(this.form);"<? if($nMenuOptions==CONST_LEFT_MENU_POSTION) echo "checked";?>>
      <label for="rdMenu1">Left Menu</label></td>
                        <td width="40%"><input name="rdMenu" id="rdMenu2" type="radio" value="<?=CONST_BOTH_MENU_POSTION?>" onClick="return GetPosition(this.form);"<? if($nMenuOptions==CONST_BOTH_MENU_POSTION) echo "checked";?>>
      <label for="rdMenu2">Both Menu</label></td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td class="hdng_sandy">&nbsp;</td>
                  </tr>
                  <tr>
                    <td>
					<div id="div2" >
					<table width="100%"  border="0" cellspacing="0" cellpadding="2">
                      <tr>
                        <td class="hdng_sandy" id="ABC">Menu Types Top Position:</td>
                      </tr>
                      <tr>
                        <td>
                        <table width="100%"  border="0" cellspacing="0" cellpadding="2">
                          <tr class="txtBld_grn">
                        
                            <td width="60%" class=""><input name="rdTypeTop" type="radio" id="rdTypeTop" value="<?=CONST_DROPDOWN_MENU_TYPE?>"<? if($nTopMenuStyle==CONST_DROPDOWN_MENU_TYPE) echo "checked"; else echo "checked";?>>
      <label for="rdTypeTop">Drop Down</label></td>
                            <td width="40%"><input name="rdTypeTop" type="radio" id="rdTypeTop1" value="<?=CONST_TOPD1_MENU_TYPE?>" <? if($nTopMenuStyle==CONST_TOPD1_MENU_TYPE) echo "checked";?>><label for="rdTypeTop1">TOPD1</label></td>
                          </tr>
                          <tr class="txtBld_grn">
                        
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>
                        </table></td>
                      </tr>
                    </table>
					</div></td>
                  </tr>
                </table></td>
                </tr>
              <tr>
                <td align="left" valign="top" >&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td colspan="2" align="left" valign="top">
				<div id="div1" <? if($nMenuOptions != CONST_BOTH_MENU_POSTION) { ?> style="display:none" <? }?>>
				<table width="100%"  border="0" cellspacing="0" cellpadding="2">
                  <tr>
                    <td><span class="hdng_sandy">Menu Types Left Position:</span></td>
                  </tr>
                  <tr>
                    <td>
                      <table width="100%"  border="0" cellspacing="0" cellpadding="2">
                        <tr class="txtBld_grn">
                          <td width="28%"><input name="rdTypeLeft" type="radio" id="rdTypeLeft" value="<?=CONST_COLLAPSE_MENU_TYPE?>" <? if($nLeftMenuStyle==CONST_COLLAPSE_MENU_TYPE) echo "checked"; else echo "checked";?>><label for="rdTypeLeft">Collapse</label></td>
                          <td width="32%"><input name="rdTypeLeft" type="radio" id="rdTypeLeft1" value="<?=CONST_RIGHTPOPUP_MENU_TYPE?>" <? if($nLeftMenuStyle==CONST_RIGHTPOPUP_MENU_TYPE) echo "checked";?>><label for="rdTypeLeft1">Right Popup</label></td>
                          <td width="40%"><input name="rdTypeLeft" type="radio" id="rdTypeLeft2" value="<?=CONST_DDOPEN_MENU_TYPE?>" <? if($nLeftMenuStyle==CONST_DDOPEN_MENU_TYPE) echo "checked";?>><label for="rdTypeLeft2">DD Open</label></td>
                          
                        </tr>
                        <tr class="txtBld_grn">
                          <td colspan="2">&nbsp;</td>
                       
                          <td>&nbsp;</td>
                        </tr>
                      </table>
                      </td>
                  </tr>
                </table>
				</div>				</td>
              </tr>
    <? // if ($nTempType==TEMPLATE_FORNT)	
		 { ?>
              <tr>
                <td colspan="2" align="left" valign="top" class="hdng_sandy">Header And Footer Information:</td>
              </tr>
              <tr>
                <td colspan="2" align="left" valign="top" class="hdng_sandy">&nbsp;</td>
              </tr>
			  <tr>
                <td colspan="2" align="left" valign="top"><table width="100%"  border="0" cellspacing="0" cellpadding="2">
                  <tr>
                    <td width="21%" align="left" valign="top"><span class="txtBld_grn">Header:</span></td>
                    <td width="79%"><textarea name="txtHeader" id="txtHeader" cols="50" rows="30"><?=$strHeader?></textarea>
                        </td>
                  </tr>
				   
                  <tr>
                    <td align="left" valign="top">&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="left" valign="top"><span class="txtBld_grn">Footer:</span></td>
                    <td><textarea name="txtFooter" id="txtFooter" cols="50" rows="30"><?=$strFooter?></textarea>
                        </td>
                  </tr>
				  <tr>
                    <td align="left" valign="top">&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
				  <tr>
                    <td width="21%" align="left" valign="top"><span class="txtBld_grn">Email Header:</span></td>
                    <td width="79%">
					<textarea name="txtEmailHeader" id="txtEmailHeader" cols="50" rows="30">
						<?=$strEmailHeader?>
					</textarea>
                        </td>
                  </tr>
                </table></td>
                </tr>
        <? } ?>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
			  <tr>
				<td>&nbsp;</td>
				<td><input name="Submit" type="submit" class="button" value="Add"></td>
			  </tr>
			  <tr>
			    <td>&nbsp;</td>
			    <td>&nbsp;</td>
			  </tr>
			</table>
			</form>
			</td>
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