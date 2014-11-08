<?
require_once("../Includes/BackOfficeIncludesFiles.php");
if(isset($_REQUEST['txtSate']) && !empty($_REQUEST['txtSate'])) 
	$strSate=$_REQUEST['txtSate'];
if(isset($_REQUEST['hdnStateId']) && !empty($_REQUEST['hdnStateId'])) 
	$nStateId=$_REQUEST['hdnStateId'];
$objState->m_strStateName=$strSate;
$objState->m_npkStateId=$nStateId;
$nInsert=$objState->EditState();
if($nInsert!=FALSE)
{
	header("location:ManageState.php?intMessage=Edited"); 
	exit;
}
else
{
	header("location:ManageState.php?intMessage=Not+Edited"); 
	exit;
}
	
?>