<table width="100%" border="0" cellpadding="2" cellspacing="0" class="TabBorder">
<tr>
	<td align="left" height="10px"></td>
</tr>
<tr>
    <td align="left"><?=$msgBreakingNews?></td>
</tr>
<tr>
	<td height="10px"></td>
</tr>
<tr>
<?php
	$systemdate=date("Y-m-d");
	list($yr,$mon,$day)=explode("-",$systemdate);
	$sdate=mktime(0,0,0,$mon,$day-7,$yr);
	$my_array = localtime($sdate, 1) ;
	$premonth = $my_array["tm_mon"] + 1 ; 
	$predays = $my_array["tm_mday"] ; 
	$preyears = $my_array["tm_year"] +1900 ; 
	$predate = $preyears."-".$premonth."-".$predays;
	//$sqlweeknews = "select * from news_info where NewsDate between '".$predate."' AND '".$systemdate."' 
	$sqlweeknews = "select * from news_info where pkNewsId>0 
				AND (NewsEDate='0000-00-00' OR NewsEDate > CURDATE()) AND IsActive=1 order by news_info.NewsDate desc, news_info.NewsTime desc";
	$rsweeknews = mysql_query($sqlweeknews);
?>
  <td align="left"><marquee id="ml" onMouseOver="ml.stop()" onMouseOut="ml.start()" scrolldelay="10" align="texttop" scrollamount="1" direction="up" behavior="scroll" width="100%">
	   
	   
	    						<?php 
								while($rowweeknews = mysql_fetch_array($rsweeknews)){
									$intNewsId = $rowweeknews['pkNewsId'];
									$objNews->m_intNewsId = $intNewsId;
									$arrNewsImage  = $objNews->GetNewsImage();
									if($arrNewsImage != FALSE)
									{
										$arrRecNewsImage = mysql_fetch_object($arrNewsImage);
										$intNewsImgId  = $arrRecNewsImage->pkNewsImageId;
										$strNewsImgName  = $arrRecNewsImage->ImageName;
										list($intWidth,$intHeight,$strType,$strAttr)=getimagesize("NewsFiles/".$strNewsImgName."");
									}
									else
									{
										$intNewsImgId  = 0;
										$strNewsImgName  = NULL;
									} 
										list($y,$m,$d)=explode("-",$rowweeknews['NewsDate']);
									?>
									<table width="100%" cellpadding="2" cellspacing="0">
										<tr>
											<td>
												<strong><?=stripslashes($rowweeknews['NewsTitle'])?></strong>
											</td>
										    <td rowspan="3" align="right" valign="top">
												<?php if($strNewsImgName != NULL) {?>
												<a href="NewsDetail.php?NewsId=<?=$intNewsId?>"><img src="PhpThumb/phpThumb.php?src=../NewsFiles/<?php echo $strNewsImgName; if($intWidth>$intHeight){?>&w=60<?php }else{?>&h=60<?php }?>"></a>
												<?php }else echo "&nbsp;";?>											
											</td>
										</tr>
										<? if($rowweeknews['ShortDesc']!=""){?>
										<tr>
											<td align="left">
												<?=stripslashes($rowweeknews['ShortDesc'])?>&nbsp;<a href="NewsDetail.php?NewsId=<?=$rowweeknews['pkNewsId']?>"><?=$msgMore?></a>
											</td>
									    </tr>
										<? }?>
	                                  <tr>
	                                    <td align="left"><?=$d.".".$m.".".$y?></td>
                                      </tr>
	                                  <tr>
									<td align="left" colspan="2"><hr size="1" ></td>
    	                              </tr>
								</table>
											
                                <?php }?>
  </marquee></td>
</tr>
</table>
