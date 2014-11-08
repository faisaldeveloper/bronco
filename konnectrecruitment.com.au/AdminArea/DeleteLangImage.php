<?
	require_once("../Includes/BackOfficeIncludesFiles.php");
	//--------------Checking for right---------------------
	$objAdminUser=new clsAdminUser();
	$objAdminUser->m_objRoles=new clsRoles();
	$objAdminUser->m_intUserId=$_SESSION['intUserId'];
	$objAdminUser->m_objRoles->m_intRightId=29;
	if($objAdminUser->CheckRightForAdmin()==1)
	{
		$nLanguageID = $_GET['hdnLangID'];
		/***
			server side validation
		**/
		if(!isset($_REQUEST['hdnLangID']) || empty($_REQUEST['hdnLangID']))
		{
			header("Location:ManageInterfaceLang.php?intMessage=102");
			exit;
		}
	
		$intInsert = $objLanguage->DeleteLangImage($nLanguageID);
		if($intInsert)
			header("location:ManageInterfaceLang.php?intMessage=318");
		else
			header("location:ManageInterfaceLang.php?intMessage=336");
	}
	else
		header("location:Error.php");//End Right If
?>
