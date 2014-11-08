<? 
	require_once("../Includes/BackOfficeIncludesFiles.php");
//--------------Checking for right---------------------
	$objAdminUser=new clsAdminUser();
	$objAdminUser->m_objRoles=new clsRoles();
	$objAdminUser->m_intUserId=$_SESSION['intUserId'];
	$objAdminUser->m_objRoles->m_intRightId=8;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?>Add New Admin User<?=CONST_BACKOFFICE_TITLE_END?></title>
<!-- InstanceEndEditable -->
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
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
		if(f.txtUserName.value=="")
		{
			alert("Please enter admin name");
			f.txtUserName.focus();
			return false;
		}
		if(f.txtPass.value=="")
		{
			alert("Please enter new passwrod");
			f.txtPass.focus();
			return false;
		}
		if(f.txtCPass.value=="")
		{
			alert("Please enter confirm passwrod");
			f.txtCPass.focus();
			return false;
		}
		if(f.txtPass.value!=f.txtCPass.value)
		{
			alert("New password does not match confirm password");
			f.txtCPass.focus();
			return false;
		}
	return true;
	}
		function CheckAllOptions(form1)
		{
			for(i=0;i<form1.elements.length;i++)
			{
				if(form1.elements[i].type=='checkbox')
				{
					if(form1.CheckAll.checked)
						form1.elements[i].checked=true;
					else
						form1.elements[i].checked=false;
				}
			}
		}
</script>
<table width="99%" border="0" align="center">
		  <?
		  if($objAdminUser->CheckRightForAdmin()!=1) //Start Right If
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
	    <td colspan="3"><a href="ListOfAdminUser.php"><span class="txtBld_ornge">Security (Admin Users)</span></a>&nbsp;&gt;&gt;&nbsp;<span class="hdng_sandy">Add Admin User</span></td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
  <tr>
    <td><form name="form1" method="post" action="AddAdminUserAction.php" onSubmit="return validate(this)">
      <table width="99%"  border="0" align="center" class="TabBorderLightGreyBG">
		<tr>
		   <td colspan="3" align="center"><? include('../Includes/DisplayConfirmMessage.php');?>&nbsp;</td>
		</tr>
        <tr>
          <td width="21%" align="left" class="txtBld_grn">User Name<span class="txt_red">*</span></td>
          <td width="79%" align="left"><input name="txtUserName" type="text" id="txtUserName" maxlength="15" value="<?=$_REQUEST['strUserName'];?>"></td>
        </tr>
        
        <tr>
          <td width="21%" align="left" class="txtBld_grn">Password<span class="txt_red">*</span></td>
          <td align="left"><input name="txtPass" type="password" id="txtPass" maxlength="15"></td>
        </tr>
        <tr>
          <td width="21%" align="left" class="txtBld_grn">Confirm Password<span class="txt_red">*</span></td>
          <td align="left"><input name="txtCPass" type="password" id="txtCPass" maxlength="15"></td>
        </tr>
			<tr>
			  <td width="21%" align="left"><span class="txtBld_grn">List Of Roles</span></td>
			  <td width="79%" class="txtBld_blue"><input name="CheckAll" type="checkbox" id="CheckAll" onClick="CheckAllOptions(form1)" value="checkbox"><label for="CheckAll">Select All</label>
				<input name="hdnUserId" type="hidden" id="hdnUserId" value="<?=$strRowUser['pkUserId']?>"></td>
			</tr>
			<?
				$rsRoles=$objAdminUser->m_objRoles->RolesList();
				if($rsRoles!=0){
					while($strRoles=mysql_fetch_array($rsRoles)){	
						$objAdminUser->m_objRoles->m_intRoleId=$strRoles['pkRoleId'];
			?>
			<tr>
			  <td align="right">&nbsp;</td>
			  <td><input name="chkRole[]" type="checkbox" id="chkRole<?=$strRoles['pkRoleId']?>" value="<?=$strRoles['pkRoleId']?>">              <label for="chkRole<?=$strRoles['pkRoleId']?>"><?=$strRoles['RoleDesc']?></label></td>
			</tr>
			<? } 
			}
			?>
		<tr>
          <td width="21%" align="right" class="txtBld_grn">&nbsp;</td>
          <td align="left"><input name="Add" type="submit" class="button" id="Add" value="Add"></td>
        </tr>
        <tr>
          <td width="21%" align="right">&nbsp;</td>
          <td align="left">&nbsp;</td>
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