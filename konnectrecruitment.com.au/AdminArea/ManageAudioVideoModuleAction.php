<?php
//echo $_POST['rdoMedia'];exit;
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
		header("location:ManageAudioVideoModule.php?intMessage=360");
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
		header ("location:ManageAudioVideoModule.php");
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
	if (isset($_REQUEST['rdoMedia']))
	{	
		$strMedia = $_REQUEST['rdoMedia'];
		$arrStrQry[] = "rdoMedia=".urlencode($_REQUEST['rdoMedia']);
	}
	
	$strQry = implode ("&",$arrStrQry);
	
	
	if (!isset($_REQUEST['txtName']) || empty($_REQUEST['txtName']))
	{
		header ("location:ManageAudioVideoModule.php?intMessage=298&".$strQry);
		exit;
	}
	
	if (isset($_REQUEST['btnSubmit'])  && $_REQUEST['btnSubmit'] == "Add Gallery")
	{
		//echo "inserted"; 
		$nResult = $objFile->AddNewsGallery($strName,$nActive,$strMedia);
		print "<br> result--->".$nResult;
		if ($nResult == "EXIST")
		{
			header("location:ManageAudioVideoModule.php?intMessage=301");
			exit;
		}
		else if ($nResult)
		{//////////ManageGalleryImage.php///////////
			header("location:ManageAudioVideoModule.php?intMessage=283");
			exit;
		}	
		else
		{
			header("location:ManageAudioVideoModule.php?intMessage=284&".$strQry);
			exit;
		}			
	}
	else
	{
		if (isset($_REQUEST['hdnGalleryID']))
			$nGalleryID = $_REQUEST['hdnGalleryID'];
		else
		{
			header("location:ManageAudioVideoModule.php?intMessage=285");
			exit;
		}	
		$nResult = $objFile->UpdateNewsGallery($nGalleryID, $nActive, $strName);
		//echo "inserted in update block -----".$nResult; exit;
		if ($nResult === "EXIST")
		{
			header("location:ManageAudioVideoModule.php?intMessage=301");
			exit;
		}
		else if ($nResult)
		{
			header("location:ManageAudioVideoModule.php?intMessage=299");
			exit;
		}	
		else
		{
			header("location:ManageAudioVideoModule.php?intMessage=300&".$strQry);
			exit;
		}			
	}
	// End For Add Data 
	}
	else
		header("location:Error.php");//End Right If

?>