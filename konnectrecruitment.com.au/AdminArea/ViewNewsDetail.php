<?php
require_once("../Includes/BackOfficeIncludesFiles.php");
//--------------Checking for right---------------------
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=51;

if($objAdminUser->CheckRightForAdmin()==1)
{
	$IconsDirectory="../Images/";
	/////////////////creating objectsof classes///////////////
	$objNews = new clsNews();
	/////////////////////Initialization////////////////////////
	$intLangId = $_SESSION['intLangId'];
	$intNewsId = "";
	$dtNewsDate = "";
	$dtNewsTime = "";
	$strNewsTitle = "";
	$strShortDesc = "";
	$strLongDesc = "";
	$intNewsImageId = "";
	$strNewsImageName = "";
	$intNewsFileId = "";
	///////////Getting values from the query string////////////
	if(isset($_REQUEST['LangId'])&&!empty($_REQUEST['LangId']))
		$intLangId = $_REQUEST['LangId'];
	if(isset($_REQUEST['NewsId']))
		$intNewsId = $_REQUEST['NewsId'];
	$intModuleID=$_REQUEST['hdnModuleId'];
	/////////Transfering values to class variables///////////////
	$objNews->m_intLangId = $intLangId;
	$objNews->m_intNewsId = $intNewsId;
	$arrNews = $objNews->GetNewsById();
	if($arrNews != FALSE)
	{
		$arrNewsRec = mysql_fetch_object($arrNews);
		$dtNewsDate = $arrNewsRec->NewsDate;
		$dtNewsTime = $arrNewsRec->NewsTime;
		$strNewsTitle = $arrNewsRec->NewsTitle;	
		$strShortDesc = $arrNewsRec->ShortDesc;
		$strLongDesc = $arrNewsRec->LongDesc;
	
		$arrNewsImage = $objNews->GetNewsImage();
		if($arrNewsImage != FALSE)
		{
			$arrRecNewsImage = mysql_fetch_object($arrNewsImage);
			//print_r($arrRecNewsImage);
			$intNewsImageId = $arrRecNewsImage->pkNewsImageId; 
			$strNewsImageName = $arrRecNewsImage->ImageName; 
		}
		else
		$strNewsImageName = NULL; 
	
		$arrNewsFile = $objNews->GetNewsFile();
		if($arrNewsFile != FALSE)
		{
			$arrRecNewsFile = mysql_fetch_object($arrNewsFile);
			//print_r($arrRecNewsFile);
			$intNewsFileId = $arrRecNewsFile->pkNewsFileId; 
			$strNewsFileName = $arrRecNewsFile->FileName; 
		}
		else
		$strNewsFileName = NULL; 
	}
	else 
	{
		$dtNewsDate = NULL;
		$dtNewsTime = NULL;
		$strNewsTitle = NULL;	
		$strShortDesc = NULL;
		$strLongDesc = NULL;
	}
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?>News Details<?=CONST_BACKOFFICE_TITLE_END?></title>
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
	<!-- InstanceBeginEditable name="body" --><br>
     <table width="100%"  border="0" cellspacing="2" cellpadding="0">
	  <?
      if($objAdminUser->CheckRightForAdmin()!=1)
        {
        ?>
        <tr>
          <td class="txtBld_ornge">You are not authorised to view this page. <a href="<?=$_SERVER['HTTP_REFERER']?>">&gt;&gt;&nbsp;Back </a></td>
        </tr>
        <?
        }
        else {
        ?>		  
        <tr align="left">
          <td colspan="5"><span class="txtBld_ornge"><a href="ManageNews.php?hdnModuleId=<?=$intModuleID?>">News Manager</a></span>&nbsp;&gt;&gt;&nbsp;<span class="hdng_sandy">News Details</span></td>
          </tr>
          <tr>
          <td>
          <table width="99%"  border="0" align="center" cellpadding="0" cellspacing="2" class="TabBorderLightGreyBG">
            <tr align="left">
              <td colspan="5" class="hdng_sandy">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2" rowspan="5" align="right" valign="top"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                   <tr>
                      <td align="left">
					  <?php
						list($d,$t) = explode(" ",$dtNewsDate);
						list($y,$m,$d) = explode("-",$d);
						echo "<span class='txtBld_ornge'>Dated :</span> ${d}.${m}.${y}";
						?>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<span class='txtBld_ornge'>Time :</span> <?=$dtNewsTime?></td>
                    </tr>
                    <tr>
                      <td align="left" class="txtBld_grey">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="left" class="hdng_grn">
                        <?=$strNewsTitle?>                     </td>
                    </tr>
                    <tr>
                      <td align="left" class="txtBld_grey">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="left" class="txtBld_grey"><?=$strShortDesc?></td>
                    </tr>
                    <tr>
                      <td align="left" class="txtBld_grey">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="left"><?=stripslashes($strLongDesc)?></td>
                    </tr>
              </table></td>
			  <?php } //End of else
			  ?>
              <td width="1%"><span class="txtBld_grn">
                </span></td>
              <td width="35%" align="center" valign="top"><?php if($strNewsImageName == NULL) echo "&nbsp;"; else{?>
                <img src="../PhpThumb/phpThumb.php?src=../NewsFiles/<?=$strNewsImageName?>&w=300"></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td align="center" valign="top"><span class="txtBld_grey">
			  <? 
			  if($strNewsImageName == NULL) echo "&nbsp;";
			  else if(isset($arrRecNewsImage->ImageDesc) && !empty($arrRecNewsImage->ImageDesc))
				echo "Desc :".$arrRecNewsImage->ImageDesc;
				?>
              </span></td>
            </tr>
            <tr>
              <td colspan="3" align="center" valign="middle">&nbsp;</td>
              </tr>
            <tr>
              <td>&nbsp;</td>
              <td colspan="2" align="left" valign="top"></td>
            </tr>
            <tr>
              <td colspan="3">&nbsp;</td>
              </tr>
          <?
		  if(isset($arrNewsImage))
		  if(mysql_num_rows($arrNewsImage)>0)
		  {
		   ?>
		   <tr align="left" valign="top">
		   <td colspan="5" class="txtBld_blue"><? if(mysql_num_rows($arrNewsImage)>1) {?>News Images <? }?></td>
		   </tr>
		    <tr align="left" valign="top">
              <td colspan="5">
			  <table><tr><td><?
			  $nCounter=0;
			  while($arrRecNewsImage = mysql_fetch_object($arrNewsImage))
			  {
			  $nCounter++;
				$strNewsImageName = $arrRecNewsImage->ImageName; 
			  	?>
				<table><tr><td>
			  	 <img src="../PhpThumb/phpThumb.php?src=../NewsFiles/<?=$strNewsImageName?>&w=100&h=100">
				</td></tr>
				<tr><td >
				<?
				if($arrRecNewsImage->ImageDesc!="")
				{
					echo "<span class='txtBld_grey'>Desc : </span>".$arrRecNewsImage->ImageDesc;
				}
				else 
				echo "<span class='txtBld_grey'>No Description.</span>";
				?>
				</td></tr></table>
				<?
				if($nCounter%6==0) echo "</td></tr><tr><td>";
				else echo "</td><td>";
				}//End of while
				?>
			  </td></tr></table>			  </td>
            </tr>
          <?
		  }//end of if statement of images
		 if($arrNewsFile!=NULL)
		 {
		 	if(mysql_num_rows($arrNewsFile)>0)
		  	{
		  ?>
		  	<tr>
			<td class="txtBld_blue">News File: </td>
			</tr>
			  <tr align="center" valign="top">
			  <td width="54%" align="left" valign="top" colspan="5">
				 <table>
				 <tr>
			<?
			  $nCounter=0;
			  mysql_data_seek($arrNewsFile,0);
			  while($arrRecNewsFile = mysql_fetch_object($arrNewsFile))
				{
				$nCounter++;
				
				$intNewsFileId = $arrRecNewsFile->pkNewsFileId; 
				$strNewsFileName =$arrRecNewsFile->FileName;
				?>
	
				  <td align="center">
				  <?
				  if($strNewsFileName!="")
				  {
					$ext=substr($strNewsFileName, -3, 3);
					if($ext=="txt")
					{
						$extImage="icon_txt.jpg";
					}else if($ext=="xls")
					{
						$extImage="icon_excel.jpg";
					}else if($ext=="pdf")
					{
						$extImage="icon_pdf.jpg";
					}else if($ext=="doc")
					{
						$extImage="icon_doc.jpg";
					}else 
						$extImage="";
				  ?>
				  <img src="<?=$IconsDirectory.$extImage?>"&w=100>
				  <?
				  }?>				  </td>
				  <?
			 // }
			  ?>
			  <td>
  <?
			   if($strNewsFileName!="")
			  {
			  	//echo $strNewsFileName;
			  	$strFName = explode('_',$strNewsFileName);
				$nFileNameLen=strlen($strFName[0]);
				$nFileNameLen = $nFileNameLen+1;
				$strFileName =substr($strNewsFileName, $nFileNameLen);     
				//echo $strFileName;
		?>
                <a href="DownloadFile.php?intFileName=<?=$strNewsFileName?>">
                <?=$strFileName?>
              </a>
			 <? }
			  ?>&nbsp;&nbsp;&nbsp;			  </td>
			  
		 <?
		 if($nCounter%6==0)echo "</tr><tr>";
		  }?></tr>
			  </table>			    </td>
				<?
				}
				}
				?>
			  </tr>
			  <?
			  }
			  ?>
		  </table>
        </td>
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