<?php 	
	session_start();
	error_reporting(0);
	if($_SESSION['estatus']=='1'){
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="author" content="Angel Antonio Contreras Moctezuma">
	<meta charset="utf-8" lang="esp" http-equiv="Content-Type" content="text/html;">
	<meta name="keywords" lang="es" content="CAT, Centro, Apoyo, Titulación">
	<?php $sistema="JEFE"; include('../../Includes/ruta.php'); include('../../Includes/title.php');  ?>
	<link href="../../Estilos/estilo_global.css" rel="stylesheet" type="text/css"/>
	<link href="../Estilos/estilo_alumno.css" rel="stylesheet" type="text/css"/>
	<script type="text/javascript">
		function clicksalir() {
			var confirma=confirm("¿Seguro que desea salir del Sistema?");

			if(confirma==true){
				document.location.href=("../../Scripts/cerrar_sesion.php");
			}else{ 
			}

		}
	</script>
	<style type="text/css">
		#op10{
					background:#044b89;
					border-radius:0px 0px 10px 10px;
					border:3px solid #033663;
					font-weight: bold;
					box-shadow: 0 0 7px 1px #9dcaf1;
		}

				.borde{
			border: 1px solid #00ab4f;
			padding: 5px 10px 0px 10px;
			border-radius:5px 5px 0px 0px;
		}

		table{
			text-align:center;
		}

		td{
			padding: 0px 30px 0px 30px;
		}

		a{
			text-decoration:none;
		}

		.subtit{
			width:auto;
			height:auto;
			background:#005baa;
			color: #fff;
			border-radius:5px 5px 5px 5px;
			
			box-shadow:0px 0px 6px 2px #83aed3;
		}
		tr:hover{
			background: #e2edf7;
		}
	</style>


</head>

