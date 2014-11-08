<?php
	include("../Includes/BackOfficeIncludesFiles.php");
//--------------Checking for right---------------------
	$objAdminUser=new clsAdminUser();
	$objAdminUser->m_objRoles=new clsRoles();
	$objAdminUser->m_intUserId=$_SESSION['intUserId'];
	$objAdminUser->m_objRoles->m_intRightId=197;
	if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
	{
		///////////Create class objects////////////
		$objCMessages = new clsConfirmMessage();
		$objConcept = new clsConcept();
		$objLang = new clsLanguage();
	}	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?>Confirmation Messages<?=CONST_BACKOFFICE_TITLE_END?></title>
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
		function CheckEmpty(f)
		{
			if(isNaN(f.txtMsgId.value))
			{
				alert("Please enter number");
				f.txtMsgId.focus();
				return false;
			}
			return true;
		}
	 </script>
<?
			//--------------Checking for right---------------------
	$objAdminUser=new clsAdminUser();
	$objAdminUser->m_objRoles=new clsRoles();
	$objAdminUser->m_intUserId=$_SESSION['intUserId'];
	$objAdminUser->m_objRoles->m_intRightId=197;
	if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
	{
		if(isset($_REQUEST['txtMsgId']) && !empty($_REQUEST['txtMsgId']))
			$objCMessages->m_intConfMsgId=$_REQUEST['txtMsgId'];							
		if(isset($_REQUEST['txtSrc']) && !empty($_REQUEST['txtSrc']))
		{
			$txtSearch = $_REQUEST['txtSrc'];
			$objCMessages->m_strConfMsgDesc=$txtSearch;
		}

		$rsMessages=$objCMessages->SearchMessage();
		//********************************* Paging START ******************************************//
		if($rsMessages != FALSE)
		{
			$arrGlobalOptions = GetGlobalOptions();
			$arrRecGlobalOptions = mysql_fetch_object($arrGlobalOptions);
			$intPerPage = $arrRecGlobalOptions->RowsPerPage;
			if(isset($_REQUEST['intPage']))		//Getting Page No
				$intPage=$_REQUEST['intPage'];
			else
				$intPage=1; 			//Default Page is one
			
			if($rsMessages != false && mysql_num_rows($rsMessages))
				$intTotalReturned = mysql_num_rows($rsMessages); 	//Total Records
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
}
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
              <td colspan="2">
                <table width="100%">
                    <tr>
                      <td width="5%"><img src="Images/icon_cmessage_32x32.jpg" alt="Image"/></td>
                      <td width="95%" valign="middle"><span class="hdng_sandy">Site Messages</span></td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td colspan="2" align="right">
			<?
			//--------------Checking for right---------------------
				$objAdminUser->m_intUserId=$_SESSION['intUserId'];
				$objAdminUser->m_objRoles->m_intRightId=198;
				if($objAdminUser->CheckRightForAdmin()==1)
				{
			?>
			   <a href="AddConfirmMessage.php?intPage=<?=$intPageCount?>">Add New Confirm Message </a>
			  <? }?>
			  </td>
            </tr>
			<tr>
              <td colspan="2" width="79%" align="left" valign="top">
			  <form name="frmSearch" method="post" action="<?php echo $_SERVER['PHP_SELF']?>" onSubmit="return CheckEmpty(this)">
                        <input type="hidden" name="hdnSrc" value="yes">
                        <table width="100%"  border="0" cellpadding="0" cellspacing="2">
                                <tr>
                                  <td width="24%" align="right" class="txtBld_grn">Message Number:</td>
                                  <td width="76%"><input name="txtMsgId" type="text" id="txtMsgId"></td>
                                </tr>
                                <tr>
                                  <td align="right" class="txtBld_grn">Message Description: </td>
                                  <td>
	                                <input name="txtSrc" type="text" value="<?php if(isset($_REQUEST['txtSrc']) && $_REQUEST['txtSrc']!="") print $_REQUEST['txtSrc'];?>" size="40">						          </td>
                                </tr>
                                <tr>
								<td>&nbsp;</td>
                                  <td><input name="btnSubmit" type="submit" class="button" id="btnSubmit" value="Search"></td>
                                </tr>
								<tr><td>&nbsp;</td></tr>
                </table>
                </form></td>
            </tr>
					<tr align="center">
					  <td colspan="2"  valign ='bottom' align="center"><? include('../Includes/DisplayConfirmMessage.php');?></td>
					</tr>
		
		 <tr>
        	<td colspan="2">
                  <?php 
				if($rsMessages != false && mysql_num_rows($rsMessages)>0)
				{
				?>
		          <table width="100%"  border="0" cellspacing="0" cellpadding="2">
                  <tr>
                    <td width="5%" align="center" nowrap class="TabHeading">No</td>
                    <td width="58%" align="left" class="TabHeading">Message Desc </td>
					<?php /*?><td width="58%" align="left" class="TabHeading">Concepts</td><?php */?>
                    <td width="21%" align="center" class="TabHeading">Language</td>
                    <td width="16%" align="center" class="TabHeading">Action</td>
                  </tr>
			<?
			$intRowCounter = 1;
			if($rsMessages != false && mysql_num_rows($rsMessages))
			{	//if start
				mysql_data_seek($rsMessages, $intRecordStart);
				for($i=0; $i<$intPerPage;$i++)
				{
					if($recConf=mysql_fetch_object($rsMessages))
					{
					$intConfMsgId=$recConf->pkConfMsgId;
					$strConfMsgDesc=$recConf->ConfMsgDesc;
					$intLangId=$recConf->pkLangId;
			  ?>
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
                    <td align="center" valign="middle" class="brdr_dotedLt"><?=$intConfMsgId?></td>
                    <td align="left" valign="middle" class="brdr_dotedRt"><?=$strConfMsgDesc?></td>
                    <?php /*?><td align="left" valign="middle" class="brdr_dotedRt">
					<?
					unset($arrConcept);
					$objCMessages->m_intConfMsgId=$intConfMsgId;
					$rsCMessageConcepts = $objCMessages->GetConceptByfkConfMsgId();
					
						if($rsCMessageConcepts)
						{
							while($rowConcepts=mysql_fetch_object($rsCMessageConcepts))
							 {
								 
								  $arrConcept[] = $rowConcepts->ConceptDesc;
								  $strConcepts = implode(",",$arrConcept);
								  
							  }
						echo $strConcepts;
						}
						else echo "&nbsp;";
						?>&nbsp;
					</td><?php */?>
					<td align="left" valign="middle" class="brdr_dotedRt"><? if($intLangId==1){print "English";}else if($intLangId==2){print "Norsk";}else{print "Swedish";}?>&nbsp;</td>
                    <td valign="middle" class="brdr_dotedRt">
					<table width="100%"  border="0" cellspacing="0" cellpadding="2">
                        <tr align="center">
						<td>
						  <form action="TranslateConfirmMessage.php" method="post">
						  <input name="hdnConfMsgId" type="hidden" id="hdnConfMsgId" value="<?=$intConfMsgId?>">
						  <input name="intPage" type="hidden" id="intPage" value="<?=$intPage?>">
						  <input name="hdnLangId" type="hidden" id="hdnLangId" value="<?=$intLangId?>">
						<?
						//--------------Checking for right---------------------
						$objAdminUser->m_intUserId=$_SESSION['intUserId'];
						$objAdminUser->m_objRoles->m_intRightId=200;
						if($objAdminUser->CheckRightForAdmin()==1)
						{
							if($MultiLangCheck)
							{
						?>
						  <input name="image" type="image" title="Translate Confirm Message" value="Translate" src="Images/btn_translate.gif"  height="32" width="32" border="0">
					<?php } }else{print "&nbsp;";}?>
						  </form></td>
						  <td>
						  <form action="EditConfirmMessage.php" method="post">
						  <input name="hdnConfMsgId" type="hidden" id="hdnConfMsgId" value="<?=$intConfMsgId?>">
						  <input name="intPage" type="hidden" id="intPage" value="<?=$intPage?>">
						  <input name="hdnLangId" type="hidden" id="hdnLangId" value="<?=$intLangId?>">
						<?
						//--------------Checking for right---------------------
						$objAdminUser->m_intUserId=$_SESSION['intUserId'];
						$objAdminUser->m_objRoles->m_intRightId=199;
						if($objAdminUser->CheckRightForAdmin()==1)
						{
						?>

						<input src="Images/btn_edit.gif" title="Edit Confirm Message" name="Submit3" border="0" height="32" type="image" width="32" value="Edit">
					<?php }else{print "&nbsp;";}?>
						  </form>	
		
					      </td>
                          <td>
                          <form action="DeleteConfirmMessage.php" method="post">
						  <input name="hdnConfMsgId" type="hidden" id="hdnConfMsgId" value="<?=$intConfMsgId?>">
						  <input name="hdnPageId" type="hidden" id="hdnPageId" value="<?=$intPage?>">
						  <input name="hdnLangId" type="hidden" id="hdnLangId" value="<?=$intLangId?>">
						 
						<?
						//--------------Checking for right---------------------
						$objAdminUser->m_intUserId=$_SESSION['intUserId'];
						$objAdminUser->m_objRoles->m_intRightId=201;
						if($objAdminUser->CheckRightForAdmin()==1)
						{
						?>
						  <input src="Images/btn_delete.gif" title="Delete Confirm Message" border="0" height="32" type="image" width="32" value="Delete" name="btnDelImg" onClick="return confirm('Are you sure you want to delete?')">
					<?php }else{print "&nbsp;";}?>
						  </form></td>
						<td>
						</td>
						</tr>
					</table>
				</td>
               </tr>
               <?php
				$intRowCounter++;
				} //end IF mysql_fetch_object
				}
				?>
				<tr>
					<td colspan="4"><? print GeneralPaging($intPage,$intPageCount,$strQryStr);?></td>
				</tr>
		  </table>
				<?
				 } //end IF mysql_num_rows
				 }
				 else
				 {
				 ?>
				 <table width="100%" cellpadding="0" cellspacing="0" border="0" class="txtBld_ornge">
					 <tr align="center">
					 <? echo "<td><span class='txt_red'>No message found!</span></td>";?>
					 </tr>
				 </table>
				 <? }?>
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