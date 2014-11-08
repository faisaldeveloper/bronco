<?php
/********************************************************************************
* Date 25-05-2005																*
* Author: Talib Siddique (Software Engineer)									*
* Owner: DigitalSpinners														*
*********************************************************************************/

//---------------------  START CLASS FOR IMAGE GALLERY -------------------------
class clsNews
{
	var $m_intDescpkId; 
	var $m_strEventName;
	var $m_intLangId;
	var $m_nfkImgId;
	var $m_intNewsId;
	var $m_strNewsTitle;
	var $m_strImgDesc;
	var $m_dtNewsDate;
	var $m_dtNewsEDate;
	var $m_dtNewsTime;
	var $m_chkmain;
	var $m_strShortDesc;
	var $m_strLongDesc;
	var $m_intIsActive;
	var $m_intNewsImageId;
	var $m_strNewsImageName;
	var $m_strNewsDir;
	var $m_intNewsFileId;
	var $m_strNewsFileName;
	var $m_strSearchWords;
	var $m_arrNewsId;
	var $m_strFromDate;
	var $m_strToDate;	
	var $m_nNewsPageId;
	var $m_strPageUrl;
	var $m_intModuleID=1;
	
	function AddNewNews()
	{
		if($this->m_chkmain==1)
		{
			$strQry="UPDATE `news_info` SET `IsMain` =0";
			mysql_query($strQry);
		}
		$strSql = "INSERT INTO `news_info` (NewsDate, NewsEDate, NewsTime, IsActive, IsMain,  PageUrl, fkModuleID)
		VALUES ( '".$this->m_dtNewsDate."','".$this->m_dtNewsEDate."','".$this->m_dtNewsTime."',".$this->m_intIsActive.",".$this->m_chkmain.", '".$this->m_strPageUrl."','".$this->m_intModuleID."')";	
		//echo 	$strSql; exit;
		$rsSql = mysql_query($strSql);
		if(isset($rsSql))
		{
			$nID=mysql_insert_id();
			$this->m_intNewsId=$nID;
			$strSql = "INSERT INTO `news_desc` ( `NewsTitle` , `ShortDesc` , `LongDesc` , `fkNewsID` , `fkLangID` ) VALUES ( '".addslashes($this->m_strNewsTitle)."', '".addslashes($this->m_strShortDesc)."', '".addslashes($this->m_strLongDesc)."', '".$nID."', '".$this->m_intLangId."')";
			$rsSql = mysql_query($strSql);
		}
		if(mysql_affected_rows()>0)
			return TRUE;
		else
			return FALSE;
	}
	
	function GetNewsById()
	{ 
		$strSql = "SELECT * FROM `news_info` left outer join `news_desc` on `news_info`.`pkNewsId` = `news_desc`.fkNewsID and `news_desc`.fkLangID = ".$this->m_intLangId." WHERE `news_info`.`pkNewsId` = ".$this->m_intNewsId."";
		$rsSql = mysql_query($strSql);
		if($rsSql && mysql_num_rows($rsSql)>0) 
			return $rsSql;
		else
			return FALSE;
	}
	
	function GetNewsByUrl()
	{ 
		$strSql = "SELECT * FROM `news_info` left outer join `news_desc` on `news_info`.`pkNewsId` = `news_desc`.fkNewsID and `news_desc`.fkLangID = ".$this->m_intLangId." WHERE `news_info`.`PageUrl` = '".$this->m_strPageUrl."'";
		$rsSql = mysql_query($strSql);
		if($rsSql && mysql_num_rows($rsSql)>0) 
			return $rsSql;
		else
			return FALSE;
	}
	
	function EditNews()
	{
		$strSql = "UPDATE `news_info`  set NewsDate = '".$this->m_dtNewsDate."',  NewsEDate = '".$this->m_dtNewsEDate."', NewsTime = '".$this->m_dtNewsTime."', IsActive = ".$this->m_intIsActive.", PageUrl = '".$this->m_strPageUrl."' WHERE pkNewsId = ".$this->m_intNewsId;
		$rsSql = mysql_query($strSql);
		if(isset($rsSql))
		{
			$strSql="SELECT * FROM `news_desc` WHERE fkNewsID = ".$this->m_intNewsId." AND fkLangID = ".$this->m_intLangId;
			$rsSql = mysql_query($strSql);
			if($rsSql && mysql_num_rows($rsSql)>0) 
				$strSql="UPDATE `news_desc` SET `NewsTitle` = '".addslashes($this->m_strNewsTitle)."',`ShortDesc` = '".addslashes($this->m_strShortDesc)."',`LongDesc` = '".addslashes($this->m_strLongDesc)."' WHERE fkNewsID = ".$this->m_intNewsId." AND fkLangID = ".$this->m_intLangId."";
			else	
				$strSql = "INSERT INTO `news_desc` ( `NewsTitle` , `ShortDesc` , `LongDesc` , `fkNewsID` , `fkLangID` ) VALUES ( '".addslashes($this->m_strNewsTitle)."', '".addslashes($this->m_strShortDesc)."', '".addslashes($this->m_strLongDesc)."', '".$this->m_intNewsId."', '".$this->m_intLangId."')";
			$rsSql = mysql_query($strSql);
		}
		if(mysql_affected_rows()>0)
			return TRUE;
		else
			return FALSE;
	}
	
	function DeActivateNews()
	{
		$intNotActive = 0;
		$strSql = "UPDATE `news_info` SET IsActive = ".$intNotActive."
		WHERE pkNewsId = ".$this->m_intNewsId." AND pkLangId = ".$this->m_intLangId."";
		$rsSql = mysql_query($strSql);
		if(mysql_affected_rows()>0)
			return TRUE;
		else
			return FALSE;
	}
	
