<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_Conn = "phpserv";
$database_Conn = "cms_konnect";
$username_Conn = "root";
$password_Conn = "";
$Conn = mysql_pconnect($hostname_Conn, $username_Conn, $password_Conn) or trigger_error(mysql_error(),E_USER_ERROR); 
?>