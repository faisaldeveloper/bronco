<?php
include("../Includes/BackOfficeIncludesFiles.php");
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=69;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{
//variables initialization
	$nGImageId="";
	$nId="";
	$nLangId="";
	$nGalleryID="";
	$strImgName="";
	$strDesc="";
	$nRank="";
	if(isset($_REQUEST['id']) || !empty($_REQUEST['id']))
	{
		$nGImageId=$_REQUEST['id'];
	}
	if(isset($_REQUEST['hdnpkId']) || !empty($_REQUEST['hdnpkId']))
	{
		$nId=$_REQUEST['hdnpkId'];
	}	
	if(isset($_REQUEST['hdnLangId']) || !empty($_REQUEST['hdnLangId']))
	{
		$nLangId=$_REQUEST['hdnLangId'];
	}	
	if(isset($_REQUEST['hdnGalleryID']) || !empty($_REQUEST['hdnGalleryID']))
	{
		$nGalleryID=$_REQUEST['hdnGalleryID'];
	}	
	if(isset($_REQUEST['strImgName']) || !empty($_REQUEST['strImgName']))
	{
		$strImgName=$_REQUEST['strImgName'];
	}	
	if(isset($_REQUEST['strDesc']) || !empty($_REQUEST['strDesc']))
	{
		$strDesc=$_REQUEST['strDesc'];
	}
	if(isset($_REQUEST['Rank']) || !empty($_REQUEST['Rank']))
	{
		$nRank=$_REQUEST['Rank'];
	}
}
else
	header("location:Error.php");//End Right If
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?>Update Gallery Image Description<?=CONST_BACKOFFICE_TITLE_END?></title>
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
		  function Validate(f)
		  {
			if(f.txtDescripton.value=="")
			{
				alert("Please enter confirmation message");
				f.txtDescripton.focus();
				return false;
			}
			else return true;
		  }
		  function InsertDesc(f)
		  {
		  	//alert(f.hdnlist.value);
			//apply here java script validation on the page
			if(f.hdnlist.length)
				f.txtDescripton.value=f.hdnlist[a].value;
			else f.txtDescripton.value=f.hdnlist.value;
		  }
		
		  </script>
		  <table width="99%"  border="0" align="center" cellpadding="2" cellspacing="0">
		  
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td align="left">&nbsp;<a href="ManageGallery.php"><span class="txtBld_ornge">Manage Gallery</span></a>&nbsp;&gt;&gt;&nbsp;<a href="ManageGalleryImage.php?hdnModuleID=<?=$nGalleryID?>"><span class="txtBld_ornge">Manage Gallery Picture</span></a>&nbsp;&gt;&gt;&nbsp;<span class="hdng_sandy">Edit Gallery Picture Description </span></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td align="center" class="txtBld_grn"><? include('../Includes/DisplayConfirmMessage.php');?>&nbsp;</td>
            </tr>
            <tr>
              <td><form name="TranslateImageGalDesc" method="post" action="EditGalleryImageDescAction.php" onSubmit="return Validate(this)">
                  <table width="88%"  border="0" align="center" cellpadding="0" cellspacing="2" class="TabBorderLightGreyBG">
                    <tr>
                      <td align="left" class="txtBld_grn">&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="37%" align="left" class="txtBld_grn">Image Description</td>
                      <td width="63%"><input name="txtDescripton" type="text" id="txtDescripton" size="35" value="<?=$strDesc?>">
                       		
                      </td>
                    </tr>
                    <tr><td>&nbsp;</td><td>
                    
						 <select name="cmbRank" id="cmbRank">
					 <?
						for($i=1;$i<=$nMaxRank+10;$i++)
						{
							?><option value="<?=$i?>" <? if($i==$nRank)echo "selected" ?>><?=$i?></option><?
						}
					?>
						</select>
                    </td></tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td><input name="Submit" type="submit" class="button" value="Edit">
						  <input type="hidden" name="id" value="<?=$_REQUEST['id']?>">
						  <input type="hidden" name="hdnpkId" value="<?=$_REQUEST['hdnpkId']?>">
						  <input type="hidden" name="hdnModId" value="<?=$_REQUEST['nModId']?>">
						  <input type="hidden" name="hdnGalleryID" value="<?=$nGalleryID?>">
						  <input type="hidden" name="strImgName" value="<?=$objRow->ImageName?>">
						  <input type="hidden" name="strDesc" value="<?=$objRow->ImageDesc?>">                       </td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                  </table>
              </form></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
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
