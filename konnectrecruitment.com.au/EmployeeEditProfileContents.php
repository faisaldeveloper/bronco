<?php
$nEmpId = $_SESSION['EmpId'];
$objEmployeer->m_npkEmpId = $nEmpId;
$RsEmployeer = $objEmployeer->GetEmployeerById();
if($RsEmployeer!=FALSE && mysql_num_rows($RsEmployeer)>0)
{
	$RowEmployer = mysql_fetch_object($RsEmployeer);
	$strCompanyName = $RowEmployer->CompanyName;
	$strContactPerson = $RowEmployer->ContactPerson;
	$strSubrubs = $RowEmployer->Subrubs;
	$nStateId = $RowEmployer->fkStateId;
	$strPostCode = $RowEmployer->PostCode;
	$strTelPhoneNo = $RowEmployer->TelePhone;
	$strWebSiteUrl = $RowEmployer->WebSiteUrl;
	$strAddress = $RowEmployer->Address;
}
?>
<script language="javascript" type="text/javascript">
var digits = "0123456789";
var phoneNumberDelimiters = "- +";
function checkInternationalPhone(strPhone){
var bracket=3
strPhone=trim(strPhone)
if(strPhone.indexOf("+")>1) return false
if(strPhone.indexOf("-")!=-1)bracket=bracket+1
if(strPhone.indexOf("(")!=-1 && strPhone.indexOf("(")>bracket)return false
var brchr=strPhone.indexOf("(")
if(strPhone.indexOf("(")!=-1 && strPhone.charAt(brchr+2)!=")")return false
if(strPhone.indexOf("(")==-1 && strPhone.indexOf(")")!=-1)return false
s=stripCharsInBag(strPhone,validWorldPhoneChars);
return (isInteger(s) && s.length >= minDigitsInIPhoneNumber);
}
function FormValidation(f)
{
	if(f.txtCompanyName.value=="")
	{
		alert("Please Enter Company Name");
		f.txtCompanyName.focus();
		return false;
	}
	if(f.txtContactPerson.value=="")
	{
		alert("Please Enter Contact Person Name");
		f.txtContactPerson.focus();
		return false;
	}
	if(f.txtAddress.value=="")
	{
		alert("Please Enter Address");
		f.txtAddress.focus();
		return flase;
	}
	if(f.txtSubrubs.value=="")
	{
		alert("Please Enter Surbubs");
		f.txtSubrubs.focus();
		return false;
	}
	if(f.txtPostCode.value=="")
	{
		alert("Please Enter Company Name");
		f.txtPostCode.focus();
		return false;
	}
	if(f.txtTelePhone.value=="")
	{
		alert("Please Enter TelePhone");
		f.txtTelePhone.focus();
		return false;
	}
	if(checkInternationalPhone(f.txtTelePhone.value)==false)
	{
		alert("Please Enter Valid TelePhone");
		f.txtTelePhone.focus();
		return false;
	}
	return true;
	
}
</script>

<table width="98%" align="left" border="0" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td valign="bottom" width="38"><img src="images/Internal_body_top_left.jpg" /></td>
              <td style="background-image:url(images/Internal_body_top_bg.jpg); background-repeat:repeat-x; background-position:bottom;" class="Heading" width="100%">Edit Profile</td>
              <td valign="bottom"><img src="images/Internal_body_top_right.jpg" /></td>
            </tr>
          </tbody>
        </table></td>
    </tr>
    <tr>
      <td class="LeftRightLine" style="background-image:url(images/body_bg.jpg); background-repeat:repeat-x; text-align:justify;"><form name="frmEmpReg" id="frmEmpReg" method="post" action="EditEmpProfileAction.php" onsubmit="return FormValidation(this);">
          <table width="92%" border="0" cellspacing="0" cellpadding="4">
            <tr>
              <td>Company  Name <span style="color:#900;">*</span></td>
              <td><input type="text" name="txtCompanyName" id="txtCompanyName" value="<?=$strCompanyName?>" /></td>
            </tr>
            <tr>
              <td>Contact  Person <span style="color:#900;">*</span></td>
              <td><input type="text" name="txtContactPerson" id="txtContactPerson" value="<?=$strContactPerson?>" /></td>
            </tr>
            <tr>
              <td>Address <span style="color:#900;">*</span></td>
              <td><input type="text" name="txtAddress" id="txtAddress" value="<?=$strAddress?>" /></td>
            </tr>
            <tr>
              <td>Suburb <span style="color:#900;">*</span></td>
              <td><input type="text" name="txtSubrubs" id="txtSubrubs" value="<?=$strSubrubs?>" /></td>
            </tr>
            <tr>
              <td>State <span style="color:#900;">*</span></td>
              <td><select name="lstState" id="lstState">
                  <option value="0">--Select State--</option>
                  <?php
    $rsState=$objState->GetAllState();
	if($rsState!=FALSE && mysql_num_rows($rsState)>0)
	{
		while($RowState = mysql_fetch_object($rsState))
		{
	?>
                  <option value="<?=$RowState->pkStateId?>" <?php if($RowState->pkStateId==$nStateId) echo 'selected="selected"';?> >
                  <?=$RowState->StateName?>
                  </option>
                  <?php
		}
	}
	?>
                </select></td>
            </tr>
            <tr>
              <td>Postcode <span style="color:#900;">*</span></td>
              <td><input type="text" name="txtPostCode" id="txtPostCode" value="<?=$strPostCode?>" /></td>
            </tr>
            <tr>
              <td>Telephone  (with Area Code) <span style="color:#900;">*</span></td>
              <td><input type="text" name="txtTelePhone" id="txtTelePhone" value="<?=$strTelPhoneNo?>" /></td>
            </tr>
            <tr>
              <td>Website <span style="color:#900;">*</span></td>
              <td><input type="text" name="txtWebUrl" id="txtWebUrl" value="<?=$strWebSiteUrl?>" /></td>
            </tr>
          </table>
        </form></td>
    </tr>
    <tr>
      <td align="right"><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td class="LeftBottomLine" width="100%">&nbsp;</td>
              <td width="35"><img src="images/body_bottom_right.jpg" /></td>
            </tr>
          </tbody>
        </table></td>
    </tr>
  </tbody>
</table>
