<?php
include("../Includes/BackOfficeIncludesFiles.php");

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
	die("Fatal error! {$upload_dir} is not writable. Set 'chmod 777 {$upload_dir}' or something like this");
fclose($f);unlink($tf);

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
		<script type="text/javascript" src="EditorFiles/richtext.js" ></script>
		<script>
		function jsUpload(upload_field){    
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
		function SetProportion(nCase){    
			switch(nCase)
			{
				case 1:		//Width is changed
					if(document.getElementById('chkCP').checked)
						document.getElementById('txtHeight').value=document.getElementById('txtWidth').value;
				break;		
				case 2:		//Height is changed
					if(document.getElementById('chkCP').checked)
						document.getElementById('txtWidth').value=document.getElementById('txtHeight').value;
				break;		
				case 3:		//Checkbox CP is changed
					if(document.getElementById('txtWidth').value!='')
						document.getElementById('txtHeight').value=document.getElementById('txtWidth').value;
					else
						document.getElementById('txtWidth').value=document.getElementById('txtHeight').value;
				break;	
			}
			return true;
		}		
		function GetFiles()
		{
			 getRecords("<? print AJAX_UPLOADED_PAGE_FILES;?>",'hdnType:1','tdContents','','');
			 document.getElementById('file').disabled = false;    
			 document.getElementById('file').form.reset();        
		}
		function InsertImage() {
			if(document.getElementById('txtLink').value=='')
			{
				alert("Please select image or enter image url");
				document.getElementById('txtLink').focus();
				return false;
			}	
			var html='<img src="'+document.getElementById('txtLink').value+'"';
			if(document.getElementById('lstAlignment').value!='')
				html=html+' align="'+document.getElementById('lstAlignment').value+'"';
			if(document.getElementById('txtWidth').value!='')
			{
				if(isNaN(document.getElementById('txtWidth').value))
				{
					alert("Please enter number");
					document.getElementById('txtWidth').focus();
					return false;
				}	
				html=html+' width="'+document.getElementById('txtWidth').value+'"';
			}	
			if(document.getElementById('chkCP').checked)
				html=html+' height="'+document.getElementById('txtWidth').value+'"';
			else if(document.getElementById('txtHeight').value!='')
			{
				if(isNaN(document.getElementById('txtHeight').value))
				{
					alert("Please enter number");
					document.getElementById('txtHeight').focus();
					return false;
				}	
				html=html+' width="'+document.getElementById('txtWidth').value+'"';
			}	
			if(document.getElementById('txtVSpace').value!='')
			{
				if(isNaN(document.getElementById('txtVSpace').value))
				{
					alert("Please enter number");
					document.getElementById('txtVSpace').focus();
					return false;
				}	
				html=html+' vspace="'+document.getElementById('txtVSpace').value+'"';
			}	
			if(document.getElementById('txtHSpace').value!='')
			{
				if(isNaN(document.getElementById('txtHSpace').value))
				{
					alert("Please enter number");
					document.getElementById('txtHSpace').focus();
					return false;
				}	
				html=html+' hspace="'+document.getElementById('txtHSpace').value+'"';
			}	
			if(document.getElementById('txtBorder').value!='')
			{
				if(isNaN(document.getElementById('txtBorder').value))
				{
					alert("Please enter number");
					document.getElementById('txtBorder').focus();
					return false;
				}	
				html=html+' border="'+document.getElementById('txtBorder').value+'"';
			}	
			html=html+'>'; 
			//alert(html);
			window.opener.insertHTML(html);
			window.close();
		}
		</script>
	    <link href="websitebuilder.css" rel="stylesheet" type="text/css">
	    <link href="AdminArea.css" rel="stylesheet" type="text/css">
	</head>
<body bgcolor="#FFFFFF">
<table width="99%" align="center" bgcolor="#FFFFFF" class="TabBorderLightGreyBG">
<tr><td>
	
		<table width="90%" align="center" class="border_grey">
			<tr class="hdng_sandy"><td height="10" class="hdng_sandy">Upload file:</td>
			</tr>
			<tr><td height="10">&nbsp;</td></tr>
			<tr><td height="10" class="txtBld_grey">File will begin to upload just after selection.</td>
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
				  <tr>
					<td colspan="5" id="tdMsg">					</td>
				  </tr>
				  <tr>
					<td colspan="5" class="txtBld_grey"> Uploaded Files:			  <input name="hdnTdName" type="hidden" id="hdnTdName">			  <input name="hdnComboOptions" type="hidden" id="hdnComboOptions" value="1">			</td>
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
									//print "http://".$_SERVER['HTTP_HOST'].$strPath;
								    $strPath="http://".$_SERVER['HTTP_HOST'].$strPath."UploadedFiles/";
									while($objRow=mysql_fetch_object($rs))
									{
										$size = filesize($web_upload_dir.$objRow->File);
										$humansize = humansize($size);
								?>
										<td width="25%" align="left">
										<table align="left">
										  <tr>
											<td width="40%" align="center">
											  <? 
											  $strFile = GetFileName($objRow->File);
											  //print $strPath;
											  print "<a onclick=\"document.getElementById('txtLink').value='".$strPath.$objRow->File."'\"  href='#'><img src='../PhpThumb/phpThumb.php?src=".$web_upload_dir.$objRow->File."&w=100'></a>";
											  ?>										    </td>
										  </tr>
										  <tr>
											<td align="center"><?php print "".$humansize."";?></td>
										  </tr>
										  <tr>
											<td align="center"><form action="UploadImage.php" method="post" target="upload_iframe">
											  <input name="btnDelete" type="submit" class="button" value="Delete">
											  <input name="hdnFileID" value="<?=$objRow->pkID?>" type="hidden">
											</form></td>
										  </tr>
							  </table>							  </td>
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
									<td colspan="2" align="center" class="txt_red">No file found</td>
								  </tr>
							  <?
								}
							  ?>
			  		  </table>					</td>
				  </tr>
			  </table>	
					</td>
		  </tr>
	  </table>		  
	</td></tr>
	<tr><td>
		<table width="90%" align="center" class="Table_Border">
			<tr>
			  <td colspan="2" class="hdng_sandy">Selected Image Properties </td>
		  </tr>
			<tr>
			  <td colspan="2" class="txtBld_grey">(To select uploaded image, click on image)</td>
		  </tr>
			<tr>
			  <td class="txtBld_grn">Image Path </td>
			  <td><input name="txtLink" type="text" id="txtLink" size="60"></td>
		  </tr>
			<tr>
				<td class="txtBld_grn">
					Alignment				</td>
				<td><select id="lstAlignment" name="lstAlignment">
				  <option value="">Not Set</option>
				  <option value="">Baseline</option>
				  <option value="top">Top</option>
				  <option value="middle">Middle</option>
				  <option value="bottom">Bottom</option>
				  <option value="">TextTop</option>
				  <option value="">Absolute Middle</option>
				  <option value="">Absolute Bottom</option>
				  <option value="left">Left</option>
				  <option value="right">Right</option>
				</select></td>
			</tr>				
			<tr>
				<td class="txtBld_grn">
					Dimensions</td>
			  <td><input name="txtWidth" type="text" id="txtWidth" onBlur="SetProportion(1)" size="4" maxlength="4">
			    <span class="txtBld_grn">x</span>			    
			      <input name="txtHeight" type="text" id="txtHeight" onBlur="SetProportion(2)" size="4" maxlength="4"> 
			      <span class="txtBld_grn">px</span> </td>
			</tr>				
			<tr>
			  <td>&nbsp;</td>
			  <td><input name="chkCP" type="checkbox" class="checkbox" id="chkCP" onClick="SetProportion(3)" value="checkbox">
			   <span  class="txtBld_grn"> Constrain Proportion </span></td>
		  </tr>
			<tr>
				<td class="txtBld_grn">
					Verticle Space </td>
				<td><input name="txtVSpace" type="text" id="txtVSpace" size="4" maxlength="4"> 
				<span class="txtBld_grn">px</span> </td>
			</tr>
			<tr>
			  <td  class="txtBld_grn">Horizontal Space </td>
			  <td><input name="txtHSpace" type="text" id="txtHSpace" size="4" maxlength="4"> 
			  <span  class="txtBld_grn">px</span> </td>
		  </tr>
			<tr>
			  <td class="txtBld_grn">Border</td>
			  <td><input name="txtBorder" type="text" id="txtBorder" size="4" maxlength="4"> 
			  <span class="txtBld_grn">px</span> </td>
		  </tr>
			<tr>
			  <td>&nbsp;</td>
			  <td><input name="Submit" type="submit" class="TabHeading" onClick="InsertImage();" value="Select"></td>
		  </tr>				
	  </table>
    </td></tr>
</table>
</body>
</html>