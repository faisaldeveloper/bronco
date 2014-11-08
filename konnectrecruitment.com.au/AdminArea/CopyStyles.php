<?
include("../Includes/BackOfficeIncludesFiles.php");
////////////////Validation///////////////////
if(!isset($_POST['lstTheme']) && empty($_POST['lstTheme']))
	header("location:ManageTheme.php");
////////////////Role Rights Implementation///////////////////
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=255;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{
	if(isset($_POST['lstTheme']))
		$nThemeIdCopyFrom = $_POST['lstTheme'];
	if(isset($_POST['hdnThemeId']))
		$nThemeId = $_POST['hdnThemeId'];
	$rsThemeStyleCopy = $objTheme->GetStylesValuesbyThemeID($nThemeIdCopyFrom);
	if($rsThemeStyleCopy != FALSE)
	{
		while($rowThemeStyleCopy=mysql_fetch_object($rsThemeStyleCopy))
		{
			$strStyleValue = $rowThemeStyleCopy->Value;
			$nStyleId = $rowThemeStyleCopy->fkStyleID;
			$nResult = $objTheme->UpdateThemeValues($nThemeId,$nStyleId,$strStyleValue);
		}
	}
	if($nResult==TRUE)
	{
		header("location:ManageTheme.php?intMessage=379");
		exit;
	}
	else
	{
		header("location:ManageTheme.php?intMessage=380");
		exit;
	}
}
else
	header("location:Error.php");//End Right If
?>