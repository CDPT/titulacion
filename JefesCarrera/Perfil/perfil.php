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
	<script src="../../Scripts/jquery.js" type="text/javascript"></script> 
<link href="../Estilos/estilo_alumno.css" rel="stylesheet" type="text/css"/>

	<?php $sistema="JEFE"; include('../../Includes/ruta.php'); include('../../Includes/title.php');  ?>
	<script type="text/javascript" src="../../Scripts/FuncionesAjax.js"></script>
	<script type="text/javascript" src="../../Scripts/FuncionesjQuery.js"></script>

	<style type="text/css">
		#op8{
					background:#044b89;
					border-radius:0px 0px 10px 10px;
					border:3px solid #033663;
					font-weight: bold;
					box-shadow: 0 0 7px 1px #9dcaf1;
		}
	</style>

</head>

<?php
if($_SESSION['estatus']=='1'){
			include("../../Scripts/conexion.php");		
?>
<body  oncontextmenu="return false">

	<section id="global">

		<header id="baner">
			<?php include ("../../Includes/header.php"); ?> 

			        <aside id="engloba_notificacion">
			        	<?php include ('../../../Includes/salir.php'); ?>
			       	<aside id="notificaciones">

		<?php			            	
    	  $tipo=$_SESSION['nick'];
            if($tipo != true){
			session_destroy();
?>
			<script type="text/javascript">
				document.location.href=("../../index.php");
			</script>
<?php
			}
		?>
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




	<center>
		<legend>
	    	<img src="../../Imagenes/perfil.png"><br><br><br>
	    </legend>
	</center>

<fieldset id="fieldset_datos">



<?php

$usu=$_SESSION['usu'];

	$consulta=mysql_query("SELECT * FROM usuarios WHERE tipo='Administrador' AND usuario='$usu' ");
	while ($fila=mysql_fetch_array($consulta)) {
					$id=$fila['id_usuario'];
					$usuario=$fila['usuario'];
					$password=$fila['password'];
					$tipo=$fila['tipo'];
					$estatus=$fila['estatus'];
					$permiso=$fila['permiso'];
					$nombre=$fila['nombre'];
					$nick=$fila['nick'];
	}
?>			<form id="formperfil" name="formperfil" method="post" action="edita_perfil.php">
			<table>
				<tr>

				</tr>
				<tr><input type="hidden" id="id" name="id"  value="<?php print $id; ?>" >
					<td><label>Nombre</label></td>
					<td>
						<!--<input type="text" name="nombre" value="<?php// print $nombre: ?>"/>-->
						<?php print $nombre ?>
					</td>	

				</tr>

				<tr>
					<td><label>Usuario</label></td>
					<td>
						<!--<input type="text" name="usuario" value="<?php // print $usuario ?>" />-->
						<?php print $usuario; ?>
					</td>	
				</tr>


				<tr>
					<!--
					<td><label>Password</label></td>
					<td><input type="text" name="password" value="<?php //print $password ?>" /></td>-->
				</tr>

				<tr>
					<td><label>Tipo</label></td>
					<td><?php print $tipo ?></td>
				</tr>

				<tr>
					<td><label>Nick</label></td>
					<td><input type="text" name="nick" value="<?php print $nick ?>" maxlength="10"/></td>
				</tr>
				<tr>
					<td>
						
							<input type="submit" value="Editar NICK" />
						
					</td>
					
				</tr>
			</table>
		</form>

</fieldset>	



		</section>	
			
		
		</section>

	</section>


<section id="transaccion"></section>


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
