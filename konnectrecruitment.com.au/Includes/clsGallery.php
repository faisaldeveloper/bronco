<?php
/********************************************************************************
* Date 25-05-2005																*
* Author: Talib Siddique (Software Engineer)									*
* Owner: DigitalSpinners														*
*********************************************************************************/

//---------------------  START CLASS FOR IMAGE GALLERY -------------------------
class clsGallery
{
	var $m_intGImageId; 
	var $m_strImageName;
	var $m_strImageDesc;
	var $m_intIsActive;
	var $m_intLangId;
	var $m_intImageRank;
	var $m_intImagesIds;
	var $m_intModuleID;
	var $uploadDirectory = '';
	var $uploaderIdArray = array();

	// FUNCTION BY FAHEEM USED IN ImageGallery.php AT ROOT[FRONT OFFICE]
	function GetGalleryImagesByModuleId()
	{
		$strSelectQuery = "SELECT * FROM gallery_images INNER JOIN modules ON gallery_images.fkModuleID = modules.pkModuleId LEFT OUTER JOIN gallery_images_desc ON gallery_images.pkGImageId = gallery_images_desc.fkGImageId and gallery_images_desc.fkLangId = '".$this->m_intLangId."' WHERE gallery_images.fkModuleID = ".$this->m_intModuleID." and gallery_images.IsActive = ".ACTIVE;
		$rsSql = mysql_query($strSelectQuery);
		if($rsSql != false && mysql_num_rows($rsSql)>0)
			return $rsSql; 		
		else
			return 0;
	}
	function GettotalImages($nModuleID)
	{
		$strSql="Select * from gallery_images where fkModuleID = ".$nModuleID;
		$rsSql=mysql_query($strSql);
		if($rsSql != false && mysql_num_rows($rsSql)>0)
			return $rsSql; 		
		else
			return 0;
	}
	function GetImageGallery()
	{
		$strSql="Select * from gallery_images_desc,gallery_images where gallery_images.pkGImageId=gallery_images_desc.fkGImageId order by gallery_images.Imagerank";
		$rsSql=mysql_query($strSql);
		if($rsSql && mysql_num_rows($rsSql)>0)
			return $rsSql;
		else
			return 0;
	}

	function GetImageGalleryById()
	{
		$strSql="Select gallery_images_desc.*, gallery_images.* from gallery_images Left Outer Join gallery_images_desc ON (gallery_images.pkGImageId=gallery_images_desc.fkGImageId AND gallery_images_desc.pkLangId=".$this->m_intLangId.") where gallery_images.pkGImageId=".$this->m_intGImageId." ORDER BY gallery_images.ImageRank ASC";
		$rsSql=mysql_query($strSql);
		if( $strSql != false && mysql_num_rows($rsSql)>0)
			return $rsSql;
		else
			return 0;
		
	}
	function GetImageGalleryForTwoId()
	{
		$strSql="Select * from gallery_images_desc,gallery_images where gallery_images.pkGImageId=".$this->m_intGImageId." and gallery_images.pkGImageId=gallery_images_desc.fkGImageId";
		$rsSql=mysql_query($strSql);
		if($rsSql && mysql_num_rows($rsSql)>1)
			return $rsSql;
		else
			return 0;
	}

	function GetImageGalleryByLangId($nGalleryID)
	{
		$strSql="Select gallery_images_desc.*, gallery_images.* from gallery_images Left Outer Join gallery_images_desc ON (gallery_images.pkGImageId=gallery_images_desc.fkGImageId AND gallery_images_desc.pkLangId=".$this->m_intLangId.") where gallery_images.fkModuleID = ".$nGalleryID." ORDER BY gallery_images.ImageRank ASC";
		$rsSql=mysql_query($strSql);
		if($rsSql != false && mysql_num_rows($rsSql)>0)
			return $rsSql;
		else
			return 0;
	}

