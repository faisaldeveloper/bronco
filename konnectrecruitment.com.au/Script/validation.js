function isBlank(field)		
{
	if (field.value == "") 
		return true;
	else 
		return false;
}
function isNumeric(field)
{
	if (isNaN(field.value)==true)
		return false;
	else
		return true;
}
function isDefSelect(field)
{
	if(field.value == "Select" || field.value == "select" || field.value == "SELECT" || field.value == "Select State")
		return true;
	else
		return false;
}

	
function checkMaxLength(field,requiredLength)
{
	if (field.value.length > requiredLength)
		return true;
	else
		return false;
}

function isnotvalidEmail(field)
{
    if ((field.value.length < 1)||(field.value.indexOf("@") == -1)  || (field.value.indexOf(".")==-1)|| (field.value.indexOf(".")==0) || (field.value.indexOf("@")==0) || (field.value.indexOf("@")==field.value.length-1) || (field.value.indexOf(".")==field.value.length-1)||(field.value.indexOf("@")!=field.value.lastIndexOf("@")) || ((field.value.indexOf("@") > field.value.lastIndexOf("."))) || ((field.value.indexOf(".")+1)==field.value.indexOf("@")) || ((field.value.indexOf("@")+1)==field.value.indexOf(".")) || (f.txtEmail.value.lastIndexOf(".")==f.txtEmail.value.length-1) )

        return true;
    else
	    return false;
}
   
function checkValue(field,requiredValue)
{
	if (field.value == requiredValue) 
		return true;
	else 
		return false;
}
function isatleastOnechecked(field)
{
	for (var s=0;s<field.length;s++)
	{
		if (field[s].checked == true)
			return false;
	}
	return true;
}
function checkallCheckBoxes(field)
{
	for(var s=0;s<field.length;s++)
	{
		field[s].checked = true;
	}
}	
function chkpassword(field1,field2)
{  
    if (field1.value == "")
	 {
        alert("New Password Cannot Be Empty");
	   field1.focus();
	   return false;   
	 }
	 else if (field2.value == "")
	 {
	   alert("Confirm Password Cannot Be Empty");
	   field1.focus();
	   return false;
	 }
	 else if (field1.value == field2.value)
	 {
		 return true;
	 }
	else	 
	{	
	   alert("Password is not same in both fields");
		 return false;
	} 
	 
	 
}
function chkpasswordnew(field1,field2,field3)
{  
	if (field3.value== "")
	{
		alert("old Password cannot be Empty");
		field3.focus();
		return false;
	}
	 else if (field1.value == "")
	 {
        alert("New Password Cannot Be Empty");
	   field1.focus();
	   return false;   
	 }
	 else if (field2.value == "")
	 {
	   alert("Confirm Password Cannot Be Empty");
	   field2.focus();
	   return false;
	 }
	 else if (field1.value != field2.value)
	 {
		 alert("New Password must be similar to Confirm Password");
		 field2.focus();
		 return false;
	 }
	 else if(field1.value == field3.value)
	 {
		 alert("New Password can not be similar to old password");
		 field1.focus();
		 return false;
	 }
}

function validateform(form1)
{
	
	if(isBlank(form1.login))
	{
		alert("Please Enter Login");
	   form1.login.focus();
	   return false;
	}
	 if (isBlank(form1.pass))
	{  alert("Please Enter password");
	   form1.pass.focus();
	   return false;
	}
	 if (isBlank(form1.cnfpassword))
	{  alert("Please Enter confirm password");
	   form1.cnfpassword.focus();
	   return false;
	}
	else if (form1.pass.value != form1.cnfpassword.value)
	 {
		 alert("New Password must be similar to Confirm Password");
		 form1.cnfpassword.focus();
		 return false;
	 }
	else if (isBlank(form1.fname))
	{  alert("Please Enter First Name");
	   form1.fname.focus();
	   return false;
	}
	
	else if (isBlank(form1.lname))
	{	
		alert("Please Enter Last Name");
		form1.lname.focus();
		return false;
	}
	else if (isBlank(form1.billadd))
	{	
		alert("Please Enter Bill address");
		form1.billadd.focus();
		return false;
	}
	else if (isBlank(form1.city))
	{	
		alert("Please Enter City");
		form1.city.focus();
		return false;
	}
	else if (isBlank(form1.state))
	{	
		alert("Please Enter state/province");
		form1.state.focus();
		return false;
	}
	
	
	else if (isBlank(form1.country))
	{	
		alert("Please Enter country name");
		form1.country.focus();
		return false;
	}
	else if (isBlank(form1.zip))
		{alert("zip code should not be empty");
			form1.zip.focus();
			return	false;	
		}
	
	else if (!isNumeric(form1.zip))
	{	
		
		alert("Please Enter Valid Zip code");
		form1.zip.focus();
		return false;
		
	}
	else if (isBlank(form1.phone))
	{	
		alert("Please Enter Phone Number");
		form1.phone.focus();
		return false;
	}
	else if (isnotvalidEmail(form1.email))
	{	
		alert("Please Enter Valid email address");
		form1.email.focus();
		return false;
	}
	
		
	return true;
	}

