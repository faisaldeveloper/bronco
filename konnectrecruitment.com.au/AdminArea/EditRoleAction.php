<?php
	require_once("../Includes/BackOfficeIncludesFiles.php");
////////////////Role Rights Implementation///////////////////
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=90;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{
	$iRoleId=$_POST['hdnRoleId'];
	
	/***
		server side validation
	**/
	if(!isset($_REQUEST['hdnRoleId']) || empty($_REQUEST['hdnRoleId']))
	{
		header("Location:ManageRoles.php?intMessage=101");
		exit;
	}


	if(!isset($_POST['txtRoleName']) || empty($_POST['txtRoleName']))
	{
		header("Location:EditRole.php?intMessage=100&hdnRoleId=${iRoleId}");
		exit;
	}

	$strRoleName=$_POST['txtRoleName'];
	$objRoles=new clsRoles();

	$objRoles->m_intRoleId=$iRoleId;
	$objRoles->m_strRoleDesc=$strRoleName;
	$iCheck=$objRoles->EditRole();
		if($iCheck!=0)
		{
			header("location:ManageRoles.php?intMessage=74");
		}
		else
		{
			header("location:ManageRoles.php?intMessage=75");
		}
}
else
	header("location:Error.php");//End Right If
?>