	function UploadGalleryImage($nGalleryID)
	{
		$strSql = "INSERT INTO `gallery_images` (ImageRank, IsActive, fkModuleID, ImageName) VALUES (".$this->m_intImageRank.",".$this->m_intIsActive.",".$nGalleryID.",'".$this->m_strImageName."')";
		$rsSql = mysql_query($strSql);
		if(mysql_affected_rows()>0)
		{
			$strMaxId = "SELECT MAX(pkGImageId) as LastId FROM `gallery_images`";
			$intRsMaxId = mysql_query($strMaxId);
			if($intRsMaxId && mysql_num_rows($intRsMaxId)>0)
			{
				$intArrMaxId = mysql_fetch_array($intRsMaxId);
				$intNewId = $intArrMaxId['LastId'];
			}
			else $intNewId = 1;
			$this->m_intGImageId = $intNewId;
			$strSqlDetail = "INSERT INTO `gallery_images_desc` (fkGImageId,ImageDesc,pkLangId ) VALUES(".$this->m_intGImageId.",'".$this->m_strImageDesc."',".$this->m_intLangId.")";
			$rsSqlDetail  = mysql_query($strSqlDetail);
			if(mysql_affected_rows()>0)
				return $rsSqlDetail;
			else 
				return false;
		}
	}
	function TranslateImageDesc()
	{
			$strSql="Select * from `gallery_images_desc` where fkGImageId=".$this->m_intGImageId." and fkLangId=".$this->m_intLangId;
			
			$rsQry=mysql_query($strSql);
			if($rsQry && mysql_num_rows($rsQry)>0)
			{
				$strqry="delete from `gallery_images_desc` where fkGImageId=".$this->m_intGImageId." and fkLangId=".$this->m_intLangId;
				mysql_query($strqry);
			}
			$strSqlDetail = "INSERT INTO `gallery_images_desc` (fkGImageId,ImageDesc,fkLangId ) VALUES(".$this->m_intGImageId.",'".$this->m_strImageDesc."',".$this->m_intLangId.")";
			//print($strSqlDetail);exit;
			$rsSqlDetail  = mysql_query($strSqlDetail);
			if(mysql_affected_rows()>0)
			return true;
			else return false;

	}
	function GetTranslatedLang()
	{
		$objData = new clsDatabaseManager();
		$rsSql = $objData->SelectTable("gallery_images_desc","fkLangId"," fkGImageId = ".$this->m_intGImageId);
		return $rsSql ;
	}
	
	function EditGalleryInfo()
	{
		$strSql = "UPDATE `gallery_images` SET ImageRank = ".$this->m_intImageRank.", ImageName='".$this->m_strImageName."', IsActive = ".$this->m_intIsActive." WHERE pkGImageID = ".$this->m_intGImageId."";
		$rsSql = mysql_query($strSql);
		$strSql2 =  "UPDATE `gallery_images_desc` SET ImageDesc  = '".$this->m_strImageDesc."',pkLangId = ".$this->m_intLangId." WHERE fkGImageID = ".$this->m_intGImageId." AND pkLangId = ".$this->m_intLangId."";
		$rsSql2 = mysql_query($strSql2);
		return true;
	}
	
	function DeleteGalleryInfo()
	{
		$strSql2 = "DELETE FROM `gallery_images_desc` WHERE fkGImageId = ".$this->m_intGImageId." AND pkLangId = ".$this->m_intLangId."";
		$rsSql2 = mysql_query($strSql2);
		$strSql3= "select * from `gallery_images_desc` where fkGImageId=".$this->m_intGImageId;
		$rsSql3=mysql_query($strSql3);
			if(mysql_num_rows($rsSql3)>0)
			{
			if(mysql_affected_rows()>0)
					return true;
				else
					return false;
			}
			else
			{
				$strSql = "DELETE FROM `gallery_images` WHERE pkGImageId = ".$this->m_intGImageId."";
				$rsSql = mysql_query($strSql);
				if(mysql_affected_rows()>0)
					return true;
				else
					return false;
			}
	}
//--------------------------------To Set Uploading Path Of Image---------------------------------------//
	function SetImagePath()
	{
			$strMyPath = realpath ("../index.php"); 
			$strUploadDir = "GalleryPictures";
			
			if (strpos($strMyPath,"\\") > -1 )
			{		//Windows
				$strFinalPath = substr($strMyPath,0,strrpos($strMyPath,"\\")+1).$strUploadDir."\\";
			
				if(!is_dir($strFinalPath))
				{
					mkdir($strFinalPath);
				}
				$strFinalPath = substr($strMyPath,0,strrpos($strMyPath,"\\")+1).$strUploadDir."\\";			
			
			}
			else
			{      //Linux
				$strFinalPath = substr($strMyPath,0,strrpos($strMyPath,"/")+1).$strUploadDir."/";
				if(!is_dir($strFinalPath))
				{
					mkdir($strFinalPath);
				}
				$strFinalPath = substr($strMyPath,0,strrpos($strMyPath,"/")+1).$strUploadDir."/";
			}
			return $strFinalPath;
	}

