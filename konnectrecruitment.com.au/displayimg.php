<?	
session_start();
require_once("Includes/db.php");
require_once("Includes/AllClasses.php");
require_once("Includes/functions.php");
require_once("Includes/GlobalOptions.php");
$imgname=$_REQUEST['imgname'];	
?><title>~~ Image Window ~~</title>

<table width="75%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center"><img name="image1" src="GalleryPictures/_<?=$imgname?>"></td>
  </tr>
  <tr> 
    <td align="left"><a href="#" style="cursor:hand" onClick="self.close()" ><?=$msgClose?></a></td>
  </tr>
</table>
