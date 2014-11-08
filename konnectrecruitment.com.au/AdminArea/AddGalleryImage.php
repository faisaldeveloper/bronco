<?php
require_once("../Includes/BackOfficeIncludesFiles.php");
if (isset($_REQUEST['hdnGalleryID']))
	$nGalleryID = $_REQUEST['hdnGalleryID'];
else
{
	header("location:ManageGallery.php?intMessage=285");
	exit;
}	
if (isset($_REQUEST['nLangID']))
{
	$nLangID = $_REQUEST['nLangID'];
}
$strGalleryName = $objGallery->GetGalleryName($nGalleryID);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?>Add Gallery Image<?=CONST_BACKOFFICE_TITLE_END?></title>
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
         <script language="javascript">
		 function Validate(f)
		 {
		 	if (f.txtImageDesc.value=="")
			{
				alert("Please enter description");
				f.txtImageDesc.focus();
				return false;
			}
			return true;
		 }
		 </script>
		  <table width="99%"  border="0" align="center" cellpadding="2" cellspacing="0">
            <tr>
              <td align="right"><a href="ManageGalleryImage.php?hdnModuleID=<?=$nGalleryID?>">&lt;&lt;Back</a></td>
            </tr>
            <tr>
              <td class="hdng_sandy">Add Picture Gallery (
                <?=$strGalleryName?>
                ) </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><form name="form1" method="post" action="AddGalleryImageAction.php" enctype="multipart/form-data" onSubmit="return Validate(form1);">
                <table width="99%"  border="0" align="center" cellpadding="2" cellspacing="0" class="TabBorderLightGreyBG">
                  <tr>
                    <td class="txtBld_grn">&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td width="29%" class="txtBld_grn"> Upload Picture:</td>
                    <td width="71%"><input name="flImage" type="file" id="flImage"></td>
                  </tr>
                  <tr>
                    <td class="txtBld_grn"> Image Desc:</td>
                    <td><input name="txtImageDesc" type="text" id="txtImageDesc" value="<?=$strDescription?>"></td>
                  </tr>
                  <tr>
                    <td class="txtBld_grn"> Active:</td>
                    <td><input name="chkActive" type="checkbox" id="chkActive" value="<?=ACTIVE?>" checked></td>
                  </tr>
                  <tr>
                    <td class="txtBld_grn"> Set Rank:</td>
                    <td>
             <?
				  $objGallery=new clsGallery();
				  $rsSelect=$objGallery->GetAllImagesRanks($nGalleryID);
				  $nMaxRank=$objGallery->GetLastImageRank($nGalleryID);
					$i=1;
					if($rsSelect)
					while($row=mysql_fetch_array($rsSelect))
					{
						  $arrtemp[$i]=$row["ImageRank"];$i++;
					}
					?>
						 <select name="cmbRank" id="cmbRank">
					 <?
						for($i=1;$i<=$nMaxRank+10;$i++)
						if(!array_search($i,$arrtemp))
						{
							?><option value="<?=$i?>"><?=$i?></option><?
						}?>
						</select>					</td>
                  </tr>
                  <tr>
                    <td>
					<input type="hidden" name="hdnGalleryID" value="<?=$nGalleryID?>">					</td>
                    <td><input name="Submit" type="submit" class="button" value="Submit"></td>
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
