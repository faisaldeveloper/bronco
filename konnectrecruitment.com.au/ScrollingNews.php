<?
include("Includes/FrontIncludes.php");

$intPage=1; 
$intPerPage=10;
$nNewsPerRow=2;
$nMainNewsOnTop=1;

$nLayoutID=CONST_RIGHT_LAYOUT;
$arrQryStr=array(); 
$nSearchOption=$arrRecPageModule->LayoutID;
$nModuleName= $arrRecPageModule->ModuleDesc;
$nModuleID =  $arrRecPageModule->pkModuleId;
//modified by moughees amjad on 1-sep-08
	/***
	creating new objects
	**/
	$objMessage=new clsMessages();
	$objNews=new clsNews();

//$intSearchCheck = FALSE;
//$thisYear = date("Y");
//$intFDay='dd'; $intFMonth='mm'; $intFYear=$thisYear;
//$intToDay='dd'; $intToMonth='mm'; $intToYear=$thisYear;

	$objNews->m_intModuleID = $nModuleID;
	/***
	Getting labels
	**/
	$objMessage->m_intLangId=$_SESSION['intLangId'];
	$objNews->m_intLangId=$_SESSION['intLangId'];
	$objMessage->m_intConId=CONST_CONCEPT_NEWS;
	$arrLabels=$objMessage->GetLabels();
	
	/***
	getting global options
	**/
	$rsGlobalOption=GetGlobalOptions();
	$objNews->m_intLangId = $_SESSION['intLangId'];
	$rowGlobalOption=mysql_fetch_object($rsGlobalOption);
	$nLastDaysScrollNews = $rowGlobalOption->LastDaysScrollNews;
	$nLatestScrollNews = $rowGlobalOption->LatestScrollNews;
?>

<link href="cms.css" rel="stylesheet" type="text/css" />


<table width="96%" border="0" cellpadding="0" cellspacing="0" align="center">
 <tr>
  	<td>
  		<table width="100%" cellpadding="0" cellspacing="0">
  			<tr>
				<td nowrap="nowrap"  width="1" align="left" valign="top" class="Back2">
					<img src="images/tab01.gif" vspace="0" height="23"/>				</td>
				<td nowrap="nowrap"  class="Back">
					<?=$nModuleName?>				</td>
				<td nowrap="nowrap"  width="1" align="left"  valign="top"  class="Back2">
					<img src="images/tab03.gif" vspace="0" height="23"/>				</td>
  			</tr>
	  </table>
  	</td>
  </tr>
  <tr class="TableStyle2" valign="top">
   <td class="LeftRightTopLine" >
		<table width="100%" border="0" cellspacing="0" cellpadding="2" align="center" >
<tr>
  <td align="left" colspan="3">
   <marquee id="ml" onMouseOver="ml.stop()" onMouseOut="ml.start()" scrolldelay="8" align="texttop" scrollamount="1" direction="up" behavior="scroll" >
						<?php
						$rsNews=$objNews->GetActiveScrollingNews($nLastDaysScrollNews,$nLatestScrollNews);
						while($rowWeekNews = mysql_fetch_object($rsNews)){
							$intNewsId = $rowWeekNews->pkNewsId;
							$strNewsTitle = stripcslashes($rowWeekNews->NewsTitle);
							$strShortDesc = $rowWeekNews->ShortDesc;
							$objNews->m_intNewsId = $intNewsId;
							$strUrl = $rowWeekNews->PageUrl; 
							$arrScrollingNewsImage  = $objNews->GetNewsImage();
							if($arrScrollingNewsImage != FALSE && $arrScrollingNewsImage != NULL)
							{
								$arrRecNewsImage = mysql_fetch_object($arrScrollingNewsImage);
								$intNewsImgId  = $arrRecNewsImage->pkNewsImageId;
								$strNewsImgName  = $arrRecNewsImage->ImageName;
								if(!empty($strNewsImgName) && is_file("NewsFiles/".$strNewsImgName))
									list($intWidth,$intHeight,$strType,$strAttr)=getimagesize("NewsFiles/".$strNewsImgName."");
							}
							else
							{
								$intNewsImgId  = 0;
								$strNewsImgName  = NULL;
							} 
							list($strDate,$strTime) = explode(" ",$rowWeekNews->NewsDate);
							list($y,$m,$d)=explode("-",$strDate);
							?>
							<table width="100%" cellpadding="2" cellspacing="0">
								<tr>
									<td>
										<table width="100%" border="0" >
							<tr>
								<td class="TabHeading" align = "left">
								<?						
									if($rowWeekNews->NewsTitle!='')
			                        {
            		            ?>
                    				    <span class="PageBodyBold"><?=stripslashes($rowWeekNews->NewsTitle)?></span><br />
		                        <?php
        		                    }
								?>
                                </td>
							</tr>
							<tr>
							<td align="left" class="FontDim">
								<?
									list($strDate,$strTime) = explode(" ",$rowWeekNews->NewsDate);
									if(!empty($strDate))
										list($yn,$mn,$dn) = explode("-",$strDate);
									if(isset($arrLabels[536])) echo $arrLabels[536]; else echo "***";
									echo " ".$dn.".".$mn.".".$yn."<br>";
								?>							</td>
							</tr>
							</table>
									</td>
								
								</tr>
								<? if($strShortDesc!=""){?>
								<tr>
									<td align="left">
										<?php if($strNewsImgName != NULL) {?>
										<table><tr><td align="left" valign="top">
										<?php if($strNewsImgName != NULL && is_file("NewsFiles/" .$strNewsImgName )) {?>
										<a href="<?=$strUrl?>-<?=CONST_PAGETYPE_NEWSDETAIL?>-news"><img src="PhpThumb/phpThumb.php?src=../NewsFiles/<?php echo $strNewsImgName; if($intWidth>$intHeight){?>&w=60<?php }else{?>&h=60<?php }?>"></a>
										<?php }else echo "&nbsp;";?>											
									</td></tr></table>
									<? }?>
										<?=$strShortDesc;?>
									</td>
								</tr>
								<tr>
									<td>
										<a href="<?=$strUrl?>-<?=CONST_PAGETYPE_NEWSDETAIL?>-news">
										<? if(isset($arrLabels[29])) echo $arrLabels[29]; else echo "***"; ?></a>
									</td>
								</tr>
								<? }?>
							  <tr><td class='Seperator'><br /></td></tr>
						</table>
						<?php }?>
						
  </marquee></td>
</tr>
<tr><td align="center"><a href="MoreNews.php?nModuleID=<?=$nModuleID?>"><? if(isset($arrLabels[29])) echo $arrLabels[29]; else echo "***"; ?></a></td></tr>

    	</table>
	</td>
    
  </tr>
  <tr valign="top">
  	<td class="TableStyle2">
  		<table width="100%" cellpadding="0" cellspacing="0">
  	 		<tr>
    			<td width="1" nowrap="nowrap"><img src="images/tab08.gif" alt="" /></td>
    			<td class="BottomLine">&nbsp;</td>
    			<td width="1"><img src="images/tab09.gif" alt="" /></td>
  			</tr>
	  </table>
  </td>
 </tr>
</table>
