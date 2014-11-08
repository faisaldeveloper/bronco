<?php
include("../Includes/BackOfficeIncludesFiles.php");
////////////////Role Rights Implementation///////////////////
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=47;
$objLang = new clsLanguage();
$nDefaultLang = $objLang->GetDefaultLang();
$_SESSION['intLangId']= $nDefaultLang;
if($objAdminUser->CheckRightForAdmin()==1)
{
/**
Creating class objects
**/
$objNews = new clsNews();
/**
Initializing variables
**/
$arrQryStr=array();
$intLangId = $_SESSION['intLangId'];
$strNewsTitle = "";
$strImgDesc = "";
$dtNewsDate = "";
$dtNewsTime = "";
$strShortDesc = "";
$strLongDesc = "";
$chkmain = 0;


/**
Coping data from query string
**/
if(isset($_POST['txtNewsTitle'])) 
	{
	$arrQryStr[] = "txtNewsTitle=".urlencode($_POST['txtNewsTitle']);
	$strNewsTitle = $_POST['txtNewsTitle'];
	}
if(isset($_POST['txtImgDesc'])) 
	{
	$strImgDesc = $_POST['txtImgDesc'];
	}
$intYear = $_POST['lstYear']; 
$intMonth = $_POST['lstMonth']; 
$intDay = $_POST['lstDay'];
$intHour = $_POST['lstHour']; 
$intMinute = $_POST['lstMinute']; 
$intSecond = $_POST['lstSecond'];
$intEYear = $_POST['lstEYear']; 
$intEMonth = $_POST['lstEMonth']; 
$intEDay = $_POST['lstEDay'];
$dtNewsDate = $intYear."-".$intMonth."-".$intDay;
$dtNewsEDate = $intEYear."-".$intEMonth."-".$intEDay;
$dtNewsTime = $intHour.":".$intMinute.":".$intSecond;
$intIsActive = $_POST['rdoIsActive'];
$pkModuleID = $_POST['hdnModuleId'];
//echo "Module id ----- ".$pkModuleID ; exit;

if(isset($_POST['txrShortDesc'])) 
	{
	$arrQryStr[] = "txrShortDesc=".urlencode($_POST['txrShortDesc']);
	$strShortDesc= $_POST['txrShortDesc'];
	}
if(isset($_POST['report'])) 
	$strLongDesc = RTESafe($_POST['report']);
if(isset($_POST['chkmain'])) 
	$chkmain = 1;
	$strQry = implode('&',$arrQryStr);	//constructing querystring
/**
ServerSide validtion
**/
if(!isset($_POST['txrShortDesc']) || empty($_POST['txrShortDesc']) || !isset($_POST['txtNewsTitle']) || empty($_POST['txtNewsTitle']))
{
	header("location:AddNews.php?intMessage=365&".$arrQryStr);
	exit;
}
/**
Transfering data to class variables
**/
$objNews->m_intEventId = $intEventId;
$objNews->m_intLangId = $intLangId; 
$objNews->m_strNewsTitle = $strNewsTitle; 
$objNews->m_strImgDesc = $strImgDesc; 
$objNews->m_dtNewsDate = $dtNewsDate;
$objNews->m_dtNewsEDate = $dtNewsEDate;
$objNews->m_dtNewsTime = $dtNewsTime; 
$objNews->m_strShortDesc = $strShortDesc; 
$objNews->m_strLongDesc = $strLongDesc; 
$objNews->m_intIsActive = $intIsActive; 
$objNews->m_chkmain = $chkmain; 
$strPageUrl = ExcludeSpecialCharacters($strNewsTitle);
$objNews->m_strPageUrl=$strPageUrl;
$objNews->m_intModuleID=$pkModuleID;
$intInsert = $objNews->AddNewNews();
if($intInsert)
{
	if(isset($_FILES['flNewsImage']['name']))
	{
		$strRealPathFile = "AdminLogin";
		$strDestFolder = "../NewsFiles";
		$objNews->m_intLangId = $intLangId; 
		$strImagePrefix = $objNews->GetNewsId();
		$strValidExtension = "gif,jpg,jpeg,png,bmp,psd,tiff";
		$strControlName = "flNewsImage";
		$intMaxSize=1048576;
		$strUploaded = UploadFile($strRealPathFile, $strDestFolder, $strImagePrefix, $strValidExtension, $strControlName, $intMaxSize);
		if(strpos($strUploaded,"_")>-1)
		{
			$objNews->m_strNewsImageName = $strUploaded; 
			$objNews->AddNewsImage();
		}
	}

	if(isset($_FILES['flNewsFile']['name']))
	{
		$strRealPathFile = "AdminLogin";
		$strDestFolder = "../NewsFiles";
		//$strImagePrefix = $objNews->GetNewsId();
		$strImagePrefix = substr(microtime(),3,5);
		$strValidExtension = "txt,doc,xls,csv,pdf,ppt,pps,htm,html";
		$strControlName = "flNewsFile";
		$intMaxSize=1048576;
		$strUploaded = UploadFile($strRealPathFile, $strDestFolder, $strImagePrefix, $strValidExtension, $strControlName, $intMaxSize);	
		if(strpos($strUploaded,"_")>-1)
		{
			$objNews->m_strNewsFileName = $strUploaded;
			$objNews->AddNewsFile();//echo "iam  here strUploaded=>".$strUploaded;exit;
		}
	}
}
header("location:ManageNews.php?intMessage=12&hdnModuleId=".$pkModuleID);
}
else
	header("location:Error.php");
?>