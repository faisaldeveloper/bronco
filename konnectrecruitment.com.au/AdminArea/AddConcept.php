<?php
	include("../Includes/BackOfficeIncludesFiles.php");
//--------------Checking for right---------------------
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=270;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{
	$objConcept = new clsConcept();
}	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?>Add Concept<?=CONST_BACKOFFICE_TITLE_END?></title>
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
	<script language="javascript">
		function Validate(f)
		{
			if(f.txtTitle.value=="")
			{
				alert("Please enter name");
				f.txtTitle.focus();
				return false;
			}
			else return true;
		}
	</script>
          <table width="100%"  border="0" cellspacing="0" cellpadding="2">
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
              <td><a href="ManageConcept.php"><span class="txtBld_ornge">Concepts</span></a>&nbsp;&gt;&gt;&nbsp;<span class="hdng_sandy">Add New Concept</span></td>
            </tr>
				<tr>
				   <td align="center"><? include('../Includes/DisplayConfirmMessage.php');?>&nbsp;</td>
			</tr>
            <tr>
              <td><form action="AddConceptAction.php" method="post" enctype="multipart/form-data" name="f" onSubmit="return Validate(this)">
                  <table width="82%"  border="0" align="center" cellpadding="2" cellspacing="0" class="TabBorderLightGreyBG">
                    <tr>
                      <td align="right" class="txtBld_grn">&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="34%" align="left" class="txtBld_grn">Title/Name:<span class="txt_red">*</span></td>
                      <td width="66%"><input name="txtTitle" type="text" id="txtTitle" ></td>
                    </tr>
                    <tr>
                      <td align="left">&nbsp;</td>
		  				<input name="intPage" type="hidden" id="intPage" value="<?=$_REQUEST['intPage']?>">
                      <td rowspan="2" align="left"><input name="Submit" type="submit" class="button" value="Add"></td>
                    </tr>
                    <tr>
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