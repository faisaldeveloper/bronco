<?php
class clsJob
{
	var $m_npkJobId;
	var $m_nfkEmpId;
	var $m_strJobTitle;
	var $m_strSalaryRange;
	var $m_strDescriptionFile;
	var $m_strComments;
	var $m_nfkServicesId;
	var $m_nIsTermsAccepted;
	var $m_strKeyAttribute1;
	var $m_strKeyAttribute2;
	var $m_strKeyAttribute3;
	var $m_strKeyAttribute4;
	var $m_strKeyAttribute5;
	var $m_nfkCatId;
	var $m_strTableName;
	var $m_nTypeId;
	
	function clsJob()
	{
		$this->m_npkJobId = 0;
		$this->m_nfkEmpId = 0;
		$this->m_strJobTitle = "";
		$this->m_strSalaryRange = "";
		$this->m_strDescriptionFile = "";
		$this->m_strComments = "";
		$this->m_nfkServicesId = 0;
		$this->m_nIsTermsAccepted = 0;
		$this->m_strKeyAttribute1 = "";
		$this->m_strKeyAttribute2 = "";
		$this->m_strKeyAttribute3 = "";
		$this->m_strKeyAttribute4 = "";
		$this->m_strKeyAttribute5 = "";
		$this->m_nfkCatId = 0;
		$this->m_nTypeId = 0;
		$this->m_strTableName = "job";
	}
	function AddJob()
	{
		$objDb =new clsDatabaseManager();
		$ResultId = $objDb->InsertTable($this->m_strTableName,'fkEmpId,JobTitle,SalaryRange,DescriptionFile,Comments,fkServicesId,IsTermsAccepted,KeyAttribute1,KeyAttribute2,KeyAttribute3,KeyAttribute4,KeyAttribute5,fkCatId,fkTypeId',$this->m_nfkEmpId.",'".$this->m_strJobTitle."','".$this->m_strSalaryRange."','".$this->m_strDescriptionFile."','".$this->Comments."','".$this->m_nfkServicesId."',".$this->m_nIsTermsAccepted.",'".$this->m_strKeyAttribute1."','".$this->m_strKeyAttribute2."','".$this->m_strKeyAttribute3."','".$this->m_strKeyAttribute4."','".$this->m_strKeyAttribute5."',".$this->m_nfkCatId.",".$this->m_nTypeId);
		if($ResultId>0 )
			return $ResultId;
		else
			return FALSE;
	}
	function EditJob()
	{
		$objDb =new clsDatabaseManager();
		$Result =  $objDb->UpdateTable($this->m_strTableName,"fkEmpId=".$this->m_nfkEmpId.",JobTitle=".$this->m_strJobTitle.",SalaryRange='".$this->m_strSalaryRange."',DescriptionFile='".$this->DescriptionFile."',Comments='".$this->Comments."',fkServicesId='".$this->m_nfkServicesId."',IsTermsAccepted=".$this->m_nIsTermsAccepted.",KeyAttribute1='".$this->m_strKeyAttribute1."',KeyAttribute2='".$this->m_strKeyAttribute2."',KeyAttribute3='".$this->m_strKeyAttribute3."',KeyAttribute4='".$this->m_strKeyAttribute4."',KeyAttribute5='".$this->m_strKeyAttribute5."',fkCatId=".$this->m_nfkCatId,"pkJobId=".$this->m_npkJobId,"fkTypeId=".$this->m_nTypeId);
		if($Result)
			return TRUE;
		else
			return FALSE;
	}
	function DeleteJob()
	{
		$objDb =new clsDatabaseManager();
		$Result =  $objDb->DeleteTable("jobseeker_job","fkJobId=".$this->m_npkJobId);
		$Result =  $objDb->DeleteTable($this->m_strTableName,"pkJobId=".$this->m_npkJobId);
		if($Result)
			return TRUE;
		else
			return FALSE;
	}
	function GetAllJob()
	{
		$objDb =new clsDatabaseManager();
		$RsResult =  $objDb->SelectTable($this->m_strTableName,"*");
		if($RsResult)
			return $RsResult;
		else
			return FALSE;
		
	}
	function GetJobById()
	{
		$objDb =new clsDatabaseManager();
		$RsResult =  $objDb->SelectTable('job Left Outer Join work_type ON(work_type.pkTypeId = job.fkTypeId)',"job.*,work_type.WorkType","pkJobId=".$this->m_npkJobId);
		if($RsResult)
			return $RsResult;
		else
			return FALSE;
	}
	function GetJobByEmpId()
	{
		$objDb =new clsDatabaseManager();
		$RsResult =  $objDb->SelectTable($this->m_strTableName,"*","fkEmpId=".$this->m_nfkEmpId);
		if($RsResult)
			return $RsResult;
		else
			return FALSE;
	}
	function GetJobBySearch($strWhere='')
	{
		if($strWhere!='')
		{
			$strSql="Select job.*, category.CatName, work_type.WorkType FROM job Left Outer Join category ON(category.pkCatId = job.fkCatId) Left Outer Join work_type ON(work_type.pkTypeId = job.fkTypeId) WHERE ".$strWhere;
			//echo $strSql;
			$rsSql = mysql_query($strSql) or die("Unable to select, Error: ".mysql_error());
			if(mysql_num_rows($rsSql)>0)
			{
				return $rsSql;
			}
			else
				return FALSE;
		}
		else
		{
			$strSql="Select job.*, category.CatName, work_type.WorkType FROM job Left Outer Join category ON(category.pkCatId = job.fkCatId) Left Outer Join work_type ON(work_type.pkTypeId = job.fkTypeId)";
			//echo $strSql;
			$rsSql = mysql_query($strSql) or die("Unable to select, Error: ".mysql_error());
			if(mysql_num_rows($rsSql)>0)
			{
				return $rsSql;
			}
			else
				return FALSE;
		}
		
	}
}
?>