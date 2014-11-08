
<?php 
/*
	*	include files
*/
require_once("Includes/FrontSecurity.php");
require_once('Includes/Constants.php');
require_once("Includes/FrontIncludes.php");
/*	
	* 	Validation
*/
$_GET['merchantReference']=28;
if(!isset($_GET['merchantReference']))
{
	echo "window.location='Error.php'";	
}
if(!isset($_SESSION['intLangId']))	
	$_SESSION['intLangId'] = $objOrders->m_objProd->m_objLang->GetDefaultLangId();
/**
	Objects
**/
$objOrders = new clsOrders();
$objOrders->m_objProd = new clsProducts();
$objOrders->m_objProd->m_objLang = new clsLanguage();
$objOrders->m_objUser = new clsUser();
/**
	Getting Labels
**/
$objMessage=new clsMessages();
$objMessage->m_intLangId=$_SESSION['intLangId'];
$objMessage->m_intConId=CONST_CONCEPT_ORDER_FORM;
$arrLabels=$objMessage->GetLabels();
//////////////////////////////////////////////////////////////////////////////////

$_GET['Result']=true;
if(isset($_GET['Result']))
{
	if($_GET['Result'])
		$bResult=TRUE;
	if(isset($_GET['merchantReference']))
	{
		$TransId=$_GET['merchantReference'];
		$objOrders->m_strTransId = $TransId;
	}
	else
		$bResult=FALSE;
}
if($bResult)
{
	//print_r($_SESSION);
	$objOrders->m_intOrderId=$_SESSION['OrderId'];
	$objOrders->m_strTransId = $TransId;
	$objOrders->m_objProd->m_objLang->m_intLangId = $_SESSION['intLangId'];
	//$rsOrder=$objOrders->GetOrderMasterByTransId();
	/**
	Fetching order details by ID from DB
	**/
	$arrOrderInfo = $objOrders->GetOrdersById();
	if($arrOrderInfo != FALSE)
	{
		$rowOrder = mysql_fetch_object($arrOrderInfo);
		$strEmail = stripslashes($rowOrder->Email);
		$intUserId = stripslashes($rowOrder->fkUserId);
		$objOrder->m_objUser->m_intUserId = $rowOrder->fkUserId;
		$strFName = stripslashes($rowOrder->FName);
		$strLName = stripslashes($rowOrder->LName);
		$strPhone = stripslashes($rowOrder->Telephone);
		$strDelName=stripslashes($rowOrder->DelName);
		$strZip=stripslashes($rowOrder->DelPostCode);
		$strDelState = stripslashes($rowOrder->DelState);
		$strDelAddress = stripslashes($rowOrder->DelStAdd);
		$strInvPostCode = stripslashes($rowOrder->InvPostCode);
		$strInvState = stripslashes($rowOrder->InvState);
		$strInvAddress = stripslashes($rowOrder->InvStAdd);
		$strLocation = stripslashes($rowOrder->Location);
		$strMessage = stripslashes($rowOrder->Message);
		$strCompanyName = stripslashes($rowOrder->CompanyName);
		$strOrgNo = stripslashes($rowOrder->OrgNo);
		$strFax = stripslashes($rowOrder->Fax);
		$intDeliveryCharges = stripslashes($rowOrder->DeliveryCharges);
		$strCustomerRemarks = stripslashes($rowOrder->CustomerRemarks);
		if(isset($_REQUEST['txtDelName']) && !empty($_REQUEST['txtDelName']))
		{
			$strDelName = $_REQUEST['txtDelName']; 
		}
		if(isset($_REQUEST['txtInvStAdd']) && !empty($_REQUEST['txtInvStAdd']))
		{
			$strInvAddress = $_REQUEST['txtInvStAdd']; 
		}
		if(isset($_REQUEST['txtDelStAdd']) && !empty($_REQUEST['txtDelStAdd']))
		{
			$strDelAddress = $_REQUEST['txtDelStAdd']; 
		}
		if(isset($_REQUEST['txtMessage']) && !empty($_REQUEST['txtMessage']))
		{
			$strCustomerRemarks = $_REQUEST['txtMessage']; 
		}
		if(stripslashes($rowOrder->PaymentMode)==1)
		{
			if(isset($arrLabels[337]))
				$strPayMode = $arrLabels[337];
			else 
				$strPayMode = "****";
		}
		else if(stripslashes($rowOrder->PaymentMode)==2)
		{
			if(isset($arrLabels[338]))
				$strPayMode = $arrLabels[338];
			else 
				$strPayMode = "****";
		}
		else if(stripslashes($rowOrder->PaymentMode)==3)
		{
			if(isset($arrLabels[339]))
				$strPayMode = $arrLabels[339];
			else 
				$strPayMode = "****";
		}
		else if (stripslashes($rowOrder->PaymentMode)==5)
		{
			if(isset($arrLabels[421]))
				$strPayMode = $arrLabels[421];
			else 
				$strPayMode = "****";
		}
		else
		{
			if(isset($arrLabels[388]))
				$strPayMode = $arrLabels[388];
			else 
				$strPayMode = "****";
		}
			
		$intOrderId =  stripslashes($rowOrder->pkOrderId);
		$strCardTransId = stripslashes($rowOrder->CardTransId);
		$strOrderDate = stripslashes($rowOrder->OrderDate);
		$strOrderTime = stripslashes($rowOrder->OrderTime);
		$intSumDis = $rowOrder->SumDis;
		$intGroupDis = $rowOrder->GroupDis;
		$intFreightAmt = $rowOrder->FreightAmt;
		list($y,$m,$d) = explode("-",$strOrderDate);
		list($hrs,$min,$sec) = explode(":",$strOrderTime);
		$strTime = $hrs.":".$min;
		$AfHrs = ((int)$hrs+1);
		if($AfHrs > 23) $AfHrs= '00';
		$After_1hr_Time = $AfHrs.":".$min;
	}
	else
	{
		$strUserEmail = NULL;
		$strFName = NULL;
		$$strLName = NULL;
		$strLocation = NULL;
		$strDelState = NULL;
		$strDelName = NULL;
		$strDelAddress = NULL;
		$strInvPostCode = NULL;
		$strInvState = NULL;
		$strInvAddress = NULL;
		$strMessage = NULL;
		$strCompanyName = NULL;
		$strFax = NULL; 
		$intDeliveryCharges = 0;
		$strPayMode = 0;
		$strCardTransId = NULL;
		$strEmail = NULL;
		$strPhone = NULL;
		$intFreightAmt = 0;
	}
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
	/////////////////////////////////////////////////////////
	$Table2="<link href='cms.css' rel='stylesheet' type='text/css' />"
	if(empty($strEmailHeader))
	{
		$Table2.="
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
	
	$Table2=."
	
	<table width='100%' align='left' border='0' cellspacing='0' cellpadding='2' bgcolor='#FFFFFF'>
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
		<td class='Heading'>";
				if(isset($arrLabels[338]))$Table2.=$arrLabels[338];else $Table2.= "****";
				$Table2.="</td>
	  </tr>
	  <tr> <td height='25'>";
				if(isset($arrLabels[483]))$Table2.=$arrLabels[483];else $Table2.= "****";
				$Table2.="</td></tr>
	  <tr>
		<td class='Heading'>".$rowOrder->CompanyName."</td>
	  </tr>
	  <tr>
		<td>
	
	
		<table width='96%' align='center' cellpadding='4' cellspacing='0'>
		  <tr>
			<td width='26%' align='left' valign='top' class='HorLine'><table width='100%'  border='0' cellspacing='0' cellpadding='1'>
			  <tr>
				<td>".$strCompanyName."</td>
			  </tr>
			  <tr>
				<td>".$strOrgNo."</td>
			  </tr>
			  <tr>
				<td>".$strFName." ".$strLName."</td>
			  </tr>
			  <tr>
				<td>&nbsp;</td>
			  </tr>
			  <tr>
				<td>";
				if(isset($arrLabels[56]))$Table2.=$arrLabels[56];else $Table2.= "****";
				$Table2.=":&nbsp;".$strPhone."</td>
			  </tr>
			  <tr>
				<td>&nbsp;</td>
			  </tr>
			  <tr>
				<td>&nbsp;</td>
			  </tr>
			</table></td>
			<td width='35%' align='left' valign='top' class='HorLine'><table width='100%'  border='0' cellspacing='0' cellpadding='1'>
			  <tr>
				<td class='PageBodyBold'>";
				if(isset($arrLabels[268]))$Table2.=$arrLabels[268];else $Table2.= "****";
				$Table2.="</td>
			  </tr>
			  <tr>
				<td>".$strDelName."</td>
			  </tr>
			  <tr>
				<td>".$strDelAddress."</td>
			  </tr>
			  <tr>
				<td>".$strZip."&nbsp;&nbsp;".$strDelState." </td>
			  </tr>
			  <tr>
				<td>&nbsp;</td>
			  </tr>
			  <tr>
				<td> <span class='PageBodyBold'>";
				if(isset($arrLabels[338]))$Table2.=$arrLabels[338];else $Table2.= "****";
				$Table2.="&nbsp;";
				if(isset($arrLabels[58]))$Table2.=$arrLabels[58];else $Table2.= "****";
				$Table2.="</span></td>
			  </tr>
			  <tr>
				<td>&nbsp;".$strInvAddress."</td>
			  </tr>
			  <tr>
				<td>&nbsp;".$strInvPostCode."&nbsp;&nbsp;".$strInvState."</td>
			  </tr>
			</table></td>
			<td width='35%' align='left' valign='top'>
		
		
				<table width='100%'  border='0' cellspacing='0' cellpadding='2'>
				  <tr>
					<td width='50%' class='PageBodyBold'>";
					if(isset($arrLabels[263]))$Table2.=$arrLabels[263];else $Table2.= "****";
					$Table2.="</td>
					<td width='50%'>".$intOrderId."</td>
				  </tr>
				  <tr>
					<td class='PageBodyBold'>";
					if(isset($arrLabels[477]))$Table2.=$arrLabels[477];else $Table2.= "**d**";
					$Table2.="</td>
					<td>".$d.'.'.$m.'.'.$y."</td>
				  </tr>
				  <tr>
					<td class='PageBodyBold'>";
					if(isset($arrLabels[264]))$Table2.=$arrLabels[264];else $Table2.= "****";
					$Table2.="</td>
					<td>".$strPayMode." </td>
				  </tr>
				  <tr>
					<td class='PageBodyBold'>";
					if(isset($arrLabels[54]))$Table2.=$arrLabels[54];else $Table2.= "****";
					$Table2.=".</td>
					<td>".$strFName." ".$strLName."</td>
				  </tr>
				  <tr>
					<td class='PageBodyBold'>";
					if(isset($arrLabels[55]))$Table2.=$arrLabels[55];else $Table2.= "****";
					$Table2.="</td>
					<td>".$strEmail."</td>
				  </tr>
				  <tr>
					<td class='PageBodyBold'>";
					if(isset($arrLabels[479]))$Table2.=$arrLabels[479];else $Table2.= "****";
					$Table2.="</td>
					<td>".$strCustomerRemarks."</td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
				</table>
		
			</td>
      	</tr>
    </table>	
	</td>
  </tr>";
	$TotalAmount = 0; $intActualAmount = 0;
	$arrTempProds = $objOrders->GetOrderDetailByUser();
	if($arrTempProds !=  FALSE)
	{

	  $Table2.="<tr>
		<td><table width='96%'  border='0' align='center' cellpadding='4' cellspacing='0' class='TabBorder'>
		  <tr class='TabHead'>
			<td width='11%' align='center'>";
				if(isset($arrLabels[216]))$Table2.=$arrLabels[216];else $Table2.= "****";
				$Table2.="</td>
			<td width='53%'>";
				if(isset($arrLabels[59]))$Table2.=$arrLabels[59];else $Table2.= "****";
				$Table2.="</td>
			<td width='13%' align='center'>";
				if(isset($arrLabels[181]))$Table2.=$arrLabels[181];else $Table2.= "****";
				$Table2.="&nbsp;";
				if(isset($arrLabels[189]))$Table2.=$arrLabels[189];else $Table2.= "****";
				$Table2.="</td>
			<td width='8%' align='center'>";
				if(isset($arrLabels[190]))$Table2.=$arrLabels[190];else $Table2.= "****";
				$Table2.="</td>
			<td width='15%' align='center'>";
				if(isset($arrLabels[181]))$Table2.=$arrLabels[181];else $Table2.= "****";
				$Table2.="&nbsp;";
				if(isset($arrLabels[189]))$Table2.=$arrLabels[189];else $Table2.= "****";
				$Table2.="</td>
		  </tr>";
							$n=0;
								while($arrRecTempProds = mysql_fetch_object($arrTempProds))
								{
									$intProdId = $arrRecTempProds->fkProductId;
									$intQty = $arrRecTempProds->Qty;
									$objProd->m_intProductId = $intProdId;
									$arrProds = $objProd->GetProductInfo();	
									$intProdPrice= $arrRecTempProds->ProdAmt;
									if($arrProds != FALSE)
									{
										$arrRecProds = mysql_fetch_object($arrProds);
										$strProdCode = $arrRecProds->ProdNumber;
										$strProdName = $arrRecProds->ProdName;
										$Compaign = $objProd->CheckCompaignProd();
										if($Compaign==$intProdId)
										{
											$intProdPrice= $arrRecProds->CamPrice;
											$iCompaign = 1;
										}
										else
										{
											$intProdPrice= $arrRecProds->ProdPrice;
											$iCompaign = 0;
										}
									}
									else
									{
										$strProdCode = NULL;
										$strProdName = NULL;
										$intProdPrice = 0;
									}
									
									//--------------------------------------------
									$intActualAmount = ($intProdPrice)*($intQty);
									$TotalAmount += $intActualAmount;
						
									 $Table2.="<tr ";
									  if($n%2==0) 
									  $Table2.="class='AltColourDark'"; 
									  else $Table2.="class='AltColourLight'";
									  $Table2.=">
										<td align='center'>".$strProdCode."</td>
										<td>".$strProdName." </td>
										<td align='center'> ".$intProdPrice."</td>
										<td align='center'>".$intQty."</td>
										<td align='center'>".number_format($intActualAmount,'2',',','')." </td>
									  </tr>";
									$n++;		
								}// end while
								$GrandTotal = $TotalAmount+$intFreightAmt;
							
		 $Table2.=" </table>
		</td>
	  </tr>
	  <tr>
		<td><table width='96%'  border='0' align='center' cellpadding='4' cellspacing='0'>";
		if($intFreightAmt>0)
		{
		$Table2.="  <tr>
			<td width='68%'>&nbsp;</td>
			<td width='17%' align='right' class='PageBodyBold'>";
				if(isset($arrLabels[330]))$Table2.=$arrLabels[330];else $Table2.= "****";
				$Table2.=": </td>
			<td width='15%' align='center'>".number_format($TotalAmount,'2',',','')." </td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
			<td align='right' class='PageBodyBold'>";
				if(isset($arrLabels[331]))$Table2.=$arrLabels[331];else $Table2.= "****";
				$Table2.=": </td>
			<td align='center'>".number_format(($intFreightAmt),'2',',','')."</td>
		  </tr>";
		}
	
		 $Table2.=" <tr>
				<td width='68%'>&nbsp;</td>
				<td align='right' class='PageBodyBold' width='17%'>";
				if(isset($arrLabels[327]))$Table2.=$arrLabels[327];else $Table2.= "****";
				$Table2.="
			  	:</td>
				<td align='center' width='15%'>".number_format(($TotalAmount+$intFreightAmt),'2',',','')." </td>
			  </tr>
			</table></td>
		  </tr>";
	}// END IF
	else
	{
		$Table2.='<tr><td>No Product Found!</td></tr>';
	}
	$Table2.="  <tr>
    	<td>&nbsp;</td>
	  </tr>		 
	</table>";
	//echo $Table2;exit;
	//// END IF ARR TEMP PRODS
	//-------------------------------------------------
	$strSubject = $strSiteTitle." ".$arrLabels[383].$intOrderId;
	$strUserEmail = $strEmail;
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
	//$conf = mail("basharat@digitalspinners.com",$strSubject,$Table2,$headers);
	//$conf = mail($_SESSION['strUserEmail'],$_SESSION['strSubject'],$_SESSION['Table2'],$_SESSION['headers']);
			//$confToOwner = mail($_SESSION['strRecEmail'],$_SESSION['strSubject'],$_SESSION['Table2'],$_SESSION['headersOwner']);
	//the below 2 lines are commented last time
	$conf = mail($strUserEmail,$strSubject,$Table2,$headers);
	$confToOwner = mail($strRecEmail,$strSubject,$Table2,$headersOwner);

	$objOrders->m_intOrderStatus=0;
	$objOrders->UpdateOrderStatus();
}//End of $rsResult condition 
echo "window.location='Invoice.php';";
//header("location:Invoice.php?intMessage=");
?>