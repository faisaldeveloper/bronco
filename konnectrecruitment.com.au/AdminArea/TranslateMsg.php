<?
//*****************************************************************************************************//
//	Developer : Yasir Abbasi
//	Date:		2 june 2005
//	owner		DS
//*****************************************************************************************************//

require_once("../Includes/BackOfficeIncludesFiles.php");

	if(isset($_REQUEST['hdnAct']) && $_REQUEST['hdnAct']=="edit")
		$nRightId = 81;
	else
		$nRightId = 83;

//--------------Checking for right---------------------
	$objAdminUser=new clsAdminUser();
	$objAdminUser->m_objRoles=new clsRoles();
	$objAdminUser->m_intUserId=$_SESSION['intUserId'];
	$objAdminUser->m_objRoles->m_intRightId=$nRightId;
	if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
	{

	////////////////Validation/////////////
		if(!isset($_REQUEST['hdnMsgId']))
		{
			header("location:ManageMessages.php?intMessage=372");
			exit;
		}
	///////creating class objects/////////
		$objLanguage = new clsLanguage(); //Creating Language Object
		$objMessages = new clsMessages(); //Creating Messages Object
	//////////////Variables Initialization////////////
		$intPage = "";
		$nMsgId = "";
		$nLangId = "";
	////////getting from query string////////////
		if(isset($_REQUEST['hdnPage']))
			$intPage = $_REQUEST['hdnPage'];
		if(isset($_REQUEST['hdnMsgId']))
			$nMsgId=$_REQUEST['hdnMsgId'];
		if(isset($_REQUEST['hdnLangId']))
			$nLangId=$_REQUEST['hdnLangId'];
	///////////Transfering values to class variables/////////
	//***************Get MessageId********************//
		$objMessages->m_intMessageId=$nMsgId;
	//***************Get LanguageId********************//
		$objMessages->m_intLangId=$nLangId;
	
	} //End Right If
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?>Translation Manager<?=CONST_BACKOFFICE_TITLE_END?></title>
<script language="JavaScript">
	
	function SubmitForm(frmName,strAct)
	{
		if(strAct=='Edit')
		{
			frmName.hdnAct.value="edit";
			frmName.action="TranslateMsg.php";
		}
		else if(strAct=='Translate')
		{
			frmName.hdnAct.value="translate";
			frmName.action="TranslateMsg.php";
		}
		else if(strAct=='Delete')
		{
			if(confirm("Are you sure?"))
			{
				frmName.hdnAct.value="delete";
				frmName.action="DelMsg.php";
			}
		}
		frmName.submit();
	}
	function Validate(f)
	{
		if(f.txtMsg && f.txtMsg.value=="")
		{
			alert("Please enter message");
			f.txtMsg.focus();
			return false;
		}
		if(f.txtEngMsg && f.txtEngMsg.value=="")
		{
			alert("Please enter message");
			f.txtEngMsg.focus();
			return false;
		}
		/*
		if(f.elements['lstConcept[]'].value=='') 
		{
			alert("Please select at least one concept");
			return false;
		}
		*/
		return true;
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
    <br>
	  <table width="99%"  border="0" cellpadding="0" cellspacing="3">
		  <?
		  if($objAdminUser->CheckRightForAdmin()!=1)//Start Right If
			{
			?>
            <tr>
              <td class="txtBld_ornge" colspan="3">You are not authorised to view this page. <a href="<?=$_SERVER['HTTP_REFERER']?>">&gt;&gt;&nbsp;Back </a></td>
            </tr>
			<?
			}
			else {
			?>
		<tr>
		  <td colspan="2"><a href="ManageMessages.php"><span class="txtBld_ornge">Labels</span></a>&nbsp;&gt;&gt;&nbsp;
		 <?
		//Incase of edit Heading is this
		if(isset($_REQUEST['hdnAct']) && $_REQUEST['hdnAct']=="edit")
		{
		?>
        <span class="hdng_sandy">Edit Label</span>
        <? 
		}
		else{ //Incase of translate 
		?>
      	<span class="hdng_sandy">Translate Label</span>
      	<? 
		}
		?></td>
         </tr>
     <tr>
       <td>
          <table width="99%" align="center" cellpadding="2" cellspacing="0" class="TabBorderLightGreyBG">
	 <form action="MsgAction.php" method="post" onSubmit="return Validate(this)">
		<tr>
		  <td align="left"><input type="hidden" name="hdnPage" value="<?=$intPage?>"></td>
		  <td align="left">&nbsp;</td>
		</tr>
            <tr>
              <td align="left">&nbsp;</td>
              <td width="70%" align="left">&nbsp;</td>
            </tr>
            <tr>
              <td width="30%" align="left" class="txtBld_grn">Label<span class="txt_red">*</span></td>
              <td align="left">
                <?php
					//********Message Detail on basis of Message id and Language id********************//
					$rsMessages=$objMessages->GetMessageDetail();
					$strResMsg=mysql_fetch_array($rsMessages);
				?>
                <input name="txtEngMsg" type="text" value="<?=$strResMsg['MessageDesc']?>" size="45" <? if(isset($_REQUEST['hdnAct']) && $_REQUEST['hdnAct']!='edit') print "disabled"?> >                </td>
            </tr>
			<? // only available for internal office ?>
			<tr>
			  <td align="left" class="txtBld_grn">Attach Concepts<span class="txt_red">*</span></td>
			  <td colspan="3" align="left">
			  <? 
			  $objMessages->m_intMessageId=$_REQUEST['hdnMsgId'];;
			  $temp=array();
			  $rsConceptById=$objMessages->GetConceptByfkMsgId();
			  $i=0;
			  if($rsConceptById)
			  while($row=mysql_fetch_array($rsConceptById))
			  {
			  	$temp[$i]=$row['fkConceptId'];$i++;
				echo $temp[$i];
			  }
			  $rsConcept=$objMessages->GetConcept();
			  if($rsConcept)
			  {
			  //echo mysql_num_rows($rsConcept);
			  ?>
			  <select name="lstConcept[]" size="25" multiple>
			   <?
			   while($obConcept=mysql_fetch_object($rsConcept))
			   {?>
					<option value="<?=$obConcept->pkConceptId?>" <? if(in_array($obConcept->pkConceptId, $temp)) echo " selected";?>><?=$obConcept->ConceptDesc;?>
					</option>
			    <? 
				}//end of while
				?>
				</select>
				
			<? }//End of if
			?></td>
			
			
			
			  </tr>
			   
            <tr>
              <td align="left" class="txtBld_grn">Language<span class="txt_red">*</span></td>
              <td align="left">
                <?php 

					//****************************Incase of edit message only****************************//
								
					if(isset($_REQUEST['hdnAct']) && $_REQUEST['hdnAct']=="edit")
					{ 

						$objLanguage->m_intLangId=$_REQUEST['hdnLangId']; //Set Language ID
						$rsLanguage=$objLanguage->GetLanguageById();	  //Get Language on basis of id	

						$strRec=mysql_fetch_array($rsLanguage);
						echo "&nbsp;".$strRec['LangDesc'];				  //Display Language	

						$intId=$_REQUEST['hdnLangId'];
						$strAc=$_REQUEST['hdnAct'];
						echo "<input type='hidden' name='hdnLang' value='$intId'>";
						echo "<input type='hidden' name='hdnAct' value='$strAc'>";	
											
					//****************************End Edit Only Part***********************************//
					}
					else	//****************************Incase Of Translation Only*******************//
					{
					?>
                <select name="cmbLang">
                  <option value="0">Select</option>
                  <?php 
						//********************************Get Languages*********************************//
						if(isset($_REQUEST['hdnLangId'])) $intLId=$_REQUEST['hdnLangId']; else $intLId="";
						 $rsLang=$objMessages->GetNonTranlatedLangs('pkLangId','messages','pkMessageId',$nMsgId);
						while($strResLang=mysql_fetch_array($rsLang))
						{
							// Commented By Khalid if($_SESSION['intLangId']!=$strResLang["pkLangId"]) //No Translation for 
							//{													//Default Lnguage
								$objMessages->m_intLangId=(int)$strResLang["pkLangId"];
								$intCheck=$objMessages->GetMessageDetail();
								if(mysql_num_rows($intCheck)==0)	//If Message Not Translated for Language
								{
					?>
                  	<option value="<?php echo $strResLang["pkLangId"]?>"<?php if($intLId==$strResLang["pkLangId"]) echo "selected";?>><?php echo $strResLang["LangDesc"]?></option>
                  <?php
							}
							//}
						} 
					//********************************************************************************//
					?>
                </select>
				<?php if($rsLang == FALSE) echo "<span class='txt_red'>This label is translated in all available languages</span>"; ?>
                <?php
					}// end else
					//**************************************End Translation only Part********************//
					
					//*******************Set Message ID***************************************************//
					?>
                <input name="hdnMsgId" type="hidden" size="10" value="<?php if(isset($_REQUEST['hdnMsgId'])) echo $_REQUEST['hdnMsgId']?>">              </td>
            </tr>
            <?  //*****************Incase of translate Message***********************************//
				if(isset($_REQUEST['hdnAct']) && $_REQUEST['hdnAct']!='edit'){?>
            <tr>
              <td align="left" class="txtBld_grn">Translate<span class="txt_red">*</span></td>
              <td align="left"><input name="txtMsg" type="text" size="45" value=""></td>
            </tr>
            <?  }
				//*******************************************************************************//
			?>
            <tr align="center">
              <td align="left">&nbsp;</td>
              <td align="left"><input name="btnSubmit" type="submit" id="btnSubmit" value="Update" class="button"></td>
            </tr>
            <tr align="center">
              <td>&nbsp;</td>
              <td align="left">&nbsp;</td>
            </tr>
			</form>
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