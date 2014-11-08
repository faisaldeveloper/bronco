<?php
ob_start();
	session_start();
	include("Includes/Constants.php");
	require_once("Includes/Configuration.inc.php");	
	/////////// Initializing ////////////////////////////////////////////
	$nLeftPanWidth=0;
	$nRgtPanWidth=0;
	$nBodyPanWidth=0;
	$nRightPanel=0;
	$nTopPanel=0;
	$nLeftPanel=0;
	$nFooterPanel=0;

	/////////// Validation //////////////////////////////////////////////
	if($bInstallationCheck===true)	// Checking installation required
	{
		header("location:InstallStep1.php");
		exit;
	}
	include("Includes/FrontIncludes.php");	
	/////////// Validation //////////////////////////////////////////////
	if(!isset($_SESSION['intLangId']))	// Checking installation required
	{ 
		$_SESSION['intLangId'] = $objLanguage->GetDefaultLang();	//Setting Default Language
	}
	
///////////// Getting value /////////////////////////////////////////

	$intLangId=$_SESSION['intLangId'];
	$objPages->m_intLangId=$_SESSION['intLangId'];
	if(isset($_REQUEST['pagefrname']) && !empty($_REQUEST['pagefrname']))
	{
		$objPages->m_strPageUrl = $_REQUEST['pagefrname'];
		$rsPageDetail= $objPages->GetPageDetailByName();
	}	
	else
	{
	//echo $_REQUEST['PageType']."<hr>";	
		if(isset($_REQUEST['PageType'])  && !empty($_REQUEST['PageType']))
			$objPages->m_intPageType=$_REQUEST['PageType'];
		else	
			$objPages->m_nIsStartup=ACTIVE;
		$rsPageDetail=$objPages->GetPageDetail();
		
	}
	
/////////// Getting page content /////////////////////////////////////
	if($rsPageDetail)
	{
		$objPageDetail=mysql_fetch_object($rsPageDetail);
		$_REQUEST['PageId']=$objPageDetail->pkPageId;
		$objPages->m_intPageId=$objPageDetail->pkPageId;
		$strPageTitle = $objPageDetail->PageTitle;
		$strMetatagsDesc = $objPageDetail->MetatagsDesc;
		$strMetatagsKW = $objPageDetail->MetatagsKW;
		mysql_data_seek($rsPageDetail,0);
	}
	else
	{
		$rsPageDetail=$objPages->GetPages(0,0,CONST_PAGETYPE_DYNAMIC);
		if($rsPageDetail)
		{
			$objPageDetail=mysql_fetch_object($rsPageDetail);
			$_REQUEST['PageId']=$objPageDetail->pkPageId;
			$objPages->m_intPageId=$objPageDetail->pkPageId;
			$strPageTitle = $objPageDetail->PageTitle;
			$strMetatagsDesc = $objPageDetail->MetatagsDesc;
			$strMetatagsKW = $objPageDetail->MetatagsKW;
			mysql_data_seek($rsPageDetail,0);
		}
		else
		{
			print "No Page Found";
			exit;
		}	
	}
//////////// Getting theme detail ///////////////////////////////////
	$objTheme->m_nLangID=$_SESSION['intLangId'];
	$rsTheme = $objTheme->SelectActiveTheme();
	if($rsTheme!=false && mysql_num_rows($rsTheme)>0)
	{
		$objThemeDetail=mysql_fetch_object($rsTheme);
		$strHeader=$objThemeDetail->Header;
		//echo $strHeader;exit;
		//$strEmailHeader=$objThemeDetail->EmailHeader;
		$strFooter=$objThemeDetail->Footer;
		$nMenuePosition=$objThemeDetail->MenuePosition;
		$nTopMenuStyle=$objThemeDetail->TopMenuStyle;
		$nLeftMenuStyle=$objThemeDetail->LeftMenueStyle;
		$nMenuBGColor=$objThemeDetail->MnuBgColor;
		$strMenuBGImage=$objThemeDetail->MnuBgImage;
		$strMnuMouseOverColor=$objThemeDetail->MnuMouseOverColor;
		$nExtTabWidth=$objThemeDetail->ExtTabWidth;
		$nExtTabBorder=$objThemeDetail->ExtTabBorder;
		$nLeftPanWidth=$objThemeDetail->LeftPanWidth;
		$nRgtPanWidth=$objThemeDetail->RgtPanWidth;
	}
	else
	{
		$strHeader=$objTheme->arrNoThemeProps['Header'];
		$strFooter=$objTheme->arrNoThemeProps['Footer'];
		$nMenuePosition=$objTheme->arrNoThemeProps['MenuePosition'];
		$nLeftMenuStyle=$objTheme->arrNoThemeProps['LeftMenueStyle'];
		$nMenuBGColor=$objTheme->arrNoThemeProps['MnuBgColor'];
		$nExtTabWidth=$objTheme->arrNoThemeProps['ExtTabWidth'];
		$nExtTabBorder=$objTheme->arrNoThemeProps['ExtTabBorder'];
		$nLeftPanWidth=$objTheme->arrNoThemeProps['LeftPanWidth'];
	}
