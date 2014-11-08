<?
require_once("../Includes/BackOfficeIncludesFiles.php");
if(isset($_REQUEST['txtCat']) && !empty($_REQUEST['txtCat'])) 
	$strCat=$_REQUEST['txtCat'];
$objCategory->m_strCatName=$strCat;
$nInsert=$objCategory->AddCategory();
if($nInsert!=FALSE)
{
	header("location:ManageCategory.php?intMessage=Added"); 
	exit;
}
else
{
	header("location:ManageCategory.php?intMessage=Not+Added"); 
	exit;
}
	
?>