<?php
	require_once("../Includes/BackOfficeIncludesFiles.php");
//--------------Checking for right---------------------
	$objAdminUser=new clsAdminUser();
	$objAdminUser->m_objRoles=new clsRoles();
	$objAdminUser->m_intUserId=$_SESSION['intUserId'];
	$objAdminUser->m_objRoles->m_intRightId=80;
	if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
	{
//////////////Creating Class Objects////////////////
		$objMsg = new clsMessages();
////////////////Initialization///////////
		$arrConcept = array();
//////////Copy data from query string/////////////
		if(isset($_REQUEST['txtLeft'])&&!empty($_REQUEST['txtLeft']))
			$strDesc = $_REQUEST['txtLeft'];
		else
			$strDesc ="";
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?>Edit Language<?=CONST_BACKOFFICE_TITLE_END?></title>
<script>
	function validateform(f)
	{
		if(f.txtLeft.value=="")
		{
			alert("Enter label text.");
			f.txtLeft.focus();
			return false;
		}
		
	/*	if(f.elements['lstConcept[]'].value=='') 
		{
			alert("Please select at least one concept.");
			return false;
		}
	*/
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
		  <table width="100%" border="0" align="center" cellpadding="2" cellspacing="0" class="PageBody">
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
            <tr align="left">
              <td width="100%" colspan="2">
                <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" id="baktab">
                  <tr class="hvit">
                    <td colspan="4">
                      <table width="100%" cellpadding="0" id="logo">
                        <tr>
                          <td align="center">
                            <table width="100%" cellpadding="0" cellspacing="0">
                              <tr>
                                <TD align="left"><a href="ManageMessages.php"><span class="txtBld_ornge">Labels</span></a> &nbsp;&gt;&gt;&nbsp;<span class="hdng_sandy">Language Management System</span></TD>
                                </tr>
                              </table>
						  </td>
                        </tr>
                    </table></td>
                  </tr>
			<td>
            <table cellpadding="1" cellspacing="0" >
          </table></td>
        </tr>
        <tr>
          <td height="20" align="center" colspan="3"><? include('../Includes/DisplayConfirmMessage.php');?></td>
        </tr>
        <tr class="hvit">
          <td height="322" colspan="4" valign="top" >
            <form action="EngMsgAction.php" method="post" onSubmit="return validateform(this)">
              <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="TabBorderLightGreyBG">
                <tr>
                  <td height="17" align="left" valign="top" class="txtBld_grn">&nbsp;</td>
                  <td colspan="2" valign="top">&nbsp;</td>
                </tr>
                <tr>
                  <td width="27%"  align="left" valign="top" class="txtBld_grn">Enter English Label<span class="txt_red">*</span></td>
                <td  width="16%"  valign="top">
				  	<input type="text" name="txtLeft" id="txtLeft" value="<?=$strDesc?>">
				</td>
<? //after finishing the concept put add button here ?>
                </tr>
			
			<?	/*
						for internal office only
						height="322" 
						height="17"
				*/?>
							<tr>
                  <td height="17" align="left" valign="top" class="txtBld_grn">&nbsp;</td>
                  <td colspan="2" valign="top">&nbsp;</td>
                </tr>
							  <td align="left" valign="top"></td>
			
			<tr>
			  <td align="left" class="txtBld_grn">Attach Concepts<span class="txt_red">*</span></td>
			  <td colspan="3" align="left" valign="top">
			  <? 
			  $rsConcept=$objMsg->GetConcept();
			  if($rsConcept)
			  {
 			  ?>
			  <select name="lstConcept[]" size="22" multiple>
			   <?
			   while($objConcept=mysql_fetch_object($rsConcept))
			   {?>
			    <option value="<?=$objConcept->pkConceptId?>"><?=$objConcept->ConceptDesc?></option>
			    <? 
				}//end of while
				?>
				</select>
			<?  }//End of if
			?> </td>
			  </tr>
			 
              
                <tr>
                  <td align="left" valign="top"></td>
				  				<td  width="57%" valign="top">
					<input name="intPage" type="hidden" id="intPage" value="<?=$_REQUEST['intPage']?>">
                    <input name="btnSubmit" type="submit" class="button" id="btnSubmit"  value="Add">
				  </td>

<?php /*?>                  <td width="73%">&nbsp;</td><?php */?>
                </tr>
				 
				     <tr>
                  <td height="17" align="left" valign="top" class="txtBld_grn">&nbsp;</td>
                  <td colspan="2" valign="top">&nbsp;</td>
                </tr>
              </table>
            </form>
        </tr>
        <tr>
          <td colspan="8" align="center">&nbsp; </td>
        </tr>
        <tr>
          <td colspan="4" background="/./images/600x40-ff9900.gif"> </td>
        </tr>
       </table>
	  </td>
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