<?php
include("../Includes/BackOfficeIncludesFiles.php");
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=69;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{
	///////////////////////Serve side validation/////////////////////
	if(!isset($_REQUEST['hdnGalleryID']))
	{
		header("location:ManageGallery.php?intMessage=360");
		exit;
	}
	if(!isset($_REQUEST['id']))
	{
		header("location:ManageGallery.php?intMessage=359&hdnModuleID=".$_REQUEST['hdnGalleryID']);
		exit;
	}
	///////////////////Variables initialization////////////////
		$objGallery = new clsGallery();
	//////////////////variables initialization/////////////////
	$arrQryStr = array();
	$nGImageId="";
	$nId="";
	$nLangId="";
	$nGalleryID="";
	$strImgName="";
	$strDesc="";
	$nRank="";
	//////////////////Getting data from the query string////////////////
	if(isset($_REQUEST['id']) || !empty($_REQUEST['id']))
	{
		$arrQryStr[]="id=".urlencode($_REQUEST['id']);
		$nGImageId=$_REQUEST['id'];
	}
	if(isset($_REQUEST['hdnpkId']) || !empty($_REQUEST['hdnpkId']))
	{
		$arrQryStr[]="hdnpkId=".urlencode($_REQUEST['hdnpkId']);
		$nId=$_REQUEST['hdnpkId'];
	}	
	if(isset($_REQUEST['hdnLangId']) || !empty($_REQUEST['hdnLangId']))
	{
		$arrQryStr[]="hdnLangId=".urlencode($_SESSION['intLangId']);
		$nLangId=$_REQUEST['hdnLangId'];
	}	
	if(isset($_REQUEST['hdnGalleryID']) || !empty($_REQUEST['hdnGalleryID']))
	{
		$arrQryStr[]="hdnGalleryID=".urlencode($_REQUEST['hdnGalleryID']);
		$nGalleryID=$_REQUEST['hdnGalleryID'];
	}	
	if(isset($_REQUEST['strImgName']) || !empty($_REQUEST['strImgName']))
	{
		$arrQryStr[]="strImgName=".urlencode($_REQUEST['strImgName']);
		$strImgName=$_REQUEST['strImgName'];
	}	
	if(isset($_REQUEST['txtDescripton']) || !empty($_REQUEST['txtDescripton']))
	{
		$arrQryStr[]="strDesc=".urlencode($_REQUEST['txtDescripton']);
		$strDesc=$_REQUEST['txtDescripton'];
	}
	if(isset($_REQUEST['hdnModId']) || !empty($_REQUEST['hdnModId']))
	{
		$arrQryStr[]="hdnModuleID=".urlencode($_REQUEST['hdnModId']);
	}	
	if(isset($_REQUEST['cmbRank']) || !empty($_REQUEST['cmbRank']))
	{
		$nRank=$_REQUEST['cmbRank'];
		$arrQryStr[]="Rank=".urlencode($_REQUEST['cmbRank']);
	}
	//////////////Constructing a query string in an array////////////
			$strQry = implode('&',$arrQryStr);
	////////////////////////Validation/////////////////////////////
	if(!isset($_REQUEST['txtDescripton']) || empty($_REQUEST['txtDescripton']))
	{
		header("location:EditGalleryImageDesc.php?intMessage=361&".$strQry);
		exit;
	}
	///////////Assigning Values to Class Data Members//////////////
		$objGallery->m_intGImageId = $nGImageId; 
		$objGallery->m_strImageDesc = $strDesc;
		$objGallery->m_intLangId = $nLangId;
		$objGallery->m_intImageRank=$nRank;
		
		$rsSql = $objGallery->EditGalleryImageDesc();
		if($rsSql)
		header("location:ManageGalleryImage.php?intMessage=21&".$strQry);
		else 
		header("location:ManageGalleryImage.php?intMessage=20&".$strQry);
}

else
	header("location:Error.php");//End Right If
?>
