<?php
include("../Includes/BackOfficeIncludesFiles.php");
////////////////Role Rights Implementation///////////////////
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=50;
$intModuleID=$_REQUEST['hdnModuleId'];
 
if($objAdminUser->CheckRightForAdmin()==1)
{

////////////////Create objects of classes////////////////////
$objNews = new clsNews();
//////////////Checking for Values///////////////////
if(!isset($_REQUEST['hdnNewsId']) || !isset($_REQUEST['hdnNewsId']))
	{
		header("location:ManageNews.php?intMessage=358&hdnModuleId=".$intModuleID);
		exit;
	}	
/////////////////// Initialization //////////////////////
$arrQryStr=array();
$intLangId = $_SESSION['intLangId'];
$strNewsTitle = "";
$intMonth = "";
$intMinute = "";
$intEMonth = "";
$intIsActive = "";
$strShortDesc = "";
$strLongDesc = "";
/////////////////Getting Values from query string///////////////////
if(isset($_POST['hdnNewsId']))
	{
	$arrQryStr[] = "NewsId=".urlencode($_POST['NewsId']);
	$objNews->m_intNewsId = $_POST['hdnNewsId'];
	}
if(isset($_POST['hdnLangId']))
	$intLangId = $_POST['hdnLangId']; 
if(isset($_POST['txtNewsTitle']))
	{
	$arrQryStr[] = "txtNewsTitle=".urlencode($_POST['txtNewsTitle']); 
	$strNewsTitle = $_POST['txtNewsTitle']; 
	}
if(isset($_POST['lstYear']))
	{
	$arrQryStr[] = "lstYear=".urlencode($_POST['lstYear']); 
	$intYear = $_POST['lstYear']; 
	}
if(isset($_POST['lstMonth']))
	{
	$arrQryStr[] = "lstMonth=".urlencode($_POST['lstMonth']); 
	$intMonth = $_POST['lstMonth']; 
	}
if(isset($_POST['lstDay']))
	{
	$arrQryStr[] = "lstDay=".urlencode($_POST['lstDay']); 
	$intDay = $_POST['lstDay'];
	}
if(isset($_POST['lstHour']))
	{
	$intHour = $_POST['lstHour']; 
	}
if(isset($_POST['lstMinute']))
	{
	$intMinute = $_POST['lstMinute']; 
	}
if(isset($_POST['lstSecond']))
	{
	$intSecond = $_POST['lstSecond'];
	}
if(isset($_POST['lstEYear']))
	{
	$arrQryStr[] = "lstEYear=".urlencode($_POST['lstEYear']); 
	$intEYear = $_POST['lstEYear']; 
	}
if(isset($_POST['lstEMonth']))
	{
	$arrQryStr[] = "lstEMonth=".urlencode($_POST['lstEMonth']); 
	$intEMonth = $_POST['lstEMonth']; 
	}
if(isset($_POST['lstEDay']))
	{
	$arrQryStr[] = "lstEDay=".urlencode($_POST['lstEDay']); 
	$intEDay = $_POST['lstEDay']; 
	}
$dtNewsDate = $intYear."-".$intMonth."-".$intDay;
$dtNewsEDate = $intEYear."-".$intEMonth."-".$intEDay;
$dtNewsTime = $intHour.":".$intMinute.":".$intSecond;

if(isset($_POST['rdoIsActive']))
	$intIsActive = $_POST['rdoIsActive'];
if(isset($_POST['txtShortDesc'])) 
	{
	$arrQryStr[] = "txtShortDesc=".urlencode($_POST['txtShortDesc']); 
	$strShortDesc= $_POST['txtShortDesc'];
	}
if(isset($_POST['report'])) 
	$strLongDesc = $_POST['report'];
$arrQryStr[] = "hdnModuleId=".$_REQUEST['hdnModuleId'];	
$strQry = implode('&',$arrQryStr);	//constructing querystring

///////////////////Serverside Validation///////////////////////
if(!isset($_POST['txtShortDesc']) || empty($_POST['txtShortDesc']))
{
	header("location:EditNews.php?intMessage=61&".$strQry);
	exit;
}
if(!isset($_POST['txtNewsTitle']) || empty($_POST['txtNewsTitle']))
{
	header("location:EditNews.php?intMessage=61&".$strQry);
	exit;
}
if(!isset($_POST['lstYear']) || empty($_POST['lstYear']) && !isset($_POST['lstYear']) || empty($_POST['lstYear']) && !isset($_POST['lstYear']) || empty($_POST['lstYear']))
{
	header("location:EditNews.php?intMessage=61&".$strQry);
	exit;
}
if(!isset($_POST['txtShortDesc']) || empty($_POST['txtShortDesc']))
{
	header("location:EditNews.php?intMessage=61&".$strQry);
	exit;
}
$strLongDesc = str_replace('../',CONST_REPLACEPATH,$strLongDesc);
//////////////Transfer values to class variables///////////////
$objNews->m_intEventId = $intEventId;
$objNews->m_intLangId = $intLangId; 
$objNews->m_strNewsTitle = $strNewsTitle; 
$objNews->m_dtNewsDate = $dtNewsDate;
$objNews->m_dtNewsEDate = $dtNewsEDate;
$objNews->m_dtNewsTime = $dtNewsTime; 
$objNews->m_strShortDesc = $strShortDesc; 
$objNews->m_strLongDesc = $strLongDesc; 
$objNews->m_intIsActive = $intIsActive;
$strPageUrl = ExcludeSpecialCharacters($strNewsTitle);
$objNews->m_strPageUrl=$strPageUrl;
$intUpDate = $objNews->EditNews();
if($intUpDate) 
	header("location:ManageNews.php?intMessage=17&hdnModuleId=".$intModuleID);
else	
	header("location:ManageNews.php?intMessage=18&hdnModuleId=".$intModuleID);
}
else
	header("location:Error.php");
?>

