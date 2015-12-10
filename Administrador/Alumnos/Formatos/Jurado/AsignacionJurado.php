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

?>
<div id="imagen"> <img src="../../../../pdf/logocat.png" width="110px" height="80px"/> </div>
<div id="imagen2"> <img src="../../../../pdf/uv.jpg"  width="100px" height="100px"/> </div>
<div id="contenido">
<br>
<p align="center"><b>UNIVERSIDAD VERACRUZANA</br>
  FACULTAD DE CONTADURÍA Y ADMINISTRACIÓN</br>
  CENTRO DE APOYO A LA TITULACIÓN</b></p>
<br>
<br>
<p style="font-size:20px"><b>Nombre:</b> <?php echo $nombre.' '.$apepat.' '.$apemat; ?> <b>&nbsp;&nbsp;&nbsp; Matricula:</b> <?php echo $matricula;?> <br>
  <br>
  <b>Licenciatura:</b> <?php echo $lic; ?><br>
  <br>
  <b>Tema:</b> <?php echo $tema; ?><br>
  <br>
  <b>Modalidad:</b> <?php echo $modalidad; ?><br>
  <br>
<table align="center" bordercolor="#FFFFFF" style="font-size:18px">
  <tr>
    <td></td>
    <td><b>Nombre</b></td>
    <td width="170"><b>No. de Personal</b></td>
  </tr>
  <tr>
    <td width="230" style="text-align:right" height="30">Director:</td>
    <td width="624"><?php echo $nomdir.' '.$apepatdir.' '.$apematdir; ?></td>
    <td><?php echo $dir;?><td>
  </tr>
  <tr>
    <td style="text-align:right" height="30">Sinodal Propietario 1:</td>
    <td width="624"><?php echo $nomprop1.' '.$apepatprop1.' '.$apematprop1; ?></td>
    <td><?php echo $sinprop1;?><td>
  </tr>
  <tr>
    <td style="text-align:right" height="30">Sinodal Propietario 2:</td>
    <td width="624"><?php echo $nomprop2.' '.$apepatprop2.' '.$apematprop2; ?></td>
    <td><?php echo $sinprop2;?><td>
  </tr>
  <tr>
    <td style="text-align:right" height="30">Sinodal Suplente 1:</td>
    <td width="624"><?php echo $nomsup1.' '.$apepatsup1.' '.$apematsup1; ?></td>
    <td><?php echo $sinsup1;?><td>
  </tr>
  <tr>
    <td style="text-align:right" height="30">Sinodal Suplente 2:</td>
    <td width="624"><?php echo $nomsup2.' '.$apepatsup2.' '.$apematsup2; ?></td>
    <td><?php echo $sinsup2;?><td>
  </tr>
</table>
<table align="center" bordercolor="#FFFFFF" style="font-size:18px">
<tr>
  <td width="392" height="70"></td>
  <td width="393" height="70"></td>
</tr>
<tr>
  <td>Xalapa, Ver. A <?php echo $dia ?> de <?php echo $mes_nombre ?> de <?php echo $year ?></td>
  <td>Firma del Alumno</td>
</tr>
<tr>
  <td height="70"></td>
  <td height="70"></td>
</tr>
<tr>
  <td><b>COORDINADOR DEL C.A.T</b></td>
  <td><b>Vo.Bo<BR>JEFE DE CARRERA</b></td>
</tr>
</table>
</p>
</div>
</body>
</html>
