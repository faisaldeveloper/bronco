<?php
require_once("../Includes/BackOfficeIncludesFiles.php");
////////////////Role Rights Implementation///////////////////
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=199;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{
/////////Validation//////////
if(!isset($_POST['hdnConfMsgId'])||empty($_POST['hdnConfMsgId']))
	{
	header("location:ManageConfirmMessage.php?intMessage=273");
	exit;
	}
////////////create class objects////////////
$objConfMsg=new clsConfirmMessage();
///////////////Variable initialization//////////////
$intLangId = $_SESSION['intLangId'];
$intConfMsgId = "";
$arrQryStr=array();
$strConfMsgDesc = "";
$intIndicator=0;
$intImage=0;
$arrConcept = array();
//////////copying values from query string////////////////

if($_REQUEST['lstConcept'])
{
	$arrConcept=$_REQUEST['lstConcept'];
	$arrQryStr[] = "lstConcept=".urlencode($_POST['lstConcept']);
}

if(isset($_POST['hdnLangId'])) 
{
	$intLangId = $_POST['hdnLangId'];
	$arrQryStr[] = "hdnLangId=".urlencode($_POST['hdnLangId']);
}
if(isset($_POST['hdnConfMsgId'])) 
{
	$intConfMsgId = $_POST['hdnConfMsgId'];
	$arrQryStr[] = "hdnConfMsgId=".urlencode($_POST['hdnConfMsgId']);
}
if(isset($_POST['txtConfMsgDesc'])) 
{
	$strConfMsgDesc= $_POST['txtConfMsgDesc']; 
	$arrQryStr[] = "txtConfMsgDesc=".urlencode($_POST['txtConfMsgDesc']);
}
if(isset($_REQUEST['intPage']))
{
	$intPage=$_REQUEST['intPage'];
	$arrQryStr[] = "intPage=".urlencode($_POST['intPage']);
}
if($_POST['rdIndicator']==1)
	$intIndicator=1;
if($_POST['rdImage']==1)
	$intImage=1;
$strQry = implode('&',$arrQryStr);	//constructing Query String
//print_r($strQry);exit;
/////////Serverside validation////////////
//&& !isset($_REQUEST['lstConcept'])||empty($_REQUEST['lstConcept']) || 
if(!isset($_REQUEST['txtConfMsgDesc'])||empty($_REQUEST['txtConfMsgDesc']) && !isset($_REQUEST['lstConcept'])||empty($_REQUEST['lstConcept'])  )
		{
			header("location:EditConfirmMessage.php?intMessage=365&".$strQry);
			exit;
		}
////////////Transfering data to class variables//////////////
$objConfMsg->m_intConfMsgId = $intConfMsgId;
$objConfMsg->m_intLangId = $intLangId; 
$objConfMsg->m_strConfMsgDesc = $strConfMsgDesc; 
$objConfMsg->m_intIndicator = $intIndicator; 
$objConfMsg->m_intImage = $intImage; 
$objConfMsg->arrConcept=$arrConcept;
$intUpDate = $objConfMsg->EditMessage();
	if($intUpDate==1) 
		header("location:ManageConfirmMessage.php?intPage=".$intPage."&intMessage=254&lstLanguage=$intLangId&strAction=Updated");
	else if($intUpDate==2) 
		header("location:ManageConfirmMessage.php?intPage=".$intPage."&intMessage=255&lstLanguage=$intLangId&strAction=Updated");
	else	
		header("location:ManageConfirmMessage.php?intPage=".$intPage."&intMessage=257&lstLanguage=$intLangId&strAction=Updated");
}
else
	header("location:Error.php");//End Right If
?>