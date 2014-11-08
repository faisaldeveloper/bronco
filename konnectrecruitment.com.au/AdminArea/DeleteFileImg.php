<?

require_once("../Includes/BackOfficeIncludesFiles.php");

/*******************Get Values From EditFiles Form************************************/
if (!isset($_GET['nFileId']))
{
	header("location:index.php");
	exit();
}

if(isset($_GET['File']) && $_GET['File']=="Video")
{
	$strVideoClip="";
	if(isset($_GET['strVideoClip']))
		$strVideoClip=$_GET['strVideoClip'];
	$objFile=new clsFile();
	
	$objFile->m_nId=$_GET['nFileId'];
	$rsMov=$objFile->DelFileClip($strVideoClip);
	
}
else
{
	$strPic="";
	if (isset($_GET['strPic']))
		$strPic=$_GET['strPic'];
	$objFile=new clsFile();
	$objFile->m_nId=$_GET['nFileId'];
	$rsMov=$objFile->DelFileImg($strPic);
	
}
header("location:EditFile.php?hdnFileId=".$_GET['nFileId']."&hdnModuleID=".$_REQUEST['hdnModuleID']."&Type=".$_REQUEST['Type']);
exit();
?>

<!--<form name="frm1" action="EditFile.php" method="post">
	<input type="hidden" name="hdnFileId" value="<?//=$_GET['nFileId'];?>">	
</form>
<script>window.document.frm1.submit();</script>;
-->