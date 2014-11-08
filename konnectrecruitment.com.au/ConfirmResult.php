<?php
session_start();
require_once('Includes/Constants.php');
require_once("Includes/FrontIncludes.php");
require_once("Includes/CreditCardConst.php");
require_once("Includes/nusoap.php");

$objOrders = new clsOrders();
$objOrders->m_objProd = new clsProducts();
$objOrders->m_objProd->m_objLang = new clsLanguage();
$objOrders->m_objUser = new clsUser();

if(!isset($_SESSION['intLangId']))	
	$_SESSION['intLangId'] = $objOrders->m_objProd->m_objLang->GetDefaultLangId();

require_once("Includes/Labels.php");

$bResult=Confirm( $intSiteId, $strNetaxeptPassword, (int)$_GET['PID']);			
//$bResult=Confirm( 1681, $strNetaxeptPassword, (int)$_GET['PID']);			
if($bResult)
{
	$objOrders->m_objProd->m_objLang->m_intLangId = $_SESSION['intLangId'];
	$rsOrder=$objOrders->GetOrderMasterByPayId((int)$_GET['PID']);
	if(mysql_num_rows($rsOrder)>0)	
	{
		$objRow=mysql_fetch_object($rsOrder);
		$intOrderId = $objRow->pkOrderId;
		$objOrders->m_intOrderId=$intOrderId;
		$strUserEmail=$objRow->Email;
		$strUserPhone=$objRow->Telephone;
		$strDeliveryName = stripslashes($objRow->Name);
		$strPhone = stripslashes($objRow->Telephone);
		$strDeliveryAdd1 = stripslashes($objRow->Address);
		$strDeliveryAdd2 = stripslashes($objRow->Address2);
		//$strCity = stripslashes($objRow->City);
		$strPostCode = stripslashes($objRow->PostCode); 
		$strLocation = stripslashes($objRow->Location); 
		$strMessage  =stripslashes($objRow->Message); 
		$strCompanyName = stripslashes($objRow->CompanyName);
		$strOrgNo = stripslashes($objRow->OrgNo);
		$strContPersonName = stripslashes($objRow->ContPersonName);
		$strContPersonPhone = stripslashes($objRow->ContPersonTel);
		$strContPersonEmail = stripslashes($objRow->ContPersonEmail);
		$strFax = stripslashes($objRow->Fax);
		$intOrderStatus = (int)($objRow->OrderStatus);
		$intDeliveryCharges = stripslashes($objRow->DeliveryCharges);
		$intPayMode = $objRow->PaymentMode;
		
		if($intPayMode == 1) $strPayMode = $msgCredit_Card;
		else if($intPayMode == 2) $strPayMode = $msgInvoice;
		else  if($intPayMode == 3) $strPayMode = $msgCash;
		else $strPayMode = $msgDeliveryByCard;
		
		$strOrderDate = stripslashes($objRow->OrderDate);
		$intSumDis = $objRow->SumDis;
		$intGroupDis = $objRow->GroupDis;
		$intFreightAmt = $objRow->FreightAmt;
		list($y,$m,$d) = explode("-",$strOrderDate);
		list($hrs,$min,$sec) = explode(":",$objRow->OrderTime);
		$strTime = $hrs.":".$min;
		$hrs = date("G")+1;
		$mins = date("i");
		if($hrs==24) $hrs="00";
		$TotalAmount = 0;
		$arrOrder = $objOrders->GetOrderDetailByUser();
			/***
		themes email header
	***/
	$objTheme = new clsTheme();
	$objTheme->m_nLangID=$_SESSION['intLangId'];
	$rsTheme = $objTheme->SelectActiveTheme();
	if($rsTheme!=false && mysql_num_rows($rsTheme)>0)
	{
		$objThemeDetail = mysql_fetch_object($rsTheme);
		$strEmailHeader=$objThemeDetail->EmailHeader;
	}
		
		//-----------------------------------------------------------
		$ExternalTable =  "<table width='100%' border='0' cellpadding='0' cellspacing='0'>
		<tr><td>";
		$UserTab = "
		<style type='text/css'>
		<!--
		.body {
			font-family: Verdana, Geneva, Arial, helvetica, sans-serif;
			font-size: 11px;
			color: #000000;
			top:0px;
			left:0px;
			right:0px;
			bottom:0px;
		}
		.Heading {
			font-family: Verdana;
			font-size: 14px;
			color: #000000;
		}
		.body_Bold {
			font-family: Verdana, Arial, Helvetica, sans-serif;
			font-size: 11px;
			font-weight: bold;
			color: #000000;
		}
		.TabHead {
			font-family: Verdana, Arial, Helvetica, sans-serif;
			font-size: 11px;
			font-weight: bold;
			color: #FFFFFF;
			BACKGROUND-COLOR: #999999;
		}
		.TabBorder {
			border: 1px solid #CCCCCC;
		}
		.DarkRow{
			BACKGROUND-COLOR: #CCCCCC;
		}
		.LightRow{
			BACKGROUND-COLOR: #EEEEEE;
		}
		-->
		</style>";
		if(empty($strEmailHeader))
	{
		$UserTab.="
		<table width= '80%'  border='0'>
		 <tr>
			<td><img src='".DEFAULT_EMAIL_HEADER."'>&nbsp;</td>
	    </tr>
		<tr>
			<td>&nbsp;</td>
	    </tr>
		</table>
		";
	}
		
		$UserTab .="
		<table width='100%' border='0' cellpadding='0' cellspacing='0' class='body'>
		 <tr>
			<td>
				<table width= '100%'  border='0'>
				 <tr>
					<td>".$strEmailHeader."</td>
				</tr>
				</table>
			</td>
	    </tr>
		  <tr>
			<td colspan=2 align='left' ><strong>${msgInvoice_heading}</strong></td>
		  </tr>
		  <tr>
			<td width='20%' align='left' >${msgOrder_Number}</td>
			<td width='80%' align='left' >${intOrderId}</td>
		  </tr>
		  <tr>
			<td height='24' align='left' >${msgPayment_method}</td>
			<td align='left' >".$strPayMode."</td>
		  </tr>
		  <tr>
			<td height='24' align='left' >${msgOrder_Date}</td>
			<td align='left' >".date("d").".".date("m").".".date("Y")."</td>
		  </tr>
		  <tr>
			<td height='24' align='left' >${msgOrder_Time }</td>
			<td align='left' >".date("G").":".date("i")."</td>
		  </tr>
		  <tr>
			<td colspan='2' >&nbsp;</td>
		  </tr>
		  <tr>
			<td colspan='2' class='body_Bold'>".$msgBill_To." ${msgWings}</td>
		  </tr>
		  <tr>
			<td colspan='2' >&nbsp;</td>
		  </tr>";
		  ?>
		  <?php
		  if($IsBCustomer)
		  {
		  $UserTab .= "
		  <tr>
			<td align='left' class='topBorderOnly'>".$msgCompany_Name."</td>
			<td align='left' class='PageBody'>${strCompanyName}</td>
		  </tr>
		  <tr>
			<td align='left' class='topBorderOnly'>".$msgOrg_no."</td>
			<td align='left' class='PageBody'>${strOrgNo}</td>
		  </tr>
		  <tr>
			<td align='left' class='topBorderOnly'>".$msgContactPersonName."</td>
			<td align='left' class='PageBody'>${strContPersonName}</td>
		  </tr>
		  <tr>
			<td align='left' class='topBorderOnly'>".$msgContactPersonphone."</td>
			<td align='left' class='PageBody'>${strContPersonPhone}</td>
		  </tr>
		  <tr>
			<td align='left' class='topBorderOnly'>".$msgContactPersonemail."</td>
			<td align='left' class='PageBody'>${strContPersonEmail}</td>
		  </tr>
		  <tr>
			<td align='left' class='topBorderOnly'>".$msgfax."</td>
			<td align='left' class='PageBody'>${strFax}</td>
		  </tr>";
		  ?>
		  <?php
		  }
		  else
		  {
		  $UserTab .= "
		  <tr>
			<td align='left' class='topBorderOnly'>${msgDelivery_Name}</td>
			<td align='left' class='PageBody'>${strDeliveryName}</td>
		  </tr>";
		  ?>
		  <?php
		  }
		 $UserTab .= "
		  <tr>
			<td align='left' class='topBorderOnly'>${msgDelivery_Address}</td>
			<td align='left' class='topBorderOnly'>${strDeliveryAdd1}</td>
		  </tr>
		  <tr>
			<td align='left' class='topBorderOnly'>${msgDelivery_Address2}</td>
			<td align='left' class='topBorderOnly'>${strDeliveryAdd2}</td>
		  </tr>
		  <tr>
			<td align='left' class='topBorderOnly'>".$msgLocation."</td>
			<td align='left' class='topBorderOnly'>${strLocation}</td>
		  </tr>
		  <tr>
			<td align='left' class='topBorderOnly'>${msgDelivery_Post_code}</td>
			<td align='left' class='topBorderOnly'>${strPostCode}</td>
		  </tr>
		  <tr>
			<td align='left' class='topBorderOnly'>${msgDelivery_Email}</td>
			<td align='left' class='topBorderOnly'>${strUserEmail}</td>
		  </tr>
		  <tr>
			<td align='left' class='topBorderOnly'>${msgDelivery_Phone}</td>
			<td align='left' class='topBorderOnly'>${strUserPhone}</td>
		  </tr>
		  <tr>
			<td align='left' class='topBorderOnly'>${msgMessage}</td>
			<td align='left' class='topBorderOnly'>${strMessage}</td>
		  </tr>
		  <tr>
			<td align='left' class='topBorderOnly' colspan=2>&nbsp;</td>
		  </tr>
	  </table>";
		//-------------------------------------------------------------
		$Table1 = "";
		$Table = "<table width='100%' border='0' cellpadding='2' cellspacing='0' class='body'>
					<tr>
						<td align='left' colspan=9><strong>${msgOrder_Details}</strong></td>
					</tr>
					<tr class='TabHead'>
						<td align='left' width='10%' nowrap>".$msgCode."</td>
						<td align='left' width='20%' nowrap>".$msgName."</td>
						<td align='center' width='5%' nowrap>".$msgQTY."</td>
						<td align='right' width='10%' nowrap>".$msgUnit_Price."(Kr).</td>
						<td align='right' width='10%' nowrap>".$msgAmount."(Kr).</td>
						<td align='right' width='10%' nowrap>".$msgDiscount."(Kr).</td>
						<td align='right' width='10%' nowrap>".$msgDisAmount."(Kr).</td>
					</tr>";
					$TotalDiscount = 0; $GTotal = 0;
					$c = 0;
		while($arrRecTempProds = mysql_fetch_object($arrOrder))
		{
			$objOrders->m_objProd->m_intProductId = $intProdId = $arrRecTempProds->fkProductId;
			$objOrders->m_objProd->m_strTransId = $strTransId = $arrRecTempProds->fkTransId;
			$objOrders->m_objProd->m_intQty = $intQty = $arrRecTempProds->Qty;
			$Discount = $arrRecTempProds->Discount;
			$objOrders->m_intDiscount = $Discount;
			$intProdPrice = $arrRecTempProds->ProdAmt;
			
			
			$arrProds = $objOrders->m_objProd->GetProductInfo();	
			if($arrProds != FALSE)
			{
				$arrRecProds = mysql_fetch_object($arrProds);
				$ProdCode = $arrRecProds->ProdNumber;
				$ProdName = $arrRecProds->ProdName;
				$CompCheck = $objOrders->m_objProd->CheckCompaignProd();
				if($CompCheck != FALSE)
					$ProdPrice= $arrRecProds->CamPrice;
				else 
					$ProdPrice= $arrRecProds->ProdPrice;
			}
			else
			{
				$ProdCode = NULL;
				$ProdName = NULL;
				$ProdPrice = 0;
			}
			
			$objOrders->m_intProdAmt = $ProdPrice;
			$objOrders->m_objProd->m_intPrice = $ProdPrice;
			$intAmount = ($ProdPrice)*($intQty);
			$GTotal += $intAmount;
			$WithDisAmount = ($ProdPrice)*($intQty)-$Discount;
			$TotalDiscount += $Discount;
			$TotalAmount += $WithDisAmount;//($ProdPrice)*($intQty);
			//------------------------------------------------
			if($c%2==0) $class = "class='LightRow'"; else $class = "class='DarkRow'";
			$Table1 .= "<tr ${class}>
							<td align='left' nowrap>".$ProdCode."</td>
							<td align='left' nowrap>".$ProdName."</td>
							<td align='center' nowrap>".$intQty."</td>
							<td align='right' nowrap> ".number_format($ProdPrice,2,',','')."</td>
							<td align='right' nowrap> ".number_format($intAmount,2,',','')."</td>
							<td align='right' nowrap> ".number_format($Discount,2,',','')."</td>
							<td align='right' nowrap> ".number_format($WithDisAmount,2,',','')."</td>
						</tr>";
			//-------------------------------------------------------
			$c++;	
		}// END WHILE REC STYLES
		if($intSumDis > 0) $DisplayDiscount = $intSumDis; else $DisplayDiscount = $TotalDiscount;
		$GrossTotal = $GTotal;
		$SubTotal = $GrossTotal - $DisplayDiscount;
		$NetAmount = $SubTotal - $intGpDis;
		$GrandTotal = $NetAmount + $intFreightAmt;
		$Table1 .= "<tr height=12>
			<td align='right' colspan=9></td>
		</tr>";
		$Table1 .= "<tr>
			<td align='right' colspan=8>".$msgGross_Total.":</td>
			<td align='right'>kr.&nbsp;".number_format($GrossTotal,2,',','')."</td>
		</tr>";
		if($DisplayDiscount > 0){
		$Table1 .= "<tr>
			<td align='right' colspan=8>".$msgDiscount.":</td>
			<td align='right'>kr.&nbsp;".number_format($DisplayDiscount,2,',','')."</td>
		</tr>";
		}
		$Table1 .= "<tr>
			<td align='right' colspan=8>".$msgSub_Total.":</td>
			<td align='right'>kr.&nbsp;".number_format($SubTotal,2,',','')."</td>
		</tr>";
		if($intGpDis > 0){
		$Table1 .= "<tr>
			<td align='right' colspan=8>".$msgSpecial_Discount.":</td>
			<td align='right'>kr.&nbsp;".number_format($intGpDis,2,',','')."</td>
		</tr>";
		}
		$Table1 .= "<tr>
			<td align='right' colspan=8>".$msgFreight_Charges.":</td>
			<td align='right'>kr.&nbsp;".number_format($intFreightAmt,2,',','')."</td>
		</tr>";
		$Table1 .= "<tr>
			<td align='right' colspan=8>".$msgTotal_Charges.":</td>
			<td align='right'><strong>kr.&nbsp;".number_format($GrandTotal,2,',','')."</td>
		</tr>
		<tr>
			<td align='left' colspan=9>
				<table width='100%' class='TabBorder' cellpadding='2'>
					<tr>
						<td align='center' class='body_Bold'>
							${msgEmailFooter1}&nbsp;".$hrs.":".$mins.",&nbsp;${msgEmailFooter2}
						</td>
					</tr>
					<tr>
						<td align='center' class='body_Bold'>
							${msgEmailFooter3}
						</td>
					</tr>
				</table>
			</td>
		  </tr>
		</table>";
		$Table2 = $UserTab.$Table.$Table1;
		$ExternalTable.= $Table2;
		$ExternalTable.= "</td></tr>
			<tr><td>&nbsp;</td></tr>
			";
		//}// END IF ARR TEMP PRODS
		//-------------------------------------------------

		$strSubject = $msgOrderConfirmation." ".$intOrderId;
		$strFrom=$strAdminEmail;
		$strRecEmail=$strAdminEmailRec;
		
		$headers  = "MIME-Version: 1.0;\n"; 
		$headers .= "Content-type: text/html; charset=iso-8859-1;\n"; 
		$headers .= "Content-Transfer-Encoding: quoated-pritable;\n"; 
		$headers .= "From: ".$strFrom."\r\n";
	
		$headersOwner  = "MIME-Version: 1.0;\n"; 
		$headersOwner .= "Content-type: text/html; charset=iso-8859-1;\n"; 
		$headersOwner .= "Content-Transfer-Encoding: quoated-pritable;\n"; 
		$headersOwner .= "From: ".$strUserEmail."\r\n";


		//$conf = mail($_SESSION['strUserEmail'],$_SESSION['strSubject'],$_SESSION['Table2'],$_SESSION['headers']);
		//$confToOwner = mail($_SESSION['strRecEmail'],$_SESSION['strSubject'],$_SESSION['Table2'],$_SESSION['headersOwner']);
		$conf = mail($strUserEmail,$strSubject,$Table2,$headers);
		$confToOwner = mail($strRecEmail,$strSubject,$Table2,$headersOwner);

		$objOrders->m_intOrderStatus=0;
		$objOrders->UpdateOrderStatus();
		echo "<script>window.location='TakkTakk.php?strMsg=PayCon'</script>";
	}
}	
else
	header("location: Error.php");
?>