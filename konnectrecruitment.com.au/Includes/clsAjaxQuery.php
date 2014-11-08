<?php
class clsAjaxQuery
{
	function GetDataRecords($nCaseID,$strWhere,$strControlName,$strOnChange="", $nComboOptions=0)
	{
		if(isset($strWhere) && !empty($strWhere))
		{
			$arrVals=explode(',',$strWhere);
			foreach($arrVals as $Val)
			{
				$arrV1=explode(':',$Val);
				$arrQry[$arrV1[0]]=$arrV1[1];
			}
		}		
		$objData=new clsDatabaseManager();
		switch($nCaseID)
		{
			case AJAX_UPLOADED_IMAGES:
			$strResponse="";
				$strUploadDirectory = "../GalleryPictures/";
				$objGallery = new clsGallery();
				$objLang=new clslanguage();
				$objGallery->m_intLangId=$arrQry['nLangId'];
				$objGallery->m_intModuleID=$arrQry['nModID'];
				$objGallery->uploadDirectory=$strUploadDirectory;	
					$rs=$objGallery->SelectAllImages();
					if($rs && mysql_num_rows($rs)>0)
					{
						$nCounter=1;
						
						$strPath=$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
						$strResponse.="<form name='frmGalImage' action='GalleryImageAction.php' method='post' target='upload_iframe'>
						<table width='100%'>
							<tr><td><input name='chkCheckAll' type='checkbox' id='chkCheckAll' value='1' onClick=\"selectAll(this.form,'chkImageGal[]')\">
							Select All</td></tr><tr>";
						while($objRow=mysql_fetch_object($rs))
						{	$strFile = $objRow->ImageName;
							$size = filesize($strUploadDirectory.$objRow->ImageName);
							$humansize = humansize($size);
							if($objRow->IsActive==1)
								$strStatus = "Active";
							else $strStatus = "De Active";
							 list($width,$height,$type,$attr) = getimagesize($strUploadDirectory.$objRow->ImageName);
							 $tempWidth = $width+50;
							 $tempHeight = $height+50;
							 $strPath = $strUploadDirectory.$objRow->ImageName;
							$strResponse.="
							  		<td width='25%' align='left'>
										<table width='22%' align='left'>
										  <tr align='left' valign='middle'>
											<td width='15%'><input type='checkbox' name='chkImageGal[]' id='chkImageGal[]' value='".$objRow->pkGImageId."'></td><td>
											<a  href='#' onClick=\"window.open('PreviewImage.php?id='+'".$strPath."&width=".$width."','','width=".$tempWidth.",height=".$tempHeight."')\"><img src='../PhpThumb/phpThumb.php?src=".$strPath."&h=50&w=120'></a>
										    </td>
										  </tr>
										  <tr>
											<td width='45%' align='right' class='txtBld_grey' >Status:</td>
											<td width='55%'>".$strStatus."</td>
										  </tr><tr>
											<td width='45%' align='right' class='txtBld_grey' >Rank:</td>
											<td width='55%'>".$objRow->ImageRank."</td>
										  </tr>
										  <tr>
										    <td align='right' class='txtBld_grey'>Desc:</td>
										    <td >".$objRow->ImageDesc."</td>
									      </tr>
										  <tr>
											<td align='center' >
											<a href='EditGalleryImageDesc.php?id=".$objRow->pkGImageId."&hdnpkId=".$objRow->pkId."&hdnLangId=".$objRow->pkLangId."&hdnGalleryID=".$objRow->fkModuleID."&strImgName=".$objRow->ImageName."&strDesc=".$objRow->ImageDesc."&nModId=".$objRow->fkModuleID."'>Edit</a>
											</td>
											<td><a href='TranslateGalleryImageDesc.php?id=".$objRow->pkGImageId."&hdnpkId=".$objRow->pkId."&hdnLangId=".$objRow->pkLangId."&hdnGalleryID=".$objRow->fkModuleID."&strImgName=".$objRow->ImageName."'>Translate</a>
											</td>
										  </tr>
							  </table>							  </td>
										  ";
							if($nCounter%4==0)
								$strResponse.="</tr><tr>";
							$nCounter++;				  
						}
						$strResponse.="</tr><tr><td colspan='2'><input type='submit' name='btndelete' value='Delete Selected'>
							<input name='btnAllActive' type='image' id='btnAllStatus' title='Status Change' src='Images/btn_activate.gif' value='".ACTIVE."' onClick='Active(1,this.form)'> <input name='btnAll' type='image' id='btnAllStatus' title='Status Change' src='Images/btn_dActivate.gif' value='".INACTIVE."' onClick='Active(0,this.form)'>
                            <input name='hdnSelStat' type='hidden' id='hdnSelStat'>
						</td></tr>";
					}
					else
					{
						$strResponse.="<tr>
										<td colspan='4'>No file found</td>
									  </tr>";
					}
					$strResponse.="</table></form>";
					echo $strResponse;
				break;
				case AJAX_UPLOADED_NEWS_IMAGES:
				$strUploadDirectory = "../NewsFiles/";
				$objNews = new clsNews();
				$objLang=new clslanguage();
				///////here is no news id for news fun below///////////
				//$nLangID=
				$nFileFound=0;
				$objNews->m_intNewsId=$arrQry['nNewsID'];
				$objNews->m_intLangId=$arrQry['nLangId'];
				$strResponse="<form action='DeleteNewsImage.php' method='post'>";
				$strResponse.="<table width='100%' class=TabBorderLightGreyBG>";
				$strResponse.="<tr><td><input name='chkCheckAll' type='checkbox' id='chkCheckAll' value='1' onClick=\"selectAll(this.form,'chkImageGal[]')\">
							Select All</td></tr><tr>";
					$rs = $objNews->GetNewsImage();
					if($rs &&  mysql_num_rows($rs)>0)
					{
						$nCounter=1;
						$strResponse.="<tr>";
						$strPath=$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
						
						while($objRow=mysql_fetch_object($rs))
						{	
							$nDesFound=1;
							if($objRow->ImageDesc=="")
							{$nDesFound=0;
							 $strDesc="<span  class='txt_red'>No Description Found.</span>";
							}
							else 
							$strDesc=$objRow->ImageDesc;
							if($objRow->IsMain == '1')
							$strIsMain='disabled';else $strIsMain='';
							 list($width,$height,$type,$attr) = getimagesize($strUploadDirectory.$objRow->ImageName);
							 $tempWidth = $width+50;
							 $tempHeight = $height+50;
							 $strPath = $strUploadDirectory.$objRow->ImageName;
							$strResponse.="<td width=25%>
											<table width=22% >
											<tr>
												<td align=center colspan='3'>
												<a  href='#' onClick=\"window.open('PreviewImage.php?id='+'".$strPath."&width=".$width."','','width=".$tempWidth.",height=".$tempHeight."')\"><img src='../PhpThumb/phpThumb.php?src=".$strPath."&h=50'></a>
											</td>
											</tr>
										  <tr>
										  <td colspan='3'>
										  <input type='checkbox' name='chkImageGal[]' id='chkImageGal[]' value='".$objRow->pkNewsImageId."'>
										  &nbsp;&nbsp;&nbsp;&nbsp;";
											if($nDesFound!=0)
											{$strResponse.="<span class='txtBld_grey'>Desc : </span>";}
											$strResponse.=$strDesc."</td>
										  </tr>
											<tr>
											<td align='center' nowrap>";
											 if($objRow->IsMain != "1")
											{
											$strResponse.="<a href='SetNewsImgMain.php?nLangId=".$objRow->pkLangId."&nNewsId=".$objRow->fkNewsId."&nNewsImageID=".$objRow->pkNewsImageId."'>Set Main</a>";
											
											}else $strResponse.="<span class='txtBld_grey'>IS MAIN</span>";
							$strResponse.="
											  <input name='hdnNewsImageID' value='".$objRow->pkNewsImageId."' type='hidden'>
											  <input name='hdnLangId' value='".$objRow->pkLangId."' type='hidden'>
											   <input name='hdnNewImageName' value='".$objRow->ImageName."' type='hidden'>
                                               <input name='hdnNewsId' value='".$objRow->fkNewsId."' type='hidden'>
                                         	</td>
											<td>
											<a href='EditNewsImageDesc.php?npkId=".$objRow->pkId."&nNewsId=".$intNewsId."&nImgId=".$objRow->fkNImageId."&nLangId=".$objRow->pkLangId."&strImageDesc=".$objRow->ImageDesc."'>Edit</a></td>
											<td>
											<a href='TranslateNewsImageDesc.php?npkId=".$objRow->pkId."&nNewsId=".$intNewsId."&nImgId=".$objRow->fkNImageId."&nLangId=".$objRow->pkLangId."&strImageDesc=".$objRow->ImageDesc."'>Translate</a>
											
											</td>
										  </tr>
										   </table>
										  </td>
										  ";
							if($nCounter%3==0)
								$strResponse.="</tr><tr>";
							$nCounter++;				  
						}
						$strResponse.="</tr>";
						$nFileFound=1;
						$strResponse.="<tr><td><input name='Submit' type='submit' class='button' value='Delete Selected'></td></tr>";
					}
					else
					{
						$nFileFound=0;
						$strResponse.="<tr>
										<td colspan='4'>No file found</td>
									  </tr>";
					}
					$strResponse.="</table></form>";
					echo $strResponse;
				break;
				case AJAX_UPLOADED_NEWS_FILES:
				$strUploadDirectory = "../NewsFiles/";
				$IconsDirectory="../Images/";
				$objNews = new clsNews();
				$rs = $objNews->GetNewsFiles($arrQry['nNewsID']);
				///////here is no news id for news fun below///////////
				
				$strResponse="
			<form name='frmFiles' id='frmFiles' action='DeleteNewsFile.php' method='post'>
			<input type='hidden' name='hdnNewsId' value='".$arrQry['nNewsID']."'>
				
				<table width='100%' cellpadding=0 cellspacing=0 class=TabBorderLightGreyBG>";
					if($rs)
					if($rs && mysql_num_rows($rs)>0)
					{
						$nFileFound=1;
						$nCounter=0;
						
						$strResponse.="
			<tr>
				<td colspan='10'>
				<input name='chkCheckAll' id='chkCheckAll' type='checkbox' value='1' onClick=\"selectAll(frmFiles,'chkImageGal[]')\">
				Select All
                </td>
			</tr>
			<tr>
				";		
				$strPath=$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
						while($objRow=mysql_fetch_object($rs))
						{	 
							$nFileFound=1;
							$nCounter++;
							$strNewsFileName = $objRow->FileName;
							$nModuleID=$objRow->fkModuleID;
							$ext=substr($objRow->FileName, -3, 3);
							if($ext=="txt")
							{
								$extImage="icon_txt.jpg";
							}else if($ext=="xls")
							{
								$extImage="icon_excel.jpg";
							}else if($ext=="pdf")
							{
								$extImage="icon_pdf.jpg";
							}else if($ext=="doc")
							{
								$extImage="icon_doc.jpg";
							}else 
								$extImage="";
							
							$strResponse.="
									<td width=25%>
											<table width=22% cellpadding=0 cellspacing=0>
											<tr>
												<td align='left' >
												
												<input name='chkImageGal[]' type='checkbox' id='chkImageGal_".$objRow->pkNewsFileId."' value='".$objRow->pkNewsFileId."'>
												 
												</td>
												<td align=center colspan=2><img src='".$IconsDirectory.$extImage."'&w=100></td>
												<td >".$strNewsFileName."</td>
											  </tr>
											  </table>
											</td>
										  ";
							if($nCounter%4==0)
								$strResponse.="</tr><tr>";
											  
						}
						$strResponse.="</tr>";
					}
					else
					{	$nFileFound=0;
						$strResponse.="<tr>
										<td colspan='4'>No file found</td>
									  </tr>";
					}
					 if($nFileFound==1)
					  {
					  $strResponse.="<tr ><td>
					
					    <input name='Submit' type='submit' class='button' value='Delete Selected'>
					  </td></tr>";
					  }
					echo $strResponse."</table>
					 <input type='hidden' name='hdnModuleId' value='".$nModuleID."'>
					
					</form>";
				break;
				case AJAX_UPLOADED_FILES:
					$strUploadDirectory = "../UploadedFiles/";
					$ajaxFileUploader = new AjaxFileuploader($strUploadDirectory);	
					$strPath=substr($_SERVER['PHP_SELF'],0,(strrpos($_SERVER['PHP_SELF'],'/')));
					$strPath=substr($strPath,0,(strrpos($strPath,'/')+1));
					$strPath="http://".$_SERVER['HTTP_HOST'].$strPath."UploadedFiles/";
					$strResponse="<table width='100%'>";
					$rs=$ajaxFileUploader->SelectAllDocs($arrQry['hdnType']);
					
					if($rs && mysql_num_rows($rs)>0)
					{
						$nCounter=1;
						$strResponse.="<tr>";
						while($objRow=mysql_fetch_object($rs))
						{
							$size = filesize($strUploadDirectory.$objRow->File);
							$humansize = humansize($size);
							$strResponse.="<td width=25%>
											<table width=100%>
											<tr><td align=center><a href='#' onclick=\"opener.document.getElementById('background_image').value='".$strPath.$objRow->File."'; self.close();\"><img src='../PhpThumb/phpThumb.php?src=".$strUploadDirectory.$objRow->File."&w=50'></a></td></tr>
											<tr><td align=center>".$humansize."</td></tr>
											<tr>
											<td width='11%' align=center>
											<form action='UploadImage.php' method='post' target='upload_iframe'>
												<input name='btnDelete' value='Delete' type='submit' class='button'  onClick=\"return confirm('Are you sure to delete?')\">
												<input name='hdnFileID' value='".$objRow->pkID."' type='hidden'>
											</form>
											</td></tr>
										   </table>
										  </td>
										  ";
							if($nCounter%4==0)
								$strResponse.="</tr><tr>";
							$nCounter++;				  
						}
						$strResponse.="</tr>";
					}
					else
					{
						$strResponse.="<tr>
										<td colspan='4'>No file found</td>
									  </tr>";
					}
					$strResponse.="</table></form> ";
					echo $strResponse;
				break;
				case AJAX_UPLOADED_PAGE_FILES:
					$strUploadDirectory = "../UploadedFiles/";
					$ajaxFileUploader = new AjaxFileuploader($strUploadDirectory);	
					$strPath=substr($_SERVER['PHP_SELF'],0,(strrpos($_SERVER['PHP_SELF'],'/')));
					$strPath=substr($strPath,0,(strrpos($strPath,'/')+1));
					$strPath="http://".$_SERVER['HTTP_HOST'].$strPath."UploadedFiles/";
					$strResponse="<table width='100%'>";
					$rs=$ajaxFileUploader->SelectAllDocs($arrQry['hdnType']);
					
					if($rs && mysql_num_rows($rs)>0)
					{
						$nCounter=1;
						$strResponse.="<tr>";
						while($objRow=mysql_fetch_object($rs))
						{
							$size = filesize($strUploadDirectory.$objRow->File);
							$humansize = humansize($size);
							$strResponse.="<td width=25%>
											<table width=100%>
											<tr><td align=center><a href='#' onclick=\"document.getElementById('txtLink').value='".$strPath.$objRow->File."'\"><img src='../PhpThumb/phpThumb.php?src=".$strUploadDirectory.$objRow->File."&w=100'></a></td></tr>
											<tr><td align=center>".$humansize."</td></tr>
											<tr>
											<td width='11%' align=center>
											<form action='UploadImage.php' method='post' target='upload_iframe'>
												<input name='btnDelete' value='Delete' type='submit' class='button'>
												<input name='hdnFileID' value='".$objRow->pkID."' type='hidden'>
											</form>
											</td></tr>
										   </table>
										  </td>
										  ";
							if($nCounter%4==0)
								$strResponse.="</tr><tr>";
							$nCounter++;				  
						}
						$strResponse.="</tr>";
					}
					else
					{
						$strResponse.="<tr>
										<td colspan='4'>No file found</td>
									  </tr>";
					}
					$strResponse.="</table></form> ";
					echo $strResponse;
				break;
			
			default:
				$rsData=NULL;
		}		
	}
	
