<?php

	include("../Includes/BackOfficeIncludesFiles.php");
//print_r($_REQUEST);exit;
////////////////Role Rights Implementation///////////////////
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=256;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{
	//echo "here on EditThemeAction.php";
	$strName="";
	$strQry = "";
	$intLangId=$_SESSION['intLangId'];
	$arrQry = array();

	/**
		server side validation
	**/
	if(isset($_REQUEST['hdnThemeId']))
	{
		$nThemeId = $_REQUEST['hdnThemeId'];
		$arrQry[] = "hdnId=".urlencode($_REQUEST['hdnThemeId']);
	}	
	if(isset($_REQUEST['txtName']))
	{
		$strName=$_REQUEST['txtName'];
		$arrQry[] = "txtName=".urlencode($_REQUEST['txtName']);
	}	
	if(isset($_REQUEST['txtTableWidth']))
	{
		$nTableWidth=$_REQUEST['txtTableWidth'];
		$arrQry[] = "txtTableWidth=".urlencode($_REQUEST['txtTableWidth']);
	}	
	if(isset($_REQUEST['txtTableBorder']))
	{
		$nTableBorder=$_REQUEST['txtTableBorder'];
		$arrQry[] = "txtTableBorder=".urlencode($_REQUEST['txtTableBorder']);
	}	
	if(isset($_REQUEST['txtLeftPanWidth']))
	{
		$nLeftPanWidth=$_REQUEST['txtLeftPanWidth'];
		$arrQry[] = "txtLeftPanWidth=".urlencode($_REQUEST['txtLeftPanWidth']);
	}	
	if(isset($_REQUEST['txtRgtPanWidth']))
	{
		$nRgtPanWidth=$_REQUEST['txtRgtPanWidth'];
		$arrQry[] = "txtRgtPanWidth=".urlencode($_REQUEST['txtRgtPanWidth']);
	}	
	if(isset($_REQUEST['rdMenu']))
	{
		$nRdMenu=$_REQUEST['rdMenu'];
		$arrQry[] = "rdMenu=".urlencode($_REQUEST['rdMenu']);
	}	
	if(isset($_REQUEST['rdTypeTop']))
	{
		$nRdTypeTop=$_REQUEST['rdTypeTop'];
		$arrQry[] = "rdTypeTop=".urlencode($_REQUEST['rdTypeTop']);
	}	
	if(isset($_REQUEST['rdTypeLeft']))
	{
		$nRdTypeLeft=$_REQUEST['rdTypeLeft'];
		$arrQry[] = "rdTypeLeft=".urlencode($_REQUEST['rdTypeLeft']);
	}	
	if(isset($_REQUEST['txtHeader']))
	{
	//echo $_REQUEST['txtHeader'];exit;
		$strHeader=RTESafe($_REQUEST['txtHeader']);
		$arrQry[] = "txtHeader=".urlencode($_REQUEST['txtHeader']);
	}
	if(isset($_REQUEST['txtEmailHeader']))
	{
		$strEmailHeader=RTESafe($_REQUEST['txtEmailHeader']);
		$arrQry[] = "txtEmailHeader=".urlencode($_REQUEST['txtEmailHeader']);
	}		
	if(isset($_REQUEST['txtFooter']))
	{
		$strFooter=RTESafe($_REQUEST['txtFooter']);
		$arrQry[] = "txtFooter=".urlencode($_REQUEST['txtFooter']);
	}
	
	/**
		Constructing a query string in an array
	**/
	$strQry = implode("&",$arrQry);

	 /**
	 	To Check if not Set (Server Side Validation)
	 **/
	if(!isset($_REQUEST['txtName']) || empty($_REQUEST['txtName']))
	{
		header("location:EditTheme.php?intMessage=303&".$strQry);
		exit;
	}
	if(!isset($_REQUEST['txtTableWidth']) || empty($_REQUEST['txtTableWidth']))
	{
		header("location:EditTheme.php?intMessage=304&".$strQry);
		exit;
	}
	if(!isset($_REQUEST['txtTableBorder']) || $_REQUEST['txtTableBorder'] === "")
	{
		header("location:EditTheme.php?intMessage=305&".$strQry);
		exit;
	}
	if(!isset($_REQUEST['txtLeftPanWidth']) ||  $_REQUEST['txtLeftPanWidth'] === "")
	{
		header("location:EditTheme.php?intMessage=306&".$strQry);
		exit;
	}
	if(!isset($_REQUEST['txtRgtPanWidth']) ||  $_REQUEST['txtRgtPanWidth'] === "")
	{
		header("location:EditTheme.php?intMessage=307&".$strQry);
		exit;
	}
	$strEmailHeader = str_replace('../',CONST_REPLACEPATH,$strEmailHeader);
	$strHeader = str_replace('../',CONST_REPLACEPATH,$strHeader);
	/**
		Assigning Values to Class Data Members
	**/
	$objTheme->m_intID=$nThemeId;
	$objTheme->m_strName=$strName;
	$objTheme->m_strHeader=$strHeader;
	$objTheme->m_strEmailHeader=$strEmailHeader;
	$objTheme->m_strFooter=$strFooter;
	$objTheme->m_nMenuePosition=$nRdMenu;
	$objTheme->m_nTopMenuStyle=$nRdTypeTop;
	$objTheme->m_nLeftMenueStyle=$nRdTypeLeft;
	$objTheme->m_nExtTabWidth=$nTableWidth;
	$objTheme->m_nExtTabBorder=$nTableBorder;
	$objTheme->m_nLeftPanWidth=$nLeftPanWidth;
	$objTheme->m_nRgtPanWidth=$nRgtPanWidth;
	$objTheme->m_nLangID=$intLangId;
	
	$nResult = $objTheme->Update();
	if($nResult)
	{
		header("location:ManageTheme.php?intMessage=115");
		exit;
	}
	else
	{
		header("location:ManageTheme.php?intMessage=116");
		exit;
	}
}
else
	header("location:Error.php");//End Right If
?>