	//--------------------------------------------To Delete Image------------------------------------------//
	function DeleteImage()
	{
		$strSql="Update `gallery_images_desc` set ImageName='' where fkGImageId ='".$this->m_intGImageId."' and pkLangId=".$this->m_intLangId; 
		$iCheck=mysql_query($strSql);
		if($iCheck==1)
		{	
			$strFinalPath=$this->SetImagePath();
			$strFileNamePath=$strFinalPath.$this->m_strImageName;		
			unlink($strFileNamePath);
		}
		return $iCheck;
	}
//----------------------------------------- CODE ADDED BY [ IT  on 13-06-2006 ]--------------------------//
	function ActivateSelected()
	{
		foreach($this->m_intImagesIds as $this->m_intGImageId)
		{
			$intActive = 1;
			$strSql = "UPDATE `gallery_images` SET IsActive = ".$intActive."
			WHERE pkGImageId = ".$this->m_intGImageId."";
			$rsSql = mysql_query($strSql);
		}
		return 1;
	}

	function DeActivateSelected()
	{
		foreach($this->m_intImagesIds as $this->m_intGImageId)
		{
			$intNotActive = 0;
			$strSql = "UPDATE `gallery_images` SET IsActive = ".$intNotActive."
			WHERE pkGImageId = ".$this->m_intGImageId."";
			$rsSql = mysql_query($strSql);
		}
		if(isset($rsSql))
		return 2;

	}
	
	function DeleteSelected()
	{
		foreach($this->m_intImagesIds as $this->m_intGImageId)
		{
			$strSqlImgName = "SELECT * FROM `gallery_images` WHERE pkGImageId=".$this->m_intGImageId."";
			$rsSqlImgName = mysql_query($strSqlImgName);
			if ($rsSqlImgName != false && mysql_num_rows($rsSqlImgName)>0)
			{
				$resSqlImgName = mysql_fetch_object($rsSqlImgName);
				$strGalImageName = $resSqlImgName->ImageName;
				unlink("../GalleryPictures/_".$strGalImageName."");
				$strSql = "DELETE FROM `gallery_images` WHERE pkGImageId = ".$this->m_intGImageId."";
				$rsSql = mysql_query($strSql);
				$strSql2 = "DELETE FROM `gallery_images_desc` WHERE fkGImageId = ".$this->m_intGImageId."";
				$rsSql2 = mysql_query($strSql2);
			}
			else 
				return false;	
		}
		return TRUE;
	}
	
	function GetAllActiveImages($intLowLimit=-1,$intUpLimit=0)
	{
		$intActive = 1;
		$strSql = "SELECT gallery_images_desc.*,gallery_images.* FROM gallery_images_desc,gallery_images ";
		$strSql .= " WHERE gallery_images_desc.fkGImageId = gallery_images.pkGImageId AND gallery_images_desc.pkLangId = ".$this->m_intLangId." AND gallery_images.IsActive = ".$intActive." ORDER BY gallery_images.ImageRank ";
		if($intLowLimit > -1 && $intUpLimit > 0 )
			$strSql .= " LIMIT ".$intLowLimit.",".$intUpLimit."";
		$rsSql = mysql_query($strSql) or die("All Images Query ".mysql_error());
		if($rsSql && mysql_num_rows($rsSql) > 0)
			return $rsSql;
		else
			return FALSE;
	}
	
