<?php
	/**
		Getting Labels
	**/
	$objMessage=new clsMessages();
	$objMessage->m_intConId=CONST_CONCEPT_SEARCH_TABLE;
	$objMessage->m_intLangId= $_SESSION['intLangId'];
	$arrLabels=$objMessage->GetLabels();
	
?>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
 <tr>
    <td width="<?php echo $intExtTabWidth; ?>" align="left" valign="top">
		<?php echo $strHeader;?>	
     </td>
  </tr>
</table>  	
