<?php
include("../Includes/BackOfficeIncludesFiles.php");

////////////////Role Rights Implementation///////////////////
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=311;
if($objAdminUser->CheckRightForAdmin()==1)
{
	///////////////Creating Class Objects////////////////
	$objPages= new clsPages();
	//////////////Checking for Values///////////////////
	
	////////////////Initializing Variables//////////////
	$nLangId = $_SESSION['intLangId'];
	$intPageId = "";
	$nParentId = "";
	$strSearch = "";
	$arrQryStr=array();
	$nPage = "";
	///////////////Getting Values from the query string/////////////
	if(isset($_REQUEST['hdnLangId']))
		$nLangId = $_REQUEST['hdnLangId'];
	if(isset($_REQUEST['hdnPageId']))
		$intPageId = $_REQUEST['hdnPageId'];
	if(isset($_REQUEST['hdnParentId'])) 
		$nParentId = $_REQUEST['hdnParentId'];
	if(isset($_REQUEST['hdnSearch'])) 
		$strSearch = $_REQUEST['hdnSearch'];
	if(isset($_REQUEST['hdnPage'])) 
		$nPage = $_REQUEST['hdnPage'];
	if(isset($_REQUEST['lstModule'])) 
		$nModule = $_REQUEST['lstModule'];
	if(isset($_REQUEST['lstPosition'])) 
		$nPosition = $_REQUEST['lstPosition'];
	if(isset($_REQUEST['lstRank'])) 
		$nRank = $_REQUEST['lstRank'];
		
	$arrQryStr[]="lstModule=".$nModule;
	$arrQryStr[]="hdnParentId=".$nParentId;
	$arrQryStr[]="txtSearch=".$strSearch;
	$arrQryStr[]="lstLanguage=".$nLangId;
	$arrQryStr[]="txtSearch=".$strSearch;
	$arrQryStr[]="intPage=".$nPage;
	$strQryStr=implode('&',$arrQryStr);
	////////////Transfering values to class variables////////////
	$objPages->m_intPageId = $intPageId;
	$objPages->m_intParentId = $intParentId;
	$nMessage="";
	
	if(!isset($_REQUEST['chkModule']))
		{
			header("location:ModulesManager.php?intMessage=358&".$strQryStr);
			exit;
		}	
	if(isset($_REQUEST['bntAttach']))
	{
		foreach($_REQUEST['chkModule'] as $Id=>$Value)
		{
			$nPos = $nPosition[$Value];
			$nRan = $nRank[$Value];
			$nStatus = $objPages->GetStatus($Value);
			if($nStatus==ACTIVE)
			{
				$arrResult[]  = $objPages->AttachWithAll($Value,$nPos,$nRan);
			}
			else
				$arrResult[] = 0;
			
		}
		if(in_array(0, $arrResult) && in_array(1, $arrResult))
		{
			header("location:ModulesManager.php?intMessage=474&".$strQryStr);
			exit;
		}
		else if(in_array(1, $arrResult))
		{
			header("location:ModulesManager.php?intMessage=468&".$strQryStr);
			exit;
		}
		else
		{
			header("location:ModulesManager.php?intMessage=469&".$strQryStr);
			exit;
		}
		
	}
	
	else if(isset($_REQUEST['bntDeAttach']))
	{
		foreach($_REQUEST['chkModule'] as $Id=>$Value)
		{
			$nResult = $objPages->DeAttachFromAll($Value);
		}
		if ($nResult)
			header("location:ModulesManager.php?intMessage=470&".$strQryStr);
		else
			header("location:ModulesManager.php?intMessage=471".$strQryStr);
	}
	
	else if(isset($_REQUEST['btnActivate']))
	{
		if(!isset($_REQUEST['hdnPageId']))
		{
			header("location:ModulesManager.php?intMessage=209");
			exit;
		}
		foreach($_REQUEST['chkModule'] as $Id=>$Value)
		{
			$nStatus = $objPages->GetStatus($Value);
			if($nStatus==ACTIVE)
			{
				$nStatus=INACTIVE;
				$nResult2 = $objPages->DeAttachFromAll($Value);	
				$nResult = $objPages->ChangeStatus($nStatus,$Value);
				$nMessage = 465;
			}
			else if($nStatus==INACTIVE)
			{
				$nStatus=ACTIVE;
				$nResult = $objPages->ChangeStatus($nStatus,$Value);
				$nMessage = 472;
			}
		}
		if ($nResult)
			header("location:ModulesManager.php?intMessage=".$nMessage."&".$strQryStr);
		else
			header("location:ModulesManager.php?intMessage=466&".$strQryStr);
	}
	else
	{
		foreach($_REQUEST['chkModule'] as $Id=>$Value)
		{
			$nPos = $nPosition[$Value];
			$nRan = $nRank[$Value];
			$nStatus = $objPages->GetStatus($Value);
			if($nStatus==ACTIVE)
			{
				$arrResult[]  = $objPages->UpdateWithAll($Value,$nPos,$nRan);
			}
			else
				$arrResult[] = 0;
			
		}
		if(in_array(0, $arrResult) && in_array(1, $arrResult))
		{
			header("location:ModulesManager.php?intMessage=486&".$strQryStr);
			exit;
		}
		else if(in_array(1, $arrResult))
		{
			header("location:ModulesManager.php?intMessage=484&".$strQryStr);
			exit;
		}
		else
		{
			header("location:ModulesManager.php?intMessage=485&".$strQryStr);
			exit;
		}
		

	}
}
else
	header("location:Error.php");
?>