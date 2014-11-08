<?php
//*****************************************************************************************************//
//	Developer : Yasir Abbasi
//	Date:		2 june 2005
//	owner		DS
//*****************************************************************************************************//
require_once("../Includes/BackOfficeIncludesFiles.php");
//--------------Checking for right---------------------
	$objAdminUser=new clsAdminUser();
	$objAdminUser->m_objRoles=new clsRoles();
	$objAdminUser->m_intUserId=$_SESSION['intUserId'];
	$objAdminUser->m_objRoles->m_intRightId=78;
	if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
	{
///////////////////Creating class objects/////////////////////
		$objLanguage = new clsLanguage();	//Creating Language Object
		$objMessages = new clsMessages();	//Creating Message Object
		$_SESSION['intLangId'] = $objLanguage->GetDefaultLang();	//Setting Default Language
	}//End Right If
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?>Labels<?=CONST_BACKOFFICE_TITLE_END?></title>
<script language="JavaScript">
	
	function SubmitForm(frmName,strAct)
	{
		if(strAct=='Edit')
		{
			frmName.hdnAct.value="edit";
			frmName.action="TranslateMsg.php";
		frmName.submit();
		}
		else if(strAct=='Translate')
		{
			
			frmName.hdnAct.value="translate";
			frmName.action="TranslateMsg.php";
		frmName.submit();
		}
		else if(strAct=='Delete')
		{
			if(confirm("Are you sure?"))
			{ alert("here");
				frmName.hdnAct.value="delete";
				frmName.action="DelMsg.php";
		frmName.submit();
			}
		}
		return false;
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
		<?php
		if(isset($_REQUEST['txtMsgId']) && !empty($_REQUEST['txtMsgId']))
			$objMessages->m_intMessageId=$_REQUEST['txtMsgId'];							
		if(isset($_REQUEST['txtSrc']) && !empty($_REQUEST['txtSrc']))
			{
			$txtSearch = $_REQUEST['txtSrc'];
			$objMessages->m_strMessageDesc=$txtSearch;
			}
		$rsMessages1=$objMessages->SearchMessage();
		//********************************* Paging START **************************************//
		if($rsMessages1 != FALSE)
		{
			$arrGlobalOptions = GetGlobalOptions();
			$arrRecGlobalOptions = mysql_fetch_object($arrGlobalOptions);
			$intPerPage = $arrRecGlobalOptions->RowsPerPage;
			if(isset($_REQUEST['intPage']))		//Getting Page No
				$intPage=$_REQUEST['intPage'];
			else
				$intPage=1; 			//Default Page is one
			
			if($rsMessages1 != false && mysql_num_rows($rsMessages1))
				$intTotalReturned = mysql_num_rows($rsMessages1); 	//Total Records
			else $intTotalReturned = 0;
			
			$intPageCount = ceil($intTotalReturned/$intPerPage);   //Total Pages formed
			if($intPageCount<$intPage)
				$intPage--;
			if($intPage==1) //Setting records Limit from 0 for ist page
				$intRecordStart = $intPage-1; 
			else 			//Calculate records start for other page	
				$intRecordStart = ($intPage-1)*$intPerPage; 
			
			$arrQryStr=array();	
			$arrQryStr[]="txtSrc=".$txtSearch;
			$strQryStr=implode('&',$arrQryStr);
		}
	  	///////////////////////***************End***************/////////////////////////

		?>
		  <table width="98%"  border="0" align="center" cellpadding="2" cellspacing="0">
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
              <td colspan="3">
                <table width="100%">
                    <tr>
                      <td width="5%"><img src="Images/icon_label_32x32.jpg" alt="Image"/></td>
                      <td width="95%" valign="middle"><span class="hdng_sandy">Labels</span></td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td colspan="3" align="right">
                	<a href="ManageMessages.php">All Labels</a> |
	<?
						//--------Checking For Right-----------//
						$objAdminUser->m_objRoles->m_intRightId=80;
						if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
						{
	?>
				
							<a href="EngMsg.php?hdnAct=add&intPage=<?=$intPageCount?>">Add New Label</a>
<?						}?>
</td>
            </tr>
           <tr>
             <td colspan="2" align="left" valign="top">
               <table width="100%" border="0" cellpadding="0" cellspacing="0">
                 <tr>
				 	<td height="94" valign="top">
					 <form name="frmSearch" method="post" action="">
                       <input type="hidden" name="hdnSrc" value="yes">
                        <table width="100%"  border="0" cellpadding="0" cellspacing="2">
                           <tr>
                             <td width="24%" align="right" class="txtBld_grn">Label ID:</td>
                              <td width="76%"><input name="txtMsgId" type="text" id="txtMsgId" value="<?php if(isset($_REQUEST['hdnMsgId']) && $_REQUEST['hdnMsgId']!="") print $_REQUEST['hdnMsgId'];?>"></td>
                          </tr>
                                 <tr>
                                  <td align="right" class="txtBld_grn">Label Description:</td>
                                  <td>
                                    <input name="txtSrc" type="text" value="<?php if(isset($_REQUEST['txtSrc']) && $_REQUEST['txtSrc']!="") print $_REQUEST['txtSrc'];?>" size="40">                                   </td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                  <td colspan="2"><input name="btnSubmit" type="submit" class="button" id="btnSubmit" value="Search">&nbsp;</td>
                                </tr>
								<tr><td height="13" colspan="2">&nbsp;</td>
								</tr>
                       </table>
                      </form></td>
                 </tr>
					<tr align="center">
					  <td colspan="2"  valign ='bottom' ><? include('../Includes/DisplayConfirmMessage.php');?></td>
					</tr>
		
                  <tr>
                 	<td colspan="3" align="center" valign="top">
					<?PHP
					if($rsMessages1 != false && mysql_num_rows($rsMessages1)) //If Records found
					{
					?>
				       <table width="100%"  border="0" cellspacing="0" cellpadding="2">
						<tr>
						  <td width="4%" class="TabHeading">ID</td>
						  <td width="32%" class="TabHeading">Label Desc</td>
						  <td width="29%" align="center" class="TabHeading">Concepts</td>
						  <td width="20%" align="center" class="TabHeading">Language</td>
						  <td colspan="3" align="center" class="TabHeading">Action</td>
						</tr>
					<?
			$intRowCounter = 1;
			if($rsMessages1 != false && mysql_num_rows($rsMessages1))
			{	//if start
				mysql_data_seek($rsMessages1, $intRecordStart);
				for($i=0; $i<$intPerPage;$i++)
				{
					if($strResAll=mysql_fetch_object($rsMessages1))
					{
					?>  
						<form name="frm<?=$strResAll->pkMessageId.$strResAll->pkLangId?>" method="post">
						<tr id="cg" valign="middle" 
				<?php 
				if($intRowCounter % 2 == 0)
				{
					echo "class='bg_ltGrey' onMouseOver=\"this.className='bg_rollOver'\" onMouseOut=\"this.className='bg_ltGrey'\""; 
				}
				else
				{
				echo " class='bg_ltGreen' onMouseOver=\"this.className='bg_rollOver'\" onMouseOut=\"this.className='bg_ltGreen'\"" ;
				}
			   ?>>
                          <td class="brdr_dotedLt">
						  <input name="hdnMsgId" type="hidden" value="<?php echo $strResAll->pkMessageId?>">
                          <input name="hdnPage" type="hidden" value="<?=$intPage?>">
                          <input name="hdnLangId" type="hidden" value="<? echo $strResAll->pkLangId;?>">
                          <input name="hdnPage" type="hidden" value="<?=$intPage?>">
						  <input name="hdnAct" type="hidden" value="">
						  <?=$strResAll->pkMessageId?></td>
                          <td align="left" class="brdr_dotedRt"><?=$strResAll->MessageDesc?></td>
						  <td class="brdr_dotedRt">
						  <?
					$nMsgId=$strResAll->pkMessageId;
					unset($arrConcept);
					$objMessages->m_intMessageId=$nMsgId;
					$rsMessageConcepts = $objMessages->GetConceptByfkMsgId();
						if($rsMessageConcepts)
						{
							while($rowConcepts=mysql_fetch_object($rsMessageConcepts))
							 {
								 
								  $arrConcept[] = $rowConcepts->ConceptDesc;
								  $strConcepts = implode(",",$arrConcept);
								  
							  }
						echo $strConcepts;
						}
						else echo "&nbsp;";
						
						?></td>
                          <td width="20%" align="center" class="brdr_dotedRt"><?=$strResAll->LangDesc?></td>
						<td width="4%" align="right" class="brdr_dotedBtm">
						<?
						//--------Checking For Right-----------//
						$objAdminUser->m_intUserId=$_SESSION['intUserId'];	
						$objAdminUser->m_objRoles->m_intRightId=83;
						if($objAdminUser->CheckRightForAdmin()==1)
						{
						if(isset($MultiLangCheck)&&!empty($MultiLangCheck))
							{
						?>
						<input name="image" type="image" value="Translate" src="Images/btn_translate.gif" title="Translate Label"  height="32" width="32" border="0" onClick="SubmitForm(frm<?php echo $strResAll->pkMessageId.$strResAll->pkLangId?>,'Translate')">
						<?
						} 
						else print "&nbsp;";
						}
						else print "&nbsp;";?></td>
                          <td width="5%"  align="center" class="brdr_dotedBtm">
						<?
						//--------Checking For Right-----------//
						$objAdminUser->m_intUserId=$_SESSION['intUserId'];	
						$objAdminUser->m_objRoles->m_intRightId=81;
						if($objAdminUser->CheckRightForAdmin()==1)
						{
						?>
                        <input src="Images/btn_edit.gif" title="Edit Label" name="Submit2" border="0" height="32" type="image" width="32" value="Edit" onClick="SubmitForm(frm<?php echo $strResAll->pkMessageId.$strResAll->pkLangId?>,'Edit')">
<?						}else print"&nbsp;";?></td>
                          <td width="4%"  align="left" class="brdr_dotedBtm">
<?
						//--------Checking For Right-----------//
						$objAdminUser->m_intUserId=$_SESSION['intUserId'];	
						$objAdminUser->m_objRoles->m_intRightId=82;
						if($objAdminUser->CheckRightForAdmin()==1)
						{
?>
                            <input name="Submit2" type="image" onClick="return SubmitForm(frm<?php echo $strResAll->pkMessageId.$strResAll->pkLangId?>,'Delete')" value="Delete" src="Images/btn_delete.gif" title="Delete Label" width="32" height="32" border="0">
<?						}else print "&nbsp;";?></td>
                        </tr>
                     </form>
                      <? 
					  $intRowCounter++;
					  	}
					}
					?>
					<tr>
						<td align="left" colspan="7"><? print GeneralPaging($intPage,$intPageCount,$strQryStr);?></td>
					</tr>
                  </table>
		  <?php } } // end if num rows
			  else echo "<span class='txt_red'>No Message Found!</span>";
			  ?>				  </td>
				 </tr>
              </table></td>
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