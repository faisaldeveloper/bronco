<?php
	require_once("../Includes/BackOfficeIncludesFiles.php");
////////////////Role Rights Implementation///////////////////
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=271;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{
	$objConcept = new clsConcept();
	/**
	 	To Check if not Set (Server Side Validation)
	 **/
	if(!isset($_REQUEST['hdnConceptId']) || empty($_REQUEST['hdnConceptId']))
	{
		header("Location:ManageConcept.php?intMessage=102");
		exit;
	}
	
	if(isset($_REQUEST['hdnPage'])) 
		$nPage = $_REQUEST['hdnPage'];
	
	$objConcept->m_intConceptId=$_REQUEST['hdnConceptId'];
	
	if($objConcept->DeleteConcept())
		header("location:ManageConcept.php?intMessage=287&intPage=${nPage}");
	else
		header("location:ManageConcept.php?intMessage=288&intPage=${nPage}");
}
else
	header("location:Error.php");//End Right If
?>