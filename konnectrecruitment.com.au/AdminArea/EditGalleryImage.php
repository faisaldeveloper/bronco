<?
require_once("../Includes/BackOfficeIncludesFiles.php");

	$intImageId = $_GET['id'];
	$hdnLangID = $_GET['LangId'];
	$nId=$_REQUEST['id'];
	$nGalleryID = $_REQUEST['nGalleryID'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?>Edit Gallery Image<?=CONST_BACKOFFICE_TITLE_END?></title>

<script>
function validate(f)
{
	if(f.flImage.value=="")
	{
		alert("Please browse the image");
		f.flImage.focus();
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
	<!-- InstanceBeginEditable name="body" -->
   <table width="99%"  border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
      <td align="left" class="hdng_sandy">Edit Picture</td>
    </tr>
    <tr>
      <td>
       <table width="98%"  border="0" align="center" cellpadding="2" cellspacing="0" class="TabBorderLightGreyBG">
            <tr align="right">
              <td><a href="ManageGalleryImage.php?hdnModuleID=<?=$nGalleryID?>&cmbLangId=<?=$hdnLangID?>">&lt;&lt;Back</a></td>
            </tr>
            <?
	  $objLang=new clsLanguage();
	  $rsLang=$objLang->GetLanguages();
	  $objGallery=new clsGallery();
	  $hdnLangID = $_GET['LangId'];
	  $objGallery->m_intLangId=$hdnLangID;
	  $objGallery->m_intGImageId=$intImageId;
	  $rsGallery=$objGallery->GetImageGalleryById();
	  $rsRows=$objGallery->GettotalImages($intImageId);
	  if ($rsRows != false && mysql_num_rows($rsRows))
	  $intRows=mysql_num_rows($rsRows);
	   $strRowGallery=mysql_fetch_array($rsGallery);
	  $iCheck=0;
	  ?>
            <tr align="left">
              <td>
                <?
		 if(isset($_GET['strMessage']))
		 {
		 	if($_GET['strMessage']=="Not Upload");
				print "Image not Uploaded";
		 }
		
		?></td>
            </tr>
            <tr>
              <td><form action="AddGalleryImageAction.php" method="post" enctype="multipart/form-data" name="form1" onSubmit="<? if(isset($iCheck) && $iCheck==1){ print $iCheck;}?> ">
                  <table width="100%"  border="0">
                    <tr align="left">
                      <td>&nbsp;</td>
                      <td><img src="../PhpThumb/phpThumb.php?src=../GalleryPictures/<? print "_".$strRowGallery['ImageName'];?>&w=100"> </td>
                    </tr>
                    <tr>
                      <td align="left" class="txtBld_grn">Image Desc</td>
                      <td><input name="txtImageDesc" type="text" id="txtImageDesc" value="<?=$strRowGallery['ImageDesc']?>" size="46"></td>
                    </tr>
                    <tr>
                      <td width="22%" align="left" class="txtBld_grn">Active</td>
                      <td width="77%"><input name="chkStatus" type="checkbox" id="chkStatus" value="" <? if($strRowGallery['IsActive']==1){print "checked";}?>></td>
                    </tr>
                    <tr>
                      <td align="left" class="txtBld_grn">Set Rank</td>
                      <td>                      
                       <?
					   $rsRanks=$objGallery->GetAllImagesRanks($nGalleryID);
					    $nMaxRank=$objGallery->GetLastImageRank($nGalleryID);
					   $i=1;
						if($rsRanks)
						while($row=mysql_fetch_array($rsRanks))
						{
						  	  $arrtemp[$i]=$row["ImageRank"];$i++;
						}
					 	?>
						 <h1>
					      <select name="cmbRank" id="cmbRank">
 					        <option value="<?=$strRowGallery['ImageRank']?>" selected>
 					        <?=$strRowGallery['ImageRank']?>
 					        </option>
					        <? for($i=1;$i<=$nMaxRank+10;$i++)
					 	if(!array_search($i,$arrtemp))
						{?>
					        <option value="<?=$i?>">
					        <?=$i?>
					        </option>
					        <? 
						}?>
						    </select>
					      <input name="hdnImageId" type="hidden" id="hdnImageId" value="<?=$strRowGallery['pkGImageId']?>">
					      <input name="hdnAction" type="hidden" id="hdnAction" value="Edit">
					      <input type="hidden" name="hdnLangID" value="<?=$hdnLangID?>">
						  <input type="hidden" name="hdnGalleryID" value="<?=$nGalleryID?>">
						   </h1></td>
						<td width="1%">&nbsp;                        </td>
                    </tr>
                    <tr>
                      <td align="right">&nbsp;</td>
                      <td><input name="Submit" type="submit" class="button" value="Update"></td>
                    </tr>
                  </table>
              </form></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
          </table>
        </td>
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
