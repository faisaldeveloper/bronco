
<table width="98%" align="center" border="0" cellspacing="0" cellpadding="0">
	<tr>
	<td>
    	 <?
        if(isset($_SESSION['intMessage']) && !empty($_SESSION['intMessage']))
        {
         $_REQUEST['intMessage'] = $_SESSION['intMessage'];
            unset($_SESSION['intMessage']);
        }
                include('Includes/DisplayConfirmMessageFront.php');
		?>
    </td>
         
    </tr>
<?

$objPages->m_intLangId=$_SESSION['intLangId'];
$nModulePosition=CONST_POS_TOP;
$objPages->m_intPageId=$_REQUEST['PageId'];
$arrPageModule = $objPages->GetPageModule($nModulePosition, $nStatus=1);
if($arrPageModule != FALSE)
{
?>
	<tr>
	  <td>
	  <?php 
			include("PageModules.php");
	  ?> 
	  </td>
	</tr>
<? }?>
	<tr>
	  <td>
	  	<?
		if($rsPageDetail)
		{
			$objPageDetail=mysql_fetch_object($rsPageDetail);
			
			switch($objPageDetail->PageType)
			{ 
				case CONST_PAGETYPE_DYNAMIC:
				if($objPageDetail->PageContents=='')print "&nbsp;"; else print stripslashes($objPageDetail->PageContents); break;
				case CONST_PAGETYPE_PRODUCTS: include('ProductsListContents.php'); break;
				case CONST_PAGETYPE_PRODUCTDETAIL:  include('ProductsDetailContents.php'); break;
				case CONST_PAGETYPE_EDITPROFILE: include('EditProfileContents.php'); break;
				case CONST_PAGETYPE_LOGIN: include('LoginContents.php'); break;
				case CONST_PAGETYPE_REGISTRATION: include('RegistrationContents.php'); break;
				case CONST_PAGETYPE_USERMAIN: include('UserMainContents.php'); break;
				case CONST_PAGETYPE_FORGOTPASSWORD: include('ForgotPasswordContents.php'); break;
				case CONST_PAGETYPE_CHANGEPASSWORD: include('ChangePasswordContents.php'); break;
				case CONST_PAGETYPE_INVOICE: include('InvoiceContents.php'); break;
				case CONST_PAGETYPE_ORDERFORM: include('OrderFormContents.php'); break;
				case CONST_PAGETYPE_BASKET: include('UserBasketContents.php'); break;
				case CONST_PAGETYPE_MORENEWS: include('MoreNewsContents.php'); break;
				case CONST_PAGETYPE_NEWSDETAIL: include('NewsDetailContents.php'); break;
				
				case CONST_PAGETYPE_TELLFRIEND: include('EmailToFriendContents.php'); break;
				case CONST_PAGETYPE_VIEWORDERS: include('UserOrdersContents.php'); break;
				case CONST_PAGETYPE_VIDEO: include('DetailFileContents.php'); break;
				case CONST_PAGETYPE_SEARCH_RESULT: include('SearchResultsContents.php'); break;
				case CONST_PAGETYPE_ADVSEARCH_RESULT: include('AdvSearchResultsContents.php'); break;
				case CONST_PAGETYPE_VIEW_GUESTBOOK: include('ViewGuestBookContents.php'); break;
				case CONST_PAGETYPE_GUEST_BOOK: include('GuestBookModuleContents.php'); break;
				case CONST_PAGETYPE_POLLING: include('PollingContents.php'); break;
				case CONST_PAGETYPE_SPONSOR_LINKS: include('SLinksContents.php'); break;
				case CONST_PAGETYPE_GOOGLE_SEARCH: include('GoogleSearchContents.php'); break;
				case CONST_PAGETYPE_RSS_SUBSCRIBER: include('RssSubscriberContents.php'); break;
				case CONST_PAGETYPE_EMPLOYEE_REGISTRATION: include('EmployeerRegistrationContents.php'); break;
				case CONST_PAGETYPE_EMPLOYEE_LOGIN: include('EmployeeLoginContents.php'); break;
				case CONST_PAGETYPE_EMPLOYEE_PROFILE: include('EmployeeEditProfileContents.php'); break;
				case CONST_PAGETYPE_EMPLOYEE_FORGET_PASS: include('EmployeeForgetPassContents.php'); break;
				case CONST_PAGETYPE_POST_JOB: include('PostJobContents.php'); break;
				case CONST_PAGETYPE_SEARCH_JOB: include('SearchJobContents.php'); break;
				case CONST_PAGETYPE_VIEW_EMPLOYEE_JOB: include('EmployeeJobsContents.php'); break;
				case CONST_PAGETYPE_JOB_DETAIL: include('JobDetailsContents.php'); break;
				case CONST_PAGETYPE_JOB_JOBSEEKERS: include('ViewJobSeekerAppliedForJobContents.php'); break;
				case CONST_PAGETYPE_JOBSEEKER_RESUME: include('JobSeekerResumeContents.php'); break;
				case CONST_PAGETYPE_VIEW_JOBSEEKER_RESUME: include('ViewJobSeekerResumeContents.php'); break;
				case CONST_PAGETYPE_VIEW_JOBSEEKER_DETAIL: include('JobSeekerDetailContents.php'); break;
				case CONST_ERROR: include('ErrorContents.php'); break;
			}	
		}
		?>
	  </td>
	</tr>
	<tr>
	  <td>
	  <?php 
			$objPages->m_intLangId=$_SESSION['intLangId'];
			$nModulePosition=CONST_POS_BOTTOM;
			include("PageModules.php");
	  ?> 
	  </td>
	</tr>
</table>