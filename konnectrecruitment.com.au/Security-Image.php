<?php
   // include security image class
   require('Includes/clsSecurityImage.php');
   
   // start PHP session
   session_start();
   
   // get parameters
   isset($_GET['width']) ? $iWidth = (int)$_GET['width'] : $iWidth = 150;
   isset($_GET['height']) ? $iHeight = (int)$_GET['height'] : $iHeight = 30;
   
   // create new image
   $objSecurityImage = new clsSecurityImage($iWidth, $iHeight);
   if ($objSecurityImage->Create()) {
      // assign corresponding code to session variable 
      // for checking against user entered value
      $_SESSION['code'] = $objSecurityImage->GetCode();
   } else {
      echo 'Image GIF library is not installed.';
   }
?>
