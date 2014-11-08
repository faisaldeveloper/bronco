<?
require_once("../Includes/BackOfficeIncludesFiles.php");

//--------------Checking for right---------------------
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=68;
if($objAdminUser->CheckRightForAdmin()==1)
{

///////////////Server Side validation//////////////////
	if ((!isset($_REQUEST['chkImageGal']) || empty($_REQUEST['chkImageGal'])) && (!isset($_REQUEST['btndelete']) || empty($_REQUEST['btndelete'])) && (!isset($_REQUEST['fileframe']) || empty($_REQUEST['fileframe']))) 
	{
	header("location:ManageGallery.php?intMessage=360");
	exit;
	}
	else if((!isset($_REQUEST['txtImageDesc']) || empty($_REQUEST['txtImageDesc'])) && (!isset($_REQUEST['file']) || empty($_REQUEST['file'])) && (empty($_REQUEST['btndelete']) || !isset($_REQUEST['btndelete'])) && (empty($_REQUEST['btnAllActive_x']) || !isset($_REQUEST['btnAllActive_x'])) && (empty($_REQUEST['btnAll_y']) || !isset($_REQUEST['btnAll_y']))&& (!isset($_REQUEST['fileframe']) || empty($_REQUEST['fileframe'])))
	{
	header("location:ManageGalleryImage.php?intMessage=365&hdnModuleID=".$_REQUEST['hdnModuleID']);
	exit;
	}
	//////////////////Class object creation//////////////
	$objGallery = new clsGallery();
	
	$objCMessage=new clsConfirmMessage();
	$objLang=new clslanguage();
	//////////////Initializing variables////////////////
	$upload_dir = "";
	$web_upload_dir = "";
	$uploadDirectory = "";
	///////////////////////code for gallery new code///////////////////////
	$upload_dir = realpath("../GalleryPictures"); 
	// Directory for file storing filesystem path
	$web_upload_dir = "../GalleryPictures/"; 
	// Directory for file storing                          
	// Web-Server dir 
	/* upload_dir is filesystem path, something like   /var/www/htdocs/files/upload or c:/www/files/upload   web upload dir, is the webserver path of the same   directory. If your upload-directory accessible under        www.your-domain.com/files/upload/, then    web_upload_dir is /files/upload*/
	// testing upload dir 
	// remove these lines if you're shure 
	// that your upload dir is really writable to PHP scripts
	$tf = $upload_dir.'/'.md5(rand()).".test";$f = @fopen($tf, "w");
	if ($f == false)     
		die("Fatal error! {$upload_dir} is not writable. Set 'chmod 777 {$upload_dir}'        or something like this"); 	fclose($f);unlink($tf);
	$uploadDirectory = "../GalleryPictures/";
	////////////////////Transfering values to class variables//////////////////
	$objGallery->uploadDirectory=$uploadDirectory;	
	$objGallery->m_intLangId=$_SESSION['intLangId'];
	
	
	if(isset($_POST['hdnSelStat']) && !isset($_POST['btndelete']))
	{
		if($_POST['chkImageGal'])
		{
			$arr=$_POST['chkImageGal'];//print_r($arr)
			$objGallery->m_intImagesIds=$arr;
			if($_POST['hdnSelStat']==1)
			$nCheck = $objGallery->ActivateSelected();
			else
			$nCheck = $objGallery->DeActivateSelected();
		}
		if($nCheck)
		{
			echo '<html><head><title>-</title></head><body>';    
				echo '<script language="JavaScript" type="text/javascript">'."\n";    
				echo 'var parDoc = window.parent.document;';    
				//echo 'alert(window.parent);';
				// this code is outputted to IFRAME (embedded frame)    
				// main page is a 'parent'    
				if($nCheck==1)
					$objCMessage->m_intConfMsgId=13;
				else
					$objCMessage->m_intConfMsgId=14;
					$rsCMessage=$objCMessage->GetMessage_BackOffice();
					if($rsCMessage!=false)
						$strRowMessage=mysql_fetch_array($rsCMessage);
					echo 'parDoc.getElementById("tdMsg").innerHTML = "<span class=\"txt_grn\"><center><img src=\"../images/'.$strRowMessage['Image'].'\"> '.$strRowMessage['ConfMsgDesc'].'</center></span>";';        		
					echo 'window.parent.GetFiles();';   
					echo "\n".'</script></body></html>';    
					exit(); 
		}
	}
	if (isset($_POST['btndelete'])) 
	{    
		if($_POST['chkImageGal'])
		{
			$arr=$_POST['chkImageGal'];//print_r($arr)
			foreach ($arr as $value)
			{
				//print_r($_POST);
				$objGallery->m_intGImageId=$value;
				$objGallery->m_strImageName=$_POST['hdnImageName'];
				$result = 'ERROR';    $result_msg = 'No FILE field found';  
				$nCheck=$objGallery->DeleteGalleryImg();
				if($nCheck)
				{
					$result = 'OK';        
					$result_msg = 'File deleted successfully';        
				}	
				else             
					$result_msg = 'Unknown error';  
				}      
				// (return data to document)    
				// This is a PHP code outputing Javascript code.    
				// Do not be so confused ;
				echo '<html><head><title>-</title></head><body>';    
				echo '<script language="JavaScript" type="text/javascript">'."\n";    
				echo 'var parDoc = window.parent.document;';    
				//echo 'alert(window.parent);';
				// this code is outputted to IFRAME (embedded frame)    
				// main page is a 'parent'    
				if ($result == 'OK')    // Simply updating status of fields and submit button        
				{
					$objCMessage->m_intConfMsgId=318;
					$rsCMessage=$objCMessage->GetMessage_BackOffice();
					if($rsCMessage!=false)
						$strRowMessage=mysql_fetch_array($rsCMessage);
					echo 'parDoc.getElementById("tdMsg").innerHTML = "<span class=\"txt_grn\"><center><img src=\"../images/'.$strRowMessage['Image'].'\"> '.$strRowMessage['ConfMsgDesc'].'</center></span>";';        
				}
				else
					 echo 'parDoc.getElementById("tdMsg").innerHTML = "<span class=\"txt_red\" align=center>ERROR: '.$result_msg.'</span>";';    
				echo 'window.parent.GetFiles();';   
				echo "\n".'</script></body></html>';    
				exit(); 
				// do not go futher 
			
		}
	}
	elseif (isset($_POST['fileframe'])) 
	{    
		$result = 'ERROR';    $result_msg = 'No FILE field found';    
		if (isset($_FILES['file']))  
		// file was send from browser    
		{        
			if ($_FILES['file']['error'] == UPLOAD_ERR_OK)  // no error        
			{        
				$objGallery->m_intIsActive=$_POST['chkActive'];
				$objGallery->m_intLangId=$_POST['hdnLangId'];
				$objGallery->m_intImageRank=$_POST['cmbRank'];
				$objGallery->m_intModuleID=$_POST['hdnModuleID'];
				 $objGallery->m_strImageDesc=$_POST['txtImageDesc'];
				$filename = $_FILES['file']['name']; // file name
				//move_uploaded_file($_FILES['file']['tmp_name'], $upload_dir.'/'.$filename);  
				   
				$nCheck=$objGallery->AddImages($_FILES['file']['tmp_name'],CONST_TYPE_IMAGE,"file");
				// main action -- move uploaded file to $upload_dir             
				$result = 'OK';        
			}        
			elseif ($_FILES['file']['error'] == UPLOAD_ERR_INI_SIZE)            
				{
				$objCMessage->m_intConfMsgId=20;
				$rsCMessage=$objCMessage->GetMessage_BackOffice();
				if($rsCMessage!=false)
					$strRowMessage=mysql_fetch_array($rsCMessage);
				$result_msg = '<span class=\"txt_red\"><center><img src=\"../images/'.$strRowMessage['Image'].'\"> '.$strRowMessage['ConfMsgDesc'].'</center></span>';        
				}
			else             
				{
				$objCMessage->m_intConfMsgId=19;
				$rsCMessage=$objCMessage->GetMessage_BackOffice();
				if($rsCMessage!=false)
					$strRowMessage=mysql_fetch_array($rsCMessage);
				$result_msg = '<span class=\"txt_red\"><center><img src=\"../images/'.$strRowMessage['Image'].'\"> '.$strRowMessage['ConfMsgDesc'].'</center></span>';        
				}
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
		if ($result == 'OK')    // Simply updating status of fields and submit button        
		{
			$objCMessage->m_intConfMsgId=19;
			$rsCMessage=$objCMessage->GetMessage_BackOffice();
			if($rsCMessage!=false)
				$strRowMessage=mysql_fetch_array($rsCMessage);
			echo 'parDoc.getElementById("tdMsg").innerHTML = "<span class=\"txt_grn\"><center><img src=\"../images/'.$strRowMessage['Image'].'\"> '.$strRowMessage['ConfMsgDesc'].'</center></span>";';        
			echo 'window.parent.GetFiles();';
		}	
		else
			 echo 'parDoc.getElementById("tdMsg").innerHTML = "<span class=\"txt_grn\"><center>ERROR: '.$result_msg.'</center></span>";';    
		echo "\n".'</script></body></html>';    
		exit(); 
		// do not go futher 
	}
	
	header("location:ManageGalleryImage.php?msg=updated&lstLanguage=${intLangId}");
}

?>
