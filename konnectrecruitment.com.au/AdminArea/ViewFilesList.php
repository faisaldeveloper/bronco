
<?php
include("../Includes/BackOfficeIncludesFiles.php");
//--------------Checking for right---------------------
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=296;

if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{
// **************************************Paging************************************************ //

	if(isset($_REQUEST['hdnModuleID']))
		$nModuleID=$_REQUEST['hdnModuleID'];
	elseif(!isset($_REQUEST['hdnModuleID']) || empty($_REQUEST['hdnModuleID']))
	{
		header("Location:ManageAudioVideoModule.php");
		exit;
	}
	
	$strGalleryName = $objFile->GetGalleryName($nModuleID);
	$objFile->m_intModuleID=$nModuleID;
	$rs = $objFile->GetAll();
	
//********************************* Paging ******************************************//
		if($rs != FALSE)
		{
			$arrGlobalOptions = GetGlobalOptions();
			$arrRecGlobalOptions = mysql_fetch_object($arrGlobalOptions);
			$intPerPage = $arrRecGlobalOptions->RowsPerPage;
			//echo $intPerPage;exit;
			if(isset($_REQUEST['intPage']))		//Getting Page No
				$intPage=$_REQUEST['intPage'];
			else
				$intPage=1; 			//Default Page is one
			
			if($rs != false && mysql_num_rows($rs))
				$intTotalReturned = mysql_num_rows($rs); 	//Total Records
			else $intTotalReturned = 0;
			
			$intPageCount = ceil($intTotalReturned/$intPerPage);   //Total Pages formed
			if($intPage==1) //Setting records Limit from 0 for ist page
				$intRecordStart = $intPage-1; 
			else 			//Calculate records start for other page	
				$intRecordStart = ($intPage-1)*$intPerPage; 
		}
///////////////////////***************End***************/////////////////////////


}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?><?=CONST_BACKOFFICE_TITLE_END?></title>



<script src="../Script/validation.js" type="text/javascript"></script>
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
   function checkrow(id)
	{
		id="chkFile_"+id;
	
		if(document.getElementById(id).checked==true)
			document.getElementById(id).checked=false;
		else
			document.getElementById(id).checked=true;
	}
