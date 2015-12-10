<?php
date_default_timezone_set('America/Mexico_City' ) ; 
$tiempo = localtime(time(), true); 
$dia = $tiempo["tm_mday"]; 
$mes = $tiempo["tm_mon"]+1; 
$year = $tiempo["tm_year"]+1900; 
$hora = $tiempo["tm_hour"];
$minutos = $tiempo["tm_min"];

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
  include("../../../../Scripts/conexion.php");
  $matricula=$_REQUEST['matricula'];
  $consulta_alumno=mysql_query("SELECT * FROM alumno,formulario,formulario_er WHERE alumno.matricula=formulario.matricula and formulario_er.matricula=alumno.matricula and alumno.matricula='$matricula'");
  $fila=mysql_fetch_array($consulta_alumno);
  $nombre=$fila['nombre'];
  $apepat=$fila['apepat'];
  $apemat=$fila['apemat'];
  $lic=$fila['carrera'];
  $tema=$fila['titulotrab'];
  $submodalidad=$fila['modalidad'];
   $dir=$fila['director'];
  $sinprop1=$fila['sinprop1'];
  $sinprop2=$fila['sinprop2'];
  $sinsup1=$fila['sinsup1'];
  $sinsup2=$fila['sinsup2'];
  $consula_director=mysql_query("SELECT * FROM profesor where no_personal='$dir'");
    $filadir=mysql_fetch_array($consula_director);
    $nomdir=$filadir['nombre'];
    $apepatdir=$filadir['apellido_paterno'];
    $apematdir=$filadir['apellido_materno'];
  $consula_sinprop1=mysql_query("SELECT * FROM profesor where no_personal='$sinprop1'");
    $filaprop1=mysql_fetch_array($consula_sinprop1);
    $nomprop1=$filaprop1['nombre'];
    $apepatprop1=$filaprop1['apellido_paterno'];
    $apematprop1=$filaprop1['apellido_materno'];
  $consula_sinprop2=mysql_query("SELECT * FROM profesor where no_personal='$sinprop2'");
    $filaprop2=mysql_fetch_array($consula_sinprop2);
    $nomprop2=$filaprop2['nombre'];
    $apepatprop2=$filaprop2['apellido_paterno'];
    $apematprop2=$filaprop2['apellido_materno'];
  $consula_sinsup1=mysql_query("SELECT * FROM profesor where no_personal='$sinsup1'");
    $filasup1=mysql_fetch_array($consula_sinsup1);
    $nomsup1=$filasup1['nombre'];
    $apepatsup1=$filasup1['apellido_paterno'];
    $apematsup1=$filasup1['apellido_materno'];
  $consula_sinsup2=mysql_query("SELECT * FROM profesor where no_personal='$sinsup2'");
    $filasup2=mysql_fetch_array($consula_sinsup2);
    $nomsup2=$filasup2['nombre'];
    $apepatsup2=$filasup2['apellido_paterno'];
    $apematsup2=$filasup2['apellido_materno'];


include("../../../../pdf/libreria_pdf/mpdf.php");
$mpdf=new mPDF(); 


$html='<!DOCTYPE  html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<style type="text/css"><!-- 
  p { font-family: sans-serif; font-weight: normal; font-size: 10pt; }
 h1 { font-family: sans-serif; font-weight: bold; font-size: 16pt; line-height:8px}
 h2 { font-family: serif; font-weight: bold; font-size: 12pt; line-height:8px }
 .s1 { font-family: sans-serif; font-weight: bold; font-size: 12pt; text-align:center; line-height:8px }
 .s2 { font-family: sans-serif; font-weight: bold; font-size: 8pt;  text-align:center; }
 .s3 { font-family: sans-serif; font-weight: bold; font-size: 12pt;  text-align:left; line-height:8px }
  -->
</style>

</head>
<body>
<span>
<IMG width="767" height="73"  src="docs/Image_001.png"/>
</span><br/>
<span>
<IMG width="767" height="4" src="docs/Image_002.png"/>
</span></p>
<h1 align="center">Formato ER-5 Presentación del Examen Profesional</h1>
<h1 align="center">Trabajo Recepcional</h1>
<p>
<table border="1" cellpadding="0" style="border-collapse:collapse" align="right">
	<tr>
    	<td width="70" bgcolor="#999999"><h2>FECHA</h2></td>
        <td width="133"> '.$dia.' '.$mes_nombre.' '.$year.' </td>
    </tr>
