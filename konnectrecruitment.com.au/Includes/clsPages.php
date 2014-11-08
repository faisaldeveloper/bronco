<?php
/********************************************************************************
* Date 25-05-2007																*
* Author: Yasir Abbasi (Senior Software Engineer)								*
* Owner: DigitalSpinners														*
*********************************************************************************/

class clsPages
{
	var $m_intPageId; 
	var $m_intLangId;
	var $m_strPageName;
	var $m_strPageTitle;
	var $m_strMetaTagsDesc;
	var $m_strMetaTagsKW;
	var $m_strPageContents;
	var $m_intShowInTopMenu;
	var $m_intShowInLeftMenu;
	var $m_intShowFooter;
	var $m_intIsActive;
	var $m_intImageId;
	var $m_strImageName; 
	var $m_intFileId;
	var $m_strFileName;
	var $m_strUploadPath;
	var $m_intModuleId; 
	var $m_intPageModuleId; 
	var $m_strPageModuleDesc;
	var $m_arrModulesIds;
	var $m_arrModulesPos;
	var $m_arrModulesRank;
	var $m_intParentId;	
	var $m_nRank;
	var $m_strPageUrl;
	var $m_nPageLayoutId;
	var $m_intPageType;
	var $m_nIsStartup;
	/**
	This function is from function file
	**/

	function AddNewPage() 
	{
		if($this->isExistPageName())
			return "Exists";
		else
		{
			$strSql="INSERT INTO `page_info` (`ShowInTopMenu` , `ShowInLeftMenu`, `ShowInFooter`, `IsActive`,`PageRank`,`PageUrl`,`IsStartup`,PageType,ParentId)
			VALUES (".$this->m_intShowTopMenu.",".$this->m_intShowLeftMenu.",".$this->m_intShowFooter.",".$this->m_intIsActive.",".$this->m_nRank.",'".$this->m_strPageUrl."','".$this->m_nIsStartup."',".$this->m_intPageType.",".$this->m_intParentId.")";
			//echo $strSql;exit;
			mysql_query($strSql);
			if(mysql_affected_rows()>0)
			{
				$this->m_intPageId=mysql_insert_id();
				$strSql="INSERT INTO `page_desc` (`fkPageID`,`fkLangID` , `PageName` , `PageTitle` , `MetatagsDesc` , `MetatagsKW` , `PageContents`)
				VALUES (".$this->m_intPageId.",".$this->m_intLangId.",'".$this->m_strPageName."','".$this->m_strPageTitle."','".$this->m_strMetaTagsDesc."','".$this->m_strMetaTagsKW."','".$this->m_strPageContents."')";
				$intCheck=mysql_query($strSql);
				return TRUE;
			}
			else
				return FALSE;
		}
	}
	function isExistPageName()
	{
		if(isset($this->m_intPageId) && !empty($this->m_intPageId))
			$strWhere = " AND fkPageID != ".$this->m_intPageId;
		
		$strSqlCheck = "SELECT PageName FROM `page_desc` WHERE PageName='".$this->m_strPageName."' and fkLangID='".$this->m_intLangId."'".$strWhere;
		$rsSqlCheck = mysql_query($strSqlCheck) or die("Page Check Query ".mysql_error());
		if($rsSqlCheck && mysql_num_rows($rsSqlCheck)>0) 
			return TRUE;
		else
			return FALSE;
		
	}
	function EditPage() 
	{
		if($this->isExistPageName())
			return "Exists";
		else
		{
		$strSql="UPDATE `page_info` SET `ShowInTopMenu`=".$this->m_intShowInTopMenu." ,`ShowInLeftMenu`=".$this->m_intShowInLeftMenu." ,`ShowInFooter`=".$this->m_intShowFooter." , PageRank = ".$this->m_nRank." ,IsStartup='".$this->m_nIsStartup."', `PageUrl`= '".$this->m_strPageUrl."'  WHERE pkPageId=".$this->m_intPageId;
		//echo $strSql;exit;
		$nCheck=mysql_query($strSql);
		$strSqlCheck = "SELECT * FROM `page_desc` WHERE fkLangID=".$this->m_intLangId." and fkPageID=".$this->m_intPageId;
		$rsSqlCheck = mysql_query($strSqlCheck) or die("Page Check Query ".mysql_error());
		if($rsSqlCheck && mysql_num_rows($rsSqlCheck)>0) 
			$strSql="Update page_desc set `PageName`='".$this->m_strPageName."', `PageTitle`='".$this->m_strPageTitle."', `MetatagsDesc`='".$this->m_strMetaTagsDesc."' ,`MetatagsKW`='".$this->m_strMetaTagsKW."' ,`PageContents`='".$this->m_strPageContents."' WHERE fkPageID=".$this->m_intPageId	." AND fkLangID=".$this->m_intLangId."";
		else 
			$strSql="INSERT INTO `page_desc` ( `PageName` , `PageTitle` , `MetatagsDesc` , `MetatagsKW` , `PageContents` , `fkPageID` , `fkLangID` ) 
		VALUES ( '".$this->m_strPageName."', '".$this->m_strPageTitle."', '".$this->m_strMetaTagsDesc."', '".$this->m_strMetaTagsKW."', '".$this->m_strPageContents."', '".$this->m_intPageId."', '".$this->m_intLangId."')";
		$nCheck=mysql_query($strSql);
		if($nCheck)
			return true;
		else
			return false;
		}	
	}
	
