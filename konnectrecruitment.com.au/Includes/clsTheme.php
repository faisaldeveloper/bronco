<?php
class clsTheme
{
	var $m_intID;
	var $m_strName;
	var $m_IsActive;
	var $m_strHeader;
	var $m_strEmailHeader;
	
	var $m_strFooter;
	var $m_nMenuePosition;
	var $m_nTopMenuStyle;
	var $m_nLeftMenueStyle; 
	var $m_strMnuBgColor;
	var $m_strMnuBgImage;
	var $m_strMnuMouseOverColor;
	var $m_nExtTabWidth;
	var $m_nExtTabBorder;
	var $m_nLeftPanWidth;
	var $m_nRgtPanWidth;
	var $m_nLangID;
	var	$arrUnits=array('pixels'=>'px','points'=>'pt','in'=>'in','cm'=>'cm','mm'=>'mm','picas'=>'pc','ems'=>'em','exs'=>'ex');
	var	$arrPropsWithUnit=array('font-size','line-height','background-position','border','border-top','border-left','border-right','border-bottom');
	var	$arrBorderProps=array('border','border-top','border-left','border-right','border-bottom');
	
	
	var $arrFontTypes = array('Arial, Helvetica, sans-serif'=>'Arial, Helvetica, sans-serif','Times New Roman, Times, serif'=>'Times New Roman, Times, serif','Courier New, Courier, mono'=>'Courier New, Courier, mono','Georgia, Times New Roman, Times, serif'=>'Georgia, Times New Roman, Times, serif','Verdana, Arial, Helvetica, sans-serif'=>'Verdana, Arial, Helvetica, sans-serif','Geneva, Arial, Helvetica, sans-serif'=>'Geneva, Arial, Helvetica, sans-serif');
	var $arrTxtSize = array('9'=>'9','10'=>'10','12'=>'12','14'=>'14','16'=>'16','18'=>'18','24'=>'24','xx-small'=>'xx-small','x-small'=>'x-small','small'=>'small','medium'=>'medium','large'=>'large','x-large'=>'x-large','xx-large'=>'xx-large','smaller'=>'smaller','larger'=>'larger');
	var $arrWeight = array('normal'=>'normal','bold'=>'bold','bolder'=>'bolder','lighter'=>'lighter','100'=>'100','200'=>'200','300'=>'300','400'=>'400','500'=>'500','600'=>'600','700'=>'700','800'=>'800','900'=>'900');
	var $arrVariant = array('normal'=>'normal','small-caps'=>'small-caps');
	var $arrCase = array('capitalize'=>'capitalize','uppercase'=>'uppercase','lowercase'=>'lowercase');
	var $arrStyle = array('normal'=>'normal','italic'=>'italic','oblique'=>'oblique');
	var $arrLineHeight = array('normal'=>'normal');
	var $arrBGRpeat = array('no-repeat'=>'no-repeat','repeat'=>'repeat','repeat-x'=>'repeat-x','repeat-y'=>'repeat-y');
	var $arrBGAttachment = array('fixed'=>'fixed','scroll'=>'scroll');
	var $arrHorPos = array('left'=>'left','center'=>'center','right'=>'right');
	var $arrVerPos = array('top'=>'top','middle'=>'middle','bottom'=>'bottom');
	var $arrBorderStyle = array('none'=>'none','solid'=>'solid','dashed'=>'dashed','dotted'=>'dotted','double'=>'double','groove'=>'groove','ridge'=>'ridge','inset'=>'inset','outset'=>'outset');
	var $arrBorderWidth = array('thin'=>'thin','medium'=>'medium','thick'=>'thick');
	var $arrTxtDecoration = array('underline'=>'underline','overline'=>'overline','striketrough'=>'striketrough','blink'=>'blink','none'=>'none');
	
