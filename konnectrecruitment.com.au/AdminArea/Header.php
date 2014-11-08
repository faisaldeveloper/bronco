<?
//error_reporting(E_ALL);
//ini_set('display_errors', '1');

	$arrGlobalOptions = GetGlobalOptions();
	$arrRecGlobalOptions = mysql_fetch_object($arrGlobalOptions);
	$strSiteTitle = $arrRecGlobalOptions->SiteTitle;

	//chekcing rights for change password
	$objAdminUser1=new clsAdminUser();
	$objAdminUser1->m_objRoles=new clsRoles();
	$objAdminUser1->m_intUserId=$_SESSION['intUserId'];

	$objAdminUser1->m_objRoles->m_intRightId=154;
	if($objAdminUser1->CheckRightForAdmin()==1)
		$strChangePassword = "ChangePassword.php";

?>
<table width="100%"  border="0" cellpadding="0" cellspacing="0" class="Header">
  <tr>
    <td width="11%" rowspan="3" align="center"><img src="Images/DSLOGO.gif" /></td>
    <td height="10" colspan="2" align="center"></td>
  </tr>
  <tr>
    <td align="center"><?=$strSiteTitle;?> : Administration Area</td>
    <td width="18%" rowspan="2" align="right" valign="middle" >
    <? if(isset($_SESSION['intUserId']) && !empty($_SESSION['intUserId'])){
    ?>
    <a href="<? echo $strChangePassword; ?>"><span class="footer">Change Password</span></a>&nbsp;<span class="footer">|</span>&nbsp;<a href="Logout.php" onclick="return confirm('Are you sure to logout');"><span class="footer">Logout</span></a><? }?>&nbsp;</td>
  </tr>
  <tr>
    <td width="71%" height="22" align="center" class="BlinkingError"><noscript>Attention! Dear user your browser's Javascript is disabled, please enable for full functionality.</noscript></td>
     <?
    if($nIsLoginTemplate!=1)
    {
    ?>
   <? }?>
  </tr>
</table>
