<?php
	require_once("../Includes/BackOfficeIncludesFiles.php");
//--------------Checking for right---------------------
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=90;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{
	/***
		server side validation
	**/
	if(!isset($_REQUEST['hdnRoleId']) || empty($_REQUEST['hdnRoleId']))
	{
		header("Location:ManageRoles.php?intMessage=101");
		exit;
	}
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?>Edit Roles<?=CONST_BACKOFFICE_TITLE_END?></title>
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
			function Validate(f)
			{
				if(f.txtRoleName.value=="")
				{
					alert("Please enter roll name");
					f.txtRoleName.focus();
					return false;
				}
				return true;
			}

		  </script>
		  <table width="99%"  border="0" align="center" cellpadding="2" cellspacing="0">
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
               <td><a href="ManageRoles.php"><span class="txtBld_ornge">Role Manager</span></a>&nbsp;&gt;&gt;&nbsp;<span class="hdng_sandy">Edit Role</span></td>
            </tr>
			<tr>
			   <td colspan="2" align="center">
				<? include('../Includes/DisplayConfirmMessage.php');?>
			  </td>
			</tr>
            <?
	  $objRoles=new clsRoles();
	  $objRoles->m_intRoleId=$_REQUEST['hdnRoleId'];
	  $rsRoles=$objRoles->GetRoleDetail();
	  $strRowRoles=mysql_fetch_array($rsRoles);
	?>
            <tr>
              <td><form name="form1" method="post" action="EditRoleAction.php" onSubmit="return Validate(this)">
                  <table width="88%"  border="0" align="center" cellpadding="0" cellspacing="2" class="TabBorderLightGreyBG">
                    <tr>
                      <td align="left" class="txtBld_grn">&nbsp;</td>
                      <td align="left">&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="204" align="left" class="txtBld_grn">Role Desc </td>
                      <td width="582" align="left"><input name="txtRoleName" type="text" id="txtRoleName" value="<?=$strRowRoles['RoleDesc']?>" size="35">
                      <input name="hdnRoleId" type="hidden" id="hdnRoleId" value="<?=$_REQUEST['hdnRoleId']?>">                        </td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td align="left"><input name="Submit" type="submit" class="button" value="Update"></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td align="left">&nbsp;</td>
                    </tr>
                  </table>
              </form></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
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
