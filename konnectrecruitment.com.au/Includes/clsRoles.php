<?
/*
*****************************************************************************
* Date 30-06-2005															*
* Author: Yasir Abbasi (Software Engineer)									*
* Owner: DigitalSpinners													*
*****************************************************************************
*/

//---------------------  START CLASS FOR Roles & Rights --------------------------
class clsRoles
{
	var $m_intRoleId; 
	var $m_strRoleDesc;
	var $m_intRightId;	
	var $m_RightDesc;	
	var	$m_intId;
	var	$m_strDesc;

	function AddNewRole()
	{
		$strSqlCheck = "SELECT * FROM `roles` WHERE RoleDesc = '".$this->m_strRoleDesc."'";
		$rsSqlCheck = mysql_query($strSqlCheck);
		if(mysql_num_rows($rsSqlCheck)==0) 
		{
			$strSql = "INSERT INTO `roles` (RoleDesc) VALUES ('".$this->m_strRoleDesc."')";
			$rsSql = mysql_query($strSql);
			if(mysql_affected_rows()>0)
				return TRUE;
			else
				return FALSE;
		}
		else
			return false;
	}
	function GetLatestRoleId() //------ TO Get NEW ADMIN USER Id ---------
	{
		$strSql= "SELECT max(pkRoleId) as pkRoleId from `roles`";
		$rsSql= mysql_query($strSql);
		if($rsSql && mysql_num_rows($rsSql)>0) 
			return $rsSql;
		else
			return 0;
	}
	
	function EditRole()
	{
		$strSql = "UPDATE `roles` SET RoleDesc = '".$this->m_strRoleDesc."' WHERE pkRoleId = ".$this->m_intRoleId."";
		$rsSql = mysql_query($strSql);
		if(mysql_affected_rows()>0)
			return TRUE;
		else
			return FALSE;
	}
	
	function DeleteRole()
	{
		$strSql = "DELETE FROM `roles` WHERE pkRoleId = ".$this->m_intRoleId."";
		$intCheck=mysql_query($strSql);
		return $intCheck;
	}

	function GetRoleDetail()
	{
		if(isset($this->m_intRoleId)) //By ID
			$strSql="SELECT * FROM roles where roles.pkRoleId=".$this->m_intRoleId;
		else
			$strSql="SELECT * FROM roles where roles.RoleDesc=".$this->m_strRoleDesc; //By Description
		$rsRole = mysql_query($strSql);
		return $rsRole;
	}
	
	function RolesList($intRecordStart=-1,$intPerPage=0)
	{

		$strSql="SELECT * FROM roles";
		$strSql.=" ORDER by roles.pkRoleId";	
		if($intRecordStart!=-1 && $intPerPage!=0)//If Paging Required
			$strSql.=" LIMIT $intRecordStart,$intPerPage";	
		$rsRoles = mysql_query($strSql);
		return $rsRoles;
	}
	
	function GetRightGroups()
	{
		$strSql = "SELECT * FROM `right_groups`";
		$rsSql = mysql_query($strSql);
		if($rsSql && mysql_num_rows($rsSql)>0)
			return $rsSql;
		else
			return 0;
	}

	function RightsList($intRecordStart=-1,$intPerPage=0)
	{

		$strSql="SELECT * FROM rights,right_groups where rights.fkGroupId=right_groups.pkId order by fkGroupId,pkRightId";	
		if($intRecordStart!=-1 && $intPerPage!=0)					//If Paging Required
			$strSql.=" LIMIT $intRecordStart,$intPerPage";	
		$rsRights = mysql_query($strSql);
		if($rsRights && mysql_num_rows($rsRights)>0)
			return $rsRights;
		else
			return 0;
	}

	function AddRightInRole()
	{
		$strSql = "INSERT INTO `rolesrights` (pkRoleId,pkRightId) VALUES (".$this->m_intRoleId.",'".$this->m_intRightId."')";
		$rsSql = mysql_query($strSql);
		if(mysql_affected_rows()>0) return TRUE;
		else return FALSE; 
	}

	function IsRoleAssigned()
	{
		$strSql = "SELECT * FROM `admin_user_roles` WHERE pkRoleId=".$this->m_intRoleId;
		$rsSql = mysql_query($strSql);
		if($rsSql && mysql_num_rows($rsSql)>0)
			return 1;
		else return 0;
	}

	function CheckRightInRole()
	{
		$strSql = "SELECT * FROM `rolesrights` WHERE pkRoleId = ".$this->m_intRoleId." and pkRightId=".$this->m_intRightId;
		$rsSql = mysql_query($strSql);
		if($rsSql && mysql_num_rows($rsSql)>0)
			return 1;
		else
			return 0;
	}

	function DeleteRoleRights()
	{
		$strSql = "DELETE FROM `rolesrights` WHERE pkRoleId = ".$this->m_intRoleId;
		$rsSql = mysql_query($strSql);
		if(mysql_affected_rows()>0)
			return TRUE;
		else
			return FALSE;
	}
}
?>