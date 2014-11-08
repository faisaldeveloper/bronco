<?php
include("../Includes/BackOfficeIncludesFiles.php");
	$nLang = 0;
	$strDesc = $_REQUEST['strImageDesc'];
	$npkId = $_REQUEST['npkId'];//echo "|||".$npkId;
	$nLangId = $_REQUEST['nLangId'];
	$nfkImgId=$_REQUEST['NewsImgId'];//echo "|||".$nfkImgId;
	$intNewsId=$_REQUEST['NewsId'];
	$intModuleID = $_REQUEST['hdnModuleId'];
	//print_r($_REQUEST);
	$objNews=new clsNews();
	$nDefaultLang = $objLang->GetDefaultLang();
	$objNews->m_intLangId = $nDefaultLang;
	$objNews->m_intDescpkId=$npkId;
	$objNews->m_intNewsImageId = $nfkImgId;
	$row=$objNews->SelectNewsImageDescById($_SESSION['intLangId']);
	if(isset($row))
	$tempDesc=$row->ImageDesc;
	//echo $tempDesc."|||||||||";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?>Edit News Image Description<?=CONST_BACKOFFICE_TITLE_END?></title>
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
				alert("Error! Image description field empty.");
				f.txtDescripton.focus();
				return false;
			}
			else return true;
		  }
		 </script>
		  <table width="99%"  border="0" align="center" cellpadding="2" cellspacing="0">
		  
            <tr>
              <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <td width="76%" align="left"><a href="ManageNews.php"><span class="txtBld_ornge">Manage News</span></a>&nbsp;&gt;&gt;&nbsp;<a href="AddNewsImage.php?npkId=<?=$_REQUEST['npkId'];?>&NewsId=<?=$_REQUEST['NewsId'];?>&NewsImgId=<?=$_REQUEST['NewsImgId'];?>&nLangId=<?=$_REQUEST['nLangId'];?>&strImageDesc=<?=$_REQUEST['strImageDesc'];?>"><span class="txtBld_ornge">Add News Images</span></a>&nbsp;&gt;&gt;&nbsp;<span class="hdng_sandy">Edit News Image Description</span></td>
              
              <td width="5%" align="right">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="3"><form name="form1" method="post" action="EditNewsImageDescAction.php" onSubmit="return Validate(this)">
                  <table width="88%"  border="0" align="center" cellpadding="0" cellspacing="2" class="TabBorderLightGreyBG">
					
                    <tr>
                      <td align="right" class="txtBld_grn" id='trDesc2'>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="37%" align="left" class="txtBld_grn" id='trDesc'>Image Description</td>
                      <td width="63%"><input name="txtDescripton" type="text" id="txtDescripton" size="35" value="<?=$tempDesc?>">                        </td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td><input name="Submit" type="submit" class="button" value="Save">
						  <input name="hdnId" type="hidden" id="hdnId" value="<?=$npkId?>">
						  <input type="hidden" name="hdnNewsId" value="<?=$intNewsId?>">
						  <input name="hdnfkImgId" type="hidden" id="hdnpkId" value="<?=$nfkImgId?>">
                          <input name="hdnLangId" type="hidden" id="hdnLangId" value="<?=$nDefaultLang?>">
                          <input name="hdnDefaultLangId" type="hidden" id="hdnDefaultLangId" value="<?=$nDefaultLang?>">
						  <input name="hdnModuleId" type="hidden" id="hdnModuleId" value="<?=$intModuleID?>">
						  </td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                  </table>
              </form></td>
            </tr>
            <tr>
              <td colspan="3">&nbsp;</td>
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
