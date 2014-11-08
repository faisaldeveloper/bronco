<?php
include("../Includes/BackOfficeIncludesFiles.php");
//--------------Checking for right---------------------
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=50;
$intModuleID=$_REQUEST['hdnModuleId'];
$strGalleryName = $objNews->GetGalleryName($intModuleID);
$strGalleryNewsTitle = $objNews->GetGalleryNewsName($intModuleID);

if($objAdminUser->CheckRightForAdmin()==1)
{
	////////////////Create objects of classes////////////////////
	$objNews  = new clsNews();
	$objLang  = new clsLanguage();
	//////////////Checking for Validation///////////////////
	if(!isset($_REQUEST['NewsId']) || !isset($_REQUEST['NewsId']))
	{
		header("location:ManageNews.php?intMessage=358&hdnModule=".$intModuleID);
		exit;
	}
	$nDefaultLang = $objLang->GetDefaultLang();
	$_SESSION['intLangId'] = $nDefaultLang;
	//////////////////// Initialize variables ////////////////////////
	$intLangId = $_SESSION['intLangId'];
	$intNewsId = "";
	/////////////////Getting Values from query string///////////////////
	if(isset($_REQUEST['NewsId']))
		$intNewsId = $_REQUEST['NewsId'];
	//////////////Transfer values to class variables///////////////
	$objNews->m_intNewsId = $intNewsId;
	$objNews->m_intLangId = $intLangId;
	$arrNews = $objNews->GetNewsById();
	$arrNewsImgInfo = $objNews->getNewsImgInfo();
	if(!empty($arrNews))
	{
		$arrRecNews = mysql_fetch_object($arrNews);
	}
	if($arrNewsImgInfo!=NULL && $arrRecNewsImgInfo!=FALSE)
	$arrRecNewsImgInfo = mysql_fetch_object($arrNewsImgInfo);
	$intEventId = $arrRecNews->fkEventId;
	//$intLangId = $arrRecNews->fkLangID;
	$strNewsTitle = $arrRecNews->NewsTitle;
	$dtNewsDate = $arrRecNews->NewsDate;
	$dtNewsEDate = $arrRecNews->NewsEDate;
	$dtNewsTime = $arrRecNews->NewsTime; 
	$strShortDesc  = $arrRecNews->ShortDesc;
	$intIsActive = $arrRecNews->IsActive;
	$strImgDesc = $arrRecNewsImgInfo->Description;
	$strContents = $arrRecNews->LongDesc;
	//////////////////////////////////
	if(isset($_REQUEST['txtNewsTitle']))
		$strNewsTitle = $_REQUEST['txtNewsTitle'];
	if(isset($_REQUEST['lstYear']))
		$dtNewsDate = $_REQUEST['lstYear']."-".$_REQUEST['lstMonth']."-".$_REQUEST['lstDay'];
	if(isset($_REQUEST['lstEYear']))
		$dtNewsEDate = $_REQUEST['lstEYear']."-".$_REQUEST['lstEMonth']."-".$_REQUEST['lstEDay'];
	if(isset($_REQUEST['txtShortDesc']))
		$strShortDesc = $_REQUEST['txtShortDesc'];
}	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?>Edit News<?=CONST_BACKOFFICE_TITLE_END?></title>
<?php include("TinyExact.php"); ?>
<script language="JavaScript" type="text/javascript" src="EditorFiles/richtext.php"></script>
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
	if(f.txtShortDesc.value=="")
	{
		alert("Please enter short description");
		f.txtShortDesc.focus();
		return false;
	}
