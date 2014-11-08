<?php
	require_once("../Includes/BackOfficeIncludesFiles.php");
//--------------Checking for right---------------------
	$objAdminUser=new clsAdminUser();
	$objAdminUser->m_objRoles=new clsRoles();
	$objAdminUser->m_intUserId=$_SESSION['intUserId'];
	$objAdminUser->m_objRoles->m_intRightId=31;
	if($objAdminUser->CheckRightForAdmin()==1)
	{
		/***
			server side validation
		**/
		if(!isset($_REQUEST['hdnLangId']) || empty($_REQUEST['hdnLangId']))
		{
			header("Location:ManageInterfaceLang.php?intMessage=102");
			exit;
		}
	
		$objLanguage->m_intLangId=$_POST['hdnLangId'];
		$iCheck=$objLanguage->DeleteLang();
		
		if($iCheck)
			header("location:ManageInterfaceLang.php?intMessage=332");
		else
			header("location:ManageInterfaceLang.php?intMessage=333");
	}
	else
		header("location:Error.php");//End Right If

?>