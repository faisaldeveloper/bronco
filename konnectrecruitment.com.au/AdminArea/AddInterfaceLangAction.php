<?php
	require_once("../Includes/BackOfficeIncludesFiles.php");
//--------------Checking for right---------------------
$objAdminUser=new clsAdminUser();
$objAdminUser->m_objRoles=new clsRoles();
$objAdminUser->m_intUserId=$_SESSION['intUserId'];
$objAdminUser->m_objRoles->m_intRightId=27;
if($objAdminUser->CheckRightForAdmin()==1)
{
	if(!empty($_POST['hdnAction']) && $_POST['hdnAction']=="Edit")
	{
		// Editing an Interface Lang for updation
		$strName = '';
		$arrQryStr = array();
		$nLangID = $_POST['hdnLangId'];
			
		if(isset($_POST['hdnLangId']) && !empty($_POST['hdnLangId']))
			$arrQryStr[]='hdnLangId='.$_POST['hdnLangId'];	
			
		if(isset($_POST['txtLangDesc']) && !empty($_POST['txtLangDesc']))
		{
			$arrQryStr[]='strLang='.$_POST['txtLangDesc'];
			$strName = $_POST['txtLangDesc'];
		}
		$strQryStr=implode('&',$arrQryStr);
	
		if(!isset($_POST['txtLangDesc']) || empty($_POST['txtLangDesc']))
		{
			header("location:EditInterfaceLang.php?intMessage=329".'&'.$strQryStr);
			exit;
		}
		$strName=$_POST['txtLangDesc'];
		
		$objLanguage->m_strLangDesc = $_POST['txtLangDesc'];
		$objLanguage->m_intLangId = $_POST['hdnLangId'];
	
		$iCheck = $objLanguage->EditLanguage();
		
		if($iCheck>0)
		{
			header("location:ManageInterfaceLang.php?intMessage=327");
			exit;
		}
		else
		{
			header("location:ManageInterfaceLang.php?intMessage=328");
			exit;
		}
	}
	else
	{
		// Inserting an Interface Lang
		$strLang = '';
		$arrQryStr = array();
			
		if(isset($_POST['txtLangName']) && !empty($_POST['txtLangName']))
		{
			$arrQryStr[]='strLang='.$_POST['txtLangName'];
			$strLang = $_POST['txtLangName'];
		}
		$strQryStr=implode('&',$arrQryStr);
		
		if(!isset($_POST['txtLangName']) || empty($_POST['txtLangName']))
		{
			header("location:AddInterfaceLang.php?intMessage=329".'&'.$strQryStr);
			exit;
		}
			$objLanguage->m_strLangDesc = $strLang;
			$strLang = $objLanguage->AddNewLang();
			
			if(mysql_insert_id() > 0)
			{
				$nLanguageID=mysql_insert_id();
				//echo "lang ",$nLanguageID;exit;
				if(isset($_FILES['flLangFlag']['name']) && !empty($_FILES['flLangFlag']['name']))
				{
				$strRealPathFile = "AdminLogin";
				$strDestFolder = "../LangFlags"; // ---- I M HERE
				$strImagePrefix = $nOutletLang;
				$strValidExtension = "gif,jpg,jpeg,png,bmp,psd,tiff";
				$strControlName = "flLangFlag";
				$intMaxSize=1048576;
				$strUploaded = UploadFile($strRealPathFile, $strDestFolder, $strImagePrefix, $strValidExtension, $strControlName, $intMaxSize);
				if(strpos($strUploaded,"_")>-1)
					$strLangFlag = $strUploaded;
				else
					$strLangFlag = "";
				}
				else 
					$strLangFlag = "";
				if($strUploaded)
				$nCheck = $objLanguage->AddLangImage($nLanguageID , $strUploaded);
				
					if($strLang==true)
					{
						header("location:ManageInterfaceLang.php?intMessage=330");
						exit;
					}
					else
					{
						header("location:ManageInterfaceLang.php?intMessage=331");
						exit;
					}
			}
			else
			{
				header("location:ManageInterfaceLang.php?intMessage=330");
				exit;
			}
	}
}
else
	header("location:Error.php");//End Right If
?>