﻿<?php session_start(); if($_SESSION['estatus']=='1'){ ?>

<?php
//header('Content-Type: text/html; charset=UTF-8');?>
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
	                       $consuper=mysql_query("SELECT * FROM periodo WHERE id_periodo='$periodo'");
                          $pec=mysql_fetch_array($consuper);
                          $nom_pe=$pec['periodo'];
  				if($profesor!="Todos"){
                $consulta_profesor=mysql_query("SELECT * FROM profesor where no_personal=$profesor");
                $fila_profesor=mysql_fetch_array($consulta_profesor);
          		  	$nom=$fila_profesor['nombre'];
                    $pat=$fila_profesor['apellido_paterno'];
                    $mat=$fila_profesor['apellido_materno'];
            	    $director=$nom." ".$pat." ".$mat;
            	}
                          
?>

	<div id="contenido">
		<h3><b style="text-transform:uppercase;">RELACI&OacuteN DE EXAMENES REALIZADOS EN EL PERIODO <?php echo $nom_pe; ?></b></h3>
		<b>PROFESOR: </b><?php if($profesor!="Todos"){echo strtoupper($director);}else echo strtoupper($profesor);?><br>
		<b>CARRERA: </b><?php echo strtoupper($carrera);?><br><br>


<table border="1" cellspacing="0" style="Font-size:10px">
<tr>
	<td WIDTH=60><b>MATRICULA</b></td>
	<td WIDTH=60><b>NOMBRE</b></td>
	<td WIDTH=40><b>CARRERA</b></td>
	<td WIDTH=60><b>DIRECTOR DE TESIS</b></td>
	<td WIDTH=60><b>SINODAL PROPIETARIO</b></td>
	<td WIDTH=70><b>SINODAL PROPIETARIO 2</b></td>
	<td WIDTH=60><b>SINODAL SUPLENTE</b></td>
	<td WIDTH=60><b>SINODAL SUPLENTE 2</b></td>
	<td WIDTH=160><b>TITULO TRABAJO RECEPCIONAL</b></td>
	<td WIDTH=60><b>TIPO TRABAJO</b></td>
	<td WIDTH=50><b>FECHA EXAMEN</b></td>
	<td WIDTH=50><b>HORA DE EXAMEN</b></td>
	<td WIDTH=50><b>SALÓN</b></td>
</tr>
<?php
if ($carrera=="Todas" && $profesor=="Todos") {
	//por periodo
	$consula_matricula=mysql_query("SELECT * FROM formulario inner join formulario_er on formulario.matricula=formulario_er.matricula WHERE periodo_tit='$periodo' and tipo='ER' and submodalidad='Trabajo'") or die ("No se puede consultar");
}elseif ($carrera=="Todas") {
	//por profesor y periodo
	$consula_matricula=mysql_query("SELECT * FROM formulario inner join formulario_er on formulario.matricula=formulario_er.matricula WHERE periodo_tit='$periodo' and director='$profesor' and tipo='ER' and submodalidad='Trabajo'") or die ("No se puede consultar");
}elseif ($profesor=="Todos") {
	//por carrera y periodo
	$consula_matricula=mysql_query("SELECT * FROM formulario inner join formulario_er on formulario.matricula=formulario_er.matricula inner join alumno on formulario.matricula=alumno.matricula  where alumno.carrera='$carrera' and formulario.periodo_tit='$periodo' and tipo='ER' and submodalidad='Trabajo' order by apepat") or die ("No se puede consultar la matricula 1");
}else{
	$consula_matricula=mysql_query("SELECT * FROM formulario inner join formulario_er on formulario.matricula=formulario_er.matricula inner join alumno on formulario.matricula=alumno.matricula where submodalidad='Trabajo' and alumno.carrera='$carrera' and formulario.periodo_tit='$periodo' and formulario.director='$profesor' and tipo='ER' order by apepat") or die ("No se puede consultar la matricula 1");
}

while($filamat=mysql_fetch_array($consula_matricula)){
$matricula=$filamat['matricula'];
$director=$filamat['director'];
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

$consula_alumno=mysql_query("SELECT * FROM profesor WHERE no_personal='$director' ");
	$fila=mysql_fetch_array($consula_alumno);
	$nombredir=$fila['nombre'];
	$apepatdir=$fila['apellido_paterno'];
	$apematdir=$fila['apellido_materno'];


$consula_periodo=mysql_query("SELECT * FROM periodo WHERE id_periodo='$periodo_tit' ");
	$fila=mysql_fetch_array($consula_periodo);
	$periodo_tit=$fila['periodo'];
if ($horaexam=="00:00:00" || $horaexam=="") {
	 $hor=" - ";
}else{

$consula_hora=mysql_query("SELECT * FROM horas_exam WHERE id='$horaexam;'")or die(mysql_error());
          $sae=mysql_fetch_array($consula_hora);
          $id_hora=$sae['id'];
          $hora_ini=$sae['hora_ini'];
          $hora_fin=$sae['hora_fin'];
          $hor=$hora_ini." - ".$hora_fin;
}
 $dir=$apepatdir." ".$apematdir." ".$nombredir; if($dir=="  ") $dir="-";
 if($titulotrab=="") $titulotrab="-";
 if( $modalidad=="") $modalidad="-";
 if($fechaexam=="")  $fechaexam="-";
 if($hor=="") $hor="-";
 if($salon=="") $salon="-";
?>
<tr style="text-transform:uppercase; font-size:10px">
	<td WIDTH=60><?php echo $matricula; ?></td>
	<td WIDTH=60><?php echo $apepat." ".$apemat." ".$nombre; ?></td>
	<td WIDTH=40><?php echo $carrera; ?></td>
	<td WIDTH=60><?php echo $dir; ?></td>
	<td WIDTH=60><?php echo "-"; ?></td>
	<td WIDTH=70><?php echo "-"; ?></td>
	<td WIDTH=60><?php echo "-"; ?></td>
	<td WIDTH=60><?php echo "-"; ?></td>
	<td WIDTH=160><?php echo $titulotrab; ?></td>
	<td WIDTH=60><?php echo $modalidad; ?></td>
	<td WIDTH=50><?php echo $fechaexam; ?></td>
	<td WIDTH=50><?php echo $hor; ?></td>
	<td WIDTH=50><?php echo $salon; ?></td>
</tr>
<?php } ?>
<tr align="left" style="border=0px">
	<td colspan="9"><br>Coordinadora de ER<br><br><br>MGAP. Delia V&aacutezquez Castillo</td>
	<td colspan="5"><br><br>Vo. Bo.<br>Director de la facultad de Contadur&iacutea y Administraci&oacuten</td>
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