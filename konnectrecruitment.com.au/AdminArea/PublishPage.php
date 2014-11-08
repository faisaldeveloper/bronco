<?
require_once("../Includes/BackOfficeIncludesFiles.php");
////////////////Role Rights Implementation///////////////////
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=12;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{
	///////////////Creating Class Objects////////////////
	$objPages = new clsPages();
	//////////////Checking for Values///////////////////
	//print_r($_POST);exit;
	if(!isset($_REQUEST['hdnPageId']) || empty($_REQUEST['hdnPageId']))
	{
		header("location:ManagePages.php?intMessage=209");
		exit;
	}
	/**
	Varables initialization
	**/
	$intPageId = 0;
	$nPage=0;
	if(isset($_REQUEST['hdnLangId']))
		$intPageId = $_REQUEST['hdnLangId'];
	if(isset($_REQUEST['hdnPageId']))
		$intPageId = $_REQUEST['hdnPageId'];
	if(isset($_REQUEST['hdnParentId'])) 
		$nParentId = $_REQUEST['hdnParentId'];
	if(isset($_REQUEST['txtSearch'])) 
		$strSearch = $_REQUEST['txtSearch'];
	if(isset($_REQUEST['intPage'])) 
		$nPage = $_REQUEST['intPage'];
	
	$arrQryStr[]="hdnParentId=".$nParentId;
	$arrQryStr[]="txtSearch=".$strSearch;
	$arrQryStr[]="lstLanguage=".$_SESSION['intLangId'];
	$arrQryStr[]="intPage=".$nPage;
	$strQryStr=implode('&',$arrQryStr);
	$objPages->m_intPageId = $intPageId;
	$objPages->m_intLangId = $intLangId; 
	if($_REQUEST['status']=="Active")
		{
		$rsSql = $objPages->DeActivatePage();
		}
	else
		{
		$rsSql = $objPages->ActivatePage();
		}
	if($rsSql)
	{
		header("location:ManagePages.php?intMessage=388&".$strQryStr);
		exit;
	}
	else
	{
		header("location:ManagePages.php?intMessage=387&".$strQryStr);
		exit;
	}
}
else
	header("location:Error.php");//End Right If
?>