	function ActivateNews()
	{
		$intActive = 1;
		$strSql = "UPDATE `news_info` SET IsActive = ".$intActive."
		WHERE pkNewsId = ".$this->m_intNewsId." AND pkLangId = ".$this->m_intLangId."";
		$rsSql = mysql_query($strSql);
		if(mysql_affected_rows()>0)
			return TRUE;
		else
			return FALSE;
	}

	function DeleteNews()
	{
		$strSql = "DELETE FROM `news_info` WHERE pkNewsId = ".$this->m_intNewsId." AND pkLangId = ".$this->m_intLangId."";
		$rsSql = mysql_query($strSql);
		if(mysql_affected_rows()>0)
		{
			$this->DeleteNewsImageSelected();
			//$this->DeleteNewsImage();
			$this->DeleteNewsFile();
			return TRUE;
		}
		else
			return FALSE;
	}
	
	function GetNewsId()
	{
		$strNewsId = "SELECT fkNewsID FROM `news_desc` WHERE NewsTitle = '".$this->m_strNewsTitle."'";
		//echo $strNewsId;
		$rsNewsId = mysql_query($strNewsId);
		if($rsNewsId && mysql_num_rows($rsNewsId)>0)
		{
			$arrNewsId = mysql_fetch_object($rsNewsId);
			return $arrNewsId->pkNewsId;
		}
		else
			return FALSE;
	}
	function AddNewsImage()
	{
		if(empty($this->m_intNewsId))
		$this->m_intNewsId = $this->GetNewsId();
		$strQry="UPDATE `news_image_info` SET `IsMain` =0 WHERE `fkNewsId` =".$this->m_intNewsId;
		mysql_query($strQry);
		$strSql = "INSERT INTO `news_image_info` (fkNewsId, ImageName, IsMain) VALUES (".$this->m_intNewsId.",'".addslashes($this->m_strNewsImageName)."',1)";
		$rsSql = mysql_query($strSql);
		if(mysql_affected_rows()>0) 
		{
			$nID=mysql_insert_id();
			$strSql = "INSERT INTO `news_images_desc` (fkNImageId, pkLangId, ImageDesc) VALUES (".$nID.",'".addslashes($this->m_intLangId)."', '".addslashes($this->m_strImgDesc)."')";		
			mysql_query($strSql);
			return TRUE;
		}
		else
			return FALSE;
	}
	
	function DeleteNewsImage()
	{
		$strSql = "SELECT * FROM `news_images_desc` where fkNImageId = ".$this->m_intNewsImageId;
		$rsSql = mysql_query($strSql);
		if($rsSql && mysql_num_rows($rsSql)>0)
		{
			while($row=mysql_fetch_object($rsSql))
			{
				$strSql = "DELETE FROM `news_images_desc` WHERE fkNImageId = ".$this->m_intNewsImageId;
				$rsSql2=mysql_query($strSql);
				if($rsSql2 != NULL)
				{
					if(file_exists("NewsFiles/".$row->ImageName.""))
					unlink("NewsFiles/".$row->ImageName."");
					else if(file_exists("../NewsFiles/".$row->ImageName.""))
					unlink("../NewsFiles/".$row->ImageName."");
				}
				$strSql = "DELETE FROM `news_image_info` WHERE pkNewsImageId = ".$this->m_intNewsImageId;
				$rsSql2=mysql_query($strSql);
			}
		}
		else
			{
				$strSql = "DELETE FROM `news_image_info` WHERE pkNewsImageId = ".$this->m_intNewsImageId;
				$rsSql2=mysql_query($strSql);
			}
		if($rsSql2)
		{
			return TRUE;
		}
		else return FALSE;
	}
	
	function DeleteNewsImageSelected()
	{
		$strSql = "SELECT * FROM `news_image_info` where fkNewsId = ".$this->m_intNewsId;
		$rsSql = mysql_query($strSql);
		if($rsSql && mysql_num_rows($rsSql)>0)
		{
			while($row=mysql_fetch_object($rsSql))
			{
				$this->m_intNewsImageId = $row->pkNewsImageId;
				$strSql = "DELETE FROM `news_images_desc` WHERE fkNImageId = ".$this->m_intNewsImageId;
				$rsSql2=mysql_query($strSql);
				if($rsSql2 != NULL)
				{
					if(file_exists("NewsFiles/".$row->ImageName.""))
					unlink("NewsFiles/".$row->ImageName."");
					else if(file_exists("../NewsFiles/".$row->ImageName.""))
					unlink("../NewsFiles/".$row->ImageName."");
				}
				$strSql = "DELETE FROM `news_image_info` WHERE pkNewsImageId = ".$this->m_intNewsImageId;
				$rsSql2=mysql_query($strSql);
			}
		}
		else
			{
				$strSql = "DELETE FROM `news_image_info` WHERE pkNewsImageId = ".$this->m_intNewsImageId;
				$rsSql2=mysql_query($strSql);
			}
		if($rsSql2)
		{
			return TRUE;
		}
		else return FALSE;
	}
	function AddNewsFile($strFileName,$nType, $strControlName='flItemsFile')
	{
		//$nCheck=$this->UploadNewsFile($strControlName);
		//if($nCheck!= true)
		//	return $nCheck;
		$strSql = "INSERT INTO `news_file_info` (fkNewsId , FileName) VALUES (".$this->m_intNewsId.",'".addslashes($this->m_strNewsFileName)."')";
		$rsSql = mysql_query($strSql);
		if(mysql_affected_rows()>0)
			return TRUE;
		else
			return FALSE;
	}
	function DeleteNewsFile()
	{
		$strSql="SELECT * FROM `news_file_info` WHERE fkNewsId = ".$this->m_intNewsId;
		$rsSql=mysql_query($strSql);
		if($rsSql && mysql_num_rows($rsSql))
		{	
			while($row=mysql_fetch_object($rsSql))
			{
				$strSql = "DELETE FROM `news_file_info` WHERE pkNewsFileId = ".$row->pkNewsFileId;
				$rsSql2 = mysql_query($strSql);
				if($rsSql2 != NULL)
				if(mysql_affected_rows()>0)
				{
					if(file_exists("../NewsFiles/".$row->FileName.""))
						unlink("../NewsFiles/".$row->FileName."");
					else if(file_exists("NewsFiles/".$row->FileName.""))
						unlink("NewsFiles/".$row->FileName."");
				}
			}
		}
		if(mysql_affected_rows()>0)
			return true;
		else
			return false;
	}
	
	
	function DeleteFile()
	{
		$strSql="SELECT * FROM `news_file_info` WHERE pkNewsFileId = ".$this->m_intNewsFileId;
		$rsSql=mysql_query($strSql);
		if($rsSql && mysql_num_rows($rsSql)>0)
		{	
			while($row=mysql_fetch_object($rsSql))
			{
				$strSql = "DELETE FROM `news_file_info` WHERE pkNewsFileId = ".$row->pkNewsFileId;
				$rsSql2 = mysql_query($strSql);
				if($rsSql2 != NULL)
				if(mysql_affected_rows()>0)
				{
					if(file_exists("../NewsFiles/".$row->FileName.""))
						unlink("../NewsFiles/".$row->FileName."");
					else if(file_exists("NewsFiles/".$row->FileName.""))
						unlink("NewsFiles/".$row->FileName."");
				}	
			}
		
		}
		if(mysql_affected_rows()>0)
			return true;
		else
			return false;
	}
	
