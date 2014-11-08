<?php
session_start();
include("../Includes/BackOfficeIncludesFiles.php");
$rsJobSeekers = $objJobSeekerJob->GetAllJobSeeker();

/////////////////Get page limit set from options///////////////
$arrGlobalOptions = GetGlobalOptions();
$arrRecGlobalOptions = mysql_fetch_object($arrGlobalOptions);
$intPerPage = $arrRecGlobalOptions->RowsPerPage;
//////
	if(isset($_REQUEST['intPage']))		//Getting Page No
		$intPage=$_REQUEST['intPage'];
	else
		$intPage=1; 			//Default Page is one
	if($rsJobSeekers != false && mysql_num_rows($rsJobSeekers))
	$intTotalReturned = mysql_num_rows($rsJobSeekers); 	//Total Records
	else $intTotalReturned = 0;
	$intPageCount = ceil($intTotalReturned/$intPerPage);   //Total Pages formed
	if($intPageCount<$intPage)
	$intPage--;
	if($intPage==1) //Setting records Limit from 0 for ist page
		$intRecordStart = $intPage-1; 
	else 			//Calculate records start for other page	
		$intRecordStart = ($intPage-1)*$intPerPage; 
	  ///////////////////////***************End***************/////////////////////////
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
	$nRowCounter = 0;
	if($rsJobSeekers!=FALSE && mysql_num_rows($rsJobSeekers)>0)
	{
		mysql_data_seek($rsJobSeekers, $intRecordStart);
		for($i=0; $i<$intPerPage;$i++) 
		 if($RowJobSeeker=mysql_fetch_object($rsJobSeekers))
		   {
			if($nRowCounter%2==0)
				$strClass ="class='bg_ltGrey' onMouseOver=\"this.className='bg_rollOver'\" onMouseOut=\"this.className='bg_ltGrey'\"";
			else
				$strClass = "class='bg_ltGreen' onMouseOver=\"this.className='bg_rollOver'\" onMouseOut=\"this.className='bg_ltGreen'\"";
  ?>
  <tr <?=$strClass?>>
  <td width="2%"><img src="../images/02_icon.jpg" id="img_<?=$RowJobSeeker->pkJobSeekerId?>" onclick="ShowHideJobSeekerDiv('<?=$RowJobSeeker->pkJobSeekerId?>')"></td>
    <td><?=$RowJobSeeker->Name?></td>
    <td><?=$RowJobSeeker->Email?></td>
    <td width="20%"><a href="../JobSeekerResumeFile.php?Name=<?=$RowJobSeeker->ResumeFile?>">Resume</a></td>
  </tr>
  <tr><td colspan="4">
  <div id="div_<?=$RowJobSeeker->pkJobSeekerId?>" style="display:none;">
   <table width="100%" border="0" cellspacing="0" cellpadding="2" align="center">
  <tr class="bg_ltGrey">
    <td>Name</td>
    <td><?=$RowJobSeeker->Name?></td>
  </tr>
   <tr class="bg_ltGreen">
    <td>Email</td>
    <td><?=$RowJobSeeker->Email?></td>
  </tr>
   <tr class="bg_ltGrey">
    <td>SubRub</td>
    <td><?=$RowJobSeeker->SubRub?></td>
  </tr>
  <tr class="bg_ltGreen">
    <td>Picture</td>
    <td><img src="JobSeekerPic.php?Name=<?=$RowJobSeeker->Picture?>" height="100" width="100"></td>
  </tr>
</table>
  
  </div>
  
  </td></tr>
  <?php
  			$nRowCounter++;
	  }
	 ?>
    <tr>
		<td colspan="3"><? print GeneralPaging($intPage,$intPageCount,$strQueryStr);?></td>
	</tr>

     <?
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