function Validate(f)
{
	n=isCheck(f,'chkFile[]');
	if(n==true)
		return confirm("Are you sure you want to delete Selected?");
	else
	{ 
		alert("Please select a File");
		return false;
	}		
}
function selectAll(f,n,v) 
{

	if(window.document.forms[0].chkCheckAll.checked == true )
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
<table width="98%"  border="0" cellspacing="0" cellpadding="2" align="center">
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
	<tr>
		<td>&nbsp;</td>
	</tr>
		<tr>
			<td ><a href="ManageAudioVideoModule.php"><span class="txtBld_ornge">Audio/Video Module</span></a>&nbsp;&gt;&gt;&nbsp;<span class="hdng_sandy">Files List (<?=$strGalleryName?>)</span></td>
		    <td align="right">
			<?php
			  //--------------Checking for right---------------------
				$objAdminUser->m_objRoles=new clsRoles();
				$objAdminUser->m_intUserId=$_SESSION['intUserId'];
				$objAdminUser->m_objRoles->m_intRightId=301;
				
				if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
				{
			?>	
				<a href="AddFile.php?hdnModuleID=<?=$nModuleID?>&Type=<?=$_REQUEST['Type']?>">Add File</a>
			<?php 
				}
			?>
			</td>
		</tr>
		<tr>
			<td align="center" colspan="3"><? include('../Includes/DisplayConfirmMessage.php');?></td>
		</tr>
</table>
<?PHP 
	if(mysql_num_rows($rs)>0)
	{
?>
	<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
   	<tr>
    <td align="left" valign="top" >
	  <form name="frmMain" method="post" action="DeleteFile.php">
		<table width="98%"  border="0" align="center" cellpadding="0" cellspacing="0">
            <tr class="TabHeading">
              <td width="8%" align="center" class="txtBld_grey" height="20">
			  <input name="chkCheckAll" type="checkbox"  value="1" onClick="selectAll(frmMain,'chkFile[]');"></td>
              <td width="22%" height="10" align="left">File Title </td>
              <td width="24%" align="left">Image</td>
              <td width="46%" height="20" align="left">Short Desc </td>
			  <td width="46%" height="20" align="center">Action</td>
              </tr>
		<?php
			mysql_data_seek($rs,$intRecordStart);				
			for($nRec=0;$nRec<$intPerPage;$nRec++)
			{
				$row=mysql_fetch_object($rs);
				if(!empty($row))
				{
		?>
           <tr id="cg" valign="middle" onclick="checkrow(<?=$row->pkID?>);"
				<?php 
				if($nRec % 2 == 0)
				{
					echo "class='bg_ltGrey' onMouseOver=\"this.className='bg_rollOver'\" onMouseOut=\"this.className='bg_ltGrey'\""; 
				}
				else
				{
				echo " class='bg_ltGreen' onMouseOver=\"this.className='bg_rollOver'\" onMouseOut=\"this.className='bg_ltGreen'\"" ;
				}
			   ?>> 
              <td align="center" class="brdr_dotedLt">
			  <input name="chkFile[]" id="chkFile_<?=$row->pkID?>" type="checkbox" class="checkbox" value="<?=$row->pkID?>"   onclick="checkrow(<?=$row->pkID?>);">
			  </td>
              <td height="20" align="left" class="brdr_dotedRt">
				<a href="DetailFile.php?nFileId=<?=$row->pkID?>&hdnModuleID=<?=$_REQUEST['hdnModuleID']?>&Type=<?=$_REQUEST['Type']?>"><?php print $row->FileTitle;?></a>
			  &nbsp;</td>
			  <td align="center" class="brdr_dotedRt">
			  <?php
			  //echo "../UploadedFilesImages/".$row->pkID."_".$row->Image; 
			  if($row->Image!="" && is_file("../UploadedFilesImages/".$row->pkID."_".$row->Image)){
				list($width,$height,$type,$attr) = getimagesize("../UploadedFilesImages/".$row->pkID."_".$row->Image."");
			  ?>	
			  <a  href='#' onClick="window.open('PreviewImage.php?id='+'<?="../UploadedFilesImages/".$row->pkID."_".$row->Image.""?>&width=<?=$width?>','','width=<?=$width+50?>,height=<?=$height+90?>')">
			  		<img src="../PhpThumb/phpThumb.php?src=../UploadedFilesImages/<?=$row->pkID?>_<?=$row->Image?><? if($width>$height){?>&w=48<?php }else{?>&h=48<?php }?>"></a>
			  <? }?>
			  &nbsp;</td>
			  <td height="50" align="left" class="brdr_dotedRt"><?=$row->ShortDesc?></td>
			  <td height="50" align="left" class="brdr_dotedRt">
			  <table width="100%"  border="0" align="center" cellpadding="2" cellspacing="0">
          
                <tr >
                  <td width="8%" height="50" align="center" ><?php
						  //--------------Checking for right---------------------
							$objAdminUser->m_objRoles=new clsRoles();
							$objAdminUser->m_intUserId=$_SESSION['intUserId'];
							$objAdminUser->m_objRoles->m_intRightId=303;
							
							if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
							{
						?>
                      <a href="DetailFile.php?nFileId=<?=$row->pkID?>&hdnModuleID=<?=$nModuleID?>&Type=<?=$_REQUEST['Type']?>"><img src="Images/btn_view.gif" title="View Detail" width="32" height="32" border="0"></a>
                      <?
							}
							?>
                  </td>
                  <td width="7%" align="center"><?php
						  //--------------Checking for right---------------------
							$objAdminUser->m_objRoles=new clsRoles();
							$objAdminUser->m_intUserId=$_SESSION['intUserId'];
							$objAdminUser->m_objRoles->m_intRightId=300;
							
							if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
							{
							?>
                      <a href="EditFile.php?hdnFileId=<?=$row->pkID?>&hdnModuleID=<?=$nModuleID?>&Type=<?=$_REQUEST['Type']?>">
					  <img src="Images/btn_edit.gif" title="Edit" width="32" height="32" border="0"></a>
                      <?php
							}
							?>
                  </td>
                  <td width="8%" align="center" ><?php
						  //--------------Checking for right---------------------
							$objAdminUser->m_objRoles=new clsRoles();
							$objAdminUser->m_intUserId=$_SESSION['intUserId'];
							$objAdminUser->m_objRoles->m_intRightId=301;
							
							if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
							{  $strImgName = $row->pkID."_".$row->FileName;
							?>
                      <a href="DeleteFile.php?hdnFileId=<?=$row->pkID?>&hdnModuleID=<?=$nModuleID?>&strImageName=<?=$strImgName?>"><img src="Images/btn_delete.gif" title="Delete File" width="32" height="32" border="0" onClick="return confirm('Are you sure to delete?');"></a>
                      <?php
						  	}
						  ?>
                  </td>
                </tr>
				</table>
				</td>
				</tr>
                <?php
				}
			}
						
?>
        <tr>
	        <td height="20" colspan="6" align="left"></td>
        </tr>
            <tr>
              <td height="20" colspan="5" align="left">
				  <input name="Submit" type="submit" class="button" onClick="return Validate(this.form)" value="Delete Selected">
				  <input type="hidden" name="hdnModuleID" value="<?=$nModuleID?>">
			  </td>
            </tr>
        </table>	
    </form>	
	</td>
  </tr>
	  <?
      if(!isset($_REQUEST['hdnSrc']))	//No Paging incase Of Search
          {$strQueryStr = "hdnModuleID=".$_REQUEST['hdnModuleID'];
        ?>	<tr height="24" valign="bottom">
              <td colspan="5">
                <? print GeneralPaging($intPage,$intPageCount,$strQueryStr);?>
              </td>
            </tr>
        <?
        }

	}
	else
	{
	?>
	<table width="100%">
	<tr>
	  
	  <td  height="40" align="center" valign="bottom" class="txt_red">No record found</td>
	</tr>
	</table>
	<?
		}
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