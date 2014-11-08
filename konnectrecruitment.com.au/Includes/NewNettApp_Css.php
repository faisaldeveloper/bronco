<?php
$rsTheme=$objTheme->SelectActiveTheme();
if($rsTheme != FALSE)
{
	$rowTheme=mysql_fetch_object($rsTheme);
	$intThemeId=$rowTheme->pkThemeID;
}

/////////////Intitializing Variables////////////////////////////////////
$BodyColor="666666";
$BodyBackGroudColor="F7F7F7";
$DefaultLinkVisitedActive="333333";
$DefaultLinkHover="999900";
$HeaderLink="AEAA7E";
$HeaderLinkActiveVisited="AEAA7E";
$HeaderLinkHover="CCCCCC";
$HeadingLinks="990000";
$HeadingLinksActiveVisited="990000";
$HeadingLinksHover="666666";
$LeftPanel="666666";
$LeftPanelActiveVisited="666666";
$LeftPanelHoverColor="FFFFFF";
$LeftPanelHoverBackground="666666";
$BodyHeading="333333";
$BodyHeadingActiveVisited="ffff00";
$BodyHeadingHover="FF6600";
$BodyBold="000000";
$BodyTextRed="333333";
$BodyTextGreen="999900";
$TableHeadColor="ffffff";
$TableHeadBackground="888888";
$TableHeadColor2="ffffff";
$TableHeadBackground2="666666";
$DarkRow="E9E8D7";
$LightRow="ffffff";
$TableBorder="CCCCCC";
$ButtonColor="000000";
$ButtonBackground="B8B685";
$Footer="999999";
$FooterActiveVisited="999999";
$FooterHover="333333";
$BlurBGColor="FFEC9D";
$ShadowBGColor="FFC03E";
$ContentBGColor="ffffff";
$ContentColor="000000";
$ContentBorderColor="FBA900";


////////////////////////////End of Intializing Variables///////////////////////////

////////////////////////////Start Values of Active Theme/////////////////////////////

$BodyColor=GetColor($intThemeId,1,$BodyColor);
$BodyBackGroudColor=GetColor($intThemeId,2,$BodyBackGroudColor);
$DefaultLinkVisitedActive=GetColor($intThemeId,3,$DefaultLinkVisitedActive);
$DefaultLinkHover=GetColor($intThemeId,4,$DefaultLinkHover);
$HeaderLink=GetColor($intThemeId,5,$HeaderLink);
$HeaderLinkActiveVisited=GetColor($intThemeId,6,$HeaderLinkActiveVisited);
$HeaderLinkHover=GetColor($intThemeId,7,$HeaderLinkHover);
$HeadingLinks=GetColor($intThemeId,8,$HeadingLinks);
$HeadingLinksActiveVisited=GetColor($intThemeId,9,$HeadingLinksActiveVisited);
$HeadingLinksHover=GetColor($intThemeId,10,$HeadingLinksHover);
$LeftPanel=GetColor($intThemeId,11,$LeftPanel);
$LeftPanelActiveVisited=GetColor($intThemeId,12,$LeftPanelActiveVisited);
$LeftPanelHoverColor=GetColor($intThemeId,13,$LeftPanelHoverColor);
$LeftPanelHoverBackground=GetColor($intThemeId,14,$LeftPanelHoverBackground);
$BodyHeading=GetColor($intThemeId,15,$BodyHeading);
$BodyHeadingActiveVisited=GetColor($intThemeId,16,$BodyHeadingActiveVisited);
$BodyHeadingHover=GetColor($intThemeId,17,$BodyHeadingHover);
$BodyBold=GetColor($intThemeId,18,$BodyBold);
$BodyTextRed=GetColor($intThemeId,19,$BodyTextRed);
$BodyTextGreen=GetColor($intThemeId,20,$BodyTextGreen);
$TableHeadColor=GetColor($intThemeId,21,$TableHeadColor);
$TableHeadBackground=GetColor($intThemeId,22,$TableHeadBackground);
$TableHeadColor2=GetColor($intThemeId,23,$TableHeadColor2);
$TableHeadBackground2=GetColor($intThemeId,24,$TableHeadBackground2);
$DarkRow=GetColor($intThemeId,25,$DarkRow);
$LightRow=GetColor($intThemeId,26,$LightRow);
$TableBorder=GetColor($intThemeId,27,$TableBorder);
$ButtonColor=GetColor($intThemeId,28,$ButtonColor);
$ButtonBackground=GetColor($intThemeId,29,$ButtonBackground);
$Footer=GetColor($intThemeId,30,$Footer);
$FooterActiveVisited=GetColor($intThemeId,31,$FooterActiveVisited);
$FooterHover=GetColor($intThemeId,32,$FooterHover);
$BlurBGColor=GetColor($intThemeId,33,$BlurBGColor);
$ShadowBGColor=GetColor($intThemeId,34,$ShadowBGColor);
$ContentBGColor=GetColor($intThemeId,35,$ContentBGColor);
$ContentColor=GetColor($intThemeId,36,$ContentColor);
$ContentBorderColor=GetColor($intThemeId,37,$ContentBorderColor);

