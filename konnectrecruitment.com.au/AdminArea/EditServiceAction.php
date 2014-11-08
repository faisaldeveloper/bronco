<?
require_once("../Includes/BackOfficeIncludesFiles.php");
if(isset($_REQUEST['txtService']) && !empty($_REQUEST['txtService'])) 
	$strService=$_REQUEST['txtService'];
if(isset($_REQUEST['hdnServiceId']) && !empty($_REQUEST['hdnServiceId'])) 
	$nServiceId=$_REQUEST['hdnServiceId'];
$objServices->m_strServiceTitle=$strService;
$objServices->m_npkServiceId=$nServiceId;
$nInsert=$objServices->EditServices();
if($nInsert!=FALSE)
{
	header("location:ManageServices.php?intMessage=Edited"); 
	exit;
}
else
{
	header("location:ManageServices.php?intMessage=Not+Edited"); 
	exit;
}
	
?>