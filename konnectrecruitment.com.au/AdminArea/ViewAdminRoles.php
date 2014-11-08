<?php
	require_once("../Includes/BackOfficeIncludesFiles.php");
//--------------Checking for right---------------------
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=10;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?>Roles Management<?=CONST_BACKOFFICE_TITLE_END?></title>
<script>
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
          <table width="100%" cellspacing="0" cellpadding="2" align="center" width="99%">
		  <?
		  if($objAdminUser->CheckRightForAdmin()!=1)//Start Right If
			{
			?>
            <tr>
              <td colspan="3" class="txtBld_ornge">You are not authorised to view this page. <a href="<?=$_SERVER['HTTP_REFERER']?>">&gt;&gt;&nbsp;Back </a></td>
            </tr>
			<?
			}
			else {
			?>		  
            <tr>
              <td align="left" colspan="3"><a href="ListOfAdminUser.php"><span class="txtBld_ornge">Security (Admin Users)</span></a>&nbsp;&gt;&gt;&nbsp;<span class="hdng_sandy">User Roles</span> </td>
            </tr>
            <tr><td>&nbsp;</td></tr>
<?
	  $objAdminUser=new clsAdminUser();
	  $objAdminUser->m_objRoles=new clsRoles();

	  $objAdminUser->m_intUserId=$_GET['intUserId'];
	
	  $rsUser=$objAdminUser->AdminUserDetail();
	  $strRowUser=mysql_fetch_array($rsUser);
?>
       <tr>
        <td>  
          <table width="99%" cellspacing="0" cellpadding="2" class="TabBorderLightGreyBG" align="center">
            <tr>
              <td colspan="3" align="left" class="txtBld_grey">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="3" align="left" class="txtBld_grey"><span class="txtBld_grey">Admin User: </span><?=$strRowUser['UserName']?></td>
              </tr>
				<form name="form1" method="post" action="ViewAdminRolesAction.php">
                    <tr>
                      <td width="20%" align="left">&nbsp;</td>
                      <td width="4%" align="left"><input name="CheckAll" id="CheckAll" type="checkbox" onClick="CheckAllOptions(form1)" value="checkbox"></td>
                      <td width="76%" class="txtBld_grn"><label for="CheckAll">List Of Roles</label>
                      <input name="hdnUserId" type="hidden" id="hdnUserId" value="<?=$strRowUser['pkUserId']?>"></td>
                    </tr>
                    <?
									$rsRoles=$objAdminUser->m_objRoles->RolesList();
									if($rsRoles!=0){
										while($strRoles=mysql_fetch_array($rsRoles)){	
											$objAdminUser->m_objRoles->m_intRoleId=$strRoles['pkRoleId'];
											$intCheck=$objAdminUser->CheckRoleForAdmin();
					?>
                    <tr>
                      <td align="left">&nbsp;</td>
                      <td align="left"><input name="chkRole[]" type="checkbox" id="chkRole<?=$strRoles['pkRoleId']?>" value="<?=$strRoles['pkRoleId']?>" <? if($intCheck==1) print "checked";?>></td>
                      <td><label for="chkRole<?=$strRoles['pkRoleId']?>"><?=$strRoles['RoleDesc']?></label></td>
                    </tr>
                    <? } ?>
				<?
						//--------Checking For Right-----------//
						$objAdminUser->m_intUserId=$_SESSION['intUserId'];	
						$objAdminUser->m_objRoles->m_intRightId=11;
						if($objAdminUser->CheckRightForAdmin()==1)
						{
					?>
							<tr>
							  <td>&nbsp;</td>
						      <td colspan="2"><input name="Submit" type="submit" class="button" value="Update"></td>
					        </tr>
					<? 	}?>

                <?
					}	
					else print "<tr><td colspan='2' class='txt_red'>No Record Found</td></tr>";
				?>
			</form>
            <tr>
              <td colspan="2">&nbsp;</td>
            </tr>
			<?
				}//End Right If
			?>		  
          </table>
        </td>
       </tr>
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