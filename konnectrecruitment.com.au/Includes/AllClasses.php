<?php 
require_once("AjaxFileUploader.inc.php");
require_once("clsAdminUser.php");
require_once("clsAjaxQuery.php");
require_once("clsConcept.php");
require_once("clsConfiguration.php");
require_once("clsConfirmMessage.php");
require_once("clsDatabaseManager.php");
require_once("clsGallery.php");
require_once("clsHeaderFooter.php");
require_once("clsLanguage.php");
require_once("clsMails.php");
require_once("clsMenues.php");
require_once("clsMessages.php");
require_once("clsNews.php");
require_once("clsPages.php"); 
require_once("clsRoles.php");
require_once("clsStyles.php");
require_once("clsTheme.php");
require_once("clsStates.php");
require_once("clsServices.php");
require_once("clsCategory.php");
require_once("clsEmployeer.php");
require_once("clsJob.php");
require_once("clsJobSeeker.php");
require_once("clsJobSeekerJob.php");


$objAdminUser=new clsAdminUser();
$objAjaxQuery=new clsAjaxQuery();
$objConfiguration=new clsConfiguration();
$objConfirmMessage= new clsConfirmMessage();
$objConfirmMessage->MultiLangCheck=TRUE;
$objGallery= new clsGallery();
$objLang = new clsLanguage();
$objLanguage = new clsLanguage();
$objMessages = new clsMessages();
$objNews = new clsNews();
$objPages = new clsPages();
$objRoles=new clsRoles();
$objStyles=new clsStyles();
$objTheme=new clsTheme();
$objState = new clsState();
$objServices = new clsServices();
$objCategory = new clsCategory();
$objEmployeer = new clsEmployeer();
$objJob = new clsJob();
$objJobSeeker = new clsJobSeeker();
$objJobSeekerJob = new clsJobSeekerJob();

?>