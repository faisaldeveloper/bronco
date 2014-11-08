<?php
$FileName=$_REQUEST['intFileName'];
//print_r($_REQUEST['intFileName']);exit;
$mypath = realpath("../index.php");
$strUploadDir = "NewsFiles";
if (strpos($mypath,"\\") > -1 )
	$strFinalPath = substr($mypath,0,strrpos($mypath,"\\")+1).$strUploadDir."\\";
else
	$strFinalPath = substr($mypath,0,strrpos($mypath,"/")+1).$strUploadDir."/";
//$data = file_get_contents(realpath($strFinalPath.$FileName));
///////////////////////////////////////////////////////
chdir($strFinalPath);
$name=$FileName;
$pieces = explode(".", $name);
$type=$pieces[1];
$size=filesize($name); 
header("Content-length: $size");
header("Content-type: $type");
header("Content-Disposition: attachment; filename=$name");
$size2=$size-1; 
header("Content-Range: bytes 0-$size2/$size"); 
if ($fptr = fopen($name, 'rb')) 
{ 
	while(!feof($fptr) and (connection_status()==0)) 
	{ 
		fread($fptr, 1024*4); 
		flush(); 
	} 
$status = (connection_status()==0); 
fclose($fptr); 
} 
else
header("location:ManageNews.php");
?>