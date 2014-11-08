
<?php 
include("Includes/FrontIncludes.php");

session_start();
include("Includes/FrontIncludes.php");
include("Includes/Labels.php");
$nLangId = $_SESSION['intLangId'];
$strSearchKey='';

$objPages = new clsPages();
//$objLang  = new clsLanguage();
//$objMenus = new clsMenues();

$nAdvanceSearch = 0;
$strSearchKey = '';
$strSearchIn = '';
$nGroupId=0;
$strSortBy='';

if(isset($_REQUEST['txtSearchKeyword']))
{
	$strSearchKey = $_REQUEST['txtSearchKeyword'];
}
if(isset($_REQUEST['txtSearchKey']))
{
	$strSearchKey = $_REQUEST['txtSearchKey'];
}

if(isset($_REQUEST['lstSearchIn']))
{
	$strSearchIn = $_REQUEST['lstSearchIn'];
}
if(isset($_REQUEST['lstGroup']))
{
	$nGroupId = $_REQUEST['lstGroup'];
}
if(isset($_REQUEST['lstSort']))
{
	$strSortBy = $_REQUEST['lstSort'];
}
/*if(isset($_GET['hdnAdvSearch']) && $_GET['hdnAdvSearch']==1)
{
	
	$nAdvanceSearch = $_REQUEST['hdnAdvSearch'];
	$rsProducts = $objPages->AdvanceSearchProducts($strSearchKey,$strSearchIn,$nGroupId,$strSortBy);
}
*/
if(isset($_REQUEST['txtSearchKey']) && !empty($_REQUEST['txtSearchKey']) && $nAdvanceSearch==0)
{
	$strSearchKey=$_REQUEST['txtSearchKey'];
	$rsPages=$objPages->SearchPages($strSearchKey);
	//$rsProducts=$objPages->SearchProducts($strSearchKey);
}
?>
<?php
	/**
		Getting Labels
	**/
	$objMessage=new clsMessages();
	$objMessage->m_intLangId=$_SESSION['intLangId'];
	$objMessage->m_intConId=CONST_CONCEPT_SEARCH_TABLE;
	$arrLabels=$objMessage->GetLabels();
?>
<script language="javascript">
function validate(f)
{
	
	
	f.action="<?=$_SERVER['PHP_SELF']?>";
	f.submit();
	
}
function action2(f)
{
	
	f.action="SearchResults.php?hdnAdvSearch=1";
	f.submit();
	
}
</script>
<br />
<table border="0" cellspacing="0" cellpadding="2" class="TabBorder" width="96%" align="center">

<form name="frmSearch" id="frmSearch" method="post" action="<?=$_SERVER['PHP_SELF']?>">
 	<tr class="TabHead">
	   <td colspan="2" height="30" >
		   <? if(isset($arrLabels[1])) echo $arrLabels[1]; else echo "***"; ?>
	   </td>
    </tr>
 	<tr>
	   <td colspan="2" >&nbsp;</td>
    </tr>
 	<tr>
   		<td  align="right" > 
			<? if(isset($arrLabels[1])) echo $arrLabels[1]; else echo "***"; ?>:&nbsp;
		</td>
    	<td  align="left" valign="middle">
    		<input name="txtSearchKey" type="text" id="txtSearchKey" size="30" maxlength="255" value="<?php echo $strSearchKey;?>" />
		</td>
 	</tr>
 	<tr>
 		<td  align="right">&nbsp;</td>
    	<td  align="left" valign="middle">
			<input type="submit" name="button" id="button" value="<? if(isset($arrLabels[1])) echo $arrLabels[1]; else echo "***"; ?>" />
		</td>
 	</tr>
          
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <? 
          if($rsPages!=FALSE)
            {
          ?>
            <? while($rowPages=mysql_fetch_object($rsPages))
                {
                    $nPageId=$rowPages->pkPageId;
                    $strPageName=$rowPages->PageName;
                    $strPageURL=$rowPages->PageURL;
            ?>
           <tr>
            <td colspan="2" align="left" class="body_Bold"><?=$rowPages->PageTitle?></td>
          </tr>
          <tr>
            <td colspan="2" align="left">
            <?php
                $strPageContents1=stripslashes($rowPages->PageContents);
                $strPageContents=strip_tags($strPageContents1);
                $strPageContents=htmlspecialchars($strPageContents,ENT_QUOTES);
                $nPos=strpos($strPageContents,$strSearchKey);
                $strPageContents=highlightSearchTerms($strPageContents,$strSearchKey);
                if(strlen($strPageContents)>100)
                {
                    if($nPos-50 >0)
                      {
                        $nStartPos=$nPos-40;
                        echo "...".substr($strPageContents,$nStartPos,50);
                        echo substr($strPageContents,$nPos,150)."...";  
                      } 
                    else
                     {
                        echo substr($strPageContents,0,100)."..."; 
                     }
                }	
                else
                    echo  $strPageContents;
            ?>	</td>
          </tr>
          <tr>
            <td colspan="2" align="left">
            <a href="<?=$rowPages->PageUrl?>" style="cursor:hand">
                <? if($rowPages->PageName=='') print "****"; else print $rowPages->PageName;?>
            </a>
            </td>
          </tr>
          <tr>
            <td colspan="2" align="left">&nbsp;</td>
          </tr>
          <?
            }//end of while for the Pages recordset 
          }//end of IF for the pages recordset
		  ?>
		</form>
        </table>
