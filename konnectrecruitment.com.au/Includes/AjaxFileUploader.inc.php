<?php
	/**
	 * This class uploads a file, without refreshing the page (Using Javascript)
	 * 
	 * @author Rochak Chauhan
	 * 
	 * @todo all the PHP 4.x users are requested to remove "PUBLIC", "PRIVATE" and "PROTECTED" keywords before the functions
	 * @version 2 
	 * 
	 */
	class AjaxFileuploader {
		
		// PHP 4.x users replace "PRIVATE" from the following lines with VAR
		var $uploadDirectory = '';
		var $uploaderIdArray = array();
		
		/**
		 * Constructor Function
		 * 
		 */
		function AjaxFileuploader($uploadDirectory) {
			
			if (trim($uploadDirectory) != '' && is_dir($uploadDirectory)) {
				$this->uploadDirectory = $uploadDirectory;
			}
			else {
				die("<b>ERROR:</b> Failed to open Directory: $uploadDirectory");
			}
		}
		
		/**
		 * @todo This function only scans in one level. you can modify this function to read from the subdirectries too
		 * 
		 * This function return all the files in the upload directory, sorted according to their file types
		 *
		 * @return array
		 */		
		function getAllUploadedFiles() {
			$returnArray = array();
			
			$allFiles = $this->scanUploadedDirectory();
						
			$returnArray['images'] = $this->returnUplodedImages($allFiles);
			$returnArray['sounds'] = $this->returnUplodedSounds($allFiles);
			$returnArray['videos'] = $this->returnUplodedVideos($allFiles);
			$returnArray['others'] = $this->returnMiscUplodedFiles($allFiles);
			
			return $returnArray;
		}
		
		/**
		 * 
		 * This function scans uploaded directory and returns all the files in it
		 *  
		 * @return array
		 */
		function scanUploadedDirectory() {
			$returnArray = array();
			if ($handle = opendir($this->uploadDirectory)) {
			   
				while (false !== ($file = readdir($handle))) {
			    	 if (is_file($this->uploadDirectory."/".$file)) {
			    	 	$returnArray[] = $file;
			    	 }
				}
			
			   closedir($handle);
			}
			else {
				die("<b>ERROR: </b> Could not read directory: ". $this->uploadDirectory);
			}
			return $returnArray;			
		}
		
		function ShowUploadedFiles()
		{
			$arrFiles=$this->scanUploadedDirectory();
			print_r($arrFiles);
		}
		
		/**
		 * This function returns html code for uploading a file
		 * 
		 * @param string $uploaderId
		 * 
		 * @return string
		 */
		function showFileUploader($uploaderId) {
			if (in_array($uploaderId, $this->uploaderIdArray)) {
				die($uploaderId." already used. please choose another id.");
				return '';
			}
			else {
				$this->uploaderIdArray[] = $uploaderId;
			
				return '<form id="formName'.$uploaderId.'" method="post" enctype="multipart/form-data" action="imageupload.php" target="iframe'.$uploaderId.'">
							<input type="hidden" name="id" value="'.$uploaderId.'" />
							<span id="uploader'.$uploaderId.'" style="font-family:verdana;font-size:10;">
								Upload File: <input name="'.$uploaderId.'" type="file" value="'.$uploaderId.'" onchange="return uploadFile(this)" />
							</span>
							<iframe name="iframe'.$uploaderId.'" src="imageupload.php" width="400" height="100" style="display:none"> </iframe>
						</form>';
			}
		}

		function UploadItemsFile($strFlControl)
		{
			if(!is_file($_FILES[$strFlControl]['tmp_name']))
				return "FILE_NOT_FOUND";
			$strFile=UploadFile("../index.php", 'UploadedFiles/',substr(microtime(),3,5), 'mp3,MP3,txt,doc,jpg,jpeg,gif,csv, CSV', $strFlControl);
			//print $strFile;
			if($strFile=="InvalidWidth" || $strFile=="InvalidHeight" || $strFile=="InvalidSize" || $strFile=="InvalidExtension" || $strFile=="UploadErr")
				return "File_NOT_UPLOADED";
			else
			{
				$this->m_strFile=$strFile;
				return true;
			}	
		}

		function SelectAllDocs($nType)
		{
			$strSql="Select * from uploaded_files where Type=".$nType;
			//echo $strSql;
			$rs=mysql_query($strSql) or die ("Select All Docs Error ".mysql_error());
			return $rs;
		}
		function AddDocs($strFileName,$nType, $strControlName='flItemsFile')
		{
			$nCheck=$this->UploadItemsFile($strControlName);
			if($nCheck!==true)
				return $nCheck;
			$strSql="Insert into uploaded_files (File,Type) values('".$this->m_strFile."','".$nType."')";
			//echo $strSql;
			$rs=mysql_query($strSql) or die ("Add Docs Error ".mysql_error());
			if(mysql_affected_rows()>0)
				return TRUE;
			else
			{
				unlink("../UploadedFiles/".$strFile);
				return FALSE;
			}	
		}
		function DeleteDoc($nDoc)
		{
			$strSql="Select * from uploaded_files where pkID=".$nDoc;
			//echo $strSql;
			$rs=mysql_query($strSql) or die ("Select All Docs Error ".mysql_error());
			if(mysql_num_rows($rs)>0)
			{
				$objRow=mysql_fetch_object($rs);
				
				$strSql="Delete from uploaded_files where pkID='".$nDoc."'";
				print $strSql;
				$nCheck=mysql_query($strSql);
				if($nCheck)
				{
					unlink("../UploadedFiles/".$objRow->File);
					return TRUE;
				}
				else
					return FALSE;
			}		
			else
				return FALSE;
		}
		function SelectAllImages()
		{
			$strSql="Select * from gallery_images ";
			//echo $strSql;
			$rs=mysql_query($strSql) or die ("Select All Docs Error ".mysql_error());
			return $rs;
		}
		function AddImages($strFileName,$nType, $strControlName='flItemsFile')
		{  
			$nCheck=$this->UploadImage($strControlName); 
			if($nCheck!==true)
				return $nCheck;
			$strSql="INSERT INTO `gallery_images` ( `ImageRank` , `IsActive` , `fkModuleID` , `ImageName` )
			VALUES ( '2', '1', '23', '".$this->m_strFile."')";
			//echo $strSql;
			$rs=mysql_query($strSql) or die ("Add Docs Error ".mysql_error());
			if(mysql_affected_rows()>0)
				return TRUE;
			else
			{
				unlink("../GalleryPictures/".$strFile);
				return FALSE;
			}	
		}
		function UploadImage($strFlControl)
		{
			if(!is_file($_FILES[$strFlControl]['tmp_name']))
				return "FILE_NOT_FOUND";
			$strFile=UploadFile("../index.php", 'GalleryPictures/',substr(microtime(),3,5), 'jpg,jpeg,gif', $strFlControl);
			// print $strFile;
			if($strFile=="InvalidWidth" || $strFile=="InvalidHeight" || $strFile=="InvalidSize" || $strFile=="InvalidExtension" || $strFile=="UploadErr")
				return "File_NOT_UPLOADED";
			else
			{
				$this->m_strFile=$strFile;
				return true;
			}	
		}
		
	}
?>