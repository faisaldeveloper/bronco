<?php
//include("Constants.php");
function getFileExt($filename)
{
	$ext = substr(strrchr($filename, "."), 1);
	return $ext;
}
// FOR FOLLOWING FUNCTION
// FIRST PARAMETER IS DROPDOWN NAME.
// SECOND PARM IS OPTION VALUES AND THEY MUST BE COMMA SEPARATED VALUES i.e (1,2,3,abc) etc
// THIRD PARAM IS DROPDOWN LABELS OR CAPTION AND THEY MUST BE COMMA SEPARATED VALUES i.e (Caption1,Caption2,Caption3,Caption4) etc
// NUMBER OF OPTION VALUES AND NUMBER OF OPTION LABELS MUST BE EQUAL OTHER WISE IT WILL GENERATE AN ERROR
function UploadFile($strRealPathFile, $strDestFolder, $strImagePrefix, $strValidExtension, $strControlName, $intMaxSize=1048576, $intMaxWidth=0, $intMaxHeight=0)
{
	$strInvalidMsg = "";
	$mypath = realpath ($strRealPathFile); 
	$strUploadDir = $strDestFolder;//echo "|||".$strUploadDir;exit;
	if (strpos($mypath,"\\") > -1 )
		$strFinalPath = substr($mypath,0,strrpos($mypath,"\\")+1).$strUploadDir."\\";
	else
		$strFinalPath = substr($mypath,0,strrpos($mypath,"/")+1).$strUploadDir."/";
		
	$intImageSize = $_FILES["".$strControlName.""]['size'];
	$strImageName = $_FILES["".$strControlName.""]['name'];
	$strImageName = str_replace(" ","-",$strImageName);
	$strImageName = str_replace("+","",$strImageName);
	$strImageName = str_replace("&","-",$strImageName);
	
	$strTempPath = $_FILES["".$strControlName.""]['tmp_name'];
	
	$strImageExt = strtolower(getFileExt($strImageName));
	
	if($intMaxWidth != 0 && $intMaxHeight !=0)
	{	
		list($intWidth, $intHeight, $strType, $strAttr) = getimagesize($strTempPath);
		if($intWidth > $intMaxWidth) {$strInvalidMsg="InvalidWidth"; return $strInvalidMsg; exit();}
		else if($intHeight > $intMaxHeight) {$strInvalidMsg="InvalidHeight"; return $strInvalidMsg; exit();}
	}
	if($intImageSize > $intMaxSize) {$strInvalidMsg="InvalidSize"; return $strInvalidMsg; exit();}
	if(strpos($strValidExtension,",")>0)
	{
		$intExtCheck = 0;
		$strExtArr = explode(",",$strValidExtension);
		for($counter=0;$counter < count($strExtArr);$counter++)
		{	
			if($strExtArr[$counter] == $strImageExt)
			{
				$intExtCheck = 1;
				break;
			}
		}
		if($intExtCheck == 0)  {$strInvalidMsg="InvalidExtension"; return $strInvalidMsg; exit();}
	}
	else if($strImageExt != $strValidExtension)
	{$strInvalidMsg="InvalidExtension"; return $strInvalidMsg; exit();}
	
	$strImageCompName = $strImagePrefix."_".$strImageName;
	$strDestination = $strFinalPath.$strImageCompName;
	//echo "<br>tempPath==>".$strTempPath;
	//echo "<br>Destination==>".$strDestination;
	$intIsUploaded = move_uploaded_file($strTempPath,$strDestination);
	if($intIsUploaded) {$strInvalidMsg=$strImageCompName; return $strInvalidMsg; exit();}
	else {$strInvalidMsg="UploadErr"; return $strInvalidMsg; exit();}
	
}
function RTESafe($strText) 
{
	//returns safe code for preloading in the RTE
	$tmpString = trim($strText);
	//convert all types of single quotes
	$tmpString = str_replace(chr(145), chr(39), $tmpString);
	$tmpString = str_replace(chr(146), chr(39), $tmpString);
	$tmpString = str_replace("'", "&#39;", $tmpString);
	//convert all types of double quotes
	$tmpString = str_replace(chr(147), chr(34), $tmpString);
	$tmpString = str_replace(chr(148), chr(34), $tmpString);
	//replace carriage returns & line feeds
	$tmpString = str_replace(chr(10), " ", $tmpString);
	$tmpString = str_replace(chr(13), " ", $tmpString);
	return $tmpString;
}
function page_records($intPage,$intPageCount,$intRecordStart,$intPerPage,$intPageId=0,$strSearch="")
{ 
	$strContent1 = "<table> 
	<tr><td><strong>Pages</strong></td>";
	$arrLimit=SetGooglePagingLimits($intPage,$intPageCount);
	//Previous link

		$strContent1.="<td><a href='".$_SERVER['PHP_SELF']."?btnView=yes&intPage=1&intPerPage=$intPerPage&PageId=${intPageId}&txtSearch=${strSearch}'>First Page</a>&nbsp;</td> ";

	if($intPage>1)
	{
		$nPrevious=$intPage-1;
		$strContent1.="<td><a href='".$_SERVER['PHP_SELF']."?btnView=yes&intPage=$nPrevious&intPerPage=$intPerPage&PageId=${intPageId}&txtSearch=${strSearch}'>Previous</a></td> ";
	}		
	///////////////////////////////////////////////////////////////////////////////////
	for ($i=$arrLimit['LowerLimit']; $i <= $arrLimit['UpperLimit'];$i++)
	{ 
		if($i != $intPage)
			$strContent1.="<td>[<a href='".$_SERVER['PHP_SELF']."?btnView=yes&intPage=$i&intPerPage=$intPerPage&PageId=${intPageId}&txtSearch=${strSearch}'>$i</a>]</td> ";
		else 
			$strContent1.="<td style=\"color:silver;\">[ $i ]</td>"; 
	}//end for 

	//Next link
	if($intPage<$intPageCount)
	{
		$nNext=$intPage+1;
		$strContent1.="<td><a href='".$_SERVER['PHP_SELF']."?btnView=yes&intPage=$nNext&intPerPage=$intPerPage&PageId=${intPageId}&txtSearch=${strSearch}'>Next</a></td> ";
	}

	///////////////////////////////////////////////////////////////////////////////////&lstEvents=$intEventId
		$strContent1.="<td><a href='".$_SERVER['PHP_SELF']."?btnView=yes&intPage=${intPageCount}&intPerPage=$intPerPage&txtSearch=${strSearch}'>&nbsp;Last Page</a></td> ";
	$strContent1.="</tr> </table> ";
	return $strContent1;
}//end function

