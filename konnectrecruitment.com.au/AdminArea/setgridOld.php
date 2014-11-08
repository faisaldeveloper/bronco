<script language="JavaScript">
function coloris(newColor) {
 if (document.layers) {
  document.colorDiv.document.open();
  document.colorDiv.document.writeln('<html><head></head><body bgcolor="'+newColor+'"></body></html>');
  document.colorDiv.document.close();
  }
 else if (document.all) {
  document.all.colorDiv.style.backgroundColor=newColor;
  }
 }
function handleKeyDown(e, field) {
 if (e.which == 13 || e.keyCode == 13) {
	field.blur();
  }
 }
function makearray(n) {
   this.length = n;
   for(var i = 1; i <= n; i++)
      this[i] = 0;
   return this;
}

hexa = new makearray(16);
for(var i = 0; i < 10; i++) hexa[i] = i;
hexa[10]="A"; hexa[11]="B"; hexa[12]="C";
hexa[13]="D"; hexa[14]="E"; hexa[15]="F";

function hex(i) {
   if (i < 0)
      return "00";
   else if (i > 255)
      return "FF";
   else
      return "" + hexa[Math.floor(i/16)] + hexa[i%16];
}
function validHex (string) {
	var pattern=(new RegExp("^[0123456789abcdefABCDEF]{6}$"));
	pattern.test(string);
}
function arrowChange (color,direction) {
	if (color=='red' && direction=='up') {
		var value=document.textFields.redField.value
		if (value<255) {
			++(document.textFields.redField.value);
			RGBtoHex();
		}
		else 
			alert("RGB values may not exceed 255");
	}
	if (color=='green' && direction=='up') {
		var value=document.textFields.greenField.value
		if (value<255) {
			++(document.textFields.greenField.value);
			RGBtoHex();
		}
		else 
			alert("RGB values may not exceed 255");
	}
	if (color=='blue' && direction=='up') {
		var value=document.textFields.blueField.value
		if (value<255) {
			++(document.textFields.blueField.value);
			RGBtoHex();
		}
		else 
			alert("RGB values may not exceed 255");
	}
	if (color=='red' && direction=='down') {
		var value=document.textFields.redField.value
		if (value>0) {
			--(document.textFields.redField.value);
			RGBtoHex();
		}
		else 
			alert("RGB values must be greater than 0");
	}
	if (color=='green' && direction=='down') {
		var value=document.textFields.greenField.value
		if (value>0) {
			--(document.textFields.greenField.value);
			RGBtoHex();
		}
		else 
			alert("RGB values must be greater than 0");
	}
	if (color=='blue' && direction=='down') {
		var value=document.textFields.blueField.value
		if (value>0) {
			--(document.textFields.blueField.value);
			RGBtoHex();
		}
		else 
			alert("RGB values must be greater than 0");
	}
}
function HexToRGB(hexValue){
	var pattern=(new RegExp("^[0123456789abcdefABCDEF]{6}$"));
	if (pattern.test(hexValue)) {
		var HexRedValue=hexValue.substring(0,2);
		var HexGreenValue=hexValue.substring(2,4);
		var HexBlueValue=hexValue.substring(4,6);
	
		document.textFields.redField.value=(parseInt(HexRedValue,16));
		document.textFields.greenField.value=(parseInt(HexGreenValue,16));
		document.textFields.blueField.value=(parseInt(HexBlueValue,16));
		document.textFields.txtstcolor.value=(hexValue.toUpperCase());
		
		coloris(hexValue);

	} else {
		document.textFields.txtstcolor.value='';
		alert("Please enter a valid hex color code");
		document.textFields.txtstcolor.focus();
		return false;
	}
}
function RGBtoHex() {
	
	var redValue=(document.textFields.redField.value);
	var greenValue=(document.textFields.greenField.value);
	var blueValue=(document.textFields.blueField.value);
	var redHex=(hex(document.textFields.redField.value));
	var greenHex=(hex(document.textFields.greenField.value));
	var blueHex=(hex(document.textFields.blueField.value));
	
	if ((0<=redValue && redValue<=255)&&(0<=greenValue && greenValue<=255)&&(0<=blueValue && blueValue<=255)) {
		var hexString=redHex+greenHex+blueHex;
		document.textFields.txtstcolor.value=(hexString);
		coloris(hexString);
	} else {
		if (!(redValue>=0 && redValue<=255)) {
			document.textFields.redField.value='';
			document.textFields.redField.focus();
			}
		else if (!(greenValue>=0 && greenValue<=255)) {
			document.textFields.greenField.value='';
			document.textFields.greenField.focus();
			}
		else if (!(blueValue>=0 && blueValue<=255)) {
			document.textFields.blueField.value='';
			document.textFields.blueField.focus();
			}
		alert("RGB values must be between 0 and 255, inclusive");
		}
	}
