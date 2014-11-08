<?php
session_start();
include("Includes/FrontIncludes.php");
$strEmail = "";
$strPassword = "";
if(isset($_REQUEST['txtEmail']) && !empty($_REQUEST['txtEmail']))
{
	$strEmail = $_REQUEST['txtEmail'];
}
if(isset($_REQUEST['pwdEmpPassword']) && !empty($_REQUEST['pwdEmpPassword']))
{
	$strPassword = $_REQUEST['pwdEmpPassword'];
}
if($strEmail == "" || $strPassword == "")
{
	$_SESSION['intMessage'] = 105;
	header("location:EmployeeLogin.php");
	exit();
}
if(checkEmail($strEmail)==FALSE)
{
	$_SESSION['intMessage'] = 120;
	header("location:EmployeeLogin.php");
	exit();
}

$strPassword = ereg_replace("[\'\")(;|`,<>]", "", $strPassword);
$strPassword = mysql_real_escape_string($strPassword);

$objEmployeer->m_strEmail = $strEmail;
$objEmployeer->m_strPassword = sha1($strPassword);
$RsEmp = $objEmployeer->VerifyEmployeer();
if($RsEmp!=FALSE && mysql_num_rows($RsEmp)>0)
{
	$RowEmp = mysql_fetch_object($RsEmp);
	$_SESSION['EmpId'] = $RowEmp->pkEmpId;
	header("location:PostJob.php");
	exit();
}
else
{
	$_SESSION['intMessage'] = 479;
	header("location:EmployeeLogin.php");
	exit();
}
?>