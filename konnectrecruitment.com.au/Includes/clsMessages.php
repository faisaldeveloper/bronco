<?php
class clsMessages
{
	var $m_intMessageId; 
	var $m_strMessageDesc;
	var $m_intLangId;
	var $arrConcept;
	var $m_intConId;
	
	function AddNewMessage()
	{
		$strSqlCheck = "SELECT * FROM `messages` WHERE MessageDesc = '".$this->m_strMessageDesc."' AND pkLangId = ".$this->m_intLangId."";
		$rsSqlCheck = mysql_query($strSqlCheck);
		if($rsSqlCheck && mysql_num_rows($rsSqlCheck)==0) 
		{
			$strMaxId = "SELECT MAX(pkMessageId) as LastId FROM `messages`";
			$intRsMaxId = mysql_query($strMaxId);
			if($intRsMaxId && mysql_num_rows($intRsMaxId)>0)
			{
				$intArrMaxId = mysql_fetch_array($intRsMaxId);
				$intNewId = $intArrMaxId['LastId']+1;
			}
			else $intNewId = 1;
			$this->m_intMessageId = $intNewId;
			$strSql = "INSERT INTO `messages` (pkMessageId,pkLangId,MessageDesc) VALUES (".$this->m_intMessageId.",".$this->m_intLangId.",'".$this->m_strMessageDesc."')";
			$rsSql = mysql_query($strSql);
			/**
			Code by Basharat Zaman concept id.
			**/
			if(isset($this->arrConcept))
			foreach($this->arrConcept as $nKey=>$nId)
			{
				$strQry="INSERT INTO `concept_msg` ( `fkMessageId` , `fkConceptId` )VALUES (".$this->m_intMessageId.", ".$nId.")";
				$rsQry = mysql_query($strQry);
			}//exit;
			if(mysql_affected_rows()>0)
				return TRUE;
			else
				return FALSE;
		}
		else
			return false;
	}
	
	function TranslateMessage()
	{
		$strSql = "INSERT INTO `messages` (pkMessageId,pkLangId,MessageDesc) VALUES (".$this->m_intMessageId.",".$this->m_intLangId.",'".$this->m_strMessageDesc."')";
		$rsSql = mysql_query($strSql);
		if(mysql_affected_rows()>0)
			return TRUE;
		else
			return FALSE; 
	}
	
	function EditMessage()
	{
		$strSql = "UPDATE `messages` SET MessageDesc = '".$this->m_strMessageDesc."' WHERE pkMessageId = ".$this->m_intMessageId." AND pkLangId = ".$this->m_intLangId."";
		$rsSql = mysql_query($strSql);
		if($rsSql)
		{	$strSql="DELETE FROM `concept_msg` WHERE `fkMessageId`=".$this->m_intMessageId;
			$rsCheck=mysql_query($strSql);
			foreach($this->arrConcept as $nKey=>$nId)
			{
				$strQry="INSERT INTO `concept_msg` ( `fkMessageId` , `fkConceptId` )VALUES (".$this->m_intMessageId.", ".$nId.")";
				$this->m_intConceptId=$this->m_intConceptId+1;
				$rsQry = mysql_query($strQry);
			}//End of foreach
		}
		if(mysql_affected_rows()>0)
			return TRUE;
		else
			return FALSE;
	}
	
	function DeleteMessage()
	{
		$strSql = "DELETE FROM `messages` WHERE pkMessageId = ".$this->m_intMessageId." AND pkLangId = ".$this->m_intLangId."";
		$nCheck = mysql_query($strSql);
		
		$strSql = "select * FROM `messages` WHERE pkMessageId = ".$this->m_intMessageId;
		$rsCheck = mysql_query($strSql);
		if(mysql_num_rows($rsCheck)==0)
		{
			$strQry="DELETE FROM `concept_msg` WHERE `fkMessageId`=".$this->m_intMessageId;
			$rsQry=mysql_query($strQry);
		}	
		if($nCheck) 
			return	TRUE;
		else
			return FALSE;
	}

//--------------------------------------------------------------------------------------------------------//
//////////////////////////////////New Function By Yasir on 1-6-2005/////////////////////////////////////////
//--------------------------------------------------------------------------------------------------------//
	function GetMessageDetail()
	{
		if(isset($this->m_intMessageId)) //By ID
			$strSql="SELECT * FROM messages where messages.pkMessageId=".$this->m_intMessageId;
		else
			$strSql="SELECT * FROM messages where messages.MessageDesc=".$this->m_strMessageDesc; //By Description
		if(isset($this->m_intLangId))	//For Specific Language
			$strSql.=" and messages.pkLangId = ".$this->m_intLangId;
			//echo $strSql;exit;
		$rsMessages = mysql_query($strSql);
		return $rsMessages;
	}
	
