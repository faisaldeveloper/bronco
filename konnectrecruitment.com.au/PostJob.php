<?php 
		session_start();
		include("Includes/EmpSecurity.php");
		include_once("Includes/Constants.php");
		$_REQUEST['PageType']=CONST_PAGETYPE_POST_JOB;
		include("index.php"); 
?>