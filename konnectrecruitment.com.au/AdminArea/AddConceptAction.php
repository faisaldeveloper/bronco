<?php
	/**
	include fiels
	**/
	include("../Includes/BackOfficeIncludesFiles.php");
////////////////Role Rights Implementation///////////////////
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=270;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{
	/**
	getting page no
	**/
	$intPage = $_REQUEST['intPage'];
	
	/**
	 	To Check if not Set (Server Side Validation)
	 **/
	if(!isset($_POST['txtTitle']) || empty($_POST['txtTitle']))
	{
		header("Location:AddConcept.php?intMessage=68&intPage=${intPage}");
		exit;
	}
	
	/**
	creating object
	**/
	$objConcept = new clsConcept();
	
	/**
	getting values
	**/
	if(isset($_POST['txtTitle']) && !empty($_POST['txtTitle']))
		$strConceptDesc = $_POST['txtTitle'];
	$objConcept->strConceptDesc = $strConceptDesc;
	
	$intInsert = $objConcept->AddConcept();
	if ($intInsert)
		header("location:ManageConcept.php?intMessage=280&intPage=${intPage}");
	else
		header("location:ManageConcept.php?intMessage=281&intPage=${intPage}");
}
else
	header("location:Error.php");//End Right If
?>