<script language="JavaScript">

function HexToRGB2(hexValue){
	var pattern=(new RegExp("^[0123456789abcdefABCDEF]{6}$"));
	if (pattern.test(hexValue)) {
		coloris2(hexValue);
		//alert(document.forms[0].fieldName.value);
		document.forms[0].txtMouseOver.value=hexValue.toUpperCase();
	    document.getElementById('tdMouseOver2').style.backgroundColor="#"+hexValue;

		//alert(document.forms[0].fieldName.value);
	} else {
		alert("Please enter a valid hex color code");
		return false;
	}
}
function coloris2(newColor) {
  //alert(newColor);
  //alert(document.getElementById('tdColor').background);
  document.getElementById('tdMouseOver1').style.backgroundColor="#"+newColor;
  //alert(document.getElementById('tdColor').style.background);
}
function swatchToText2(hexValue) {
	//alert("hello");
	coloris2(hexValue);
	HexToRGB2(hexValue)
	//alert(hexValue);
}
</script>
<link href="websitebuilder.css" rel="stylesheet" type="text/css">
	<table cellpadding="2" cellspacing="0" border="0" width="100%" bgcolor="#ffffff"  align="center">
      <TR>
        <TD colspan="2" class="hdng_sandy">
		
		
			<table cellpadding="0" cellspacing="0" border="0" width="449" bgcolor="#ffffff"  align="center">
			  <tr>
				<td width="5" height="5" bgcolor="#000000" ><a href="#" onClick="swatchToText2('000000')"></a></td>
				<td width="5" height="5" bgcolor="#000033" onMouseOver="coloris2('000033')" onClick="return swatchToText2('000033');"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#000066" onMouseOver="coloris2('000066')" onClick="return swatchToText2('000066');"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#000099" onMouseOver="coloris2('000099')" onClick="return swatchToText2('000099')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#0000CC" onMouseOver="coloris2('0000CC')" onClick="return swatchToText2('0000CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#0000FF" onMouseOver="coloris2('0000FF')" onClick="return swatchToText2('0000FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#003300" onMouseOver="coloris2('003300')" onClick="return swatchToText2('003300')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#003333" onMouseOver="coloris2('003333')" onClick="return swatchToText2('003333')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#003366" onMouseOver="coloris2('003366')" onClick="return swatchToText2('003366')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#003399" onMouseOver="coloris2('003399')" onClick="return swatchToText2('003399')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#0033CC" onMouseOver="coloris2('0033CC')" onClick="return swatchToText2('0033CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#0033FF" onMouseOver="coloris2('0033FF')" onClick="return swatchToText2('0033FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#006600" onMouseOver="coloris2('006600')" onClick="return swatchToText2('006600')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#006633" onMouseOver="coloris2('006633')" onClick="return swatchToText2('006633')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#006666" onMouseOver="coloris2('006666')" onClick="return swatchToText2('006666')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#006699" onMouseOver="coloris2('006699')" onClick="return swatchToText2('006699')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#0066CC" onMouseOver="coloris2('0066CC')" onClick="return swatchToText2('0066CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#0066FF" onMouseOver="coloris2('0066FF')" onClick="return swatchToText2('0066FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#009900" onMouseOver="coloris2('009900')" onClick="return swatchToText2('009900')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#009933" onMouseOver="coloris2('009933')" onClick="return swatchToText2('009933')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#009966" onMouseOver="coloris2('009966')" onClick="return swatchToText2('009966')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#009999" onMouseOver="coloris2('009999')" onClick="return swatchToText2('009999')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#0099CC" onMouseOver="coloris2('0099CC')" onClick="return swatchToText2('0099CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#0099FF" onMouseOver="coloris2('0099FF')" onClick="return swatchToText2('0099FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#00CC00" onMouseOver="coloris2('00CC00')" onClick="return swatchToText2('00CC00')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#00CC33" onMouseOver="coloris2('00CC33')" onClick="return swatchToText2('00CC33')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#00CC66" onMouseOver="coloris2('00CC66')" onClick="return swatchToText2('00CC66')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#00CC99" onMouseOver="coloris2('00CC99')" onClick="return swatchToText2('00CC99')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#00CCCC" onMouseOver="coloris2('00CCCC')" onClick="return swatchToText2('00CCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#00CCFF" onMouseOver="coloris2('00CCFF')" onClick="return swatchToText2('00CCFF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#00FF00" onMouseOver="coloris2('00FF00')" onClick="return swatchToText2('00FF00')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#00FF33" onMouseOver="coloris2('00FF33')" onClick="return swatchToText2('00FF33')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#00FF66" onMouseOver="coloris2('00FF66')" onClick="return swatchToText2('00FF66')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#00FF99" onMouseOver="coloris2('00FF99')" onClick="return swatchToText2('00FF99')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#00FFCC" onMouseOver="coloris2('00FFCC')" onClick="return swatchToText2('00FFCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#00FFFF" onMouseOver="coloris2('00FFFF')" onClick="return swatchToText2('00FFFF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#EEEEEE" onMouseOver="coloris2('EEEEEE')" onClick="return swatchToText2('EEEEEE')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
			  </tr>
			  <tr>
				<td width="5" height="5" bgcolor="#330000" onMouseOver="coloris2('330000')" onClick="return swatchToText2('330000')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#330033" onMouseOver="coloris2('330033')" onClick="return swatchToText2('330033')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#330066" onMouseOver="coloris2('330066')" onClick="return swatchToText2('330066')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#330099" onMouseOver="coloris2('330099')" onClick="return swatchToText2('330099')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#3300CC" onMouseOver="coloris2('3300CC')" onClick="return swatchToText2('3300CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#3300FF" onMouseOver="coloris2('3300FF')" onClick="return swatchToText2('3300FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#333300" onMouseOver="coloris2('333300')" onClick="return swatchToText2('333300')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#333333" onMouseOver="coloris2('333333')" onClick="return swatchToText2('333333')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#333366" onMouseOver="coloris2('333366')" onClick="return swatchToText2('333366')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#333399" onMouseOver="coloris2('333399')" onClick="return swatchToText2('333399')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#3333CC" onMouseOver="coloris2('3333CC')" onClick="return swatchToText2('3333CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#3333FF" onMouseOver="coloris2('3333FF')" onClick="return swatchToText2('3333FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#336600" onMouseOver="coloris2('336600')" onClick="return swatchToText2('336600')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#336633" onMouseOver="coloris2('336633')" onClick="return swatchToText2('336633')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#336666" onMouseOver="coloris2('336666')" onClick="return swatchToText2('336666')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#336699" onMouseOver="coloris2('336699')" onClick="return swatchToText2('336699')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#3366CC" onMouseOver="coloris2('3366CC')" onClick="return swatchToText2('3366CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#3366FF" onMouseOver="coloris2('3366FF')" onClick="return swatchToText2('3366FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#339900" onMouseOver="coloris2('339900')" onClick="return swatchToText2('339900')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#339933" onMouseOver="coloris2('339933')" onClick="return swatchToText2('339933')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#339966" onMouseOver="coloris2('339966')" onClick="return swatchToText2('339966')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#339999" onMouseOver="coloris2('339999')" onClick="return swatchToText2('339999')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#3399CC" onMouseOver="coloris2('3399CC')" onClick="return swatchToText2('3399CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#3399FF" onMouseOver="coloris2('3399FF')" onClick="return swatchToText2('3399FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#33CC00" onMouseOver="coloris2('33CC00')" onClick="return swatchToText2('33CC00')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#33CC33" onMouseOver="coloris2('33CC33')" onClick="return swatchToText2('33CC33')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#33CC66" onMouseOver="coloris2('33CC66')" onClick="return swatchToText2('33CC66')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#33CC99" onMouseOver="coloris2('33CC99')" onClick="return swatchToText2('33CC99')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#33CCCC" onMouseOver="coloris2('33CCCC')" onClick="return swatchToText2('33CCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#33CCFF" onMouseOver="coloris2('33CCFF')" onClick="return swatchToText2('33CCFF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#33FF00" onMouseOver="coloris2('33FF00')" onClick="return swatchToText2('33FF00')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#33FF33" onMouseOver="coloris2('33FF33')" onClick="return swatchToText2('33FF33')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#33FF66" onMouseOver="coloris2('33FF66')" onClick="return swatchToText2('33FF66')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#33FF99" onMouseOver="coloris2('33FF99')" onClick="return swatchToText2('33FF99')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#33FFCC" onMouseOver="coloris2('33FFCC')" onClick="return swatchToText2('33FFCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#33FFFF" onMouseOver="coloris2('33FFFF')" onClick="return swatchToText2('33FFFF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CCCCCC" onMouseOver="coloris2('CCCCCC')" onClick="return swatchToText2('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
			  </tr>
			  <tr>
				<td width="5" height="5" bgcolor="#660000" onMouseOver="coloris2('660000')" onClick="return swatchToText2('660000')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#660033" onMouseOver="coloris2('660033')" onClick="return swatchToText2('660033')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#660066" onMouseOver="coloris2('660066')" onClick="return swatchToText2('660066')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#660099" onMouseOver="coloris2('660099')" onClick="return swatchToText2('660099')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#6600CC" onMouseOver="coloris2('6600CC')" onClick="return swatchToText2('6600CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#6600FF" onMouseOver="coloris2('6600FF')" onClick="return swatchToText2('6600FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#663300" onMouseOver="coloris2('663300')" onClick="return swatchToText2('663300')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#663333" onMouseOver="coloris2('663333')" onClick="return swatchToText2('663333')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#663366" onMouseOver="coloris2('663366')" onClick="return swatchToText2('663366')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#663399" onMouseOver="coloris2('663399')" onClick="return swatchToText2('663399')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#6633CC" onMouseOver="coloris2('6633CC')" onClick="return swatchToText2('6633CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#6633FF" onMouseOver="coloris2('6633FF')" onClick="return swatchToText2('6633FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#666600" onMouseOver="coloris2('666600')" onClick="return swatchToText2('666600')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#666633" onMouseOver="coloris2('666633')" onClick="return swatchToText2('666633')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#666666" onMouseOver="coloris2('666666')" onClick="return swatchToText2('666666')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#666699" onMouseOver="coloris2('666699')" onClick="return swatchToText2('666699')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#6666CC" onMouseOver="coloris2('6666CC')" onClick="return swatchToText2('6666CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#6666FF" onMouseOver="coloris2('6666FF')" onClick="return swatchToText2('6666FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#669900" onMouseOver="coloris2('669900')" onClick="return swatchToText2('669900')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#669933" onMouseOver="coloris2('669933')" onClick="return swatchToText2('669933')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#669966" onMouseOver="coloris2('669966')" onClick="return swatchToText2('669966')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#669999" onMouseOver="coloris2('669999')" onClick="return swatchToText2('669999')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#6699CC" onMouseOver="coloris2('6699CC')" onClick="return swatchToText2('6699CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#6699FF" onMouseOver="coloris2('6699FF')" onClick="return swatchToText2('6699FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#66CC00" onMouseOver="coloris2('66CC00')" onClick="return swatchToText2('66CC00')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#66CC33" onMouseOver="coloris2('66CC33')" onClick="return swatchToText2('66CC33')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#66CC66" onMouseOver="coloris2('66CC66')" onClick="return swatchToText2('66CC66')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#66CC99" onMouseOver="coloris2('66CC99')" onClick="return swatchToText2('66CC99')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#66CCCC" onMouseOver="coloris2('66CCCC')" onClick="return swatchToText2('66CCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#66CCFF" onMouseOver="coloris2('66CCFF')" onClick="return swatchToText2('66CCFF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#66FF00" onMouseOver="coloris2('66FF00')" onClick="return swatchToText2('66FF00')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#66FF33" onMouseOver="coloris2('66FF33')" onClick="return swatchToText2('66FF33')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#66FF66" onMouseOver="coloris2('66FF66')" onClick="return swatchToText2('66FF66')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#66FF99" onMouseOver="coloris2('66FF99')" onClick="return swatchToText2('66FF99')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#66FFCC" onMouseOver="coloris2('66FFCC')" onClick="return swatchToText2('66FFCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#66FFFF" onMouseOver="coloris2('66FFFF')" onClick="return swatchToText2('66FFFF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#C8C8C8" onMouseOver="coloris2('C8C8C8')" onClick="return swatchToText2('C8C8C8')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
			  </tr>
			  <tr>
				<td width="5" height="5" bgcolor="#990000" onMouseOver="coloris2('990000')" onClick="return swatchToText2('990000')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#990033" onMouseOver="coloris2('990033')" onClick="return swatchToText2('990033')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#990066" onMouseOver="coloris2('990066')" onClick="return swatchToText2('990066')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#990099" onMouseOver="coloris2('990099')" onClick="return swatchToText2('990099')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#9900CC" onMouseOver="coloris2('9900CC')" onClick="return swatchToText2('9900CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#9900FF" onMouseOver="coloris2('9900FF')" onClick="return swatchToText2('9900FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#993300" onMouseOver="coloris2('993300')" onClick="return swatchToText2('993300')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#993333" onMouseOver="coloris2('993333')" onClick="return swatchToText2('993333')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#993366" onMouseOver="coloris2('993366')" onClick="return swatchToText2('993366')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#993399" onMouseOver="coloris2('993399')" onClick="return swatchToText2('993399')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#9933CC" onMouseOver="coloris2('9933CC')" onClick="return swatchToText2('9933CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#9933FF" onMouseOver="coloris2('9933FF')" onClick="return swatchToText2('9933FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#996600" onMouseOver="coloris2('996600')" onClick="return swatchToText2('996600')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#996633" onMouseOver="coloris2('996633')" onClick="return swatchToText2('996633')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#996666" onMouseOver="coloris2('996666')" onClick="return swatchToText2('996666')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#996699" onMouseOver="coloris2('996699')" onClick="return swatchToText2('996699')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#9966CC" onMouseOver="coloris2('9966CC')" onClick="return swatchToText2('9966CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#9966FF" onMouseOver="coloris2('9966FF')" onClick="return swatchToText2('9966FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#999900" onMouseOver="coloris2('999900')" onClick="return swatchToText2('999900')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#999933" onMouseOver="coloris2('999933')" onClick="return swatchToText2('999933')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#999966" onMouseOver="coloris2('999966')" onClick="return swatchToText2('999966')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#999999" onMouseOver="coloris2('999999')" onClick="return swatchToText2('999999')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#9999CC" onMouseOver="coloris2('9999CC')" onClick="return swatchToText2('9999CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#9999FF" onMouseOver="coloris2('9999FF')" onClick="return swatchToText2('9999FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#99CC00" onMouseOver="coloris2('99CC00')" onClick="return swatchToText2('99CC00')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#99CC33" onMouseOver="coloris2('99CC33')" onClick="return swatchToText2('99CC33')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#99CC66" onMouseOver="coloris2('99CC66')" onClick="return swatchToText2('99CC66')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#99CC99" onMouseOver="coloris2('99CC99')" onClick="return swatchToText2('99CC99')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#99CCCC" onMouseOver="coloris2('99CCCC')" onClick="return swatchToText2('99CCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#99CCFF" onMouseOver="coloris2('99CCFF')" onClick="return swatchToText2('99CCFF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#99FF00" onMouseOver="coloris2('99FF00')" onClick="return swatchToText2('99FF00')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#99FF33" onMouseOver="coloris2('99FF33')" onClick="return swatchToText2('99FF33')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#99FF66" onMouseOver="coloris2('99FF66')" onClick="return swatchToText2('99FF66')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#99FF99" onMouseOver="coloris2('99FF99')" onClick="return swatchToText2('99FF99')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#99FFCC" onMouseOver="coloris2('99FFCC')" onClick="return swatchToText2('99FFCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#99FFFF" onMouseOver="coloris2('99FFFF')" onClick="return swatchToText2('99FFFF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CDCDCD" onMouseOver="coloris2('CDCDCD')" onClick="return swatchToText2('CDCDCD')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
			  </tr>
			  <tr>
				<td width="5" height="5" bgcolor="#CC0000" onMouseOver="coloris2('CC0000')" onClick="return swatchToText2('CC0000')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC0033" onMouseOver="coloris2('CC0033')" onClick="return swatchToText2('CC0033')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC0066" onMouseOver="coloris2('CC0066')" onClick="return swatchToText2('CC0066')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC0099" onMouseOver="coloris2('CC0099')" onClick="return swatchToText2('CC0099')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC00CC" onMouseOver="coloris2('CC00CC')" onClick="return swatchToText2('CC00CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC00FF" onMouseOver="coloris2('CC00FF')" onClick="return swatchToText2('CC00FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC3300" onMouseOver="coloris2('CC3300')" onClick="return swatchToText2('CC3300')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC3333" onMouseOver="coloris2('CC3333')" onClick="return swatchToText2('CC3333')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC3366" onMouseOver="coloris2('CC3366')" onClick="return swatchToText2('CC3366')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC3399" onMouseOver="coloris2('CC3399')" onClick="return swatchToText2('CC3399')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC33CC" onMouseOver="coloris2('CC33CC')" onClick="return swatchToText2('CC33CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC33FF" onMouseOver="coloris2('CC33FF')" onClick="return swatchToText2('CC33FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC6600" onMouseOver="coloris2('CC6600')" onClick="return swatchToText2('CC6600')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC6633" onMouseOver="coloris2('CC6633')" onClick="return swatchToText2('CC6633')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC6666" onMouseOver="coloris2('CC6666')" onClick="return swatchToText2('CC6666')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC6699" onMouseOver="coloris2('CC6699')" onClick="return swatchToText2('CC6699')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC66CC" onMouseOver="coloris2('CC66CC')" onClick="return swatchToText2('CC66CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC66FF" onMouseOver="coloris2('CC66FF')" onClick="return swatchToText2('CC66FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC9900" onMouseOver="coloris2('CC9900')" onClick="return swatchToText2('CC9900')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC9933" onMouseOver="coloris2('CC9933')" onClick="return swatchToText2('CC9933')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC9966" onMouseOver="coloris2('CC9966')" onClick="return swatchToText2('CC9966')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC9999" onMouseOver="coloris2('CC9999')" onClick="return swatchToText2('CC9999')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC99CC" onMouseOver="coloris2('CC99CC')" onClick="return swatchToText2('CC99CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC99FF" onMouseOver="coloris2('CC99FF')" onClick="return swatchToText2('CC99FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CCCC00" onMouseOver="coloris2('CCCC00')" onClick="return swatchToText2('CCCC00')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CCCC33" onMouseOver="coloris2('CCCC33')" onClick="return swatchToText2('CCCC33')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CCCC66" onMouseOver="coloris2('CCCC66')" onClick="return swatchToText2('CCCC66')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CCCC99" onMouseOver="coloris2('CCCC99')" onClick="return swatchToText2('CCCC99')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CCCCCC" onMouseOver="coloris2('CCCCCC')" onClick="return swatchToText2('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CCCCFF" onMouseOver="coloris2('CCCCFF')" onClick="return swatchToText2('CCCCFF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CCFF00" onMouseOver="coloris2('CCFF00')" onClick="return swatchToText2('CCFF00')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CCFF33" onMouseOver="coloris2('CCFF33')" onClick="return swatchToText2('CCFF33')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CCFF66" onMouseOver="coloris2('CCFF66')" onClick="return swatchToText2('CCFF66')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CCFF99" onMouseOver="coloris2('CCFF99')" onClick="return swatchToText2('CCFF99')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CCFFCC" onMouseOver="coloris2('CCFFCC')" onClick="return swatchToText2('CCFFCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CCFFFF" onMouseOver="coloris2('CCFFFF')" onClick="return swatchToText2('CCFFFF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#9B9B9B" onMouseOver="coloris2('9B9B9B')" onClick="return swatchToText2('9B9B9B')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				
			  </tr>
			  <tr>
				<td width="5" height="5" bgcolor="#FF0000" onMouseOver="coloris2('FF0000')" onClick="return swatchToText2('FF0000')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF0033" onMouseOver="coloris2('FF0033')" onClick="return swatchToText2('FF0033')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF0066" onMouseOver="coloris2('FF0066')" onClick="return swatchToText2('FF0066')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF0099" onMouseOver="coloris2('FF0099')" onClick="return swatchToText2('FF0099')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF00CC" onMouseOver="coloris2('FF00CC')" onClick="return swatchToText2('FF00CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF00FF" onMouseOver="coloris2('FF00FF')" onClick="return swatchToText2('FF00FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF3300" onMouseOver="coloris2('FF3300')" onClick="return swatchToText2('FF3300')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF3333" onMouseOver="coloris2('FF3333')" onClick="return swatchToText2('FF3333')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF3366" onMouseOver="coloris2('FF3366')" onClick="return swatchToText2('FF3366')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF3399" onMouseOver="coloris2('FF3399')" onClick="return swatchToText2('FF3399')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF33CC" onMouseOver="coloris2('FF33CC')" onClick="return swatchToText2('FF33CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF33FF" onMouseOver="coloris2('FF33FF')" onClick="return swatchToText2('FF33FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF6600" onMouseOver="coloris2('FF6600')" onClick="return swatchToText2('FF6600')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF6633" onMouseOver="coloris2('FF6633')" onClick="return swatchToText2('FF6633')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF6666" onMouseOver="coloris2('FF6666')" onClick="return swatchToText2('FF6666')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF6699" onMouseOver="coloris2('FF6699')" onClick="return swatchToText2('FF6699')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF66CC" onMouseOver="coloris2('FF66CC')" onClick="return swatchToText2('FF66CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF66FF" onMouseOver="coloris2('FF66FF')" onClick="return swatchToText2('FF66FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF9900" onMouseOver="coloris2('FF9900')" onClick="return swatchToText2('FF9900')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF9933" onMouseOver="coloris2('FF9933')" onClick="return swatchToText2('FF9933')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF9966" onMouseOver="coloris2('FF9966')" onClick="return swatchToText2('FF9966')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF9999" onMouseOver="coloris2('FF9999')" onClick="return swatchToText2('FF9999')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF99CC" onMouseOver="coloris2('FF99CC')" onClick="return swatchToText2('FF99CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF99FF" onMouseOver="coloris2('FF99FF')" onClick="return swatchToText2('FF99FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FFCC00" onMouseOver="coloris2('FFCC00')" onClick="return swatchToText2('FFCC00')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FFCC33" onMouseOver="coloris2('FFCC33')" onClick="return swatchToText2('FFCC33')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FFCC66" onMouseOver="coloris2('FFCC66')" onClick="return swatchToText2('FFCC66')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FFCC99" onMouseOver="coloris2('FFCC99')" onClick="return swatchToText2('FFCC99')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FFCCCC" onMouseOver="coloris2('FFCCCC')" onClick="return swatchToText2('FFCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FFCCCC" onMouseOver="coloris2('FFCCCC')" onClick="return swatchToText2('FFCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FFFF00" onMouseOver="coloris2('FFFF00')" onClick="return swatchToText2('FFFF00')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FFFF33" onMouseOver="coloris2('FFFF33')" onClick="return swatchToText2('FFFF33')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FFFF66" onMouseOver="coloris2('FFFF66')" onClick="return swatchToText2('FFFF66')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FFFF99" onMouseOver="coloris2('FFFF99')" onClick="return swatchToText2('FFFF99')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FFFFCC" onMouseOver="coloris2('FFFFCC')" onClick="return swatchToText2('FFFFCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FFFFFF" onMouseOver="coloris2('FFFFFF')" onClick="return swatchToText2('FFFFFF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				
				<td width="5" height="5" bgcolor="#818181" onMouseOver="coloris2('818181')" onClick="return swatchToText2('818181')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
			  </tr>
			  <!--<tr>
				<td width="5" height="5" bgcolor="#CCCCCC" onMouseOver="coloris2('CCCCCC')" onClick="return swatchToText2('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#EEEEEE" onMouseOver="coloris2('EEEEEE')" onClick="return swatchToText2('EEEEEE')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF0066" onMouseOver="coloris2('FF0066')" onClick="return swatchToText2('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF0099" onMouseOver="coloris2('FF0099')" onClick="return swatchToText2('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF00CC" onMouseOver="coloris2('FF00CC')" onClick="return swatchToText2('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF00FF" onMouseOver="coloris2('FF00FF')" onClick="return swatchToText2('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF3300" onMouseOver="coloris2('FF3300')" onClick="return swatchToText2('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF3333" onMouseOver="coloris2('FF3333')" onClick="return swatchToText2('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF3366" onMouseOver="coloris2('FF3366')" onClick="return swatchToText2('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF3399" onMouseOver="coloris2('FF3399')" onClick="return swatchToText2('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF33CC" onMouseOver="coloris2('FF33CC')" onClick="return swatchToText2('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF33FF" onMouseOver="coloris2('FF33FF')" onClick="return swatchToText2('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF6600" onMouseOver="coloris2('FF6600')" onClick="return swatchToText2('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF6633" onMouseOver="coloris2('FF6633')" onClick="return swatchToText2('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF6666" onMouseOver="coloris2('FF6666')" onClick="return swatchToText2('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF6699" onMouseOver="coloris2('FF6699')" onClick="return swatchToText2('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF66CC" onMouseOver="coloris2('FF66CC')" onClick="return swatchToText2('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF66FF" onMouseOver="coloris2('FF66FF')" onClick="return swatchToText2('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF9900" onMouseOver="coloris2('FF9900')" onClick="return swatchToText2('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF9933" onMouseOver="coloris2('FF9933')" onClick="return swatchToText2('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF9966" onMouseOver="coloris2('FF9966')" onClick="return swatchToText2('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF9999" onMouseOver="coloris2('FF9999')" onClick="return swatchToText2('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF99CC" onMouseOver="coloris2('FF99CC')" onClick="return swatchToText2('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF99FF" onMouseOver="coloris2('FF99FF')" onClick="return swatchToText2('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FFCC00" onMouseOver="coloris2('FFCC00')" onClick="return swatchToText2('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FFCC33" onMouseOver="coloris2('FFCC33')" onClick="return swatchToText2('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FFCC66" onMouseOver="coloris2('FFCC66')" onClick="return swatchToText2('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FFCC99" onMouseOver="coloris2('FFCC99')" onClick="return swatchToText2('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FFCCCC" onMouseOver="coloris2('FFCCCC')" onClick="return swatchToText2('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FFCCCC" onMouseOver="coloris2('FFCCCC')" onClick="return swatchToText2('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FFFFFF" onMouseOver="coloris2('FFFFFF')" onClick="return swatchToText2('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FFFFFF" onMouseOver="coloris2('FFFFFF')" onClick="return swatchToText2('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FFFFFF" onMouseOver="coloris2('FFFFFF')" onClick="return swatchToText2('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FFFFFF" onMouseOver="coloris2('FFFFFF')" onClick="return swatchToText2('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FFFFFF" onMouseOver="coloris2('FFFFFF')" onClick="return swatchToText2('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FFFFFF" onMouseOver="coloris2('FFFFFF')" onClick="return swatchToText2('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			  </tr>-->
			</table>
		
		</TD>
        <td width="5">
		<table cellpadding="0" border="0" cellspacing="0"	>
		<tr><td>
			<table width="35" height="35" border=1 cellpadding=0 cellspacing=0>
				<tr>
				  <td bgcolor="#ffffff;" id="tdMouseOver1">&nbsp;</td>
				</tr>
		   </table>
		</td></tr> 
		<tr><td>
			<table width="35" height="35" border=1 cellpadding=0 cellspacing=0>
				<tr>
				  <td <? if($strMnuMouseOverColor != '') echo "bgcolor='#".$strMnuMouseOverColor."'"; else echo "bgcolor='#ffffff'"; ?>id="tdMouseOver2">&nbsp;</td>
				</tr>
		   </table>
		</td></tr>   
	  </table> 
        </td>
      </TR>
	  <tr>
		<td align="left"><input type="hidden" name="txtMouseOver" value="<? if(isset($_REQUEST['txtMouseOver'])) print $_REQUEST['txtMouseOver'];?>"></td>
	  </tr>
  </table>
