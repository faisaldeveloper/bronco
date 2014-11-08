<?php
/********************************************************************************
* Date 01-07-2005																*
* Author: Atif Ali (Software Engineer)											*
* Owner: DigitalSpinners														*
*********************************************************************************/

//---------------------  START CLASS FOR Confirm Messages-------------------------
class clsConfirmMessage 
{
	var $m_intConfMsgId; 
	var $m_strConfMsgDesc;
	var $m_intLangId;
	var $m_intIndicator;
	var $m_intImage;
	var $MultiLangCheck;
	var $arrConcept;
	var $m_intConceptId;
	/**
	function transfered from function.php
	**/
	function GetNonTranlatedLangs($fldLang,$tblTable,$fldCriteria,$intValCriteria)
	{
		$strSql = "SELECT ${fldLang} FROM `${tblTable}` WHERE ${fldCriteria} = ".$intValCriteria."";
		//echo $strSql;
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
		else return FALSE;
	}
	/////////////////
	function AddMessages() //------ TO ADD NEW Confirm Message ---------
	{
	/////////////////////////////////
		if($this->m_intImage==1)
			$strImage="cross.jpg";
		else
			$strImage="right.jpg";
		$sqlCheck="SELECT * FROM `confirmation_messages` WHERE ConfMsgDesc='".$this->m_strConfMsgDesc."' AND Image='".$strImage."' AND Indicator='".$this->m_intIndicator."'AND pkLangId=".$this->m_intLangId."";
		$sql = mysql_query($sqlCheck);
		if($sql && mysql_num_rows($sql)>0)
			return 0;
		else
		{
			$strMaxId = "SELECT MAX(pkConfMsgId) as LastId FROM `confirmation_messages`";
			$intRsMaxId = mysql_query($strMaxId);
			if(mysql_num_rows($intRsMaxId)>0)
			{
				$intArrMaxId = mysql_fetch_array($intRsMaxId);
				$intConfMsgId = $intArrMaxId['LastId']+1;
			}
			else $intConfMsgId = 1;
			$this->m_intConfMsgId = $intConfMsgId;				
			$strSql="INSERT INTO `confirmation_messages` (`pkConfMsgId`, `pkLangId`, `ConfMsgDesc`, `Image`, `Indicator`)
			VALUES(".$this->m_intConfMsgId.", ".$this->m_intLangId.", '".$this->m_strConfMsgDesc."','".$strImage."', '".$this->m_intIndicator."')";
			$intCheck=mysql_query($strSql) or die("Insertion Error ".mysql_error());
			//Here insert into concept_cmsg///
			if($intCheck)
			{
				foreach($this->arrConcept as $nKey=>$nId)
				{
					$strQry="INSERT INTO `concept_cmsg` ( `fkConfMsgId` , `fkConceptId` )VALUES (".$this->m_intConfMsgId.", ".$nId.")";
					$this->m_intConceptId=$this->m_intConceptId+1;
					$rsQry = mysql_query($strQry);
				}//exit;
			}
			//////////////////////////////////
			if(mysql_affected_rows()>0)
				return 1;
			else
				return 2;
		}
	}	
	function EditMessage() //------ TO EDIT Confirm Message ---------
	{
		if($this->m_intImage==1)
			$strImage="cross.jpg";
		else
			$strImage="right.jpg";
		$sqlCheck="SELECT * FROM `confirmation_messages` WHERE ConfMsgDesc='".$this->m_strConfMsgDesc."' AND Image='".$strImage."' AND Indicator='".$this->m_intIndicator."'AND pkLangId=".$this->m_intLangId."";
		
		$sql = mysql_query($sqlCheck);
		if(isset($this->arrConcept))
		{	
			$strQry="SELECT * FROM `concept_cmsg` where `fkConfMsgId`=".$this->m_intConfMsgId;
			$rsQry=mysql_query($strQry);
			if($rsQry)
			{
				$strSql="DELETE FROM `concept_cmsg` WHERE `fkConfMsgId`=".$this->m_intConfMsgId;
				$rsCheck=mysql_query($strSql);
				foreach($this->arrConcept as $nKey=>$nId)
				{
					$strQry="INSERT INTO `concept_cmsg` ( `fkConfMsgId` , `fkConceptId` )VALUES (".$this->m_intConfMsgId.", ".$nId.")";
					//echo $strQry."<br>"; exit;
					$this->m_intConceptId=$this->m_intConceptId+1;
					$rsQry = mysql_query($strQry);
				}//End of foreach
				
			}
			if(!mysql_num_rows($sql)>0)
			{
				$strSql="UPDATE `confirmation_messages` SET `ConfMsgDesc`='".$this->m_strConfMsgDesc."',`Image`='".$strImage."',`Indicator`='".$this->m_intIndicator."' WHERE  `pkLangId`=".$this->m_intLangId." and `pkConfMsgId` =".$this->m_intConfMsgId;
				//echo "-->".$strQry;exit;
				$intCheck=mysql_query($strSql);
				if(mysql_affected_rows()>0)
					return 1;
				else
					return 2;
			}
			return 2;
		}
		else
			return 0;
	}

