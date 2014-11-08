<?php
include("../Includes/BackOfficeIncludesFiles.php");
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=47;
if($objAdminUser->CheckRightForAdmin()==1)
{
/**
Creating class objects
**/
$objNews = new clsNews();
$objLang = new clsLanguage();
$nDefaultLang = $objLang->GetDefaultLang();
$_SESSION['intLangId']= $nDefaultLang;
$intModuleID = $_REQUEST['hdnModuleId'];
$strGalleryName = $objNews->GetGalleryName($intModuleID);

//echo "Module id----in add news----".$pkModuleID; exit;
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?>Add News<?=CONST_BACKOFFICE_TITLE_END?></title>
<?php include("TinyExact.php"); ?>
<script language="JavaScript" type="text/javascript" src="EditorFiles/richtext.php"></script>
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
			<script language="javascript">

			function Validate(f)
			{
				if(f.txtNewsTitle.value=="")
				{
					alert("Please enter title");
					f.txtNewsTitle.focus();
					return false;
				}
				if(f.lstDay.value=="")
				{
					alert("Please enter from day");
					f.lstDay.focus();
					return false;
				}
				if(f.lstMonth.value=="")
				{
					alert("Please enter from motnh");
					f.lstMonth.focus();
					return false;
				}
				if(f.lstYear.value=="")
				{
					alert("Please enter from year");
					f.lstYear.focus();
					return false;
				}
				if(f.lstEDay.value=="")
				{
					alert("Please enter to day");
					f.lstEDay.focus();
					return false;
				}
				if(f.lstEMonth.value=="")
				{
					alert("Please enter to motnh");
					f.lstEMonth.focus();
					return false;
				}
				if(f.lstEYear.value=="")
				{
					alert("Please enter to year");
					f.lstEYear.focus();
					return false;
				}
				if(f.txrShortDesc.value=="")
				{
					alert("Please enter short description");
					f.txrShortDesc.focus();
					return false;
				}
			return true;
			}
		 </script>
         <br>
          <table width="99%"  border="0" align="center" cellpadding="2" cellspacing="0">
		  <?
		  if($objAdminUser->CheckRightForAdmin()!=1)
			{
			?>
            <tr>
              <td class="txtBld_ornge">You are not authorised to view this page. <a href="<?=$_SERVER['HTTP_REFERER']?>"><< Back </a></td>
            </tr>
			<?
			}
			else {
			?>
            <tr>
              <td><a href="ManageNews.php?hdnModuleId=<?=$intModuleID?>"><span class="txtBld_ornge">News Manager</span></a>&nbsp;&gt;&gt;&nbsp;<span class="hdng_sandy">Add New News (<?=$strGalleryName?>)</span></td>
            </tr>
            <tr>
              <td align="center"><? include('../Includes/DisplayConfirmMessage.php');?>&nbsp;</td>
            </tr>
            <tr>
              <td><form action="AddNewsAction.php" method="post" enctype="multipart/form-data" name="form1" onSubmit="return Validate(this)">
                  <table width="100%"  border="0" cellpadding="2" cellspacing="2" class="TabBorderLightGreyBG">
                    <tr>
                      <td align="left" class="txtBld_grn"> Title<span class="txt_red">*</span></td>
                      <td colspan="3"><input name="txtNewsTitle" type="text" id="txtNewsTitle"></td>
                    </tr>
                    <tr>
                      <td align="left" class="txtBld_grn"> From Date<span class="txt_red">*</span></td>
                      <?php $d = date("d");$m = date("m");$y = date("Y");?>
                      <td width="26%">
					  
					  <select name="lstDay" id="lstDay">
                          <option value="">dd</option>
                          <?php for($i=1;$i<32;$i++){?>
                          <option value="<?php if($i<10) echo "0";echo $i?>"
			  		<?php if($i == $d) echo "selected";?>>
                          <?php if($i<10) echo "0";echo $i?>
                          </option>
                          <?php }?>
                        </select>
						
                          <select name="lstMonth" id="lstMonth">
                            <option value="">mm</option>
                            <?php for($i=1;$i<13;$i++){?>
                            <option value="<?php if($i<10) echo "0";echo $i?>"
					<?php if($i == $m) echo "selected";?>
					>
                            <?php if($i<10) echo "0";echo $i?>
                            </option>
                            <?php }?>
                          </select>
						  
                          <select name="lstYear" id="lstYear">
                            <option value="">yyyy</option>
                            <?php for($i=date("Y")-2;$i<date("Y")+10;$i++){?>
                            <option value="<?php if($i<10) echo "0";echo $i?>"
					<?php if($i == $y) echo "selected";?>>
                            <?php if($i<10) echo "0";echo $i?>
                            </option>
                            <?php }?>
                        </select>						</td>
                      <td width="11%"><span class="txtBld_grn">From Time</span></td>
					  <?php $g = date("g");$i_minute = date("i");$s = date("s");?>
						<td width="42%"><select name="lstHour" id="lstHour">
                            <option value="00">hh</option>
                            <?php for($i=0;$i<=23;$i++){?>
                            <option value="<?php if($i<10) echo "0";echo $i?>"
			  		<?php if($i == $g) echo "selected";?>>
                            <?php if($i<10) echo "0";echo $i?>
                            </option>
                            <?php }?>
                          </select>
							:
                            <select name="lstMinute" id="lstMinute">
                              <option value="00">mm</option>
							  <option value="00">00</option>
                              <?php for($i=1;$i<=59;$i++){?>
                              <option value="<?php if($i<10) echo "0";echo $i?>"
					<?php if($i == $i_minute) echo "selected";?>>
                              <?php if($i<10) echo "0";echo $i?>
                              </option>
                              <?php }?>
                            </select>
                            :
                            <select name="lstSecond" id="lstSecond">
                              <option value="0000">ss</option>
                              <?php for($i=0;$i<=59;$i++){?>
                              <option value="<?php if($i<10) echo "0";echo $i?>"
					<?php if($i == $s) echo "selected";?>
					>
                              <?php if($i<10) echo "0";echo $i?>
                              </option>
                              <?php }?>
                          </select></td>
					  </tr>
                    <tr>
                      <td align="left" class="txtBld_grn">To Date<span class="txt_red">*</span></td>
                      <td colspan="3">
					  
					  <select name="lstEDay" id="lstEDay">
                        <option value="">dd</option>
                        <?php for($i=1;$i<32;$i++){?>
                        <option value="<?php if($i<10) echo "0";echo $i?>"
			  <?php if($i == $d) echo "selected";?>
			  >
                        <?php if($i<10) echo "0";echo $i?>
                        </option>
                        <?php }?>
                      </select>
					  
                        <select name="lstEMonth" id="lstEMonth">
                          <option value="">mm</option>
                          <?php for($i=1;$i<13;$i++){?>
                          <option value="<?php if($i<10) echo "0";echo $i?>"
					<?php if($i == $m) echo "selected";?>
					>
                          <?php if($i<10) echo "0";echo $i?>
                          </option>
                          <?php }?>
                        </select>
						
                        <select name="lstEYear" id="lstEYear">
                          <option value="">yyyy</option>
                          <?php for($i=date("Y")-2;$i<date("Y")+10;$i++){?>
                          <option value="<?php if($i<10) echo "0";echo $i?>"
					<?php if($i == $y) echo "selected";?>
					>
                          <?php if($i<10) echo "0";echo $i?>
                          </option>
                          <?php }?>
                        </select>						</td>
                    </tr>
                    <tr>
                      <td align="left" class="txtBld_grn">Select Image </td>
                      <td colspan="3"><input name="flNewsImage" type="file" id="flNewsImage"></td>
                    </tr>
                    <tr>
                      <td align="left" class="txtBld_grn">Image Detail</td>
                      <td colspan="3"><textarea name="txtImgDesc" cols="40" rows="5" id="txtImgDesc"></textarea></td>
                    </tr>
                    <tr>
                      <td align="left" class="txtBld_grn">Select File </td>
                      <td colspan="3"><input name="flNewsFile" type="file" id="flNewsFile"></td>
                    </tr>
                    <tr>
                      <td align="left" class="txtBld_grn">Select News Status</td>
                      <td colspan="3" class="txtBld_grey">Active
                          <input name="rdoIsActive" type="radio" value="1" checked>
                          De-Active
                          <input name="rdoIsActive" type="radio" value="0">
                          Set as Main
                          <input type="checkbox" name="chkmain" value="checkbox">                      </td>
                    </tr>
                    <tr>
                      <td align="left" valign="top" class="txtBld_grn">Short Description <span class="txt_red">*</span> </td>
                      <td colspan="3"><textarea name="txrShortDesc" cols="40" rows="5" id="txrShortDesc"></textarea></td>
                    </tr>
                    <tr>
                      <td align="left" class="txtBld_grn" valign="top">Long Description</td>
                      <td colspan="3"><textarea name="report" id="report" cols="50" rows="30"><?=$strContents?></textarea></td>
                    </tr>
                    <tr>
                      <td colspan="4" align="left">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="left">&nbsp;</td>
                      <td align="left">
					  	<input name="Submit" type="submit" class="button" value="Save">
						<input type="hidden" name="hdnModuleId" value="<?=$intModuleID?>">
					  </td>
                      <td align="left">&nbsp;</td>
                      <td align="left">&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                  </table>
              </form></td>
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
