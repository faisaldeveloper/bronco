<?php
	$objLang = new clsLanguage();
	$arrLangFlag = $objLang->GetLanguages();
	if($arrLangFlag != FALSE)
	{
		while($arrRecLangFlag = mysql_fetch_object($arrLangFlag))
		{
			$intLangIds = $arrRecLangFlag->pkLangId;
			$strLangDesc = $arrRecLangFlag->LangDesc;
			$strLangFlags = $arrRecLangFlag->LangFlag;
			if($strLangFlags != NULL)
			{
				list($width, $height, $type, $attr) = getimagesize("LangFlags/".$strLangFlags.""); 
				if(($width > $fixWidth) && ($height > $fixHeight) || (($width < $fixWidth) && ($height < $fixHeight)))
				{
					$widthRes=($width/$fixWidth);
					$heightRes=($height/$fixHeight);
					if($widthRes > $heightRes)
					{
						$newht=getRatioByHeight($width,$height,$fixWidth);
						$newwd=$fixWidth;
					}
					else
					{
						$newwd= getRatioByWidth($width,$height,$fixHeight);
						$newht=$fixHeight;
					}
				}
				else if($width > $fixWidth)
				{
					$newht= getRatioByHeight($width,$height,$fixWidth);
					$newwd=$fixWidth;
				} 
				else if($height > $fixHeight)
				{
					$newwd= getRatioByWidth($width,$height,$fixHeight);
					$newht=$fixHeight;
				}
				else 
				{
					$newht= $height;
					$newwd=$width;
				}
				if($intSesLangId != $intLangIds)
				{
					if($newht > $newwd)
						echo "<a href='Includes/SetSessionLang.php?intLangId=${intLangIds}&PageID=${intThisPageId}'><img src=\"PhpThumb/phpThumb.php?src=../LangFlags/${strLangFlags}&w=${newht}\"></a>&nbsp;&nbsp;";
					else
						echo "<a href='Includes/SetSessionLang.php?intLangId=${intLangIds}&PageID=${intThisPageId}'><img src=\"PhpThumb/phpThumb.php?src=../LangFlags/${strLangFlags}&w=${newwd}\"></a>&nbsp;&nbsp;";
				}
				else
				{
					if($newht > $newwd)
						echo "<img src=\"PhpThumb/phpThumb.php?src=../LangFlags/${strLangFlags}&w=${newht}\">&nbsp;&nbsp;";
					else
						echo "<img src=\"PhpThumb/phpThumb.php?src=../LangFlags/${strLangFlags}&w=${newwd}\">&nbsp;&nbsp;";
				}
			}
			else
			{
				if($intSesLangId != $intLangIds)
					echo "<a href='Includes/SetSessionLang.php?intLangId=${intLangIds}&PageID=${intThisPageId}'>${strLangDesc}</a>&nbsp;&nbsp;";
				else
					echo "${strLangDesc}&nbsp;&nbsp;";
			}
			
		}
	}	
	
?>