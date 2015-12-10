<?php
header("Content-Type: text/html;charset=utf-8");
$apepat=$_GET['apepat'];
$apemat= $_GET['apemat'];
$nombre=$_GET['nombre'];

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
	width:100px;
	height:100px;
	top:50px;
	left:90px;
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
	background:#cacaca; 
	widht:300px;	
}



#tabla{
	margin-right:auto;
	margin-left:auto;	
}



</style>
<div id="imagen">
   <img src="logocat.png" >

	<p>jkkjbkjkj</p>
	</div>
<div id="contenido">
	
<div align="center" id="encabezado"> 
<span class="titulo"> UNIVERSIDAD VERACRUZANA</span><br>
         FACULTAD DE CONTADURÍA Y ADMINISTRACIÓN<br>
		 CENTRO DE APOYO A LA TITULACIÓN (CAT)<p>
	
		 <p>
		 <br>
		 RELACIÓN DE MAESTROS QUE RECIBEN SU PAGO COMO<br>
		 JURADO DE EXAMEN PROFESIONAL<br>
</div>
		 <br>
		 <br>
		 
		 
	<div id="cuadro">	 
		SUSTENTANTE:<b> '.$valor.'</b> 
<br /><br> 
		FECHA:<b> '.$dia_nombre." ".$dia_mes." de ".$mes_nombre." de ".$year.' <br/>
	</div>
	
		
		<p><p><p>
		HORA: '."&nbsp;".$hora.' </br>
		
<div id="tabla" align="center">	
<center>	
<table width="100" border="1" cellspacing="0" cellpadding="5">
  <tr style="background:#cacaca;">
    <td>Maestro</td>
    <td>Estatus</td>
    <td>Monto</td>
	<td>Firma</td>
  </tr>
  <tr>
    <td></td>
    <td>&nbsp;</td>
    <td>asesor</td>
    <td>&nbsp;</td>

  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>asesor</td>
    <td>&nbsp;</td>
  </tr>
</table>
</center>
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