<?php
$cid = $_SESSION['customer_id'];
if (!isset($_SESSION['nMemberId']))
{
	$nLangId = $_SESSION['intLangId'];
	session_unset();
	$_SESSION['intLangId'] = $nLangId;
	$_SESSION['customer_id'] = $cid;
	header("location:Login.php");
}
?>