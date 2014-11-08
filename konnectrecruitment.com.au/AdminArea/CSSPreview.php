<?
require_once("../Includes/BackOfficeIncludesFiles.php");
$objTheme=new clsTheme();
$objTheme->GenerateCSSStyle($_REQUEST['hdnStyleId']);			
$strStyleName='';
$strStyleTitle='';
$rsRow=$objTheme->GetCSSStyleDetail($_REQUEST['hdnStyleId']);
if(mysql_num_rows($rsRow))
{
	$objRow=mysql_fetch_object($rsRow);
	$strStyleName=$objRow->StyleName;
	$strStyleTitle=$objRow->Title;
}
?>
<style>
.border_grey {
	border: 1px solid #666666;
}
</style>
<title><?=CONST_BACKOFFICE_TITLE?>Theme Manager - Preview Style<?=CONST_BACKOFFICE_TITLE_END?></title>
<table width="500" bgcolor="#FFFFFF" align="center">
  <tr>
	<td align="center"><font color="#000033" size="+6">Preview</font></td>
  </tr>
  <tr>
	<td>&nbsp;</td>
  </tr>
  <?
  if(isset($_REQUEST['hdnStyleId']))
  {
  ?>
	  <tr height="300">
		<td valign="top" class="border_grey">
			<table width="90%" class="<?=$strStyleName?>" align="center">
				<tr><td align="center"><?=$strStyleTitle?></td></tr>
			</table>		
		</td>
	  </tr>
  <?
  }
  else
  {
  ?>
	  <tr>
		<td align="center" valign="top">
			Please select style
		</td>
	  </tr>
  <?
  }
  ?>	  
  <tr>
	<td valign="top" align="center">
		<a href="#" onClick="window.close();">Close</a>
	</td>
  </tr>
</table>