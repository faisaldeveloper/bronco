<?
	require_once("../Includes/BackOfficeIncludesFiles.php");
//--------------Checking for right---------------------
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=267;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{
	$objLanguage = new clsLanguage();	//Creating Language Object
	$_SESSION['intLangId'] = $objLanguage->GetDefaultLang();	//Setting Default Language
	$objConcept = new clsConcept();	 //Creating Concept Object
}//End Right If
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?>Concepts<?=CONST_BACKOFFICE_TITLE_END?></title>
<!-- InstanceEndEditable -->
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
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
		<?PHP
			/////////////////Get page limit set from options///////////////
		if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
		{
			$arrGlobalOptions = GetGlobalOptions();
			$arrRecGlobalOptions = mysql_fetch_object($arrGlobalOptions);
			$intPerPage = $arrRecGlobalOptions->RowsPerPage;
			$rsGetAllConcept = $objConcept->GetAllConcept();
			//////
				if(isset($_REQUEST['intPage']))		//Getting Page No
					$intPage=$_REQUEST['intPage'];
				else
					$intPage=1; 			//Default Page is one
				if($rsGetAllConcept != false && mysql_num_rows($rsGetAllConcept))
				$intTotalReturned = mysql_num_rows($rsGetAllConcept); 	//Total Records
				else $intTotalReturned = 0;
				$intPageCount = ceil($intTotalReturned/$intPerPage);   //Total Pages formed
				if($intPageCount<$intPage)
				$intPage--;
				if($intPage==1) //Setting records Limit from 0 for ist page
					$intRecordStart = $intPage-1; 
				else 			//Calculate records start for other page	
					$intRecordStart = ($intPage-1)*$intPerPage; 
	  ///////////////////////***************End***************/////////////////////////
	  }
    ?>
		<table width="98%"  border="0" align="center" cellpadding="2" cellspacing="0">
		  <?
		  if($objAdminUser->CheckRightForAdmin()!=1)//Start Right If
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
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr>
          	<td>
               <table width="100%">
                 <tr>
                   <td width="5%"><img src="Images/icon_concept_32x32.jpg" alt="Image"/></td>
                   <td width="95%" valign="middle"><span class="hdng_sandy">Concepts</span></td>
                 </tr>
               </table>
            </td>
          <tr>
            <td colspan="2" align="left" valign="top">
              <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
				   <td colspan="2"><? include('../Includes/DisplayConfirmMessage.php');?></td>
				</tr>
                 <tr>
                 	<td align="right" valign="bottom">
                 <?
                    $objConcept->m_intLangId=0;	//For all messages m_intLangId is 0
                    //--------Checking For Right-----------//
                    $objAdminUser->m_intUserId=$_SESSION['intUserId'];	
                    $objAdminUser->m_objRoles->m_intRightId=270;
                    if($objAdminUser->CheckRightForAdmin()==1)
                    {
                 ?>
                  <a href="AddConcept.php?intPage=<?=$intPageCount?>">Add New Concept</a>
                  <? } ?>
                </td>
              </tr>
                <tr>
                  <td colspan="3" align="left" valign="top">
                    <?PHP
					$rsConcept=$objConcept->GetAllConcept();
					if(mysql_num_rows($rsConcept)>0)  //If Records found
					{
					?>
                    <table width="100%"  border="0" cellspacing="0" cellpadding="2">
                      <tr>
                        <td width="4%" class="TabHeading">ID</td>
                        <td width="65%" class="TabHeading">Concept Desc</td>
                        <td colspan="3" align="center" class="TabHeading">Action</td>
                      </tr>
                      <?PHP
					$intRowCounter = 1;
					if($rsConcept != false && mysql_num_rows($rsConcept))
					{		//if start
						mysql_data_seek($rsConcept, $intRecordStart);
						for($i=0; $i<$intPerPage;$i++) 
						if($rowConcept=mysql_fetch_object($rsConcept))
						{	// if for record fetch
							$nConceptID= $rowConcept->pkConceptId;
							$strConceptDesc= $rowConcept->ConceptDesc;
					   ?>
                        
						<tr id="cg" valign="middle" 
						<?php 
						if($intRowCounter % 2 == 0)
						{
							echo "class='bg_ltGrey' onMouseOver=\"this.className='bg_rollOver'\" onMouseOut=\"this.className='bg_ltGrey'\""; 
						}
						else
						{
						echo " class='bg_ltGreen' onMouseOver=\"this.className='bg_rollOver'\" onMouseOut=\"this.className='bg_ltGreen'\"" ;
						}
					   ?>>
                          <td class="brdr_dotedRt"><?=$nConceptID?></td>
                          <td class="brdr_dotedRt"><?=$strConceptDesc?></td>
                          <td width="6%" align="right" class="brdr_dotedBtm">
                            <?
						//--------Checking For Right-----------//
						$objAdminUser->m_intUserId=$_SESSION['intUserId'];	
						$objAdminUser->m_objRoles->m_intRightId=272;
						if($objAdminUser->CheckRightForAdmin()==1)
						{
						?>						
						<form method="post" action="EditConcept.php">				
                            <input type="hidden" name="ConceptId" value="<?=$nConceptID?>">
							<input name="hdnPage" type="hidden" id="hdnPage" value="<?=$intPage?>">
							<input name="Submit" type="image" value="Edit" src="Images/btn_edit.gif" title="Edit Concept" width="32" height="32" border="0">
                        </form>
						<?
						}
							else print"&nbsp;";?>
                          </td>
                          <td width="5%" align="left" class="brdr_dotedRt">
                        <?
						//--------Checking For Right-----------//
						$objAdminUser->m_intUserId=$_SESSION['intUserId'];	
						$objAdminUser->m_objRoles->m_intRightId=271;
						if($objAdminUser->CheckRightForAdmin()==1)
						{
						?>
						<form name="frm" method="post" action="DeleteConceptAction.php">				
                            <input type="hidden" name="hdnConceptId" value="<?=$nConceptID?>">
							<input name="hdnPage" type="hidden" id="hdnPage" value="<?=$intPage?>">
							<input name="Submit" type="image" value="Delete" src="Images/btn_delete.gif" title="Delete Concept" width="32" height="32" border="0" OnClick="return confirm('Are you sure?')">
                        </form>
						<?
						}
							else print "&nbsp;";?>
                          </td>
                        </tr>
                      <? 
					  $intRowCounter++;
					  	}	//end of record fetch
				if(!isset($_REQUEST['hdnSrc']))	//No Paging incase Of Search
				{
			?>
				<tr>
				  <td colspan="3"><? print GeneralPaging($intPage,$intPageCount,$strQueryStr);?></td>
				</tr>
			<?
				}
				?>
				 </table>
				<?	//end of num_rows
			 }
				
		  }	  // end of IF no record found
		  else print "No record found!";
			?>
			   </td>
			 </tr>
			</table>
		  </td>
		</tr>
<?
	}//End Right If
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