	function GetAllImagesRanks($nGalleryID)
	{
		$strSql="Select * from gallery_images where fkModuleID=".$nGalleryID;
		$rsSql=mysql_query($strSql);
		if(mysql_num_rows($rsSql)>0)
			return $rsSql; 		
		else return 0;
	}
	
	function GetLastImageRank($nGalleryID)
	{
		$strSql ="SELECT MAX(ImageRank) AS ImageRank FROM gallery_images where fkModuleID = ".$nGalleryID;
		$rs = mysql_query($strSql) or die("Unable to select, Error: ".mysql_error());
		if($rs && mysql_num_rows($rs) > 0)
		{	
			$row = mysql_fetch_object($rs);
			return $row->ImageRank;
		}
		else
			return false;
	}
	function GetGallery($nType = CONST_MODULE_IMAGEGALLERY)
	{
		$objData = new clsDatabaseManager();
		$rsSql = $objData->SelectTable("modules","*"," ModuleType =".$nType);
		return $rsSql;
	}
	function GetGalleryByID($nGalleryID, $nType = CONST_MODULE_IMAGEGALLERY)
	{
		$objData = new clsDatabaseManager();
		$rsSql = $objData->SelectTable("modules","*"," ModuleType =".$nType." AND pkModuleId = ".$nGalleryID." AND IsActive = ".ACTIVE."");
		return $rsSql;
	}

	function GetGalleryName($nGalleryID, $nType=CONST_MODULE_IMAGEGALLERY)
	{
		$objData = new clsDatabaseManager();
		$rsSql = $objData->SelectTable("modules"," ModuleDesc"," ModuleType =".$nType." AND pkModuleId = ".$nGalleryID);
		
		if ($rsSql != false && mysql_num_rows($rsSql)>0)
		{
			$row = mysql_fetch_object($rsSql);
			return $row->ModuleDesc;
		}
		return false;
	}

	function StatusGallery($nGalleryID, $nStatus=ACTIVE)
	{
		$objData = new clsDatabaseManager();
		$rsSql = $objData->UpdateTable("modules", " `IsActive` = '".$nStatus."'"," pkModuleId = ".$nGalleryID);
		return $rsSql;
	}
	function DeleteGallery($nGalleryID)
	{
		$objData = new clsDatabaseManager();
		 $nCheck = $this->GettotalImages($nGalleryID);
		if ($nCheck > 0)
			return "EXIST";		
		else			
			$rsSql = $objData->DeleteTable("modules"," pkModuleId = ".$nGalleryID);


		return $rsSql;
	}
	function AddGallery($strModuleDesc,$nActive=ACTIVE,$nLayout,$nImagesPerRow, $nType = CONST_MODULE_IMAGEGALLERY)
	{
		$objData = new clsDatabaseManager();
		//$rsSql = $this->GetGalleryByName($strModuleDesc);
	//	if ($rsSql == false || mysql_num_rows($rsSql)<1)
		//{
			$nID = $objData->InsertAutoTable("modules","ModuleDesc,IsActive,ModuleType,LayoutID,ImagesPerRow","'".$strModuleDesc."',".$nActive.",".$nType.",".$nLayout.",'".$nImagesPerRow."'");
			return $nID;
		//}
			//return "EXIST";	
	}
	function GetGalleryByName($strGalleryName, $nGalleryID=0)
	{
		$objData = new clsDatabaseManager();
		$strWhere = "";
		if ($nGalleryID != 0)
			$strWhere = " AND pkModuleId <> ".$nGalleryID;
		$rsSql = $objData->SelectTable("modules","*","ModuleDesc ='".$strGalleryName."'".$strWhere);
		return $rsSql;
	}
	
