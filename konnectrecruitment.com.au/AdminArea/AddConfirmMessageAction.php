<?php
	require_once("../Includes/BackOfficeIncludesFiles.php");
////////////////Role Rights Implementation///////////////////
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=198;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{
		////////class objects initialization///////////
		$objConfMsg=new clsConfirmMessage();
		///////////////Variables initialization///////////////
		$arrQryStr=array();
		$intIndicator=0;
		$intImage=0;
		$strConfMsgDesc = "";
		$intLangId = "";
		$intPage = "";
	//	$arrConcept = array();
		//////////Coping data from query string//////////
		if(isset($_POST['txtConfMsgDesc']))
			{
			$arrQryStr[] = "txtConfMsgDesc=".urlencode($_POST['txtConfMsgDesc']);
			$strConfMsgDesc=$_POST['txtConfMsgDesc'];
			}
		if(isset($_POST['lstLangId']))
			{
			$arrQryStr[] = "lstLangId=".urlencode($_POST['lstLangId']);
			$intLangId=$_POST['lstLangId'];
			}
		if(isset($_REQUEST['intPage']))
			{
			$arrQryStr[] = "intPage=".urlencode($_POST['intPage']);
			$intPage = $_REQUEST['intPage'];
			}
	/*	if($_REQUEST['lstConcept']) 
			{
			$arrQryStr[] = "lstConcept=".urlencode($_POST['lstConcept']);
			$arrConcept=$_REQUEST['lstConcept'];
			}
		*/
		if($_POST['rdIndicator']==1)
			{
			$arrQryStr[] = "rdIndicator=".urlencode($_POST['rdIndicator']);
			$intIndicator=1;
			}
		if($_POST['rdFlag']==1)
			{
			$arrQryStr[] = "rdFlag=".urlencode($_POST['rdFlag']);
			$intImage=1;
			}
			$strQry = implode('&',$arrQryStr);	//constructing Query string
			//!isset($_REQUEST['lstConcept'])||empty($_REQUEST['lstConcept']) || 
			if(!isset($_REQUEST['txtConfMsgDesc'])||empty($_REQUEST['txtConfMsgDesc'])||!isset($_REQUEST['lstLangId'])||empty($_REQUEST['lstLangId']))
			{
				header("location:AddConfirmMessage.php?intMessage=365&".$strQry);
				exit;
			}
		/////////Coping data to class variables/////	
		$objConfMsg->m_intLangId=$intLangId;
		$objConfMsg->m_strConfMsgDesc=$strConfMsgDesc;
		$objConfMsg->m_intImage=$intImage;
		$objConfMsg->m_intIndicator=$intIndicator;
	//	$objConfMsg->arrConcept=$arrConcept;
		$intCheck=$objConfMsg->AddMessages();
		if($intCheck==2)
			header("Location:ManageConfirmMessage.php?intMessage=253&lstLanguage=$intLangId&strAction=Add");
		if($intCheck==1)
			header("Location:ManageConfirmMessage.php?intMessage=252&lstLanguage=$intLangId&strAction=Add&intPage=${intPage}");
		else
			header("Location:ManageConfirmMessage.php?intMessage=256&lstLanguage=$intLangId&strAction=Add&intPage=${intPage}");
}
else
	header("location:Error.php");//End Right If
?>