<?php
	/**
		Getting Labels
	**/
	$objMessage=new clsMessages();
	$objMessage->m_intConId=CONST_CONCEPT_SEARCH_TABLE;
	$objMessage->m_intLangId= $_SESSION['intLangId'];
	$arrLabels=$objMessage->GetLabels();
	
?>
<table  width="96%" border="0" cellspacing="0" cellpadding="0" align="center" class="TabBorder">
<form method="get" action="http://www.google.com/search" target="_blank">
	<tr class="TabHead">
		<td width="91%" align="left" valign="middle" class="TabHead"><? if(isset($arrLabels[529])) echo $arrLabels[529]; else echo "***"; ?>
		 <? if(isset($arrLabels[1])) echo $arrLabels[1]; else echo "***"; ?></td>
  <td width="9%" align="right" valign="middle" class="TabHead"><img src="images/Google.png" width="57" height="24" /></td>
	</tr>
	<tr>
		<td colspan="2">&nbsp;
		<input type="text" name="q" size="25" maxlength="250" value="<? if(isset($arrLabels[1])) echo $arrLabels[1]; else echo
		 "***"; ?>..." onfocus="this.value='';" onblur="if(this.value=='') this.value='<? 
		 if(isset($arrLabels[1])) echo $arrLabels[1]; else echo "***"; ?>...'"/>
		</td>
	</tr>
</form>
</table>
