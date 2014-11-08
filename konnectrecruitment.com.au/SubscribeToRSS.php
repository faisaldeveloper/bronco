<?
	session_start();
	header("Content-Type: application/xml; charset=ISO-8859-1");
	include("Includes/FrontIncludes.php");	

	if(isset($_REQUEST['nModuleID']))
		$nModuleID=$_REQUEST['nModuleID'];

	//$arrNewsTitle = array();
	$objNews->m_intModuleID = $nModuleID;
	$objNews->m_intLangId = $_SESSION['intLangId'];
	echo $strXMLforRSS = $objNews->CreateXMLforRSS();

?>