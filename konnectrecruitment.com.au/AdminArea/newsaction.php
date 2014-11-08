<?php
require_once("../Includes/BackOfficeIncludesFiles.php");
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=52;
$intModuleID=$_REQUEST['hdnModuleId'];
if($objAdminUser->CheckRightForAdmin()==1)
{
	////////////////Create objects of classes////////////////////
		$objNews = new clsNews();
		$objLang = new clsLanguage();
	//////////////Checking for Values///////////////////
		if(!isset($_REQUEST['hdnPage']) || !isset($_REQUEST['chkArrNewsId']))
		{
			header("location:ManageNews.php?intMessage=358&hdnModuleId=".$intModuleID);
			exit;
		}	
	/////////////////// Initialization //////////////////////
	$arrQryStr=array();
	$intLangId = $_SESSION['intLangId'];
	$intPage="";
	/////////////////Getting Values from query string///////////////////
	if(isset($_POST['hdnLangId']))
		$intLangId = $_POST['hdnLangId'];
	if(isset($_POST['hdnPage']))
		$intPage = $_POST['hdnPage'];
	if(!empty($_POST['hdnBtnView']))
		$strBtnView = $_POST['hdnBtnView'];
	$objNews->m_arrNewsId = $_POST['chkArrNewsId'];
	////////////////If the activate button is pressed/////////////////
//--------Checking For Active Right-----------//
$objAdminUser->m_intUserId=$_SESSION['intUserId'];	
$objAdminUser->m_objRoles->m_intRightId=54;
if($objAdminUser->CheckRightForAdmin()==1)
{

	if($_REQUEST['btnActive'])
		{
			$nCheck = $objNews->ActivateSelected();
			if($nCheck)
			{
				header("location:ManageNews.php?intMessage=346&hdnModuleId=".$intModuleID);
				exit;
			}
		}
}//End of Active Right
	////////////////If the deactivate button is pressed/////////////////
$objAdminUser->m_intUserId=$_SESSION['intUserId'];	
$objAdminUser->m_objRoles->m_intRightId=55;
if($objAdminUser->CheckRightForAdmin()==1)
{
	if($_REQUEST['btnDeActive'])
		{
			$nCheck = $objNews->DeActivateSelected();
			if($nCheck)
			{
				header("location:ManageNews.php?intMessage=347&hdnModuleId=".$intModuleID);
				exit;
			}
		}
}//End of DeActive Right
	////////////////If delete button is pressed/////////////////
//--------Checking For Right-----------//
$objAdminUser->m_intUserId=$_SESSION['intUserId'];	
$objAdminUser->m_objRoles->m_intRightId=56;
if($objAdminUser->CheckRightForAdmin()==1)
{
	if(isset($_POST['chkArrNewsId']))
		{
			$objNews->m_arrNewsId = $_POST['chkArrNewsId'];
			$objNews->m_intLangId = $intLangId;
			$nCheck = $objNews->DeleteSelected();
			header("location:ManageNews.php?intMessage=44&hdnModuleId=".$intModuleID);
			exit;
			if(!empty($_POST['hdnBtnView']))
			 header("location:ManageNews.php?btnView=${strBtnView}&lstEvents=${intEventId}&lstLanguage=${intLangId}&intPage=${intPage}&hdnModuleId=".$intModuleID);
			else
			 header("location:ManageNews.php?intPage=${intPage}");
		}
	else 
		 header("location:ManageNews.php?btnView=yes&lstEvents=${intEventId}&lstLanguage=${intLangId}&intPage=${intPage}&hdnModuleId=".$intModuleID);
}//End of DeActive Right

}
else
	header("location:Error.php");//End Right If
?>