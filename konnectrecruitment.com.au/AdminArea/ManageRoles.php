<?php

//********************************************************************************************//
//	Developer : Yasir Abbasi
//	Date:		2 june 2005
//	owner		DS
//*********************************************************************************************//

	require_once("../Includes/BackOfficeIncludesFiles.php");
//--------------Checking for right---------------------
	$objAdminUser=new clsAdminUser();
	$objAdminUser->m_objRoles=new clsRoles();
	$objAdminUser->m_intUserId=$_SESSION['intUserId'];
	$objAdminUser->m_objRoles->m_intRightId=88;
	if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
	{
		$objRoles= new clsRoles();	//Creating Role Object
	}//End Right If
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?>User Roles<?=CONST_BACKOFFICE_TITLE_END?></title>
<script language="JavaScript">
	function SubmitForm(frmName,strAct)
	{
		if(strAct=='Edit')
		{
			frmName.hdnAct.value="edit";
			frmName.action="EditRole.php";
		}
		else if(strAct=='View')
		{
			frmName.hdnAct.value="View";
			frmName.action="ViewRoleRights.php";
		}
		else if(strAct=='Delete')
		{
			if(confirm("Are you sure?"))
			{
				frmName.hdnAct.value="delete";
				frmName.action="DelRole.php";
			}
		}
		else return false;
		frmName.submit();
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
		 <?php
        //--------------Checking for right---------------------
        $objAdminUser=new clsAdminUser();
        $objAdminUser->m_objRoles=new clsRoles();
        $objAdminUser->m_intUserId=$_SESSION['intUserId'];
        $objAdminUser->m_objRoles->m_intRightId=88;
        if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
        {
            if(isset($_REQUEST['strMsg']))	
                print $_REQUEST['strMsg'];
            $intPerPage=100;
            
            if(isset($_REQUEST['intPage']))		//Getting Page No
                $intPage=$_REQUEST['intPage'];
            else
                $intPage=1; 			//Default Page is one
            
            if(!isset($intPerPage)){ 
                $intPerPage=100;		//how many records per page default to 5 
            } 
            $rsRoles1=$objRoles->RolesList();
            $intTotalReturned = mysql_num_rows($rsRoles1); 	//Total Records
            $intPageCount = ceil($intTotalReturned/$intPerPage);   //Total Pages formed
            if($intPage==1) //Setting records Limit from 0 for ist page
                $intRecordStart = $intPage-1; 
            else 			//Calculate records start for other page	
                $intRecordStart = ($intPage-1)*$intPerPage; 
             $rsRoles=$objRoles->RolesList($intRecordStart,$intPerPage);
            } 
            ?>
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
                      <td width="5%"><img src="Images/icon_roles_32x32.jpg" alt="Image"/></td>
                      <td width="95%" valign="middle"><span class="hdng_sandy">Role Manager</span></td>
                  </tr>
                </table>
              </td>
           </tr>
			<?
			//--------------Checking for right---------------------
			$objAdminUser=new clsAdminUser();
			$objAdminUser->m_objRoles=new clsRoles();
			$objAdminUser->m_intUserId=$_SESSION['intUserId'];
			$objAdminUser->m_objRoles->m_intRightId=89;
			if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
			{
			?>
			<tr>
              <td width="27%" align="right"><a href="AddRole.php">Add New Role</a>&nbsp;</td>
			</tr>
			<?
			}
			?>
			<tr>
			   <td align="center"><? include('../Includes/DisplayConfirmMessage.php');?></td>
			</tr>
		    <tr>
              <td colspan="3" align="left" valign="top">
                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                 <tr>
                 	<td colspan="3" align="left" valign="top">
					<?PHP
					if(mysql_num_rows($rsRoles)>0)  //If Records found
					{
					?>
				       <table width="100%"  border="0" cellpadding="2" cellspacing="0">
						<tr>
						  <td width="5%" class="TabHeading">ID</td>
						  <td width="79%" class="TabHeading">Role Desc</td>
						  <td width="16%" align="center" class="TabHeading">Action</td>
						</tr>
					<?PHP
						$intRowCounter = 1;
						while($strResAll=mysql_fetch_array($rsRoles))	//Display records
						{
					?>		  
                        <form name="frm<?=$strResAll["pkRoleId"]?>" method="post">
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
                          <td class="brdr_dotedLt">
						  <input name="hdnRoleId" type="hidden" value="<?php echo $strResAll["pkRoleId"]?>">
                          <input name="hdnPage" type="hidden" value="<?=$intPage?>">
                          <input name="hdnAct" type="hidden" value="">
						  <?=$strResAll["pkRoleId"]?></td>
                          <td class="brdr_dotedRt"><?=$strResAll["RoleDesc"]?></td>
                          <td align="center" class="brdr_dotedRt">
<?
						//--------Checking For Right-----------//
						$objAdminUser->m_intUserId=$_SESSION['intUserId'];	
						$objAdminUser->m_objRoles->m_intRightId=90;
						if($objAdminUser->CheckRightForAdmin()==1)
						{
?>
                            <input src="Images/btn_edit.gif" title="Edit Role" name="Submit" border="0" height="32" type="image" width="32" value="Edit" onClick="SubmitForm(frm<?php echo $strResAll["pkRoleId"]?>,'Edit')">
					
					<? 	}
						else
							print "&nbsp;";	

						//--------Checking For Right-----------//
						$objAdminUser->m_intUserId=$_SESSION['intUserId'];	
						$objAdminUser->m_objRoles->m_intRightId=91;
						if($objAdminUser->CheckRightForAdmin()==1)
						{
?>
                            <input name="Submit" type="image" onClick="SubmitForm(frm<?php echo $strResAll["pkRoleId"]?>,'Delete')" value="Delete" src="Images/btn_delete.gif" title="Delete Role" width="32" height="32" border="0">                            
					
					<? 	}
						else
							print "&nbsp;";	

						//--------Checking For Right-----------//
						$objAdminUser->m_intUserId=$_SESSION['intUserId'];	
						$objAdminUser->m_objRoles->m_intRightId=92;
						if($objAdminUser->CheckRightForAdmin()==1)
						{
?>
							<input name="Submit" type="image" onClick="SubmitForm(frm<?php echo $strResAll["pkRoleId"]?>,'View')" value="View" src="Images/btn_view.gif" title="Update rights" width="32" height="32" border="0">
					
					<? 	}
						else
							print "&nbsp;";	
					?>
						</td>
                          </tr>
                     </form>
                      <? 
					  $intRowCounter++;
					  	}
					?>
                  </table>
		  <?php } // end if num rows
				  else echo "No Role Found!";?>				  
					</td>
				 </tr>
              </table></td>
            </tr>
            <tr>
              <td colspan="3">&nbsp;</td>
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