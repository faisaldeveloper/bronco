<?php
/**
 * @Developer Yasir Abbasi
 * @version 1.0
 * @created 24-Dec-2005 12:29:23 PM
 */
class clsFile
{

	/**
	 * It is used for primary key of the database which is a auto generated integer.
	 *  
	 */
	var $m_nId;
	/**
	 * It is used to store short description.
	 * 
	 */
	var $m_strShortDesc;
	/**
	 * It is used to store detailed information for the file
	 */
	var $m_strDetailedDesc;
	/**
	 * Used to store Image
	 */
	var $m_strImage;
	/**
	 * Stores file name.
	 */
	var $m_strFileName;
	/**
	 * Stores file title.
	 */
	var $m_strFileTitle;
	/**
	 * Stores 1 for audio and 0 for video.
	 */
	var $m_nIsAudio;
	
	var $m_intModuleID; 


	function clsFile()
	{
	}

	/**
	 * Used to add new file
	 */
	function Add($strFile,$strTitle,$strShortDesc="",$strDesc="",$strImageCtl="flImage",$strVideoClipCtl="flVideoClip",$strMovieExt,$strImgExt,$strImage="",$pkModuleID,$nIsAudio=0)
	{
		/* ******************** inserting file in uploaded_files table ***************** */	
		$objDM =new clsDatabaseManager();
		$nId=$objDM->InsertAutoTable('uploaded_files'," `FileName` , `ShortDesc` , `LongDesc` , `Image` , `FileTitle` , `IsAudio` ,`fkModuleID`","'".$strFile."','".htmlspecialchars($strShortDesc)."','".htmlspecialchars($strDesc)."','".$strImage."','".$strTitle."',".$nIsAudio.",".$pkModuleID);
		if($nId>0)
		{
			if(!empty($strImageCtl))				
				UploadFile("../index.php", "UploadedFilesImages", $nId, $strImgExt, $strImageCtl);
			if(!empty($strVideoClipCtl))		
			{
				$intMaxSize=1048576*50;		
				UploadFile("../index.php", "UploadedFiles", $nId, $strMovieExt, $strVideoClipCtl, $intMaxSize);
			}
			return true;
		}
		else
			return false;
	}		
	/**
	 * Used to update file 
	 * @param   strImageCtl    set the Iamge of the movie.
	 * @param   strVideoClipCtl    set the Video Clip of the movie.
	 */
	function update($strMovieExt,$strImgExt,$strImageCtl="",$VideoClipCtrl="")
	{
		/* ************************** Update product ********************************************* */
		$objDM =new clsDatabaseManager();
		$nSqlCheck=$objDM->UpdateTable('uploaded_files',"`FileName`='".$this->m_strFileName."' , `ShortDesc`='".$this->m_strShortDesc."', `LongDesc`='".$this->m_strDetailedDesc."', `Image`='".$this->m_strImage."', `FileTitle`='".$this->m_strFileTitle."' , `IsAudio`=".$this->m_nIsAudio,"uploaded_files. pkID=".$this->m_nId);
		if($nSqlCheck)
		{
			/* ************************** Upload image********************************************* */
			if($strImageCtl != "")
				UploadFile("../index.php", "UploadedFilesImages", $this->m_nId, $strImgExt, $strImageCtl);
			if($VideoClipCtrl != "")		
			{
				$intMaxSize=1048576*50;		
				UploadFile("../index.php", "UploadedFiles", $this->m_nId, $strMovieExt, $VideoClipCtrl, $intMaxSize);
			}
			return true;
		}
		else
			return false;
	}

	/**
	 * Used to delete movie.
	 
	 */
	function Delete()
	{
		$this->DelFileImg();
		$this->DelFileClip();
		/* ****		delete file from table ******* */
		$objDM =new clsDatabaseManager();
		$nRows = $objDM->DeleteTable('uploaded_files',' pkID='.$this->m_nId);
		if($nRows > 0)
			return true;
		else 
			return false;
	}

