<?
	include("../Includes/BackOfficeIncludesFiles.php");
//--------------Checking for right---------------------
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=253;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{
	$rsTheme = $objTheme->Select();
	$rsThemeForCopy = $objTheme->Select();
}	
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?>Theme Manager<?=CONST_BACKOFFICE_TITLE_END?></title>
<script language="javascript" type="text/javascript">
function Validate(f)
{
	if(f.lstTheme.value=="")
	{
		alert("Please select theme");
		return false;
	}
	else
	{
		alert('Are you sure you want to copy styles of this theme');
		return true;
	}
}
</script>
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
              <td class="txtBld_ornge">You are not authorised to view this page. <a href="<?=$_SERVER['HTTP_REFERER']?>"><< Back </a></td>
            </tr>
			<?
			}
			else {
			?>		  
		  <tr>
			<td>
                <table width="100%">
                    <tr>
                      <td width="5%"><img src="Images/icon_theme_32x32.jpg" alt="Image"/></td>
                      <td width="95%" valign="middle"><span class="hdng_sandy">Theme Manager</span></td>
                  </tr>
                </table>
            </td>
		  </tr>
	<?
	//--------------Checking for right---------------------
		$objAdminUser->m_intUserId=$_SESSION['intUserId'];
		$objAdminUser->m_objRoles->m_intRightId=259;
		if($objAdminUser->CheckRightForAdmin()==1)
		{
		?>
		  <tr>
			<td align="right">
            	<a href="AddTheme.php">Add Theme</a>
            </td>
		  </tr>
		  <?
		  }
		  ?>
			<tr>
			   <td colspan="2"><? include('../Includes/DisplayConfirmMessage.php');?></td>
			</tr>
  <?
  if($rsTheme != FALSE)
	{
  ?>
  <tr>
    <td><table width="100%"  border="0" cellspacing="0" cellpadding="2">
      <tr>
        <td width="6%" class="TabHeading">Sr. No. </td>
        <td width="23%" class="TabHeading">Theme Name </td>
        <td width="10%" class="TabHeading">Styles</td>
        <td width="21%" class="TabHeading">Copy Styles From </td>
        <td colspan="4" align="center" class="TabHeading">Action</td>
        </tr>
	<?
	    $sr=1;	
		$intRowCount=0;
		while($rowTheme=mysql_fetch_object($rsTheme))
		{
			$intId=$rowTheme->pkThemeID;
			$intActive=$rowTheme->IsActive;
	?>
      <tr id="cg" valign="middle" 
				<?php 
				if($intRowCounter % 2 == 0)
				{
					echo "class='bg_ltGrey' onMouseOver=\"this.className='bg_rollOver'\" onMouseOut=\"this.className='bg_ltGrey'\""; 
				}
				else
				{
				echo " class='bg_ltGreen' onMouseOver=\"this.className='bg_rollOver'\" onMouseOut=\"this.className='bg_ltGreen'\"" ;
				}
			   ?>>
        <td class="brdr_dotedLt"><?=$sr?></td>
        <td class="brdr_dotedRt"><?=$rowTheme->ThemeName?></td>
        <td class="brdr_dotedRt">
				<?
	//--------------Checking for right---------------------
		$objAdminUser->m_intUserId=$_SESSION['intUserId'];
		$objAdminUser->m_objRoles->m_intRightId=260;
		if($objAdminUser->CheckRightForAdmin()==1)
		{
		?>
		<a href="ManageStyles.php?hdnThemeId=<?=$intId?>" title="Manage Styles for Theme">Styles</a></td>
			<?  }else{print "&nbsp;";}?>
        <td class="brdr_dotedRt" nowrap="nowrap" align="center" valign="middle">
		<?
	//--------------Checking for right---------------------
		$objAdminUser->m_intUserId=$_SESSION['intUserId'];
		$objAdminUser->m_objRoles->m_intRightId=255;
		if($objAdminUser->CheckRightForAdmin()==1)
		{
           if($rsThemeForCopy != FALSE && mysql_num_rows($rsThemeForCopy)>1)
		   {
		?>
		<form action="CopyStyles.php" method="post" name="frmCopy" id="frmCopy">
          <select name="lstTheme" id="lstTheme">
		<?
			while($rowThemeCopy=mysql_fetch_object($rsThemeForCopy))
			{
				if($intId != $rowThemeCopy->pkThemeID)
				{
		?>
			<option value="<?=$rowThemeCopy->pkThemeID?>"><?=$rowThemeCopy->ThemeName?></option>		
		<?
				}//end of IF for ID Check
			}//end oF While
		?>
          </select>
          <input name="hdnThemeId" type="hidden" id="hdnThemeId" value="<?=$intId?>">
		  <input name="Submit" type="submit" class="button" value="Copy" onClick="return Validate(frmCopy);">
		</form>
		<?
			}//end of IF for the Recordset Check
			else
				echo "Only one theme exists";
			mysql_data_seek($rsThemeForCopy,0);
		}else{print "&nbsp;";}?>
		&nbsp;</td>
        <td align="center" class="brdr_dotedRt">
	<?
//--------------Checking for right---------------------
	$objAdminUser->m_intUserId=$_SESSION['intUserId'];
	$objAdminUser->m_objRoles->m_intRightId=254;
	if($objAdminUser->CheckRightForAdmin()==1)
	{
	?>
		<form name="frmActive" id="frmActive" method="post" action="ActivateTheme.php">
		<? if($intActive==1) { ?>
		<input type="image" name="btnActive" id="btnActive" src="Images/btn_activate.gif" title="Currently Active">
		  <? } else { ?>
		  <input name="btnDeActive" type="image" id="btnActive" src="Images/btn_dActivate.gif" width="32" height="32" title="Currently DeActive">
		  <? } ?>
          <input name="hdnThemeId" type="hidden" id="hdnThemeId" value="<?=$intId?>">
        </form>		
		<?  }else{print "&nbsp;";}?>
		</td>
        <td width="6%" align="center" class="brdr_dotedRt">
		<?
	//--------------Checking for right---------------------
		$objAdminUser->m_intUserId=$_SESSION['intUserId'];
		$objAdminUser->m_objRoles->m_intRightId=256;
		if($objAdminUser->CheckRightForAdmin()==1)
		{
		?>

			<form name="frmEdit" id="frmEdit" method="post" action="EditTheme.php">
			 <input name="btnEdit" type="image" id="btnEdit" src="Images/btn_edit.gif" width="32" height="32" title="Edit">
			 <input name="hdnId" type="hidden" id="hdnId" value="<?=$intId?>">
			</form>		
		<?  }else{print "&nbsp;";}?>
			</td>
        <td width="6%" align="center" class="brdr_dotedRt">
		<?
	//--------------Checking for right---------------------
		$objAdminUser->m_intUserId=$_SESSION['intUserId'];
		$objAdminUser->m_objRoles->m_intRightId=257;
		if($objAdminUser->CheckRightForAdmin()==1)
		{
		?>
			<form name="frmDelete" id="frmDelete" method="post" action="DeleteTheme.php">
			  <input name="btnDelete" type="image" id="btnDelete" onClick="return confirm('Are you sure you want to delete?');" src="Images/btn_delete.gif" width="32" height="32" title="Delete">
			 <input name="hdnId" type="hidden" id="hdnId" value="<?=$intId?>">
			</form>
			<?  }else{print "&nbsp;";}?>
			</td>
			<? if($MultiLangCheck)
			{ ?>
	        <td width="7%" align="center" class="brdr_dotedRt">
		<?
	//--------------Checking for right---------------------
		$objAdminUser->m_intUserId=$_SESSION['intUserId'];
		$objAdminUser->m_objRoles->m_intRightId=258;
		if($objAdminUser->CheckRightForAdmin()==1)
		{
		?>
			<form name="frmTrans" id="frmTrans" method="post" action="TranslateTheme.php">
			  <input name="btnTrans" type="image" src="Images/btn_translate.gif" title="Translate" height="32" width="32" >
			  <input name="hdnThemeID" type="hidden" id="hdnThemeID" value="<?=$intId?>">
			</form>
			<?  }else{print "&nbsp;";}?>
			</td>
			<? }?>
      </tr>
	 <?
	  	$intRowCount++;
		$sr++;
		}//end of while 
	 ?>
    </table></td>
  </tr>
  <?
  }//end of IF
  else
	echo "<tr><td class='txt_red' align='center'><br><br>No Record Found!</td></tr>";
  ?>
  <tr>
    <td>&nbsp;</td>
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