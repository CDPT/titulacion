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
		font-size: 16px;
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
date_default_timezone_set('America/Mexico_City') ; 
$tiempo = localtime(time(),true); 
$dia = $tiempo["tm_mday"]; 
$mes = $tiempo["tm_mon"]+1; 
$year = $tiempo["tm_year"]+1900; 

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
	$puesto=$_GET['puesto'];
	$profesor=$_GET['profesor'];
	$periodo=$_GET['periodo'];

	if ($periodo!="0"){
		$consultaperiodo=mysql_query("SELECT periodo FROM periodo where id_periodo=$periodo");
		$fi=mysql_fetch_array($consultaperiodo);
			$a=$fi['periodo'];
		$textperiodo="durante el periodo ";
	}else{
		$a="";
		$textperiodo="";}

	//$no=mysql_query("SELECT director FROM formulario WHERE director='$profesor'");

	$consula_pro=mysql_query("SELECT * FROM profesor WHERE no_personal='$profesor'") or die ("No se puede consultar maestro");	
	$fila=mysql_fetch_array($consula_pro);
		$nombre=$fila['nombre'];
		$apepat=$fila['apellido_paterno'];
		$apemat=$fila['apellido_materno'];
		$prof=$nombre." ".$apepat." ".$apemat;



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
A QUIEN CORRESPONDA:</br></br>
	La suscrita C. Coordinadora del Centro de Apoyo a la Titulación de la Facultad de Contaduría y Administración
	de la Universidad Veracruzana, en esta ciudad.</br>

	<p align="center"><b>HACE CONSTAR</b></br></p>
	Que <b style="text-transform:uppercase;"><?php echo $prof; ?></b> catedrático de la facultad de Contaduría y Administración participó <?php echo $textperiodo; ?> <b style="text-transform:uppercase;"><?php echo $a; ?></b> como <b style="text-transform:uppercase;"><?php echo $puesto; ?></b> en los siguientes
	exámenes profesionales organizados por el Centro de Apoyo a la Titulación de la Facultad de Contaduría y Administración de
	la Universidad Veracruzana.</br></br>
<p align="center">
	<table border="1" cellspacing="0" cellpadding="3">
		<tr>
			<td><b>NOMBRE</b></td>
			<td><b>MATRICULA</b></td>
			<td><b>CARRERA</b></td>
			<td><b>FECHA</b></td>
		</tr>	
		<tr>
			<?php
	if ($puesto=="director") {
		if ($periodo=="0") {
			$consula_matricula=mysql_query("SELECT * FROM formulario WHERE director='$profesor' and fechaexam is not null and fechaexam!= '0000-00-00' ") or die (mysql_error());
		}else{
			$consula_matricula=mysql_query("SELECT * FROM formulario WHERE director='$profesor' and periodo_tit='$periodo' and fechaexam is not null and fechaexam!= '0000-00-00'") or die (mysql_error());
		}
	}elseif ($puesto=="sinodal") {
		if ($periodo=="0") {
			$consula_matricula=mysql_query("SELECT * FROM formulario WHERE (sinprop1='$profesor' or sinprop2='$profesor') and fechaexam is not null and fechaexam!= '0000-00-00'") or die (mysql_error());
		}else{
			$consula_matricula=mysql_query("SELECT * FROM formulario WHERE (sinprop1='$profesor' or sinprop2='$profesor') and periodo_tit='$periodo' and fechaexam is not null and fechaexam!= '0000-00-00'") or die (mysql_error());
		}
	}
	
while($filamat=mysql_fetch_array($consula_matricula)){
$matricula=$filamat['matricula'];
$fecha=$filamat['fechaexam'];

	$consula_alumno=mysql_query("SELECT * FROM alumno WHERE matricula='$matricula' order by carrera, apepat");	

$fila=mysql_fetch_array($consula_alumno);
$nombrealu=$fila['nombre'];
$apepatalu=$fila['apepat'];
$apematalu=$fila['apemat'];
$carrera=$fila['carrera'];
?>

	<tr style="text-transform:uppercase;">
		<td><?php echo $apepatalu." ".$apematalu." ".$nombrealu; ?></td>
		<td><?php echo $matricula; ?></td>
		<td><?php echo $carrera; ?></td>
		<td><?php echo $fecha; ?></td>
	</tr>
	<?php } ?> 
	</table></br></p>

	Para los fines legales que al interesado le convenga se extiende la presente en la cuidad de Xalapa, Veracruz a los <?php echo $dia; ?> dias del mes <?php echo $mes_nombre; ?> del <?php echo $year; ?><br>
	<p align="center"><b>A  T  E  N  T  A  M  E  N  T  E</b></br></br></br></br>
<table>
<tr>
	<td style="border-top:1px solid #000000"><b>Dra. Erika Yesica Galán Amaro</b></br>
	Coordinadora del CAT</br></td>
    <td></td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
</tr>
<tr>
	<td></td>
    <td></td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
</tr>
<tr>
	<td></td>
	<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td style="border-top:1px solid #000000"><b>DRA. Patricia Arieta Melgarejo</b></br>
	Director de la Facultad de Contaduría y Administración</td>
</tr></p>
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