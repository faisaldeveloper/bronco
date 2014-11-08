<?php 
	include("../Includes/BackOfficeIncludesFiles.php");
//--------------Checking for right---------------------
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=96;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{
	$objMails = new clsMails();
}	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?>Emails<?=CONST_BACKOFFICE_TITLE_END?></title>
<script language="javascript">
	function Validate(f)
	{
		bCheck=false;
		for(i=0; i<window.document.forms[1].elements.length ;i++)
		{
			if( (window.document.forms[1].elements[i].type=="checkbox") && (window.document.forms[1].elements[i].checked==true) )	
			bCheck=true;
		}	
		if(bCheck==false)
		{
			alert("Please select at least one");
			return false;
		}
	return true;
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
         <table width="98%" border="0" align="center" cellpadding="2" cellspacing="2">
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
         <?php
			if(isset($_REQUEST['cmbMailReply']))  $rep=$_REQUEST['cmbMailReply']; else $rep=0;
			?>
            <tr>
            	<td>
                    <table width="100%">
                        <tr>
                          <td width="5%"><img src="Images/icon_emails_32x32.jpg" alt="Image"/></td>
                          <td width="95%" valign="middle"><span class="hdng_sandy">Emails</span></td>
                      </tr>
                    </table>
                </td>
             </tr>
             <tr>
			  <td colspan="2">
                <form name="form2" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                  <table width="100%"  border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="20%" align="left" class="txtBld_grn">Filter by reply status:</td>
                      <td width="80%">
                        <select name="cmbMailReply" class="txtBox_dkGrey" onChange="window.document.form2.submit();">
                          <option value="0" <?php if($rep==0) echo "selected"?>>Not Replied</option>
                          <option value="1" <?php if($rep==1) echo "selected"?>>Replied</option>
                      </select></td>
                    </tr>
                  </table>
              </form></TD>
            </TR>
			<tr>
			   <td colspan="4" align="center"><? include('../Includes/DisplayConfirmMessage.php');?></td>
			</tr>
            <form name="form1" method="post" action="EmilsReply.php" onSubmit="return Validate(this)">
              <tr>
                <?php
			  	$objMails->m_intMailReply = $rep;
				$arrMails = $objMails->GetEMails(); 
				if($arrMails != FALSE)
				{
				  $count =0;
			  	  while ($rws=mysql_fetch_array($arrMails))
				  {
				  $count = $count + 1;
				  if ($count%2!=0) 
				  {
				  print "<tr>";
				  }
				  ?>
                <td align="left" valign="top">
                  <table width="100%" border="0" cellpadding="1" cellspacing="0" class="TabBorderLightGreyBG">
                    <tr>
                      <td align="left" valign="top">
                        <table width="100%"  border="0" align="left" cellpadding="1" cellspacing="0">
                          <tr>
                            <td width="20" rowspan="6" align="left" valign="middle" class="outerborder">
                                <input name="chkid[]" type="checkbox"  value="<?=$rws['pkMailId'];?>">
                            </td>
                            <td align="left" valign="top" class="txtBld_grn">From:</td>
                            <td colspan="2" align="left" valign="top"><?=$rws['FromAddress']?></td>
                          </tr>
                          <tr>
                            <td align="left" valign="top" class="txtBld_grn">Subject:</td>
                            <td colspan="2" align="left" valign="top"><?=$rws['Subject']?></td>
                          </tr>
                          <tr>
                            <td width="53" align="left" valign="top" class="txtBld_grn">Date:</td>
                            <td colspan="2" align="left" valign="top">
                                <?php 
								list($y,$m,$d) = explode("-",$rws['MailDate']);
								echo $d.".".$m.".".$y;
								?></td>
                          </tr>
                          <tr>
                            <td align="left" valign="top" class="txtBld_grn">Email:</td>
                            <td colspan="2" align="left" valign="top">
                                <?=$rws['FromAddress']?></td>
                          </tr>
                          <tr>
                            <td align="right" valign="top" class="txtBld_dkGrey">&nbsp;</td>
                            <td width="550" align="left" valign="top">&nbsp;</td>
                            <td width="68" align="left" valign="bottom">&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="3" align="left" valign="top" class="txtBld_dkGrey">
                                <?=$rws['MailBody']?></td>
                          </tr>
                      </table></td>
                    </tr>
                </table></td>
                <?php
				  if ($count%2==0)
				  {
				  print "</tr>";
				  }
				} // end while
				?>
              <TR>
                <TD>
				<input type="hidden" value="<?=$rep?>" name="hdnMailReply">
				<?php if($rep == 0){?>
				<?
				//--------------Checking for right---------------------
				$objAdminUser->m_intUserId=$_SESSION['intUserId'];
				$objAdminUser->m_objRoles->m_intRightId=97;
				if($objAdminUser->CheckRightForAdmin()==1)
				{
				?>
				<input name="btnReply" type="submit" class="button" id="btnReply" value="Reply">
			   <? }else{print "&nbsp;";}?>
				<?php  } ?>
                  &nbsp;
				<?
				//--------------Checking for right---------------------
				$objAdminUser->m_intUserId=$_SESSION['intUserId'];
				$objAdminUser->m_objRoles->m_intRightId=98;
				if($objAdminUser->CheckRightForAdmin()==1)
				{
				?>
				  <input name="btnDel" type="submit" class="button" id="btnDel" value="Delete Selected" onClick="return confirm('Do you want to delete email(s)?')"></TD>
			   <? }else{print "&nbsp;";} ?>
			  </TR>
              <?php
			}
			else
			{
				?>
				<tr><td align="center"  class="txt_red">
				<?php
				echo "<br><br><br><span class='txt_red'> No Emails Present</span>";
				?>
				</td></tr>
				<?php 
			}
			?>
            </form>
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