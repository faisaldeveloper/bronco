<?php
ob_start();
session_start();
set_time_limit(0);
include("Includes/EmpSecurity.php");
include("Includes/FrontIncludes.php");
$strVacancyName = "";
$strAttribute1 = "";
$strAttribute2 = "";
$strAttribute3 = "";
$strAttribute4 = "";
$strAttribute5 = "";
$strLowSalary = 0;
$strHighSalary = 0;
$nCatId = 0;
$strFileDesc = "";
$strComments = "";
$strAdditionalServices = "";
$arrAdditionalServices = array();
$nchk_Terms_Cond = 0;
$nEmpId = 0;
$arrValidExtensions = array(0=>"PDF",1=>"RTF",2=>"TXT",3=>"DOC",4=>"DOCX");

if(isset($_REQUEST['txtVacancyName']) && !empty($_REQUEST['txtVacancyName']))
{
	$strVacancyName = $_REQUEST['txtVacancyName'];
}
if(isset($_REQUEST['lstWorkType'])&& !empty($_REQUEST['lstWorkType']))
{
$nTypeId = $_REQUEST['lstWorkType'];
}
if(isset($_REQUEST['txtKeyAttributes1']) && !empty($_REQUEST['txtKeyAttributes1']))
{
	$strAttribute1 = $_REQUEST['txtKeyAttributes1'];
}
if(isset($_REQUEST['txtKeyAttributes2']) && !empty($_REQUEST['txtKeyAttributes2']))
{
	$strAttribute2 = $_REQUEST['txtKeyAttributes2'];
}
if(isset($_REQUEST['txtKeyAttributes3']) && !empty($_REQUEST['txtKeyAttributes3']))
{
	$strAttribute3 = $_REQUEST['txtKeyAttributes3'];
}
if(isset($_REQUEST['txtKeyAttributes4']) && !empty($_REQUEST['txtKeyAttributes4']))
{
	$strAttribute4 = $_REQUEST['txtKeyAttributes4'];
}
if(isset($_REQUEST['txtKeyAttributes5']) && !empty($_REQUEST['txtKeyAttributes5']))
{
	$strAttribute5 = $_REQUEST['txtKeyAttributes5'];
}
if(isset($_REQUEST['txtSalaryLow']) && !empty($_REQUEST['txtSalaryLow']))
{
	$strLowSalary = $_REQUEST['txtSalaryLow'];
}
if(isset($_REQUEST['txtSalaryHigh']) && !empty($_REQUEST['txtSalaryHigh']))
{
	$strHighSalary = $_REQUEST['txtSalaryHigh'];
}
if(isset($_REQUEST['lstCat']) && !empty($_REQUEST['lstCat']))
{
	$nCatId = $_REQUEST['lstCat'];
}
if(isset($_FILES['flJobDescFile']) && !empty($_FILES['flJobDescFile']))
{
	$strFileDesc = $_FILES['flJobDescFile']['name'];
}
if(isset($_REQUEST['txtComments']) && !empty($_REQUEST['txtComments']))
{
	$strComments = $_REQUEST['txtComments'];
}
if(isset($_REQUEST['chk_Services']) && !empty($_REQUEST['chk_Services']))
{
	$arrAdditionalServices = $_REQUEST['chk_Services'];
}
if(is_array($arrAdditionalServices) and count($arrAdditionalServices)>0)
{
	$strAdditionalServices = implode(":",$arrAdditionalServices);
}
if(isset($_REQUEST['chk_Terms_Cond']) && !empty($_REQUEST['chk_Terms_Cond']))
{
	$nchk_Terms_Cond = 1;
}
if(isset($_SESSION['EmpId']) && !empty($_SESSION['EmpId']))
{
	$nEmpId = $_SESSION['EmpId'];
}
if($strLowSalary <= 0)
{
	$_SESSION['intMessage'] = 481;
	header("location:PostJob.php?Please Eneter Valid Low Salary range");
	exit();
}
if($strHighSalary <= 0 || $strHighSalary <= $strLowSalary)
{
	$_SESSION['intMessage'] = 482;
	header("location:PostJob.php?Please Eneter Valid High Salary range");
	exit();
}

if($strVacancyName == "" || $strAttribute1 == "" || $strAttribute2 == "" || $strAttribute3 == "" ||$strAttribute4 == "" || $strAttribute5 == "" || $strLowSalary == 0 || $strHighSalary == 0 || $nCatId == 0  || $nchk_Terms_Cond==0)
{
	$_SESSION['intMessage'] = 480;
	header("location:PostJob.php");
	exit();
}

if(!in_array(strtoupper(getFileExt($strFileDesc)),$arrValidExtensions))
{
	$_SESSION['intMessage'] = 483;
	header("location:PostJob.php");
	exit();
}
$EncFileName = sha1($strFileDesc).".".getFileExt($strFileDesc);
move_uploaded_file($_FILES['flJobDescFile']['tmp_name'],"JobDescription/".$EncFileName);
$objJob->m_strJobTitle = $strVacancyName;
$objJob->m_strKeyAttribute1 = $strAttribute1;
$objJob->m_strKeyAttribute2 = $strAttribute2;
$objJob->m_strKeyAttribute3 = $strAttribute3;
$objJob->m_strKeyAttribute4 = $strAttribute4;
$objJob->m_strKeyAttribute5 = $strAttribute5;
$objJob->m_strSalaryRange = $strLowSalary."-".$strHighSalary;
$objJob->m_nfkCatId = $nCatId;
$objJob->m_strDescriptionFile = $strFileDesc;
$objJob->m_strComments = $strComments;
$objJob->m_nfkServicesId = $strAdditionalServices;
$objJob->m_nIsTermsAccepted = $nchk_Terms_Cond;
$objJob->m_nfkEmpId = $nEmpId;
$objJob->m_nTypeId = $nTypeId;
$nJobId = $objJob->AddJob();
if($nJobId > 0)
{
	$objEmployeer->m_npkEmpId = $nEmpId;
	$rsEmp = $objEmployeer->GetEmployeerById();
	if($rsEmp!=FALSE && mysql_num_rows($rsEmp)>0)
	{
		$rowEmp = mysql_fetch_object($rsEmp);
		$strEmpName = $rowEmp->ContactPerson;
		$strEmpEmail = $rowEmp->Email;
	}
	$headers  = "MIME-Version: 1.0;\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1;\n"; 
$headers .= "Content-Transfer-Encoding: quoated-printable;\n"; 
$strSubject = "Thank you for submiting job ";
$strMailBody .= "
			<table width='600px' border='0' align='center' cellpadding='4' cellspacing='0' class='TabBorder'>
			 <tr>
				<td height='28'><strong>Dear ".$strEmpName."</strong></td>
			  </tr>
			 <tr>
				<td>Thank you for submitting your job online with Konnect Recruitment. You can view your jobs status after login at <a href='http://digitalspinners.com.au/Konnect/EmployeeLogin.php'>http://digitalspinners.com.au/Konnect/EmployeeLogin.php</a>.</td>
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

mail($strEmpEmail,$strSubject, $strMailBody, $headers);
	$_SESSION['intMessage'] = 484;
	header("location:EmployeeJobs.php?EmpId=".$nEmpId);
	exit();
}
else
{
	$_SESSION['intMessage'] = 485;
	header("location:PostJob.php");
	exit();
}
?>