<?
include_once("Includes/Constants.php");
include_once("Includes/clsConfiguration.php");
$objConfiguration=new clsConfiguration();
if(file_exists("Includes/".CONST_CONFG_FILE))
	$fptr=fopen("Includes/".CONST_CONFG_FILE,"r");
else unset($fptr);
if(isset($fptr))
{	
	$nsize=sizeof($fptr);
	if($nsize > 0)
	{
		$confile="ok";
		fclose($fptr);
		include("Includes/".CONST_CONFG_FILE);
		if($bInstallationCheck!==true)
		{
			header("location:index.php");
			exit;
		}	
		//Code to check out that all files exists or not
		$result=$objConfiguration->Checkfile("Includes/".CONST_DB_FILE);
		//echo "|||||".$result."|||";
		if($result=="true")
		$dbfile="ok";
		else $dbfile="error";
	}
	else
	{
		$confile="error";
		fclose($fptr);
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/Installer.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Installation</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->  
<style type="text/css">
<!--

-->
</style>
<link href="Install.css" rel="stylesheet" type="text/css" />
</head>

<body leftmargin="0" topmargin="0">
<table width="1002" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="90"><table width="1002" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="90" width="251"><img src="images/banner_01.gif" width="251" height="90" /></td>
        <td width="250"><img src="images/banner_02.gif" width="250" height="90" /></td>
        <td width="251"><img src="images/banner_03.gif" width="251" height="90" /></td>
        <td width="250"><img src="images/banner_04.gif" width="250" height="90" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="30">&nbsp;</td>
  </tr>
  <tr>
    <td height="400" align="center" valign="top"><table width="782" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="400" align="left" valign="top" class="border"><table width="782" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="68"><table width="782" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="68" width="196"><img src="images/installer_7.gif" width="196" height="68" /></td>
                <td width="195"><img src="images/installer_8.gif" width="195" height="68" /></td>
                <td width="196"><img src="images/installer_9.gif" width="196" height="68" /></td>
                <td width="195"><img src="images/installer_10.gif" width="195" height="68" /></td>
              </tr>
            </table></td>
          </tr>
          <tr valign="top">
            <td height="350" align="left"><table width="782" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="350" width="5"></td>
                <td width="215" align="left" valign="top" bgcolor="#EBEBEB">
				<!-- InstanceBeginEditable name="LeftPanel" -->
				<table width="215" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="10">&nbsp;</td>
                    <td colspan="4">&nbsp;</td>
                    <td width="10">&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td height="32" colspan="4" align="center" background="images/left-p_17.gif"><span class="style3">Installation </span></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="10"></td>
                    <td colspan="4"></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td height="36" width="23"><img src="images/button-left.gif" width="23" height="36" /></td>
                    <td width="11" background="images/button-bg.gif"></td>
                    <td width="127" background="images/button-bg.gif" class="body_red">Pre-installation</td>
                    <td width="35"><img src="images/buttonicon_26.gif" width="34" height="36" /></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr >
                    <td height="2"></td>
                    <td colspan="4"></td>
                    <td ></td>
                  </tr>
                  <tr>
                    <td height="2"></td>
                    <td colspan="4"></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td height="36"><img src="images/button-left.gif" width="23" height="36" /></td>
                    <td height="36" background="images/button-bg.gif">&nbsp;</td>
                    <td height="36" background="images/button-bg.gif" class="body_Bold">Step 1 </td>
                    <td height="36"><img src="images/button_31.gif" width="34" height="36" /></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="2"></td>
                    <td colspan="4"></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td height="36"><img src="images/button-left.gif" width="23" height="36" /></td>
                    <td height="36" background="images/button-bg.gif">&nbsp;</td>
                    <td height="36" background="images/button-bg.gif" class="body_Bold">Step 2 </td>
                    <td height="36"><img src="images/button_31.gif" width="34" height="36" /></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="2"></td>
                    <td colspan="4"></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td height="36"><img src="images/button-left.gif" width="23" height="36" /></td>
                    <td height="36" background="images/button-bg.gif">&nbsp;</td>
                    <td height="36" background="images/button-bg.gif" class="body_Bold">Step 3 </td>
                    <td height="36"><img src="images/button_31.gif" width="34" height="36" /></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td colspan="4">&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td colspan="4">&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                </table>
				<!-- InstanceEndEditable -->
				</td>
                <td width="5"></td>
                <td align="left" valign="top" width="557" height="370"><!-- InstanceBeginEditable name="body" -->
                  <table width="100%" border="0" cellspacing="0" cellpadding="2">
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
                        <tr>
                          <td width="68%" class=""><span class="headingbody">Pre - installation </span></td>
                         <td width="32%" height="24%" class="Heading"><table width="100%" border="0" cellspacing="0" cellpadding="2">
                           <tr>
                             <td align="right"><form action="InstallStep2.php">
                               <input type="submit" class="Button" value="Next  &gt;&gt;"  style="width:100px; height:24px;"/>
                                                          </form></td>
                           </tr>
                           <tr>
                             <td align="right">
                             <form action="<?=$_SERVER['PHP_SELF'];?>">
                               <input type="submit" class="Button" value="Check Again"  style="width:100px; height:24px;"/>
                             </form>
                             </td>
                           </tr>
                         </table></td>
                        </tr>
                        
                        <tr>
                          <td colspan="2">&nbsp;</td>
                        </tr>
                        <tr>
                          <td colspan="2">Please verify files listed below are present in specified location. If files are not present then get complate package </td>
                          </tr>
                        <tr>
                          <td colspan="2">&nbsp;</td>
                        </tr>
                        <tr>
                          <td colspan="2"><table width="100%" border="0" cellpadding="2" cellspacing="0" class="border">
                            <tr>
                              <td width="40%">- Includes/
                                <?=CONST_CONFG_FILE?></td>
                              <td width="60%"><? if($confile=="ok")echo "<strong>Avaliable</strong>"; else "<strong> << Not Avaliable</strong>"?></td>
                            </tr>
                            <tr>
                              <td>- Includes/
                                <?=CONST_DB_FILE?></td>
                              <td><? if($dbfile=="ok")echo "<strong>Avaliable</strong>"; else echo "<strong> << Not Avaliable</strong>";?></td>
                            </tr>
                          </table></td>
                          </tr>
                        
                        <tr>
                          <td colspan="2"><? 
		if($confile=="error" || $dbfile=="error")
		{
		?>
                            <strong>Some files are missing. Please re-download the package.</strong>
                            <? 
		} 
		if($confile=="ok" && $dbfile=="ok")
		{
		?>
                            <?
		}
		?></td>
                          </tr>
                      </table></td>
                    </tr>
                  </table>
                <!-- InstanceEndEditable --></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center" valign="bottom" class="body_green">Copyright &copy; DigitalSpinners, 2008.<br />
    All rights reserved. </td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