	function UpdateGallery($nGalleryID, $nStatus=ACTIVE, $nLayout, $strGalleryName, $nImagesPerRow)
	{
		$objData = new clsDatabaseManager();
		$rsSql = $this->GetGalleryByName($strGalleryName, $nGalleryID);
		if ($rsSql == false || mysql_num_rows($rsSql)<1)
		{
		$rsSql = $objData->UpdateTable("modules", "`ModuleDesc` = '".$strGalleryName."',`IsActive` = '".$nStatus."', `LayoutID` = '".$nLayout."',`ImagesPerRow` = '".$nImagesPerRow."'" ,"pkModuleId = ".$nGalleryID);
		
			
			return $rsSql;
		}	
		return "EXIST";	

	}
	///////////////////////This is for ajax files///////////
	function SelectAllImages()
	{
		$strSql="Select * from `gallery_images` left outer join `gallery_images_desc` on pkGImageId=fkGImageId and fkLangId=".$this->m_intLangId." where gallery_images.fkModuleID=".$this->m_intModuleID." order by  ImageRank";
		$rs=mysql_query($strSql) or die ("Select All Docs Error ".mysql_error());
		if($rs && mysql_num_rows($rs))
			return $rs;
		else
			return false;
	}
	
	function AddImages($strFileName,$nType, $strControlName='flItemsFile')
	{ 
		$nCheck=$this->UploadImage($strControlName); 
		if($nCheck!==true)
			return $nCheck;
		$strSql="INSERT INTO `gallery_images` ( `ImageRank` , `IsActive` , `fkModuleID` , `ImageName` )
		VALUES ( '".$this->m_intImageRank."', '".$this->m_intIsActive."', '".$this->m_intModuleID."', '".$this->m_strFile."')";
		$rs=mysql_query($strSql) or die ("Add Docs Error ".mysql_error());
		if($rs)
		{	
			$strMaxId = "SELECT MAX(pkGImageId) as LastId FROM `gallery_images`";
			$intRsMaxId = mysql_query($strMaxId);
			if($intRsMaxId && mysql_num_rows($intRsMaxId)>0)
			{
				$intArrMaxId = mysql_fetch_array($intRsMaxId);
				$intNewId = $intArrMaxId['LastId'];
			}
			else $intNewId = 1;
			$this->m_intGImageId = $intNewId;
			$strSqlDetail = "INSERT INTO `gallery_images_desc` (fkGImageId,ImageDesc,fkLangId ) VALUES(".$this->m_intGImageId.",'".$this->m_strImageDesc."',".$_SESSION['intLangId'].")";
			$rsSqlDetail  = mysql_query($strSqlDetail);
			if(mysql_affected_rows()>0)
				return $rsSqlDetail;
			else 
				return false;
				
		}
		else
		{
			unlink("../GalleryImages/".$strFile);
			return FALSE;
		}	
	}
	
	function UploadImage($strFlControl)
	{
		if(!is_file($_FILES[$strFlControl]['tmp_name']))
			return "FILE_NOT_FOUND";
		$strFile=UploadFile("../index.php", 'GalleryPictures/',substr(microtime(),3,5), 'mp3,MP3,txt,doc,jpg,jpeg,gif,csv, CSV', $strFlControl);
		if($strFile=="InvalidWidth" || $strFile=="InvalidHeight" || $strFile=="InvalidSize" || $strFile=="InvalidExtension" || $strFile=="UploadErr")
			return "File_NOT_UPLOADED";
		else
		{
			$this->m_strFile=$strFile;
			return true;
		}	
	}
	
	function DeleteGalleryImg()
	{
		$strSel="SELECT * FROM `gallery_images` where  pkGImageId=".$this->m_intGImageId;
		//echo $strSel;exit;			
		$rsQry=mysql_query($strSel);			
		if(isset($rsQry) && mysql_num_rows($rsQry)>0)
		{$row=mysql_fetch_array($rsQry);
			unlink("../GalleryPictures/".$row['ImageName']);
			$strQry="DELETE FROM `gallery_images` where  pkGImageId=".$this->m_intGImageId;
			$rsDel=mysql_query($strQry);
			$strQry="DELETE FROM `gallery_images_desc` where  fkGImageId=".$this->m_intGImageId;
			$rsDel2=mysql_query($strQry);
			
			if(!isset($rsDel) || !isset($rsDel2))
				return false;
			return true;
		}
		else return false;
	}

