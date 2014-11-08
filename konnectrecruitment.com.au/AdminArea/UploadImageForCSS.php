<?php
require_once("../Includes/BackofficeIncludesFiles.php");

$upload_dir = realpath("../UploadedFiles"); 

// Directory for file storing filesystem path
$web_upload_dir = "../UploadedFiles/"; 

// Directory for file storing                          
// Web-Server dir 
/* upload_dir is filesystem path, something like   /var/www/htdocs/files/upload or c:/www/files/upload   web upload dir, is the webserver path of the same   directory. If your upload-directory accessible under        www.your-domain.com/files/upload/, then    web_upload_dir is /files/upload*/
// testing upload dir 
// remove these lines if you're shure 
// that your upload dir is really writable to PHP scripts
$tf = $upload_dir.'/'.md5(rand()).".test";$f = @fopen($tf, "w");
if ($f == false)     
	die("Fatal error! {$upload_dir} is not writable. Set 'chmod 777 {$upload_dir}'        or something like this"); fclose($f);unlink($tf);

$uploadDirectory = "../UploadedFiles/";
$ajaxFileUploader = new AjaxFileuploader($uploadDirectory);	

// end up upload dir testing 
// FILEFRAME section of the script
if (isset($_POST['hdnFileID'])) 
{    
	//print_r($_POST);
	$result = 'ERROR';    $result_msg = 'No FILE field found';    
	$nCheck=$ajaxFileUploader->DeleteDoc($_POST['hdnFileID']);
	if($nCheck)
	{
		$result = 'OK';        
		$result_msg = 'File deleted successfully';        
	}	
	else             
		$result_msg = 'Unknown error';        
	// (return data to document)    
	// This is a PHP code outputing Javascript code.    
	// Do not be so confused ;
	echo "<html><head><title>".CONST_BACKOFFICE_TITLE."Upload Image".CONST_BACKOFFICE_TITLE_END."</title></head><body>";
	echo '<script language="JavaScript" type="text/javascript">'."\n";    
	echo 'var parDoc = window.parent.document;';    
	//echo 'alert(window.parent);';
	// this code is outputted to IFRAME (embedded frame)    
	// main page is a 'parent'    
	if ($result == 'OK')    // Simply updating status of fields and submit button        
		echo 'parDoc.getElementById("tdMsg").innerHTML = "<span class=\"txt_grn\"><center>file deleted successfully</center></span>";';        
	else
		 echo 'parDoc.getElementById("tdMsg").innerHTML = "<span class=\"txt_red\" align=center>ERROR: '.$result_msg.'</span>";';    
	echo 'window.parent.GetFiles();';   
	echo "\n".'</script></body></html>';    
	exit(); 
	// do not go futher 
}
elseif (isset($_POST['fileframe'])) 
{    
	$result = 'ERROR';    $result_msg = 'No FILE field found';    
	if (isset($_FILES['file']))  
	// file was send from browser    
	{        
		if ($_FILES['file']['error'] == UPLOAD_ERR_OK)  // no error        
		{            
			$filename = $_FILES['file']['name']; // file name
			//move_uploaded_file($_FILES['file']['tmp_name'], $upload_dir.'/'.$filename);            
			$nCheck=$ajaxFileUploader->AddDocs($_FILES['file']['tmp_name'],CONST_TYPE_IMAGE,"file");
			// main action -- move uploaded file to $upload_dir             
			$result = 'OK';        
		}        
		elseif ($_FILES['file']['error'] == UPLOAD_ERR_INI_SIZE)            
			$result_msg = '<span class=\"txt_red\"><center>The uploaded file exceeds the upload_max_filesize directive in php.ini</center></span>';        
		else             
			$result_msg = '<span class=\"txt_red\"><center>Unknown error</center></span';        
		// you may add more error checking        
		// see http://www.php.net/manual/en/features.file-upload.errors.php        
		// for details     
	}   // outputing trivial html with javascript code     
	// (return data to document)    
	// This is a PHP code outputing Javascript code.    
	// Do not be so confused ;
	echo "<html><head><title>".CONST_BACKOFFICE_TITLE."Upload Image".CONST_BACKOFFICE_TITLE_END."</title></head><body>";
	echo '<script language="JavaScript" type="text/javascript">'."\n";    
	echo 'var parDoc = window.parent.document;';    
	// this code is outputted to IFRAME (embedded frame)    
	// main page is a 'parent'    
	if ($result == 'OK')    // Simply updating status of fields and submit button        
	{
		echo 'parDoc.getElementById("tdMsg").innerHTML = "<span class=\"txt_red\"><center>file successfully uploaded</center></span>";';        
		echo 'window.parent.GetFiles();';
	}	
	else
		 echo 'parDoc.getElementById("tdMsg").innerHTML = "<span class=\"txt_red\"><center>ERROR: '.$result_msg.'</center></span>";';    
	echo "\n".'</script></body></html>';    
	exit(); 
	// do not go futher 
}
// end up upload dir testing 
?>
<!-- Beginning of main page -->
<html>
	<head>
		<title><?=CONST_BACKOFFICE_TITLE?>Upload Image<?=CONST_BACKOFFICE_TITLE_END?></title>
		<script type="text/javascript" src="../Script/JavaScript.js" ></script>
		<script>
		function jsUpload(upload_field){    
			 upload_field.form.submit();    
			 var re_text = /\.mp3|\.jpeg|\.jpg|\.gif|\.txt|\.xml|\.zip/i;    
			 var filename = upload_field.value;    
			 /* Checking file type */    
			 if (filename.search(re_text) == -1)    {        
				alert("File does not have text(txt, xml, zip) extension");        
				upload_field.form.reset();        
				return false;    
			 }    
			 upload_field.form.submit();    
			 document.getElementById('tdMsg').innerHTML = "uploading file...";    
			 upload_field.disabled = true;    
			 return true;
		}		
		function GetFiles()
		{
			 getRecords("<? print AJAX_UPLOADED_FILES;?>",'hdnType:1','tdContents','','');
			 document.getElementById('file').disabled = false;    
			 document.getElementById('file').form.reset();        
		}
		function InsertImage() {
			window.opener.insertHTML(html);
			window.close();
		}
		</script>
	    <link href="websitebuilder.css" rel="stylesheet" type="text/css">
	    <link href="AdminArea.css" rel="stylesheet" type="text/css">
	</head>
