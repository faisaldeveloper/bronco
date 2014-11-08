<?php
session_start();
include("Includes/FrontIncludes.php");
$strCompanyName = "";
$strContactPerson = "";
$strEmail = "";
$strAddress = "";
$strSubrubs = "";
$nState = 0;
$strPostCode = "";
$strTeleNo = "";
$strWebSite = "";
$strPassword = "";
if(isset($_REQUEST['txtCompanyName']) && !empty($_REQUEST['txtCompanyName']))
{
	$strCompanyName = $_REQUEST['txtCompanyName'];
}
if(isset($_REQUEST['txtContactPerson']) && !empty($_REQUEST['txtContactPerson']))
{
	$strContactPerson = $_REQUEST['txtContactPerson'];
}
if(isset($_REQUEST['txtEmail']) && !empty($_REQUEST['txtEmail']))
{
	$strEmail = $_REQUEST['txtEmail'];
}
if(isset($_REQUEST['pwdEmpPassword']) && !empty($_REQUEST['pwdEmpPassword']))
{
	$strPassword = $_REQUEST['pwdEmpPassword'];
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
if($strCompanyName == "" || $strContactPerson == "" || $strEmail == "" || $strPassword == "" ||$strAddress == "" || $strSubrubs == "" || $nState == 0 || $strPostCode == "" || $strTeleNo == "")
{
	$_SESSION['intMessage'] = 105;
	header("location:EmployeerRegistration.php");
	exit();
}
if(checkEmail($strEmail)==FALSE)
{
	$_SESSION['intMessage'] = 120;
	header("location:EmployeerRegistration.php");
	exit();
}
$objEmployeer->m_strCompanyName = $strCompanyName;
$objEmployeer->m_strContactPerson = $strContactPerson;
$objEmployeer->m_strEmail = $strEmail;
$objEmployeer->m_strAddress = $strAddress;
$objEmployeer->m_strPassword = sha1($strPassword);
$objEmployeer->m_strSubrubs = $strSubrubs;
$objEmployeer->m_nfkStateId = $nState;
$objEmployeer->m_strPostCode = $strPostCode;
$objEmployeer->m_strTelePhone = $strTeleNo;
$objEmployeer->m_strWebSiteUrl = $strWebSite;
$RsCheck = $objEmployeer->CheckEmailRecord();
if($RsCheck!=FALSE && mysql_num_rows($RsCheck)>0)
{
	$_SESSION['intMessage'] = 8;
	header("location:EmployeerRegistration.php?intMessage=390");
	exit();
}
$nEmpId = $objEmployeer->AddEmployeer();
if($nEmpId > 0)
{
	$_SESSION['intMessage'] = 7;
	header("location:EmployeeLogin.php");
	exit();
}
else
{
	$_SESSION['intMessage'] = 480;
	header("location:EmployeerRegistration.php");
	exit();
}
?>