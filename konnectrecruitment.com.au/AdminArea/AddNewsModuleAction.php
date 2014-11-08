<?php
	require_once("../Includes/BackOfficeIncludesFiles.php");
////////////////Role Rights Implementation///////////////////
	$objAdminUser=new clsAdminUser();
	$objAdminUser->m_objRoles=new clsRoles();
	$objAdminUser->m_intUserId=$_SESSION['intUserId'];
	$objAdminUser->m_objRoles->m_intRightId=209;
	if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
	{

///////////Server side validation/////////////////
	if((!isset($_REQUEST['hdnGalleryID']) || empty($_REQUEST['hdnGalleryID'])) && (!isset($_REQUEST['btnSubmit']) || empty($_REQUEST['btnSubmit'])))
	{
		header("location:ManageNewsModule.php?intMessage=440");
		exit;
	}
//////////////Initialization////////////////////
	$strName = "";
	//$nLayout = 0;
//	$nImagesPerRow = 0;
	$strQry = "";
	$arrStrQry = array();

/////// CODE FOR CANCEL STARTS HERE//////////////
	if(isset($_REQUEST['btnCancel']) && !empty($_REQUEST['btnCancel']))
	{
		header ("location:ManageNewsModule.php");
		exit;	
	}	
// CODE FOR CANCEL ENDS HERE
/////////////////////Getting data from the query string/////////////
// Start For Add Data 
	if (isset($_REQUEST['chkActive']))
	{
		
		$nActive = ACTIVE;
		$arrStrQry[] = "chkActive=".urlencode($_REQUEST['chkActive']);
	}
	else
	{
		$nActive = INACTIVE;
		
	}
	
	if (isset($_REQUEST['txtName']))
	{	
		$strName = $_REQUEST['txtName'];
		$arrStrQry[] = "txtName=".urlencode($_REQUEST['txtName']);
	}
	if (isset($_REQUEST['rdoSearchOpt']))
	{	
		$nSearchOpt = $_REQUEST['rdoSearchOpt'];
		$arrStrQry[] = "rdoSearchOpt=".urlencode($_REQUEST['rdoSearchOpt']);
	}	
	
	$strQry = implode ("&",$arrStrQry);
	
		
	if (!isset($_REQUEST['txtName']) || empty($_REQUEST['txtName']))
	{
		header ("location:ManageNewsModule.php?intMessage=441&".$strQry);
		exit;
	}
	
	if (isset($_REQUEST['btnSubmit'])  && $_REQUEST['btnSubmit'] == "Add Module")
	{
	if(isset($_REQUEST['scrolling']))
		$scrolling = 1;
	else
		$scrolling = 0;
		$nResult = $objNews->AddNewsGallery($scrolling,$strName,$nActive,$nSearchOpt);
		if ($nResult)
		{//////////ManageGalleryImage.php///////////
			header("location:ManageNewsModule.php?intMessage=443");
			exit;
		}	
		else
		{
			header("location:ManageNewsModule.php?intMessage=444&".$strQry);
			exit;
		}			
	}
	else
	{
		
		if (isset($_REQUEST['hdnGalleryID']))
			$nGalleryID = $_REQUEST['hdnGalleryID'];
			
		else
		{
			header("location:ManageNewsModule.php?intMessage=285");
			exit;
		}
		if(isset($_REQUEST['scrolling']))
		$scrolling = 1;
	else
		$scrolling = 0;
		$nResult = $objNews->UpdateNewsGallery($scrolling,$nGalleryID, $nActive, $strName, $nSearchOpt);
		if ($nResult)
		{
			header("location:ManageNewsModule.php?intMessage=445");
			exit;
		}	
		else
		{
			header("location:ManageNewsModule.php?intMessage=446&".$strQry);
			exit;
		}			
	}
	// End For Add Data 
	}
	else
		header("location:Error.php");//End Right If

?>