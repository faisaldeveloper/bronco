<?php
include("../Includes/BackOfficeIncludesFiles.php");
////////////////Role Rights Implementation///////////////////
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=257;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{
if(isset($_REQUEST['hdnId']))
	$intID=$_REQUEST['hdnId'];
$objTheme->m_intID=$intID;
$nResult=$objTheme->Delete();
if($nResult==TRUE)
{
	header("location:ManageTheme.php?intMessage=269");
	exit;
}
else
{
	header("location:ManageTheme.php?intMessage=270");
	exit;
}
}
else
	header("location:Error.php");//End Right If
?>