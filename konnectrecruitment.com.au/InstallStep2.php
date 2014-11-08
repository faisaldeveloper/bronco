<?
include("Includes/clsConfiguration.php");
$objConfiguration=new clsConfiguration();

$strUserName = "root";
$strHost = "localhost";

if(isset($_REQUEST['txtUserName']))
	$strUserName =$_REQUEST['txtUserName'];
if(isset($_REQUEST['txtPass']))
	$strPassword=$_REQUEST['txtPass'];
if(isset($_REQUEST['txtHost']))
	$strHost=$_REQUEST['txtHost'];
if(isset($_REQUEST['txtDbName']))
	$strDatabase=$_REQUEST['txtDbName'];
if(isset($_REQUEST['lstLanguage']))
	$nLangId=$_REQUEST['lstLanguage'];
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
						  <script language="JavaScript" type="text/javascript">
		  	function Validate(f)
				{
				 if(f.txtUserName.value=="")
				  {
				   alert("Please enter user name");
				   f.txtUserName.focus();
				   return false;
				  }
				 else if(f.txtHost.value=="") 
					{
					  alert("Please enter host name");
					   f.txtHost.focus();
					   return false;
					}
				else if(f.txtDbName.value=="") 
					{
					  alert("Please enter database name");
					   f.txtDbName.focus();
					   return false;

					}
				else
					return true;

				}
     </script>
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
                    <td width="127" background="images/button-bg.gif" class="body_Bold">Pre-installation</td>
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
                    <td width="127" height="36" background="images/button-bg.gif" class="body_red">Step 1 </td>
                    <td height="36" width="35"><img src="images/buttonicon_26.gif" width="34" height="36" /></td>
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
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>
					   <form action="<?=$_SERVER['PHP_SELF']?>" onsubmit="return Validate(this)">
					  <table width="100%" border="0" cellspacing="0" cellpadding="2">
					  <?
					  if(isset($_REQUEST['Db']))
						{	
					  ?>
                        <tr>
                          <td colspan="3" align="center" class="body_red" ><?
					
					$rsSql=$objConfiguration->CreateDatabase($_REQUEST['txtDbName'],$_REQUEST['txtHost'],$_REQUEST['txtUserName'],$_REQUEST['txtPass']);
					if($rsSql)
					{
							//echo "<font color='green'>Database created successfully</font>";
						$data="";
						//$data.="Task Detail,Status,Date,Hour Consumed,Project,DoneBy,SRS #\r\n\r\n";
						$strPath = "Includes/Configuration.inc.php";
						$file=fopen($strPath,"w+");
						$data="<?php \n";
						$data.= "$"."strUserName ='".$_REQUEST['txtUserName']."';\n";
						$data.= "$"."strPassword='".$_REQUEST['txtPass']."';\n";
						$data.= "$"."strHost='".$_REQUEST['txtHost']."';\n";
						$data.= "$"."strDatabase='".$_REQUEST['txtDbName']."';\n";
						$data.= "$"."bInstallationCheck=false".";\n";
						$data.="?>";
						$file_writing = fwrite($file,$data);
						fclose($file);
						header("location:CreateDatabase.php?nLangId=".$_REQUEST['lstLanguage']);
						exit;
					
				  ?>
						<?
						}
					else
						{
						?>
							Alert: MySQL Database already exist!	
                         <? 
						}
				}
						?>
                        	</td>
                          </tr>
                        <tr>
                          <td width="32%"><span class="headingbody">Step 1:</span></td>
                         <td width="27%" height="24" class="Heading"><br /><br /></td>
                         <td width="41%" height="24" align="right" class="Heading">
						 <input type="submit" class="Button" value="Next &gt;&gt;" name="Db" style="width:110px; height:24px;"/>                         </td>
                        </tr>
                        
                        <tr>
                          <td colspan="3" align="center" class="body_red">
                          	<?php 
								if (isset($_REQUEST['strMsg']) && !empty($_REQUEST['strMsg']))
									echo $_REQUEST['strMsg'];
							?>
                          </td>
                        </tr>
                        <tr>
                          <td colspan="3"><table width="100%" border="0" cellpadding="2" cellspacing="0" class="border">
                            <tr>
                              <td colspan="3" class="TabHead">MySQL Database Configuration</td>
                              </tr>
                            <tr>
                              <td width="24%">&nbsp;</td>
                              <td width="27%">&nbsp;</td>
                              <td width="49%">&nbsp;</td>
                            </tr>
                            <tr>
                              <td align="right"><span class="txt_table">MySQL User Name:</span></td>
                              <td><input type="text" name="txtUserName" value="<?=$strUserName?>" /></td>
                              <td>Somthing as 'root' or as given by the hoster </td>
                            </tr>
                            <tr>
                              <td align="right"><span class="txt_table"> MySQL Password:</span></td>
                              <td><input type="password" name="txtPass" value="<?=$strPassword?>" /></td>
                              <td>Enter password, for windows user on local PC usually empty</td>
                            </tr>
                            <tr>
                              <td align="right"><span class="txt_table">Host Name:</span></td>
                              <td><input type="text" name="txtHost" value="<?=$strHost?>" /></td>
                              <td>This is usually 'localhost' </td>
                            </tr>
                            <tr>
                              <td align="right"><span class="txt_table">MySQL Database Name:</span></td>
                              <td><input type="text" name="txtDbName" value="<?=$strDatabase?>" /></td>
                              <td>Enter database name </td>
                            </tr>
                            <tr>
                              <td align="right"><span class="txt_table">Default Language:</span></td>
                              <td>
                              	<select name="lstLanguage" style="width:100px">
                                	<option value="1" selected="selected" <? if($nLangId==1) echo "selected";?>>English</option>
	                                <option value="2" <? if($nLangId==2) echo "selected";?>>Norsk</option>
    	                          </select>
                               </td>
                              <td>Select your language </td>
                            </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td colspan="3">&nbsp;</td>
                        </tr>
                      </table>
					  </form>
					  </td>
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