	/**
	 * Used to get brief information of the specific file
	 */
	function GetInfo()
	{
		$objDM =new clsDatabaseManager();
  		$rsSql=$objDM->SelectTable('uploaded_files','FileName,ShortDesc,Image,FileTitle,LongDesc,IsAudio',"  pkID=".$this->m_nId);
		return $rsSql;
	}
	/**
	 *  The non-static method will return all files.
    */
	function GetAll()
	{
		$objDM =new clsDatabaseManager();
	
		$arrWhere=array();
		if(isset($this->m_intModuleID) && !empty($this->m_intModuleID))
		{
			$arrWhere[] = " fkModuleID =".$this->m_intModuleID;
		}
		
		if(count($arrWhere)>0)
			$strWhere = implode(" AND ",$arrWhere);

		$rsSql=$objDM->SelectTable('uploaded_files','Image As Image,FileName, pkID,ShortDesc,FileTitle,IsAudio',$strWhere);
		return $rsSql;
	}
	/**
	 *  The non-static method will return all files.
    */
	function GetAllVideoFiles()
	{
	
		$arrWhere=array();
		if(isset($this->m_intModuleID) && !empty($this->m_intModuleID))
		{
			$arrWhere[] = "fkModuleID =".$this->m_intModuleID;
		}
		
		$arrWhere[] = "IsAudio=0";
		
		if(count($arrWhere)>0)
			$strWhere = implode(" AND ",$arrWhere);
		
		$objDM =new clsDatabaseManager();
		$rsSql=$objDM->SelectTable('uploaded_files','Image As Image,FileName,pkID,ShortDesc,FileTitle,IsAudio',$strWhere);
		return $rsSql;
	}
	/**
	 *  The non-static method will return all files.
    */
	function GetAllAudeoFiles()
	{
	
		$arrWhere=array();
		if(isset($this->m_intModuleID) && !empty($this->m_intModuleID))
		{
			$arrWhere[] = " fkModuleID =".$this->m_intModuleID;
		}
		
		$arrWhere[] = "IsAudio=1";

		if(count($arrWhere)>0)
			$strWhere = implode(" AND ",$arrWhere);

		$objDM =new clsDatabaseManager();
		$rsSql=$objDM->SelectTable('uploaded_files','Image As Image,FileName,pkID,ShortDesc,FileTitle,IsAudio',$strWhere);
		return $rsSql;
	}
	/**
	 * Delete file image.
	 * @param strPic    Delete image of the file by strPic.
	*/
	function DelFileImg($strPic="")
	{
		$strPicPath="../UploadedFilesImages/";
		
		if(empty($strPic))
		{
			$objDM =new clsDatabaseManager();
			$rsSql=$objDM->SelectTable('uploaded_files','Image'," pkID=".$this->m_nId);
			$objRow=mysql_fetch_object($rsSql);
		    mysql_free_result($rsSql);				
			$strPicPath.=$this->m_nId."_".$objRow->Image;
			$strImageName = $objRow->Image;
		}
		else
			$strPicPath.=$strPic;
		$objDM =new clsDatabaseManager();
		$rsSql=$objDM->UpdateTable('uploaded_files',"Image='".$strPic."'"," pkID=".$this->m_nId);

		if($strImageName!="" || $strPic!="")
		{
			unlink($strPicPath);	
			return true;
		}
		else
			return false;
	}
	/**
	 * Delete file Video Trailor.
	 * @param strVideoClip    Delete VideoTrailor of the file by strVideoClip.
	*/
	function DelFileClip($strVideoClip="")
	{
		$strVideoClipPath="../UploadedFiles/";	
		if(empty($strVideoClip))
		{
			$objDM =new clsDatabaseManager();
			$rsSql=$objDM->SelectTable('uploaded_files','FileName'," pkID=".$this->m_nId);
			$objRow=mysql_fetch_object($rsSql);
		    mysql_free_result($rsSql);				
			$strVideoClipPath.=$this->m_nId."_".$objRow->FileName;
			$strFileName = $objRow->FileName;
		}
		else
			$strVideoClipPath.=$strVideoClip;
		$objDM = new clsDatabaseManager();
		$rsSql=$objDM->UpdateTable('uploaded_files',"FileName='".$strFileName."'"," pkID=".$this->m_nId);
		//echo $strVideoClipPath."====>".mysql_affected_rows();exit;
		if($strFileName!="" || $strVideoClip!="")
		{	
			unlink($strVideoClipPath);	
			return true;
		}
		else
			return false;
	}

///////////////////////////For Audio/Video Modules///////////////////////////////////////////////////////////////

function AddNewsGallery($strModuleDesc,$nActive=ACTIVE,$nType)
	{
		//echo "inserted in add gallery-------".$nType;exit;
		$objData = new clsDatabaseManager();
		//$rsSql = $this->GetGalleryByNews($strModuleDesc);
		$nLayout = "";
		$nImagesPerRow = "0";
	//	if ($rsSql == false || mysql_num_rows($rsSql)<1)
	//	{
			$nID = $objData->InsertAutoTable("modules","ModuleDesc,IsActive,ModuleType","'".$strModuleDesc."',".$nActive.",".$nType);
			return $nID;
	//	}
		//	return "EXIST";	
	}
	function GetGalleryByNews($strGalleryName, $nGalleryID=0)
	{
		$objData = new clsDatabaseManager();
		$strWhere = "";
		if ($nGalleryID != 0)
			$strWhere = " AND pkModuleId <> ".$nGalleryID;
		$rsSql = $objData->SelectTable("modules","*","ModuleDesc ='".$strGalleryName."'".$strWhere);
		return $rsSql;
	}
	
