<?
/**
	Confirm Message
**/
$objConfirmMessage = new clsConfirmMessage();
if(isset($_REQUEST['intMessage']))
{
	$objConfirmMessage->m_intLangId=$_SESSION['intLangId'];
	$objConfirmMessage->m_intConfMsgId=$_REQUEST['intMessage'];
	$rsCMessage=$objConfirmMessage->GetMessage_BackOffice();
	if($rsCMessage!=FALSE){
		$strRowMessage=mysql_fetch_array($rsCMessage);
?>
		<table width="100%">
		<tr>
		  <td align="left" valign="top" class="txtBld_grn" height="5px"></td>
		</tr>
		<tr>
			<td align="center"><img src='../images/<?=$strRowMessage['Image']?>'>&nbsp;
			   <? if($strRowMessage['Indicator']==0){print "<span class='txt_grn'>".$strRowMessage['ConfMsgDesc']."</span>";}else{print "<span class='txt_red'>".$strRowMessage['ConfMsgDesc']."</span>";}?>
			</td>
		</tr>
		<tr>
		  <td align="center" height="5px"></td>
		  </tr>
		</table>
<?
	}
}	
?>	
