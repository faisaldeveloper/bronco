<?php
include("../Includes/BackOfficeIncludesFiles.php");
if(isset($_REQUEST['hdnEmpId']) && !empty($_REQUEST['hdnEmpId'])) 
	$nEmpId=$_REQUEST['hdnEmpId'];
	$objJob->m_nfkEmpId=$nEmpId;
	$rsJobs=$objJob->GetJobByEmpId();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?><?=CONST_BACKOFFICE_TITLE_END?></title>
<!-- InstanceEndEditable -->
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
<LINK REL="SHORTCUT ICON" HREF="Images/favicon.ico">

<link href="AdminArea.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="98%"  border="0" align="center" cellpadding="0" cellspacing="0" class="MailTableBGColor">
  <tr>
    <td colspan="2"><?php $nIsLoginTemplate = 0; include("Header.php");?></td>
  </tr>
  <tr>
    <td width="17%" align="left" valign="top" class="TabBorderLightGreyBG"><?php include("LeftPanel.php");?></td>
    <td width="83%" height="500" align="left" valign="top">
	<!-- InstanceBeginEditable name="body" -->
    <table width="100%" border="0" cellspacing="0" cellpadding="2" align="center">
    <tr>
    <td align="right"></td>
    <tr>
    <tr>
      <td align="right"><a href="ManageEmployee.php">&lt;&lt;back</a></td></tr>
    <tr>
    <td class="hdng_sandy">View Jobs</td></tr>
    
    <tr>
    <td></td></tr>
    <tr>
    <td>
    <table width="98%" border="0" cellspacing="0" cellpadding="2" align="center">
	      <tr>
	        <td  class="TabHeading">Job Name</td>
             <td  class="TabHeading">Salary Range</td>
              <td  class="TabHeading" colspan="3" width="30%">Action</td>
	        </tr>
            <?
			$sr=1;
			if($rsJobs!=FALSE)
			{
				while($rowJob=mysql_fetch_object($rsJobs))
				{
					$nJobId=$rowJob->pkJobId;
					$nEmpId=$rowJob->fkEmpId;
					$strJobName=$rowJob->JobTitle;
					$strSalaryRange=$rowJob->SalaryRange;
			?>
	      <tr <?php 
				if($sr % 2 == 0)
				{
					echo "class='bg_ltGrey' onMouseOver=\"this.className='bg_rollOver'\" onMouseOut=\"this.className='bg_ltGrey'\""; 
				}
				else
				{
				echo " class='bg_ltGreen' onMouseOver=\"this.className='bg_rollOver'\" onMouseOut=\"this.className='bg_ltGreen'\"" ;
				}
			   ?>>
	        <td class="brdr_dotedLt"><?=$strJobName?></td>
            <td class="brdr_dotedLt"><?=$strSalaryRange?>($)</td>
            <td class="brdr_dotedLt">
            <a href="#" target="_blank" onclick="window.open('ViewJobDetails.php?hdnJobId=<?=$nJobId?>','','scrollbars=1,width=800,height=400'); return false;">
           View Detail</a></td>
           <td class="brdr_dotedLt">
           <?php
           $objJobSeekerJob->m_nfkJobId = $nJobId;
			$rsJob_JobSeekers = $objJobSeekerJob->GetJobSeekerJobByJobId();
			$nTotalJobSeeker = 0;
			if($rsJob_JobSeekers!=FALSE && mysql_num_rows($rsJob_JobSeekers)>0)
				$nTotalJobSeeker = mysql_num_rows($rsJob_JobSeekers);
		   ?>
            <a href="ViewJobSeekers.php?hdnJobId=<?=$nJobId?>" target="_blank" >
           View JobSeekers(<?=$nTotalJobSeeker?>)</a></td>
           <td class="brdr_dotedLt"><a href="DeleteJob.php?hdnJobId=<?=$nJobId?>&hdnEmpId=<?=$nEmpId?>" onClick="return window.confirm('Are you sure to delete this job');">Remove</a></td>
	        </tr>
            <? $sr++; }
			
			}
			?>
	      </table>
          </td>
        </tr>
      </table>
	<!-- InstanceEndEditable -->
    </td>	
  </tr>
  <tr>
    <td colspan="2"><?php include("Footer.php");?></td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>