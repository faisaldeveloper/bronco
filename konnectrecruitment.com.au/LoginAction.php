<?php
	session_start();
	include ("Includes/FrontIncludes.php");
	/**
		Assigning values to variables
	**/
	$strUserPass=$_REQUEST['txtUserPass'];
	$strUserLogin=$_REQUEST['txtUserLogin'];
	$objUser=new clsUser();

	/**
		Assigning values to Class variables
	**/
	$objUser->m_strPass=$strUserPass;
	$objUser->m_strLogin=$strUserLogin;
	$rsUser=$objUser->VarifySUser();

	/**
		Server side Valiodation
	**/
	
	if(isset($_POST['txtUserLogin']) || !empty($_POST['txtUserLogin']))
	{
		$arrQryStr[]="strUserLogin=".urlencode($_POST['txtUserLogin']);
		$strUserLogin = $_POST['txtUserLogin'];
	}

	/**
		Constructing a query string in an array
	**/
		$strQry = implode('&',$arrQryStr);
	
	/**
	 	To Check if not Set (Server Side Validation)
	**/
	
	if(!isset($_POST['txtUserLogin']) || empty($_POST['txtUserLogin']))
	{
		header("Location:Login.php?intMessage=117");
		exit;
	}
	if(!isset($_POST['txtUserPass']) || empty($_POST['txtUserPass']))
	{
		header("Location:Login.php?intMessage=118&".$strQry);
		exit;
	}


	/**
		Fetching Data from table
	**/
	if($rsUser!=FALSE) //start of IF rsUser
	{
		$strRowUser=mysql_fetch_array($rsUser);
		$_SESSION['Name'] = $strRowUser['Name'];
		$_SESSION['nMemberId'] = $strRowUser['pkUserId'];
		$_SESSION['ShoppingUser'] = $strRowUser['Email'];
		if(isset($_SESSION['customer_id']))
		{
		
			$objUser->m_intUserId = $_SESSION['nMemberId'];
			header("location:UserBasket.php?intMessage=389");
		}
		else
			{
				header("location:UserMain.php");
			}	
	}//end of IF rsUser
	else
	{	
		header("location:Login.php?intMessage=1");
	}
?>
