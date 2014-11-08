<?php
require_once("../Includes/BackOfficeIncludesFiles.php");

/////////////////////////////////////////////Getting values from EditRole.php//////////////////////
//													Editing														$strRoleName=$_POST['txtRoleName'];
if(isset($_POST['hdnRoleId']))
{	
	$iRoleId=$_POST['hdnRoleId'];
	$objRoles=new clsRoles();
	$objRoles->m_intRoleId=$iRoleId;
	$objRoles->DeleteRoleRights();
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
					if($objRoles->CheckRightInRole()==0)
					{	
						$objRoles->AddRightInRole();
					}
				}
			}
		}
	}
	header("location:ManageRoles.php?intMessage=79&intRoleId=".$_POST['hdnRoleId']);
}
else
	header("location:ManageRoles.php?intMessage=80&intRoleId=".$_POST['hdnRoleId']);

?>