<? 
	require_once("../Includes/BackOfficeIncludesFiles.php");
//--------------Checking for right---------------------
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=154;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?>Change Password<?=CONST_BACKOFFICE_TITLE_END?></title>
<!-- InstanceEndEditable -->
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
<LINK REL="SHORTCUT ICON" HREF="Images/favicon.ico">

<link href="AdminArea.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="98%"  border="0" align="center" cellpadding="0" cellspacing="0" class="MailTableBGColor">
  <tr>
    <td colspan="2"><?php $nIsLoginTemplate = 0; include("Header.php");?></td>
  </tr>
  <tr>
    <td width="17%" align="left" valign="top" class="TabBorderLightGreyBG"><?php include("LeftPanel.php");?></td>
    <td width="83%" height="500" align="left" valign="top">
	<!-- InstanceBeginEditable name="body" --> 
<script>
function validate(f)
{
	if(f.txtOldPass.value=="")
	{
		alert("Please enter old password");
		f.txtOldPass.focus();
		return false;
	}
	else if(f.txtPass.value=="")
	{
		alert("Please enter new password");
		f.txtPass.focus();
		return false;
	}
	else if(f.txtCPass.value=="")
	{
		alert("Please enter confirm password");
		f.txtCPass.focus();
		return false;
	}
	else if(f.txtPass.value!=f.txtCPass.value)
	{
		alert("New password and confirm password doesnot match");
		f.txtCPass.focus();
		return false;
	}
	else return true;
}
</script>
<table width="99%"  border="0" align="center">
		  <?
		  if($objAdminUser->CheckRightForAdmin()!=1)//Start Right If
			{
			?>
<tr>
              <td class="txtBld_ornge">You are not authorised to view this page. <a href="<?=$_SERVER['HTTP_REFERER']?>"><< Back </a></td>
            </tr>
			<?
			}
			else {
			?>		  
  <tr>
  	<td height="20">&nbsp;</td>
  </tr>
  <tr>
  	<td>
    	<table width="100%">
        <tr>
            <td width="4%"><img src="Images/icon_cpass_32x32.jpg" alt="Image"/></td>
            <td width="94%" valign="middle"><span class="hdng_sandy">Change Password</span></td>
        </tr>
        </table>
     </td>
  </tr>
  <tr>
    <td><form name="form1" method="post" action="ChangePasswordAction.php" onSubmit="return validate(this)">
      <table width="80%"  border="0" class="TabBorderLightGreyBG" align="center" cellpadding="2" cellspacing="4">
		<tr>
		   <td colspan="5" align="center"><? include('../Includes/DisplayConfirmMessage.php');?></td>
		</tr>
        <tr>
          <td width="39%" align="left" class="txtBld_grn">User Name</td>
          <td width="61%" colspan="2" align="left"><?=$_SESSION['strDsUserName']?></td>
        </tr>
        <tr>
          <td align="left" class="txtBld_grn">Old Password <span class="txt_red">*</span></td>
          <td colspan="2" align="left"><input name="txtOldPass" type="password" id="txtOldPass"></td>
        </tr>
        <tr>
          <td align="left" class="txtBld_grn">New Password <span class="txt_red">*</span></td>
          <td colspan="2" align="left"><input name="txtPass" type="password" id="txtPass"></td>
        </tr>
        <tr>
          <td align="left" class="txtBld_grn">Confirm Password <span class="txt_red">*</span></td>
          <td colspan="2" align="left"><input name="txtCPass" type="password" id="txtCPass"></td>
        </tr>
        <tr>
          <td align="right" class="txtBld_grn">&nbsp;</td>
          <td colspan="2" align="left"><input name="Submit" type="submit" class="button" value="Update"></td>
        </tr>
        <tr>
          <td align="right">&nbsp;</td>
          <td colspan="2" align="left">&nbsp;</td>
        </tr>
      </table>
    </form></td>
  </tr>
	<?
		}//End Right If
	?>		  
</table>
<!-- InstanceEndEditable -->
    </td>	
  </tr>
  <tr>
    <td colspan="2"><?php include("Footer.php");?></td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
