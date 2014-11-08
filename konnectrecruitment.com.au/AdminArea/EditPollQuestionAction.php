<? 
include("../Includes/BackOfficeIncludesFiles.php");

if(isset($_REQUEST['questionid']) && isset($_REQUEST['desc']))
{
	$id=$_REQUEST['questionid'];
	$strDesc=$_REQUEST['desc'];
	$desc = addslashes($strDesc);
	$sql="update pollquestion set `question_desc`='$desc' where pkquestion_id=$id";
	//print $sql;
	//exit();
	mysql_query($sql);
		if(mysql_affected_rows()>0)
		{
		header("location:Polling.php?intMessage=413");
		}
		else
		{
		header("location:Polling.php?intMessage=414");
		}
}
else
{
	header("location:Polling.php?intMessage=414");
}
?>
