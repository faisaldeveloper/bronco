<?php 

//*****************************************************************************************************//
//	Developer : Yasir Abbasi
//	Date:		2 june 2005
//	owner		DS
//*****************************************************************************************************//

require_once("../Includes/BackOfficeIncludesFiles.php");
////////////////Role Rights Implementation///////////////////
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=80;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{
//////////////creating class objects////////////
$objMessages = new clsMessages();	//Create message object
/////////////////Variable Initialization///////////////////
$arrQryStr=array();
$arrConcept = "";
$intPage=0;
$strMsgDesc = "";
$nLangId = $_SESSION['intLangId'];
/////////////getting values from string query///////////
//for internal o ffice
if($_REQUEST['lstConcept'])
	{
	$arrConcept=$_REQUEST['lstConcept'];
	}

if(isset($_REQUEST['intPage']))
	{
	$arrQryStr[] = "intPage=".urlencode($_POST['intPage']);
	$intPage = $_REQUEST['intPage'];
	}
if(isset($_REQUEST['txtLeft']))
	{
	$arrQryStr[] = "txtLeft=".urlencode($_POST['txtLeft']);
	$strMsgDesc = $_REQUEST['txtLeft'];
	}
	$strQry = implode('&',$arrQryStr);	//constructing 
	
//!isset($_REQUEST['lstConcept'])||empty($_REQUEST['lstConcept'])||	
if(!isset($_REQUEST['txtLeft'])||empty($_REQUEST['txtLeft']))
{
	header("location:EngMsg.php?intMessage=365&".$strQry);
	exit;
}
///////////////Transfering values to class variables////////////
$objMessages->m_strMessageDesc = $strMsgDesc;
$objMessages->m_intLangId = $nLangId;	//Default Language
$objMessages->arrConcept=$arrConcept;//Concepts to the msg
if($objMessages->AddNewMessage())
	header("location:ManageMessages.php?intMessage=83&strAct=add&intPage=${intPage}");
else
	header("location:EngMsg.php?intMessage=84&strAct=add&intPage=${intPage}");
}
else
	header("location:Error.php");//End Right If
?>
