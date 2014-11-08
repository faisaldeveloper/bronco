<?php
session_start();
include("Includes/FrontIncludes.php");	
include("Includes/Labels.php");
$imgname=$_REQUEST['imgname'];	
?>
<title>~~ <?=$msgImageWindow?> ~~</title>

<link href="abeco.css" rel="stylesheet" type="text/css">
<table width="75%" border="0" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <td colspan="3" valign="bottom"><div align="center"><img name="image1" src="<?=$imgname?>"></div></td>
  </tr>
  <tr> 
    <td width="3%" align="left" class="header_links">&nbsp;</td>
    <td width="7%" align="left" bgcolor="#000000" class="header_links"><a href="#"  onClick="self.close()"><?=$msgColse?></a></td>
    <td width="91%" align="left" class="header_links">&nbsp;</td>
  </tr>
</table>
