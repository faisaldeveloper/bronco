<script language="JavaScript">

function HexToRGB(hexValue){
	var pattern=(new RegExp("^[0123456789abcdefABCDEF]{6}$"));
	if (pattern.test(hexValue)) {
		coloris(hexValue);
		//alert(document.forms[0].fieldName.value);
		document.forms[0].fieldName.value=hexValue.toUpperCase();
	    document.getElementById('tdColor2').style.backgroundColor="#"+hexValue;

		//alert(document.forms[0].fieldName.value);
	} else {
		alert("Please enter a valid hex color code");
		return false;
	}
}
function coloris(newColor) {
  //alert(newColor);
  //alert(document.getElementById('tdColor').background);
  document.getElementById('tdColor1').style.backgroundColor="#"+newColor;
  //alert(document.getElementById('tdColor').style.background);
}
function swatchToText(hexValue) {
	//alert("hello");
	coloris(hexValue);
	HexToRGB(hexValue)
	//alert(hexValue);
}
</script>
<link href="websitebuilder.css" rel="stylesheet" type="text/css">
	<table cellpadding="2" cellspacing="0" border="0" width="100%" bgcolor="#ffffff"  align="center">
      <TR>
        <TD colspan="2" class="hdng_sandy">
		
		
			<table cellpadding="0" cellspacing="0" border="0" width="449" bgcolor="#ffffff"  align="center">
			  <tr>
				<td width="5" height="5" bgcolor="#000000" ><a href="#" onClick="swatchToText('000000')"></a></td>
				<td width="5" height="5" bgcolor="#000033" onMouseOver="coloris('000033')" onClick="return swatchToText('000033');"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#000066" onMouseOver="coloris('000066')" onClick="return swatchToText('000066');"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#000099" onMouseOver="coloris('000099')" onClick="return swatchToText('000099')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#0000CC" onMouseOver="coloris('0000CC')" onClick="return swatchToText('0000CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#0000FF" onMouseOver="coloris('0000FF')" onClick="return swatchToText('0000FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#003300" onMouseOver="coloris('003300')" onClick="return swatchToText('003300')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#003333" onMouseOver="coloris('003333')" onClick="return swatchToText('003333')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#003366" onMouseOver="coloris('003366')" onClick="return swatchToText('003366')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#003399" onMouseOver="coloris('003399')" onClick="return swatchToText('003399')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#0033CC" onMouseOver="coloris('0033CC')" onClick="return swatchToText('0033CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#0033FF" onMouseOver="coloris('0033FF')" onClick="return swatchToText('0033FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#006600" onMouseOver="coloris('006600')" onClick="return swatchToText('006600')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#006633" onMouseOver="coloris('006633')" onClick="return swatchToText('006633')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#006666" onMouseOver="coloris('006666')" onClick="return swatchToText('006666')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#006699" onMouseOver="coloris('006699')" onClick="return swatchToText('006699')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#0066CC" onMouseOver="coloris('0066CC')" onClick="return swatchToText('0066CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#0066FF" onMouseOver="coloris('0066FF')" onClick="return swatchToText('0066FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#009900" onMouseOver="coloris('009900')" onClick="return swatchToText('009900')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#009933" onMouseOver="coloris('009933')" onClick="return swatchToText('009933')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#009966" onMouseOver="coloris('009966')" onClick="return swatchToText('009966')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#009999" onMouseOver="coloris('009999')" onClick="return swatchToText('009999')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#0099CC" onMouseOver="coloris('0099CC')" onClick="return swatchToText('0099CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#0099FF" onMouseOver="coloris('0099FF')" onClick="return swatchToText('0099FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#00CC00" onMouseOver="coloris('00CC00')" onClick="return swatchToText('00CC00')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#00CC33" onMouseOver="coloris('00CC33')" onClick="return swatchToText('00CC33')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#00CC66" onMouseOver="coloris('00CC66')" onClick="return swatchToText('00CC66')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#00CC99" onMouseOver="coloris('00CC99')" onClick="return swatchToText('00CC99')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#00CCCC" onMouseOver="coloris('00CCCC')" onClick="return swatchToText('00CCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#00CCFF" onMouseOver="coloris('00CCFF')" onClick="return swatchToText('00CCFF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#00FF00" onMouseOver="coloris('00FF00')" onClick="return swatchToText('00FF00')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#00FF33" onMouseOver="coloris('00FF33')" onClick="return swatchToText('00FF33')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#00FF66" onMouseOver="coloris('00FF66')" onClick="return swatchToText('00FF66')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#00FF99" onMouseOver="coloris('00FF99')" onClick="return swatchToText('00FF99')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#00FFCC" onMouseOver="coloris('00FFCC')" onClick="return swatchToText('00FFCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#00FFFF" onMouseOver="coloris('00FFFF')" onClick="return swatchToText('00FFFF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#EEEEEE" onMouseOver="coloris('EEEEEE')" onClick="return swatchToText('EEEEEE')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
			  </tr>
			  <tr>
				<td width="5" height="5" bgcolor="#330000" onMouseOver="coloris('330000')" onClick="return swatchToText('330000')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#330033" onMouseOver="coloris('330033')" onClick="return swatchToText('330033')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#330066" onMouseOver="coloris('330066')" onClick="return swatchToText('330066')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#330099" onMouseOver="coloris('330099')" onClick="return swatchToText('330099')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#3300CC" onMouseOver="coloris('3300CC')" onClick="return swatchToText('3300CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#3300FF" onMouseOver="coloris('3300FF')" onClick="return swatchToText('3300FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#333300" onMouseOver="coloris('333300')" onClick="return swatchToText('333300')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#333333" onMouseOver="coloris('333333')" onClick="return swatchToText('333333')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#333366" onMouseOver="coloris('333366')" onClick="return swatchToText('333366')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#333399" onMouseOver="coloris('333399')" onClick="return swatchToText('333399')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#3333CC" onMouseOver="coloris('3333CC')" onClick="return swatchToText('3333CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#3333FF" onMouseOver="coloris('3333FF')" onClick="return swatchToText('3333FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#336600" onMouseOver="coloris('336600')" onClick="return swatchToText('336600')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#336633" onMouseOver="coloris('336633')" onClick="return swatchToText('336633')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#336666" onMouseOver="coloris('336666')" onClick="return swatchToText('336666')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#336699" onMouseOver="coloris('336699')" onClick="return swatchToText('336699')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#3366CC" onMouseOver="coloris('3366CC')" onClick="return swatchToText('3366CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#3366FF" onMouseOver="coloris('3366FF')" onClick="return swatchToText('3366FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#339900" onMouseOver="coloris('339900')" onClick="return swatchToText('339900')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#339933" onMouseOver="coloris('339933')" onClick="return swatchToText('339933')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#339966" onMouseOver="coloris('339966')" onClick="return swatchToText('339966')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#339999" onMouseOver="coloris('339999')" onClick="return swatchToText('339999')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#3399CC" onMouseOver="coloris('3399CC')" onClick="return swatchToText('3399CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#3399FF" onMouseOver="coloris('3399FF')" onClick="return swatchToText('3399FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#33CC00" onMouseOver="coloris('33CC00')" onClick="return swatchToText('33CC00')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#33CC33" onMouseOver="coloris('33CC33')" onClick="return swatchToText('33CC33')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#33CC66" onMouseOver="coloris('33CC66')" onClick="return swatchToText('33CC66')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#33CC99" onMouseOver="coloris('33CC99')" onClick="return swatchToText('33CC99')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#33CCCC" onMouseOver="coloris('33CCCC')" onClick="return swatchToText('33CCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#33CCFF" onMouseOver="coloris('33CCFF')" onClick="return swatchToText('33CCFF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#33FF00" onMouseOver="coloris('33FF00')" onClick="return swatchToText('33FF00')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#33FF33" onMouseOver="coloris('33FF33')" onClick="return swatchToText('33FF33')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#33FF66" onMouseOver="coloris('33FF66')" onClick="return swatchToText('33FF66')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#33FF99" onMouseOver="coloris('33FF99')" onClick="return swatchToText('33FF99')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#33FFCC" onMouseOver="coloris('33FFCC')" onClick="return swatchToText('33FFCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#33FFFF" onMouseOver="coloris('33FFFF')" onClick="return swatchToText('33FFFF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CCCCCC" onMouseOver="coloris('CCCCCC')" onClick="return swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
			  </tr>
			  <tr>
				<td width="5" height="5" bgcolor="#660000" onMouseOver="coloris('660000')" onClick="return swatchToText('660000')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#660033" onMouseOver="coloris('660033')" onClick="return swatchToText('660033')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#660066" onMouseOver="coloris('660066')" onClick="return swatchToText('660066')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#660099" onMouseOver="coloris('660099')" onClick="return swatchToText('660099')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#6600CC" onMouseOver="coloris('6600CC')" onClick="return swatchToText('6600CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#6600FF" onMouseOver="coloris('6600FF')" onClick="return swatchToText('6600FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#663300" onMouseOver="coloris('663300')" onClick="return swatchToText('663300')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#663333" onMouseOver="coloris('663333')" onClick="return swatchToText('663333')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#663366" onMouseOver="coloris('663366')" onClick="return swatchToText('663366')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#663399" onMouseOver="coloris('663399')" onClick="return swatchToText('663399')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#6633CC" onMouseOver="coloris('6633CC')" onClick="return swatchToText('6633CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#6633FF" onMouseOver="coloris('6633FF')" onClick="return swatchToText('6633FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#666600" onMouseOver="coloris('666600')" onClick="return swatchToText('666600')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#666633" onMouseOver="coloris('666633')" onClick="return swatchToText('666633')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#666666" onMouseOver="coloris('666666')" onClick="return swatchToText('666666')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#666699" onMouseOver="coloris('666699')" onClick="return swatchToText('666699')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#6666CC" onMouseOver="coloris('6666CC')" onClick="return swatchToText('6666CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#6666FF" onMouseOver="coloris('6666FF')" onClick="return swatchToText('6666FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#669900" onMouseOver="coloris('669900')" onClick="return swatchToText('669900')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#669933" onMouseOver="coloris('669933')" onClick="return swatchToText('669933')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#669966" onMouseOver="coloris('669966')" onClick="return swatchToText('669966')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#669999" onMouseOver="coloris('669999')" onClick="return swatchToText('669999')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#6699CC" onMouseOver="coloris('6699CC')" onClick="return swatchToText('6699CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#6699FF" onMouseOver="coloris('6699FF')" onClick="return swatchToText('6699FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#66CC00" onMouseOver="coloris('66CC00')" onClick="return swatchToText('66CC00')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#66CC33" onMouseOver="coloris('66CC33')" onClick="return swatchToText('66CC33')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#66CC66" onMouseOver="coloris('66CC66')" onClick="return swatchToText('66CC66')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#66CC99" onMouseOver="coloris('66CC99')" onClick="return swatchToText('66CC99')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#66CCCC" onMouseOver="coloris('66CCCC')" onClick="return swatchToText('66CCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#66CCFF" onMouseOver="coloris('66CCFF')" onClick="return swatchToText('66CCFF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#66FF00" onMouseOver="coloris('66FF00')" onClick="return swatchToText('66FF00')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#66FF33" onMouseOver="coloris('66FF33')" onClick="return swatchToText('66FF33')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#66FF66" onMouseOver="coloris('66FF66')" onClick="return swatchToText('66FF66')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#66FF99" onMouseOver="coloris('66FF99')" onClick="return swatchToText('66FF99')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#66FFCC" onMouseOver="coloris('66FFCC')" onClick="return swatchToText('66FFCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#66FFFF" onMouseOver="coloris('66FFFF')" onClick="return swatchToText('66FFFF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#C8C8C8" onMouseOver="coloris('C8C8C8')" onClick="return swatchToText('C8C8C8')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
			  </tr>
			  <tr>
				<td width="5" height="5" bgcolor="#990000" onMouseOver="coloris('990000')" onClick="return swatchToText('990000')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#990033" onMouseOver="coloris('990033')" onClick="return swatchToText('990033')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#990066" onMouseOver="coloris('990066')" onClick="return swatchToText('990066')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#990099" onMouseOver="coloris('990099')" onClick="return swatchToText('990099')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#9900CC" onMouseOver="coloris('9900CC')" onClick="return swatchToText('9900CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#9900FF" onMouseOver="coloris('9900FF')" onClick="return swatchToText('9900FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#993300" onMouseOver="coloris('993300')" onClick="return swatchToText('993300')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#993333" onMouseOver="coloris('993333')" onClick="return swatchToText('993333')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#993366" onMouseOver="coloris('993366')" onClick="return swatchToText('993366')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#993399" onMouseOver="coloris('993399')" onClick="return swatchToText('993399')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#9933CC" onMouseOver="coloris('9933CC')" onClick="return swatchToText('9933CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#9933FF" onMouseOver="coloris('9933FF')" onClick="return swatchToText('9933FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#996600" onMouseOver="coloris('996600')" onClick="return swatchToText('996600')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#996633" onMouseOver="coloris('996633')" onClick="return swatchToText('996633')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#996666" onMouseOver="coloris('996666')" onClick="return swatchToText('996666')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#996699" onMouseOver="coloris('996699')" onClick="return swatchToText('996699')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#9966CC" onMouseOver="coloris('9966CC')" onClick="return swatchToText('9966CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#9966FF" onMouseOver="coloris('9966FF')" onClick="return swatchToText('9966FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#999900" onMouseOver="coloris('999900')" onClick="return swatchToText('999900')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#999933" onMouseOver="coloris('999933')" onClick="return swatchToText('999933')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#999966" onMouseOver="coloris('999966')" onClick="return swatchToText('999966')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#999999" onMouseOver="coloris('999999')" onClick="return swatchToText('999999')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#9999CC" onMouseOver="coloris('9999CC')" onClick="return swatchToText('9999CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#9999FF" onMouseOver="coloris('9999FF')" onClick="return swatchToText('9999FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#99CC00" onMouseOver="coloris('99CC00')" onClick="return swatchToText('99CC00')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#99CC33" onMouseOver="coloris('99CC33')" onClick="return swatchToText('99CC33')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#99CC66" onMouseOver="coloris('99CC66')" onClick="return swatchToText('99CC66')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#99CC99" onMouseOver="coloris('99CC99')" onClick="return swatchToText('99CC99')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#99CCCC" onMouseOver="coloris('99CCCC')" onClick="return swatchToText('99CCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#99CCFF" onMouseOver="coloris('99CCFF')" onClick="return swatchToText('99CCFF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#99FF00" onMouseOver="coloris('99FF00')" onClick="return swatchToText('99FF00')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#99FF33" onMouseOver="coloris('99FF33')" onClick="return swatchToText('99FF33')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#99FF66" onMouseOver="coloris('99FF66')" onClick="return swatchToText('99FF66')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#99FF99" onMouseOver="coloris('99FF99')" onClick="return swatchToText('99FF99')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#99FFCC" onMouseOver="coloris('99FFCC')" onClick="return swatchToText('99FFCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#99FFFF" onMouseOver="coloris('99FFFF')" onClick="return swatchToText('99FFFF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CDCDCD" onMouseOver="coloris('CDCDCD')" onClick="return swatchToText('CDCDCD')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
			  </tr>
			  <tr>
				<td width="5" height="5" bgcolor="#CC0000" onMouseOver="coloris('CC0000')" onClick="return swatchToText('CC0000')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC0033" onMouseOver="coloris('CC0033')" onClick="return swatchToText('CC0033')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC0066" onMouseOver="coloris('CC0066')" onClick="return swatchToText('CC0066')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC0099" onMouseOver="coloris('CC0099')" onClick="return swatchToText('CC0099')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC00CC" onMouseOver="coloris('CC00CC')" onClick="return swatchToText('CC00CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC00FF" onMouseOver="coloris('CC00FF')" onClick="return swatchToText('CC00FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC3300" onMouseOver="coloris('CC3300')" onClick="return swatchToText('CC3300')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC3333" onMouseOver="coloris('CC3333')" onClick="return swatchToText('CC3333')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC3366" onMouseOver="coloris('CC3366')" onClick="return swatchToText('CC3366')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC3399" onMouseOver="coloris('CC3399')" onClick="return swatchToText('CC3399')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC33CC" onMouseOver="coloris('CC33CC')" onClick="return swatchToText('CC33CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC33FF" onMouseOver="coloris('CC33FF')" onClick="return swatchToText('CC33FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC6600" onMouseOver="coloris('CC6600')" onClick="return swatchToText('CC6600')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC6633" onMouseOver="coloris('CC6633')" onClick="return swatchToText('CC6633')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC6666" onMouseOver="coloris('CC6666')" onClick="return swatchToText('CC6666')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC6699" onMouseOver="coloris('CC6699')" onClick="return swatchToText('CC6699')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC66CC" onMouseOver="coloris('CC66CC')" onClick="return swatchToText('CC66CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC66FF" onMouseOver="coloris('CC66FF')" onClick="return swatchToText('CC66FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC9900" onMouseOver="coloris('CC9900')" onClick="return swatchToText('CC9900')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC9933" onMouseOver="coloris('CC9933')" onClick="return swatchToText('CC9933')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC9966" onMouseOver="coloris('CC9966')" onClick="return swatchToText('CC9966')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC9999" onMouseOver="coloris('CC9999')" onClick="return swatchToText('CC9999')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC99CC" onMouseOver="coloris('CC99CC')" onClick="return swatchToText('CC99CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC99FF" onMouseOver="coloris('CC99FF')" onClick="return swatchToText('CC99FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CCCC00" onMouseOver="coloris('CCCC00')" onClick="return swatchToText('CCCC00')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CCCC33" onMouseOver="coloris('CCCC33')" onClick="return swatchToText('CCCC33')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CCCC66" onMouseOver="coloris('CCCC66')" onClick="return swatchToText('CCCC66')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CCCC99" onMouseOver="coloris('CCCC99')" onClick="return swatchToText('CCCC99')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CCCCCC" onMouseOver="coloris('CCCCCC')" onClick="return swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CCCCFF" onMouseOver="coloris('CCCCFF')" onClick="return swatchToText('CCCCFF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CCFF00" onMouseOver="coloris('CCFF00')" onClick="return swatchToText('CCFF00')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CCFF33" onMouseOver="coloris('CCFF33')" onClick="return swatchToText('CCFF33')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CCFF66" onMouseOver="coloris('CCFF66')" onClick="return swatchToText('CCFF66')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CCFF99" onMouseOver="coloris('CCFF99')" onClick="return swatchToText('CCFF99')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CCFFCC" onMouseOver="coloris('CCFFCC')" onClick="return swatchToText('CCFFCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CCFFFF" onMouseOver="coloris('CCFFFF')" onClick="return swatchToText('CCFFFF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#9B9B9B" onMouseOver="coloris('9B9B9B')" onClick="return swatchToText('9B9B9B')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				
			  </tr>
			  <tr>
				<td width="5" height="5" bgcolor="#FF0000" onMouseOver="coloris('FF0000')" onClick="return swatchToText('FF0000')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF0033" onMouseOver="coloris('FF0033')" onClick="return swatchToText('FF0033')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF0066" onMouseOver="coloris('FF0066')" onClick="return swatchToText('FF0066')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF0099" onMouseOver="coloris('FF0099')" onClick="return swatchToText('FF0099')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF00CC" onMouseOver="coloris('FF00CC')" onClick="return swatchToText('FF00CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF00FF" onMouseOver="coloris('FF00FF')" onClick="return swatchToText('FF00FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF3300" onMouseOver="coloris('FF3300')" onClick="return swatchToText('FF3300')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF3333" onMouseOver="coloris('FF3333')" onClick="return swatchToText('FF3333')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF3366" onMouseOver="coloris('FF3366')" onClick="return swatchToText('FF3366')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF3399" onMouseOver="coloris('FF3399')" onClick="return swatchToText('FF3399')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF33CC" onMouseOver="coloris('FF33CC')" onClick="return swatchToText('FF33CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF33FF" onMouseOver="coloris('FF33FF')" onClick="return swatchToText('FF33FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF6600" onMouseOver="coloris('FF6600')" onClick="return swatchToText('FF6600')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF6633" onMouseOver="coloris('FF6633')" onClick="return swatchToText('FF6633')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF6666" onMouseOver="coloris('FF6666')" onClick="return swatchToText('FF6666')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF6699" onMouseOver="coloris('FF6699')" onClick="return swatchToText('FF6699')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF66CC" onMouseOver="coloris('FF66CC')" onClick="return swatchToText('FF66CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF66FF" onMouseOver="coloris('FF66FF')" onClick="return swatchToText('FF66FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF9900" onMouseOver="coloris('FF9900')" onClick="return swatchToText('FF9900')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF9933" onMouseOver="coloris('FF9933')" onClick="return swatchToText('FF9933')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF9966" onMouseOver="coloris('FF9966')" onClick="return swatchToText('FF9966')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF9999" onMouseOver="coloris('FF9999')" onClick="return swatchToText('FF9999')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF99CC" onMouseOver="coloris('FF99CC')" onClick="return swatchToText('FF99CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF99FF" onMouseOver="coloris('FF99FF')" onClick="return swatchToText('FF99FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FFCC00" onMouseOver="coloris('FFCC00')" onClick="return swatchToText('FFCC00')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FFCC33" onMouseOver="coloris('FFCC33')" onClick="return swatchToText('FFCC33')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FFCC66" onMouseOver="coloris('FFCC66')" onClick="return swatchToText('FFCC66')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FFCC99" onMouseOver="coloris('FFCC99')" onClick="return swatchToText('FFCC99')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FFCCCC" onMouseOver="coloris('FFCCCC')" onClick="return swatchToText('FFCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FFCCCC" onMouseOver="coloris('FFCCCC')" onClick="return swatchToText('FFCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FFFF00" onMouseOver="coloris('FFFF00')" onClick="return swatchToText('FFFF00')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FFFF33" onMouseOver="coloris('FFFF33')" onClick="return swatchToText('FFFF33')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FFFF66" onMouseOver="coloris('FFFF66')" onClick="return swatchToText('FFFF66')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FFFF99" onMouseOver="coloris('FFFF99')" onClick="return swatchToText('FFFF99')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FFFFCC" onMouseOver="coloris('FFFFCC')" onClick="return swatchToText('FFFFCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FFFFFF" onMouseOver="coloris('FFFFFF')" onClick="return swatchToText('FFFFFF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				
				<td width="5" height="5" bgcolor="#818181" onMouseOver="coloris('818181')" onClick="return swatchToText('818181')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
			  </tr>
			  <!--<tr>
				<td width="5" height="5" bgcolor="#CCCCCC" onMouseOver="coloris('CCCCCC')" onClick="return swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#EEEEEE" onMouseOver="coloris('EEEEEE')" onClick="return swatchToText('EEEEEE')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF0066" onMouseOver="coloris('FF0066')" onClick="return swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF0099" onMouseOver="coloris('FF0099')" onClick="return swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF00CC" onMouseOver="coloris('FF00CC')" onClick="return swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF00FF" onMouseOver="coloris('FF00FF')" onClick="return swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF3300" onMouseOver="coloris('FF3300')" onClick="return swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF3333" onMouseOver="coloris('FF3333')" onClick="return swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF3366" onMouseOver="coloris('FF3366')" onClick="return swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF3399" onMouseOver="coloris('FF3399')" onClick="return swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF33CC" onMouseOver="coloris('FF33CC')" onClick="return swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF33FF" onMouseOver="coloris('FF33FF')" onClick="return swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF6600" onMouseOver="coloris('FF6600')" onClick="return swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF6633" onMouseOver="coloris('FF6633')" onClick="return swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF6666" onMouseOver="coloris('FF6666')" onClick="return swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF6699" onMouseOver="coloris('FF6699')" onClick="return swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF66CC" onMouseOver="coloris('FF66CC')" onClick="return swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF66FF" onMouseOver="coloris('FF66FF')" onClick="return swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF9900" onMouseOver="coloris('FF9900')" onClick="return swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF9933" onMouseOver="coloris('FF9933')" onClick="return swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF9966" onMouseOver="coloris('FF9966')" onClick="return swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF9999" onMouseOver="coloris('FF9999')" onClick="return swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF99CC" onMouseOver="coloris('FF99CC')" onClick="return swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF99FF" onMouseOver="coloris('FF99FF')" onClick="return swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FFCC00" onMouseOver="coloris('FFCC00')" onClick="return swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FFCC33" onMouseOver="coloris('FFCC33')" onClick="return swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FFCC66" onMouseOver="coloris('FFCC66')" onClick="return swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FFCC99" onMouseOver="coloris('FFCC99')" onClick="return swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FFCCCC" onMouseOver="coloris('FFCCCC')" onClick="return swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FFCCCC" onMouseOver="coloris('FFCCCC')" onClick="return swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FFFFFF" onMouseOver="coloris('FFFFFF')" onClick="return swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FFFFFF" onMouseOver="coloris('FFFFFF')" onClick="return swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FFFFFF" onMouseOver="coloris('FFFFFF')" onClick="return swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FFFFFF" onMouseOver="coloris('FFFFFF')" onClick="return swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FFFFFF" onMouseOver="coloris('FFFFFF')" onClick="return swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FFFFFF" onMouseOver="coloris('FFFFFF')" onClick="return swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
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
				  <td bgcolor="#ffffff;" id="tdColor1">&nbsp;</td>
				</tr>
		   </table>
		</td></tr> 
		<tr><td>
			<table width="35" height="35" border=1 cellpadding=0 cellspacing=0>
				<tr>
				  <td <? if($strMnuBgColor != '') echo "bgcolor='".$strMnuBgColor."'"; else echo "bgcolor='#ffffff'";?> id="tdColor2">&nbsp;</td>
				</tr>
		   </table>
		</td></tr>   
	  </table> 
        </td>
      </TR>
	  <tr>
		<td align="left"><input type="hidden" name="fieldName" value="<? if(isset($_REQUEST['fieldName'])) print $_REQUEST['fieldName'];?>"></td>
	  </tr>
  </table>