<body >
<table width="100%" class="TabBorderLightGreyBG" >
	<tr><td>
	
		<table width="90%" align="center" cellpadding="0" cellspacing="0" class="TabBorderLightGreyBG">
		  <tr class="hdng_sandy"><td height="10">Upload file:</td>
		  </tr>
			<tr><td height="30" class="txt_grn">File will begin to upload just after selection.</td>
			</tr>
			<form action="<?=$PHP_SELF?>" target="upload_iframe" method="post" enctype="multipart/form-data">
			<tr><td height="10">
				<input type="hidden" name="fileframe" value="true">
				<span class="txtBld_grey">Select Image:</span>		<input type="file" name="file" id="file" onChange="jsUpload(this)">
			</td>
			</tr>	
			</form>
			<tr><td valign="top">
				<iframe name="upload_iframe" style="width: 400px; height: 100px; display:none"></iframe>
				<table width="100%" cellpadding="2" cellspacing="0">
				  <tr><td>&nbsp;</td></tr>	
				  <tr>
					<td colspan="5" id="tdMsg"></td>
				  </tr>
				  <tr>
					<td colspan="5" class="TabHeading"> Uploaded Files: <input name="hdnTdName" type="hidden" id="hdnTdName">
                    <input name="hdnComboOptions" type="hidden" id="hdnComboOptions" value="1">
                    </td>
				  </tr>
				  <tr>
					<td colspan="5" class="txt_red" id="tdMsg" align="center"></td>
				  </tr>
				  <tr>
					<td colspan="5" id="tdContents">
				  <table width="100%">
							<tr>
							  <?php
								$rs=$ajaxFileUploader->SelectAllDocs(CONST_TYPE_IMAGE);
								if(mysql_num_rows($rs)>0)
								{
									$nCounter=1;
									$strPath=substr($_SERVER['PHP_SELF'],0,(strrpos($_SERVER['PHP_SELF'],'/')));
									$strPath=substr($strPath,0,(strrpos($strPath,'/')+1));
								    $strPath="http://".$_SERVER['HTTP_HOST'].$strPath."UploadedFiles/";
									while($objRow=mysql_fetch_object($rs))
									{
										if(file_exists($web_upload_dir.$objRow->File))
										{
											$size = filesize($web_upload_dir.$objRow->File);
											$humansize = humansize($size);
										}
								?>
										<td width="25%" align="left">
										<table align="left">
										  <tr>
											<td width="40%" align="center">
											  <? 
											  $strFile = GetFileName($objRow->File);
											  //print $strPath;
											  print "<a onclick=\"opener.document.getElementById('background_image').value='".$strPath.$objRow->File."'; self.close();\"  href='#'><img src='../PhpThumb/phpThumb.php?src=".$web_upload_dir.$objRow->File."&w=50'></a>";
											  ?>
                                              </td>
										  </tr>
										  <tr>
											<td align="center"><?php print "".$humansize."";?></td>
										  </tr>
										  <tr>
											<td align="center"><form action="UploadImage.php" method="post" target="upload_iframe">
											  <input name="btnDelete" value="Delete" type="submit" class="button" onClick="return confirm('Are you sure to delete?')">
											  <input name="hdnFileID" value="<?=$objRow->pkID?>" type="hidden">
											</form></td>
										  </tr>
							  </table>
                              </td>
							  <?			
										if($nCounter%4==0)
											print "</tr><tr>";
										$nCounter++;	
									}
							  ?>	
						  </tr>
							  <? 		
								}
								else
								{
							  ?>
								  <tr>
									<td colspan="2">No file found</td>
								  </tr>
							  <?
								}
							  ?>
			  		  </table>
                      </td>
				  </tr>
			  </table>	
			</td>
		  </tr>
	  </table>		  
	</td></tr>
	<tr><td>&nbsp;
		</td>
	</tr>
</table>
</body>
</html>