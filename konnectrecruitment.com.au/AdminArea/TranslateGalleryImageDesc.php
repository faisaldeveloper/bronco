<?php
include("../Includes/BackOfficeIncludesFiles.php");
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=70;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{
//print_r($_REQUEST);exit;
	///////////validation///////////////
	if(!isset($_REQUEST['hdnGalleryID'])|| empty($_REQUEST['hdnGalleryID']))
	{
		header("location:ManageGallery.php?intMessage=360");
		exit;
	}
	if(!isset($_REQUEST['id']) || empty($_REQUEST['id']))
	{
		header("location:ManageGalleryImage.php?intMessage=362&hdnModuleID=".$_REQUEST['hdnGalleryID']);
		exit;
	}
	////////////////////creating objeccts of the classes///////////////
	$objLang=new clsLanguage();
	$objGallery = new clsGallery();
	$rsLang=$objLang->GetLanguages();
	///////////////////////Initialization/////////////////////////////
	$nLang = 0;
	$npkId = "";
	$nLangId = $_SESSION['intLangId'];
	$nGalleryID = "";
	///////////Getting values from the query string///////////////	
		if(isset($_REQUEST['id']))
			$nID = $_REQUEST['id'];
		if(isset($_REQUEST['hdnpkId']))
			$npkId = $_REQUEST['hdnpkId'];
		if(isset($_REQUEST['hdnLangId']))
			$nLangId = $_REQUEST['hdnLangId'];
		if(isset($_REQUEST['hdnGalleryID']))
			$nGalleryID = $_REQUEST['hdnGalleryID'];
	///////////////Transfering vlaues to class variables////////////
		$objGallery->m_intLangId = $nLangId;
		$objGallery->m_intGImageId = $nID;
		$rs = $objGallery->SelectImageDescById();
		$arrLang = array();
		$rsTransLang = $objGallery->GetTranslatedLang();	//print_r($_REQUEST);
		if ($rsTransLang != false && mysql_num_rows($rsTransLang)>0)
		{
			while ($row = mysql_fetch_object($rsTransLang))
			{
				$arrLang[] = $row->pkLangId;
			}
		}
		if ($rs != false && mysql_num_rows($rs)>0)
		{
			$row = mysql_fetch_object($rs);
			$strDescripton = $row->ImageDesc;
			if ($row->ImageDesc != NULL)
			{
				if ($row->pkLangId != NULL)
					$strLang = $objLanguage->GetLangName($row->pkLangId);
				$strDescripton = $row->ImageDesc;	
			}		
			else 
				$strDescripton = "There is no description in default language";	
				
		}
	
		$nCheck = 0;
}
else
	{
	header("location:Error.php");//End Right If
	exit;
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?>Translation Manager<?=CONST_BACKOFFICE_TITLE_END?></title>
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
          <script>
		  function Validate(f)
		  {
			if(f.lstLangId.value==0)
			{
				alert("Please select langauage");
				f.lstLangId.focus();
				return false;
			}
			else if(f.txtDescripton.value=="")
			{
				alert("Please enter confirmation message");
				f.txtDescripton.focus();
				return false;
			}
			else return true;
		  }
		  function InsertDesc(f)
		  {
		  	//alert(f.hdnlist.value);
			var a=f.lstLangId[f.lstLangId.selectedIndex].value;
			f.hdnLangId.value=f.lstLangId[f.lstLangId.selectedIndex].value
			if(f.hdnlist.length)
				f.txtDescripton.value=f.hdnlist[a].value;
			else f.txtDescripton.value=f.hdnlist.value;
		  }
		  function ChangeLanguage()
			{//This function is activated when the language is changed.
				var a=window.document.TranslateImageGalDesc.lstLangId.value;//alert(a);
				window.document.TranslateImageGalDesc.hdnLangId.value=a;
				var f=window.document.TranslateImageGalDesc;
				var a=f.hdnLangId.value;
				
				if(document.getElementById("hdnlist2_"+a))
					f.txtDescripton.value=document.getElementById("hdnlist2_"+a).value;
				else
				 f.txtDescripton.value="";
			}
		  </script>
		  <table width="99%"  border="0" align="center" cellpadding="2" cellspacing="0">
            <tr>
              <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <td width="76%" align="left" colspan="2">&nbsp;<a href="ManageGallery.php"><span class="txtBld_ornge">Manage Gallery</span></a>&nbsp;&gt;&gt;&nbsp;<a href="ManageGalleryImage.php?hdnModuleID=<?=$nGalleryID?>"><span class="txtBld_ornge">Manage Gallery Picture</span></a>&nbsp;&gt;&gt;&nbsp;<span class="hdng_sandy">Translate Gallery Picture Description </span> </td>
              <td width="5%" align="right">&nbsp;</td>
            </tr>
			<tr>
           	  <td colspan="3" align="center"><? include('../Includes/DisplayConfirmMessage.php');?></td>
            </tr>
            <tr>
              <td colspan="3"><form name="TranslateImageGalDesc" method="post" action="TranslateGalleryImageDescAction.php" onSubmit="return Validate(this)">
                  <table width="99%"  border="0" align="center" cellpadding="2" cellspacing="0" class="TabBorderLightGreyBG">
					<tr >			
                      <td>					  </td><td></td>
                    </tr>
					<tr <?php if(!$MultiLangCheck){?>style="visibility:hidden"<?php }?>>
					  <td align="right" class="txtBld_grn">&nbsp;</td>
					  <td>&nbsp;</td>
				    </tr>
					<tr <?php if(!$MultiLangCheck){?>style="visibility:hidden"<?php }?>>					
                      <td align="left" class="txtBld_grn">Select Language </td>
                   <td><select name="lstLangId" id="lstLangId" onChange="ChangeLanguage();">
                           <? while($strRowLang=mysql_fetch_array($rsLang))
						  {		$nCheck = 1;
						  if($_SESSION['intLangId'] != $strRowLang['pkLangId'])
							  {
							  if($nCheck == 1)
							  {
							  	$tempImgLang=$strRowLang['pkLangId'];
							  }
							  ?>
							  <option value="<?=$strRowLang['pkLangId']?>" <? if($strRowLang['pkLangId']==$tempImgLang)echo " selected";?>><?=$strRowLang['LangDesc']?> </option>
                        
                          <? }
						  }
						  	?>
                        </select>
						<? if ($nCheck == 0) print "All languages are translated"; ?>
						<? 
						   $rsSql=$objGallery->SelectGalImgDescById($nID);
						   
						   if($rsSql != FALSE)
						   while ($row2=mysql_fetch_object($rsSql))
						   {
						   //print_r($row2);
						   ?>
						   <input type="hidden" id="hdnlist2_<?=$row2->fkLangId?>" value="<?=$row2->ImageDesc?>">
						  <? 
						  if($_SESSION['intLangId'] == $row2->fkLangId)
						  $DefDesc=$row2->ImageDesc;
						  if($tempImgLang == $row2->fkLangId)
						  $tempDesc=$row2->ImageDesc;
						  }
						  ?>
                        <input type="hidden" name="hdnLangId" value="<?=$tempImgLang?>">
                        <input name="hdnImgName" type="hidden" id="hdnImgName" value="<?=$_REQUEST['strImgName']?>"></td>
                    </tr>
                    <tr <?php if(!$MultiLangCheck){?>style="visibility:hidden"<?php }?>>
                      <td align="left" class="txtBld_grn">Default Language Description: </td>
                      <td><?=$DefDesc?></td>
                    </tr>
					<? if ($nCheck == 1) 
					{
					?>
                    <tr>
                      <td width="37%" align="left" class="txtBld_grn">Translated</td>
                      <td width="63%"><input name="txtDescripton" type="text" id="txtDescripton" size="35" value="<?=$tempDesc?>">                      </td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td><input name="Submit" type="submit" class="button" value="Translate">
						  <input name="hdnId" type="hidden" id="hdnId" value="<?=$nID?>">
                          <input name="hdnModuleId" type="hidden" id="hdnModuleId" value="<?=$nGalleryID?>">					  </td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
				<? } ?>	
                </table>
              </form></td>
            </tr>
            <tr>
              <td colspan="3">&nbsp;</td>
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
