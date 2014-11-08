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
		header("location:ManageGallery.php?intMessage=360");
		exit;
	}
//////////////Initialization////////////////////
	$strName = "";
	$nLayout = 0;
	$nImagesPerRow = 0;
	$strQry = "";
	$arrStrQry = array();

/////// CODE FOR CANCEL STARTS HERE//////////////
	if(isset($_REQUEST['btnCancel']) && !empty($_REQUEST['btnCancel']))
	{
		header ("location:ManageGallery.php");
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
		$nActive = INACTIVE;
	
	if (isset($_REQUEST['txtName']))
	{	
		$strName = $_REQUEST['txtName'];
		$arrStrQry[] = "txtName=".urlencode($_REQUEST['txtName']);
	}
	if (isset($_REQUEST['txtImagesPerRow']) && !empty($_REQUEST['txtImagesPerRow']))
	{	
		$nImagesPerRow = $_REQUEST['txtImagesPerRow'];
		$arrStrQry[] = "txtImagesPerRow=".$nImagesPerRow;
		//echo "=======>".$nImagesPerRow; // $_REQUEST['txtImagesPerRow'];
	}
	if (isset($_REQUEST['hdnGalleryLayoutId']))
	{	
		$nLayout = $_REQUEST['hdnGalleryLayoutId'];
		$arrStrQry[] = "hdnGalleryLayoutId=".urlencode($_REQUEST['hdnGalleryLayoutId']);
	}	
	
	$strQry = implode ("&",$arrStrQry);
	
	if (!isset($_REQUEST['hdnGalleryLayoutId']) || $_REQUEST['hdnGalleryLayoutId'] == 0)
	{
		header ("location:ManageGallery.php?intMessage=286&".$strQry);
		exit;
	}
	
	if (!isset($_REQUEST['txtName']) || empty($_REQUEST['txtName']))
	{
		header ("location:ManageGallery.php?intMessage=298&".$strQry);
		exit;
	}
	
	if (isset($_REQUEST['btnSubmit'])  && $_REQUEST['btnSubmit'] == "Add Gallery")
	{
		$nResult = $objGallery->AddGallery($strName,$nActive,$nLayout, $nImagesPerRow);
		//print "<br> result--->".$nResult;
		if ($nResult == "EXIST")
		{
			header("location:ManageGallery.php?intMessage=301");
			exit;
		}
		else if ($nResult)
		{//////////ManageGalleryImage.php///////////
			header("location:ManageGallery.php?intMessage=283");
			exit;
		}	
		else
		{
			header("location:ManageGallery.php?intMessage=284&".$strQry);
			exit;
		}			
	}
	else
	{
		if (isset($_REQUEST['hdnGalleryID']))
			$nGalleryID = $_REQUEST['hdnGalleryID'];
		else
		{
			header("location:ManageGallery.php?intMessage=285");
			exit;
		}	
		$nResult = $objGallery->UpdateGallery($nGalleryID, $nActive, $nLayout, $strName, $nImagesPerRow);
		if ($nResult === "EXIST")
		{
			header("location:ManageGallery.php?intMessage=301");
			exit;
		}
		else if ($nResult)
		{
			header("location:ManageGallery.php?intMessage=299");
			exit;
		}	
		else
		{
			header("location:ManageGallery.php?intMessage=300&".$strQry);
			exit;
		}			
	}
	// End For Add Data 
	}
	else
		header("location:Error.php");//End Right If

?>