	function GenerateCombo($rsData,$strControlName,$strID,$strName,$strOnChange="")
	{
		$strOnChange=str_replace("\'","'",$strOnChange);
		$strOnChange=str_replace("*","+",$strOnChange);
		
		
		if(isset($strOnChange) && !empty($strOnChange))
			$strChange=" onChange=\"".$strOnChange."\"";
		else
			$strChange="";
					
		print "<select name='".$strControlName."'  ".$strChange." style='width:200px'>";
		print "<option value='0'>Select...</option>";		
		if($rsData && mysql_num_rows($rsData)>0)
		{
		while($rowData=mysql_fetch_array($rsData))
		{
		  print "<option value='".$rowData[$strID]."'>".$rowData[$strName]."</option>";
		}
		}
		print "</select>";	
	}
	
	function GenerateComboOptionsString($rsData, $strID,$strName,$strFirstOption='Select.....')
	{
		$strVal='';
		if($strFirstOption!==0)	// 0 represents no first option required
		{
			if(mysql_num_rows($rsData)==0)
				$arrVal[] = '0^Not Available';
			else	
				$arrVal[] = "0^".$strFirstOption;
		}		
		if(isset($rsData) && mysql_num_rows($rsData)>0)
		{
			while($rowData=mysql_fetch_array($rsData))
				$arrVal[] = $rowData[$strID]."^".$rowData[$strName];
		}
		$strVal="**".implode("*",$arrVal);
		print $strVal;
	}
}
?>