<?

$nLangId = $_SESSION['intLangId'];
$nCount=0;
$intPage=1;
	$intTotalReturned = 0;
	$intTotalReturned = 0;
$arrQry = array();	
$strQryStr = '';
if(isset($_REQUEST['lstCatSearch'])&& !empty($_REQUEST['lstCatSearch']))
{
	$nCatSearch = $_REQUEST['lstCatSearch'];
	$arrQry[] = "lstCatSearch=".$nCatSearch;
}
if(isset($_REQUEST['lstCompSearch'])&& !empty($_REQUEST['lstCompSearch']))
{
	$nCompSearch = $_REQUEST['lstCompSearch'];
	$arrQry[] = "lstCompSearch=".$nCompSearch;
}
if(isset($_REQUEST['txtJobSearch'])&& !empty($_REQUEST['txtJobSearch']))
{
	$strJobSearch = $_REQUEST['txtJobSearch'];
	$arrQry[] = "txtJobSearch=".$strJobSearch;
}
/*if($nCompSearch!=0 && $nCatSearch==0 && $strJobSearch=='' )
{
	$strWhere="fkEmpId=".$nCompSearch;
	$nCount=1;
}
if($nCatSearch!=0 && $nCompSearch==0 && $strJobSearch=='')
{
	$strWhere="fkCatId=".$nCatSearch;
	$nCount=1;
}
if($strJobSearch!='' && $nCatSearch==0 && $nCompSearch==0)
{
	$strWhere="JobTitle LIKE '%".$strJobSearch."%'";
	$nCount=1;
}
if($nCount==0 && $nCompSearch!=0 && $nCatSearch!=0 && $strJobSearch=='')
{
	$strWhere="fkEmpId='".$nCompSearch."' AND fkCatId=".$nCatSearch;
	$count=2;
}

if($nCount==0 && $nCompSearch!=0 && $strJobSearch!='' && $nCatSearch==0)
{
$strWhere="fkEmpId='".$nCompSearch."' AND JobTitle LIKE '%".$strJobSearch."%'";
$count=2;
}

if($nCount==0 && $nCatSearch!=0 && $strJobSearch!='' && $nCompSearch==0)
{
$strWhere="fkEmpId='".$nCompSearch."' AND JobTitle LIKE '%".$strJobSearch."%'";
$count=2;
}

if($count!=2 && $nCount!=1)
{
	if($nCompSearch!=0 && $nCatSearch!=0 && $strJobSearch!='')
	{
	$strWhere="fkEmpId='".$nCompSearch."' AND fkCatId='".$nCatSearch."' AND JobTitle LIKE '%".$strJobSearch."%'";
	}
}*/
if(isset($_REQUEST['intPage']))		//Getting Page No
		$intPage=$_REQUEST['intPage'];
$arrWhere = array();
if($strJobSearch!='')
{
	$arrWhere[]="JobTitle LIKE '%".$strJobSearch."%'";
}
if($nCatSearch!=0 )
{
	$arrWhere[]="fkCatId=".$nCatSearch;
}
if($nCompSearch!=0)
{
	$arrWhere[]="fkEmpId='".$nCompSearch."'";
}
$strWhere = implode(" AND ",$arrWhere);
$strQryStr = implode('&',$arrQry);
//echo $strWhere;
$rsResult=$objJob->GetJobBySearch($strWhere);
$rsCat=$objCategory->GetAllCategories();
$rsEmployee=$objEmployeer->GetAllEmployeer();
$intPerPage = 10;

if($rsResult != FALSE && mysql_num_rows($rsResult))
	$intTotalReturned = mysql_num_rows($rsResult); 	//Total Records

$intPageCount = ceil($intTotalReturned/$intPerPage);   //Total Pages formed
if($intPage>1) //Setting records Limit from 0 for ist page
	$intRecordStart = ($intPage-1)*$intPerPage; 
?>

