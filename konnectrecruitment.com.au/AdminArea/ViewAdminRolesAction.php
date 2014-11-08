<?php
require_once("../Includes/BackOfficeIncludesFiles.php");
////////////////Role Rights Implementation///////////////////
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=10;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{
////////////////////////////////////Getting values from EditRole.php//////////////////////
//	Editing           $strRoleName=$_POST['txtRoleName'];
    $objAdminUser=new clsAdminUser();
    $objAdminUser->m_objRoles=new clsRoles();

    $objAdminUser->m_intUserId=$_POST['hdnUserId'];
	$objAdminUser->DeleteAdminRoles();
	if(isset($_POST['chkRole']))
	{	
		foreach($_POST['chkRole'] as $i)
		{
			$objAdminUser->m_objRoles->m_intRoleId=(int)$i;
			$objAdminUser->AssignRoleToUser();
		}
	}
	header("location:ListOfAdminUser.php?intMessage=96");
}
else
	header("location:Error.php");//End Right If
?>