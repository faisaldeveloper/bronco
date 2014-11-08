<?php
require_once("../Includes/BackOfficeIncludesFiles.php");
////////////////Role Rights Implementation///////////////////
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=9;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{
$objAdminUser=new clsAdminUser();
$objAdminUser->m_intUserId=$_REQUEST['intUserId'];

$intCheck=$objAdminUser->DeleteAdminUser();
	if($intCheck)
	{	
		$objAdminUser->DeleteAdminRoles();
		header("Location:ListOfAdminUser.php?intMessage=94");
	}
	else
		header("Location:ListOfAdminUser.php?intMessage=95 ");
}
else
	header("location:Error.php");//End Right If
?>