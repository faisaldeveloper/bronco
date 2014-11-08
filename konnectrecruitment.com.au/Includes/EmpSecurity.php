<?php
ob_start();
if(!isset($_SESSION['EmpId']) || empty($_SESSION['EmpId']))
{
	header("location:EmployeeLogin.php");
	exit();
}
?>