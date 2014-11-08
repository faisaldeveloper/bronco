<?
	/**
		Getting Labels
	**/
	$objMessage=new clsMessages();
	$objMessage->m_intLangId=$_SESSION['intLangId'];
	$objMessage->m_intConId=CONST_CONCEPT_NEWS;
	$arrLabels=$objMessage->GetLabels();

?>
<script language="javascript">
function validate(f)
{
	if(f.lstFDay.value != "0" || f.lstFMonth.value != "0" || f.lstFYear.value != "0" || f.lstToDay.value != "0" || f.lstToMonth.value != "0" || f.lstToYear.value != "0")
	{
	  	if(f.lstFDay.value == "0")
	  	{
	  	alert("<? if(isset($arrLabels[438])) echo $arrLabels[438]; else echo "***";?>");
	  	return false;
		}
		if(f.lstFMonth.value == "0")
		{
		  alert("<? if(isset($arrLabels[439])) echo $arrLabels[439]; else echo "***";?>");
		  return false;
		}
		if(f.lstFYear.value == "0")
		{
		  alert("<? if(isset($arrLabels[440])) echo $arrLabels[440]; else echo "***";?>");
		  return false;
		}
		if(f.lstToDay.value == "0")
		{
		  alert("<? if(isset($arrLabels[441])) echo $arrLabels[441]; else echo "***";?>");
		  return false;
		}
		if(f.lstToMonth.value == "0")
		{
		  alert("<? if(isset($arrLabels[442])) echo $arrLabels[442]; else echo "***";?>");
		  return false;
		}
		if(f.lstToYear.value == "0")
		{
		  alert("<? if(isset($arrLabels[443])) echo $arrLabels[443]; else echo "***";?>");
		  return false;
		}
		if(f.lstToYear.value == f.lstFYear.value)
		{
			if(f.lstToMonth.value == f.lstFMonth.value)
			{
				if(f.lstToDay.value >= f.lstFDay.value)
				{
				return true;
				}
				else 
				{
					alert("<? if(isset($arrLabels[27])) echo $arrLabels[27]; else echo "***";?>");
					return false;
				}
			}
			else if(f.lstToMonth.value > f.lstFMonth.value)
			{
				return true;
			}
			else 
			{
				alert("<? if(isset($arrLabels[31])) echo $arrLabels[31]; else echo "***";?>");
				return false;
			}
		}
		else if(f.lstToYear.value > f.lstFYear.value)
		{
			return true;
		}
		else 
		{
			alert("<? if(isset($arrLabels[32])) echo $arrLabels[32]; else echo "***";?>");
			return false;
		}
	return true;
	}
	else if(f.txtSearch.value == "")
	{
		alert("<? if(isset($arrLabels[34])) echo $arrLabels[34]; else echo "***";?>");
		return false;
	}
  	else return true;
}
</script>
			  <form name="frmbasicsearch" method="post" action="<?=$_SERVER['PHP_SELF']?>"  onSubmit="return validate(this)">
				<table width="100%" border="0">
				  <tr>
					<td width="3%" height="30" align="right" nowrap><? if(isset($arrLabels[2])) echo $arrLabels[2]; else echo "***";?>
					: </td>
				    <td width="6%" align="left" nowrap><select name="lstFDay" id="lstFDay"  style="width:52px">
                      <option value="0" >
                        <? if(isset($arrLabels[47])) echo $arrLabels[47]; else echo "***";?>
                      </option>
                      <?
						for($i=1;$i<=31;$i++)
						{?>
                      <option value="<?=$i?>" <? if(isset($_REQUEST['lstFDay']) && (int)$_REQUEST['lstFDay']==$i) print "selected";?>>
                        <?=$i?>
                      </option>
                      <? 
						}?>
                    </select></td>
				    <td width="5%" align="left" nowrap><select name="lstFMonth" id="lstFMonth" >
                      <option value="0">
                        <? if(isset($arrLabels[48])) echo $arrLabels[48]; else echo "***";?>
                      </option>
                      <?
						for($i=1;$i<=12;$i++)
						{?>
                      <option value="<?=$i?>" <? if(isset($_REQUEST['lstFMonth']) && (int)$_REQUEST['lstFMonth']==$i) print "selected";?>>
                        <?=$i?>
                      </option>
                      <? }?>
                    </select></td>
				    <td width="86%" align="left" nowrap><select name="lstFYear" id="lstFYear">
                      <option value="0" >
                        <? if(isset($arrLabels[50])) echo $arrLabels[50]; else echo "***";?>
                      </option>
                      <?
						for($i=((int)date('Y')-2);$i<=((int)date('Y')+10);$i++)
						{?>
                      <option value="<?=$i?>" <? if(isset($_REQUEST['lstFYear']) && (int)$_REQUEST['lstFYear']==$i) print "selected";?>>
                        <?=$i?>
                      </option>
                      <? }?>
                    </select></td>
				  </tr>
				  <tr>
				    <td width="3%" height="30" align="right" nowrap="nowrap"><? if(isset($arrLabels[3])) echo $arrLabels[3]; else echo "***"; ?>
				      :			        </td>
			        <td width="6%" height="30" align="left" nowrap="nowrap"><select name="lstToDay" id="lstToDay">
                      <option value="0">
                      <? if(isset($arrLabels[47])) echo $arrLabels[47]; else echo "***";?>
                      </option>
                      <?
						for($i=1;$i<=31;$i++)
						{?>
                      <option value="<?=$i?>" <? if(isset($_REQUEST['lstToDay']) && (int)$_REQUEST['lstToDay']==$i) print "selected";?>>
                      <?=$i?>
                      </option>
                      <? }?>
                    </select></td>
			        <td width="5%" height="30" align="left" nowrap="nowrap"><select name="lstToMonth" id="lstToMonth">
                      <option value="0">
                      <? if(isset($arrLabels[48])) echo $arrLabels[48]; else echo "***";?>
                      </option>
                      <?
						for($i=1;$i<=12;$i++)
						{?>
                      <option value="<?=$i?>" <? if(isset($_REQUEST['lstToMonth']) && (int)$_REQUEST['lstToMonth']==$i) print "selected";?>>
                      <?=$i?>
                      </option>
                      <? 
						}?>
                    </select></td>
			        <td width="86%" height="30" align="left" nowrap="nowrap"><select name="lstToYear" id="lstToYear">
                      <option value="0">
                      <? if(isset($arrLabels[50])) echo $arrLabels[50]; else echo "***";?>
                      </option>
                      <?
						for($i=((int)date('Y')-2);$i<=((int)date('Y')+10);$i++)
						{?>
                      <option value="<?=$i?>" <? if(isset($_REQUEST['lstToYear']) && (int)$_REQUEST['lstToYear']==$i) print "selected";?>>
                      <?=$i?>
                      </option>
                      <? 
						}?>
                    </select></td>
				  </tr>
					  <tr>
						<td height="30" align="right" nowrap><? if(isset($arrLabels[1])) echo $arrLabels[1]; else echo "***"; ?>
						:</td>
				        <td height="30" colspan="3" align="left" nowrap><input name="txtSearch" type="text" class="TextField" id="txtSearch" value="<?=$strSearch?>" size="15" />
			            <input name="btnSearch" type="submit" id="btnSearch2" value="<? if(isset($arrLabels[533])) echo $arrLabels[533]; else echo "***"; ?>" class="button" /></td>
			        </tr>
				</table>
</form>