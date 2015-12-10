<?
$matricula=$_GET['matricula'];
$apepat=$_GET['apepat'];
$apemat=$_GET['apemat'];
$nombre=$_GET['nombre'];
$carrera_nombre=$_GET['carrera'];
$director=$_GET['director'];
$sinodal1=$_GET['sinodal1'];
$sinodal2=$_GET['sinodal2'];
$valor=$apepat." ".$apemat." ".$nombre;
date_default_timezone_set('Mexico/General' ) ; 
$tiempo = getdate(time()); 
$dia = $tiempo['wday']; 
$dia_mes=$tiempo['mday']; 
$mes = $tiempo['mon']; 
$year = $tiempo['year']; 


switch($carrera_nombre){ 
case 'LS': case 'LSCA': $carrera_nombre="SISTEMAS COMPUTACIONALES ADMINISTRATIVOS"; break; 
case 'LC': $carrera_nombre="CONTADURIA"; break; 
case 'LA': $carrera_nombre="ADMINISTRACI&Oacute;N"; break; 
case 'LG': $carrera_nombre="GESTI&Oacute;N y DIRECCI&Oacute;N DE NEGOCIOS"; break; 
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


include("libreria_pdf/mpdf.php");
$mpdf=new mPDF(); 


$html='
<style type="text/css">
div{
	display:block;
}


#contenido{
	font-family:"Times New Roman",Georgia,Serif;
	font-size: 14px;
	position:relative;
	height:900px;
	width:600px;
	line-height: 30px;
}
#imagen{
	//background:#888;
	position:absolute;
	width:160px;
	height:150px;
	top:30px;
	left:610px;
	color:#000;
}
#encabezado {
	text-align: center;
	height: 140px;

}

.titulo {
	font-size: 16px;
}

#fijo{
	width: 100px;
	font-size:10px;
	float: left;
	text-align:right;
	margin-top:130px;
	line-height: normal;
}
#cuadro{
	margin-left:140px;
	widht:300px;	
}


</style>
<div id="imagen">
   <img src="../Imagenes/Logouv.png" ><br>
   <b>Facultad de Contaduría y Administración</b>
	</div>
<div id="contenido">
	<div align="center" id="encabezado"></div>
	<div id="fijo">Circuito Dr. Gonzalo<br>Aguirre Beltran S/N<br>Zona Universitaria<br>C.P. 91000<br>Xalapa de Enríquez<br>Veracruz, México<br><br><br>
		<b>Teléfonos</b><br>
		(228)842.17.42<br>(228)842.17.43<br>(228)842.17.44<br><br><br><b>Correo electrónico</b><br>parieta@uv.mx
	</div>
	<div id="cuadro">
			 <span class="titulo"><b> '.$director.'</b></span><br>
			 <span class="titulo"> CATEDRÁTICO (A) DE LA FACULTAD DE</span><br>
			 <span class="titulo"> CONTADURÍA Y ADMINISTRACIÓN</span><br>
			 <span class="titulo"> PRESENTE.</span><br><br>
		<p align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Con fundamento en el artículo 195, fracción II del Estatuto del Personal Académico de la Universidad Veracruzana, me permito comunicar a usted que ha sido designado Director del Trabajo Recepcional del (la) C. <b>'.$valor.'</b> con número de matrícula <b>'.$matricula.'</b> de la carrera de Licenciado en <b>'.$carrera_nombre.'</b>.</p>
		<p align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Al término de la asesoría, debe reportar su voto de aprobación a esta Dirección, en un formato que para tal efecto se le proporcionará.</p><br><br>
		<p align="center" style="line-height: normal;"><b>A  T  E  N  T  A  M  E  N  T  E <br>
		"LIS DE VERACRUZ; ARTE, CIENCIA, LUZ"<br>
		Xalapa, Veracruz a '.$dia_mes.' de '.$mes_nombre.' de '.$year.'.<br><br><br><br><br><br>
		DRA. PATRICIA ARIETA MELGAREJO<br>
		DIRECTORA DE LA FACULTAD DE CONTADURÍA<br>
		Y ADMINISTRACIÓN.</b></p>
	</div><br><br><br><br><br>
</div>
<div id="imagen">
   <img src="../Imagenes/Logouv.png" ><br>
   <b>Facultad de Contaduría y Administración</b>
	</div>
<div id="contenido">
	<div align="center" id="encabezado"></div>
	<div id="fijo">Circuito Dr. Gonzalo<br>Aguirre Beltran S/N<br>Zona Universitaria<br>C.P. 91000<br>Xalapa de Enríquez<br>Veracruz, México<br><br><br>
		<b>Teléfonos</b><br>
		(228)842.17.42<br>(228)842.17.43<br>(228)842.17.44<br><br><br><b>Correo electrónico</b><br>parieta@uv.mx
	</div>
	<div id="cuadro">
			 <span class="titulo"><b> '.$sinodal1.'</b></span><br>
			 <span class="titulo"> CATEDRÁTICO (A) DE LA FACULTAD DE</span><br>
			 <span class="titulo"> CONTADURÍA Y ADMINISTRACIÓN</span><br>
			 <span class="titulo"> PRESENTE.</span><br><br>
		<p align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Con fundamento en el artículo 195, fracción II del Estatuto del Personal Académico de la Universidad Veracruzana, me permito comunicar a usted que ha sido designado SINODAL PROPIETARIO del (la) C. <b>'.$valor.'</b> con número de matrícula <b>'.$matricula.'</b> de la Licenciatura en <b>'.$carrera_nombre.'</b>, en la elaboración de su Trabajo Recepcional, del cual el estudiante le entregará una copia junto con el presente.</p>
		<p align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Al término de la asesoría deberá reportar su voto de aprobación a esta Dirección, en un plazo máximo de 15 días naturales a partir de la fecha en que reciba usted el presente documento, mediante un formato que le proporcionará el estudiante.</p>
		<p align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Agradezco como siempre su colaboración, y le envío un cordial saludo.</p>
		<p align="center" style="line-height: normal;"><b>A  T  E  N  T  A  M  E  N  T  E <br>
		"LIS DE VERACRUZ; ARTE, CIENCIA, LUZ"<br>
		Xalapa, Veracruz a '.$dia_mes.' de '.$mes_nombre.' de '.$year.'.<br><br><br><br><br>
		DRA. Patricia Arieta Melgarejo<br>
		DIRECTORA DE LA FACULTAD DE CONTADURÍA<br>
		Y ADMINISTRACIÓN.</b></p><br><br><br><br>
	</div>