function swatchToText (hexValue) {

	coloris(hexValue);
	document.textFields.txtstcolor.value=(hexValue);
	HexToRGB(hexValue)
}
</script>
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table cellpadding="0" cellspacing="0" border="0" width="300" bgcolor="#ffffff"  align="left">
      <TR>
        <TD colspan="40"> </TD>
      </TR>
      <tr>
        <td width="5" height="5" bgcolor="#000000"><a href="javascript:swatchToText('000000')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#000033"><a href="javascript:swatchToText('000033')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#000066"><a href="javascript:swatchToText('000066')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#000099"><a href="javascript:swatchToText('000099')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#0000CC"><a href="javascript:swatchToText('0000CC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#0000FF"><a href="javascript:swatchToText('0000FF')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#003300"><a href="javascript:swatchToText('003300')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#003333"><a href="javascript:swatchToText('003333')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#003366"><a href="javascript:swatchToText('003366')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#003399"><a href="javascript:swatchToText('003399')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#0033CC"><a href="javascript:swatchToText('0033CC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#0033FF"><a href="javascript:swatchToText('0033FF')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#006600"><a href="javascript:swatchToText('006600')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#006633"><a href="javascript:swatchToText('006633')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#006666"><a href="javascript:swatchToText('006666')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#006699"><a href="javascript:swatchToText('006699')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#0066CC"><a href="javascript:swatchToText('0066CC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#0066FF"><a href="javascript:swatchToText('0066FF')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#009900"><a href="javascript:swatchToText('009900')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#009933"><a href="javascript:swatchToText('009933')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#009966"><a href="javascript:swatchToText('009966')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#009999"><a href="javascript:swatchToText('009999')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#0099CC"><a href="javascript:swatchToText('0099CC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#0099FF"><a href="javascript:swatchToText('0099FF')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#00CC00"><a href="javascript:swatchToText('00CC00')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#00CC33"><a href="javascript:swatchToText('00CC33')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#00CC66"><a href="javascript:swatchToText('00CC66')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#00CC99"><a href="javascript:swatchToText('00CC99')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#00CCCC"><a href="javascript:swatchToText('00CCCC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#00CCFF"><a href="javascript:swatchToText('00CCFF')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#00FF00"><a href="javascript:swatchToText('00FF00')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#00FF33"><a href="javascript:swatchToText('00FF33')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#00FF66"><a href="javascript:swatchToText('00FF66')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#00FF99"><a href="javascript:swatchToText('00FF99')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#00FFCC"><a href="javascript:swatchToText('00FFCC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#00FFFF"><a href="javascript:swatchToText('00FFFF')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
		<td width="5" height="5" bgcolor="#EEEEEE"><a href="javascript:swatchToText('EEEEEE')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
		<td width="5" rowspan="6">&nbsp;</td>
        <td width="5" rowspan="6"><table width="53" border=1 cellpadding=0 cellspacing=0>
            <tr>
              <td width="212" bgcolor="#ffffff"><div id="colorDiv" style="background-color:#<?=$strBgColor?>"><img border=0 src="../MenuImages/bump.gif" width=50 height=60></div></td>
            </tr>
          </table>
          </td>
      </tr>
      <tr>
        <td width="5" height="5" bgcolor="#330000"><a href="javascript:swatchToText('330000')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#330033"><a href="javascript:swatchToText('330033')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#330066"><a href="javascript:swatchToText('330066')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#330099"><a href="javascript:swatchToText('330099')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#3300CC"><a href="javascript:swatchToText('3300CC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#3300FF"><a href="javascript:swatchToText('3300FF')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#333300"><a href="javascript:swatchToText('333300')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#333333"><a href="javascript:swatchToText('333333')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#333366"><a href="javascript:swatchToText('333366')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#333399"><a href="javascript:swatchToText('333399')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#3333CC"><a href="javascript:swatchToText('3333CC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#3333FF"><a href="javascript:swatchToText('3333FF')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#336600"><a href="javascript:swatchToText('336600')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#336633"><a href="javascript:swatchToText('336633')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#336666"><a href="javascript:swatchToText('336666')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#336699"><a href="javascript:swatchToText('336699')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#3366CC"><a href="javascript:swatchToText('3366CC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#3366FF"><a href="javascript:swatchToText('3366FF')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#339900"><a href="javascript:swatchToText('339900')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#339933"><a href="javascript:swatchToText('339933')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#339966"><a href="javascript:swatchToText('339966')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#339999"><a href="javascript:swatchToText('339999')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#3399CC"><a href="javascript:swatchToText('3399CC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#3399FF"><a href="javascript:swatchToText('3399FF')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#33CC00"><a href="javascript:swatchToText('33CC00')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#33CC33"><a href="javascript:swatchToText('33CC33')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#33CC66"><a href="javascript:swatchToText('33CC66')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#33CC99"><a href="javascript:swatchToText('33CC99')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#33CCCC"><a href="javascript:swatchToText('33CCCC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#33CCFF"><a href="javascript:swatchToText('33CCFF')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#33FF00"><a href="javascript:swatchToText('33FF00')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#33FF33"><a href="javascript:swatchToText('33FF33')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#33FF66"><a href="javascript:swatchToText('33FF66')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#33FF99"><a href="javascript:swatchToText('33FF99')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#33FFCC"><a href="javascript:swatchToText('33FFCC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#33FFFF"><a href="javascript:swatchToText('33FFFF')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
		<td width="5" height="5" bgcolor="#CCCCCC"><a href="javascript:swatchToText('CCCCCC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
      </tr>
      <tr>
        <td width="5" height="5" bgcolor="#660000"><a href="javascript:swatchToText('660000')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#660033"><a href="javascript:swatchToText('660033')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#660066"><a href="javascript:swatchToText('660066')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#660099"><a href="javascript:swatchToText('660099')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#6600CC"><a href="javascript:swatchToText('6600CC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#6600FF"><a href="javascript:swatchToText('6600FF')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#663300"><a href="javascript:swatchToText('663300')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#663333"><a href="javascript:swatchToText('663333')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#663366"><a href="javascript:swatchToText('663366')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#663399"><a href="javascript:swatchToText('663399')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#6633CC"><a href="javascript:swatchToText('6633CC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#6633FF"><a href="javascript:swatchToText('6633FF')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#666600"><a href="javascript:swatchToText('666600')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#666633"><a href="javascript:swatchToText('666633')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#666666"><a href="javascript:swatchToText('666666')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#666699"><a href="javascript:swatchToText('666699')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#6666CC"><a href="javascript:swatchToText('6666CC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#6666FF"><a href="javascript:swatchToText('6666FF')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#669900"><a href="javascript:swatchToText('669900')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#669933"><a href="javascript:swatchToText('669933')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#669966"><a href="javascript:swatchToText('669966')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#669999"><a href="javascript:swatchToText('669999')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#6699CC"><a href="javascript:swatchToText('6699CC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#6699FF"><a href="javascript:swatchToText('6699FF')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#66CC00"><a href="javascript:swatchToText('66CC00')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#66CC33"><a href="javascript:swatchToText('66CC33')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#66CC66"><a href="javascript:swatchToText('66CC66')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#66CC99"><a href="javascript:swatchToText('66CC99')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#66CCCC"><a href="javascript:swatchToText('66CCCC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#66CCFF"><a href="javascript:swatchToText('66CCFF')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#66FF00"><a href="javascript:swatchToText('66FF00')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#66FF33"><a href="javascript:swatchToText('66FF33')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#66FF66"><a href="javascript:swatchToText('66FF66')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#66FF99"><a href="javascript:swatchToText('66FF99')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#66FFCC"><a href="javascript:swatchToText('66FFCC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#66FFFF"><a href="javascript:swatchToText('66FFFF')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
		<td width="5" height="5" bgcolor="#C8C8C8"><a href="javascript:swatchToText('C8C8C8')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
      </tr>
      <tr>
        <td width="5" height="5" bgcolor="#990000"><a href="javascript:swatchToText('990000')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#990033"><a href="javascript:swatchToText('990033')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#990066"><a href="javascript:swatchToText('990066')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#990099"><a href="javascript:swatchToText('990099')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#9900CC"><a href="javascript:swatchToText('9900CC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#9900FF"><a href="javascript:swatchToText('9900FF')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#993300"><a href="javascript:swatchToText('993300')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#993333"><a href="javascript:swatchToText('993333')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#993366"><a href="javascript:swatchToText('993366')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#993399"><a href="javascript:swatchToText('993399')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#9933CC"><a href="javascript:swatchToText('9933CC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#9933FF"><a href="javascript:swatchToText('9933FF')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#996600"><a href="javascript:swatchToText('996600')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#996633"><a href="javascript:swatchToText('996633')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#996666"><a href="javascript:swatchToText('996666')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#996699"><a href="javascript:swatchToText('996699')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#9966CC"><a href="javascript:swatchToText('9966CC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#9966FF"><a href="javascript:swatchToText('9966FF')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#999900"><a href="javascript:swatchToText('999900')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#999933"><a href="javascript:swatchToText('999933')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#999966"><a href="javascript:swatchToText('999966')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#999999"><a href="javascript:swatchToText('999999')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#9999CC"><a href="javascript:swatchToText('9999CC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#9999FF"><a href="javascript:swatchToText('9999FF')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#99CC00"><a href="javascript:swatchToText('99CC00')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#99CC33"><a href="javascript:swatchToText('99CC33')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#99CC66"><a href="javascript:swatchToText('99CC66')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#99CC99"><a href="javascript:swatchToText('99CC99')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#99CCCC"><a href="javascript:swatchToText('99CCCC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#99CCFF"><a href="javascript:swatchToText('99CCFF')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#99FF00"><a href="javascript:swatchToText('99FF00')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#99FF33"><a href="javascript:swatchToText('99FF33')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#99FF66"><a href="javascript:swatchToText('99FF66')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#99FF99"><a href="javascript:swatchToText('99FF99')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#99FFCC"><a href="javascript:swatchToText('99FFCC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#99FFFF"><a href="javascript:swatchToText('99FFFF')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
		<td width="5" height="5" bgcolor="#CDCDCD"><a href="javascript:swatchToText('CDCDCD')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
      </tr>
      <tr>
        <td width="5" height="5" bgcolor="#CC0000"><a href="javascript:swatchToText('CC0000')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#CC0033"><a href="javascript:swatchToText('CC0033')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#CC0066"><a href="javascript:swatchToText('CC0066')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#CC0099"><a href="javascript:swatchToText('CC0099')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#CC00CC"><a href="javascript:swatchToText('CC00CC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#CC00FF"><a href="javascript:swatchToText('CC00FF')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#CC3300"><a href="javascript:swatchToText('CC3300')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#CC3333"><a href="javascript:swatchToText('CC3333')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#CC3366"><a href="javascript:swatchToText('CC3366')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#CC3399"><a href="javascript:swatchToText('CC3399')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#CC33CC"><a href="javascript:swatchToText('CC33CC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#CC33FF"><a href="javascript:swatchToText('CC33FF')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#CC6600"><a href="javascript:swatchToText('CC6600')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#CC6633"><a href="javascript:swatchToText('CC6633')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#CC6666"><a href="javascript:swatchToText('CC6666')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#CC6699"><a href="javascript:swatchToText('CC6699')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#CC66CC"><a href="javascript:swatchToText('CC66CC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#CC66FF"><a href="javascript:swatchToText('CC66FF')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#CC9900"><a href="javascript:swatchToText('CC9900')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#CC9933"><a href="javascript:swatchToText('CC9933')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#CC9966"><a href="javascript:swatchToText('CC9966')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#CC9999"><a href="javascript:swatchToText('CC9999')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#CC99CC"><a href="javascript:swatchToText('CC99CC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#CC99FF"><a href="javascript:swatchToText('CC99FF')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#CCCC00"><a href="javascript:swatchToText('CCCC00')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#CCCC33"><a href="javascript:swatchToText('CCCC33')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#CCCC66"><a href="javascript:swatchToText('CCCC66')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#CCCC99"><a href="javascript:swatchToText('CCCC99')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#CCCCCC"><a href="javascript:swatchToText('CCCCCC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#CCCCFF"><a href="javascript:swatchToText('CCCCFF')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#CCFF00"><a href="javascript:swatchToText('CCFF00')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#CCFF33"><a href="javascript:swatchToText('CCFF33')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#CCFF66"><a href="javascript:swatchToText('CCFF66')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#CCFF99"><a href="javascript:swatchToText('CCFF99')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#CCFFCC"><a href="javascript:swatchToText('CCFFCC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#CCFFFF"><a href="javascript:swatchToText('CCFFFF')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
		<td width="5" height="5" bgcolor="#9B9B9B"><a href="javascript:swatchToText('9B9B9B')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
		
      </tr>
      <tr>
        <td width="5" height="5" bgcolor="#FF0000"><a href="javascript:swatchToText('FF0000')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#FF0033"><a href="javascript:swatchToText('FF0033')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#FF0066"><a href="javascript:swatchToText('FF0066')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#FF0099"><a href="javascript:swatchToText('FF0099')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#FF00CC"><a href="javascript:swatchToText('FF00CC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#FF00FF"><a href="javascript:swatchToText('FF00FF')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#FF3300"><a href="javascript:swatchToText('FF3300')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#FF3333"><a href="javascript:swatchToText('FF3333')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#FF3366"><a href="javascript:swatchToText('FF3366')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#FF3399"><a href="javascript:swatchToText('FF3399')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#FF33CC"><a href="javascript:swatchToText('FF33CC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#FF33FF"><a href="javascript:swatchToText('FF33FF')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#FF6600"><a href="javascript:swatchToText('FF6600')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#FF6633"><a href="javascript:swatchToText('FF6633')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#FF6666"><a href="javascript:swatchToText('FF6666')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#FF6699"><a href="javascript:swatchToText('FF6699')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#FF66CC"><a href="javascript:swatchToText('FF66CC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#FF66FF"><a href="javascript:swatchToText('FF66FF')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#FF9900"><a href="javascript:swatchToText('FF9900')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#FF9933"><a href="javascript:swatchToText('FF9933')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#FF9966"><a href="javascript:swatchToText('FF9966')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#FF9999"><a href="javascript:swatchToText('FF9999')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#FF99CC"><a href="javascript:swatchToText('FF99CC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#FF99FF"><a href="javascript:swatchToText('FF99FF')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#FFCC00"><a href="javascript:swatchToText('FFCC00')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#FFCC33"><a href="javascript:swatchToText('FFCC33')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#FFCC66"><a href="javascript:swatchToText('FFCC66')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#FFCC99"><a href="javascript:swatchToText('FFCC99')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#FFCCCC"><a href="javascript:swatchToText('FFCCCC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#FFCCCC"><a href="javascript:swatchToText('FFCCCC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#FFFF00"><a href="javascript:swatchToText('FFFF00')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#FFFF33"><a href="javascript:swatchToText('FFFF33')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#FFFF66"><a href="javascript:swatchToText('FFFF66')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#FFFF99"><a href="javascript:swatchToText('FFFF99')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#FFFFCC"><a href="javascript:swatchToText('FFFFCC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td width="5" height="5" bgcolor="#FFFFFF"><a href="javascript:swatchToText('FFFFFF')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
		
		<td width="5" height="5" bgcolor="#818181"><a href="javascript:swatchToText('818181')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
      </tr>
      <!--<tr>
        <td width="5" height="5" bgcolor="#CCCCCC"><a href="javascript:swatchToText('CCCCCC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td height="5" bgcolor="#EEEEEE"><a href="javascript:swatchToText('EEEEEE')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td height="5" bgcolor="#FF0066"><a href="javascript:swatchToText('CCCCCC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td height="5" bgcolor="#FF0099"><a href="javascript:swatchToText('CCCCCC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td height="5" bgcolor="#FF00CC"><a href="javascript:swatchToText('CCCCCC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td height="5" bgcolor="#FF00FF"><a href="javascript:swatchToText('CCCCCC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td height="5" bgcolor="#FF3300"><a href="javascript:swatchToText('CCCCCC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td height="5" bgcolor="#FF3333"><a href="javascript:swatchToText('CCCCCC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td height="5" bgcolor="#FF3366"><a href="javascript:swatchToText('CCCCCC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td height="5" bgcolor="#FF3399"><a href="javascript:swatchToText('CCCCCC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td height="5" bgcolor="#FF33CC"><a href="javascript:swatchToText('CCCCCC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td height="5" bgcolor="#FF33FF"><a href="javascript:swatchToText('CCCCCC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td height="5" bgcolor="#FF6600"><a href="javascript:swatchToText('CCCCCC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td height="5" bgcolor="#FF6633"><a href="javascript:swatchToText('CCCCCC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td height="5" bgcolor="#FF6666"><a href="javascript:swatchToText('CCCCCC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td height="5" bgcolor="#FF6699"><a href="javascript:swatchToText('CCCCCC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td height="5" bgcolor="#FF66CC"><a href="javascript:swatchToText('CCCCCC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td height="5" bgcolor="#FF66FF"><a href="javascript:swatchToText('CCCCCC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td height="5" bgcolor="#FF9900"><a href="javascript:swatchToText('CCCCCC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td height="5" bgcolor="#FF9933"><a href="javascript:swatchToText('CCCCCC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td height="5" bgcolor="#FF9966"><a href="javascript:swatchToText('CCCCCC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td height="5" bgcolor="#FF9999"><a href="javascript:swatchToText('CCCCCC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td height="5" bgcolor="#FF99CC"><a href="javascript:swatchToText('CCCCCC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td height="5" bgcolor="#FF99FF"><a href="javascript:swatchToText('CCCCCC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td height="5" bgcolor="#FFCC00"><a href="javascript:swatchToText('CCCCCC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td height="5" bgcolor="#FFCC33"><a href="javascript:swatchToText('CCCCCC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td height="5" bgcolor="#FFCC66"><a href="javascript:swatchToText('CCCCCC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td height="5" bgcolor="#FFCC99"><a href="javascript:swatchToText('CCCCCC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td height="5" bgcolor="#FFCCCC"><a href="javascript:swatchToText('CCCCCC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td height="5" bgcolor="#FFCCCC"><a href="javascript:swatchToText('CCCCCC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td height="5" bgcolor="#FFFFFF"><a href="javascript:swatchToText('CCCCCC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td height="5" bgcolor="#FFFFFF"><a href="javascript:swatchToText('CCCCCC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td height="5" bgcolor="#FFFFFF"><a href="javascript:swatchToText('CCCCCC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td height="5" bgcolor="#FFFFFF"><a href="javascript:swatchToText('CCCCCC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td height="5" bgcolor="#FFFFFF"><a href="javascript:swatchToText('CCCCCC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td height="5" bgcolor="#FFFFFF"><a href="javascript:swatchToText('CCCCCC')"><img  src="../MenuImages/b.gif" width="10" height="10" border="0"></a></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>-->
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" align="center" cellpadding="1" cellspacing="2" bgcolor="#ffffff">
      <tr>
        <td align="left">
          <input type="hidden"
maxlength=6 name=txtstcolor onBlur=HexToRGB(document.textFields.txtstcolor.value); onKeyDown=handleKeyDown(event,this); size=7 value="<?=$strBgColor?>">
          <INPUT  type="hidden"
maxLength=3 name=redField onblur="RGBtoHex();" onKeyDown="handleKeyDown(event,this);" size=3 value=255>
          <INPUT type="hidden"
maxLength=3 name=greenField onblur="RGBtoHex();" onKeyDown="handleKeyDown(event,this);" size=3 value=255>
          <INPUT type="hidden"
maxLength=3 name=blueField onblur="RGBtoHex();" onKeyDown="handleKeyDown(event,this);" size=3 value=255>
          <input type="hidden" name="a" value="choose"></td>
        </tr>
    </table></td>
  </tr>
</table>
