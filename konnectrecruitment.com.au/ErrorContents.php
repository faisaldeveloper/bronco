<?php
require_once("Includes/FrontSecurity.php");
require_once("Includes/FrontIncludes.php");
require_once('Includes/Constants.php');
require_once("Includes/PaymentIncludes.php");

$objLang  = new clsLanguage();

if(isset($_GET['LangId']))
{
	$_SESSION['intLangId'] = $_GET['LangId'];
}
else if(!isset($_SESSION['intLangId']))
{	
	$_SESSION['intLangId'] = $objLang->GetDefaultLangId();
}
?>
	<table width="100%">
	  <tr>
		<td align="center" class="Heading">&nbsp;</td>
	  </tr>
	  <tr>
		<td align="center" class="Heading">Error !</td>
	  </tr>
	  <tr>
		<td align="center">
		  <?php 
		  //Payment Gateway Closing Transactions If Any Like for CARDIA
		  echo endTransaction($_GET['merchantReference']);
		?>
		</td>
	  </tr>
	  <tr>
		<td align="center">&nbsp;</td>
	  </tr>
	</table>