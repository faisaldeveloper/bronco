<?php
include("../Includes/BackOfficeIncludesFiles.php");

if(isset($_REQUEST['txtColor']))
	$strColor=$_REQUEST['txtColor'];
if(isset($_REQUEST['hdnThemeId']))
	$intThemeID=$_REQUEST['hdnThemeId'];
if(isset($_REQUEST['hdnStyleId']))
	$intStyleID=$_REQUEST['hdnStyleId'];

if(!isset($_REQUEST['txtColor']) || empty($_REQUEST['txtColor']))
{
	header("location:EditStyle.php?msg=EnterColor&hdnThemeId=".$intThemeID."&hdnStyleId=".$intStyleID);
	exit;
}
$objStyles->m_intStyleID=$intStyleID;
$objStyles->m_strColor=$strColor;
$objStyles->m_intThemeID=$intThemeID;

$nResult = $objStyles->Add();
if($nResult==TRUE)
{
	header("location:ManageStyles.php?msg=Added&hdnThemeId=".$intThemeID);
	exit;
}
else
{
	header("location:ManageStyles.php?msg=Cannot+Add&hdnThemeId=".$intThemeID);
	exit;
}
?>