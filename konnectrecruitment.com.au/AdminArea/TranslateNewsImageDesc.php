<?php
include("../Includes/BackOfficeIncludesFiles.php");
	$nLang = 0;
	$strDesc = $_REQUEST['strImageDesc'];
	$npkId = $_REQUEST['npkId'];//echo "|||".$npkId;
	$nLangId = $_REQUEST['nLangId'];
	$nfkImgId=$_REQUEST['NewsImgId'];//echo "|||".$nfkImgId;
	$intNewsId=$_REQUEST['NewsId'];
	//print_r($_REQUEST);
	$objNews=new clsNews();
	$nDefaultLang = $objLang->GetDefaultLang();
	$objNews->m_intLangId = $nDefaultLang;
	//$objNews->m_intDescpkId=$npkId;
	$objNews->m_intNewsImageId = $intNewsId;
	$rs = $objNews->GetNewsDescById();
	//print_r(mysql_fetch_array($rs));
	if ($rs != false && mysql_num_rows($rs)>0)
	{
		$row = mysql_fetch_object($rs);
		$strDescripton = $row->ImageDesc;
		if ($row->ImageDesc != NULL)
		{
			if ($row->pkLangId == $nDefaultLang)
			$strDescripton = $row->ImageDesc;	
		}		
		else 
			$strDescripton = "There is no description in default language";	
			
	}
	$objLang=new clsLanguage();
	$rsLang=$objLang->GetLanguages();
	$nCheck = 0;
			
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="/Templates/BackofficeAfterLogin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?=CONST_BACKOFFICE_TITLE?>Translation Manager<?=CONST_BACKOFFICE_TITLE_END?></title>
<!-- InstanceEndEditable -->
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
<LINK REL="SHORTCUT ICON" HREF="Images/favicon.ico">

