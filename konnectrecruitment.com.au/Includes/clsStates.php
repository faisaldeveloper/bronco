<?php
class clsState
{
	var $m_npkStateId;
	var $m_strStateName;
	var $m_strTableName;
	
	function clsState()
	{
		$this->m_npkStateId = 0;
		$this->m_strStateName = "";
		$this->m_strTableName = "state";
	}
	function AddState()
	{
		$objDb =new clsDatabaseManager();
		$ResultId = $objDb->InsertTable($this->m_strTableName,'StateName',"'".$this->m_strStateName."'");
		if($ResultId > 0 )
			return $ResultId;
		else
			return FALSE;
	}
	function EditState()
	{
		$objDb =new clsDatabaseManager();
		$Result =  $objDb->UpdateTable($this->m_strTableName,"StateName='".$this->m_strStateName."'","pkStateId=".$this->m_npkStateId);
		if($Result)
			return TRUE;
		else
			return FALSE;
	}
	function DeleteState()
	{
		$objDb =new clsDatabaseManager();
		$Result =  $objDb->DeleteTable($this->m_strTableName,"pkStateId=".$this->m_npkStateId);
		if($Result)
			return TRUE;
		else
			return FALSE;
	}
	function GetAllState()
	{
		$objDb =new clsDatabaseManager();
		$RsResult =  $objDb->SelectTable($this->m_strTableName,"*");
		if($RsResult)
			return $RsResult;
		else
			return FALSE;
		
	}
	function GetStateById()
	{
		$objDb =new clsDatabaseManager();
		$RsResult = $objDb->SelectTable($this->m_strTableName,"*","pkStateId=".$this->m_npkStateId);
		if($RsResult)
			return $RsResult;
		else
			return FALSE;
	}
	function GetStateByName()
	{
		$objDb =new clsDatabaseManager();
		$RsResult =  $objDb->SelectTable($this->m_strTableName,"*","StateName LIKE '".$this->m_strStateName."%'");
		if($RsResult)
			return $RsResult;
		else
			return FALSE;
	}
	
}
?>