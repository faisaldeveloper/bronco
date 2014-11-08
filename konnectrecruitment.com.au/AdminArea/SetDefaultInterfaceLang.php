<?php
	require_once("../Includes/BackOfficeIncludesFiles.php");
//--------------Checking for right---------------------
	$objAdminUser=new clsAdminUser();
	$objAdminUser->m_objRoles=new clsRoles();
	$objAdminUser->m_intUserId=$_SESSION['intUserId'];
	$objAdminUser->m_objRoles->m_intRightId=32;
	if($objAdminUser->CheckRightForAdmin()==1)
	{
		/***
			server side validation
		**/
		if(!isset($_REQUEST['hdnLangId']) || empty($_REQUEST['hdnLangId']))
		{
			header("Location:ManageInterfaceLang.php?intMessage=99");
			exit;
		}
	
		$objLanguage->m_intLangId=$_POST['hdnLangId'];
		$nLangID = $_POST['hdnMasterLangId'];
		$iCheck=$objLanguage->SetDefaultLang($nLangID);
		if($iCheck!=0)
			header("location:ManageInterfaceLang.php?intMessage=334");
		else
			header("location:ManageInterfaceLang.php?intMessage=335");
	}
	else
		header("location:Error.php");//End Right If

?>