</table>
<br>
<br>
<br>
</p>
</table>
<div align="center">
  <table border="1" cellspacing="0" style="border-collapse:collapse">
    <tr>
    	<td width="279" bgcolor="#999999"><p class="s1">Matrícula</p></td>
    	<td colspan="3" bgcolor="#999999"><p class="s1">Alumno</p></td>
    </tr>
    <tr>
    	<td height="33">'.$matricula.'</td>
        <td colspan="3"/>'.$nombre.' '.$apepat.' '.$apemat.'</td>
    </tr>
    <tr>
    	<td bgcolor="#999999"><p class="s1">Licenciatura</p></td>
        <td width="278" colspan="3">'.$lic.'</td>
    </tr>
    <tr>
    	<td height="36" colspan="2" bgcolor="#999999"><p class="s1">Submodalidad</p></td>
        <td colspan="2">'.$submodalidad.'</td>
    </tr>
    <tr>
    	<td colspan="4" bgcolor="#999999"><p class="s1">Nombre del Trabajo Recepcional</p></td>
    </tr>
    <tr>
    	<td height="32" colspan="4">'.$tema.'</td>
    </tr>
    <tr>
    	<td height="32" bgcolor="#999999"><p class="s1">Presidente</p></td>
        <td colspan="3">'.$nomdir.' '.$apepatdir.' '.$apematdir.'</td>
    </tr>
    <tr>
    	<td height="38" bgcolor="#999999"><p class="s1">Secretario</p></td>
        <td colspan="3"/>'.$nomprop1.' '.$apepatprop1.' '.$apematprop1.'</td>
    </tr>
    <tr>
    	<td height="35" bgcolor="#999999"><p class="s1">Vocal</p></td>
        <td colspan="3"/>'.$nomprop2.' '.$apepatprop2.' '.$apematprop2.'</td>
    </tr>
    <tr>
    	<td rowspan="2" bgcolor="#999999"><p class="s1">Suplentes</p></td>
    	<td height="32" colspan="3"/>'.$nomsup1.' '.$apepatsup1.' '.$apematsup1.'</td>
    </tr>
    <tr>
    	
    	<td height="33" colspan="3"/>'.$nomsup2.' '.$apepatsup2.' '.$apematsup2.'</td>
    </tr>
    <tr>
    	<td colspan="2" bgcolor="#999999"><p class="s1">Fecha y hora de Examen Profesional</p></td>
    	<td colspan="2"/>
    </tr>
    <tr>
    	<td colspan="4" bgcolor="#999999"><p class="s1">Autorizaciones</p></td>
    </tr>
    <tr>
    	<td bgcolor="#999999"><p class="s1">Dirección</p></td>
    	<td bgcolor="#999999"><p class="s1">Experiencia<br />
    	  <br />
Recepcional</p></td>
    	<td width="219" bgcolor="#999999"><p class="s1">Archivo</p></td>
    	<td width="309" bgcolor="#999999"><p class="s1">Seguimiento de Egresados</p></td>
    </tr>
    <tr>
   		<td width="200" height="50"><p class="s2"> DRA. Patricia Arieta Melgarejo</p></td>
    	<td width="200" height="50"><p class="s2"> MGAP. Delia Vázquez Castillo</p></td>
    	<td width="200" height="50"><p class="s2"> Sra. Miriam Corona Vázquez</p></td>
    	<td width="200" height="50"><p class="s2"> M.T.E. Guillermo Leonel Sánchez Hernández</p></td>
    </tr>
    </table>
</div>
<p>
<span>
<IMG width="767" height="6" src="docs/Image_004.png"/>
</span><br/>
<span>
<IMG width="768" height="4" src="docs/Image_005.png"/>
</span>
</p>
</body>
</html>';

$mpdf->useActiveForms = true;
$mpdf->WriteHTML($html);


$mpdf->Output();
exit;


?>