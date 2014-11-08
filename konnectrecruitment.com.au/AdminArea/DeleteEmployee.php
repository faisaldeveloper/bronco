<?
require_once("../Includes/BackOfficeIncludesFiles.php");
if(isset($_REQUEST['hdnEmpId']) && !empty($_REQUEST['hdnEmpId'])) 
	$nEmpId=$_REQUEST['hdnEmpId'];
$objEmployeer->m_npkEmpId=$nEmpId;
$nInsert=$objEmployeer->DeleteEmployeer();
if($nInsert!=FALSE)
{
	header("location:ManageEmployee.php?intMessage=Deleted"); 
	exit;
}
else
{
	header("location:ManageEmployee.php?intMessage=Not+Deleted"); 
	exit;
}

?>