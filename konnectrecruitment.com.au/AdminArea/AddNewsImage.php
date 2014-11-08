<?php
require_once("../Includes/BackOfficeIncludesFiles.php");
//--------------Checking for right---------------------
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=48;
$intModuleID=$_REQUEST['hdnModuleId'];

$strGalleryName = $objNews->GetGalleryName($intModuleID);
$strGalleryNewsTitle = $objNews->GetGalleryNewsName($intModuleID);

if($objAdminUser->CheckRightForAdmin()==1)
{
	if (!isset($_REQUEST['NewsId']))
	{
		header("location:ManageNews.php?intMessage=285&hdnModuleId=".$intModuleID);
		exit;
	}	
	/**
	Creating class objects
	**/
	$objNews=new clsNews();
	/**
	Initializing variables
	**/
	$strImageDesc = "";
	$intNewsId = "";
	$intLangId = $_SESSION['intLangId'];
	/**
	Coping data from query string
	**/
	if(isset($_REQUEST['NewsId']))
		$intNewsId = $_REQUEST['NewsId'];
	if(isset($_REQUEST['LangId']) && !empty($_REQUEST['LangId']))
		$intLangId = $_REQUEST['LangId'];
	else 
		$intLangId=$_SESSION['intLangId'];
	/**
	Transfering data to class varaibles
	**/
	$objNews->m_intEventId=$intEventId;
	$objNews->m_intLangId=$intLangId;
	$objNews->m_intNewsId = $intNewsId;
	$arrNewsImage  = $objNews->GetNewsImage();
	// end up upload dir testing 
	//File uploading usin ajax starts from here///////////////
	// Directory for file storing filesystem path
	$web_upload_dir = "../NewsFiles/"; //Directry where the files are uploaded
	//echo "|||".$web_upload_dir."|||";
	$objNews = new clsNews();
	$objNews->m_strNewsDir=$web_upload_dir;	
	if(isset($_REQUEST['txtImageDesc']))
	$strImageDesc = $_REQUEST['txtImageDesc'];
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?>Add News Image<?=CONST_BACKOFFICE_TITLE_END?></title>
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
     <script type="text/javascript" src="../Script/JavaScript.js" ></script>
		  <script language="javascript">
/* function sendForm(f)
{
	alert(f);
	f.submit();
} */
function jsUpload()
{    upload_field=window.document.Imageform.file;
//var nLangId=document.Imageform.hdnLangId.value;alert(nLangId);
	 var re_text = /\.mp3|\.jpeg|\.jpg|\.gif|\.txt|\.xml|\.zip/i;    
	 var filename = upload_field.value;
	 if(filename=="")
	 {
	 	alert("File name field is empty.");
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
	 }   
	 upload_field.form.submit();
	 document.getElementById('tdMsg').innerHTML = "uploading file...";  
	 upload_field.disabled = true;  
	 return true;
}		
	function GetFiles()
	{//AJAX_UPLOADED_FILES
		var nNewsId=document.Imageform.hdnNewsId.value;
		var nLangId=document.Imageform.hdnLangId.value;
		 getRecords("<? print AJAX_UPLOADED_NEWS_IMAGES;?>",'nNewsID:'+nNewsId+','+'nLangId:'+nLangId,'tdContents','','');
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
//alert(window.document.forms[2].chkCheckAll.value);
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
</script>
<script language="javascript" type="text/javascript">
	 function OnChange(f)
	 {
	 	//alert(f.lstLanguage.value);
		f.LangId.value=f.lstLanguage.value;
		 f.action="<?=$_SERVER['PHP_SELF']?>";
		 f.submit();
		 return true;
	 }
 </script>
 <br>
		  <table width="98%"  border="0" align="center" cellpadding="2" cellspacing="0">
		  <?
		  if($objAdminUser->CheckRightForAdmin()!=1)
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
              <td colspan="4"><a href="ManageNews.php?hdnModuleId=<?=$intModuleID?>"><span class="txtBld_ornge">News Manager</span></a> &gt;&gt; <span class="hdng_sandy">Add News Images (<?=$strGalleryName?> -&gt; <?=$strGalleryNewsTitle;?>)</span></td>
            </tr>
            <tr>
              <td align="right" class="hdng_sandy" colspan="4" height="6"></td>
            </tr>
			<tr>
			<form action="AddNewsImageAction.php" target="upload_iframe" method="post" enctype="multipart/form-data" name="Imageform"><td>
            	<table width="100%"  class="TabBorderLightGreyBG">
                	<tr><td>&nbsp;</td></tr>
                	<tr>
                    <td width="286" height="10" align="left" >
                        <span class="txtBld_grey" >Select Image:</span>	<input type="hidden" name="fileframe" value="true">	
                        <input name="hdnNewsId" type="hidden" id="hdnNewsId" value="<?=$intNewsId?>">				
                        <input name="file" type="file" id="file"  size="15">
                        <input type="hidden" name="hdnLangId" value="<?=$intLangId?>">
                        <input type="hidden" name="hdnEventId" value="<?=$intEventId?>"> 
						<input type="hidden" name="hdnModuleId" value="<?=$intModuleID?>"> 
                    </td>
                      <td width="269" nowrap class="txtBld_grey">Desc <span class="txt_red">*</span>:&nbsp;
                     <input name="txtImageDesc" type="text" size="20" value="<?=$strImageDesc?>"></td><td colspan="2" align="left" valign="middle" nowrap class="txtBld_grey">&nbsp;&nbsp;
                         <input name="Button" type="button" class="button" value="Add Image" onClick="return jsUpload()">
                        </td>
                     </tr>
                	<tr><td>&nbsp;</td></tr>
                </table>
            </td>
			</form></tr>	
			<tr><td colspan="6" height="6"></td>
			</tr>
			<tr>
					<td align="left" class="txtBld_grn" <?php if(!$MultiLangCheck){?>style="visibility:hidden"<?php }?>  colspan="5">
                    <form>
					<?php 
						if(isset($_REQUEST['lstLanguage']))
			  				$intLangId = $_REQUEST['lstLanguage'];
						else 
							$intLangId = $intLangId;
			  ?>
					    Search by language:                         
					        <select name="lstLanguage" onChange="return OnChange(this.form);">
                           <?php 
						   $arrLang = $objLang->GetLanguages();
						   if($arrLang != FALSE) 
						   { 
						     while($arrRecLang = mysql_fetch_object($arrLang))
							 {
						  ?>
                           <option value="<?=$arrRecLang->pkLangId?>" <?php if($arrRecLang->pkLangId == $intLangId) echo " selected"?>>
                           <?=$arrRecLang->LangDesc?>
                           </option>
                           <?php 
						    }
						  }
						  ?>
                      </select>						
                         <input name="NewsId" value="<?=$intNewsId?>" type="hidden"> 
						 	<input type="hidden" name="hdnModuleId" value="<?=$intModuleID?>"> 
						<input name="LangId" type="hidden" id="LangId">
                   </form>
                </td>
			</tr>
			<tr>
			  <td colspan="6" id="tdMsg" align="center"><? include('../Includes/DisplayConfirmMessage.php');?></td>
			</tr>
			<tr><td valign="top" colspan="5">
				<iframe name="upload_iframe" style="width: 400px; height: 100px;display:none" ></iframe>
				<table width="100%" cellpadding="2" cellspacing="0">
				  			<?
							if($arrNewsImage)
								if(mysql_num_rows($arrNewsImage)>0)
								{
								?>
				<tr>
					<td colspan="6" class="hdng_sandy"> Already Uploaded Images :			  
						<input name="hdnTdName" type="hidden" id="hdnTdName">			  
						<input name="hdnComboOptions" type="hidden" id="hdnComboOptions" value="1">			
					</td>
				  </tr>
						<?
                        }//end of if
                        ?>
				  <tr>
					<td colspan="6" id="tdContents">
			  <form action="DeleteNewsImage.php" method="post">
						<table width="100%" border="0" bordercolor="#99CCCC" class="TabBorderLightGreyBG">
							<?
							if($arrNewsImage)
								if(mysql_num_rows($arrNewsImage)>0)
								{
							?>
						  <tr>
				    <td colspan="6" class="txtBld_grey" height="2">&nbsp;
					<input name="chkCheckAll" type="checkbox" id="chkCheckAll" value="1" onClick="selectAll(this.form,'chkImageGal[]')">
							Select All</td>
				    </tr>
							<?
								}//end of if
							?>
					<tr>
							  <?php
							  
								//(CONST_TYPE_IMAGE)ajaxFileUploader
								if($arrNewsImage)
								{
								if(mysql_num_rows($arrNewsImage)>0)
								{
									$nCounter=1;
									$strPath=substr($_SERVER['PHP_SELF'],0,(strrpos($_SERVER['PHP_SELF'],'/')));
									$strPath=substr($strPath,0,(strrpos($strPath,'/')+1));
								    $strPath="http://".$_SERVER['HTTP_HOST'].$strPath."NewsFiles/";
									//print_r(mysql_fetch_array($arrNewsImage));
									while($objRow=mysql_fetch_object($arrNewsImage))
									{ 
										$nFileFound=1;
										$nDesFound=1;
										if($objRow->ImageDesc=="")
										{
										$nDesFound=0;
										 $strDesc="<span  class='txt_red'>No Description Found.</span>";
										}
										else 
										$strDesc=$objRow->ImageDesc;
										
										$strDefLangDesc=$objNews->GetDefaultDesc();
										//print_r($rowTemp);
								?>
										<td width="25%" align="left">
										<table width="42%" align="left">
										  <tr>
											<td align="center" colspan="3">
											  <? 
											  if(is_file($web_upload_dir.$objRow->ImageName))
											  {
											  list($width,$height,$type,$attr) = getimagesize($web_upload_dir.$objRow->ImageName);
										  ?>
									  <a  href='#' onClick="window.open('PreviewImage.php?id='+'<?=$web_upload_dir.$objRow->ImageName?>&width=<?=$width?>','','width=<?=$width+50?>,height=<?=$height+100?>')"><img src="../PhpThumb/phpThumb.php?src=<?=$web_upload_dir.$objRow->ImageName?>&h=50&w=120"></a><? }?>
                                      </td>
										  </tr>
										  <tr>
										    <td width="70%" nowrap colspan="3"><input type="checkbox" name="chkImageGal[]" id="chkImageGal[]" value="<?=$objRow->pkNewsImageId?>">
											<? if($nDesFound!=0){?>&nbsp;&nbsp;&nbsp;<span class="txtBld_grey">Desc:</span><? }?>
									        <?=$strDesc?></td>
									      </tr>
										  <tr>
											<td align="left" nowrap>
											<!--<form action="DeleteNewsImage.php" method="post">-->
											  <input name="hdnNewsImageID" value="<?=$objRow->pkNewsImageId?>" type="hidden">
											  <input name="hdnLangId" value="<?=$intLangId?>" type="hidden">
											   <input name="hdnNewImageName" value="<?=$objRow->ImageName?>" type="hidden">
                                               <input name="hdnNewsId" value="<?=$objRow->fkNewsId?>" type="hidden">
											   	<input type="hidden" name="hdnModuleId" value="<?=$intModuleID?>"> 
										  <? if($objRow->IsMain != "1")
											{?>
											<a href="SetNewsImgMain.php?nLangId=<?=$objRow->pkLangId?>&nNewsId=<?=$objRow->fkNewsId?>&nNewsImageID=<?=$objRow->pkNewsImageId?>&hdnModuleId=<?=$intModuleID?>">Set Main</a>
											<? 
											}else echo "<span class='txtBld_grey'>IS MAIN</span>";
											?>
                                            <!--</form>-->
                                            </td>
											<td>
											<!--<form action="TranslateNewsImageDesc.php" method="post">-->
											<a href="EditNewsImageDesc.php?NewsImgId=<?=$objRow->pkNewsImageId?>&NewsId=<?=$intNewsId?>&nImgId=<?=$objRow->fkNImageId?>&nLangId=<?=$objRow->pkLangId?>&strImageDesc=<?=$objRow->ImageDesc?>&hdnModuleId=<?=$intModuleID?>">Edit</a></td>
											<td>
											   <a href="TranslateNewsImageDesc.php?NewsImgId=<?=$objRow->pkNewsImageId?>&NewsId=<?=$intNewsId?>&nImgId=<?=$objRow->fkNImageId?>&nLangId=<?=$objRow->pkLangId?>&strImageDesc=<?=$strDesc?>&hdnModuleId=<?=$intModuleID?>">Translate</a>
                                            <!--</form>-->
                                            </td>
										  </tr>
							  </table></td>
							  <?
										if($nCounter%3==0)
											print "</tr><tr>";
										$nCounter++;	
									}
							  ?>	
						  </tr>
							  <? 		
								}}//end of if
								else
								{
								$nFileFound=0;
							  ?>
								  <tr>
									<td colspan="2" class="txt_red" align="center">No Image found</td>
								  </tr>
								  <tr>
								    <td colspan="2">&nbsp;</td>
						    </tr>
							  <?
								}
							  ?>
                          <tr>
                       		<td>
								  <?
                                  if($nFileFound==1)
                                  {
                                  ?>
                                    <input name="Submit" type="submit" class="button" value="Delete Selected">
                                <? }?>
                                </td>
                            </tr>
			  		  </table>
					</form>
					</td>
				  </tr>
			  </table>	
			</td>
			</tr>
			<?
			}
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