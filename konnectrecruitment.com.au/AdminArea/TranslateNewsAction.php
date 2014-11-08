<?
require_once("../Includes/BackOfficeIncludesFiles.php");
/**
To Check if not Set (Server Side Validation)
**/
$intModuleID=$_REQUEST['hdnModuleId'];
if(!isset($_POST['hdnLangId']) || empty($_POST['hdnLangId']))
{
	//echo "I am in first if ".$_POST['hdnLangId'];exit;
	header("Location:TranslateNews.php?intMessage=86&hdnModuleId=".$intModuleID);
	exit;
}

if(!isset($_POST['hdnNewsId']) || empty($_POST['hdnNewsId']))
{
//	echo "I am in Second if ";exit;
	header("Location:TranslateNews.php?intMessage=86&hdnModuleId=".$intModuleID);
	exit;
}
if(!isset($_POST['txtNewsTitle']) || empty($_POST['txtNewsTitle']))
{
//	echo "I am in third if ";exit;
	header("Location:TranslateNews.php?intMessage=86&hdnModuleId=".$intModuleID);
	exit;
}

////////////////Role Rights Implementation///////////////////
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=52;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{
/**
Create object of the class
**/
$objNews  = new clsNews();
/**
Variable initilization
**/
$arrQryStr = array();
$intLangId="";
$intNewsId="";
$nLangId1="";
$strNewsTitle="";
$strShortDesc="";
$strLongDesc="";
/**
taking values from the query string 
**/

	if(isset($_POST['hdnLangId']) || !empty($_POST['hdnLangId']))
	{
		$arrQryStr[]="intLangId=".urlencode($_POST['hdnLangId']);
		$nLangId = $_POST['hdnLangId'];
	}
	if(isset($_POST['hdnNewsId']) || !empty($_POST['hdnNewsId']))
	{
		$arrQryStr[]="NewsId=".urlencode($_POST['hdnNewsId']);
		$intNewsId = $_POST['hdnNewsId'];
	}
	if(isset($_POST['lstLang']) || !empty($_POST['lstLang']))
	{
		$arrQryStr[]="nCatId=".urlencode($_POST['hdnCatId']);
		$nLangId1 = $_POST['lstLang'];
	}
	if(isset($_POST['txtNewsTitle']) || !empty($_POST['txtNewsTitle']))
	{
		$arrQryStr[]="txtNewsTitle=".urlencode($_POST['txtCatName']);
		$strNewsTitle = $_POST['txtNewsTitle'];
	}
	if(isset($_POST['txrShortDesc']) || !empty($_POST['txrShortDesc']))
	{
		$arrQryStr[]="txrShortDesc=".urlencode($_POST['txrShortDesc']);
		$strShortDesc = $_POST['txrShortDesc'];
	}
	if(isset($_POST['report'])) 
	{
		$strLongDesc = RTESafe($_POST['report']); 
	}

$arrQryStr[]="hdnModuleId=".urlencode($_POST['hdnModuleId']);
/**
Constructing a query string in an array
**/
$strQry = implode('&',$arrQryStr);	//constructing querystring
/**
Assigning Values to Class Data Members
**/
$objNews->m_intLangId = $nLangId1;
$objNews->m_intNewsId = $intNewsId;
$objNews->m_strNewsTitle = $strNewsTitle;
$objNews->m_strShortDesc = $strShortDesc; 
$objNews->m_strLongDesc = $strLongDesc; 
/**
Call function to translate news
**/
$objNews->m_intLangId = $nLangId1;
$result=$objNews->TranslateNews();
$objNews->m_intLangId = $intLangId;
if($result)
{
	if($nParent > 0)
		header("location:ManageNews.php?&intMessage=317&hdnModuleId=".$intModuleID);
	else
		header("location:ManageNews.php?intMessage=317&hdnModuleId=".$intModuleID);
}
else 
	header("location:ManageNews.php?hdnParentId=${nParentId}&intMessage=316&hdnModuleId=".$intModuleID);
}
else
	header("location:Error.php");//End Right If
?>