<?php
if($_SESSION['estatus']==1){
			include("../../Scripts/conexion.php");
		
?>
<body  oncontextmenu="return false">

	<section id="global">

		<header id="baner">
				<?php include ("../../Includes/header.php"); ?> 

			        <aside id="engloba_notificacion">
			            <aside id="notificaciones">
			            	<label class="bienvenida"><?php print "Bienvenido Administrador: ".$_SESSION['nick']; ?></label>
						
							<a class="salir" onClick="clicksalir()" >Salir</a> 
						</aside>
					</asid>

			</header>

		<nav id="global_menu">
			<nav id="marco_menu">
				<ul>
					<?php include ("../../Menus/menu_administrador.php"); ?>
				</ul>
			</nav>
		</nav>



		<section id="engloba_cuerpo">

			<section id="cuerpo">

<section id="titformulintro">
	MAESTROS PENDIENTES DE AUTORIZACIÓN
</section>
<?php
$consulta=mysql_query("SELECT * FROM formulario WHERE director like '%-pen' or sinprop1 like '%-pen' or sinprop2 like '%-pen' or sinsup1 like '%-pen' or sinsup2 like '%-pen'") or die (mysql_error());
	$tot=mysql_num_rows($consulta);
	if ($tot>0) {
?>
<table border="0" class="tablesorter" id="tablesorter-demo">
	<tr class="titulo_tabla">
		<td class="titbuscar">NO. DE<br>PERSONAL</td>
		<td class="titbuscar">MAESTRO</td>
		<td class="titbuscar">PUESTO</td>
		<td class="titbuscar">ESTUDIANTE</td>
		<td class="titbuscar">INSCRITO</td>
		<td class="titbuscar">NO.<br>DIRECTOR</td>
		<td class="titbuscar">NO.<br>SINODAL</td>
		<td class="titbuscar">TOTAL</td>
		<td width="10" class="titbuscar"></td>
		<td width="10" class="titbuscar"></td>
	</tr>
<?php 
	while($fila=mysql_fetch_array($consulta)){
		$matricula=$fila['matricula'];
		$periodo=$fila['periodo_tit'];
		$tipo=$fila['tipo'];
		$director=$fila['director'];
		$sinprop1=$fila['sinprop1'];
		$sinprop2=$fila['sinprop2'];
		$sinsup1=$fila['sinsup1'];
		$sinsup2=$fila['sinsup2'];

		$dir=explode("-", $director);
		$sp1=explode("-", $sinprop1);
		$sp2=explode("-", $sinprop2);
		$sup1=explode("-", $sinsup1);
		$sup2=explode("-", $sinsup2);

		$consualum=mysql_query("SELECT * FROM alumno WHERE matricula='$matricula'") or die ("no se puede");
					$fialum=mysql_fetch_array($consualum);
					$apepat=$fialum['apepat'];
					$apemat=$fialum['apemat'];
					$nomalum=$fialum['nombre'];
					$alumno=$apepat." ".$apemat." ".$nomalum;

?>
	<tr class="cont_tabla">
		<td class="textfiltab">
			<?php 
			if($dir[1]=="pen"){
				echo $dir[0];
					$noper=$dir[0];
					$consumaestro=mysql_query("SELECT * FROM profesor WHERE no_personal='$noper'") or die ("no se puede");
					$fimaestro=mysql_fetch_array($consumaestro);
					$app=$fimaestro['apellido_paterno'];
					$apm=$fimaestro['apellido_materno'];
					$nommat=$fimaestro['nombre'];
					$maestro=$app." ".$apm." ".$nommat;
					$puesto="Director";

				}elseif ($sp1[1]=="pen"){
					echo $sp1[0];
						$noper=$sp1[0];
						$consumaestro=mysql_query("SELECT * FROM profesor WHERE no_personal='$noper'") or die ("no se puede");
						$fimaestro=mysql_fetch_array($consumaestro);
						$app=$fimaestro['apellido_paterno'];
						$apm=$fimaestro['apellido_materno'];
						$nommat=$fimaestro['nombre'];
						$maestro=$app." ".$apm." ".$nommat;
						$puesto="Sinodal Propietario 1";

					}elseif ($sp2[1]=="pen"){
						echo $sp2[0];
							$noper=$sp2[0];
							$consumaestro=mysql_query("SELECT * FROM profesor WHERE no_personal='$noper'") or die ("no se puede");
							$fimaestro=mysql_fetch_array($consumaestro);
							$app=$fimaestro['apellido_paterno'];
							$apm=$fimaestro['apellido_materno'];
							$nommat=$fimaestro['nombre'];
							$maestro=$app." ".$apm." ".$nommat;
							$puesto="Sinodal Propietario 2";

						}elseif ($sup1[1]=="pen"){
							echo $sup1[0];
								$noper=$sup1[0];
								$consumaestro=mysql_query("SELECT * FROM profesor WHERE no_personal='$noper'") or die ("no se puede");
								$fimaestro=mysql_fetch_array($consumaestro);
								$app=$fimaestro['apellido_paterno'];
								$apm=$fimaestro['apellido_materno'];
								$nommat=$fimaestro['nombre'];
								$maestro=$app." ".$apm." ".$nommat;
								$puesto="Sinodal Suplente 1";

							}elseif ($sup2[1]=="pen"){
								echo $sup2[0];
									$noper=$sup2[0];
									$consumaestro=mysql_query("SELECT * FROM profesor WHERE no_personal='$noper'") or die ("no se puede");
									$fimaestro=mysql_fetch_array($consumaestro);
									$app=$fimaestro['apellido_paterno'];
									$apm=$fimaestro['apellido_materno'];
									$nommat=$fimaestro['nombre'];
									$maestro=$app." ".$apm." ".$nommat;
									$puesto="Sinodal Suplente 2";
								} ?>
		</td>
		<?php
							$consulta1=mysql_query("SELECT COUNT(formulario.matricula) FROM formulario inner join formulario_er on formulario.matricula=formulario_er.matricula where formulario.director='$noper' and formulario_er.submodalidad='Trabajo' and tit='0' AND periodo_tit='$periodo'") or die (mysql_error());
								$cuentadir=mysql_result($consulta1, 0);
							$consulta11=mysql_query("SELECT COUNT(formulario.matricula) FROM formulario inner join formulario_cat on formulario.matricula=formulario_cat.matricula where formulario.director='$noper'  and tit ='0' AND periodo_tit='$periodo'") or die (mysql_error());
								$cuentadir1=mysql_result($consulta11, 0);	
							$totdir=$cuentadir	+ $cuentadir1;
							$consultasin=mysql_query("SELECT COUNT(formulario.matricula) FROM formulario inner join formulario_er on formulario.matricula=formulario_er.matricula where (formulario.sinprop1='$noper' or formulario.sinprop2='$noper')  and formulario_er.submodalidad='Trabajo' and tit='0' AND periodo_tit='$periodo' ") or die (mysql_error());
								$cuentasin=mysql_result($consultasin, 0);
							$consultasin1=mysql_query("SELECT COUNT(formulario.matricula) FROM formulario inner join formulario_cat on formulario.matricula=formulario_cat.matricula where (formulario.sinprop1='$noper' or formulario.sinprop2='$noper')  and tit='0'") or die (mysql_error());
								$cuentasin1=mysql_result($consultasin1, 0);
							$totsin=$cuentasin + $cuentasin1;
							$consultatot=mysql_query("SELECT COUNT(formulario.matricula) FROM formulario inner join formulario_er on formulario.matricula=formulario_er.matricula where (formulario.director='$noper' or formulario.sinprop1='$noper' or formulario.sinprop2='$noper')  and formulario_er.submodalidad='Trabajo' and tit='0' AND periodo_tit='$periodo'") or die (mysql_error());
								$cuentatot=mysql_result($consultatot, 0);
							$consultatot1=mysql_query("SELECT COUNT(formulario.matricula) FROM formulario inner join formulario_cat on formulario.matricula=formulario_cat.matricula where (formulario.director='$noper' or formulario.sinprop1='$noper' or formulario.sinprop2='$noper')  and tit='0' AND periodo_tit='$periodo'") or die (mysql_error());
								$cuentatot1=mysql_result($consultatot1, 0);
							$totTodos=$cuentatot + $cuentatot1;
		?>
		<td class="textfiltab"><?php echo $maestro; ?></td>
		<td class="textfiltab"><?php echo $puesto; ?></td>
		<td class="textfiltab"><?php echo $alumno; ?></td>
		<td class="textfiltab"><?php echo $tipo; ?></td>
		<td class="textfiltab"><?php echo $totdir; ?></td>
		<td class="textfiltab"><?php echo $totsin; ?></td>
		<td class="textfiltab"><?php echo $totTodos; ?></td>
		<td class="textfiltab"><a href="aceptar.php? matricula=<?php echo $matricula; ?>&puesto=<?php echo $puesto; ?>& noper=<?php echo $noper; ?>"><img src="../../Imagenes/nombramiento-bola-cute-icono-9008-48.png" height="30" width="30" title="Aceptar"></a></td>
		<td class="textfiltab"><a href="rechazar.php? matricula=<?php echo $matricula; ?>&puesto=<?php echo $puesto; ?>& noper=<?php echo $noper; ?>"><img src="../../Imagenes/cerrar-icono-6036-48.png" height="30" width="30" title="Rechazar"></a></td>
	</tr>
	<?php } ?>
</table>
<?php
}else{
	echo "No hay autorizaciones pendientes";
}
?>












			</section>	
			
		
		</section>

	</section>



<footer id="pie_pagina">
	<?php include ('../../Includes/pie_pagina.php'); ?>
</footer>

</body>
<?php
}else{
	session_destroy();
?>
	<script type="text/javascript">
		document.location.href=("../index.php? var=0");
	</script>
<?php } ?>
<?php
}else{ session_destroy(); ?>
	<script type="text/javascript">
		document.location.href=("../cat.html");
	</script>
<?php } ?>
</html>
