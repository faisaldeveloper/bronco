<?php
ob_start();
session_start();
set_time_limit(0);
include("Includes/FrontIncludes.php");

$nLangId = $_SESSION['intLangId'];
$strJobSeekerCLetter='';
$strResumeName='';
if(isset($_REQUEST['hdnJobId'])&& !empty($_REQUEST['hdnJobId']))
{
$nJobId = $_REQUEST['hdnJobId'];
}
else $nJobId=0;
if(isset($_REQUEST['txtJobSeekName'])&& !empty($_REQUEST['txtJobSeekName']))
{
$strJobSeekerName = $_REQUEST['txtJobSeekName'];
}
if(isset($_REQUEST['txtJobSeekerEmail'])&& !empty($_REQUEST['txtJobSeekerEmail']))
{
$strJobSeekerEmail = $_REQUEST['txtJobSeekerEmail'];
}
if(isset($_REQUEST['lstWorkType'])&& !empty($_REQUEST['lstWorkType']))
{
$nTypeId = $_REQUEST['lstWorkType'];
}
if(isset($_REQUEST['lstCatSearch'])&& !empty($_REQUEST['lstCatSearch']))
{
$nCatId = $_REQUEST['lstCatSearch'];
}
if(isset($_REQUEST['txrJobSeekerCLetter'])&& !empty($_REQUEST['txrJobSeekerCLetter']))
{
$strJobSeekerCLetter = $_REQUEST['txrJobSeekerCLetter'];
}
if(isset($_REQUEST['txtJobSeekerSubrub'])&& !empty($_REQUEST['txtJobSeekerSubrub']))
{
$strJobSeekerSubrub = $_REQUEST['txtJobSeekerSubrub'];
}
if(isset($_FILES['flJobSeekerResume']) && !empty($_FILES['flJobSeekerResume']))
{
	$strResumeName = $_FILES['flJobSeekerResume']['name'];
}
$arrValidExtResume = array(0=>"DOC",1=>"DOCX");
if(!in_array(strtoupper(getFileExt($strResumeName)),$arrValidExtResume))
{
	header("location:JobSeekerResume.php?hdnJobId=".$nJobId."&hdnDo=1&intMessage=478");
	exit();
}
if(isset($_FILES['flJobSeekerPic']) && !empty($_FILES['flJobSeekerPic']))
{
	$strPicName = $_FILES['flJobSeekerPic']['name'];
}
$arrValidExtPic = array(0=>"GIF",1=>"JPG",2=>"JPEG",3=>"PNG");
if(!in_array(strtoupper(getFileExt($strPicName)),$arrValidExtPic))
{
	header("location:JobSeekerResume.php?hdnJobId=".$nJobId."&hdnDo=1&intMessage=478");
	exit();
}


if(isset($_FILES['flJobSeekerPic']['name']))
	{
		$strRealPathFile = "";
		$strDestFolder = "JobSeekerPics";
		$strImagePrefix =str_replace(" ","",microtime());
		$strValidExtension = "gif,jpg,jpeg,png,bmp,psd,tiff";
		$strControlName = "flJobSeekerPic";
		$intMaxSize=1048576;
		$strPicName = $_FILES['flJobSeekerPic']['name'];
		$exten=sha1($strPicName).".".getFileExt($strPicName);
		//print_r($_FILES);exit;
		$strUploaded = move_uploaded_file($_FILES['flJobSeekerPic']['tmp_name'],"JobSeekerPics/".$exten);
		
	}
	else $strPicName = '';
	
if(isset($_FILES['flJobSeekerResume']['name']))
	{
		$strRealPathFile = "";
		$strDestFolder = "JobSeekerResume";
		$strImagePrefix =str_replace(" ","",microtime());
		$strValidExtension = "gif,jpg,jpeg,png,bmp,psd,tiff";
		$strControlName = "flJobSeekerResume";
		$intMaxSize=1048576;
		$strResumeName = $_FILES['flJobSeekerResume']['name'];
		$exten=sha1($strResumeName).".".getFileExt($strResumeName);
		//print_r($_FILES);exit;
		$strUploaded = move_uploaded_file($_FILES['flJobSeekerResume']['tmp_name'],"JobSeekerResume/".$exten);
	}
	else $strResumeName = '';
	
$strPass = rand(0,500000);
$objJobSeeker->m_strName=$strJobSeekerName;
$objJobSeeker->m_strEmail=$strJobSeekerEmail;
$RsCheckJobSeeker = $objJobSeeker->GetJobSeekerByEmail();
if($RsCheckJobSeeker!=FALSE && mysql_num_rows($RsCheckJobSeeker)>0)
{
	while($rowSql=mysql_fetch_object($RsCheckJobSeeker))
	{
		$nJobSeekerId=$rowSql->pkJobSeekerId;
		$objJobSeekerJob->m_nfkJobId=$nJobId;
		$objJobSeekerJob->m_nfkJobSeekerId=$nJobSeekerId;
		$RsCheck = $objJobSeekerJob->CheckJobSeekerJob();
		if($RsCheck!=FALSE && mysql_num_rows($RsCheck)>0)
		{
			header("location:SearchJob.php?intMessage=477");
			exit();
		}
	}
}
$objJobSeeker->m_strPassword=$strPass;
$objJobSeeker->m_strSubrubs=$strJobSeekerSubrub;
$objJobSeeker->m_strPicture=$strPicName;
$nJobSeekerId=$objJobSeeker->AddJobSeeker();
//echo $nJobSeekerId;exit;
$objJobSeekerJob->m_nfkJobId=$nJobId;
$objJobSeekerJob->m_nfkJobSeekerId=$nJobSeekerId;
$objJobSeekerJob->m_strResumeFile=$strResumeName;
$objJobSeekerJob->m_strCoverLetter=$strJobSeekerCLetter;
$objJobSeekerJob->m_nfkCatId=$nCatId;
$objJobSeekerJob->m_nfkTypeId=$nTypeId;

$Insert=$objJobSeekerJob->AddJobSeekerJob();
if($Insert!=FALSE)
{
	$headers  = "MIME-Version: 1.0;\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1;\n"; 
$headers .= "Content-Transfer-Encoding: quoated-printable;\n"; 
$strSubject = "Thank you for submiting resume";
$strMailBody .= "
			<table width='600px' border='0' align='center' cellpadding='4' cellspacing='0' class='TabBorder'>
			 <tr>
				<td height='28'><strong>Dear ".$strJobSeekerName."</strong></td>
			  </tr>
			 <tr>
				<td>Thank you for submiting your resume online with Konnect Recruitment. One of our consultant will contact you after reviewing your resume.</td>
			 </tr>
			  <tr>
				<td height='28'>Please don't reply to this E-mail, this E-mail is auto generated!</td>
			 </tr>
			 <tr>
				<td width='100%' colspan='2'>&nbsp;</td>
			  </tr>
			   <tr>
				<td height='28'>Best Regards<br>Konnect Team,<br>Australia</td>
			 </tr>
			</table>";
	mail($strJobSeekerEmail,$strSubject, $strMailBody, $headers);
	header("location:SearchJob.php?intMessage=486");
	exit;
}
else
{
	header("location:SearchJob.php?intMessage=487");
	exit;
}

?>