	function GetNews($npkModuleId,$intLowLimit=-1,$intUpLimit=0)
	{
		$strSql = "SELECT * FROM news_info left outer join news_desc ON (news_desc.fkNewsID=news_info.pkNewsId and news_desc.fkLangID = ".$this->m_intLangId.") Where fkModuleID = ".$npkModuleId;
		//echo $strSql;
		if($intLowLimit > -1 && $intUpLimit > 0 )
		$strSql .= " LIMIT ".$intLowLimit.",".$intUpLimit."";
		

		$rsSql = mysql_query($strSql);
		if($rsSql && mysql_num_rows($rsSql)>0)
			return $rsSql;
		else
			return FALSE;
	}

	function GetActiveNews()
	{
		$rsGlobalOption=GetGlobalOptions();
		$rowGlobalOption=mysql_fetch_object($rsGlobalOption);
		$strSql = "SELECT * FROM `news_info` left outer join news_desc ON (news_desc.fkNewsID=news_info.pkNewsId and news_desc.fkLangID = ".$this->m_intLangId.") WHERE IsActive = ".ACTIVE." AND fkModuleID = ".$this->m_intModuleID;
		//echo "qurey----".$strSql ; //exit;
		if($rowGlobalOption->LastDayMainNews != 0)
			$strSql .= " AND  NewsDate >= 'DATE_SUB(CURDATE(),INTERVAL ".$rowGlobalOption->LastDayMainNews." DAY)'";
		$strSql .=" ORDER BY IsMain desc, pkNewsId desc";
		if($rowGlobalOption->LatestMainNews != 0)
			$strSql .= " Limit 0,".$rowGlobalOption->LatestMainNews;
		$rsSql = mysql_query($strSql);
		if($rsSql && mysql_num_rows($rsSql)>0)
			return $rsSql;
		else
			return FALSE;
	}
	
	function GetMoreActiveNews()
	{
		$intIsActive = 1;
		$intNotMain = 0;
		$strSql = "SELECT * FROM `news_info` left outer join news_desc ON (news_desc.fkNewsID=news_info.pkNewsId and news_desc.fkLangID = ".$this->m_intLangId.") WHERE IsActive = ".$intIsActive." ORDER BY IsMain desc";
		$rsSql = mysql_query($strSql);
		if($rsSql && mysql_num_rows($rsSql)>0) 
			return $rsSql;
		else
			return FALSE;
	}

	function GetNewsImage()
	{
		$strSql = "SELECT * FROM `news_image_info` left outer join `news_images_desc` on `news_image_info`.pkNewsImageId=`news_images_desc`.fkNImageId and `news_images_desc`.pkLangId=".$this->m_intLangId." WHERE `fkNewsId` = ".$this->m_intNewsId." order by IsMain desc";
		//echo $strSql."<hr>";
		$rsSql = mysql_query($strSql);
		if($rsSql && mysql_num_rows($rsSql)>0)
			return $rsSql;
		else
			return FALSE;
	}
	
	function GetNewsMainImage()
	{
		$strSql = "SELECT * FROM `news_image_info` left outer join `news_images_desc` on (`news_image_info`.pkNewsImageId=`news_images_desc`.fkNImageId and `news_images_desc`.pkLangId=".$this->m_intLangId.") WHERE  `news_image_info`.IsMain =".ACTIVE." and `fkNewsId` = ".$this->m_intNewsId;
		
		//echo $strSql."<hr>"; exit;
		$rsSql = mysql_query($strSql);
		if($rsSql && mysql_num_rows($rsSql)>0) 
			return $rsSql;
		else
			return FALSE;
	}
	
	function GetNewsFile()
	{
		$strSql = "SELECT * FROM `news_file_info` WHERE `fkNewsId` = ".$this->m_intNewsId ;
		$rsSql = mysql_query($strSql);
		if($rsSql && mysql_num_rows($rsSql)>0)
			return $rsSql;
		else
			return FALSE;
	}
	
	function GetNewsFileName()
	{
		$strSql = "SELECT * FROM `news_file_info` WHERE `pkNewsFileId` = ".$this->m_intNewsFileId."";
		$rsSql = mysql_query($strSql);
		if(mysql_num_rows($rsSql)>0)
			return $rsSql;
		else
			return FALSE;
	}

