<html>
<head>
<meta charset="utf-8" lang="esp" http-equiv="Content-Type" content="text/html;">
<script language="Javascript"> 
if (window.print) window.print() 
else alert("Para imprimir presione Crtl+P."); 
</script>


<SCRIPT LANGUAGE="JavaScript">
if (window.print)
window.print()
else
alert("Disculpe, su navegador no soporta esta opción.");
</SCRIPT>
<style type="text/css">
body {
	margin-left: 50px;
	margin-right: 50px;
	width: 90%;
	height:650px;
	font-size:16px;
	padding-top: 0px;
}
table {
	font-size: 12px;
	text-align: center;
}
#imagen {
 //background:#888;
	position:absolute;
	width:50px;
	height:50px;
	top:30px;
	left:590px;
	color:#fff;
}
#imagen2 {
 //background:#888;
	position:absolute;
	width:50px;
	height:50px;
	top:20px;
	left:50px;
	color:#fff;
}
#contenido {
	position:relative;
	height:90%;
	width:100%;
	text-align: justify;
}
</style>
</head>
<body>
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
  $matricula=$_POST['matricula'];
  $consulta_alumno=mysql_query("SELECT * FROM alumno,formulario WHERE alumno.matricula=formulario.matricula and alumno.matricula='$matricula'");
  $consulta_er=mysql_query("SELECT * FROM formulario_er where matricula='$matricula'");
  $fila=mysql_fetch_array($consulta_alumno);
  $fila2=mysql_fetch_array($consulta_er);
  $nombre=$fila['nombre'];
  $apepat=$fila['apepat'];
  $apemat=$fila['apemat'];
  $lic=$fila['carrera'];
  $calle=$fila['calle'];
  $no_externo=$fila['no_externo'];
  $no_interno=$fila['no_interno'];
  $colonia=$fila['colonia'];
  $ciudad=$fila['ciudad'];
  $codpos=$fila['codigo_postal'];
  $estado=$fila['estado'];
  $celular=$fila['celular'];
  $matriculainterna=$fila['matricula_interna'];
  $tippinscripcion=$fila2['inscripcion'];
  $periodo=$fila['periodo_tit'];
  $correo=$fila['correo'];

  $consulta_periodo=mysql_query("SELECT * FROM periodo WHERE id_periodo=$periodo");
  $fil=mysql_fetch_array($consulta_periodo);
  $periodo_tit=$fil['periodo'];

  ?>
<div id="imagen"> <img src="../../../../pdf/logocat.png" width="110px" height="80px"/> </div>
<div id="imagen2"> <img src="../../../../pdf/uv.jpg"  width="100px" height="100px"/> </div>
<div id="contenido"> <br>
  <p align="center"><b>UNIVERSIDAD VERACRUZANA</br>
    FACULTAD DE CONTADURÍA Y ADMINISTRACIÓN</br>
    CENTRO DE APOYO A LA TITULACIÓN</b></p>
  </br>
  <h2>Ficha Informativa</h2>
  <b>NOMBRE:</b> <?php echo $nombre.' '.$apepat.' '.$apemat; ?><br><br><br>
  <b>CARRERA:</b> <?php echo $lic ?><br><br><br>
  <b>DOMICILIO:</b> <?php echo $calle.' '.$no_externo.' '.$colonia.' '.$codpos.' '.$ciudad.','.$estado; ?><br><br><br>
  <b>TELEFONO:</b> <?php echo $celular; ?><br><br><br>
  <b>MATRICULA INTERNA:</b> <?php echo $matriculainterna; ?><br><br><br>
  <b>MATRICULA U.V.</b> <?php echo $matricula; ?><br><br><br>
  <b>TIPO DE INSCRIPCIÓN A E.R: </b> <?php echo $tippinscripcion; ?><br><br><br>
  <b>PERIODO DE INSCRIPCIÓN A E.R: </b><?php echo $periodo_tit; ?> <br><br><br>
  <b>CORREO ELECTRONICO: </b> <?php echo $correo; ?><br><br><br>
  <b>FIRMA:
</div>
</body>
</html>
