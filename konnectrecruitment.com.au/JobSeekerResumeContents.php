<?php
include("Includes/FrontIncludes.php");
session_start();

include("Includes/Labels.php");
$nLangId = $_SESSION['intLangId'];
if(isset($_REQUEST['hdnJobId'])&& !empty($_REQUEST['hdnJobId']))
{
	$nJobId = $_REQUEST['hdnJobId'];
}
	
$rsType = $objEmployeer->GetAllWorkType();
$rsCat = $objCategory->GetAllCategories();
?>
<script language="javascript">
function submitForm(frm)
{
	
		if(frm.txtJobSeekName.value == '')
		{
			alert("Please enter full name Name!");
			frm.txtJobSeekName.focus();
			return false;
		}
		
		else if(frm.txtJobSeekerEmail.value == '')
		{
			alert("Please enter email!");
			frm.txtJobSeekerEmail.focus();
			return false;
		}
		
 		else if ((frm.txtJobSeekerEmail.value.length < 1)||(frm.txtJobSeekerEmail.value.indexOf("@") == -1)  || (frm.txtJobSeekerEmail.value.indexOf(".")==-1)|| (frm.txtJobSeekerEmail.value.indexOf(".")==0) || (frm.txtJobSeekerEmail.value.indexOf("@")==0) || (frm.txtJobSeekerEmail.value.indexOf("@")==frm.txtJobSeekerEmail.value.length-1) || (frm.txtJobSeekerEmail.value.indexOf(".")==frm.txtJobSeekerEmail.value.length-1)||(frm.txtJobSeekerEmail.value.indexOf("@")!=frm.txtJobSeekerEmail.value.lastIndexOf("@")) || ((frm.txtJobSeekerEmail.value.indexOf("@") > frm.txtJobSeekerEmail.value.lastIndexOf("."))) || ((frm.txtJobSeekerEmail.value.indexOf(".")+1)==frm.txtJobSeekerEmail.value.indexOf("@")) || ((frm.txtJobSeekerEmail.value.indexOf("@")+1)==frm.txtJobSeekerEmail.value.indexOf(".")))
		{
			alert("Please enter valid Email!");
			frm.txtJobSeekerEmail.focus();
			return false
		}
		else if(frm.flJobSeekerResume.value == '')
		{
			alert("Please upload Resume!");
			frm.flJobSeekerResume.focus();
			return false;
		}
		else if(frm.flJobSeekerPic.value == '')
		{
			alert("Please upload picture!");
			frm.flJobSeekerPic.focus();
			return false;
		}
}
</script>

<table width="98%" align="left" border="0" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td valign="bottom" width="38"><img src="images/Internal_body_top_left.jpg" /></td>
              <td style="background-image:url(images/Internal_body_top_bg.jpg); background-repeat:repeat-x; background-position:bottom;" class="Heading" width="100%">Submit Resume</td>
              <td valign="bottom"><img src="images/Internal_body_top_right.jpg" /></td>
            </tr>
          </tbody>
        </table></td>
    </tr>
    <tr>
      <td class="LeftRightLine" style="background-image:url(images/body_bg.jpg); background-repeat:repeat-x; text-align:justify; height:400px;" valign="top"><table width="92%" border="0" cellspacing="0" cellpadding="2" align="center">
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Please include the following information to submit  your resume. If you would like to include a brief cover letter, you may do so  in the text area below.</td>
          </tr>
          <tr>
            <td><form id="frmJobSeeker" name="frmJobSeeker" enctype="multipart/form-data" method="post" action="JobSeekerResumAction.php" onsubmit="return submitForm(this)">
                <table width="98%" border="0" cellspacing="0" cellpadding="4" align="center">
                  <tr>
                    <td align="right" class="TableStyle1">Work type : </td>
                    <td class="TableStyle1">
					<? if($_REQUEST['hdnDo']==1) { ?>
					<select name="lstWorkType" id="lstWorkType">
                     	<option value="0">Any</option>
                        <?
					if($rsType!=FALSE)
					{
						while($rowType = mysql_fetch_object($rsType))
						{
						 	$nTypeId = $rowType->pkTypeId;
						    $strWorkType = $rowType->WorkType;
					?>
					 <option  value="<?=$nTypeId?>" <? if($nTypeId==$nWorkTypeId) echo "selected"; ?>><?=$strWorkType?></option>
				<?	    }
					} ?>
                    </select>
                    <?
					}
					else if(isset($_REQUEST['hdnWorkType'])) echo $_REQUEST['hdnWorkType']; ?></td>
                  </tr>
                  <tr>
                    <td align="right" class="TableStyle2">Category : </td>
                    <td class="TableStyle2">
                    <? if($_REQUEST['hdnDo']==1) { ?>
					<select name="lstCatSearch" id="lstCatSearch">
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
                    </select>
					<? 
					}
					else if(isset($_REQUEST['hdnCatagory'])) echo $_REQUEST['hdnCatagory'];?>
                    
             </td>
                  </tr>
                  <tr>
                    <td align="right" class="TableStyle1">Please enter your full name:&nbsp;</td>
                    <td class="TableStyle1"><input type="text" name="txtJobSeekName" id="txtJobSeekName" /></td>
                  </tr>
                  <tr>
                    <td align="right" class="TableStyle2">Please enter your e-mail address:&nbsp;</td>
                    <td class="TableStyle2"><input type="text" name="txtJobSeekerEmail" id="txtJobSeekerEmail" /></td>
                  </tr>
                  <tr>
                    <td align="right" class="TableStyle1">Attach your resume in Word format here:&nbsp;</td>
                    <td class="TableStyle1"><input type="file" name="flJobSeekerResume" id="flJobSeekerResume" /></td>
                  </tr>
                  <tr>
                    <td align="right" class="TableStyle2">Enter your cover letter here.&nbsp;(optional)&nbsp;</td>
                    <td class="TableStyle2"><textarea name="txrJobSeekerCLetter" id="txrJobSeekerCLetter" cols="45" rows="5"></textarea></td>
                  </tr>
                  <tr>
                    <td align="right" class="TableStyle1">Please select your suburb:&nbsp;</td>
                    <td class="TableStyle1"><input type="text" name="txtJobSeekerSubrub" id="txtJobSeekerSubrub" /></td>
                  </tr>
                  <tr>
                    <td align="right" class="TableStyle2">Please upload your picture:&nbsp;</td>
                    <td class="TableStyle2"><input type="file" name="flJobSeekerPic" id="flJobSeekerPic" /></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>
                    <input type="hidden" name="hdnJobId" id="hdnJobId" value="<?=$nJobId?>" />
                    <input type="submit" name="btnSubmit" class="button" id="btnSubmit" value="Submit" /></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                </table>
            </form></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
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