	function NewsSearch()
	{
		$rsGlobalOption=GetGlobalOptions();
		$rowGlobalOption=mysql_fetch_object($rsGlobalOption);
		$strSql = "SELECT * FROM `news_info` left outer join news_desc on (`news_info`.pkNewsId=news_desc.fkNewsID and fkLangId = ".$this->m_intLangId.") WHERE IsActive = 1 ";
		
		//&& fkModuleID = ".$this->m_intModuleID;
		
		if(isset($this->m_strSearchWords) and $this->m_strSearchWords!='')
			$strSql .= " AND (`NewsTitle` LIKE '%".$this->m_strSearchWords."%' OR `ShortDesc` LIKE '%".$this->m_strSearchWords."%' OR `LongDesc` LIKE '%".$this->m_strSearchWords."%')";

		if((isset($this->m_strFromDate) && $this->m_strFromDate!="0-0-0") && (isset($this->m_strToDate) && $this->m_strToDate!="0-0-0"))
			 $strSql .= " AND (`NewsDate` BETWEEN '".$this->m_strFromDate."' AND '".$this->m_strToDate."')";
		$strSql.=" order by IsMain desc, pkNewsId desc";	 	
		//echo $strSql; exit;
		$rsSql = mysql_query($strSql);
		if($rsSql &&  mysql_num_rows($rsSql)>0)
			return $rsSql;
		else
			return FALSE;
	}
	
	function CheckNewsExistance()
	{
			$strSql = "SELECT * FROM `news_info` WHERE 	`pkNewsId` = ".$this->m_intNewsId."";
			$rsSql = mysql_query($strSql);
			if(mysql_num_rows($rsSql)>0)
				return TRUE;
			else
				return FALSE;
	}
	
	function MainNews()
	{			
		$strSql="Select * from `news_info`,`news_image_info` where news_info.IsMain=".$this->m_intIsMain." and news_info.pkNewsId=news_image_info.fkNewsId";
		$rsSql=mysql_query($strSql);
		if($rsSql && mysql_num_rows($rsSql)>0)
			return TRUE;
		else
			return FALSE;
	}
	
	function ActivateSelected()
	{
		foreach($this->m_arrNewsId as $this->m_intNewsId)
		{
			$intActive = 1;
			$strSql = "UPDATE `news_info` SET IsActive = ".$intActive." WHERE pkNewsId = ".$this->m_intNewsId;
			$rsSql = mysql_query($strSql);
		}
		return true;
	}
	
	function DeActivateSelected()
	{
		foreach($this->m_arrNewsId as $this->m_intNewsId)
		{
			$intNotActive = 0;
			$strSql = "UPDATE `news_info` SET IsActive = ".$intNotActive." WHERE pkNewsId = ".$this->m_intNewsId;
			$rsSql = mysql_query($strSql);
		}
		return true;

	}
	function DeleteSelected()
	{
		foreach($this->m_arrNewsId as $NewsId)
		{
			
			$strSql = "DELETE FROM `news_info` WHERE pkNewsId = ".$NewsId;
			$rsSql = mysql_query($strSql);
			if($rsSql != NULL)
			{
				$strSql = "DELETE FROM `news_desc` WHERE fkNewsID = ".$NewsId;// ." AND   fkLangID  = ".$this->m_intLangId.""
				$rsSql=mysql_query($strSql);
				if($rsSql != NULL)
				{	
					$this->m_intNewsId = $NewsId;
					//Call here image delete function to delete the image.
					$this->DeleteNewsImageSelected();
					//$this->DeleteNewsImage();
					//Call here news file function to to delete news file.
					$this->DeleteNewsFile();
				}
				if(isset($rsSql) && mysql_affected_rows()>0)
					return 3;
			}
			else return false;
		}
		return TRUE;
	}
	function DeleteSelectedOld()
	{
		foreach($this->m_arrNewsId as $NewsId)
		{
			
			$strSql = "DELETE FROM `news_info` WHERE pkNewsId = ".$NewsId;
			$rsSql = mysql_query($strSql);
			if($rsSql != NULL)
			{
				$strSql = "DELETE FROM `news_desc` WHERE fkNewsID = ".$NewsId;// ." AND   fkLangID  = ".$this->m_intLangId.""
				$rsSql=mysql_query($strSql);
				if($rsSql != NULL)
				{	
					$this->m_intNewsId = $NewsId;
					//Call here image delete function to delete the image.
					$this->DeleteNewsImage();
					//Call here news file function to to delete news file.
					$this->DeleteNewsFile();
				}
				if(isset($rsSql) && mysql_affected_rows()>0)
					return 3;
			}
			else return false;
		}
		return TRUE;
	}

	function SetAsMain()
	{
		$intNotMain = 0;
		$intIsMain = 1;
		$strSql = "UPDATE `news_info` SET `IsMain` = ".$intNotMain."";
		$rsSql = mysql_query($strSql);
		$strSql = "UPDATE `news_info` SET `IsMain` = ".$intIsMain." WHERE pkNewsId = ".$this->m_intNewsId."";
		$rsSql = mysql_query($strSql);
		if(mysql_affected_rows()>0)
		return TRUE;
		else return FALSE;
	}
	
	function GetMainNews()
	{
		$intIsMain = 1;
		$strSql = "SELECT * FROM `news_info` WHERE pkLangId = ".$this->m_intLangId." AND IsMain = ".$intIsMain."";
		$rsSql = mysql_query($strSql);
		if($rsSql && mysql_num_rows($rsSql) > 0)
			return $rsSql;
		else
			return FALSE;
	}
	
