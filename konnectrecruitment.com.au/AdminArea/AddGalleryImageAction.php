<?
require_once("../Includes/BackOfficeIncludesFiles.php");

/////////////////////////////////////////////Getting values from AddNewGPicture.php//////////////////////
if (isset($_REQUEST['hdnGalleryID']))
	$nGalleryID = $_REQUEST['hdnGalleryID'];
else
{
	header("location:ManageGallery.php?intMessage=285");
	exit;
}	

if(isset($_POST['hdnAction']) && $_POST['hdnAction']=="Edit")
{

	if(isset($_POST['chkStatus']))		$iStatus=1;
	else		$iStatus=0;
	$iRank=			$_POST['cmbRank'];
	//print $iRank;exit;
	$iImageId=		$_POST['hdnImageId'];
	$iLangId= $_POST['hdnLangID'];
	$strImageDesc=	$_POST['txtImageDesc'];
	//echo "|||".$iImageId."|||"; echo $iLangId."|||";echo $strImageDesc;exit;
	$objGallery=new clsGallery();	//Creating object of Gallery Class
	$objGallery->m_intLangId = $iLangId;
	$objGallery->m_intGImageId = $iImageId;
	if(isset($_FILES['flImage']))
	{
		$strImageName=	$_FILES['flImage']['name'];
		$strRealPathFile="index.php";
		$strDestFolder="../GalleryPictures";
		$strValidExtension="gif,jpg,jpeg,tiff,png,bmp";
		$strControlName="flImage";
		$strImagePrefix="";
		$intMaxWidth=600;
		$intMaxHeight=600;
		$intMaxSize=1048576;
		UploadFile($strRealPathFile, $strDestFolder, $strImagePrefix, $strValidExtension, $strControlName, $intMaxSize, $intMaxWidth, $intMaxHeight);
	}
	else
	{
		$rsGallery=$objGallery->GetImageGalleryById();
		$strRowGallery=mysql_fetch_array($rsGallery);
		$strImageName=$strRowGallery['ImageName'];
	}
	
	
	$objGallery->m_intImageRank=	$iRank;
	$objGallery->m_intIsActive=		$iStatus;
	$objGallery->m_strImageName=	$strImageName;
	$objGallery->m_strImageDesc=	$strImageDesc;
	$objGallery->m_intLangId=$_POST['hdnLangID'];
	
	$strCheck=$objGallery->EditGalleryInfo();
	if($strCheck!=0)
		header("location:ManageGalleryImage.php?intMessage=21&cmbLangId=$iLangId&hdnModuleID=".$nGalleryID);
	else
		header("location:ManageGalleryImage.php?intMessage=22&cmbLangId=$iLangId&hdnModuleID=".$nGalleryID);
}
else
{
	if(isset($_POST['chkActive']))		$iStatus=ACTIVE;
	else		$iStatus=INACTIVE;
	$iRank=			$_POST['cmbRank'];
	$iLangId=		$objLang->GetDefaultLang();
	$strImageDesc=	$_POST['txtImageDesc'];
	if(isset($_FILES['flImage']))
	$strImageName=	$_FILES['flImage']['name'];

	$strRealPathFile="index.php";
	$strDestFolder="../GalleryPictures";
	$strValidExtension="gif,jpg,jpeg,tiff,png,bmp";
	$strControlName="flImage";
	$strImagePrefix="";
	
	$Up = UploadFile($strRealPathFile, $strDestFolder, $strImagePrefix, $strValidExtension, $strControlName, $intMaxSize=1048576, $intMaxWidth=0, $intMaxHeight=0);

	$objGallery=new clsGallery();	//Creating object of Gallery Class
	
	$objGallery->m_intImageRank=	$iRank;
	$objGallery->m_intIsActive=		$iStatus;
	$objGallery->m_strImageName=	$strImageName;
	$objGallery->m_strImageDesc=	$strImageDesc;
	$objGallery->m_intLangId=		$objLang->GetDefaultLang();

	if(strpos($Up,"_")>-1)
	{
		$strCheck=$objGallery->UploadGalleryImage($nGalleryID);
		//print "<br>result-->".$strCheck;
		if($strCheck)
			header("location:ManageGalleryImage.php?intMessage=19&nLangID=".$iLangId."&hdnModuleID=".$nGalleryID);
		else
			header("location:ManageGalleryImage.php?intMessage=20&nLangID=".$iLangId."&hdnModuleID=".$nGalleryID);
	}
	else
		header("location:ManageGalleryImage.php?intMessage=20&hdnModuleID=".$nGalleryID);
}
?>