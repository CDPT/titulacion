<?php
header('Content-Type: text/html; charset=utf-8'); 
$apepat=$_GET['apepat'];
$apemat=$_GET['apemat'];
$nombre=$_GET['nombre'];
$resultado=$_GET['resultado'];
$importe=$_GET['importe'];
$tipo_pago=$_GET['tipo_pago'];
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
$tipo1="";
$tipo2="";
if($tipo_pago=="Total "){
	$tipo1=" X ";
	$tipo2="&nbsp;";
}else{
if($tipo_pago=="Abono "){
	$tipo1="&nbsp;";
	$tipo2=" X ";
}}
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
//echo $dia_nombre." ".$dia_mes." de ".$mes_nombre." de ".$year; 

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
	top:70px;
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
	top:590px;
	left:610px;
	color:#fff;
	
	
}
#imagen4{
	//background:#888;
	position:absolute;
	width:150px;
	height:150px;
	top:570px;
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
#cuadro2{
	background:#ffffffff; 
	widht:200px;	
}


</style>
<div id="imagen">
   <img src="logocat.png" >
	</div>
	<div id="imagen2">
   <img src="uv.jpg" >
	</div>
	<div id="imagen3">
   <img src="logocat.png" >
	</div>
	<div id="imagen4">
   <img src="uv.jpg" >
</div>
<div id="contenido">
	
<div align="center" id="encabezado"> 
<span class="titulo"> UNIVERSIDAD VERACRUZANA</span><br>
         <b>FACULTAD DE CONTADURÍA Y ADMINISTRACIÓN<br>
		 CENTRO DE APOYO A LA TITULACIÓN </b><br>
		  <b>RECIBO OFICIAL</b>
</div>

		 
	<div id="cuadro">	
	<p align="right"> <b>BUENO POR:</b> $'.number_format($importe).'.00</p>
		<p align="center"><b>RECIB&Iacute; DE:</b> '.$valor.'<br> <br>
		<b>LA CANTIDAD DE:</b> '.$resultado.' PESOS 00/100 M.N.<br></p>

		Por concepto de adelanto de DONATIVO único para SINODALES participantes en el Centro de Apoyo a la Titulacion (CAT)<br><br>
		<b>FECHA DE CURSO:</b> '.$fecha_curso.'<br>

		<p align="center">Xalapa, Ver. A '.$dia_mes." de ".$mes_nombre." de ".$year.' <br><br><br><br><br>
		<b>RECIB&Iacute;</b><br>COORDINADOR DEL CENTRO DE APOYO A LA TITULACION</p>
		Los pagos, por derecho del CAT, tiene una vigencia de un año a partir de la fecha del recibo.<br><br><br>
		
		<div align="center" id="encabezado"> 
<span class="titulo"> UNIVERSIDAD VERACRUZANA</span><br>
         <b>FACULTAD DE CONTADURÍA Y ADMINISTRACIÓN<br>
		 CENTRO DE APOYO A LA TITULACIÓN </b><br>
		  <b>RECIBO OFICIAL</b>
</div>

		 
	<div id="cuadro">	
	<p align="right"> <b>BUENO POR:</b> $'.$importe.'.00</p>
		<p align="center"><b>RECIB&Iacute; DE:</b> '.$valor.'<br> <br>
		<b>LA CANTIDAD DE:</b> '.$resultado.' PESOS 00/100 M.N.<br></p>

		Por concepto de adelanto de DONATIVO único para SINODALES participantes en el Centro de Apoyo a la Titulacion (CAT)<br><br>
		<b>FECHA DE CURSO:</b> '.$fecha_curso.'<br>

		<p align="center">Xalapa, Ver. A '.$dia_mes." de ".$mes_nombre." de ".$year.' <br><br><br><br>
		<b>RECIB&Iacute;</b><br>COORDINADOR DEL CENTRO DE APOYO A LA TITULACION</p>
		Los pagos, por derecho del CAT, tiene una vigencia de un año a partir de la fecha del recibo.
		
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