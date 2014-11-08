<?php
require_once("../Includes/BackOfficeIncludesFiles.php");
///////////////Creating Class Objects////////////////
$objPages= new clsPages();
//////////////Checking for Values///////////////////
if(!isset($_REQUEST['hdnPageId']))
{
	header("location:ManagePages.php?intMessage=349");
	exit;
}
////////////////Initializing Variables//////////////
$nLangId = $_SESSION['intLangId'];
$intPageId = "";
$nParentId = "";
$strSearch = "";
$arrQryStr=array();
$nPage = "";
///////////////Getting Values from the query string///////
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
if(isset($_POST['chkModule']) && !empty($_POST['chkModule']))
{
	$objPages->m_arrModulesIds = $_POST['chkModule'];
	$objPages->m_arrModulesPos = $_POST['lstPosition'];
	$objPages->m_arrModulesRank = $_POST['lstRank'];
	//print_r($_POST);exit;
	$arrModules = $objPages->AddPageModule();
	if($arrModules)
		header("location:ManagePages.php?intMessage=154&".$strQryStr);
	else
		header("location:ManagePages.php?intMessage=155&".$strQryStr);
}
else
	header("location:AddModules.php?intMessage=297&".$strQryStr);

?>