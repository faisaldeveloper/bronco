<?php
include("../Includes/BackOfficeIncludesFiles.php");
////////////////Role Rights Implementation///////////////////
//--------------Checking for right---------------------
	$objAdminUser=new clsAdminUser();
	$objAdminUser->m_objRoles=new clsRoles();
	$objAdminUser->m_intUserId=$_SESSION['intUserId'];
	$objAdminUser->m_objRoles->m_intRightId=21;
	if($objAdminUser->CheckRightForAdmin()==1)
	{
	///////////////Creating Class Objects////////////////
		$objPages = new clsPages();
	//////////////Checking for Values///////////////////
	if(!isset($_REQUEST['hdnPageId']))
	{
		header("location:ManagePages.php?intMessage=354");
		exit;
	}
	
	////////////Initializing Variables//////////////
	$intPageId = 0;
	$intParentId = 0;
	$intLangId = $_SESSION['intLangId'];
	$strSearch = "";
	$nPage = "";
	
	/////////Getting values from the query string///////
	if(isset($_REQUEST['hdnLangId']))
		$nLangId = $_REQUEST['hdnLangId'];
	if(isset($_REQUEST['hdnPageId']))
		$intPageId = $_REQUEST['hdnPageId'];
	if(isset($_REQUEST['hdnParentId'])) 
		$nParentId = $_REQUEST['hdnParentId'];
	if(isset($_REQUEST['hdnSearch'])) 
		$strSearch = $_REQUEST['hdnSearch'];
	if(isset($_REQUEST['hdnPage'])) 
		$nPage = $_REQUEST['hdnPage'];
	
	$arrQryStr[]="hdnParentId=".$nParentId;
	$arrQryStr[]="txtSearch=".$strSearch;
	$arrQryStr[]="lstLanguage=".$nLangId;
	$arrQryStr[]="txtSearch=".$strSearch;
	$arrQryStr[]="intPage=".$nPage;
	$strQryStr=implode('&',$arrQryStr);
	///////////Transfering values to class variables/////////	
	$objPages->m_intPageId = $intPageId;
	$objPages->m_intLangId = $nLangId;
	$intResult = $objPages->DeletePage();
	if($intResult)
		header("location:ManagePages.php?btnView=yes&lstLanguage=${intLangId}&intMessage=212&".$strQryStr);
	else
		header("location:ManagePages.php?btnView=yes&lstLanguage=${intLangId}&intMessage=213&".$strQryStr);
	}
else
	header("location:Error.php");
?>