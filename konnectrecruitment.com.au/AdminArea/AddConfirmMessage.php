<? require_once("../Includes/BackOfficeIncludesFiles.php");
//--------------Checking for right---------------------
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=198;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{

//////////Create class objects//////////
$objLang = new clsLanguage();
$objConfMsg = new clsConfirmMessage();
/////Variable initialization/////////
$strDesc = "";
if(isset($_REQUEST['txtConfMsgDesc']))
	$strDesc = $_REQUEST['txtConfMsgDesc'];
}	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?>Add Confirmation Message<?=CONST_BACKOFFICE_TITLE_END?></title>
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
		  function Validate(f)
		  {
		  	if(f.txtConfMsgDesc.value=="")
			{
				alert("Please enter confirmation message");
				f.txtConfMsgDesc.focus();
				return false;
			}
			else if(f.elements['lstConcept[]'].value==0)
			{
				alert("Please select at least one concept");
				f.elements['lstConcept[]'].focus();
				return false;
			}
			else 
				return true;
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
    <td colspan="4"><a href="ManageConfirmMessage.php"><span class="txtBld_ornge">Confirmation Messages</span></a>&nbsp;&gt;&gt;&nbsp;<span class="hdng_sandy">Add Confirm Message</span></td>
 </tr>
 <tr>
    <td  colspan="4" align="center" class="txtBld_grn"><? include('../Includes/DisplayConfirmMessage.php');?>&nbsp;</td>
  </tr>
   <tr>
     <td><form name="form1" method="post" action="AddConfirmMessageAction.php" onSubmit="return Validate(this)">
      <table width="99%"  border="0" align="center" cellpadding="2" cellspacing="0" class="TabBorderLightGreyBG">
        <tr>
          <td class="hdng_sandy">&nbsp;</td>
          <td colspan="3">&nbsp;</td>
         </tr>
			<tr>
			<td width="33%" align="right" class="txtBld_grn">Select Language</td>
			<td colspan="3">
				<select name="lstLangId" id="lstLangId">
					<option value="0">Select</option>
					<?php 
					$arrLang = $objLang->GetLanguages();
					if($arrLang != FALSE) { 
						while($arrRecLang = mysql_fetch_object($arrLang)){
						?>
						<option value="<?=$arrRecLang->pkLangId?>"
						<?php if($arrRecLang->pkLangId == $_SESSION['intLangId']) echo "selected"?>>
						<?=$arrRecLang->LangDesc?>
						</option>
						<?php 
						}
					}?>
				</select></td>
			</tr>
			<tr>
          <td width="33%" align="right" class="txtBld_grn">Message Description<span class="txt_red">*</span></td>
          <td colspan="3" align="left"><input name="txtConfMsgDesc" type="text" id="txtConfMsgDesc" size="50" value="<?=$strDesc?>"></td>
        </tr>
		<? /*	
			<tr>
			  <td align="right" class="txtBld_grn">Add Concepts<span class="txt_red">*</span></td>
			  <td colspan="3" align="left">
			  <? 
			  $rsConcept=$objConfMsg->GetConcept();
			  if($rsConcept)
			  {
			  
			  ?>
			  <select name="lstConcept[]" id="lstConcept[]" size="20" multiple>
			   <?
			   while($objConcept=mysql_fetch_object($rsConcept))
			   {?>
			    <option value="<?=$objConcept->pkConceptId?>"><?=$objConcept->ConceptDesc?></option>
			    <? 
				}//end of while
				?>
				</select>
				
			<? }//End of if
			?>			</td>
			  </tr>
			  
			  */ ?>
			<tr>
			  <td align="right" class="txtBld_grn">Indicator<span class="txt_red">*</span></td>
			  <td width="10%" align="left" class="txtBld_grn">
              <input name="rdIndicator" id="rdIndicator" type="radio" class="radio" value="0" checked><label for="rdIndicator">Right</label></td>
			  <td width="13%" align="left" class="txtBld_grn">
			  <input name="rdIndicator" id="rdIndicator2" type="radio" class="radio" value="1"><label for="rdIndicator2">Wrong</label></td>
			  <td width="44%" align="left" class="txtBld_grn">&nbsp;</td>
			</tr>
			<tr>
			  <td height="16" align="right" class="txtBld_grn">Image<span class="txt_red">*</span></td>
			  <td align="left" class="txtBld_grn">
			    <input name="rdFlag" id="rdFlag" type="radio" class="radio" value="0" checked><label for="rdFlag">Green</label></td>
			  <td align="left" class="txtBld_grn">
			  <input name="rdFlag" id="rdFlag2" type="radio" class="radio" value="1"><label for="rdFlag2">Red</label></td>
			  <td align="left" class="txtBld_grn">&nbsp;</td>
			</tr>
        <tr>
          <td width="33%" align="right" class="txtBld_grn">&nbsp;</td>
          <td colspan="3" align="left">
		  <input name="intPage" type="hidden" id="intPage" value="<?=$_REQUEST['intPage']?>">
		  <input name="Submit" type="submit" class="button" value="Submit"></td>
        </tr>
        <tr>
          <td width="33%" align="right">&nbsp;</td>
          <td colspan="3" align="left">&nbsp;</td>
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