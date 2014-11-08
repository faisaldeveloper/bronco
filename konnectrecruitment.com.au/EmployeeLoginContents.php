
<script language="javascript" type="text/javascript">
var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
function FormValidation(f)
{
	if(f.txtEmail.value=="")
	{
		alert("Please Enter Email");
		f.txtEmail.focus();
		return false;
	}
	if(reg.test(f.txtEmail.value)==false)
	{
		alert("Please Enter valid Email");
		f.txtEmail.focus();
		return false;
	}
	
	if(f.pwdEmpPassword.value=="")
	{
		alert("Please Enter Password");
		f.pwdEmpPassword.focus();
		return false;
	}
	return true;
}
</script>
<table width="98%" align="left" border="0" cellpadding="0" cellspacing="0">
<tbody>
<tr>
<td>  
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tbody>
<tr>
<td valign="bottom" width="38"><img src="images/Internal_body_top_left.jpg" /></td>
<td style="background-image:url(images/Internal_body_top_bg.jpg); background-repeat:repeat-x; background-position:bottom;" class="Heading" width="100%">Employer Login</td>
<td valign="bottom"><img src="images/Internal_body_top_right.jpg" /></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td class="LeftRightLine" style="background-image:url(images/body_bg.jpg); background-repeat:repeat-x; text-align:justify;height:400px;" valign="top"> 
<form method="post" action="EmpLoginAction.php" name="frmEmLogin" id="frmEmLogin" onsubmit="return FormValidation(this);">
<table width="92%" border="0" cellspacing="0" cellpadding="4" align="center">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr class="TableStyle2">
    <td >Email <span style="color:#900;">*</span></td>
    <td><input type="text" name="txtEmail" id="txtEmail" /></td>
  </tr>
  <tr class="TableStyle1">
    <td>Password <span style="color:#900;">*</span></td>
    <td><input type="password" name="pwdEmpPassword" id="pwdEmpPassword" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="btnLogin" class="button" value="&nbsp;Login&nbsp;"  /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><a href="EmpReg-28-s">Register As Employer</a><br /><a href="EmpForgetPass-31-s">Forgot Password</a></td>
  </tr>
</table>
</form>
</td>
</tr>
<tr>
<td align="right">  
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tbody>
<tr>
<td class="LeftBottomLine" width="100%">&nbsp;</td>
<td width="35"><img src="images/body_bottom_right.jpg" /></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
