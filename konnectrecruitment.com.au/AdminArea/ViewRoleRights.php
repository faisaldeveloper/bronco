<?php
	require_once("../Includes/BackOfficeIncludesFiles.php");
//--------------Checking for right---------------------
	$objAdminUser=new clsAdminUser();
	$objAdminUser->m_objRoles=new clsRoles();
	$objAdminUser->m_intUserId=$_SESSION['intUserId'];
	$objAdminUser->m_objRoles->m_intRightId=92;
	if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
	{
		/***
			server side validation
		**/
		if(!isset($_POST['hdnRoleId']) || empty($_POST['hdnRoleId']))
		{
			header("Location:ManageRoles.php?intMessage=101");
			exit;
		}
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?>Roles Management<?=CONST_BACKOFFICE_TITLE_END?></title>
<script>
	function CheckAllOptions(form1)
	{
		for(i=0;i<form1.elements.length;i++)
		{
			if(form1.elements[i].type=='checkbox')
			{
				if(form1.CheckAll.checked)
					form1.elements[i].checked=true;
				else
					form1.elements[i].checked=false;
			}
		}
	}
	function CheckGroupAll(chkGroup)
	{
		intGroup=chkGroup.name;
		for(i=0;i<window.document.forms[0].elements.length;i++)
		{
			if(window.document.forms[0].elements[i].name=="chkRight"+intGroup+"[]")
			{					
				if(chkGroup.checked)
				{	
					window.document.forms[0].elements[i].checked=true;
				}	
				else
				{	
					window.document.forms[0].elements[i].checked=false;
				}
			}		
		}
	
	}
</script>
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
    <br>
          <table width="99%" align="center" cellpadding="0" cellspacing="0">
		  <?
		  if($objAdminUser->CheckRightForAdmin()!=1)//Start Right If
			{
			?>
            <tr>
              <td class="txtBld_ornge">You are not authorised to view this page.<a href="<?=$_SERVER['HTTP_REFERER']?>">&gt;&gt;&nbsp;Back </a></td>
            </tr>
			<?
			}
			else {
			?>
            <tr>
              <td colspan="2"><a href="ManageRoles.php"><span class="txtBld_ornge">Role Manager</span></a>&nbsp;&gt;&gt;&nbsp;<span class="hdng_sandy">Role Rights</span></td>
            </tr>
            <tr>
               <td>
                 <table width="99%" align="center" cellpadding="2" cellspacing="0" class="TabBorderLightGreyBG">
<?
	  $objRoles=new clsRoles();
	  if(isset($_POST['hdnRoleId']))
		  $objRoles->m_intRoleId=$_POST['hdnRoleId'];
	  else
		  $objRoles->m_intRoleId=$_GET['intRoleId'];
	
	  $rsRoles=$objRoles->GetRoleDetail();
	  $strRowRoles=mysql_fetch_array($rsRoles);
?>
            <tr>
              <td colspan="2" align="left" class="txtBld_grey">&nbsp;Role :
				<?=$strRowRoles['RoleDesc']?></td>
            </tr>
            <tr>
              <td colspan="2" align="left" class="txtBld_grey">&nbsp;</td>
            </tr>
            <? if(isset($_REQUEST['strMessage'])){?>
            <tr>
              <td colspan="2" class="txt_red">&nbsp;<?=$_REQUEST['strMessage']?></td>
            </tr>
            <? }?>
			
			<form name="form1" method="post" action="ViewRoleRightsAction.php">
            <tr align="left">
             <? 
            //--------Checking For Right-----------//
            $objAdminUser->m_intUserId=$_SESSION['intUserId'];	
            $objAdminUser->m_objRoles->m_intRightId=108;
            if($objAdminUser->CheckRightForAdmin()==1)
            { ?>
                  <td colspan="2"><input name="Submit" type="submit" class="button" value="Update"></td>
            <? }?>
            </tr>
                    <tr class="bg_ltGrey">
                      <td colspan="2" align="left" class="txtBld_grey"><input name="CheckAll" type="checkbox" id="CheckAll" onClick="CheckAllOptions(form1)" value="checkbox">List Of Rights
                      <input name="hdnRoleId" type="hidden" id="hdnRoleId" value="<?=$strRowRoles['pkRoleId']?>"></td>
                    </tr>
					<tr><td>&nbsp;</td></tr>
					<tr>
						<td colspan="2">
						<table width="100%" cellpadding="0" cellspacing="0">
                    <?
									$rsGroup=$objRoles->RightsList();
									$rsRights=$objRoles->RightsList();
									if($rsRights!=0){
										$strGroup=mysql_fetch_array($rsGroup);
										$strGroupName=$strGroup['Desc'];
										$intPrevGroup=$strGroup['pkId'];	//First right GroupId
					?>
							<tr class='bg_ltGreen'><td colspan="3" class="txtBld_grey"><input name="<?=$intPrevGroup?>" type="checkbox" onClick="CheckGroupAll(this)"><?=$strGroupName;?></td>
							</tr>
						    <tr class='bg_ltGrey'>
					<?
										$intCounter=1;
										while($strRights=mysql_fetch_array($rsRights)){	
											$objRoles->m_intRightId=$strRights['pkRightId'];
											$intCurrGroup=$strRights['fkGroupId'];			
											if($intPrevGroup!=$intCurrGroup)
											{
												//***************Making complete colums for row****************//				
												$intCounter--;					
												$intRem=$intCounter%3;
												//if($intCounter<4){while($intCounter<4){print "<td>&nbsp;</td>"; $intCounter++;}}		
												//else 
												if($intRem==2){ print "<td>&nbsp;</td>";}		
												else if($intRem==1){ print "<td>&nbsp;</td><td>&nbsp;</td>";}		
												//**************************************************************//				
												$intCounter=1;
												$intPrevGroup=$intCurrGroup;
					?>				
					      </tr>
												<tr><td colspan="3">&nbsp;</td></tr>
												<tr class="bg_ltGreen"><td colspan="3" class="txtBld_grey"><input name="<?=$strRights['fkGroupId']?>" id="<?=$strRights['fkGroupId']?>" type="checkbox" onClick="CheckGroupAll(this)"><label for="<?=$strRights['fkGroupId']?>"><?=$strRights['Desc']?> <?//=$strRights['fkGroupId']?></label></td></tr>
												<tr class="bg_ltGrey">
					<?	}?>
						<td align="left"><input name="chkRight<?=$strRights['fkGroupId']?>[]" id="chkRight<?=$strRights['pkRightId']?>[]" type="checkbox" value="<?=$strRights['pkRightId']?>" <? if($objRoles->CheckRightInRole()==1) print "checked";?>><label for="chkRight<?=$strRights['pkRightId']?>[]"><?=$strRights['RightDesc']?> <?//=$strRights['pkRightId']?></label></td>
                      <?
					  	if($intCounter%3==0)
							{		
								print "</tr><tr class='bg_ltGrey'>";
							}						
							$intCounter++;		
						} 

						//   *********************Completing column counter****************  //					
						$intCounter--;					
						$intRem=$intCounter%3;
						if($intRem==2){ print "<td>&nbsp;</td>";}		
						else if($intRem==1){ print "<td>&nbsp;</td><td>&nbsp;</td>";}		
						// 	 **************************************************************  //
					?>
						    </tr>
					    </table>						</td>
					</tr>				
					
							<tr align="left">
							  <td colspan="2">&nbsp;</td>
				  </tr>
							<tr align="left">
							<? 
						//--------Checking For Right-----------//
						$objAdminUser->m_intUserId=$_SESSION['intUserId'];	
						$objAdminUser->m_objRoles->m_intRightId=108;
						if($objAdminUser->CheckRightForAdmin()==1)
						{ ?>
							  <td colspan="2"><input name="Submit" type="submit" class="button" value="Update"></td>
						<? }?>
						    </tr>
                    <?
					}	
					else print "<tr><td colspan='2' class='txt_red'>No Record Found</td></tr>";
					
					?>
			</form>
            <tr>
              <td width="5%">&nbsp;</td>
            </tr>
			<?
				}//End Right If
			?>
      </table>
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