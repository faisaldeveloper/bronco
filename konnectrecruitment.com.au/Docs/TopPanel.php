<?php
$nTotal=0;
$nTopMenuType=CONST_DROPDOWN_MENU_TYPE;//$nTopMenuStyle;
$arrLeftPanel = GetTopPanel($intLangId);
if($nTopMenuType==CONST_DROPDOWN_MENU_TYPE && $arrLeftPanel!=FALSE)
{
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
   <tr valign="top">
   <td width="100%" height="30" align="left" valign="top" >
		<div style="position:relative; width: 100%; height: 30px; z-index: 100; top: 0px; visibility: visible; overflow: visible; vertical-align:middle" align="center">
	<?php
			$intW = 10;
			$pgflag=0;
			$pgmaxlen = 0;
			$counter = 0;

			while($resParent = mysql_fetch_object($arrLeftPanel))
			{
				$strPageName = $resParent->PageName;
				$intPageWidth = strlen($strPageName);
				$intPageId = $resParent->pkPageId;
				$intPageIdDiv="TOPDIV".$intPageId;
				//print "<br>widhti ==>".$intPageWidth;
				$nChk = 8;
				if ($intPageWidth > 20)
				{
					$intPageWidth = $intPageWidth / 2;
					$nChk = 12;
				}	

				
		if($counter!=0 && $counter!=mysql_num_rows($arrLeftPanel))
		{
	?>
    	
    	<div style="position: absolute; width:5px; height: 46px; left: <?=$intW?>px; top:-8px;"><img src="images/menu_bullet.jpg" /></div>
        <?php
		}
		?>
				<div style="position: absolute; visibility: inherit; overflow: visible; vertical-align:middle; cursor: default; text-align: left; width: <?=($intPageWidth * $nChk )+ 40?>px; height: 46px; left: <?=$intW+25?>px; top: 9px;" onMouseOver="MM_showHideLayers('<?=$intPageIdDiv?>','','show');" onMouseOut="MM_showHideLayers('<?=$intPageIdDiv?>','','hide')">
               <a href="<?=$resParent->PageUrl?>"><?php if($resParent->PageName=='') print "****"; else print $resParent->PageName;?></a>
		<?php 
			$rsChild = GetSubTopPanel($intLangId,$intPageId);
			$intH = 1;
			$flag1=0;
			$maxlen1 = 0;
			if($rsChild!=false && mysql_num_rows($rsChild)>0)
			{
				
				while($resChild1 = mysql_fetch_object($rsChild))
				{
					if($resChild1->PageName!="")
						$strChildpage1 = $resChild1->PageName;
					else
						$strChildpage1 = "****";
							
					$oldlen1=strlen($strChildpage1);
					if($flag1==0 || $oldlen1 > $maxlen1)
					{
						$maxlen1=$oldlen1;
						$flag1=1;
					}
				}
				$maxlen1=$maxlen1*7.5;
				$intContainerH = mysql_num_rows($rsChild)*20+2;
		?>
			<div style="position: absolute; width: <?=$maxlen1?>px; height: <?=$intContainerH?>px; z-index: -1; left:1px; top: 22px; visibility: hidden;" id="<?=$intPageIdDiv?>" class="topsubpanel">
	<?php
			mysql_data_seek($rsChild,0);
			while($resChild = mysql_fetch_object($rsChild))
			{
				if($resChild->PageName!="")
					$strChildpage = $resChild->PageName;
				else
					$strChildpage = "****";
					$intChildId = $resChild->pkPageId;
	?>
				<div style="position: absolute; visibility: inherit; overflow: hidden; cursor: default; text-align: left; width: <?=$maxlen1+10?>px; height: 20px; left: 0px; top: <?=$intH?>px;" class="topsubpanel"><a href="<?=$resChild->PageUrl?>">&nbsp;<?=$strChildpage?></a></div>
	<?php
				$intH+=20;
			}
	?>
			</div>
	<?php
			
			}// end if num rows
	?>
			</div>
	<?php
			$intW = $intW + ($intPageWidth * $nChk) + 45;
			//$intW=$intW+($intPageWidth*8)+25;
			$counter++;
		}
	?>
	 </div>	 </td>
  </tr>
	</table>
		
<?php 
}//end of IF for the Comparison of Menu type with Constant

if($nTopMenuType==CONST_TOPD1_MENU_TYPE)
{
	
?>
	<table cellpadding="2" cellspacing="0" width="100%">
	  <tr>
	  <?php
	  if($arrLeftPanel != FALSE)
	  {
		while($rowLeftPanel=mysql_fetch_object($arrLeftPanel))
		{	
			$nParentId = $rowLeftPanel->pkPageId;
	  ?>
			<td nowrap width="<?=$nWidth?>%" align="center">
			<div style="display:absolute;visibility:visible;" onMouseOver="MM_showHideLayers('TOPDIV<?=$nParentId?>','','show')" onMouseOut="MM_showHideLayers('TOPDIV<?=$nParentId?>','','hide')">
				<a href="<?=$rowLeftPanel->PageUrl?>"><?php if($rowLeftPanel->PageName=='') print "****"; else print $rowLeftPanel->PageName;?></a><br>
				<div style="position:absolute;width:auto; height:auto;visibility:hidden;" id="TOPDIV<?=$nParentId?>">
				<table cellpadding="2" cellspacing="2" class="topsubpanel" width="100%">
					<tr>
					<?
					$rsSubPage = GetSubLeftPanel($intLangId,$nParentId);
					if($rsSubPage != FALSE)
					{
						while($rowSubPage=mysql_fetch_object($rsSubPage))
						{
							$nSubId = $rowSubPage->pkPageId;
					?>
							<td nowrap align="left"><a href="<?=$rowSubPage->PageUrl?>"><?php print "=>"; if($rowSubPage->PageName=='') print "****"; else print $rowSubPage->PageName;?></a><?=$nWidth?></td>
					<?
						}//end of While for Sub Page
					}//end of IF for the Sub page Recordset
					?>	
					</tr>
				</table>
				</div>
			</div>
			</td>
	  <?
			}//end of While for the Top Menu 
		}//end of IF for the Top Menu
	  ?>  
	  </tr>
	</table>
<?
}//end of IF for the Constant Comparison 
?>