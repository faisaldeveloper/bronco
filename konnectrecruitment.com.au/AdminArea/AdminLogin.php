<?php 
	require_once("../Includes/Constants.php");
	require_once("../Includes/Configuration.inc.php");
	require_once("../Includes/clsConfiguration.php");
	require_once("../Includes/AllClasses.php");
	require_once("../Includes/db.php");
	require_once("../Includes/clsNews.php");
	require_once("../Includes/clsLanguage.php");
	require_once("../Includes/clsConfirmMessage.php");
	require_once("../Includes/functions.php");

	$objNews = new clsNews();
	$objLanguage = new clsLanguage();
	if(empty($_REQUEST['intMessage']))
		$_REQUEST['intMessage']=408;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeBeforeLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?>Administrative Login<?=CONST_BACKOFFICE_TITLE_END?></title>
<script language="javascript">
	function Validate(f)
	{
		if (f.txtUserName.value == "")
		{
			alert("Please enter login");
			f.txtUserName.focus();
			return false;
		}
		else if (f.txtUserPass.value == "")
		{
			alert("Please enter password");
			f.txtUserName.focus();
			return false;
		}
		return true;
	}
	function ActiveLoginButton(f)
	{
		if (f.txtUserName.value == "" || f.txtUserPass.value == "")
		{
			document.getElementById("btnLogin").disabled=true;
		}
		else
		{
			document.getElementById("btnLogin").disabled=false;
		}
	}
</script>
<!-- InstanceEndEditable -->
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
<LINK REL=ICON HREF="Images/favicon.ico">
<LINK REL="SHORTCUT ICON" HREF="Images/favicon.ico">
<link href="AdminArea.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="98%"  border="0" align="center" cellpadding="0" cellspacing="0" class="MailTableBGColor">
  <tr>
    <td><?php $nIsLoginTemplate = 1; include("Header.php");?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="500" align="left" valign="top">
	<!-- InstanceBeginEditable name="Body" -->
  <table width="100%"  border="0" cellspacing="0" cellpadding="2">
  <tr><td height="50">&nbsp;</td></tr>
    <tr>
      <td align="center" height="10">
      <table width="500" border="0" cellpadding="0" cellspacing="0" class="TabBorderLightGreyBG">
        <tr>
          <td colspan="2" align="center" valign="bottom" height="30">&nbsp;</td>
        </tr>
            <tr>
              <td height="20" colspan="2" align="center" valign="bottom" >
            <?
                $objConfirmMessage = new clsConfirmMessage();
                if(isset($_REQUEST['intMessage']))
                {
                    $objConfirmMessage->m_intLangId=$_SESSION['intLangId'];
                    $objConfirmMessage->m_intConfMsgId=$_REQUEST['intMessage'];
                    $rsCMessage=$objConfirmMessage->GetMessage_BackOffice();
                    if($rsCMessage!=FALSE){
                        $strRowMessage=mysql_fetch_array($rsCMessage);
                ?>
                        <img src='../images/<?=$strRowMessage['Image']?>'>&nbsp;
                           <? if($strRowMessage['Indicator']==0){print "<span class='txt_grn'>".$strRowMessage['ConfMsgDesc']."</span>";}else{print "<span class='txt_red'>".$strRowMessage['ConfMsgDesc']."</span>";}?>
                <?
                    }
                }
                ?>&nbsp;
                </td>
            </tr>
        <tr>
          <td width="241" height="220" align="left" valign="middle">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="center"><img src="Images/login.png" alt="Login" width="180" height="180"></td>
            </tr>
          </table>
          </td>
          <td width="257" align="left" valign="middle">
           <form name="frmAdminLogin" method="post" action="AdminLoginAction.php" onSubmit="return Validate(frmAdminLogin);" onMouseMove="ActiveLoginButton(frmAdminLogin);">
           <table width="100%" border="0" cellspacing="0" cellpadding="2">
            <tr>
              <td colspan="2" class="hdng_sandy">Admin Login</td>
            </tr>
            <tr>
              <td colspan="2" height="6"></td>
            </tr>
            <tr>
              <td colspan="2" class="txtBld_grn">User Name </td>
            </tr>
            <tr>
              <td width="60%"><input name="txtUserName" type="text" id="txtUserName" size="30" maxlength="255" onKeyUp="ActiveLoginButton(frmAdminLogin);"></td>
              <td width="40%">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2" class="txtBld_grn">Password</td>
            </tr>
            <tr>
              <td><input name="txtUserPass" type="password" id="txtUserPass" size="30" maxlength="255" onKeyUp="ActiveLoginButton(frmAdminLogin);"></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td height="6" colspan="2"></td>
            </tr>
            <tr>
              <td align="right"><input name="btnLogin" type="submit" class="button" id="btnLogin" value="Login" disabled ></td>
              <td rowspan="3" align="center">&nbsp;</td>
            </tr>
            <tr>
              <td align="right">&nbsp;</td>
            </tr>
            <tr>
              <td align="right">&nbsp;</td>
            </tr>
          </table>
          </form>
          </td>
        </tr>
      </table></td>
    </tr>
  </table>
		 <script>
		 	document.forms[0].txtUserName.focus();
         </script>
      <!-- InstanceEndEditable -->
    </td>
  </tr>
  <tr>
    <td><?php include("Footer.php");?></td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
