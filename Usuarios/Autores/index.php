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





	<style type="text/css">

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
					<?php include ("../../Menus/menu_usuarios.php"); ?>
				</ul>
			</nav>
		</nav>


		<section id="engloba_cuerpo">

			<section id="cuerpo">
				


<table>
	<tr>
		<center><h1> Autores </h1></center>	<br>
	</tr>


	<tr>
		<td> <br>
			<img src="../../Imagenes/javier.png">
		</td>

		<td> <br>
			Víctor Javier Báez Morales</br>
			Lic. Sistemas Computacionales Administratívos</br>
		</td>

		<td> <br>
			<a href="https://www.facebook.com/Ja.BaH3" title="Ja.BaH3" target="_blank"><img src="../../Imagenes/icon_facebook.png" width="35px" heigth="35px"></a>
			<a href="https://twitter.com/#!/@jabah3" title="@jabah3" target="_blank"><img src="../../Imagenes/icon_twitter.png" width="35px" heigth="35px"></a>
			<a href=""><img src="../../Imagenes/email.png" title="javah3@hotmail.com" width="35px" heigth="35px"></a>
		</td>

	</tr>

	<tr>
		<td> 
			<br><br><br><br>
			<img src="../../Imagenes/angel.png" with="132" height="147">
		</td>

		<td> <br><br><br><br>
			Angel Antonio Contreras Moctezuma</br>
			Lic.Sistemas Computacionales Administratívos</br>

		</td>

		<td> <br><br><br><br>
			<a href="https://www.facebook.com/angel.contreras.142" title="Angel Contreras" target="_blank"><img src="../../Imagenes/icon_facebook.png" width="35px" heigth="35px"></a>
			<img src="../../Imagenes/icon_twitter.png" width="35px" heigth="35px">
			<a href="mailto:angel.contrerasm@hotmail.com"><img src="../../Imagenes/email.png" width="35px" heigth="35px" title="angel.contrerasm@hotmail.com"></a>
		</td>
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
