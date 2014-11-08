<?php
	include("../Includes/BackOfficeIncludesFiles.php");
	$objLanguage = new clsLanguage();
	
	$_SESSION['intLangId'] = $objLanguage->GetDefaultLang();
	$objMessage=new clsMessages();//
	$objMessage->m_intLangId=$_SESSION['intLangId'];
	
	$objAdminUser1=new clsAdminUser();
	$objAdminUser1->m_objRoles=new clsRoles();
	$objAdminUser1->m_intUserId=$_SESSION['intUserId'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?>Control Panel<?=CONST_BACKOFFICE_TITLE_END?></title>
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
              <td width="10%" class="hdng_sandy" align="right"><img src="Images/icon_siteMgr_48x48.png" alt="Image CPanel"/></td>
              <td width="90%" valign="middle" class="hdng_sandy">Site Manager</td>
            </tr>
            <tr>
            	<td rowspan="3">&nbsp;</td>
              	<td height="16">Dear <span class="txtBld_grey"><?=$_SESSION['strDsUserName']?></span>, This is the <span class="txtBld_grey">site management consol</span>, from here you can easily</td>
            </tr>
            <tr>
              <td height="16">configure your website. This portion includes: sites’ global options, site theme manager and </td>
            </tr>
            <tr>
              <td height="16">other site text related tasks are performed here.</td>
            </tr>
            <tr><td height="6"></td></tr>
            <tr>
              <td>&nbsp;</td>
			<td width="100%">
		 	<?
			$nRightId = 0;
            $nCounter = 0;
			$nSecureLoop=0;
		 	foreach($arrSManagerLinks as $id=>$arrContents)
			{
				$nRightId = $id; 	//this is key of array as right Id 
				$strLinkTitle = $arrContents[0]; //this is link title 
				$strFileName = $arrContents[1]; //this is link file name
				$strImageFile = $arrContents[2]; //this is image file name 
				$strAltText = $arrContents[3]; //this is alt text

               	$objAdminUser1->m_objRoles->m_intRightId=$nRightId;
           	    if($objAdminUser1->CheckRightForAdmin()==1)
				{
				if($nCounter%5==0)
				{
					if($nCounter!=0)
					{
						echo "
								</tr>
								<tr>
									<td width='10' colspan='12'>&nbsp;</td>
								</tr>
							  	<tr align='left' valign='middle' height='10'>
								<td width='10' colspan='1'>&nbsp;</td>
							  ";
					 }
				}
				if($nCounter==0)
				{
            ?>
             <table border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#F5F5F5">
                <tr align="center" valign="middle" height="10">
                 <td width="10">&nbsp;</td>
                </tr>
                <tr align="left" valign="middle" height="10">
                 <td width="10" colspan="1">&nbsp;</td>
                 <?
				  }
				 ?>
                  <td width="100" valign="middle">
                  	<table align="left" class="brdr_SolidRound" height="85" onMouseOver="this.style.backgroundColor='#EEF2F9'; this.style.border= '1px solid #336699';" onMouseOut ="this.style.backgroundColor='#F5F5F5'; this.style.border= '1px solid #E5E5E5';" id="freight" onClick="window.open('<?=$strFileName?>', '_self'); ">
                      <tr>
                      	<td align="center"><img src="Images/<?=$strImageFile?>" alt="<?=$strAltText?>"/></td>
                      </tr>
                      <tr>
                      	<td width="100" align="center"><?=$strLinkTitle?></td>
                      </tr>
                    </table>                  </td>
                  <td width="10">&nbsp;</td>
					<?
						$nCounter ++;
						$nSecureLoop=1;
					   }
					}
				
                
				if($nSecureLoop=1)
				{
				?>
                </tr>
                <tr align="center" valign="middle" height="10">
                 <td width="10">&nbsp;</td>
                </tr>
              </table>
              <? } ?>
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