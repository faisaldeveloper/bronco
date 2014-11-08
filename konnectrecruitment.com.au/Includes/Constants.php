<?php

///////	Multiple lang check	///////////////////////////////////////
$MultiLangCheck = false;//TRUE for multiple languages support 
						// FALSE for single language

define('CONST_BACKOFFICE_TITLE', "..:: containerplus Website Builder - ");
define('CONST_BACKOFFICE_TITLE_END', " ::..");

define('DEFAULT_EMAIL_HEADER', "http://beaustralian.net/images/beaustralianlogo.png"); 

define('INVALID_EMAIL'	 		, 'E00');
define('PASSWORD_EMPTY' 		, 'P00');
define('PHONE_EMPTY' 			, 'PH0');
define('ADDRESS_EMPTY' 			, 'AD0');
define('POSTCODE_EMPTY' 		, 'PC0');
define('LOCATION_EMPTY' 		, 'L00');
define('CITY_EMPTY'	    		, 'CTY');
define('COMPANY_NAME_EMPTY' 	, 'CN0');
define('ORG_NUMBER_EMPTY' 		, 'ON0');
define('C_PERSON_NAME_EMPTY' 	, 'CP0');
define('C_PERSON_PHONE_EMPTY' 	, 'CT0');
define('C_PERSON_EMAIL_INVALID' , 'CE0');
define('NAME_EMPTY' 			, 'N00');
define('UNDER_AGE' 				, 'UA0');

//Netaxept constants///////////////////////////////////////////////////////////
define('SOAP_CLIENT', "https://payment.netaxept.no/INetaxeptWSBroker/services/INetaxeptWSBroker");
define('SOAP_OPTIONS','http://webservice.netaxept.no');

//Page position constants///////////////////////////////////////////////////////////
define('CONST_POS_TOP', "1");
define('CONST_POS_BOTTOM', "2");
define('CONST_POS_LEFT', "3");
define('CONST_POS_RIGHT', "4");

////////////////////////////////////////////////////////////////////////////////
define('AJAX_UPLOADED_FILES', 1);
define('AJAX_UPLOADED_IMAGES', 2);
define('AJAX_UPLOADED_NEWS_IMAGES', 3);
define('AJAX_UPLOADED_NEWS_FILES', 4);
define('AJAX_UPLOADED_PAGE_FILES', 5);


/////////////// Uploaded Files Constants //////////////////////////////////////
define('CONST_TYPE_IMAGE', 1);
define('CONST_TYPE_FILE', 2);

/////////////// Layout Constants //////////////////////////////////////
define('CONST_TOP_LAYOUT', 1);
define('CONST_BOTTOM_LAYOUT', 2);
define('CONST_LEFT_LAYOUT', 3);
define('CONST_RIGHT_LAYOUT', 4);

/////////////// Image Layout Constants //////////////////////////////////////
$arrLayoutImage=array();
$arrLayoutImage[CONST_TOP_LAYOUT]=array("Image Top Align","<table width='100%'><tr><td align='center'><img src='../images/PreviewImg.jpg'></td></tr><tr><td>Lorem ipsum, Dolor sit amet, consectetuer adipiscing loreum ipsum edipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore</td></tr></table>");
$arrLayoutImage[CONST_BOTTOM_LAYOUT]=array("Image Bottom Align","<table width='100%'><tr><td>Lorem ipsum, Dolor sit amet, consectetuer adipiscing loreum ipsum edipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore</td></tr><tr><td align='center'><img src='../images/PreviewImg.jpg'></td></tr></table>");
$arrLayoutImage[CONST_LEFT_LAYOUT]=array("Image left Align","<table width='100%'><tr><td><img src='../images/PreviewImg.jpg' align='left'>Lorem ipsum, Dolor sit amet, consectetuer adipiscing loreum ipsum edipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore</td></tr></table>");
$arrLayoutImage[CONST_RIGHT_LAYOUT]=array("Image Right Align","<table width='100%'><tr><td><img src='../images/PreviewImg.jpg' align='right'>Lorem ipsum, Dolor sit amet, consectetuer adipiscing loreum ipsum edipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore</td></tr></table>");

/////////////// ACTIVE Constants //////////////////////////////////////
define('INACTIVE', 0);
define('ACTIVE', 1);

