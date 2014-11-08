<?php
class clsStyles
{
	var $m_intStyleID;
	var $m_strColor;
	var $m_intThemeID;
	
	function SelectStyles()
	{
		$strSql="Select * from styles";
		$rsSql=mysql_query($strSql) or die ("SelectStyles Error: ".mysql_error());
		if(mysql_num_rows($rsSql)>0)
			return $rsSql;
		else
			return FALSE;
	}
	function GetStyle()
	{
		$strSql="Select * from styles where pkStyleId=".$this->m_intStyleID;
		$rsSql=mysql_query($strSql) or die ("Select style: ".mysql_error());
		return $rsSql;
	}
}
?>