<?
/*
	Created By :- Yasir Abbasi
	Creation Date : - 16-4-2007
	Modified By :- Moughees Amjad
	Modified Date : - 28-8-2008
	
*/

////////////////// Initialization //////////////////////////////////////////////////////////
$intPage=1; 
$intPerPage=10;
$nNewsPerRow=2;
$nMainNewsOnTop=1;

$nLayoutID=CONST_RIGHT_LAYOUT;
$arrQryStr=array(); 
$nSearchOption=$arrRecPageModule->LayoutID;
$nModuleName= $arrRecPageModule->ModuleDesc;

////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_REQUEST['intPage']))
	$intPage=$_REQUEST['intPage'];
if(isset($_REQUEST['nModuleID']))
	$nModuleID=$_REQUEST['nModuleID'];

	$objNews->m_intModuleID = $nModuleID;

////////////////////////////////////////////////
$objMessage=new clsMessages();//
$objMessage->m_intLangId=$_SESSION['intLangId'];
$objMessage->m_intConId=CONST_CONCEPT_NEWS;
$arrLabels=$objMessage->GetLabels();
$objNews->m_intLangId = $_SESSION['intLangId'];
///////////////////////////////////////////////
$arrGlobalOptions = GetGlobalOptions();
$arrRecGlobalOptions = mysql_fetch_object($arrGlobalOptions);
//////////////////// Getting news ///////////////////////////
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
	$arrNews = $objNews->GetActiveNews();
	if ($arrNews && mysql_num_rows($arrNews)>0)
		$TotalNews= mysql_num_rows($arrNews);
					
}
$strQryStr=implode('&',$arrQryStr);


?>

