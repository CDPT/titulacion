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
	height: 650px;
	font-size: 16px;
	padding-top: 0px;
}
table {
	font-size: 12px;
	text-align: center;
}
#imagen {
 //background:#888;
	position: absolute;
	width: 50px;
	height: 50px;
	top: 30px;
	left: 590px;
	color: #fff;
}
#imagen2 {
 //background:#888;
	position: absolute;
	width: 50px;
	height: 50px;
	top: 20px;
	left: 50px;
	color: #fff;
}
#contenido {
	position: relative;
	height: 90%;
	width: 100%;
	text-align: justify;
}
#margen {
	margin-left: 25px;
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
  $consulta_alumno=mysql_query("SELECT * FROM alumno,formulario,formulario_cat WHERE alumno.matricula=formulario.matricula and formulario_cat.matricula=alumno.matricula and alumno.matricula='$matricula'");
  $fila=mysql_fetch_array($consulta_alumno);
  $nombre=$fila['nombre'];
  $apepat=$fila['apepat'];
  $apemat=$fila['apemat'];
  $lic=$fila['carrera'];
  $tema=$fila['titulotrab'];
  $modalidad=$fila['modalidad'];

  ?>
<div id="imagen"> <img src="../../../../pdf/logocat.png" width="110px" height="80px"/> </div>
<div id="imagen2"> <img src="../../../../pdf/uv.jpg"  width="100px" height="100px"/> </div>
<div id="contenido"> <br>
  <p align="center">UNIVERSIDAD VERACRUZANA</br>
    FACULTAD DE CONTADURÍA Y ADMINISTRACIÓN</br>
    CENTRO DE APOYO A LA TITULACIÓN</br>
    <b>CARTA COMPROMISO</b></br>
  </p>
  </br>
  <p style="font-size:20px"><b>Nombre:</b> <?php echo $nombre.' '.$apepat.' '.$apemat; ?><br>
    <b>Matricula:</b> <?php echo $matricula;?><br>
    <b>Licenciatura:</b> <?php echo $lic; ?><br>
    <br>
  </p>
  <p align="center" style="font-size:20px">Con relacion a los lineamientos que rigen en el Centro de Apoyo a la titulación (C.A.T)</p>
  <p>
  <H3>ACEPTO CUMPLIR SATISFACTORIAMENTE CON LO SIGUIENTE:</H3>
  </p>
  <p id="margen" align="justify" style="font-size:20px">I) Concluir el trabajo recepcional en un plazo no mayor de _365_ dias naturales, contado a partir de la fecha de inscripcion a Experiencia Recepcional.
    Si despues de esa fecha no lo terminaran y desean titularse por este medio deben inscribirse nuevamente (el asesor y el tema pueden permanecer).</p>
  <p id="margen" align="justify" style="font-size:20px">II) Entregar como mínimo 6 formatos de ER relacionados (ER-1, protocolo, ER-2, ER-3 y ER-4) con el desarrollo del trabajo en un periodo de _260_ dias naturales.</p>
  <p id="margen" align="justify" style="font-size:20px">III) Informar oportunamente (durante el periodo de 45 dias), a la coordinación del C.A.T., todos aquellos eventos o acciones que son obstáculos, para el desarrollo de mi trabajo recepcional.</p>
  <p id="margen" align="justify" style="font-size:20px">IV) Pagar la totalidad del curso en un plazo no mayor a _45_ dias naturales contados a partir de la fecha de inicio del curso al que se inscribieron.
    En caso de rebasarse dicha fecha el inscrito que quiera titularse por el C.A.T. deberá pagar nuevamente el curso.</p>
  <p align="justify" style="font-size:20px"><i>Al no cumplir, con los lineamientos anteriores deslindo de toda responsabilidad al C.A.T, en relación a la asesoría para el desarrollo de mi trabajo recepcional.</i></p>
  <p align="justify" style="font-size:20px">NOTA: Esta carta debera ser entregada al coordinador del C.A.T el mismo dia en el que fue recibida.</p>
  <p align="center" style="font-size:20px">Xalapa, Ver. A <?php echo $dia ?> de <?php echo $mes_nombre ?> de <?php echo $year ?> </p>
  <BR>
  <table width="790" align="center" style="text-align:center; font-size:20px">
    <tr>
      <td height="30"></td>
      <td height="30"></td>
    </tr>
    <tr>
      <td><b>NOMBRE Y FIRMA<BR>
        DEL INTERESADO</b></td>
      <td><b>CORDINADOR DEL<BR>
        C.A.T</b></td>
    </tr>
  </table>
</div>
</body>
</html>
