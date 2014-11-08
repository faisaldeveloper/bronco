<?
require_once("../Includes/BackOfficeIncludesFiles.php");
//--------------Checking for right---------------------
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=5;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{
///////////// Initialization ///////////////////
	$nLangId = $_SESSION['intLangId'];

	$strSearch='';
if(isset($_REQUEST['txtSearch']) && !empty($_REQUEST['txtSearch'])) 
	$strSearch=$_REQUEST['txtSearch'];
if($strSearch!='')
{
	$objEmployeer->m_strContactPerson=$strSearch;
	$rsEmployee=$objEmployeer->GetEmployeerByName();
}
else
	$rsEmployee=$objEmployeer->GetAllEmployeer();
}
/////////////////Get page limit set from options///////////////
$arrGlobalOptions = GetGlobalOptions();
$arrRecGlobalOptions = mysql_fetch_object($arrGlobalOptions);
$intPerPage = $arrRecGlobalOptions->RowsPerPage;
//////
	if(isset($_REQUEST['intPage']))		//Getting Page No
		$intPage=$_REQUEST['intPage'];
	else
		$intPage=1; 			//Default Page is one
	if($rsEmployee != false && mysql_num_rows($rsEmployee))
	$intTotalReturned = mysql_num_rows($rsEmployee); 	//Total Records
	else $intTotalReturned = 0;
	$intPageCount = ceil($intTotalReturned/$intPerPage);   //Total Pages formed
	if($intPageCount<$intPage)
	$intPage--;
	if($intPage==1) //Setting records Limit from 0 for ist page
		$intRecordStart = $intPage-1; 
	else 			//Calculate records start for other page	
		$intRecordStart = ($intPage-1)*$intPerPage; 
	  ///////////////////////***************End***************/////////////////////////
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?><?=CONST_BACKOFFICE_TITLE_END?></title>
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
    <table width="100%" border="0" cellspacing="0" cellpadding="2">
	  <tr>
	    <td class="hdng_sandy">Employer Area</td>
	    </tr>
	  <tr>
	    <td align="right"></td>
	    </tr>
	  <tr>
	    <td align="right"><form name="frmSearc" method="post" action="">
	      Search By Name:
	      <input type="text" name="txtSearch" id="txtSearch" value="<?=$strSearch?>">
	      <input name="button" type="submit" class="button" id="button" value="View">
        </form></td>
	    </tr>
	  <tr>
	    <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
	      <tr>
	       <td  class="TabHeading">Name</td>
           <td  class="TabHeading">Company Name</td>
           <td  class="TabHeading">Email</td>
           <td  class="TabHeading">State</td>
           <td  class="TabHeading">Phone No</td>
           <td  class="TabHeading">Address</td>
           <td  class="TabHeading">Action(Total Jobs)</td>
	        </tr>
            <?
			$sr=1;
			if($rsEmployee!=FALSE && mysql_num_rows($rsEmployee)>0)
			{
				mysql_data_seek($rsEmployee, $intRecordStart);
				for($i=0; $i<$intPerPage;$i++) 
				 if($rowEmployee=mysql_fetch_object($rsEmployee))
				   {	// if for record fetch
					$nEmpId=$rowEmployee->pkEmpId;
					$strEmpName=$rowEmployee->ContactPerson;
					$strEmpCompName=$rowEmployee->CompanyName;
					$strEmpEmail=$rowEmployee->Email;
					$nEmpStateId=$rowEmployee->fkStateId;
					$objState->m_npkStateId=$nEmpStateId;
					$rsState=$objState->GetStateById();
					$rowSql=mysql_fetch_object($rsState);
					$strEmpState=$rowSql->StateName;
					$nEmpTelePhone=$rowEmployee->TelePhone;
					$nstrWebSiteUrl=$rowEmployee->WebSiteUrl;
					$nstrEmpAddress=$rowEmployee->Address;
			?>
	      <tr <?php 
				if($sr % 2 == 0)
				{
					echo "class='bg_ltGrey' onMouseOver=\"this.className='bg_rollOver'\" onMouseOut=\"this.className='bg_ltGrey'\""; 
				}
				else
				{
				echo " class='bg_ltGreen' onMouseOver=\"this.className='bg_rollOver'\" onMouseOut=\"this.className='bg_ltGreen'\"" ;
				}
			   ?>
          >
	        <td class="brdr_dotedLt"><?=$strEmpName?></td>
            <td class="brdr_dotedLt"><?=$strEmpCompName?></td>
            <td class="brdr_dotedLt"><?=$strEmpEmail?></td>
            <td class="brdr_dotedLt"><?=$strEmpState?></td>
            <td class="brdr_dotedLt"><?=$nEmpTelePhone?></td>
            <td class="brdr_dotedLt"><?=$nstrEmpAddress?></td>
             <td class="brdr_dotedRt">
             <?php
             $objJob->m_nfkEmpId=$nEmpId;
			$rsJobs=$objJob->GetJobByEmpId();
			if($rsJobs!=FALSE && mysql_num_rows($rsJobs)>0)
				$nToatlJobs = mysql_num_rows($rsJobs);
			else
				$nToatlJobs = 0;
			 ?>
             <a href="ViewJobs.php?hdnEmpId=<?=$nEmpId?>">View Jobs(<?=$nToatlJobs?>)</a></td>
	        </tr>
            
            <? $sr++; }
			
			//if(!isset($_REQUEST['txtSearch']))	//No Paging incase Of Search
				{
			?>
				<tr>
				<td colspan="3"><? print GeneralPaging($intPage,$intPageCount,$strQueryStr);?></td>
				</tr>
			<?
				}
			}
			else
			{
			?>
			<tr>
			<td  class='txt_red' align="center">
			<? print "No record found!"; ?></td>
		<?	} ?>
	      </table></td>
	    </tr>
	  <tr>
	    <td>&nbsp;</td>
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
<--