	function GetPages($intPageId=0, $intParentId=0, $nType=NULL)
	{
		$strSql = "SELECT distinct * FROM `page_info` left outer join page_desc on (`page_info`.pkPageId=page_desc.fkPageID and fkLangId in (".$this->m_intLangId.",0)) WHERE ParentId = ".$intParentId;
		if($intPageId >0)
			$strSql .= " AND pkPageId=".$intPageId."";
		if(isset($nType))
			$strSql .= " AND PageType=".$nType."";
		$strSql .= " order by PageType, PageRank";	
		$rsSql=mysql_query($strSql) or die(mysql_error());
		if($rsSql && mysql_num_rows($rsSql)>0) 
			return $rsSql;
		else
			return FALSE;
	}
	
	function DeActivatePage()
	{
		$strSql = "UPDATE `page_info` SET IsActive = ".INACTIVE." WHERE pkPageId = ".$this->m_intPageId;
		$rsSql = mysql_query($strSql);
		if(mysql_affected_rows()>0)
			return TRUE;
		else
			return FALSE;
	}
	
	function ActivatePage()
	{
		$strSql = "UPDATE `page_info` SET IsActive = ".ACTIVE."	WHERE pkPageId = ".$this->m_intPageId;
		$rsSql = mysql_query($strSql);
		if(mysql_affected_rows()>0)
			return TRUE;
		else
			return FALSE;
	}

	function DeletePage() 
	{
		$strSql="select * FROM `page_info` WHERE pkPageId=".$this->m_intPageId;
		$rsPage=mysql_query($strSql);
		$strSql="select * FROM `page_info` WHERE ParentId=".$this->m_intPageId;
		$rsCheck=mysql_query($strSql);
		if(mysql_num_rows($rsCheck)>0)
			return false;
		if(mysql_num_rows($rsPage)>0)
		{
			$strSql="DELETE `page_info`,page_desc,page_modules FROM `page_info` left outer join page_desc on page_info.pkPageId=page_desc.fkPageID left outer join page_modules on page_info.pkPageId=page_modules.fkPageId WHERE pkPageId=".$this->m_intPageId;
			$iCheck=mysql_query($strSql);
			if(mysql_affected_rows()>0) 
			{
				$rowPage=mysql_fetch_object($rsPage);
				if(file_exists("../".$rowPage->PageUrl.""))
					unlink("../".$rowPage->PageUrl."");
				return TRUE;
			}	
			else 
				return FALSE;
		}		
	}	
	
	function PagesSearch($nParentId=0)
	{
			$strSql = "SELECT distinct * FROM `page_info` left outer join page_desc on `page_info`.pkPageId=page_desc.fkPageID WHERE (`PageName` LIKE '%".$this->m_strSearchWords."%' OR `PageTitle` LIKE '%".$this->m_strSearchWords."%' OR `PageContents` LIKE '%".$this->m_strSearchWords."%') AND fkLangID in (".$this->m_intLangId.",0) and ParentId=".$nParentId." order by PageType, PageRank";
			$rsSql = mysql_query($strSql);
			if($rsSql && mysql_num_rows($rsSql)>0)
				return $rsSql;
			else
				return FALSE;
	}
	
