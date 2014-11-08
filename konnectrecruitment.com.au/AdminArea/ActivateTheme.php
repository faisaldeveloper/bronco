<?php
	include("../Includes/BackOfficeIncludesFiles.php");
////////////////Role Rights Implementation///////////////////
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=254;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{
	/***
		server side validation
	**/
	if(!isset($_REQUEST['hdnThemeId']) || empty($_REQUEST['hdnThemeId']))
	{
		header("Location:ManageTheme.php?intMessage=112");
		exit;
	}

	if(isset($_REQUEST['hdnThemeId']))
		$intThemeId=$_REQUEST['hdnThemeId'];
	$objTheme->m_intID=$intThemeId;
	$nResult=$objTheme->ActivateTheme();
	if($nResult==TRUE)
	{
		header("location:ManageTheme.php?intMessage=113");
		exit;
	}
	else
	{
		header("location:ManageTheme.php?intMessage=114");
		exit;
	}
}
else
	header("location:Error.php");//End Right If
	
?>