return true;
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
            <tr>
              <td height="6"></td>
            </tr>
            <tr>
              <td><a href="ManageNews.php?hdnModuleId=<?=$intModuleID?>"><span class="txtBld_ornge">News Manager</span></a>&nbsp;&gt;&gt;&nbsp;<span class="hdng_sandy">Edit News (<?=$strGalleryName?> -&gt; <?=$strNewsTitle;?>)</span></td>
              </tr>
            <tr>
              <td align="center" class="txtBld_grn" colspan="4"><? include('../Includes/DisplayConfirmMessage.php');?>&nbsp;</td>
            </tr>
            <tr>
              <td><form action="EditNewsAction.php" method="post" enctype="multipart/form-data" name="form1" onSubmit="return Validate(this)">
                  <table width="99%"  border="0" align="center" cellpadding="2" cellspacing="2" class="TabBorderLightGreyBG">
                    <tr>
                      <td align="left" class="txtBld_grn">&nbsp;</td>
                      <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="left" class="txtBld_grn"> Title<span class="txt_red">*</span></td>
                      <td colspan="3"><input name="txtNewsTitle" type="text" id="txtNewsTitle" value="<?=$strNewsTitle;?>" size="40"></td>
                    </tr>
                    <tr>
                      <td align="left" class="txtBld_grn"> From Date<span class="txt_red">*</span></td>
                      <?php
				list($date,$time) = explode(" ",$dtNewsDate);
			  	list($y,$m,$d) = explode("-",$date);
			  	list($Ey,$Em,$Ed) = explode("-",$dtNewsEDate);
			  ?>
                      <td width="182">
					  
				    <select name="lstDay" id="lstDay">
                          <?php for($i=1;$i<32;$i++){?>
                          <option value="<?php if($i<10) echo "0";echo $i?>"
				  <?php  
				  if($i == $d) echo "selected";?>
				  >
                          <?php if($i<10) echo "0";echo $i?>
                          </option>
                          <?php }?>
                        </select>
                      
					      <select name="lstMonth" id="lstMonth">
                            <?php for($i=1;$i<13;$i++){?>
                            <option value="<?php if($i<10) echo "0";echo $i?>"
					<?php   
				   if($i == $m) echo "selected";?>
					>
                            <?php if($i<10) echo "0";echo $i?>
                            </option>
                            <?php }?>
                          </select>
                          <select name="lstYear" id="lstYear">
                            <?php for($i=date("Y")-2;$i<date("Y")+10;$i++){?>
                            <option value="<?=$i?>"
					<?php   
				   if($i == $y) echo "selected";?>
					>
                            <?php if($i<10) echo "0";echo $i?>
                            </option>
                            <?php }?>
                        </select></td>
                      <td width="104"><span class="txtBld_grn">From Time</span></td>
                      <td width="297">
					 <? list($g,$i_minute,$s) = explode(":",$dtNewsTime); ?>
					  <select name="lstHour" id="lstHour">
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
                      <td align="left" class="txtBld_grn">To Date<span class="txt_red">*</span> </td>
                      <td colspan="3"><select name="lstEDay" id="lstEDay">
                        <?php for($i=1;$i<32;$i++){?>
                        <option value="<?php if($i<10) echo "0";echo $i?>"
				  <?php if($i == $Ed) echo "selected";?>
				  >
                        <?php if($i<10) echo "0";echo $i?>
                        </option>
                        <?php }?>
                      </select>
                        <select name="lstEMonth" id="lstEMonth">
                          <?php for($i=1;$i<13;$i++){?>
                          <option value="<?php if($i<10) echo "0";echo $i?>"
					<?php if($i == $Em) echo "selected";?>
					>
                          <?php if($i<10) echo "0";echo $i?>
                          </option>
                          <?php }?>
                        </select>
                        <select name="lstEYear" id="lstEYear">
                          <?php for($i=date("Y")-2;$i<date("Y")+10;$i++){?>
                          <option value="<?=$i?>"
					<?php  if($i == $Ey) echo "selected";?>
					>
                          <?php if($i<10) echo "0";echo $i?>
                          </option>
                          <?php }?>
                        </select></td>
                    </tr>
                    <tr>
                      <td width="165" align="left" class="txtBld_grn">Select News Status</td>
                      <td colspan="3" class="txtBld_grey">
                        <input name="rdoIsActive" type="radio" value="1" id="rdoIsActive" <?php if($intIsActive == 1) echo "checked";?>>
						<label for="rdoIsActive">Active</label>
                        <input name="rdoIsActive" type="radio" value="0" id="rdoDeActive"<?php if($intIsActive == 0) echo "checked";?>>
						<label for="rdoDeActive">De-Active</label></td>
                      </tr>
                    <tr>
                      <td width="165" align="left" valign="top" class="txtBld_grn">Short Description<span class="txt_red">*</span> </td>
                      <td colspan="3"><textarea name="txtShortDesc" cols="40" rows="7" id="txtShortDesc"><?=$strShortDesc;?></textarea></td>
                    </tr>
                    <tr>
                      <td align="left" valign="top" class="txtBld_grn">Long Description</td>
                      <td colspan="3"><textarea name="report" id="report" cols="50" rows="30"><?=$strContents?></textarea></td>
                    </tr>
                    <tr>
                      <td colspan="4" align="left" valign="top" height="6"></td>
                    </tr>
                    <tr>
                      <td align="left">&nbsp;</td>
					  <td colspan="4" align="left"><input name="Submit" type="submit" class="button" value="Save">
						  <input type="hidden" name="hdnLangId" value="<?=$intLangId?>">
    	                  <input type="hidden" name="hdnNewsId" value="<?=$intNewsId?>"> 
						  <input type="hidden" name="hdnModuleId" value="<?=$intModuleID?>">
						</td>
                    </tr>
                    <tr>
                      <td colspan="4" align="left" valign="top" height="6"></td>
                    </tr>
                  </table>
              </form></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
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
