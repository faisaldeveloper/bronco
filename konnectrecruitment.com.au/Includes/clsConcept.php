<?
class clsConcept
{
	var $strConceptDesc; 
	var $m_intConceptId;
	var $m_intLangId;
	
function AddConcept()
	{	
		$strSqlCheck = "SELECT * FROM `concept` WHERE ConceptDesc = '".$this->strConceptDesc."'";
		$rsSqlCheck = mysql_query($strSqlCheck);
		if($rsSqlCheck && mysql_num_rows($rsSqlCheck)==0)
		{
			$strMaxId = "SELECT MAX(pkConceptId) as LastId FROM `concept`";
			$intRsMaxId = mysql_query($strMaxId);
			if($intRsMaxId && mysql_num_rows($intRsMaxId)>0)
			{
				$intArrMaxId = mysql_fetch_array($intRsMaxId);
				$intNewId = $intArrMaxId['LastId']+1;
			}
			else
				$intNewId = 1;
			$this->m_intConceptId = $intNewId;
		$strSql = "INSERT INTO `concept` (pkConceptId,ConceptDesc) VALUES (".$this->m_intConceptId.",'".$this->strConceptDesc."')";
		$rsSql = mysql_query($strSql);
		if(mysql_affected_rows()>0) 
			return TRUE;
		}
		else
			return FALSE; 
	}
	
	function DeleteConcept()
	{ 	
 		$strSqlCheck = "SELECT * FROM `concept_cmsg` WHERE fkConceptId = '".$this->m_intConceptId."'";
		$rsSqlCheck = mysql_query($strSqlCheck);
		if($rsSqlCheck && mysql_num_rows($rsSqlCheck)==0)
		{
		$strSql = "DELETE FROM `concept` WHERE pkConceptId = ".$this->m_intConceptId."";
		$rsSql = mysql_query($strSql);
		if(mysql_affected_rows()>0)
			{
			$strSql = "DELETE FROM `concept_cmsg` WHERE fkConceptId = ".$this->m_intConceptId."";
			$rsSql = mysql_query($strSql);
			return TRUE;
			}
		}
		else
			return FALSE;
		}

function GetAllConcept()
	{
		$strSql="SELECT * FROM concept ORDER BY pkConceptId"; 
		$rs = mysql_query($strSql);
		return $rs;
	}
	function GetConceptById()
	{
		$strSql="SELECT * FROM concept where `pkConceptId`=".$this->m_intConceptId;
		$rsSql = mysql_query($strSql);
		if($rsSql && mysql_num_rows($rsSql)>0)
			{
				return $rsSql;
			}
		else return FALSE;
	}
	function UpdateConcept()
	{
		$strSql="SELECT * FROM `concept` where `pkConceptId`=".$this->m_intConceptId;
		
		$rsSql = mysql_query($strSql);
		if($rsSql)
		while($obQry=mysql_fetch_object($rsSql))
		{
			if($obQry->ConceptDesc == $this->strConceptDesc)
			{return 0;exit;}
		}
		$strSql="UPDATE `concept` SET  `ConceptDesc` = '".$this->strConceptDesc."' WHERE `pkConceptId` = ".$this->m_intConceptId;
		$rsSql = mysql_query($strSql);
		if($rsSql && mysql_num_rows($rsSql)>0)
			return true;
		else
			return false;
	}

}
?>
