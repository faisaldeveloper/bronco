<?php
session_start();
include("Includes/FrontIncludes.php");
include("Includes/Labels.php");
$objPages = new clsPages();
$objLang  = new clsLanguage();
$objMenus = new clsMenues();
$arrMenus = $objMenus->GetMenuInfo();
if($arrMenus != FALSE)
{
	$arrRecMenus = mysql_fetch_object($arrMenus);
	$strMenuPostion = $arrRecMenus->MnuPosition;
	$strMenuBgColor = $arrRecMenus->MnuBgColor; 
	$strMenuBgImage = $arrRecMenus->MnuBgImage; 
}
else
{
	$strMenuPostion = "left";
	$strMenuBgColor = "#FFFFFF"; 
	$strMenuBgImage = ""; 
}

$intLangId = $_GET['LangId'];
$intPageId = $_GET['PageId'];
$objPages->m_intPageId = $intPageId;
$objPages->m_intLangId = $intLangId;
$arrPage = $objPages->GetPageById();
if($arrPage != FALSE)
{	
	$arrRecPage = mysql_fetch_object($arrPage);
	$strMoreInfo = stripslashes($arrRecPage->MoreInfo);
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>webace - Web Shop - News Details</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="description" content="">
<meta name="keywords" content="">

<link href="abeco.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
if($strMenuPostion == 'left')
{
?>
<table width="<?=$intExtTabWidth?>" border="<?=$intExtTabBorder?>" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2"><?php include("Header.php");?></td>
  </tr>
  <tr>
    <td width="<?=$intLeftPanWidth?>" align="left" valign="top"><?php include("LeftPanel.php");?></td>
    <td width="<?=($intExtTabWidth-$intLeftPanWidth)?>" align="left" valign="top"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top">
		<table width="100%"  border="0" cellspacing="0" cellpadding="2">
		  <tr>
			<td width="100%" colspan="2" class="hdng_grey"><?=$msgMoreInfo?></td>
		  </tr>
		  <tr>
			<td colspan="2"><?=$strMoreInfo?></td>
		  </tr>
		</table>		</td>
      </tr>
    </table></td>
  </tr>
  <tr align="left">
    <td colspan="2"><? include("Footer.php");?></td>
  </tr>
</table>
<?php
}// END IF OF MENU POSITION
else
{
?>

<!-- Table for Top Lnks -->

<table width="<?=$intExtTabWidth?>" border="<?=$intExtTabBorder?>" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><?php include("Header.php");?></td>
  </tr>
  <tr>
    <td align="center"><?php include("TopPanel.php")?></td>
  </tr>
  <tr>
    <td	 align="left" valign="top"><table width="<?=$intExtTabWidth?>" border="<?=$intExtTabBorder?>" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td width="140" valign="top" align="left"><?php include("CatPanel.php")?></td>
        <td width="<?=($intExtTabWidth-$intLeftPanWidth)?>" align="left" valign="top"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="left" valign="top">
                <table width="100%"  border="0" cellspacing="0" cellpadding="2">
                  <tr>
                    <td width="100%" colspan="2" class="hdng_grey"><?=$msgMoreInfo?></td>
                  </tr>
                  <tr>
                    <td colspan="2"><?=$strMoreInfo?></td>
                  </tr>
              </table></td>
            </tr>
        </table></td>
      </tr>
      <tr align="left">
        <td colspan="2"><? include("Footer.php");?></td>
      </tr>
    </table></td>
  </tr>
</table>
<?php 
} // END ELSE OF MENU POSTION
?>
</body>
</html>
