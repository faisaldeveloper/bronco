<?

include("../Includes/BackOfficeIncludesFiles.php");
////////////////Role Rights Implementation///////////////////
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=301;
$nModuleID = $_REQUEST['hdnModuleID']; 

if($objAdminUser->CheckRightForAdmin()==1)
{
	$strValidImgExt='jpg,JPG,bmp,BMP,gif,GIF';
	if($_POST['chkIsAudio']==CONST_MODULE_AUDIO)
	{
		$strValidClipExt='mp3,wav,wma,WMA,ra,ram';
	}
	else
	{
		$strValidClipExt='mp3,avi,mov,wmv,WMV,mpeg,MPEG,swf,m4a,rm,ram,mpg,MPG';
	}
	$strqry[]="txtFileTitle=".$_POST['txtFileTitle'];
	$strqry[]="txrShortDesc=".$_POST['txrShortDesc'];
	$strqry[]="txrLongDesc=".$_POST['txrLongDesc'];
	$strQry=implode('&',$strqry);
	//print_r($strQry);exit;
if(!isset($_POST['txtFileTitle']) || empty($_POST['txtFileTitle']) || !isset($_POST['txrShortDesc']) || empty($_POST['txrShortDesc']) || !isset($_FILES['flVideoClip']['name']) || empty($_FILES['flVideoClip']['name']) )
{
	header("location:AddFile.php?intMessage=432&hdnModuleID=".$nModuleID."&Type=".$_POST['chkIsAudio']."&".$strQry);
	exit;
}
else if( (!empty($_FILES['flImage']['name']) && !IsFileExtValid($_FILES['flImage']['name'],$strValidImgExt) ) || ( !IsFileExtValid($_FILES['flVideoClip']['name'],$strValidClipExt) ) )
{

	header("location:AddFile.php?intMessage=434&hdnModuleID=".$nModuleID."&Type=".$_POST['chkIsAudio']."&".$strQry);
	exit;
}

/*******************    initialize variables    ************************************/
$strFileTitle="";
$strShortDesc="";
$strLongDesc="";
$nIsAudio=0;
$strImage="";
$strVideo="";
/*******************Get Values From AddFiles Form************************************/
if(isset($_POST['txtFileTitle']))
	$strTitle=$_POST['txtFileTitle'];
if(isset($_POST['txrShortDesc']))
	$strShortDesc =$_POST['txrShortDesc'];
if(isset($_POST['txrLongDesc']))
	$strLongDesc= $_POST['txrLongDesc'];
if(isset($_FILES['flImage']) )
	$strImage=$_FILES['flImage']['name'];	
if(isset($_FILES['flVideoClip']) )
	$strFile=$_FILES['flVideoClip']['name'];	
if($_POST['chkIsAudio']==CONST_MODULE_AUDIO)
	$nIsAudio=1;
else
	$nIsAudio=0;	
	
/*************************************************************************************/

$objFile=new clsFile();
$nFile = $objFile->Add($strFile,$strTitle,$strShortDesc,$strLongDesc,$strImageCtl="flImage",$strVideoClipCtl="flVideoClip",$strValidClipExt,$strValidImgExt,$strImage,$nModuleID,$nIsAudio);

if($nFile)
	header("location:ViewFilesList.php?Type=".$_POST['chkIsAudio']."&intMessage=431&hdnModuleID=".$nModuleID);
else
	header("location:ViewFilesList.php?Type=".$_POST['chkIsAudio']."&intMessage=433&hdnModuleID=".$nModuleID);
	
}
?>