	function GetPageById()
	{
		$strSql = "SELECT * FROM `page_info` WHERE 	`pkPageId` = ".$this->m_intPageId." AND pkLangId = ".$this->m_intLangId."";
		$rsSql = mysql_query($strSql);
		if($rsSql && mysql_num_rows($rsSql)>0)
			return $rsSql;
		else
			return FALSE;
	}
	
	function GetPageDetail()
	{
		$arrWhere=array();
		$strSql = "SELECT * FROM page_info left outer join page_desc on page_info.pkPageId=page_desc.fkPageID and fkLangId in (0,".$this->m_intLangId.")";
		if(isset($this->m_intPageId) && !empty($this->m_intPageId))
			$arrWhere[]="`pkPageId` = ".$this->m_intPageId;
		if(isset($this->m_intPageType) && !empty($this->m_intPageType))
			$arrWhere[]="`PageType` = ".$this->m_intPageType;
		if(isset($this->m_nIsStartup) && !empty($this->m_nIsStartup))
			$arrWhere[]="`IsStartup` = ".$this->m_nIsStartup;
		if(count($arrWhere)>0)
			$strSql.=" where ".implode(" and ",$arrWhere);
		$rsSql = mysql_query($strSql);
		if($rsSql && mysql_num_rows($rsSql)>0)
			return $rsSql;
		else
			return FALSE;
	}

	function GetPageDetailByName()
	{
		$arrWhere=array();
		$strSql = "SELECT * FROM page_info INNER join page_desc on page_info.pkPageId = page_desc.fkPageID and fkLangId in (0,".$this->m_intLangId.") and page_info.PageUrl  = '".$this->m_strPageUrl."'";
		
		$rsSql = mysql_query($strSql);
		if(mysql_num_rows($rsSql)>0) return $rsSql;
		else return FALSE;
	}


	function AddPageModule()
	{
		$intCheck = FALSE;
		foreach($this->m_arrModulesIds as $this->m_intModuleId)
		{
			$strSqlCheck = "SELECT * FROM `page_modules` WHERE fkPageId = ".$this->m_intPageId." AND fkModuleId = ".$this->m_intModuleId."";
			$rsSql = mysql_query($strSqlCheck) or die("Selection Error ".mysql_error());
			if(mysql_num_rows($rsSql)<1)
			{
				$strSql = "INSERT INTO `page_modules` (fkPageId,fkModuleId, Rank,Position) VALUES (".$this->m_intPageId.",".$this->m_intModuleId.",".$this->m_arrModulesRank[$this->m_intModuleId].",".$this->m_arrModulesPos[$this->m_intModuleId].")";
				$rsSql = mysql_query($strSql) or die("Module Insertion Error ".mysql_error());
				if(mysql_affected_rows()>0) $intCheck = TRUE;
			}
		}
		return $intCheck;
	}
	
	function UpdatePageModule()
	{
		$intCheck = FALSE;
		$strSqlCheck = "DELETE FROM `page_modules` WHERE fkPageId = ".$this->m_intPageId."";
		$rsSql = mysql_query($strSqlCheck) or die("Deletion All Error ".mysql_error());
		if($rsSql) $intCheck = TRUE;
		if($this->m_arrModulesIds > 0)
		{
			foreach($this->m_arrModulesIds as $this->m_intModuleId)
			{
			$strSql = "INSERT INTO `page_modules` (fkPageId,fkModuleId, Rank,Position) VALUES (".$this->m_intPageId.",".$this->m_intModuleId.",".$this->m_arrModulesRank[$this->m_intModuleId].",".$this->m_arrModulesPos[$this->m_intModuleId].")";
				$rsSql = mysql_query($strSql) or die("Module Insertion Error ".mysql_error());
				if(mysql_affected_rows()>0) $intCheck = TRUE;
			}
		}
		return $intCheck;
	}
	
	function GetAllModules()
	{
		$strSql = "SELECT * FROM modules,`module_types` WHERE pkModuleTypeID=ModuleType and module_types.IsActive = ".ACTIVE." AND modules.IsActive=".ACTIVE." order by ModuleType";
		$rsSql = mysql_query($strSql) or die("All Modules Selection Error ".mysql_error());
		if($rsSql && mysql_num_rows($rsSql)>0)
			return $rsSql;
		else
			return FALSE;
	}
	
