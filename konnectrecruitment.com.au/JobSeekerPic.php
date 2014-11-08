<?php 
 	header('Content-type: image/'.substr(strrchr($_REQUEST['Name'], "."), 1));
	$web_upload_dir = "JobSeekerPics/";
	$strImageNameEncryt = sha1($_REQUEST['Name']).".". substr(strrchr($_REQUEST['Name'], "."), 1);
	readfile($web_upload_dir.$strImageNameEncryt);
 	exit;
?>