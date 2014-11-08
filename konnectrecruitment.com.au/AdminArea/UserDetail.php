<? 
	require_once("../Includes/BackOfficeIncludesFiles.php");
//--------------Checking for right---------------------
	$objAdminUser=new clsAdminUser();
	$objAdminUser->m_objRoles=new clsRoles();
	$objAdminUser->m_intUserId=$_SESSION['intUserId'];
	$objAdminUser->m_objRoles->m_intRightId=214;
	if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
	{
//////////////Creating class objects///////////
		$objUser = new clsUser();
		$objOrder=new clsOrders();
/////////////Initializating variables//////////////
		$strEmail=NULL;
		$strFName=NULL;
		$strLName=NULL;
		$strCompName=NULL;
		$strOrgNo=NULL;
		$strTelephone=NULL;
		$strBirthDate=NULL;
		$strDelStAdd=NULL;
		$strDelPostCode=NULL;
		$strDelState=NULL;
		$strInvStAdd=NULL;
		$strInvPostCode=NULL;
		$strInvState=NULL;
		$txtMessage=NULL;

////////////Getting values form query string////////
		$intCustId=$_REQUEST['intCustId'];
//////////Transfering valuse to class variables////////////
		$objUser->m_intUserId=$intCustId;
		$rowUserInfo=$objUser->GetUserById();
		$recUserInfo=mysql_fetch_object($rowUserInfo);
		if($recUserInfo!=FALSE)
			{
			$strEmail=$recUserInfo->Email;
			$strFName=$recUserInfo->FName;
			$strLName=$recUserInfo->LName;
			$strCompName=$recUserInfo->CompName;
			$strOrgNo=$recUserInfo->OrgNo;
			$strTelephone=$recUserInfo->Telephone;
			$strBirthDate=$recUserInfo->BirthDate;
			$strDelStAdd=$recUserInfo->DelStAdd;
			$strDelPostCode=$recUserInfo->DelPostCode;
			$strDelState=$recUserInfo->DelState;
			$strInvStAdd=$recUserInfo->InvStAdd;
			$strInvPostCode=$recUserInfo->InvPostCode;
			$strInvState=$recUserInfo->InvState;
			$txtMessage=$recUserInfo->Message;
			if ($strBirthDate!=NULL)
				list($y,$m,$d) = explode("-",$strBirthDate);
			}
	}//End Right If
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"><html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?>User Details<?=CONST_BACKOFFICE_TITLE_END?></title>
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
	<table width="99%"  border="0" align="center" cellpadding="2" cellspacing="0">
		  <?
		  if($objAdminUser->CheckRightForAdmin()!=1)//Start Right If
			{
			?>
    <tr>
              <td class="txtBld_ornge" colspan="2">You are not authorised to view this page. <a href="<?=$_SERVER['HTTP_REFERER']?>">&gt;&gt;&nbsp;Back </a></td>
            </tr>
			<?
			}
			else {
			?>
        <tr>
          <td colspan="3" align="Left" ><a href="ManageCustomers.php"><span class="txtBld_ornge"> Customers</span></a>&nbsp;&gt;&gt;&nbsp;<span class="hdng_sandy">Customer Details</span></td>
              </tr>
          <tr>
           <td>
			<table width="99%"  border="0" align="center" cellpadding="2" cellspacing="0" class="TabBorderLightGreyBG">
              <tr>
                <td align="right" class="txtBld_grey">&nbsp;</td>
                <td align="left" class="txtBld_grey">&nbsp;</td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td align="left">Customer No. </td>
                <td align="left"><?=$_REQUEST['intCustId']?></td>
              </tr>
        <!-- <tr align="left">
         <td>Payment method</td>
          <td align="left"><? //if ($nPaymentMethod==1) echo $msgCredit_Card; elseif($nPaymentMethod==2) echo $msgInvoice; elseif($nPaymentMethod==3) echo $msgCash;  elseif($nPaymentMethod==4) echo $msgDeliveryByCard;  elseif($nPaymentMethod==5) echo"forhåndsbetaling";  elseif($nPaymentMethod==6) echo $msgPrePayment; else echo"No/Wrong payment method selected";?>
         </td>
        </tr> -->
		 <tr align="left">
			<td colspan="2"><strong> Account Information</strong>
		  <input type="hidden" name="txtPageName" value="<? print substr($_SERVER['PHP_SELF'],(strrpos($_SERVER['PHP_SELF'],"/")+1));?>"></td>
        </tr>
        <tr>
          <td width="45%">Email</td>
          <td width="55%"><?=$strEmail?></td>
        </tr>
        <tr>
          <td height="10"></td>
          <td></td>
        </tr>
        <tr>
          <td colspan="2"><strong> Customer Information</strong></td>
          </tr>
        <tr>
          <td> First Name</td>
          <td><?=$strFName?></td>
        </tr>
        <tr>
          <td> Last Name</td>
          <td><?=$strLName?></td>
        </tr>
        <tr>
          <td> Name/Company Name</td>
          <td align="left" valign="top"><?=$strCompName?></td>
        </tr>
        <tr>
          <td> Org. No.</td>
          <td><?=$strOrgNo?></td>
        </tr>
        <tr>
          <td> Telephone</td>
          <td><?=$strTelephone?></td>
        </tr>
        <tr>
          <td> Date of Birth (dd/mm/yyyy)</td>
          <td>
		  <? echo $d; echo"&nbsp;/&nbsp;"; echo $m; echo"&nbsp;/&nbsp;"; echo $y;  ?>          </td>
        </tr>
        <tr>
          <td height="10"></td>
          <td></td>
        </tr>
        <tr>
          <td colspan="2"><strong> Delivery Address</strong></td>
          </tr>
        <tr>
          <td> Street Address</td>
          <td><?=$strDelStAdd?></td>
        </tr>
        <tr>
          <td> Post Code / State</td>
          <td><?=$strDelPostCode?>&nbsp;&nbsp;/&nbsp;&nbsp;<?=$strDelState?></td>
        </tr>
        <tr>
          <td height="10"></td>
          <td></td>
        </tr>
        <tr>
          <td colspan="2"><strong> Invoice Address</strong></td>
          </tr>
        <tr>
          <td>Street Address</td>
          <td><?=$strInvStAdd?></td>
        </tr>
        <tr>
          <td>Post Code/State</td>
          <td><?=$strInvPostCode?>&nbsp;&nbsp;/&nbsp;&nbsp;<?=$strInvState?></td>
		  </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
			<?
				}//End Right If
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