<?php
require_once("../Includes/BackOfficeIncludesFiles.php");
////////////////Role Rights Implementation///////////////////
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=22;

if($objAdminUser->CheckRightForAdmin()==1)
{
//////////////Object Creation///////////////////
$objPages = new clsPages();
/////////////Serverside Validation///////////////
if(!isset($_REQUEST['hdnPageId']))
{
	header("location:ManagePages.php?intMessage=355");
	exit;
}
///////////////Initializing Variables/////////////////
$intPageId = 0;
$intParentId = 0;
$intLangId = $_SESSION['intLangId'];
$strPageName = "";
$strPageTitle = "";
$strMetatagDesc = "";
$strMetaTagKW = "";
$strPageContents = "";
//////////Getting Values from query string////////////
if(isset($_POST['hdnLangId']) || !empty($_POST['hdnLangId']))
	{
	$intLangId = $_POST['hdnLangId'];
	$arrQryStr[]="hdnLangId=".urlencode($_POST['hdnLangId']);
	}
if(isset($_POST['hdnPageId']) || !empty($_POST['hdnPageId'])) 
	{
	$intPageId = $_POST['hdnPageId'];
	$arrQryStr[]="hdnPageId=".urlencode($_POST['hdnPageId']);
	}
if(isset($_REQUEST['hdnParentId']) || !empty($_POST['hdnParentId'])) 
	{
	$intParentId = $_REQUEST['hdnParentId'];
	$arrQryStr[]="hdnParentId=".urlencode($_POST['hdnParentId']);
	}
if(isset($_POST['txtPageName']) || !empty($_POST['txtPageName'])) 
	{
	$strPageName = $_POST['txtPageName'];
	$arrQryStr[]="txtPageName=".urlencode($_POST['txtPageName']);
	}
if(isset($_POST['txtPageTitle']) || !empty($_POST['txtPageTitle'])) 
	{
	$strPageTitle = $_POST['txtPageTitle'];
	$arrQryStr[]="txtPageTitle=".urlencode($_POST['txtPageTitle']);
	}
if(isset($_POST['txtMetatagDesc']) || !empty($_POST['txtMetatagDesc'])) 
	$strMetatagDesc = $_POST['txtMetatagDesc'];
if(isset($_POST['txtMetaTagKW']) || !empty($_POST['txtMetaTagKW'])) 
	$strMetaTagKW = $_POST['txtMetaTagKW'];
if(isset($_POST['report']) || !empty($_POST['report'])) 
	$strPageContents = $_POST['report'];
	
$strQry = implode('&',$arrQryStr);	//constructing querystring
	//////////ServerSide validation///////////////////
if(!isset($_POST['txtPageName']) || empty($_POST['txtPageName']))
{
	header("Location:TranslatePage.php?intMessage=356&".$strQry);
	exit;
}
if(!isset($_POST['txtPageTitle']) || empty($_POST['txtPageTitle']))
{
	header("Location:TranslatePage.php?intMessage=357&".$strQry);
	exit;
}
////////////Transfering Values to class variables///////////////
$objPages->m_intPageId = $intPageId;
$objPages->m_intParentId = $intParentId;
$objPages->m_intLangId = $intLangId; 
$objPages->m_strPageName = $strPageName; 
$objPages->m_strPageTitle = $strPageTitle;
$objPages->m_strMetaTagsDesc = $strMetatagDesc; 
$objPages->m_strMetaTagsKW = $strMetaTagKW; 
$objPages->m_strPageContents = $strPageContents;
$intUpDate = $objPages->TranslatePage();
if($intUpDate) 
	header("location:ManagePages.php?intMessage=210&hdnPageId=${intParentId}&lstLanguage=${intLangId}&hdnParentId=${intParentId}");
else	
	header("location:ManagePages.php?intMessage=211&hdnPageId=${intParentId}&lstLanguage=${intLangId}&hdnParentId=${intParentId}");
}
else
	header("location:Error.php");
?>