<? 
	/**
	Getting labels
	**/
	$objMessage=new clsMessages();
	$objMessage->m_intLangId=$_SESSION['intLangId'];
	$objMessage->m_intConId=CONST_CONCEPT_EMAIL;
	$arrLabels=$objMessage->GetLabels();
	if(isset($_REQUEST['NewsId']) && !empty($_REQUEST['NewsId']))
		$nNewsId = $_REQUEST['NewsId'];
	/**
	Varaibles initialization.
	**/	
	$strName = "";
	$strFName = "";
	$strEmail = "";
	$strFEmail = "";
	$strMsg = "";
	/**
	If the page is redirected
	**/
	if(isset($_REQUEST['txtYourName'])&& !empty($_REQUEST['txtYourName']))
	{
	$strName = $_REQUEST['txtYourName'];
	}
	if(isset($_REQUEST['txtYourEmail'])&& !empty($_REQUEST['txtYourEmail']))
	{
	$strEmail = $_REQUEST['txtYourEmail'];
	}
	if(isset($_REQUEST['txtFriendEmail'])&& !empty($_REQUEST['txtFriendEmail']))
	{
	$strFEmail = $_REQUEST['txtFriendEmail'];
	}
	if(isset($_REQUEST['txrMessage'])&& !empty($_REQUEST['txrMessage']))
	{
	$strMsg = $_REQUEST['txrMessage'];                  
	}
	if(isset($_REQUEST['txtFriendName'])&& !empty($_REQUEST['txtFriendName']))
	{
	$strFName = $_REQUEST['txtFriendEmail'];
	}
	
	
?>

<script language="javascript">
	function validate(f)
	{
		if(f.txtYourName.value=="")
		{
			alert("<? if(isset($arrLabels[111])) echo $arrLabels[111]; else echo "***"; ?>");
			f.txtYourName.focus();
			return false;
		}
		else if(f.txtYourEmail.value=="")
		{
			alert("<? if(isset($arrLabels[112])) echo $arrLabels[112]; else echo "***"; ?>");
			f.txtYourEmail.focus();
			return false;
		}
		else if ((f.txtYourEmail.value.length < 1)||(f.txtYourEmail.value.indexOf("@") == -1)  || (f.txtYourEmail.value.indexOf(".")==-1)|| (f.txtYourEmail.value.indexOf(".")==0) || (f.txtYourEmail.value.indexOf("@")==0) || (f.txtYourEmail.value.indexOf("@")==f.txtYourEmail.value.length-1) || (f.txtYourEmail.value.indexOf(".")==f.txtYourEmail.value.length-1)||(f.txtYourEmail.value.indexOf("@")!=f.txtYourEmail.value.lastIndexOf("@")) || ((f.txtYourEmail.value.indexOf("@") > f.txtYourEmail.value.lastIndexOf("."))) || ((f.txtYourEmail.value.indexOf(".")+1)==f.txtYourEmail.value.indexOf("@")) || ((f.txtYourEmail.value.indexOf("@")+1)==f.txtYourEmail.value.indexOf(".")))
		{
			alert("<? if(isset($arrLabels[113])) echo $arrLabels[113]; else echo "***"; ?>")
			f.txtYourEmail.focus();
			return false;
		}
		else if(f.txtFriendName.value=="")
		{
			alert("<? if(isset($arrLabels[114])) echo $arrLabels[114]; else echo "***"; ?>");
			f.txtFriendName.focus();
			return false;
		}
		else if(f.txtFriendEmail.value=="")
		{
			alert("<? if(isset($arrLabels[115])) echo $arrLabels[115]; else echo "***"; ?>");
			f.txtFriendEmail.focus();
			return false;
		}
		else if ((f.txtFriendEmail.value.length < 1)||(f.txtFriendEmail.value.indexOf("@") == -1)  || (f.txtFriendEmail.value.indexOf(".")==-1)|| (f.txtFriendEmail.value.indexOf(".")==0) || (f.txtFriendEmail.value.indexOf("@")==0) || (f.txtFriendEmail.value.indexOf("@")==f.txtFriendEmail.value.length-1) || (f.txtFriendEmail.value.indexOf(".")==f.txtFriendEmail.value.length-1)||(f.txtFriendEmail.value.indexOf("@")!=f.txtFriendEmail.value.lastIndexOf("@")) || ((f.txtFriendEmail.value.indexOf("@") > f.txtFriendEmail.value.lastIndexOf("."))) || ((f.txtFriendEmail.value.indexOf(".")+1)==f.txtFriendEmail.value.indexOf("@")) || ((f.txtFriendEmail.value.indexOf("@")+1)==f.txtFriendEmail.value.indexOf(".")))
		{
			alert("<? if(isset($arrLabels[116])) echo $arrLabels[116]; else echo "***"; ?>");
			f.txtFriendEmail.focus();
			return false
		}	
		else if(f.txrMessage.value=="")
		{
			alert("<? if(isset($arrLabels[117])) echo $arrLabels[117]; else echo "***"; ?>");
			f.txrMessage.focus();
			return false;
		}
		return true;
	}
