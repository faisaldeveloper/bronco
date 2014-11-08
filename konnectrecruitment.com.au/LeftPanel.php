<?php
	/**
		Getting Labels
	**/
	$objMessage=new clsMessages();
	$objMessage->m_intLangId=$_SESSION['intLangId'];
	$objMessage->m_intConId=CONST_CONCEPT_LEFT_PANNEL;
	$arrLabels=$objMessage->GetLabels();

$nMenuType = $nLeftMenuStyle;	
$arrLeftPanel = GetLeftPanel($intLangId);
?>
<?
if($nMenuType==CONST_COLLAPSE_MENU_TYPE)
{
?>
	<table width="<? echo $nLeftPanWidth-4 ?>px" cellspacing="0" cellpadding="0" align="center">
	<?php
	if($arrLeftPanel != FALSE)
  	{
  		while($arrRecLeftPanel = mysql_fetch_object($arrLeftPanel))
		{
			$nParentId = $arrRecLeftPanel->pkPageId;
  	?>
			<tr>
				<td>
				<div id="wrapper" onMouseOver="switchMenu('DIV<?=$nParentId?>', true);" onMouseOut="switchMenu('DIV<?=$nParentId?>', false);">
					<a href="<?=$arrRecLeftPanel->PageUrl?>" style="cursor:hand"><? if($arrRecLeftPanel->PageName=='') print "****"; else print $arrRecLeftPanel->PageName;?></a>
						<div id="DIV<?=$nParentId?>" style="display:none">
						<table class="subpanel" width="100%" cellpadding="2">
						<?
						$rsSubPage = GetSubLeftPanel($intLangId,$nParentId);
						if($rsSubPage != FALSE)
						{
							while($rowSubPage=mysql_fetch_object($rsSubPage))
							{
								$nSubId = $rowSubPage->pkPageId;
						?>
								<tr><td><a style="cursor:hand" href="index.php?pagefrname=<?=$rowSubPage->PageUrl?>">=> <? if($rowSubPage->PageName=='') print "****"; else print $rowSubPage->PageName;?></a></td></tr>
						<?
							}//end of While for Sub Page
						}//end of IF for the Sub page Recordset
						?>	
						</table>	
					</div>
				</div>
				</td>
			</tr>
	<?
		}//end of While for the Pages
	?>
	<?	
	}//end of IF for the Recordset check
	?>
</table>
<?
}//end of IF for the Menu Type Constant Comparison

if($nMenuType==CONST_DDOPEN_MENU_TYPE)
{

?>
	<table width="<? echo $nLeftPanWidth-4 ?>px" cellspacing="0" cellpadding="0" align="center">
	<?php
	if($arrLeftPanel != FALSE)
  	{
  		while($arrRecLeftPanel = mysql_fetch_object($arrLeftPanel))
		{
			$nParentId = $arrRecLeftPanel->pkPageId;
  	?>
			<tr>
				<td>
					<a href="<?=$arrRecLeftPanel->PageUrl?>"><? if($arrRecLeftPanel->PageName=='') print "****"; else print $arrRecLeftPanel->PageName;?></a>
				</td>
			</tr>	
			<tr>
				<td>
					<?	
						$rsSubPage = GetSubLeftPanel($intLangId,$nParentId);
						if($rsSubPage != FALSE)
						{
					?>	
							<table class="subpanel" width="100%" cellpadding="2">
							<?
							while($rowSubPage=mysql_fetch_object($rsSubPage))
							{
								$nSubId = $rowSubPage->pkPageId;
							?>
								<tr><td><a style="cursor:hand" href="<?=$rowSubPage->PageUrl?>">=> <? if($rowSubPage->PageName=='') print "****"; else print $rowSubPage->PageName;?> </a></td></tr>
							<?
							}//end of While for Sub Page
							?>	
							</table>	
						<?
						}//end of IF for the Sub page Recordset
						?>
				</td>
			</tr>
	<?
		}//end of While for the Pages
	?>
	<?	
	}//end of IF for the Recordset check
	?>
	<?php
	if($arrCatList != FALSE)
  	{
	?>
	<?	
  		while($arrCatPanel = mysql_fetch_object($arrCatList))
		{
			$nParentId = $arrCatPanel->pkCatId;
  	?>
			<tr>
				<td>
					<a href="<?=$arrCatPanel->PageUrl?>-<?=CONST_PAGETYPE_PRODUCTS?>-products"><? if($arrCatPanel->CatName=='') print '****'; else print $arrCatPanel->CatName;?></a>
				</td>
			</tr>	
			<tr>
				<td>
					<?
					$rsSubCat = $objCat->GetSubCategories($intLangId,$nParentId);
					if($rsSubCat != FALSE)
					{
					?>
							<table class="subpanel" width="100%" cellpadding="2">
							<?
							while($rowSubCat=mysql_fetch_object($rsSubCat))
							{
								$nSubId = $rowSubCat->pkCatId;
							?>
								<tr><td>
                                	
                                <a style="cursor:hand" href="<?=$rowSubCat->PageUrl?>-<?=CONST_PAGETYPE_PRODUCTS?>-products"><? if($rowSubCat->CatName=='') print '****'; else print $rowSubCat->CatName;?></a> </td></tr>
							<?
							}//end of While for Sub Page
							?>	
							</table>	
						<?
						}//end of IF for the Sub page Recordset
						?>
				</td>
			</tr>
	<?
		}//end of While for the Categories
	}//end of IF for the Recordset check
	?>
	</table>
<?
}//end of IF for the Menu Type comparison with constant

