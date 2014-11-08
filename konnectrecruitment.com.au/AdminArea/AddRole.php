<? 
require_once("../Includes/BackOfficeIncludesFiles.php");
//--------------Checking for right---------------------
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=89;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{
$objRoles=new clsRoles();
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?>Add Role<?=CONST_BACKOFFICE_TITLE_END?></title>
<script>
	function Validate(f)
	{
		if(f.txtRoleName.value=="")
		{
			alert("Please enter roll name");
			f.txtRoleName.focus();
			return false;
		}
		return true;
	}
	
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
          <table width="99%"  border="0" align="center" cellpadding="2" cellspacing="0">
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
              <td><a href="ManageRoles.php"><span class="txtBld_ornge">Role Manager</span></a>&nbsp;&gt;&gt;&nbsp;<span class="hdng_sandy">Add New Role</span></td>
            </tr>
			<tr>
			   <td align="center"><? include('../Includes/DisplayConfirmMessage.php');?></td>
			</tr>
            <tr>
              <td><form name="form1" method="post" action="AddRoleAction.php" onSubmit="return Validate(this)">
                  <table width="99%"  border="0" align="center" cellpadding="0" cellspacing="0" class="TabBorderLightGreyBG">
                    <tr>
                      <td colspan="2" align="left" class="txtBld_grn">Roll Name<span class="txt_red">*</span>
                        <input name="txtRoleName" type="text" id="txtRoleName" maxlength="255"></td>
                    </tr>
                    <tr>
                      <td align="right">&nbsp;</td>
                      <td class="txtBld_grn">&nbsp;</td>
                    </tr>
                    <tr class='bg_ltGrey'>
                      <td colspan="2" align="left" class="txtBld_grey">                        
						<input name="CheckAll" type="checkbox" id="CheckAll" onClick="CheckAllOptions(form1)" value="checkbox">
                        List Of Rights
                        <input name="hdnRoleId" type="hidden" id="hdnRoleId" value="<?=$strRowRoles['pkRoleId']?>"></td>
                      </tr>
					<tr><td>&nbsp;</td></tr>			
                    <tr>
                      <td colspan="2" align="right">
						<table width="100%" cellpadding="0" cellspacing="0">
                    <?
									$rsGroup=$objRoles->RightsList();
									$rsRights=$objRoles->RightsList();
									if($rsRights!=0){
										$strGroup=mysql_fetch_array($rsGroup);
										$strGroupName=$strGroup['Desc'];
										$intPrevGroup=$strGroup['pkId'];	//First right GroupId
					?>
							<tr class='bg_ltGreen'><td colspan="3" align="left" class="txtBld_grey"><input name="<?=$intPrevGroup?>" type="checkbox" onClick="CheckGroupAll(this)"><?=$strGroupName;?></td>
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
												<tr class="bg_ltGreen"><td colspan="3" align="left" class="txtBld_grey"><input name="<?=$strRights['fkGroupId']?>" type="checkbox" onClick="CheckGroupAll(this)"><?=$strRights['Desc']?></td>
												</tr>
												<tr class="bg_ltGrey">
																		
					<?	
											}				

					?>
																  
												<td align="left"><input name="chkRight<?=$strRights['fkGroupId']?>[]" type="checkbox" value="<?=$strRights['pkRightId']?>"><?=$strRights['RightDesc']?></td>
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
					<?				}?>
					    </table>						</td>
                      </tr>
                    <tr>
                      <td colspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                      <td colspan="2"><input name="Submit" type="submit" class="button" value="Add"></td>
                      </tr>
                  </table>
              </form></td>
            </tr>
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
