<?php
require_once("../Includes/BackOfficeIncludesFiles.php");
//--------------Checking for right---------------------
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=68;

if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{//print_r($_REQUEST);exit;
	//////////////Object Creation ///////////////////////
	$objLang=new clslanguage();
	$objGallery = new clsGallery();
	//////////////////Server validation/////////////////
	if (!isset($_REQUEST['hdnModuleID']))
	{
		header("location:ManageGallery.php?intMessage=285");
		exit;
	}
	//////////////Variable Initialization/////////////////
	$nLangID=$_SESSION['intLangId'];
	$nGalleryID = "";
	$nLangID = "";
	$strGalleryName = "";
	////////////Geting values from the query string//////////////
	if(isset($_REQUEST['hdnModuleID']))
		$nGalleryID = $_REQUEST['hdnModuleID'];
	if(isset($_REQUEST['hdnLangId']))
		$nLangID = $_REQUEST['hdnLangId'];
	if(isset($_REQUEST['cmbLangId']))
	  $nLangID=$_REQUEST['cmbLangId'];
	else
	  $nLangID=$_SESSION['intLangId'];
	 /////////////Get gallery name ///////////////
	$strGalleryName = $objGallery->GetGalleryName($nGalleryID);
	$rsLang=$objLang->GetLanguages();
	//$MultiLangCheck = true;
	//File uploading usin ajax starts from here///////////////
	// Directory for file storing filesystem path
	$web_upload_dir = "../GalleryPictures/"; //Directry where the files are uploaded
	$objGallery->uploadDirectory=$web_upload_dir;	
}//End Right If
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?><?=CONST_BACKOFFICE_TITLE_END?></title>
     <script type="text/javascript" src="../Script/JavaScript.js" ></script>
		  <script language="javascript">
/* function sendForm(f)
{
	alert(f);
	f.submit();
} */
function jsUpload()
{    upload_field=window.document.Imageform.file;
	 var re_text = /\.mp3|\.jpeg|\.jpg|\.gif|\.txt|\.xml|\.zip/i;    
	 var filename = upload_field.value;
	 if(filename=="")
	 {
	 	alert("File Name field is Empty.");
		return false;
	} 
	if(window.document.Imageform.txtImageDesc.value=="")
	{
		alert("Image description field empty.");
		return false;
	}
	 /* Checking file type */    
	 if (filename.search(re_text) == -1)    {        
		alert("File does not have text(txt, xml, zip) extension");        
		upload_field.form.reset();        
		return false;    
	 }   //alert(window.document.Imageform.file.value);
	 upload_field.form.submit();
	 document.getElementById('tdMsg').innerHTML = "uploading file...";    
	 upload_field.disabled = true;  
	 return true;
}		
	function GetFiles()
	{//AJAX_UPLOADED_FILES
		var nLangId=document.form1.hdnLangId.value;
		var nModId=document.Imageform.hdnModuleID.value;
		 getRecords("<? print AJAX_UPLOADED_IMAGES;?>",'nModID:'+nModId+','+'nLangId:'+nLangId,'tdContents','','');
		 document.getElementById('file').disabled = false;
		 document.getElementById('file').form.reset(); 
		   
	}
	
 function Validate(f)
 {
	bCheck=false;
	for(i=0; i<window.document.forms[1].elements.length ;i++)
	{
		if( (window.document.forms[1].elements[i].type=="checkbox") && (window.document.forms[1].elements[i].checked==true) )	
			bCheck=true;
	}	
	if(bCheck==false)
	{
		alert("Please select at least one");
		return false;
	}
	return true;
 }

