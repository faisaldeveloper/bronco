<?php
//////////////////////// For Displaying of Product Details

$bAllProds = FALSE;
$bAllProdsSelCats = FALSE;
$bSelProds = FALSE;
$bNoProds = FALSE;

/////////////////////////////////////////////////////////
$arrOptions = GetGlobalOptions();
if($arrOptions != FALSE)
{
	$arrRecOptions = mysql_fetch_object($arrOptions);
	$intRowsPerPage = $arrRecOptions->RowsPerPage;
	$strSiteTitle = $arrRecOptions->SiteTitle;
	$strCompanyName = $arrRecOptions->CompanyName;
	$strStAddress = $arrRecOptions->StAddress;
	$strPostCode = $arrRecOptions->PostCode;
	$strState = $arrRecOptions->State;
	$strPhoneNo = $arrRecOptions->PhoneNo;
	$strFax = $arrRecOptions->Fax;
	$strMobile = $arrRecOptions->Mobile;
	$intExtTabWidth = $arrRecOptions->ExtTabWidth;
	$intExtTabBorder = $arrRecOptions->ExtTabBorder;
	$intLeftPanWidth = $arrRecOptions->LeftPanWidth;
	$intRgtPanWidth = $arrRecOptions->RgtPanWidth;
	$strAdminEmail = $arrRecOptions->AdminEmail;
	$strAdminEmailRec = $arrRecOptions->AdminEmailRec;
	$strLastDaysScrollNews = $arrRecOptions->LastDaysScrollNews;
	$strLatestScrollNews = $arrRecOptions->LatestScrollNews ;
	$strLastDayMainNews = $arrRecOptions->LastDayMainNews;
	$strLatestMainNews = $arrRecOptions->LatestMainNews ;
	$strMainNewsOnTop = $arrRecOptions->MainNewsOnTop ;
	$strNewsPerRow = $arrRecOptions->NewsPerRow ;
	$strMoreNewsOnTop = $arrRecOptions->MoreNewsOnTop ;
	$strMoreNewsPerRow = $arrRecOptions->MoreNewsPerRow ;
	$strMainNewsLayout = $arrRecOptions->MainNewsLayout ;
	$strMoreNewsLayout = $arrRecOptions->MoreNewsLayout ;
	$strAdminEmailRec = $arrRecOptions->AdminEmailRec;
	$strFreightEmail = $arrRecOptions->FreightEmail;
	$intFaktAmt = $arrRecOptions->FaktAmt;
	$intProdDisplay  = $arrRecOptions->ProductDisplay;
	$strNewsDetailLayout = $arrRecOptions->NewsDetailLayout ;
	$nOtherImgOption = $arrRecOptions->OtherImgOptions;
	$nQtyChk = $arrRecOptions->QtyChk;
}
else
{
	$intRowsPerPage = 1;
	$strSiteTitle = "";
	$strCompanyName = "";
	$strStAddress = "";
	$strPostCode = "";
	$strState = "";
	$strPhoneNo = "";
	$strFax = "";
	$strMobile = "";
	$intExtTabWidth = 780;
	$intExtTabBorder = 0;
	$intLeftPanWidth = 150;
	$intRgtPanWidth = 150;
	$strAdminEmail = "";
	$intFaktAmt = "";
	$intProdDisplay = 4;
	$nQtyChk=0;
}

//////////////////////// For Displaying of Product Details


switch($intProdDisplay)
{
	case 1;	
		$bAllProds = TRUE;
	break;
	case 2;
		$bAllProdsSelCats = TRUE;
	break;
	case 3;
		$bSelProds = TRUE;
	break;
	default : $bNoProds = TRUE;
}


?>