<?php
session_start();
include_once("Includes/FrontIncludes.php");	
include("Includes/EmpSecurity.php");
if(isset($_REQUEST['hdnJobId']) && !empty($_REQUEST['hdnJobId'])) 
	$nJobId=$_REQUEST['hdnJobId'];
 $objJobSeekerJob->m_nfkJobId = $nJobId;
$rsJob_JobSeekers = $objJobSeekerJob->GetJobSeekerJobByJobId();

?>
<script type="text/javascript" src="Script/JavaScript.js"></script>
<?php $objTheme->GenerateStyleSheet();?>
<link href="cms.css" rel="stylesheet" type="text/css">
<script language="javascript" type="text/javascript">
function ShowHideJobSeekerDiv(d)
{
	var dd = document.getElementById("div_"+d);
	var ddimg = document.getElementById("img_"+d);
	if(dd.style.display=="block")
	{
		dd.style.display= "none";
		ddimg.src = "images/02_icon.jpg";
	}
	else
	{
		ddimg.src = "images/01_icon.jpg";
		dd.style.display= "block";
	}
}
</script>
<table width="98%" align="center" border="0" cellpadding="0" cellspacing="0">
  <tbody>
   <tr><td height="5"></td></tr>
    <tr>
      <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td valign="bottom" width="38"><img src="images/Internal_body_top_left.jpg" /></td>
              <td style="background-image:url(images/Internal_body_top_bg.jpg); background-repeat:repeat-x; background-position:bottom;" class="Heading" width="100%">List of JobSeekers Applied For Job</td>
              <td valign="bottom"><img src="images/Internal_body_top_right.jpg" /></td>
            </tr>
          </tbody>
        </table></td>
    </tr>
    <tr>
      <td class="LeftRightLine" style="height:400px;" valign="top">
      <table width="92%" border="0" cellspacing="0" cellpadding="4" align="center">
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr><td width="2%" class="TabHead">&nbsp;</td><td class="TabHead">Name</td><td class="TabHead">Email</td><td class="TabHead">Resume</td></tr>
  <?php 
  if($rsJob_JobSeekers!=FALSE && mysql_num_rows($rsJob_JobSeekers))
  {
	  $nRowCounter = 0;
	  while($rowJob_JobSeekers = mysql_fetch_object($rsJob_JobSeekers))
	  {
		  
		  $objJobSeeker->m_npkJobSeekerId =  $rowJob_JobSeekers->fkJobSeekerId;
		  $rsJobSeeker = $objJobSeeker->GetJobSeekerById();
		  if($rsJobSeeker!=FALSE && mysql_num_rows($rsJobSeeker)>0)
		  {
			  $RowJobSeeker = mysql_fetch_object($rsJobSeeker);
			  $strJobSeekerName = $RowJobSeeker->Name;
			  $strJobSeekerEmail = $RowJobSeeker->Email;
		  }
		  else
		  {
			   $strJobSeekerName = "";
			  $strJobSeekerEmail = "";
		  }
			if($nRowCounter%2==0)
				$strClass = 'class="TableStyle1"';
			else
				$strClass = 'class="TableStyle2"';
  ?>
  <tr >
   <td width="2%" <?=$strClass?>><img src="images/02_icon.jpg" id="img_<?=$RowJobSeeker->pkJobSeekerId?>" onclick="ShowHideJobSeekerDiv('<?=$RowJobSeeker->pkJobSeekerId?>')"></td>
    <td <?=$strClass?> onclick="ShowHideJobSeekerDiv('div_<?=$RowJobSeeker->pkJobSeekerId?>')">
	
	<?=$strJobSeekerName?></td>
    <td <?=$strClass?>><?=$strJobSeekerEmail?></td>
    <td <?=$strClass?> width="20%"><a href="JobSeekerResumeFile.php?Name=<?=$rowJob_JobSeekers->ResumeFile?>">Resume</a></td>
  </tr>
  <tr><td colspan="4">
  <div id="div_<?=$RowJobSeeker->pkJobSeekerId?>" style="display:none;">
   <table width="100%" border="0" cellspacing="0" cellpadding="2" align="center">
  <?php 
  
  if($rsJobSeeker!=FALSE && mysql_num_rows($rsJobSeeker)>0)
  {
	  mysql_data_seek($rsJobSeeker,0);
	  $rowJobSeeker = mysql_fetch_object($rsJobSeeker);
  ?>
  <tr class="TableStyle1">
    <td>Name</td>
    <td><?=$rowJobSeeker->Name?></td>
  </tr>
   <tr class="TableStyle2">
    <td>Email</td>
    <td><?=$rowJobSeeker->Email?></td>
  </tr>
   <tr class="TableStyle1">
    <td>SubRub</td>
    <td><?=$rowJobSeeker->SubRub?></td>
  </tr>
  <tr class="TableStyle2">
    <td>Picture</td>
    <td><img src="JobSeekerPic.php?Name=<?=$rowJobSeeker->Picture?>" height="100" width="100"></td>
  </tr>
  <?php
  		
  }
  ?>
</table>
  
  </div>
  
  </td></tr>
  <?php
  			$nRowCounter++;
	  }
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