	function UpdateNewsGallery($nGalleryID, $nStatus=ACTIVE, $strGalleryName)
	{
		
		$objData = new clsDatabaseManager();
		$rsSql = $this->GetGalleryByNews($strGalleryName, $nGalleryID);
		
		if ($rsSql == false || mysql_num_rows($rsSql)<1)
		{
			//echo "inserted in update class---".$rsSql; exit;
			$rsSql = $objData->UpdateTable("modules", "`ModuleDesc` = '".$strGalleryName."',`IsActive` = '".$nStatus."'","pkModuleId = ".$nGalleryID);
			//echo $rsSql; exit;
			return $rsSql;
		}	
		return "EXIST";	

	}

function GetGallery()
	{
		$objData = new clsDatabaseManager();
		$rsSql = $objData->SelectTable("modules","*"," ModuleType IN(".CONST_MODULE_AUDIO.",".CONST_MODULE_VIDEO.")");
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
	
	function GetGalleryByID($nGalleryID, $nType = CONST_MODULE_AUDIO)
	{
		$objData = new clsDatabaseManager();
		$rsSql = $objData->SelectTable("modules","*"," ModuleType =".$nType." AND pkModuleId = ".$nGalleryID." AND IsActive = ".ACTIVE."");
		return $rsSql;
	}
	
	function GetGalleryByIdAnyStatus($nGalleryID, $nType)
	{
		//echo $nType; exit;
		$objData = new clsDatabaseManager();
		$rsSql = $objData->SelectTable("modules","*"," ModuleType =".$nType." AND pkModuleId = ".$nGalleryID);
		//echo $rsSql;exit;
		return $rsSql;
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
		 $nCheck = $this->GettotalNews($nGalleryID);
		if ($nCheck > 0)
			return "EXIST";		
		else			
			$rsSql = $objData->DeleteTable("modules"," pkModuleId = ".$nGalleryID);
		return $rsSql;
	}
	
	function GettotalNews($nModuleID)
	{
		$strSql="Select * from uploaded_files where fkModuleID = ".$nModuleID;
		$rsSql=mysql_query($strSql);
		if($rsSql != false && mysql_num_rows($rsSql)>0)
			return $rsSql; 		
		else
			return 0;
	}

	function GetGalleryName($nModuleID)
	{
		$objData = new clsDatabaseManager();
		$rsSql = $objData->SelectTable("modules"," ModuleDesc"," ModuleType IN(".CONST_MODULE_AUDIO.",".CONST_MODULE_VIDEO.") AND pkModuleId = ".$nModuleID );
		if ($rsSql != false && mysql_num_rows($rsSql)>0)
		{
			$row = mysql_fetch_object($rsSql);
			return $row->ModuleDesc;
		}
		return false;
	}

}



?>