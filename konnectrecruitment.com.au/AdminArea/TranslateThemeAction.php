<?
require_once("../Includes/BackOfficeIncludesFiles.php");
////////////////Role Rights Implementation///////////////////
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=258;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{
	///Create object of the class
	$objCat = new clsCategory();
	$objTheme  = new clsTheme();
	//Variable initilization
	$arrQryStr = array();
	$intLangId="";
	$intThemeId="";
	$nLangId="";
	$strHeader="";
	$strFooter="";
	
	//Server side validation//
	if(isset($_POST['lstLangId']) || !empty($_POST['lstLangId']))
		$nLangId = $_POST['lstLangId'];
	if(isset($_POST['txtHeader']) || !empty($_POST['txtHeader']))
		$strHeader = RTESafe($_POST['txtHeader']);
	if(isset($_POST['txtFooter']) || !empty($_POST['txtFooter']))
		$strFooter = RTESafe($_POST['txtFooter']);
	/**
		To Check if not Set (Server Side Validation)
	**/
	if(!isset($_POST['hdnThemeID']) || empty($_POST['hdnThemeID']))
	{
		header("Location:ManageTheme.php?intMessage=340");
		exit;
	}
	if(!isset($_POST['lstLangId']) || empty($_POST['lstLangId']))
	{
		header("Location:TranslateTheme.php?intMessage=337&hdnThemeID=".$_POST['hdnThemeID']);
		exit;
	}
	
	if(!isset($_POST['txtHeader']) || empty($_POST['txtHeader']))
	{
		header("Location:TranslateTheme.php?intMessage=338&hdnThemeID=".$_POST['hdnThemeID']);
		exit;
	}
	if(!isset($_POST['txtFooter']) || empty($_POST['txtFooter']))
	{
		header("Location:TranslateTheme.php?intMessage=339&hdnThemeID=".$_POST['hdnThemeID']);
		exit;
	}
	//echo "I am here";exit;
	//Assigning Values to Class Data Members
	$objTheme->m_intID = $_POST['hdnThemeID'];
	$objTheme->m_strHeader= $strHeader;
	$objTheme->m_strFooter= $strFooter; 
	$objTheme->m_nLangID = $nLangId;
	$result=$objTheme->TranslateTheme();
	if($result)
		header("location:ManageTheme.php?intMessage=341");
	else 
		header("location:ManageTheme.php?&intMessage=342&hdnThemeID=".$_POST['hdnThemeID']);
}
else
	header("location:Error.php");//End Right If
?>
