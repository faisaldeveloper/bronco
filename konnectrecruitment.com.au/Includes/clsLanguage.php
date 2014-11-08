<?php
/********************************************************************************
* Date 25-05-2005																*
* Author: Talib Siddique (Software Engineer)									*
* Owner: DigitalSpinners														*
*********************************************************************************/

//---------------------  START CLASS FOR LANGUAGES -------------------------
class clsLanguage
{
	var $m_intLangId; 
	var $m_strLangDesc;
	var $m_strLangFlag;
	var $m_intDefault=1; 
	var $m_intNotDefault=0; 
	
	function AddNewLang()
	{
		$strSqlCheck = "SELECT * FROM `languages` WHERE LangDesc = '".$this->m_strLangDesc."'"; 								
		$rsSqlCheck = mysql_query($strSqlCheck);
		if($rsSqlCheck && mysql_num_rows($rsSqlCheck)>0)
			return 0;
		else
		{
			$strSql = "INSERT INTO `languages` (LangDesc) VALUES ('".$this->m_strLangDesc."')";
			$rsSql = mysql_query($strSql);
			if(mysql_affected_rows()>0)
				return $rsSql;
			else
				return 0;
		}
	}
	
	function EditLanguage()
	{
		$strSqlCheck = "SELECT * FROM `languages` WHERE LangDesc = '".$this->m_strLangDesc."'"; 								
		$rsSqlCheck = mysql_query($strSqlCheck);
		if($rsSqlCheck && mysql_num_rows($rsSqlCheck)>0)
			return 0;
		else
		{
		$strSql = "UPDATE `languages` SET LangDesc = '".$this->m_strLangDesc."' WHERE pkLangId = ".$this->m_intLangId."";
		$rsSql = mysql_query($strSql);
		if(mysql_affected_rows()>0) return $rsSql;
		else return 0;
		}
	}
	
	function AddLangImage($nLangId , $strLangFlag)
	{
		$objData = new clsDatabaseManager();
		$nId = $objData->UpdateTable('languages',"LangFlag= '".$strLangFlag."'","pkLangId = ".$nLangId);
		return $nId;
	}

	function GetLanguages()
	{
		$strSql = "SELECT * FROM `languages` ORDER BY pkLangId";
		$rsSql = mysql_query($strSql);
		if($rsSql && mysql_num_rows($rsSql)>0)
			return $rsSql;
		else
			return FALSE;
	}
	
	function DeleteLangImage($nLangID)
	{
		$objData = new clsDatabaseManager();
		$this->m_intLangId = $nLangID;
		$rsCheckSql = $this->GetLanguageById();
		$strCheckSql = mysql_fetch_object($rsCheckSql);
		$strImage = $strCheckSql->LangFlag;
		$strSqlUpdate=$objData->UpdateTable("languages","LangFlag = ''","pkLangId = ".$nLangID."");				
		if(mysql_affected_rows() > 0)
		{
			$strFileNamePath = "../LangFlags/".$strImage;
			unlink($strFileNamePath);
			return true;
		}
		else
			return false;
	}

	function IsLangExist($strLang)
	{
		$objData = new clsDatabaseManager();		
		$strQry = "SELECT * FROM languages WHERE languages.LangDesc='".$strLang."'";		
		$rsSqlCheck = mysql_query($strQry);
		if($rsSqlCheck && mysql_num_rows($rsSqlCheck)>0)
			return true;
		else
			return false;
	}

	function GetLanguageById()
	{
		$strSql = "SELECT * FROM `languages` WHERE pkLangId = ".$this->m_intLangId."";
		$rsSql = mysql_query($strSql);
		if($rsSql && mysql_num_rows($rsSql)>0)
		{
			if(mysql_num_rows($rsSql)>0)
				return $rsSql;
			else
				return FALSE;
		}
		else
			return FALSE;
	}
	
	function SetDefaultLang()
	{
		
		$strSql="Update `languages` set IsDefault=".$this->m_intNotDefault." where IsDefault=".$this->m_intDefault."";
		//$strSql="Update `languages` set IsDefault=0 where IsDefault=1";
		
		$rsSql=mysql_query($strSql);
		$strSql = "UPDATE `languages` SET IsDefault = ".$this->m_intDefault." WHERE pkLangId = ".$this->m_intLangId."";
		$rsSql = mysql_query($strSql);
		if(mysql_affected_rows()>0) 
			return TRUE;
		else return FALSE;
	}

	function GetDefaultLangId()
	{
		$strSql = "SELECT pkLangId FROM `languages` WHERE IsDefault = 1";
		$rsSql = mysql_query($strSql);
		if($rsSql && mysql_num_rows($rsSql)>0)
		{
		 	$arrSql = mysql_fetch_object($rsSql);
			return $arrSql->pkLangId;
		}
		else
			return FALSE;
	}

	function DeleteLang()
	{
		$rsCheckSql = $this->GetLanguageById();
		$strCheckSql = mysql_fetch_object($rsCheckSql);
		$strImage = $strCheckSql->LangFlag;
		$strSql = "Delete from `languages` WHERE pkLangId = ".$this->m_intLangId."";
		$rsSql = mysql_query($strSql);
		if(mysql_affected_rows() > 0)
			{
				$strFileNamePath = "../LangFlags/".$strImage;
				unlink($strFileNamePath);
				return true;
			}
		if(mysql_affected_rows() > 0)
			return $rsSql;
		else
			return 0;
	}
	
	function GetDefaultLang()
	{
		$strSql = "SELECT * FROM `languages` WHERE IsDefault = 1";//.$this->m_intDefault."";
		$rsSql = mysql_query($strSql);
		if($rsSql && mysql_num_rows($rsSql) > 0)
		{
			$resSql = mysql_fetch_object($rsSql);
			 return $resSql->pkLangId;
		}
		else
			return FALSE;
	}

	function GetLangName($LangId)
	{
		$strSql = "SELECT LangDesc FROM `languages` WHERE pkLangId = ".$LangId."";
		$rsSql = mysql_query($strSql);
		if($rsSql && mysql_num_rows($rsSql) > 0)
		{
			$resSql = mysql_fetch_object($rsSql);
			 return $resSql->LangDesc;
		}
		else return FALSE;
	}

}
?>