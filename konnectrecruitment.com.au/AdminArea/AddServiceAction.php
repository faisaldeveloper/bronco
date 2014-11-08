<?
require_once("../Includes/BackOfficeIncludesFiles.php");
if(isset($_REQUEST['txtService']) && !empty($_REQUEST['txtService'])) 
	$strService=$_REQUEST['txtService'];
$objServices->m_strServiceTitle=$strService;
$nInsert=$objServices->AddServices();
if($nInsert!=FALSE)
{
	header("location:ManageServices.php?intMessage=Added"); 
	exit;
}
else
{
	header("location:ManageServices.php?intMessage=Not+Added"); 
	exit;
}
	
?>