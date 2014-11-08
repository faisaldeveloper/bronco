<?php
session_start();
unset($_SESSION['EmpId']);
header("location:Home");
exit();
?>