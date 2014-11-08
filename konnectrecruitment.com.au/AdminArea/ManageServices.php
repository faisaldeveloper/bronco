<?
require_once("../Includes/BackOfficeIncludesFiles.php");
//--------------Checking for right---------------------
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=5;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{
///////////// Initialization ///////////////////
	$nLangId = $_SESSION['intLangId'];
$nParentId = 0;
	$strSearch='';
if(isset($_REQUEST['txtSearch']) && !empty($_REQUEST['txtSearch'])) 
	$strSearch=$_REQUEST['txtSearch'];
if(isset($_REQUEST['nParentId']) && !empty($_REQUEST['nParentId'])) 
	$nParentId=$_REQUEST['nParentId'];	
if($strSearch!='')
{
	$objServices->m_strServiceTitle=$strSearch;
	$rsServices=$objServices->GetServicesByTitle();
}
else
{
	$objServices->m_nfkParentId = $nParentId;
	$rsServices=$objServices->GetServicesByParentId();
}
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?><?=CONST_BACKOFFICE_TITLE_END?></title>
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
	<!-- InstanceBeginEditable name="body" -->
    <table width="100%" border="0" cellspacing="0" cellpadding="2">
	  <tr>
	    <td class="hdng_sandy">Manage Services</td>
	    </tr>
	  <tr>
	    <td align="right"></td>
	    </tr>
	  <tr>
	    <td align="right"><form name="frmSearc" method="post" action="">
	      <input type="text" name="txtSearch" id="txtSearch" value="<?=$strSearch?>">
	      <input name="button" type="submit" class="button" id="button" value="View">
        </form></td>
	    </tr>
	  <tr>
	    <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
	      <tr>
	        <td  class="TabHeading">Name</td>
			 <td  class="TabHeading">Action</td>
	        </tr>
            <?
			$sr=1;
			if($rsServices!=FALSE)
			{
				while($rowService=mysql_fetch_object($rsServices))
				{
					$nServiceId=$rowService->pkServiceId;
					$strServiceTitle=$rowService->ServiceTitle;
					
			?>
	      <tr <?php 
				if($sr % 2 == 0)
				{
					echo "class='bg_ltGrey' onMouseOver=\"this.className='bg_rollOver'\" onMouseOut=\"this.className='bg_ltGrey'\""; 
				}
				else
				{
				echo " class='bg_ltGreen' onMouseOver=\"this.className='bg_rollOver'\" onMouseOut=\"this.className='bg_ltGreen'\"" ;
				}
			   ?>
          >
	        <td class="brdr_dotedLt"><?=$strServiceTitle?></td>
            <td class="brdr_dotedLt"><a href="<?=$_SERVER['PHP_SELF']?>?nParentId=<?=$nServiceId?>" >Sub Cats</a></td>
	        </tr>
            <? $sr++; }
			
			}
			?>
	      </table></td>
	    </tr>
	  <tr>
	    <td>&nbsp;</td>
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