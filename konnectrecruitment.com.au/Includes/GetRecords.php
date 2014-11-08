<?php
// Stop caching of this page //////////////////////////////////
header( "Expires: Mon, 20 Dec 1998 01:00:00 GMT" );
header( "Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT" );
header( "Cache-Control: no-cache, must-revalidate" );
header( "Pragma: no-cache" );
// End Stop caching of this page //////////////////////////////

require_once("Configuration.inc.php");
require_once("functions.php");
require_once("Constants.php");
require_once("AllClasses.php");
require_once("db.php");

$nCase=$_REQUEST['nCaseID'];
$strControlName=$_REQUEST['strControlName'];
$strWhere=$_REQUEST['strCriteria'];
$strOnChange=$_REQUEST['strOnChange'];
$nComboOptions = 0;
if(isset($_REQUEST['nComboOptions']) && $_REQUEST['nComboOptions']==1)
	$nComboOptions = 1;
$objAjaxQuery->GetDataRecords($nCase,$strWhere,$strControlName,$strOnChange, $nComboOptions);
?>
