<?
$objPages->m_intPageId=$_REQUEST['PageId'];
$arrPageModule = $objPages->GetPageModule($nModulePosition, $nStatus=1);
if($arrPageModule != FALSE)
{
?>
	<table width="100%"  border="0" cellspacing="0" cellpadding="0">
	<tr><td height="5"></td></tr>
<?
	while($arrRecPageModule = mysql_fetch_object($arrPageModule))
	{
		if($arrRecPageModule->ModuleType == CONST_MODULE_NEWS)
		{
			$nModuleID = $arrRecPageModule->pkModuleId;
?>
			<tr>
			  <td><?php include("NewsModule.php");?> </td>
			</tr>
			<tr><td height="5"></td></tr>
<?PHP
		}
		if($arrRecPageModule->ModuleType == CONST_MODULE_CONTACTUS)
		{
?>
			<tr>
			  <td><?php include("ContactUsContents.php");?> </td>
			</tr>
			<tr><td height="5"></td></tr>
<?PHP
		}
		if($arrRecPageModule->ModuleType == CONST_MODULE_SCRNEWS)
		{
?>
			<tr>
			  <td><?php include("ScrollingNews.php");?> </td>
			</tr>
			<tr><td height="5"></td></tr>
<?php /*?><?PHP
		}
		if($arrRecPageModule->ModuleType == CONST_MODULE_CHANGE_PASSWORD)
		{
?>
			<tr>
			  <td><?php include("ChangePasswordContents.php");?> </td>
			</tr>
			<tr><td height="5"></td></tr>

<?php */?><?PHP
		}
		if($arrRecPageModule->ModuleType == CONST_MODULE_LOGIN)
		{
			if(!isset($_SESSION['nMemberId']))
			{
?>
			<tr>
			  <td><?php include("LoginContents.php");?> </td>
			</tr>
			<tr><td height="5"></td></tr>
<?PHP
		}
		if($arrRecPageModule->ModuleType == CONST_MODULE_QUICKCART)
		{
?>
			<tr>
			  <td><?php include("QuickCart.php");?> </td>
			</tr>
			<tr><td height="5"></td></tr>
<?PHP
			}
		}
		if($arrRecPageModule->ModuleType == CONST_MODULE_IMAGEGALLERY)
		{
			$nGalleryID = $arrRecPageModule->pkModuleId;
?>
			<tr>
			  <td><?php include("ImageGallery.php");?> </td>
			</tr>
			<tr><td height="5"></td></tr>
<?
		}
		if($arrRecPageModule->ModuleType == CONST_MODULE_GOOGLE_SEARCH)
		{
?>
			<tr>
			  <td><?php include("GoogleSearchContents.php");?></td>
			</tr>
			<tr><td height="5"></td></tr>
<?
		}
	}
?>
	</table>	
<?	
}		
?>