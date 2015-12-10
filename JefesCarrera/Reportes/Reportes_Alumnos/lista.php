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
	$tipo=$_GET['tipo'];
	$carrera=$_GET['carrera'];

	if ($periodo=="") {
		$nombreperiodo="Todos";
	}else{
		$conperiodo=mysql_query("SELECT * FROM periodo WHERE id_periodo='$periodo' ") or die ("No se puede consultar el periodo");
		$filaper=mysql_fetch_array($conperiodo);
		$nombreperiodo=$filaper['periodo'];
	}
	if ($tipo=="") {
		$nombretipo="Todos";
	}else{
		$nombretipo=$tipo;
	}
	
	switch ($carrera) {
		case '':
			$nombrecarrera='Todas';
			$carrera="";
			break;
		
		case 'LA':
			$nombrecarrera='LA';
			$carrera="LA";
			break;
		
		case 'LC':
			$nombrecarrera='LC';
			$carrera="LC";
			break;

		case 'LN':
			$nombrecarrera='LN';
			$carrera="LN";
			break;
		case 'LS':
			$nombrecarrera='LS';
			$carrera="LS";
			break;
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
	FACULTAD DE CONTADURÍA Y ADMINISTRACIÓN</b></p></br>	
	<p align="Center"><b>REPORTE DE ESTUDIANTES</b></br></p>		
	<p align="right">Xalapa, Ver. a <?php echo $dia." de ".$mes_nombre." del ".$year;?></p></br>
	<p align="left"><b style="text-transform:uppercase;">PERIODO: <?php echo $nombreperiodo; ?></br>
		<b style="text-transform:uppercase;">CARRERA: <?php echo $nombrecarrera; ?></br>
		<b style="text-transform:uppercase;">TRAMITE: <?php echo $nombretipo; ?></br>
	<table border="1" align="center">
	<tr>
		<td><b>Matricula</b></td>
		<td><b>Nombre</b></td>
		<?php if ($periodo==""){echo "<td><b>Periodo</b></td>";}?>
		<td><b>Programa Educativo</b></td>
		<td><b>Tipo</b></td>
	</tr>
	<?php
	if ($periodo=="" && $carrera=="" && $tipo=="") {
			$consula_matricula=mysql_query("SELECT * FROM formulario inner join alumno on formulario.matricula=alumno.matricula order by carrera,apepat") or die ("No se puede consultar la matricula 0");
			}else{
				if ($periodo!="" && $carrera=="" && $tipo=="") {
					$consula_matricula=mysql_query("SELECT * FROM formulario inner join alumno on formulario.matricula=alumno.matricula WHERE formulario.periodo_tit='$periodo' order by carrera,apepat") or die ("No se puede consultar la matricula 1");
				}else{
					if ($periodo=="" && $carrera!="" && $tipo=="") {
						$consula_matricula=mysql_query("SELECT * FROM formulario inner join alumno on formulario.matricula=alumno.matricula WHERE alumno.carrera='$carrera' order by carrera,apepat") or die ("No se puede consultar la matricula 2");
					}else{
						if ($periodo=="" && $carrera=="" && $tipo!="") {
							$consula_matricula=mysql_query("SELECT * FROM formulario inner join alumno on formulario.matricula=alumno.matricula WHERE formulario.tipo='$tipo' order by carrera,apepat") or die ("No se puede consultar la matricula 3");
						}else{
							if ($periodo!="" && $carrera!="" && $tipo=="") {
								$consula_matricula=mysql_query("SELECT * FROM formulario inner join alumno on formulario.matricula=alumno.matricula WHERE formulario.periodo_tit='$periodo' and alumno.carrera='$carrera' order by carrera,apepat") or die ("No se puede consultar la matricula 4");
							}else{
								if ($periodo!="" && $carrera=="" && $tipo!="") {
									$consula_matricula=mysql_query("SELECT * FROM formulario inner join alumno on formulario.matricula=alumno.matricula WHERE formulario.periodo_tit='$periodo' and formulario.tipo='$tipo' order by carrera,apepat") or die ("No se puede consultar la matricula 5");
								}else{
									if ($periodo=="" && $carrera!="" && $tipo!="") {
										$consula_matricula=mysql_query("SELECT * FROM formulario inner join alumno on formulario.matricula=alumno.matricula WHERE alumno.carrera='$carrera' and formulario.tipo='$tipo' order by carrera,apepat") or die ("No se puede consultar la matricula 6");
									}else{
										$consula_matricula=mysql_query("SELECT * FROM formulario inner join alumno on formulario.matricula=alumno.matricula WHERE alumno.carrera='$carrera' and formulario.tipo='$tipo' and formulario.periodo_tit='$periodo' order by carrera,apepat") or die ("No se puede consultar la matricula 7");
									}
								}
							}
						}
					}
				}
			}
$i=1;
while($filamat=mysql_fetch_array($consula_matricula)){
$matricula=$filamat['matricula'];
$tipo=$filamat['tipo'];
$periodo1=$filamat['periodo_tit'];
                        $consuper=mysql_query("SELECT * FROM periodo WHERE id_periodo='$periodo1'");
                          $pec=mysql_fetch_array($consuper);
                          $nom_pe=$pec['periodo'];
                          if($nom_pe==""){$nom_pe="-";}

	$consula_alumno=mysql_query("SELECT * FROM alumno WHERE matricula='$matricula' ");

$fila=mysql_fetch_array($consula_alumno);
$nombre=$fila['nombre'];
$apepat=$fila['apepat'];
$apemat=$fila['apemat'];
$carrera=$fila['carrera'];
$numregistro= mysql_num_rows($consula_matricula);
?>
	<tr>
		<td><?php echo $matricula; ?></td>
		<td><?php echo $apepat." ".$apemat." ".$nombre; ?></td>
		<?php if ($periodo==""){echo "<td >".$nom_pe."</td>";}?>
		<td><?php echo $carrera; ?></td>
		<td><?php echo $tipo; ?></td>
	</tr>

<?php $i=$i+1; } ?>
</table><br>
</div>
</body>
</html>