	function DeleteMessages() //------ TO DELETE Messages ---------
	{
		$strSql = "DELETE FROM `confirmation_messages` WHERE pkConfMsgId = ".$this->m_intConfMsgId." AND pkLangId = ".$this->m_intLangId."";
		$nCheck = mysql_query($strSql);
		$strSql = "select * FROM `confirmation_messages` WHERE pkConfMsgId = ".$this->m_intConfMsgId;
		$rsCheck = mysql_query($strSql);
		if(mysql_num_rows($rsCheck)==0)
		{
			$strQry="DELETE FROM `concept_cmsg` WHERE `fkConfMsgId`=".$this->m_intConfMsgId;
			$rsQry=mysql_query($strQry);
		}	
		if($nCheck) 
			return	TRUE;
		else
			return FALSE;
	}

	function MessagesList($intLowLimit=-1,$intUpLimit=0)
	{
		$strSql="SELECT * FROM `confirmation_messages` ORDER BY `pkConfMsgId`";
		if($intLowLimit > -1 && $intUpLimit > 0 )
		$strSql .= " LIMIT ".$intLowLimit.",".$intUpLimit."";
		$rsSqlCheck = mysql_query($strSql);
		if(mysql_num_rows($rsSqlCheck)>0) 
			return $rsSqlCheck;
		else
			return FALSE;
	}
	
	function GetMessage_BackOffice() //------ Getting message ---------
	{
		if(!is_numeric($this->m_intConfMsgId))
			return false;
		else
		{
			if(!isset($this->m_intLangId))
			{
				$strLang="SELECT * FROM `languages` WHERE `IsDefault`=1";
				$strCheck=mysql_query($strLang);
				if(mysql_num_rows($strCheck)>0)
				{
					$recCheck=mysql_fetch_object($strCheck);
					$intDefLangId=$recCheck->pkLangId;
					$this->m_intLangId=$intDefLangId;
				}
				else
					$this->m_intLangId=1;
			}		
			$strSql="Select * from `confirmation_messages` WHERE  `pkLangId`=".$this->m_intLangId." and `pkConfMsgId` =".$this->m_intConfMsgId;
			$intCheck=mysql_query($strSql);
			if($intCheck && mysql_num_rows($intCheck)>0)
				return $intCheck;
			else
				return FALSE;
		}
	}

	function GetMessage() //------ Getting message ---------
	{
		if(!is_numeric($this->m_intConfMsgId))
			return false;
		else
		{
			if(!isset($this->m_intLangId))
			{
				$strLang="SELECT * FROM `languages` WHERE `IsDefault`=1";
				$strCheck=mysql_query($strLang);

				if($strCheck && mysql_num_rows($strCheck)<=0)
					$this->m_intLangId=2;
				else if($strCheck && mysql_num_rows($strCheck)>0)
				{
					$recCheck=mysql_fetch_object($strCheck);
					$intDefLangId=$recCheck->pkLangId;
					$this->m_intLangId=$intDefLangId;
				}
				else
					$this->m_intLangId=2;
			 }
		$strSql="Select * from `confirmation_messages` WHERE  `pkLangId`=".$this->m_intLangId." and `pkConfMsgId` =".$this->m_intConfMsgId;
		$intCheck=mysql_query($strSql);
		if($intCheck && mysql_num_rows($intCheck)>0)
			return $intCheck;
		else
			return FALSE;
		}
	}

