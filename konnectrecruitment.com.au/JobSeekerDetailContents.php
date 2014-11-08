<?php
session_start();
include_once("Includes/FrontIncludes.php");	
include("Includes/EmpSecurity.php");
if(isset($_REQUEST['hdnJobSeekerId']) && !empty($_REQUEST['hdnJobSeekerId'])) 
	$nJobSeekerId=$_REQUEST['hdnJobSeekerId'];
$objJobSeeker->m_npkJobSeekerId = $nJobSeekerId;
$rsJobSeeker  = $objJobSeeker->GetJobSeekerById();

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
        <td >&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr><td class="TabHead" colspan="2">JobSeeker Detail</td></tr>
  <?php 
  if($rsJobSeeker!=FALSE && mysql_num_rows($rsJobSeeker)>0)
  {
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
    <td><img src="JobSeekerPic.php?Name=<?=$rowJobSeeker->Picture?>"></td>
  </tr>
  <?php
  		
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