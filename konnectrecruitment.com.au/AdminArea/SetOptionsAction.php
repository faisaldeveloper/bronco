<?php
require_once("../Includes/BackOfficeIncludesFiles.php");
////////////////Role Rights Implementation///////////////////
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=95;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{
if(isset($_REQUEST['txtRowsPerPage'])) 
	$intRowsPerPage = $_REQUEST['txtRowsPerPage'];
if(isset($_REQUEST['txtSiteTitle']))
	$strSiteTitle = $_POST["txtSiteTitle"];
if(isset($_REQUEST['txtCompanyName']))
	$strCompanyName = $_POST["txtCompanyName"];
if(isset($_REQUEST['txtStAddress']))
	$strStAddress = $_POST["txtStAddress"];
if(isset($_REQUEST['txtPostCode']))
	$strPostCode = $_POST["txtPostCode"];
if(isset($_REQUEST['txtState']))
	$strState = $_POST["txtState"];
if(isset($_REQUEST['txtPhoneNo']))
	$strPhoneNo = $_POST['txtPhoneNo'];
if(isset($_REQUEST['txtFax']))
	$strFax = $_POST['txtFax'];
if(isset($_REQUEST['txtMobile']))
	$strMobile = $_POST['txtMobile'];
if(isset($_REQUEST['txtemail']))
	$strAdminEmail= $_POST['txtemail'];
if(isset($_REQUEST['txtemailRec']))
	$strAdminEmailRec= $_POST['txtemailRec'];
if(isset($_REQUEST['txtFrEmail']))
	$strFreightEmail= $_POST['txtFrEmail'];
if(isset($_POST['txtemail']))
	$strAdminEmail=$_POST['txtemail'];
if(isset($_POST['txtemailRec']))
	$strAdminEmailRec=$_POST['txtemailRec'];
if(isset($_POST['RadioGroup1']))
	$nRadioOption = $_POST['RadioGroup1'];
if(isset($_POST['RadioGrpNews1']))
	$nMainRadioOption = $_POST['RadioGrpNews1'];
if(isset($_POST['rdbQuantity']))
	$nQuantityChk = $_POST['rdbQuantity'];
if($nRadioOption==0)
{	
	if(isset($_POST['txtLastDaysScrollNews'])) $strScrollNewsDate=$_POST['txtLastDaysScrollNews'];
	//list($d,$m,$y)=explode("-",$strLastDaysScrollNews);			$strScrollNewsDate = $y."-".$m."-".$d;
	$strLatestScrollNews = 0;	
}	
else if($nRadioOption==1)
{	
	if(isset($_POST['txtLatestScrollNews'])) $strLatestScrollNews=$_POST['txtLatestScrollNews'];
	$strScrollNewsDate = 0;	
}		
if($nMainRadioOption==0)
{
	if(isset($_POST['txtLastDaysNews'])) $strMainNewsDate=$_POST['txtLastDaysNews'];
	//list($d,$m,$y) = explode("-",$strLastDaysNews);			$strMainNewsDate = $y."-".$m."-".$d;
	$strLatestNews = 0;	
}
else if($nMainRadioOption==1)
{
	if(isset($_POST['txtLatestNews']))$strLatestNews=$_POST['txtLatestNews'];
	$strMainNewsDate = 0;		
}
if(isset($_POST['hdnMainNewsLayout']))
	$strMainNewsLayout=$_POST['hdnMainNewsLayout'];	
if(isset($_POST['lstMainNewsOnTop']))
	$strMainNewsOnTop=$_POST['lstMainNewsOnTop'];
if(isset($_POST['txtNewsPerRow']))
	$strNewsPerRow=$_POST['txtNewsPerRow'];
if(isset($_POST['hdnMoreNewsLayout']))
	$strMoreNewsLayout=$_POST['hdnMoreNewsLayout'];
if(isset($_POST['lstMoreNewsOnTop']))
	$strMoreNewsOnTop=$_POST['lstMoreNewsOnTop'];
if(isset($_POST['txtMoreNewsPerRow']))
	$strMoreNewsPerRow=$_POST['txtMoreNewsPerRow'];
if(isset($_POST['hdnNewsDetailLayout']))
	$strNewsDetailLayout=$_POST['hdnNewsDetailLayout'];
if(isset($_POST['lstImgOption']))
	$nOtherImages=$_POST['lstImgOption'];	


$isUpdate = SetGlobalOptions($intRowsPerPage,$strSiteTitle,$strCompanyName,$strStAddress,$strPostCode,$strState,$strPhoneNo,$strFax,$strMobile,$strAdminEmail,$strAdminEmailRec,$strScrollNewsDate,$strLatestScrollNews,$strMainNewsLayout,$strMainNewsDate,$strLatestNews,$strMainNewsOnTop,$strNewsPerRow,$strMoreNewsLayout,$strMoreNewsOnTop,$strMoreNewsPerRow,$strNewsDetailLayout,$nQuantityChk);
if($isUpdate == TRUE)
	header("location:SetOptions.php?intMessage=308");
else
	header("location:SetOptions.php?intMessage=309");
}
else
	header("location:Error.php");//End Right If
?>