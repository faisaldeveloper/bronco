<?php
	
	/**
	getting labels
	**/
	$objMessage=new clsMessages();
	$objMessage->m_intLangId=$_SESSION['intLangId'];
	$objMessage->m_intConId=CONST_CONCEPT_CONTACTUS;
	$arrLabels=$objMessage->GetLabels();
	if (isset($_SESSION['intMessage']) && !empty($_SESSION['intMessage']))
	{
		$_REQUEST['intMessage'] = $_SESSION['intMessage'];
	}
?>
	<script language="javascript">
	function isnotvalidEmail(f)
	{
		if(f.txtFrom.value=="")
		{
			alert("<? if(isset($arrLabels[124])) echo $arrLabels[124]; else echo "***"; ?>");
			f.txtFrom.focus();
			return false;
		}

		 if ((f.txtFrom.value.length < 1)||(f.txtFrom.value.indexOf("@") == -1)  || (f.txtFrom.value.indexOf(".")==-1)|| (f.txtFrom.value.indexOf(".")==0) || (f.txtFrom.value.indexOf("@")==0) || (f.txtFrom.value.indexOf("@")==f.txtFrom.value.length-1) || (f.txtFrom.value.indexOf(".")==f.txtFrom.value.length-1)||(f.txtFrom.value.indexOf("@")!=f.txtFrom.value.lastIndexOf("@")) || ((f.txtFrom.value.indexOf("@") > f.txtFrom.value.lastIndexOf("."))) || ((f.txtFrom.value.indexOf(".")+1)==f.txtFrom.value.indexOf("@")) || ((f.txtFrom.value.indexOf("@")+1)==f.txtFrom.value.indexOf(".")))
		{	
			alert("<? if (isset($arrLabels[165])) echo $arrLabels[165]; else echo "***";?>");
			f.txtFrom.focus();
			return false;
		}
		else
		if(f.txtSubject.value=="")
		{
			alert("<? if (isset($arrLabels[177])) echo $arrLabels[177]; else echo "***";?>");
			f.txtSubject.focus();
			return false;
		}
		else
		if(f.txrMailBody.value=="")
		{
			alert("<? if (isset($arrLabels[178])) echo $arrLabels[178]; else echo "***";?>");
			f.txrMailBody.focus();
			return false;
		}
		else
		if(f.txtCode.value=="")
		{ 
			alert("<? if (isset($arrLabels[526])) echo $arrLabels[526]; else echo "***";?>");
			f.txtCode.focus();
			return false;
		}
		else
			return true;
		
	}
	</script>
	<form name="f" action="ContactUsAction.php" method="post" onSubmit="return isnotvalidEmail(f)">
	  <table width="100%" border="0" align="center" cellpadding="2" cellspacing="0" class="TabBorder">
	  
	<tr class="TabHead">
			<td align="left" valign="middle" colspan="2">
			<? if(isset($arrLabels[13])) echo $arrLabels[13]; else echo "***"; ?>
	  </td>
			<td align="right" valign="middle">
				<img src="images/mail.png" />			</td>
	</tr>
        
                <tr>
                  <td width="23%" align="right" class="PageBodyBold">
                    <? if(isset($arrLabels[3])) echo $arrLabels[3]; else echo "***"; ?>&nbsp;:&nbsp;</td>
                  <td colspan="2"><?=$strAdminEmailRec?></td>
                </tr>
                <tr>
                  <td align="right" class="PageBodyBold">
                  <? if(isset($arrLabels[2])) echo $arrLabels[2]; else echo "***"; ?>&nbsp;:&nbsp;</td>
                  <td colspan="2"><input name="txtFrom" type="text" class="TextField" id="txtFrom" size="40" value="<?=$_SESSION['txtFrom'];?>"></td>
                </tr>
                <tr>
                  <td align="right" class="PageBodyBold">
                   <? if (isset($arrLabels[11])) echo $arrLabels[11]; else echo "***";?>&nbsp;:&nbsp;</td>
                  <td colspan="2"><input name="txtSubject" type="text" class="TextField" id="sub2" size="40" value="<?=$_SESSION['txtSubject'];?>"></td>
                </tr>
                <tr>
                  <td align="right" class="PageBodyBold">
                    <? if(isset($arrLabels[12])) echo $arrLabels[12]; else echo "***"; ?>&nbsp;:&nbsp;</td>
                  <td colspan="2"><textarea name="txrMailBody" cols="50" rows="10" class="TextField" id="txrMailBody"><?=$_SESSION['txrMailBody'];?></textarea></td>
                </tr>
                <tr>
                  <td align="right" class="txt_black"><? if(isset($arrLabels[524])) echo $arrLabels[524]; else echo "***"; ?>:&nbsp;</td>
                  <td colspan="2"><img src="Security-Image.php?width=144" width="144" height="30" alt="Security Image"/></td>
                </tr>
                <tr>
                  <td align="right" class="txt_black"><? if(isset($arrLabels[525])) echo $arrLabels[525]; else echo "***"; ?>:&nbsp; </td>
                  <td colspan="2"><input name="txtCode" type="text" id="txtCode" size="20"></td>
                </tr>
                <tr>
                  <td align="right">&nbsp;</td>
                  <td width="15%"><input name="Submit" type="submit" class="button" value="<? if(isset($arrLabels[14])) echo $arrLabels[14]; else echo "***"; ?>">
                  </td>
                  <td width="62%"><input name="Submit" type="reset" class="button" value="<? if(isset($arrLabels[398])) echo $arrLabels[398]; else echo "***"; ?>"></td>
                </tr>
        </table>
	    </form>
		<?
			unset($_SESSION['TextField']);unset($_SESSION['txtSubject']);unset($_SESSION['txrMailBody']);
		?>