<link href="cms.css" rel="stylesheet" type="text/css" />
<?
	/**
		assigning values to variabels
	**/
	if(!isset($_REQUEST['NewsId']))
	{
		header("location:Index.php?pagefrname=news");
		exit;
	}
	/**
		Getting Labels
	**/
	$objMessage=new clsMessages();
	$objMessage->m_intLangId=$_SESSION['intLangId'];
	$objMessage->m_intConId=CONST_CONCEPT_NEWS;
	$arrLabels=$objMessage->GetLabels();


	$strNewsMainImgName='';
	$strNewsMainImgDesc='';
	$objNews->m_strPageUrl = $_REQUEST['NewsId'];
	$objNews->m_intLangId = $_SESSION['intLangId'];
	$rsNews = $objNews->GetNewsByUrl();
	/**
		Getting global options
	**/
	$arrGlobalOptions = GetGlobalOptions();
	$arrRecGlobalOptions = mysql_fetch_object($arrGlobalOptions);
	$nLayoutID = $arrRecGlobalOptions->NewsDetailLayout;
	//echo "Layout---".$nLayoutID;exit;
	$nTotalImg = 4; //for displaying the images
?>
<link href="cms.css" rel="stylesheet" type="text/css" />

<table width="98%" border="0" cellpadding="0" cellspacing="0" align="center" >
<tr height="4"><td></td></tr>
<tr>
<td>
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">

  <?
	if($rsNews != FALSE)	//Start of outer if
	{
		$rowNews = mysql_fetch_object($rsNews);
		$strNewsTitle = $rowNews->NewsTitle;
		$strNewsDate = $rowNews->NewsDate;
		list($strDate,$strTime) = explode(" ",$strNewsDate);
		$strShortDesc = $rowNews->ShortDesc;
		$strLongDesc = $rowNews->LongDesc;
		$nNewsId = $rowNews->pkNewsId; 
		
		$objNews->m_intNewsId = $rowNews->pkNewsId; 
		$rsMainImage = $objNews->GetNewsMainImage();
		//echo "RS MAIN IMAGE=====".$rsMainImage; exit;
		
	?>
	 <tr>
  	<td >
  		<table width="100%" cellpadding="0" cellspacing="0">
  			<tr>
				<td  width="1" align="left" valign="top" class="Back2">
					<img src="images/tab01.gif" vspace="0" height="22"/>				</td>
				<td class="Back">
					<? if(isset($strNewsTitle) && $strNewsTitle!='')
				echo "<span class='PageBodyBold'>".$strNewsTitle."</span>";?></td>
				<td align="right" class="Back">
					<a href="EmailToFriend.php?NewsId=<?=$nNewsId?>">
						<? if(isset($arrLabels[175])) echo $arrLabels[175]; else echo "***";?>
					</a>				</td>
				<td  width="1" align="right"  valign="top" class="Back2" >
					<img src="images/tab03.gif" vspace="0" height="22"/>				</td>
  			</tr>
		</table>
  	</td>
  </tr>
  
  <tr class="TableStyle2" >
  	<td  class="LeftRightTopLine">
	<?	
	   	if($nLayoutID == CONST_RIGHT_LAYOUT || $nLayoutID == CONST_LEFT_LAYOUT || $nLayoutID == CONST_TOP_LAYOUT || $nLayoutID == CONST_BOTTOM_LAYOUT) // Image on Top Left
   		{
   	?>	
		<table width="98%" cellpadding="0" cellspacing="0" align="center"  >
		  <tr>
		  	<td colspan="<?=$nTotalImg?>" class="FontDim" align="right">
			<?
			if(isset($arrLabels[536])) echo $arrLabels[536]; else echo "***";
			echo "&nbsp;"; 
			if(!empty($strDate))
			{
				 list($yn,$mn,$dn) = explode("-",$strDate);	
				 echo $dn.".".$mn.".".$yn;
			}
			?>
			</td>
		  </tr>
		  <tr>
			<td colspan="<?=$nTotalImg?>" class="TabHeading1"><? if(isset($arrLabels[186])) echo $arrLabels[186]; else echo "***"; ?>:</td>
		  </tr>
		  <tr>
		  	<td colspan="<?=$nTotalImg?>"><? if(isset($strShortDesc) && $strShortDesc!='') echo $strShortDesc; ?></td>
		  </tr>
		  <tr>
		  	<td colspan="<?=$nTotalImg?>"   nowrap="nowrap" class="TabHeading1"><? if(isset($arrLabels[187])) echo $arrLabels[187]; else echo "***"; ?>:</td>
		  </tr>
		  <tr>
		  	<td align="justify" colspan="<?=$nTotalImg?>">
			  <? if($nLayoutID == CONST_TOP_LAYOUT || $nLayoutID == CONST_RIGHT_LAYOUT ||  $nLayoutID == CONST_LEFT_LAYOUT) 
			     { //image placement
				 	if($rsMainImage != FALSE && $rsMainImage != NULL) 
					{   // Start of IF main image
						while($arrMainNewsImage = mysql_fetch_object($rsMainImage))
						{
							$intNewsMainImgId  = $arrMainNewsImage->pkNewsImageId; 
							$strNewsMainImgName  = $arrMainNewsImage->ImageName;
							$strNewsMainImgDesc  = $arrMainNewsImage->ImageDesc;
							if(!empty($strNewsMainImgName) && is_file("NewsFiles/".$strNewsMainImgName))
							list($intWidth,$intHeight,$strType,$strAttr)=getimagesize("NewsFiles/".$strNewsMainImgName."");
							if($strNewsMainImgName != '')
							{
				  ?>			<table width="100%" align="<? if($nLayoutID==CONST_TOP_LAYOUT) echo "center"; else if($nLayoutID==CONST_RIGHT_LAYOUT) echo "right"; else echo "left"; ?>" >
								<tr>
									<td align="<? if($nLayoutID==CONST_TOP_LAYOUT) echo "center"; else if($nLayoutID==CONST_RIGHT_LAYOUT) echo "right"; else echo "left"; ?>">
										<a  href='#' onClick="window.open('PreviewImage.php?id='+'NewsFiles/<?=$strNewsMainImgName?>&width=<?=$width?>','','width=<?=$width+50?>,height=<?=$height+80?>')">
											<img src="images/phpThumb.jpg?src=../NewsFiles/<?=$strNewsMainImgName?><? if($intWidth>$intHeight){?>&w=150<? }else{?>&h=150<? }?>" />
										</a>
									</td>
								</tr>
								<tr><td align="<? if($nLayoutID==CONST_TOP_LAYOUT) echo "center"; else if($nLayoutID==CONST_RIGHT_LAYOUT) echo "right"; else echo "left"; ?>"><?=$strNewsMainImgDesc?></td></tr>
								<tr><td>&nbsp;</td></tr>
								</table>
			<? 				}//image name not empty
					  	}//while end
					}//rs not empty check
				}//for image check left, right, top
			?>
			
			<? //long description
				if(isset($strLongDesc) && $strLongDesc!='')	echo stripcslashes($strLongDesc); ?>
			
			<? if($nLayoutID == CONST_BOTTOM_LAYOUT) 
			     { //image placement
				 	if($rsMainImage != FALSE && $rsMainImage != NULL) 
					{   // Start of IF main image
						while($arrMainNewsImage = mysql_fetch_object($rsMainImage))
						{
							$intNewsMainImgId  = $arrMainNewsImage->pkNewsImageId; 
							$strNewsMainImgName  = $arrMainNewsImage->ImageName;
							$strNewsMainImgDesc  = $arrMainNewsImage->ImageDesc;
							list($intWidth,$intHeight,$strType,$strAttr)=getimagesize("NewsFiles/".$strNewsMainImgName."");
							if($strNewsMainImgName != '')
							{
				  ?>			<table width="100%" align="center">
								<tr>
									<td align="center">
										<a  href='#' onClick="window.open('PreviewImage.php?id='+'NewsFiles/<?=$strNewsMainImgName?>&width=<?=$width?>','','width=<?=$width+50?>,height=<?=$height+80?>')">
											<img src="PhpThumb/phpThumb.php?src=../NewsFiles/<?=$strNewsMainImgName?><? if($intWidth>$intHeight){?>&w=150<? }else{?>&h=150<? }?>">
										</a>
									</td>
								</tr>
								<tr><td  align="center"><?=$strNewsMainImgDesc?></td></tr>
								<tr><td>&nbsp;</td></tr>
								</table>
			<? 				}//image name not empty
					  	}//while end
					}//rs not empty check
				}//for image check left, right, top
			?>
			</td>
			</tr>	
			<tr>
			<?
			 		$rsImage = $objNews->GetNewsImage();
					$nCounter=0;
					if($rsImage)
					{while($arrRecNewsImage = mysql_fetch_object($rsImage))
					{ // start of while
						$intNewsImgId  = $arrRecNewsImage->pkNewsImageId; 
						$strNewsImgName  = $arrRecNewsImage->ImageName;
						$strNewsImgDesc  = $arrRecNewsImage->ImageDesc;
						$nIsMain = $arrRecNewsImage->IsMain;
						if(!empty($strNewsImgName) && is_file("NewsFiles/".$strNewsImgName))
						list($intWidth,$intHeight,$strType,$strAttr)=getimagesize("NewsFiles/".$strNewsImgName."");
			?>
			
						<? if($strNewsImgName != NULL && $nIsMain==0) 
						{ //strat of if NewsImg
							if($nCounter%$nTotalImg==0)
								echo "</tr><tr>";
						?>		 
							<td  >	
								<table width="100%" align="center" cellpadding="0" cellspacing="0">
								<tr>
									<td>
										<?
											if(is_file("NewsFiles/".$strNewsImgName))
											{
										 list($width,$height,$type,$attr) = getimagesize("NewsFiles/".$strNewsImgName);?>
										<a  href='#' onClick="window.open('PreviewImage.php?title=<?=$strNewsImgDesc?>&id='+'NewsFiles/<?=$strNewsImgName?>&width=<?=$width?>','','width=<?=$width+50?>,height=<?=$height+80?>')"><img src="PhpThumb/phpThumb.php?src=../NewsFiles/<?=$strNewsImgName?><? if($intWidth>$intHeight){?>&w=150<? }else{?>&h=150<? }?>"></a>
										<? }?>
									</td>
								</tr>
								<tr><td>
								<? if(isset($arrLabels[59])) echo $arrLabels[59]; else echo "***";?>: <?=$strNewsImgDesc; ?></td></tr>
								</table>
							</td>
					<? 	
							$nCounter++;
						}  //end of if NewsImg
					  }  // end of while
					}
					?>
		  </tr>
			</table>
		<? }?>
	</td>
  </tr>
  <tr valign="top" class="LeftRightTopLine" >
  	<td class="TableStyle2">
  		<table width="100%" cellpadding="0" cellspacing="0">
  	 		<tr>
    			<td width="1" valign="bottom" align="left"><img src="images/tab08.gif" alt="" /></td>
    			<td class="BottomLine">&nbsp;</td>
    			<td width="1" align="right" valign="bottom" nowrap="nowrap"> <img src="images/tab09.gif" alt="" /></td>
  			</tr>
  <? }?>
			</table>
</td>
</tr>
</table>
</td>
</tr>
<tr><td>&nbsp;</td></tr>
</table>