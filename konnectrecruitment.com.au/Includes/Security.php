<?php
session_start();
if (!isset($_SESSION['intUserId']))
{
   session_unset();	
   header("location:AdminLogin.php");
}
?>