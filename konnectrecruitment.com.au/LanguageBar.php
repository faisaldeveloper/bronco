<?php
	if($MultiLangCheck)	// If multiple languages support enabled
	{
	?>
    <table width="80%" align="right">
	  <tr>
       <td align="right">
	<?php	
		$rsLang = $objLanguage->GetLanguages();
		$intRowCounter = 0;
		while($strRowLang=mysql_fetch_array($rsLang))
		{
			if($strRowLang['LangFlag']=="")
				$strRowLang['LangFlag']="image_not_found_large.jpg";
		?>	
			<a href="ChooseLanguageAction.php?nLangId=<?=$strRowLang['pkLangId']?>&pagefrname=<?=$_REQUEST['pagefrname']?>" title="<?=$strRowLang['LangDesc'];?>"><img src="PhpThumb/phpThumb.php?src=../LangFlags/<?=$strRowLang['LangFlag']?>&h=20&w=150" class="imgBorder"></a>	
	<?php
		}
	?>	
	</td>
   </tr>
 </table>
	  <?
	 } 
	?>