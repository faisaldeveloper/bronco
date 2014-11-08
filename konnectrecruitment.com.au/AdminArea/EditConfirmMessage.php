<?php
require_once("../Includes/BackOfficeIncludesFiles.php");
//--------------Checking for right---------------------
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=199;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{
	/////////Validation//////////
	if(!isset($_REQUEST['hdnConfMsgId'])||empty($_REQUEST['hdnConfMsgId']))
		{
		header("location:ManageConfirmMessage.php?intMessage=273");
		exit;
		}
	////////////create class objects////////////
	$objConfMsg=new clsConfirmMessage();
	////////////Initialization////////////
		$nConfMsgId="";
		$nLangId = "";
		$nPageId = "";
	///////////Copying data from query string////////////
	if(isset($_REQUEST['hdnConfMsgId']))
	{
		$nConfMsgId=$_REQUEST['hdnConfMsgId'];
	}
	if(isset($_REQUEST['hdnLangId']))
	{
		$nLangId = $_REQUEST['hdnLangId'];
	}
	if(isset($_REQUEST['intPage']))
	{
		$intPage = $_REQUEST['intPage'];
	}
	///////////Transfer data to class variables//////////
	$objConfMsg->m_intConfMsgId=$nConfMsgId;
	$objConfMsg->m_intLangId=$nLangId;
	$rsConfMsg=$objConfMsg->GetMessage_BackOffice();
	$recConfMsg=mysql_fetch_object($rsConfMsg);
	$ConfMsgDec=$recConfMsg->ConfMsgDesc;
	$ConfMsgId=$recConfMsg->pkConfMsgId;
	$intIndicator=$recConfMsg->Indicator;
	$strImage=$recConfMsg->Image;
	if(isset($_REQUEST['txtConfMsgDesc']))
	$ConfMsgDec=$_REQUEST['txtConfMsgDesc'];
}//End Right If
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?>Edit  Confirm Message<?=CONST_BACKOFFICE_TITLE_END?></title>
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
		  	if(f.txtConfMsgDesc.value=="")
			{
				alert("Please enter confirmation message");
				f.txtConfMsgDesc.focus();
				return false;
			}
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
          <td colspan="4"><a href="ManageConfirmMessage.php"><span class="txtBld_ornge">Confirmation Messages</span></a>&nbsp;&gt;&gt;&nbsp;<span class="hdng_sandy">Edit Confirm Message</span></td>
              </tr>
				<tr><td colspan="5" align="center"><? include('../Includes/DisplayConfirmMessage.php');?></td></tr>
            <tr>
              <td>
                <form name="form1" method="post" action="EditConfirmMessageAction.php" onSubmit="return Validate(this)">
                  <table width="99%"  border="0" align="center" cellpadding="2" cellspacing="0" class="TabBorderLightGreyBG">
						<? if(isset($_GET['strMessage']))
							{
						?>
					    <tr>
					      <td width="199" align="left">&nbsp;</td>
					      <td colspan="3">&nbsp;</td>
				      </tr>
				      <tr>
                      <td align="left">&nbsp;</td>
                      <td colspan="3">
						<?    
							if($_GET['strMessage']=="Not Edit")
							{
								print "<span class='txt_red'>Event Not updated</span>";
							}
						?>                      </td>
                    </tr>
						<? 
							}
						?>
                        <tr>
                          <td align="left" class="txtBld_grn">&nbsp;</td>
                          <td colspan="3" align="left">&nbsp;</td>
                        </tr>
                      <tr>
                      <td align="left" class="txtBld_grn">Confirm Message<span class="txt_red">*</span></td>
                      <td colspan="3" align="left"><input name="txtConfMsgDesc" type="text" id="txtConfMsgDesc" value="<?=$ConfMsgDec?>" size="35">
                          <input name="hdnLangId" type="hidden" id="hdnLangId" value="<?=$_POST['hdnLangId']?>">
						  <input name="intPage" type="hidden" id="intPage" value="<?=$intPage?>">                        
						  <input name="hdnConfMsgId" type="hidden" id="hdnConfMsgId" value="<?=$_POST['hdnConfMsgId']?>">                        </td>
                    </tr>

					<tr>
					
			  <td align="left" class="txtBld_grn">Select Concepts<span class="txt_red">*</span></td>
			  <td colspan="3" align="left">
			  <? 
			  $objConfMsg->m_intConfMsgId=$ConfMsgId;
			  $temp=array();
			  $rsConceptById=$objConfMsg->GetConceptByfkConfMsgId();
			  $i=0;
			  if($rsConceptById)
			  while($row=mysql_fetch_array($rsConceptById))
			  {
			  	$temp[$i]=$row['fkConceptId'];$i++;
			  }
			  $rsConcept=$objConfMsg->GetConcept();
			  if($rsConcept)
			  {
			  ?>
			  <select name="lstConcept[]" size="24" multiple>
			  <option value="0">None</option>
			   <?
			   while($objConcept=mysql_fetch_object($rsConcept))
			   {?>
					<option value="<?=$objConcept->pkConceptId?>"<? if(in_array($objConcept->pkConceptId, $temp)) echo " selected";?>><?=$objConcept->ConceptDesc;//echo $objConcept->pkConceptId;?>
					</option>
			    <? 
				}//end of while
				?>
				</select>
				
			<? }//End of if
			?></td>
			  </tr>
			  

				  <tr>
					<td align="left" class="txtBld_grn">Indicator<span class="txt_red">*</span></td>
					<td width="78" align="left" class="txtBld_grn">
					  <input name="rdIndicator" id="rdIndicator" type="radio" class="radio" value="0" <? if($intIndicator==0)print "checked";?>><label for="rdIndicator">Right</label></td>
					<td width="227" align="left" class="txtBld_grn">
					  <input name="rdIndicator" id="rdIndicator2" type="radio" class="radio" value="1" <? if($intIndicator==1)print "checked";?>><label for="rdIndicator2">Wrong</label></td>
					<td width="161" align="left" class="txtBld_grn">&nbsp;</td>
				  </tr>
				  <tr>
					<td align="left" class="txtBld_grn">Image<span class="txt_red">*</span></td>
					<td align="left" class="txtBld_grn">
					  <input name="rdImage" id="rdImage" type="radio" class="radio" value="0" <? if($strImage=="right.jpg")print "checked";?>><label for="rdImage">Green</label></td>
					<td align="left" class="txtBld_grn">
					  <input name="rdImage" id="rdImage2" type="radio" class="radio" value="1" <? if($strImage=="cross.jpg")print "checked";?>><label for="rdImage2">Red</label></td>
					<td align="left" class="txtBld_grn">&nbsp;</td>
				  </tr>
                    <tr>
                      <td align="left">&nbsp;</td>
                      <td colspan="3" align="left"><input name="Submit" type="submit" class="button" value="Update"></td>
                    </tr>
                    <tr>
                      <td align="left">&nbsp;</td>
                      <td colspan="3" align="left">&nbsp;</td>
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