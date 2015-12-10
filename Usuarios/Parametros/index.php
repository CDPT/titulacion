<?php 	
	session_start();
	error_reporting(0);
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="author" content="Víctor Javier Báez Morales">
	<meta charset="utf-8" lang="esp" http-equiv="Content-Type" content="text/html;">
	<meta name="keywords" lang="es" content="CAT, Centro, Apoyo, Titulación">

	<link href="../../Estilos/estilo_global.css" rel="stylesheet" type="text/css"/>

	<?php $sistema="CAT"; include('../../Includes/ruta.php'); include('../../Includes/title.php');  ?>
	<style type="text/css">
		#op5{
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
			padding: 0px 30px 80px 30px;
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
					<?php include ("../../Menus/menu_usuarios.php"); ?>
				</ul>
			</nav>
		</nav>



		<section id="engloba_cuerpo">

			<section id="cuerpo">

<table>
	<tr>

		<td> 
			<a href="Grupos/listado_grupos.php">
				<section class="borde">
					<img src="../../Imagenes/cursos.png" alt="" width="125" height="125"/></a> 
				</section>
				<section class="subtit">Grupos</section>
			</a>
		</td>



		<td>
			<a href="Periodos/listado_periodos.php">
				<section class="borde">
			   		<img src="../../Imagenes/periodos.png" alt="" width="125" height="125"/> 
			   	</section>
			   	<section class="subtit" >Periodos</section>
		   	</a>
		</td>


		<td>
			<a href="Cuotas/listado_cuotas.php">
				<section class="borde">
			   		<img src="../../Imagenes/cuotas.png" alt="" width="125" height="125"/> 
			   	</section>
			   	<section class="subtit" >Cuotas</section>
		   	</a>
		</td>
	</tr>

	<tr>
	</tr>


		<td> 
			<a href="Salones/listado_salones.php">
				<section class="borde">
			    	<img src="../../Imagenes/edificio.jpg" alt="" width="125" height="125"/> 
			    </section>
			    	<section class="subtit">Salones</section>
		  	</a>  
		</td>

		<td> 
			<a href="Modalidad/listado_modalidad.php">
				<section class="borde">
			    	<img src="../../Imagenes/modalidad.png" alt="" width="125" height="125"/> 
			    </section>
			    	<section class="subtit">Modalidad</section>
		  	</a>  
		</td>


		<td> 
			<a href="Licenciaturas/listado_licenciaturas.php">
				<section class="borde">
			    	<img src="../../Imagenes/licenciaturas.png" alt="" width="150" height="125"/> 
			    </section>
			    	<section class="subtit">Licenciaturas</section>
		  	</a>  
		</td>			


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
		document.location.href=("../../index.html? var=0");
	</script>
<?php } ?>
</html>
