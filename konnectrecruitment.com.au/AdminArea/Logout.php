<?
	session_start();
	session_destroy();
	session_unset();
	header("location:AdminLogin.php?intMessage=26");
?>