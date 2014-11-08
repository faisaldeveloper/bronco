<?php
class clsMails
{
	var $m_intMailId;
	var $m_strToAddress;
	var $m_strFromAddress;
	var $m_strSubject;	
	var $m_strMailBody;	
	var $m_strMailDate;	
	var $m_intMailReply;	
	var $m_arrEmilsIds;
	
	function AddEmail()
	{
		$strSql = "INSERT INTO `emails` (ToAddress , FromAddress , Subject , MailBody , MailDate)";
		$strSql .= "VALUES ('".$this->m_strToAddress."','".$this->m_strFromAddress."','".addslashes($this->m_strSubject)."','".addslashes($this->m_strMailBody)."','".$this->m_strMailDate."')";
		$rsSql = mysql_query($strSql) or die("Mail Insertion Error ".mysql_error());
		if(mysql_affected_rows()>0) return TRUE;
		else return FALSE;
	}
	
	function UpdateEmail()
	{
		$strSql = "UPDATE `emails` SET `MailReply` = ".$this->m_intMailReply." WHERE pkMailId = ".$this->m_intMailId."";
		$rsSql = mysql_query($strSql) or die("Mail Updation Error ".mysql_error());
		if(mysql_affected_rows()>0) return TRUE;
		else return FALSE;
	}
	
	function GetEMails()
	{
		$strSql = "SELECT * FROM `emails` WHERE MailReply = ".$this->m_intMailReply."";
		$rsSql = mysql_query($strSql) or die("Mail Selection Error ".mysql_error());
		if($rsSql && mysql_num_rows($rsSql)>0)
			return $rsSql;
		else
			return FALSE;
	}
	
	function DeleteSelected()
	{
		$intCheck = FALSE;
		foreach($this->m_arrEmilsIds as $this->m_intMailId)
		{
			$strSql = "DELETE FROM `emails` WHERE pkMailId = ".$this->m_intMailId."";
			$rsSql = mysql_query($strSql);
			if(mysql_affected_rows()>0)
			{
				$intCheck = TRUE;
			}
		}
		return $intCheck;
	}
}
?>