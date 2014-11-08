<?php
	include("../Includes/BackOfficeIncludesFiles.php");
//--------------Checking for right---------------------
	if(isset($_POST['btnDel'])&& !empty($_POST['btnDel'])) $nRightId =98 ; else $nRightId =97 ;
	$objAdminUser=new clsAdminUser();
	$objAdminUser->m_objRoles=new clsRoles();
	$objAdminUser->m_intUserId=$_SESSION['intUserId'];
	$objAdminUser->m_objRoles->m_intRightId=$nRightId;
	if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
	{
		$objMails = new clsMails();
		$intRep = $_POST['hdnMailReply'];
		
		 /**
			To Check if not Set (Server Side Validation)
		 **/
		if(!isset($_REQUEST['chkid']))
		{
			header("location:Emails.php?intMessage=104&cmbMailReply=${intRep}");
			exit;
		}
		
		if(isset($_POST['btnDel']))
		{
			$objMails->m_arrEmilsIds = $_REQUEST['chkid'];
			$objMails->DeleteSelected();
			header("location:Emails.php?intMessage=106&cmbMailReply=${intRep}");
			exit;
		}
		else
		{
			$emails="";
			$counter=0;
			$strid="";
			$strTo="";
			$arrStrQry = array();
			$arrQryStr[]=ArrayToQryString($_REQUEST['chkid'],'chkid');
			$strQry = implode('&',$arrQryStr);
			foreach($_REQUEST['chkid'] as $id)
			{
				$sql="select * from emails where pkMailId=".$id."";
				$rs=mysql_query($sql);
				$res=mysql_fetch_array($rs);
		
				if($counter==0)
					{
						$strSubject=$res['Subject'];
						$strTo=$res['FromAddress'];
						$emails.=$res['FromAddress'];
						$strid=$id;
					}
					else
					{
						$emails.=",".$res['FromAddress'];
						$strid.=",".$id;
					}
				$counter++;
			}
			if($counter==1)
				$emails="";
		}
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
		if(f.toadd.value=="")
		{
			alert("Please enter to address");
			f.toadd.focus();
			return false;
		}
		if(f.fromadd.value=="")
		{
			alert("Please enter from address");
			f.fromadd.focus();
			return false;
		}
		if(f.subject.value=="")
		{
			alert("Please enter subject");
			f.subject.focus();
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
	<!-- InstanceBeginEditable name="body" --><br>
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
        <td colspan="2"><a href="Emails.php"><span class="txtBld_ornge">Emails</span></a>&nbsp;&gt;&gt;&nbsp;<span class="hdng_sandy">Email's Reply</span></td>
        </tr>
        <tr>
           <td colspan="2" align="center">
            <? include('../Includes/DisplayConfirmMessage.php');?>
          </td>
      </tr>
      <tr>
        <td>
          <form name="form1" method="post" action="EmailReplyAction.php" onSubmit="return Validate(this)">
            <table width="99%"  border="0" align="center" cellpadding="0" cellspacing="2" class="TabBorderLightGreyBG">
              <tr>
                <td class="txtBld_grn">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td width="17%" class="txtBld_grn">To <span class="txt_red">*</span> </td>
                <td width="83%">
                  <input name="toadd" type="text" class="txtBox_dkGrey" id="toadd" value="<?=$strTo?>" size="40">
                  <input name="strid" type="hidden" class="txtBox_dkGrey"  value="<?=$strid?>"></td>
              </tr>
              <tr>
                <td class="txtBld_grn">From<span class="txt_red">*</span></td>
                <td><input name="fromadd" type="text" class="txtBox_dkGrey" id="fromadd" size="40" value="<?=$strAdminEmail?>"></td>
              </tr>
              <tr>
                <td class="txtBld_grn">Subject <span class="txt_red">*</span></td>
                <td><input name="subject" type="text" class="txtBox_dkGrey" id="subject" size="40" value="<?php print "Re: ".$strSubject;?>"></td>
              </tr>
              <tr>
                <td class="txtBld_grn">Mail Body </td>
                <td><textarea name="mailbody" cols="65" rows="15" class="txtBox_dkGrey" id="mailbody"></textarea></td>
              </tr>
              <tr>
                <td class="txtBld_dkGrey">&nbsp;</td>
                <td>
				<input name="hdnEmailId" type="hidden" value="<?=$id;?>">
				<input name="chkid" type="hidden" value="<?=$strQry;?>">
				
				<input name="Submit" type="submit" class="button" value="Send"></td>
              </tr>
              <tr>
                <td class="txtBld_dkGrey">&nbsp;</td>
                <td>&nbsp;</td>
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
