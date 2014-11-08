<?php
	$objAdminUser1=new clsAdminUser();
	$objAdminUser1->m_objRoles=new clsRoles();
	$objAdminUser1->m_intUserId=$_SESSION['intUserId'];

?>
<script type="text/javascript" src="../Script/JavaScript.js"></script>

<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td valign="middle" class="">&nbsp;</td>
    <td valign="middle">&nbsp;</td>
  </tr>

  <tr onMouseOver="this.className='bg_LeftPanelRollOver';" onMouseOut ="this.className='TabBorderLightGreyBG';" onClick="window.open('ControlPanel.php', '_self');" id="ControlPanel">
    <td width="20" height="30" align="left" valign="middle" class="brdr_BotomLightGrey"><img src="Images/icon_CPanel.png" width="20" height="20" /></td>
    <td width="98%" height="30" valign="middle" class="brdr_BotomLightGrey">Administrative Panel</td>
  </tr>
	<?
        $objAdminUser1->m_objRoles->m_intRightId=280;
        if($objAdminUser1->CheckRightForAdmin()==1)
        {
    ?>
  <tr onMouseOver="this.className='bg_LeftPanelRollOver';" onMouseOut ="this.className='TabBorderLightGreyBG';" onClick="window.open('ContentManager.php', '_self');" id="ContentManager">
    <td height="30" align="left" valign="middle" class="brdr_BotomLightGrey"><img src="Images/icon_content.png" width="20" height="20"></td>
    <td height="30" align="left" valign="middle" class="brdr_BotomLightGrey">
      <div style="position:relative; visibility:visible; width:auto; height:auto; top:0px; left:auto; vertical-align:middle" onMouseOver="MM_showHideLayers('DIV940','','show')" onMouseOut="MM_showHideLayers('DIV940','','hide')">
		 Content Manager
       	<div style="position:absolute; width:auto; height:auto; top:0px; left:120px; visibility:hidden; vertical-align:middle" name="DIV940" id="DIV940"  onMouseOver="MM_showHideLayers('DIV940','','show')" onMouseOut="MM_showHideLayers('DIV940','','hide')" >				
		  <table width="170px" cellpadding="2" cellspacing="0" class="TabBorderLightGreyBG">
				<?
                    $objAdminUser1->m_objRoles->m_intRightId=5;
                    if($objAdminUser1->CheckRightForAdmin()==1)
					{
						$strManagePages = "ManagePages.php";
                ?>
				<tr height="30" onMouseOver="this.className='bg_LeftPanelRollOver';" onMouseOut ="this.className='TabBorderLightGreyBG';" onClick="window.open('ContentManager.php', '_self');" >
					<td width="4%" align="left" valign="middle" class="brdr_BotomLightGrey"><img src="Images/icon_pages.png" /></td>
				  <td width="96%" align="left" valign="middle" class="brdr_BotomLightGrey"><a href="<? echo $strManagePages; ?>">Page Manager</a></td>
            	</tr><? 
				}
                $objAdminUser1->m_objRoles->m_intRightId=310;
                    if($objAdminUser1->CheckRightForAdmin()==1)
				{
						$strModulesManager = "ModulesManager.php";
                ?>
				<tr height="30" onMouseOver="this.className='bg_LeftPanelRollOver';" onMouseOut ="this.className='TabBorderLightGreyBG';" onClick="window.open('ModulesManager.php', '_self');" >
					<td width="4%" align="left" valign="middle" class="brdr_BotomLightGrey"><img src="Images/icon_module_manager_20x20.png" /></td>
				  <td width="96%" align="left" valign="middle" class="brdr_BotomLightGrey"><a href="<? echo $strModulesManager; ?>">Modules Manager</a></td>
        	    </tr>
				  <? 
				  
				 	}				 
						$objAdminUser1->m_objRoles->m_intRightId=46;
						if($objAdminUser1->CheckRightForAdmin()==1)
						{
						$strManageNews = "ManageNewsModule.php";
					
                ?>
				<tr height="30" onMouseOver="this.className='bg_LeftPanelRollOver';" onMouseOut ="this.className='TabBorderLightGreyBG';" onClick="window.open('ContentManager.php', '_self');" >
					<td width="4%" align="left" valign="middle" class="brdr_BotomLightGrey"><img src="Images/icon_news.png" /></td>
				  <td width="96%" align="left" valign="middle" class="brdr_BotomLightGrey"><a href="<? echo $strManageNews; ?>">News Module</a></td>
        	    </tr>
				
				<?
				}
				$objAdminUser1->m_objRoles->m_intRightId=68;
					if($objAdminUser1->CheckRightForAdmin()==1)
					{
					$strManageGallery = "ManageGallery.php";
				
                ?>
				<tr height="30" onMouseOver="this.className='bg_LeftPanelRollOver';" onMouseOut ="this.className='TabBorderLightGreyBG';" onClick="window.open('ContentManager.php', '_self');" >
					<td width="4%" align="left" valign="middle" class="brdr_BotomLightGrey"><img src="Images/icon_ImageGallery.png" /></td>
				  <td width="96%" align="left" valign="middle" class="brdr_BotomLightGrey"><a href="<? echo $strManageGallery; ?>">Image Gallery</a></td>
        	    </tr>
				<?
                    }
					$objAdminUser1->m_objRoles->m_intRightId=96;
                    if($objAdminUser1->CheckRightForAdmin()==1)
					{
						$strEmails = "Emails.php";
                ?>
				<tr height="30" onMouseOver="this.className='bg_LeftPanelRollOver';" onMouseOut ="this.className='TabBorderLightGreyBG';" onClick="window.open('ContentManager.php', '_self');" >
					<td width="4%" align="left" valign="middle" class="brdr_BotomLightGrey"><img src="Images/icon_email.png" /></td>
				  <td width="96%" align="left" valign="middle" class="brdr_BotomLightGrey"><a href="<? echo $strEmails; ?>">Emails</a></td>
        	    </tr>
				<?
				}
				?>				
		  </table>
    	   </div>
      </div>    </td>
  </tr>
  <tr onMouseOver="this.className='bg_LeftPanelRollOver';" onMouseOut ="this.className='TabBorderLightGreyBG';" >
    <td height="30" align="left" valign="middle" class="brdr_BotomLightGrey"><img src="Images/icon_content.png" width="20" height="20"></td>
    <td height="30" align="left" valign="middle" class="brdr_BotomLightGrey">
      <div style="position:relative; visibility:visible; width:auto; height:auto; top:0px; left:auto; vertical-align:middle" onMouseOver="MM_showHideLayers('Recruitment','','show')" onMouseOut="MM_showHideLayers('Recruitment','','hide')">
		 Recruitment Manager
       	<div style="position:absolute; width:auto; height:auto; top:0px; left:120px; visibility:hidden; vertical-align:middle" name="Recruitment" id="Recruitment"  onMouseOver="MM_showHideLayers('Recruitment','','show')" onMouseOut="MM_showHideLayers('Recruitment','','hide')" >				
		  <table width="170px" cellpadding="2" cellspacing="0" class="TabBorderLightGreyBG">
				<?
                    $objAdminUser1->m_objRoles->m_intRightId=5;
                    //if($objAdminUser1->CheckRightForAdmin()==1)
					{
						$strManageCategories = "ManageCategory.php";
                ?>
				<tr height="30" onMouseOver="this.className='bg_LeftPanelRollOver';" onMouseOut ="this.className='TabBorderLightGreyBG';" onClick="window.open('ManageCategory.php', '_self');" >
					<td width="4%" align="left" valign="middle" class="brdr_BotomLightGrey"><img src="Images/icon_pages.png" /></td>
				  <td width="96%" align="left" valign="middle" class="brdr_BotomLightGrey"><a href="<? echo $strManageCategories; ?>">Manage Category</a></td>
            	</tr><? 
				}
                $objAdminUser1->m_objRoles->m_intRightId=310;
                    //if($objAdminUser1->CheckRightForAdmin()==1)
				{
						$strManageServices= "ManageServices.php";
                ?>
				<tr height="30" onMouseOver="this.className='bg_LeftPanelRollOver';" onMouseOut ="this.className='TabBorderLightGreyBG';" onClick="window.open('ManageServices.php', '_self');" >
					<td width="4%" align="left" valign="middle" class="brdr_BotomLightGrey"><img src="Images/icon_module_manager_20x20.png" /></td>
				  <td width="96%" align="left" valign="middle" class="brdr_BotomLightGrey"><a href="<? echo $strManageServices; ?>">Manage Services</a></td>
        	    </tr>
				  <? 
				  
				 	}				 
						$objAdminUser1->m_objRoles->m_intRightId=46;
						//if($objAdminUser1->CheckRightForAdmin()==1)
						{
						$strManageState = "ManageState.php";
					
                ?>
				<tr height="30" onMouseOver="this.className='bg_LeftPanelRollOver';" onMouseOut ="this.className='TabBorderLightGreyBG';" onClick="window.open('ManageState.php', '_self');" >
					<td width="4%" align="left" valign="middle" class="brdr_BotomLightGrey"><img src="Images/icon_news.png" /></td>
				  <td width="96%" align="left" valign="middle" class="brdr_BotomLightGrey"><a href="<? echo $strManageState; ?>">Manage States</a></td>
        	    </tr>
				
				<?
				}
				$objAdminUser1->m_objRoles->m_intRightId=68;
					//if($objAdminUser1->CheckRightForAdmin()==1)
					{
					$strManageEmployee = "ManageEmployee.php";
				
                ?>
				<tr height="30" onMouseOver="this.className='bg_LeftPanelRollOver';" onMouseOut ="this.className='TabBorderLightGreyBG';" onClick="window.open('ManageEmployee.php', '_self');" >
					<td width="4%" align="left" valign="middle" class="brdr_BotomLightGrey"><img src="Images/icon_ImageGallery.png" /></td>
				  <td width="96%" align="left" valign="middle" class="brdr_BotomLightGrey"><a href="<? echo $strManageEmployee; ?>">Employer Area</a></td>
        	    </tr>
				<?
                    }
				$objAdminUser1->m_objRoles->m_intRightId=313;
					//if($objAdminUser1->CheckRightForAdmin()==1)
					{
					$strManageJobSeekers = "ViewJobSeekersDetail.php";
				
                ?>
				<tr height="30" onMouseOver="this.className='bg_LeftPanelRollOver';" onMouseOut ="this.className='TabBorderLightGreyBG';" onClick="window.open('ManageEmployee.php', '_self');" >
					<td width="4%" align="left" valign="middle" class="brdr_BotomLightGrey"><img src="Images/icon_ImageGallery.png" /></td>
				  <td width="96%" align="left" valign="middle" class="brdr_BotomLightGrey"><a href="<? echo $strManageJobSeekers; ?>">View job seekers resume</a></td>
        	    </tr>
				<?
                    }
					
				?>			
		  </table>
    	   </div>
      </div>    </td>
  </tr>
  <?
  	}
	$objAdminUser1->m_objRoles->m_intRightId=281;
	if($objAdminUser1->CheckRightForAdmin()==1)
	{
  ?>
      <tr onMouseOver="this.className='bg_LeftPanelRollOver';" onMouseOut ="this.className='TabBorderLightGreyBG';" onClick="window.open('SiteManager.php', '_self');" id="SiteManager">
    <td height="30" align="left" valign="middle" class="brdr_BotomLightGrey"><img src="Images/icon_siteMgr.png" width="20" height="20"></td>
    <td height="30" valign="middle" class="brdr_BotomLightGrey">
      <div style="position:relative; visibility:visible; width:auto; height:auto; top:0px; left:auto; vertical-align:middle" onMouseOver="MM_showHideLayers('DIV95','','show')" onMouseOut="MM_showHideLayers('DIV95','','hide')">
		 Site Manager
       	<div style="position:absolute; width:auto; height:auto; top:0px; left:120px; visibility:hidden; vertical-align:middle" name="DIV95" id="DIV95"  onMouseOver="MM_showHideLayers('DIV95','','show')" onMouseOut="MM_showHideLayers('DIV95','','hide')" >				
		  <table width="170px" cellpadding="2" cellspacing="0" class="TabBorderLightGreyBG">
            <?
				$objAdminUser1->m_objRoles->m_intRightId=93;
				if($objAdminUser1->CheckRightForAdmin()==1)
				{
					$strSetOptions = "SetOptions.php";
                ?>
				<tr height="30" onMouseOver="this.className='bg_LeftPanelRollOver';" onMouseOut ="this.className='TabBorderLightGreyBG';" onClick="window.open('ContentManager.php', '_self');" >
					<td width="4%" align="left" valign="middle" class="brdr_BotomLightGrey"><img src="Images/icon_options.png" /></td>
				  <td width="96%" align="left" valign="middle" class="brdr_BotomLightGrey"><a href="<? echo $strSetOptions; ?>">Site Options</a></td>
            	</tr>
				<?
					}
                    $objAdminUser1->m_objRoles->m_intRightId=253;
                    if($objAdminUser1->CheckRightForAdmin()==1)
					{
						$strManageTheme = "ManageTheme.php";
                ?>
				<tr height="30" onMouseOver="this.className='bg_LeftPanelRollOver';" onMouseOut ="this.className='TabBorderLightGreyBG';" onClick="window.open('ContentManager.php', '_self');" >
					<td width="4%" align="left" valign="middle" class="brdr_BotomLightGrey"><img src="Images/icon_theme.png" /></td>
				  <td width="96%" align="left" valign="middle" class="brdr_BotomLightGrey"><a href="<? echo $strManageTheme; ?>">Theme Manager</a></td>
            	</tr>
				<?
                    }
					$objAdminUser1->m_objRoles->m_intRightId=78;
                    if($objAdminUser1->CheckRightForAdmin()==1)
					{
						$strManageMessages = "ManageMessages.php";
                ?>
				<tr height="30" onMouseOver="this.className='bg_LeftPanelRollOver';" onMouseOut ="this.className='TabBorderLightGreyBG';" onClick="window.open('ContentManager.php', '_self');" >
					<td width="4%" align="left" valign="middle" class="brdr_BotomLightGrey"><img src="Images/icon_label.png" /></td>
				  <td width="96%" align="left" valign="middle" class="brdr_BotomLightGrey"><a href="<? echo $strManageMessages; ?>">Site Labels</a></td>
            	</tr>
				<?
                    }
					$objAdminUser1->m_objRoles->m_intRightId=197;
                    if($objAdminUser1->CheckRightForAdmin()==1)
					{
						$strManageConfirmMessage = "ManageConfirmMessage.php";
                ?>
				<tr height="30" onMouseOver="this.className='bg_LeftPanelRollOver';" onMouseOut ="this.className='TabBorderLightGreyBG';" onClick="window.open('ContentManager.php', '_self');" >
					<td width="4%" align="left" valign="middle" class="brdr_BotomLightGrey"><img src="Images/icon_cmessage.png" /></td>
				  <td width="96%" align="left" valign="middle" class="brdr_BotomLightGrey"><a href="<? echo $strManageConfirmMessage; ?>">Site Messages</a></td>
            	</tr>
                <? }?>
			 <?
				$objAdminUser1->m_objRoles->m_intRightId=26;
				if($objAdminUser1->CheckRightForAdmin()==1)
				{
					$strManageInterfaceLang = "ManageInterfaceLang.php";
			?>
				<tr height="30" onMouseOver="this.className='bg_LeftPanelRollOver';" onMouseOut ="this.className='TabBorderLightGreyBG';" onClick="window.open('ContentManager.php', '_self');" >
					<td width="4%" align="left" valign="middle"><img src="Images/icon_language.png" /></td>
				  <td width="96%" align="left" valign="middle"><a href="<? echo $strManageInterfaceLang; ?>">Language Manager</a></td>
        	    </tr>
			<? 
	            }
            ?>
           </table>
         </div>
       </div>     </td>
   </tr>
<? 
}
//--------------Checking for right---------------------
	$objAdminUser1->m_intUserId=$_SESSION['intUserId'];
	$objAdminUser1->m_objRoles->m_intRightId=151;
	if($objAdminUser1->CheckRightForAdmin()==1)
	{
?>
 <? }?>