define('NOT_IMAGE', 0);
define('IS_IMAGE', 1);
//////////////Concept Constants//////////////
define('CONST_CONCEPT_NEWS', 1);
define('CONST_CONCEPT_CONTACTUS', 2);
define('CONST_CONCEPT_LEFT_PANNEL', 8);
define('CONST_CONCEPT_LOGIN', 9);
define('CONST_CONCEPT_PERSONAL_PANNEL', 10);
define('CONST_CONCEPT_PASSWORD', 11);
define('CONST_CONCEPT_SEARCH_TABLE', 12);
define('CONST_CONCEPT_TOPPAN_TABLE', 13);
define('CONST_CONCEPT_IMAGE', 15);
define('CONST_CONCEPT_EMAIL', 16);
define('CONST_CONCEPT_SORT', 17);
define('CONST_CONCEPT_PAGES', 18);
define('CONST_CONCEPT_ABOUTUS', 22);
define('CONST_CONCEPT_MESSAGES', 23);
define('CONST_CONCEPT_CONFIRMATION_MESSAGES', 24);
define('CONST_CONCEPT_ADMIN_USER', 25);
define('CONST_CONCEPT_LANGUAGES', 29);
define('CONST_CONCEPT_THEME', 30);
define('CONST_CONCEPT_CONCEPT', 33);
define('CONST_CONCEPT_RSS_BOOKMARKS', 39);

$index			= "../index.php";
$arkpicturesInfo= "../cont/arkpicturesInfo.php";
$HeaderFooter   = "../cont/HeaderFooter.php";
$folders		= "../cont/folders.php";
//--------------- for index.php -----------------
$ind_index	   		= "index.php";
$ind_arkpicturesInfo= "cont/arkpicturesInfo.php";
$ind_HeaderFooter   = "cont/HeaderFooter.php";
$ind_folders		= "cont/folders.php";

//////////////Template Type Constants//////////////
define('TEMPLATE_FORNT',1);
define('TEMPLATE_BACK',2);

//////////////Menu Position Constants//////////////
define('CONST_TOP_MENU_POSTION',1);
define('CONST_LEFT_MENU_POSTION',2);
define('CONST_BOTH_MENU_POSTION',3);

//////////////Menu Type Constants//////////////
define('CONST_COLLAPSE_MENU_TYPE',1);
define('CONST_DDOPEN_MENU_TYPE',2);
define('CONST_DROPDOWN_MENU_TYPE',3);
define('CONST_RIGHTPOPUP_MENU_TYPE',4);
define('CONST_TOPD1_MENU_TYPE',5);

//////////////Module types Constants//////////////
define('CONST_MODULE_NEWS',1);
define('CONST_MODULE_SCRNEWS',2);
define('CONST_MODULE_CONTACTUS',3);
define('CONST_MODULE_LOGIN',4);
define('CONST_MODULE_IMAGEGALLERY',5);
define('CONST_MODULE_CHANGE_PASSWORD',13);
define('CONST_MODULE_GOOGLE_SEARCH',16);
define('CONST_MODULE_RSS_SUBSCRIBER',17);

//////////////Database configuration constants//////////////
define('CONST_DB_FILE','db.sql');
define('CONST_CONFG_FILE','Configuration.inc.php');
/////////////// Page type Constants ////////////////////////
define('CONST_PAGETYPE_DYNAMIC', 1);
define('CONST_PAGETYPE_MORENEWS', 4);
define('CONST_PAGETYPE_NEWSDETAIL', 5);
define('CONST_PAGETYPE_MESSAGEPAGE', 6);
define('CONST_PAGETYPE_TELLFRIEND', 7);
define('CONST_PAGETYPE_CHANGEPASSWORD', 12);
define('CONST_PAGETYPE_LOGIN', 14);
define('CONST_PAGETYPE_ERROR', 18);
define('CONST_PAGETYPE_SEARCH_RESULT', 21);
define('CONST_PAGETYPE_ADVSEARCH_RESULT', 22);
define('CONST_PAGETYPE_GOOGLE_SEARCH',26);
define('CONST_PAGETYPE_RSS_SUBSCRIBER',27);
define('CONST_PAGETYPE_EMPLOYEE_REGISTRATION',28);
define('CONST_PAGETYPE_EMPLOYEE_LOGIN',29);
define('CONST_PAGETYPE_EMPLOYEE_PROFILE',30);
define('CONST_PAGETYPE_EMPLOYEE_FORGET_PASS',31);
define('CONST_PAGETYPE_POST_JOB',32);
define('CONST_PAGETYPE_SEARCH_JOB',33);
define('CONST_PAGETYPE_VIEW_EMPLOYEE_JOB',34);
define('CONST_PAGETYPE_JOB_DETAIL',35);
define('CONST_PAGETYPE_JOB_JOBSEEKERS',36);
define('CONST_PAGETYPE_JOBSEEKER_RESUME',37);
define('CONST_PAGETYPE_VIEW_JOBSEEKER_RESUME',38);
define('CONST_PAGETYPE_VIEW_JOBSEEKER_DETAIL',39);

