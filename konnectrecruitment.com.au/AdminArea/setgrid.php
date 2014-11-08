<script language="JavaScript">

function HexToRGB(hexValue){
	var pattern=(new RegExp("^[0123456789abcdefABCDEF]{6}$"));
	if (pattern.test(hexValue)) {
		coloris(hexValue);
		//alert(document.forms[0].fieldName.value);
		opener.SetColor(document.forms[0].fieldName.value, hexValue.toUpperCase());
		self.close();

	} else {
		alert("Please enter a valid hex color code");
		return false;
	}
}
function coloris(newColor) {
  document.getElementById('tdColor').style.backgroundColor=newColor;
}
function swatchToText (hexValue) {
	coloris(hexValue);
	HexToRGB(hexValue)
	//alert();
}
</script>
<link href="websitebuilder.css" rel="stylesheet" type="text/css">


<form name="textFields">
	<table cellpadding="2" cellspacing="0" border="0" width="100%" bgcolor="#ffffff"  align="center">
      <TR>
        <TD colspan="2" class="hdng_sandy">Color Pallete </TD>
      </TR>
      <TR>
        <TD colspan="2" class="hdng_sandy">
		
		
			<table cellpadding="0" cellspacing="0" border="0" width="449" bgcolor="#ffffff"  align="center">
			  <tr>
				<td width="5" height="5" bgcolor="#000000" onMouseOver="coloris('000000')"><a href="javascript:swatchToText('000000')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#000033" onMouseOver="coloris('000033')"><a href="javascript:swatchToText('000033')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#000066" onMouseOver="coloris('000066')"><a href="javascript:swatchToText('000066')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#000099" onMouseOver="coloris('000099')"><a href="javascript:swatchToText('000099')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#0000CC" onMouseOver="coloris('0000CC')"><a href="javascript:swatchToText('0000CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#0000FF" onMouseOver="coloris('0000FF')"><a href="javascript:swatchToText('0000FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#003300" onMouseOver="coloris('003300')"><a href="javascript:swatchToText('003300')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#003333" onMouseOver="coloris('003333')"><a href="javascript:swatchToText('003333')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#003366" onMouseOver="coloris('003366')"><a href="javascript:swatchToText('003366')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#003399" onMouseOver="coloris('003399')"><a href="javascript:swatchToText('003399')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#0033CC" onMouseOver="coloris('0033CC')"><a href="javascript:swatchToText('0033CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#0033FF" onMouseOver="coloris('0033FF')"><a href="javascript:swatchToText('0033FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#006600" onMouseOver="coloris('006600')"><a href="javascript:swatchToText('006600')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#006633" onMouseOver="coloris('006633')"><a href="javascript:swatchToText('006633')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#006666" onMouseOver="coloris('006666')"><a href="javascript:swatchToText('006666')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#006699" onMouseOver="coloris('006699')"><a href="javascript:swatchToText('006699')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#0066CC" onMouseOver="coloris('0066CC')"><a href="javascript:swatchToText('0066CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#0066FF" onMouseOver="coloris('0066FF')"><a href="javascript:swatchToText('0066FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#009900" onMouseOver="coloris('009900')"><a href="javascript:swatchToText('009900')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#009933" onMouseOver="coloris('009933')"><a href="javascript:swatchToText('009933')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#009966" onMouseOver="coloris('009966')"><a href="javascript:swatchToText('009966')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#009999" onMouseOver="coloris('009999')"><a href="javascript:swatchToText('009999')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#0099CC" onMouseOver="coloris('0099CC')"><a href="javascript:swatchToText('0099CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#0099FF" onMouseOver="coloris('0099FF')"><a href="javascript:swatchToText('0099FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#00CC00" onMouseOver="coloris('00CC00')"><a href="javascript:swatchToText('00CC00')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#00CC33" onMouseOver="coloris('00CC33')"><a href="javascript:swatchToText('00CC33')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#00CC66" onMouseOver="coloris('00CC66')"><a href="javascript:swatchToText('00CC66')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#00CC99" onMouseOver="coloris('00CC99')"><a href="javascript:swatchToText('00CC99')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#00CCCC" onMouseOver="coloris('00CCCC')"><a href="javascript:swatchToText('00CCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#00CCFF" onMouseOver="coloris('00CCFF')"><a href="javascript:swatchToText('00CCFF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#00FF00" onMouseOver="coloris('00FF00')"><a href="javascript:swatchToText('00FF00')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#00FF33" onMouseOver="coloris('00FF33')"><a href="javascript:swatchToText('00FF33')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#00FF66" onMouseOver="coloris('00FF66')"><a href="javascript:swatchToText('00FF66')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#00FF99" onMouseOver="coloris('00FF99')"><a href="javascript:swatchToText('00FF99')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#00FFCC" onMouseOver="coloris('00FFCC')"><a href="javascript:swatchToText('00FFCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#00FFFF" onMouseOver="coloris('00FFFF')"><a href="javascript:swatchToText('00FFFF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#EEEEEE" onMouseOver="coloris('EEEEEE')"><a href="javascript:swatchToText('EEEEEE')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
			  </tr>
			  <tr>
				<td width="5" height="5" bgcolor="#330000" onMouseOver="coloris('330000')"><a href="javascript:swatchToText('330000')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#330033" onMouseOver="coloris('330033')"><a href="javascript:swatchToText('330033')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#330066" onMouseOver="coloris('330066')"><a href="javascript:swatchToText('330066')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#330099" onMouseOver="coloris('330099')"><a href="javascript:swatchToText('330099')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#3300CC" onMouseOver="coloris('3300CC')"><a href="javascript:swatchToText('3300CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#3300FF" onMouseOver="coloris('3300FF')"><a href="javascript:swatchToText('3300FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#333300" onMouseOver="coloris('333300')"><a href="javascript:swatchToText('333300')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#333333" onMouseOver="coloris('333333')"><a href="javascript:swatchToText('333333')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#333366" onMouseOver="coloris('333366')"><a href="javascript:swatchToText('333366')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#333399" onMouseOver="coloris('333399')"><a href="javascript:swatchToText('333399')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#3333CC" onMouseOver="coloris('3333CC')"><a href="javascript:swatchToText('3333CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#3333FF" onMouseOver="coloris('3333FF')"><a href="javascript:swatchToText('3333FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#336600" onMouseOver="coloris('336600')"><a href="javascript:swatchToText('336600')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#336633" onMouseOver="coloris('336633')"><a href="javascript:swatchToText('336633')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#336666" onMouseOver="coloris('336666')"><a href="javascript:swatchToText('336666')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#336699" onMouseOver="coloris('336699')"><a href="javascript:swatchToText('336699')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#3366CC" onMouseOver="coloris('3366CC')"><a href="javascript:swatchToText('3366CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#3366FF" onMouseOver="coloris('3366FF')"><a href="javascript:swatchToText('3366FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#339900" onMouseOver="coloris('339900')"><a href="javascript:swatchToText('339900')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#339933" onMouseOver="coloris('339933')"><a href="javascript:swatchToText('339933')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#339966" onMouseOver="coloris('339966')"><a href="javascript:swatchToText('339966')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#339999" onMouseOver="coloris('339999')"><a href="javascript:swatchToText('339999')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#3399CC" onMouseOver="coloris('3399CC')"><a href="javascript:swatchToText('3399CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#3399FF" onMouseOver="coloris('3399FF')"><a href="javascript:swatchToText('3399FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#33CC00" onMouseOver="coloris('33CC00')"><a href="javascript:swatchToText('33CC00')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#33CC33" onMouseOver="coloris('33CC33')"><a href="javascript:swatchToText('33CC33')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#33CC66" onMouseOver="coloris('33CC66')"><a  href="javascript:swatchToText('33CC66')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#33CC99" onMouseOver="coloris('33CC99')"><a  href="javascript:swatchToText('33CC99')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#33CCCC" onMouseOver="coloris('33CCCC')"><a  href="javascript:swatchToText('33CCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#33CCFF" onMouseOver="coloris('33CCFF')"><a  href="javascript:swatchToText('33CCFF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#33FF00" onMouseOver="coloris('33FF00')"><a  href="javascript:swatchToText('33FF00')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#33FF33" onMouseOver="coloris('33FF33')"><a  href="javascript:swatchToText('33FF33')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#33FF66" onMouseOver="coloris('33FF66')"><a  href="javascript:swatchToText('33FF66')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#33FF99" onMouseOver="coloris('33FF99')"><a  href="javascript:swatchToText('33FF99')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#33FFCC" onMouseOver="coloris('33FFCC')"><a  href="javascript:swatchToText('33FFCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#33FFFF" onMouseOver="coloris('33FFFF')"><a  href="javascript:swatchToText('33FFFF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CCCCCC" onMouseOver="coloris('CCCCCC')"><a  href="javascript:swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
			  </tr>
			  <tr>
				<td width="5" height="5" bgcolor="#660000" onMouseOver="coloris('660000')"><a  href="javascript:swatchToText('660000')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#660033" onMouseOver="coloris('660033')"><a  href="javascript:swatchToText('660033')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#660066" onMouseOver="coloris('660066')"><a  href="javascript:swatchToText('660066')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#660099" onMouseOver="coloris('660099')"><a  href="javascript:swatchToText('660099')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#6600CC" onMouseOver="coloris('6600CC')"><a  href="javascript:swatchToText('6600CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#6600FF" onMouseOver="coloris('6600FF')"><a  href="javascript:swatchToText('6600FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#663300" onMouseOver="coloris('663300')"><a  href="javascript:swatchToText('663300')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#663333" onMouseOver="coloris('663333')"><a  href="javascript:swatchToText('663333')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#663366" onMouseOver="coloris('663366')"><a  href="javascript:swatchToText('663366')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#663399" onMouseOver="coloris('663399')"><a  href="javascript:swatchToText('663399')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#6633CC" onMouseOver="coloris('6633CC')"><a  href="javascript:swatchToText('6633CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#6633FF" onMouseOver="coloris('6633FF')"><a  href="javascript:swatchToText('6633FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#666600" onMouseOver="coloris('666600')"><a  href="javascript:swatchToText('666600')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#666633" onMouseOver="coloris('666633')"><a  href="javascript:swatchToText('666633')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#666666" onMouseOver="coloris('666666')"><a  href="javascript:swatchToText('666666')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#666699" onMouseOver="coloris('666699')"><a  href="javascript:swatchToText('666699')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#6666CC" onMouseOver="coloris('6666CC')"><a  href="javascript:swatchToText('6666CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#6666FF" onMouseOver="coloris('6666FF')"><a  href="javascript:swatchToText('6666FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#669900" onMouseOver="coloris('669900')"><a  href="javascript:swatchToText('669900')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#669933" onMouseOver="coloris('669933')"><a  href="javascript:swatchToText('669933')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#669966" onMouseOver="coloris('669966')"><a  href="javascript:swatchToText('669966')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#669999" onMouseOver="coloris('669999')"><a  href="javascript:swatchToText('669999')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#6699CC" onMouseOver="coloris('6699CC')"><a  href="javascript:swatchToText('6699CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#6699FF" onMouseOver="coloris('6699FF')"><a  href="javascript:swatchToText('6699FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#66CC00" onMouseOver="coloris('66CC00')"><a  href="javascript:swatchToText('66CC00')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#66CC33" onMouseOver="coloris('66CC33')"><a  href="javascript:swatchToText('66CC33')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#66CC66" onMouseOver="coloris('66CC66')"><a  href="javascript:swatchToText('66CC66')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#66CC99" onMouseOver="coloris('66CC99')"><a  href="javascript:swatchToText('66CC99')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#66CCCC" onMouseOver="coloris('66CCCC')"><a  href="javascript:swatchToText('66CCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#66CCFF" onMouseOver="coloris('66CCFF')"><a  href="javascript:swatchToText('66CCFF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#66FF00" onMouseOver="coloris('66FF00')"><a  href="javascript:swatchToText('66FF00')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#66FF33" onMouseOver="coloris('66FF33')"><a  href="javascript:swatchToText('66FF33')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#66FF66" onMouseOver="coloris('66FF66')"><a  href="javascript:swatchToText('66FF66')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#66FF99" onMouseOver="coloris('66FF99')"><a  href="javascript:swatchToText('66FF99')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#66FFCC" onMouseOver="coloris('66FFCC')"><a  href="javascript:swatchToText('66FFCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#66FFFF" onMouseOver="coloris('66FFFF')"><a  href="javascript:swatchToText('66FFFF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#C8C8C8" onMouseOver="coloris('C8C8C8')"><a  href="javascript:swatchToText('C8C8C8')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
			  </tr>
			  <tr>
				<td width="5" height="5" bgcolor="#990000" onMouseOver="coloris('990000')"><a  href="javascript:swatchToText('990000')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#990033" onMouseOver="coloris('990033')"><a  href="javascript:swatchToText('990033')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#990066" onMouseOver="coloris('990066')"><a  href="javascript:swatchToText('990066')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#990099" onMouseOver="coloris('990099')"><a  href="javascript:swatchToText('990099')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#9900CC" onMouseOver="coloris('9900CC')"><a  href="javascript:swatchToText('9900CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#9900FF" onMouseOver="coloris('9900FF')"><a  href="javascript:swatchToText('9900FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#993300" onMouseOver="coloris('993300')"><a  href="javascript:swatchToText('993300')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#993333" onMouseOver="coloris('993333')"><a  href="javascript:swatchToText('993333')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#993366" onMouseOver="coloris('993366')"><a  href="javascript:swatchToText('993366')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#993399" onMouseOver="coloris('993399')"><a  href="javascript:swatchToText('993399')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#9933CC" onMouseOver="coloris('9933CC')"><a  href="javascript:swatchToText('9933CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#9933FF" onMouseOver="coloris('9933FF')"><a  href="javascript:swatchToText('9933FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#996600" onMouseOver="coloris('996600')"><a  href="javascript:swatchToText('996600')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#996633" onMouseOver="coloris('996633')"><a  href="javascript:swatchToText('996633')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#996666" onMouseOver="coloris('996666')"><a  href="javascript:swatchToText('996666')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#996699" onMouseOver="coloris('996699')"><a  href="javascript:swatchToText('996699')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#9966CC" onMouseOver="coloris('9966CC')"><a  href="javascript:swatchToText('9966CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#9966FF" onMouseOver="coloris('9966FF')"><a  href="javascript:swatchToText('9966FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#999900" onMouseOver="coloris('999900')"><a  href="javascript:swatchToText('999900')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#999933" onMouseOver="coloris('999933')"><a  href="javascript:swatchToText('999933')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#999966" onMouseOver="coloris('999966')"><a  href="javascript:swatchToText('999966')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#999999" onMouseOver="coloris('999999')"><a  href="javascript:swatchToText('999999')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#9999CC" onMouseOver="coloris('9999CC')"><a  href="javascript:swatchToText('9999CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#9999FF" onMouseOver="coloris('9999FF')"><a  href="javascript:swatchToText('9999FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#99CC00" onMouseOver="coloris('99CC00')"><a  href="javascript:swatchToText('99CC00')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#99CC33" onMouseOver="coloris('99CC33')"><a  href="javascript:swatchToText('99CC33')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#99CC66" onMouseOver="coloris('99CC66')"><a  href="javascript:swatchToText('99CC66')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#99CC99" onMouseOver="coloris('99CC99')"><a  href="javascript:swatchToText('99CC99')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#99CCCC" onMouseOver="coloris('99CCCC')"><a  href="javascript:swatchToText('99CCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#99CCFF" onMouseOver="coloris('99CCFF')"><a  href="javascript:swatchToText('99CCFF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#99FF00" onMouseOver="coloris('99FF00')"><a  href="javascript:swatchToText('99FF00')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#99FF33" onMouseOver="coloris('99FF33')"><a  href="javascript:swatchToText('99FF33')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#99FF66" onMouseOver="coloris('99FF66')"><a  href="javascript:swatchToText('99FF66')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#99FF99" onMouseOver="coloris('99FF99')"><a  href="javascript:swatchToText('99FF99')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#99FFCC" onMouseOver="coloris('99FFCC')"><a  href="javascript:swatchToText('99FFCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#99FFFF" onMouseOver="coloris('99FFFF')"><a  href="javascript:swatchToText('99FFFF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CDCDCD" onMouseOver="coloris('CDCDCD')"><a  href="javascript:swatchToText('CDCDCD')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
			  </tr>
			  <tr>
				<td width="5" height="5" bgcolor="#CC0000" onMouseOver="coloris('CC0000')"><a  href="javascript:swatchToText('CC0000')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC0033" onMouseOver="coloris('CC0033')"><a  href="javascript:swatchToText('CC0033')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC0066" onMouseOver="coloris('CC0066')"><a  href="javascript:swatchToText('CC0066')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC0099" onMouseOver="coloris('CC0099')"><a  href="javascript:swatchToText('CC0099')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC00CC" onMouseOver="coloris('CC00CC')"><a  href="javascript:swatchToText('CC00CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC00FF" onMouseOver="coloris('CC00FF')"><a  href="javascript:swatchToText('CC00FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC3300" onMouseOver="coloris('CC3300')"><a  href="javascript:swatchToText('CC3300')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC3333" onMouseOver="coloris('CC3333')"><a  href="javascript:swatchToText('CC3333')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC3366" onMouseOver="coloris('CC3366')"><a  href="javascript:swatchToText('CC3366')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC3399" onMouseOver="coloris('CC3399')"><a  href="javascript:swatchToText('CC3399')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC33CC" onMouseOver="coloris('CC33CC')"><a  href="javascript:swatchToText('CC33CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC33FF" onMouseOver="coloris('CC33FF')"><a  href="javascript:swatchToText('CC33FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC6600" onMouseOver="coloris('CC6600')"><a  href="javascript:swatchToText('CC6600')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC6633" onMouseOver="coloris('CC6633')"><a  href="javascript:swatchToText('CC6633')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC6666" onMouseOver="coloris('CC6666')"><a  href="javascript:swatchToText('CC6666')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC6699" onMouseOver="coloris('CC6699')"><a  href="javascript:swatchToText('CC6699')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC66CC" onMouseOver="coloris('CC66CC')"><a  href="javascript:swatchToText('CC66CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC66FF" onMouseOver="coloris('CC66FF')"><a  href="javascript:swatchToText('CC66FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC9900" onMouseOver="coloris('CC9900')"><a  href="javascript:swatchToText('CC9900')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC9933" onMouseOver="coloris('CC9933')"><a  href="javascript:swatchToText('CC9933')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC9966" onMouseOver="coloris('CC9966')"><a  href="javascript:swatchToText('CC9966')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC9999" onMouseOver="coloris('CC9999')"><a  href="javascript:swatchToText('CC9999')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC99CC" onMouseOver="coloris('CC99CC')"><a  href="javascript:swatchToText('CC99CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CC99FF" onMouseOver="coloris('CC99FF')"><a  href="javascript:swatchToText('CC99FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CCCC00" onMouseOver="coloris('CCCC00')"><a  href="javascript:swatchToText('CCCC00')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CCCC33" onMouseOver="coloris('CCCC33')"><a  href="javascript:swatchToText('CCCC33')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CCCC66" onMouseOver="coloris('CCCC66')"><a  href="javascript:swatchToText('CCCC66')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CCCC99" onMouseOver="coloris('CCCC99')"><a  href="javascript:swatchToText('CCCC99')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CCCCCC" onMouseOver="coloris('CCCCCC')"><a  href="javascript:swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CCCCFF" onMouseOver="coloris('CCCCFF')"><a  href="javascript:swatchToText('CCCCFF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CCFF00" onMouseOver="coloris('CCFF00')"><a  href="javascript:swatchToText('CCFF00')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CCFF33" onMouseOver="coloris('CCFF33')"><a  href="javascript:swatchToText('CCFF33')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CCFF66" onMouseOver="coloris('CCFF66')"><a  href="javascript:swatchToText('CCFF66')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CCFF99" onMouseOver="coloris('CCFF99')"><a  href="javascript:swatchToText('CCFF99')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CCFFCC" onMouseOver="coloris('CCFFCC')"><a  href="javascript:swatchToText('CCFFCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#CCFFFF" onMouseOver="coloris('CCFFFF')"><a  href="javascript:swatchToText('CCFFFF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#9B9B9B" onMouseOver="coloris('9B9B9B')"><a  href="javascript:swatchToText('9B9B9B')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				
			  </tr>
			  <tr>
				<td width="5" height="5" bgcolor="#FF0000" onMouseOver="coloris('FF0000')"><a  href="javascript:swatchToText('FF0000')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF0033" onMouseOver="coloris('FF0033')"><a  href="javascript:swatchToText('FF0033')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF0066" onMouseOver="coloris('FF0066')"><a  href="javascript:swatchToText('FF0066')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF0099" onMouseOver="coloris('FF0099')"><a  href="javascript:swatchToText('FF0099')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF00CC" onMouseOver="coloris('FF00CC')"><a  href="javascript:swatchToText('FF00CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF00FF" onMouseOver="coloris('FF00FF')"><a  href="javascript:swatchToText('FF00FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF3300" onMouseOver="coloris('FF3300')"><a  href="javascript:swatchToText('FF3300')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF3333" onMouseOver="coloris('FF3333')"><a  href="javascript:swatchToText('FF3333')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF3366" onMouseOver="coloris('FF3366')"><a  href="javascript:swatchToText('FF3366')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF3399" onMouseOver="coloris('FF3399')"><a  href="javascript:swatchToText('FF3399')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF33CC" onMouseOver="coloris('FF33CC')"><a  href="javascript:swatchToText('FF33CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF33FF" onMouseOver="coloris('FF33FF')"><a  href="javascript:swatchToText('FF33FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF6600" onMouseOver="coloris('FF6600')"><a  href="javascript:swatchToText('FF6600')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF6633" onMouseOver="coloris('FF6633')"><a  href="javascript:swatchToText('FF6633')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF6666" onMouseOver="coloris('FF6666')"><a  href="javascript:swatchToText('FF6666')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF6699" onMouseOver="coloris('FF6699')"><a  href="javascript:swatchToText('FF6699')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF66CC" onMouseOver="coloris('FF66CC')"><a  href="javascript:swatchToText('FF66CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF66FF" onMouseOver="coloris('FF66FF')"><a  href="javascript:swatchToText('FF66FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF9900" onMouseOver="coloris('FF9900')"><a  href="javascript:swatchToText('FF9900')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF9933" onMouseOver="coloris('FF9933')"><a  href="javascript:swatchToText('FF9933')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF9966" onMouseOver="coloris('FF9966')"><a  href="javascript:swatchToText('FF9966')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF9999" onMouseOver="coloris('FF9999')"><a  href="javascript:swatchToText('FF9999')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF99CC" onMouseOver="coloris('FF99CC')"><a  href="javascript:swatchToText('FF99CC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FF99FF" onMouseOver="coloris('FF99FF')"><a  href="javascript:swatchToText('FF99FF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FFCC00" onMouseOver="coloris('FFCC00')"><a  href="javascript:swatchToText('FFCC00')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FFCC33" onMouseOver="coloris('FFCC33')"><a  href="javascript:swatchToText('FFCC33')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FFCC66" onMouseOver="coloris('FFCC66')"><a  href="javascript:swatchToText('FFCC66')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FFCC99" onMouseOver="coloris('FFCC99')"><a  href="javascript:swatchToText('FFCC99')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FFCCCC" onMouseOver="coloris('FFCCCC')"><a  href="javascript:swatchToText('FFCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FFCCCC" onMouseOver="coloris('FFCCCC')"><a  href="javascript:swatchToText('FFCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FFFF00" onMouseOver="coloris('FFFF00')"><a  href="javascript:swatchToText('FFFF00')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FFFF33" onMouseOver="coloris('FFFF33')"><a  href="javascript:swatchToText('FFFF33')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FFFF66" onMouseOver="coloris('FFFF66')"><a  href="javascript:swatchToText('FFFF66')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FFFF99" onMouseOver="coloris('FFFF99')"><a  href="javascript:swatchToText('FFFF99')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FFFFCC" onMouseOver="coloris('FFFFCC')"><a  href="javascript:swatchToText('FFFFCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td width="5" height="5" bgcolor="#FFFFFF" onMouseOver="coloris('FFFFFF')"><a  href="javascript:swatchToText('FFFFFF')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				
				<td width="5" height="5" bgcolor="#818181" onMouseOver="coloris('818181')"><a  href="javascript:swatchToText('818181')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
			  </tr>
			  <!--<tr>
				<td width="5" height="5" bgcolor="#CCCCCC" onMouseOver="coloris('CCCCCC')"><a  href="javascript:swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#EEEEEE" onMouseOver="coloris('EEEEEE')"><a  href="javascript:swatchToText('EEEEEE')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF0066" onMouseOver="coloris('FF0066')"><a  href="javascript:swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF0099" onMouseOver="coloris('FF0099')"><a  href="javascript:swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF00CC" onMouseOver="coloris('FF00CC')"><a  href="javascript:swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF00FF" onMouseOver="coloris('FF00FF')"><a  href="javascript:swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF3300" onMouseOver="coloris('FF3300')"><a  href="javascript:swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF3333" onMouseOver="coloris('FF3333')"><a  href="javascript:swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF3366" onMouseOver="coloris('FF3366')"><a  href="javascript:swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF3399" onMouseOver="coloris('FF3399')"><a  href="javascript:swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF33CC" onMouseOver="coloris('FF33CC')"><a  href="javascript:swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF33FF" onMouseOver="coloris('FF33FF')"><a  href="javascript:swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF6600" onMouseOver="coloris('FF6600')"><a  href="javascript:swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF6633" onMouseOver="coloris('FF6633')"><a  href="javascript:swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF6666" onMouseOver="coloris('FF6666')"><a  href="javascript:swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF6699" onMouseOver="coloris('FF6699')"><a  href="javascript:swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF66CC" onMouseOver="coloris('FF66CC')"><a  href="javascript:swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF66FF" onMouseOver="coloris('FF66FF')"><a  href="javascript:swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF9900" onMouseOver="coloris('FF9900')"><a  href="javascript:swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF9933" onMouseOver="coloris('FF9933')"><a  href="javascript:swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF9966" onMouseOver="coloris('FF9966')"><a  href="javascript:swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF9999" onMouseOver="coloris('FF9999')"><a  href="javascript:swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF99CC" onMouseOver="coloris('FF99CC')"><a  href="javascript:swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FF99FF" onMouseOver="coloris('FF99FF')"><a  href="javascript:swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FFCC00" onMouseOver="coloris('FFCC00')"><a  href="javascript:swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FFCC33" onMouseOver="coloris('FFCC33')"><a  href="javascript:swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FFCC66" onMouseOver="coloris('FFCC66')"><a  href="javascript:swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FFCC99" onMouseOver="coloris('FFCC99')"><a  href="javascript:swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FFCCCC" onMouseOver="coloris('FFCCCC')"><a  href="javascript:swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FFCCCC" onMouseOver="coloris('FFCCCC')"><a  href="javascript:swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FFFFFF" onMouseOver="coloris('FFFFFF')"><a  href="javascript:swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FFFFFF" onMouseOver="coloris('FFFFFF')"><a  href="javascript:swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FFFFFF" onMouseOver="coloris('FFFFFF')"><a  href="javascript:swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FFFFFF" onMouseOver="coloris('FFFFFF')"><a  href="javascript:swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FFFFFF" onMouseOver="coloris('FFFFFF')"><a  href="javascript:swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td height="5" bgcolor="#FFFFFF" onMouseOver="coloris('FFFFFF')"><a  href="javascript:swatchToText('CCCCCC')"><img  src="Images/b.gif" width="10" height="10" border="0"></a></td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			  </tr>-->
			</table>
		
		</TD>
        <td width="5"><table width="35" height="35" border=1 cellpadding=0 cellspacing=0>
            <tr>
              <td id="tdColor" bgcolor="#ffffff">&nbsp;</td>
            </tr>
          </table>
        </td>
      </TR>
	  <tr>
		<td align="left"><input type="hidden" name="fieldName" value="<? if(isset($_REQUEST['fieldName'])) print $_REQUEST['fieldName'];?>">&nbsp;</td>
	  </tr>
  </table>
</form>