	function MessagesList($intRecordStart=-1,$intPerPage=0)
	{

		$strSql="SELECT * FROM messages,languages
				 WHERE
				 languages.pkLangId = messages.pkLangId";
		if(isset($this->m_intLangId) && $this->m_intLangId>0)	//For Specific Language
			$strSql.=" and messages.pkLangId = ".$this->m_intLangId;
		$strSql.=" ORDER by messages.pkMessageId,languages.pkLangId";	
		if($intRecordStart!=-1 && $intPerPage!=0)					//If Paging Required
			$strSql.=" LIMIT $intRecordStart,$intPerPage";	
		$rsMessages = mysql_query($strSql);
		return $rsMessages;
	}
	
	function SearchMessage()
	{
		$strSql="SELECT  messages.pkMessageId,messages.MessageDesc , languages.LangDesc, languages.pkLangId
				FROM
				messages,languages
				WHERE
				messages.pkLangId = languages.pkLangId";
		if(isset($this->m_strMessageDesc) && !empty($this->m_strMessageDesc))		
			$strSql.=" AND  messages.MessageDesc LIKE '".$this->m_strMessageDesc."%'";
		if(isset($this->m_intMessageId) && !empty($this->m_intMessageId))		
			$strSql.=" AND messages.pkMessageId = ".$this->m_intMessageId;
		$strSql.=" ORDER BY messages.pkMessageId";
		$rsMessage = mysql_query($strSql);
		return $rsMessage;
	}
	
	function SearchMessageById()
	{
		$strSql="SELECT  messages.pkMessageId,messages.MessageDesc , languages.LangDesc, languages.pkLangId
				FROM
				messages,languages
				WHERE
				messages.pkLangId = languages.pkLangId AND  messages.pkMessageId = ".$this->m_intMessageId." ORDER BY messages.pkMessageId";
		$rsMessage = mysql_query($strSql);
		return $rsMessage;
	}
	
	function SearchMessageByDescription()
	{
		$strSql="SELECT  messages.pkMessageId,messages.MessageDesc , languages.LangDesc, languages.pkLangId
				FROM
				messages,languages
				WHERE
				messages.pkLangId = languages.pkLangId AND  messages.MessageDesc LIKE '".$this->m_strMessageDesc."%' ORDER BY messages.pkMessageId";
		$rsMessage = mysql_query($strSql);
		return $rsMessage;
	}
	
	function GetConcept()
	{
		$strSql="SELECT * FROM `concept`";
		$rsConcept=mysql_query($strSql);
		if($rsConcept)
		{
			return $rsConcept;
		}
		else
			return false;
	}
	
	function GetConceptByfkMsgId()
	{
		$strSql="SELECT * FROM `concept_msg` left outer join concept on  concept_msg.fkConceptId=concept.pkConceptId where `fkMessageId`=".$this->m_intMessageId;
		$rsSql=mysql_query($strSql);
		if(mysql_num_rows($rsSql)>0)
			return $rsSql;
		else
			return false;
	}
	function GetLabels()
	{
		$strSql="select `messages`.* from `messages`,`concept_msg` where `messages`.pkMessageId=`concept_msg`.fkMessageId and `messages`.pkLangId=".$this->m_intLangId." and  `concept_msg`.fkConceptId=".$this->m_intConId;
		//echo $strSql,"<hr>";
		$rsSql=mysql_query($strSql);
		$arrLabels=array();
		if($rsSql)
		if(mysql_num_rows($rsSql)>0)
		{
			while($objRow=mysql_fetch_object($rsSql))
			{
				$nIndex=$objRow->pkMessageId;
				$arrLabels[$nIndex]=$objRow->MessageDesc;
			}
		}
		return $arrLabels;
	}
	/**
	function transfered from function.php
	**/
	function GetNonTranlatedLangs($fldLang,$tblTable,$fldCriteria,$intValCriteria)
	{
		$strSql = "SELECT ${fldLang} FROM `${tblTable}` WHERE ${fldCriteria} = ".$intValCriteria."";
		echo $strSql;
		$rsSql = mysql_query($strSql);
		$strLangs="";
		$c = 0;
		while($resSql = mysql_fetch_object($rsSql))
		{
			if($c > 0)
				$strLangs .= ",".$resSql->pkLangId;
			else 
				$strLangs .= $resSql->pkLangId;
			$c++;
		}
		$sqlLangs = "SELECT * FROM `languages` WHERE pkLangId NOT IN (".$strLangs.")";
		$rsLangs = mysql_query($sqlLangs);
		if($rsLangs != false && mysql_num_rows($rsLangs) > 0)
			return $rsLangs;
		else
			return FALSE;
	}

}
?>