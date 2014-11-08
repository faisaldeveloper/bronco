var uploader = '';
// VALIDATION FUNCTION BY FAHEEM FOR VALIDATING CarSelect.php ENDS HERE
function createXMLHttpRequest() 
{

    var ua;
	try { 
		ua = new XMLHttpRequest(); 
	} 
	catch (trymicrosoft) { 
		try { 
			ua = new ActiveXObject("Microsoft.XMLHTTP"); 
		} 
		catch (failed) { 
			ua = false; 
		} 
	} 
    return ua;
}

var req = createXMLHttpRequest();
function handleResponse() {
    if(req.readyState == 1){
	   if(document.getElementById("hdnComboOptions").value==1)
	   {
			//alert(document.getElementById("hdnTdName").value);
		    var arr3 = new Object();
			arr3[0]="Wait .....";
			AddComboOptions(document.getElementById(document.getElementById("hdnTdName").value), arr3, 0);	   	
	   }
	   else
		   document.getElementById(document.getElementById("hdnTdName").value).innerHTML = "<div align='left'>Wait .....</div>";
	}
	else if(req.readyState == 4){
		//alert("here");	
        var response = req.responseText;
        var update = new Array();
        if(response.indexOf('||' != -1)) 
		{
           update = response.split('||');
		   strResponse=update[0];
		   //alert(strResponse);
		   if(document.getElementById("hdnComboOptions").value==1)
		   {
			   var arr= new Array();
			   var arr1 = new Array();
			   var arr3 = new Object();
			   arrResponse = strResponse.split('**');
			  // alert(arrResponse[0]);
			 //  alert(arrResponse[1]);
			   arr = arrResponse[1].split('*');
			   // assign values
			   if(arr.length>0)
			   {
				   for(i=0;i<arr.length;i++)
				   {
					   arr1 = arr[i].split('^');
					   if(arr1.length>1)
						 arr3[arr1[0]]=arr1[1];
				   }
			   }
			   //alert(document.getElementById("hdnTdName").value);	
			   //alert(document.getElementById(document.getElementById("hdnTdName").value));
			   AddComboOptions(document.getElementById(document.getElementById("hdnTdName").value), arr3, 0);   
		   }
		   else
		   {
			   //alert(strResponse);
		   	   document.getElementById(document.getElementById("hdnTdName").value).innerHTML = update[0];
		   }
        }
    }
}

function getRecords(nCaseID, strCriteria, strDivName, strControlName,strOnChange)
{
	
	strOnChange=strOnChange.replace("'","\'");
	//alert(strOnChange);
	
	//alert(strDivName);
	//alert(strControlName);
	
	if(strDivName!='')
	{
		document.getElementById("hdnTdName").value	= strDivName;
		document.getElementById("hdnComboOptions").value=0;
	}
	else
	{
		document.getElementById("hdnComboOptions").value=1;
		document.getElementById("hdnTdName").value	= strControlName;
	}

	strURL="Includes/GetRecords.php"; 
	
	strQryStr =	'nCaseID='+nCaseID+'&strCriteria='+strCriteria+'&strControlName='+strControlName+'&strOnChange='+strOnChange+'&nComboOptions='+document.getElementById("hdnComboOptions").value;
//	alert(strQryStr);
	strFolder=location.href;
	//alert(strFolder); 
	if(strFolder.indexOf("AdminArea")!=-1 || strFolder.indexOf("adminarea")!=-1 || strFolder.indexOf("Adminarea")!=-1)
		strURL="../Includes/GetRecords.php";
	else if(strFolder.indexOf("Includes")!=-1)
		strURL="GetRecords.php";
	//alert(strURL+'?'+strQryStr);
	
	req.open('get', strURL+'?'+strQryStr);
	//alert(strURL+'?'+strQryStr);	
	
	req.onreadystatechange = handleResponse;
	req.send(null);
	
}
function addOption(selectbox,text,value )
{
	var optn = document.createElement("OPTION");
	optn.text = text;
	optn.value = value;
	//alert(value);
	selectbox.options.add(optn);
}

function removeAllOptions(selectbox, nFromOption)
{
	var i;
	for(i=selectbox.options.length-1;i>=nFromOption;i--)
	{
		selectbox.remove(i);
	}
}

function AddComboOptions(selectbox, arr, nFromOption)
{
	//alert(selectbox+"___"+nFromOption);
	removeAllOptions(selectbox, nFromOption);
	for( var arrMaker in arr ) 
	{	
		addOption(selectbox,arr[arrMaker],arrMaker);
	}
}

function numbersonly(e)
{
	var unicode=e.charCode? e.charCode : e.keyCode
	if(unicode==8 || unicode==9 ||  unicode==13 || unicode==46 ||  unicode==37 || unicode==39)
	{
	}
	else
	{ 
		if (unicode<48||unicode>57) //if not a number
			return false //disable key press
	}
}
function MM_showHideLayers() { //v6.0
  var i,p,v,obj,args=MM_showHideLayers.arguments;
  for (i=0; i<(args.length-2); i+=3) 
  	if ((obj=MM_findObj(args[i]))!=null) 
	{ 
		v=args[i+2];
    	if (obj.style) 
		{ 
			obj=obj.style; v=(v=='show')?'visible':(v=='hide')?'hidden':v; 
  		}
    	obj.visibility=v;
	 }
}
function MM_findObj(n, d) { //v4.01
  var p,i,x;  
  if(!d) 
  	d=document; 
  if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);
  }
  if(!(x=d[n])&&d.all) 
  	x=d.all[n]; 
  for (i=0;!x&&i<d.forms.length;i++) 
  	x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) 
  	x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) 
  	x=d.getElementById(n); 
  return x;
}
function switchMenu(obj, nCheckDisplay) {
	var el = document.getElementById(obj);
	//alert(obj);
	if (nCheckDisplay == false ) {
		el.style.display = 'none';
	}
	else {
		el.style.display = '';
	}
}

