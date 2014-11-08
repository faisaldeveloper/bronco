

<?php
	/**
		Getting Labels
	**/

	$objMessage=new clsMessages();
	$objMessage->m_intLangId=$_SESSION['intLangId'];
	$objMessage->m_intConId=CONST_CONCEPT_LOGIN;
	$arrLabels=$objMessage->GetLabels();
?>
	<script language="javascript">
	function Validate(f)
	{
		if(f.txtUserLogin.value=="")
		{
			alert("<? if(isset($arrLabels[253])) echo $arrLabels[253]; else echo "***"; ?>!");
			f.txtUserLogin.focus();
			return false;
		}
		else if(f.txtUserPass.value=="")
		{
			alert("<? if(isset($arrLabels[254])) echo $arrLabels[254]; else echo "***"; ?>!");
			f.txtUserPass.focus();
			return false;
		}
		else return true;
	}
	</script>

<table width="100%"  border="0" cellspacing="0" cellpadding="2">
	 <tr>
	  <td align="left" valign="top">
	      <table width='96%' border='0' align='center' cellpadding='0' cellspacing='0' class = 'TabBorder'>
	    <form action='LoginAction.php' method='post' name='form1' id="form1" onsubmit = 'return Validate(this)'>
	    <tr align="left">
			<td valign='middle' class="TabHead">&nbsp;
				<? if(isset($arrLabels[193])) echo $arrLabels[193]; else echo "***"; ?>
			</td>
	        <td valign="middle" align="right" class="TabHead">
			<img src="images/login.png" height="28" /></td>
	    </tr>
	    <tr>
		  <td colspan="2" align='left' height="5"></td>
	    </tr>
		<tr><td colspan="2">
			<table width="100%" cellpadding="2" cellspacing="0" >
				<tr>
				  <td width="30%" align='left'><? if(isset($arrLabels[128])) echo $arrLabels[128]; else echo "***"; ?>:  </td>
				  <td width="70%" align='left'><input name='txtUserLogin' type='text' class="TextField" id="txtUserLogin" size="15" value="<?=$_REQUEST['strUserLogin'];?>" ></td>
				</tr>
				<tr>
				  <td align='left'><? if(isset($arrLabels[36])) echo $arrLabels[36]; else echo "***"; ?>: </td>
				  <td align='left'><input name='txtUserPass' type='password' class="TextField" id="txtPassword" size="15" /></td>
				</tr>
				<tr>
				  <td align='left'><?php if(isset($_GET['shopping']) && $_GET['shopping']=='yes'){?>
				  <input type="hidden" name="hdnShoppingCheck" value="yes"><?php }?>				  </td>
				  <td align='left'><input name='Submit' type='submit' class="button" value='<?=$arrLabels[128]?>'/></td>
				</tr>
				<tr align="center">
					<?php
					$iLinkPage = GEtModuleLink(8);
					?>
				<td colspan='2'><a href="Registration.php"><? if(isset($arrLabels[196])) echo $arrLabels[196]; else echo "***"; ?></a></td>
				</tr>
				<tr align="center">
				  <td colspan='2'><font color='blue'> <a href='ForgotPassword.php'><? if(isset($arrLabels[197])) echo $arrLabels[197]; else echo "***"; ?>...?</a></font> </td>
				</tr>
				<tr>
				  <td colspan="2" align='left'> </td>
				</tr>
		</table></td></tr>
          </form>
    </table>
        </td>
	  </tr>
</table>
