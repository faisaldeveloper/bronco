<?php 

include("../Includes/BackOfficeIncludesFiles.php");
$objNews=new clsNews();	//Creating object of News class

//Variable initilization
$nId="";
$intLangId="";
$nModuleId="";
$strDescription="";
$intfkImgId="";
$nNewsID="";

//Server Side Validation
if(isset($_POST['hdnNewsId']) || !empty($_POST['hdnNewsId']))
	{
		$arrQryStr[]="NewsId=".urlencode($_POST['hdnNewsId']);
		$nNewsID = $_POST['hdnNewsId'];
	}
if(isset($_POST['hdnLangId']) || !empty($_POST['hdnLangId']))
	{
		$arrQryStr[]="nLangId=".urlencode($_POST['hdnLangId']);
		$intLangId = $_POST['hdnLangId'];
	}
if(isset($_POST['txtDescripton']) || !empty($_POST['txtDescripton']))
	{
		$strDescription = $_POST['txtDescripton'];
	}
if(isset($_POST['hdnModuleId']) || !empty($_POST['hdnModuleId']))
{
	$arrQryStr[]="hdnModuleId=".$_POST['hdnModuleId'];
	$nModuleId = $_POST['hdnModuleId'];
}
if(isset($_POST['hdnfkImgId']) || !empty($_POST['hdnfkImgId']))
{
	$arrQryStr[]="NewsImgId=".urlencode($_POST['hdnfkImgId']);
	$intfkImgId = $_POST['hdnfkImgId'];
}
$nId=$_POST['hdnId'];


//Assigning Values to Class Data Members
$objNews->m_intNewsImageId=$nNewsID;
$objNews->m_intLangId=$intLangId;
$objNews->m_nfkImgId=$intfkImgId;
$objNews->m_strImageDesc=$strDescription;
$iCheck=$objNews->EditNewsImageDesc();
$strQry = implode('&',$arrQryStr);//print_r($strQry);exit;
if($iCheck)
	header("location:AddNewsImage.php?intMessage=21&".$strQry);
else
	
	header("location:AddNewsImage.php?intMessage=22&".$strQry);

/*													End of Tranlating									*/
?>