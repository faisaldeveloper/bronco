<?php
$FileName=$_REQUEST['FileId'];
$mypath = realpath("index.php");
$strUploadDir = "NewsFiles";
if(isset($_REQUEST['file'])) $name = 'file';
else $name  = 'image';
if (strpos($mypath,"\\") > -1 )
	$strFinalPath = substr($mypath,0,strrpos($mypath,"\\")+1).$strUploadDir."\\";
else
	$strFinalPath = substr($mypath,0,strrpos($mypath,"/")+1).$strUploadDir."/";
$data = file_get_contents(realpath($strFinalPath.$FileName));
header('Content-Type: application/octet-stream');
header("Content-Disposition: attachment; filename=${FileName}");
echo $data; 
?>