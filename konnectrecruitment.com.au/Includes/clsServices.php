<?php
class clsServices
{
	var $m_npkServiceId;
	var $m_strServiceTitle;
	var $m_nfkParentId;
	var $m_strTableName;
	function clsServices()
	{
		$this->m_npkServiceId = 0;
		$this->m_strServiceTitle = "";
		$this->m_nfkParentId = 0;
		$this->m_strTableName = "services";
	}
	function AddServices()
	{
		$objDb =new clsDatabaseManager();
		$ResultId = $objDb->InsertTable($this->m_strTableName,'ServiceTitle,fkParentId',"'".$this->m_strServiceTitle."',".$this->m_nfkParentId);
		if($ResultId>0 )
			return $ResultId;
		else
			return FALSE;
	}
	function EditServices()
	{
		$objDb =new clsDatabaseManager();
		$Result =  $objDb->UpdateTable($this->m_strTableName,"ServiceTitle='".$this->m_strServiceTitle."',fkParentId=".$this->m_nfkParentId,"pkServiceId=".$this->m_npkServiceId);
		if($Result)
			return TRUE;
		else
			return FALSE;
	}
	function DeleteServices()
	{
		$objDb =new clsDatabaseManager();
		$Result =  $objDb->DeleteTable($this->m_strTableName,"pkServiceId=".$this->m_npkServiceId);
		if($Result)
			return TRUE;
		else
			return FALSE;
	}
	function GetAllServices()
	{
		$objDb =new clsDatabaseManager();
		$RsResult =  $objDb->SelectTable($this->m_strTableName,"*");
		if($RsResult)
			return $RsResult;
		else
			return FALSE;
		
	}
	function GetServicesById()
	{
		$objDb =new clsDatabaseManager();
		$RsResult =  $objDb->SelectTable($this->m_strTableName,"*","pkServiceId=".$this->m_npkServiceId);
		if($RsResult)
			return $RsResult;
		else
			return FALSE;
	}
	function GetServicesByParentId()
	{
		$objDb =new clsDatabaseManager();
		$RsResult =  $objDb->SelectTable($this->m_strTableName,"*","fkParentId=".$this->m_nfkParentId);
		if($RsResult)
			return $RsResult;
		else
			return FALSE;
	}
	function GetParentServices()
	{
		$objDb =new clsDatabaseManager();
		$RsResult =  $objDb->SelectTable($this->m_strTableName,"*","fkParentId=".$this->m_nfkParentId);
		if($RsResult)
			return $RsResult;
		else
			return FALSE;
	}
	function GetServicesByTitle()
	{
		$objDb =new clsDatabaseManager();
		$RsResult =  $objDb->SelectTable($this->m_strTableName,"*","ServiceTitle LIKE '".$this->m_strServiceTitle."%'");
		if($RsResult)
			return $RsResult;
		else
			return FALSE;
	}
}
?>