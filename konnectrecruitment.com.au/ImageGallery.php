<?
/*
	Created By :- Faheem Ahmad
	Creation Date : - 02-4-2007
*/
	//print $nGalleryID;
	$rs = $objGallery->GetGalleryByID($nGalleryID);
	$web_upload_dir = "../GalleryPictures/"; // Directry where the files are uploaded
	$web_upload_dir_front = "GalleryPictures/"; // Directry where the files are uploaded

	if($rs != false && mysql_num_rows($rs)>0)
	{
		$nModuleID = 0;
		$nCounter = 1;
		$row = mysql_fetch_array($rs);
		$nModuleID = $row['pkModuleId'];
		$nRecordsPerRow = $row['ImagesPerRow'];  
	}

?>

<link href="cms.css" rel="stylesheet" type="text/css" />


<table width="98%" border="0" cellpadding="0" cellspacing="0" align="center">
  <tr height="20">
  	<td>
  		<table width="100%" cellpadding="0" cellspacing="0">
  			<tr>
				<td class="Back2" width="2" valign="top" align="left" >
					<img src="images/tab01.gif" vspace="0"/>
				</td>
				<td class="Back">
				<table width="100%">
		<tr>
			<td><? echo $objGallery->GetGalleryName($nGalleryID);?></td>
		</tr>
	</table>

				</td>
				<td width="2" valign="top" align="right" class="Back2">
					<img src="images/tab03.gif" vspace="0"/>
				</td>
  			</tr>
		</table>
  	</td>
  </tr>
  <tr class="TableStyle2">
   <td class="LeftRightTopLine" >
		<table width="100%" border="0" cellspacing="0" cellpadding="2" align="center" >


	<?
		$objGallery->m_intLangId = $_SESSION['intLangId'];
		$objGallery->m_intModuleID = $nModuleID;		
		$rsImages = $objGallery->GetGalleryImagesByModuleId();		
		if($rsImages != false && mysql_num_rows($rsImages)>0)
		{
			$nNoOfImages = mysql_num_rows($rsImages);			
	?>
      <tr>
  <?
			while($rowImages = mysql_fetch_object($rsImages))
			{				
				$strImageName = $rowImages->ImageName;
				$strImageDescription = $rowImages->ImageDesc;
				$nLayoutID = $rowImages->LayoutID;
				$nRecordsPerRow = $rowImages->ImagesPerRow;
				if($nNoOfImages < $nRecordsPerRow)
					$nWidth=100/$nNoOfImages;
				else	
					$nWidth=100/$nRecordsPerRow;
				$strImgPath = $web_upload_dir_front.$strImageName;
?>    		   
			   <?
			   if($nLayoutID == CONST_LEFT_LAYOUT) // Image on Top Left
			   {
			   ?>		   

			    <td align="left" valign="top" width="<?=$nWidth?>%">
			   	 <table align="left" cellpadding="0" cellspacing="0">
					<tr>
						<td><? list($width,$height,$type,$attr) = getimagesize($strImgPath); ?>
								<a  href='#' onClick="window.open('PreviewImage.php?id='+'<?=$web_upload_dir_front.$strImageName?>&width=<?=$width?>','','width=<?=$width+50?>,height=<?=$height+50?>')"><img src="PhpThumb/phpThumb.php?src=<?=$web_upload_dir.$strImageName?>&h=100"></a>
						</td>
					</tr>
				 </table>
				 <?=$strImageDescription?>
			    </td>			  
			   <?
			   	}
				if($nLayoutID == CONST_RIGHT_LAYOUT) // Image on Top Right
				{
				?>
				<td align="left" valign="top" width="<?=$nWidth?>%">
				 <table align="right" cellpadding="0" cellspacing="0">
					<tr>
						<td align="left">				
							<? list($width,$height,$type,$attr) = getimagesize($strImgPath); ?>
								<a  href='#' onClick="window.open('PreviewImage.php?id='+'<?=$web_upload_dir_front.$strImageName?>&width=<?=$width?>','','width=<?=$width+100?>,height=<?=$height+100?>')"><img src="PhpThumb/phpThumb.php?src=<?=$web_upload_dir.$strImageName?>&h=100"></a>						
						</td>
					</tr>
				 </table>
				 <?=$strImageDescription?>
			    </td>
				<?
				}
				if($nLayoutID == CONST_TOP_LAYOUT) // Image on Top Center
				{
				?>
				<td align="left" valign="top" width="<?=$nWidth?>%" height="150" class="TabBorderLightGreyBG">

             <table width="84%" border="0" align="center" cellpadding="0" cellspacing="0"  height="100%" >
                <tr align="left" valign="middle" height="5">
                 <td width="6">&nbsp;</td>
                </tr>
                <tr align="left" valign="middle" height="5">
                 <td width="10" colspan="1">&nbsp;</td>
                  <td width="100%" valign="middle">
                  	<table align="left" class="brdr_SolidRound" height="85">
                      <tr>
                      	<td align="center">
                        <?
                        	list($width,$height,$type,$attr) = getimagesize($strImgPath);
						?>
                        <a  href='#' onClick="window.open('PreviewImage.php?id='+'<?=$web_upload_dir_front.$strImageName?>&width=<?=$width?>','','width=<?=$width+100?>,height=<?=$height+100?>')"><img src="PhpThumb/phpThumb.php?src=<?=$web_upload_dir.$strImageName?>&h=100"></a>
                        </td>
                      </tr>
                      <tr>
                      	<td align="left"><?=$strImageDescription?></td>
                      </tr>
                    </table>                  </td>
                  <td width="6">&nbsp;</td>
                </tr>
                <tr align="center" valign="middle" height="5">
                 <td width="10">&nbsp;</td>
                </tr>
              </table>


			    </td>
				<?
				}
				if($nLayoutID == CONST_BOTTOM_LAYOUT) // Image on Bottom Center
				{
				?>
				<td align="center" valign="bottom" width="<?=$nWidth?>%">
				<?=$strImageDescription?>		   			   	
			   	 <table border="0" cellpadding="0" cellspacing="0">
					<tr>
						<td width="50" height="50">				
							<? 
								list($width,$height,$type,$attr) = getimagesize($strImgPath);
								?>
								<a  href='#' onClick="window.open('PreviewImage.php?id='+'<?=$web_upload_dir_front.$strImageName?>&width=<?=$width?>','','width=<?=$width+100?>,height=<?=$height+100?>')"><img src="PhpThumb/phpThumb.php?src=<?=$web_upload_dir.$strImageName?>&h=100"></a>
						</td>
					</tr>
				 </table>				
			    </td>
				<?
				}
				if($nCounter%$nRecordsPerRow == 0)
				{
					print("</tr><tr>");
				}
				$nCounter+=1;
			}			
		?>
		</tr>
		<?
		}
		?>    


    	</table>
	</td>
    
  </tr>
  <tr valign="top">
  	<td class="TableStyle2">
  		<table width="100%" cellpadding="0" cellspacing="0">
  	 		<tr>
    			<td width="2" height="6" ><img src="images/tab08.gif" alt="" /></td>
    			<td class="BottomLine">&nbsp;</td>
    			<td width="2" height="6"><img src="images/tab09.gif" alt="" /></td>
  			</tr>
  		</table>
  </td>
 </tr>
</table>
