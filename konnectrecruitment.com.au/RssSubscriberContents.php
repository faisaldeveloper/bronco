<?php 
		// Setting Url and page title
        $strSiteUrl = "http://".$_SERVER['HTTP_HOST'];//.$_SERVER['REQUEST_URI'];
        $strPageUrl = urldecode($strSiteUrl);
		$strTitle = $_REQUEST['pagefrname'];
        if(empty($strTitle))
        {
			$strTitle = "Home";
        }


	if(isset($_REQUEST['nModuleID']))
		$nModuleID=$_REQUEST['nModuleID'];

	//$arrNewsTitle = array();
	$objNews->m_intModuleID = $nModuleID;
	$objNews->m_intLangId = $_SESSION['intLangId'];

	$arrNews = $objNews->NewsSearch();
	if ($arrNews && mysql_num_rows($arrNews)>0)
		$TotalNews= mysql_num_rows($arrNews);
		
	
		
		/*while($arrRecNews = mysql_fetch_object($arrNews))// inner if 
		{
			$objNews->m_intNewsId = $arrRecNews->pkNewsId;
			$objNews->m_strNewsTitle = $arrRecNews->NewsTitle;
			$objNews->m_dtNewsDate = $arrRecNews->NewsDate;
			$arrNewsImage  = $objNews->GetNewsImage();
		}*/
		  
	  echo $strXMLforRSS = $objNews->CreateXMLforRSS();

?>
                
         
<table border="0" cellpadding="2" cellspacing="0" class="TabBorder" width="96%" align="center">
	<tr class="TabHead">
		<td align="left" valign="middle" class="TabHead"><? if(isset($arrLabels[532])) echo $arrLabels[532]; else echo "***"; ?>
		 </td>
	    <td align="right" valign="middle" class="TabHead"><img src="images/RssImage.png" height="26" /></td>
	</tr>
    <tr>
    	<td colspan="2" height="4"></td>
    </tr>
	<tr>
    	<td colspan="2" class="TabHead"><? if(isset($arrLabels[533])) echo $arrLabels[533]; else echo "***"; ?></td>
    </tr>
    <tr>
    	<td colspan="2" >
    		<a href="http://add.my.yahoo.com/rss?url=<?=$strSiteUrl?>" target="_blank">
    			<img src="images/rss_addmyyahoo.gif"> 
    		</a>    	
        </td>
    </tr>
    <tr>
    	<td colspan="2" >
        	<a href="http://fusion.google.com/add?feedurl=<?=$strSiteUrl?>" target="_blank">
    			<img src="images/rss_addgoogle.gif">
    		</a>
        </td>
    </tr>
    <tr>
    	<td colspan="2" >
        	<a href="http://my.msn.com/addtomymsn.armx?id=rss&ut=<?=$strSiteUrl?>&ru=<?=$strSiteUrl?>" target="_blank">
    			<img src="images/rss_addmymsn.gif">
    		</a>
        </td>
    </tr>
    <tr>
    	<td colspan="2" >
        	<a href="http://www.bloglines.com/sub/?url=<?=$strSiteUrl?>" target="_blank">
    			<img src="images/rss_addbloglines.gif"> 
    		</a>
        </td>
    </tr>
    <tr>
    	<td colspan="2" >
        	<a href="http://my.feedlounge.com/external/subscribe?url=<?=$strSiteUrl?>" target="_blank">
    			<img src="images/rss_addfeedlounge.gif">
    		</a>
        </td>
    </tr>
    <tr>
    	<td colspan="2" >
        	<a href="http://www.newsgator.com/ngs/subscriber/subext.aspx?url=<?=$strSiteUrl?>" target="_blank">
    			<img src="images/rss_addnewsgator.gif">
    		</a>
        </td>
    </tr>
    <tr>
    	<td colspan="2" >
    		<a href="http://www.netvibes.com/subscribe.php?url=<?=$strSiteUrl?>" target="_blank">
    			<img src="images/rss_addnetvibes.gif">
    		</a>    	
        </td>
    </tr>
    <tr>
    	<td colspan="2" height="4"></td>
    </tr>
    <tr>
    	<td colspan="2" class="TabHead"><? if(isset($arrLabels[534])) echo $arrLabels[534]; else echo "***"; ?></td>
    </tr>
    <tr>
    	<td colspan="2" >
    		<a href="javascript:location.href='http://myweb2.search.yahoo.com/myresults/bookmarklet?title=<?=$strTitle?>%&u=<?=$strPageUrl?>">
                 <img src="images/rss_yahoo.gif"> Add to myYahoo! 
            </a>    
        </td>
    </tr>
    <tr>
    	<td colspan="2" >
    		<a href="javascript:location.href='http://del.icio.us/post?v=2&url=<?=$strPageUrl?>&title=<?=$strTitle?>">
    			<img src="images/rss_delicious.gif"> Add to del.icio.us
    		</a>    
        </td>
    </tr>
    <tr>
    	<td colspan="2" >
        	<a href="javascript:location.href='http://digg.com/submit?phase=2&url=<?=$strPageUrl?>">
    			<img src="images/rss_digg.gif"> Digg this 
    		</a>
        </td>
    </tr>
    <tr>
    	<td colspan="2" >
    		<a href="javascript:location.href='http://www.furl.net/storeIt.jsp?u=<?=$strPageUrl?>&title=<?=$strTitle?>">
    			<img src="images/rss_furl.gif"> Post to Furl 
    		</a>    
        </td>
    </tr>
    <tr>
    	<td colspan="2" >
    		<a href="javascript:location.href='http://reddit.com/submit?title=<?=$strTitle?>&url=<?=$strPageUrl?>">
    			<img src="images/rss_reddit.gif"> Add to reddit 
    		</a>    
        </td>
    </tr>
</table>