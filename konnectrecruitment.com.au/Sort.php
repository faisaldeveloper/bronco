<?
	/**
	Getting Labels
	**/
	$objMessage=new clsMessages();
	$objMessage->m_intLangId=$_SESSION['intLangId'];
	$objMessage->m_intConId=CONST_CONCEPT_SORT;
	$arrLabelsSort=$objMessage->GetLabels();
?>
<form name="form1" method="post" action="">
  <table width="100%" border="0" cellpadding="2" cellspacing="0">
    <tr> 
      <td width="25%" align="right"><? if(isset($arrLabelsSort[409])) echo $arrLabelsSort[409]; else echo "***"; ?>: </td>
      <td width="10%"><select name="lstSort">
        <option value="ProdRank" <?php if($Sort=='ProdRank') echo 'selected';?>><? if(isset($arrLabelsSort[408])) echo $arrLabelsSort[408]; else echo "***"; ?></option>
        <option value="ProdName" <?php if($Sort=='ProdName') echo 'selected';?>><? if(isset($arrLabelsSort[54])) echo $arrLabelsSort[54]; else echo "***"; ?></option>
        <option value="ProdPrice" <?php if($Sort=='ProdPrice') echo 'selected';?>><? if(isset($arrLabelsSort[181])) echo $arrLabelsSort[181]; else echo "***"; ?></option>
      </select></td>
      <td width="65%"><input type="submit" name="Submit" class="button" value="<? if(isset($arrLabelsSort[410])) echo $arrLabelsSort[410]; else echo "***"; ?>"></td>
    </tr>
  </table>
</form>
