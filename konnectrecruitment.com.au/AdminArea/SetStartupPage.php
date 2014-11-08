<?php
include("../Includes/BackOfficeIncludesFiles.php");
////////////////Role Rights Implementation///////////////////
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=6;

if($objAdminUser->CheckRightForAdmin()==1)
{

///////////////Creating Class Objects////////////////
$objPages = new clsPages();
//////////////Checking for Values///////////////////
if(!isset($_REQUEST['hdnPageId']) || empty($_REQUEST['hdnPageId']))
{
	header("location:ManagePages.php");
	exit;
}
////////////////Initializing Variables//////////////
$arrQryStr=array();	
$nParentId = 0;
$intPageId = "";
$strSearch = "";
$nLangId = $_SESSION['intLangId'];
///////////////Getting Values from the query string///////
if(isset($_REQUEST['hdnLangId']))
	$nLangId = $_REQUEST['hdnLangId'];
if(isset($_REQUEST['hdnPageId']))
	$intPageId = $_REQUEST['hdnPageId'];
if(isset($_REQUEST['hdnParentId'])) 
	$nParentId = $_REQUEST['hdnParentId'];
if(isset($_REQUEST['txtSearch'])) 
	$strSearch = $_REQUEST['txtSearch'];
if(isset($_REQUEST['intPage'])) 
	$nPage = $_REQUEST['intPage'];

$arrQryStr[]="hdnParentId=".$nParentId;
$arrQryStr[]="txtSearch=".$strSearch;
$arrQryStr[]="lstLanguage=".$nLangId;
$arrQryStr[]="txtSearch=".$strSearch;
$arrQryStr[]="intPage=".$nPage;
$strQryStr=implode('&',$arrQryStr);
////////////Transfering values to class variables////////////
$objPages->m_intLangId = $nLangId;
$objPages->m_intPageId = $intPageId;
$intResult = $objPages->SetStartupPage();
if($intResult)
	header("location:ManagePages.php?intMessage=160&".$strQryStr);
else
	header("location:ManagePages.php?intMessage=161&".$strQryStr);
}
else
	header("location:Error.php");
?>