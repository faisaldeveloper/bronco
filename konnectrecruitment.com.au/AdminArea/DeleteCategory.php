<?
require_once("../Includes/BackOfficeIncludesFiles.php");
if(isset($_REQUEST['hdnCatId']) && !empty($_REQUEST['hdnCatId'])) 
	$nCatId=$_REQUEST['hdnCatId'];
$objCategory->m_npkCatId=$nCatId;
$nInsert=$objCategory->DeleteCategory();
if($nInsert!=FALSE)
{
	header("location:ManageCategory.php?intMessage=Deleted"); 
	exit;
}
else
{
	header("location:ManageCategory.php?intMessage=Not+Deleted"); 
	exit;
}

?>