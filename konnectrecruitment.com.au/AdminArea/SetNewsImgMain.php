<?
require_once("../Includes/BackOfficeIncludesFiles.php");
/**
Serrver side validation
**/
if(!isset($_REQUEST['nNewsId'])||empty($_REQUEST['nNewsId']))
{
	header("location:ManageNews.php?intMessage=377");
	exit;
}
/**
Creating class objects
**/
$objNews = new clsNews();
/**
Coping data from query string
**/
if(isset($_REQUEST['nNewsId']))
	$nNewsId = $_REQUEST['nNewsId'];
if(isset($_REQUEST['nNewsImageID']))
	$nNewsImageId=$_REQUEST['nNewsImageID'];
if(isset($_REQUEST['nLangId']))
	$intLangId = $_REQUEST['nLangId'];
/**
Transfering data to class variables
**/
$objNews->m_intNewsImageId= $nNewsImageId;
$objNews->m_intNewsId = $nNewsId;
$res=$objNews->SetAsMainImage();
if($res)
header("location:AddNewsImage.php?hdnModuleId=".$_REQUEST['hdnModuleId']."&EventId=${intEventId}&LangId=${intLangId}&NewsId=${nNewsId}&intMessage=310");
else 
header("location:AddNewsImage.php?hdnModuleId=".$_REQUEST['hdnModuleId']."&EventId=${intEventId}&LangId=${intLangId}&NewsId=${nNewsId}&intMessage=311");
?>
