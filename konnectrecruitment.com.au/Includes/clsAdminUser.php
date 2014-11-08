<?php
/********************************************************************************
* Date 25-05-2005																*
* Author: Talib Siddique (Software Engineer)									*
* Owner: DigitalSpinners														*
*********************************************************************************/

//---------------------  START CLASS FOR ADMIN USERS -------------------------
class clsAdminUser
{
	var $m_intUserId; 
	var $m_strUserName;
	var $m_strUserPass;
	var $m_strUserTypeDesc;
	var $m_intUserTypeId;
	var $m_strUserNewPass;
	var $m_objRoles;
	var $m_strEmail='';
	var $m_strContactPerson='';
	var $m_strCompanyName='';
	var $m_nNeed=0;

	function __construct()
	{
		$this->m_objRoles=new clsRoles();
	}

	function AddNewAdminUser() //------ TO ADD NEW ADMIN USER ---------
	{
		$strSqlCheck = "SELECT * FROM `admin_user_info` WHERE `UserName` = '".$this->m_strUserName."'";
		$rsSqlCheck = mysql_query($strSqlCheck);
		if($rsSqlCheck && mysql_num_rows($rsSqlCheck)>0) 
			return FALSE;
		else
		{ 
			$strSql="INSERT INTO `admin_user_info` (`UserName` , `UserPass` , `fkUserType`,`Email`,`ContactName`,`CompanyName`,`Need`) 
				  VALUES ('".$this->m_strUserName."','".$this->m_strUserPass."','".$this->m_intUserTypeId."','".$this->m_strEmail."','".$this->m_strContactPerson."','".$this->m_strCompanyName."',".$this->m_nNeed.")";
			$intCheck=mysql_query($strSql);
			if(mysql_affected_rows()>0) 
				return TRUE;
			else
				return FALSE;
		}
	}
	function GetLatestAdminUserId() //------ TO Get NEW ADMIN USER Id ---------
	{
		$strSql= "SELECT max(pkUserId) as pkUserId from `admin_user_info`";
		$rsUser= mysql_query($strSql);
		if($rsUser && mysql_num_rows($rsUser)>0) 
			return $rsUser;
		else
			return 0;
	}
	/*function EditAdminUser() //------ TO EDIT ADMIN USER ---------
	{
		$strSql="UPDATE `admin_user_info` SET `fkUserType`=".$this->m_intUserTypeId." WHERE pkUserId=".$this->m_intUserId;
		$intCheck=mysql_query($strSql);
		if(mysql_affected_rows()>0) return TRUE;
		else return FALSE;
	}*/
	function AdminUserDetail() 
	{
		$strSql="SELECT * FROM `admin_user_info` WHERE pkUserId=".$this->m_intUserId;
		$iCheck=mysql_query($strSql);
		if($iCheck && mysql_num_rows($iCheck)>0)
			return $iCheck;
		else
			return FALSE;
	}
	function DeleteAdminUser() //------ TO DELETE ADMIN USER ---------
	{
		$strSql="DELETE FROM `admin_user_info` WHERE pkUserId=".$this->m_intUserId;
		$iCheck=mysql_query($strSql);
		if(mysql_affected_rows()>0)
			return TRUE;
		else
			return FALSE;
	}	
	function ChangePassword() //------ TO CHANGE PASSWORD OF ADMIN USER ---------
	{
		$strSqlCheckPass = "SELECT * FROM `admin_user_info` WHERE UserPass = '".$this->m_strUserPass."' AND pkUserId=".$this->m_intUserId."";
		$intRsCheckPass = mysql_query($strSqlCheckPass);
		if($intRsCheckPass && mysql_num_rows($intRsCheckPass)>0)
		{
			$strSql="UPDATE `admin_user_info` SET `UserPass`='".$this->m_strUserNewPass."' WHERE pkUserId=".$this->m_intUserId."";
			//print $strSql;
			$intCheck=mysql_query($strSql);
			return TRUE;
		}
		else
			return FALSE;
	}
	
