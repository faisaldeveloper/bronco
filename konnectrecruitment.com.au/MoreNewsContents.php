<?
include("Includes/FrontIncludes.php");
	/**
		Getting Labels
	**/
	$objMessage=new clsMessages();
	$objMessage->m_intLangId=$_SESSION['intLangId'];
	$objMessage->m_intConId=CONST_CONCEPT_NEWS;
	$arrLabels=$objMessage->GetLabels();

	/**
		Initialization
	**/
	$intPage=1; 
	$intPerPage=10;
	$nNewsPerRow=2;
	$nMainNewsOnTop=1;
	$nLayoutID=CONST_RIGHT_LAYOUT;
	$arrQryStr=array();

	if(isset($_REQUEST['intPage']))
		$intPage=$_REQUEST['intPage'];

	$objMessage=new clsMessages();//
	$objMessage->m_intLangId=$_SESSION['intLangId'];
	$objMessage->m_intConId=CONST_CONCEPT_NEWS;
	$arrLabels=$objMessage->GetLabels();
	$objNews->m_intLangId = $_SESSION['intLangId'];
	

	$nModuleID = $_REQUEST['nModuleID'];
	$nModuleName = $objNews->GetGalleryName($nModuleID);
	//echo "nModuleID".$nModuleID;	
//echo "<br>nModuleName".$nModuleName."<br>".$nModuleID;// exit;
//	= ; function to be written.

	
	/**
		Fetching news record
	**/
	$intSearchCheck = FALSE;
	$thisYear = date("Y");
	$intFDay='dd'; $intFMonth='mm'; $intFYear=$thisYear;
	$intToDay='dd'; $intToMonth='mm'; $intToYear=$thisYear;
	if(isset($_REQUEST['btnSearch']))// && !empty($_REQUEST['txtSearch']))
	{
		$strSearch = "";
		$strFromDate = $_REQUEST['lstFYear']."-".$_REQUEST['lstFMonth']."-".$_REQUEST['lstFDay'];
		$arrQryStr[]='lstFYear='.$_REQUEST['lstFYear'];
		$arrQryStr[]='lstFMonth='.$_REQUEST['lstFMonth'];
		$arrQryStr[]='lstFDay='.$_REQUEST['lstFDay'];
		list($intFYear,$intFMonth,$intFDay) = explode("-",$strFromDate);
		$strToDate = $_REQUEST['lstToYear']."-".$_REQUEST['lstToMonth']."-".$_REQUEST['lstToDay'];
		$arrQryStr[]='lstToYear='.$_REQUEST['lstToYear'];
		$arrQryStr[]='lstToMonth='.$_REQUEST['lstToMonth'];
		$arrQryStr[]='lstToDay='.$_REQUEST['lstToDay'];
		list($intToYear,$intToMonth,$intToDay) = explode("-",$strToDate);
	
		if(isset($_REQUEST['txtSearch']))
		{
			$strSearch = $_REQUEST['txtSearch'];
			$arrQryStr[]='txtSearch='.$_REQUEST['txtSearch'];
		}	
		$arrQryStr[]='btnSearch='.$_REQUEST['btnSearch'];
		$objNews->m_strSearchWords = $strSearch;
		$objNews->m_strFromDate = $strFromDate; 
		$objNews->m_strToDate = $strToDate;
		$arrNews = $objNews->NewsSearch();
		$intSearchCheck = TRUE;
	}
	else
	{
		$strSearch = NULL;
		$strFromDate = NULL;
		$strToDate = NULL;
		$arrNews = $objNews->GetMoreActiveNews();
	}
	$strQryStr=implode('&',$arrQryStr); //making Query string
?>


