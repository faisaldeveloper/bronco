<?
include("../Includes/BackOfficeIncludesFiles.php");
$objPages = new clsPages();
if($_REQUEST['LayoutId'])
	$nLayoutId=$_REQUEST['LayoutId'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?=CONST_BACKOFFICE_TITLE?>Page Layouts<?=CONST_BACKOFFICE_TITLE_END?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="websitebuilder.css" rel="stylesheet" type="text/css">
<script src="../Script/JavaScript.js"></script>
<link href="AdminArea.css" rel="stylesheet" type="text/css">
<script language="javascript">

</script>
</head>
<body topmargin="0">
	<table width="100%"  border="0" cellpadding="2" cellspacing="0" bordercolor="#FFFFFF" bgcolor="#FFFFFF" height="625">
		<tr><td height="20" class="hdng_sandy" colspan="2" valign="top">Select Layout For Page </td>
		</tr>
		<tr>
		  <td height="25" class="hdng_sandy" colspan="2">&nbsp;</td>
	  	</tr>
		<?
		$arrPageLayouts = $objPages->GetPageLayouts();
		$nCounter=0;
		if($arrPageLayouts != FALSE)
		{
		?>
			<tr>
			  <td valign="top" class="txtBld_grey">Page Design:</td>
			  <td valign="top" class="txtBld_grey">Preview:</td>
	  </tr>
			<tr>
				<td valign="top" width="150px">
				<select name="lstLayout" id="lstLayout" size="31" onChange="PreviewLayout();">
		<?  
			
					while($arrRecPageLayouts = mysql_fetch_object($arrPageLayouts))
					{
						$nCounter++;
						if($nCounter==1)
						{
							$npkPLID = $arrRecPageLayouts->pkPLId;
							$strPagLayoutDesc = $arrRecPageLayouts->DesignDetail;
						}	
		?>
						<option value="<?=$arrRecPageLayouts->DesignDetail?>" <? if($npkPLID == $arrRecPageLayouts->pkPLId) print "selected";?>><?=$arrRecPageLayouts->Name?></option>
		<?
					}
		?>
				</select>				</td>
				<td valign="top">
					<iframe id="frmLayout" height="506px" width="98%" frameborder="0" class="border_grey"></iframe>
					<script>PreviewLayout();</script>
				</td>
			</tr>
			<tr>
			  <td valign="top" colspan="2"><input name="hdnFrameID" type="hidden" id="hdnFrameID" value="<?=$_REQUEST['nFrameID']?>"><input name="Button" type="button" class="button" onClick="PopulateLayout()" value="Select">&nbsp;<input name="btnClose" type="button" class="button" id="btnClose" value="Close" onClick="window.close();"></td>
	  </tr>
	<?
		}
		else
			echo "<tr><td colspan=2 height=25 valign=top><span align='left' class='txt_red'>No Page Layout Exists</span></td>	</tr>";
	?>
	</table>
</body>
</html>