<?php
include("../Includes/BackOfficeIncludesFiles.php");

$intQId=$_REQUEST['hdnQId'];
$strOptionDesc=$_REQUEST['txtOptDesc'];
$strQDesc= str_replace(" ","%20",$_REQUEST['hdnQDesc']);

$sql="insert into questionoptions(`fkquestion_id`,option_desc) values('$intQId','$strOptionDesc')";

mysql_query($sql);

if(mysql_affected_rows()>0)
header("location:AddEditPollOptions.php?msg=add&QId=$intQId&QDesc=$strQDesc");

?>