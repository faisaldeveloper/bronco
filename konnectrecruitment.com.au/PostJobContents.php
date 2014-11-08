<?php
include("Includes/EmpSecurity.php");

?>
<script language="javascript" type="text/javascript">
function FormValidation(f)
{
	if(f.txtVacancyName.value=="")
	{
		alert("Please Enter Vacancy Name");
		f.txtVacancyName.focus();
		return false;
	}
	if(f.txtKeyAttributes1.value=="")
	{
		alert("Please Enter Key Attribute 1");
		f.txtKeyAttributes1.focus();
		return false;
	}
	if(f.txtKeyAttributes2.value=="")
	{
		alert("Please Enter Key Attribute 2");
		f.txtKeyAttributes2.focus();
		return false;
	}
	if(f.txtKeyAttributes3.value=="")
	{
		alert("Please Enter Key Attribute 3");
		f.txtKeyAttributes3.focus();
		return false;
	}
	if(f.txtKeyAttributes4.value=="")
	{
		alert("Please Enter Key Attribute 4");
		f.txtKeyAttributes4.focus();
		return false;
	}
	if(f.txtKeyAttributes5.value=="")
	{
		alert("Please Enter Key Attribute 5");
		f.txtKeyAttributes5.focus();
		return false;
	}
	if(f.txtSalaryLow.value=="")
	{
		alert("Please Enter Minimum Salary");
		f.txtSalaryLow.focus();
		return false;
	}
	if(f.txtSalaryHigh.value=="")
	{
		alert("Please Enter Maximum Salary");
		f.txtSalaryHigh.focus();
		return false;
	}
	if(parseInt(f.txtSalaryLow.value)<=0)
	{
		alert("Please Enter valid Maximum Salary");
		f.txtSalaryLow.focus();
		return false;
	}
	if(parseInt(f.txtSalaryHigh.value)<=0 || parseInt(f.txtSalaryHigh.value)<=parseInt(f.txtSalaryLow.value))
	{
		alert("Please Enter Valid Maximum Salary");
		f.txtSalaryHigh.focus();
		return false;
	}
	if(f.lstCat.value==0)
	{
		alert("Please Select Category");
		f.lstCat.focus();
		return false;
	}
	/*if(f.flJobDescFile.value=="")
	{
		alert("Please Select Job Desc File");
		f.flJobDescFile.focus();
		return false;
	}*/
	if(f.chk_Terms_Cond.value=="")
	{
		alert("Please Accept Terms and Condition");
		f.chk_Terms_Cond.focus();
		return false;
	}
	return true;
}
function BtnEnabler()
{
	var chk = document.getElementById('chk_Terms_Cond');
	var btn = document.getElementById('btnPostJob');
	if(chk.checked==true)
	{
		btn.className = "button";
		btn.disabled = false;
	}
	else
	{
		btn.className = "";
		btn.disabled = true;
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
              <td style="background-image:url(images/Internal_body_top_bg.jpg); background-repeat:repeat-x; background-position:bottom;" class="Heading" width="100%">
              <table width="100%" border="0" cellpadding="0" cellspacing="0"> 
              <tr>
              <td>Post a Job</td>
              <td align="right"><a href="EmployeeJobs.php">  View Posted Jobs </a></td>
              </tr>
              </table>
              <td valign="bottom"><img src="images/Internal_body_top_right.jpg" /></td>
            </tr>
          </tbody>
        </table></td>
    </tr>
    <tr>
      <td class="LeftRightLine" style="background-image:url(images/body_bg.jpg); background-repeat:repeat-x; text-align:justify;"><form method="post" action="PostJobAction.php" name="frmPostJob" id="frmPostJob" enctype="multipart/form-data" onsubmit=" return FormValidation(this);">
          <table width="92%" border="0" cellspacing="0" cellpadding="4" align="center">
            <tr>
              <td colspan="2">Please list here the five key attributes you consider a necessity in all of your shortlisted candidates. These attributes are a mandatory requirement to ensure we source, screen, select, and deliver you an appropriate shortlist.</td>
            </tr>
            <tr class="TableStyle1">
              <td width="25%">Vacancy Name <span style="color:#900;">*</span></td>
              <td width="75%"><input type="text" name="txtVacancyName" id="txtVacancyName" /></td>
            </tr>
            <tr class="TableStyle2">
              <td>Key Attribute #1 <span style="color:#900;">*</span></td>
              <td><input type="text" name="txtKeyAttributes1" id="txtKeyAttributes1" /></td>
            </tr>
            <tr class="TableStyle1">
              <td>Key Attribute #2 <span style="color:#900;">*</span></td>
              <td><input type="text" name="txtKeyAttributes2" id="txtKeyAttributes2" /></td>
            </tr>
            <tr class="TableStyle2">
              <td>Key Attribute #3 <span style="color:#900;">*</span></td>
              <td><input type="text" name="txtKeyAttributes3" id="txtKeyAttributes3" /></td>
            </tr>
            <tr class="TableStyle1">
              <td>Key Attribute #4 <span style="color:#900;">*</span></td>
              <td><input type="text" name="txtKeyAttributes4" id="txtKeyAttributes4" /></td>
            </tr>
            <tr class="TableStyle2">
              <td>Key Attribute #5 <span style="color:#900;">*</span></td>
              <td><input type="text" name="txtKeyAttributes5" id="txtKeyAttributes5" /></td>
            </tr>
            <tr class="TableStyle1">
              <td>Salary Range (Low) $ <span style="color:#900;">*</span></td>
              <td><input type="text" name="txtSalaryLow" id="txtSalaryLow" /></td>
            </tr>
            <tr class="TableStyle2">
              <td>Salary Range (High) $ <span style="color:#900;">*</span></td>
              <td><input type="text" name="txtSalaryHigh" id="txtSalaryHigh" /></td>
            </tr>
            <tr class="TableStyle1">
              <td>Category <span style="color:#900;">*</span></td>
              <td><select name="lstCat" id="lstCat">
              <option value="0">--SELECT--</option>
              <?php
              $rsCat = $objCategory->GetAllCategories();
			  if($rsCat!=FALSE && mysql_num_rows($rsCat)>0)
			  {
			  	while($RowCat = mysql_fetch_object($rsCat))
				{
			  ?>
              <option value="<?=$RowCat->pkCatId?>"><?=$RowCat->CatName?></option>
              <?php
				}
			  }
			  ?>
              </select></td>
            </tr>
            <tr>
                    <td class="TableStyle2" >Work type <span style="color:#900;">*</span> </td>
                    <td class="TableStyle2">
					<select name="lstWorkType" id="lstWorkType">
                     	<option value="0">--SELECT--</option>
                        <?
					$rsType = $objEmployeer->GetAllWorkType();
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
             </td>
                  </tr>
            <tr class="TableStyle1">
              <td colspan="2"><strong>Position Description</strong></td>
            </tr>
            <tr class="TableStyle2">
              <td>Upload your file</td>
              <td><input type="file" name="flJobDescFile" id="flJobDescFile" />
                (PDF, Word, and Rich Text or Plain Text format)</td>
            </tr>
            <tr class="TableStyle1">
              <td>Comments</td>
              <td><textarea name="txtComments" id="txtComments"  cols="50" rows="5"></textarea></td>
            </tr>
            <tr class="TableStyle2">
              <td colspan="2"><strong>Additional Services</strong></td>
            </tr>
            <tr class="TableStyle1">
              <td colspan="2">Please  tick the boxes to confirm your interest in using any additional services. We  will contact you to discuss further.</td>
            </tr>
            <tr class="TableStyle2">
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <?php
  					$rsServices =  $objServices->GetParentServices();
					if($rsServices!=FALSE && mysql_num_rows($rsServices)>0)
					{
						while($RowServices = mysql_fetch_object($rsServices))
						{
 				 ?>
                  <tr>
                    <td colspan="2"><b><?=$RowServices->ServiceTitle ?></b><br /><table width="100%" border="0" cellspacing="0" cellpadding="4">
                    <?php 
					$objServices->m_nfkParentId = $RowServices->pkServiceId;
					$rsSubServices =  $objServices->GetServicesByParentId();
					if($rsSubServices!=FALSE && mysql_num_rows($rsSubServices)>0)
					{
						while($RowSubServices = mysql_fetch_object($rsSubServices))
						{
					?>
   <tr>
                    <td width="5%"><input type="checkbox" name="chk_Services[]" value="<?=$RowSubServices->pkServiceId?>" /></td>
                    <td><?=$RowSubServices->ServiceTitle?></td>
                  </tr>
                  <?php
						}
					}
				  ?>
</table>
</td>
                  </tr>
                  <?
						}
					}
  					?>
                </table></td>
            </tr>
            <tr class="TableStyle1">
              <td colspan="2"><strong>Terms and Conditions</strong></td>
            </tr>
            <tr class="TableStyle2">
              <td colspan="2"><input type="checkbox" name="chk_Terms_Cond" id="chk_Terms_Cond" onclick="BtnEnabler();" />
                &nbsp;&nbsp;I have read and agree to  the <a href="http://www.aspirehcm.com/services-shortlist-solutions-terms-and-conditions" target="_blank">Terms and Conditions</a>.</td>
            </tr>
            <tr>
              <td colspan="2" align="right"><input type="submit" value="&nbsp;Post Job&nbsp;" disabled="disabled"  id="btnPostJob" /></td>
            </tr>
          </table>
        </form></td>
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
