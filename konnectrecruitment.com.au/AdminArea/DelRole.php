<?php
	session_start();
	include("../Includes/BackOfficeIncludesFiles.php");
////////////////Role Rights Implementation///////////////////
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=91;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{
	/***
		server side validation
	**/
	if(!isset($_POST['hdnRoleId']) || empty($_POST['hdnRoleId']))
	{
		header("Location:ManageRoles.php?intMessage=102");
		exit;
	}

	$iRoleId=$_POST['hdnRoleId'];
	
	$objRoles=new clsRoles();
	$objRoles->m_intRoleId=$iRoleId;
	$intCheck=$objRoles->IsRoleAssigned();
	if($intCheck===1)
		header("location:ManageRoles.php?intMessage=76&iRoleId=$iRoleId");
	else
	{
		if($objRoles->DeleteRole()==1)
		{
			$objRoles->DeleteRoleRights();
			header("location:ManageRoles.php?intMessage=77&iRoleId=$iRoleId");
		}
		else
			header("location:ManageRoles.php?intMessage=78&iRoleId=$iRoleId");
	}
}
else
	header("location:Error.php");//End Right If
?>