<table width="98%" align="left" border="0" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td valign="bottom" width="38"><img src="images/Internal_body_top_left.jpg" /></td>
              <td style="background-image:url(images/Internal_body_top_bg.jpg); background-repeat:repeat-x; background-position:bottom; " class="Heading" width="100%">Search Job</td>
              <td valign="bottom"><img src="images/Internal_body_top_right.jpg" /></td>
            </tr>
          </tbody>
        </table>
        </td>
    </tr>
    <tr>
      <td class="LeftRightLine" style="background-image:url(images/body_bg.jpg); background-repeat:repeat-x; text-align:justify; height:400px;" valign="top"><table width="92%" border="0" cellspacing="0" cellpadding="2" align="center">
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><form id="frmJobSearch" name="frmJobSearch" method="post" action="SearchJob.php" onsubmit="return Validate(this)">
                <table width="100%" border="0" cellspacing="0" cellpadding="4">
                  <tr>
                    <td align="right">Job title:</td>
                    <td><input type="text" name="txtJobSearch" id="txtJobSearch"  value="<?=$strJobSearch?>"/></td>
                  </tr>
                   <tr>
                    <td align="right">Company:</td>
                    <td><select name="lstCompSearch" id="lstCompSearch" onchange="SearchJob.php">
                     	<option value="0">Any</option>
                        <?
					if($rsEmployee!=FALSE)
					{
						while($rowEmp=mysql_fetch_object($rsEmployee))
						{
						 	$nEmpId=$rowEmp->pkEmpId;
						    $strCompName=$rowEmp->CompanyName;
					?>
					 <option  value="<?=$nEmpId?>" <? if($nEmpId==$nCompSearch) echo "selected"; ?>><?=$strCompName?></option>
				<?	    }
					} ?>
                    </select></td>
                 </tr>
                  <tr>
                    <td align="right">Category:</td>
                    <td><select name="lstCatSearch" id="lstCatSearch" onchange="SearchJob.php">
                    <option value="0">Any</option>
					<?
					if($rsCat!=FALSE)
					{
						while($rowCat=mysql_fetch_object($rsCat))
						{
						 	$nCatId=$rowCat->pkCatId;
						    $strCatName=$rowCat->CatName;
					?>
					 <option  value="<?=$nCatId?>" <? if($nCatId==$nCatSearch) echo "selected"; ?>><?=$strCatName?></option>
				<?	    }
					} ?>
                    </select></td>
                  </tr>
                 
                
                  <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" class="button" name="btnSearch" id="btnSearch" value="Filter Jobs" /></td>
                  </tr>
                </table>
              </form></td>
          </tr>
          <tr>
            <td style="text-align:center; color:#F00;"><?php
			
            if(isset($_REQUEST['hdnSearch']) && $_REQUEST['hdnSearch']==1)
			{
			?>
			<span >Please select suitable job to post resume</span>
			<?php
			}
			?>&nbsp;</td>
          </tr>
         
          <tr>
            <td>
      <?      if($rsResult!=FALSE)
			{
				mysql_data_seek($rsResult, $intRecordStart);
				?>
            <table width="100%" border="0" cellspacing="0" cellpadding="2" align="center">
             <tr>
							<td colspan="5"><? print GeneralPaging($intPage,$intPageCount,$strQryStr);?></td>
						</tr>
	      <tr>
	        <td  class="TabHead" >Job Title</td>
              <td  class="TabHead">Action</td>
	        </tr>
            <?
			$sr=1;
			for($i=0;$i<$intPerPage;$i++)
			{
				if($rowJob=mysql_fetch_object($rsResult))
				{
					$nJobId=$rowJob->pkJobId;
					$nEmpId=$rowJob->fkEmpId;
					$strJobName=$rowJob->JobTitle;
					$strSalaryRange=$rowJob->SalaryRange;
			?>
	      <tr class="<?php if($sr%2==0){?>TableStyle1<?php }else{?>TableStyle2<?php }?>">
	        <td class="brdr_dotedLt" width="75%"><?=$strJobName?></td>
            <td class="brdr_dotedLt"><a href="#" target="_blank" onclick="window.open('JobDetailsContents.php?hdnJobId=<?=$nJobId?>','','scrollbars=1,width=800,height=600'); return false;">Job Detail</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="JobSeekerResume.php?hdnJobId=<?=$nJobId?>">Apply now</a></td>
	        </tr>
            <? $sr++;}
			}
			?>
           
	      </table>
          <? }  ?>
          </td>
          </tr>
        </table></td>
    </tr>
    <tr>
      <td align="right"><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td class="LeftBottomLine" width="100%">&nbsp;</td>
              <td width="35"><img src="images/body_bottom_right.jpg" /></td>
            </tr>
          </tbody>
        </table></td>
    </tr>
  </tbody>
</table>
