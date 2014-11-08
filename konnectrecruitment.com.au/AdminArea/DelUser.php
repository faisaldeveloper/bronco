<?
require_once("../Includes/BackOfficeIncludesFiles.php");
////////////////Role Rights Implementation///////////////////
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=213;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{
//////////////Server side validation/////////////
if(!isset($_REQUEST['intCustId']) || empty($_REQUEST['intCustId']))
{
	header("location:ManageCustomers.php");
	exit;
}
//////////creating objects of the class////////////////////
$objUser = new  clsUser;
//////////////Initialization///////////////
$nUserId = "";
////////////Transfering values from query string///////
if(isset($_REQUEST['intCustId']))
	$intCustId = $_REQUEST['intCustId'];
//////////////coping values to class variables///////////////	
$objUser->m_intUserId= $intCustId;
	$intCheck=$objUser->DeleteUser();
	if($intCheck=="Deleted")
		header("location:ManageCustomers.php?intMessage=136");
	else if($intCheck=="Order")
		header("location:ManageCustomers.php?intMessage=222");
	else
			header("location:ManageCustomers.php?intMessage=137");
}
else
	header("location:Error.php");//End Right If
?>