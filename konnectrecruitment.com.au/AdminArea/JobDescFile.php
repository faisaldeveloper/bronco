<?php
$strOrgName = $_REQUEST['Name'];
$strEncName = sha1($strOrgName).".".substr(strrchr($strOrgName, "."), 1);
header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename("../JobDescription/".$strOrgName));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header('Content-Length: ' . filesize("../JobDescription/".$strEncName));
readfile("../JobDescription/".$strEncName);
?>