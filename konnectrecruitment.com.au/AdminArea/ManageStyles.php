<?php
include("../Includes/BackOfficeIncludesFiles.php");
//--------------Checking for right---------------------
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=260;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{
	///////// Validation ////////////////////////////
	if(!isset($_REQUEST['hdnThemeId']))
	{
		header('location:ManageTheme.php');
		exit;
	}
	//////////////////////////////////////////////////
	$intThemeId=$_REQUEST['hdnThemeId'];
	if($intThemeId !='')
	{
		$objTheme->m_intID=$intThemeId;
		$strThemeName = $objTheme->SelectThemeName();
	}
	$rsStyle = $objTheme->GetAllStyles($intThemeId);
}//End Right If
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?>Styles<?=CONST_BACKOFFICE_TITLE_END?></title>
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
		<table width="98%"  border="0" align="center" cellpadding="2" cellspacing="0">
		  <?
		  if($objAdminUser->CheckRightForAdmin()!=1)//Start Right If
			{
			?>
            <tr>
              <td class="txtBld_ornge" colspan="2">You are not authorised to view this page. <a href="<?=$_SERVER['HTTP_REFERER']?>"><< Back </a></td>
            </tr>
			<?
			}
			else {
			?>		  
  <tr>
    <td colspan="2"><a href="ManageTheme.php"><span class="txtBld_ornge">Theme Manager</span></a>&nbsp;&gt;&gt;&nbsp;<span class="hdng_sandy">Styles</span></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
   	<?         
		if(isset($_REQUEST['intMessage']))
		{
			$_SESSION['intLangId'] = $objLanguage->GetDefaultLang();	//Setting Default Language
			$objCMessage->m_intConfMsgId=$_REQUEST['intMessage'];
			$objCMessage = new clsConfirmMessage();
			$objCMessage->m_intConfMsgId=$_REQUEST['intMessage'];
			$rsCMessage=$objCMessage->GetMessage_BackOffice();
			if($rsCMessage!=FALSE)
			{
				$strRowCMessage=mysql_fetch_array($rsCMessage);
		?>
					<tr align="center">
					  <td colspan="2"  valign ='bottom' ><img src='../images/<?=$strRowCMessage['Image']?>'>&nbsp;
						  <? if($strRowCMessage['Indicator']==0){print "<span class='txt_grn'>".$strRowCMessage['ConfMsgDesc']."</span>";}else{print "<span class='txt_red'>".$strRowCMessage['ConfMsgDesc']."</span>";}?></td>
					</tr>
		<? 
			}
		}
		?>
  <tr>
    <td width="19%">Theme Name: </td>
    <td width="81%" class="txtBld_grey"><?=$strThemeName?></td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%"  border="0" cellspacing="0" cellpadding="2">
	<?
		if($rsStyle != FALSE)
		{
	?>
      <tr>
        <td width="16%" class="TabHeading">Sr. No. </td>
        <td colspan="2" class="TabHeading">Style</td>
        <td colspan="2" align="center" class="TabHeading">Action</td>
      </tr>
	  <?
		$intRowCount=0;
		$sr=1;
		while($rowStyle=mysql_fetch_object($rsStyle))
		{
			$intStyleId=$rowStyle->pkStyleId;
			$nPkId = $rowStyle->pkID;
			$objStyles->m_intStyleID=$intStyleId;
			$objStyles->m_intThemeID=$intThemeId;
			if($StyleColor=='')
				$StyleColor=999999;
	  ?>
			  <tr id="cg" valign="middle" 
				<?php 
				if($intRowCount % 2 == 0)
				{
					echo "class='bg_ltGrey' onMouseOver=\"this.className='bg_rollOver'\" onMouseOut=\"this.className='bg_ltGrey'\""; 
				}
				else
				{
				echo " class='bg_ltGreen' onMouseOver=\"this.className='bg_rollOver'\" onMouseOut=\"this.className='bg_ltGreen'\"" ;
				}
			   ?>>
				<td class="brdr_dotedLt"><?=$sr?></td>
				<td width="60%" class="brdr_dotedRt"><?=$rowStyle->Title?></td>
				<td width="14%" class="brdr_dotedRt">
				<?
				if(isset($rowStyle->pkID))
				{
				?>
					<a href="#" onClick="window.open('CSSPreview.php?hdnStyleId=<?=$rowStyle->pkID?>','Preview','width=550,height=500,scrollbars=1');">Preview</a></td>
				<?
				}else	print "Not set";
				?>	
					<td width="10%" align="center" class="brdr_dotedRt"><?
			//--------------Checking for right---------------------
				$objAdminUser->m_intUserId=$_SESSION['intUserId'];
				$objAdminUser->m_objRoles->m_intRightId=261;
				if($objAdminUser->CheckRightForAdmin()==1)
				{
				?>
<form name="frmEdit" id="frmEdit" method="post" action="EditCSSProps.php">
					  <input name="btnEdit" type="image" id="btnEdit" src="Images/btn_edit.gif" width="32" height="32">
					  </a>
                      <input name="hdnPkId" type="hidden" id="hdnPkId" value="<?=$nPkId?>">					  
                      <input name="hdnStyleId" type="hidden" id="hdnStyleId" value="<?=$intStyleId?>">
					  <input name="hdnThemeId" type="hidden" id="hdnThemeId" value="<?=$intThemeId?>">
					  </form>		
					  <?
					  }
					  else
					  print "&nbsp;";
					  ?> 
				 	</td>
			  </tr>
	  <?
			$intRowCount++;
			$sr++;
		}//end of while
	   }//end of IF
	   else
	   {
	   		echo "<tr><td>No! Record Found</td></tr>";
	   }
	  ?>
    </table></td>
  </tr>
			<?
				}//End Right If
			?>		  
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