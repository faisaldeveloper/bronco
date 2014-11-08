<?php 
 	header('Content-type: image/'.substr(strrchr($_REQUEST['id'], "."), 1));
	$web_upload_dir = "images/";
	$strImageNameEncryt = $_REQUEST['id'];
	readfile($web_upload_dir.$strImageNameEncryt);
 	exit;
?>