	function AddNewsImage2($strFileName,$nType, $strControlName='flItemsFile')
	{
		$nCheck=$this->UploadNewsImage($strControlName);
		if($nCheck!==true)
			return $nCheck;
		$strSql = "INSERT INTO `news_image_info` (fkNewsId, ImageName, IsMain) VALUES (".$this->m_intNewsId.",'".addslashes($this->m_strNewsImageName)."',0)";
		$rs=mysql_query($strSql);		
		if($rs)
		{
			$strSql ="SELECT MAX(pkNewsImageId) AS LastId FROM news_image_info where fkNewsId = ".$this->m_intNewsId;
			$rs = mysql_query($strSql) or die("Unable to select, Error: ".mysql_error());
			if($rs!=FALSE)
			{	
				$row = mysql_fetch_object($rs);
				$lastid=$row->LastId;
			}
				$strSql="INSERT INTO `news_images_desc` (`fkNImageId` , `ImageDesc` , `pkLangId` )VALUES ('".$lastid."','".addslashes($this->m_strImgDesc)."', '".$this->m_intLangId."')";
				$rsSql=mysql_query($strSql);
		}

		if(mysql_affected_rows()>0)
			return TRUE;
		else
			return FALSE;
	}

	function UploadNewsImage($strFlControl)
		{
			if(!is_file($_FILES[$strFlControl]['tmp_name']))
				return "FILE_NOT_FOUND";
			$strFile=UploadFile("../index.php", 'NewsFiles/',substr(microtime(),3,5), 'jpg,jpeg,gif', $strFlControl,$intMaxSize=2094304);
			if($strFile=="InvalidWidth" || $strFile=="InvalidHeight" || $strFile=="InvalidSize" || $strFile=="InvalidExtension" || $strFile=="UploadErr")
				return "File_NOT_UPLOADED";
			else
			{	$this->m_strNewsImageName=$strFile;
				$this->m_strFile=$strFile;
				return true;
			}	
		}
	function getNewsImgInfo()
	{
		$strSql = "SELECT * FROM `news_image_info` WHERE `fkNewsId` = ".$this->m_intNewsId."";
		$rsSql = mysql_query($strSql);
		if(mysql_affected_rows()>0)
			return TRUE;
		else
			return FALSE;
	}
	function GetNewsDescById()
	{
		$strQry="select * from news_images_desc where fkNImageId=".$this->m_intNewsImageId;
		$rs=mysql_query($strQry);
		if($rs && mysql_num_rows($rs)>0)
			return $rs;
		else
			return false;
	}

	function TranslateNewsImageDesc()
	{
			$strSql="Select * from `news_images_desc` where fkNImageId=".$this->m_nfkImgId." and pkLangId=".$this->m_intLangId;
			$rsQry=mysql_query($strSql);
			if($rsQry)
			{
				if(mysql_num_rows($rsQry)>0)
				{
					$strSqlDetail="UPDATE `news_images_desc` set ImageDesc= '".$this->m_strImageDesc."' where fkNImageId=".$this->m_nfkImgId." and pkLangId=".$this->m_intLangId;
					
				}
				else
					$strSqlDetail = "INSERT INTO `news_images_desc` (fkNImageId,ImageDesc,pkLangId ) VALUES(".$this->m_nfkImgId.",'".$this->m_strImageDesc."',".$this->m_intLangId.")";
			}
			else $strSqlDetail = "INSERT INTO `news_images_desc` (fkNImageId,ImageDesc,pkLangId ) VALUES(".$this->m_nfkImgId.",'".$this->m_strImageDesc."',".$this->m_intLangId.")";
			$rsSqlDetail  = mysql_query($strSqlDetail);
			if(mysql_affected_rows()>0)
				return true;
			else
				return false;

	}
	
	function UploadNewsFile($strFlControl)
	{
		if(!is_file($_FILES[$strFlControl]['tmp_name']))
			return "FILE_NOT_FOUND";
		$strFile=UploadFile("../index.php", 'NewsFiles/',substr(microtime(),3,5), 'txt,doc,csv,xls,pdf,ppt,rtf,htm,html,chm', $strFlControl,$intMaxSize=4194304);
		if($strFile=="InvalidWidth" || $strFile=="InvalidHeight" || $strFile=="InvalidSize" || $strFile=="InvalidExtension" || $strFile=="UploadErr")
			return "File_NOT_UPLOADED";
		else
		{	$this->m_strNewsImageName=$strFile;
			$this->m_strFile=$strFile;
			return true;
		}	
	}
	function GetNewsFiles($nNewsId)
	{
			$strSql = "SELECT * FROM `news_file_info` WHERE `fkNewsId` = ".$nNewsId;
			$rsSql = mysql_query($strSql);
			if($rsSql && mysql_num_rows($rsSql)>0)
				return $rsSql;
			else
				return FALSE;
	}
	///////////////////////////
	function SelectImgByIdandLang($nId,$LangId)
		{
		$strSql="SELECT * FROM `news_images_desc` where  fkNImageId=".$nId." and pkLangId=".$LangId;
		$rsQry=mysql_query($strSql);
		if($rsQry)
			return $rsQry;
		else
			return false;
		}
	function SetAsMainImage()
	{
		$strQry="select * from `news_image_info` where fkNewsId=".$this->m_intNewsId." and IsMain=1";
		$rsQry=mysql_query($strQry);
		if($rsQry && mysql_num_rows($rsQry)>0)
		{
			$strSql = "UPDATE `news_image_info` SET IsMain=0 where fkNewsId=".$this->m_intNewsId;
			mysql_query($strSql);
		}
		$strSql = "UPDATE `news_image_info` SET IsMain= 1 WHERE pkNewsImageId = ".$this->m_intNewsImageId."";
		$rsUpdate=mysql_query($strSql);
		if($rsUpdate)
			return true;
		else
			false;
	}
	
