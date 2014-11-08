<form action="WebShoping.php" method="post" name="form1" id="form1">
<table width="100%" border="0" cellpadding="2" cellspacing="0">
	<tr bordercolor="#eeeeee">
		<td colspan="7" align="right"  height="10"></td>
	</tr>
	<tr bordercolor="#eeeeee">
		<td width="14%" align="right" nowrap class="txt_black" ><?=$msgProductBy?>: </td>
		<td width="6%" align="left" nowrap class="txt_black" >
			<select name="lstCri">
			<option value="ProdName" selected><?=$msgName?></option>
			<option value="ProdNumber"><?=$msgNumber?></option>
			<!--<option value="ProdPrice"><?//=$msgPrice?></option>
			<option value="ProdWeight"><?//=$msgWeight?></option>-->
			</select>
		</td>
		<td width="14%" align="left" nowrap >
			<input name="txtSearch" type="text" class="textfield" id="srcname" size="15">
		</td>
		<?php 
		$arrCat = $objCat->GetCatsByLang();
		?>
		<td width="10%" align="right" nowrap class="PageBodyBlack">&nbsp;<?=$msgCat?>&nbsp;</td>
		<td width="14%" align="left" nowrap class="PageBodyBlack" >
			<select name="lstCategory" class="textfield" id="lstCategory">
			<option value="0" selected>
			<?=$msgAll?>
			</option>
		<?php
		if($arrCat != FALSE)
		{
		while($rowCat=mysql_fetch_object($arrCat))
		{
		echo "<option value='".$rowCat->pkCatId."'>".$rowCat->CatName."</option>";
		}
		}
		?>
			</select>
		</td>
		<td align="left" nowrap>
		<input name="btnBasicSearch" type="hidden" value="yes">
		<input name="btnBasicSearch" type="submit" class="Button" value=<?=$msgSearch?>>
		</td>
		<td width="35%" align="left" nowrap>&nbsp;<!-- <a href="AdvSearch.php"><?$msgAdvance_Search?></a>--></td>
	</tr>
	<tr bordercolor="#eeeeee">
		<td colspan="7" align="right" class="txt_black"  height="10"></td>
	</tr>
</table>
</form>