<? 
 //--------------Checking for right---------------------
	$objAdminUser1->m_intUserId=$_SESSION['intUserId'];
	$objAdminUser1->m_objRoles->m_intRightId=189;
	if($objAdminUser1->CheckRightForAdmin()==1)
	{
?>
<? }?>
<? 
//--------------Checking for right---------------------
	$objAdminUser1->m_intUserId=$_SESSION['intUserId'];
	$objAdminUser1->m_objRoles->m_intRightId=160;
	if($objAdminUser1->CheckRightForAdmin()==1)
	{
?>
<? }?>
<? 
	 //--------------Checking for right---------------------
	$objAdminUser1->m_intUserId=$_SESSION['intUserId'];
	$objAdminUser1->m_objRoles->m_intRightId=191;
	if($objAdminUser1->CheckRightForAdmin()==1)
	{
?>
<? }?>
<?
 //--------------Checking for right---------------------
	$objAdminUser1->m_intUserId=$_SESSION['intUserId'];
	$objAdminUser1->m_objRoles->m_intRightId=205;
	if($objAdminUser1->CheckRightForAdmin()==1)
	{
?>
<? }?>
<? 
	$objAdminUser1->m_objRoles->m_intRightId=282;
	if($objAdminUser1->CheckRightForAdmin()==1)
	{
?>
  <tr onMouseOver="this.className='bg_LeftPanelRollOver';" onMouseOut ="this.className='TabBorderLightGreyBG';" onClick="window.open('SecurityPage.php', '_self');" id="SecurityPage">
    <td height="30" align="left" valign="middle" class="brdr_BotomLightGrey"><img src="Images/icon_security.png" width="20" height="20"></td>
    <td height="30" valign="middle" class="brdr_BotomLightGrey">
      <div style="position:relative; visibility:visible; width:auto; height:auto; top:0px; left:auto; vertical-align:middle" onMouseOver="MM_showHideLayers('DIV96','','show')" onMouseOut="MM_showHideLayers('DIV96','','hide')">
		 Security
       	<div style="position:absolute; width:auto; height:auto; top:0px; left:120px; visibility:hidden; vertical-align:middle" name="DIV96" id="DIV96"  onMouseOver="MM_showHideLayers('DIV96','','show')" onMouseOut="MM_showHideLayers('DIV96','','hide')" >				
		  <table width="170px" cellpadding="2" cellspacing="0" class="TabBorderLightGreyBG">
				<?
                    $objAdminUser1->m_objRoles->m_intRightId=7;
                    if($objAdminUser1->CheckRightForAdmin()==1)
					{
						$strListOfAdminUser = "ListOfAdminUser.php";
                ?>
				<tr height="30" onMouseOver="this.className='bg_LeftPanelRollOver';" onMouseOut ="this.className='TabBorderLightGreyBG';" onClick="window.open('ContentManager.php', '_self');" >
					<td width="4%" align="left" valign="middle" class="brdr_BotomLightGrey"><img src="Images/icon_cutomers.png" /></td>
				  <td width="96%" align="left" valign="middle" class="brdr_BotomLightGrey"><a href="<? echo $strListOfAdminUser; ?>">Administrators</a></td>
            	</tr>
				<?
					}
                    $objAdminUser1->m_objRoles->m_intRightId=88;
                    if($objAdminUser1->CheckRightForAdmin()==1)
					{
						$strManageRoles = "ManageRoles.php";
                ?>
				<tr height="30" onMouseOver="this.className='bg_LeftPanelRollOver';" onMouseOut ="this.className='TabBorderLightGreyBG';" onClick="window.open('ContentManager.php', '_self');" >
					<td width="4%" align="left" valign="middle" class="brdr_BotomLightGrey"><img src="Images/icon_role.png" /></td>
				  <td width="96%" align="left" valign="middle" class="brdr_BotomLightGrey"><a href="<? echo $strManageRoles; ?>">Role Manager</a></td>
            	</tr>
				<?
                    }
					$objAdminUser1->m_objRoles->m_intRightId=154;
                    if($objAdminUser1->CheckRightForAdmin()==1)
					{
						$strChangePassword = "ChangePassword.php";
                ?>
				<tr height="30" onMouseOver="this.className='bg_LeftPanelRollOver';" onMouseOut ="this.className='TabBorderLightGreyBG';" onClick="window.open('ContentManager.php', '_self');" >
					<td width="4%" align="left" valign="middle" class="brdr_BotomLightGrey"><img src="Images/icon_cpass.png" /></td>
				  <td width="96%" align="left" valign="middle"><a href="<? echo $strChangePassword; ?>">Change Password</a></td>
            	</tr>
                <? }?>
           </table>
         </div>
       </div>    </td>
  </tr>
<? }?>  
  <tr onMouseOver="this.className='bg_LeftPanelRollOver';" onMouseOut ="this.className='TabBorderLightGreyBG';" onClick="window.open('Logout.php', '_self');" id="Logout">
    <td height="30" align="left" valign="middle" class="brdr_BotomLightGrey"><img src="Images/icon_logout.png" width="20" height="20" /></td>
    <td height="30" valign="middle" class="brdr_BotomLightGrey">Logout</td> 
  </tr>
</table>
