<? 
include("../Includes/BackOfficeIncludesFiles.php");
//--------------Checking for right---------------------
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=310;
	
if($objAdminUser->CheckRightForAdmin()==1)
{
	///////////////Creating Class Objects////////////////
	$objPages= new clsPages();

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
	$objPages->m_nModuleId = $nModule;
	$objPages->m_intPageId = $intPageId;
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?>Edit Modules<?=CONST_BACKOFFICE_TITLE_END?></title>


	 <script language="javascript" type="text/javascript">
	 function checkrow(id)
	{ 
		//alert("here");
		id="chkModule"+id;
	
		if(document.getElementById(id).checked==true)
			document.getElementById(id).checked=false;
		else
			document.getElementById(id).checked=true;
	}
     function OnChange(f)
     {
		 f.action="<?=$_SERVER['PHP_SELF']?>";
		 f.submit();
		 return true;
     }
	 function selectAll(f,n,v) 
		 {
			if(window.document.forms[0].chkAllUser.checked == true)
			{
				var chk   = ( v == null ? true : v );
				for (i = 0; i < f.elements.length; i++) 
				{
					if( f.elements[i].type == 'checkbox' && f.elements[i].name == n ) 
					{
						f.elements[i].checked = chk;
					}
				}
			}
			else
			{
				var chk   = false;
				for (i = 0; i < f.elements.length; i++) 
				{
					if( f.elements[i].type == 'checkbox' && f.elements[i].name == n ) 
					{
						f.elements[i].checked = chk;
					}
				}
			}	
		}
		 function Validate(f)
		 {
			bCheck=false;
			for(i=0; i<window.document.forms[0].elements.length ;i++)
			{
				if( (window.document.forms[0].elements[i].type=="checkbox") && (window.document.forms[0].elements[i].checked==true) )	
					bCheck=true;
			}	
			if(bCheck==false)
			{
				alert("Please select at least one");
				return false;
			}
			return true;
		 }
		function CheckCheckBox(f,chk)
		{
		
			if(document.getElementById(chk).checked==true)
				markAllRows('tablesForm');
			else
				unMarkAllRows('tablesForm');
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
	<form  name="tablesForm" id="tablesForm" method="post" action="EditModulesManagerAction.php" onSubmit="return Validate(this.form)">
  <?php /*?>  ?lstModule=<?=$nlstModule?> <?php */?>
      <table width="98%"  border="0" cellspacing="0" cellpadding="2" align="center">
		  <?
		  if($objAdminUser->CheckRightForAdmin()!=1)
			{
			?>
            <tr>
              <td class="txtBld_ornge" colspan="2">You are not authorised to view this page. <a href="<?=$_SERVER['HTTP_REFERER']?>"><< Back </a></td>
            </tr>
			<?
			}
			else {
			?>		  
            <tr>
			 <td width="4%"><img src="Images/icon_module_manager_32x32.png" alt="Image"/></td>
              <td><? if ($nParentId==0){?><span class="hdng_sandy">Modules Manager </span><? }?></td>
            </tr>
			<tr>
              <td align="center">&nbsp;</td>

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
			<tr><td colspan="2" align="center">
				<? include('../Includes/DisplayConfirmMessage.php');?>
				</td>
			</tr>
            <?php 
	  $arrAllModules = $objPages->GetModules();	  

//	  $arrModules = $objPages->GetPageModule(); ?>
            <tr>
              <td colspan="4">
                  <table width="100%" border="0" cellspacing="0" cellpadding="2" align="center">
                    
					<tr class="TabHeading" align="center">
						<td width="8%" align="center" >
					  <input type="checkbox" name="chkAllUser" onclick="selectAll(tablesForm,'chkModule[]');" value="1" />						</td>
						<td align="left" >Module</td>
						<td align="center">Status</td>
						<td align="center">Attach Status</td>
						<td width="51%" align="center">Attach with all Pages</td>
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

					//$intModuleId=
					//$intModuleId = $objPages->GetPageModuleId();
					$ResultNew=$objNews->GetModuleName($arrRecAllModules->ModuleType); 
					if($temp==0)
					{
						$ResultOld=$ResultNew; echo "<tr class='txtBld_blue'><td colspan='5' align='left' class=\"brdr_dotedLt\">".$ResultOld."</td></tr>";
						$temp=1;
						
					}
					if($ResultNew!=$ResultOld)
					{
					?>
						<tr class="txtBld_blue" height="8" valign="bottom" align="center">
							<td colspan="5" align="left" class="brdr_dotedLt">
							<?  //Module's Belonging Names
									$ResultOld=$ResultNew;
									echo $ResultOld;
							?>
                            </td>
						</tr>
					<?
					}
					?>
				
                    
                    <tr align="center" onclick="checkrow(<?=$arrRecAllModules->pkModuleId?>);"
                    <?php 
				if($intRowCounter% 2 == 0)
				{
					echo "class='bg_ltGrey' onMouseOver=\"this.className='bg_rollOver'\" onMouseOut=\"this.className='bg_ltGrey'\" "; 
				}
				else
				{
				echo " class='bg_ltGreen' onMouseOver=\"this.className='bg_rollOver'\" onMouseOut=\"this.className='bg_ltGreen'\"" ;
				}
			   ?>>
                      <td class="brdr_dotedLt"><input name="chkModule[]" type="checkbox" id="chkModule<?=$arrRecAllModules->pkModuleId?>" value="<?=$arrRecAllModules->pkModuleId?>" onclick="checkrow(<?=$arrRecAllModules->pkModuleId?>);"
					  <?php if($arrRecAllModules->pkModuleId == $intModuleId) {echo " checked";}?>></td>
                      <th align="left" class="brdr_dotedRt"><label for="chkModule<?=$arrRecAllModules->pkModuleId?>"><?=$arrRecAllModules->ModuleDesc?></label></th>
                      <?php /*?><td align="left" class="brdr_dotedRt"><?=$arrRecAllModules->ModuleDesc?></td><?php */?>
					  <td width="11%" align="center" class="brdr_dotedRt"><? if ($arrRecAllModules->IsActive==ACTIVE) echo "Active"; else echo "Inactive";?></td>
					  <td align="center" class="brdr_dotedRt">
					  <?php //this function is for checking the page modules either they are attach or not
					  	$nCheck = $objPages->ChkModuleAttachmentWtihPage($arrRecAllModules->pkModuleId); 
					    if($nCheck==TRUE) 
							echo "Attached"; 
						else 
							echo "Unattached";
						?>
					  </td>
					  <td align="center" class="brdr_dotedRt">
						<table width="100%" >
						<tr>
							<td width="20%" align="right">Position : </td>
							<td width="24%" align="left">
							  <? 
								$ModuleId=$arrRecAllModules->pkModuleId;
								$rsPage_Module=GetPageModuleInfo($ModuleId);
								if($rsPage_Module)
									$arrPage_Module=mysql_fetch_object($rsPage_Module);
							
							  ?>
							  <select name="lstPosition[<?=$arrRecAllModules->pkModuleId?>]" >
							  <?

							   foreach ($arrPosition as $nKey => $strValue) 
							   {
								?> 
									<option value="<?=$nKey?>" <? if($arrPage_Module->Position==$nKey) echo "selected";?>><?=$strValue?></option>
							  <? }?> 
							 </select>
							</td>
						<? $nRanks=GetActiveModules();	 ?>
											
							<td width="13%" align="right">Rank :</td>
							<td width="13%" align="left">
								<select name="lstRank[<?=$arrRecAllModules->pkModuleId?>]">
								<?
									for($i=1;$i<=$nRanks;$i++)
									{
								?>		<option value="<?=$i?>" <? if($arrPage_Module->Rank==$i)echo "selected";?>><?=$i?></option>
								<?  }?>
										</select>
							</td>
						</tr>			
					</table>
					</td>
					  <? $intRowCounter++;?>
                   </tr>
                   
                    <?PHP 
				}
			}
			?>
                    <tr>
			  		 <td colspan="5">
					 <? $objAdminUser->m_objRoles->m_intRightId=311;
						if($objAdminUser->CheckRightForAdmin()==1)
						{
					?>
					 <input name="btnActivate" type="submit" class="button" id="btnActivate" value="Change Status" onClick="return confirm('If you inactivate any module(s), it will deattch from all pages.');">
					 <input type="submit" name="bntAttach" value="Attach with all" class="button" id="bntAttach">
					 <input type="submit" name="bntDeAttach" value="DeAttach from all" class="button" id="bntDeAttach">
					  <input type="submit" name="bntUpdate" value="Update All" class="button" id="bntUpdate">
                     </td>
                    <input name="hdnPageId" type="hidden" id="hdnPageId" value="<?=$intPageId?>">
                    <input name="hdnLangId" type="hidden" id="hdnLangId" value="<?=$nLangId?>">
                    <input name="hdnParentId" type="hidden" id="hdnParentId" value="<?=$nParentId?>">
                    <input name="hdnSearch" type="hidden" id="hdnSearch" value="<?=$strSearch?>">
                    <input name="hdnPage" type="hidden" id="hdnPage" value="<?=$nPage?>">
                    <input name="hdnModuled" type="hidden" value="<?=$nModule?>">
						 <? }?>
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
          </table>
		  </form>
        <!-- InstanceEndEditable -->
    </td>	
  </tr>
  <tr>
    <td colspan="2"><?php include("Footer.php");?></td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>