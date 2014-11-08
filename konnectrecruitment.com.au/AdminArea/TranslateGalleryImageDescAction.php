<?php 
include("../Includes/BackOfficeIncludesFiles.php");
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=70;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{
	///////////Server side validation///////////////
	if(!isset($_REQUEST['hdnModuleId']))
	{
		header("location:ManageGallery.php?intMessage=360");
		exit;
	}
	if(!isset($_REQUEST['hdnId']))
	{
		header("location:ManageGalleryImage.php?intMessage=362&hdnModuleID=".$_REQUEST['hdnModuleId']);
		exit;
	}
	///////////////Creating class object////////////
	$objGallery=new clsGallery();
	//////////////////initializing variables//////////////////
	$arrQryStr=array();
	$arrQryStr[]=NULL;
	$nId = "";
	$intLangId = "";
	$nModuleId = "";
	$strDescription = "";
	$strImageName = "";
	///////////////////Getting values from query string/////////////////
	if(isset($_POST['hdnId']))
	{
		$arrQryStr[] = "id=".urlencode($_POST['hdnId']);
		$nId=$_POST['hdnId'];
	}
	if(isset($_POST['lstLangId']))
	{
		$arrQryStr[] = "lstLangId=".urlencode($_POST['lstLangId']);
		$intLangId=$_POST['lstLangId'];
	}
	if(isset($_POST['hdnModuleId']))
	{
		$arrQryStr[] = "hdnModuleID=".urlencode($_POST['hdnModuleId']);
		$nModuleId=$_POST['hdnModuleId'];
	}
	if(isset($_POST['txtDescripton']))
	{
		$arrQryStr[] = "txtDescripton=".urlencode($_POST['txtDescripton']);
		$strDescription=$_POST['txtDescripton'];
	}
	if(isset($_POST['hdnImgName']))
	{
		$strImageName=$_POST['hdnImgName'];
	}
	$strQry = implode('&',$arrQryStr);	//constructing querystring
	////////////////Server side validation//////////////////
	if(!isset($_POST['txtDescripton']) || empty($_POST['txtDescripton']))
	{
		header("location:TranslateGalleryImageDesc.php?intMessage=361&".$strQry);
		exit;
	}
	///////////////Transfering values to class variables/////////
	$objGallery->m_intGImageId=$nId;
	$objGallery->m_intLangId=$intLangId;
	$objGallery->m_strImageDesc=$strDescription;
	$objGallery->m_strFile = $strImageName;
	$iCheck = $objGallery->TranslateImageDesc();
	if($iCheck)
		header("location:ManageGalleryImage.php?intMessage=24&".$strQry);
	else
		header("location:ManageGalleryImage.php?intMessage=23&".$strQry);
	/*													End of Tranlating									*/
}
else
	header("location:Error.php");//End Right If
?>