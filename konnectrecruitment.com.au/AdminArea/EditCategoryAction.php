<?
require_once("../Includes/BackOfficeIncludesFiles.php");
if(isset($_REQUEST['txtCat']) && !empty($_REQUEST['txtCat'])) 
	$strCat=$_REQUEST['txtCat'];
if(isset($_REQUEST['hdnCatId']) && !empty($_REQUEST['hdnCatId'])) 
	$nCatId=$_REQUEST['hdnCatId'];
$objCategory->m_strCatName=$strCat;
$objCategory->m_npkCatId=$nCatId;
$nInsert=$objCategory->EditCategory();
if($nInsert!=FALSE)
{
	header("location:ManageCategory.php?intMessage=Edited"); 
	exit;
}
else
{
	header("location:ManageCategory.php?intMessage=Not+Edited"); 
	exit;
}
	
?>