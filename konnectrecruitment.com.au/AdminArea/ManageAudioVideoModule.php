<?php
require_once("../Includes/BackOfficeIncludesFiles.php");
//--------------Checking for right---------------------
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=296;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{
	//////////////////////Initialization//////////////////
	//echo $_REQUEST['rdoMedia']; exit;
	$rsGallery = $objFile->GetGallery();

	if (isset($_REQUEST['hdnModuleID']))
	{
		$strLable = "Update Gallery";
		if (!isset($_REQUEST['hdnModuleID']))
		{
			$_REQUEST['intMessage'] = 296;
		}	
		else
		{	
			$nGalleryID = $_REQUEST['hdnModuleID'];
			$nType = $_REQUEST['hdnModuleType'];
			$rsSql = $objFile->GetGalleryByIdAnyStatus($nGalleryID,$nType);
			if ($rsSql != false && mysql_num_rows($rsSql)>0)
			{
				$row = mysql_fetch_object($rsSql);
				$strName = $row->ModuleDesc;
				$nChk = $row->IsActive;
			}
		}
	}		
	else
		$strLable = "Add Gallery";
		////////Code if redirected by the server after validation///////////////
	if (isset($_REQUEST['txtName']))
		$strName = $_REQUEST['txtName'];
	//if (isset($_REQUEST['txtImagesPerRow']) && !empty($_REQUEST['txtImagesPerRow']))
//		$nImagesPerRow = $_REQUEST['txtImagesPerRow'];	
	if (isset($_REQUEST['chkActive']))
		$nChk = $_REQUEST['chkActive'];
		
	if(isset($_REQUEST['rdoMedia']))
		$nRdo = $_REQUEST['rdoMedia'];
	//if (isset($_REQUEST['hdnGalleryLayoutId']))
//		$nLayoutId = $_REQUEST['hdnGalleryLayoutId'];
}//End Right If
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="../Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?>Audio/Video Gallery<?=CONST_BACKOFFICE_TITLE_END?></title>




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
		<script src="../Script/JavaScript.js"></script>
		<script language="javascript">
		function checkrow(id)
		{
			id="chkImageGal_"+id;
		
			if(document.getElementById(id).checked==true)
				document.getElementById(id).checked=false;
			else
				document.getElementById(id).checked=true;
		}
		  function selectAll(f,n,v) 
		 {
			if(window.document.forms[1].chkAllUser.checked == true)
			{
				var chk   = ( v == null ? true : v );
				for (i = 0; i < f.elements.length; i++) 
				{
					if( f.elements[i].type == 'checkbox' && f.elements[i].name == n ) 
					{
						f.elements[i].checked = chk;
					}
				}
			}
			else
			{
				var chk   = false;
				for (i = 0; i < f.elements.length; i++) 
				{
					if( f.elements[i].type == 'checkbox' && f.elements[i].name == n ) 
					{
						f.elements[i].checked = chk;
					}
				}
			}	
		}
		function Validate(f)
		{
			if (f.txtName.value == "")
			{
				alert("Please enter name");
				f.txtName.focus();
				return false;
			}
			/*else if(parseInt(f.txtImagesPerRow.value)<1)
			{
				alert("Records per row should be greater than 0");
				f.txtImagesPerRow.focus();
				return false;
			}*/
			/*else if(isNaN(f.txtImagesPerRow.value))
			{
				alert("Records per row should be an integer value");
				f.txtImagesPerRow.focus();
				return false;
			}
			else if (f.hdnGalleryLayoutId.value == "")
			{
				alert("Please select layout");
				return false;
			}*/
		}
		function CheckCheckBox(f,chk)
		{
		
		
			if(document.getElementById(chk).checked==true)
				markAllRows('tablesForm');
			else
				unMarkAllRows('tablesForm');
		}
	  </script>
		  <table width="98%" border="0" align="center" cellpadding="2" cellspacing="0">
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
              <td>
                <table width="100%">
                    <tr>
                      <td width="4%"><img src="Images/icon_adio_video_32x32.png" alt="Image"/></td>
                      <td width="96%" valign="middle"><? if (isset($_REQUEST['hdnModuleID'])) {?><a href="ManageGallery.php"><span class="txtBld_ornge">Audio/Video Gallery</span></a>&nbsp;&gt;&gt;&nbsp;<span class="hdng_sandy">Edit Gallery</span><? }else{ ?><span class="hdng_sandy">Audio/video Gallery</span><? }?> </td>
                    </tr>
                </table>
			  </td>
            </tr>
            <tr>
              <td align="left">
			   <?
			//--------------Checking for right---------------------
				$objAdminUser->m_intUserId=$_SESSION['intUserId'];
				$objAdminUser->m_objRoles->m_intRightId=47;
				if($objAdminUser->CheckRightForAdmin()==1)
				{
				?>
			  <form name="form1" method="post" action="ManageAudioVideoModuleAction.php" onSubmit="return Validate(form1);">
			  
                <table width="99%"  border="0" cellspacing="2" cellpadding="2" align="center" class="TabBorderLightGreyBG">
                  <tr>
                    <td width="18%" class="txtBld_grn">Name<span class="txt_red">*</span></td>
                    <td colspan="2"><input name="txtName" type="text" id="txtName2" value="<?=$strName?>"></td>
                  </tr>
                 <?php /*?> <tr>
                    <td class="txtBld_grn">Records/Row</td>
                    <td colspan="2"><input name="txtImagesPerRow" type="text" id="txtImagesPerRow" value="<?=$nImagesPerRow?>"></td>
                  </tr><?php */?>
				  <?php 
					if($strLable!="Update Gallery")
					{
					?>
				  <tr>
				  	<td>
						Media Type
					</td>
					
				  	<td colspan="2">
						<input type="radio" name="rdoMedia" value="10" checked="<? if ($nRdo == 10) print "checked"; ?>"> Audio
						<input type="radio" name="rdoMedia" value="11" <? if ($nRdo == 11) print "checked"; ?> > Video
					</td>
				
				  </tr>
				  	<?php
					}
					?>
                  <tr>
                    <td class="txtBld_grn">Activate</td>
                    <td colspan="2"><input name="chkActive" type="checkbox" id="chkActive" value="1" <? if ($nChk == 1) print "checked"; ?>>
					</td>
                  </tr>
                  <tr>
                    <td>&nbsp;
					<input type="hidden" name="hdnGalleryID" value="<?=$nGalleryID?>">
					</td>
                    <td colspan="2">
					<input name="btnSubmit" type="submit" class="button" id="btnSubmit" value="<?=$strLable?>"> 
					<?
					if(isset($_REQUEST['hdnModuleID']))
					{
					?>
						<input name="btnCancel" id="btnCancel" type="button" value="Cancel" class="button" onClick="location.href='<?=$_SERVER['PHP_SELF']?>'">
					<?
					}
					?>
					</td>
                  </tr>
                </table>
              </form>
			  <?
			  }
			  else echo "&nbsp;";
			  ?>
              </td>
            </tr>
            <tr>
              <td align="center"><? include('../Includes/DisplayConfirmMessage.php');?>&nbsp;</td>
            </tr>
            <tr height="33">
              <td><table width="100%"  border="0" cellspacing="0" cellpadding="0">
				<tr>
                  <td valign="top"><form name="tablesForm" id="tablesForm" method="post" action="SetAudioVideoGalleryStatus.php">
                    <table width="100%"  border="0" cellspacing="0" cellpadding="2">
                      <tr class="TabHeading" height="25">
                        <td width="5%" align="center">
						<input type="checkbox" name="chkAllUser" onclick="selectAll(tablesForm,'chkImageGal[]');" value="1" />
						</td>
                        <td width="17%">Name</td>
                        <?php /*?><td width="18%">Records/Row</td><?php */?>
                      <?php /*?>  <td width="30%">Layout</td><?php */?>
                        <td width="30%">Status</td>
						<td>Type</td>
						<td align="center">Action</td>
                      </tr>
				 <? if ($rsGallery!=false && mysql_num_rows($rsGallery)>0) 
				 	{
						$nCount = 0;
						while ($row = mysql_fetch_object($rsGallery))
						{
							$nCount++;
				?>		
			  <tr id="cg" valign="middle" onclick="checkrow(<?=$row->pkModuleId?>);"
				<?php 
				if($nCount % 2 == 0)
				{
					echo "class='bg_ltGrey' onMouseOver=\"this.className='bg_rollOver'\" onMouseOut=\"this.className='bg_ltGrey'\""; 
				}
				else
				{
				echo " class='bg_ltGreen' onMouseOver=\"this.className='bg_rollOver'\" onMouseOut=\"this.className='bg_ltGreen'\"" ;
				}
			   ?>>                        <td height="37" class="brdr_dotedLt" align="center">
                        <input type="checkbox" name="chkImageGal[]" id="chkImageGal_<?=$row->pkModuleId?>" value="<?=$row->pkModuleId?>" onclick="checkrow(<?=$row->pkModuleId?>);">                        </td>
                        <td height="37" class="brdr_dotedRt"><?=$row->ModuleDesc?>&nbsp;</td>
                      <?php /*?>  <td height="37" class="brdr_dotedRt"><?=$row->ImagesPerRow?></td>
                        <td height="37" class="brdr_dotedRt"><?=$arrLayoutImage[$row->LayoutID][0]?></td><?php */?>
                        <td height="37" class="brdr_dotedRt"><? if ( $row->IsActive == ACTIVE) print "Active"; else print "InActive"; ?>						</td>
						 <td height="37" class="brdr_dotedRt"><? if ( $row->ModuleType == 10) print "Audio"; else print "Video"; ?>						
						 </td>
						 <td height="37" class="brdr_dotedRt">
							 <table width="100%"  border="0" cellspacing="0" cellpadding="2">
		     			  <tr id="cg" valign="middle">
                 <?
				//--------------Checking for right---------------------
					$objAdminUser->m_intUserId=$_SESSION['intUserId'];
					$objAdminUser->m_objRoles->m_intRightId=68;
					if($objAdminUser->CheckRightForAdmin()==1)
					{
				?>
					  <td height="37" valign="top">
                     <a href="ViewFilesList.php?hdnModuleID=<?=$row->pkModuleId?>&Type=<?=$row->ModuleType?>"><img src="Images/btn_add.gif"  title="Add Media" alt="View News" width="32" name="image2" height="32" border="0"></a>
                      </td>
				<?	}//End of right
				//--------------Checking for right---------------------
					$objAdminUser->m_intUserId=$_SESSION['intUserId'];
					$objAdminUser->m_objRoles->m_intRightId=276;
					if($objAdminUser->CheckRightForAdmin()==1)
					{
				?><td height="37" valign="top">
						  <? 
						  if ($row->IsActive == ACTIVE)
						  {
						  ?><? 
							$objAdminUser->m_objRoles->m_intRightId=276;
							if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
							{?>
							<a href="SetAudioVideoGalleryStatus.php?hdnStatus=<?=INACTIVE?>&hdnModuleID=<?=$row->pkModuleId?>"><img src="Images/btn_activate.gif"  title="Status Change" alt="" width="32" name="btnStatus" height="32" border="0"></a>
								<?
							}//End of right 
						}
						else
						{?>
							<? 
							$objAdminUser->m_objRoles->m_intRightId=277;
							if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
							{?>
							
							<a href="SetAudioVideoGalleryStatus.php?hdnStatus=<?=ACTIVE?>&hdnModuleID=<?=$row->pkModuleId?>"><img src="Images/btn_dActivate.gif"  title="Status Change" alt="" width="32" name="btnStatus" height="32" border="0"></a>

						<? }//end of right
						} ?>
					    </td>
					  <?
					  }
					  ?>
                       <? 
						$objAdminUser->m_objRoles->m_intRightId=279;
						if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
						{?><td height="37" valign="top" >
							<a href="ManageAudioVideoModule.php?hdnModuleID=<?=$row->pkModuleId?>&hdnModuleType=<?=$row->ModuleType?>"><img src="Images/btn_edit.gif"  title="Edit Gallery" alt="" width="32" name="btnEdit" height="32" border="0"></a>
						 </td><?
						 }//End of right
						 ?> 
						  <? 
							$objAdminUser->m_objRoles->m_intRightId=278;
							if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
							{?><td height="37" valign="top">
							<a href="SetAudioVideoGalleryStatus.php?hdnModuleID=<?=$row->pkModuleId?>&btnDelete=1"><img src="Images/btn_delete.gif"  title="Delete Gallery" alt="" width="32" name="btnDelete" height="32" border="0" onClick="return confirm('Are you sure to delete gallery?')"></a>
							</td><?
							}//End of right
					  ?>	
 			<? 			//}		  
					//}
				?>
                </tr>
                  </table>
						 </td>
                      </tr>
   			<? 			}		  
					}
					else {
			?>
					<tr><td colspan="5" align="center">No Record Found!</td></tr>			
			<? 			}  ?>

						 <tr height="32"><td colspan="5"><table width="100%"  border="0" cellspacing="0" cellpadding="2">
                       <tr>
                         <td width="33%" align="left" colspan="3">
							<? 
							 $objAdminUser->m_objRoles->m_intRightId=54;
							if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
							{?>
							<input name="btnAllActive" type="image" id="btnAllStatus" title="Status Change" value="<?=ACTIVE?>" src="Images/btn_activate.gif" width="32" height="32" >
							 <?
							 }//end of right
							 ?>
							 <? 
							 $objAdminUser->m_objRoles->m_intRightId=55;
							if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
							{?>
							 <input name="btnAll" type="image" id="btnAllStatus" title="Status Change" value="<?=INACTIVE?>" src="Images/btn_dActivate.gif" width="32" height="32">
							 &nbsp;
							 <?
							 }//End of right
							 ?>
							 <? 
							 $objAdminUser->m_objRoles->m_intRightId=56;
							if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
							{?>
	 						 <input name="btnAllDelete" id="btnAllDelete" type="image" title="Delete Gallery" onClick="return confirm('Are you sure to you want to delete gallery?');" value="1" src="Images/btn_delete.gif" width="32" height="32">
							 <?
							 }//End of right
							 ?>
						 </td>
                       </tr>
                     </table></td></tr>
                    </table>
                  </form></td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
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