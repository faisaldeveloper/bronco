<?php
session_start();
include("Includes/FrontIncludes.php");
$strEmail = "";
if(isset($_REQUEST['txtEmail']) && !empty($_REQUEST['txtEmail']))
{
	$strEmail = $_REQUEST['txtEmail'];
}
if($strEmail == "")
{
	$_SESSION['intMessage'] = 120;
	header("location:EmployeeForgetPass.php");
	exit();
}
if(checkEmail($strEmail)==FALSE)
{
	$_SESSION['intMessage'] = 120;
	header("location:EmployeeForgetPass.php");
	exit();
}
$strNewPass = rand(0,500000);
$objEmployeer->m_strEmail = $strEmail;
$objEmployeer->m_strPassword = sha1($strNewPass);
$objEmployeer->ChangePassword();
$headers  = "MIME-Version: 1.0;\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1;\n"; 
$headers .= "Content-Transfer-Encoding: quoated-printable;\n"; 
$strSubject = "Your  New Password";
$strMailBody .= "
			<table width='600px' border='0' align='center' cellpadding='4' cellspacing='0' class='TabBorder'>
			 <tr>
				<td width='100%' colspan='2' height='28'><strong>Your New Password is given below</strong>,</td>
			  </tr>
			 <tr>
				<td width='100%' height='28'>Your Email</td>
				<td>".$strEmail."</td>
			 </tr>
			  <tr>
				<td width='100%' height='28'>Your Password</td>
				<td>".$strNewPass."</td>
			 </tr>
			 <tr>
				<td width='100%' colspan='2'>&nbsp;</td>
			  </tr>
			</table>";
mail($strEmail,$strSubject, $strMailBody, $headers);
//mail(); To Employeer of new password
$_SESSION['intMessage'] = 2;
header("location:EmployeeForgetPass.php");
exit();
?>