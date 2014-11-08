<?php
//session_start();
$_SESSION['flag']=0;
	// ================================================
	// PHP image browser - iBrowser 
	// ================================================
	// iBrowser dialog - load message
	// ================================================
	// Developed: net4visions.com
	// Copyright: net4visions.com
	// License: GPL - see readme.txt
	// (c)2005 All rights reserved.
	// ================================================
	// Revision: 1.0                   Date: 07/15/2006
	// ================================================	
	
?>
<?php
	//-------------------------------------------------------------------------
	// include configuration settings
	if (!$l) {
		include dirname(__FILE__) . '/../config/config.inc.php';
		include dirname(__FILE__) . '/../langs/lang.class.php';	
		// language settings	
		$l = (isset($_REQUEST['lang']) ? new PLUG_Lang($_REQUEST['lang']) : new PLUG_Lang($cfg['lang']));
		$l->setBlock('ibrowser');
	}
?>
<?php if($_SESSION['flag']==0){?>
<div align="center" id="dialogLoadMessage" style="display: block;">
  <table width="100%" height="90%">
    <tr>		
      <td align="center" valign="middle">
      <div id="loadMessage">
	  	<!--<?php// echo $l->m('im_097'); ?>-->
        <img src="http://phpserv/cmspro_dsinternal/images/preloader.gif" />
      </div>
      </td>
    </tr>
  </table>
  
</div><? $_SESSION['flag']=1;}?>