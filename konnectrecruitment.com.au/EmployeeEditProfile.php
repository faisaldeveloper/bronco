<?php
		session_start();
		include("Includes/EmpSecurity.php");
		include_once("Includes/Constants.php");
		$_REQUEST['PageType']=CONST_PAGETYPE_EMPLOYEE_PROFILE;
		include("index.php"); 
?>