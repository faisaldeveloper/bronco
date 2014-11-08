<?php
/*include("../Includes/BackOfficeIncludesFiles.php");
*/?>
<?php
include("../Includes/BackOfficeIncludesFiles.php");
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=301;
if($objAdminUser->CheckRightForAdmin()==1)
{
/**
Creating class objects
**/
//$objNews = new clsNews();
//$objLang = new clsLanguage();

$intModuleID = $_REQUEST['hdnModuleID'];
$strGalleryName = $objFile->GetGalleryName($intModuleID);

//echo "Module id----in add news----".$pkModuleID; exit;
}
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?><?=CONST_BACKOFFICE_TITLE_END?></title>
<script src="../Script/validation.js" type="text/javascript"></script>
<script>
function Validate(f)
{
	if(f.txtFileTitle.value=="")
	{
		alert("Please Enter File Title!");
		f.txtFileTitle.focus();
		return false;
	}
	else if(f.txrShortDesc.value=="")
	{
		alert("Please Enter Short Description!");
		f.txrShortDesc.focus();
		return false;
	}
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
	<!-- InstanceBeginEditable name="body" -->`
    <table width="100%"  border="0" cellspacing="0" cellpadding="2">
    
	 <?
		  if($objAdminUser->CheckRightForAdmin()!=1)
			{
			?>
   		<tr>
        	<td class="txtBld_ornge">You are not authorised to view this page. <a href="<?=$_SERVER['HTTP_REFERER']?>"><< Back </a>
			</td>
      	</tr>
			<?
			}
			else {
			?>
        <tr>
        	<td><a href="ViewFilesList.php?hdnModuleID=<?=$intModuleID?>&Type=<?=$_REQUEST['Type']?>"><span class="txtBld_ornge">View File List</span></a>&nbsp;&gt;&gt;&nbsp;<span class="hdng_sandy">Add New File(<?=$strGalleryName?>)</span>
			</td>
        </tr>
	 	<tr>
			<td align="center"><? include('../Includes/DisplayConfirmMessage.php');?></td>
		</tr>
	 </table>  
		
		 <form action="AddFileAction.php" method="post" enctype="multipart/form-data" name="AddFileFrm" onSubmit="return Validate(this)">
		  <table width="80%"  border="0" align="center" cellpadding="2" cellspacing="0" class="TabBorderLightGreyBG">
            
			  <tr align="center">
              <td colspan="2" align="center" class="txtBld_blue" height="5"></td>
              </tr>
            <tr align="center">
              <td width="36%" align="right" class="txtBld_grn">File Title <span class="txt_red">*</span></td>
              <td align="left">
			  <input name="txtFileTitle" type="text" id="txtFileTitle" size="30" maxlength="30" value="<?=$_REQUEST['txtFileTitle']?>">
			  </td>
            </tr>
            
            <tr>
              <td align="right" class="txtBld_grn">Image</td>
              <td align="left">
			  <input name="chkIsAudio" type="hidden" id="chkIsAudio" value="<?=$_REQUEST['Type']?>" checked >
			  <input name="flImage" type="file" id="flImage"></td>
            </tr>
            <tr>
              <td align="right" class="txtBld_grn">File <span class="txt_red">*</span> </td>
              <td align="left">
			  	<input name="flVideoClip" type="file" id="flVideoClip" value=""></td>
            </tr>
			<tr align="center">
              <td align="right" class="txtBld_grn">Valid extensions</td>
              <td align="left">
				<?php
					if($_REQUEST['Type']==CONST_MODULE_AUDIO)
					{
						echo " mp3,wav,wma,WMA,ra,ram";
					}
					else
					{
						echo " mp3,avi,mov,wmv,mpeg,swf,m4a,rm,ram,mpg";
					}
				?>
			  </td>
              </tr>
            <tr>
              <td align="right" class="txtBld_grn">Short Description <span class="txt_red">*</span> </td>
              <td colspan="3" align="left">
			  <textarea name="txrShortDesc" id="txrShortDesc" ><?php echo $_REQUEST['txrShortDesc'];?></textarea></td>
              </tr>
            <tr>
              <td align="right" class="txtBld_grn">Long Description </td>
              <td colspan="3" align="left">
			  <textarea name="txrLongDesc" id="txrLongDesc"><?php echo $_REQUEST['txrLongDesc'];?></textarea></td>
            </tr>
            <tr>
              <td colspan="2" align="right" class="txtBld_grn" height="5"></td>
              </tr>
            <tr>
              <td align="right" class="txtBld_grn">&nbsp;</td>
              <td align="left">
			  	<input name="btnSave" type="submit" class="button" id="btnSave2" value="Save">                
				<input type="hidden" name="hdnModuleID" value="<?=$intModuleID?>">
              </td>
            </tr>
          </table>
		  <?
		  	}
		  ?>
		  </form>
	<!-- InstanceEndEditable -->
    </td>	
  </tr>
  <tr>
    <td colspan="2"><?php include("Footer.php");?></td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>