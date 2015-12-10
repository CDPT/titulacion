<?php session_start(); if($_SESSION['estatus']=='1'){
error_reporting(0);
include("../Scripts/conexion.php");	?>
<!DOCTYPE html>
<html>
<head>
	
	<?php $sistema="EXP"; include('../Includes/ruta.php'); include('../Includes/title.php');  ?>
	<script type="text/javascript" src="../Scripts/FuncionesAjax.js"></script>
	<script type="text/javascript" src="../Scripts/FuncionesjQuery.js"></script>


	<meta name="author" content="Víctor Javier Báez Morales">
	<meta charset="utf-8" lang="esp" http-equiv="Content-Type" content="text/html;">
	<meta name="keywords" lang="es" content="CAT, Centro, Apoyo, Titulación">
	<script src="../Scripts/jquery.js" type="text/javascript"></script>  
	<link href="../Estilos/estilo_global.css" rel="stylesheet" type="text/css"/>
	<style type="text/css">
		#op1{
					background:#044b89;
					border-radius:0px 0px 10px 10px;
					border:3px solid #033663;
					font-weight: bold;
					box-shadow: 0 0 7px 1px #9dcaf1;
		}
	</style>


</head>


<body  oncontextmenu="return false">

	<section id="global">

		<header id="baner">
			<?php include ("../Includes/header.php"); ?>

			        <aside id="engloba_notificacion">
			            <aside id="notificaciones">
			            	
		<?php		            	
    	  $tipo=$_SESSION['nick'];
            if($tipo != true){
			session_destroy();
			header("Location:../index.php");
			}
		?>
							<?php include ('../Includes/salir.php'); ?>
						</aside>
					</asid>

			</header>

		<nav id="global_menu">
			<nav id="marco_menu">
				<ul>
					<?php include ("../Menus/menu_administrador.php"); ?>

				</ul>
			</nav>
		</nav>


		<section id="engloba_cuerpo">
			<section id="cuerpo">

              <?php include ("../Vista/vista.php"); ?>


			</section>	
		</section>

	</section>

<footer id="pie_pagina">
<?php include ('../Includes/pie_pagina.php'); ?>	
</footer>

</body>
</html>
<?php
}else{ session_destroy(); ?>
	<script type="text/javascript">
		document.location.href=("../experiencia.html");
	</script>
<?php } ?>