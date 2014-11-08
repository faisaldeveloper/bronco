<?php
require_once("../Includes/BackOfficeIncludesFiles.php");
$objPages = new clsPages();
$intPageId = $_POST['hdnPageId'];
$intLangId = $_POST['hdnLangId'];
$nParentId = $_POST['hdnParentId'];
$objPages->m_intPageId = $intPageId;
$objPages->m_intLangId = $intLangId;
$arrPages = $objPages->GetPageById();
$arrRecPages = mysql_fetch_object($arrPages);
$objPages->m_strPageName = $arrRecPages->PageName;
if(isset($_FILES['flAddPageFile']['name']))
{
	$strRealPathFile = "AdminLogin";
	$strDestFolder = "../PageFiles";
	$strFilePrefix = $objPages->GetPageId();
	$strValidExtension = "txt,doc,csv,xls,pdf,ppt,rtf,htm,html,php";
	$strControlName = "flAddPageFile";
	$intMaxSize=1048576;
	$strUploaded = UploadFile($strRealPathFile, $strDestFolder, $strFilePrefix, $strValidExtension, $strControlName, $intMaxSize);
	if(strpos($strUploaded,"_")>-1)
	{
		$objPages->m_strFileName = $strUploaded;
		$intRet = $objPages->AddPageFile();
		
		if($intRet)
			header("location:ManagePages.php?intMessage=204&btnView=YES&lstLanguage=${intLangId}&hdnParentId=${nParentId}");
		else	
			header("location:ManagePages.php?intMessage=205&btnView=YES&lstLanguage=${intLangId}&hdnParentId=${nParentId}");
	}
	else 
	header("location:ManagePages.php?intMessage=205&btnView=YES&lstLanguage=${intLangId}&hdnParentId=${nParentId}");
}
else
	header("location:ManagePages.php?intMessage=205&btnView=YES&lstLanguage=${intLangId}&hdnParentId=${nParentId}");

?>