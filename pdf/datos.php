<?
$matricula=$_GET['matricula'];
$apepat=$_GET['apepat'];
$apemat=$_GET['apemat'];
$nombre=$_GET['nombre'];
$carrera_nombre=$_GET['carrera'];
$celular=$_GET['celular'];
$matricula_interna=$_GET['matricula_interna'];
$correo=$_GET['correo'];
$calle=$_GET['calle'];
$no_externo=$_GET['no_externo'];
$colonia=$_GET['colonia'];
$ciudad=$_GET['ciudad'];
$codigo=$_GET['codigo_postal'];
$tel=$_GET['tel_emergencia'];
$curso=$_GET['grupo'];
$director=$_GET['director'];
$valor=$apepat." ".$apemat." ".$nombre;
date_default_timezone_set('Mexico/General' ) ; 
$tiempo = getdate(time()); 
$dia = $tiempo['wday']; 
$dia_mes=$tiempo['mday']; 
$mes = $tiempo['mon']; 
$year = $tiempo['year']; 
$hora= $tiempo['hours']; 
$minutos = $tiempo['minutes']; 
$segundos = $tiempo['seconds'];

switch($carrera_nombre){ 
case 'LS ': $sistemas="X"; break; 
case 'LC ': $conta="X"; break; 
case 'LA ': $admon="X"; break; 
case 'LG ': $gestion="X"; break; 
}

switch($carrera_nombre){ 
case 'LS ': $carrera_nombre="SISTEMAS COMPUTACIONALES ADMINISTRATIVOS"; break; 
case 'LC ': $carrera_nombre="CONTADURIA"; break; 
case 'LA ': $carrera_nombre="ADMINISTRACI&Oacute;N"; break; 
case 'LG ': $carrera_nombre="GESTI&Oacute;N y DIRECCI&Oacute;N DE NEGOCIOS"; break; 
} 

switch ($dia){ 
case "1": $dia_nombre="Lunes"; break; 
case "2": $dia_nombre="Martes"; break; 
case "3": $dia_nombre="Mi&eacute;rcoles"; break; 
case "4": $dia_nombre="Jueves"; break; 
case "5": $dia_nombre="Viernes"; break; 
case "6": $dia_nombre="S&aacute;bado"; break; 
case "0": $dia_nombre="Domingo"; break; 
} 

switch($mes){ 
case "1": $mes_nombre="Enero"; break; 
case "2": $mes_nombre="Febrero"; break; 
case "3": $mes_nombre="Marzo"; break; 
case "4": $mes_nombre="Abril"; break; 
case "5": $mes_nombre="Mayo"; break; 
case "6": $mes_nombre="Junio"; break; 
case "7": $mes_nombre="Julio"; break; 
case "8": $mes_nombre="Agosto"; break; 
case "9": $mes_nombre="Septiembre"; break; 
case "10": $mes_nombre="Octubre"; break; 
case "11": $mes_nombre="Noviembre"; break; 
case "12": $mes_nombre="Diciembre"; break; 
} 



date_default_timezone_set("Mexico/General" ) ; 
$hora = date('h:i a',time() - 3600*date('I')); 
//print "&nbsp;$hora&nbsp;"; 


include("libreria_pdf/mpdf.php");
$mpdf=new mPDF(); 


$html='
<style type="text/css">
div{
	display:block;
}

#contenido{
	

	position:relative;
	height:900px;
	width:800px;
	
}
#imagen{
	//background:#888;
	position:absolute;
	width:150px;
	height:150px;
	top:60px;
	left:610px;
	color:#fff;
	
	
}
#imagen2{
	//background:#888;
	position:absolute;
	width:150px;
	height:150px;
	top:50px;
	left:50px;
	color:#fff;
	
	
}
#imagen3{
	//background:#888;
	position:absolute;
	width:150px;
	height:150px;
	top:50px;
	left:50px;
	color:#fff;
	
	
}

#encabezado {
	text-align: center;

}

.titulo {
	font-size: 18px;
	font-weight: bold;
}


#cuadro{
	background:#ffffffff; 
	widht:300px;	
}

#footer{
	text-alingn: left;
	font-size: 10px;
	top: 800px;
}



</style>
<div id="imagen">
   <img src="logocat.png" >
	</div>
	<div id="imagen2">
   <img src="uv.jpg" >
	</div>
<div id="contenido">
	
<div align="center" id="encabezado"> 
<span class="titulo"> UNIVERSIDAD VERACRUZANA</span><br><br>
         <b>FACULTAD DE CONTADURÍA Y ADMINISTRACIÓN<br><br>
		 CENTRO DE APOYO A LA TITULACIÓN </b><p>
	
		 <p>
		 <br>