	function GetActiveScrollingNews($nLastDaysScrollNews,$nLatestScrollNews)
	{
		$strSql = "SELECT * FROM `news_info`, news_desc ,modules  WHERE  ModuleType=".CONST_MODULE_SCRNEWS." AND (pkModuleId = fkModuleID) AND (news_info.pkNewsId=news_desc.fkNewsID AND news_info.IsActive = ".ACTIVE." AND pkModuleId=".$this->m_intModuleID.")";
	if($nLastDaysScrollNews != 0)
	//	$strSql .= " AND  NewsDate >= 'DATE_SUB(CURDATE(),INTERVAL ".$nLastDaysScrollNews." DAY)'";
	$strSql .=" ORDER BY IsMain desc, pkNewsId desc";
	if($nLatestScrollNews != 0)
		$strSql .= " Limit 0,".$nLatestScrollNews;
	//print "<br> sql ===>".$strSql;
		$rsQry = mysql_query($strSql);
		if($rsQry)
			return $rsQry;
		else
			return false;
	}
	
	function TranslateNews()
	{
		$strSql="SELECT * FROM  news_desc  WHERE fkNewsID='".$this->m_intNewsId."' and fkLangID ='".$this->m_intLangId."'";
		$rsSql=mysql_query($strSql);
		if($rsSql && mysql_num_rows($rsSql)>0)
		{
			$strSql="UPDATE `news_desc` SET `NewsTitle` = '".$this->m_strNewsTitle."' , `ShortDesc` ='".$this->m_strShortDesc."',`LongDesc`='".$this->m_strLongDesc."' WHERE fkNewsID='".$this->m_intNewsId."' and fkLangID ='".$this->m_intLangId."'";
		}
		else
		{
			$strSql="INSERT INTO `news_desc` ( `NewsTitle` , `ShortDesc` , `LongDesc` , `fkNewsID`,`fkLangID` ) VALUES ( '".$this->m_strNewsTitle."', '".$this->m_strShortDesc."', '".$this->m_strLongDesc."', '".$this->m_intNewsId."', '".$this->m_intLangId."')";
		}
		$rsSql=mysql_query($strSql);
		if(isset($rsSql))
			return true;
		else
			return false;
	}
	
	function SelectNewsById()
	{
		$strSql="SELECT * FROM  news_desc  WHERE fkNewsID=".$this->m_intNewsId;
		$rsSql=mysql_query($strSql);
		if($rsSql &&  mysql_num_rows($rsSql)>0)
			return $rsSql;
		return
			false;		
	}
	
	function SelectNewsByIdAndLang($nCurrLang)
	{
		$strSql="SELECT * FROM  news_desc  WHERE fkNewsID=".$this->m_intNewsId." AND fkLangID =".$nCurrLang;
		//echo $strSql;
		$rsSql=mysql_query($strSql);
		if($rsSql && mysql_num_rows($rsSql)>0)
			return $rsSql;
		return
			false;
	}
	
	function GetNewsImageDesc()
	{
	$strSql="SELECT * FROM `news_images_desc` WHERE fkNImageId = ".$this->m_intNewsImageId;
	$rsQry = mysql_query($strSql);
	if($rsQry != NULL)
		if(isset($rsQry))
			if(mysql_num_rows($rsQry)>0)
			return $rsQry;
			else return false;
	return false;
	}
	
	function SelectNewsImageDescById($nLangId)
	{
		$strQry="Select * from `news_images_desc` WHERE fkNImageId = ".$this->m_intNewsImageId." AND pkLangId =".$nLangId;
		//echo $strQry;
		$rsQry=mysql_query($strQry);
		if($rsQry && mysql_num_rows($rsQry)>0)
			return mysql_fetch_object($rsQry);
		return
			false;
	}
	
	function EditNewsImageDesc()
	{
		$strSql="Select * from `news_images_desc` WHERE fkNImageId = ".$this->m_nfkImgId." AND pkLangId =".$this->m_intLangId ;
		//echo $strSql;exit;
		$rsSql=mysql_query($strSql);
		if($rsSql != NULL)
		{
			if(isset($rsSql))
			if($row=mysql_num_rows($rsSql)>0)
				{
				$row=mysql_fetch_object($rsSql);
				$nNewsId=$row->fkNImageId;
				$strSql="UPDATE `news_images_desc` SET `ImageDesc` = '".$this->m_strImageDesc."' WHERE fkNImageId = ".$this->m_nfkImgId." AND pkLangId =".$this->m_intLangId;
				}			
			else 
				$strSql="INSERT INTO `news_images_desc` ( `fkNImageId` , `pkLangId` , `ImageDesc` ) VALUES ('".$this->m_nfkImgId."', '".$this->m_intLangId."', '".$this->m_strImageDesc."')";
		}
		else 
			$strSql="INSERT INTO `news_images_desc` ( `fkNImageId` , `pkLangId` , `ImageDesc` ) VALUES ('".$this->m_nfkImgId."', '".$this->m_intLangId."', '".$this->m_strImageDesc."')";
		
		$rsSql=mysql_query($strSql);
		
		echo $rsSql;
		if($rsSql != NULL)
		if($rsSql)
			return true;
		else
			return false;
	}
	
	function GetNewsByLangId()
	{
	$strSql="SELECT * FROM `news_desc` WHERE fkLangID = ".$this->m_intLangId." AND fkNewsID = ".$this->m_intNewsId;
	$rsSql=mysql_query($strSql);
	if($rsSql && mysql_num_rows($rsSql)>0)
		return $rsSql;
	else
		return false;
	}
	