	function GetModules()
	{
		$strSql = "SELECT * FROM modules";
		if(isset($this->m_nModuleId) && $this->m_nModuleId!=0)
		{
			$strSql .= " where ModuleType=".$this->m_nModuleId;
		}
		$strSql .= " ORDER BY  ModuleType ";
		$rsSql = mysql_query($strSql) or die("All Modules Selection Error ".mysql_error());
		if($rsSql && mysql_num_rows($rsSql)>0)
			return $rsSql;
		else
			return FALSE;
	}
	function GetModulesName()
	{
		$strSql = "SELECT * FROM module_types ORDER BY Description";
		$rsSql = mysql_query($strSql) or die("All Modules Selection Error ".mysql_error());
		if($rsSql && mysql_num_rows($rsSql)>0)
			return $rsSql;
		else
			return FALSE;
	}
	
	function GetPageModule($nPosition=NULL, $nStatus=ACTIVE)
	{
		$strSql = " SELECT  modules.*,  page_modules.* FROM  page_modules,  modules, module_types";
		$strSql .=" WHERE page_modules.fkModuleId = modules.pkModuleId and module_types.pkModuleTypeID=modules.ModuleType AND modules.IsActive = ".$nStatus." AND fkPageId = ".$this->m_intPageId."";
		if(isset($nPosition))	$strSql .= " and page_modules.Position=".$nPosition;
		$strSql .= " order by Rank";
		$rsSql = mysql_query($strSql) or die("Selection Page Mod Error ".mysql_error());
		if($rsSql && mysql_num_rows($rsSql)>0)
			return $rsSql;
		else
			return FALSE;
	}
	
	function GetFooterPagesLink($nStatus=NULL)
	{
		$strSql = "SELECT * FROM  page_info  left outer join page_desc on page_info.pkPageId=page_desc.fkPageID and fkLangId = ".$this->m_intLangId." where ShowInFooter=1";
		if(isset($nStatus))	$strSql .= " and IsActive=".$nStatus;
		$strSql .= " order by PageRank";
		$rsSql = mysql_query($strSql) or die("Selection Page Mod Error ".mysql_error());
		if($rsSql && mysql_num_rows($rsSql)>0)
			return $rsSql;
		else
			return FALSE;
	}
	
	function GetPageModuleId()
	{
		$strSql = "SELECT  page_modules.* FROM  page_modules";
		$strSql .=" WHERE  fkModuleId = ".$this->m_intPageModuleId." AND fkPageId = ".$this->m_intPageId."";
		//echo $strSql;
		$rsSql = mysql_query($strSql) or die("Selection Page Mod ID Error ".mysql_error());
		if($rsSql && mysql_num_rows($rsSql)>0)
		{
			$resModId = mysql_fetch_object($rsSql);
			return $resModId->fkModuleId;
		}
		else
			return FALSE;
	}
	
	function DeletePageModule()
	{
		$intCheck = FALSE;
		foreach($this->m_arrModulesIds as $this->m_intModuleId)
		{
			$strSqlCheck = "DELETE FROM `page_modules` WHERE fkPageId = ".$this->m_intPageId." AND fkModuleId = ".$this->m_intModuleId."";
			$rsSql = mysql_query($strSqlCheck) or die("Deletion Error ".mysql_error());
			if(mysql_affected_rows()>0) 
			$intCheck = TRUE;
		}	
		return $intCheck;
	}
	
	function GetPageName($nPageID)
	{	
		$rs = mysql_query("select `PageName` from page_info left outer join page_desc on page_info.pkPageId=page_desc.fkPageID and fkLangId = ".$this->m_intLangId." where pkPageId=${nPageID}");
		if($rs && mysql_num_rows($rs)>0)
		{	
			$row = mysql_fetch_object($rs);
			return $row->PageName;
		}
		else
			return NULL;
	}
	
	function GetAllRanks($nPageId = 0)
	{
		$strWhere = "";
		if ($nPageId != 0)
			$strWhere = "Where  pkPageId <> ".$nPageId."";
		$strQry="SELECT `PageRank` FROM `page_info`".$strWhere;
		$rsQry=mysql_query($strQry);
		if ($rsQry & mysql_num_rows($rsQry)>0)
			return $rsQry;
		else
			return FALSE;
	}
	
	function GetLastPageRank()
	{
		$strSql ="SELECT MAX(PageRank) AS PageRank FROM page_info";
		$rs = mysql_query($strSql) or die("Unable to select, Error: ".mysql_error());
		if($rs && mysql_num_rows($rs)>0)
		{	
			$row = mysql_fetch_object($rs);
			return $row->PageRank;
		}
		else
			return false;
	}
	
