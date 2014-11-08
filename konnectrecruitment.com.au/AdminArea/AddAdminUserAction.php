<?php
	require_once("../Includes/BackOfficeIncludesFiles.php");
////////////////Role Rights Implementation///////////////////
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=8;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{
	/**
		Getting Labels
	**/
	$objMessage=new clsMessages();
	$objMessage->m_intLangId=$_SESSION['intLangId'];
	$objMessage->m_intConId=CONST_CONCEPT_EDIT_PROFILE;
	$arrLabels=$objMessage->GetLabels();
	
	/**
		assigning values to variables
	**/
	$strUserName=$_POST['txtUserName'];
	$strNewPassword=$_POST['txtPass'];
	$intAdminUser=1;

	/**
		Server side Valiodation
	**/
	if(isset($_POST['txtUserName']) || !empty($_POST['txtUserName']))
	{
		$arrQryStr[]="strUserName=".urlencode($_POST['txtUserName']);
		$strUserName = $_POST['txtUserName'];
	}
	/**
		Constructing a query string in an array
	**/
		$strQry = implode('&',$arrQryStr);

	 /**
	 	To Check if not Set (Server Side Validation)
	 **/
	if(!isset($_POST['txtUserName']) || empty($_POST['txtUserName']))
	{
		header("Location:AddAdminUser.php?intMessage=68&".$strQry);
		exit;
	}
	if(!isset($_POST['txtPass']) || empty($_POST['txtPass']))
	{
		header("Location:AddAdminUser.php?intMessage=55&".$strQry);
		exit;
	}
	if(!isset($_POST['txtCPass']) || empty($_POST['txtCPass']))
	{
		header("Location:AddAdminUser.php?intMessage=85&".$strQry);
		exit;
	}
	if(isset($_POST['txtPass']) && isset($_POST['txtCPass']))
	{
		if($_POST['txtPass'] != $_POST['txtCPass'])
		{
			header("Location:AddAdminUser.php?intMessage=97&".$strQry);
			exit;
		}
	}

	$objAdminUser=new clsAdminUser();
	$objAdminUser->m_strUserName=$strUserName;
	$objAdminUser->m_strUserPass=$strNewPassword;
	$objAdminUser->m_intUserTypeId=$intAdminUser;
	$intCheck=$objAdminUser->AddNewAdminUser();
		if($intCheck)
		{		
			$objAdminUser->m_objRoles=new clsRoles();
			$rsUser=$objAdminUser->GetLatestAdminUserId();
			$strUser=mysql_fetch_array($rsUser);
			$objAdminUser->m_intUserId=$strUser['pkUserId'];
			if(isset($_POST['chkRole']))
			{	
				foreach($_POST['chkRole'] as $i)
				{
					$objAdminUser->m_objRoles->m_intRoleId=(int)$i;
					$objAdminUser->AssignRoleToUser();
				}
			}
			header("Location:ListOfAdminUser.php?intMessage=92");
		}	
		else
			header("Location:ListOfAdminUser.php?intMessage=93");
}
else
	header("location:Error.php");//End Right If
			
?>