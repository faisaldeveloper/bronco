<?
require_once("../Includes/BackOfficeIncludesFiles.php");
if(isset($_REQUEST['hdnServiceId']) && !empty($_REQUEST['hdnServiceId'])) 
	$nServiceId=$_REQUEST['hdnServiceId'];
$objServices->m_npkServiceId=$nServiceId;
$nInsert=$objServices->DeleteServices();
if($nInsert!=FALSE)
{
	header("location:ManageServices.php?intMessage=Deleted"); 
	exit;
}
else
{
	header("location:ManageServices.php?intMessage=Not+Deleted"); 
	exit;
}

?>