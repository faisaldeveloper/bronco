<?php
	include("../Includes/BackOfficeIncludesFiles.php");
////////////////Role Rights Implementation///////////////////
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=259;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{
	/**
		Variable Initalization
	**/
	$strName="";
	$strQry = "";
	$nTableBorder=0;
	$arrQry = array();
	$intLangId = $_SESSION['intLangId'];

	/***
		server side validation
	**/
	if(isset($_REQUEST['lstTempType']))
	{
		$nTempType=$_REQUEST['lstTempType'];
		$arrQry[] = "lstTempType=".urlencode($_REQUEST['lstTempType']);
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
		$nTableBorder=(int)$_REQUEST['txtTableBorder'];
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
		header("location:AddTheme.php?intMessage=303&".$strQry);
		exit;
	}
	if(!isset($_REQUEST['txtTableWidth']) || empty($_REQUEST['txtTableWidth']))
	{
		header("location:AddTheme.php?intMessage=304&".$strQry);
		exit;
	}
	if(!isset($_REQUEST['txtTableBorder']) || $_REQUEST['txtTableBorder']=="")
	{
		header("location:AddTheme.php?intMessage=305&".$strQry);
		exit;
	}
	if(!isset($_REQUEST['txtLeftPanWidth']) || empty($_REQUEST['txtLeftPanWidth']))
	{
		header("location:AddTheme.php?intMessage=306&".$strQry);
		exit;
	}
	if(!isset($_REQUEST['txtRgtPanWidth']) || empty($_REQUEST['txtRgtPanWidth']))
	{
		header("location:AddTheme.php?intMessage=307&".$strQry);
		exit;
	}

	/**
		Assigning Values to Class Data Members
	**/
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
	$objTheme->m_nThemeType=$nTempType;
	$objTheme->m_nLangID=$intLangId;
	
	/**
		calling the class member funtion to add
	**/
	$nResult = $objTheme->Add();
	if($nResult > 0)
	{
		$arrStyles = $objTheme->arrDefaultStyles;
		foreach($arrStyles as $nStyleID=>$arrStylesValue)
		{
			//echo "<br>".$nStyleID;
			//echo "<br>".$arrStylesValue[0];
			//echo "<br>".$arrStylesValue[1];
			$nCheck = $objTheme->AddDefaultStyles($nResult,$nStyleID,$arrStylesValue[1]);
		}
	}
	if($nResult > 0)
	{
		header("location:ManageTheme.php?intMessage=110"); //if theme is added successfully
		exit;
	}
	else
	{
		header("location:ManageTheme.php?intMessage=111");//if theme is not added successfully
		exit;
	}
}
else
	header("location:Error.php");//End Right If
?>