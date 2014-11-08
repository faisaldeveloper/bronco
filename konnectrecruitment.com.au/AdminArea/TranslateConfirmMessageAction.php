<?php 
include("../Includes/BackOfficeIncludesFiles.php");
////////////////Role Rights Implementation///////////////////
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=200;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{
///////////Validation////////////
if(!isset($_POST['hdnConfMsgId']) || empty($_POST['hdnConfMsgId']))
{
	header("location:ManageConfirmMessage.php?intMessage=372");
	exit;
}
/////////Class object initialization/////////
$objConfMsg=new clsConfirmMessage();
//////////Variable Initializaion////////////
$arrQryStr=array();
$intConfMsgId = "";
$intLangId = "";
$intLangId1 = "";
$strConfMsgDesc = "";
$intPageId = "";
////////////Coping data from string query////////
if(isset($_POST['hdnConfMsgId']))
	{
	$arrQryStr[] = "hdnConfMsgId=".urlencode($_POST['hdnConfMsgId']);
	$intConfMsgId=$_POST['hdnConfMsgId'];
	}
if(isset($_POST['lstLangId']))
	{
	$arrQryStr[] = "lstLangId=".urlencode($_POST['lstLangId']);
	$intLangId=$_POST['lstLangId'];
	}
if(isset($_POST['hdnLangId']))
	{
	$arrQryStr[] = "hdnLangId=".urlencode($_POST['hdnLangId']);
	$intLangId1=$_POST['hdnLangId'];
	}
if(isset($_POST['txtConfMsgDesc']))
	{
	$arrQryStr[] = "txtConfMsgDesc=".urlencode($_POST['txtConfMsgDesc']);
	$strConfMsgDesc=$_POST['txtConfMsgDesc'];
	}
	if(isset($_REQUEST['intPage']))
	{
		$arrQryStr[] = "intPage=".urlencode($_POST['intPage']);
		$intPage=$_REQUEST['intPage'];
	}
	$strQry = implode('&',$arrQryStr);	//constructing 
	//print_r($strQry);exit;
	/////////////Server side validation////////
	if(!isset($_POST['txtConfMsgDesc'])||empty($_POST['txtConfMsgDesc'])||!isset($_POST['lstLangId'])||empty($_POST['lstLangId']))
	{
		header("location:TranslateConfirmMessage.php?intMessage=365&".$strQry);
		exit;
	}
////////////transfering data to class variables/////////
$objConfMsg->m_intConfMsgId=$intConfMsgId;
$objConfMsg->m_intLangId=$intLangId;
$objConfMsg->m_strConfMsgDesc=$strConfMsgDesc;

$iCheck=$objConfMsg->TranslateMessage();
if($iCheck)
	header("location:ManageConfirmMessage.php?intMessage=260&".$strQry);
else
	header("location:ManageConfirmMessage.php?intMessage=88&".$strQry);
}
else
	header("location:Error.php");//End Right If
	
?>