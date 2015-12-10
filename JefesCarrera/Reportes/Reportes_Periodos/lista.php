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
	include("../../../Scripts/conexion.php");
	$periodo=$_GET['periodo'];
	
	if ($periodo=="") {
		$nombreperiodo="Todos";
	}else{
		$conperiodo=mysql_query("SELECT * FROM periodo WHERE id_periodo='$periodo' ") or die ("No se puede consultar el periodo");
		$filaper=mysql_fetch_array($conperiodo);
		$nombreperiodo=$filaper['periodo'];
	}
		
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
	CENTRO DE APOYO A LA TITULACIÓN</br>
	Relación por Periodos</b></p></br>	
	Periodo: <?php echo $nombreperiodo; ?><br>
	<table border="1" align="center">
	<tr>
		<td><b>No.</b></td>
		<td><b>Nombre</b></td>
		<td><b>Programa Educativo</b></td>
		<td><b>Director</b></td>
		<td><b>Titulo del Trabajo</b></td>
		<td><b>Modalidad</b></td>
	</tr>
	<?php
	if($periodo==""){
		$consula_matricula=mysql_query("SELECT * FROM formulario_cat inner join formulario on formulario_cat.matricula=formulario.matricula inner join alumno on alumno.matricula=formulario_cat.matricula order by carrera,apepat");
	}else{
		$consula_matricula=mysql_query("SELECT * FROM alumno inner join formulario on alumno.matricula=formulario.matricula inner join formulario_cat on alumno.matricula=formulario_cat.matricula WHERE formulario.periodo_tit='$periodo' order by carrera,apepat");
	}
$i=1;
while($filamat=mysql_fetch_array($consula_matricula)){
$matricula=$filamat['matricula'];
$grup=$filamat['grupo'];
$direct=$filamat['director'];
$nomtrab=$filamat['titulotrab'];
$modalida=$filamat['modalidad'];

	$consula_alumno=mysql_query("SELECT * FROM alumno WHERE matricula='$matricula' ");

$fila=mysql_fetch_array($consula_alumno);
$nombre=$fila['nombre'];
$apepat=$fila['apepat'];
$apemat=$fila['apemat'];
$carrer=$fila['carrera'];
$numregistro= mysql_num_rows($consula_matricula);

	$consula_director=mysql_query("SELECT * from profesor where no_personal='$direct'");

$filadir=mysql_fetch_array($consula_director);
$nombredir=$filadir['nombre'];
$apepatdir=$filadir['apellido_paterno'];
$apematdir=$filadir['apellido_materno'];
?>
	<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $apepat." ".$apemat." ".$nombre; ?></td>
		<td><?php echo $carrer; ?></td>
		<td><?php echo $apepatdir." ".$apematdir." ".$nombredir; ?></td>
		<td><?php echo $nomtrab; ?></td>
		<td><?php echo $modalida; ?></td>
	</tr>

<?php $i=$i+1; } ?>
</table><br>
<p align="right">Fecha: <?php echo $dia." de ".$mes_nombre." del ".$year." ".$hora.":".$minutos;?>
</div>
</body>
</html>
