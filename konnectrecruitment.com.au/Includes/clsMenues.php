<?php
/********************************************************************************
* Date 25-05-2005																*
* Author: Talib Siddique (Software Engineer)									*
* Owner: DigitalSpinners														*
*********************************************************************************/

//---------------------  START CLASS FOR MENU SETTING -------------------------
class clsMenues
{

var $m_strMnuPosition; 
var $m_strMnuBgColor;
var $m_strMnuBgImage;

	function SetMenuPosition() // ---------- TO SET THE MENU POSTION i.e Left or Top ------------
	{
		$strSqlCheck = "SELECT * FROM menu_info";
		$rsSqlCheck = mysql_query($strSqlCheck);
		if($rsSqlCheck && mysql_num_rows($rsSqlCheck) > 0)
		{
			$strSqlUpdate = "UPDATE menu_info SET MnuPosition = '".$this->m_strMnuPosition."'";
			$rsSqlUpdate = mysql_query($strSqlUpdate);
			if(mysql_affected_rows()>0)
				return true;
			else
				return false;
		}
		else
		{
			$strSql = "INSERT INTO menu_info(MnuPosition) VALUES ('".$this->m_strMnuPosition."')";
			$rsSql = mysql_query($strSql);
			if(mysql_affected_rows()>0)
				return true;
			else
				return false;
		}
	}

	function SetMenuBgImage() //---------- TO SET THE MENU BACKGROUND IMAGES ------------
	{
		$strSqlCheck = "SELECT * FROM menu_info";
		$rsSqlCheck = mysql_query($strSqlCheck);
		if($rsSqlCheck && mysql_num_rows($rsSqlCheck) > 0)
		{
			$strSqlUpdate = "UPDATE menu_info SET MnuBgImage = '".$this->m_strMnuBgImage."', MnuBgColor=''";
			$rsSqlUpdate = mysql_query($strSqlUpdate);
			if(mysql_affected_rows()>0)
				return true;
			else
				return false;
		}
		else
		{
			$strSql = "INSERT INTO menu_info(MnuBgImage) VALUES ('".$this->m_strMnuBgImage."')";
			$rsSql = mysql_query($strSql);
			if(mysql_affected_rows()>0)
				return true;
			else
				return false;
		}
	}

	function SetMenuBgColor()//---------- TO SET THE MENU BACKGROUND COLOR ------------
	{
		$strSqlCheck = "SELECT * FROM menu_info";
		$rsSqlCheck = mysql_query($strSqlCheck);
		if($rsSqlCheck && mysql_num_rows($rsSqlCheck) > 0)
		{
			$strSqlUpdate = "UPDATE menu_info SET MnuBgImage = '',MnuBgColor='".$this->m_strMnuBgColor."'";			
			$rsSqlUpdate = mysql_query($strSqlUpdate);
			if(mysql_affected_rows()>0)
				return true;
			else
				return false;
		}
		else
		{
			$strSql = "INSERT INTO menu_info(MnuBgColor) VALUES ('".$this->m_strMnuBgColor."')";
			$rsSql = mysql_query($strSql);
			if(mysql_affected_rows()>0)
				return true;
			else
				return false;
		}
	}
	
	function GetMenuInfo()
	{
    	$strSql = "SELECT * FROM menu_info";
		$rsSql = mysql_query($strSql);
		if($rsSql && mysql_num_rows($rsSql) > 0)
			return $rsSql;
		else
			return FALSE;
	}
}
?>