<?php
	require_once("../Includes/BackOfficeIncludesFiles.php");
////////////////Role Rights Implementation///////////////////
	$objAdminUser=new clsAdminUser();
	$objAdminUser->m_objRoles=new clsRoles();
	$objAdminUser->m_intUserId=$_SESSION['intUserId'];
	$objAdminUser->m_objRoles->m_intRightId=206;
	if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
	{
///////////////Creating Class Objects////////////////
		$objPages = new clsPages();
//////////////Checking for Values///////////////////
	if(!isset($_REQUEST['hdnPageId']) || empty($_REQUEST['hdnPageId']))
	{
		header("location:ManagePages.php?intMessage=209");
		exit;
	}
////////////Initializing Variables//////////////
	$intPageId = 0;
	$intParentId = 0;
	$intLangId = $_SESSION['intLangId'];
	$strPageName = "";
	$strPageTitle = "";
	$strMetatagDesc = "";
	$strMetaTagKW = "";
	$intShowTopMenu = 0;
	$intShowFooter = 0;
	$intShowLeftMenu = 0;
	$intIsActive = 0;
	$strPageContents = "";
	$nPageRank = "";
	$nPageLayoutId = "";
	$nIsStartup = 0;
/////////Getting values from the query string///////
	if(isset($_POST['hdnPageId'])) 
		{
		$arrQryStr[] = "hdnPageId=".urlencode($_POST['hdnPageId']);
		$intPageId = $_POST['hdnPageId'];
		}
	if(isset($_REQUEST['hdnParentId'])) 
		{
		$arrQryStr[] = "hdnParentId=".urlencode($_POST['hdnParentId']);
		$intParentId = $_REQUEST['hdnParentId'];
		}
	if(isset($_POST['txtPageName'])) 
		{
		$arrQryStr[] = "txtPageName=".urlencode($_POST['txtPageName']); 
		$strPageName = $_POST['txtPageName'];
		}
	if(isset($_POST['txtPageTitle'])) 
		{
		$arrQryStr[] = "txtPageTitle=".urlencode($_POST['txtPageTitle']); 
		$strPageTitle = $_POST['txtPageTitle'];
		}
	if(isset($_POST['txtMetatagDesc'])) 
		$strMetatagDesc = $_POST['txtMetatagDesc'];
	if(isset($_POST['txtMetaTagKW'])) 
		$strMetaTagKW = $_POST['txtMetaTagKW'];
	if(isset($_POST['chkShowTopMenu'])) 
		$intShowTopMenu = 1;
	if(isset($_POST['chkShowLeftMenu'])) 
		$intShowLeftMenu = 1;
	if(isset($_POST['chkShowFooter'])) 
		$intShowFooter = 1;
		
	if(isset($_POST['txtPageContents'])) 
		$strPageContents = RTESafe($_POST['txtPageContents']);
		
	if(isset($_POST['lstRank'])) 
		{
		$arrQryStr[] = "lstRank=".urlencode($_POST['lstRank']); 
		$nPageRank = $_POST['lstRank'];
		}
	if(isset($_POST['hdnLayoutId'])) 
		$nPageLayoutId = $_POST['hdnLayoutId'];
	
	$strQry = implode('&',$arrQryStr);	//constructing querystring
	
//////////////Server Side Validation////////////////////
	if(!isset($_POST['txtPageName']) || empty($_POST['txtPageName']))
	{
		header("location:Editpage.php?intMessage=356&".$strQry);
		exit;
	}
	if(!isset($_POST['txtPageTitle']) || empty($_POST['txtPageTitle']))
	{
		header("location:Editpage.php?intMessage=357&".$strQry);
		exit;
	}
	$strLongDesc = str_replace('../',CONST_REPLACEPATH,$strPageContents);
///////////Transfering values to class variables/////////	
	$objPages->m_intPageId = $intPageId;
	$objPages->m_intParentId = $intParentId;
	$objPages->m_intLangId = $intLangId; 
	$objPages->m_strPageName = $strPageName; 
	$objPages->m_strPageTitle = $strPageTitle;
	$objPages->m_strMetaTagsDesc = $strMetatagDesc; 
	$objPages->m_strMetaTagsKW = $strMetaTagKW; 
	$objPages->m_strPageContents = $strPageContents;
	$objPages->m_intShowInTopMenu = $intShowTopMenu; 
	$objPages->m_intShowInLeftMenu = $intShowLeftMenu; 
	$objPages->m_intShowFooter = $intShowFooter; 
	$objPages->m_intIsActive = $intIsActive;
	$objPages->m_nIsStartup = $nIsStartup;
	$objPages->m_nRank = $nPageRank;
	$objPages->m_nPageLayoutId=$nPageLayoutId;
	$strPageUrl=$objPages->m_strPageName;
	$strPageUrl=ExcludeSpecialCharacters($strPageUrl);
	$objPages->m_strPageUrl=$strPageUrl;
	$intUpDate = $objPages->EditPage();
	if($intUpDate==="Exists")
	{
		header("location:ManagePages.php?intMessage=313&".$strQry); 
		exit;
	}
	else if($intUpDate) 
		header("location:ManagePages.php?intMessage=210&hdnPageId=${intParentId}&lstLanguage=${intLangId}&hdnParentId=${intParentId}");
	else	
		header("location:ManagePages.php?intMessage=211&hdnPageId=${intParentId}&lstLanguage=${intLangId}&hdnParentId=${intParentId}");
	}
	else
		header("location:Error.php");//End Right If
?>