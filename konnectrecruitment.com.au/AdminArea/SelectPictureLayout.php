<?
include("../Includes/BackOfficeIncludesFiles.php");
$objPages = new clsPages();
if($_REQUEST['hdnLayoutId'])
{
	$nLayoutId=$_REQUEST['hdnLayoutId'];
}
elseif($_REQUEST['hdnLayoutId1'])
{
	$nLayoutId=$_REQUEST['hdnLayoutId1'];
}
elseif($_REQUEST['hdnLayoutId2'])
{
	$nLayoutId=$_REQUEST['hdnLayoutId2'];
}

?>

<script language="javascript" src="../Script/JavaScript.js">

</script>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?=CONST_BACKOFFICE_TITLE?>Picture Layouts<?=CONST_BACKOFFICE_TITLE_END?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="AdminArea.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="100%" height="330"  border="0" cellpadding="2" cellspacing="0" bgcolor="#FFFFFF" class="TabBorderLightGreyBG">
<tr><td colspan="2" class="hdng_sandy" height=30>Select Layout</td></tr>
	<tr>
	  <td colspan="2" class="hdng_sandy" height=20>&nbsp;</td>
  	</tr>
	<?
	$nCounter = 0;
	if($arrLayoutImage != '')
	{	
	?>
		<tr>
		  <td align="left" class="txtBld_grey">Select Layout: </td>
		  <td align="left" class="txtBld_grey" >Preview:</td>
  		</tr>
		<tr>
			<td width="150" align="left" valign="top">
				<select size="13" id="lstLayout" onChange="PreviewImageLayout();">
					<? 
						foreach($arrLayoutImage as $nKey=>$arr)
						{
							$nCounter++;
							$strName = $arr[0];
							$strDesign = $arr[1];
							if($nCounter==1)
								$strPagLayoutDesc = $arr[1];
							//echo "<br>".$strImgName."     ".$strFileName."    ".$nKey;
					?>
							<option value="<?=$nKey?>" <? if($nCounter==1) print "selected";?>><?=$strName?></option>
					<?
						}
					?>	
			  </select>		
				<? 
				foreach($arrLayoutImage as $nKey=>$arr)
				{
				?>
					<input type="hidden" name="hdnDetail<?=$nKey?>" id="hdnDetail<?=$nKey?>" value="<?=$arr[1]?>">				
				<?		
				}	
				?>			</td>
			<td rowspan="2" align="left" valign="top">
				<iframe id="frmLayout" height="250px" width="250px" frameborder="0" class="border_grey"></iframe>
				<script>PreviewImageLayout();</script>			</td>
		</tr>
		<tr>
			<td align="left" valign="top"><input name="Button" type="button" class="button" onClick="transfer()" value="Select">
		 <input name="hdnHiddenName" type="hidden" id="hdnHiddenName" value="<?=$_REQUEST['hdnHiddenName']?>"><input name="hdnFrameName" type="hidden" id="hdnFrameName" value="<?=$_REQUEST['hdnFrameName']?>"><input name="hdnDivName" type="hidden" id="hdnDivName" value="<?=$_REQUEST['hdnDivName']?>">
		 <input name="button" type="button" class="button" onClick="window.close();" value="Close"></td>
       </tr>
	<?
	}
	else
		echo "<tr><td colspan=2 height=30><span align='left' class='txt_red'>No Layout Exists</span></td></tr>";
	?>
   </table>
</body>
</html>