</div>

		 
	<div id="cuadro">	 
	<table border="0" cellspacing="20">
		<tr><td colspan="2"><b>FICHA INFORMATIVA</b></td></tr>
		<tr><td colspan="2">I.     DATOS GENERALES.	</td></tr>
		<tr><td><b>NOMBRE:</b></td><td align="center">'.$nombre.'</td><td align="center">'.$apepat.'</td><td align="center">'.$apemat.'</td></tr>
		<tr><td></td><td align="center">Nombre(s)</td><td align="center">Apellido Paterno</td><td align="center">Apellido Materno</td></tr>
		<tr><td><b>CARRERA:</b></td><td colspan="3">'.$carrera_nombre.'</td></tr>
		<tr><td><b>DOMICILIO:</b></td><td colspan="2" align="center">'.$calle.'&nbsp;#'.$no_externo.'</td><td colspan="2" align="center">'.$colonia.'</td></tr>
		<tr><td></td><td colspan="2" align="center">Calle No.</td><td colspan="2" align="center">Colonia</td></tr>
		<tr><td colspan="2" align="center">'.$ciudad.'</td><td colspan="2" align="center">'.$codigo.'</td></tr>
		<tr><td colspan="2" align="center">Ciudad</td><td colspan="2" align="center">Codigo Postal</td></tr>
		<tr><td colspan="2"><b>TELEFONO PARTICULAR:</b></td><td colspan="2">'.$tel.'</td></tr>
		<tr><td colspan="2"><b>TELEFONO DEL TRABAJO:</b></td><td colspan="2">'.$celular.'</td></tr>
		<tr><td colspan="2"><b>MATRICULA INTERNA:</b></td><td colspan="2">'.$matricula_interna.'</td></tr>
		<tr><td colspan="2"><b>MATRICULA U.V:</b></td><td colspan="2">'.$matricula.'</td></tr>
		<tr><td colspan="2"><b>CORREO ELECTRONICO:</b></td><td colspan="2">'.$correo.'</td></tr>
		<tr><td colspan="2"><b>FIRMA:</b></td><td colspan="2" style="border-bottom:1px solid #000000"></td></tr>
		<tr><td></td></tr>
		<tr><td></td></tr>
		<tr><td></td></tr>
		<tr><td></td></tr>
		<tr><td></td></tr>
		<tr><td></td></tr>
	</table>
	
	</div>
		<div id="footer">	 
		<p>
		<hr>
		FECHA: '.$dia_nombre." ".$dia_mes." de ".$mes_nombre." de ".$year.' <br>
		HORA: '."&nbsp;".$hora.'</p><br><br>
		</div>

</div>

<div id="imagen">
   <img src="logocat.png" >
	</div>
	<div id="imagen2">
   <img src="uv.jpg" >
	</div>
<div id="contenido">
	
<div align="center" id="encabezado"> 
<span class="titulo"> UNIVERSIDAD VERACRUZANA</span><br><br>
         <b>FACULTAD DE CONTADURÍA Y ADMINISTRACIÓN<br><br>
		 CENTRO DE APOYO A LA TITULACIÓN </b><p>
		  <b>CARTA COMPROMISO</b>
