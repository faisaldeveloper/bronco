<?php
require_once("../Includes/BackOfficeIncludesFiles.php");
////////////////Role Rights Implementation///////////////////
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=162;
if($objAdminUser->CheckRightForAdmin()==1)//Start Right If 
{
	/**
	Server Side Validation
	**/
	if(!isset($_POST['hdnNewsId'])||empty($_POST['hdnNewsId']))
	{
		header("location:ManageNews.php?intMessage=377");
		exit;
	}
	/*
		*Object Creation
	*/	
	$objNews = new clsNews();
	$objCMessage=new clsConfirmMessage();
	$strRowMessage='Unknown action';
	/*
		*Getting News Value
	*/	
	$intNewsId = $_POST['hdnNewsId'];
	$intModuleID=$_REQUEST['hdnModuleId'];
	$objNews->m_intNewsId = $intNewsId;
	/**
	ServerSide validation
	**/
	if(!isset($_FILES['file']) || empty($_FILES['file']['name']))
	{
		header("location:AddNewsFile.php?intMessage=365&hdnModuleId=".$intModuleID);
		exit;
	}
	if (isset($_POST['fileframe'])) 
	{   
		$strResult = 'ERROR';    $strResultMsg = '<span class=\'txt_red\'>Unknown action</span>';    
		if (isset($_FILES['file']))  
		// file was send from browser    
		{       
			if ($_FILES['file']['error'] == UPLOAD_ERR_OK)  // no error        
			{   
				//echo "This is lang id==>>".$intLangId;exit;     
				$objNews->m_intLangId = $intLangId;
				$filename = $_FILES['file']['name']; // file name
				$objNews->m_strNewsFileName = $filename;
				//move_uploaded_file($_FILES['file']['tmp_name'], $upload_dir.'/'.$filename);  
				  
				$nCheck=$objNews->AddNewsFile($_FILES['file']['tmp_name'],CONST_TYPE_FILE,"file");
				// main action -- move uploaded file to $upload_dir   
				$objCMessage->m_intConfMsgId=348;
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
		}
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
}
else
	header("location:Error.php");//End Right If
?>