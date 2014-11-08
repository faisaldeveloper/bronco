<?php

require_once("../Includes/BackOfficeIncludesFiles.php");
////////////////Role Rights Implementation///////////////////
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=82;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{

/**
Server side validation
**/
if(!isset($_REQUEST['hdnMsgId'])||empty($_REQUEST['hdnMsgId']))
{
	header("location:ManageMessages.php?intMessage=381");
}
/**
Creating class objects
**/
$objMessages = new clsMessages();	
/**
Coping data from query strin to class variables
**/
if(isset($_REQUEST['hdnMsgId']))
	$objMessages->m_intMessageId = $_REQUEST['hdnMsgId'];
if(isset($_REQUEST['hdnLangId']))
	$objMessages->m_intLangId=$_REQUEST['hdnLangId'];
if(isset($_REQUEST['hdnPage']))
	$intPage = $_REQUEST['hdnPage'];

if($objMessages->DeleteMessage())
	header("location:ManageMessages.php?intMessage=90&intPage=${intPage}");
else	
	header("location:ManageMessages.php?intMessage=91&intPage=${intPage}");
}
else
	header("location:Error.php");//End Right If
?>