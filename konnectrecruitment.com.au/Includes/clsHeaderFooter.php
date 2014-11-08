<?php
class clsHeaderFooter
{
	var $m_intHeaderId;
	var $m_intFooterId;
	var $m_intLangId;
	var $m_strHeaderContents;
	var $m_strFooterContents;

	function SetHeader()
	{
		$strSqlCheck = "SELECT * FROM `header` WHERE pkLangId = ".$this->m_intLangId."";
		$rsSqlCheck = mysql_query($strSqlCheck) or die("Header Check Query ".mysql_error());
		if($rsSqlCheck && mysql_num_rows($rsSqlCheck)>0)
		{
			$strUpdate = "UPDATE `header` SET `HeaderContents` = '".addslashes($this->m_strHeaderContents)."' WHERE pkLangId = ".$this->m_intLangId."";
			$rsUpdate = mysql_query($strUpdate) or die("Update Header Query ".mysql_error());
			if(mysql_affected_rows()>0)
			return TRUE;
			else return FALSE;
		}
		else
		{
			$strMaxId = "SELECT MAX(pkHeaderId) as LastId FROM `header`";
			$intRsMaxId = mysql_query($strMaxId);
			if($intRsMaxId && mysql_num_rows($intRsMaxId)>0)
			{
				$intArrMaxId = mysql_fetch_array($intRsMaxId);
				$intNewId = $intArrMaxId['LastId']+1;
			}
			else $intNewId = 1;
			$this->m_intHeaderId = $intNewId;
			$strSql = "INSERT INTO `header` (pkHeaderId,pkLangId,HeaderContents) VALUES (".$this->m_intHeaderId.",".$this->m_intLangId.",'".addslashes($this->m_strHeaderContents)."')";
			$rsSql = mysql_query($strSql) or die("Insertion Error ".mysql_error());
			
			if(mysql_affected_rows()>0)
			return TRUE;
			else return FALSE;
		}
	}
	
	function GetHeader()
	{
		$strSql = "SELECT * FROM `header` WHERE pkLangId = ".$this->m_intLangId."";
		$rsSql = mysql_query($strSql) or die("Header Get Query ".mysql_error());
		if($rsSql && mysql_num_rows($rsSql)>0)
			 return $rsSql;
		else
			return FALSE;		
	}
	
	
	function SetFooter()
	{
		$strSqlCheck = "SELECT * FROM `footer` WHERE pkLangId = ".$this->m_intLangId."";
		$rsSqlCheck = mysql_query($strSqlCheck) or die("Footer Check Query ".mysql_error());
		if($rsSqlCheck && mysql_num_rows($rsSqlCheck)>0)
		{
			$strUpdate = "UPDATE `footer` SET `FooterContents` = '".addslashes($this->m_strFooterContents)."' WHERE pkLangId = ".$this->m_intLangId."";
			$rsUpdate = mysql_query($strUpdate) or die("Update Footer Query ".mysql_error());
			if(mysql_affected_rows()>0)
				return TRUE;
			else
				return FALSE;
		}
		else
		{
			$strMaxId = "SELECT MAX(pkFooterId) as LastId FROM `footer`";
			$intRsMaxId = mysql_query($strMaxId);
			if($intRsMaxId && mysql_num_rows($intRsMaxId)>0)
			{
				$intArrMaxId = mysql_fetch_array($intRsMaxId);
				$intNewId = $intArrMaxId['LastId']+1;
			}
			else $intNewId = 1;
			$this->m_intFooterId = $intNewId;
			$strSql = "INSERT INTO `footer` (pkFooterId,pkLangId,FooterContents) VALUES (".$this->m_intFooterId.",".$this->m_intLangId.",'".addslashes($this->m_strFooterContents)."')";
			$rsSql = mysql_query($strSql) or die("Insertion Error ".mysql_error());
			if(mysql_affected_rows()>0)
				return TRUE;
			else
				return FALSE;
		}
	}
	
	function GetFooter()
	{
		$strSql = "SELECT * FROM `footer` WHERE pkLangId = ".$this->m_intLangId."";
		$rsSql = mysql_query($strSql) or die("Footer Get Query ".mysql_error());
		if($rsSql && mysql_num_rows($rsSql)>0)
			 return $rsSql;
		else
			return FALSE;		
	}
}
?>