	function GetPageLayouts($nGroupId=CONST_LAYOUTGROUP_DEFAULT)
	{
		$strQry="SELECT * from page_layouts where LayoutGroup=".$nGroupId;
		$rsQry=mysql_query($strQry);
		if ($rsQry)
			return $rsQry;
		else 
			return FALSE;
	}

	function SetStartupPage()
	{
		$strSql = "UPDATE `page_info` SET IsStartup = 0";
		$rsSql = mysql_query($strSql);
		$strSql = "UPDATE `page_info` SET IsStartup = 1 WHERE `pkPageId` = ".$this->m_intPageId."";
		$rsSql = mysql_query($strSql);
		if(mysql_affected_rows()>0)	return TRUE;
		else return FALSE;
	}
	
	function TranslatePage()
	{
		$strSql="SELECT * FROM `page_desc` WHERE fkPageID=".$this->m_intPageId." AND fkLangID=".$this->m_intLangId;
		$rsSql=mysql_query($strSql);
		if(mysql_num_rows($rsSql)>0)
		{
			$strSql="UPDATE `page_desc` SET `PageName`='".$this->m_strPageName."',`PageTitle`='".$this->m_strPageTitle."', `MetatagsDesc` = '".$this->m_strMetaTagsDesc."',`MetatagsKW` = '".$this->m_strMetaTagsKW."',`PageContents` = '".$this->m_strPageContents."' WHERE fkPageID=".$this->m_intPageId." AND fkLangID=".$this->m_intLangId;
			$rsSql=mysql_query($strSql);
			if($rsSql)
				return true;
			else 
				return false;
		}
		else 
		{
			$strSql="INSERT INTO `page_desc` (`PageName` , `PageTitle` , `MetatagsDesc` , `MetatagsKW` , `PageContents` , `fkPageID` , `fkLangID` ) 
			VALUES ('".$this->m_strPageName."', '".$this->m_strPageTitle."', '".$this->m_strMetaTagsDesc."', '".$this->m_strMetaTagsKW."', '".$this->m_strPageContents."', '".$this->m_intPageId."', '".$this->m_intLangId."')";
			$rsSql=mysql_query($strSql);
			if($rsSql != NULL)
				if(isset($rsSql))
					return true;
				else 
					return false;
			else
				return false;
		}
	
	}
	
	function GetPageDescById()
	{
		$strSql="SELECT * FROM `page_desc` WHERE fkPageID=".$this->m_intPageId;
		$rsSql=mysql_query($strSql);
		if($rsSql != NULL)
			if(isset($rsSql) && mysql_num_rows($rsSql))
				return $rsSql;
			else 
				return false;
		else 
			return false;
	}
	