function page_orders($intPage,$intPageCount,$intRecordStart,$intPerPage,$intPageId=0,$intOrderStatus=0)
{ 
	$strContent1 = "<table> 
	<tr><td><strong>Pages</strong></td>";
		$strContent1.="<td><a href='".$_SERVER['PHP_SELF']."?btnView=yes&intPage=1&intPerPage=$intPerPage&PageId2=${intPageId}&lstOrderStatus=${intOrderStatus}'>First Page&nbsp;</a></td> ";
	$arrLimit=SetGooglePagingLimits($intPage,$intPageCount);
	//Previous link
	if($intPage>1)
	{
		$nPrevious=$intPage-1;
		$strContent1.="<td><a href='".$_SERVER['PHP_SELF']."?btnView=yes&intPage=$nPrevious&intPerPage=$intPerPage&PageId2=${intPageId}&lstOrderStatus=${intOrderStatus}'>Previous</a></td> ";
	}		
	///////////////////////////////////////////////////////////////////////////////////
	for ($i=$arrLimit['LowerLimit']; $i <= $arrLimit['UpperLimit'];$i++)
	{ 
		if($i != $intPage)
			$strContent1.="<td>[<a href='".$_SERVER['PHP_SELF']."?btnView=yes&intPage=$i&intPerPage=$intPerPage&PageId2=${intPageId}&lstOrderStatus=${intOrderStatus}'>$i</a>]</td> ";
		else 
			$strContent1.="<td style=\"color:silver;\">[ $i ]</td>"; 
	}//end for 

	//Next link
	if($intPage<$intPageCount)
	{
		$nNext=$intPage+1;
		$strContent1.="<td><a href='".$_SERVER['PHP_SELF']."?btnView=yes&intPage=$nNext&intPerPage=$intPerPage&PageId2=${intPageId}&lstOrderStatus=${intOrderStatus}'>Next</a></td> ";
	}		
	///////////////////////////////////////////////////////////////////////////////////
		$strContent1.="<td><a href='".$_SERVER['PHP_SELF']."?btnView=yes&intPage=${intPageCount}&intPerPage=$intPerPage&PageId2=${intPageId}&lstOrderStatus=${intOrderStatus}'>&nbsp;Last Page</a></td> ";
	$strContent1.="</tr> </table> ";
	return $strContent1;
}//end function
function SetGooglePagingLimits($nPage=1,$nPageCount=10)
{
	switch($nPage)
	{
		case 1:				// For Ist page
				$nLowerLimit=1;
				if($nPageCount>10)	$nUpperLimit=10;
				else				$nUpperLimit=$nPageCount;
				break;		
		case $nPageCount:	//For last page
				$nUpperLimit=$nPageCount;
				if($nPageCount>10)	$nLowerLimit=$nPageCount-9;
				else				$nLowerLimit=1;
				break;
		default:			//For middle pages
				if( ($nPage) <=4 )		
				{
					$nLowerLimit=1;
					if($nPageCount>10)
						$nUpperLimit=10;
					else	
						$nUpperLimit=$nPageCount;
				}	
				else		
				{
					if($nPageCount-$nPage>5)
					{
						$nLowerLimit=$nPage-4;
						$nUpperLimit=$nPage+5;
					}
					else
					{	
						$nUpperLimit=$nPageCount;
						$nFollowPages=$nPageCount-$nPage;
						if($nPage>(10-$nFollowPages))
							$nLowerLimit=$nPage-(10-$nFollowPages);
						else	
							$nLowerLimit=1;
					}		
				}	
				break;
		}
	$arrLimit=array();
	$arrLimit['LowerLimit']=$nLowerLimit;
	$arrLimit['UpperLimit']=$nUpperLimit;
	return	$arrLimit;	
}

