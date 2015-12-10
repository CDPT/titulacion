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
			            	<?php include ('../../Includes/salir.php'); ?>
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
			<?php 
			if($dir[1]=="pen"){
				$consumaestro=mysql_query("SELECT * FROM profesor WHERE no_personal='$dir[0]'") or die ("no se puede");
				$fimaestro=mysql_fetch_array($consumaestro);
				$app=$fimaestro['apellido_paterno'];
				$apm=$fimaestro['apellido_materno'];
				$nommat=$fimaestro['nombre'];
				$maestro=$app." ".$apm." ".$nommat;
				$puesto="Director";

							$consulta1=mysql_query("SELECT COUNT(formulario.matricula) FROM formulario inner join formulario_er on formulario.matricula=formulario_er.matricula where formulario.director='$dir[0]' and formulario_er.submodalidad='Trabajo' and tit='0' AND periodo_tit='$periodo'") or die (mysql_error());
								$cuentadir=mysql_result($consulta1, 0);
							$consulta11=mysql_query("SELECT COUNT(formulario.matricula) FROM formulario inner join formulario_cat on formulario.matricula=formulario_cat.matricula where formulario.director='$dir[0]'  and tit ='0' AND periodo_tit='$periodo'") or die (mysql_error());
								$cuentadir1=mysql_result($consulta11, 0);	
							$totdir=$cuentadir	+ $cuentadir1;

							$consultasin=mysql_query("SELECT COUNT(formulario.matricula) FROM formulario inner join formulario_er on formulario.matricula=formulario_er.matricula where (formulario.sinprop1='$dir[0]' or formulario.sinprop2='$dir[0]')  and formulario_er.submodalidad='Trabajo' and tit='0' AND periodo_tit='$periodo' ") or die (mysql_error());
								$cuentasin=mysql_result($consultasin, 0);
							$consultasi1=mysql_query("SELECT COUNT(formulario.matricula) FROM formulario inner join formulario_cat on formulario.matricula=formulario_cat.matricula where (formulario.sinprop1='$dir[0]' or formulario.sinprop2='$dir[0]')  and tit='0'") or die (mysql_error());
								$cuentasi1=mysql_result($consultasi1, 0);
							$totsin=$cuentasin + $cuentasi1;

							$consultatot=mysql_query("SELECT COUNT(formulario.matricula) FROM formulario inner join formulario_er on formulario.matricula=formulario_er.matricula where (formulario.director='$dir[0]' or formulario.sinprop1='$dir[0]' or formulario.sinprop2='$dir[0]')  and formulario_er.submodalidad='Trabajo' and tit='0' AND periodo_tit='$periodo'") or die (mysql_error());
								$cuentatot=mysql_result($consultatot, 0);
							$consultato1=mysql_query("SELECT COUNT(formulario.matricula) FROM formulario inner join formulario_cat on formulario.matricula=formulario_cat.matricula where (formulario.director='$dir[0]' or formulario.sinprop1='$dir[0]' or formulario.sinprop2='$dir[0]')  and tit='0' AND periodo_tit='$periodo'") or die (mysql_error());
								$cuentato1=mysql_result($consultato1, 0);
							$totTodos=$cuentatot + $cuentato1;
			}
			if ($sp1[1]=="pen"){
				$consumaestro1=mysql_query("SELECT * FROM profesor WHERE no_personal='$sp1[0]'") or die ("no se puede");
				$fimaestro1=mysql_fetch_array($consumaestro1);
				$app1=$fimaestro1['apellido_paterno'];
				$apm1=$fimaestro1['apellido_materno'];
				$nommat1=$fimaestro1['nombre'];
				$maestro1=$app1." ".$apm1." ".$nommat1;
				$puesto1="Sinodal Propietario 1";

							$consu1=mysql_query("SELECT COUNT(formulario.matricula) FROM formulario inner join formulario_er on formulario.matricula=formulario_er.matricula where formulario.director='$sp1[0]' and formulario_er.submodalidad='Trabajo' and tit='0' AND periodo_tit='$periodo'") or die (mysql_error());
								$cuenta_dir1=mysql_result($consu1, 0);
							$consu11=mysql_query("SELECT COUNT(formulario.matricula) FROM formulario inner join formulario_cat on formulario.matricula=formulario_cat.matricula where formulario.director='$sp1[0]'  and tit ='0' AND periodo_tit='$periodo'") or die (mysql_error());
								$cuenta_dir11=mysql_result($consu11, 0);	
							$totdir1=$cuenta_dir1+ $cuenta_dir11;

							$consultasin1=mysql_query("SELECT COUNT(formulario.matricula) FROM formulario inner join formulario_er on formulario.matricula=formulario_er.matricula where (formulario.sinprop1='$sp1[0]' or formulario.sinprop2='$sp1[0]')  and formulario_er.submodalidad='Trabajo' and tit='0' AND periodo_tit='$periodo' ") or die (mysql_error());
								$cuentasin1=mysql_result($consultasin1, 0);
							$consultasi11=mysql_query("SELECT COUNT(formulario.matricula) FROM formulario inner join formulario_cat on formulario.matricula=formulario_cat.matricula where (formulario.sinprop1='$sp1[0]' or formulario.sinprop2='$sp1[0]')  and tit='0'") or die (mysql_error());
								$cuentasi11=mysql_result($consultasi11, 0);
							$totsin1=$cuentasin1 + $cuentasi11;

							$consultatot1=mysql_query("SELECT COUNT(formulario.matricula) FROM formulario inner join formulario_er on formulario.matricula=formulario_er.matricula where (formulario.director='$sp1[0]' or formulario.sinprop1='$sp1[0]' or formulario.sinprop2='$sp1[0]')  and formulario_er.submodalidad='Trabajo' and tit='0' AND periodo_tit='$periodo'") or die (mysql_error());
								$cuentatot1=mysql_result($consultatot1, 0);
							$consultato11=mysql_query("SELECT COUNT(formulario.matricula) FROM formulario inner join formulario_cat on formulario.matricula=formulario_cat.matricula where (formulario.director='$sp1[0]' or formulario.sinprop1='$sp1[0]' or formulario.sinprop2='$sp1[0]')  and tit='0' AND periodo_tit='$periodo'") or die (mysql_error());
								$cuentato11=mysql_result($consultato11, 0);
							$totTodos1=$cuentatot1+$cuentato11;


			}
			if ($sp2[1]=="pen"){
				$consumaestro2=mysql_query("SELECT * FROM profesor WHERE no_personal='$sp2[0]'") or die ("no se puede");
				$fimaestro2=mysql_fetch_array($consumaestro2);
				$app2=$fimaestro2['apellido_paterno'];
				$apm2=$fimaestro2['apellido_materno'];
				$nommat2=$fimaestro2['nombre'];
				$maestro2=$app2." ".$apm2." ".$nommat2;
				$puesto2="Sinodal Propietario 2";

							$consu2=mysql_query("SELECT COUNT(formulario.matricula) FROM formulario inner join formulario_er on formulario.matricula=formulario_er.matricula where formulario.director='$sp2[0]' and formulario_er.submodalidad='Trabajo' and tit='0' AND periodo_tit='$periodo'") or die (mysql_error());
								$cuenta_dir2=mysql_result($consu2, 0);
							$consu22=mysql_query("SELECT COUNT(formulario.matricula) FROM formulario inner join formulario_cat on formulario.matricula=formulario_cat.matricula where formulario.director='$sp2[0]'  and tit ='0' AND periodo_tit='$periodo'") or die (mysql_error());
								$cuenta_dir22=mysql_result($consu22, 0);	
							$totdir2=$cuenta_dir2+ $cuenta_dir22;

							$consultasin2=mysql_query("SELECT COUNT(formulario.matricula) FROM formulario inner join formulario_er on formulario.matricula=formulario_er.matricula where (formulario.sinprop1='$sp2[0]' or formulario.sinprop2='$sp2[0]')  and formulario_er.submodalidad='Trabajo' and tit='0' AND periodo_tit='$periodo' ") or die (mysql_error());
								$cuentasin2=mysql_result($consultasin2, 0);
							$consultasi22=mysql_query("SELECT COUNT(formulario.matricula) FROM formulario inner join formulario_cat on formulario.matricula=formulario_cat.matricula where (formulario.sinprop1='$sp2[0]' or formulario.sinprop2='$sp2[0]')  and tit='0'") or die (mysql_error());
								$cuentasi22=mysql_result($consultasi22, 0);
							$totsin2=$cuentasin2 + $cuentasi22;

							$consultatot2=mysql_query("SELECT COUNT(formulario.matricula) FROM formulario inner join formulario_er on formulario.matricula=formulario_er.matricula where (formulario.director='$sp2[0]' or formulario.sinprop1='$sp2[0]' or formulario.sinprop2='$sp2[0]')  and formulario_er.submodalidad='Trabajo' and tit='0' AND periodo_tit='$periodo'") or die (mysql_error());
								$cuentatot2=mysql_result($consultatot2, 0);
							$consultato22=mysql_query("SELECT COUNT(formulario.matricula) FROM formulario inner join formulario_cat on formulario.matricula=formulario_cat.matricula where (formulario.director='$sp2[0]' or formulario.sinprop1='$sp2[0]' or formulario.sinprop2='$sp2[0]')  and tit='0' AND periodo_tit='$periodo'") or die (mysql_error());
								$cuentato22=mysql_result($consultato22, 0);
							$totTodos2=$cuentatot2+$cuentato22;

			}
			if ($sup1[1]=="pen"){
				$consumaestro3=mysql_query("SELECT * FROM profesor WHERE no_personal='$sup1[0]'") or die ("no se puede");
				$fimaestro3=mysql_fetch_array($consumaestro3);
				$app3=$fimaestro3['apellido_paterno'];
				$apm3=$fimaestro3['apellido_materno'];
				$nommat3=$fimaestro3['nombre'];
				$maestro3=$app3." ".$apm3." ".$nommat3;
				$puesto3="Sinodal Suplente 1";

							$consu3=mysql_query("SELECT COUNT(formulario.matricula) FROM formulario inner join formulario_er on formulario.matricula=formulario_er.matricula where formulario.director='$sup1[0]' and formulario_er.submodalidad='Trabajo' and tit='0' AND periodo_tit='$periodo'") or die (mysql_error());
								$cuenta_dir3=mysql_result($consu3, 0);
							$consu33=mysql_query("SELECT COUNT(formulario.matricula) FROM formulario inner join formulario_cat on formulario.matricula=formulario_cat.matricula where formulario.director='$sup1[0]'  and tit ='0' AND periodo_tit='$periodo'") or die (mysql_error());
								$cuenta_dir33=mysql_result($consu33, 0);	
							$totdir3=$cuenta_dir3+ $cuenta_dir33;

							$consultasin3=mysql_query("SELECT COUNT(formulario.matricula) FROM formulario inner join formulario_er on formulario.matricula=formulario_er.matricula where (formulario.sinprop1='$sup1[0]' or formulario.sinprop2='$sup1[0]')  and formulario_er.submodalidad='Trabajo' and tit='0' AND periodo_tit='$periodo' ") or die (mysql_error());
								$cuentasin3=mysql_result($consultasin3, 0);
							$consultasi33=mysql_query("SELECT COUNT(formulario.matricula) FROM formulario inner join formulario_cat on formulario.matricula=formulario_cat.matricula where (formulario.sinprop1='$sup1[0]' or formulario.sinprop2='$sup1[0]')  and tit='0'") or die (mysql_error());
								$cuentasi33=mysql_result($consultasi33, 0);
							$totsin3=$cuentasin3 + $cuentasi33;

							$consultatot3=mysql_query("SELECT COUNT(formulario.matricula) FROM formulario inner join formulario_er on formulario.matricula=formulario_er.matricula where (formulario.director='$sup1[0]' or formulario.sinprop1='$sup1[0]' or formulario.sinprop2='$sup1[0]')  and formulario_er.submodalidad='Trabajo' and tit='0' AND periodo_tit='$periodo'") or die (mysql_error());
								$cuentatot3=mysql_result($consultatot3, 0);
							$consultato33=mysql_query("SELECT COUNT(formulario.matricula) FROM formulario inner join formulario_cat on formulario.matricula=formulario_cat.matricula where (formulario.director='$sup1[0]' or formulario.sinprop1='$sup1[0]' or formulario.sinprop2='$sup1[0]')  and tit='0' AND periodo_tit='$periodo'") or die (mysql_error());
								$cuentato33=mysql_result($consultato33, 0);
							$totTodos3=$cuentatot3+$cuentato33;
			}
			if ($sup2[1]=="pen"){
				$consumaestro4=mysql_query("SELECT * FROM profesor WHERE no_personal='$sup2[0]'") or die ("no se puede");
				$fimaestro4=mysql_fetch_array($consumaestro);
				$app4=$fimaestro4['apellido_paterno'];
				$apm4=$fimaestro4['apellido_materno'];
				$nommat4=$fimaestro4['nombre'];
				$maestro4=$app4." ".$apm4." ".$nommat4;
				$puesto4="Sinodal Suplente 2";

							$consu4=mysql_query("SELECT COUNT(formulario.matricula) FROM formulario inner join formulario_er on formulario.matricula=formulario_er.matricula where formulario.director='$sup2[0]' and formulario_er.submodalidad='Trabajo' and tit='0' AND periodo_tit='$periodo'") or die (mysql_error());
								$cuenta_dir4=mysql_result($consu4, 0);
							$consu44=mysql_query("SELECT COUNT(formulario.matricula) FROM formulario inner join formulario_cat on formulario.matricula=formulario_cat.matricula where formulario.director='$sup2[0]'  and tit ='0' AND periodo_tit='$periodo'") or die (mysql_error());
								$cuenta_dir44=mysql_result($consu44, 0);	
							$totdir4=$cuenta_dir4+ $cuenta_dir44;

							$consultasin4=mysql_query("SELECT COUNT(formulario.matricula) FROM formulario inner join formulario_er on formulario.matricula=formulario_er.matricula where (formulario.sinprop1='$sup2[0]' or formulario.sinprop2='$sup2[0]')  and formulario_er.submodalidad='Trabajo' and tit='0' AND periodo_tit='$periodo' ") or die (mysql_error());
								$cuentasin4=mysql_result($consultasin4, 0);
							$consultasi44=mysql_query("SELECT COUNT(formulario.matricula) FROM formulario inner join formulario_cat on formulario.matricula=formulario_cat.matricula where (formulario.sinprop1='$sup2[0]' or formulario.sinprop2='$sup2[0]')  and tit='0'") or die (mysql_error());
								$cuentasi44=mysql_result($consultasi44, 0);
							$totsin4=$cuentasin4 + $cuentasi44;

							$consultatot4=mysql_query("SELECT COUNT(formulario.matricula) FROM formulario inner join formulario_er on formulario.matricula=formulario_er.matricula where (formulario.director='$sup2[0]' or formulario.sinprop1='$sup2[0]' or formulario.sinprop2='$sup2[0]')  and formulario_er.submodalidad='Trabajo' and tit='0' AND periodo_tit='$periodo'") or die (mysql_error());
								$cuentatot4=mysql_result($consultatot4, 0);
							$consultato44=mysql_query("SELECT COUNT(formulario.matricula) FROM formulario inner join formulario_cat on formulario.matricula=formulario_cat.matricula where (formulario.director='$sup2[0]' or formulario.sinprop1='$sup2[0]' or formulario.sinprop2='$sup2[0]')  and tit='0' AND periodo_tit='$periodo'") or die (mysql_error());
								$cuentato44=mysql_result($consultato44, 0);
							$totTodos4=$cuentatot4+$cuentato44;
			} 
 ?>

		<?php 
			if ($dir[1]=="pen"){?>
				<tr class="cont_tabla">
					<td class="textfiltab"><?php echo $dir[0]; ?></td>
					<td class="textfiltab"><?php echo $maestro; ?></td>
					<td class="textfiltab"><?php echo $puesto; ?></td>
					<td class="textfiltab"><?php echo $alumno; ?></td>
					<td class="textfiltab"><?php echo $tipo; ?></td>
					<td class="textfiltab"><?php echo $totdir; ?></td>
					<td class="textfiltab"><?php echo $totsin; ?></td>
					<td class="textfiltab"><?php echo $totTodos; ?></td>
					<td class="textfiltab"><a href="aceptar.php? matricula=<?php echo $matricula; ?>&puesto=<?php echo $puesto; ?>& noper=<?php echo $dir[0]; ?>"><img src="../../Imagenes/nombramiento-bola-cute-icono-9008-48.png" height="30" width="30" title="Aceptar"></a></td>
					<td class="textfiltab"><a href="rechazar.php? matricula=<?php echo $matricula; ?>&puesto=<?php echo $puesto; ?>& noper=<?php echo $dir[0]; ?>"><img src="../../Imagenes/cerrar-icono-6036-48.png" height="30" width="30" title="Rechazar"></a></td>
				</tr>
		<?php } ?>

		<?php
			if ($sp1[1]=="pen"){?>
				<tr class="cont_tabla">
					<td class="textfiltab"><?php echo $sp1[0]; ?></td>
					<td class="textfiltab"><?php echo $maestro1; ?></td>
					<td class="textfiltab"><?php echo $puesto1; ?></td>
					<td class="textfiltab"><?php echo $alumno; ?></td>
					<td class="textfiltab"><?php echo $tipo; ?></td>
					<td class="textfiltab"><?php echo $totdir1; ?></td>
					<td class="textfiltab"><?php echo $totsin1; ?></td>
					<td class="textfiltab"><?php echo $totTodos1; ?></td>
					<td class="textfiltab"><a href="aceptar.php? matricula=<?php echo $matricula; ?>&puesto=<?php echo $puesto1; ?>& noper=<?php echo $sp1[0]; ?>"><img src="../../Imagenes/nombramiento-bola-cute-icono-9008-48.png" height="30" width="30" title="Aceptar"></a></td>
					<td class="textfiltab"><a href="rechazar.php? matricula=<?php echo $matricula; ?>&puesto=<?php echo $puesto1; ?>& noper=<?php echo $sp1[0]; ?>"><img src="../../Imagenes/cerrar-icono-6036-48.png" height="30" width="30" title="Rechazar"></a></td>
				</tr>
		<?php } ?>

		<?php if ($sp2[1]=="pen"){?>
			<tr class="cont_tabla">
				<td class="textfiltab"><?php echo $sp2[0]; ?></td>
				<td class="textfiltab"><?php echo $maestro2; ?></td>
				<td class="textfiltab"><?php echo $puesto2; ?></td>
				<td class="textfiltab"><?php echo $alumno; ?></td>
				<td class="textfiltab"><?php echo $tipo; ?></td>
				<td class="textfiltab"><?php echo $totdir2; ?></td>
				<td class="textfiltab"><?php echo $totsin2; ?></td>
				<td class="textfiltab"><?php echo $totTodos2; ?></td>
				<td class="textfiltab"><a href="aceptar.php? matricula=<?php echo $matricula; ?>&puesto=<?php echo $puesto2; ?>& noper=<?php echo $sp2[0]; ?>"><img src="../../Imagenes/nombramiento-bola-cute-icono-9008-48.png" height="30" width="30" title="Aceptar"></a></td>
				<td class="textfiltab"><a href="rechazar.php? matricula=<?php echo $matricula; ?>&puesto=<?php echo $puesto2; ?>& noper=<?php echo $sp2[0]; ?>"><img src="../../Imagenes/cerrar-icono-6036-48.png" height="30" width="30" title="Rechazar"></a></td>
			</tr>
		<?php } ?>

		<?php if ($sup1[1]=="pen"){?>
			<tr class="cont_tabla">
				<td class="textfiltab"><?php echo $sup1[0]; ?></td>
				<td class="textfiltab"><?php echo $maestro3; ?></td>
				<td class="textfiltab"><?php echo $puesto3; ?></td>
				<td class="textfiltab"><?php echo $alumno; ?></td>
				<td class="textfiltab"><?php echo $tipo; ?></td>
				<td class="textfiltab"><?php echo $totdir3; ?></td>
				<td class="textfiltab"><?php echo $totsin3; ?></td>
				<td class="textfiltab"><?php echo $totTodos3; ?></td>
				<td class="textfiltab"><a href="aceptar.php? matricula=<?php echo $matricula; ?>&puesto=<?php echo $puesto3; ?>& noper=<?php echo $sup1[0]; ?>"><img src="../../Imagenes/nombramiento-bola-cute-icono-9008-48.png" height="30" width="30" title="Aceptar"></a></td>
				<td class="textfiltab"><a href="rechazar.php? matricula=<?php echo $matricula; ?>&puesto=<?php echo $puesto3; ?>& noper=<?php echo $noper; ?>"><img src="../../Imagenes/cerrar-icono-6036-48.png" height="30" width="30" title="Rechazar"></a></td>
			</tr>
		<?php } ?>

		<?php if ($sup2[1]=="pen"){?>
			<tr class="cont_tabla">
				<td class="textfiltab"><?php echo $sup2[0]; ?></td>
				<td class="textfiltab"><?php echo $maestro4; ?></td>
				<td class="textfiltab"><?php echo $puesto4; ?></td>
				<td class="textfiltab"><?php echo $alumno; ?></td>
				<td class="textfiltab"><?php echo $tipo; ?></td>
				<td class="textfiltab"><?php echo $totdir4; ?></td>
				<td class="textfiltab"><?php echo $totsin4; ?></td>
				<td class="textfiltab"><?php echo $totTodos4; ?></td>
			<td class="textfiltab"><a href="aceptar.php? matricula=<?php echo $matricula; ?>&puesto=<?php echo $puesto4; ?>& noper=<?php echo $sup2[0]; ?>"><img src="../../Imagenes/nombramiento-bola-cute-icono-9008-48.png" height="30" width="30" title="Aceptar"></a></td>
			<td class="textfiltab"><a href="rechazar.php? matricula=<?php echo $matricula; ?>&puesto=<?php echo $puesto4; ?>& noper=<?php echo  $sup2[0]; ?>"><img src="../../Imagenes/cerrar-icono-6036-48.png" height="30" width="30" title="Rechazar"></a></td>
		<?php } ?>

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