	function GetDefaultDesc()
	{
	$strSql="SELECT * FROM `news_images_desc`,`news_image_info`  WHERE `news_images_desc`.pkLangId = ".$_SESSION['intLangId']." and `news_image_info`.fkNewsId = ".$objRow->fkNewsId." and `news_image_info`.pkNewsImageId=`news_images_desc`.fkNImageId ";
	$rsSqlTemp = mysql_query($strSql);
	if($rsSqlTemp != NULL)
	{
		if($rsSqlTemp && mysql_num_rows($rsSqlTemp)>0)
		{
			$rowTemp=mysql_fetch_object($rsSqlTemp);
			return $rowTemp->ImageDesc;
		}
	}
	else return false;
	}




	

///////////////////////////For News Modules/////////////////////////////////////////////////////////////////////////////////////////

function AddNewsGallery($scrolling,$strModuleDesc,$nActive=ACTIVE, $nSearchOpt, $nType = CONST_MODULE_NEWS)
	{
		$objData = new clsDatabaseManager();
		$nLayout = "";
		$nImagesPerRow = "0";
		if($scrolling==1)
		{
		//echo $scrolling;exit;
		$nID  = $objData->InsertAutoTable("modules","ModuleDesc,IsActive,ModuleType,LayoutId","'".$strModuleDesc."',".$nActive.",".CONST_MODULE_SCRNEWS.",".$nSearchOpt);
		}
		else
		{
		//echo "Not Scrolling";exit;
		//echo $nScrNewsModuleId  ;exit;
		$nID = $objData->InsertAutoTable("modules","ModuleDesc,IsActive,ModuleType,LayoutId","'".$strModuleDesc."',".$nActive.",".$nType.",".$nSearchOpt."");
		}
		return $nID;
	}
	function GetGalleryByNews($strGalleryName, $nGalleryID)
	{
		$objData = new clsDatabaseManager();
		$strWhere = "";
		if ($nGalleryID != 0)
		{
			$strWhere = " pkModuleId <> ".$nGalleryID." AND ModuleType=".CONST_MODULE_NEWS;
		}
		else		
			$strWhere .= " ModuleType=".$this->m_nModuleType;
		$rsSql = $objData->SelectTable("modules","*","ModuleDesc ='".$strGalleryName."'",$strWhere);
		return $rsSql;
	}
	
	function UpdateNewsGallery($scrolling,$nGalleryID, $nStatus=ACTIVE, $strGalleryName,$nSearchOpt)
	{
		/*//for getting the scrolling news Module id
		$nGetScrNewsModuleId = "SELECT ScrNewsModuleId from modules where pkModuleId = ".$nGalleryID;
		$Result=mysql_query($nGetScrNewsModuleId);
		$ScrNewsId = mysql_fetch_object($Result);
		$nScrNewsModuleId = $ScrNewsId->ScrNewsModuleId;
			*/	
		$objData = new clsDatabaseManager();
		//$rsSql1 = $objData->UpdateTable("modules", "`ModuleDesc` = '".$strGalleryName."',`IsActive` = '".$nStatus."',`LayoutId` = '".$nSearchOpt."'","pkModuleId = ".$nScrNewsModuleId );
		if($scrolling==1)
		{
			$nType = CONST_MODULE_SCRNEWS;
		}
		else
		{
			$nType = CONST_MODULE_NEWS;
		}
		$rsSql = $objData->UpdateTable("modules", "`ModuleDesc` = '".$strGalleryName."',`IsActive` = '".$nStatus."',`ModuleType` = '".$nType."',`LayoutId` = '".$nSearchOpt."'","pkModuleId = ".$nGalleryID );

		return $rsSql;
	}

	function GetGallery($nType = CONST_MODULE_NEWS)
	{
		$objData = new clsDatabaseManager();
		$rsSql = $objData->SelectTable("modules","*"," ModuleType =".$nType." OR ModuleType = ".CONST_MODULE_SCRNEWS );
		return $rsSql;
	}
		
	function GetModuleImages()
	{
		$strSql="select * from gallery_images where fkModuleID=".$this->m_intModuleID;//print $strSql;
		$rs=mysql_query($strSql);
		if($rs && mysql_num_rows($rs))
			return true;
		else
			return false;
	}
	
	function GetGalleryByID($nGalleryID, $nType = CONST_MODULE_NEWS)
	{
		$objData = new clsDatabaseManager();
		$rsSql = $objData->SelectTable("modules","*"," ModuleType =".$nType." AND pkModuleId = ".$nGalleryID." AND IsActive = ".ACTIVE."");
		return $rsSql;
	}
	
	function GetGalleryByIdAnyStatus($nGalleryID, $nType = CONST_MODULE_NEWS)
	{
		$objData = new clsDatabaseManager();
		$rsSql = $objData->SelectTable("modules","*"," (ModuleType =".$nType." OR ModuleType = ".CONST_MODULE_SCRNEWS.")  AND pkModuleId = ".$nGalleryID);
		return $rsSql;
	}
	