</div>
 
	<div id="cuadro">	 
		<b>NOMBRE:</b> '.$valor.'<br> 
		<b>MATRICULA:</b> '.$matricula.'<br>
		<b>CURSO:</b>'.$curso.'<br>
		<b>CARRERA:</b>'.$carrera_nombre.'<br><br><br>
		<div align="center" id="encabezado">Con relaci&oacute;n a los lineamientos que rigen en el Centro de Apoyo a la Titulaci&oacute;n (C.A.T.)<br><br></div>
		<b>ACEPTO CUMPLIR SATISFACTORIAMENTE CON LO SIGUIENTE:</b><br><br>
		<div id="cuadro2">
		<dd>I)&nbsp;&nbsp;&nbsp;Concluir el trabajo recepcional en un plazo no mayor de <U> 365 </U> d&iacute;as naturales, contados a partir de la fecha en que se haya concluido el curso del C.A.T. si despu&eacute;s de ese fecha no lo terminaran y desean titularse por este medio deben inscribirse nuevamente (el asesor y el tema pueden permanecer).<br><br>
		II)&nbsp;&nbsp;&nbsp;Entregar como m&iacute;nimo 6 reporter relacionados con el desarrollo del trabajo en un per&iacute;odo de <U> 260 </U> d&iacute;as naturales.<br><br>
		III)&nbsp;&nbsp;&nbsp;Informar oportunamente (durante el per&iacute;odo de <U> 45 </U> d&iacute;as), a la coordinaci&oacute;n del C.A.T., todos aquellos eventos o acciones que son obst&aacute;culos, para el desarrollo de mi trabajo recepcional.<br><br>
		IV)&nbsp;&nbsp;&nbsp;Pagar la totalidad del curso en un plazo no mayor a 45 d&iacute;as naturales contados a partir de la fecha de inicio del curso al que se inscribieron. En caso de rebasar dicha fecha el inscrito que quiera titularse por el C.A.T. deber&aacute; pagar nuevamente el curso.<br><br></dd>
		</div>
		<I>Al no cumplir con los lineamiento anteriores deslindo de toda responsabilidad al C.A.T., en relaci&oacute;n a la asesor&iacute;a para el desarrollo de mi trabajo recepcional.</I><br><br>
		NOTA: Esta carta deber&aacute; ser entregada al coordinador del C.A.T. el mismo d&iacute;a en el que fue recibida.<br><br><br>
		<div align="center" id="encabezado">Xalapa, Ver. A '.$dia_mes." de ".$mes_nombre." de ".$year.' <br><br><br><br>
		<U>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</U>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<U>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</U><br>NOMBRE Y FIRMA DEL INTERESADO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;COORDINADOR DEL CAT<br><br></div>
	</div>
		<div id="footer">	 
		<hr>
		FECHA: '.$dia_nombre." ".$dia_mes." de ".$mes_nombre." de ".$year.' <br>
		HORA: '."&nbsp;".$hora.'<br><br>
		</div>

</div>

<div id="imagen">
   <img src="logocat.png" >
	</div>
	<div id="imagen2">
   <img src="uv.jpg" >
	</div>
<div id="contenido">
	
<div align="center" id="encabezado"> 
<span class="titulo"> UNIVERSIDAD VERACRUZANA</span><br><br>
         <b>FACULTAD DE CONTADURÍA Y ADMINISTRACIÓN<br><br>
		 CENTRO DE APOYO A LA TITULACIÓN (CAT)</b><p>
		  <b>SOLICITUD DE ASESOR</b>
		 <p>
</div>

		 
	<div id="cuadro">
	<table>
		<tr>
			<td><b>Nombre: </b></td><td>'.$valor.'</td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td><b>Matricula:</b></td><td>'.$matricula.'</td>
		</tr>
		<tr>
			<td></td><td></td>
			<td></td>
			<td><b>Curso:</b></td><td>'.$curso.'</td>
		</tr>
	</table>	 
		
		Programa Acad&eacute;mico:<br>
		(&nbsp;&nbsp;'.$conta.'&nbsp;&nbsp;) Contaduria<br>
		(&nbsp;&nbsp;'.$admon.'&nbsp;&nbsp;) Administraci&oacute;n de Empresas<br>
		(&nbsp;&nbsp;'.$sistemas.'&nbsp;&nbsp;) Sistemas Computacionales Administrativos<br>
		(&nbsp;&nbsp;'.$gestion.'&nbsp;&nbsp;) Gesti&oacute;n y Direcci&oacute;n de Negocios<br><br>
		&Aacute;rea de Inter&eacute;s: <br><br>
		Asesor: '.$director.'<br><br>
		Fecha:<U>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$dia_nombre." ".$dia_mes." de ".$mes_nombre." de ".$year.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</U>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Firma:<U>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</U><br>
		
		
	</div>
	
		<div id="footer">	 
		<p><p><p>
		<hr>
		FECHA: '.$dia_nombre." ".$dia_mes." de ".$mes_nombre." de ".$year.' <br>
		HORA: '."&nbsp;".$hora.'
		</div>

</div>


		';

/*
if ($_REQUEST['html']) { echo $html; exit; }
if ($_REQUEST['source']) { 
	$file = __FILE__;
	header("Content-Type: text/plain");
	header("Content-Length: ". filesize($file));
	header("Content-Disposition: attachment; filename='".$file."'");
	readfile($file);
	exit; 
}
*/
//==============================================================
$mpdf->useActiveForms = true;
$mpdf->WriteHTML($html);

//==============================================================
// JAVASCRIPT FOR WHOLE DOCUMENT
/*
$mpdf->SetJS('
var dialogTitle = "Enter details";
var defaultAnswer = "";
var reply = app.response("Este es un mensaje de CAT. introduzca el valor del sutentante", dialogTitle, defaultAnswer);
if (reply != null) { 
this.getField("inputfield").value = reply;
}
');
*/
//$imag=$mpdf->Image('logocat.png',10,12,30,0,'');
//$pdf->Image('logo.png',10,12,30,0,'','http://www.fpdf.org');


$mpdf->Output();
exit;


?>