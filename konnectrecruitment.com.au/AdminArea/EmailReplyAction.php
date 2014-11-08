<?php
	include("../Includes/BackOfficeIncludesFiles.php");
////////////////Role Rights Implementation///////////////////
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=97;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{
	/**
		Server side Valiodation
	**/
	if(isset($_POST['toadd']) || !empty($_POST['toadd']))
	{
		$arrQryStr[]="strTo=".urlencode($_POST['toadd']);
		$strTo = $_POST['toadd'];
	}
	if(isset($_POST['hdnEmailId']) || !empty($_POST['hdnEmailId']))
	{
		$arrQryStr[]="nEmailId=".urlencode($_POST['hdnEmailId']);
		$nEmailId = $_POST['hdnEmailId'];
	}
	if(isset($_POST['chkid']) || !empty($_POST['chkid']))
	{
		$arrQryStr[]=ArrayToQryString($_REQUEST['chkid'],'chkid');
		$chkid = $_POST['chkid'];
	}
	if(isset($_POST['fromadd']) || !empty($_POST['fromadd']))
	{
		$arrQryStr[]="strAdminEmail=".urlencode($_POST['fromadd']);
		$strAdminEmail = $_POST['fromadd'];
	}
	if(isset($_POST['subject']) || !empty($_POST['subject']))
	{
		$arrQryStr[]="strSubject=".urlencode($_POST['subject']);
		$strSubject = $_POST['subject'];
	}

	/**
		Constructing a query string in an array
	**/
		$strQry = implode('&',$arrQryStr);
	
	 /**
	 	To Check if not Set (Server Side Validation)
	 **/
	if(!isset($_POST['hdnEmailId']) || empty($_POST['hdnEmailId']))
	{
		header("Location:Emils.php?intMessage=104");
		exit;
	} 
	if(!isset($_POST['toadd']) || empty($_POST['toadd']))
	{
		header("Location:EmilsReply.php?intMessage=107&".$strQry);
		exit;
	}
	if(!isset($_POST['fromadd']) || empty($_POST['fromadd']))
	{
		header("Location:EmilsReply.php?intMessage=108&".$strQry);
		exit;
	}
	if(!isset($_POST['subject']) || empty($_POST['subject']))
	{
		header("Location:EmilsReply.php?intMessage=109&".$strQry);
		exit;
	}
	/***
		themes email header
	***/
	$objTheme = new clsTheme();
	$objTheme->m_nLangID=$_SESSION['intLangId'];
	$rsTheme = $objTheme->SelectActiveTheme();
	if($rsTheme!=false && mysql_num_rows($rsTheme)>0)
	{
		$objThemeDetail = mysql_fetch_object($rsTheme);
		$strEmailHeader=$objThemeDetail->EmailHeader;
	}
	
	
	$to=$_REQUEST['toadd'];
	$from=$_REQUEST['fromadd'];
	$subject=$_REQUEST['subject'];
	$mailbody=$_REQUEST['mailbody'];
	
	if(empty($strEmailHeader))
	{
		$mailbody.="
		<table width= '80%'  border='0'>
		<tr>
		<td><img src='".DEFAULT_EMAIL_HEADER."'>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
		</table>
				";
	}
	$mailbody.="<table width='100%' border='0' cellpadding='0' cellspacing='0' class='body'>
              	 <tr>
			<td>
				<table width= '100%'  border='0'>
				 <tr>
					<td>".$strEmailHeader."</td>
				</tr>
				</table>
			</td>
	    </tr></table>";
							
	
	if(isset($_REQUEST['strid']))
	{
		$strid=$_REQUEST['strid'];
		$ids=explode(",",$strid);
		for($i=0;$i<count($ids);$i++)
		{
			$sql="update emails set MailReply=1  where pkMailId=".$ids[$i]."";
			mysql_query($sql);
		}
		$headers  = "MIME-Version: 1.0;\n"; 
		$headers .= "Content-type: text/html; charset=iso-8859-1;\n"; 
		$headers .= "Content-Transfer-Encoding: quoated-pritable;\n"; 
		/* additional headers */ 
		$headers .= "To: <".$to.">\r\n"; 
		$headers .= "From: <".$from.">\r\n"; 
		//print $to."<br>".$subject."<br>".$mailbody."<br>".$headers;
		//exit;
		$sent=mail($to,$subject,$mailbody,$headers);
			
		if($sent)
			header("location:Emails.php?intMessage=49");
		else
			header("location:Emails.php?intMessage=4");
	}
}
else
	header("location:Error.php");//End Right If
?>