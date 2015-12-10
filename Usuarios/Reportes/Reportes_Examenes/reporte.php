<?php session_start(); if($_SESSION['estatus']=='1'){ ?>

<?php
header('Content-Type: text/html; charset=UTF-8');?>
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
		width: 110%;
		padding-top: 0px;
	}
	table{
		font-size: 16px;
		text-align: center;
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
	include("../../../Scripts/conexion.php");
	$hoy=date('Y-m-d');
	$periodo=$_POST['periodo'];
	$carrera=$_POST['carrera'];
	$profesor=$_POST['profesor'];
?>

	<div id="contenido">
		<h5>RELACIÓN DE EXÁMENES REALIZADOS EN EL PERIODO <?php echo $periodo; ?></h5>
<table border="1" cellspacing="0">
<tr>
	<td>NOMBRE</td>
	<td>CARRERA</td>
	<td>MATRICULA</td>
	<td>PERIODO TITULACIÓN</td>
	<td>DIRECTOR DE TESIS</td>
	<td>SINODAL PROPIETARIO</td>
	<td>SINODAL PROPIETARIO 2</td>
	<td>SINODAL SUPLENTE</td>
	<td>SINODAL SUPLENTE 2</td>
	<td>TITULO TRABAJO RECEPCIONAL</td>
	<td>TIPO TRABAJO</td>
	<td>FECHA EXAMEN</td>
	<td>HORA DE EXAMEN</td>
	<td>SALÓN</td>
</tr>
<?php
if ($carrera=="0" && $profesor=="0") {
	//por periodo
	$consula_matricula=mysql_query("SELECT * FROM formulario WHERE fechaexam<'$hoy' and periodo_tit='$periodo' and fechaexam!='0000-00-00'") or die ("No se puede consultar");
}elseif ($carrera=="0") {
	//por profesor y periodo
	$consula_matricula=mysql_query("SELECT * FROM formulario WHERE fechaexam<'$hoy' and periodo_tit='$periodo' and fechaexam!='0000-00-00' and director='$profesor' or sinprop1='$profesor' or sinprop2='$profesor' or sinsup1='$profesor' or sinsup2='$profesor'") or die ("No se puede consultar");
}elseif ($profesor=="0") {
	//por carrera y periodo
	//$consula_matricula=mysql_query("SELECT * FROM formulario WHERE fechaexam<'$hoy' and periodo_tit='$periodo' and fechaexam!='0000-00-00'") or die ("No se puede consultar");
	$consula_matricula=mysql_query("SELECT * FROM formulario inner join alumno on formulario.matricula=alumno.matricula where alumno.carrera='$carrera' and formulario.fechaexam<'$hoy' and formulario.periodo_tit='$periodo' and formulario.fechaexam!='0000-00-00' order by apepat") or die ("No se puede consultar la matricula 1");
}else{
	$consula_matricula=mysql_query("SELECT * FROM formulario WHERE fechaexam<'$hoy' and periodo_tit='$periodo' and fechaexam!='0000-00-00'") or die ("No se puede consultar");
}

while($filamat=mysql_fetch_array($consula_matricula)){
$matricula=$filamat['matricula'];
$director=$filamat['director'];
$sinprop1=$filamat['sinprop1'];
$sinprop2=$filamat['sinprop2'];
$sinsup1=$filamat['sinsup1'];
$sinsup2=$filamat['sinsup2'];
$salon=$filamat['salon'];
$horaexam=$filamat['horaexam'];
$fechaexam=$filamat['fechaexam'];
$periodo_tit=$filamat['periodo_tit'];
$titulotrab=$filamat['titulotrab'];
$modalidad=$filamat['modalidad'];

$consula_alumno=mysql_query("SELECT * FROM alumno WHERE matricula='$matricula' ");
	$fila=mysql_fetch_array($consula_alumno);
	$nombre=$fila['nombre'];
	$apepat=$fila['apepat'];
	$apemat=$fila['apemat'];
	$carrera=$fila['carrera'];

$consula_alumno=mysql_query("SELECT * FROM cat_profesor WHERE no_personal='$director' ");
	$fila=mysql_fetch_array($consula_alumno);
	$nombredir=$fila['nombre'];
	$apepatdir=$fila['apellido_paterno'];
	$apematdir=$fila['apellido_materno'];

$consula_alumno=mysql_query("SELECT * FROM cat_profesor WHERE no_personal='$sinprop1' ");
	$fila=mysql_fetch_array($consula_alumno);
	$nombresin1=$fila['nombre'];
	$apepatsin1=$fila['apellido_paterno'];
	$apematsin1=$fila['apellido_materno'];

$consula_alumno=mysql_query("SELECT * FROM cat_profesor WHERE no_personal='$sinprop2' ");
	$fila=mysql_fetch_array($consula_alumno);
	$nombresin2=$fila['nombre'];
	$apepatsin2=$fila['apellido_paterno'];
	$apematsin2=$fila['apellido_materno'];

$consula_alumno=mysql_query("SELECT * FROM cat_profesor WHERE no_personal='$sinsup1' ");
	$fila=mysql_fetch_array($consula_alumno);
	$nombresup1=$fila['nombre'];
	$apepatsup1=$fila['apellido_paterno'];
	$apematsup1=$fila['apellido_materno'];

$consula_alumno=mysql_query("SELECT * FROM cat_profesor WHERE no_personal='$sinsup2' ");
	$fila=mysql_fetch_array($consula_alumno);
	$nombresup2=$fila['nombre'];
	$apepatsup2=$fila['apellido_paterno'];
	$apematsup2=$fila['apellido_materno'];

$consula_periodo=mysql_query("SELECT * FROM periodo_cat WHERE id_periodo='$periodo_tit' ");
	$fila=mysql_fetch_array($consula_periodo);
	$periodo_tit=$fila['periodo'];
?>
<tr style="text-transform:uppercase; font-size:10px">
	<td><?php echo $apepat." ".$apemat." ".$nombre; ?></td>
	<td><?php echo $carrera; ?></td>
	<td><?php echo $matricula; ?></td>
	<td><?php echo $periodo_tit; ?></td>
	<td><?php echo $apepatdir." ".$apematdir." ".$nombredir; ?></td>
	<td><?php echo $apepatsin1." ".$apematsin1." ".$nombresin1; ?></td>
	<td><?php echo $apepatsin2." ".$apematsin2." ".$nombresin2; ?></td>
	<td><?php echo $apepatsup1." ".$apematsup1." ".$nombresup1; ?></td>
	<td><?php echo $apepatsup2." ".$apematsup2." ".$nombresup2; ?></td>
	<td><?php echo $titulotrab; ?></td>
	<td><?php echo $modalidad; ?></td>
	<td><?php echo $fechaexam; ?></td>
	<td><?php echo $horaexam; ?></td>
	<td><?php echo $salon; ?></td>
</tr>
<?php } ?>
<tr align="left" style="border=0px">
	<td colspan="9"><br>Coordinadora del CAT<br><br><br>Dra. Erika Yesica Galán Amaro</td>
	<td colspan="5"><br><br>Vo. Bo.<br>Director de la facultad de Contaduría y Administración</td>
</tr>
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