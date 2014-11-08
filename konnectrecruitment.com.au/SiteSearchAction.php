<?php
session_start();
include("Includes/FrontIncludes.php");
include("Includes/Labels.php");
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
$strSearch = $_REQUEST['txtSearch'];
$strSearch1 = strtolower($_REQUEST['txtSearch']);
$strSearch2 = strtoupper($_REQUEST['txtSearch']);
$iLanguageId = $_SESSION['intLangId'];
$arrNewsResult = SearchInNews($strSearch,$iLanguageId);
$arrArticlesResult = SearchInArticles($strSearch,$iLanguageId);
$arrPagesResult = SearchInPages($strSearch,$iLanguageId);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>webace - Web Shop - Search Results </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="description" content="">
<meta name="keywords" content="">

<link href="abeco.css" rel="stylesheet" type="text/css">
</head>

<body>
<!-- Table for Top Lnks -->
<table width="<?=$intExtTabWidth?>" border="<?=$intExtTabBorder?>" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><?php include("Header.php");?></td>
  </tr>
  <tr>
    <td align="center"><?php include("TopPanel.php")?></td>
  </tr>
  <tr>
    <td	 align="left" valign="top"><table width="100%"  border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td width="731" align="left" valign="top">
            <table width="100%"  border="0" cellspacing="0" cellpadding="2">
              <tr>
                <td class="hdng_yellow"><?=$msgSearchResults?></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="left" valign="top">
				<?php
				$intSerachCheck = FALSE;
				if($arrNewsResult != FALSE)
				{
				$intSerachCheck = TRUE;
				while($arrNewsRec = mysql_fetch_object($arrNewsResult))
				{
					if(strpos($arrNewsRec->LongDesc,$strSearch) > -1)
						$strSearchResults = $arrNewsRec->LongDesc;
					else if(strpos($arrNewsRec->LongDesc,$strSearch1) > -1)
						$strSearchResults = $arrNewsRec->LongDesc;
					else if(strpos($arrNewsRec->LongDesc,$strSearch2) > -1)
						$strSearchResults = $arrNewsRec->LongDesc;
					else if(strpos($arrNewsRec->ShortDesc,$strSearch) > -1)
						$strSearchResults = $arrNewsRec->ShortDesc;
					else if(strpos($arrNewsRec->ShortDesc,$strSearch1) > -1)
						$strSearchResults = $arrNewsRec->ShortDesc;
					else if(strpos($arrNewsRec->ShortDesc,$strSearch2) > -1)
						$strSearchResults = $arrNewsRec->ShortDesc;
					else
						$strSearchResults = $arrNewsRec->NewsTitle;
				
					
					$strSrcPos = strpos($strSearchResults,$strSearch);
					$strSrcPos1 = strpos($strSearchResults,$strSearch1);
					$strSrcPos2 = strpos($strSearchResults,$strSearch2);
					if($strSrcPos > -1 || $strSrcPos1 > -1 || $strSrcPos2 > -1) 
					{
						if($strSrcPos >-1) $iSrcPos=strpos($strSearchResults,$strSearch);
						else if($strSrcPos1 >-1) $iSrcPos=strpos($strSearchResults,$strSearch1);
						else if($strSrcPos2 >-1) $iSrcPos=strpos($strSearchResults,$strSearch2);
						if($iSrcPos > 10) $intStrartPos = $iSrcPos-10;
						else $intStrartPos = 0;
						$strLeft = substr($strSearchResults,$intStrartPos,$iSrcPos);
						$strRight = substr($strSearchResults,$iSrcPos,30);
						$strComplete = $strLeft."&nbsp;<b>".$strSearch."</b>&nbsp;".$strRight;
						$intFirstSpace =  strpos($strComplete," ");
						if($intFirstSpace < 0 ) $intFirstSpace = 0;
						$intLastSpace =  strrpos($strComplete," "); 
						if($intLastSpace < 0 ) $intLastSpace = strlen($strComplete);
						$strFinal = substr($strComplete,$intFirstSpace,30);
						if(strlen($strSearchResults) > 250)
							$strParaGraph = substr($strSearchResults,0,250);	
						else
							$strParaGraph = $strSearchResults;
						if(strrpos($strParaGraph," ") > -1)	
							$FinalParaGraph = substr($strParaGraph,0,strrpos($strParaGraph," "));
						else 
							$FinalParaGraph = substr($strParaGraph,0);
						?>
						<table width="100%">
							<tr>
								<td valign="top" class="txt_Bld_black"><a href="NewsDetail.php?NewsId=<?=$arrNewsRec->pkNewsId?>&intLangId=<?=$arrNewsRec->pkLangId?>"><?=$strFinal?></a></td>
							</tr>
							<tr>
								<td valign="top"><?=$FinalParaGraph?></td>
							</tr>
						</table>
						<?php	
					}
				}
				}
				
				if($arrArticlesResult != FALSE)
				{
				$intSerachCheck = TRUE;
				while($arrArticlesRec = mysql_fetch_object($arrArticlesResult))
				{
					if(strpos($arrArticlesRec->LongDesc,$strSearch) > -1)
						$strSearchResults = $arrArticlesRec->LongDesc;
					else if(strpos($arrArticlesRec->LongDesc,$strSearch1) > -1)
						$strSearchResults = $arrArticlesRec->LongDesc;
					else if(strpos($arrArticlesRec->LongDesc,$strSearch2) > -1)
						$strSearchResults = $arrArticlesRec->LongDesc;
					else if(strpos($arrArticlesRec->ShortDesc,$strSearch) > -1)
						$strSearchResults = $arrArticlesRec->ShortDesc;
					else if(strpos($arrArticlesRec->ShortDesc,$strSearch1) > -1)
						$strSearchResults = $arrArticlesRec->ShortDesc;
					else if(strpos($arrArticlesRec->ShortDesc,$strSearch2) > -1)
						$strSearchResults = $arrArticlesRec->ShortDesc;
					else
						$strSearchResults = $arrArticlesRec->ArticlesTitle;
				
					
					$strSrcPos = strpos($strSearchResults,$strSearch);
					$strSrcPos1 = strpos($strSearchResults,$strSearch1);
					$strSrcPos2 = strpos($strSearchResults,$strSearch2);
					if($strSrcPos > -1 || $strSrcPos1 > -1 || $strSrcPos2 > -1) 
					{
						if($strSrcPos >-1) $iSrcPos=strpos($strSearchResults,$strSearch);
						else if($strSrcPos1 >-1) $iSrcPos=strpos($strSearchResults,$strSearch1);
						else if($strSrcPos2 >-1) $iSrcPos=strpos($strSearchResults,$strSearch2);
						if($iSrcPos > 10) $intStrartPos = $iSrcPos-10;
						else $intStrartPos = 0;
						$strLeft = substr($strSearchResults,$intStrartPos,$iSrcPos);
						$strRight = substr($strSearchResults,$iSrcPos,30);
						$strComplete = $strLeft."&nbsp;<b>".$strSearch."</b>&nbsp;".$strRight;
						$intFirstSpace =  strpos($strComplete," ");
						if($intFirstSpace < 0 ) $intFirstSpace = 0;
						$intLastSpace =  strrpos($strComplete," "); 
						if($intLastSpace < 0 ) $intLastSpace = strlen($strComplete);
						$strFinal = substr($strComplete,$intFirstSpace,30);
						if(strlen($strSearchResults) > 250)
							$strParaGraph = substr($strSearchResults,0,250);	
						else
							$strParaGraph = $strSearchResults;
						if(strrpos($strParaGraph," ") > -1)	
							$FinalParaGraph = substr($strParaGraph,0,strrpos($strParaGraph," "));
						else 
							$FinalParaGraph = substr($strParaGraph,0);
						?>
						<table width="100%">
							<tr>
								<td valign="top" class="txt_Bld_black"><a href="ArticlesDetail.php?ArticlesId=<?=$arrArticlesRec->pkArticlesId?>&LangId=<?=$arrArticlesRec->pkLangId?>"><?=$strFinal?></a></td>
							</tr>
							<tr>
								<td valign="top"><?=$FinalParaGraph?></td>
							</tr>
						</table>
						<?php	
					}
				}
				}
				
				if($arrPagesResult != FALSE)
				{
				$intSerachCheck = TRUE;
				while($arrPagesRec = mysql_fetch_object($arrPagesResult))
				{
					if(strpos($arrPagesRec->PageContents,$strSearch) > -1)
						$strSearchResults = $arrPagesRec->PageContents;
					else if(strpos($arrPagesRec->PageContents,$strSearch1) > -1)
						$strSearchResults = $arrPagesRec->PageContents;
					else if(strpos($arrPagesRec->PageContents,$strSearch2) > -1)
						$strSearchResults = $arrPagesRec->PageContents;
					else
						$strSearchResults = $arrPagesRec->PageTitle;
				
					
					$strSrcPos = strpos($strSearchResults,$strSearch);
					$strSrcPos1 = strpos($strSearchResults,$strSearch1);
					$strSrcPos2 = strpos($strSearchResults,$strSearch2);
					if($strSrcPos > -1 || $strSrcPos1 > -1 || $strSrcPos2 > -1) 
					{
						if($strSrcPos >-1) $iSrcPos=strpos($strSearchResults,$strSearch);
						else if($strSrcPos1 >-1) $iSrcPos=strpos($strSearchResults,$strSearch1);
						else if($strSrcPos2 >-1) $iSrcPos=strpos($strSearchResults,$strSearch2);
						if($iSrcPos > 10) $intStrartPos = $iSrcPos-10;
						else $intStrartPos = 0;
						$strLeft = substr($strSearchResults,$intStrartPos,$iSrcPos);
						$strRight = substr($strSearchResults,$iSrcPos,30);
						$strComplete = $strLeft."&nbsp;<b>".$strSearch."</b>&nbsp;".$strRight;
						$intFirstSpace =  strpos($strComplete," ");
						if($intFirstSpace < 0 ) $intFirstSpace = 0;
						$intLastSpace =  strrpos($strComplete," "); 
						if($intLastSpace < 0 ) $intLastSpace = strlen($strComplete);
						$strFinal = substr($strComplete,$intFirstSpace,30);
						if(strlen($strSearchResults) > 250)
							$strParaGraph = substr($strSearchResults,0,250);	
						else
							$strParaGraph = $strSearchResults;
						if(strrpos($strParaGraph," ") > -1)	
							$FinalParaGraph = substr($strParaGraph,0,strrpos($strParaGraph," "));
						else 
							$FinalParaGraph = substr($strParaGraph,0);
						?>
						<table width="100%">
							<tr>
								<td valign="top" class="txt_Bld_black"><a href="index.php?PageId=<?=$arrPagesRec->pkPageId?>"><?=$strFinal?></a></td>
							</tr>
							<tr>
								<td valign="top"><?=$FinalParaGraph?></td>
							</tr>
						</table>
						<?php	
					}
				}
				}
				if(!$intSerachCheck) echo "<span class='txt_red'>No Result Found !</span>";
				?></td>
              </tr>
          </table></td>
		  <TD width="53" align="right" valign="top"><?php include("SiteSearch.php")?></TD>
        </tr>
    </table></td>
  </tr>
  <tr align="left">
    <td><? include("Footer.php");?></td>
  </tr>
</table>
</body>
</html>
