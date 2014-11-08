<?php
include("../Includes/BackOfficeIncludesFiles.php");
//--------------Checking for right---------------------
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=215;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{
	//////////////////validation///////////////
	if(!isset($_REQUEST['chkid']) || empty($_REQUEST['chkid']))
	{
		header("location:ManageCustomers.php?intMessage=364");
		exit;
	}
	///////////////////Object creation/////////////////
	$objUser = new clsUser();
	////////////Variables initialization///////////////
	$emails="";
	$counter=0;
	$strid="";
	$strTo="";
	///////////////Getting values from query string//////////
	
	foreach($_REQUEST['chkid'] as $id)
	{
	/////////Transfering values to class variables//////////
		$objUser->m_intUserId=$id;
		$rowUser=$objUser->GetUserEmailById();
		$recUser=mysql_fetch_array($rowUser);
			if($counter==0)
			{
				$strTo=$recUser[0];
				$emails.=$recUser[0]; 
				$strid=$id;
			}
			else
			{
				$emails.=",".$recUser[0]; 
				$strid.=",".$id;
			}
			$counter++;
	}
	if(isset($_REQUEST['toadd']))
	{
		$strTo = $_REQUEST['toadd'];
	}
	if(isset($_REQUEST['fromadd']))
	{
		$strfrom = $_REQUEST['fromadd'];
	}
	if(isset($_REQUEST['mailbody']))
	{
		$strMail = $_REQUEST['mailbody'];
	}
}//End Right If
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?>Emails<?=CONST_BACKOFFICE_TITLE_END?></title>
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
   <table width="99%"  border="0" align="center" cellpadding="0" cellspacing="2">
	  <?
      if($objAdminUser->CheckRightForAdmin()!=1)//Start Right If
        {
        ?>
        <tr>
          <td class="txtBld_ornge">You are not authorised to view this page. <a href="<?=$_SERVER['HTTP_REFERER']?>">&gt;&gt;&nbsp;Back </a></td>
        </tr>
        <?
        }
        else {
        ?>		  
        <tr>
            <td align="left"><a href="ManageCustomers.php"><span class="txtBld_ornge">Customers list</span></a> &gt;&gt; <span class="hdng_sandy">Email To Members</span></td>
         </tr>
      <tr>
        <td>
          <form name="form1" method="post" action="EmailsReplyAction.php">
			<table width="99%"  border="0" align="center" cellpadding="0" cellspacing="2" class="TabBorderLightGreyBG">
              
              <tr>
                <td colspan="3" class="hdng_sandy">&nbsp;</td>
                </tr>
              <tr>
                <td width="14%" class="txtBld_grn">To <span class="txt_red">*</span></td>
                <td width="86%" colspan="2">
                  <input name="toadd"  value="<?=$strTo?>"type="text" class="txtBox_dkGrey" id="toadd" size="40">
                  <input name="strid" type="hidden" class="txtBox_dkGrey"  value="<?=$strid?>">
                  <input type="hidden" name="hdnchkid" value="<?=$_REQUEST['chkid']?>"></td>
              </tr>
              <tr>
                <td class="txtBld_grn">From <span class="txt_red">*</span></td>
                <td colspan="2"><input name="fromadd" type="text" class="txtBox_dkGrey" id="fromadd" size="40" value="<?=$strfrom?>"></td>
              </tr>
              <tr>
                <td class="txtBld_grn">Cc</td>
                <td colspan="2"><input name="ccadd" type="text" class="txtBox_dkGrey" id="ccadd" size="40"></td>
              </tr>
              <tr>
                <td align="left" valign="top" class="txtBld_grn">Bcc</td>
                <td colspan="2"><textarea name="bcc" cols="70" rows="3" class="txtBox_dkGrey" id="bcc"><?=$emails?>
          </textarea></td>
              </tr>
              <tr>
                <td class="txtBld_grn">Subject</td>
                <td colspan="2"><input name="subject" type="text" class="txtBox_dkGrey" id="subject" size="40"></td>
              </tr>
              <tr>
                <td align="left" valign="top" class="txtBld_grn">Mail Body </td>
                <td colspan="2"><textarea name="mailbody" cols="70" rows="15" class="txtBox_dkGrey" id="mailbody"><?=$strMail?></textarea></td>
              </tr>
              <tr>
                <td class="txtBld_dkGrey">&nbsp;</td>
                <td colspan="2">
				<input name="Submit" type="submit" class="button" value="Send"></td>
              </tr>
              <tr>
                <td class="txtBld_dkGrey">&nbsp;</td>
                <td colspan="2">&nbsp;</td>
              </tr>
			<?
				}//End Right If
			?>		  
            </table>
          </form>
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
