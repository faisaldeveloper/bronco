<?php
require_once("../Includes/BackOfficeIncludesFiles.php");
////////////////Role Rights Implementation///////////////////
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=201;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{
$objConfMsg = new clsConfirmMessage();
$intLangId = $_REQUEST['hdnLangId'];
$intConfMsgId = $_REQUEST['hdnConfMsgId'];
$intPageId=$_REQUEST['hdnPageId'];

$objConfMsg=new clsConfirmMessage();
$objConfMsg->m_intLangId=$intLangId;
$objConfMsg->m_intConfMsgId=$intConfMsgId;

$intResult=$objConfMsg->DeleteMessages();

if($intResult)
	header("location:ManageConfirmMessage.php?intMessage=250&intPage=".$intPageId."");
else
	header("location:ManageConfirmMessage.php?intMessage=251&intPage=".$intPageId."");
}
else
	header("location:Error.php");//End Right If
?>