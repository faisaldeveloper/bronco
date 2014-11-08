<? 
require_once("../Includes/BackOfficeIncludesFiles.php");
//--------------Checking for right---------------------
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=17;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{

	///////////////Creating Class Objects////////////////
	$objCMessage=new clsConfirmMessage();
	//////////////Checking for Values///////////////////
	if(!isset($_REQUEST['hdnPageId']))
	{
		header("location:ManagePages.php?intMessage=349");
	}
	////////////////Initializing Variables//////////////
	$nLangId = $_SESSION['intLangId'];
	$intPageId = "";
	$nParentId = "";
	$strSearch = "";
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
	////////////Transfering values to class variables////////////
	$objCMessage->m_intConfMsgId=$_REQUEST['intMessage'];
	$rsCMessage=$objCMessage->GetMessage_BackOffice();
	$arrQryStr[]="hdnParentId=".$nParentId;
	$arrQryStr[]="txtSearch=".$strSearch;
	$arrQryStr[]="lstLanguage=".$nLangId;
	$arrQryStr[]="txtSearch=".$strSearch;
	$arrQryStr[]="intPage=".$nPage;
	$strQryStr=implode('&',$arrQryStr);
	$objPages->m_nModuleId = $nModule;
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?>Add Modules<?=CONST_BACKOFFICE_TITLE_END?></title>
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
          <br>
		  <form name="form1" method="post" action="AddModulesAction.php">
		  <table width="98%"  border="0" cellspacing="0" cellpadding="2" align="center">
            <tr>
	              <td><? if ($nParentId==0){?><a href="ManagePages.php?<?=$strQryStr?>"><span class="txtBld_ornge">Manage Pages</span></a>&nbsp;&gt;&gt;&nbsp;<span class="hdng_sandy">Attach Page Modules</span><? } else {?><a href="ManagePages.php?<?=$strQryStr?>"><span class="txtBld_ornge">Manage Pages</span></a>&nbsp;&gt;&gt;&nbsp;<a href="ManagePages.php?<?=$strQryStr?>"><span class="txtBld_ornge">Manage SubPages</span></a>&nbsp;&gt;&gt;&nbsp;<span class="hdng_sandy">Attach SubPage Modules</span><? }?></td>
            </tr>
			<?
			if(isset($_REQUEST['intMessage']) && $rsCMessage!=FALSE)
			{   
				$strRowMessage=mysql_fetch_array($rsCMessage);
			?>
			<tr align="center">
			<td valign ='bottom' ><img src='../images/<?=$strRowMessage['Image']?>'>&nbsp;
			<? if($strRowMessage['Indicator']==0){print "<span class='txt_grn'>".$strRowMessage['ConfMsgDesc']."</span>";}else{print "<span class='txt_red'>".$strRowMessage['ConfMsgDesc']."</span>";}?></td>
			</tr>
			<?php
			}
			?>
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
	  
//	  $arrModules = $objPages->GetAllModules();
	  $arrModules  = $objPages->GetModules();	  
	 // arrAllModules = $objPages->GetModules();	  

 
	 // $arrModules = $objPages->GetPageModule();	  
	  ?>
            <tr>
              <td>
                  <table width="100%" border="0" cellspacing="2" cellpadding="2" align="center" class="TabBorderLightGreyBG">
                    <tr>
                      <td width="17%">&nbsp;</td>
                      <td colspan="4">&nbsp; </td>
                    </tr>
                    <?php
			if($arrModules != FALSE)
			{
				$temp=0;
				while($arrRecModules = mysql_fetch_object($arrModules))
				{
				$ResultNew=$objNews->GetModuleName($arrRecModules->ModuleType);
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
                      <td align="right"><input name="chkModule[]" type="checkbox" id="chkModule<?=$arrRecModules->pkModuleId?>" value="<?=$arrRecModules->pkModuleId?>"></td>
                      <td width="21%"><label for="chkModule<?=$arrRecModules->pkModuleId?>"><?=$arrRecModules->ModuleDesc?></label></td>
					  <td width="10%">
					  <? 
					  $arrPosition=GetPagePositionArray();
					  ?>Position :</td><td width="19%">
					  <select name="lstPosition[<?=$arrRecModules->pkModuleId?>]">
					   <?
					   foreach ($arrPosition as $nKey => $strValue) {
						?> 
						<option value="<?=$nKey?>"><?=$strValue?></option>
					   <?
					   }
						?> 
					 </select></td>
					 <?
					 $nRanks=GetActiveModules();
					 ?><td width="11%">Rank :</td>
					  <td width="22%"><select name="lstRank[<?=$arrRecModules->pkModuleId?>]">
					  <option value="1" selected>1</option>
					    <?
						for($i=2;$i<=$nRanks;$i++)
						{
						?><option value="<?=$i?>"><?=$i?></option>
						<?
						}
						?>
						</select></td>
                    </tr>
                    <?PHP 
				}
			}
			?>
                    <tr>
                      <td>&nbsp;</td>
                      <td>
					    <input name="Submit" type="submit" class="button" value="Attach">
						<input name="hdnPageId" type="hidden" id="hdnPageId" value="<?=$intPageId?>">
						<input name="hdnLangId" type="hidden" id="hdnLangId" value="<?=$nLangId?>">
						<input name="hdnParentId" type="hidden" id="hdnParentId" value="<?=$nParentId?>">
						<input name="hdnSearch" type="hidden" id="hdnSearch" value="<?=$strSearch?>">
						<input name="hdnPage" type="hidden" id="hdnPage" value="<?=$nPage?>">
						 <input name="hdnModuled" type="hidden" value="<?=$nModule?>">
					  </td>
                    </tr>
                    <tr>
                      <td width="17%">&nbsp;</td>
                      <td colspan="4">&nbsp; </td>
                    </tr>
                  </table>
              </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
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