	function TranslateMessage()
	{
		$strSqlCheck="Select * from `confirmation_messages` where pkConfMsgId=".$this->m_intConfMsgId."";
		$sql=mysql_query($strSqlCheck);
		$recSql=mysql_fetch_object($sql);
		$strImage=$recSql->Image;
		$intIndicator=$recSql->Indicator;
		mysql_free_result($sql);
		$strSql = "INSERT INTO `confirmation_messages` (pkConfMsgId,pkLangId,ConfMsgDesc,Image,Indicator) VALUES (".$this->m_intConfMsgId.",".$this->m_intLangId.",'".$this->m_strConfMsgDesc."','".$strImage."','".$intIndicator."')";
		$rsSql = mysql_query($strSql) or die("Trnaslate Event Error ".mysql_error());
		if(mysql_affected_rows()>0)
			return TRUE;
		else
			return FALSE; 

	}
	function SearchMessage()
	{
		$strSql="SELECT  confirmation_messages.pkConfMsgId,confirmation_messages.ConfMsgDesc, languages.LangDesc, languages.pkLangId
				FROM
				confirmation_messages,languages
				WHERE
				confirmation_messages.pkLangId = languages.pkLangId";
		if(isset($this->m_strConfMsgDesc) && !empty($this->m_strConfMsgDesc))		
			$strSql.=" AND  confirmation_messages.ConfMsgDesc LIKE '".$this->m_strConfMsgDesc."%'";
		if(isset($this->m_intConfMsgId) && !empty($this->m_intConfMsgId))		
			$strSql.=" AND confirmation_messages.pkConfMsgId = ".$this->m_intConfMsgId;
			$strSql.=" ORDER BY confirmation_messages.pkConfMsgId";
		$rsMessage = mysql_query($strSql);
		return $rsMessage;
	}

	function SearchMessageById()
	{
		$strSql="SELECT  confirmation_messages.pkConfMsgId,confirmation_messages.ConfMsgDesc , languages.LangDesc, languages.pkLangId
				FROM confirmation_messages,languages WHERE
				confirmation_messages.pkLangId = languages.pkLangId AND  confirmation_messages.pkConfMsgId = ".$this->m_intConfMsgId." ORDER BY confirmation_messages.pkConfMsgId";
		$rsMessage = mysql_query($strSql);
		if($rsMessage && mysql_num_rows($rsMessage)>0)
			return $rsMessage;
		else
			return FALSE;
	}
	function SearchMessageByDescription()
	{
		$strSql="SELECT  confirmation_messages.pkConfMsgId,confirmation_messages.ConfMsgDesc , languages.LangDesc, languages.pkLangId FROM confirmation_messages,languages WHERE confirmation_messages.pkLangId = languages.pkLangId AND  confirmation_messages.ConfMsgDesc LIKE '".$this->m_strConfMsgDesc."%' ORDER BY confirmation_messages.pkConfMsgId";
		$rsMessage = mysql_query($strSql);
		if($rsMessage && mysql_num_rows($rsMessage)>0)
			return $rsMessage;
		else
			return FALSE;
	}
	function GetConcept()
	{
		$strSql="SELECT * FROM `concept` ORDER BY `ConceptDesc` ASC";
		$rsConcept=mysql_query($strSql);
		if($rsConcept)
		{
			return $rsConcept;
		}
		else
			return false;
	}
	function GetConceptByfkConfMsgId()
	{
		$strSql="SELECT * FROM `concept_cmsg` left outer join concept on  concept_cmsg.fkConceptId=concept.pkConceptId where `fkConfMsgId`=".$this->m_intConfMsgId;
		$rsSql=mysql_query($strSql);
		if($rsSql && mysql_num_rows($rsSql)>0)
			return $rsSql;
		else
			return false;
	}
}
?>