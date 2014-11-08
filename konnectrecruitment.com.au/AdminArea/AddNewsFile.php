<?php
require_once("../Includes/BackOfficeIncludesFiles.php");
//--------------Checking for right---------------------
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=162;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{
	/**
	Server Side Validation
	**/
	if(!isset($_REQUEST['NewsId']))
	{
		header("location:ManageNews.php?intMessage=377");
		exit;
	}
	/**
	Initializing variables
	**/
	$intNewsId = "";
	/**
	Getting values from Query string
	**/
	$intModuleID=$_REQUEST['hdnModuleId'];
	$strGalleryName = $objNews->GetGalleryName($intModuleID);
	$strGalleryNewsTitle = $objNews->GetGalleryNewsName($intModuleID);
	if(isset($_REQUEST['NewsId']))
		$intNewsId = $_REQUEST['NewsId'];
		
	if(isset($_REQUEST['intMessage']))
	{
		$objCMessage=new clsConfirmMessage();
		$objCMessage->m_intConfMsgId=$_REQUEST['intMessage'];
		$rsCMessage=$objCMessage->GetMessage_BackOffice();
	}
}//End Right If
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?>Add News File<?=CONST_BACKOFFICE_TITLE_END?></title>
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
		<script type="text/javascript" src="../Script/JavaScript.js" ></script>
		<script language="javascript" >
		function jsUpload()
		{    
			upload_field=window.document.frmNewsFile.file;
		
			 var re_text = /\.mp3|\.jpeg|\.jpg|\.gif|\.csv|\.xls|\.doc|\.txt|\.xml|\.zip/i;    
			 var filename = upload_field.value;
			 if(filename=="")
			 {
				alert("File name field is empty.");
				return false;
			} 
			 /* Checking file type */    
			 if (filename.search(re_text) == -1)
			 {        
				alert("File type is not valid");        
				upload_field.form.reset();        
				return false;    
			 }    
			 upload_field.form.submit();
			 document.getElementById('tdMsg').innerHTML = "uploading file...";    
			 upload_field.disabled = true;  
			 return true;
		}		
		function GetFiles()
		{
			var NewsId=document.frmNewsFile.hdnNewsId.value;
			 getRecords("<? print AJAX_UPLOADED_NEWS_FILES;?>",'nNewsID:'+NewsId,'tdContents','','');
			 document.getElementById('file').disabled = false;    
			 document.getElementById('file').form.reset();        
		}
		
		function selectAll(f,n,v) 
		{
			
			if(window.document.forms[1].chkCheckAll.checked == true)
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
        <br>
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
              <td><a href="ManageNews.php?hdnModuleId=<?=$intModuleID?>"><span class="txtBld_ornge">News Manager</span></a>&nbsp;&gt;&gt;&nbsp;<span class="hdng_sandy">Add News File (<?=$strGalleryName?> -&gt; <?=$strGalleryNewsTitle;?>) </span> </td>
            </tr>
            <tr><td height="6"></td></tr>
            <tr>
              <td align="center">
              <form action="AddNewsFileAction.php?hdnModuleId=<?=$intModuleID?>" method="post" name="frmNewsFile" enctype="multipart/form-data" target="upload_iframe">
                  <table width="70%"  border="0" cellpadding="2" cellspacing="0" class="TabBorderLightGreyBG">
                    
                    <tr>
                      <td align="right" class="txtBld_grn">&nbsp;</td>
                      <td align="left">&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="36%" align="left" class="txtBld_grn"><input type="hidden" name="fileframe" value="true">
                        Select File&nbsp;&nbsp;&nbsp;</td>
                      <td width="64%" align="left"><input name="file" type="file" id="file"></td>
                    </tr>
                    <tr>
                      <td>
                        <input type="hidden" name="hdnNewsId" value="<?=$intNewsId?>">
                        </td>
                      <td align="left"><input name="Submit" type="button" class="button" value="Upload" onClick="return jsUpload()"></td>
                    </tr>
                    <tr>
                      <td align="left" colspan="2" height="6"></td>
                    </tr>
                </table>
              </form></td>
            </tr>
			<tr align="center"> 
				<td colspan ='3' valign ='bottom' id="tdMsg" align="center"><? include('../Includes/DisplayConfirmMessage.php');?>&nbsp;</td>
		    </tr>
				<?
				$rs = $objNews->GetNewsFiles($intNewsId);
				if($rs)///////////If any record set returned .
				{
				?>
				<tr>
					<td colspan="6" class="hdng_sandy"> Already Uploaded Files :</td>
				</tr>
				<?
				}//End of if
				?>
			<tr><td id="tdContents">
			<form name="frmFiles" id="frmFiles" action="DeleteNewsFile.php" method="post">
			<input type="hidden" name="hdnNewsId" value="<?=$intNewsId?>">
					 <table width="100%" align="left" cellpadding="0" cellspacing="0" class="TabBorderLightGreyBG">
			<tr>
				<td colspan="10">
				<input name="chkCheckAll" id="chkCheckAll" type="checkbox" value="1" onClick="selectAll(frmFiles,'chkImageGal[]')">
				Select All
                </td>
			</tr>
						  <?
						  	$IconsDirectory="../Images/";
						  	if($rs)
							if(mysql_num_rows($rs)>0)
							{
							?>
							 	<tr>
							<?
								$nCounter=0;
								while($objRow=mysql_fetch_object($rs))
								{
								$nFileFound=1;
								$nCounter+=1;	 
								$strNewsFileName = $objRow->FileName;
								
								
								$strFName = explode('_',$strNewsFileName);
								$nFileNameLen=strlen($strFName[0]);
								$nFileNameLen = $nFileNameLen+1;
								$strFileName =substr($strNewsFileName, $nFileNameLen); 
														
								$ext=substr($objRow->FileName, -3, 3);
								if($ext=="txt")
								{
									$extImage="icon_txt.jpg";
								}else if($ext=="xls")
								{
									$extImage="icon_excel.jpg";
								}else if($ext=="pdf")
								{
									$extImage="icon_pdf.jpg";
								}else if($ext=="doc")
								{
									$extImage="icon_doc.jpg";
								}else 
									$extImage="";
						  ?>
								<td width="25%" align="left">
								<table width="25%" cellpadding="0" cellspacing="0" >
					  <tr align="left" valign="middle">
									  <td><input name="chkImageGal[]" type="checkbox" id="chkImageGal_<?=$objRow->pkNewsFileId?>" value="<?=$objRow->pkNewsFileId?>">
                                      </td>	
									  <td colspan="3"><img src="<?=$IconsDirectory.$extImage?>"&w=100></td>
									  <td>
										<?   
											echo $strNewsFileName;
										?>
									  </td>
								  </tr>
								</table>
								</td>
					  <?			
								if($nCounter%4==0)
									print "</tr><tr>";
							}//End of while 
					  }//end of if
					  else
					  	echo "<td align=center class='txt_red'>No File Found.</td>";
					  ?>
					  </tr>
					  <tr>
					  <?
					  if($nFileFound==1)
					  {
					  ?><td>
					    <input name="Submit" type="submit" class="button" value="Delete Selected"></td>
					<? }
					 else
					  echo "<td align=center class='txt_red'>No File Found.</td>";?>
					  </tr>
					  <tr>
						<td align="center" valign="middle" colspan="3">&nbsp;
						<input type="hidden" name="hdnModuleId" value="<?=$intModuleID?>">
						</td>
					  </tr>
					</table>
					</form>
			   </td></tr>
		   <tr style="display:none">
					<td> 
				  		<iframe name="upload_iframe" style="width: 400px; height: 100px; display:none"></iframe> 
					</td>
			</tr>
				<tr>
					<td >
					<input name="hdnTdName" type="hidden" id="hdnTdName">			  
					<input name="hdnComboOptions" type="hidden" id="hdnComboOptions" value="1">		
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