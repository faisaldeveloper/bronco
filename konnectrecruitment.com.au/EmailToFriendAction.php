<?php
	/**
	include files
	**/
	session_start();
	include("Includes/FrontIncludes.php");
	/*
	creating class objects
	*/
	$objMessage=new clsMessages();
	/**
	Initializing variables
	**/
	$arrQryStr=array();
	$strYourName = "";
	$strYourEmail = "";
	$strYourFriendName = "";
	$strYourFriendEmail = "";
	$strMessage = "";
	$strTarget = "";
	/**
	Getting labels
	**/
	
	$objMessage->m_intLangId=$_SESSION['intLangId'];
	$objMessage->m_intConId=CONST_CONCEPT_EMAIL;
	$arrLabels=$objMessage->GetLabels();
	
	/**
	Copying values form query string
	**/
	if(isset($_REQUEST['NewsId']))
	{
	$nNewsId = $_REQUEST['NewsId'];
	}
	if(isset($_REQUEST['txtYourName']))
	{
	$strYourName=$_REQUEST['txtYourName'];
	$arrQryStr[] = "txtYourName=".urlencode($_POST['txtYourName']);
	}
	if(isset($_REQUEST['txtYourEmail']))
	{
	$strYourEmail=$_REQUEST['txtYourEmail'];
	$arrQryStr[] = "txtYourEmail=".urlencode($_POST['txtYourEmail']);
	}
	if(isset($_REQUEST['txtFriendName']))
	{
	$strYourFriendName=$_REQUEST['txtFriendName'];
	$arrQryStr[] = "txtFriendName=".urlencode($_POST['txtFriendName']);
	}
	if(isset($_REQUEST['txtFriendEmail']))
	{
	$strYourFriendEmail=$_REQUEST['txtFriendEmail'];
	$arrQryStr[] = "txtFriendEmail=".urlencode($_POST['txtFriendEmail']);
	}
	if(isset($_REQUEST['txrMessage']))
	{
	$strMessage=$_REQUEST['txrMessage'];
	$arrQryStr[] = "txrMessage=".urlencode($_POST['txrMessage']);
	}
	if(isset($_REQUEST['hdnurl']))
	{
	$strTarget=$_REQUEST['hdnurl'];
	$arrQryStr[] = "hdnurl=".urlencode($_POST['hdnurl']);
	}
	$strQry = implode('&',$arrQryStr);	//constructing querystring
	/**
	Server Side validation
	**/
	if(!isset($_REQUEST['txtYourName']) || empty($_REQUEST['txtYourName'])||!isset($_REQUEST['txtYourEmail']) || empty($_REQUEST['txtYourEmail']) || !isset($_REQUEST['txtFriendName']) || empty($_REQUEST['txtFriendName']) ||  !isset($_REQUEST['txrMessage']) || empty($_REQUEST['txrMessage']) || !isset($_REQUEST['txtFriendEmail']) || empty($_REQUEST['txtFriendEmail']))
	{
	header("location:EmailToFriend.php?intMessage=365&".$strQry);
	exit;
	}

if(!checkEmail($strYourEmail) || !checkEmail($strYourFriendEmail))
	{
	header("location:EmailToFriend.php?intMessage=374&".$strQry);
	exit;
	}
	$strSub=$arrLabels[389]." ";
	$strSent=$arrLabels[390]." ";
	$strHi=$arrLabels[174]." ";
	$strLabel = $arrLabels[534]." ";
	$intCheck=EmailToFriend($strYourName,$strYourEmail,$strYourFriendName,$strYourFriendEmail,$strMessage,$strTarget,$strSub,$strSent,$strHi,$strLabel);
	if ($intCheck)
	{	
		$objNews->m_intNewsId = $nNewsId;
		$objNews->m_intLangId =  $_SESSION['intLangId'];
		$rs = $objNews->GetNewsById();
		if ($rs != FALSE && mysql_num_rows($rs)>0)
		{
			$row = mysql_fetch_object($rs);
			$nNewsUrl = $row->PageUrl;
		}
		header("location:NewsDetail.php?NewsId=".$nNewsUrl);
	}
	else
	{
		header("location:EmailToFriend.php?NewsId=".$nNewsId);
	}

?>
