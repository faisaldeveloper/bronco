<?php
require_once("../Includes/BackOfficeIncludesFiles.php");
$objNews = new clsNews();
$objCMessage=new clsConfirmMessage();
//echo "I am here ==>>";print_r($_POST['chkImageGal']);exit;
$intNewsId = $_REQUEST['hdnNewsId'];
$intNewsImageId = $_REQUEST['hdnNewsImageID'];
$intLangId = $_REQUEST['hdnLangId'];
$intEventId = $_REQUEST['EventId'];
$pkModuleID=$_REQUEST['hdnModuleId'];
$objGallery = new clsGallery();
$objNews->m_intNewsId=$intNewsId;
if($_POST['chkImageGal'])
	{
		$arr=$_POST['chkImageGal'];//print_r($arr);
		foreach ($arr as $value)
		{$objNews->m_intLangId=$intLangId;
			$objNews->m_intNewsImageId =$value;
			$intDel = $objNews->DeleteNewsImage();
		}
	}
if($intDel)
	header("location:AddNewsImage.php?intMessage=318&EventId=${intEventId}&LangId=${intLangId}&NewsId=${intNewsId}&hdnModuleId=".$pkModuleID);
else	
	header("location:AddNewsImage.php?intMessage=336&EventId=${intEventId}&LangId=${intLangId}&NewsId=${intNewsId}&hdnModuleId=".$pkModuleID);
?>
