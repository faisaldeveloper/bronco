<?php
session_start();
include("../Includes/BackOfficeIncludesFiles.php");
if(isset($_REQUEST['hdnJobId']) && !empty($_REQUEST['hdnJobId'])) 
	$nJobId=$_REQUEST['hdnJobId'];
 $objJobSeekerJob->m_nfkJobId = $nJobId;
$rsJob_JobSeekers = $objJobSeekerJob->GetJobSeekerJobByJobId();

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?><?=CONST_BACKOFFICE_TITLE_END?></title>
<script language="javascript" type="text/javascript">
function ShowHideJobSeekerDiv(d)
{
	var dd = document.getElementById("div_"+d);
	var ddimg = document.getElementById("img_"+d);
	if(dd.style.display=="block")
	{
		dd.style.display= "none";
		ddimg.src = "../images/02_icon.jpg";
	}
	else
	{
		ddimg.src = "../images/01_icon.jpg";
		dd.style.display= "block";
	}
}
</script>
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
    <table width="98%" border="0" cellspacing="0" cellpadding="4" align="center">
     <tr>
    <td class="hdng_sandy" colspan="4">View JobSeekers</td></tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr><td width="2%" class="TabHeading">&nbsp;</td><td class="TabHeading">Name</td><td class="TabHeading">Email</td><td class="TabHeading">Resume</td></tr>
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
				$strClass ="class='bg_ltGrey' onMouseOver=\"this.className='bg_rollOver'\" onMouseOut=\"this.className='bg_ltGrey'\"";
			else
				$strClass = "class='bg_ltGreen' onMouseOver=\"this.className='bg_rollOver'\" onMouseOut=\"this.className='bg_ltGreen'\"";
  ?>
  <tr <?=$strClass?>>
  <td width="2%"><img src="../images/02_icon.jpg" id="img_<?=$RowJobSeeker->pkJobSeekerId?>" onclick="ShowHideJobSeekerDiv('<?=$RowJobSeeker->pkJobSeekerId?>')"></td>
    <td  ><?=$strJobSeekerName?></td>
    <td><?=$strJobSeekerEmail?></td>
    <td width="20%"><a href="JobSeekerResumeFile.php?Name=<?=$rowJob_JobSeekers->ResumeFile?>">Resume</a></td>
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
  <tr class="bg_ltGrey">
    <td>Name</td>
    <td><?=$rowJobSeeker->Name?></td>
  </tr>
   <tr class="bg_ltGreen">
    <td>Email</td>
    <td><?=$rowJobSeeker->Email?></td>
  </tr>
   <tr class="bg_ltGrey">
    <td>SubRub</td>
    <td><?=$rowJobSeeker->SubRub?></td>
  </tr>
  <tr class="bg_ltGreen">
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
	<!-- InstanceEndEditable -->
    </td>	
  </tr>
  <tr>
    <td colspan="2"><?php include("Footer.php");?></td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>