	function StatusGallery($nGalleryID, $nStatus=ACTIVE)
	{
		//for getting the scrolling news Module id
		$nGetScrNewsModuleId = "SELECT ScrNewsModuleId from modules where pkModuleId = ".$nGalleryID;
		$objData = new clsDatabaseManager();
		$rsSql = $objData->UpdateTable("modules", " `IsActive` = '".$nStatus."'"," pkModuleId = ".$nGalleryID);
		return $rsSql;
	}
	function DeleteGallery($nGalleryID)
	{
		//for getting the scrolling news Module id
		$nGetScrNewsModuleId = "SELECT ScrNewsModuleId from modules where pkModuleId = ".$nGalleryID;
		//$Result=mysql_query($nGetScrNewsModuleId);
		//$ScrNewsId = mysql_fetch_object($Result);
		//$nScrNewsModuleId = $ScrNewsId->ScrNewsModuleId;
		
		$objData = new clsDatabaseManager();
		 $nCheck = $this->GettotalNews($nGalleryID);
		if ($nCheck > 0)
		{
			return "EXIST";		
		}
		else			
		{
			$rsSql = $objData->DeleteTable("modules"," pkModuleId = ".$nGalleryID);
			//$rsSql = $objData->DeleteTable("modules"," pkModuleId = ".$nScrNewsModuleId);
			return "DELETED";
		}
	}
	function GettotalNews($nModuleID)
	{
		$strSql="Select * from news_info where fkModuleID = ".$nModuleID;
		$rsSql=mysql_query($strSql);
		if($rsSql != false && mysql_num_rows($rsSql)>0)
			return $rsSql; 		
		else
			return 0;
	}
	function GetModuleName($nGalleryID)//this function tells us from which the gallery belongs.
	{
		$objData = new clsDatabaseManager();
		$rsSql = $objData->SelectTable("module_types"," Description","pkModuleTypeID= ".$nGalleryID,"Description");

		if ($rsSql != false && mysql_num_rows($rsSql)>0)
		{
			$row = mysql_fetch_object($rsSql);
			return $row->Description;
		}
		return false;
	}
	
	
	function GetGalleryName($nGalleryID, $nType=CONST_MODULE_NEWS)
	{
		$objData = new clsDatabaseManager();
		$rsSql = $objData->SelectTable("modules"," ModuleDesc"," pkModuleId = ".$nGalleryID );
		//echo $rsSql;//exit;
//		$rsSql = $objData->SelectTable("modules"," ModuleDesc"," ModuleType =".$nType." AND pkModuleId = ".$nGalleryID );
		if ($rsSql != false && mysql_num_rows($rsSql)>0)
		{
			$row = mysql_fetch_object($rsSql);
			return $row->ModuleDesc;
		}
		return false;
	}

	function GetGalleryNewsName($nGalleryID)
	{
		$objData = new clsDatabaseManager();
		$rs=$objData->SelectTable("news_info","pkNewsId"," fkModuleID =".$nGalleryID );
		if($rs)
		{
			if(mysql_num_rows($rs)>0)
			{
				while($objRow=mysql_fetch_object($rs))
				{
					$nNewsModuleID=$objRow->pkNewsId;
					//echo "News Module----->".$nNewsModuleID; exit;
				}
			}
		}

				
		$rsSql = $objData->SelectTable("news_desc"," NewsTitle"," fkNewsID =". $nNewsModuleID);
		//echo "gallery by news name----".$rsSql; exit;
		if ($rsSql != false && mysql_num_rows($rsSql)>0)
		{
			$row = mysql_fetch_object($rsSql);
			return $row->NewsTitle;
		}
		return false;
	}
	
	function TotalNews($nGalleryID)
	{
		$strSql = "SELECT * FROM news_info Where fkModuleID = ".$nGalleryID;
		$rsSql = mysql_query($strSql);
		if($rsSql && mysql_num_rows($rsSql)>0)
			return $rsSql;
		else
			return FALSE;
	}
	
	function getNewsImgInfo2($intNewsId)
	{
		$strSql = "SELECT * FROM `news_image_info` WHERE `fkNewsId` = ".$intNewsId."";
		$rsSql = mysql_query($strSql);
		if(mysql_affected_rows()>0)
			return $rsSql;
		else
			return FALSE;
	}
	
	/**
		start of functions for Creating XML for RSS
	**/
	function CreateXMLforRSS()
	{

		$rsNews = $this->GetActiveNews();
		
		if ($rsNews && mysql_num_rows($rsNews)>0)
	

		
		$strXMLforRSS.= "<?xml version='1.0' encoding='ISO-8859-1' ?>
				<?xml-stylesheet href='http://feeds.feedburner.com/~d/styles/rss2full.xsl' type='text/xsl' media='screen'?><?xml-stylesheet href='http://feeds.feedburner.com/~d/styles/itemcontent.css' type='text/css' media='screen'?>
				<rss version='2.0'>
			<channel>
		<title>DigitalSpinners</title>
		<link>http://www.downloadwarez.org/</link>
		<description>Latest DigitalSpinners(News) downloads</description>
		<ttl>240</ttl>
		<generator>DigitalSpinners - http://www.cmsdemo.dsinternal.com</generator>
	
		<atom10:link xmlns:atom10='http://www.w3.org/2005/Atom' rel='self' href='http://feeds.feedburner.com/downloadwarez' type='application/rss+xml' /><feedburner:emailServiceId xmlns:feedburner='http://rssnamespace.org/feedburner/ext/1.0'>935464</feedburner:emailServiceId><feedburner:feedburnerHostname xmlns:feedburner='http://rssnamespace.org/feedburner/ext/1.0'>http://www.feedburner.com</feedburner:feedburnerHostname>
		  ";
		while($row = mysql_fetch_object($rsNews))
		{	
			 $strLongDes = str_replace("&ldquo;"," ",$row->LongDesc);
			 $strLongDes = str_replace("&"," ",$row->LongDesc);
			 $strLongDes = str_replace("&lt;","<",$row->LongDesc);
			 $strLongDes = str_replace("&gt;",">",$row->LongDesc);
			 $strLongDes = str_replace("&quot;"," ",$row->LongDesc);
			 $strLongDes = str_replace("&rdquo;"," ",$row->LongDesc);
			 //$strLongDes = str_replace("/","&#47",$row->LongDesc);
			 //$strLongDes = str_replace("\\","&#92",$row->LongDesc);
			 $strLongDes = str_replace("&nbsp;"," ",$row->LongDesc);
			 $strLongDes = stripslashes($strLongDes);
			 $strLongDes = strip_tags($strLongDes);
			 
			 
			 {
			 	
			 }
			 	
				$strXMLforRSS.= "<item ><title>".$row->NewsTitle."</title> 
				<link>".$row->ShortDesc."</link>
				<description>".$strLongDes."</description></item>";
		}		
					
		$strXMLforRSS.="</channel>
	 				</rss>
				 ";
	return $strXMLforRSS;
	}
	
	
	/**
		end of functions for Creating XML for RSS
	**/
	
}
?>