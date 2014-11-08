<?php
include("../Includes/BackOfficeIncludesFiles.php");
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=46;
if($objAdminUser->CheckRightForAdmin()==1)
{
	////////////////Creating class objects////////////////
	$objNews = new clsNews();

	$objLang = new clsLanguage();
	$nDefaultLang = $objLang->GetDefaultLang();
	$_SESSION['intLangId']= $nDefaultLang;
	//////////////////Getting values from the querystring////////////////
	 $intLangId = $_SESSION['intLangId'];
	
	$intModuleId = $_REQUEST['hdnModuleId'];
	if(isset($_REQUEST['lstLanguage']))
		$intLangId =$_REQUEST['lstLanguage'];
	$strGalleryName = $objNews->GetGalleryName($intModuleId);
}	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?>News<?=CONST_BACKOFFICE_TITLE_END?></title>



<script language="javascript" type="text/javascript">
function checkrow(id)
	{
		id="chkArrNewsId_"+id;
	
		if(document.getElementById(id).checked==true)
			document.getElementById(id).checked=false;
		else
			document.getElementById(id).checked=true;
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

function sendForm(f)
{
	alert(f);
	f.submit();
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
</script>
 <script language="javascript" type="text/javascript">
	 function OnChange(f)
	 {
		 f.action="<?=$_SERVER['PHP_SELF']?>?hdnModuleId=<?=$intModuleId?>";
		 f.submit();
		 return true;
	 }
	 function CheckCheckBox(f,chk)
		{
		
		
			if(document.getElementById(chk).checked==false)
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
	<form name="tablesForm" id="tablesForm" action="newsaction.php" method="post" onSubmit="return Validate(this.form)">
          <table width="98%"  border="0" align="center" cellpadding="0" cellspacing="0">
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
              <td><table width="100%"  border="0" cellspacing="0" cellpadding="2">
              <tr>
                  <td colspan="4">&nbsp;</td>
                </tr>
			   <tr>
              <td><a href="ManageNewsModule.php?hdnModuleId=<?=$_REQUEST['hdnModuleId']?>"><span class="txtBld_ornge">News Module</span></a>&nbsp;&gt;&gt;&nbsp;<span class="hdng_sandy">News Manager </span> </td>
            </tr>
			    <tr>
                  <td colspan="4">&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="4">
                  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="5%"><img src="Images/icon_news_32x32.jpg" alt="Image"/></td>
                      <td width="95%" class="hdng_sandy" valign="middle">News Manager (<?=$strGalleryName?>) </td>
                    </tr>
                  </table>
                  </td>
                </tr>
                <tr>
                  <td colspan="4" align="right">&nbsp;</td>
                </tr>
		<?php
	  $strBtnView = "";
	  	if(isset($_REQUEST['btnView']))
		{
			$strBtnView = "YES";
			$objNews->m_intEventId = $_REQUEST['lstEvents'];
			if($_REQUEST['lstLanguage'] !=0 )
				$objNews->m_intLangId = $_REQUEST['lstLanguage'];
			else
				$objNews->m_intLangId = $intLangId;
				
			if(isset($_REQUEST['txtSearch'])&& !empty($_REQUEST['txtSearch']))
			{
				$strSearch = $_REQUEST['txtSearch'];
				$objNews->m_strSearchWords = $strSearch;
				$objNews->m_intLangId = $intLangId;
				$objNews->m_intModuleID=$intModuleID;
				$arrNews = $objNews->NewsSearch();
			}
			else
			{
				$strSearch = "";
				$intNoEvent = 0;
				$objNews->m_intEventId = $intNoEvent;
				$objNews->m_intLangId = $intLangId;
				$arrNews = $objNews->GetNews($intModuleId);	
				
				//$strSearch = "";
				//$arrNews = $objNews->GetNews($intModuleId);
			}	
		}
		else 
		{
			$strSearch = "";
			$intNoEvent = 0;
			$objNews->m_intEventId = $intNoEvent;
			$objNews->m_intLangId = $intLangId;
			$arrNews = $objNews->GetNews($intModuleId);
		}
//********************************* Paging ******************************************//
		if($arrNews != FALSE)
		{
			$arrGlobalOptions = GetGlobalOptions();
			$arrRecGlobalOptions = mysql_fetch_object($arrGlobalOptions);
			$intPerPage = $arrRecGlobalOptions->RowsPerPage;
			if(isset($_REQUEST['intPage']))		//Getting Page No
				$intPage=$_REQUEST['intPage'];
			else
				$intPage=1; 			//Default Page is one
			
			if($arrNews != false && mysql_num_rows($arrNews))
				$intTotalReturned = mysql_num_rows($arrNews); 	//Total Records
			else $intTotalReturned = 0;
			
			$intPageCount = ceil($intTotalReturned/$intPerPage);   //Total Pages formed
			if($intPage==1) //Setting records Limit from 0 for ist page
				$intRecordStart = $intPage-1; 
			else 			//Calculate records start for other page	
				$intRecordStart = ($intPage-1)*$intPerPage; 
		}
///////////////////////***************End***************/////////////////////////
	  ?><tr>
                      <td align="left" class="txtBld_grn" <?php if(!$MultiLangCheck){?>style="visibility:hidden"<?php }?>>Select Language
                        <?php 
						if(isset($_REQUEST['lstLanguage']))
			  				$intLangId = $_REQUEST['lstLanguage'];
						else 
							$intLangId = $intLangId;
			  ?>
                        <select name="lstLanguage" onChange="return OnChange(this.form);">
                          <?php 
						   $arrLang = $objLang->GetLanguages();
						   if($arrLang != FALSE) 
						   { 
						     while($arrRecLang = mysql_fetch_object($arrLang))
							 {
						  ?>
							  <option value="<?=$arrRecLang->pkLangId?>" <?php if($arrRecLang->pkLangId == $intLangId) echo "selected"?>> <?=$arrRecLang->LangDesc?> </option>
						  <?php 
						    }
						  }
						  ?>
                        </select>&nbsp;</td>
						 <td align="right" valign="bottom">
                          <?
						//--------Checking For Right-----------//
						$objAdminUser->m_intUserId=$_SESSION['intUserId'];	
						$objAdminUser->m_objRoles->m_intRightId=47;
						if($objAdminUser->CheckRightForAdmin()==1)
						{
						?>
                          <a href="AddNews.php?hdnModuleId=<?=$intModuleId?>">Add News </a>
                        <? 	}?>
                        </td>
                      </tr>
				<tr><td colspan="2" align="center">
				<? include('../Includes/DisplayConfirmMessage.php');?>
				</td></tr>
				<tr>
					<td colspan="4">
		<?php 
		//echo $objNews->m_intLangId;
		if($arrNews != FALSE)
		{
		?>
                      <table width="100%"  border="0" cellspacing="0" cellpadding="2">
                        <tr>
                          <td width="24" align="left" class="TabHeading">
						  <input type="checkbox" name="chkAllUser" onclick="selectAll(tablesForm,'chkArrNewsId[]')" value="1" /></td>
                          <td width="96" align="left" class="TabHeading">Date &amp; Time </td>
                          <td width="95" align="left" class="TabHeading">Title</td>
                          <td width="153" align="left" nowrap class="TabHeading">Short Desc </td>
                          <td colspan="2" align="center" class="TabHeading">File</td>
                          <td colspan="2" align="center" class="TabHeading">Image</td>
                          <td width="63" align="center" class="TabHeading">Status</td>
                          <td width="105" align="center" class="TabHeading">Action</td>
                        </tr>
                        <?php 
			  $intChkNum = 1;
			  $intRowCounter = 1;
				if($arrNews != false && mysql_num_rows($arrNews))
				{	//if start
					mysql_data_seek($arrNews, $intRecordStart);
					for($i=0; $i<$intPerPage;$i++)
					{
						if($arrRecNews=mysql_fetch_object($arrNews))
						{
					$intLangId = $arrRecNews->pkLangId;
					$objNews->m_intNewsId = $arrRecNews->pkNewsId;
					$arrNewsImage  = $objNews->GetNewsImage();
					if($arrNewsImage != FALSE)
					{
						$arrRecNewsImage = mysql_fetch_object($arrNewsImage);
						$intNewsImgId  = $arrRecNewsImage->pkNewsImageId;
						$strNewsImgName  = $arrRecNewsImage->ImageName;
					}
					else
					{
						$intNewsImgId  = 0;
						$strNewsImgName  = "";
					}
					$arrNewFile=$objNews->GetNewsFile();
					if($arrNewFile != FALSE)
					{
						$recNewsFile = mysql_fetch_object($arrNewFile);
						$intNewsFileId  = $recNewsFile->pkNewsFileId;
						$strNewsFileName  = $recNewsFile->FileName;
						$intNewsLangId	=	$recNewsFile->fkLangId;
					}
					else
					{
						$intNewsFileId  = 0;
						$strNewsFileName  = "";
						$intNewsLangId=1;
					}
			  ?>
			  <tr id="cg" valign="middle" onclick="checkrow(<?=$arrRecNews->pkNewsId?>);"
				<?php 
				if($nCount % 2 == 0)
				{
					echo "class='bg_ltGrey' onMouseOver=\"this.className='bg_rollOver'\" onMouseOut=\"this.className='bg_ltGrey'\""; 
				}
				else
				{
				echo " class='bg_ltGreen' onMouseOver=\"this.className='bg_rollOver'\" onMouseOut=\"this.className='bg_ltGreen'\"" ;
				}
			   ?>> 
                          <td align="left" class="brdr_dotedLt">
                            <input name="chkArrNewsId[]" type="checkbox" id="chkArrNewsId_<?=$arrRecNews->pkNewsId?>" value="<?=$arrRecNews->pkNewsId?>" onclick="checkrow(<?=$arrRecNews->pkNewsId?>);"></td>
                          <td align="left" class="brdr_dotedRt"><?php echo datetime($arrRecNews->NewsDate); ?>                          </td>
                          <td align="left" class="brdr_dotedRt">
						  <?
						  $strNewsTitle = stripslashes($arrRecNews->NewsTitle);
						  if (!empty($strNewsTitle)) echo $strNewsTitle; else echo "&nbsp;";
						  ?>                          </td>
                          <td class="brdr_dotedRt">
  						  <?
						  $strShortDesc = substr(stripslashes($arrRecNews->ShortDesc),0,30);
						  if (!empty($strShortDesc)&& isset($strShortDesc)) echo $strShortDesc; else echo "&nbsp;";
						  ?>                          </td>
                          <td width="53" align="right" class="brdr_dotedBtm" >
                        <?php 
						//--------Checking For Right-----------//
						$objAdminUser->m_intUserId=$_SESSION['intUserId'];	
						$objAdminUser->m_objRoles->m_intRightId=162;
						if($objAdminUser->CheckRightForAdmin()==1)
						{
                            ?>
							<a href="AddNewsFile.php?NewsFileId=<?=$intNewsFileId?>&NewsId=<?=$arrRecNews->pkNewsId?>&LangId=<?=$arrRecNews->fkLangID?>&hdnModuleId=<?=$intModuleId?>">
						<img src="Images/btn_add.gif"alt="Add Image" width="32" height="32"  title="Add News File">                        </a><? }?>&nbsp;</td>
                          <td width="61" align="left" class="brdr_dotedRt" >
							<?
							$rsTotalNews = $objNews->GetNewsFiles($arrRecNews->pkNewsId);
							if ($rsTotalNews && mysql_num_rows($rsTotalNews)>0)
								echo "(".mysql_num_rows($rsTotalNews),")"; 
							?>
                          &nbsp;</td>
                        <td width="65" align="right" class="brdr_dotedBtm">
                            <?php //if(!empty($strNewsImgName)) {?>
<?
						//--------Checking For Right-----------//
						$objAdminUser->m_intUserId=$_SESSION['intUserId'];	
						$objAdminUser->m_objRoles->m_intRightId=48;
						if($objAdminUser->CheckRightForAdmin()==1)
						{
?>
						<a href="AddNewsImage.php?w=60&NewsImgId=<?=$intNewsImgId?>&NewsId=<?=$arrRecNews->pkNewsId?>&hdnModuleId=<?=$intModuleId?>"><img src="Images/btn_add.gif" alt="Add Image" width="32" height="32" title="Add News Image">                        </a>
					<? 	}?>
                    &nbsp;</td>
					    <td width="46" align="left" class="brdr_dotedRt">
						<?
							$rsTotalNews = $objNews->getNewsImgInfo2($arrRecNews->pkNewsId);
							if ($rsTotalNews && mysql_num_rows($rsTotalNews)>0)
								echo "(".mysql_num_rows($rsTotalNews),")"; 
						?>
                        &nbsp;</td>
					    <td align="center" class="brdr_dotedRt"><?php 
					if( $arrRecNews->IsActive == 1)
					{
					?>
              Active
                <?php 
					}
					else
					{
					?>
              De Active
              <?php } ?></td>
                          <td align="right" valign="middle" class="brdr_dotedRt">
                          <table width="100%"  border="0" cellspacing="2" cellpadding="0">
                              <tr align="center">
                                <td width="33%" valign="top">
                                  <?
						//--------Checking For Right-----------//
						$objAdminUser->m_intUserId=$_SESSION['intUserId'];	
						$objAdminUser->m_objRoles->m_intRightId=50;
						if($objAdminUser->CheckRightForAdmin()==1)
						{
?>
                                  <a href="EditNews.php?NewsId=<?=$arrRecNews->pkNewsId?>&hdnModuleId=<?=$intModuleId?>"><img src="Images/btn_edit.gif" title="Edit News Info" alt="Edit News Info" width="32" height="32" border="0"></a>
                                  <? }?>                                  </td>
                                <td width="33%" valign="top">
                                  <?
						//--------Checking For Right-----------//
						$objAdminUser->m_intUserId=$_SESSION['intUserId'];	
						$objAdminUser->m_objRoles->m_intRightId=51;
						if($objAdminUser->CheckRightForAdmin()==1)
						{
?>
                                  <a href="ViewNewsDetail.php?NewsId=<?=$arrRecNews->pkNewsId?>&LangId=<?=$arrRecNews->fkLangID?>&hdnModuleId=<?=$intModuleId?>"><img src="Images/btn_view.gif"  title="View News" alt="View News" width="32" height="32" border="0"></a>
                                  <?  }?>                                </td>
                                <td width="17%" valign="top" <?php if(!$MultiLangCheck){?>style="visibility:hidden"<?php }?>>
                                  <?
						//--------Checking For Right-----------//
						$objAdminUser->m_intUserId=$_SESSION['intUserId'];	
						$objAdminUser->m_objRoles->m_intRightId=52;
						if($objAdminUser->CheckRightForAdmin()==1)
						{
						if($MultiLangCheck)
							{
?>
							<a href="TranslateNews.php?NewsId=<?=$arrRecNews->pkNewsId?>&LangId=<?=$objNews->m_intLangId?>&hdnModuleId=<?=$intModuleId?>"><img src="Images/btn_translate.gif" alt="Transtlate News" title="Transtlate News"  height="32" width="32" border="0"></a>
							<?
							}
						}?>                        </td>
                              </tr>
                            </table>
                           <?php
						$intChkNum++;
						$intRowCounter++;
						} //end if
						} //end if
						?>                        </td>
                        </tr>
                        <TR>
                          <TD align="left" colspan="10">
                            <input type="hidden" name="hdnLangId"  id="hdnLangId" value="<?=$intLangId ?>">
                            <input type="hidden" name="hdnEventId"  id="hdnEventId" value="<?=$intEventId ?>">
                            <input type="hidden" name="hdnBtnView"  id="hdnBtnView" value="<?=$strBtnView?>">
                            <input type="hidden" name="hdnPage"  id="hdnPage" value="<?=$intPage?>">
                            <input type="hidden" name="hdnModuleId"  id="hdnModuleId" value="<?=$intModuleId?>">							
					
                            <?
						//--------Checking For Right-----------//
						$objAdminUser->m_intUserId=$_SESSION['intUserId'];	
						$objAdminUser->m_objRoles->m_intRightId=54;
						if($objAdminUser->CheckRightForAdmin()==1)
						{
?>
                            <input name="btnActive" type="submit" value="  " class="btnActive" title="Activate Selected">
                            <? }?>
                            <?
						//--------Checking For Right-----------//
						$objAdminUser->m_intUserId=$_SESSION['intUserId'];	
						$objAdminUser->m_objRoles->m_intRightId=55;
						if($objAdminUser->CheckRightForAdmin()==1)
						{
?>
                            <input name="btnDeActive" type="submit" class="btnDActive" id="btnDeActive" value=" " title="De-Activate Selected">
                            <? }?>
                            <?
						//--------Checking For Right-----------//
						$objAdminUser->m_intUserId=$_SESSION['intUserId'];	
						$objAdminUser->m_objRoles->m_intRightId=56;
						if($objAdminUser->CheckRightForAdmin()==1)
						{
?>
                            <input name="btnDel" type="submit" class="btnDel" id="btnDel" onClick="return confirm('Are you sure to delete selected news?')" value=" " title="Delete Selected"></TD>
                          <? }?>
                        </TR>
                      </table>
            	   <?php 
					}//End for
					?>
                  </td>
                </tr>
           		  <?
				  if(!isset($_REQUEST['hdnSrc']))	//No Paging incase Of Search
					  {$strQueryStr = "hdnModuleId=".$_REQUEST['hdnModuleId'];
					?>	<tr>
						  <td colspan="4"><? print GeneralPaging($intPage,$intPageCount,$strQueryStr);?></td>
						</tr>
					<?
					}
			}	// end if
			else
			print "<tr><td colspan='5' align='center'><span class=txt_red align='left'>No Record Found!</span></td></tr>";
			?>
              </table></td>
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