<?
require_once("../Includes/BackOfficeIncludesFiles.php");
if(isset($_REQUEST['hdnStateId']) && !empty($_REQUEST['hdnStateId'])) 
	$nStateId=$_REQUEST['hdnStateId'];
$objState->m_npkStateId=$nStateId;
$nInsert=$objState->DeleteState();
if($nInsert!=FALSE)
{
	header("location:ManageState.php?intMessage=Deleted"); 
	exit;
}
else
{
	header("location:ManageState.php?intMessage=Not+Deleted"); 
	exit;
}

?>