//Getting right panel modules ////////////////////////////////////////////////////
	$rsRightModules=$objPages->GetPageModule($nPosition=CONST_POS_RIGHT, $nStatus=1);
	if($rsRightModules!=false && mysql_num_rows($rsRightModules)>0)
		$nRightPanel=1;
//Getting footer links ///////////////////////////////////////////////////////////
	$rsFooterPages=$objPages->GetFooterPagesLink($nStatus=1);
	if($rsFooterPages!=false && mysql_num_rows($rsFooterPages)>0)
		$nFooterPanel=1;
// Getting menue position ////////////////////////////////////////////////////////
	if($nMenuePosition==CONST_TOP_MENU_POSTION)
		$nTopPanel=1;
	elseif($nMenuePosition==CONST_LEFT_MENU_POSTION)
		$nLeftPanel=1;
	elseif($nMenuePosition==CONST_BOTH_MENU_POSTION)
	{
		$nLeftPanel=1;
		$nTopPanel=1;
	}
	include("RuntimeCss.php");
//////////////////////////////////////////////////////////////////////////////////
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<LINK REL="SHORTCUT ICON" HREF="AdminArea/Images/favicon.ico">
<TITLE>
<?=$strSiteTitle."-".$strPageTitle?>
</TITLE>
<META NAME="description" CONTENT="<?=$strMetatagsDesc?>">
<META NAME="keywords" CONTENT="<?=$strMetatagsKW?>">
<script type="text/javascript" src="Script/JavaScript.js"></script>
<link href="Digitalspinners.css" rel="stylesheet" type="text/css">
<link href="cms.css" rel="stylesheet" type="text/css">
</head>
<body topmargin="0" leftmargin="0">

<table width="<?=$nExtTabWidth?>px" border="<?=$nExtTabBorder?>px" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td colspan="3">
     <div id='cssmenu'>
    <ul>
      
       <li class='active'><a href='http://konnectrecruitment.com.au/'><span>Bronco</span></a></li>
       <li><a href='http://truckplus.com.au/'><span>Truck Sales and Rental</span></a></li>
       
    </ul>
   </div>
    <div class="clear"></div>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="288px"><? include('Header.php');?></td>
          <td valign="bottom"><table width="<?=$nExtTabWidth-310?>px" border="0" cellspacing="0" cellpadding="0" align="left" style="margin-bottom:10px;">
              <tr class="toppanel">
                <td width="14"><img src="images/menu_left.jpg"></td>
                <td width="100%"><? include('TopPanel.php');?></td>
                <td width="14"><img src="images/menu_right.jpg"></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <? 
	  //} //End condition for top panel
	  ?>
  <tr>
    <?
		  if($nLeftPanel==1) //If Condition for left panel
		  {
		  ?>
    <td width="<?=$nLeftPanWidth?>px" valign="top"><? include('LeftPanel.php');?></td>
    <?
		  }//End if Condition for left panel
		  ?>
    <td <? if($nRightPanel==1 && $nLeftPanel==1) { echo "colspan='1' width=".($nExtTabWidth-($nRgtPanWidth+$nLeftPanWidth)); } elseif($nRightPanel==1) { echo "colspan='2' width=".($nExtTabWidth-$nRgtPanWidth); } elseif($nLeftPanel==1) { echo " colspan='2' width=".($nExtTabWidth-$nLeftPanWidth); } else echo " colspan='3'";//If Condition for colspan w.r.t left panel and rithpanel?> align="left" valign="top"><? //print ($nExtTabWidth-($nRgtPanWidth+$nLeftPanWidth))."=".$nExtTabWidth."-(".$nRgtPanWidth."+".$nLeftPanWidth.")";
		  include('PageBody.php');?></td>
    <?
		  if($nRightPanel==1) //If Condition for right panel
		  {
			$nModulePosition=CONST_POS_RIGHT;
		  ?>
    <td width="<?=$nRgtPanWidth?>px" valign="top"><?php include('PageModules.php');?></td>
    <?
		  }//End If Condition for right panel
		  ?>
  </tr>
  <tr><td>&nbsp;</td></tr>
  <tr>
    <td colspan="3" class="footer"><?php include('Footer.php');?></td>
  </tr>
</table>
<?php
	ob_end_flush(); 
	?>
</body>
</html>