<?php
session_start();
include("Includes/EmpSecurity.php");
include("Includes/FrontIncludes.php");
$strCompanyName = "";
$strContactPerson = "";
$strAddress = "";
$strSubrubs = "";
$nState = 0;
$strPostCode = "";
$strTeleNo = "";
$strWebSite = "";
if(isset($_REQUEST['txtCompanyName']) && !empty($_REQUEST['txtCompanyName']))
{
	$strCompanyName = $_REQUEST['txtCompanyName'];
}
if(isset($_REQUEST['txtContactPerson']) && !empty($_REQUEST['txtContactPerson']))
{
	$strContactPerson = $_REQUEST['txtContactPerson'];
}
if(isset($_REQUEST['txtAddress']) && !empty($_REQUEST['txtAddress']))
{
	$strAddress = $_REQUEST['txtAddress'];
}
if(isset($_REQUEST['txtSubrubs']) && !empty($_REQUEST['txtSubrubs']))
{
	$strSubrubs = $_REQUEST['txtSubrubs'];
}
if(isset($_REQUEST['lstState']) && !empty($_REQUEST['lstState']))
{
	$nState = $_REQUEST['lstState'];
}
if(isset($_REQUEST['txtPostCode']) && !empty($_REQUEST['txtPostCode']))
{
	$strPostCode = $_REQUEST['txtPostCode'];
}
if(isset($_REQUEST['txtTelePhone']) && !empty($_REQUEST['txtTelePhone']))
{
	$strTeleNo = $_REQUEST['txtTelePhone'];
}
if(isset($_REQUEST['txtWebUrl']) && !empty($_REQUEST['txtWebUrl']))
{
	$strWebSite = $_REQUEST['txtWebUrl'];
}
if($strCompanyName == "" || $strContactPerson == "" || $strAddress == "" || $strSubrubs == "" || $nState == 0 || $strPostCode == "" || $strTeleNo == "")
{
	header("location:EmployeeEditProfile.php");
	exit();
}

$objEmployeer->m_strCompanyName = $strCompanyName;
$objEmployeer->m_strContactPerson = $strContactPerson;
$objEmployeer->m_strAddress = $strAddress;
$objEmployeer->m_strSubrubs = $strSubrubs;
$objEmployeer->m_nfkStateId = $nState;
$objEmployeer->m_strPostCode = $strPostCode;
$objEmployeer->m_strTelePhone = $strTeleNo;
$objEmployeer->m_strWebSiteUrl = $strWebSite;
$Result = $objEmployeer->EditEmployeer();
if($Result > 0)
{
	header("location:EmployeeEditProfile.php");
	exit();
}
else
{
	header("location:EmployeeEditProfile.php");
	exit();
}
?>