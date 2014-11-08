<?php
require_once("../Includes/BackOfficeIncludesFiles.php");
$objGallery = new clsGallery();
$intLangId = $_POST['hdnLangId'];
$objGallery->m_intLangId = $intLangId;
$nGalleryID = $_REQUEST['hdnModuleID'];
//print "<br> gallery -->".$_REQUEST['hdnModuleID'];
if(isset($_POST['chkImageGal']))
{
	$arrImagesIds = $_POST['chkImageGal'];
	$objGallery->m_intImagesIds = $arrImagesIds;
	if(isset($_POST['btnActive']))
	{
		$objGallery->ActivateSelected();
		header("location:ManageGalleryImage.php?intMessage=13&cmbLangId=$intLangId&hdnModuleID=".$nGalleryID);
		exit;
	}
	else if(isset($_POST['btnDeActive']))
	{
		$objGallery->DeActivateSelected();
		header("location:ManageGalleryImage.php?intMessage=14&cmbLangId=$intLangId&hdnModuleID=".$nGalleryID);
		exit;
	}
	else
	{
		$objGallery->DeleteSelected();
		header("location:ManageGalleryImage.php?intMessage=28&cmbLangId=$intLangId&hdnModuleID=".$nGalleryID);
		exit;
	}
}
else
{
	header("location:ManageGalleryImage.php?intMessage=27?hdnModuleID=".$nGalleryID);
	exit;
}

?>