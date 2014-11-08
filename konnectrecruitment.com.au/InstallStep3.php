<?
include_once("Includes/Constants.php");
include_once("Includes/Configuration.inc.php");
include_once("Includes/clsConfiguration.php");
$objConfiguration=new clsConfiguration();
//echo "==>",$strHost;
//echo "\n==>",$strDatabase;
//echo "\n==>",$strUserName;
//echo "\n==>",$strPassword;
$nStat=$objConfiguration->GetDB($strHost, $strDatabase, $strUserName, $strPassword);
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
                    <td height="36" background="images/button-bg.gif" class="body_red">Step 2 </td>
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
                      <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
                        <tr>
                          <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="2">
                            
                            <tr>
                              <td width="37%"><span class="headingbody">Step 2:</span></td>
                              <td width="46%"></td>
							<form action="InstallStep4.php" method="post" name="form2" id="form2">
                              <td width="17%" align="right"><input name="submit" type="submit" class="Button" value="Next &gt;&gt;" style="width:100px; height:24px;" /></td>
							  </form>
                            </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td colspan="2">&nbsp;</td>
                        </tr>
                        <tr>
                          <td colspan="2" class="TabHead"><span class="TabHead">Database Creation</span></td>
                        </tr>
						 <?
			if($nStat!==true)
			{
		?>
                        <tr>
                          <td colspan="2"><?=$nStat?>
                            , check settings in Includes/Configuration.inc.php</td>
                        </tr>
				    <?		
			}
			else
			{
				$arrData=array();
				$arrDataTemp=array();
	
				if(!file_exists("Includes/".CONST_DB_FILE) || filesize("Includes/".CONST_DB_FILE)==0)
				{
		?>
			
                        <tr>
                          <td colspan="2">Script file Includes/
                            <?=CONST_DB_FILE?>not found.</td>
                        </tr>
	    <?			
				}
				
				$nSize=filesize("Includes/".CONST_DB_FILE);
				$fptr3 = fopen("Includes/".CONST_DB_FILE, 'r');
			
				//$rsSql=$objConfiguration->GetDBTables();
				if($rsSql)
				{
					$nTables=mysql_num_rows($rsSql);
					while($row=mysql_fetch_array($rsSql))
					{
						$arrDataTemp[$j]=$row[0];
						$objConfiguration->DeleteTable($row[0]);
						$j++;
					}
				}	
				$strData=fread($fptr3,$nSize);
				$arrData=explode("--__--", $strData);
				//print "<br> arr data ====>";
				//print_r($arrData);
				//exit;
				$i=0;
				$nStatus=1;
				if(!isset($_REQUEST['btnPrevious']))
				{
					if(!empty($arrData) && count($arrData)>0)
					{
						while($i<count($arrData) - 1 )
						{
							//echo "<br>";
							$strTempQry=$arrData[$i];//echo $tempqry;
							//print "->".$strTempQry."<-<hr>";
							if(trim($strTempQry)!='')
							{
								$nCheck=mysql_query($strTempQry);
								if($nCheck==0)
								{
									//print "here";
									//print "<br> qyr ===>".$strTempQry;
									$nStatus=0;
									break;
								}
							}	
							$i++;
						}
				}	}
				$rsSql=$objConfiguration->GetDBTables();
				$nTablesFinal=mysql_num_rows($rsSql);
				$j=0;
				unset($arrDataTemp);
				if($rsSql)
				while($row=mysql_fetch_array($rsSql))
				{
					$arrDataTemp[$j]=$row[0];
					//echo $arrDataTemp[$j];
					$j++;
				}
			?>
                        <tr>
                          <td colspan="2"><? 
				if($nStatus==1) 
				{
				?>
                            <p>The tables created successfully.</p>
                            <? 
				}
				?></td>
                        </tr>
                        <tr>
                          <td colspan="2" class="TabHead"><span class="TabHead">Database Information. </span></td>
                        </tr>
                        <tr>
                          <td width="38%"><span class="body_Bold">Host Name: </span></td>
                          <td width="62%"><?=$strHost?></td>
                        </tr>
                        <tr>
                          <td><span class="body_Bold">Username:</span></td>
                          <td><?=$strUserName?></td>
                        </tr>
                        <tr>
                          <td><span class="body_Bold">Database: </span></td>
                          <td><?=$strDatabase?></td>
						  <? 
			  if($nStatus==1)
			  {
			  ?>
                        </tr>
                        <tr>
                          <td colspan="2">&nbsp;</td>
                        </tr>
                        <tr>
                          <td colspan="2">Total numbers of database tables created from the script file:<strong>
                          <?=$nTablesFinal?>
                          </strong></td>
                        </tr>
                        <tr>
                          <td colspan="2">&nbsp;</td>
                        </tr>
							    <?
			  
			  }
			  else
			  {
					if(isset($arrDataTemp))
					{
						//$strDelTables=implode(",", $arrDataTemp);
						//$rs=$objConfiguration->DeleteDBTables($strDelTables);
					}	
			  ?>

                        <tr>
                          <td colspan="2"><span class="body_red">!SQL Script File Error.Please download the file again or Contact Digital Spinners.</span></td>
                        </tr>
						<? 
			  }
		}  
		?>
                        <tr>
                          <td colspan="2">&nbsp;</td>
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