<table width="98%" border="0" cellpadding="0" cellspacing="0"  align="center">

    <tr>
  	<td>
  		<table width="100%" cellpadding="0" cellspacing="0">
  			<tr>
				<td  width="1" align="left" valign="top" class="Back2">
					<img src="images/tab01.gif" vspace="0" height="23"/>				</td>
				<td  class="Back">
					<?=$nModuleName?>				</td>
				<td  width="1" align="right"  valign="top"  class="Back2">
					<img src="images/tab03.gif" vspace="0" height="23"/>				</td>
  			</tr>
	  </table>
  	</td>
  </tr>
  
  
  <tr>
   
    <td  class="LeftRightTopLine">
		<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" >
		<?
		//////////////////// Getting global options for news /////////////////////
		if($arrNews != FALSE) // Outer if
		{
			$arrGlobalOptions = GetGlobalOptions();
			$arrRecGlobalOptions = mysql_fetch_object($arrGlobalOptions);
			$intPerPage = $arrRecGlobalOptions->RowsPerPage;   	

			if($arrRecGlobalOptions->MoreNewsPerRow>0)	
				$nNewsPerRow = $arrRecGlobalOptions->MoreNewsPerRow; 
			
			$nMainNewsOnTop = $arrRecGlobalOptions->MoreNewsOnTop;
			$nLayoutID = $arrRecGlobalOptions->MoreNewsLayout;
			$intTotalReturned = mysql_num_rows($arrNews); 
			if($intTotalReturned < $nNewsPerRow)
				$nWidth=100/$intTotalReturned;
			else	
				$nWidth=100/$nNewsPerRow;
			$intPageCount = ceil($intTotalReturned/$intPerPage);     
			if($intPage==1) $intRecordStart = ($intPage-1); 
			else $intRecordStart = ($intPage-1)*$intPerPage; 
  ?>
  			<tr>
			
  <?
			mysql_data_seek($arrNews, $intRecordStart);
			$nCounter=1;
			for($i=0; $i<$intPerPage;$i++)	// For f1
			{				
				if($arrRecNews = mysql_fetch_object($arrNews))// inner if 
				{
					$objNews->m_intNewsId = $arrRecNews->pkNewsId;
					$nMainNews = $arrRecNews->IsMain;
					$arrNewsImage  = $objNews->GetNewsImage();
					if($arrNewsImage != FALSE)
					{
						$arrRecNewsImage = mysql_fetch_object($arrNewsImage);
						$intNewsImgId  = $arrRecNewsImage->pkNewsImageId;
						$strNewsImgName  = $arrRecNewsImage->ImageName;
						if(is_file("NewsFiles/".$strNewsImgName))
							list($intWidth,$intHeight,$strType,$strAttr)=getimagesize("NewsFiles/".$strNewsImgName."");
					}
					else
					{
						$intNewsImgId  = 0;
						$strNewsImgName  = NULL;
					}
				            if($nLayoutID == CONST_POS_LEFT || $nLayoutID == CONST_POS_RIGHT || $nLayoutID == CONST_POS_TOP || $nLayoutID == CONST_POS_BOTTOM) // Image on Top,bottom, Left, right
				   {
				   ?>			   
						<td align="left" valign="top" <? if ($nMainNews == 1 && $nMainNewsOnTop == 1) echo "colspan=".$nNewsPerRow; print " width='".$nWidth."%'"?>>
						<table width="100%" border="0" >
							<tr>
								<td class="TabHeading" align = "<?	if($nLayoutID == CONST_POS_RIGHT)	print "right"; 
									else print "left";?>">
								<?	if($arrRecNews->NewsTitle!="")
			                        { 
            		            ?>
                    				    <span class="PageBodyBold">
				                        <?=stripslashes($arrRecNews->NewsTitle)?>
                				        </span><br />
		                        <?php
        		                    }
								?>		
								</td>
							</tr>
							<tr>
								<td align="right" class="FontDim">
									<?
										list($strDate,$strTime) = explode(" ",$arrRecNews->NewsDate);
										if(!empty($strDate))
											list($yn,$mn,$dn) = explode("-",$strDate);
										if(isset($arrLabels[536])) echo $arrLabels[536]; else echo "***";
										echo " ".$dn.".".$mn.".".$yn."<br>";
									?>						
								</td>
							</tr>
						  </table>
						<?php 
						if($strNewsImgName != NULL && is_file("NewsFiles/".$strNewsImgName)) {
						list($width,$height,$type,$attr) = getimagesize("NewsFiles/".$strNewsImgName);
						if($nLayoutID == CONST_POS_TOP || $nLayoutID == CONST_POS_RIGHT|| $nLayoutID == CONST_POS_LEFT)
						{
						?>
							<table border="0" cellpadding="4" cellspacing="0" align="<? if($nLayoutID == CONST_POS_RIGHT) print "right"; else if($nLayoutID == CONST_POS_LEFT) echo "left";else print "center";?>">
							  <tr>
								<td align="left" valign="top"><!--<img src="PhpThumb/phpThumb.php?src=../NewsFiles/<?php //echo $strNewsImgName;?>&w=100">-->
										<a href="<?=$arrRecNews->PageUrl?>-<?=CONST_PAGETYPE_NEWSDETAIL?>-news">
                                        <img src="PhpThumb/phpThumb.php?src=../NewsFiles/<?php echo $strNewsImgName;?>&w=100">
                                        </a>
								</td>
							  </tr>
							  <tr><td><?=$arrRecNews->ImageDesc?></td></tr>	
							</table> 
						<?php 
						}
						}
						if($arrRecNews->ShortDesc!='')
						{
							$strSDesc = stripslashes($arrRecNews->ShortDesc);
							if(strlen($strSDesc)>200) $strSDesc = substr($strSDesc,0,200)."....";
							echo $strSDesc."<br>";
						}
						?>
						<a href="<?=$arrRecNews->PageUrl?>-<?=CONST_PAGETYPE_NEWSDETAIL?>-news"><? if(isset($arrLabels[29])) echo $arrLabels[29]; else echo "***"; ?>
						</a>
						
						<? 
						if($strNewsImgName != NULL && is_file("NewsFiles/".$strNewsImgName)) {
						list($width,$height,$type,$attr) = getimagesize("NewsFiles/".$strNewsImgName);
						if($nLayoutID == CONST_POS_BOTTOM)
						{
						?>
						<table border="0" cellpadding="4" cellspacing="0" align="center">
							  <tr>
								<td align="left" valign="top"><!--<img src="PhpThumb/phpThumb.php?src=../NewsFiles/<?php //echo $strNewsImgName;?>&w=100">-->
										<a href="<?=$arrRecNews->PageUrl?>-<?=CONST_PAGETYPE_NEWSDETAIL?>-news">
                                        <img src="PhpThumb/phpThumb.php?src=../NewsFiles/<?php echo $strNewsImgName;?>&w=100">
                                        </a>
								</td>
							  </tr>
							  <tr><td><?=$arrRecNews->ImageDesc?></td></tr>	
						  </table>
						<? }}?>
						</td>	
			<?	
				 	} // End Image on Top Left, right
			
					if(($nMainNews == 1 && $nMainNewsOnTop == 1) || $nCounter%$nNewsPerRow==0)
						//echo "</tr><tr><td>&nbsp;</td></tr><tr>";
						echo "</td></tr><tr><td class='Seperator' colspan='".$nNewsPerRow."' >&nbsp;&nbsp;</td>
				</tr><tr><td>&nbsp;</td></tr><tr>";
					if($nMainNews != 1 || $nMainNewsOnTop != 1)
						$nCounter++;
	
				} // end inner if
			}	// end for f1
		?>
			</tr>
			<tr><td class='Seperator' colspan='<?=$nNewsPerRow?>' >&nbsp;&nbsp;</td>	</tr>
			<tr><td height="5"></td>&nbsp;<br /></tr>
			<tr>
				<td colspan="<?=$nNewsPerRow?>" align="left">
					<?	print GeneralPaging($intPage,$intPageCount,$strQryStr);	?>
				</td>
			</tr>
		<?	
		} // end outer if
		else{
		?>
			<tr><td align="center"><? if(isset($arrLabels[454])) echo $arrLabels[454]; else echo "***";?></td></tr>
		<?
		}
		?>
		<tr>
			<td colspan="<?=$nNewsPerRow?>">
				<? include('SearchNews.php');?>
			</td>
		</tr>		
</table>
   </td>
   
  </tr>
  <tr valign="top" class="LeftRightTopLine" >
  	<td class="TableStyle2">
  		<table width="100%" cellpadding="0" cellspacing="0">
  	 		<tr>
    			<td width="1" align="left" valign="bottom" nowrap="nowrap"><img src="images/tab08.gif" alt="" /></td>
    			<td nowrap="nowrap" class="BottomLine">&nbsp;</td>
    			<td width="1" align="right" valign="bottom" nowrap="nowrap"> <img src="images/tab09.gif" alt="" /></td>
  			</tr>
	  </table>
  </td>
 </tr>
</table>
