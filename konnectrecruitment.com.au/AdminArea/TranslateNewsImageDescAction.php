<?php 
include("../Includes/BackOfficeIncludesFiles.php");
/**
server side validation
**/
$nId=$_REQUEST['hdnId'];
$intLangId=$_REQUEST['hdnLangId'];
$nModuleId=$_REQUEST['hdnModuleId'];
$strDescription=$_REQUEST['txtDescripton'];
$intfkImgId=$_REQUEST['hdnfkImgId'];
$nNewsID=$_REQUEST['hdnNewsId'];
$objNews=new clsNews();	//Creating object of News class
$objNews->m_intLangId=$intLangId;
$objNews->m_nfkImgId=$nId;
$objNews->m_strImageDesc=$strDescription;
//print_r($_POST);

$iCheck=$objNews->TranslateNewsImageDesc();
//echo $iCheck;
if($iCheck)
	header("location:AddNewsImage.php?hdnModuleId=$nModuleId&intMessage=24&NewsId=$nNewsID");
else
	header("location:AddNewsImage.php?hdnModuleId=$nModuleId&intMessage=23&NewsId=$nNewsID");

/*													End of Tranlating									*/
?>