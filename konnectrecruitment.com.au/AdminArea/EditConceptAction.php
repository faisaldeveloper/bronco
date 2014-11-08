<?php
	include("../Includes/BackOfficeIncludesFiles.php");
////////////////Role Rights Implementation///////////////////
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=272;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{
	/**
	getting page no
	**/
	$intPage = $_REQUEST['intPage'];
	
	/**
	assigning values to variables
	**/
	if(isset($_POST['txtTitle']))
		$strConceptDesc = $_POST['txtTitle'];
	if(isset($_POST['hdnConceptId']))
		$nConceptId = $_POST['hdnConceptId'];
	
	/**
	 	To Check if not Set (Server Side Validation)
	 **/
	if(!isset($_POST['hdnConceptId']) || empty($_POST['hdnConceptId']))
	{
		header("Location:ManageConcept.php?intMessage=266&intPage=${intPage}");
		exit;
	}

	if(!isset($_POST['txtTitle']) || empty($_POST['txtTitle']))
	{
		header("Location:EditConcept.php?intMessage=68&intPage=${intPage}&ConceptId=${nConceptId}");
		exit;
	}
	
	/**
	creating object
	**/
	$objConcept = new clsConcept();
	
	/**
	assigning values to class variables
	**/
	$objConcept->m_intConceptId = $nConceptId;
	$objConcept->strConceptDesc = $strConceptDesc;
	
	/**
	calling the class function to update the concept
	**/
	$intInsert = $objConcept->UpdateConcept();
	
	if($intInsert == "0")	//If this concept is attached to any message or confirmation message then cant delete
		header("location:ManageConcept.php?intMessage=294&intPage=${intPage}");
	else if ($intInsert)
		header("location:ManageConcept.php?intMessage=292&intPage=${intPage}"); //if concept is deleted successfully
	else  
		header("location:ManageConcept.php?intMessage=293&intPage=${intPage}");//if concept is not deleted successfully
}
else
	header("location:Error.php");//End Right If
?>