<?
	require_once("../Includes/BackOfficeIncludesFiles.php");
//--------------Checking for right---------------------
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=261;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{
	if(isset($_POST['hdnThemeId']))
		$nThemeId = $_POST['hdnThemeId'];
	if(isset($_POST['hdnStyleId']))
		$nStyleId = $_POST['hdnStyleId'];
	if(isset($_POST['hdnPkId']))
		$nPkId = $_POST['hdnPkId'];
		
	$arrFont = $objTheme->arrFontTypes;
	$arrTxtSize = $objTheme->arrTxtSize;
	$arrWeight = $objTheme->arrWeight;
	$arrVariant = $objTheme->arrVariant;
	$arrCase = $objTheme->arrCase;
	$arrStyle = $objTheme->arrStyle;
	$arrLineHeight = $objTheme->arrLineHeight;
	$arrBGRepeat = $objTheme->arrBGRpeat;
	$arrBGAttachment = $objTheme->arrBGAttachment;
	$arrHorPos = $objTheme->arrHorPos;
	$arrVerPos = $objTheme->arrVerPos;
	$arrBorderStyle = $objTheme->arrBorderStyle;
	$arrBorderWidth = $objTheme->arrBorderWidth;
	$arrUnit = $objTheme->arrUnits;
	$arrTxtDecoration = $objTheme->arrTxtDecoration;
	
	if($nPkId != '' || $nPkId != 0)
	{
		//echo "I am in IF";
		$arrValue = $objTheme->GetStyleArray(NULL, $nPkId);
		//print_r($arrValue);
		//print_r($arrValue);
		if(isset($arrValue['font-family']['Value']))
			$strFontFamily = $arrValue['font-family']['Value'];
		if(isset($arrValue['font-size']['Value']))
			$strSizeValue = $arrValue['font-size']['Value'];
		if(isset($arrValue['font-size']['Unit']))
			$strSizeUnit = 	$arrValue['font-size']['Unit'];
		if(isset($arrValue['font-style']['Value']))
			$strStyleValue = $arrValue['font-style']['Value'];
		if(isset($arrValue['line-height']['Value']))
			$strLineHeightValue = $arrValue['line-height']['Value'];
		if(isset($arrValue['line-height']['Unit']))
			$strLineHeightUnit = $arrValue['line-height']['Unit'];
		if(isset($arrValue['font-weight']['Value']))
			$strFontWeightValue = $arrValue['font-weight']['Value'];
		if(isset($arrValue['font-variant']['Value']))
			$strFontVariantValue = $arrValue['font-variant']['Value'];
		if(isset($arrValue['text-transform']['Value']))
			$strTxtTransformValue = $arrValue['text-transform']['Value'];
		if(isset($arrValue['color']['Value']))
			$strColorValue = $arrValue['color']['Value'];
		if(isset($arrValue['text-decoration']))
			$strTxtDecorationValue = $arrValue['text-decoration'];
		if(isset($arrValue['background-attachment']['Value']))
			$strBGAttachmentValue = $arrValue['background-attachment']['Value'];
		if(isset($arrValue['background-color']['Value']))
			$strBGColorValue = $arrValue['background-color']['Value'];
		if(isset($arrValue['background-image']['Value']))
			$strBGImageValue = $arrValue['background-image']['Value'];
		if(isset($arrValue['background-repeat']['Value']))
			$strBGRepeatValue = $arrValue['background-repeat']['Value'];
		if(isset($arrValue['background-position']['Value']))
			$strBGPositionValue = $arrValue['background-position']['Value'];
		if(isset($arrValue['background-position']['HrValue']))
			$strBGHorPosValue = $arrValue['background-position']['HrValue'];
		if(isset($arrValue['background-position']['VrValue']))
			$strBGVrPosValue = $arrValue['background-position']['VrValue'];
		if(isset($arrValue['background-position']['HrUnit']))
			$strBGHorPosUnit = $arrValue['background-position']['HrUnit'];
		if(isset($arrValue['background-position']['VrUnit']))
			$strBGVrPosUnit = $arrValue['background-position']['VrUnit'];
			
		if(isset($arrValue['border']['Style']))
			$strBorderStyleValue = $arrValue['border']['Style'];
		if(isset($arrValue['border']['Color']))
			$strBorderColorValue = $arrValue['border']['Color'];
		if(isset($arrValue['border']['WidthValue']))
			$strBorderWidthValue = $arrValue['border']['WidthValue'];
		if(isset($arrValue['border']['WidthUnit']))
			$strBorderWidthUnit = $arrValue['border']['WidthUnit'];
		//print $strBorderWidthValue;	exit;
		if(isset($arrValue['border-top']['Style']))
			$strBorderTopStyleValue = $arrValue['border-top']['Style'];
		else
			$strBorderTopStyleValue = $strBorderStyleValue;	
		if(isset($arrValue['border-top']['Color']))
			$strBorderTopColorValue = $arrValue['border-top']['Color'];
		else
			$strBorderTopColorValue = $strBorderColorValue;	
		if(isset($arrValue['border-top']['WidthValue']))
			$strBorderTopWidthValue = $arrValue['border-top']['WidthValue'];
		else
			$strBorderTopWidthValue = $strBorderWidthValue;	
		if(isset($arrValue['border-top']['WidthUnit']))
			$strBorderTopWidthUnit = $arrValue['border-top']['WidthUnit'];
		else
			$strBorderTopWidthUnit = $strBorderWidthUnit;	
		
		if(isset($arrValue['border-right']['Style']))
			$strBorderRightStyleValue = $arrValue['border-right']['Style'];
		if(isset($arrValue['border-right']['Color']))
			$strBorderRightColorValue = $arrValue['border-right']['Color'];
		if(isset($arrValue['border-right']['WidthValue']))
			$strBorderRightWidthValue = $arrValue['border-right']['WidthValue'];
		if(isset($arrValue['border-right']['WidthUnit']))
			$strBorderRightWidthUnit = $arrValue['border-right']['WidthUnit'];
		
		if(isset($arrValue['border-bottom']['Style']))
			$strBorderBottomStyleValue = $arrValue['border-bottom']['Style'];
		if(isset($arrValue['border-bottom']['Color']))
			$strBorderBottomColorValue = $arrValue['border-bottom']['Color'];
		if(isset($arrValue['border-bottom']['WidthValue']))
			$strBorderBottomWidthValue = $arrValue['border-bottom']['WidthValue'];
		if(isset($arrValue['border-bottom']['WidthUnit']))
			$strBorderBottomWidthUnit = $arrValue['border-bottom']['WidthUnit'];
		
		if(isset($arrValue['border-left']['Style']))
			$strBorderLeftStyleValue = $arrValue['border-left']['Style'];
		if(isset($arrValue['border-left']['Color']))
			$strBorderLeftColorValue = $arrValue['border-left']['Color'];
		if(isset($arrValue['border-left']['WidthValue']))
			$strBorderLeftWidthValue = $arrValue['border-left']['WidthValue'];
		if(isset($arrValue['border-left']['WidthUnit']))
			$strBorderLeftWidthUnit = $arrValue['border-left']['WidthUnit'];
	}//end of If For Pk ID Check
}//End Right If
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?>Edit CSS Properties<?=CONST_BACKOFFICE_TITLE_END?></title>
<!-- InstanceEndEditable -->
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<!-- InstanceBeginEditable name="head" -->
	<script src="../Script/JavaScript.js"></script>
	<script>
	var paletteField = "";
	
	function paletteOpen(fieldName) {
		palette = window.open("","paletteWindow","toolbar=0,location=0,menubar=0,scrollbars=0,resizable=0,width=530,height=100");
		palette.location.href = "setPallet.php?fieldName="+fieldName;
		palette.focus();
	}
	function SetColor(fieldName, hexValue)
	{
		//alert(fieldName);
		//alert(document.forms[0].elements[fieldName]);
		document.forms[0].elements[fieldName].value="#"+hexValue;
		//document.getElementsById('tdColor').style.backgroundColor = "#"+hexValue;
	}
	function SetValue(lstControlName, TextName, cmbChange)
	{
		if(cmbChange==1)
		{
			if(document.getElementById(lstControlName).value==0)
			{
				document.getElementById(lstControlName).style.display='none';
				document.getElementById(TextName).style.display='';
				document.getElementById(TextName).focus();
			}	
		}
		else
		{
			if(document.getElementById(TextName).value!='')
			{
				addOption(document.getElementById(lstControlName),document.getElementById(TextName).value,document.getElementById(TextName).value);
				document.getElementById(lstControlName).selectedIndex=(parseInt(document.getElementById(lstControlName).length)-1);
			}
			else
				document.getElementById(lstControlName).selectedIndex=0;	
				document.getElementById(lstControlName).style.display='';
				document.getElementById(TextName).value='';
				document.getElementById(TextName).style.display='none';
		}	
	}
	function SameForAll(chkControl)
	{
		if(chkControl.checked)
			bVal=true;
		else
			bVal=false;
		switch(chkControl.id)
		{
			case "border_style_same":
					document.getElementById("border_style_right").disabled=bVal;
					document.getElementById("border_style_bottom").disabled=bVal;
					document.getElementById("border_style_left").disabled=bVal;
					document.getElementById("border_style_right").selectedIndex='';
					document.getElementById("border_style_bottom").selectedIndex='';
					document.getElementById("border_style_left").selectedIndex='';
			break;	
			case "border_width_same":
					document.getElementById("border_width_right").disabled=bVal;
					document.getElementById("border_width_bottom").disabled=bVal;
					document.getElementById("border_width_left").disabled=bVal;
					document.getElementById("border_width_right_measurement").disabled=bVal;
					document.getElementById("border_width_bottom_measurement").disabled=bVal;
					document.getElementById("border_width_left_measurement").disabled=bVal;
					document.getElementById("border_width_right").selectedIndex='';
					document.getElementById("border_width_bottom").selectedIndex='';
					document.getElementById("border_width_left").selectedIndex='';
			break;	
			case "border_color_same":
					document.getElementById("border_color_right").disabled=bVal;
					document.getElementById("border_color_bottom").disabled=bVal;
					document.getElementById("border_color_left").disabled=bVal;
					document.getElementById("border_color_right").value='';
					document.getElementById("border_color_bottom").value='';
					document.getElementById("border_color_left").value='';
			break;	
		}		
	}
	function UrlBack()
	{
		location.href='ManageStyles.php?hdnThemeId=<?=$nThemeId?>';
	}
	</script>

    <link href="websitebuilder.css" rel="stylesheet" type="text/css">
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
		<form action="CSSPropsAction.php" method="post">
		<DIV>
		<table width="100%">
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
			  <td><a href="ManageTheme.php"><span class="txtBld_ornge">Theme Manager</span></a>&nbsp;&gt;&gt;&nbsp;<a href="ManageStyles.php?hdnThemeId=<?=$nThemeId?>"><span class="txtBld_ornge">Styles</span></a>&nbsp;&gt;&gt;&nbsp;<span class="hdng_sandy">Set Style</span></td>
			</tr>
		</table>
		</DIV>
		<div id="text_panel" class="panel current">
		<table width="99%" border="0" align="center" cellpadding="4" cellspacing="0" class="TabBorderLightGreyBG">
			<tr>
			  <td colspan="4" class="TabHeading">Text</td>
		  </tr>
			<tr>
				<td width="18%"><label for="text_font">font</label></td>
				<td colspan="3" id="tdFont">
					<select id="text_font" name="text_font" class="mceEditableSelect" onchange="SetValue('text_font','txtFont',1);">
						<option value=""></option>
						<? foreach($arrFont as $strFont) { ?>
						<option value="<?=$strFont?>"<? if($strFont==$strFontFamily) echo "selected";?>><?=$strFont?></option>
						<? }//end of Foreach ?>
						<option value="0" style="background-color:#CCCCCC">Value</option>
						<? if($strFontFamily!='' && !in_array($strFontFamily,$arrFont)) { ?>
						<option value="<?=$strFontFamily?>" selected><?=$strFontFamily?></option>
						<? }//end of IF?>
					</select>
					<input type='text'  id='txtFont' size=50  onBlur="SetValue('text_font','txtFont',0);" style="display:none">				</td>
			</tr>
			<tr>
				<td><label for="text_size">size</label></td>
				<td width="24%">
					<table border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td><select id="text_size" name="text_size" class="mceEditableSelect" onchange="SetValue('text_size','txtSize',1);">
									<option value=""></option>
									<? foreach($arrTxtSize as $strSize) { ?>
									<option value="<?=$strSize?>"<? if($strSizeValue==$strSize) echo "selected";?>><?=$strSize?></option>
									<? }//end of Foreach ?>
									<option value="0" style="background-color:#CCCCCC">Value</option>
									<? if($strSizeValue!='' && !in_array($strSizeValue,$arrTxtSize)) { ?>
									<option value="<?=$strSizeValue?>" selected><?=$strSizeValue?></option>
									<? }//end of IF?>
							</select><input type='text'  id='txtSize' size=8 maxlength="8"  onBlur="SetValue('text_size','txtSize',0);" style="display:none"></td>
							<td>&nbsp;<select id="text_size_measurement" name="text_size_measurement">
							<? foreach($arrUnit as $strUnit=>$strValue) { ?>
							<option value="<?=$strValue?>"<? if($strSizeUnit==$strValue) echo "selected";?>><?=$strUnit?></option>
							<? }//end of Foreach ?>
						</select>						</tr>
					</table>				</td>
				<td width="10%"><label for="text_weight">weight</label></td>
				<td width="48%">
					<select id="text_weight" name="text_weight">
						<option value=""></option>
						<? foreach($arrWeight as $strWeight) { ?>
						<option value="<?=$strWeight?>"<? if($strFontWeightValue==$strWeight) echo "selected";?>><?=$strWeight?></option>
						<? }//end of Foreach ?>
					</select>				</td>
			</tr>
			<tr>
				<td><label for="text_style">style</label></td>
				<td>
					<select id="text_style" name="text_style" class="mceEditableSelect" onChange="SetValue('text_style','txtStyle',1);">
						<option value=""></option>
						<? foreach($arrStyle as $strStyle) { ?>
						<option value="<?=$strStyle?>"<? if($strStyleValue==$strStyle) echo "selected";?>><?=$strStyle?></option>
						<? }//end of Foreach ?>
						<option value="0" style="background-color:#CCCCCC">Value</option>
						<? if($strStyleValue!='' && !in_array($strStyleValue,$arrStyle)) { ?>
						<option value="<?=$strStyleValue?>" selected><?=$strStyleValue?></option>
						<? }//end of IF?>
					</select><input type='text'  id='txtStyle' size=30  onBlur="SetValue('text_style','txtStyle',0);" style="display:none">				</td>
				<td><label for="text_variant">variant</label></td>
				<td>
					<select id="text_variant" name="text_variant">
						<option value=""></option>
						<? foreach($arrVariant as $strVariant) { ?>
						<option value="<?=$strVariant?>"<? if($strFontVariantValue==$strVariant) echo "selected";?>><?=$strVariant?></option>
						<? }//end of Foreach ?>
					</select>				</td>
			</tr>
			<tr>
				<td><label for="text_lineheight">line height</label></td>
				<td>
					<table border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td>
								<select id="text_lineheight" name="text_lineheight" class="mceEditableSelect" onChange="SetValue('text_lineheight','txtLnHeight',1);">
									<option value=""></option>
									<? foreach($arrLineHeight as $strLineHeight) { ?>
									<option value="<?=$strLineHeight?>"<? if($strLineHeightValue==$strLineHeight) echo "selected";?>><?=$strLineHeight?></option>
									<? }//end of Foreach ?>
									<option value="0" style="background-color:#CCCCCC">Value</option>
									<? if($strLineHeightValue!='' && !in_array($strLineHeightValue,$arrLineHeight)) { ?>
									<option value="<?=$strLineHeightValue?>" selected><?=$strLineHeightValue?></option>
									<? }//end of IF?>
								</select><input type='text'  id='txtLnHeight' size=20  onBlur="SetValue('text_lineheight','txtLnHeight',0);" style="display:none">							</td>
							<td>&nbsp;<select id="text_lineheight_measurement" name="text_lineheight_measurement">
									  <? foreach($arrUnit as $strUnit1=>$strValue1) { ?>
									  <option value="<?=$strValue1?>"<? if($strLineHeightUnit==$strValue1) echo "selected";?>>
									  <?=$strUnit1?>
									  </option>
									  <? }//end of Foreach ?>
									</select>							</td>
						</tr>
					</table>				</td>
				<td><label for="text_case">case</label></td>
				<td>
					<select id="text_case" name="text_case">
						<option value=""></option>
						<? foreach($arrCase as $strCase) { ?>
						<option value="<?=$strCase?>"<? if($strTxtTransformValue==$strCase) echo "selected";?>><?=$strCase?></option>
						<? }//end of Foreach ?>
					</select>				</td>
			</tr>
			<tr>
				<td><label for="text_color">color</label></td>
				<td colspan="2">
					<table border="0" cellpadding="0" cellspacing="0">
						<tr>
							<td><input type="text" name="txtColor" value="<?=$strColorValue?>"></td>
							<td id="tdColor"><a href="javascript:paletteOpen('txtColor')"><img src="Images/palette.gif" alt="palette" width="21" height="20" border="0"></a></td>
						</tr>
					</table>				</td>
			</tr>
			<tr>
				<td>decoration</td>
				<td colspan="2">
					<table border="0" cellspacing="0" cellpadding="0">
						<? foreach($arrTxtDecoration as $strTxtDecoration) { ?>
						<tr>
							<td width="20"><input name="chkTxtDecoration[]" type="checkbox" class="checkbox" id="chkTxtDecoration<?=$strTxtDecoration?>" value="<?=$strTxtDecoration?>"<? if($strTxtDecorationValue != '') { if(in_array($strTxtDecoration,$strTxtDecorationValue)) echo "checked"; }//end of IF ?> /></td>
							<td width="135"><label for="chkTxtDecoration<?=$strTxtDecoration?>"><?=$strTxtDecoration?></label></td>
						</tr>
						<? }//end of FOreach ?>
					</table>				</td>
			</tr>
		</table>
	</div>
	<br>
	<div id="background_panel" class="panel">
		<table width="99%" border="0" align="center" cellpadding="4" cellspacing="0" class="TabBorderLightGreyBG">
			<tr>
			  <td colspan="2" class="TabHeading">Background</td>
			  </tr>
			<tr>
				<td width="117"><label for="background_color">background color</label></td>
				<td width="585">
					<table border="0" cellpadding="0" cellspacing="0">
						<tr>
							<td><input id="background_color" name="background_color" type="text" value="<?=$strBGColorValue?>" size="9" onchange="updateColor('background_color_pick','background_color');" /></td>
							<td id="background_color_pickcontainer"><a href="javascript:paletteOpen('background_color')"><img src="images/palette.gif" alt="palette" width="21" height="20" border="0"></a></td>
						</tr>
					</table>				</td>
			</tr>
	
			<tr>
				<td><label for="background_image">background image</label></td>
				<td><table border="0" cellspacing="0" cellpadding="0">
					<tr> 
					  <td><input id="background_image" name="background_image" type="text" value="<?=$strBGImageValue?>" /></td> 
					  <td id="background_image_browser">&nbsp;<a href="#" onClick="Javascript:window.open('UploadImageForCSS.php','','width=500,height=500,scrollbars=1');">Select</a></td>
					</tr>
					</table>				</td>
			</tr>
	
			<tr>
				<td><label for="background_repeat">repeat</label></td>
				<td><select id="background_repeat" name="background_repeat" class="mceEditableSelect" onChange="SetValue('background_repeat','txtRepeat',1);">
						<option value=""></option>
						<? foreach($arrBGRepeat as $strRepeat) { ?>
						<option value="<?=$strRepeat?>"<? if($strBGRepeatValue==$strRepeat) echo "selected";?>><?=$strRepeat?></option>
						<? }//end of Foreach ?>
						<option value="0" style="background-color:#CCCCCC">Value</option>
						<? if($strBGRepeatValue!='' && !in_array($strBGRepeatValue,$arrBGRepeat)) { ?>
						<option value="<?=$strBGRepeatValue?>" selected><?=$strBGRepeatValue?></option>
						<? }//end of IF?>
					</select><input type='text'  id='txtRepeat' size=50  onBlur="SetValue('background_repeat','txtRepeat',0);" style="display:none"></td>
			</tr>
	
			<tr>
				<td><label for="background_attachment">attachment</label></td>
				<td><select id="background_attachment" name="background_attachment" class="mceEditableSelect" onChange="SetValue('background_attachment','txtAttachment',1);">
						<option value=""></option>
						<? foreach($arrBGAttachment as $strBGAttach) { ?>
						<option value="<?=$strBGAttach?>"<? if($strBGAttachmentValue==$strBGAttach) echo "selected";?>><?=$strBGAttach?></option>
						<? }//end of Foreach ?>
						<option value="0" style="background-color:#CCCCCC">Value</option>
						<? if($strBGAttachmentValue!='' && !in_array($strBGAttachmentValue,$arrBGAttachment)) { ?>
						<option value="<?=$strBGAttachmentValue?>" selected><?=$strBGAttachmentValue?></option>
						<? }//end of IF?>
					</select><input type='text'  id='txtAttachment' size=50  onBlur="SetValue('background_attachment','txtAttachment',0);" style="display:none"></td>
			</tr>
	
			<tr>
				<td><label for="background_hpos">horizontal position </label></td>
				<td>
					<table border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td><select id="background_hpos" name="background_hpos" class="mceEditableSelect" onChange="SetValue('background_hpos','txtBGHPos',1);">
								<option value=""></option>
								<? foreach($arrHorPos as $strHorPos) { ?>
								<option value="<?=$strHorPos?>"<? if($strBGHorPosValue==$strHorPos) echo "selected";?>><?=$strHorPos?></option>
								<? }//end of Foreach ?>
								<option value="0" style="background-color:#CCCCCC">Value</option>
								<? if($strBGHorPosValue!='' && !in_array($strBGHorPosValue,$arrHorPos)) { ?>
								<option value="<?=$strBGHorPosValue?>" selected><?=$strBGHorPosValue?></option>
								<? }//end of IF?>
							</select><input type='text'  id='txtBGHPos' size=50  onBlur="SetValue('background_hpos','txtBGHPos',0);" style="display:none"></td>
							<td>&nbsp;<select id="background_hpos_measurement" name="background_hpos_measurement">
									  <? foreach($arrUnit as $strUnit1=>$strValue1) { ?>
									  <option value="<?=$strValue1?>"<? if($strBGHorPosUnit==$strValue1) echo "selected";?>>
									  <?=$strUnit1?>
									  </option>
									  <? }//end of Foreach ?>
						</select>						</tr>
					</table>				</td>
			</tr>
	
			<tr>
				<td><label for="background_vpos">vertical position</label></td>
				<td>
					<table border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td><select id="background_vpos" name="background_vpos" class="mceEditableSelect" onChange="SetValue('background_vpos','txtBGVPos',1);">
									<option value=""></option>
									<? foreach($arrVerPos as $strVerPos) { ?>
									<option value="<?=$strVerPos?>"<? if($strBGVrPosValue==$strVerPos) echo "selected";?>><?=$strVerPos?></option>
									<? }//end of Foreach ?>
									<option value="0" style="background-color:#CCCCCC">Value</option>
								<? if($strBGVrPosValue!='' && !in_array($strBGVrPosValue,$arrVerPos)) { ?>
								<option value="<?=$strBGVrPosValue?>" selected><?=$strBGVrPosValue?></option>
								<? }//end of IF?>
							</select><input type='text'  id='txtBGVPos' size=50  onBlur="SetValue('background_vpos','txtBGVPos',0);" style="display:none"></td>
							<td>&nbsp;<select id="background_vpos_measurement" name="background_vpos_measurement">
									  <? foreach($arrUnit as $strUnit1=>$strValue1) { ?>
									  <option value="<?=$strValue1?>"<? if($strBGVrPosUnit==$strValue1) echo "selected";?>>
									  <?=$strUnit1?>
									  </option>
									  <? }//end of Foreach ?>
						</select>						</tr>
					</table>				</td>
			</tr>
		</table>	
	</div>
	<br>
	<div id="div_border">
		<table width="99%" border="0" align="center" cellpadding="4" cellspacing="0" class="TabBorderLightGreyBG">
		<tr>
		  <td colspan="7" class="TabHeading">Border</td>
		  </tr>
		<tr>
			<td width="12%" class="tdelim">&nbsp;</td>
			<td width="3%" class="tdelim delim">&nbsp;</td>
			<td width="26%" class="txtBld_grey">Style</td>
			<td width="3%" class="tdelim delim">&nbsp;</td>
			<td width="28%" class="txtBld_grey">Width</td>
			<td width="3%" class="tdelim delim">&nbsp;</td>
			<td width="25%" class="txtBld_grey">Color</td>
		</tr>
		
		<tr>
			<td>&nbsp;</td>
			<td rowspan="5">&nbsp;</td>
			<td><input name="border_style_same" type="checkbox" class="checkbox" id="border_style_same" onClick="SameForAll(border_style_same);" value="1" <? if(isset($arrValue['border']['Style'])) echo "checked";?>> 
			<label for="border_style_same">Same for All</label></td>
			<td rowspan="5" >&nbsp;</td>
			<td><input name="border_width_same" type="checkbox" class="checkbox" id="border_width_same" onClick="SameForAll(border_width_same);" value="1" <? if(isset($arrValue['border']['WidthValue'])) echo "checked";?>> 
			<label for="border_width_same2">Same for All</label></td>
			<td rowspan="5" >&nbsp;</td>
			<td><input name="border_color_same" type="checkbox" class="checkbox" id="border_color_same" onClick="SameForAll(border_color_same);" value="1"<? if(isset($arrValue['border']['Color'])) echo "checked";?>> 
			<label for="border_color_same3">Same for All</label></td>
		</tr>
		
		<tr>
			<td>Top</td>
			<td><select id="border_style_top" name="border_style_top" class="mceEditableSelect" onChange="SetValue('border_style_top','txtBSTop',1);">
					<option value=""></option>
					<? foreach($arrBorderStyle as $strBStyle) { ?>
					<option value="<?=$strBStyle?>"<? if($strBorderTopStyleValue==$strBStyle) echo "selected";?>><?=$strBStyle?></option>
					<? }//end of Foreach ?>
					<option value="0" style="background-color:#CCCCCC">Value</option>
					<? if($strBorderTopStyleValue!='' && !in_array($strBorderTopStyleValue,$arrBorderStyle)) { ?>
					<option value="<?=$strBorderTopStyleValue?>" selected><?=$strBorderTopStyleValue?></option>
					<? }//end of IF?>
				</select><input type="text" name="txtBSTop" id="txtBSTop" onBlur="SetValue('border_style_top','txtBSTop',0);" style="display:none"></td>
			<td>
				<table border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td><select id="border_width_top" name="border_width_top" class="mceEditableSelect" onChange="SetValue('border_width_top','txtBWTop',1);">
							<option value=""></option>
							<? foreach($arrBorderWidth as $strBWidth) { ?>
							<option value="<?=$strBWidth?>"<? if($strBorderTopWidthValue==$strBWidth) echo "selected";?>><?=$strBWidth?></option>
							<? }//end of Foreach ?>
							<option value="0" style="background-color:#CCCCCC">Value</option>
							<? if($strBorderTopWidthValue!='' && !in_array($strBorderTopWidthValue,$arrBorderWidth)) { ?>
							<option value="<?=$strBorderTopWidthValue?>" selected><?=$strBorderTopWidthValue?></option>
							<? }//end of IF?>
						</select><input type="text" name="txtBWTop" id="txtBWTop" onBlur="SetValue('border_width_top','txtBWTop',0);" style="display:none"></td>
						<td>&nbsp;<select id="border_width_top_measurement" name="border_width_top_measurement">
									  <? foreach($arrUnit as $strUnit1=>$strValue1) { ?>
									  <option value="<?=$strValue1?>"<? if($strBorderTopWidthUnit==$strValue1) echo "selected";?>>
									  <?=$strUnit1?>
									  </option>
									  <? }//end of Foreach ?>
									</select>						</td>		
					</tr>
				</table>			</td>
			<td>
				<table border="0" cellpadding="0" cellspacing="0">
					<tr>
						<td><input id="border_color_top" name="border_color_top" type="text" size="9" value="<?=$strBorderTopColorValue?>"></td>
						<td id="border_color_top_pickcontainer"><a href="javascript:paletteOpen('border_color_top')"><img src="Images/palette.gif" alt="palette" width="21" height="20" border="0"></a></td>
					</tr>
				</table>			</td>
		</tr>
		
		<tr>
			<td>Right</td>
			<td><select id="border_style_right" name="border_style_right" class="mceEditableSelect" <? if(isset($arrValue['border']['Style'])) echo "disabled";?> onChange="SetValue('border_style_right','txtBSRight',1);">
					<option value=""></option>
					<? foreach($arrBorderStyle as $strBStyle) { ?>
					<option value="<?=$strBStyle?>"<? if($strBorderRightStyleValue==$strBStyle) echo "selected";?>><?=$strBStyle?></option>
					<? }//end of Foreach ?>
					<option value="0" style="background-color:#CCCCCC">Value</option>
					<? if($strBorderRightStyleValue!='' && !in_array($strBorderRightStyleValue,$arrBorderStyle)) { ?>
					<option value="<?=$strBorderRightStyleValue?>" selected><?=$strBorderRightStyleValue?></option>
					<? }//end of IF?>
			</select><input type="text" name="txtBSRight" id="txtBSRight" onBlur="SetValue('border_style_right','txtBSRight',0);" style="display:none"></td>
			<td>
				<table border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td><select id="border_width_right" name="border_width_right" class="mceEditableSelect"  <? if(isset($arrValue['border']['WidthValue'])) echo "disabled";?> onChange="SetValue('border_width_right','txtBWRight',1);">
							<option value=""></option>
							<? foreach($arrBorderWidth as $strBWidth) { ?>
							<option value="<?=$strBWidth?>"<? if($strBorderRightWidthValue==$strBWidth) echo "selected";?>><?=$strBWidth?></option>
							<? }//end of Foreach ?>
							<option value="0" style="background-color:#CCCCCC">Value</option>
							<? if($strBorderRightWidthValue!='' && !in_array($strBorderRightWidthValue,$arrBorderWidth)) { ?>
							<option value="<?=$strBorderRightWidthValue?>" selected><?=$strBorderRightWidthValue?></option>
							<? }//end of IF?>
						</select><input type="text" name="txtBWRight" id="txtBWTop" onBlur="SetValue('border_width_right','txtBWRight',0);" style="display:none"></td>
						<td>&nbsp;<select id="border_width_right_measurement" name="border_width_right_measurement"  <? if(isset($arrValue['border']['WidthUnit'])) echo "disabled";?>>
									  <? foreach($arrUnit as $strUnit1=>$strValue1) { ?>
									  <option value="<?=$strValue1?>"<? if($strBorderRightWidthUnit==$strValue1) echo "selected";?>>
									  <?=$strUnit1?>
									  </option>
									  <? }//end of Foreach ?>
									</select>						</td>		
					</tr>
				</table>			</td>
			<td>
				<table border="0" cellpadding="0" cellspacing="0">
					<tr>
						<td><input id="border_color_right" name="border_color_right" type="text" value="<?=$strBorderRightColorValue?>" size="9" onchange="updateColor('border_color_right_pick','border_color_right');"  <? if(isset($arrValue['border']['Color'])) echo "disabled";?>></td>
						<td id="border_color_right_pickcontainer"><a href="javascript:paletteOpen('border_color_right')"><img src="Images/palette.gif" alt="palette" width="21" height="20" border="0"></a></td>
					</tr>
				</table>			</td>
		</tr>
		
		<tr>
			<td>Bottom</td>
			<td><select id="border_style_bottom" name="border_style_bottom" class="mceEditableSelect"  <? if(isset($arrValue['border']['Style'])) echo "disabled";?> onChange="SetValue('border_style_bottom','txtBSBottom',1);">
					<option value=""></option>
					<? foreach($arrBorderStyle as $strBStyle) { ?>
					<option value="<?=$strBStyle?>"<? if($strBorderBottomStyleValue==$strBStyle) echo "selected";?>><?=$strBStyle?></option>
					<? }//end of Foreach ?>
					<option value="0" style="background-color:#CCCCCC">Value</option>
					<? if($strBorderBottomStyleValue!='' && !in_array($strBorderBottomStyleValue,$arrBorderStyle)) { ?>
					<option value="<?=$strBorderBottomStyleValue?>" selected><?=$strBorderBottomStyleValue?></option>
					<? }//end of IF?>
			</select><input type="text" name="txtBSBottom" id="txtBSBottom" onBlur="SetValue('border_style_bottom','txtBSBottom',0);" style="display:none"></td>
			<td>
				<table border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td><select id="border_width_bottom" name="border_width_bottom" class="mceEditableSelect"  <? if(isset($arrValue['border']['WidthValue'])) echo "disabled";?> onChange="SetValue('border_width_bottom','txtBWBottom',1);">							
							<option value=""></option>
							<? foreach($arrBorderWidth as $strBWidth) { ?>
							<option value="<?=$strBWidth?>"<? if($strBorderBottomWidthValue==$strBWidth) echo "selected";?>><?=$strBWidth?></option>
							<? }//end of Foreach ?>
							<option value="0" style="background-color:#CCCCCC">Value</option>
							<? if($strBorderBottomWidthValue!='' && !in_array($strBorderBottomWidthValue,$arrBorderWidth)) { ?>
							<option value="<?=$strBorderBottomWidthValue?>" selected><?=$strBorderBottomWidthValue?></option>
							<? }//end of IF?>
						</select><input type="text" name="txtBWBottom" id="txtBWBottom" onBlur="SetValue('border_width_bottom','txtBWBottom',0);" style="display:none"></td>
						<td>&nbsp;<select id="border_width_bottom_measurement" name="border_width_bottom_measurement"  <? if(isset($arrValue['border']['WidthUnit'])) echo "disabled";?>>
									  <? foreach($arrUnit as $strUnit1=>$strValue1) { ?>
									  <option value="<?=$strValue1?>"<? if($strBorderBottomWidthUnit==$strValue1) echo "selected";?>>
									  <?=$strUnit1?>
									  </option>
									  <? }//end of Foreach ?>
					</select>					</tr>
				</table>			</td>
			<td>
				<table border="0" cellpadding="0" cellspacing="0">
					<tr>
						<td><input id="border_color_bottom" name="border_color_bottom" type="text" value="<?=$strBorderBottomColorValue?>" size="9"   <? if(isset($arrValue['border']['Color'])) echo "disabled";?>></td>
						<td id="border_color_bottom_pickcontainer"><a href="javascript:paletteOpen('border_color_bottom')"><img src="Images/palette.gif" alt="palette" width="21" height="20" border="0"></a></td>
					</tr>
				</table>			</td>
		</tr>
		
		<tr>
			<td>Left</td>
			<td><select id="border_style_left" name="border_style_left" class="mceEditableSelect"  <? if(isset($arrValue['border']['Style'])) echo "disabled";?> onChange="SetValue('border_style_left','txtBSLeft',1);">
					<option value=""></option>
					<? foreach($arrBorderStyle as $strBStyle) { ?>
					<option value="<?=$strBStyle?>"<? if($strBorderLeftStyleValue==$strBStyle) echo "selected";?>><?=$strBStyle?></option>
					<? }//end of Foreach ?>
					<option value="0" style="background-color:#CCCCCC">Value</option>
					<? if($strBorderLeftStyleValue!='' && !in_array($strBorderLeftStyleValue,$arrBorderStyle)) { ?>
					<option value="<?=$strBorderLeftStyleValue?>" selected><?=$strBorderLeftStyleValue?></option>
					<? }//end of IF?>
			</select><input type="text" name="txtBSLeft" id="txtBSLeft" onBlur="SetValue('border_style_left','txtBSLeft',0);" style="display:none"></td>
			<td>
				<table border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td><select id="border_width_left" name="border_width_left" class="mceEditableSelect"  <? if(isset($arrValue['border']['WidthValue'])) echo "disabled";?> onChange="SetValue('border_width_left','txtBWLeft',1);">					
							<option value=""></option>
							<? foreach($arrBorderWidth as $strBWidth) { ?>
							<option value="<?=$strBWidth?>"<? if($strBorderLeftWidthValue==$strBWidth) echo "selected";?>><?=$strBWidth?></option>
							<? }//end of Foreach ?>
							<option value="0" style="background-color:#CCCCCC">Value</option>
							<? if($strBorderLeftWidthValue!='' && !in_array($strBorderLeftWidthValue,$arrBorderWidth)) { ?>
							<option value="<?=$strBorderLeftWidthValue?>" selected><?=$strBorderLeftWidthValue?></option>
							<? }//end of IF?>
						</select><input type="text" name="txtBWLeft" id="txtBWLeft" onBlur="SetValue('border_width_left','txtBWLeft',0);" style="display:none"></td>
						<td>&nbsp;<select id="border_width_left_measurement" name="border_width_left_measurement"  <? if(isset($arrValue['border']['WidthUnit'])) echo "disabled";?>>
									  <? foreach($arrUnit as $strUnit1=>$strValue1) { ?>
									  <option value="<?=$strValue1?>"<? if($strBorderLeftWidthUnit==$strValue1) echo "selected";?>>
									  <?=$strUnit1?>
									  </option>
									  <? }//end of Foreach ?>
									</select>						</td>		
					</tr>
				</table>			</td>
			<td>
				<table border="0" cellpadding="0" cellspacing="0">
					<tr>
						<td><input id="border_color_left" name="border_color_left" type="text" value="<?=$strBorderLeftColorValue?>" size="9"   <? if(isset($arrValue['border']['Color'])) echo "disabled";?> /></td>
						<td id="border_color_left_pickcontainer"><a href="javascript:paletteOpen('border_color_left')"><img src="Images/palette.gif" alt="palette" width="21" height="20" border="0"></a></td>
					</tr>
				</table>			</td>
		</tr>
		</table>	
	</div>
	<br>
	<div id="divBtn">
		<table width="99%" border="0" align="center" cellpadding="4" cellspacing="0" class="TabBorderLightGreyBG">

<tr><td width="10%">
					<input type="submit" id="apply" name="apply" value="Apply" class="button">
					<input name="hdnPkId" type="hidden" id="hdnPkId" value="<?=$nPkId?>">
					<input name="hdnStyleId" type="hidden" id="hdnStyleId" value="<?=$nStyleId?>">
					<input name="hdnThemeId" type="hidden" id="hdnThemeId" value="<?=$nThemeId?>">
				</td> 
			<!-- onclick="applyAction();"-->
				<td width="90%">
			<input type="button" id="cancel" name="cancel" value="cancel" onclick="UrlBack();" class="button">			</td></tr>
			<?
				}//End Right If
			?>		  
		</table>
	</div>
	</form>
<!-- InstanceEndEditable -->
    </td>	
  </tr>
  <tr>
    <td colspan="2"><?php include("Footer.php");?></td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>