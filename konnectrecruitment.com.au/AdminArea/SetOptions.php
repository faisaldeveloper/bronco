<?
	require_once("../Includes/BackOfficeIncludesFiles.php");
//--------------Checking for right---------------------
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=93;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{
	/*
		*Creating Language Object
	*/	
	$objLanguage = new clsLanguage();	
	
	/*
		*Setting Default Language
	*/	
	$_SESSION['intLangId'] = $objLanguage->GetDefaultLang();
}//End Right If
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?>Site Global Options<?=CONST_BACKOFFICE_TITLE_END?></title>
<link href="../Includes/CalendarControl.css" rel="stylesheet" type="text/css">

<script language="javascript" src="../Script/JavaScript.js"></script>		
<script language="javascript" src="../Includes/CalendarControl.js"></script>		
<script>
function Validate(f)
{
	if((f.txtRowsPerPage.value=="")||(f.txtRowsPerPage.value==0))
	{
		alert("Please Enter No of Rows per Page ");
		f.txtRowsPerPage.focus();
		return false;
	}
	else if(isNaN(f.txtRowsPerPage.value))
	{
		alert("Please enter numeric value for No of Rows per Page");
		f.txtRowsPerPage.focus();
		return false;
	}
	else if(f.txtSiteTitle.value=="")
	{
		alert("Please Enter Site Title");
		f.txtSiteTitle.focus();
		return false;
	}
	else if(f.txtCompanyName.value=="")
	{
		alert("Please Enter Company Name");
		f.txtCompanyName.focus();
		return false;
	}
	else if(f.txtStAddress.value=="")
	{
		alert("Please Enter Street Address");
		f.txtStAddress.focus();
		return false;
	}
	else if(f.txtPostCode.value=="")
	{
		alert("Please Enter PostCode");
		f.txtPostCode.focus();
		return false;
	}
	else if(f.txtState.value=="")
	{
		alert("Please Enter State");
		f.txtState.focus();
		return false;
	}
	else if(f.txtPhoneNo.value=="")
	{
		alert("Please Enter Phone Number");
		f.txtPhoneNo.focus();
		return false;
	}

	else if(f.txtemail.value=="")
	{
		alert("Please Enter Admin(Sender) Email");
		f.txtemail.focus();
		return false;
	}
	else if((f.txtemail.value.length < 1)||(f.txtemail.value.indexOf("@") == -1)  || (f.txtemail.value.indexOf(".")==-1)|| (f.txtemail.value.indexOf(".")==0) || (f.txtemail.value.indexOf("@")==0) || (f.txtemail.value.indexOf("@")==f.txtemail.value.length-1) || (f.txtemail.value.indexOf(".")==f.txtemail.value.length-1)||(f.txtemail.value.indexOf("@")!=f.txtemail.value.lastIndexOf("@")) || ((f.txtemail.value.indexOf("@") > f.txtemail.value.lastIndexOf("."))) || ((f.txtemail.value.indexOf(".")+1)==f.txtemail.value.indexOf("@")) || ((f.txtemail.value.indexOf("@")+1)==f.txtemail.value.indexOf(".")))
	{
		alert("Please Enter a Valid Admin(Sender) Email");
		f.txtemail.focus();
		return false;
	}
	else if(f.txtemailRec.value=="")
	{
		alert("Please Enter Admin(Reciever) Email");
		f.txtemailRec.focus();
		return false;
	}
	else if((f.txtemailRec.value.length < 1)||(f.txtemailRec.value.indexOf("@") == -1)  || (f.txtemailRec.value.indexOf(".")==-1)|| (f.txtemailRec.value.indexOf(".")==0) || (f.txtemailRec.value.indexOf("@")==0) || (f.txtemailRec.value.indexOf("@")==f.txtemailRec.value.length-1) || (f.txtemailRec.value.indexOf(".")==f.txtemailRec.value.length-1)||(f.txtemailRec.value.indexOf("@")!=f.txtemailRec.value.lastIndexOf("@")) || ((f.txtemailRec.value.indexOf("@") > f.txtemailRec.value.lastIndexOf("."))) || ((f.txtemailRec.value.indexOf(".")+1)==f.txtemailRec.value.indexOf("@")) || ((f.txtemailRec.value.indexOf("@")+1)==f.txtemailRec.value.indexOf(".")))
	{
		alert("Please Enter a Valid Admin(Reciever) Email");
		f.txtemailRec.focus();
		return false;
	}
	else return true;
}
function SetScrollNewsOption(f,v)
{
	if (v==0)
	{
	f.txtLatestScrollNews.value='';
	f.txtLatestScrollNews.disabled=true;
	f.txtLastDaysScrollNews.disabled=false;
	return true;
	}
	else if (v==1)
	{
	f.txtLastDaysScrollNews.value='';
	f.txtLastDaysScrollNews.disabled=true;
	f.txtLatestScrollNews.disabled=false;
	return true;
	}
	if (v==2)
	{
	f.txtLatestNews.value='';
	f.txtLatestNews.disabled=true;
	f.txtLastDaysNews.disabled=false;
	return true;
	}
	else if (v==3)
	{
	f.txtLastDaysNews.value='';
	f.txtLastDaysNews.disabled=true;
	f.txtLatestNews.disabled=false;
	return true;
	}
}
function SelectLayoutAction(f)
{
	f.action="AddGalleryAction.php";	
	f.submit();
}
</script>
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
        <form name="frmOption" id="frmOption" method="post" action="SetOptionsAction.php" onSubmit="return Validate(this)">
          <table width="98%"  border="0" align="center" cellpadding="2" cellspacing="0">
		  <?
		  if($objAdminUser->CheckRightForAdmin()!=1)//Start Right If
			{
			?>
            <tr>
              <td class="txtBld_ornge" colspan="2">You are not authorised to view this page. <a href="<?=$_SERVER['HTTP_REFERER']?>"><< Back </a></td>
            </tr>
			<?
			}
			else {
			?>		  
            <tr>
              <td colspan="2" class="hdng_sandy">
                <table width="100%">
                    <tr>
                      <td width="5%"><img src="Images/icon_options_32x32.jpg" alt="Image"/></td>
                      <td width="95%" valign="middle"><span class="hdng_sandy">Site Global Options</span></td>
                  </tr>
                </table>
              </td>
            </tr>
 	<?         
		if(isset($_REQUEST['intMessage']))
		{
			$_SESSION['intLangId'] = $objLanguage->GetDefaultLang();	//Setting Default Language
			$objCMessage->m_intConfMsgId=$_REQUEST['intMessage'];
			$objCMessage = new clsConfirmMessage();
			$objCMessage->m_intConfMsgId=$_REQUEST['intMessage'];
			$rsCMessage=$objCMessage->GetMessage_BackOffice();
			if($rsCMessage!=FALSE)
			{
				$strRowCMessage=mysql_fetch_array($rsCMessage);
		?>
					<tr align="center">
					  <td colspan="2"  valign ='bottom' ><img src='../images/<?=$strRowCMessage['Image']?>'>&nbsp;
						  <? if($strRowCMessage['Indicator']==0){print "<span class='txt_grn'>".$strRowCMessage['ConfMsgDesc']."</span>";}else{print "<span class='txt_red'>".$strRowCMessage['ConfMsgDesc']."</span>";}?></td>
					</tr>
		<? 
			}
		}
		?>
            <tr>
              <td colspan="2">
              	<table width="100%"  border="0" cellspacing="0" cellpadding="2" class="TabBorderLightGreyBG">
   					 <tr>
                      <td colspan="2" class="TabHeading">General Options</td>
                    </tr>
					<tr>
				  <td width="30%" class="txtBld_grn">Site Title</td>
				  <td width="70%"><input name="txtSiteTitle" type="text" id="txtSiteTitle" value="<?=$strSiteTitle?>" size="40"></td>
				</tr>
                <tr>
                  <td class="txtBld_grn">No of Rows Per Page</td>
                  <td><input name="txtRowsPerPage" type="text" id="txtRowsPerPage" value="<?=$intRowsPerPage?>" size="8" maxlength="2"></td>
                </tr>
				 <tr>
				  <td width="30%" class="txtBld_grn">Company Name</td>
				  <td width="70%"><input name="txtCompanyName" type="text" id="txtCompanyName" value="<?=$strCompanyName?>" size="40"></td>
				</tr>
				 <tr>
				  <td width="30%" class="txtBld_grn">Street Address</td>
				  <td width="70%"><input name="txtStAddress" type="text" id="txtStAddress" value="<?=$strStAddress?>" size="40"></td>
				</tr>
				 <tr>
				  <td width="30%" class="txtBld_grn">Postcode</td>
				  <td width="70%"><input name="txtPostCode" type="text" id="txtPostCode" value="<?=$strPostCode?>" size="40"></td>
				</tr>
				 <tr>
				  <td width="30%" class="txtBld_grn">State</td>
				  <td width="70%"><input name="txtState" type="text" id="txtState" value="<?=$strState?>" size="40"></td>
				</tr>
				 <tr>
				  <td width="30%" class="txtBld_grn">Phone Number</td>
				  <td width="70%"><input name="txtPhoneNo" type="text" id="txtPhoneNo" value="<?=$strPhoneNo?>" size="40"></td>
				</tr>
				 <tr>
				  <td width="30%" class="txtBld_grn">Fax</td>
				  <td width="70%"><input name="txtFax" type="text" id="txtFax" value="<?=$strFax?>" size="40"></td>
				</tr>
				 <tr>
				  <td width="30%" class="txtBld_grn">Mobile</td>
				  <td width="70%"><input name="txtMobile" type="text" id="txtMobile" value="<?=$strMobile?>" size="40"></td>
				</tr>
                <tr>
                  <td class="txtBld_grn">Admin (sender) Email Address</td>
                  <td><input name="txtemail" type="text" id="txtemail" value="<?=$strAdminEmail?>" size="40"></td>
                </tr>
                <tr>
                  <td class="txtBld_grn">Admin (reciever) Email Address</td>
                  <td><input name="txtemailRec" type="text" id="txtemailRec" value="<?=$strAdminEmailRec?>" size="40"></td>
                </tr>
                <tr>
                  <td class="txtBld_grn">Quantity handling check </td>
                  <td><input name="rdbQuantity" type="radio" value="1" <? if($nQtyChk==1) echo "checked";?>>
                    Yes&nbsp;
                    <input name="rdbQuantity" type="radio" value="0" <? if($nQtyChk==0) echo "checked";?>>
                    No</td>
                </tr>
              </table></td>
            </tr>
			<?
			if(OnOff(CONST_MODULE_SCRNEWS))	//Start If SN
			{
			?>
				<tr>
				  <td colspan="2">
                  <table width="100%"  border="0" cellspacing="0" cellpadding="2" class="TabBorderLightGreyBG">
					<tr>
					  <td colspan="2" class="TabHeading">Set Scrolling News Options</td>
				    </tr>
					<tr>
					  <td width="30%" class="txtBld_grn">
					  <input type="radio" name="RadioGroup1" value="0" <? if ((isset($strLastDaysScrollNews) && (!empty($strLastDaysScrollNews)))) echo "checked";?> onClick="return SetScrollNewsOption(this.form,0)">From Last  </td>
					  <td width="70%">
					  <input name="txtLastDaysScrollNews" type="text" id="txtLastDaysScrollNews" size="8" maxlength="2" <? if ($strLastDaysScrollNews!=0) { print "value=".$strLastDaysScrollNews;} else print "value=''";?>> 
					  Days</td>
					</tr>
					<tr>
					  <td class="txtBld_grn">
					 <input type="radio" name="RadioGroup1" value="1"<? if ((isset($strLatestScrollNews) && (!empty($strLatestScrollNews)))) echo "checked";?> onClick="return SetScrollNewsOption(this.form,1)" >
	Latest </td>
					  <td><input name="txtLatestScrollNews" type="text" id="txtLatestScrollNews" size="8" maxlength="2" <? if ($strLatestScrollNews!=0) { print "value=".$strLatestScrollNews;} else print "value=''";?>>
						Days</td>
					</tr>
				  </table></td>
				</tr>
			<?
			}	// End If SN
			if(OnOff(CONST_MODULE_NEWS))	//Start If NM
			{
			?>
				<tr>
				  <td colspan="2">
                  <table width="100%"  border="0" align="center" cellpadding="4" cellspacing="0" class="TabBorderLightGreyBG">
					<tr>
					  <td colspan="2" class="TabHeading">Main News Page Setting</td>
				    </tr>
					<tr>
					  <td width="30%" class="txtBld_grn">Layout</td>
					  <td width="70%"><input name="hdnMainNewsLayout" id="hdnMainNewsLayout" type="hidden" value="<?=$strMainNewsLayout?>">
						<div id="divMainLayout" <? if ($strMainNewsLayout==0) {?>style="display:none"<? }?>>
							<table border="0" width="300px" cellpadding="0" cellspacing="0">
								<tr><td nowrap class="txtBld_grey">
									Preview
								</td></tr>
								<tr><td nowrap>
									<iframe height="180px" width="280px"  id="MainLayout" src="ImagePreview.php?nLayoutId=<?=$strMainNewsLayout?>" frameborder="0" class="border_grey"></iframe>
								</td></tr>
							</table> 
						</div>
						<a href="#" onClick="return SelectLayout('MainLayout','hdnMainNewsLayout','divMainLayout')">Select Layout</a>					</td>
					</tr>
					<tr>
					  <td class="txtBld_grn">
						<input type="radio" name="RadioGrpNews1" value="0"<? if ((isset($strLastDayMainNews) && (!empty($strLastDayMainNews)))) echo "checked";?> onClick="return SetScrollNewsOption(this.form,2)" >
	From Last  </td>
					  <td>
					  <input name="txtLastDaysNews" type="text" id="txtLastDaysNews" size="8" maxlength="2" <? if ($strLastDayMainNews!=0) { print "value=".$strLastDayMainNews;} else print "value=''";?>>
					  Days				  </td>
					</tr>
					<tr>
					  <td class="txtBld_grn">
						<input type="radio" name="RadioGrpNews1" value="1"<? if ((isset($strLatestMainNews) && (!empty($strLatestMainNews)))) echo "checked";?> onClick="return SetScrollNewsOption(this.form,3)" >
	Latest </td>
					  <td><input name="txtLatestNews" type="text" id="txtLatestNews" size="8" maxlength="2" <? if ($strLatestMainNews!=0) { print "value=".$strLatestMainNews;} else print "value=''";?>>
						Days</td>
					</tr>
					<tr>
					  <td class="txtBld_grn">Main news on Top</td>
					  <td><select name="lstMainNewsOnTop">
						<option <? if($strMainNewsOnTop == 1) print "selected";?> value="1">Yes</option>
						<option value="0" <? if($strMainNewsOnTop == 0) print "selected";?>>No</option>
					  </select></td>
					</tr>
					<tr>
					  <td class="txtBld_grn">News Per Row</td>
					  <td><input name="txtNewsPerRow" type="text" id="txtNewsPerRow" value="<? if($strNewsPerRow>0) print $strNewsPerRow;?>" size="8" maxlength="2" ></td>
					</tr>
					<tr>
					  <td colspan="2" class="TabHeading">More News Page Setting </td>
				    </tr>
					<tr>
					  <td class="txtBld_grn">Layout</td>
					  <td><input name="hdnMoreNewsLayout" id="hdnMoreNewsLayout" type="hidden" value="<?=$strMoreNewsLayout?>">
						<div id="divMoreLayout" <? if ($strMoreNewsLayout==0) {?>style="display:none"<? }?>>
							<table border="0" width="300px" cellpadding="0" cellspacing="0">
								<tr><td nowrap class="txtBld_grey">
									Preview
								</td></tr>
								<tr><td nowrap>
									<iframe height="180px" width="280px"  id="MoreLayout" src="ImagePreview.php?nLayoutId=<?=$strMoreNewsLayout?>" frameborder="0" class="border_grey"></iframe>
								</td></tr>
							</table> 
						</div>
						<a href="#" onClick="return SelectLayout('MoreLayout','hdnMoreNewsLayout','divMoreLayout')">Select Layout</a>					</td>
					</tr>
					<tr>
					  <td class="txtBld_grn">Main news on Top</td>
					  <td><select name="lstMoreNewsOnTop">
						<option <? if($strMoreNewsOnTop == 1) print "selected";?> value="1">Yes</option>
						<option value="0" <? if($strMoreNewsOnTop == 0) print "selected";?>>No</option>
					  </select></td>
					</tr>
					<tr>
					  <td class="txtBld_grn">News Per Row</td>
					  <td><input name="txtMoreNewsPerRow" type="text" id="txtMoreNewsPerRow" value="<? if($strMoreNewsPerRow!=0) print $strMoreNewsPerRow;?>" size="8" maxlength="2" ></td>
					</tr>
					<tr>
					  <td colspan="2" class="TabHeading">News Detail Page Setting </td>
				    </tr>
					<tr>
					  <td class="txtBld_grn">Layout</td>
					  <td><input name="hdnNewsDetailLayout" id="hdnNewsDetailLayout" type="hidden" value="<?=$strNewsDetailLayout?>">					
						<div id="divNewsDetailLayout" <? if ($strNewsDetailLayout==0) {?>style="display:none"<? }?>>
							<table border="0" width="300px" cellpadding="0" cellspacing="0">
								<tr><td nowrap class="txtBld_grey">
									Preview
								</td></tr>
								<tr><td nowrap>
									<iframe height="180px" width="280px"  id="NewsDetailLayout" src="ImagePreview.php?nLayoutId=<?=$strNewsDetailLayout?>" frameborder="0" class="border_grey"></iframe>
								</td></tr>
							</table> 
						</div>
						<a href="#" onClick="return SelectLayout('NewsDetailLayout','hdnNewsDetailLayout','divNewsDetailLayout')">Select Layout</a>					</td>
					</tr>
				  </table>
				  </td>
				</tr>
			<?
			} //End If NM
			?>	
			<tr>
			  <td width="30%" align="left">&nbsp;</td>
		    </tr>
			<tr>
				 <td>&nbsp;</td>
				 <td width="70%" align="left">
				 <?
					//--------------Checking for right---------------------
					$objAdminUser->m_intUserId=$_SESSION['intUserId'];
					$objAdminUser->m_objRoles->m_intRightId=95;
					if($objAdminUser->CheckRightForAdmin()==1)
					{
					?>
						<input name="Submit" type="submit" class="button" value=" Set Options">
					<? 
					}
					else
						print "&nbsp;";
				?>
			  </td>
			</tr>
			<?
				}//End Right If
			?>		  
          </table>
	  </form>
        <!-- InstanceEndEditable -->
    </td>	
  </tr>
  <tr>
    <td colspan="2"><?php include("Footer.php");?></td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>