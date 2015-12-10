<?php 	
	session_start();
	error_reporting(0);
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="author" content="Víctor Javier Báez Morales">
	<meta charset="utf-8" lang="es" http-equiv="Content-Type" content="text/html;">
	<meta name="keywords" lang="es" content="CAT, Centro, Apoyo, Titulación">
<script src="ajax.js" language="javascript"></script>

	<?php $sistema="CAT"; include('../../../Includes/ruta.php'); include('../../../Includes/title.php');  ?>
	<script type="text/javascript" src="../../../Scripts/FuncionesAjax.js"></script>
	<script type="text/javascript" src="../../../Scripts/FuncionesjQuery.js"></script>

    <link href="../../../Estilos/estilo_global.css" rel="stylesheet" type="text/css"/>
	<link href="../../Estilos/estilo_alumno.css" rel="stylesheet" type="text/css"/>


<script type="text/javascript" src="../../../Scripts/jquery-1.7.1.min.js"></script>


	<style type="text/css">
		#op3{
					background:#044b89;
					border-radius:0px 0px 10px 10px;
					border:3px solid #033663;
					font-weight: bold;
					box-shadow: 0 0 7px 1px #9dcaf1;
		}

	</style>


</head>

<?php
if($_SESSION['estatus']==1){
?>
<body  oncontextmenu="return false">

	<section id="global">

		<header id="baner">
			<?php include ("../../../Includes/header.php"); ?>

			        <aside id="engloba_notificacion">
			            <aside id="notificaciones">
			            	<?php include ('../../../Includes/salir.php'); ?>
						</aside>
					</asid>

			</header>

		<nav id="global_menu">
			<nav id="marco_menu">
				<ul>
				<?php include ("../../../Menus/menu_administrador.php"); ?>
				</ul>
			</nav>
		</nav>



		<section id="engloba_cuerpo">


			<section id="cuerpo">
				





<section id="titformulintro">
LISTADO DE MAESTROS DE LA UV
</section>


	
				<form method="post" id="formuldatos" name="formuldatos" action="index.php? bus=1"> 
					<label id="lbltitbusca">Buscar Maestro :</label>

					<input id="textfilbusca" type="text" id="clave" name="busca" size="20" placeholder="Introduzca Nombre" autofocus="autofocus" maxlength="15" required />
					<input src="../../../Imagenes/alumnos/iconbuscar.png" type="image"/>
				</form>  



	<section id="ta">  
  <?php
   include "genera_consulta.php"; ?>
  </section>


			</section>	
			
		
		</section>

	</section>



<footer id="pie_pagina">
<?php include ('../../../Includes/pie_pagina.php'); ?>	
</footer>

</body>
<?php
}else{
	session_destroy();
?>
	<script type="text/javascript">
		document.location.href=("../../../index.html? var=0");
	</script>
<?php } ?>
</html>