function DownloadFile($strFilePath)
{
	$strContents = file_get_contents(realpath($strFilePath));
	if (strpos($strFilePath,"\\") > -1 )
		$strFileName = substr($strFilePath,strrpos($strFilePath,"\\")+1);
	else
		$strFileName = substr($strFilePath,strrpos($strFilePath,"/")+1);
	header('Content-Type: application/octet-stream');
	header("Content-Disposition: attachment; filename=\"${strFileName}\"");
	echo $strContents;
}
function GetTopPanel($nLangId)
{
	$intShowMenu = 1;
	$intForParent = 0;
	$intActive = 1;
	$strSql = "SELECT * FROM `page_info` left outer join page_desc on page_info.pkPageId=page_desc.fkPageID and fkLangId = ".$nLangId." where PageType=".CONST_PAGETYPE_DYNAMIC." AND ParentId=".$intForParent." AND `page_info`.IsActive=".$intActive." AND `page_info`.ShowInTopMenu = 1 ORDER BY PageRank";
	$rsSql = mysql_query($strSql) or die("Left Menu Query ".mysql_error());
	if(mysql_num_rows($rsSql)>0)
	return $rsSql;
	else return FALSE;
}	
function GetSubTopPanel($nLangId,$nParentId)
{
	$strSql = "SELECT * FROM `page_info` left outer join page_desc on page_info.pkPageId=page_desc.fkPageID and fkLangId = ".$nLangId." WHERE ParentId=".$nParentId." and PageType=".CONST_PAGETYPE_DYNAMIC." AND `page_info`.IsActive=".ACTIVE." AND `page_info`.ShowInTopMenu = 1 ORDER BY PageRank";
	//print $strSql;
	$rsSql = mysql_query($strSql) or die("Left Menu Query ".mysql_error());
	if(mysql_num_rows($rsSql)>0)
	return $rsSql;
	else return FALSE;
}	
function GetLeftPanel($nLangId)
{
	$intShowMenu = 1;
	$intForParent = 0;
	$intActive = 1;
	$strSql = "SELECT * FROM `page_info` left outer join page_desc on page_info.pkPageId=page_desc.fkPageID and fkLangId = ".$nLangId." where PageType=".CONST_PAGETYPE_DYNAMIC." AND ParentId=".$intForParent." AND `page_info`.IsActive=".$intActive." AND `page_info`.ShowInLeftMenu = 1 ORDER BY PageRank";
	//echo $strSql;
	$rsSql = mysql_query($strSql) or die("Left vvvMenu Query ".mysql_error());
	if(mysql_num_rows($rsSql)>0)
	return $rsSql;
	else return FALSE;
}	
function GetSubLeftPanel($nLangId,$nParentId)
{
	$strSql = "SELECT * FROM `page_info` left outer join page_desc on page_info.pkPageId=page_desc.fkPageID and fkLangId = ".$nLangId." WHERE ParentId=".$nParentId." and PageType=".CONST_PAGETYPE_DYNAMIC." AND `page_info`.IsActive=".ACTIVE." AND `page_info`.ShowInLeftMenu = 1 ORDER BY PageRank";
	$rsSql = mysql_query($strSql) or die("Left Menu Query ".mysql_error());
	if(mysql_num_rows($rsSql)>0)
	return $rsSql;
	else return FALSE;
}	

function SetGlobalOptions($intRowsPerPage,$strSiteTitle,$strCompanyName,$strStAddress,$strPostCode,$strState,$strPhoneNo,$strFax,$strMobile,$strAdminEmail,$strAdminEmailRec,$strLastDaysScrollNews,$strLatestScrollNews,$strMainNewsLayout,$strLastDaysNews,$strLatestNews,$strMainNewsOnTop,$strNewsPerRow,$strMoreNewsLayout,$strMoreNewsOnTop,$strMoreNewsPerRow,$strNewsDetailLayout,$nQuantityChk)
{
	$strSql = "UPDATE `global_options` SET  `RowsPerPage` = ".$intRowsPerPage.", `SiteTitle`='".$strSiteTitle."', `CompanyName`='".$strCompanyName."', `StAddress`='".$strStAddress."', `PostCode`='".$strPostCode."', `State`='".$strState."', `PhoneNo`='".$strPhoneNo."', `Fax`='".$strFax."',`Mobile`='".$strMobile."',`AdminEmail`= '".$strAdminEmail."', `AdminEmailRec`= '".$strAdminEmailRec."', `LastDaysScrollNews`= '".$strLastDaysScrollNews."', `LatestScrollNews`= '".$strLatestScrollNews."', `MainNewsOnTop`= '".$strMainNewsOnTop."', `NewsPerRow`= '".$strNewsPerRow."', `MoreNewsOnTop`= '".$strMoreNewsOnTop."', `MoreNewsPerRow`= '".$strMoreNewsPerRow."', `MainNewsLayout`= '".$strMainNewsLayout."', `MoreNewsLayout`= '".$strMoreNewsLayout."', `NewsDetailLayout`= '".$strNewsDetailLayout."', `LastDayMainNews`='".$strLastDaysNews."', `LatestMainNews`='".$strLatestNews."',`QtyChk`='".$nQuantityChk."'";
	//echo $strSql;exit;
	$rsSql = mysql_query($strSql) or die("Global Options Updation Error ".mysql_error());
	if(mysql_affected_rows()>0)
	return TRUE;
	else return FALSE;
}

