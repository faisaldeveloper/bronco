<?php
	/**starting session**/
	session_start();
	/**include files**/
	require_once("../Includes/Configuration.inc.php");
	require_once("../Includes/clsConfiguration.php");
	include("../Includes/db.php");
	require_once("../Includes/clsRoles.php");
	require_once("../Includes/clsAdminUser.php");
	require_once("../Includes/clsLanguage.php");
	$objLanguage = new clsLanguage();
	/**Server Side Validation Against Field Values**/
	if(!isset($_POST['txtUserName']) || empty($_POST['txtUserName']))
	{
		header("location:AdminLogin.php?intMessage=68");
		exit;
	}	
	if(!isset($_POST['txtUserPass']) || empty($_POST['txtUserPass']))
	{
		header("location:AdminLogin.php?intMessage=55");
		exit;
	}
	/**creating new object of admin user class**/
	$objAdminUser = new clsAdminUser();
	$objAdminUser->m_objRoles=new clsRoles();
	$rsAdminUser=$objAdminUser->ListOfAdminUser();
	
	/**getting and assigning values to variables**/
	if(isset($_POST['txtUserName']) && !empty($_POST['txtUserName']))
		$strUserName = $_POST['txtUserName'];
	if(isset($_POST['txtUserPass'])&& !empty($_POST['txtUserPass']))
		$strUserPass = $_POST['txtUserPass'];
	
	$strUserName = ereg_replace("[\'\")(;|`,<>]", "", $strUserName);
	$strUserName = mysql_real_escape_string($strUserName);
	
	$strUserPass = ereg_replace("[\'\")(;|`,<>]", "", $strUserPass);
	$strUserPass = mysql_real_escape_string($strUserPass);
	
	/**assigning values to class variables**/
	$objAdminUser->m_strUserName = $strUserName;
	$objAdminUser->m_strUserPass = sha1($strUserPass);
	
	/**calling the function to verify the login information**/
	$strUserInfo = $objAdminUser->VarifyAdminUser();
	if(!$strUserInfo)
	{
		header("location:AdminLogin.php?intMessage=1");	
		exit;
	}
	else 
	{
		/**assigning user info values to Session**/
		$arrUserInfo = mysql_fetch_object($strUserInfo);
		$_SESSION['intLangId'] = intval($objLanguage->GetDefaultLang());//Setting Default Language
		$_SESSION['strDsUserName'] = $arrUserInfo->UserName;
		$_SESSION['intUserId']   = intval($arrUserInfo->pkUserId);
		$_SESSION['intUserType'] = $arrUserInfo->fkUserType;
		session_write_close();
		header("location:ControlPanel.php");
		exit();
	}
?>