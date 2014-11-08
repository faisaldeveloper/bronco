<?php 

//*****************************************************************************************************//
//	Developer : Yasir Abbasi
//	Date:		2 june 2005
//	owner		DS
//*****************************************************************************************************//

require_once("../Includes/BackOfficeIncludesFiles.php");
////////////////Validation/////////////
if(!isset($_REQUEST['hdnMsgId']) || empty($_REQUEST['hdnMsgId']))
{
	header("location:ManageMessages.php?intMessage=372");
	exit;
}
////////////Creating class objects//////////////
	$objLanguage = new clsLanguage();	//Create Language object	
	$objMessages=new clsMessages();		//Create message object
//////////////Variables initialization//////////////////
	$arrQryStr=array();
	$intPage = "";
	$iMsgId = "";
	$arrConcept = array();
	$nLangId = "";
	$strMsgDesc = "";
///////////Getting values from Query string/////////////
	if(isset($_REQUEST['hdnPage']))
		{
		$arrQryStr[] = "intPage=".urlencode($_REQUEST['hdnPage']);
		$intPage = $_REQUEST['hdnPage'];
		}
	if(isset($_REQUEST['hdnMsgId']))
		{
		$arrQryStr[] = "hdnMsgId=".urlencode($_REQUEST['hdnMsgId']);
		$iMsgId=$_REQUEST['hdnMsgId'];	//Get Message ID
		}
	if(isset($_REQUEST['hdnLang']))
		{
		$arrQryStr[] = "hdnLang=".urlencode($_REQUEST['hdnLang']);
		$nLangId=$_REQUEST['hdnLang'];	//Get Message ID
		}
	if(isset($_REQUEST['txtEngMsg']))
		{
		$arrQryStr[] = "txtEngMsg=".urlencode($_REQUEST['txtEngMsg']);
		$strMsgDesc=$_REQUEST['txtEngMsg'];	//Get Message ID
		}
	
	/**
		Constructing a query string in an array
	**/
	$strQry = implode('&',$arrQryStr);


	if(isset($_REQUEST['hdnAct']))	//Incase For Edit Message action is set to edit
	{ 
	
	/**
	 	To Check if not Set (Server Side Validation) 
	 **/
	 //
	if(!isset($_REQUEST['txtEngMsg']) || empty($_REQUEST['txtEngMsg']) && !isset($_REQUEST['lstConcept']) || empty($_REQUEST['lstConcept']))
	{
		header("Location:ManageMessages.php?intMessage=282&".$strQry);
		exit;
	}

		if($_REQUEST['lstConcept'])
		$arrConcept=$_REQUEST['lstConcept'];
		//////////////////Coping values to class variables///////
		$objMessages->arrConcept=$arrConcept;
		$objMessages->m_intLangId=$nLangId;			//Get Language ID of message
		$objMessages->m_strMessageDesc=$strMsgDesc;	//Get Description of message
		$rsMessages=$objMessages->GetMessageDetail();			//Get Message Detail on basis of description
		if($rsMessages==0)										//and Language If no Message Exist then edit
		{
			$objMessages->m_intMessageId=$iMsgId;
			$iCheck=$objMessages->EditMessage();				//Edit Message
			header("location:ManageMessages.php?intMessage=89&".$strQry);
		}
		else
			header("location:ManageMessages.php?intMessage=88&".$strQry);
	}
	else //*********************Incase for translate message**************************//
	{
	
	/**
	 	To Check if not Set (Server Side Validation) 
	 **/
	 //&& !isset($_REQUEST['lstConcept']) || empty($_REQUEST['lstConcept'])
	if(!isset($_REQUEST['txtMsg']) || empty($_REQUEST['txtMsg']) )
	{
		header("Location:ManageMessages.php?intMessage=88&".$strQry);
		exit;
	}

		//****IF Translation language is not set*******//
		if($_REQUEST['cmbLang']=="0")	
		{
			header("location:ManageMessages.php?intMessage=");
			exit;
		}
		//********************************************//
		
		$objMessages->m_strMessageDesc=$_REQUEST['txtMsg']; //Set Message Description
		$objMessages->m_intMessageId=$iMsgId;				//Set Message Id
		$objMessages->m_intLangId=$_REQUEST['cmbLang'];		//Set Language
		if($objMessages->TranslateMessage())				//Translate Message
			header("location:ManageMessages.php?intMessage=87&intPage=${intPage}");
		else
			header("location:ManageMessages.php?intMessage=88&intPage=${intPage}");
			
	}//******************************************************************************//
	
?>