function validateformedit(form1)
{
	
	if(isBlank(form1.login))
	{
		alert("Please Enter Login");
	   form1.login.focus();
	   return false;
	}
	else if (isBlank(form1.fname))
	{  alert("Please Enter First Name");
	   form1.fname.focus();
	   return false;
	}
	
	else if (isBlank(form1.lname))
	{	
		alert("Please Enter Last Name");
		form1.lname.focus();
		return false;
	}
	else if (isBlank(form1.billadd))
	{	
		alert("Please Enter Bill address");
		form1.billadd.focus();
		return false;
	}
	else if (isBlank(form1.city))
	{	
		alert("Please Enter City");
		form1.city.focus();
		return false;
	}
	else if (isBlank(form1.state))
	{	
		alert("Please Enter state/province");
		form1.state.focus();
		return false;
	}
	
	
	else if (isBlank(form1.country))
	{	
		alert("Please Enter country name");
		form1.country.focus();
		return false;
	}
	else if (isBlank(form1.zip))
		{alert("zip code should not be empty");
			form1.zip.focus();
			return	false;	
		}
	
	else if (!isNumeric(form1.zip))
	{	
		
		alert("Please Enter Valid Zip code");
		form1.zip.focus();
		return false;
		
	}
	else if (isBlank(form1.phone))
	{	
		alert("Please Enter Phone Number");
		form1.phone.focus();
		return false;
	}
	else if (isnotvalidEmail(form1.email))
	{	
		alert("Please Enter Valid email address");
		form1.email.focus();
		return false;
	}
	
		
	return true;
	}
function validatecontact(form1)
{   
   	if (isBlank(form1.name))
	{  alert("Please Enter Name");
	   form1.name.focus();
	   return false;
	}
	else if (isBlank(form1.phone))
	{	
		alert("Please Enter Phone Number");
		form1.phone.focus();
		return false;
	}
	else if (isnotvalidEmail(form1.email))
	{	
		alert("Please Enter Valid email address");
		form1.email.focus();
		return false;
	}
	else if (isBlank(form1.description))
	{	
		alert("Please Enter Description");
		form1.description.focus();
		return false;
	}
	
    return true;	
}
function validateemail(form)
{
	 if(form.email.value=="")
	{
	alert("Email can not be left empty");
	form.email.focus();
	return false;
	}
	else if (form.email.value ==""  || form.email.value.indexOf("@")==-1 || form.email.value.indexOf(".")==-1 || form.email.value.indexOf("@")==0 || form.email.value.indexOf(".")==0 || form.email.value.indexOf("@") != form.email.value.lastIndexOf("@"))
	{
		alert("Enter Valid Email ")
		form.email.focus()
		return false
	}
	if (form1.email.value ==""  || form1.email.value.indexOf("@")==-1 || form1.email.value.indexOf(".")==-1 || form1.email.value.indexOf("@")==0 || form1.email.value.indexOf(".")==0 || form1.email.value.indexOf("@") != form1.email.value.lastIndexOf("@"))
	{
		alert("Enter Valid Email ")
		form1.email.focus()
		return false
	}
	else 
	return true
}
function chkfields(field1,field2)
{  
    if (field1.value == "" )
	 {
        alert("Please enter login ID");
		field1.focus();
		return false;
	 }
	 else if(field2.value=="")
	 {
		alert("Please enter password");
		field2.focus();
	   return false;   
	 }
	 return true;
}

function checkall(frm,chkname,childname)
{
	for(i=0;i<frm.elements.length;i++)
	{
	if(frm.elements[i].name==chkname)
		{
			if(frm.elements[i].checked==true)
			{
				for(j=0;j<frm.elements.length;j++)
				{
					if(frm.elements[j].name==childname || frm.elements[j].id==childname)
					{
						frm.elements[j].checked=true;
					}
				}
			}
			else
			{
				for(j=0;j<frm.elements.length;j++)
				{
					if(frm.elements[j].name==childname || frm.elements[j].id==childname)
					{
						frm.elements[j].checked=false;
					}
				}
			}
		}
	}
}

function isCheck(frm,chkname)
{
	n=1;
	for(i=0;i<frm.elements.length;i++)
	{
		if(frm.elements[i].name==chkname)
		{
			if(frm.elements[i].checked==true)
				{
				n=0;
				}
		}
	}
	if(n==1)
	{
		return false;
	}
	else
	{
		return true;
	}
}
				  
				function ValidateEmail(theinput)
				{
					s=theinput.value
					if(s.search)
					{
						return (s.search(new RegExp('^([-!#$%&\'*+./0-9=?A-Z^_`a-z{|}~'+unescape('%7F')+'])+@([-!#$%&\'*+/0-9=?A-Z^_`a-z{|}~'+unescape('%7F')+']+\\.)+[a-zA-Z]{2,6}$',"gi"))>=0)
					}
					if(s.indexOf)
					{
						at_character=s.indexOf('@')
						if(at_character<=0 || at_character+4>s.length)
							return false
					}
					if(s.length<6)
						return false
					else
						return true
				}

