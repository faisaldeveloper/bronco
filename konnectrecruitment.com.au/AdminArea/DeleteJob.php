<?php
include("../Includes/BackOfficeIncludesFiles.php");
if(isset($_REQUEST['hdnEmpId']) && !empty($_REQUEST['hdnEmpId'])) 
	$nEmpId=$_REQUEST['hdnEmpId'];

if(isset($_REQUEST['hdnJobId']) && !empty($_REQUEST['hdnJobId'])) 
	$nJobId=$_REQUEST['hdnJobId'];
$objJob->m_npkJobId = $nJobId;
$objJob->DeleteJob();

header("location:ViewJobs.php?hdnEmpId=".$nEmpId);
exit;
?>