<?php
include_once("Includes/FrontIncludes.php");	
if(isset($_REQUEST['hdnJobId']) && !empty($_REQUEST['hdnJobId'])) 
	$nJobId=$_REQUEST['hdnJobId'];
	$objJob->m_npkJobId=$nJobId;
	$rsJobs=$objJob->GetJobById();
	$arrServiceName=array();
	if($rsJobs!=FALSE)
	{
		$rowJobDetail=mysql_fetch_object($rsJobs);
		$strJobName=$rowJobDetail->JobTitle;
		$strSalaryRange=$rowJobDetail->SalaryRange;
		$strDescriptionFile=$rowJobDetail->DescriptionFile;
	    $nServicesId=$rowJobDetail->fkServicesId;
		$arrServiceIds = explode(':',$nServicesId);
		foreach($arrServiceIds as $nServicesId)
		{
			$objServices->m_npkServiceId=$nServicesId;
			$rsService=$objServices->GetServicesById();
			$rowSer=mysql_fetch_object($rsService);
			$arrServiceName[]=$rowSer->ServiceTitle;
		}
		$strServiceName = implode(' , ',$arrServiceName);
		$strComments=$rowJobDetail->Comments;
		$strKeyAttribute1=$rowJobDetail->KeyAttribute1;
		$strKeyAttribute2=$rowJobDetail->KeyAttribute2;
		$strKeyAttribute3=$rowJobDetail->KeyAttribute3;
		$strKeyAttribute4=$rowJobDetail->KeyAttribute4;
		$strKeyAttribute5=$rowJobDetail->KeyAttribute5;
		$strWorkType = $rowJobDetail->WorkType;
		$nCatId=$rowJobDetail->fkCatId;
		$objCategory->m_npkCatId=$nCatId;
		$rsCat=$objCategory->GetCategoryById();
		$rowCat=mysql_fetch_object($rsCat);
		$strCatName=$rowCat->CatName;
		
	}
?>
<script type="text/javascript" src="Script/JavaScript.js"></script>
<?php $objTheme->GenerateStyleSheet();?>
<link href="cms.css" rel="stylesheet" type="text/css">
<table width="98%" align="center" border="0" cellpadding="0" cellspacing="0">
  <tbody>
  <tr><td height="5"></td></tr>
    <tr>
      <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td valign="bottom" width="38"><img src="images/Internal_body_top_left.jpg" /></td>
              <td style="background-image:url(images/Internal_body_top_bg.jpg); background-repeat:repeat-x; background-position:bottom;" class="Heading" width="100%">Job Detail</td>
              <td valign="bottom"><img src="images/Internal_body_top_right.jpg" /></td>
            </tr>
          </tbody>
        </table></td>
    </tr>
    <tr>
      <td class="LeftRightLine" style="height:400px;" valign="top">
      <table width="92%" border="0" cellspacing="0" cellpadding="4" align="center">
          <tr>
            <td align="left" width="50%" class="TableStyle1">Job Title:&nbsp;</td>
            <td width="50%" class="TableStyle1"><?=$strJobName?></td>
          </tr>
          <tr>
            <td align="left" class="TableStyle2">Category:&nbsp;</td>
            <td class="TableStyle2"><?=$strCatName?></td>
          </tr>
           <tr>
            <td align="left" class="TableStyle1">Work type:&nbsp;</td>
            <td class="TableStyle1"><?=$strWorkType?></td>
          </tr>
          <tr>
            <td align="left" class="TableStyle2">Service:&nbsp;</td>
            <td class="TableStyle2"><?=$strServiceName?></td>
          </tr>
          <tr>
            <td align="left" class="TableStyle1">Salary Range:&nbsp;</td>
            <td class="TableStyle1"><?=$strSalaryRange?>($)</td>
          </tr>
          <tr>
            <td align="left" class="TableStyle2">Key Attribute 1:&nbsp;</td>
            <td class="TableStyle2"><?=$strKeyAttribute1?></td>
          </tr>
          <tr>
            <td align="left" class="TableStyle1">Key Attribute 2:&nbsp;</td>
            <td class="TableStyle1"><?=$strKeyAttribute2?></td>
          </tr>
          <tr>
            <td align="left" class="TableStyle2">Key Attribute 3:&nbsp;</td>
            <td class="TableStyle2"><?=$strKeyAttribute3?></td>
          </tr>
          <tr>
            <td align="left" class="TableStyle1">Key Attribute 4:&nbsp;</td>
            <td class="TableStyle1"><?=$strKeyAttribute4?></td>
          </tr>
          <tr>
            <td align="left" class="TableStyle2">Key Attribute 5:&nbsp;</td>
            <td class="TableStyle2"><?=$strKeyAttribute5?></td>
          </tr>
          <tr>
            <td align="left" class="TableStyle1">Comments:&nbsp;</td>
            <td class="TableStyle1"><?=$strComments?></td>
            
          </tr>
          <? if($strDescriptionFile!='') { ?>
          <tr>
            <td align="left" class="TableStyle2">Description File:&nbsp;</td>
            <td class="TableStyle2"><a href="JobDescFile.php?Name=<?=$strDescriptionFile?>">Download File</a></td>
          </tr>
          <? } ?>
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
