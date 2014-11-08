<?
require_once("../Includes/BackOfficeIncludesFiles.php");
if(isset($_REQUEST['txtSate']) && !empty($_REQUEST['txtSate'])) 
	$strSate=$_REQUEST['txtSate'];
$objState->m_strStateName=$strSate;
$nInsert=$objState->AddState();
if($nInsert!=FALSE)
{
	header("location:ManageState.php?intMessage=Added"); 
	exit;
}
else
{
	header("location:ManageState.php?intMessage=Not+Added"); 
	exit;
}
	
?>