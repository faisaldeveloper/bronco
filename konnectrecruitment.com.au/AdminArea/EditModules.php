<? 
include("../Includes/BackOfficeIncludesFiles.php");
//--------------Checking for right---------------------
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=18;
	
if($objAdminUser->CheckRightForAdmin()==1)
{
	///////////////Creating Class Objects////////////////
	$objPages= new clsPages();
	//////////////Checking for Values///////////////////
	if(!isset($_REQUEST['hdnPageId']))
	{
		header("location:ManagePages.php?intMessage=350");
	}
	////////////////Initializing Variables//////////////
	$nLangId = $_SESSION['intLangId'];
	$intPageId = "";
	$nParentId = "";
	$strSearch = "";
	$nModule="";
	$arrQryStr=array();
	$nPage = "";
	///////////////Getting Values from the query string///////
	if(isset($_REQUEST['hdnLangId']))
		$nLangId = $_REQUEST['hdnLangId'];
	if(isset($_REQUEST['hdnPageId']))
		$intPageId = $_REQUEST['hdnPageId'];
	if(isset($_REQUEST['hdnParentId'])) 
		$nParentId = $_REQUEST['hdnParentId'];
	if(isset($_REQUEST['hdnSearch'])) 
		$strSearch = $_REQUEST['hdnSearch'];
	if(isset($_REQUEST['hdnPage'])) 
		$nPage = $_REQUEST['hdnPage'];
	if(isset($_REQUEST['hdnModuled']) && $_REQUEST['hdnModuled']!=0)
	{
		$nModule = $_REQUEST['hdnModuled'];
	}
	if(isset($_REQUEST['lstModule'])) 
	{
		$nModule = $_REQUEST['lstModule'];
		$arrQryStr[]="lstModule=".$nModule;
	}
	
	$arrQryStr[]="hdnParentId=".$nParentId;
	$arrQryStr[]="txtSearch=".$strSearch;
	$arrQryStr[]="lstLanguage=".$nLangId;
	$arrQryStr[]="txtSearch=".$strSearch;
	$arrQryStr[]="intPage=".$nPage;
	$strQryStr=implode('&',$arrQryStr);
	
	////////////Transfering value to class variable////////////
	$objPages->m_intPageId = $intPageId;
	$objPages->m_nModuleId = $nModule;
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?>Edit Modules<?=CONST_BACKOFFICE_TITLE_END?></title>
 <script language="javascript" type="text/javascript">
     function OnChange(f)
     {
		 f.action="<?=$_SERVER['PHP_SELF']?>";
		 f.submit();
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
    <br><form name="form1" method="post" action="EditModulesAction.php">
      <table width="96%"  border="0" cellspacing="0" cellpadding="2" align="center">
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
              <td><? if ($nParentId==0){?><a href="ManagePages.php?<?=$strQryStr?>"><span class="txtBld_ornge">Manage Pages</span></a>&nbsp;&gt;&gt;&nbsp;<span class="hdng_sandy">Update Page Modules </span><? } else {?><a href="ManagePages.php?<?=$strQryStr?>"><span class="txtBld_ornge">Manage SubPages</span></a>&nbsp;&gt;&gt;&nbsp;<span class="hdng_sandy">Update SubPage Modules</span><? }?></td>
            </tr>
			<tr> <td align="center">&nbsp;</td></tr>
			
			
            <tr>
			
			  <td valign="middle">Filter by Module type: 
			    <select name="lstModule" onChange="return OnChange(this.form);" style="width:140px" >
			   
                 <option value="0" <? if($_REQUEST['lstModule']==0) echo "selected";?> >-- View All --</option>
						  <?php 
						   $arrMod = $objPages->GetModulesName();
						   if($arrMod != FALSE) { 
						     while($arrModule= mysql_fetch_object($arrMod)){
						  ?>
							  <option value="<?=$arrModule->pkModuleTypeID?>" <? if($_REQUEST['lstModule']==$arrModule->pkModuleTypeID) echo "selected";?>> <?=$arrModule->Description?> </option>
						  <?php 
						    }
						  }
						  ?>
                </select>
			  </td>
            </tr>
            <?php 
//	  $arrAllModules = $objPages->GetAllModules();	 
	  $arrAllModules = $objPages->GetModules();	  

 
	  $arrModules = $objPages->GetPageModule(); ?>
            <tr>
              <td>
                  <table width="100%" border="0" cellspacing="2" cellpadding="2" class="TabBorderLightGreyBG" align="center">
                    <tr>
                      <td width="18%">&nbsp;</td>
                      <td colspan="5">&nbsp; </td>
                    </tr>
                    <?php
			if($arrAllModules != FALSE)
			{	$i=0;
				$arrPosition=GetPagePositionArray();
				$temp=0;
				while($arrRecAllModules = mysql_fetch_object($arrAllModules))
				{
					$arrPage_Module = NULL;
					$i++;
					$objPages->m_intPageModuleId = $arrRecAllModules->pkModuleId;
					$intModuleId = $objPages->GetPageModuleId();
					$ResultNew=$objNews->GetModuleName($arrRecAllModules->ModuleType); 
					if($temp==0)
					{
						$ResultOld=$ResultNew; echo "<tr class='txtBld_blue'><td colspan='7' align='left' >".$ResultOld."</td></tr>";
						$temp=1;
					}
					if($ResultNew!=$ResultOld)
					{
					?>
						<tr class="txtBld_blue" height="8" valign="bottom">
							<td colspan="7" align="left" ><?  //Module's Belonging Names
									$ResultOld=$ResultNew;
									echo $ResultOld;?>
							</td>
						</tr>
					<?
					}
					?>
                    <tr>
                      <td align="right"><input name="chkModule[]" type="checkbox" id="chkModule<?=$arrRecAllModules->pkModuleId?>" value="<?=$arrRecAllModules->pkModuleId?>"
					  <?php if($arrRecAllModules->pkModuleId == $intModuleId) {echo "checked";}?>></td>
                      <td><label for="chkModule<?=$arrRecAllModules->pkModuleId?>"><?=$arrRecAllModules->ModuleDesc?></label></td>
					  <td width="13%">Position :					  </td><td width="19%">
					  <? //Check if the module is active then what is the positon & rank.
						if($arrRecAllModules->pkModuleId == $intModuleId) 
						{	
							$ModuleId=$arrRecAllModules->pkModuleId;
							$rsPage_Module=GetPageModuleInfo($ModuleId,$intPageId);
							$arrPage_Module=mysql_fetch_object($rsPage_Module);
						}
					  ?>
					  <select name="lstPosition[<?=$arrRecAllModules->pkModuleId?>]">
					  <?
					   foreach ($arrPosition as $nKey => $strValue) 
					   {
						?> 
						<option value="<?=$nKey?>" <? if($arrPage_Module->Position==$nKey) echo "selected";?>><?=$strValue?></option>
					   <?
					   }
						?> 
					 </select></td>
					 <?
					 $nRanks=GetActiveModules();
					 ?>
					  <td width="11%">Rank :</td>
					  <td width="24%"><select name="lstRank[<?=$arrRecAllModules->pkModuleId?>]">
					  <?
						for($i=1;$i<=$nRanks;$i++)
						{
						?><option value="<?=$i?>" <? if($arrPage_Module->Rank==$i)echo "selected";?>><?=$i?></option>
					<?  }?>
						</select></td>
                    </tr>
                    <?PHP 
				}
			}
			?>
                    <tr>
                      <td>&nbsp;</td>
                      <td width="15%">&nbsp;</td>
                      <td colspan="4">&nbsp;</td>
                    </tr>
                    <tr>
			  		 <td>&nbsp;</td>
                      <td><input name="btnUpdate" type="submit" class="button" id="btnUpdate" value="Update">
                          <input name="hdnPageId" type="hidden" id="hdnPageId" value="<?=$intPageId?>">
                          <input name="hdnLangId" type="hidden" id="hdnLangId" value="<?=$nLangId?>">
                          <input name="hdnParentId" type="hidden" id="hdnParentId" value="<?=$nParentId?>">
                          <input name="hdnSearch" type="hidden" id="hdnSearch" value="<?=$strSearch?>">
                          <input name="hdnPage" type="hidden" id="hdnPage" value="<?=$nPage?>">
						   <input name="hdnModuled" type="hidden" value="<?=$nModule?>">
                      </td>
                      <td colspan="8">&nbsp;</td>
                    </tr>
                  </table>
              </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
			<?
			}
			?>
          </table></form>
        <!-- InstanceEndEditable -->
    </td>	
  </tr>
  <tr>
    <td colspan="2"><?php include("Footer.php");?></td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>