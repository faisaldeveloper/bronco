<?php
include("../Includes/BackOfficeIncludesFiles.php");
////////////////Role Rights Implementation///////////////////
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=18;

if($objAdminUser->CheckRightForAdmin()==1)
{

///////////////Creating Class Objects////////////////
$objPages= new clsPages();
//////////////Checking for Values///////////////////
if(!isset($_REQUEST['hdnPageId']))
{
	header("location:ManagePages.php?intMessage=209");
	exit;
}
////////////////Initializing Variables//////////////
$nLangId = $_SESSION['intLangId'];
$intPageId = "";
$nParentId = "";
$strSearch = "";
$arrQryStr=array();
$nPage = "";
///////////////Getting Values from the query string/////////////
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
////////////Transfering values to class variables////////////
$objPages->m_intPageId = $intPageId;
$objPages->m_intParentId = $intParentId;
if(isset($_POST['chkModule']))
{
	$objPages->m_arrModulesIds = $_POST['chkModule'];
	$objPages->m_arrModulesPos = $_POST['lstPosition'];
	$objPages->m_arrModulesRank = $_POST['lstRank'];
}
else
	$objPages->m_arrModulesIds = 0;
if(isset($_POST['btnUpdate']))
	$arrModules = $objPages->UpdatePageModule();
else
	$arrModules = $objPages->DeletePageModule();
if ($arrModules)
header("location:ManagePages.php?intMessage=208&".$strQryStr);
else
header("location:ManagePages.php?intMessage=209&".$strQryStr);
}
else
	header("location:Error.php");
?>