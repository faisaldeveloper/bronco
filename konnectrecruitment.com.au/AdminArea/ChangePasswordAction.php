<?php
	require_once("../Includes/BackOfficeIncludesFiles.php");
////////////////Role Rights Implementation///////////////////
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=154;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{
	/**
	Getting Labels
	**/
	$objMessage=new clsMessages();
	$objMessage->m_intLangId=$_SESSION['intLangId'];
	$objMessage->m_intConId=CONST_CONCEPT_PASSWORD;
	$arrLabels=$objMessage->GetLabels();

	/**
	server side side validation
	**/
	if(!isset($_POST['txtOldPass']) || empty($_POST['txtOldPass']))
	{
		header("Location:ChangePassword.php?intMessage=81");
		exit;
	}
	if(!isset($_POST['txtPass']) || empty($_POST['txtPass']))
	{
		header("Location:ChangePassword.php?intMessage=82");
		exit;
	}
	if(!isset($_POST['txtCPass']) || empty($_POST['txtCPass']))
	{
		header("Location:ChangePassword.php?intMessage=85");
		exit;
	}
	if(isset($_POST['txtPass']) && isset($_POST['txtCPass']))
	{
		if($_POST['txtPass'] != $_POST['txtCPass'])
		{
			header("Location:ChangePassword.php?intMessage=97");
			exit;
		}
	}

	/**
	assigning values to variables
	**/
	$strOldPassword=$_POST['txtOldPass'];
	$strNewPassword=$_POST['txtPass'];
	$objAdminUser=new clsAdminUser();
	$objAdminUser->m_intUserId=$_SESSION['intUserId'];
	
	/**
	assigning values to class variables
	**/
	$objAdminUser->m_strUserPass=$strOldPassword;
	$objAdminUser->m_strUserNewPass=$strNewPassword;
	
	/**
	calling the class function to change the password
	**/
	$intCheck=$objAdminUser->ChangePassword();
		if($intCheck)
			header("Location:ChangePassword.php?intMessage=134");
		else
			header("Location:ChangePassword.php?intMessage=135");
}
else
	header("location:Error.php");//End Right If
?>