	function SelectImageDescById()
	{
		$strSql="SELECT * FROM `gallery_images_desc` where  fkGImageId=".$this->m_intGImageId;
		$rsQry=mysql_query($strSql);
		if($rsQry && mysql_num_rows($rsQry))
			return $rsQry;
		else
			return false;
	}

	function SelectImgByIdandLang($nId,$LangId)
	{
		$strSql="SELECT * FROM `gallery_images_desc` where  fkGImageId=".$nId." and pkLangId=".$LangId;
		$rsQry=mysql_query($strSql);
		if($rsQry && mysql_num_rows($rsQry))
			return $rsQry;
		else
			return false;
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
	
	function SelectGalImgDescById($nID)
	{
		$strSql="SELECT * FROM `gallery_images_desc` WHERE fkGImageId =".$nID;
	  	$rsSql=mysql_query($strSql);
		if($rsSql && mysql_num_rows($rsSql))
			return $rsSql;
		return false;
	}
	
	function EditGalleryImageDesc()
	{
		/*$strSql="SELECT * FROM `gallery_images_desc` WHERE `fkGImageId`=".$this->m_intGImageId." and `fkLangId`=".$_SESSION['intLangId'];
		$rsSql=mysql_query($strSql);
		if($rsSql != NULL)
		{
			if($rsSql &mysql_num_rows($rsSql)>0)
				$strSql="UPDATE `gallery_images_desc` SET `ImageDesc` = '".$this->m_strImageDesc."' WHERE `fkGImageId`=".$this->m_intGImageId." and `fkLangId`=".$_SESSION['intLangId'];
			else 
				$strSql = "INSERT INTO `gallery_images_desc` (`fkGImageId` , `ImageDesc` , `fkLangId` ) VALUES ('".$this->m_intGImageId."', '".$this->m_strImageDesc."', '".$_SESSION['intLangId']."')";
			}
		else 
			$strSql = "INSERT INTO `gallery_images_desc` (`fkGImageId` , `ImageDesc` , `fkLangId` ) VALUES ('".$this->m_intGImageId."', '".$this->m_strImageDesc."', '".$_SESSION['intLangId']."')";
		$rsSql=mysql_query($strSql);
		if(mysql_affected_rows()>0)
			return true;
		else
			return false;*/
			//$strSql="SELECT * FROM `gallery_images_desc` WHERE `fkGImageId`=".$this->m_intGImageId." and `fkLangId`=".$_SESSION['intLangId'];
		//$rsSql=mysql_query($strSql);
		//if($rsSql != NULL)
		//{
			//if($rsSql &mysql_num_rows($rsSql)>0)
			//{
				$strSql="UPDATE `gallery_images_desc` SET `ImageDesc` = '".$this->m_strImageDesc."' WHERE `fkGImageId`=".$this->m_intGImageId." and `fkLangId`=".$_SESSION['intLangId'];
				
				$strSqly="UPDATE `gallery_images` SET `ImageRank` = '".$this->m_intImageRank."' WHERE `pkGImageId`=".$this->m_intGImageId;
				//echo "Rank = ".$strSqly;exit;
				mysql_query($strSqly);
				
			/*}
			else 
				$strSql = "INSERT INTO `gallery_images_desc` (`fkGImageId` , `ImageDesc` , `fkLangId` ) VALUES ('".$this->m_intGImageId."', '".$this->m_strImageDesc."', '".$_SESSION['intLangId']."')";
			}
		else 
			$strSql = "INSERT INTO `gallery_images_desc` (`fkGImageId` , `ImageDesc` , `fkLangId` ) VALUES ('".$this->m_intGImageId."', '".$this->m_strImageDesc."', '".$_SESSION['intLangId']."')";*/
		$rsSql=mysql_query($strSql);
		if(mysql_affected_rows()>0)
			return true;
		else
			return false;
	
	}
		
//----------------------------------------- END OF CODE ADDED BY [ IT  on 13-06-2006 ]--------------------------//	
}
?>