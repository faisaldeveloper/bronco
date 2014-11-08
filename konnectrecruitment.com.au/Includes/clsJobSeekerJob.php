<?php
class clsJobSeekerJob
{
	var $m_npkId;
	var $m_nfkJobId;
	var $m_nfkJobSeekerId;
	var $m_strResumeFile;
	var $m_strCoverLetter;
	var $m_strTableName;
	var $m_nfkTypeId;
	var $m_nfkCatId;
	
	function clsJobSeekerJob()
	{
		$this->m_npkId = 0;
		$this->m_nfkJobId = 0;
		$this->m_nfkJobSeekerId = 0;
		$this->m_strResumeFile = "";
		$this->m_strCoverLetter = "";
		$this->m_strTableName = "jobseeker_job";		
	}
	function AddJobSeekerJob()
	{
		$objDb =new clsDatabaseManager();
		$ResultId = $objDb->InsertTable($this->m_strTableName,'fkJobId,fkJobSeekerId,ResumeFile,CoverLetter,fkCatId,fkTypeId',$this->m_nfkJobId.",".$this->m_nfkJobSeekerId.",'".$this->m_strResumeFile."','".$this->m_strCoverLetter."',".$this->m_nfkCatId.",".$this->m_nfkTypeId."");
		if($ResultId>0 )
			return $ResultId;
		else
			return FALSE;
	}
	function DeleteJobSeekerJob()
	{
		$objDb =new clsDatabaseManager();
		$Result =  $objDb->DeleteTable($this->m_strTableName,"pkId=".$this->m_npkId);
		if($Result)
			return TRUE;
		else
			return FALSE;
	}
	function GetJobSeekerJobByJobId()
	{
		$objDb =new clsDatabaseManager();
		$RsResult =  $objDb->SelectTable($this->m_strTableName,"*","fkJobId=".$this->m_nfkJobId);
		if($RsResult)
			return $RsResult;
		else
			return FALSE;
	}
	
	function GetAllJobSeekerJob()
	{
		$objDb =new clsDatabaseManager();
		$RsResult =  $objDb->SelectTable($this->m_strTableName,"*");
		if($RsResult)
			return $RsResult;
		else
			return FALSE;
	}
	
	function GetAllJobSeeker()
	{
		$objDb =new clsDatabaseManager();
		$RsResult =  $objDb->SelectTable('jobseeker Left Outer Join jobseeker_job ON(jobseeker_job.fkJobSeekerId= jobseeker.pkJobSeekerId)',"jobseeker.*,jobseeker_job.*","fkJobId=0");
		if($RsResult)
			return $RsResult;
		else
			return FALSE;
	}
	
	function GetJobSeekerJobByJobSeekerId()
	{
		$objDb =new clsDatabaseManager();
		$RsResult =  $objDb->SelectTable($this->m_strTableName,"*","fkJobSeekerId=".$this->m_nfkJobSeekerId);
		if($RsResult)
			return $RsResult;
		else
			return FALSE;
	}
	function CheckJobSeekerJob()
	{
		$objDb =new clsDatabaseManager();
		$RsResult =  $objDb->SelectTable($this->m_strTableName,"*","fkJobId='".$this->m_nfkJobId."' AND fkJobSeekerId='".$this->m_nfkJobSeekerId."'");
		if($RsResult)
			return $RsResult;
		else
			return FALSE;
	}
}

?>