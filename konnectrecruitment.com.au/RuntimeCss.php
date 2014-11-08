<?php
include("Includes/FrontIncludes.php");	
$strStyle = $objTheme->GenerateStyleSheet();
$fHandle = fopen("Digitalspinners.css","w");
fwrite($fHandle,$strStyle);
fclose($fHandle);
?>