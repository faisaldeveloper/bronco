<?php
require_once("../Includes/BackOfficeIncludesFiles.php");
////////////////Role Rights Implementation///////////////////
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=48;
$intModuleID=$_REQUEST['hdnModuleId'];

if($objAdminUser->CheckRightForAdmin()==1)
{
	/**
	Serrver side validation
	**/
	if(!isset($_POST['hdnNewsId'])||empty($_POST['hdnNewsId']))
	{
		header("location:ManageNews.php?intMessage=377&hdnModuleId=".$intModuleID);
		exit;
	}
	/**
	Object Creation 
	**/
	$objNews = new clsNews();
	$objCMessage=new clsConfirmMessage();
	/**
	Variables initialization
	**/
	$arrQryStr=array();
	$strRowMessage='Unknown action';
	$intNewsId = "";
	$strDesc = "";
	$intLangId = $_SESSION['intLangId'];
	/**
	Coping data from query string
	**/
	if(isset($_POST['hdnNewsId']))
		{
		$arrQryStr[] = "hdnNewsId=".urlencode($_POST['hdnNewsId']);
		$intNewsId = $_POST['hdnNewsId'];
		}
	if(isset($_POST['txtImageDesc']))
		{
		$arrQryStr[] = "txtImageDesc=".urlencode($_POST['txtImageDesc']);
		$strDesc = $_POST['txtImageDesc'];
		}
		
		$arrQryStr[] = "hdnModuleId=".urlencode($_POST['hdnModuleId']);
		
	if(isset($_POST['hdnLangId']))
		$intLangId = $_POST['hdnLangId'];
		$strQry = implode('&',$arrQryStr);	//constructing querystring
	/**
	Server side validation
	**/
	if(!isset($_POST['txtImageDesc']) || empty($_POST['txtImageDesc'])||!isset($_FILES['file']) || empty($_FILES['file']))
	{
		header("location:AddNewsImage.php?intMessage=365&".$strQry);
		exit;
	}
	
	/**
	Transfering data to class variables
	**/
	$objNews->m_intNewsId = $intNewsId;
	$objNews->m_intLangId = $intLangId;
	$objNews->m_strImgDesc=$strDesc;
	$arrNews = $objNews->GetNewsById();
	if($arrRecNews != NULL)$arrRecNews = mysql_fetch_object($arrNews);
	$objNews->m_strNewsTitle = $arrRecNews->NewsTitle;
	
	if (isset($_POST['fileframe'])) 
	{    
		$result = 'ERROR';    $result_msg = 'No FILE field found';    
		if (isset($_FILES['file']))  
		// file was send from browser    
		{    // echo "iam hereinside if";   exit;
			if ($_FILES['file']['error'] == UPLOAD_ERR_OK)  // no error        
			{        
				$objNews->m_intNewsId = $_POST['hdnNewsId'];
				$objNews->m_intLangId = $_SESSION['intLangId'];
				$filename = $_FILES['file']['name']; // file name
				$objNews->m_strNewsImageName = $filename;
				//move_uploaded_file($_FILES['file']['tmp_name'], $upload_dir.'/'.$filename);  
				  //echo "i am here";
				$nCheck=$objNews->AddNewsImage2($_FILES['file']['tmp_name'],CONST_TYPE_IMAGE,"file");
				// main action -- move uploaded file to $upload_dir             
				$objCMessage->m_intConfMsgId=19;
				$rsCMessage=$objCMessage->GetMessage_BackOffice();
				if($rsCMessage!=false)
				{
					$strRowMessage=mysql_fetch_array($rsCMessage);
					if($strRowMessage['Indicator']==0)
						$strResultMsg="<span class='txt_grn' align=center>";				
					else	
						$strResultMsg ="<span class='txt_red' align=center>";
					$strResultMsg .= '<img src=\"../images/'.$strRowMessage['Image'].'\"> '.$strRowMessage['ConfMsgDesc'].'</span>';        
				}	
				$strResult = 'OK'; 
			} 
			//echo "This is ur message==>>".$strResultMsg.$strResult;exit;
			// you may add more error checking        
			// see http://www.php.net/manual/en/features.file-upload.errors.php        
			// for details     
		}   // outputing trivial html with javascript code     
		// (return data to document)    
		// This is a PHP code outputing Javascript code.    
		// Do not be so confused ;
		
		echo '<html><head><title>-</title></head><body>';    
		echo '<script language="JavaScript" type="text/javascript">'."\n";    
		echo 'var parDoc = window.parent.document;';    
		// this code is outputted to IFRAME (embedded frame)    
		// main page is a 'parent'    
		echo 'parDoc.getElementById("tdMsg").innerHTML = "'.$strResultMsg.'";';        
		if ($strResult == 'OK')    // Simply updating status of fields and submit button        
			echo 'window.parent.GetFiles();';
		echo "\n".'</script></body></html>';    
		exit(); 
		// do not go futher 
	}
	header("location:AddNewsImage.php?NewsId=${intNewsId}&intMessage=220");
}
else
	header("location:Error.php");
?>