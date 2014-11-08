<?php
include("../Includes/BackOfficeIncludesFiles.php");
include("../constants.php");
$name = $folders;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?>Folder List<?=CONST_BACKOFFICE_TITLE_END?></title>
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
		<table width="650"  border="0" align="center" cellpadding="2" cellspacing="0">
		  <tr>
			<td width="522" align="left" class="hdng_sandy">Manage Image Gallery Folders </td>
			<td width="120" class="MainHeading"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td class="Body"><a href="CreateFolder.php">Add new folder</a> </td>
			  </tr>
			</table></td>
		  </tr>
		</table>
		<table width="100%"  border="0" align="center" cellpadding="2" cellspacing="0" class="border_grey">
		<?php if(isset($_REQUEST['msg'])){?>
		  <tr>
			<td colspan="6" align="center" class="txt_RED">
				<?php if($_REQUEST['msg']=='cannot') echo "Can not delete folder, it has some data!";
					else echo "Folder deleted successfully";
				?>
			</td>
		  </tr>
		<?php
		}
		if(file_exists($name) && filesize($name) > 12)
		{
			$fileread=fopen($name,'r');
			$text=fread($fileread,filesize($name));	
			$text=str_replace("<?php /*","",$text);
			$text=str_replace("*/?>","",$text);
			$contents = explode(chr(255),$text);
			$no = count($contents)-1;
		?>
		  <tr>
			<td width="3%" align="center" class="TabHeading">#</td>
			<td width="70%" class="TabHeading">Description</td>
			<td colspan="4" align="center" class="TabHeading">Action</td>
		  </tr>
		 <?php
			for($counter=0;$counter < $no; $counter++)
			{
				$nFID = $counter;
		 ?>
		  <tr id="cg" valign="middle" 
				<?php 
				if($counter % 2 == 0)
				{
					echo "class='bg_ltGrey' onMouseOver=\"this.className='bg_rollOver'\" onMouseOut=\"this.className='bg_ltGrey'\""; 
				}
				else
				{
				echo " class='bg_ltGreen' onMouseOver=\"this.className='bg_rollOver'\" onMouseOut=\"this.className='bg_ltGreen'\"" ;
				}
			   ?>>
			<td align="center" class="txt_black"><?=$counter+1?></td>
			<td class="txt_black"><?=$contents[$counter]?></td>
			<form name="frmView" method="post" action="F_mngarkpictures.php">
			<td width="8%" align="left">
				<input type="hidden" name="lstViewFolder" value="<?=$nFID?>">
				<input name="btnView" type="submit" class="button" value="Upload Images">	
			</td>
			</form>
			<form name="frmView" method="post" action="ViewFolder.php">
			<td width="8%" align="left">
				<input type="hidden" name="hdnFID" value="<?=$nFID?>">
				<input name="btnView" type="submit" class="button" value="View">	
			</td>
			</form>
			<form name="frmEdit" method="post" action="EditFolder.php">
			<td width="9%" align="center">
				<input type="hidden" name="hdnFID" value="<?=$nFID?>">
				<input name="btnEdit" type="submit" class="button" value="Edit">	
			</td>
			</form>
			<form name="frmDel" method="post" action="DeleteFolder.php">
			<td width="10%" align="right">
				<input type="hidden" name="hdnFID" value="<?=$nFID?>">
				<input name="btnDel" type="submit" class="button" value="Delete" onClick="return confirm('Are you sure?')">	
			</td>
			</form>
		  </tr>
		 <?php
			}// end for loop
		 }
		 else
		 {
		 ?>
		  <tr>
			<td>&nbsp;</td>
			<td colspan="5" class="txt_RED">No record found!</td>
		  </tr>
		 <?php
		 }
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
