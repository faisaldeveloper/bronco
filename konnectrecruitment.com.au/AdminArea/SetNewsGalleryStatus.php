<?php
require_once("../Includes/BackOfficeIncludesFiles.php");
////////////////Role Rights Implementation///////////////////
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();

$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=276;
if($objAdminUser->CheckRightForAdmin()==1)

{
	////////////////Variable Initialization//////////////
	$nGalleryID = "";
	$arrChk = array();
	
	///////////////Getting data from the query string////////////
	if (isset($_REQUEST['hdnStatus']))	
	{
		$objAdminUser=new clsAdminUser();
		$objAdminUser->m_objRoles=new clsRoles();
		$objAdminUser->m_intUserId=$_SESSION['intUserId'];
		if($_REQUEST['hdnStatus']=="0")
		$nRight=276;
		else if($_REQUEST['hdnStatus']=="1")
		$nRight=277;
		//print_r($_REQUEST);exit;
		$objAdminUser->m_objRoles->m_intRightId=$nRight;
		if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
		{
			if (isset($_REQUEST['hdnModuleId']))
				$nGalleryID = $_REQUEST['hdnModuleId'];
			else	
			{
				header ("location:ManageNewsModule.php?intMessage=285");
				exit;
			}	
			$nResult = $objNews->StatusGallery($nGalleryID, $nStatus = $_REQUEST['hdnStatus']);
			if ($nResult)
			{
				header ("location:ManageNewsModule.php?intMessage=289");
				exit;
			}	
			else
			{
				header ("location:ManageNewsModule.php?intMessage=290");
				exit;
			}	
		}
	else
		header("location:Error.php");//End Right If
	}
	// End Status for Single

	// Set Delete for Single 
	if (isset($_REQUEST['btnDelete_x']))	
	{
		$objAdminUser=new clsAdminUser();
		$objAdminUser->m_objRoles=new clsRoles();
		$objAdminUser->m_intUserId=$_SESSION['intUserId'];
		$objAdminUser->m_objRoles->m_intRightId=277;
		if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
		{
			if (isset($_REQUEST['hdnModuleId']))
				$nGalleryID = $_REQUEST['hdnModuleId'];
			else	
			{
				header ("location:ManageNewsModule.php?intMessage=285");
				exit;
			}	
			$nResult = $objNews->DeleteGallery($nGalleryID);
			//print "<br> result---->".$nResult;
			if ($nResult == "EXIST")
			{
				header ("location:ManageNewsModule.php?intMessage=439");
				exit;
			}
			else if ($nResult)
			{
				header ("location:ManageNewsModule.php?intMessage=447");
				exit;
			}	
			else
			{
				header ("location:ManageNewsModule.php?intMessage=448");
				exit;
			}	
		}
		else
		header("location:Error.php");//End Right If
	}
	// End Delete for Single
	
	// Start Set Status for Multiple 

	if (isset($_REQUEST['btnAllActive_x']))	
	{
		$objAdminUser=new clsAdminUser();
		$objAdminUser->m_objRoles=new clsRoles();
		$objAdminUser->m_intUserId=$_SESSION['intUserId'];
		$objAdminUser->m_objRoles->m_intRightId=276;
		if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
		{

			if (!isset($_REQUEST['chkImageGal']))
			{
				header ("location:ManageNewsModule.php?intMessage=297");
				exit;
			}
			$arrChk = $_REQUEST['chkImageGal'];
			foreach ($arrChk as $id)
			{
				$nResult = $objNews->StatusGallery($id, $nStatus=ACTIVE);
			}
			if ($nResult)
			{
				header ("location:ManageNewsModule.php?intMessage=289");
				exit;
			}	
			else
			{
				header ("location:ManageNewsModule.php?intMessage=290");
				exit;
			}
		}
		else
		header("location:Error.php");//End Right If
	}	
	
	if (isset($_REQUEST['btnAll_x']))	
	{
		$objAdminUser=new clsAdminUser();
		$objAdminUser->m_objRoles=new clsRoles();
		$objAdminUser->m_intUserId=$_SESSION['intUserId'];
		$objAdminUser->m_objRoles->m_intRightId=277;
		if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
		{
			if (!isset($_REQUEST['chkImageGal']))
			{
				header ("location:ManageNewsModule.php?intMessage=297");
				exit;
			}
			$arrChk = $_REQUEST['chkImageGal'];
			foreach ($arrChk as $id)
			{
				$nResult = $objNews->StatusGallery($id, $nStatus=INACTIVE);
			}
			if ($nResult)
			{
				header ("location:ManageNewsModule.php?intMessage=289");
				exit;
			}	
			else
			{
				header ("location:ManageNewsModule.php?intMessage=290");
				exit;
			}	
		}
		else 
		header("location:Error.php");//End Right If
	}	
	
	
	// End Set Status for Multiple 
	
	// Start Delete for Multiple 

	if (isset($_REQUEST['btnAllDelete_x']))	
	{
		$objAdminUser=new clsAdminUser();
		$objAdminUser->m_objRoles=new clsRoles();
		$objAdminUser->m_intUserId=$_SESSION['intUserId'];
		$objAdminUser->m_objRoles->m_intRightId=278;
		if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
		{
			if (!isset($_REQUEST['chkImageGal']))
			{
				header ("location:ManageNewsModule.php?intMessage=297");
				exit;
			}
			$arrChk = array();
			$arrChk = $_REQUEST['chkImageGal'];
			foreach ($arrChk as $id)
			{
				$nResult = $objNews->DeleteGallery($id);
			}	
			if ($nResult == "EXIST")
			{
				header ("location:ManageNewsModule.php?intMessage=439");
				exit;
			}
			else if ($nResult)
			{
				header ("location:ManageNewsModule.php?intMessage=447");
				exit;
			}	
			else
			{
				header ("location:ManageNewsModule.php?intMessage=448");
				exit;
			}
		}
		else 
		header("location:Error.php");//End Right If	
	}	
	// End Delete for Multiple 
}
else
	header("location:Error.php");//End Right If*/
?>