</div>
<div id="imagen">
   <img src="../Imagenes/Logouv.png" ><br>
   <b>Facultad de Contaduría y Administración</b>
	</div>
<div id="contenido">
	<div align="center" id="encabezado"></div>
	<div id="fijo">Circuito Dr. Gonzalo<br>Aguirre Beltran S/N<br>Zona Universitaria<br>C.P. 91000<br>Xalapa de Enríquez<br>Veracruz, México<br><br><br>
		<b>Teléfonos</b><br>
		(228)842.17.42<br>(228)842.17.43<br>(228)842.17.44<br><br><br><b>Correo electrónico</b><br>parieta@uv.mx
	</div>
	<div id="cuadro">
			 <span class="titulo"><b> '.$sinodal2.'</b></span><br>
			 <span class="titulo"> CATEDRÁTICO (A) DE LA FACULTAD DE</span><br>
			 <span class="titulo"> CONTADURÍA Y ADMINISTRACIÓN</span><br>
			 <span class="titulo"> PRESENTE.</span><br><br>
		<p align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Con fundamento en el artículo 195, fracción II del Estatuto del Personal Académico de la Universidad Veracruzana, me permito comunicar a usted que ha sido designado SINODAL PROPIETARIO del (la) C. <b>'.$valor.'</b> con número de matrícula <b>'.$matricula.'</b> de la Licenciatura en <b>'.$carrera_nombre.'</b>, en la elaboración de su Trabajo Recepcional, del cual el estudiante le entregará una copia junto con el presente.</p>
		<p align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Al término de la asesoría deberá reportar su voto de aprobación a esta Dirección, en un plazo máximo de 15 días naturales a partir de la fecha en que reciba usted el presente documento, mediante un formato que le proporcionará el estudiante.</p>
		<p align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Agradezco como siempre su colaboración, y le envío un cordial saludo.</p>
		<p align="center" style="line-height: normal;"><b>A  T  E  N  T  A  M  E  N  T  E <br>
		"LIS DE VERACRUZ; ARTE, CIENCIA, LUZ"<br>
		Xalapa, Veracruz a '.$dia_mes.' de '.$mes_nombre.' de '.$year.'.<br><br><br><br><br>
		DRA. PATRICIA ARIETA MELGAREJO<br>
		DIRECTORA DE LA FACULTAD DE CONTADURÍA<br>
		Y ADMINISTRACIÓN.</b></p><br><br>
	</div>
</div>
<div id="imagen">
   <img src="../Imagenes/Logouv.png" ><br>
   <b>Facultad de Contaduría y Administración</b>
	</div>
<div id="contenido">
	<div align="center" id="encabezado"></div>
	<div id="fijo">Circuito Dr. Gonzalo<br>Aguirre Beltran S/N<br>Zona Universitaria<br>C.P. 91000<br>Xalapa de Enríquez<br>Veracruz, México<br><br><br>
		<b>Teléfonos</b><br>
		(228)842.17.42<br>(228)842.17.43<br>(228)842.17.44<br><br><br><b>Correo electrónico</b><br>parieta@uv.mx
	</div>
	<div id="cuadro">
			 <span class="titulo"><b> '.$sinodal1.'</b></span><br>
			 <span class="titulo"> CATEDRÁTICO (A) DE LA FACULTAD DE</span><br>
			 <span class="titulo"> CONTADURÍA Y ADMINISTRACIÓN</span><br>
			 <span class="titulo"> PRESENTE.</span><br><br>
		<p align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Con fundamento en el artículo 195, fracción II del Estatuto del Personal Académico de la Universidad Veracruzana, me permito comunicar a usted que ha sido designado CoDirector del Trabajo Recepcional del (la) C. <b>'.$valor.'</b> con número de matrícula <b>'.$matricula.'</b> de la carrera de Licenciado en <b>'.$carrera_nombre.'</b>.</p>
		<p align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Al término de la asesoría, debe reportar su voto de aprobación a esta Dirección, en un formato que para tal efecto se le proporcionará.</p><br><br>
		<p align="center" style="line-height: normal;"><b>A  T  E  N  T  A  M  E  N  T  E <br>
		"LIS DE VERACRUZ; ARTE, CIENCIA, LUZ"<br>
		Xalapa, Veracruz a '.$dia_mes.' de '.$mes_nombre.' de '.$year.'.<br><br><br><br><br><br><br><br>
		DRA. PATRICIA ARIETA MELGAREJO<br>
		DIRECTORA DE LA FACULTAD DE CONTADURÍA<br>
		Y ADMINISTRACIÓN.</b></p>
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