<?
session_start();
include_once("Includes/Constants.php");
include_once("Includes/Configuration.inc.php");
include_once("Includes/clsConfiguration.php");
include_once("Includes/clsConfirmMessage.php");
include_once("Includes/clsLanguage.php");

if(isset($_REQUEST['strUser']))
	$strUser=$_REQUEST['strUser'];

if(isset($_REQUEST['strPass']))
	$strPass=$_REQUEST['strPass'];

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
                    <td height="32" colspan="4" align="center" background="images/left-p_17.gif"><span class="style3">Installation</span></td>
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
                    <td width="127" background="images/button-bg.gif" class="body_Bold">License</td>
                    <td width="35"><img src="images/button_31.gif" width="34" height="36" /></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr >
                    <td height="2"></td>
                    <td colspan="4"></td>
                    <td ></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td height="36" width="23"><img src="images/button-left.gif" width="23" height="36" /></td>
                    <td width="11" height="36" background="images/button-bg.gif">&nbsp;</td>
                    <td width="127" height="36" background="images/button-bg.gif" class="body_Bold">Step 1 </td>
                    <td height="36" width="35"><img src="images/button_31.gif" width="34" height="36" /></td>
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
                    <td height="36" background="images/button-bg.gif" class="body_red">Step 3 </td>
                    <td height="36"><img src="images/buttonicon_26.gif" width="34" height="36" /></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="2"></td>
                    <td colspan="4"></td>
                    <td></td>
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
                      <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
                        <tr>
                          <td width="64%" class="headingbody">Step 3</td>
                          <td width="14%"><form id="form1" name="form1" method="post" action="index.php">
                            <input name="button" type="submit" class="Button" id="button" value="View Site" />
                                                    </form>                          </td>
                          <td width="22%">
                            <form id="form2" name="form2" method="post" action="AdminArea/index.php">
                            <input name="button2" type="submit" class="Button" id="button2" value="Administration" />
                                  </form>                          </td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td colspan="3" class="txt_blue">Congratulations! CMS is installed</td>
                          </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td colspan="3"><table width="100%" border="0" cellpadding="2" cellspacing="0" class="border">
                            <tr>
                              <td width="42%">Click the 'View Site' button to start CMS site or &quot;Administration to take you to administration login.</td>
                              <td width="58%"><table width="100%" border="0" cellpadding="2" cellspacing="0" class="LightRow">
                                <tr>
                                  <td colspan="2" align="center" class="txt_blue">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td colspan="2" align="center" class="txt_blue">Administration Login Details</td>
                                  </tr>
                                
                                <tr>
                                  <td width="46%" align="right" class="txt_table">Username:</td>
                                  <td width="54%"><?=$strUser?></td>
                                </tr>
                                <tr>
                                  <td align="right" class="txt_table">Password:</td>
                                  <td><?=$strPass?></td>
                                </tr>
                                <tr>
                                  <td align="right">&nbsp;</td>
                                  <td>&nbsp;</td>
                                </tr>
                              </table></td>
                            </tr>
                          </table></td>
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
