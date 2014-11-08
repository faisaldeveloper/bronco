<?php
require_once("../Includes/BackOfficeIncludesFiles.php");
$objGallery = new clsGallery();
$intLangId = $_POST['hdnLangId'];
$objGallery->m_intLangId = $intLangId;
if(isset($_POST['chkImageGal']))
{
	$arrImagesIds = $_POST['chkImageGal'];
	$objGallery->m_intImagesIds = $arrImagesIds;
	if(isset($_POST['btnActive']))
	{
		$objGallery->ActivateSelected();
		header("location:ManagePicGallery.php?intMessage=13&cmbLangId=$intLangId");
	}
	else if(isset($_POST['btnDeActive']))
	{
		$objGallery->DeActivateSelected();
		header("location:ManagePicGallery.php?intMessage=14&cmbLangId=$intLangId");
	}
	else
	{
		$objGallery->DeleteSelected();
		header("location:ManagePicGallery.php?intMessage=28&cmbLangId=$intLangId");
	}
}
else
{
	header("location:ManagePicGallery.php?intMessage=27");
	exit;
}

?>