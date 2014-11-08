<?
require_once("../Includes/BackOfficeIncludesFiles.php");
////////////////Role Rights Implementation///////////////////
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
		
	/////////////// Font //////////////////////////////////////////
	if(isset($_POST['text_font']))
		$ntxtFont = $_POST['text_font'];
	
	///////////////// Size //////////////////////////////////////////	
	if(isset($_POST['text_size']))
		$ntxtSize = $_POST['text_size'];
	if(isset($_POST['text_size_measurement']))
		$ntxtSizeMeasurement = $_POST['text_size_measurement'];
	$strSize = '';
	if(is_numeric($ntxtSize)) 
		$strSize = $ntxtSize.$ntxtSizeMeasurement;
	else
		$strSize = $ntxtSize;
		
	//////////////// Weight //////////////////////////////////////
	if(isset($_POST['text_weight']))
		$ntxtWeight = $_POST['text_weight'];
	
	/////////////Variant ///////////////////////////////////////	
	if(isset($_POST['text_variant']))
		$ntxt_variant = $_POST['text_variant'];
		
	///////////////// Style ////////////////////////////////////	
	if(isset($_POST['text_style']))
		$ntxtStyle = $_POST['text_style'];
		
	///////////// Line Height ///////////////////////////////////	
	if(isset($_POST['text_lineheight']))
		$ntxtLineHeight = $_POST['text_lineheight'];
	if(isset($_POST['text_lineheight_measurement']))
		$ntxtLineMeasurement = $_POST['text_lineheight_measurement'];
	$strLineHeight = '';
	if(is_numeric($ntxtLineHeight))
		$strLineHeight = $ntxtLineHeight.$ntxtLineMeasurement;
	else
		$strLineHeight = $ntxtLineHeight;
			
	///////////  Text Case & Color ////////////////////////////////////////	
	if(isset($_POST['text_case']))
		$ntxtCase = $_POST['text_case'];
	if(isset($_POST['txtColor']))
		$ntxtColor = $_POST['txtColor'];
		
	///////////////////// Text Display Options ///////////////////////////////	
	if(isset($_POST['chkTxtDecoration']))
		$nchkTxtDecoration = $_POST['chkTxtDecoration'];
	
	/////////////////// Background Color & Image & Repeat & Attachment ////////////	
	if(isset($_POST['background_color']))
		$ntxtBGColor = $_POST['background_color'];
	if(isset($_POST['background_image']))
		$ntxtBGImage = $_POST['background_image'];
	if(isset($_POST['background_repeat']))
		$nBGRepeat = $_POST['background_repeat'];
	if(isset($_POST['background_attachment']))
		$nBGAttachment = $_POST['background_attachment'];
		
	//////////////////////// Background Positions //////////////////////	
	if(isset($_POST['background_hpos']))
		$nBGHPos = $_POST['background_hpos'];
	if(isset($_POST['background_hpos_measurement']))
		$nBGHPosMeasurement = $_POST['background_hpos_measurement'];
	if(is_numeric($nBGHPos))
		$strHorPos = $nBGHPos.$nBGHPosMeasurement;
	else
		$strHorPos = $nBGHPos;	
	if(isset($_POST['background_vpos']))
		$nBGVPos = $_POST['background_vpos'];
	if(isset($_POST['background_vpos_measurement']))
		$nBGVPosMeasurement = $_POST['background_vpos_measurement'];
	if(is_numeric($nBGVPos))	
		$strVerPos = $nBGVPos.$nBGVPosMeasurement;
	else
		$strVerPos = $nBGVPos;
		
	/////////////// Border Styles ////////////////////////////////	
	if(isset($_POST['border_style_top']))
		$nBorderStyleTop = $_POST['border_style_top'];
	if(isset($_POST['border_style_right']))
		$nBorderStyleRight = $_POST['border_style_right'];
	if(isset($_POST['border_style_bottom']))
		$nBorderStyleBottom = $_POST['border_style_bottom'];
	if(isset($_POST['border_style_left']))
		$nBorderStyleLeft = $_POST['border_style_left'];
		
	if(isset($_POST['border_width_top']))
		$nBorderWidthTop = $_POST['border_width_top'];
	if(isset($_POST['border_width_top_measurement']))
		$nBorderWidthTopMeasurement = $_POST['border_width_top_measurement'];
	if(is_numeric($nBorderWidthTop))	
		$strBorderWidthTop = $nBorderWidthTop.$nBorderWidthTopMeasurement;
	else
		$strBorderWidthTop = $nBorderWidthTop;
		
	if(isset($_POST['border_width_right']))
		$nBorderWidthRight = $_POST['border_width_right'];
	if(isset($_POST['border_width_right_measurement']))
		$nBorderWidthRightMeasurement = $_POST['border_width_right_measurement'];
	if(is_numeric($nBorderWidthRight))
		$strBorderWidthRight = $nBorderWidthRight.$nBorderWidthRightMeasurement;
	else
		$strBorderWidthRight = $nBorderWidthRight;	
	
	if(isset($_POST['border_width_bottom']))
		$nBorderWidthBottom = $_POST['border_width_bottom'];
	if(isset($_POST['border_width_bottom_measurement']))
		$nBorderWidthBottomMeasurement = $_POST['border_width_bottom_measurement'];
	if(is_numeric($nBorderWidthBottom))
		$strBorderWidthBottom = $nBorderWidthBottom.$nBorderWidthBottomMeasurement;
	else
		$strBorderWidthBottom = $nBorderWidthBottom;
	
	if(isset($_POST['border_width_left']))
		$nBorderWidthLeft = $_POST['border_width_left'];
	if(isset($_POST['border_width_left_measurement']))
		$nBorderWidthLeftMeasurement = $_POST['border_width_left_measurement'];
	if(is_numeric($nBorderWidthLeft))
		$strBorderWidthLeft = $nBorderWidthLeft.$nBorderWidthLeftMeasurement;
	else
		$strBorderWidthLeft = $nBorderWidthLeft;	
	
	if(isset($_POST['border_color_top']))
		$nBorderColorTop = $_POST['border_color_top'];
	if(isset($_POST['border_color_right']))
		$nBorderColorRight = $_POST['border_color_right'];
	if(isset($_POST['border_color_bottom']))
		$nBorderColorBottom = $_POST['border_color_bottom'];
	if(isset($_POST['border_color_left']))
		$nBorderColorLeft = $_POST['border_color_left'];
	
	if(isset($_POST['border_style_same']))
	{
		$nChkSameBorder = $_POST['border_style_same'];
		$nBorderStyleRight = $nBorderStyleTop;
		$nBorderStyleBottom = $nBorderStyleTop;
		$nBorderStyleLeft = $nBorderStyleTop;
	}
	if(isset($_POST['border_width_same']))
	{
		$nChkSameWidth = $_POST['border_width_same'];
		$strBorderWidthRight = $strBorderWidthTop;
		$strBorderWidthBottom = $strBorderWidthTop;
		$strBorderWidthLeft = $strBorderWidthTop;
	}
	if(isset($_POST['border_color_same']))
	{
		$nChkSameColor = $_POST['border_color_same'];			
		$nBorderColorRight = $nBorderColorTop;
		$nBorderColorBottom = $nBorderColorTop;
		$nBorderColorLeft = $nBorderColorTop;
	}	
	
	if($ntxtFont != '')
	{
		$strValue = "font-family: ".$ntxtFont.";";
	}
	if($strSize != '')
	{	
		$strValue .="font-size: ".$strSize.";";
	}
	if($ntxtStyle != '')
	{	
		$strValue .="font-style: ".$ntxtStyle.";";
	}
	if($strLineHeight != '')
	{	
		$strValue .="line-height: ".$strLineHeight.";";
	}
	if($ntxtWeight != '')
	{	
		$strValue .="font-weight: ".$ntxtWeight.";";
	}
	if($ntxt_variant != '')
	{	
		$strValue .="font-variant: ".$ntxt_variant.";";
	}
	if($ntxtCase != '')
	{	
		$strValue .="text-transform: ".$ntxtCase.";";
	}
	if(isset($ntxtColor) && !empty($ntxtColor))
	{	
		$strValue .="color: ".$ntxtColor.";";
	}	
	if($nchkTxtDecoration != '')
	{
		if(!in_array("none",$nchkTxtDecoration))
		{
			$strValue .="text-decoration: ";
			foreach($nchkTxtDecoration as $chkTxtDec)
				$strValue .= $chkTxtDec." ";
			$strValue .=";";	
		}
	}
	if($nBGAttachment != '')
	{
		$strValue .="background-attachment: ".$nBGAttachment.";";
	}
	if($ntxtBGColor != '')
	{	
		$strValue .="background-color: ".$ntxtBGColor.";";
	}	
	if($ntxtBGImage != '')
	{
		$strValue .="background-image: url(".str_replace(':','|',$ntxtBGImage).");";
	}
	if($nBGRepeat != '')
	{	
		$strValue .="background-repeat: ".$nBGRepeat.";";
	}
	if($strHorPos != '' || $strVerPos != '')
	{	
		$strValue .="background-position: ".$strHorPos."&".$strVerPos.";";
	}	
	if($nChkSameBorder==1 && $nChkSameWidth==1 && $nChkSameColor==1 && (!empty($strBorderWidthTop) || !empty($nBorderStyleTop) || !empty($nBorderColorTop)) )
		$strValue .="border: ".$strBorderWidthTop."&".$nBorderStyleTop."&".$nBorderColorTop.";";
	else
	{
		 if(!empty($strBorderWidthTop) || !empty($nBorderStyleTop) || !empty($nBorderColorTop))
			$strValue .="border-top: ".$strBorderWidthTop."&".$nBorderStyleTop."&".$nBorderColorTop.";";
		 if(!empty($strBorderWidthRight) || !empty($nBorderStyleRight) || !empty($nBorderColorRight))
			$strValue .="border-right: ".$strBorderWidthRight."&".$nBorderStyleRight."&".$nBorderColorRight.";";
		 if(!empty($strBorderWidthBottom) || !empty($nBorderStyleBottom) || !empty($nBorderColorBottom))
			$strValue .="border-bottom: ".$strBorderWidthBottom."&".$nBorderStyleBottom."&".$nBorderColorBottom.";";
		 if(!empty($strBorderWidthLeft) || !empty($nBorderStyleLeft) || !empty($nBorderColorLeft))
			$strValue .="border-left: ".$strBorderWidthLeft."&".$nBorderStyleLeft."&".$nBorderColorLeft.";";
	}	
	//print $strValue;exit;
	if($strValue=='')
	{
		header("location:EditCSSProps.php?msg=Select+Option&hdnThemeId=".$nThemeId."&hdnStyleId=".$nStyleId."&hdnPkId=".$nPkId);
		exit;
	}
	//echo $strValue;
	
	//echo "<br>".$nThemeId."    ".$nStyleId."   ".$nPkId;
	if($nPkId != '' || $nPkId != 0)
		$nResult = $objTheme->UpdateThemeStyle($nPkId, $strValue);
	else
		$nResult = $objTheme->AddThemeStyle($nThemeId, $nStyleId, $strValue);	
	if($nResult == TRUE)
	{
		header("location:ManageStyles.php?hdnThemeId=".$nThemeId);
		exit;
	}
	else
	{
		header("location:ManageStyles.php?hdnThemeId=".$nThemeId);
		exit;	
	}
}
else
	header("location:Error.php");//End Right If
?>	