function selectAll(f,n,v) 
		 {
			if(window.document.forms[2].chkCheckAll.checked == true)
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
function ChangeLanguage(f)
{
	f.hdnLangId.value=f.cmbLangId.value;
}
function Active(val,f)
{
	if(val == 1)
	f.hdnSelStat.value=val;
	else 
	f.hdnSelStat.value=0;
	f.submit();
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
<table width="100%"  border="0" cellspacing="0" cellpadding="2">
		  <?
		  if($objAdminUser->CheckRightForAdmin()!=1)//Start Right If
			{
			?>
            <tr>
              <td class="txtBld_ornge" colspan="3">You are not authorised to view this page. <a href="<?=$_SERVER['HTTP_REFERER']?>">&lt;&lt; Back </a></td>
            </tr>
			<?
			}
			else {
			?>		  
            <tr>
              <td colspan="7"><a href="ManageGallery.php"><span class="txtBld_ornge">Manage Gallery</span></a>&nbsp;&gt;&gt;&nbsp;<span class="hdng_sandy">Manage Picture Gallery(<?=$strGalleryName?>)</span></td>
            </tr>
 	        <tr>
              <td align="right" class="hdng_sandy" colspan="7" >&nbsp;</td>
            </tr>
            <tr>
              <td  colspan="4" align="left" class="4" <?php if(!$MultiLangCheck){?>style="visibility:hidden"<?php }?>>
			  <form name="form1" method="post" action="ManageGalleryImage.php">
			  <table width="99%"  border="0">
                <tr <?php if(!$MultiLangCheck){?>style="visibility:hidden"<?php }?>>
                  <td width="28%" align="left" class="txtBld_grn">Select Language </td>
                  <td width="72%" colspan="3">
                        <select name="cmbLangId" id="cmbLangId" onChange="ChangeLanguage(this.form)">
                          <? while($strRowLang=mysql_fetch_array($rsLang)){?>
                          <option value="<?=$strRowLang['pkLangId']?>" <? if($nLangID==$strRowLang['pkLangId']){print "selected";}?>>
                          <?=$strRowLang['LangDesc']?>
                          </option>
                          <? }?>
                        </select>
						<input type="hidden" name="hdnModuleID" value="<?=$nGalleryID?>">
                        <input name="btnView" type="submit" class="button" id="btnView" value="View">
                        <input name="hdnLangId" type="hidden" id="hdnLangId" value="<?=$nLangID?>">                  </td>
                </tr>
              </table>
			  </form>			  </td>
              <td colspan="2" align="left" class="4" <?php if(!$MultiLangCheck){?>style="visibility:hidden"<?php }?>>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="7" align="right">&nbsp;</td>
            </tr>
           <script>//ChangeLanguage('form1');</script>
           
            <?  			
			  $objGallery->m_intLangId=$nLangID;
			  $intLangId = $objGallery->m_intLangId; 	  
			  $rsGallery=$objGallery->GetImageGalleryByLangId($nGalleryID);
			
	  ?> 	<form action="GalleryImageAction.php" target="upload_iframe" method="post" enctype="multipart/form-data" name="Imageform">
			<tr><td width="203" height="10" nowrap>
				<input type="hidden" name="fileframe" value="true">
				<input type="hidden" name="hdnModuleID" value="<?=$nGalleryID?>">
				<!--<input type="hidden" name="hdnLangId" value="<?=$nLangInLangID?>">-->
				<span class="txtBld_grey">Select Image:</span>		<input name="file" type="file" id="file"  size="25">
				
			</td>
			  <td width="56" class="txtBld_grey" nowrap>
			  Rank:
			  <?
				  //$objGallery=new clsGallery();
				  //echo $nGalleryID;
				    $nMaxRank=$objGallery->GetLastImageRank($nGalleryID);
					?>
              <select name="cmbRank" id="select">
                <?
						for($i=1;$i<=$nMaxRank+10;$i++)
						{
							?>
						<option value="<?=$i?>">
						<?=$i?>
						</option>
						<?
						}?>
              </select>              </td>
			  <td width="138" class="txtBld_grey" nowrap>Desc:
		      <input name="txtImageDesc" type="text" size="20"></td>
			  <td width="45" align="center" class="txtBld_grey">Active:
			    <input name="chkActive" type="checkbox" id="chkActive2" value="<?=ACTIVE?>" checked>		      </td>
			  <td width="103" align="left" valign="middle" nowrap class="txtBld_grey"><input name="Button" type="button" class="button" value="Add Image" onClick="return jsUpload()"></td>
			  <td width="1" align="left" valign="middle" nowrap class="txtBld_grey">&nbsp;</td>
			</tr>	
			</form>
			<tr><td valign="top" colspan="6">
				<iframe name="upload_iframe" style="width: 400px; height: 100px;display:none"></iframe>
				<table width="100%" cellpadding="2" cellspacing="0">
				  <tr>
					<td colspan="5" id="tdMsg" align="center">
						<? include('../Includes/DisplayConfirmMessage.php');?>
                        </td>
				  </tr>
					<?
					$objGallery->m_intModuleID=$nGalleryID;
					$objGallery->m_intLangId=$nLangID;
					$rs=$objGallery->SelectAllImages();
					if($rs != NULL)
						if(mysql_num_rows($rs)>0)
						{
						?>
				  <tr>
					<td colspan="5" class="txtBld_grey"> Uploaded Files:			  
						<input name="hdnTdName" type="hidden" id="hdnTdName">			  
						<input name="hdnComboOptions" type="hidden" id="hdnComboOptions" value="1">
                        </td>
				  </tr>
				  		<?
						}//End of inner if
						?>
				  <tr>
					<td colspan="5" id="tdContents">
					<form name="frmGalImage" action="GalleryImageAction.php" method="post" target="upload_iframe">
						<table width="100%">
							<tr><td>
							  <?php
							  //(CONST_TYPE_IMAGE)ajaxFileUploader
								if($rs != NULL)
								if(mysql_num_rows($rs)>0)
								{
									?><input name="chkCheckAll" type="checkbox" id="chkCheckAll" value="1" onClick="selectAll(this.form,'chkImageGal[]')">
							Select All</td></tr><tr>
							<?		$nCounter=1;
									$strPath=substr($_SERVER['PHP_SELF'],0,(strrpos($_SERVER['PHP_SELF'],'/')));
									$strPath=substr($strPath,0,(strrpos($strPath,'/')+1));
								    $strPath="http://".$_SERVER['HTTP_HOST'].$strPath."GalleryPictures/";
									while($objRow=mysql_fetch_object($rs))
									{
										//print_r($objRow);
										if(is_file($web_upload_dir.$objRow->ImageName))
										{
										$size = filesize($web_upload_dir.$objRow->ImageName);
										//echo $web_upload_dir;
										$humansize = humansize($size);
										}
								?>
										<td width="25%" align="left" valign="top">
										<table width="22%" align="left">
										  <tr align="left" valign="top">
											<td width="15%"><input type="checkbox" name="chkImageGal[]" id="chkImageGal[]" value="<?=$objRow->pkGImageId?>"></td><td valign="top">
											  <? 
											  $strFile = $objRow->ImageName;
											  if(is_file($web_upload_dir.$objRow->ImageName)){
											  list($width,$height,$type,$attr) = getimagesize($web_upload_dir.$objRow->ImageName);
								  ?>
									  <a  href='#' onClick="window.open('PreviewImage.php?id='+'<?=$web_upload_dir.$objRow->ImageName?>&width=<?=$width?>','','width=<?=$width+50?>,height=<?=$height+50?>')">
									  <img src="../PhpThumb/phpThumb.php?src=<?=$web_upload_dir.$objRow->ImageName?>&h=50&w=120"></a>
									
											 <?
											 }
											  ?>
										    </td>
										  </tr>
										  <tr>
										    <td align="right" class="txtBld_grey" >Status:</td>
										    <td>
											<?
											if($objRow->IsActive==1)
												echo "Active";
											else echo "Not Active";
											
											?></td>
									      </tr>
										  <tr>
											<td width="45%" align="right" class="txtBld_grey" >Rank:</td>
											<td width="55%"><?php print "".$objRow->ImageRank."";?></td>
										  </tr>
										  <tr>
										    <td align="right" class="txtBld_grey">Desc:</td>
										    <td ><?=$objRow->ImageDesc?></td>
									      </tr>
										  <tr>
											<td align="center" >
											<a href="EditGalleryImageDesc.php?id=<?=$objRow->pkGImageId?>&hdnpkId=<?=$objRow->pkId?>&hdnGalleryID=<?=$objRow->fkModuleID?>&strImgName=<?=$objRow->ImageName ?>&strDesc=<?=$objRow->ImageDesc?>&nModId=<?=$objRow->fkModuleID?>&Rank=<?=$objRow->ImageRank?>">Edit</a>											</td>
											<td><a href="TranslateGalleryImageDesc.php?id=<?=$objRow->pkGImageId?>&hdnpkId=<?=$objRow->pkId?>&hdnGalleryID=<?=$objRow->fkModuleID?>&strImgName=<?=$objRow->ImageName ?>">Translate</a>											</td>
										  </tr>
							  </table>							  </td>
							  <?			
										if($nCounter%4==0)
											print "</tr><tr>";
										$nCounter++;	
									}
							  ?>	
						  </tr><tr><td colspan="2"><input type="submit" name="btndelete" value="Delete Selected">
						      <input name="btnAllActive" type="image" id="btnAllStatus" title="Status Change" src="Images/btn_activate.gif" value="<?=ACTIVE?>" onClick="Active(1,this.form)" > 
							 <input name="btnAll" type="image" id="btnAllStatus" title="Status Change" src="Images/btn_dActivate.gif" value="<?=INACTIVE?>" onClick="Active(0,this.form)">&nbsp;
                             <input name="hdnSelStat" type="hidden" id="hdnSelStat">
</td>
						  </tr>
							  <? 		
								}
								else
								{
							  ?>
								  <tr>
									<td colspan="2" align="center" class="txt_red">No Image found</td>
								  </tr>
							  <?
								}
							  ?>
			  		  </table></form>					</td>
				  </tr>
			  </table>	
					</td>
		      <td width="12" valign="top">&nbsp;</td>
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