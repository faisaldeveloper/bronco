<?php
	require_once("../Includes/BackOfficeIncludesFiles.php");
//--------------Checking for right---------------------
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=5;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{

///////////// Initialization ///////////////////
	$nLangId = $_SESSION['intLangId'];
	$intPage=1;
	$intTotalReturned = 0;
	$intTotalReturned = 0;
	$nParentId = 0;
	$strSearch='';
//////////////Creating Objects///////////////////
	$objPages = new clsPages();
	$objLang = new clsLanguage();
///////////// Getting values ///////////////////
	if(isset($_REQUEST['lstLanguage']))
		$nLangId = $_REQUEST['lstLanguage'];
	if(isset($_REQUEST['hdnParentId'])) 
		$nParentId = $_REQUEST['hdnParentId'];
	if(isset($_REQUEST['txtSearch']) && !empty($_REQUEST['txtSearch'])) 
		$strSearch=$_REQUEST['txtSearch'];
	if(isset($_REQUEST['intPage']))		//Getting Page No
		$intPage=$_REQUEST['intPage'];
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?>Page Manager<?=CONST_BACKOFFICE_TITLE_END?></title>
	 <script language="javascript" type="text/javascript">
     function OnChange(f)
     {
		 f.action="<?=$_SERVER['PHP_SELF']?>?nView=view";
		 f.submit();
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
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2">
                <table width="100%">
                    <tr>
                      <td width="4%"><img src="Images/icon_pages_32x32.png" alt="Image"/></td>
                      <td width="96%" valign="middle"><? if($nParentId==0) {?> <span class="hdng_sandy">Page Manager </span><? }else { ?> <a href="ManagePages.php"><span class="txtBld_ornge">Page Manager</span></a>&nbsp;&gt;&gt;&nbsp;<span class="hdng_sandy">SubPages</span> <? }?></td>
                  </tr>
                </table>
			  </td>
            </tr>
            <tr>
              <td colspan="2" align="right">&nbsp;</td>
            </tr>
	        <tr>
		  		<td colspan="2" align="right"> 				
				<?
				//--------------Checking for right---------------------
				$objAdminUser->m_intUserId=$_SESSION['intUserId'];
				$objAdminUser->m_objRoles->m_intRightId=23;
				if($objAdminUser->CheckRightForAdmin()==1)
				{
					if($nParentId==0)
					{
				?>
						<a href="AddPage.php?hdnParentId=<?=$nParentId?>">Add New Page</a>
				<? 
					}
					else 
					{
				?>
						<a href="AddPage.php?hdnParentId=<?=$nParentId?>">Add New SubPage</a>
				<? 
					} 
				} 
				else
					print "&nbsp;";
				?>
				</td>
			</tr>
			<tr>
              <td width="79%" align="left" valign="top"><form name="form1" method="post" action="<?=$_SERVER['PHP_SELF']?>">
                  <table width="100%"  border="0" cellspacing="2" cellpadding="0">
                    <tr>
                      <td width="98" align="right" class="txtBld_grn" <?php if(!$MultiLangCheck){?>style="visibility:hidden"<?php }?>>Select Language</td>
                      <td width="85" align="left" <?php if(!$MultiLangCheck){?>style="visibility:hidden"<?php }?>>
                        <select name="lstLanguage" onChange="return OnChange(this.form);">
                          <?php 
						   $arrLang = $objLang->GetLanguages();
						   if($arrLang != FALSE) { 
						     while($arrRecLang = mysql_fetch_object($arrLang)){
						  ?>
							  <option value="<?=$arrRecLang->pkLangId?>" <?php if($arrRecLang->pkLangId == $nLangId) echo "selected"?>> <?=$arrRecLang->LangDesc?> </option>
						  <?php 
						    }
						  }
						  ?>
                      </select>&nbsp;
					  <input name="hdnParentId" type="hidden" id="hdnParentId" value="<?=$nParentId?>">
					  </td>
                      <td align="right" class="txtBld_grn">Page Name</td>
                      <td width="175" align="right"><input name="txtSearch" type="text" id="txtSearch" size="35" value="<?php echo $strSearch;?>"></td>
                      <td width="47" align="left"><input name="btnView" type="submit" class="button" id="btnView" value="View"></td>
                    </tr>
                    <tr>
                      <td align="right" class="txtBld_grn">&nbsp;</td>
                      <td align="right">&nbsp;</td>
                      <td colspan="2" align="right">Leave blank to view all pages</td>
                      <td align="right">&nbsp;</td>
                    </tr>
                  </table>
              </form></td>
            </tr>
			<tr><td align="center">
				<? include('../Includes/DisplayConfirmMessage.php');?>
			</td></tr>
            <tr>
              <td colspan="2">
                <?php
				$objPages->m_intLangId = $nLangId;
				$objPages->m_strSearchWords = $strSearch;
				if($strSearch!='')
					$arrPages = $objPages->PagesSearch($nParentId);
				else	
					$arrPages = $objPages->GetPages($nPageId,$nParentId);
				
				//////////////////// Paging ///////////////////////////////////////////////
				$arrGlobalOptions = GetGlobalOptions();
				$arrRecGlobalOptions = mysql_fetch_object($arrGlobalOptions);
				$intPerPage = $arrRecGlobalOptions->RowsPerPage;

				if($arrPages != false && mysql_num_rows($arrPages))
					$intTotalReturned = mysql_num_rows($arrPages); 	//Total Records
				
				$intPageCount = ceil($intTotalReturned/$intPerPage);   //Total Pages formed
				if($intPage>1) //Setting records Limit from 0 for ist page
					$intRecordStart = ($intPage-1)*$intPerPage; 
				////////////////////////////////////////////////////////////////////////////

				$arrQryStr=array();	
				$arrQryStr[]="hdnParentId=".$nParentId;
				$arrQryStr[]="txtSearch=".$strSearch;
				$arrQryStr[]="lstLanguage=".$nLangId;
				$strQryStr=implode('&',$arrQryStr);
				?>
                <table width="100%"  border="0" align="center" cellpadding="2" cellspacing="0">
                  <?
				  if($arrPages != NULL)
				  if(mysql_num_rows($arrPages)>0)
				  {
				  ?>
				  <tr>
                    <td width="18%" nowrap class="TabHeading">Page Name</td>
                    <td width="19%" align="center" class="TabHeading">Is Home Page</td>
					<td colspan="2" align="center" class="TabHeading">Modules</td>
					<td align="center" class="TabHeading"><? if($nParentId==0){?>SubPages<? }else {?>Action<? }?></td>
					<? if($nParentId==0) {?><td width="24%" align="center" class="TabHeading">Action</td><? }?>
                  </tr>
                  <?php
				  }//End of if of header table 
				  if($arrPages != false && mysql_num_rows($arrPages)>0)
				  {	//if start
						mysql_data_seek($arrPages, $intRecordStart);
						for($i=0; $i<$intPerPage;$i++)
						{
							if($arrRecPages=mysql_fetch_object($arrPages))
							{
								$intPageId = $arrRecPages->pkPageId;
								$intParentId = $arrRecPages->ParentId;
								$intPageType= $arrRecPages->PageType;
								$strPageName = $arrRecPages->PageName;
								$nIsActive = $arrRecPages->IsActive;
								$objPages->m_intPageId = $intPageId;
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
								<td valign="middle" class="brdr_dotedLt"><? if (!empty($strPageName)) echo htmlspecialchars($strPageName); else echo "&nbsp;";?></td>
								<td align="center" class="brdr_dotedRt" valign="middle">
							<?php
							//--------------Checking for right---------------------
							$objAdminUser->m_intUserId=$_SESSION['intUserId'];
							$objAdminUser->m_objRoles->m_intRightId=6;
							if($objAdminUser->CheckRightForAdmin()==1)
							{ 
								if( $arrRecPages->IsStartup == 1)
									echo "Home Page";
								else
								{
								?>
									<a href="SetStartupPage.php?hdnPageId=<?=$intPageId?>&hdnLangId=<?=$nLangId?>&intPage=<?=$intPage;?>&<?=$strQryStr?>">Set as Home Page</a></td><? 
								} }else echo "&nbsp;";
								?>
								<td width="6%" align="left" valign="middle" nowrap class="brdr_dotedBtm">
								<?php
								$arrModules = $objPages->GetPageModule();
								if($arrModules != FALSE)
								{
									while($arrRecModules = mysql_fetch_object($arrModules))
									{
										echo "<li>".$arrRecModules->ModuleDesc."</li>"; 
									}
								}
								else
									echo "<span class='txt_red'>Does not exist</span>";
							  	?>
							  	</td>
								<td width="16%" align="center" valign="middle" nowrap class="brdr_dotedRt"><?php if($arrModules != FALSE)
								{
								?> 
								 <form action="EditModules.php" method="post">
									<input name="hdnPageId" type="hidden" id="hdnPageId" value="<?=$intPageId?>">
									<input name="hdnLangId" type="hidden" id="hdnLangId" value="<?=$nLangId?>">
									<input name="hdnParentId" type="hidden" id="hdnParentId" value="<?=$nParentId?>">
									<input name="hdnSearch" type="hidden" id="hdnSearch" value="<?=$strSearch?>">
									<input name="hdnPage" type="hidden" id="hdnPage" value="<?=$intPage?>">
									<?
									//--------------Checking for right---------------------
										$objAdminUser->m_intUserId=$_SESSION['intUserId'];
										$objAdminUser->m_objRoles->m_intRightId=18;
										if($objAdminUser->CheckRightForAdmin()==1)
										{
									?>
									<input src="Images/btn_edit.gif" title="Edit Page Modules" name="Submit" border="0" height="32" type="image" width="32" value="Edit"> 
								  </form>
								 <? }else{print "&nbsp;";}?>
									<?php 
									}
									else
									{
									?>
									<form action="AddModules.php" method="post">
									<input name="hdnPageId" type="hidden" id="hdnPageId" value="<?=$intPageId?>">
									<input name="hdnLangId" type="hidden" id="hdnLangId" value="<?=$nLangId?>">
									<input name="hdnParentId" type="hidden" id="hdnParentId" value="<?=$nParentId?>">
									<input name="hdnSearch" type="hidden" id="hdnSearch" value="<?=$strSearch?>">
									<input name="hdnPage" type="hidden" id="hdnPage" value="<?=$intPage?>">
									<?
									//--------------Checking for right---------------------
										$objAdminUser->m_intUserId=$_SESSION['intUserId'];
										$objAdminUser->m_objRoles->m_intRightId=17;
										if($objAdminUser->CheckRightForAdmin()==1)
										{
									?>
										  <input src="Images/btn_add.gif" title="Add Page Modules" name="btnAddModule" border="0" height="32" type="image" width="32" value="Add">
								 <? }else{print "&nbsp;";}?>
									</form>
								  <?php
									}
									?></td>
								<?php
								if($nParentId==0)
								{
								?>
								<td width="17%" align="center" valign="middle" nowrap class="brdr_dotedRt">
								<?
								if($intPageType==CONST_PAGETYPE_DYNAMIC)
								{
									$objPages->m_intLangId = $_SESSION['intLangId'];
									$rsSubPages = $objPages->GetPages(0, $intPageId);
									if($rsSubPages==FALSE)
									{
									?>
									<form action="AddPage.php" method="post">
									<input name="hdnPageId" type="hidden" id="hdnPageId" value="<?=$intPageId?>">
									<input name="hdnLangId" type="hidden" id="hdnLangId" value="<?=$nLangId?>">
									<input name="hdnParentId" type="hidden" id="hdnParentId" value="<?=$intPageId?>">
									<input name="hdnSearch" type="hidden" id="hdnSearch" value="<?=$strSearch?>">
									<input name="hdnPage" type="hidden" id="hdnPage" value="<?=$intPage?>">
										<? echo "<span align='left' class='txt_red'>Does not exist</span>";
										//--------------Checking for right---------------------
											$objAdminUser->m_intUserId=$_SESSION['intUserId'];
											$objAdminUser->m_objRoles->m_intRightId=23;
											if($objAdminUser->CheckRightForAdmin()==1)
											{
										?>
										<input src="Images/btn_add.gif" title="Add SubPage" name="btnAddModule2" border="0" height="32" type="image" width="32" value="Add">
										<? }?>
								  </form>
									 <? } else { ?>
									  <form action="ManagePages.php" method="post">
									<input name="hdnPageId" type="hidden" id="hdnPageId" value="<?=$intPageId?>">
									<input name="hdnLangId" type="hidden" id="hdnLangId" value="<?=$nLangId?>">
									<input name="hdnParentId" type="hidden" id="hdnParentId" value="<?=$intPageId?>">
									<input name="hdnSearch" type="hidden" id="hdnSearch" value="<?=$strSearch?>">
									<input name="hdnPage" type="hidden" id="hdnPage" value="<?=$intPage?>">
										<?
										//--------------Checking for right---------------------
											$objAdminUser->m_intUserId=$_SESSION['intUserId'];
											$objAdminUser->m_objRoles->m_intRightId=20;
											if($objAdminUser->CheckRightForAdmin()==1)
											{
										?>
										<input name="image" type="image" title="View SubPage" value="View" src="Images/btn_view.gif" width="32" height="32" border="0"> 		
										<? }?>
									  </form>
									  <?
										}
									  }	
									  else print "Static Page";
			
									  ?>	
							    </td>
									 <? 
									 }
									 ?>
								<td align="center" valign="middle" class="brdr_dotedRt">
								<?
								if($intPageType==CONST_PAGETYPE_DYNAMIC)
								{
								?>
								<table width="99%"  border="0" align="center" cellpadding="2" cellspacing="0">
									<tr>
									  	<td width="25%" align="center">
								<?
								//--------------Checking for right---------------------
									$objAdminUser->m_intUserId=$_SESSION['intUserId'];
									$objAdminUser->m_objRoles->m_intRightId=12;
									if($objAdminUser->CheckRightForAdmin()==1)
									{
											if($nIsActive==1)
											{
									?>
										  <a href="PublishPage.php?status=Active&hdnPageId=<?=$intPageId?>&hdnParentId=<?=$nParentId?>">Un Publish</a><?
											}//end of if
											else
											{
											?>
									<a href="PublishPage.php?status=DeActive&hdnPageId=<?=$intPageId?>&hdnParentId=<?=$nParentId?>">Publish</a>
											<?
											}//End of else
											?> 
								 <? }
								 	else { print "&nbsp;";}?>
                                    </td>
									  
									  <form action="EditPage.php" method="post">	
									  	<td width="25%" align="center">
										  <input name="hdnPageId" type="hidden" id="hdnPageId" value="<?=$intPageId?>">
										  <input name="hdnParentId" type="hidden" id="hdnParentId" value="<?=$nParentId?>">
										  <input name="hdnSearch" type="hidden" id="hdnSearch" value="<?=$strSearch?>">
                                          <input name="hdnPage" type="hidden" id="hdnPage" value="<?=$intPage?>">
									<?
									//--------------Checking for right---------------------
										$objAdminUser->m_intUserId=$_SESSION['intUserId'];
										$objAdminUser->m_objRoles->m_intRightId=206;
										if($objAdminUser->CheckRightForAdmin()==1)
										{
									?>
										  <input src="Images/btn_edit.gif" title="Edit Page Info" name="Submit" border="0" height="32" type="image" width="32" value="Edit">
								 <? }else{print "&nbsp;";}?>
                                 </td>
									  </form>	
								
									  <form action="../<?=$arrRecPages->PageUrl;?>" method="post" target="_blank">
										<td width="25%" align="center">
										  <input name="hdnLangId" type="hidden" id="hdnLangId" value="<?=$intLangId?>">
									<?
									//--------------Checking for right---------------------
										$objAdminUser->m_intUserId=$_SESSION['intUserId'];
										$objAdminUser->m_objRoles->m_intRightId=20;
										if($objAdminUser->CheckRightForAdmin()==1)
										{
									?>
										  <input src="Images/btn_view.gif" title="View Page" border="0" height="32" type="image" width="32" value="View">
								 <? }else{print "&nbsp;";}?>
                                 </td>
									  </form>	
									  <form action="DeletePage.php" method="post">	
										<td width="25%" align="center">
										  <input name="hdnPageId" type="hidden" id="hdnPageId" value="<?=$intPageId?>">
										  <input name="hdnLangId" type="hidden" id="hdnLangId" value="<?=$nLangId?>">
										  <input name="hdnParentId" type="hidden" id="hdnParentId" value="<?=$nParentId?>">
										  <input name="hdnSearch" type="hidden" id="hdnSearch" value="<?=$strSearch?>">
                                          <input name="hdnPage" type="hidden" id="hdnPage" value="<?=$intPage?>">
									<?
									//--------------Checking for right---------------------
										$objAdminUser->m_intUserId=$_SESSION['intUserId'];
										$objAdminUser->m_objRoles->m_intRightId=21;
										if($objAdminUser->CheckRightForAdmin()==1)
										{
									?>
										  <input src="Images/btn_delete.gif" title="Delete Page" border="0" height="32" type="image" width="32" value="Delete" onClick="return confirm('Are you sure to delete this page, sub pages will be also deleted?')">
								 <? }else{print "&nbsp;";}?>
                                 </td>
									  </form>	
									  <form action="TranslatePage.php" method="post" name="frmTranslate">	
										<td width="25%" align="center" valign="middle" <?php if(!$MultiLangCheck){?>style="visibility:hidden"<?php }?>>
										
										  <input name="hdnPageId" type="hidden" id="hdnPageId" value="<?=$intPageId?>">
										  <input name="hdnLangId" type="hidden" id="hdnLangId" value="<?=$intLangId?>">
										  <input name="hdnParentId" type="hidden" id="hdnParentId" value="<?=$nParentId?>">
										  <input name="hdnSearch" type="hidden" id="hdnSearch4" value="<?=$strSearch?>">
                                          <input name="hdnPage" type="hidden" id="hdnPage4" value="<?=$intPage?>">
									<?
									//--------------Checking for right---------------------
										$objAdminUser->m_intUserId=$_SESSION['intUserId'];
										$objAdminUser->m_objRoles->m_intRightId=22;
										if($objAdminUser->CheckRightForAdmin()==1)
										{
									?>
									<input src="Images/btn_translate.gif" title="Translate Page Contents" border="0" height="32" type="image" width="32" value="Translate">
									<? 
								 		} else print "&nbsp;";
									?>
									   </td>
									  </form>
									</tr>
								</table>
								<?
								}
								else print "Static Page";
								?>
								</td>
							  </tr>
					<?php
							  $intRowCounter++;
							} //end if
						}//End for
					?>		
						<tr>
							<td colspan="6"><? print GeneralPaging($intPage,$intPageCount,$strQryStr);?></td>
						</tr>
					<?
					}
					else
					{
					?>
						<tr><td class='txt_red' align='center' colspan="8">No Record Found!</td></tr>
					<?
					}
					?>
				</table>
              </td>
            </tr>
            <tr>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
           </tr>
            <tr>
              <td colspan="2">&nbsp;</td>
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