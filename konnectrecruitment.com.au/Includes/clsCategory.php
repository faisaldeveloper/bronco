<?php
class clsCategory
{
	var $m_npkCatId;
	var $m_strCatName;
	var $m_strTableName;
	function clsCategory()
	{
		$this->m_npkCatId = 0;
		$this->m_strCatName = "";
		$this->m_strTableName = "category";
	}
	function AddCategory()
	{
		$objDb =new clsDatabaseManager();
		$ResultId = $objDb->InsertTable($this->m_strTableName,'CatName',"'".$this->m_strCatName."'");
		if($ResultId>0 )
			return $ResultId;
		else
			return FALSE;
	}
	function EditCategory()
	{
		$objDb =new clsDatabaseManager();
		$Result =  $objDb->UpdateTable($this->m_strTableName,"CatName='".$this->m_strCatName."'","pkCatId=".$this->m_npkCatId);
		if($Result)
			return TRUE;
		else
			return FALSE;
	}
	function DeleteCategory()
	{
		$objDb =new clsDatabaseManager();
		$Result =  $objDb->DeleteTable($this->m_strTableName,"pkCatId=".$this->m_npkCatId);
		if($Result)
			return TRUE;
		else
			return FALSE;
	}
	function GetAllCategories()
	{
		$objDb =new clsDatabaseManager();
		$RsResult =  $objDb->SelectTable($this->m_strTableName,"*");
		if($RsResult)
			return $RsResult;
		else
			return FALSE;
		
	}
	function GetCategoryById()
	{
		$objDb =new clsDatabaseManager();
		$RsResult =  $objDb->SelectTable($this->m_strTableName,"*","pkCatId=".$this->m_npkCatId);
		if($RsResult)
			return $RsResult;
		else
			return FALSE;
	}
	function GetCategoryByName()
	{
		$objDb =new clsDatabaseManager();
		$RsResult =  $objDb->SelectTable($this->m_strTableName,"*","CatName LIKE '".$this->m_strCatName."%'");
		if($RsResult)
			return $RsResult;
		else
			return FALSE;
	}
}