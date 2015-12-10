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
	<script type="text/javascript" src="../../Scripts/FuncionesAjax.js"></script>
	<script type="text/javascript" src="../../Scripts/FuncionesjQuery.js"></script>



		<link href="../Estilos/estilo_maestro.css" rel="stylesheet" type="text/css"/>

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
	session_start();

		

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
  NUEVO REGISTRO DE MAESTRO
</section>

<section id="formulario_datos">				
  <fieldset id="fieldset_datos">
    <legend class="legendform">Datos</legend>
				<form method="post" action="guarda_maestro.php">
					<table class="tabla_form">

						<tr>
							<td class="titform">No_Personal</td>
							<td><input type="number" maxlength="10" class="textform" name="nopersonal" onkeyUp="return ValNumero(this);" /></td>
						</tr>					

						<tr>
							<td class="titform">Nombre</td>
							<td><input class="textform" name="nombre" type="text" required  maxlength="30" /></td>
						</tr>

						<tr>
							<td class="titform">Apellido Paterno</td>
							<td><input class="textform" type="text" name="apepat" required  maxlength="30" /></td>
						</tr>

						<tr>
							<td class="titform">Apellido Materno</td>
							<td><input class="textform" name="apemat" type="text" maxlength="30" /></td>
						</tr>	

						<tr>
							<td class="titform">Correo</td>
							<td><input class="textform" name="correo" type="email" maxlength="50" /></td>
						</tr>

						<tr>
							<td class="titform">Teléfono</td>
							<td><input class="textform" name="telefono" type="number" maxlength="15" onkeyUp="return ValNumero(this);" /></td>
						</tr>

						<tr>
							<td></td>
							<td><input type="submit"/></td>
						</tr>					
					</table>
				</form>
  </fieldset>
</section>







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
