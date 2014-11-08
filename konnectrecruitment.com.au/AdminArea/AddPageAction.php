<?php
require_once("../Includes/BackOfficeIncludesFiles.php");
////////////////Role Rights Implementation///////////////////
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=23;

if($objAdminUser->CheckRightForAdmin()==1)
{

////////////////Create objects of class////////////////////
$objPages = new clsPages();
//////////////Checking for Values///////////////////
if(!isset($_REQUEST['hdnParentId']))
{
	header("location:ManagePages.php");
	exit;
}
/////// Initialization ////////////////////////////////////
$arrQryStr=array();
$nParentId = 0;
$intLangId = $_SESSION['intLangId'];
$strPageName = "";
$strPageTitle = "";
$strMetatagDesc = "";
$strMetaTagKW = "";
$intShowTopMenu = 0;
$intShowLeftMenu = 0;
$intShowFooter = 0;
$intIsActive = 0;
$strPageContents = "";
$nPageRank = "";
$nIsStartup = 0;
///////////////////////Getting Values ////////////////////////////////
if(isset($_REQUEST['hdnParentId'])) 
	{
	$nParentId = $_REQUEST['hdnParentId'];
	$arrQryStr[] = "hdnParentId=".urlencode($_POST['hdnParentId']);
	}
if(isset($_POST['lstLangId'])) 
	$intLangId = $_POST['lstLangId'];
if(isset($_POST['txtPageName'])) 
	{
	$strPageName = $_POST['txtPageName'];
	$arrQryStr[] = "txtPageName=".urlencode($_POST['txtPageName']);
	}
if(isset($_POST['txtPageTitle'])) 
	{
	$strPageTitle = $_POST['txtPageTitle'];
	$arrQryStr[] = "txtPageTitle=".urlencode($_POST['txtPageTitle']);
	}
if(isset($_POST['txtMetatagDesc'])) 
	$strMetatagDesc = $_POST['txtMetatagDesc'];
if(isset($_POST['txtMetaTagKW'])) 
	$strMetaTagKW = $_POST['txtMetaTagKW'];
if(isset($_POST['chkShowTopMenu'])) 
	$intShowTopMenu = 1;
if(isset($_POST['chkShowLeftMenu'])) 
	$intShowLeftMenu = 1;
if(isset($_POST['chkShowFooter'])) 
	$intShowFooter = 1;
if(isset($_POST['report'])) 
	$strPageContents = RTESafe($_POST['report']);
if(isset($_POST['lstPageRank'])) 
	$nPageRank = $_POST['lstPageRank'];
	$arrQryStr[] = "lstPageRank=".urlencode($_POST['lstPageRank']);
	$strQry = implode('&',$arrQryStr);	//constructing querystring

/////////////////ServerSide Validation//////////////////////////
if(!isset($_POST['txtPageName']) || empty($_POST['txtPageName'])) 
	{
	header("location:AddPage.php?intMessage=356&".$strQry); 
	exit;
	}
if(!isset($_POST['txtPageTitle']) || empty($_POST['txtPageTitle'])) 
	{
	header("location:AddPage.php?intMessage=357&".$strQry); 
	exit;
	}
//////////////Transfer values to class variables///////////////
$objPages->m_intParentId = $nParentId;
$objPages->m_intLangId = $intLangId;
$objPages->m_strPageName = $strPageName; 
$objPages->m_strPageTitle = $strPageTitle;
$objPages->m_strMetaTagsDesc = $strMetatagDesc; 
$objPages->m_strMetaTagsKW = $strMetaTagKW; 
$objPages->m_strPageContents = $strPageContents;
$objPages->m_intShowTopMenu = $intShowTopMenu; 
$objPages->m_intShowLeftMenu = $intShowLeftMenu; 
$objPages->m_intShowFooter = $intShowFooter; 
$objPages->m_intIsActive = $intIsActive;
$objPages->m_nRank = $nPageRank;
$objPages->m_nIsStartup = $nIsStartup;
$objPages->m_intPageType = CONST_PAGETYPE_DYNAMIC;
$strPageUrl=ExcludeSpecialCharacters($strPageName);
$objPages->m_strPageUrl=$strPageUrl;

$strInsert = $objPages->AddNewPage();	
	if($strInsert==="Exists")
	{
		header("location:ManagePages.php?intMessage=313&".$strQry); 
		exit;
	}
	else
		if($strInsert===true)
		{	
			header("location:ManagePages.php?intMessage=152&hdnParentId=${nParentId}");
			exit();
		}
		else
		{
			header("location:ManagePages.php?intMessage=153&hdnParentId=${nParentId}");
			exit();
		}
}
else
	header("location:ManagePages.php");

?>