	function SearchPages($strKey)
	{
		$strSql="SELECT DISTINCT page_info.pkPageId, page_info.PageUrl,  page_desc.* FROM page_desc,page_info WHERE (PageContents like '%".$strKey."%' OR PageTitle like '%".$strKey."%' ) AND (page_info.pkPageId=page_desc.fkPageID AND page_desc.fkLangID=".$_SESSION['intLangId'].")";
		$rsSql=mysql_query($strSql);
		if($rsSql && mysql_num_rows($rsSql)>0)
			return $rsSql;
		else
			return FALSE;	
	}
	function SearchCategories($strKey)
	{
		$strSql="SELECT * from categories_desc where CatName like '%".$strKey."%' OR CatDesc like '%".$strKey."%'";
		$rsSql=mysql_query($strSql);
		if(mysql_num_rows($rsSql)>0)
			return $rsSql;
		else
			return FALSE;	
	}
	function SearchProducts($strKey)
	{
		
	$strSql="SELECT *, products_desc.ProdLDesc,   products_desc.ProdSDesc,  products_desc.ProdName,   products.IsActive FROM   products,   products_desc WHERE   (products_desc.ProdName like '%".$strKey."%' OR products_desc.ProdSDesc like '%".$strKey."%' OR products_desc.ProdLDesc like '%".$strKey."%' AND products.IsActive=1) AND   (products_desc.fkProdID = products.pkProdId AND products_desc.fkLangID=".$_SESSION['intLangId'].")";
	  
		$rsSql=mysql_query($strSql);
		if(mysql_num_rows($rsSql)>0)
			return $rsSql;
		else
			return FALSE;	
	}
	function AdvanceSearchProducts($strSearchKey,$strSearchIn,$nSubCat,$strSortBy)
	{
		$strWhere = '';
		if($strSearchKey == '' && $strSearchIn == 0)
		{
			header("location:AdvSearchResults.php?id=525");
			exit;
		}
		if($strSearchKey != '' && $strSearchIn == 0)
		{
			$strWhere =" (products_desc.ProdName like '%".$strSearchKey."%')AND";
		}
		if($strSearchIn!=0)
		{
			$strWhere = " (products_desc.ProdName like '%".$strSearchKey."%' AND products.fkCatId in(".$nSubCat.",".$strSearchIn."))AND";
		}
		
		
		$strSql="SELECT DISTINCT *, products_desc.ProdLDesc  from products_desc,products WHERE ".$strWhere." (products_desc.fkProdID = products.pkProdId AND products_desc.fkLangID=".$_SESSION['intLangId'].")ORDER BY ".$strSortBy;
		$rsSql=mysql_query($strSql);
		if(mysql_num_rows($rsSql)>0)
			return $rsSql;
		else
			return FALSE;	
	}
	function GetById($strTable,$strKey)
	{
		$strSql="SELECT * FROM ".$strTable." WHERE ".$strKey;
	 	$rsSql=mysql_query($strSql);
		if(mysql_num_rows($rsSql)>0)
			return $rsSql;
		else
			return FALSE;	
	}
	function ChangeStatus($IsActive,$pkModuleId)
{
		
		$strSql="Update modules SET IsActive=".$IsActive."  WHERE pkModuleId=".$pkModuleId;
	 	$rsSql=mysql_query($strSql);
		if(mysql_affected_rows()>0 )
			return TRUE;
		else 
			return FALSE;	
		}
	function GetStatus($pkModuleId)
	{
		$strSql="SELECT IsActive FROM modules WHERE pkModuleId= ".$pkModuleId;
		$rsSql=mysql_query($strSql);
		if($rsSql && mysql_num_rows($rsSql)>0)
		{
			$row = mysql_fetch_object($rsSql);
			return $row->IsActive;
		}
		else
			return FALSE;	
	}
	
	function AttachWithAll($nModuleId,$nPosition,$nRank)
	{
		$rsSql_Page_Info="SELECT pkPageId FROM page_info";
		$rsSql=mysql_query($rsSql_Page_Info);
		if($rsSql && mysql_num_rows($rsSql)>0)
		{ 
			while($row = mysql_fetch_object($rsSql))
			{ 
				$rsPageModule = "SELECT * FROM page_modules WHERE fkPageId=".$row->pkPageId." AND fkModuleId=".$nModuleId;
				$nResult = mysql_query($rsPageModule);
				if($nResult && mysql_num_rows($nResult)==0)
				{
					$strSql="INSERT INTO `page_modules` (`fkModuleId` , `fkPageId`, `Rank`,	`Position`)
					VALUES (".$nModuleId.",".$row->pkPageId.",".$nRank.",".$nPosition.")";
					$nResult = mysql_query($strSql);
				}
			}
		return TRUE;
		}
		else
			return FALSE;
	}

	function DeAttachFromAll($nModuleId)
	{
		$rsSql_Page="DELETE  FROM page_modules WHERE fkModuleId=".$nModuleId;
		$rsSql=mysql_query($rsSql_Page);
		return TRUE;
	}

function UpdateWithAll($nModuleId,$nPosition,$nRank)
	{
		$strSql="UPDATE `page_modules` SET
							`Rank`=".$nRank.",
							`Position`=".$nPosition." 
				WHERE
					`fkModuleId`=".$nModuleId;
		$nResult = mysql_query($strSql);
		if($nResult)
			return TRUE;
		else
			return FALSE;
	}
	function ChkModuleAttachmentWtihPage($nModuleId)
	{
		$rsSql_Page="SELECT * FROM page_modules WHERE fkModuleId=".$nModuleId;
		$rsSql=mysql_query($rsSql_Page);
		if($rsSql && mysql_num_rows($rsSql) > 0 )
			return TRUE;
		else
			return FALSE;
	}

}		
//--------------- END CLASS PAGES ----------------------------------
?>