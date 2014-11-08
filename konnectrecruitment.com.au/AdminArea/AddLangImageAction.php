<?php
	include("../Includes/BackOfficeIncludesFiles.php");
	//--------------Checking for right---------------------
	$objAdminUser=new clsAdminUser();
	$objAdminUser->m_objRoles=new clsRoles();
	$objAdminUser->m_intUserId=$_SESSION['intUserId'];
	$objAdminUser->m_objRoles->m_intRightId=28;
	if($objAdminUser->CheckRightForAdmin()==1)
	{
		/***
			server side validation
		**/
		if(!isset($_REQUEST['hdnLangID']) || empty($_REQUEST['hdnLangID']))
		{
			header("Location:ManageInterfaceLang.php?intMessage=101");
			exit;
		}
		
		$nLanguageID=$_POST['hdnLangID'];
		
		if(!isset($_FILES['flItemTypeImg']['name']) || empty($_FILES['flItemTypeImg']['name']))
		{
			header("Location:addlangImage.php?intMessage=103&nLangID=${nLanguageID}");
			exit;
		}
	
		if(isset($_FILES['flItemTypeImg']['name']))
		{
			$strRealPathFile = "AdminLogin";
			$strDestFolder = "../LangFlags";
			$strImagePrefix = $nLanguageID;
			$strValidExtension = "gif,jpg,jpeg,png,bmp,psd,tiff";
			$strControlName = "flItemTypeImg";
			$intMaxSize=1048576;
			$strUploaded = UploadFile($strRealPathFile, $strDestFolder, $strImagePrefix, $strValidExtension, $strControlName, $intMaxSize);
			if(strpos($strUploaded,"_")>-1)
				$strCheck = $objLanguage->AddLangImage($nLanguageID , $strUploaded);
		}
		
		if($strCheck)
			header("location:ManageInterfaceLang.php?intMessage=19");
		else
			header("location:ManageInterfaceLang.php?intMessage=20");
	}
	else
		header("location:Error.php");//End Right If
?>
