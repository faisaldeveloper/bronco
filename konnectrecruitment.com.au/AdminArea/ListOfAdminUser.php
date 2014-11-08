<? 
require_once("../Includes/BackOfficeIncludesFiles.php");
//--------------Checking for right---------------------
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=7;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?>Admin Users<?=CONST_BACKOFFICE_TITLE_END?></title>
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
<table width="97%"  border="0" align="center">
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
          <td colspan="2">
            <table width="100%">
                <tr>
                  <td width="5%"><img src="Images/icon_security_32x32.jpg" alt="Image"/></td>
                  <td width="95%" valign="middle"><span class="hdng_sandy">Administrators (Admin Users)</span></td>
              </tr>
            </table>
          </td>
        </tr>
		<tr>
		<td colspan="3" width=100% align="right">
			<?
				//--------Checking For Right-----------//
				$objAdminUser->m_intUserId=$_SESSION['intUserId'];	
				$objAdminUser->m_objRoles->m_intRightId=8;
				if($objAdminUser->CheckRightForAdmin()==1)
				{
			?>
					<a href="AddAdminUser.php">Add New Admin</a> 
				<?
				}
					else
					print "&nbsp;";
				//------------------------------------//
			?>
			</td>
		</tr>
		<tr>
		   <td colspan="2"><? include('../Includes/DisplayConfirmMessage.php');?></td>
		</tr>
	<tr>
	  <td colspan="4">
		<table width="100%"  border="0" align="left" cellpadding="2" cellspacing="0">
		  <tr>
			<td align="left" class="TabHeading">User Names</td>
			  <td colspan="2" align="center"class="TabHeading">Action</td>
		   </tr>
		  <? 
		  $objAdminUser=new clsAdminUser();
		  $objAdminUser->m_objRoles=new clsRoles();
	
		  $rsAdminUser=$objAdminUser->ListOfAdminUser();
		  if($rsAdminUser!=FALSE)
		  {
			$intRowCounter = 1;
			while($strRowAdmin=mysql_fetch_array($rsAdminUser))
			{
				if($strRowAdmin['UserName']!="d1gapp")
				{
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
          <td width="76%" align="left" class="brdr_dotedLt" height="22"><?=$strRowAdmin['UserName']?></td>
          <td width="11%" align="center" class="brdr_dotedRt">
			<?
				//--------Checking For Right-----------//
				$objAdminUser->m_intUserId=$_SESSION['intUserId'];	
				$objAdminUser->m_objRoles->m_intRightId=9;
				if($objAdminUser->CheckRightForAdmin()==1)
				{
			?>
				<a href="DeleteAdminUser.php?intUserId=<?=$strRowAdmin['pkUserId']?>" onClick='return confirm("Are you Sure?")'>Delete</a>
			<? 	}
				else
					print "&nbsp;";
				//------------------------------------//
			?>
		  </td>
		  <td width="13%" align="center" class="brdr_dotedRt">
			<?
				//--------Checking For Right-----------//
				$objAdminUser->m_intUserId=$_SESSION['intUserId'];	
				$objAdminUser->m_objRoles->m_intRightId=10;
				if($objAdminUser->CheckRightForAdmin()==1)
				{
			?>
					<a href="ViewAdminRoles.php?intUserId=<?=$strRowAdmin['pkUserId']?>" >Admin Roles</a>			
			<? 	}
				else
					print "&nbsp;";
				//------------------------------------//
			?>
			</td>
		</tr>
		<?
			  $intRowCounter++;
		}
	}
 }
	  ?>
      </table>
	  
   </td>
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