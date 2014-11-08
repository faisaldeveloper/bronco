<script language="javascript">
function fillSearch(f)
{
	if(f.txtSearch.value == "")	
	{
		alert("<?=$msgPleaseFillSearch?>");
		f.txtSearch.focus();
		return false;
	}
}
</script>
<?php
if(isset($_REQUEST['txtSearch']))
	$strSearchVal = $_REQUEST['txtSearch'];
else 
	$strSearchVal = "";
?>
<form name="form1" method="post" action="SiteSearchAction.php" onSubmit="return fillSearch(this)">
  
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="BorderWith_ltGrey_bg">
<tr>
  <td><table width="100%"  border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="56"><img src="Images/rtMenu_stSrch_lft.jpg" width="69" height="62"></td>
      <td align="left" valign="top" background="Images/rtMenu_bg_cntr.jpg" class="hdng_blue" style=" padding-top:12px"><?=$msgSiteSearch?></td>
      <td width="8"><img src="Images/rtMenu_rt.jpg" width="8" height="62"></td>
    </tr>
  </table></td>
</tr>
<tr>
  <td>
	  <table width="100%"  border="0" cellspacing="0" cellpadding="2">
		<tr>
		  <td width="6%"><?=$msgSearch?></td>
		  <td width="19%"><input type="text" name="txtSearch" value="<?=$strSearchVal?>"></td>
		  <td width="75%"><input name="image2" type="image" title="Site Search" value="View" src="Backoffice/Images/btn_view.gif" width="23" height="22" border="0"></td>
		</tr>
	  </table>
  </td>
</tr>
</table>
</form>
