<?php 

if(isset($_REQUEST['intMessage']))
{
	$objCMessage=new clsConfirmMessage();
	$objCMessage->m_intConfMsgId=$_REQUEST['intMessage'];
	$rsCMessage=$objCMessage->GetMessage();
}
?>
<script language="javascript">
function isnotvalidEmail(f)
{
	
	//if ((f.from.value.length < 1)||(f.from.value.indexOf("@") == -1) || (f.from.value.indexOf(".")==-1) || (f.from.value.indexOf(".")==0) || (f.from.value.indexOf("@")==0) || (f.from.value.indexOf("@")==f.from.value.length-1) || (f.from.value.indexOf(".")==f.from.value.length-1)||(f.from.value.indexOf("@")!=f.from.value.lastIndexOf("@")) || (f.from.value.indexOf(".")!=f.from.value.lastIndexOf(".")) || ((f.from.value.indexOf(".")+1)==f.from.value.indexOf("@")) || ((f.from.value.indexOf("@")+1)==f.from.value.indexOf(".")))
	 if ((f.txtFrom.value.length < 1)||(f.txtFrom.value.indexOf("@") == -1)  || (f.txtFrom.value.indexOf(".")==-1)|| (f.txtFrom.value.indexOf(".")==0) || (f.txtFrom.value.indexOf("@")==0) || (f.txtFrom.value.indexOf("@")==f.txtFrom.value.length-1) || (f.txtFrom.value.indexOf(".")==f.txtFrom.value.length-1)||(f.txtFrom.value.indexOf("@")!=f.txtFrom.value.lastIndexOf("@")) || ((f.txtFrom.value.indexOf("@") > f.txtFrom.value.lastIndexOf("."))) || ((f.txtFrom.value.indexOf(".")+1)==f.txtFrom.value.indexOf("@")) || ((f.txtFrom.value.indexOf("@")+1)==f.txtFrom.value.indexOf(".")))
	{	
		alert("<?=$msgInvalidEmail?>");
		f.txtFrom.focus();
		return false;
	}
	else
	if(f.txtSubject.value=="")
	{
		alert("<?=$msgSubjectEmpty?>");
		f.txtSubject.focus();
		return false;
	}
	else
	if(f.txrMailBody.value=="")
	{
		alert("<?=$msgMailBodyEmpty?>");
		f.txrMailBody.focus();
		return false;
	}
	else
		return true;
	
}
</script>
              <table width="98%" border="0" align="center" cellpadding="2" cellspacing="0" class="Body"><form name="f" action="ContactUsAction.php" method="post" onSubmit="return isnotvalidEmail(this)">
                <tr>
                  <td colspan="3" align="left" class="hdng_yellow">&nbsp;</td>
                </tr>
        <?
		if(isset($_REQUEST['intMessage']) && $rsCMessage!=FALSE)
		{   
			$strRowMessage=mysql_fetch_array($rsCMessage);
		?>
	  <tr align="center">
		<td colspan ='3' valign ='bottom' class="txt_errMsg_ornge" ><img src='images/<?=$strRowMessage['Image']?>' />&nbsp;
			<? if($strRowMessage['Indicator']==0){print "<span class='txt_cyan'>".$strRowMessage['ConfMsgDesc']."</span>";}else{print "<span class='txt_mstrd'>".$strRowMessage['ConfMsgDesc']."</span>";}?></td>
	  </tr>
	  <? }?>
                <tr>
                  <td width="23%" align="right" class="txt_black"> <span class="SubHeading">
                    <?=$msgTo?></span>&nbsp;:&nbsp;</td>
                  <td colspan="2"><?=$ContactUsEmail?></td>
                </tr>
                <tr>
                  <td align="right" class="txt_black"> <span class="SubHeading">
                    <?=$msgFrom?></span>&nbsp;:&nbsp;</td>
                  <td colspan="2"><input name="txtFrom" type="text" class="TextField" id="txtFrom" size="40"></td>
                </tr>
                <tr>
                  <td align="right" class="txt_black"> <span class="SubHeading">
                    <?=$msgSubject?></span>&nbsp;:&nbsp;</td>
                  <td colspan="2"><input name="txtSubject" type="text" class="TextField" id="sub2" size="40"></td>
                </tr>
                <tr>
                  <td align="right" class="txt_black"> <span class="SubHeading">
                    <?=$msgMessage?></span>&nbsp;:&nbsp;</td>
                  <td colspan="2"><textarea name="txrMailBody" cols="50" rows="10" class="TextField" id="txrMailBody"></textarea></td>
                </tr>
                <tr>
                  <td align="right">&nbsp;</td>
                  <td width="15%"><input name="Submit" type="submit" class="Button" value="<?=$msgSend?>">
                  </td>
                  <td width="62%"><input name="Submit2" type="reset" class="Button" value="<?=$msgReset?>"></td>
                </tr>
                    </form>
              </table>
		