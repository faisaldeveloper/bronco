<? 
require_once("../Includes/BackOfficeIncludesFiles.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?>Add New Gallery Picture<?=CONST_BACKOFFICE_TITLE_END?></title>
<script language="javascript">
function sendForm(f)
{
	alert(f);
	f.submit();
}
 function Validate(f)
 {
	if(f.flImage.value=="")
	{
		alert("Please select image");
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
          <table width="100%"  border="0" cellspacing="0" cellpadding="2">
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td align="left" class="hdng_sandy">Upload New Picture</td>
            </tr>
					<?
						$objLang=new clsLanguage();
						$rsLang=$objLang->GetLanguages();
						$objGallery=new clsGallery();
						$rsGallery=$objGallery->GettotalImages();
						if($rsGallery!= 0) $intRows=mysql_num_rows($rsGallery);
					
					?>
					<?
						if(isset($_GET['strMessage']))
						{
					?>
            <tr>
              <td align="center">&nbsp;&nbsp;
					<?
						if($_GET['strMessage']=="Not Upload");
						print "<span class='txt_red'>Image not Uploaded</span>";
						
					?>			  </td>
            </tr>
					<? 
						}
					?>
            <tr>
              <td><form action="AddNewGPictureAction.php" method="post" enctype="multipart/form-data" name="form1" onSubmit="return Validate(this)">
                  <table width="99%"  border="0" align="center" class="TabBorderLightGreyBG">
                    <tr <?php if(!$MultiLangCheck){?>style="visibility:hidden"<?php }?>>
                      <td align="right" class="txtBld_grn">&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr <?php if(!$MultiLangCheck){?>style="visibility:hidden"<?php }?>>
                      <td align="left" class="txtBld_grn">Set Language: </td>
                      <td><select name="cmbLangId">
                          <? while($strRowLang=mysql_fetch_array($rsLang)){?>
                          <option value="<?=$strRowLang['pkLangId']?>"
						 <?php if($strRowLang['pkLangId'] == $_SESSION['intLangId']) echo "selected"?>
						  >
                          <?=$strRowLang['LangDesc']?>
                          </option>
                          <? }?>
                      </select></td>
                    </tr>
                    <tr>
                      <td align="left" class="txtBld_grn">Upload Picture </td>
                      <td><input name="flImage" type="file" id="flImage" size="44"></td>
                    </tr>
                    <tr>
                      <td align="left" class="txtBld_grn">Image Desc: </td>
                      <td><input name="txtImageDesc" type="text" id="txtImageDesc" size="45"></td>
                    </tr>
                    <tr>
                      <td width="28%" align="left" class="txtBld_grn">Active</td>
                      <td width="72%"><input name="chkStatus" type="checkbox" id="chkStatus" value="checkbox"></td>
                    </tr>
                    <tr>
                      <td align="left" class="txtBld_grn">Set Rank: </td>
                      <td>
                        <?
 				  $objGallery=new clsGallery();
				  $rsSelect=$objGallery->GetAllImagesRanks();
				  $nMaxRank=$objGallery->GetLastImageRank();
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
						</select>                      </td>
                    </tr>
                    <tr>
                      <td align="right">&nbsp;</td>
                      <td><input name="Submit" type="submit" class="button" value="Upload"></td>
                    </tr>
                    <tr>
                      <td align="right">&nbsp;</td>
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
