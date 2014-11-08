<?
include_once("Includes/Constants.php");
include_once("Includes/Configuration.inc.php");
include_once("Includes/clsConfiguration.php");
include_once("Includes/clsAdminUser.php");
include_once("Includes/clsRoles.php");
///// Validation ///////////////////////////////
if(!isset($_POST['txtUserName']))
{
	header("Location:InstallStep2.php?strMsg=Please+enter+admin+login");
	exit;
}
if(!isset($_POST['txtPass']))
{
	header("Location:InstallStep2.php?strMsg=Please+enter+password&strUser=".$_POST['txtUserName']);
	exit;
}
////////////////////////////////////////////////
$strUser=$_POST['txtUserName'];
$strNewPassword=$_POST['txtPass'];

$objConfiguration=new clsConfiguration();
$objAdminUser=new clsAdminUser();
$nStat=$objConfiguration->GetDB($strHost, $strDatabase, $strUserName, $strPassword);


$objAdminUser->m_strUserName=$strUser;
$objAdminUser->m_strUserPass=$strNewPassword;
$objAdminUser->m_strUserType=1;
$intCheck=$objAdminUser->AddNewAdminUser();
if($intCheck)
{		
	$objAdminUser->m_objRoles=new clsRoles();
	$rsUser=$objAdminUser->GetLatestAdminUserId();
	$strUser=mysql_fetch_array($rsUser);
	$objAdminUser->m_intUserId=$strUser['pkUserId'];
	$objRoles = new clsRoles();
	$rsRole = $objRoles->RolesList();
	if(mysql_num_rows($rsRole)>0)
	{	
		while ($row = mysql_fetch_object($rsRole))
		{
			$objAdminUser->m_objRoles->m_intRoleId=(int)$row->pkRoleId;
			$objAdminUser->AssignRoleToUser();
		}
	}
	
	header("Location:InstallStep5.php?strUser=".$_POST['txtUserName']."&strPass=".$_POST['txtPass']);
}	
else
	header("Location:InstallStep2.php?strMsg=Admin+login+created+unsuccessfully&strUser=".$_POST['txtUserName']);
?>