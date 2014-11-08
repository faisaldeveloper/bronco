<?php
require_once("../Includes/BackOfficeIncludesFiles.php");
$objNews = new clsNews();
$nNewsId=$_REQUEST['hdnNewsId'];
$pkModuleID=$_REQUEST['hdnModuleId'];
//echo "module id-------".$pkModuleID; exit;

//print "Here>>>".$nNewsId;
//exit;
if($_POST['chkImageGal'])
{
	$arr=$_POST['chkImageGal'];//print_r($arr)
	foreach ($arr as $value)
	{
		//print_r($_POST);exit;
		$objNews->m_intNewsFileId = $value;
		//echo "pkImageId==>>".$value;exit;
		$intDel = $objNews->DeleteFile();
		
		// do not go futher 
	}
}

if($intDel)
	header("location:AddNewsFile.php?intMessage=214&NewsId=${nNewsId}&hdnModuleId=".$pkModuleID);
else
	header("location:AddNewsFile.php?intMessage=215&NewsId=${nNewsId}&hdnModuleId=".$pkModuleID);
?>
