<?php
	require_once("../Includes/BackOfficeIncludesFiles.php");
////////////////Role Rights Implementation///////////////////
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=89;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{
	/***
		asssigning values to variables
	**/
	$strRole=$_POST['txtRoleName'];
	
	/***
		server side validation
	**/
	if(!isset($_POST['txtRoleName']) || empty($_POST['txtRoleName']))
	{
		header("Location:AddRole.php?intMessage=100");
		exit;
	}

	$objRoles=new clsRoles();
	$objRoles->m_strRoleDesc=$strRole;
	$iCheck=$objRoles->AddNewRole();
	
	if($iCheck!=0)
	{
		$rsRole=$objRoles->GetLatestRoleId();
		$strRole=mysql_fetch_array($rsRole);
		$objRoles->m_intRoleId=$strRole['pkRoleId'];

		$rsGroup=$objRoles->GetRightGroups();
		if($rsGroup!=0)
		{	
			while($strGroup=mysql_fetch_array($rsGroup))
			{	
				if(isset($_POST['chkRight'.$strGroup['pkId'].'']))
				{	
					foreach($_POST['chkRight'.$strGroup['pkId'].''] as $i)
					{
						$objRoles->m_intRightId=(int)$i;
						$objRoles->AddRightInRole();
					}
				}
			}
		}
		header("location:ManageRoles.php?intMessage=72");
	}
	else
	{
		header("location:ManageRoles.php?intMessage=73");
	}
}
else
	header("location:Error.php");//End Right If
?>