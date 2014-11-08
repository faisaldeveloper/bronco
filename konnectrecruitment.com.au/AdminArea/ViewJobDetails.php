<?php
include("../Includes/BackOfficeIncludesFiles.php");

if(isset($_REQUEST['hdnJobId']) && !empty($_REQUEST['hdnJobId'])) 
	$nJobId=$_REQUEST['hdnJobId'];
	$objJob->m_npkJobId=$nJobId;
	$rsJobs=$objJob->GetJobById();
	if($rsJobs!=FALSE)
	{
		$rowJobDetail=mysql_fetch_object($rsJobs);
		$strJobName=$rowJobDetail->JobTitle;
		$strSalaryRange=$rowJobDetail->SalaryRange;
		$strDescriptionFile=$rowJobDetail->DescriptionFile;
	    $nServicesId=$rowJobDetail->fkServicesId;
		$objServices->m_npkServiceId=$nServicesId;
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
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?=CONST_BACKOFFICE_TITLE?>Page Layouts<?=CONST_BACKOFFICE_TITLE_END?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="websitebuilder.css" rel="stylesheet" type="text/css">
<script src="../Script/JavaScript.js"></script>
<link href="AdminArea.css" rel="stylesheet" type="text/css">
<script language="javascript">
</script>
</head>
<body topmargin="0">
<table width="100%" border="0" cellspacing="0" cellpadding="2" bgcolor="#FFFFFF" bordercolor="#FFFFFF">
  <tr>
    <td class="hdng_sandy">Job Details</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="98%" border="0" cellspacing="0" cellpadding="4" align="center">
      <tr class="bg_ltGrey">
        <td align="left" width="50%"  class="brdr_dotedLt">Job Title:&nbsp;</td>
        <td width="50%"  class="brdr_dotedLt"><?=$strJobName?></td>
      </tr>
      <tr class='bg_ltGreen'>
        <td align="left" class="brdr_dotedLt">Category:&nbsp;</td>
        <td class='brdr_dotedLt'><?=$strCatName?></td>
      </tr>
      <tr class="bg_ltGrey">
            <td align="left" class="brdr_dotedLt">Work type:&nbsp;</td>
            <td class="brdr_dotedLt"><?=$strWorkType?></td>
      </tr>
      <tr class="bg_ltGreen">
        <td align="left"  class="brdr_dotedLt">Service:&nbsp;</td>
        <td  class="brdr_dotedLt"><?=$strServiceName?></td>
      </tr>
      <tr class='bg_ltGrey'>
        <td align="left" class='brdr_dotedLt'>Salary Range&nbsp;</td>
        <td class='brdr_dotedLt'><?=$strSalaryRange?>($)</td>
      </tr>
      <tr class="bg_ltGreen">
        <td align="left"  class="brdr_dotedLt">Key Attribute 1&nbsp;</td>
        <td  class="brdr_dotedLt"><?=$strKeyAttribute1?></td>
      </tr>
      <tr class='bg_ltGrey'>
        <td align="left" class='brdr_dotedLt'>Key Attribute 2&nbsp;</td>
        <td class='brdr_dotedLt'><?=$strKeyAttribute2?></td>
      </tr>
      <tr class="bg_ltGreen">
        <td align="left"  class="brdr_dotedLt">Key Attribute 3&nbsp;</td>
        <td  class="brdr_dotedLt"><?=$strKeyAttribute3?></td>
      </tr>
      <tr class='bg_ltGrey'>
        <td align="left"  class='brdr_dotedLt'>Key Attribute 4&nbsp;</td>
        <td  class='brdr_dotedLt'><?=$strKeyAttribute4?></td>
      </tr>
      <tr class="bg_ltGreen">
        <td align="left"  class="brdr_dotedLt">Key Attribute 5&nbsp;</td>
        <td  class="brdr_dotedLt"><?=$strKeyAttribute5?></td>
      </tr>
      <tr class='bg_ltGrey'>
        <td align="left" class='brdr_dotedLt'>Comments&nbsp;</td>
        <td class='brdr_dotedLt'><?=$strComments?></td>
      </tr>
       <? if($strDescriptionFile!='') { ?>
      <tr class="bg_ltGreen">
            <td align="left"  class="brdr_dotedLt">Description File&nbsp;</td>
            <td  class="brdr_dotedLt"><a href="JobDescFile.php?Name=<?=$strDescriptionFile?>">Download File</a></td>
      </tr>
      <? } ?>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</body>