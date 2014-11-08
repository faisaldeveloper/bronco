<?php
include("../Includes/IncludeFiles.php"); 

/////////////////////////////////////////////Getting values from ManagePicGallery.php//////////////////////
if(isset($_GET['strAction']) && $_GET['strAction']=="DeleteImage")
{
	$iGImageId=$_GET['id'];
	$strImageName=$_GET['ImageName'];
	$objGallery=new clsGallery();
	$objGallery->m_strImageName=$strImageName;
	$objGallery->m_intGImageId=$iGImageId;
	$iCheck=$objGallery->DeleteImage();
	if($iCheck!=0)
	{
		header("location:EditPicture.php?strAction=Image+Deleted");
	}
	else
	{
		header("location:EditPicture.php?strAction=Image+Not+Deleted");
	}
	
	
}
else
{
$iGImageId=$_GET['id'];
$iLangId=$_GET['LangId'];
$strImageName=$_GET['strImageName'];
/*													Deleting											*/

$objGallery=new clsGallery();
$objGallery->m_intLangId=$iLangId;
$objGallery->m_strImageName=$strImageName;
$objGallery->m_intGImageId=$iGImageId;
$rsGallery=$objGallery->GetImageGalleryForTwoId();
if($rsGallery!=0)
{

	$iCheck2=$objGallery->DeleteGalleryInfo();
	if($iCheck2!=0)
	{
		header("location:ManagePicGallery.php?strMessage=Image+Deleted&cmbLangId=$iLangId");
	}
	else
	{
		header("location:ManagePicGallery.php?strMessage=Image+Not+Deleted&cmbLangId=$iLangId");
	}

}
else
{
$iCheck=$objGallery->DeleteImage();
	if($iCheck!=0)
	{
		$iCheck2=$objGallery->DeleteGalleryInfo();
		header("location:ManagePicGallery.php?strMessage=Image+Deleted&cmbLangId=$iLangId");
	}
	else
	{
		header("location:ManagePicGallery.php?strMessage=Image+Not+Deleted&cmbLangId=$iLangId");
	}

}
/*													End of Deleting										*/
}
?>
