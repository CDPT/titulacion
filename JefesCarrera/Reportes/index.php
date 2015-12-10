<?php 	
	session_start();
	error_reporting(0);
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="author" content="Angel Antonio Contreras Moctezuma">
	<meta charset="utf-8" lang="esp" http-equiv="Content-Type" content="text/html;">
	<meta name="keywords" lang="es" content="CAT, Centro, Apoyo, Titulación">
	<?php $sistema="JEFE"; include('../../Includes/ruta.php'); include('../../Includes/title.php');  ?>
	<link href="../../Estilos/estilo_global.css" rel="stylesheet" type="text/css"/>
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
		#op9{
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

<table>
	<tr>

		<td> 
			<a href="Reportes_Alumnos/index.php">
				<section class="borde">
					<img src="../../Imagenes/reportes5.png" alt="" width="125" height="125"/></a> 
				</section>
				<section class="subtit">Reportes Estudiantes</section>
			</a>
		</td>



		<td>
			<a href="Reportes_Maestros/index.php">
				<section class="borde">
			   		<img src="../../Imagenes/reportes4.png" alt="" width="125" height="125"/> 
			   	</section>
			   	<section class="subtit" >Reportes Maestros</section>
		   	</a>
		</td>

		<td>
			<a href="Reportes_General/index.php">
				<section class="borde">
			   		<img src="../../Imagenes/reportes1.png" alt="" width="125" height="125"/> 
			   	</section>
			   	<section class="subtit" >Reporte General</section>
		   	</a>
		</td>

		<td>
			<a href="Reportes_Titulados/index.php">
				<section class="borde">
			   		<img src="../../Imagenes/reportes3.png" alt="" width="125" height="125"/> 
			   	</section>
			   	<section class="subtit" >Reporte de Titulados</section>
		   	</a>
		</td>
	</tr>

	<tr>
		

	</tr>


		



</table>












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
</html>
<?php } ?>