<table width="98%" border="0" cellpadding="0" cellspacing="0"  align="center">
<tr>
  	<td>
  		<table width="100%" cellpadding="0" cellspacing="0">
  			<tr>
				<td nowrap="nowrap"  width="1" align="left" valign="top" class="Back2">
					<img src="images/tab01.gif" vspace="0" height="23"/>
                </td>
				<td nowrap="nowrap"  class="Back">
					<?=$nModuleName?>
                </td>
				<td nowrap="nowrap"  width="1" align="left"  valign="top"  class="Back2">
					<img src="images/tab03.gif" vspace="0" height="23"/>
                </td>
  			</tr>
	  </table>
  	</td>
  </tr>
  <tr>
   
    <td valign="top" class="LeftRightTopLine">
    
    
    
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" >
                  <?
                        //////////////////// Getting global options for news /////////////////////
                    if($arrNews != FALSE) // Outer if
                    {
                        if($arrRecGlobalOptions->RowsPerPage>0)
                            $intPerPage = $arrRecGlobalOptions->RowsPerPage;   	
                        if($arrRecGlobalOptions->NewsPerRow >0)
                            $nNewsPerRow = $arrRecGlobalOptions->NewsPerRow; 
						//	echo "NewsPerRow ====== ".$nNewsPerRow; exit;
                        $nMainNewsOnTop = $arrRecGlobalOptions->MainNewsOnTop;
                        $nLayoutID = $arrRecGlobalOptions->MainNewsLayout;
                    //echo "Layout Id----".$nLayoutID;exit;
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
				$nTempCounter=0;
                for($i=0; $i<$intPerPage;$i++)	// For f1
                {				
                    if($arrRecNews = mysql_fetch_object($arrNews))// inner if 
                    {
                        $objNews->m_intNewsId = $arrRecNews->pkNewsId;
						//echo "<hr>",$arrRecNews->pkNewsId,"<hr>";
                        $nMainNews = $arrRecNews->IsMain;
                        $arrNewsImage  = $objNews->GetNewsImage();
                        if($arrNewsImage != FALSE)
                        {
                            $arrRecNewsImage = mysql_fetch_object($arrNewsImage);
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
                
                       if($nLayoutID == CONST_POS_LEFT || $nLayoutID == CONST_POS_RIGHT || $nLayoutID == CONST_POS_TOP || $nLayoutID == CONST_POS_BOTTOM) // Image on Top,bottom, Left, right
                       {
                       ?>
                
                <td align="left" valign="top" <? if ($nMainNews == 1 && $nMainNewsOnTop == 1) echo "colspan=".$nNewsPerRow; print " width='".$nWidth."%'"?>>
              
			  <? //Main Table ?>
			  <table width="100%" border="0" align="<? if($nLayoutID == CONST_POS_LEFT) print "left"; else print "right";?>" cellpadding="0" cellspacing="0">
			  	<tr >
					<td>
<? //this is table which includes main title, date, description and more button.?>
				     <table width="100%">
						<tr>
							<td colspan="2">
							<table width="100%" border="0" >
							<tr>
								<td class="TabHeading" align = "left">
								<?						
									if($arrRecNews->NewsTitle!='')
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
							</td>
						</tr>
                        <tr>
						  <td width="55%" align = "<?	if($nLayoutID == CONST_POS_LEFT)	echo "left"; 
				else if($nLayoutID == CONST_POS_RIGHT)	echo "right"; 	else echo "justify";?>">
					<? 
						//for displaying image on left, right, top
					if($strNewsImgName != NULL && ($nLayoutID == CONST_POS_RIGHT || $nLayoutID == CONST_POS_LEFT || $nLayoutID == CONST_POS_TOP))
					{ ?>
						<table width="100%"  cellpadding="4" cellspacing="0" align="right">
						<tr>
							<td  align="<?	if($nLayoutID == CONST_POS_LEFT)	echo "left"; 
						else if($nLayoutID == CONST_POS_RIGHT)	echo "right"; 	else echo "center";?>" valign="top">
								<?php
									if(is_file("NewsFiles/".$strNewsImgName) && !empty($strNewsImgName) )
									{
								 ?>
								<a href="<?=$arrRecNews->PageUrl?>-<?=CONST_PAGETYPE_NEWSDETAIL?>-news">								
									<img src="PhpThumb/phpThumb.php?src=../NewsFiles/<?php echo $strNewsImgName;?>&w=100" />
								</a>
								<?php
									 }
								?>
							</td>
						</tr>
						<tr><td><?=$arrRecNews->ImageDesc?></td></tr>	
						</table>
				<? } ?>
							<?  if($arrRecNews->ShortDesc!='')
                            	{
									$strSDesc = stripslashes($arrRecNews->ShortDesc);
									if(strlen($strSDesc)>200) $strSDesc = substr($strSDesc,0,200)."....";
									echo $strSDesc."<br>";
	                            }
                            ?></td>
                       </tr>
						 <tr>
                         	<td colspan="2" align="right">
                       			<a href="<?=$arrRecNews->PageUrl?>-<?=CONST_PAGETYPE_NEWSDETAIL?>-news">
		                        	<? if(isset($arrLabels[29])) echo $arrLabels[29]; else echo "***"; ?>
        						</a>							</td>
								
		            	 </tr>
	               </table>
				</tr>
					   <?php //Bottom Picture
                	if($nLayoutID == CONST_POS_BOTTOM)
					{
					?>
					 <tr height="90">
					 <?	
						if($strNewsImgName != NULL)
						{
					?>
						 
						  <td colspan="2" align="<? if($nLayoutID == CONST_POS_BOTTOM) print "center";?>" valign="top" width="15%">
							  <a href="<?=$arrRecNews->PageUrl?>-<?=CONST_PAGETYPE_NEWSDETAIL?>-news">
								<img src="PhpThumb/phpThumb.php?src=../NewsFiles/<?php echo $strNewsImgName;?>&w=100" />
							  </a>
						  </td>
			    </tr>
					<? }
				   }
				?>
					
				 <?	
                        } // End Image on Top, bottom Left, right,
                      } // end inner if  
                    ?>
			</table>
			<? if(($nMainNews == 1 && $nMainNewsOnTop == 1) || $nCounter%$nNewsPerRow==0)
                    	echo "</td></tr><tr><td class='Seperator' colspan='".$nNewsPerRow."' >&nbsp;&nbsp;</td>
				</tr><tr><td>&nbsp;</td></tr><tr>";
                    if($nMainNews != 1 || $nMainNewsOnTop != 1)
                    {	$nCounter++; $nTempCounter++;}
				
					if($nTempCounter==$TotalNews)//it exit the loop
						break;
                    
               }	// end for f1 
			   
             ?>
        </td>
	</tr>
                       
                
                  <tr>
                    <td colspan="<?=$nNewsPerRow?>" align = "right">
							<a href="MoreNews.php?nModuleID=<?=$nModuleID?>">
		                      <? if(isset($arrLabels[502])) echo $arrLabels[502]; else echo "***";?>
        		            </a>
                            &nbsp;<!--;|&nbsp;
							<a href="SubscribeToRSS.php?nModuleID=<?//=$nModuleID?>">
		                      <?//if(isset($arrLabels[533])) echo $arrLabels[533]; else echo "***";?>
        		            </a>-->
					</td>
                  </tr>
                  <tr>
                    <td colspan="<?=$nNewsPerRow?>" align="left" height="5"></td>
                  </tr>
                  
                  <?	
                        } // end outer if
                        else{
                        ?>
                  <tr>
                    <td align="center" class="txt_red">
						<? if(isset($arrLabels[49])) echo $arrLabels[49]."<br><br>"; else echo "***";?>
					</td>
                  </tr>
                  <?
                        }
                  ?>
				<? //for active or deactive the pagging and search option bar
					if($nSearchOption == ACTIVE)
					{
				 ?>
						<tr>
                    		<td colspan="<?=$nNewsPerRow?>" align="left"><?			
                                print GeneralPaging($intPage,$intPageCount,$strQryStr);
                                ?>
		                    </td>
        				</tr>
						<tr>
		                    <td colspan="<?=$nNewsPerRow?>">
								<? include('SearchNews.php');?>
        		            </td>
                		</tr>
				  <? }?>
      </table>    
   </td>
 
  </tr>
  <tr valign="top" class="LeftRightTopLine" >
  	<td class="TableStyle2" colspan="3">
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