<link href="AdminArea.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="98%"  border="0" align="center" cellpadding="0" cellspacing="0" class="MailTableBGColor">
  <tr>
    <td colspan="2"><?php $nIsLoginTemplate = 0; include("Header.php");?></td>
  </tr>
  <tr>
    <td width="17%" align="left" valign="top" class="TabBorderLightGreyBG"><?php include("LeftPanel.php");?></td>
    <td width="83%" height="500" align="left" valign="top">
	<!-- InstanceBeginEditable name="body" -->
          <script>
		  function Validate(f)
		  {
			if(f.lstLangId.value==0)
			{
				alert("Please select langauage");
				f.lstLangId.focus();
				return false;
			}
			else if(f.txtConfMsgDesc.value=="")
			{
				alert("Please enter confirmation message");
				f.txtConfMsgDesc.focus();
				return false;
			}
			else return true;
		  }
		 /* function InsertDesc(f)
		  {
				
				var a=f.lstLangId[f.lstLangId.selectedIndex].value;alert(a);
				f.hdnLangId.value=a;
				if(f.elements['hdnlist'+a])
					f.txtDescripton.value=f.elements['hdnlist'+a].value;
				else	
					f.txtDescripton.value='';
					
				if(f.elements['hdnDefaultLangId'].value==a)
					document.getElementById("trDesc").innerHTML='Edit:';
				else
					document.getElementById("trDesc").innerHTML='Translate:';	
		  }*/
		  function ChangeLanguage(f)
		  {
		  	
		  	f.hdnLangId.value=f.lstLang.value;var a=f.hdnLangId.value;alert(a);
			if(f.elements['hdnlist'+a])
					f.txtDescripton.value=f.elements['hdnlist'+a].value;
				else	
					f.txtDescripton.value='';
		  }
		  </script><br>
		  <table width="100%"  border="0" cellspacing="0" cellpadding="2">
            <tr>
              <td align="left"><a href="ManageNews.php?hdnModuleId=<?=$_REQUEST['hdnModuleId']?>"><span class="txtBld_ornge">Manage News</span></a>&nbsp;&gt;&gt;&nbsp;<a href="AddNewsImage.php?hdnModuleId=<?=$_REQUEST['hdnModuleId']?>&npkId=<?=$_REQUEST['npkId'];?>&NewsId=<?=$_REQUEST['NewsId'];?>&NewsImgId=<?=$_REQUEST['NewsImgId'];?>&nLangId=<?=$_REQUEST['nLangId'];?>&strImageDesc=<?=$_REQUEST['strImageDesc'];?>"><span class="txtBld_ornge">Add News Images</span></a>&nbsp;&gt;&gt;&nbsp;<span class="hdng_sandy">Translate News Image Description</span></td>
              </tr>
            <tr>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2"><form name="form1" method="post" action="TranslateNewsImageDescAction.php" onSubmit="return Validate(this)">
                  <table width="99%"  border="0" align="center" cellpadding="0" cellspacing="2" class="TabBorderLightGreyBG">
                    <tr>
                      <td align="right" class="txtBld_grn">&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="left" class="txtBld_grn">Default Language Description </td>
                      <td><?=$strDesc?></td>
                    </tr>
					<tr align="left" >			
                      <td colspan="2">					  </td>
                    </tr><tr>					
                      <td align="left" class="txtBld_grn" <?php if(!$MultiLangCheck){?>style="visibility:hidden"<?php }?>>Select Language </td>
                      <td>
						<select name="lstLang" id="select" onChange="ChangeLanguage(this.form)">
                      <?php 
						$arrLang = $objLang->GetLanguages();
						$nDefaultLang=$objLang->GetDefaultLangId();
						$nStatus=0;
						if($arrLang != FALSE)
						while($arrRecLang = mysql_fetch_object($arrLang))
						{
							if($arrRecLang->pkLangId != $nDefaultLang)
							{
								if($nStatus==0)
									{
									$row2=$objNews->SelectNewsImageDescById($arrRecLang->pkLangId);
									if(isset($row2))
									$tempDesc=$row2->ImageDesc;
									$nDefLang=$arrRecLang->pkLangId;
									}
									?>
									<option value="<?=$arrRecLang->pkLangId?>" <? if($nDefLang==0) echo "selected";?>>
									<?=$arrRecLang->LangDesc?>
									</option>
									<?php
									$nStatus=1;
							}
						}
						?>
                    </select>
						<? 
						$objNews->m_intNewsImageId=$npkId;
						$rsSql=$objNews->GetNewsDescById();
						if($rsSql)
							while($row=mysql_fetch_object($rsSql))
							{
							?>
							<input type="hidden" id="hdnlist<?=$row->pkLangId?>" value="<?=$row->ImageDesc?>">
							<?
							}?>					  </td>
                    </tr>
					
                    <tr>
                      <td width="37%" align="left" class="txtBld_grn" id='trDesc'>Image Description</td>
                      <td width="63%"><input name="txtDescripton" type="text" id="txtDescripton" size="35" value="<?=$tempDesc?>">                        </td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td><input name="Submit" type="submit" class="button" value="Save">
						  <input name="hdnId" type="hidden" id="hdnId" value="<?=$nfkImgId?>">
						  <input type="hidden" name="hdnNewsId" value="<?=$intNewsId?>">
						  <input name="hdnModuleId" type="hidden" id="hdnModuleId" value="<?=$_REQUEST['hdnModuleId']?>">
                          <input name="hdnLangId" type="hidden" id="hdnLangId" value="<?=$nDefLang?>">
                          <input name="hdnDefaultLangId" type="hidden" id="hdnDefaultLangId" value="<?=$nDefaultLang?>"></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                  </table>
              </form></td>
            </tr>
            <tr>
              <td colspan="2">&nbsp;</td>
            </tr>
          </table>
        <!-- InstanceEndEditable -->
    </td>	
  </tr>
  <tr>
    <td colspan="2"><?php include("Footer.php");?></td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
