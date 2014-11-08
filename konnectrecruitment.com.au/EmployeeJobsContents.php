<?php
session_start();
include("Includes/EmpSecurity.php");
if(isset($_SESSION['EmpId']) && !empty($_SESSION['EmpId'])) 
	$nEmpId=$_SESSION['EmpId'];
	$objJob->m_nfkEmpId=$nEmpId;
	$rsJobs=$objJob->GetJobByEmpId();
?>

<table width="98%" align="left" border="0" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td valign="bottom" width="38"><img src="images/Internal_body_top_left.jpg" /></td>
              <td style="background-image:url(images/Internal_body_top_bg.jpg); background-repeat:repeat-x; background-position:bottom;" class="Heading" width="100%">Employee Posted Jobs</td>
              <td valign="bottom"><img src="images/Internal_body_top_right.jpg" /></td>
            </tr>
          </tbody>
        </table></td>
    </tr>
    <tr>
      <td class="LeftRightLine" style="background-image:url(images/body_bg.jpg); background-repeat:repeat-x; text-align:justify; height:400px;" valign="top">
<table width="92%" border="0" cellspacing="0" cellpadding="2" align="center">
	      <tr>
	        <td>&nbsp;</td>
	        <td>&nbsp;</td>
	        <td>&nbsp;</td>
          </tr>
          <tr><td colspan="3">No of jobs posted by you(<?=mysql_num_rows($rsJobs)?>)</td></tr>
	      <tr>
	        <td  class="TabHead">Job Name</td>
             <td  class="TabHead" width="40%">Salary Range</td>
              <td  class="TabHead" width="30%">Action</td>
              <td  class="TabHead" width="10%">Total Cvs</td>
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
	      <tr class="<?php if($sr%2==0){?>TableStyle1<?php }else{?>TableStyle2<?php }?>">
	        <td class="brdr_dotedLt"><?=$strJobName?></td>
            <td class="brdr_dotedLt" width="40%"><?=$strSalaryRange?>($)</td>
            <td class="brdr_dotedLt" width="30%"><a href="#" target="_blank" onclick="window.open('JobDetailsContents.php?hdnJobId=<?=$nJobId?>','','scrollbars=1,width=800,height=600'); return false;">Job Detail</a>&nbsp;&nbsp;<a href="#" target="_blank" onclick="window.open('ViewJobSeekerResumeContents.php?hdnJobId=<?=$nJobId?>','','scrollbars=1,width=800,height=600'); return false;">JobSeekers</a></td>
            <td><?php
            $objJobSeekerJob->m_nfkJobId = $nJobId;
$rsJob_JobSeekers = $objJobSeekerJob->GetJobSeekerJobByJobId();
if($rsJob_JobSeekers!=FALSE)
	echo mysql_num_rows($rsJob_JobSeekers);
			
			?></td>
	        </tr>
            <? $sr++;}
			
			}
			?>
	      </table>
          </td>
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