	/*function AddNewUserType() //------ TO ADD NEW ADMIN USER TYPE i.e Supper User, Normal User etc ---------
	{
		$strSql="INSERT INTO `admin_user_types` (`UserTypeDesc`)  VALUES ('".$this->m_strUserTypeDesc."')";
		$intCheck=mysql_query($strSql);
		if(mysql_affected_rows()>0) return TRUE;
		else return FALSE;
	}
	function EditUserType() //------ TO EDIT ADMIN USER TYPE ---------
	{
		$strSql="UPDATE `admin_user_types` SET `UserTypeDesc`=".$this->m_strUserTypeDesc." WHERE  pkUserTypeId =".$this->m_intUserTypeId;
		$intCheck=mysql_query($strSql);
		if(mysql_affected_rows()>0) return TRUE;
		else return FALSE;
	}
	function DeleteUserType() //------ TO DELETE ADMIN USER TYPE ---------
	{
		$strSql="DELETE FROM `admin_user_types` WHERE pkUserTypeId=".$this->m_intUserTypeId;
		$iCheck=mysql_query($strSql);
		if(mysql_affected_rows()>0) return TRUE;
		else return FALSE;
	}
	function FillAdminUsers()
	{
		$strSql = "SELECT * FROM `admin_user_types`";
		$rs = mysql_query($strSql);
		return $rs;
	}*/
	
	function VarifyAdminUser()
	{
		
		if(strpos($this->m_strUserName,"'")>-1 || strpos($this->m_strUserPass,"'")>-1)
			return FALSE;
		else
		{
			$strSql = "SELECT * FROM `admin_user_info` WHERE `UserName`='".$this->m_strUserName."' AND `UserPass`='".$this->m_strUserPass."'";
			$rsSql = mysql_query($strSql) or die("Varify Error ".mysql_error());
			if($rsSql && mysql_num_rows($rsSql)>0)
				return $rsSql;
			else
				return FALSE;
		}
	}
	function ListOfAdminUser() 
	{
		$strSql="SELECT * FROM `admin_user_info`";
		$iCheck=mysql_query($strSql);
		if($iCheck && mysql_num_rows($iCheck)>0)
			return $iCheck;
		else
			return FALSE;
	}

/********************************************************************************
* Date 02-07-2005																*
* Modified By: Yasir Abbasi (Software Engineer)									*
*********************************************************************************/

	function AssignRoleToUser()
	{
		$strSql = "INSERT INTO `admin_user_roles` (pkRoleId,pkUserId) VALUES (".$this->m_objRoles->m_intRoleId.",'".$this->m_intUserId."')";
		$rsSql = mysql_query($strSql);
		if(mysql_affected_rows()>0)
			return TRUE;
		else
			return FALSE; 
	}
	function GetAdminRoles()
	{
		$strSql = "SELECT * FROM `admin_user_roles` WHERE pkUserId=".$this->m_intUserId;
		$rsSql = mysql_query($strSql);
		if($rsSql!=NULL)
		{
		if($rsSql && mysql_num_rows($rsSql)>0)
			return $rsSql;
		else
			return 0;
		}
		else
			return 0;
	}
	function CheckRoleForAdmin()
	{
		$strSql = "SELECT * FROM `admin_user_roles` WHERE pkRoleId = ".$this->m_objRoles->m_intRoleId." and pkUserId=".$this->m_intUserId;
		$rsSql = mysql_query($strSql);
		if($rsSql &&  mysql_num_rows($rsSql)>0)
			return 1;
		else
			return 0;
	}
	function DeleteAdminRoles()
	{
		$strSql = "DELETE FROM `admin_user_roles` WHERE pkUserId=".$this->m_intUserId;
		$rsSql = mysql_query($strSql);
		if(mysql_affected_rows()>0)
			return TRUE;
		else
			return FALSE;
	}
	function CheckRightForAdmin()
	{
		$intRight=0;
		$rsAdminRoles=$this->GetAdminRoles();
		if($rsAdminRoles!=0)
		{
			while($strAdminRoles=mysql_fetch_array($rsAdminRoles))
			{
				$this->m_objRoles->m_intRoleId=$strAdminRoles['pkRoleId'];
				if($this->m_objRoles->CheckRightInRole()==1)
					$intRight=1;
			}
		}
		return $intRight;
	}
}	
//------------------ END Modification ------------------------------	
//--------------- END CLASS ADMIN USERS ----------------------------	
?>