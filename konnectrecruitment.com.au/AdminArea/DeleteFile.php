<?

require_once("../Includes/BackOfficeIncludesFiles.php");

	$nModuleID = $_REQUEST['hdnModuleID'];
/*******************Get Values From Form************************************/
if(isset($_POST['hdnFileId']) && !empty($_POST['hdnFileId']))
{
	$objFile->m_nId=$_POST['hdnFileId'] ;//$_POST['hdnMovId'];
	$rsFile=$objFile->Delete();
	if($rsFile)
		header("location:ViewFilesList.php?intMessage=427&hdnModuleID=".$nModuleID);
	else
		header("location:ViewFilesList.php?intMessage=428&hdnModuleID=".$nModuleID);
}
else if(isset($_POST['chkFile']) && !empty($_POST['chkFile']))
{
	$arrCheck=array();
	foreach($_POST['chkFile'] as $Id)
	{
		$objFile->m_nId=$Id ;
		if($objFile->Delete())
			array_push($arrCheck,1);
		else	
			array_push($arrCheck,0);
	}
	header("location:ViewFilesList.php?intMessage=427&hdnModuleID=".$nModuleID);
}
else
	header("location:ViewFilesList.php?intMessage=428&hdnModuleID=".$nModuleID);

?>