/////////////////////////End Values of Active Themes/////////////////////////////////

echo 
"
<style type='text/css'>
body {
	font-family: Verdana, Geneva, Arial, helvetica, sans-serif;
	font-size: 11px;
	color: #".$BodyColor.";
	top:0px;
	left:100px;
	right:0px;
	bottom:0px;
	margin: 0px;
	background-color:#".$BodyBackGroudColor.";
	
}
a:link, a:active, a:visited {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #".$DefaultLinkVisitedActive.";
	text-decoration: none;
	font-weight:bold;
}
a:hover {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #".$DefaultLinkHover.";
	text-decoration: none;
	font-weight:bold;
}
.hdr_lnks{
	font-size: 11px;
	font-weight: normal;
	color: #".$HeaderLink.";
	font-weight:bold;
	text-decoration: none;
}
.hdr_lnks a:link, .hdr_lnks a:active, .hdr_lnks a:visited {
	font-size: 11px;
	font-weight: normal;
	color: #".$HeaderLinkActiveVisited.";
	font-weight:bold;
	text-decoration: none;
}
.hdr_lnks a:hover {
	font-size: 11px;
	font-weight: normal;
	color: #".$HeaderLinkHover.";
	font-weight:bold;
	text-decoration: none;
}
.hdg_lnks{
	font-size: 11px;
	font-weight: normal;
	color: #".$HeadingLinks.";
	text-decoration: none;
}
.hdg_lnks a:link, .hdg_lnks a:active, .hdg_lnks a:visited {
	font-size: 11px;
	font-weight: normal;
	color: #".$HeadingLinksActiveVisited.";
	text-decoration: none;
}
.hdg_lnks a:hover {
	font-size: 11px;
	font-weight: normal;
	color: #".$HeadingLinksHover.";
	text-decoration: underline;
}
.lft_pnl{
	font-size: 11px;
	font-weight: normal;
	color: #".$LeftPanel.";
	text-decoration: none;
}
.lft_pnl a:link, .lft_pnl a:active, .lft_pnl a:visited {
	font-size: 11px;
	font-weight: normal;
	color: #".$LeftPanelActiveVisited.";
	text-decoration: none;
}
.lft_pnl a:hover {
	font-size: 11px;
	font-weight: normal;
	color: #".$LeftPanelHoverColor.";
	text-decoration: underline;
	background-color:#".$LeftPanelHoverBackground.";
}
.bodyHeading {
	font-family: Verdana;
	font-size: 14px;
	color: #".$BodyHeading.";
	font-weight: bold;
}
.bodyHeading a:link, .bodyHeading a:active, .bodyHeading a:visited {
	font-size: 11px;
	font-weight: normal;
	color: #".$BodyHeadingActiveVisited.";
	font-weight:bold;
	text-decoration: none;
}
.bodyHeading a:hover {
	font-size: 11px;
	font-weight: normal;
	color: #".$BodyHeadingHover.";
	font-weight:bold;
	text-decoration: underline;
}
.body_Bold {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-weight: bold;
	color: #".$BodyBold.";
}
.body_txtred {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-weight: normal;
	color: #".$BodyTextRed.";
}
.body_txtgreen {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-weight: normal;
	color: #".$BodyTextGreen.";
}
.TabHead {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-weight: bold;
	color: #".$TableHeadColor.";
	background-color:#".$TableHeadBackground.";
	line-height:20px;
}
.TabHead2 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-weight: bold;
	color: #".$TableHeadColor2.";
	background-color:#".$TableHeadBackground2.";
}
.DarkRow{
	BACKGROUND-COLOR: #".$DarkRow.";
}
.LightRow{
	BACKGROUND-COLOR: #".$LightRow.";
}
IMG {
	BORDER-RIGHT: white 0px; BORDER-TOP: white 0px; BORDER-LEFT: white 0px; BORDER-BOTTOM: white 0px
}
.TabBorder {
	border: 1px solid #".$TableBorder.";
}
.Button{
	FONT-WEIGHT: bold;
	FONT-SIZE: 8pt;
	COLOR: #".$ButtonColor.";
	FONT-FAMILY: Verdana;
	background-color:#".$ButtonBackground.";
	border: 1pt solid #E2E2E2;
}
.footer {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #".$Footer.";
}
.footer a:link, .footer a:active, .footer a:visited {
	font-size: 10px;
	font-weight: normal;
	color: #".$FooterActiveVisited.";
	text-decoration: none;
}
.footer a:hover {
	font-size: 10px;
	font-weight: normal;
	color:#".$FooterHover.";
	text-decoration: underline;
}
.blur{
	background-color: #".$BlurBGColor."; 
	color: inherit;
	margin-left: 6px;
	margin-top: 6px;
	width:804px;
}
.shadow,
.content{
	position: relative;
	bottom: 2px;
	right: 2px;
}
.shadow{
	background-color: #".$ShadowBGColor."; 
	color: inherit;
}
.content{
	background-color: #".$ContentBGColor."; 
	color: #".$ContentColor."; 
	border: 1px solid #".$ContentBorderColor."; 
	padding: .04em 2ex;
}
</style>";
?>