<?php
include("../Includes/BackOfficeIncludesFiles.php");
////////////////Role Rights Implementation///////////////////

$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=215;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{
	//////////////////Server side validation/////////////////////
	if(!isset($_REQUEST['toadd']) || empty($_REQUEST['toadd']) || !isset($_REQUEST['strid']) || empty($_REQUEST['strid']))
	{
		header("location:ManageCustomers.php?intMessage=364");
		exit;
	}
	/////////////Variables initialization/////////
	$arrQryStr=array();
	$to = "";
	$from = "";
	$cc = "";
	$bcc = "";
	$subject = "";
	$mailbody = "";
	$strid = "";
	$ids = "";
	///////////copy data from the query string////////
	if(isset($_REQUEST['toadd']))
		{
		$arrQryStr[] = "toadd=".urlencode($_POST['toadd']);
		$to=$_REQUEST['toadd'];
		}
	if(isset($_REQUEST['fromadd']))
		{
		$arrQryStr[] = "fromadd=".urlencode($_POST['fromadd']);
		$from=$_REQUEST['fromadd'];
		}
	if(isset($_REQUEST['ccadd']))
		{
		$arrQryStr[] = "ccadd=".urlencode($_POST['ccadd']);
		$cc=$_REQUEST['ccadd'];
		}
	if(isset($_REQUEST['bcc']))
		{
		$bcc=$_REQUEST['bcc'];
		}
	if(isset($_REQUEST['subject']))
		{
		$arrQryStr[] = "subject=".urlencode($_POST['subject']);
		$subject=$_REQUEST['subject'];
		}
	if(isset($_REQUEST['mailbody']))
		{
		$arrQryStr[] = "mailbody=".urlencode($_POST['mailbody']);
		$mailbody=$_REQUEST['mailbody'];						
		}
	if(isset($_REQUEST['strid']))
		{
		$arrQryStr[] = "strid=".urlencode($_POST['strid']);
	}
	if(isset($_REQUEST['hdnchkid']))
	{
		$arrQryStr[] = "chkid=".urlencode($_POST['hdnchkid']);
	}
	$strQry = implode('&',$arrQryStr);	//constructing querystring
	//print_r($strQry);exit;
	///////////////Validation of data on server side/////////////
	if(!isset($to) || empty($to) || !isset($from) || empty($from) )
	{
	header("location:EmailsReply.php?intMessage=365&".$strQry);
	exit;
	}
	///////////////Sending email////////////
	if(isset($_REQUEST['strid']))
	{ 
		$strid=$_REQUEST['strid'];
		$ids=explode(",",$strid);
		//for($i=0;$i<count($ids);$i++)
		//{
			$headers  = "MIME-Version: 1.0;\n"; 
			$headers .= "Content-type: text/html; charset=iso-8859-1;\n"; 
			$headers .= "Content-Transfer-Encoding: quoated-pritable;\n"; 
			/* additional headers */ 
			$headers .= "From: ".$from."\r\n"; 
			$headers .= "Cc: ".$cc."\r\n"; 
			$headers .= "Bcc: ".$bcc."\r\n"; 			
			//$sent=mail($to,$subject,$mailbody,$headers);
			//echo "TO:".$to."<br>Subject:".$subject."<br>MailBody:".$mailbody."<br>Headers:".$headers;exit;
		//}
	}
	header("location:ManageCustomers.php?intMessage=406");
}
else
	header("location:ManageCustomers.php?intMessage=407");
?>