<?php
class clsJobSeeker
{
	var $m_npkJobSeekerId;
	var $m_strName;
	var $m_strEmail;
	var $m_strPassword;
	var $m_strSubrubs;
	var $m_strPicture;
	var $m_strTableName;
	function clsJobSeeker()
	{
		$this->m_npkJobSeekerId = 0;
		$this->m_strName = "";
		$this->m_strEmail = "";
		$this->m_strPassword = "";
		$this->m_strSubrubs = "";
		$this->m_strPicture = "";
		$this->m_strTableName = "jobseeker";
	}
	function AddJobSeeker()
	{
		$objDb =new clsDatabaseManager();
		$ResultId = $objDb->InsertTable($this->m_strTableName,'Name,Email,Password,SubRub,Picture',"'".$this->m_strName."','".$this->m_strEmail."','".$this->m_strPassword."','".$this->m_strSubrubs."','".$this->m_strPicture."'");
		if($ResultId>0 )
			return $ResultId;
		else
			return FALSE;
	}
	function EditJobSeeker()
	{
		$objDb =new clsDatabaseManager();
		$Result =  $objDb->UpdateTable($this->m_strTableName,"Name='".$this->m_strName."',Email='".$this->m_strEmail."',SubRub='".$this->m_strSubrubs."',Picture='".$this->m_strPicture."'","pkJobSeekerId=".$this->m_npkJobSeekerId);
		if($Result)
			return TRUE;
		else
			return FALSE;
	}
	function DeleteJobSeeker()
	{
		$objDb =new clsDatabaseManager();
		$Result =  $objDb->DeleteTable($this->m_strTableName,"pkJobSeekerId=".$this->m_npkJobSeekerId);
		if($Result)
			return TRUE;
		else
			return FALSE;
	}
	function GetAllJobSeeker()
	{
		$objDb =new clsDatabaseManager();
		$RsResult =  $objDb->SelectTable($this->m_strTableName,"*");
		if($RsResult)
			return $RsResult;
		else
			return FALSE;
		
	}
	function GetJobSeekerById()
	{
		$objDb =new clsDatabaseManager();
		$RsResult =  $objDb->SelectTable($this->m_strTableName,"*","pkJobSeekerId=".$this->m_npkJobSeekerId);
		if($RsResult)
			return $RsResult;
		else
			return FALSE;
	}
	function GetJobSeekerByEmail()
	{
		$objDb =new clsDatabaseManager();
		$RsResult =  $objDb->SelectTable($this->m_strTableName,"*","Email='".$this->m_strEmail."'");
		if($RsResult)
			return $RsResult;
		else
			return FALSE;
	}
	
}
?>