</script>

<table width="96%" align="center" cellpadding="4" cellspacing="0" class="TabBorder">
  <tr>
    <td align="left" class="TabHead"><? if(isset($arrLabels[175])) echo $arrLabels[175]; else echo "***"; ?>&nbsp;</td>
    <td align="right" class="TabHead"><img src="images/mail.png" /></td>
  </tr>
  <tr>
    <td colspan="2" align="left">
<table width="100%"  border="0">
  <tr>
    <td align="left"><form name="form1" method="post" action="EmailToFriendAction.php?NewsId=<?=$nNewsId?>" onSubmit="return validate(this)">
      <table width="96%"  border="0" align="center" cellpadding="2" cellspacing="0" class="border">
        <tr>
          <td align="center" class="hdng_rtPanel">&nbsp;</td>
          <td align="left" class="hdng_yellow"><? if(isset($arrLabels[106])) echo $arrLabels[106]; else echo "***"; ?></td>
        </tr>
        
		
		
			
        <tr>
          <td width="37%" align="right"><? if(isset($arrLabels[107])) echo $arrLabels[107]; else echo "***"; ?><span class="txt_red">*</span> :</td>
          <td width="63%" align="left"><input name="txtYourName" type="text" class="TextField" id="txtYourName" size="50" value="<?=$strName?>"></td>
        </tr>
        <tr>
          <td align="right"><? if(isset($arrLabels[108])) echo $arrLabels[108]; else echo "***"; ?><span class="txt_red">*</span> :</td>
          <td align="left"><input name="txtYourEmail" type="text" class="TextField" id="txtYourEmail" size="50" value="<?=$strEmail?>"></td>
        </tr>
        <tr>
          <td align="right"><? if(isset($arrLabels[109])) echo $arrLabels[109]; else echo "***"; ?><span class="txt_red">*</span> :</td>
          <td align="left"><input name="txtFriendName" type="text" class="TextField" id="txtFriendName" size="50" value="<?=$strFName?>">            </td>
        </tr>
        <tr>
          <td align="right"><? if(isset($arrLabels[110])) echo $arrLabels[110]; else echo "***"; ?><span class="txt_red">* </span> :</td>
          <td align="left"><input name="txtFriendEmail" type="text" class="TextField" id="txtFriendEmail" size="50" value="<?=$strFEmail?>"></td>
        </tr>
        <tr>
          <td align="right"><? if(isset($arrLabels[106])) echo $arrLabels[106]; else echo "***"; ?><span class="txt_red"> *</span> :</td>
          <td align="left"><textarea name="txrMessage" cols="30" rows="7" class="TextField" id="txrMessage"><?=$strMsg?></textarea></td>
        </tr>
        <tr>
		  <td align="right"><input type="hidden" name="hdnurl" value="<?=$_SERVER['HTTP_REFERER']?>"></td>
           <td align="left"><input type="submit" name="Submit" value="<? if(isset($arrLabels[14])) echo $arrLabels[14]; else echo "***"; ?>" class="button"></td>
        </tr>
      </table>
    </form></td>
  </tr>
</table>
</table>
