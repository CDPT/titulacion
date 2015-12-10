<?php session_start(); if($_SESSION['estatus']=='1'){ ?>
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
	body{
		margin-left: 50px;
		margin-right: 50px;
		width: 90%;
		height:650px; 
		font-size:16px;
		padding-top: 0px;
	}
	table{
		font-size: 12px;
		text-align: center;
	}
	#imagen{
	//background:#888;
	position:absolute;
	width:50px;
	height:50px;
	top:30px;
	left:565px;
	color:#fff;
}
#imagen2{
	//background:#888;
	position:absolute;
	width:50px;
	height:50px;
	top:20px;
	left:50px;
	color:#fff;
}
#contenido{
	position:relative;
	height:90%;
	width:100%;
	text-align: justify;
}
</style>
</head>
<body>
<?php
date_default_timezone_set('Mexico/General' ) ; 
$tiempo = getdate(time()); 
$dia = $tiempo['wday']; 
$mes = $tiempo['mon']; 
$year = $tiempo['year']; 

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
	include("../../../Scripts/conexion.php");
	$periodo=$_GET['periodo'];
	$grupo=$_GET['grupo'];
	$conperiodo=mysql_query("SELECT * FROM periodo_cat WHERE id_periodo='$periodo' ") or die ("No se puede consultar el periodo");
	$filaper=mysql_fetch_array($conperiodo);
	$nombreperiodo=$filaper['periodo'];
	?>
<div id="imagen">
   <img src="../../../pdf/logocat.png" width="110px" height="80px"/>
	</div>
	<div id="imagen2">
   <img src="../../../pdf/uv.jpg"  width="100px" height="100px"/>
	</div>
	<div id="contenido">
		<br>
		<p align="center"><b>UNIVERSIDAD VERACRUZANA</br>
	FACULTAD DE CONTADURÍA Y ADMINISTRACIÓN</br>
	CENTRO DE APOYO A LA TITULACIÓN</b></p></br>
	Grupo: <?php echo $grupo; ?><br>
	Periodo: <?php echo $nombreperiodo; ?><br><br>
	<table border="1" cellspacing="0">
	<tr>
		<td><b>No.</b></td>
		<td><b>Nombre</b></td>
		<td><b>Programa<br>Educativo</b></td>
		<td width="30"></td>
		<td width="30"></td>
		<td width="30"></td>
		<td width="160"><b>Observaciones</b></td>
	</tr>
	<?php
	if($periodo==" "){
		$consula_matricula=mysql_query("SELECT * FROM formulario inner join alumno on formulario.matricula=alumno.matricula where formulario.grupo='$grupo' order by apepat") or die ("No se puede consultar la matricula");
		//$consula_matricula=mysql_query("SELECT * FROM formulario WHERE grupo='$grupo'") or die ("No se puede consultar la matricula");
	}else{
		if($grupo==""){
		//$consula_matricula=mysql_query("SELECT * FROM formulario WHERE periodo_tit='$periodo'") or die ("No se puede consultar la matricula");
		$consula_matricula=mysql_query("SELECT * FROM formulario inner join alumno on formulario.matricula=alumno.matricula where formulario.periodo_tit='$periodo' order by apepat") or die ("No se puede consultar la matricula");

		}else{
			//$consula_matricula=mysql_query("SELECT * FROM formulario WHERE periodo_tit='$periodo' and grupo='$grupo'") or die ("No se puede consultar la matricula");
		$consula_matricula=mysql_query("SELECT * FROM formulario inner join alumno on formulario.matricula=alumno.matricula where formulario.periodo_tit='$periodo' and formulario.grupo='$grupo' order by apepat") or die ("No se puede consultar la matricula");
		}
	}
$i=1;
while($filamat=mysql_fetch_array($consula_matricula)){
$matricula=$filamat['matricula'];

	$consula_alumno=mysql_query("SELECT * FROM alumno WHERE matricula='$matricula' order by apepat ");

$fila=mysql_fetch_array($consula_alumno);
$nombre=$fila['nombre'];
$apepat=$fila['apepat'];
$apemat=$fila['apemat'];
$carrera=$fila['carrera'];
$numregistro= mysql_num_rows($consula_matricula);
?>
	<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $apepat." ".$apemat." ".$nombre;?></td>
		<td><?php echo $carrera; ?></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>

<?php $i=$i+1; } ?>
</table>
</div>
</body>
</html>



<?php
}else{
  session_destroy();
?>
  <script type="text/javascript">
    document.location.href=("../../../index.html? var=0");
  </script>
<?php } ?>