////////////////// Page layouts group ////////////////////////
define('CONST_LAYOUTGROUP_DEFAULT',1);

// array for control panel links 
$arrCPanelLinks = array ();
	
	//$arrCPanelLinks[RightID]=array('LinkHeading','FileName','Image',Alt);
	$arrCPanelLinks[310]=array('Modules','ModulesManager.php','icon_module_manager_48x48.png','ModulesManager');
	$arrCPanelLinks[46]=array('News Manager','ManageNewsModule.php','icon_news_48x48.png','NewsManager');
	$arrCPanelLinks[5]=array('Page Manager','ManagePages.php','icon_pages_48x48.png','PageManager');
	$arrCPanelLinks[68]=array('Image Gallery','ManageGallery.php','icon_ImageGallery_48x48.png','ImageGallery');
	$arrCPanelLinks[96]=array('Emails','Emails.php','icon_Emails_48x48.png','Emails');
	$arrCPanelLinks[93]=array('Site Options','SetOptions.php','icon_options_48x48.png','SiteOptions');
	$arrCPanelLinks[253]=array('Theme Manager','ManageTheme.php','icon_ThemeManager_48x48.png','ThemeManager');
	$arrCPanelLinks[7]=array('Administrators','ListOfAdminUser.php','icon_customer_48x48.png','Administrators');
	$arrCPanelLinks[88]=array('Role Manager','ManageRoles.php','icon_role_48x48.png','RoleManager');
	$arrCPanelLinks[26]=array('Language Manager','ManageInterfaceLang.php','icon_siteMgr_48x48.png','LangManager');
	
	// array for content manager links 
$arrCManagerLinks = array ();
	$arrCManagerLinks[5]=array('Page Manager','ManagePages.php','icon_pages_48x48.png','PageManager');
	$arrCManagerLinks[310]=array('Module Manager','ModulesManager.php','icon_module_manager_48x48.png','Module Manager');
	$arrCManagerLinks[46]=array('News Manager','ManageNewsModule.php','icon_news_48x48.png','NewsManager');
	$arrCManagerLinks[68]=array('Image Gallery','ManageGallery.php','icon_ImageGallery_48x48.png','ImageGallery');
	$arrCManagerLinks[96]=array('Emails','Emails.php','icon_Emails_48x48.png','Emails');
	
	// array for site manager links 
	$arrSManagerLinks = array ();
	$arrSManagerLinks[93]=array('Site Options','SetOptions.php','icon_options_48x48.png','Options');
	$arrSManagerLinks[253]=array('Theme Manager','ManageTheme.php','icon_ThemeManager_48x48.png','ThemeManager');
	$arrSManagerLinks[78]=array('Site Labels','ManageMessages.php','icon_label_48x48.png','Messages');
	$arrSManagerLinks[197]=array('Site Messages','ManageConfirmMessage.php','icon_news_48x48.png','ConfirmMessage');
	$arrSManagerLinks[26]=array('Language Manager','ManageInterfaceLang.php','icon_siteMgr_48x48.png','Language');
	
$arrSecurityLinks = array ();
	$arrSecurityLinks[7]=array('Administrators','ListOfAdminUser.php','icon_customer_48x48.png','Administrators');
	$arrSecurityLinks[88]=array('Role Manager','ManageRoles.php','icon_role_48x48.png','RoleManager');
	$arrSecurityLinks[154]=array('Change Password','ChangePassword.php','icon_cpass_48x48.png','ChangePassword');

//Constant for Work type
define('FULL_TIME',1);
define('PART_TIME',2);
define('CONTRACT',3);
define('CASUAL',4);
$arrWorkType = array();
$arrWorkType[FULL_TIME] = "Full Time";
$arrWorkType[PART_TIME] = "Part Time";
$arrWorkType[CONTRACT] = "Contract / Temp";
$arrWorkType[CASUAL] = "Casual / Vacation";

//Constant for Sponsered links targets
define('CONST_BLANK',"_blank");
define('CONST_SELF',"_self");
define('CONST_PARENT',"_parent");
define('CONST_TOP',"_top");
$arrSLinkTargets = array();
$arrSLinkTargets[CONST_BLANK] = "Blank";
$arrSLinkTargets[CONST_SELF] = "Self";
$arrSLinkTargets[CONST_PARENT] = "Parent";
$arrSLinkTargets[CONST_TOP] = "Top";	
	
define('CONST_REPLACEPATH','http://konnectrecruitment.com.au/');	

?>