///////////////////////////// Page layout functions ///////////////////////////////////

function PopulateLayout()
{
	nFrameID=document.getElementById("hdnFrameID").value;
	if(opener.frames && opener.frames[nFrameID]) //IE 5 (Win/Mac), Konqueror, Safari
	  cWindow = opener.frames[nFrameID];
	else if(opener.document.getElementById(nFrameID).contentWindow) //IE 5.5+, Mozilla 0.9+, Opera
	  cWindow = opener.document.getElementById(nFrameID).contentWindow;
	else //Moz < 0.9 (Netscape 6.0)
	  cWindow = opener.document.getElementById(nFrameID);
	cDocument = cWindow.document;
	//alert(cDocument);
	cDocument.open();
	cDocument.write(window.document.getElementById('lstLayout').value);
	cDocument.close();
	window.close();
	return true;
}
function PreviewLayout()
{
	if(window.frames && window.frames['frmLayout']) //IE 5 (Win/Mac), Konqueror, Safari
	  cWindow = window.frames['frmLayout'];
	else if(window.document.getElementById('frmLayout').contentWindow) //IE 5.5+, Mozilla 0.9+, Opera
	  cWindow = window.document.getElementById('frmLayout').contentWindow;
	else //Moz < 0.9 (Netscape 6.0)
	  cWindow = window.document.getElementById('frmLayout');
	
	cDocument = cWindow.document;
	cDocument.open();
	//alert('xcvxcv');
	cDocument.write(window.document.getElementById('lstLayout').value);
	cDocument.close();
}

/////////////////////////// Image Layout functions ////////////////////////////////////
function SelectLayout(hdnFrameName, hdnHiddenName, hdnDivName)
{
	hdlWindow=window.open('SelectPictureLayout.php?hdnHiddenName='+hdnHiddenName+'&hdnFrameName='+hdnFrameName+'&hdnDivName='+hdnDivName,'Layout','width=450,height=330,left=300,top=300,screenX=300,screenY=300,scrollbars=1');
	hdlWindow.moveTo(100,20);
	return true;
}
function transfer()
{
	if(opener.frames && opener.frames[document.getElementById("hdnFrameName").value]) //IE 5 (Win/Mac), Konqueror, Safari
	  cWindow = opener.frames[document.getElementById("hdnFrameName").value];
	else if(opener.document.getElementById(document.getElementById("hdnFrameName").value).contentWindow) //IE 5.5+, Mozilla 0.9+, Opera
	  cWindow = opener.document.getElementById(document.getElementById("hdnFrameName").value).contentWindow;
	else //Moz < 0.9 (Netscape 6.0)
	  cWindow = opener.document.getElementById(document.getElementById("hdnFrameName").value);
	cDocument = cWindow.document;
	cDocument.open();
	opener.document.getElementById(document.getElementById("hdnDivName").value).style.display='';
	cDocument.write(window.document.getElementById('hdnDetail'+window.document.getElementById('lstLayout').value).value);
	//alert("here");
	//alert(document.getElementById("hdnHiddenName").value);
	//alert(opener.document.getElementById(document.getElementById("hdnHiddenName").value).value);
	opener.document.getElementById(document.getElementById("hdnHiddenName").value).value=window.document.getElementById('lstLayout').value;
	cDocument.close();
	//alert("here");
	window.close();
	return true;
}
function PreviewImageLayout()
{
	if(window.frames && window.frames['frmLayout']) //IE 5 (Win/Mac), Konqueror, Safari
	  cWindow = window.frames['frmLayout'];
	else if(window.document.getElementById('frmLayout').contentWindow) //IE 5.5+, Mozilla 0.9+, Opera
	  cWindow = window.document.getElementById('frmLayout').contentWindow;
	else //Moz < 0.9 (Netscape 6.0)
	  cWindow = window.document.getElementById('frmLayout');
	cDocument = cWindow.document;
	cDocument.open();
	//alert(window.document.getElementById('hdnDetail1'));  
	cDocument.write(window.document.getElementById('hdnDetail'+window.document.getElementById('lstLayout').value).value);
	cDocument.close();
}
function populateWYSWIG(strWYSWIGName,strContents)
{
	if(window.frames && window.frames[strWYSWIGName]) //IE 5 (Win/Mac), Konqueror, Safari
	  cWindow = window.frames[strWYSWIGName];
	else if(window.document.getElementById(strWYSWIGName).contentWindow) //IE 5.5+, Mozilla 0.9+, Opera
	  cWindow = window.document.getElementById(strWYSWIGName).contentWindow;
	else //Moz < 0.9 (Netscape 6.0)
	  cWindow = window.document.getElementById(strWYSWIGName);
	cDocument = cWindow.document;
	cDocument.open();
	cDocument.write(strContents);
	cDocument.close();
}