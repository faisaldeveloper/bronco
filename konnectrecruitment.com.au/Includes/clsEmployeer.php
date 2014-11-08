<?php
class clsEmployeer
{
	var $m_npkEmpId;
	var $m_strCompanyName;
	var $m_strContactPerson;
	var $m_strEmail;
	var $m_strPassword;
	var $m_strSubrubs;
	var $m_nfkStateId;
	var $m_strPostCode;
	var $m_strTelePhone;
	var $m_strWebSiteUrl;
	var $m_strAddress;
	var $m_strTableName;
	function clsEmployeer()
	{
		$this->m_npkEmpId = 0;
		$this->m_strCompanyName = "";
		$this->m_strContactPerson = "";
		$this->m_strEmail = "";
		$this->m_strPassword = "";
		$this->m_strSubrubs = "";
		$this->m_nfkStateId = 0;
		$this->m_strPostCode = "";
		$this->m_strTelePhone = 0;
		$this->m_strWebSiteUrl = "";
		$this->m_strAddress = "";
		$this->m_strTableName = "employer";		
	}
	function AddEmployeer()
	{
		$objDb =new clsDatabaseManager();
		$ResultId = $objDb->InsertTable($this->m_strTableName,'CompanyName,ContactPerson,Email,Password,Subrubs,fkStateId,PostCode,TelePhone,WebSiteUrl,Address',"'".$this->m_strCompanyName."','".$this->m_strContactPerson."','".$this->m_strEmail."','".$this->m_strPassword."','".$this->m_strSubrubs."',".$this->m_nfkStateId.",'".$this->m_strPostCode."','".$this->m_strTelePhone."','".$this->m_strWebSiteUrl."','".$this->m_strAddress."'");
		if($ResultId>0 )
			return $ResultId;
		else
			return FALSE;
	}
	function EditEmployeer()
	{
		$objDb =new clsDatabaseManager();
		$Result =  $objDb->UpdateTable($this->m_strTableName,"CompanyName='".$this->m_strCompanyName."',ContactPerson='".$this->m_strContactPerson."',Subrubs='".$this->m_strSubrubs."',fkStateId=".$this->m_nfkStateId.",PostCode='".$this->m_strPostCode."',TelePhone='".$this->m_strTelePhone."',WebSiteUrl='".$this->m_strWebSiteUrl."',Address='".$this->m_strAddress."'","pkEmpId=".$this->m_npkEmpId);
		if($Result)
			return TRUE;
		else
			return FALSE;
	}
	function DeleteEmployeer()
	{
		$objDb =new clsDatabaseManager();
		$Result =  $objDb->DeleteTable($this->m_strTableName,"pkEmpId=".$this->m_npkEmpId);
		if($Result)
			return TRUE;
		else
			return FALSE;
	}
	function GetAllEmployeer()
	{
		$objDb =new clsDatabaseManager();
		$RsResult =  $objDb->SelectTable($this->m_strTableName,"*");
		if($RsResult)
			return $RsResult;
		else
			return FALSE;
		
	}
	function GetAllWorkType()
	{
		$objDb =new clsDatabaseManager();
		$RsResult =  $objDb->SelectTable("work_type","*");
		if($RsResult)
			return $RsResult;
		else
			return FALSE;		
	}
	function GetEmployeerById()
	{
		$objDb =new clsDatabaseManager();
		$RsResult =  $objDb->SelectTable($this->m_strTableName,"*","pkEmpId=".$this->m_npkEmpId);
		if($RsResult)
			return $RsResult;
		else
			return FALSE;
	}
	function VerifyEmployeer()
	{
		$objDb =new clsDatabaseManager();
		$RsResult =  $objDb->SelectTable($this->m_strTableName,"*","Email='".$this->m_strEmail."' AND Password='".$this->m_strPassword."'");
		if($RsResult)
			return $RsResult;
		else
			return FALSE;
	}
	function ChangePassword()
	{
		$objDb =new clsDatabaseManager();
		$RsResult =  $objDb->UpdateTable($this->m_strTableName,"Password='".$this->m_strPassword."'","Email='".$this->m_npkEmpId."'");
		if($RsResult)
			return $RsResult;
		else
			return FALSE;
	}
	function CheckEmailRecord()
	{
		$objDb =new clsDatabaseManager();
		$RsResult =  $objDb->SelectTable($this->m_strTableName,"*","Email='".$this->m_strEmail."'");
		if($RsResult)
			return $RsResult;
		else
			return FALSE;
	}
	function GetEmployeerByName()
	{
		$objDb =new clsDatabaseManager();
		$RsResult =  $objDb->SelectTable($this->m_strTableName,"*","ContactPerson LIKE '".$this->m_strContactPerson."%'");
		if($RsResult)
			return $RsResult;
		else
			return FALSE;
	}
	
}

?>