function GetGlobalOptions()
{
	$strSql = "SELECT * FROM `global_options`";
	$rsSql = mysql_query($strSql) or die("Global Options Selection Error ".mysql_error());
	if(mysql_num_rows($rsSql)>0)
	return $rsSql;
	else return FALSE;
}

function GetLabel($intMessageId,$intLangId)
{
	$sqlmsg="SELECT * FROM messages WHERE pkMessageId = ".$intMessageId." AND pkLangId = ".$intLangId."";
	$rsmsg=mysql_query($sqlmsg);
	if(mysql_num_rows($rsmsg)>0)
	{
		$resmsg=mysql_fetch_object($rsmsg);
		$label=$resmsg->MessageDesc;
	}
	else
	{
		$label="######";
	} 
	return $label;
}	


function EmailToFriend($strYourName,$strYourEmail,$strYourFriendName,$strYourFriendEmail,$strMessage,$strTarget,$strSub,$strSent,$strHi,$strLabel)
{
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

		$strto=$strYourFriendEmail;
		$strfrom=$strYourEmail;
		$strsubject=$strSub.$strYourName."";
		$sent = $strSent;
		$strmsg="
		<html>
		<body>";
		
	if(empty($strEmailHeader))
	{
		$strmsg.="
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
		$strmsg.="

		<table width= '80%'  border='0'>
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
			<td>&nbsp;</td>
	    </tr>
		 <tr>
			<td ><strong>".$strHi." ".$strYourFriendName.",</strong></td>
	    </tr>
		 <tr>
			<td>&nbsp;</td>
	    </tr>
		 <tr>
			<td >".$strMessage.".</td>
		  </tr>
		 
		<tr>
			<td>&nbsp;</td>
	    </tr> 
		<tr>
			<td><a href=".$strTarget." target='_blank'>".$strTarget."</td>
	    </tr>
		
		</table>
		
		</body>
		</html>";
		$headers  = "MIME-Version: 1.0;\n"; 
		$headers .= "Content-type: text/html; charset=iso-8859-1;\n"; 
		$headers .= "Content-Transfer-Encoding: quoated-pritable;\n"; 
		$headers .= "FROM: ".$strfrom."\r\n"; 
		$conf_email=mail($strto, $strsubject ,$strmsg, $headers);
		//echo $conf_email;exit;
		return $conf_email;
}
function GEtModuleLink($iModId)
{
	$sqlModLink = "SELECT * FROM `page_modules` WHERE fkModuleId = ".$iModId."";
	$rsModLink = mysql_query($sqlModLink) or die("Moudule Link ".mysql_error());
	$resModLink = mysql_fetch_object($rsModLink);
	return $resModLink->fkPageId;
}
function checkEmail($Email) 
{
   if(strlen($Email)<1) return FALSE;
   else
   {
	   if (eregi("^[a-zA-Z0-9_]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$]", $Email)) 
		   return FALSE;
		else
		{
			if ((strpos($Email,'@') == -1) 
			   || (strpos($Email,'.')==-1)
			   || (strpos($Email,'.')==0) 
			   || (strpos($Email,'@')==0) 
			   || (strpos($Email,'@')==strlen($Email)-1)
			   || (strrpos($Email,'@')==strlen($Email)-1)
			   || (strpos($Email,'.')==strlen($Email)-1)
			   || (strrpos($Email,'.')==strlen($Email)-1)
			   || (strpos($Email,'@')!=strrpos($Email,'@'))
			   || (strpos($Email,'@') > strrpos($Email,'.'))
			   || ((strpos($Email,'.')+1)==strpos($Email,'@'))
			   || ((strpos($Email,'@')+1)==strpos($Email,'.')))
			  return FALSE;
			else return TRUE;
	   }
	}
}
//To register customer payment on netaxept
function Register($arrAddress, $arrComp, $arrCust, $arrHeader, $arrPay)
{
	// create a instance of the SOAP client object
	$soapclient = new soapclient(SOAP_CLIENT);
	$soapoptions = SOAP_OPTIONS;
	// uncomment the next line to see debug messages
	$soapclient->debug_flag = 1;
	 // Set address-object on customer-object
	 $arrCust = array(
		'address' => $arrAddress,
	 // Set company-object on customer-object
		'company' => $arrComp,
	 // Set customer-object on payment-object
		'customer' => $arrCust);
	 // Create a RegisterPayment-object
	 $arrRegPay = array(
	 // Set Header on the RegisterPayment-object
		'header' => $arrHeader,
	 // Set Payment on the RegisterPayment-object
		'payment' => $arrPay);
	// invoke the method on the server
	$result = $soapclient->call("register", array('parameters' => $arrRegPay) ); 
	// print the results of the search
	// if error, show error
	if ($result['faultstring'])
		return false;
	else
	{
		if($result['result']=='OK')
		{
			$nPaymentId=$result['paymentId'];
			$objOrders=new clsOrders();
			$objOrders->m_intOrderId=$arrPay['orderId'];
			$objOrders->m_intOrderStatus=2;
			$objOrders->UpdateOrderPayIdnStatus((int)$nPaymentId);
			
			return $result['paymentURL'];
		}	
		else
			return false;	
	}
}

//To confirms customer payment on netaxept
function Confirm( $nSiteId, $strPassword, $nPaymentId )
{
	// create a instance of the SOAP client object
	$soapclient = new soapclient(SOAP_CLIENT);
	$soapoptions = SOAP_OPTIONS;
	// uncomment the next line to see debug messages
	$soapclient->debug_flag = 1;
	// Create a header-object and insert data
	 $arrHeader = array(
		 'siteId' => $nSiteId,
		 'password' => $strPassword);
	// Create a PaymentInfoRequest and insert data
	$arrPayInfoReq = array(
		'header' => $arrHeader,
		'paymentId' => $nPaymentId);
	$result = $soapclient->call("confirm", array('parameters' => $arrPayInfoReq) );
	// print the results of the search
	// if error, show error
	if($result['status']=='OK')
		return true;
	else
		return false;	
}
function IsFileExtValid($filename,$strValidExt)
{
	$arrExtArr = explode(",",$strValidExt);
	if( in_array(getFileExt($filename),$arrExtArr) )
		return true;
	else
		return false;
}
function GetPagePositionArray()
{
	$arrPosition=array();
	$arrPosition[CONST_POS_TOP]="Top";
	$arrPosition[CONST_POS_BOTTOM]="Bottom";
	$arrPosition[CONST_POS_LEFT]="Left";
	$arrPosition[CONST_POS_RIGHT]="Right";
	return $arrPosition;
}
function GetActiveModules()
{
	$strSql="SELECT * FROM modules,`module_types` WHERE pkModuleTypeID=ModuleType and module_types.IsActive = ".ACTIVE." order by pkModuleId";
	$rsSelect=mysql_query($strSql);
	if($rsSelect)
	{	if(mysql_num_rows($rsSelect))
		return mysql_num_rows($rsSelect);
	}
	else 
	return FALSE;
}
function GetPageModuleInfo($pkModuleId)
{
	$strSql="SELECT * FROM `page_modules` where  fkModuleId=".$pkModuleId;
	if($rsSql=mysql_query($strSql))
	return $rsSql;
	else return false;
}
// TASK: display a directory listing with thumbnails for images and human-readable filesizes
// handy humansize function:
// input is number of bytes, output is a "human-readable" filesize string
function humansize($size) 
{
		// Setup some common file size measurements.
	$kb = 1024;         // Kilobyte
	$mb = 1024 * $kb;   // Megabyte
	$gb = 1024 * $mb;   // Gigabyte
	$tb = 1024 * $gb;   // Terabyte
		if($size < $kb) return $size."B";
	else if($size < $mb) return round($size/$kb,0)."KB";
	else if($size < $gb) return round($size/$mb,0)."MB";
	else if($size < $tb) return round($size/$gb,0)."GB";
	else return round($size/$tb,2)."TB";
}
function GetFileName($strFileName)
{
	list($strPrefix, $strImage) = explode("_", $strFileName);
	
	$strImageName = str_replace("-"," ",$strImage);
	$strImageName = str_replace("+"," ",$strImageName);
	$strImageName = str_replace("&"," ",$strImageName);
	
	return ($strImageName);			
}
// FILEFRAME section END
// just userful functions
// which 'quotes' all HTML-tags and special symbols 
// from user input
function safehtml($s){    
	$s=str_replace("&", "&amp;", $s);    
	$s=str_replace("<", "&lt;", $s);    
	$s=str_replace(">", "&gt;", $s);    
	$s=str_replace("'", "&apos;", $s);    
	$s=str_replace("\"", "&quot;", $s);    
	return $s;
}

function GeneralPaging($intPage,$intPageCount,$strQuery)
{ 
	$strContent1 = 
	"<table cellpadding=0 cellspacing=0>
		<tr>
			<td>Pages:- </td>";
	$arrLimit=SetGooglePagingLimits($intPage,$intPageCount); //Paging Limits
	//First links
	if($intPage==1)
		$strContent1.="<td style=\"color:silver;\">First</td>"; 
	else
	{
		$strContent1.=
			"<td>
				<a href='".$_SERVER['PHP_SELF']."?intPage=1&${strQuery}'>First</a>&nbsp;</td> ";
	}
	//Previous Link
		if($intPage>1)
		{
			$nPrevious=$intPage-1;
			$strContent1.="<td><a href='".$_SERVER['PHP_SELF']."?intPage=$nPrevious&${strQuery}'> << </a></td> ";
		}
		else		
			$strContent1.="<td style=\"color:silver;\"> << 	</td>"; 
	//Previous Link Ends
	///////////////////////////////////Dynamic Pages////////////////////////////////////////////////
	for ($i=$arrLimit['LowerLimit']; $i <= $arrLimit['UpperLimit'];$i++)
	{ 
		if($i != $intPage)
			$strContent1.="<td>[<a href='".$_SERVER['PHP_SELF']."?intPage=$i&${strQuery}'>$i</a>]</td>";
		else 
			$strContent1.="<td style=\"color:silver;\">[ $i ]</td>"; 
	}//end for 
	///////////////////////////////////Dynamic Pages End////////////////////////////////////////////////

	//For Next Page
	if($intPage<$intPageCount)
	{
		$nNext=$intPage+1;
		$strContent1.="<td><a href='".$_SERVER['PHP_SELF']."?intPage=$nNext&${strQuery}'> >> </a></td> ";
	}
	else
		$strContent1.="<td style=\"color:silver;\"> >> </td>"; 
	//For Next Page End
	///////////////////////////////////////////////////////////////////////////////////
	//For Last Page
	if($intPage==$intPageCount)	
		$strContent1.="<td style=\"color:silver;\"> Last</td>"; 
	else
		$strContent1.="<td><a href='".$_SERVER['PHP_SELF']."?intPage=${intPageCount}&${strQuery}'>Last</a></td> ";
	//For Last Page End
	$strContent1.="</tr> </table> ";
	return $strContent1;
}//end function
function datetime($datetime)
{
	$date = NULL;
	$time = NULL;
	list($date,$time) = explode(" ",$datetime);
	if ($date!=NULL)
		{
		list($y,$m,$d) = explode("-",$date);
		$datetime =$d.".".$m.".".$y;
		}
	if ($time!=NULL)
		{
		list($g,$i,$s) = explode(":",$time);
		$datetime.=" ".$g.":".$i.":".$s;
		}
	return $datetime;
}

function OnOff($intId)
{
	$sqlPannel = "SELECT * FROM `module_types` WHERE module_types.IsActive = ".ACTIVE." AND pkModuleTypeID =".$intId."";
	$rsPannel = mysql_query($sqlPannel);
	if(mysql_num_rows($rsPannel)>0) 
		return TRUE;
	else return FALSE;
}
function GetFooterLinks($nLangId)
{
	$nIsActive=1;
	$strSql="SELECT * FROM `page_info` left outer join `page_desc` on `page_info`.pkPageId=`page_desc`.fkPageID AND `page_desc`.fkLangID=".$nLangId." WHERE `page_info`.ShowInFooter = ".$nIsActive." AND `page_info`.IsActive = ".$nIsActive; 
	$rsSql=mysql_query($strSql) or die("Footer Links Selection Error:".mysql_error());
	if(mysql_num_rows($rsSql)>0)
		return $rsSql;
	else 
		return false;
}
function ArrayToQryString($arrValues, $strQryStringName)
{
	if(is_array($arrValues))
	{
		$arrQryStr=array();
		$i=0;
		foreach($arrValues as $strVal)
		{
			$arrQryStr[]=$strQryStringName.'['.$i.']='.$strVal;
			$i++;
		}
		$strQryStr=implode('&',$arrQryStr);
	}
	else
		$strQryStr=$strQryStringName.'='.$arrValues;
	return $strQryStr;	
}

###############################################################################
////////////////////////////// End Cardia Credit card constants ///////////////
###############################################################################

function startTransaction($merchantReference, $amount, $orderDescription, $isOnHold=1) {
	/* ******************************************************************
	 *	Initiates a transaction. Returns the URL to which the cardholder
	 *	should be forwarded.
	 *	Parameters:
	 *
	 *	$merchantReference
	 *		Unique identificator for this transaction. Must be generated by
	 *		merchant, and must be <= 20 alphanumeric characters long. The
	 *		default uses unixtime+microtime; specify 'auto' to have this
	 *		script generate one, or supply your own.
	 *	$amount
	 *		Size of the transaction.
	 *	$orderDescription
	 *		String describing the order. Optional.
	 *	$isOnHold
	 *		Specifies if the transaction is on hold or not. Optional.
	 ****************************************************************** */
	// Make configuration data available
	global $CARDIA;

	// Validate merchant reference
	if(!$merchantReference) {
		echo("<br>merchantReference is empty!<br>");
		die("Empty merchant reference!");
	} elseif($merchantReference=='auto') {
		// Generate merchant reference
			$merchantReference=base64_encode(time()+microtime());
			while(is_integer(strpos($merchantReference, '='))) {
				// Ensuring the merchant reference does not contain illegal chars
				$merchantReference=base64_encode(time()+microtime());
			}
			// Checking merchantReference length. This COULD be platform dependent,
			// more testing is recommended.
			if(count($merchantReference)>20) {
				echo("<br>merchantReference is too long! Platform problem?<br>");
				die();
			}
	}

	// For sessionless operation, pass merchant reference back to merchant:
	$CARDIA['successfulTransactionUrl'] = $CARDIA['successfulTransactionUrl']."&merchantReference=".$merchantReference;
	$CARDIA['unsuccessfulTransactionUrl'] = $CARDIA['unsuccessfulTransactionUrl']."&merchantReference=".$merchantReference;

	// Validate orderDescription

	$transactionData['parameters'] = array(
	"merchantToken"			=>	$CARDIA['merchantToken'],
	"applicationIdentifier"		=>	"",
	"store"				=>	$CARDIA['store'],
	"orderDescription"		=>	$orderDescription,
	"merchantReference"		=>	$merchantReference,
	"currencyCode"			=>	"NOK",
	"unsuccessfulTransactionUrl"	=>	$CARDIA['unsuccessfulTransactionUrl'],
	"successfulTransactionUrl"	=>	$CARDIA['successfulTransactionUrl'],
	"authorizedNotAuthenticatedUrl"	=>	"",
	"amount"			=>	$amount,
	"skipFirstPage"			=>	$CARDIA['skipFirstPage'],
	"skipLastPage"			=>	$CARDIA['skipLastPage'],
	"isOnHold"			=>	$isOnHold,
	"useThirdPartySecurity"		=>	$CARDIA['use3DSecure'],
	"paymentMethod"			=>	1000);

	//print_r($CARDIA);
	//exit;
	
	if($CARDIA['debug']) { echo("<pre>"); print_r($transactionData); echo("</pre>"); }

	$client=makeSoapClientObj($CARDIA['url']);
	//if($CARDIA['debug']) { echo("<pre>"); print_r($client); echo("</pre>"); }


	$result=$client->call('PrepareTransaction', $transactionData);
	if($CARDIA['debug']) { echo("<pre>"); print_r($result); echo("</pre>"); }

	// Check the result, and continue transaction if OK
	if(handleResult($client, $result)) {
		$url=$result['Address']."?guid=".$result['ReferenceGuid'];
		if($CARDIA['debug']) { echo("Shop: <a href='".$url."'>".$url."</a>"); }
		return $url;
	} else {
		echo("<br>PrepareTransaction failed!<br>");
		die();
	}
}

function endTransaction($merchantReference) {
	/* ******************************************************************
	 *	Initiates a transaction. Returns the URL to which the cardholder
	 *	should be forwarded.
	 *	Parameters:
	 *
	 *	$merchantReference
	 *		Unique identificator for this transaction.
	 ****************************************************************** */
	// Make configuration data available
	global $CARDIA;

	# We prepare to send a request asking for the transaction status
	$transactionData['parameters'] = array(
		"merchantToken"			=>	$CARDIA['merchantToken'],
		"merchantReference"		=>	$merchantReference);

	if($CARDIA['debug']) { echo("<pre>"); print_r($transactionData); echo("</pre>"); }

	$client=makeSoapClientObj($CARDIA['url']);
	//if($CARDIA['debug']) { echo("<pre>"); print_r($client); echo("</pre>"); }

	$result=$client->call('ReturnTransactionStatus', $transactionData);
	if($CARDIA['debug']) { echo("<pre>"); print_r($result); echo("</pre>"); }

	if(handleResult($client, $result)) {
		$StatusCode=$result['StatusCode'];
		$ResponseCode=$result['ResponseCode'];
	}

	return displayResult($StatusCode, $ResponseCode);
}

function makeSoapClientObj($url) {
	/* ******************************************************************
	*	HELPER: Create SOAP client objects.
	*
	*	$url
	*		The URL of the web service. Should be configured in
	*		$CARDIA['url'] near the top.
	****************************************************************** */
	$client=new soapclient($url.'?WSDL', TRUE);
	// Verify instantiation
	$err=$client->getError();
	if($err) {
		// Something went wrong, we output the error and leave
		echo "<H2>SOAP client constructor error</h2>";
		echo "<pre>".$err."</pre>";
		//phpinfo();
		die;
	} else {
		return $client;
	}
}

function handleResult($client, $result) {
	/* ******************************************************************
	*	HELPER: Handle return from SOAP library
	*
	*	$client
	*		SOAP client handle
	*	$result
	*		Result variable from the SOAP client call() function
	****************************************************************** */
	if($client->fault) {
		# General error
		# We output the error message
		echo "<H2>Fault</H2><pre>";
		print_r($result);
		echo "</pre>";
		return 0;
	} else {
		$err=$client->getError();
		# Specific errors from the library
		if($err) {
			# We output the error message
			echo "<H2>Error</H2><pre>".$err."</pre>";
			return 0;
		} else {
			# Otherwise stay silent
			return 1;
		}
	}
}

function displayResult($StatusCode, $ResponseCode) {
	/* ******************************************************************
	*	Output human-readable transaction status
	****************************************************************** */
	switch($ResponseCode) {
		case 0:
		if($StatusCode<>1) {
			$txt="Undefined ResponseCode. Payment failed!";
		} else {
			$txt="Payment accepted. Thank you for your order!";
		}
		break;
		case 6:
		$txt="Invalid card number. Please try again.";
		break;
		case 7:
		$txt="Card has abuse history; payment cancelled!";
		break;
		case 17:
		$txt="Card has expired.";
		break;
		case 18:
		$txt="Invalid expiry date";
		break;
		case 19:
		$txt="Card number not valid.";
		break;
		case 22:
		$txt="Invalid card type for merchant.";
		break;
		case 25:
		case 26:
		case 27:
		case 28:
		case 29:
		case 31:
		case 54:
		$txt="Card can not be used for internet purchases";
		break;
		case 45:
		$txt="Amount is too high.";
		break;
		case 46:
		$txt="Amount is too low.";
		break;
		case 69:
		$txt="The bank did not authorize the payment (auth not OK)";
		break;
		case 74:
		$txt="Card is rejected";
		break;
		case 75:
		$txt="Not authorized";
		break;
		default:
		$txt="An unknown error has occurred, please contact the merchant!";
	}

	$out='';
	$out=$out.'<div class="orderConfirmation"><fieldset>';
	if($ResponseCode or $StatusCode<>1) {
		$out=$out.'<legend>Payment failed</legend>';
		$out=$out."<p>$txt</p>";
		$out=$out."<p>";
		$out=$out."StatusCode: $StatusCode<br>";
		$out=$out."ResponseCode: $ResponseCode";
		$out=$out."</p>";
	} else {
		$out=$out.'<legend>Payment accepted</legend>';
		$out=$out."<p>$txt</p>";
	}
	$out=$out.'</fieldset></div>';

	return $out;
}

function ExcludeSpecialCharacters($tmpString) 
{
	$tmpString = str_replace(" ", "", $tmpString);
	$tmpString = str_replace("&", "", $tmpString);
	$tmpString = str_replace("!", "", $tmpString);
	$tmpString = str_replace("#", "", $tmpString);
	$tmpString = str_replace("@", "", $tmpString);
	$tmpString = str_replace("`", "", $tmpString);
	$tmpString = str_replace("~", "", $tmpString);
	$tmpString = str_replace("%", "", $tmpString);
	$tmpString = str_replace("^", "", $tmpString);
	$tmpString = str_replace("*", "", $tmpString);
	$tmpString = str_replace("+", "", $tmpString);
	$tmpString = str_replace("!", "=", $tmpString);
	$tmpString = str_replace("?", "", $tmpString);
	$tmpString = str_replace("/", "", $tmpString);
	$tmpString = str_replace("\\", "", $tmpString);
	$tmpString = str_replace(",", "", $tmpString);
	$tmpString = str_replace("|", "", $tmpString);
	$tmpString = str_replace("<", "", $tmpString);
	$tmpString = str_replace(">", "", $tmpString);
	$tmpString = str_replace(".", "", $tmpString);
	$tmpString = str_replace(":", "", $tmpString);
	$tmpString = str_replace(";", "", $tmpString);
	$tmpString = str_replace("'", "", $tmpString);
	$tmpString = str_replace("\"", "", $tmpString);
	$tmpString = str_replace("$", "", $tmpString);
	$tmpString = str_replace("Ø", "O", $tmpString);
	$tmpString = str_replace("ø", "o", $tmpString);
	$tmpString = str_replace("Æ", "AE", $tmpString);
	$tmpString = str_replace("æ", "ae", $tmpString);
	$tmpString = str_replace("Å", "A", $tmpString);
	$tmpString = str_replace("å", "a", $tmpString);
	$tmpString = str_replace("_", "", $tmpString);
					
	//Ø ø Æ æ Å å	

	return $tmpString;
}
////////////////////////////// End Cardia Credit card constants ///////////////////////////////////
function highlightSearchTerms($fullText, $searchTerm, $bgcolor="#CCFF99")
{
	if (empty($searchTerm))
	{
		return $fullText;
	}
	else
	{
		$start_tag = "<span style=\"background-color: $bgcolor\">";
		$end_tag = "</span>";
		$highlighted_results = $start_tag . $searchTerm . $end_tag;
		return eregi_replace($searchTerm, $highlighted_results, $fullText);
	}
}
function Random_Password($length)
{ 
	$possible_charactors = "abcdefghijklmnopqrstuvwxyz*1234567890"; 
	$string = ""; 
	while(strlen($string)<$length) { 
	$string .= substr($possible_charactors, rand()%(strlen($possible_charactors)),1); 
	} 
	return($string); 
} 

?>