	//////////////// Default Styles Array for the New Theme Added//////////////
	var $arrDefaultStyles = array(
	1=>array('body','margin: 0px;
		font-family: Verdana;
		font-size: 11px;
		color: #000000;',1),
	2=>array('a:link, a:visited, a:active','font-family: Verdana;
		font-size: 11px;
		font-weight: normal;
		color: #18597B;
		text-decoration: underline;',1),
	3=>array('a:hover','font-family: Verdana, Arial, Helvetica, sans-serif;
		font-size: 11px;
		font-weight: normal;
		color: #337DA6;
		text-decoration: underline;',1),
	4=>array('txt_red','font-family: Verdana, Arial, Helvetica, sans-serif;
		font-size: 11px;
		font-weight: normal;
		color: #FF0000;',0),
	5=>array('button','font-family: Verdana, Arial, Helvetica, sans-serif; 
		font-size: 11px;
		font-weight: bold;
		color: #FFFFFF;
		background-color: #4782A2;
		border: 1px&solid&#333333;',1),
	8=>array('footer','font-family: Verdana;
		font-size: 9px;
		color: #2691CA;
		font-weight: bold;',0),
	9=>array('footer a:link, footer a:visited, footer a:active','font-family: Verdana, Arial, Helvetica, sans-serif;
		font-size: 9px;
		font-weight: bold;
		color: #2691CA;
		text-decoration: underline;',0),
	10=>array('footer a:hover','font-family: Verdana, Arial, Helvetica, sans-serif;
		 font-size: 9px;
		 font-weight: bold;
		 color: #69ADD1;
		 text-decoration: none;', 0),
	11=>array('Heading','font-family: Verdana;
		 font-size: 14px;
		 font-weight: bold;
		 color: #4782A2;', 0),
	12=>array('TabHead','font-family: Verdana;
		 font-size: 11px;
		 color: #FFFFFF;
		 background-color: #4782A2;
		 font-weight: bold;', 0),
	13=>array('TabBorder','border: 1px&solid&#4782A2;', 0),
	14=>array('textfield','FONT-SIZE: 11px;
		 COLOR: #000000;
		 FONT-FAMILY: Verdana;
		 line-height: 14px;
		 border: 1px&solid&#4782A2;', 0),
	15=>array('AltColourLight','background-color: #E2F1FA;', 0),
	16=>array('AltColourDark','background-color: #CFE8F5;', 0),
	18=>array('PageBodyBold','font-family: Verdana;
		 font-size: 11px;
		 font-weight: bold;
		 color: #000000;', 0),
	20=>array('txt_grn','font-family: Verdana, Arial, Helvetica, sans-serif;
		 font-size: 11px;
		 font-weight: normal;
		 color: #006666;', 0),
	23=>array('PageBorder','border: 1px&solid&#FFFFFF;', 0),
	24=>array('panel','color:#FFFFFF; background-color:#224C86; border-top: 0px&solid&#ffffff; border-bottom: 1px&solid&#ffffff; border-left: 0px&solid&#ffffff;	text-decoration: none;', 0),
	25=>array('panel a:link, .panel a:visited, .panel a:active','color:#FFFFFF; text-decoration: none;', 0),
	26=>array('panel a:hover','color:#666666; text-decoration: none; background-color:#F3F1E2;', 0),
	27=>array('subpanel','color:#224C86; background-color:#99CCFF; border-top: 0px&solid&#224C86; border-bottom: 1px&solid&#224C86;border-left: 0px&solid&#224C86;	text-decoration: none;', 0),
	28=>array('subpanel a:link, .subpanel a:visited, .subpanel a:active','color:#224C86; text-decoration: none;', 0),
	29=>array('subpanel a:hover','color:#666666; text-decoration: none; background-color:#F3F1E2;', 0),
	30=>array('toppanel','color:#FFFFFF; background-color:#224C86; border-top: 0px&solid&#ffffff; border-bottom: 1px&solid&#ffffff; border-left: 0px&solid&#ffffff;	text-decoration: none;', 0),
	31=>array('toppanel a:link, .toppanel a:visited, .toppanel a:active','color:#FFFFFF; text-decoration: none;', 0),
	32=>array('toppanel a:hover','color:#666666; text-decoration: none; background-color:#F3F1E2;', 0),
	33=>array('topsubpanel','color:#224C86; background-color:#99CCFF; border-top: 0px&solid&#224C86; border-bottom: 1px&solid&#224C86;border-left: 0px&solid&#224C86;	text-decoration: none;', 0),
	34=>array('topsubpanel a:link, .topsubpanel a:visited, .topsubpanel a:active','color:#224C86; text-decoration: none;', 0),
	35=>array('topsubpanel a:hover','color:#666666; text-decoration: none; background-color:#F3F1E2;', 0));
	//////////////// Theme Properties Array//////////////
	var $arrNoThemeProps = array(
	'Header'=>'<table width="100%" border=1><tr height="100"><td>Header....</td></tr></table>',
	'Footer'=>'<table width="100%" border=1><tr height="100"><td>Footer....</td></tr></table>',
	'MenuePosition'=>CONST_LEFT_MENU_POSTION,
	'LeftMenueStyle'=>CONST_RIGHTPOPUP_MENU_TYPE,
	'MnuBgColor'=>'#FFFFFF',
	'ExtTabWidth'=>'100%',
	'ExtTabBorder'=>'1',
	'LeftPanWidth'=>'150px');
	///////////////////////////////////////////////////////////////////////////
	function Add()
	{
		$strSql="Insert into themes (ThemeName, MenuePosition, TopMenuStyle, LeftMenueStyle, ExtTabWidth, ExtTabBorder, LeftPanWidth, RgtPanWidth) values('".$this->m_strName."','".$this->m_nMenuePosition."', '".$this->m_nTopMenuStyle."', '".$this->m_nLeftMenueStyle."', '".$this->m_nExtTabWidth."' , '".$this->m_nExtTabBorder."' , '".$this->m_nLeftPanWidth."', '".$this->m_nRgtPanWidth."')";
		$rsSql=mysql_query($strSql) or die ("Add Error: ".mysql_error());
		if(mysql_insert_id()>0)
		{
			$nThemeID=mysql_insert_id();
			$strSql="Insert into theme_desc (Header,EmailHeader, Footer, fkThemeID, fkLangID) values('".$this->m_strHeader."','".$this->m_strEmailHeader."','".$this->m_strFooter."','".$nThemeID."', '".$this->m_nLangID."')";
			$rsSql=mysql_query($strSql) or die ("Add Error: ".mysql_error());
			return $nThemeID;
		}	
		else
			return FALSE;
	}
	function Update()
	{
		$strSql="Update themes set ThemeName='".$this->m_strName."', MenuePosition=".intval($this->m_nMenuePosition).", TopMenuStyle=".intval($this->m_nTopMenuStyle).", LeftMenueStyle=".intval($this->m_nLeftMenueStyle).", ExtTabWidth='".$this->m_nExtTabWidth."', ExtTabBorder='".$this->m_nExtTabBorder."', LeftPanWidth='".$this->m_nLeftPanWidth."', RgtPanWidth='".$this->m_nRgtPanWidth."' where pkThemeID=".intval($this->m_intID);
		$rsSql=mysql_query($strSql) or die ("Update Error: ".mysql_error());
		if($rsSql)
		{
			$strSql="select * from theme_desc where fkThemeID='".$this->m_intID."' and  fkLangID='".$this->m_nLangID."'";
			$rsSqlCheck=mysql_query($strSql) or die ("Add Error: ".mysql_error());
			if(mysql_num_rows($rsSqlCheck)>0)
				$strSql="update theme_desc set Header='".$this->m_strHeader."',EmailHeader='".$this->m_strEmailHeader."', Footer='".$this->m_strFooter."' where fkThemeID='".$this->m_intID."' and  fkLangID='".$this->m_nLangID."'";
			else
				$strSql="Insert into theme_desc (Header, Footer, fkThemeID, fkLangID) values('".$this->m_strHeader."','".$this->m_strFooter."','".$this->m_intID."', '".$this->m_nLangID."')";			
			$rsSql=mysql_query($strSql) or die ("Add Error: ".mysql_error());
			if($rsSql)
				return TRUE;
		}
		else
			return FALSE;
	}
	function Delete()
	{
		$strChk = "Select IsActive from themes where pkThemeID=".intval($this->m_intID);
		$rsChk = mysql_query($strChk) or die ("Delete Error: ".mysql_error());
		$rowChk = mysql_fetch_object($rsChk);
		if($rowChk->IsActive==1)
		{
			return FALSE;
		}
		else
		{
			$strSql="Delete from themes where pkThemeID=".intval($this->m_intID);
			$rsSql=mysql_query($strSql) or die ("Delete Error: ".mysql_error());
			if(mysql_affected_rows()>0)
			{	
				$strSql="Delete from theme_desc where fkThemeID=".intval($this->m_intID);
				$rsSql=mysql_query($strSql) or die ("Delete Error: ".mysql_error());

				$strSql="Delete from themestyle where fkThemeID=".intval($this->m_intID);
				$rsSql=mysql_query($strSql) or die ("Theme Style Delete Error: ".mysql_error());
				return TRUE;
			}	
			else
				return FALSE;
		}		
	}
	function Select()
	{
		$strSql="Select * from themes ORDER BY pkThemeID";
		$rsSql=mysql_query($strSql) or die ("Select Error: ".mysql_error());
		if(mysql_num_rows($rsSql)>0)
			return $rsSql;
		else
			return FALSE;
	}
	function SelectbyID()
	{
		$strSql="SELECT * FROM `themes` left outer join theme_desc on themes.pkThemeID=theme_desc.fkThemeID and fkLangID=".intval($this->m_nLangID)." WHERE `pkThemeID` =".intval($this->m_intID);
		$rsSql=mysql_query($strSql) or die ("SelectbyID Error: ".mysql_error());
		if(mysql_num_rows($rsSql)>0)
			return $rsSql;
		else
			return FALSE;
	}
	function SelectThemeName()
	{
		$strSql="Select * from themes where pkThemeID=".intval($this->m_intID);
		$rsSql=mysql_query($strSql) or die ("SelectbyID Error: ".mysql_error());
		if(mysql_num_rows($rsSql)>0)
		{
			$rowSql=mysql_fetch_object($rsSql);
			$strName=$rowSql->ThemeName;
			return $strName;
		}
		else
			return FALSE;
	}
	function SelectActiveTheme()
	{
		$strSql="Select * from themes left outer join theme_desc on themes.pkThemeID=theme_desc.fkThemeID and fkLangID=".intval($this->m_nLangID)." where IsActive=1";
		$rsSql=mysql_query($strSql) or die ("Select Active Theme Error: ".mysql_error());
		if(mysql_num_rows($rsSql)>0)
			return $rsSql;
		else
			return FALSE; 
	}
	function ActivateTheme()
	{
		$strSql="Update themes set IsActive=0";
		$rsSql=mysql_query($strSql);
		$strSql1="Update themes set IsActive=1 where pkThemeID=".intval($this->m_intID);
		$rsSql1=mysql_query($strSql1) or die("Activate Theme Error ".mysql_error());
		if(mysql_affected_rows()>0)
			return TRUE;
		else
			return FALSE;
	}

	///////////////////////////////////////////////////////////////////////////////
	//////////////////// Style related functions //////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////
 	function GetStyleArray($strStyle=NULL, $nStyleID=NULL)
	{
		$arrStyle=array();
		$arrProps=array();
		$arrStyle='';
		if(isset($nStyleID))
		{
			$rs=$this->GetStyle($nStyleID);
			if($objRow=mysql_fetch_object($rs))
				$strStyle=$objRow->Value;
		}
		$arrProps=explode(';',$strStyle);
		if(count($arrProps)>0)
		for($i=0;$i<(count($arrProps)-1);$i++)//MainPropLoop
		{
			$arrProps[$i]=trim($arrProps[$i]);
			list($nKey,$strValue)=explode(':',$arrProps[$i]);
			$nKey=trim($nKey);
			$strValue=trim($strValue);
			$arr['Value']=$strValue;				
			if(in_array($nKey,$this->arrPropsWithUnit))//CheckingProperties+Unit
			{
				if(in_array($nKey,$this->arrBorderProps))//Checking for Border Properties
				{
					list($strWidth, $strStyle, $strColor)=explode('&',$strValue);
					$strWidth=trim($strWidth);
					$strStyle=trim($strStyle);
					$strColor=trim($strColor);
					$arr['Style']=$strStyle;				
					$arr['Color']=$strColor;				
					$arr['WidthValue']=$strWidth;
				}
				elseif($nKey==='background-position')//Special case for background position as (Horizontal, Vartical)
				{
					list($strHor, $strVer)=explode('&',$strValue);
					$strHor=trim($strHor);
					$strVer=trim($strVer);
					$arr['HrValue']=$strHor;				
					$arr['VrValue']=$strVer;
				}	
				foreach($this->arrUnits as $nKey1=>$strValue1)// Checking unit for
				{
					if(in_array($nKey,$this->arrBorderProps))//Checking for Border Properties
					{
						if(strpos($strWidth, $strValue1) && $strWidth!="thin")
						{
							$arr['WidthValue']=substr($strWidth,0,strpos($strWidth,$strValue1));				
							$arr['WidthUnit']=substr($strWidth,strpos($strWidth,$strValue1));				
						}
					}
					elseif($nKey==='background-position')//Special case for background position as (Horizontal, Vartical)
					{
						if(strpos($strHor, $strValue1))
						{
							$arr['HrValue']=substr($strHor,0,strpos($strHor,$strValue1));				
							$arr['HrUnit']=substr($strHor,strpos($strHor,$strValue1));				
						}
								
						if(strpos($strVer, $strValue1))
						{
							$arr['VrValue']=substr($strVer,0,strpos($strVer,$strValue1));				
							$arr['VrUnit']=substr($strVer,strpos($strVer,$strValue1));				
						}	
					}//End Special case for background position as (Horizontal, Vartical)
					elseif(strpos($strValue, $strValue1))
					{
						$arr['Value']=substr($strValue,0,strpos($strValue,$strValue1));				
						$arr['Unit']=substr($strValue,strpos($strValue,$strValue1));				
						//print"<hr>Arr=>";
						//print_r($arr);
					}
				}//End Checking unit for	
			}//End CheckingProperties+Unit
			elseif($nKey==="text-decoration")//Checking for text-decoration Properties
				$arr=explode(' ',$strValue);
			elseif($nKey==="background-image")//Checking for text-decoration Properties
				$arr['Value']=str_replace('|',':',substr($strValue, 4, (strlen($strValue)-5)));
			$arrStyle[$nKey]=$arr;
			unset($arr);
		} // End MainPropLoop
		return ($arrStyle);
	}
	
	function GetStyle($nStyleID)
	{
		$strSql="Select * from themestyle where pkID=".intval($nStyleID);
		$rsSql=mysql_query($strSql) or die ("Select Theme Style Error: ".mysql_error());
		return $rsSql;
	}

	function GetAllStyles($nThemeID)
	{
		$strSql="Select * from styles left outer join themestyle on themestyle.fkStyleID=styles.pkStyleId and fkThemeID=".intval($nThemeID);
		$rsSql=mysql_query($strSql) or die ("Select Theme Styles Error: ".mysql_error());
		return $rsSql;
	}
	
	function UpdateThemeStyle($nStyleID, $strValue)
	{
		$strSql="Update themestyle set value='".$strValue."' where pkID=".intval($nStyleID);
		$rsSql=mysql_query($strSql);
		if(mysql_affected_rows()>0)
			return TRUE;
		else
			return FALSE;
	}

	function AddThemeStyle($nThemeID, $nStyleID, $strValue)
	{
		$strSql="insert into themestyle(value,fkThemeID, fkStyleID) values('".$strValue."',".intval($nThemeID).",".intval($nStyleID).")";
		$rsSql=mysql_query($strSql);
		if(mysql_affected_rows()>0)
			return TRUE;
		else
			return FALSE;
	}
	
	function GenerateStyleSheet()
	{
		$strSql="Select * from themes,styles left outer join themestyle on themestyle.fkStyleID=styles.pkStyleId where themes.pkThemeID=themestyle.fkThemeID and themes.IsActive=1";
		$rsSql=mysql_query($strSql) or die ("Select Theme Styles Error: ".mysql_error());
		$strCSS="";
		if($rsSql && mysql_num_rows($rsSql))
		{
			while($objRow=mysql_fetch_object($rsSql))
			{
				if($objRow->IsTagStyle==0)
					$strCSS.=".";
				$strCSS.=$objRow->StyleName."{".$objRow->Value."}";
			}
		}
		else
		{
			foreach($this->arrDefaultStyles as $arrStyles)
			{
				if(!isset($arrStyles[2]) || $arrStyles[0]==0)
					$strCSS.=".";
				$strCSS.=$arrStyles[0]."{".$arrStyles[1]."}";
			}
		}
		$strCSS.="";
		return str_replace('|',':',str_replace('&',' ',$strCSS));
	}
	
	function GenerateCSSStyle($nStyleID)
	{
		$strSql="Select * from themes,styles left outer join themestyle on themestyle.fkStyleID=styles.pkStyleId where themes.pkThemeID=themestyle.fkThemeID and themestyle.pkID=".intval($nStyleID);
		$rsSql=mysql_query($strSql) or die ("Select Theme Styles Error: ".mysql_error());
		$strCSS="<style>\n";
		if($rsSql && mysql_num_rows($rsSql))
		{
			while($objRow=mysql_fetch_object($rsSql))
				$strCSS.=".".$objRow->StyleName."{".$objRow->Value."}";
		}
		$strCSS.="</style>\n";
		print str_replace('|',':',str_replace('&',' ',$strCSS));
	}

	function GetCSSStyleDetail($nStyleID)
	{
		$strSql="Select * from themes,styles left outer join themestyle on themestyle.fkStyleID=styles.pkStyleId where themes.pkThemeID=themestyle.fkThemeID and themestyle.pkID=".$nStyleID;
		$rsSql=mysql_query($strSql) or die ("Select Theme Styles Error: ".mysql_error());
		return $rsSql;
	}
	function AddDefaultStyles($nThemeId,$nStyleId,$strStyleValue)
	{
		$strSql="Insert into themestyle (`fkThemeID`,`fkStyleID`,`Value`) values (".intval($nThemeId).",".$nStyleId.",'".$strStyleValue."')";
		$rsSql=mysql_query($strSql) or die ("AddDefaultStyles Error: ".mysql_error());
		if(mysql_affected_rows()>0)
			return TRUE;
		else
			return FALSE;
	}
	function GetStylesValuesbyThemeID($nThemeIdCopyFrom)
	{
		$strSql="Select * from themestyle where fkThemeID=".intval($nThemeIdCopyFrom);
		$rsSql=mysql_query($strSql) or die ("GetStylesValuesbyThemeID Error: ".mysql_error());
		if($rsSql && mysql_num_rows($rsSql)>0)
			return $rsSql;
		else
			return FALSE;
	}
	function UpdateThemeValues($nThemeId,$nStyleId,$strStyleValue)
	{
		$strSql="Select * from themestyle where fkThemeID=".intval($nThemeId)." and fkStyleID=".intval($nStyleId);
		$rsSql=mysql_query($strSql) or die ("GetStylesValuesbyThemeID Error: ".mysql_error());
		if($rsSql && mysql_num_rows($rsSql)>0)
			$strSql = "Update themestyle set Value='".$strStyleValue."' where fkThemeID=".intval($nThemeId)." and fkStyleID=".intval($nStyleId);
		else	
			$strSql="Insert into themestyle (`fkThemeID`,`fkStyleID`,`Value`) values (".intval($nThemeId).",".intval($nStyleId).",'".$strStyleValue."')";
		$rsSql=mysql_query($strSql) or die ("UpdateThemeValues Error: ".mysql_error());
		if(mysql_affected_rows()>0)
			return TRUE;
		else
			return FALSE;
	}
	function GetThemeInNonDefLangs()
	{
		$strSql="Select * from languages left outer join theme_desc on languages.pkLangId=theme_desc.fkLangID and fkThemeID=".intval($this->m_intID);
		$rsSql=mysql_query($strSql) or die ("Select Theme Styles Error: ".mysql_error());
		return $rsSql;
	}
	function TranslateTheme()
	{
		$strSql="SELECT * FROM  theme_desc  WHERE fkThemeID='".$this->m_intID."' and fkLangID ='".$this->m_nLangID."'";
		$rsSql=mysql_query($strSql);
		if(mysql_num_rows($rsSql)>0)
			$strSql="UPDATE `theme_desc` SET `Header` = '".$this->m_strHeader."' , `Footer` ='".$this->m_strFooter."' WHERE fkThemeID='".$this->m_intID."' and fkLangID ='".$this->m_nLangID."'";
		else
			$strSql="INSERT INTO `theme_desc` ( `Header` , `Footer`, `fkThemeID`,`fkLangID` ) VALUES ( '".$this->m_strHeader."', '".$this->m_strFooter."', '".$this->m_intID."', '".$this->m_nLangID."')";
		$rsSql=mysql_query($strSql);
		if(mysql_affected_rows()>0)
			return true;
		else 
			return false;
	}
}
?>