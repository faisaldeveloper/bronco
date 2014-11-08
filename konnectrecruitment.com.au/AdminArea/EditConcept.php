<?php
	/***
		include files 
	**/
	include("../Includes/BackOfficeIncludesFiles.php");
//--------------Checking for right---------------------
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=272;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{
	/***
		getting page no
	**/
	if(isset($_REQUEST['hdnPage'])) 
		$nPage = $_REQUEST['hdnPage'];
	
	/**
	 	To Check if not Set (Server Side Validation)
	 **/
	if(!isset($_REQUEST['ConceptId']) || empty($_REQUEST['ConceptId']))
	{
		header("Location:ManageConcept.php?intMessage=101");
		exit;
	}

	/***
		creating objects
	**/
	$objConcept = new clsConcept();
	
	/***
		getting values
	**/
	if($_REQUEST['ConceptId'])
	{
		$nCId=$_REQUEST['ConceptId'];
	}

	/***
		getting concept bt ID
	**/
	$objConcept->m_intConceptId=$nCId;
	$rsConcept=$objConcept->GetConceptById();
}//End Right If
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?>Update Concept<?=CONST_BACKOFFICE_TITLE_END?></title>
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
			if(f.txtDes.value=="")
			{
				alert("Please enter name");
				f.txtDes.focus();
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
              <td><a href="ManageConcept.php"><span class="txtBld_ornge">Concepts</span></a>&nbsp;&gt;&gt;&nbsp;<span class="hdng_sandy">Edit Concept</span></td>
            </tr>
				<tr>
				   <td colspan="2" align="center">
					<? include('../Includes/DisplayConfirmMessage.php');?>
				  </td>
			</tr>
            <tr>
              <td><form action="EditConceptAction.php" method="post" enctype="multipart/form-data" name="f" onSubmit="return Validate(this)">
                  <table width="88%"  border="0" align="center" cellpadding="2" cellspacing="0" class="TabBorderLightGreyBG">
                    <tr>
                      <td align="right" class="txtBld_grn">&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="28%" align="left" class="txtBld_grn">Title/Name <span class="txt_red">*</span></td>
					  <?
					  if(isset($rsConcept))
					  $row=mysql_fetch_object($rsConcept);
					  ?>
                      <td width="72%"><input name="txtTitle" type="text" id="txtDes" value="<?=$row->ConceptDesc?>">
						<input name="intPage" type="hidden" id="intPage" value="<?=$nPage?>">
                        <input type="hidden" name="hdnConceptId" value="<?=$row->pkConceptId?>"></td>
                    </tr>
                    <tr>
                      <td align="left">&nbsp;</td>
                      <td align="left"><input name="Submit" type="submit" class="button" value="Update"></td>
                    </tr>
                    <tr>
                      <td align="left">&nbsp;</td>
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