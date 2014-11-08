<?
	require_once("Includes/FrontIncludes.php");
	session_start();
	$_SESSION['intLangId']=$_REQUEST['nLangId'];
	$strPageName = $_REQUEST['pagefrname'];
	
	header("location:index.php?pagefrname=".$strPageName);
	exit;

?>