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
	<?php  error_reporting(0);
	date_default_timezone_set('America/Mexico_City' ) ; 
	$tiempo = localtime(time(), true); 
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
	$periodo=$_GET['periodo'];
	$grupo=$_GET['grupo'];

	if ($periodo=="0") {
		$nombreperiodo="Todos";
	}else{
		$conperiodo=mysql_query("SELECT * FROM periodo WHERE id_periodo='$periodo' ") or die ("No se puede consultar el periodo");
		$filaper=mysql_fetch_array($conperiodo);
		$nombreperiodo=$filaper['periodo'];
	}
	if ($grupo=="0") $grupo="Todos";

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
			<p align="Center"><b>RELACIÓN DE DEUDORES</b></br></p>		
			<p align="right">Xalapa, Ver. a <?php echo $dia." de ".$mes_nombre." del ".$year;?></p></br>
			<p align="left"><b style="text-transform:uppercase;">PERIODO: <?php echo $nombreperiodo; ?></br>
				<b style="text-transform:uppercase;">GRUPO: <?php echo $grupo; ?></br>



					<table border="1" cellspacing="0" align="center">
						<tr>
							<th>Matricula</th>
							<th>Nombre</th>
							<th>Periodo</th>
							<th>Programa<br>Educativo</th>
							<th>Grupo</th>
							<th>Total Depositado</th>
							<th>Deuda</th>
							<th>Observaciones</th>
						</tr>
						<?php
						if ($periodo==0 && $grupo==0) {
							$consula_matricula=mysql_query("SELECT * FROM formulario_cat inner join alumno on formulario_cat.matricula=alumno.matricula order by apepat") or die ("No se puede consultar la matricula 1");
						}else{
							if($periodo==0){
								$consula_matricula=mysql_query("SELECT * FROM formulario_cat inner join alumno on formulario_cat.matricula=alumno.matricula where formulario_cat.grupo='$grupo' order by apepat") or die ("No se puede consultar la matricula 2");
							}else{
								if($grupo==0){
									$consula_matricula=mysql_query("SELECT * FROM formulario_cat inner join formulario on formulario.matricula=formulario_cat.matricula inner join alumno on formulario_cat.matricula=alumno.matricula where formulario.periodo_tit='$periodo' order by apepat") or die ("No se puede consultar la matricula 3");
									$con=3;
								}else{
									$consula_matricula=mysql_query("SELECT * FROM formulario_cat inner join formulario on formulario.matricula=formulario_cat.matricula inner join alumno on formulario_cat.matricula=alumno.matricula where formulario.periodo_tit='$periodo' and formulario_cat.grupo='$grupo'") or die ("No se puede consultar la matricula 4");
									$con=4;
								}
							}
						}

						$i=1;
						while($filamat=mysql_fetch_array($consula_matricula)){
							$matricula=$filamat['matricula'];
							$montototal=$filamat['montotot'];
							$grupo1=$filamat['grupo'];
							if($grupo1=="")$grupo1="-";

							$consuper1=mysql_query("SELECT periodo_tit FROM formulario WHERE matricula='$matricula'");
							$pec1=mysql_fetch_array($consuper1);
							$periodo_titu=$pec1['periodo_tit'];
							if($nom_pe==""){$nom_pe="-";}
							$consuper=mysql_query("SELECT * FROM periodo WHERE id_periodo='$periodo_titu'");
							$pec=mysql_fetch_array($consuper);
							$nom_pe=$pec['periodo'];
							if($nom_pe==""){$nom_pe="-";}
							if ($con==3) {
								$consu=mysql_query("SELECT * FROM formulario_cat where matricula='$matricula'") or die(mysql_error());
								$fi=mysql_fetch_array($consu);
								$montototal=$fi['montotot'];
							}
							$sinodal=400;
							$consulta78=mysql_query("SELECT * FROM pagos WHERE matricula='$matricula'") or die("No se puede ejecutar consulta");
							$total=0;
							while($fila78= mysql_fetch_array($consulta78)){
								$importe=$fila78['monto_pago'];
								$total=$total+$importe;
							}
							$tot=$montototal+$sinodal;
							$deve=$tot-$total;
							if($deve>0){
								$consula_alumno=mysql_query("SELECT * FROM alumno WHERE matricula='$matricula' ");

								$fila=mysql_fetch_array($consula_alumno);
								$nombre=$fila['nombre'];
								$apepat=$fila['apepat'];
								$apemat=$fila['apemat'];
								$carrera=$fila['carrera'];
								$nomcom=$apepat." ".$apemat." ".$nombre;
								$min=strtoupper($nomcom);
								$numregistro= mysql_num_rows($consula_matricula);


								?>
								<tr>
									<td><?php echo $matricula ?></td>
									<td><?php echo $min; ?></td>
									<td><?php echo $nom_pe; ?></td>
									<td><?php echo $carrera; ?></td>
									<td><?php echo $grupo1; ?></td>
									<td><?php echo "$ ".number_format($total,2); ?></td>
									<td><?php echo "$ ".number_format($deve,2); ?></td>
									<td> _________________ </td>

								</tr>

								<?php $i=$i+1; } }?>
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