if($nMenuType==CONST_RIGHTPOPUP_MENU_TYPE)
{
?>
	<table width="<? echo $nLeftPanWidth-4 ?>px" cellspacing="0" cellpadding="0" align="right" >
	  <?php
	  if($arrLeftPanel != FALSE)
	  {
	  ?>
	  <tr>
      
		<td class="panel">
        	<table width="100%" align="center" cellpadding="0" cellspacing="0">
      			<tr><td align="right"><img src="images/left_greenmenu_top.jpg" /></td></tr>
		  
	  <?
          while($arrRecLeftPanel = mysql_fetch_object($arrLeftPanel))
		  {
			  $nParentId = $arrRecLeftPanel->pkPageId;
	  ?>
			  <tr>
				<td valign="middle">
					<div style="position:relative; visibility:visible; width:auto; height:auto; top:0px; left:auto;" onMouseOver="MM_showHideLayers('DIV<?=$nParentId?>','','show')" onMouseOut="MM_showHideLayers('DIV<?=$nParentId?>','','hide')" >
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
						
                            <tr>
                                <td width="20">&nbsp;</td>
                                <td >
                                <table width="100%" cellpadding="0" cellspacing="0" >
                                  <tr>
                                    <td width="5%" valign="top"><img src="images/left_menu_bullet.jpg" style="margin-top:5px;" /></td>
                                    <td width="95%">&nbsp;&nbsp;<a href="<?=$arrRecLeftPanel->PageUrl?>"><? if($arrRecLeftPanel->PageName=='') print "****"; else print $arrRecLeftPanel->PageName;?></a></td>
                                  </tr>
                                  <tr style="height:4px;"><td></td><td><img src="images/left_greenmenu_line.jpg" /></td></tr>
                                </table>
                                </td>
                                <td width="1">&nbsp;</td>
                            </tr>
                           
                        </table>
                    
                 <?
							$rsSubPage = GetSubLeftPanel($intLangId,$nParentId);
							if($rsSubPage != FALSE)
							{?>
						  <div style="position:absolute; width:auto; height:auto; top:0px; left:140px; visibility:hidden;" id="DIV<?=$nParentId?>">				
						  <table width="150" cellpadding="2" cellspacing="0" class="subpanel">
							<?
								$nCounter=0;
								$nNoOfRecords = mysql_num_rows($rsSubPage);
								while($rowSubPage=mysql_fetch_object($rsSubPage))
								{
									$nSubId = $rowSubPage->pkPageId;
							?>
									<tr>
									  <td width="5%">&nbsp;</td>	
									  <td height="20" valign="middle" <? if($nCounter+1 != $nNoOfRecords) echo "class='brdr_Btm'";?>><a href="<?=$rowSubPage->PageUrl?>"><? if($rowSubPage->PageName=='') print "****"; else print $rowSubPage->PageName;?></a></td>
									</tr>
							<?
								$nCounter++;
								}//end of While for Sub Page
							?>
						  </table>
						</div>
                        <? }//end of IF for the Sub page Recordset
							?>	
					</div>
					
				</td>
			  </tr>
  	<?
  	  	}//end of While for the page of Left panel
	?>
     <!--<tr>
		<td valign="middle">
         			<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">						
                            <tr>
                                <td width="20">&nbsp;</td>
                                <td >
                                <table width="100%" cellpadding="0" cellspacing="0" >
                                  <tr>
                                    <td width="5%" valign="top"><img src="images/left_menu_bullet.jpg" style="margin-top:5px;" /></td>
                                    <td width="95%">&nbsp;&nbsp;<a href="PostJob-32-s">Post a Job</a></td>
                                  </tr>
                                  <tr style="height:4px;"><td></td><td><img src="images/left_greenmenu_line.jpg" /></td></tr>
                                </table>
                                </td>
                                <td width="1">&nbsp;</td>
                            </tr>                           
                        </table>        
          </td>
     </tr>-->
    <!-- <tr>
		<td valign="middle">
         			<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">						
                            <tr>
                                <td width="20">&nbsp;</td>
                                <td >
                                <table width="100%" cellpadding="0" cellspacing="0" >
                                  <tr>
                                    <td width="5%" valign="top"><img src="images/left_menu_bullet.jpg" style="margin-top:5px;" /></td>
                                    <td width="95%">&nbsp;&nbsp;<a href="SearchJob-33-s">Search Job</a></td>
                                  </tr>
                                  <tr style="height:4px;"><td></td><td><img src="images/left_greenmenu_line.jpg" /></td></tr>
                                </table>
                                </td>
                                <td width="1">&nbsp;</td>
                            </tr>                           
                        </table>        
          </td>
     </tr>-->
     <?php
     if(isset($_SESSION['EmpId']) && !empty($_SESSION['EmpId']))
	 {
	 ?>
      <tr>
		<td valign="middle">
         <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
						
                            <tr>
                                <td width="20">&nbsp;</td>
                                <td >
                                <table width="100%" cellpadding="0" cellspacing="0" >
                                  <tr>
                                    <td width="5%" valign="top"><img src="images/left_menu_bullet.jpg" style="margin-top:5px;" /></td>
                                    <td width="95%">&nbsp;&nbsp;<a href="EmployeeJobs.php">View your jobs</a></td>
                                  </tr>
                                  <tr style="height:4px;"><td></td><td><img src="images/left_greenmenu_line.jpg" /></td></tr>
                                </table>
                                </td>
                                <td width="1">&nbsp;</td>
                            </tr>
                           
                        </table>
        
          </td>
     </tr>
      <tr>
		<td valign="middle">
         <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
						
                            <tr>
                                <td width="20">&nbsp;</td>
                                <td >
                                <table width="100%" cellpadding="0" cellspacing="0" >
                                  <tr>
                                    <td width="5%" valign="top"><img src="images/left_menu_bullet.jpg" style="margin-top:5px;" /></td>
                                    <td width="95%">&nbsp;&nbsp;<a href="EmpLogOut.php">Log out</a></td>
                                  </tr>
                                  <tr style="height:4px;"><td></td><td><img src="images/left_greenmenu_line.jpg" /></td></tr>
                                </table>
                                </td>
                                <td width="1">&nbsp;</td>
                            </tr>
                           
                        </table>
        
          </td>
     </tr>
     <?php
	  }else
	  {
	 ?>
         <tr>
		<td valign="middle">
         <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
						
                            <tr>
                                <td width="20">&nbsp;</td>
                                <td >
                                <table width="100%" cellpadding="0" cellspacing="0" >
                                  <tr>
                                    <td width="5%" valign="top"><img src="images/left_menu_bullet.jpg" style="margin-top:5px;" /></td>
                                    <td width="95%">&nbsp;&nbsp;<a href="EmployeeLogin.php">Log in</a></td>
                                  </tr>
                                  <tr style="height:4px;"><td></td><td><img src="images/left_greenmenu_line.jpg" /></td></tr>
                                </table>
                                </td>
                                <td width="1">&nbsp;</td>
                            </tr>
                           
                        </table>
        
          </td>
     </tr>
     <?php
	  }
	 ?>
    <tr><td align="left"><img src="images/left_greenmenu_bottom.jpg" /></td></tr>
    </table>
    </td>
    </tr>
	<?	
	}//end of IF the Recordset of main pages
	?>
	<tr><td>&nbsp;</td></tr>
    <tr><td >
    <table width="244" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="background-image:url(images/left_bluemenu_top.jpg); background-repeat:no-repeat; height:44px; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#FFF; font-weight:bold; background-color:#294F65;"> <br />
    <table width="90%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td><img src="images/resume.png" /></td>
    <td ><table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td align="left"><a href="SearchJob-33-s-1" style="color:#FFF">Submit your<br />Resume now</a></td>
  </tr>
  <tr>
    <td align="right"><a href="JobSeekerResume.php?hdnJobId=0&hdnDo=1"><img src="images/konnect3_60.jpg" /></a>&nbsp;&nbsp;&nbsp;</td>
  </tr>
</table></td>
  </tr>
</table>

    </td>
  </tr>
 <tr><td style="background-color:#294F65; height:20px;">
 <table width="90%" border="0" cellspacing="0" cellpadding="0" align="center" style="height:2px; background-color:#FFF;">
  <tr>
    <td></td>
  </tr>
</table>
</td></tr>
  <tr>
    <td style="background-color:#294F65; height:85px;" >
    <div style="margin-top:0px; width:244px; position:absolute;">
    <table width="90%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td><img src="images/konnect3_54.jpg" /></td>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td align="left"><a href="PostJob.php" style="color:#FFF;">Submit<br />vacancy now</a></td>
  </tr>
  <tr>
    <td align="right"><a href="PostJob.php"><img src="images/konnect3_60.jpg" /></a>&nbsp;&nbsp;&nbsp;</td>
  </tr>
</table>
</td>
  </tr>
</table>

    </div><img src="images/left_bluemenu_bottom.jpg" style="margin-top:70px;" /></td>
  </tr>
</table>

    </td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td><a href="ContactUs"><img src="images/konnect2_81.jpg" /></a></td></tr>
	</table>
<?
}//end of IF for the Mune Comparison Check with Constant
?>

