<?php
	session_start();
   	////////Sikkerhetsfix av Arnt 29.11.2005 lagt inn i contactaction
	if(!function_exists('stripos'))
	{
		 function stripos($haystack,$needle,$offset = 0)
		 {
			return(strpos(strtolower($haystack),strtolower($needle),$offset));
		 }
	}
	foreach( $_POST as $value ){
		if( stripos($value,'Content-Type') !== FALSE ){
			mail('khalid@digitalspinners.com','Spammer har forsøkt espressocap.no via Content',$_SERVER['REMOTE_ADDR']);
			exit("{$_SERVER['REMOTE_ADDR']} is recorded and will be followed up.");
		 }
	}
	foreach( $_POST as $value ){
		if( stripos($value,'Bcc') !== FALSE ){
			mail('khalid@digitalspinners.com','Spammer har forsøkt espressocap.no via Bcc',$_SERVER['REMOTE_ADDR']);
			exit("{$_SERVER['REMOTE_ADDR']} is recorded and will be followed up.");
		}
	}
	///////////////////////////////////////////////////////////////////////////////////////////
	include("Includes/FrontIncludes.php");
	$objMails = new clsMails();
	$strBackUrl = $_SERVER['HTTP_REFERER'];
	if(empty($_POST['txtFrom']) || empty($_POST['txrMailBody']) || empty($_POST['txtSubject']))
	{
		$_SESSION['intMessage'] = 365;
		$_SESSION['txtFrom'] = $_POST['txtFrom'];
		$_SESSION['txrMailBody'] = $_POST['txrMailBody'];
		$_SESSION['txtSubject'] = $_POST['txtSubject'];
		header("location:${strBackUrl}");
		exit();
	}
	if(strtoupper($_POST['txtCode'])!=strtoupper($_SESSION['code']))
	{
		$_SESSION['intMessage'] = 475;
		$_SESSION['txtFrom'] = $_POST['txtFrom'];
		$_SESSION['txrMailBody'] = $_POST['txrMailBody'];
		$_SESSION['txtSubject'] = $_POST['txtSubject'];
		header("location:${strBackUrl}");
		exit();
	}
	$strEmail= $strAdminEmailRec;
    $strFrom = $_REQUEST['txtFrom'];
	$strMessage = $_REQUEST['txrMailBody'];
	$strSubject=$_REQUEST['txtSubject'];
	$tbl="<table width='100%' border=0 align=center>";
		$tbl=$tbl."<tr class=prod>"; 
			$tbl=$tbl."<td width=50%>".$strMessage." </td>";
		$tbl=$tbl."</tr>";
	$tbl=$tbl."</table>";
	$headers  = "MIME-Version: 1.0;\n"; 
	$headers .= "Content-type: text/html; charset=iso-8859-1;\n"; 
	$headers .= "Content-Transfer-Encoding: quoated-pritable;\n"; 
	$headers .= "From: ".$strFrom."\r\n";
	$objMails->m_strToAddress = $strEmail;
	$objMails->m_strFromAddress = $strFrom;
	$objMails->m_strSubject = $strSubject;	
	$objMails->m_strMailBody = $strMessage;	
	$objMails->m_strMailDate = (string)date("Y-m-d");	
	$conf=mail($strEmail,$strSubject, $tbl, $headers);
//------------------------------------------------------------------------	
	if($conf)
	{
		$objMails->AddEmail();
		$_SESSION['intMessage'] = 49;
		header("location:${strBackUrl}");
	}
	else
	{
		$_SESSION['intMessage'] = 4;
		header("location:${strBackUrl}");
 	}
?>