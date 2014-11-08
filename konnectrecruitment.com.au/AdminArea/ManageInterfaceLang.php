<?php 
	require_once("../Includes/BackOfficeIncludesFiles.php");
//--------------Checking for right---------------------
	$objAdminUser=new clsAdminUser();
	$objAdminUser->m_objRoles=new clsRoles();
	$objAdminUser->m_intUserId=$_SESSION['intUserId'];
	$objAdminUser->m_objRoles->m_intRightId=26;
	if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
	{
		$rsLang = $objLanguage->GetLanguages();
	}	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?>Language Manager<?=CONST_BACKOFFICE_TITLE_END?></title>
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
          <table width="98%"  border="0" cellspacing="0" cellpadding="0" align="center">
  		  <?
		  if($objAdminUser->CheckRightForAdmin()!=1 || !$MultiLangCheck)
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
              <td><table width="100%"  border="0" cellspacing="0" cellpadding="2">
            <tr>
              <td colspan="3" align="left">
                <table width="100%">
                    <tr>
                      <td width="5%"><img src="Images/icon_language_32x32.jpg" alt="Image"/></td>
                      <td width="95%" valign="middle"><span class="hdng_sandy">Language Manager</span></td>
                  </tr>
                </table>
              </td>
            </tr>
			<tr><td colspan="3">&nbsp;</td></tr>
				<tr>
				   <td colspan="2" align="center"><? include('../Includes/DisplayConfirmMessage.php');?></td>
				</tr>
					<tr>
                	   <td colspan="1" class="txtBld_ornge" align="left">&nbsp;» <span class="txt_red">*</span>&nbsp;Shows Default Language.</td>
				<?
				//--------------Checking for right---------------------
					$objAdminUser->m_intUserId=$_SESSION['intUserId'];
					$objAdminUser->m_objRoles->m_intRightId=27;
					if($objAdminUser->CheckRightForAdmin()==1)
					{
				?>
	                  <td width="53%" align="right"><a href="AddInterfaceLang.php">Add new interface language</a></td>
				  <? }?>
					</tr>
			<?
			if(mysql_num_rows($rsLang)>0)
			{
			?>
            <tr>
              <td colspan="2"><table width="100%"  border="0" cellpadding="2" cellspacing="0">
                <tr class="TabHeading" height="25">
                  <td width="248" align="left">Language Name </td>
                  <td width="259" align="left">Image </td>
                  <td width="149" align="center" colspan="3">Action</td>
                  </tr>
                <? 
				$intRowCounter = 1;
				while($strRowLang=mysql_fetch_array($rsLang)){?>
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
                  <td align="left" class="brdr_dotedLt"><?=$strRowLang['LangDesc']?>
                    <?
					if($strRowLang['IsDefault']==1)
					{?>
					<span class="txt_red">*</span>
					<? }?></td>
                      <td align="left" class="brdr_dotedRt">		  
					  <?php if($strRowLang['LangFlag']=="")
					  		$strImage="image_not_found_large.jpg";
							else
							$strImage=$strRowLang['LangFlag']
						?>
		<img src="../PhpThumb/phpThumb.php?src=../LangFlags/<?=$strImage?>&w=60" border="0">	
			<? if($strRowLang['LangFlag']!="")
			{
			//--------------Checking for right---------------------
				$objAdminUser->m_intUserId=$_SESSION['intUserId'];
				$objAdminUser->m_objRoles->m_intRightId=29;
				if($objAdminUser->CheckRightForAdmin()==1)
				{
			?>
			<a href="DeleteLangImage.php?hdnLangID=<?=$strRowLang['pkLangId']?>"><img src="Images/btn_delete.gif" width="32" height="32"></a>
			<?
			}
			}
			else
			{
			//--------------Checking for right---------------------
				$objAdminUser->m_intUserId=$_SESSION['intUserId'];
				$objAdminUser->m_objRoles->m_intRightId=28;
				if($objAdminUser->CheckRightForAdmin()==1)
				{
			?>
			<a href="AddLangImage.php?nLangID=<?=$strRowLang['pkLangId']?>"><img src="Images/btn_add.gif" width="32" height="32"></a> <? }?></td>
			<? }?>
                  <td class="brdr_dotedRt"><table width="100%"  border="0" cellspacing="0" cellpadding="2">
                      <tr align="center">
                        <td width="33%" align="right">
						<?
						//--------------Checking for right---------------------
							$objAdminUser->m_intUserId=$_SESSION['intUserId'];
							$objAdminUser->m_objRoles->m_intRightId=30;
							if($objAdminUser->CheckRightForAdmin()==1)
							{
						?>
							  <form action="EditInterfaceLang.php" method="post">
								<input name="hdnLangId" type="hidden" id="hdnLangId" value="<?=$strRowLang['pkLangId']?>">
								<input name="hdnAction" type="hidden" id="hdnAction" value="Edit">
								<input src="Images/btn_edit.gif" alt="Edit Language" border="0" height="32" type="image" width="32" value="Edit">
							  </form>
						<? }?>							  
						    </td>
                        <td width="33%" align="center">
							<?
							//--------------Checking for right---------------------
								$objAdminUser->m_intUserId=$_SESSION['intUserId'];
								$objAdminUser->m_objRoles->m_intRightId=31;
								if($objAdminUser->CheckRightForAdmin()==1)
								{
							?>
								<form action="DeleteInterfaceLang.php" method="post">
								  <input name="hdnLangId" type="hidden" id="hdnLangId" value="<?=$strRowLang['pkLangId']?>">
								  <input src="Images/btn_delete.gif" alt="Edit Language" border="0" height="32" type="image" width="32" value="Delete" onClick="return confirm('Are you sure');">
							  </form>
							<? }?>							  
						    </td>
						<td width="34%" align="left">
						<?
						//--------------Checking for right---------------------
							$objAdminUser->m_intUserId=$_SESSION['intUserId'];
							$objAdminUser->m_objRoles->m_intRightId=32;
							if($objAdminUser->CheckRightForAdmin()==1)
							{
						?>
						<form action="SetDefaultInterfaceLang.php" method="post">
                            <input name="hdnLangId" type="hidden" id="hdnLangId" value="<?=$strRowLang['pkLangId']?>"><input src="Images/btn_setDflt_languge.gif" alt="Set as Default" border="0" height="22" type="image" width="23" value="Set Default">
</form>
						<? }?>
						</td>
                      </tr>
                  </table></td>
                  </tr>
                <? 
				 $intRowCounter++;
				}?>
              </table></td>
            </tr>
			<? }else{?>
            <tr>
              <td colspan="2"><table width="100%"  border="0" cellpadding="0" cellspacing="0">
                <tr >
                  <td align="center" class="txt_red">No record Found!</td>
                  </tr>
				  </table></td></tr>
			<? }?>
			<tr>
              <td colspan="2">&nbsp;</td>
            </tr>
          </table></td>
            </tr>
			<?
			}
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