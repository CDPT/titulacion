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
	<?php $sistema="CAT"; include('../../../Includes/ruta.php'); include('../../../Includes/title.php');  ?>
	<link href="../../../Estilos/estilo_global.css" rel="stylesheet" type="text/css"/>
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
		#op2{
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

		#regresar{
			float:left;
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
			include("../../../Scripts/conexion.php");
	!@$matricula=$_REQUEST['matricula'];
	$consula_submodalidad=mysql_query("SELECT * FROM formulario_er where matricula='$matricula'");
				$fila=mysql_fetch_array($consula_submodalidad);
				$submodalidad=$fila['submodalidad'];



?>
<body  oncontextmenu="return false">

	<section id="global">

		<header id="baner">
				<?php include ("../../../Includes/header.php"); ?>

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
					<?php include ("../../../Menus/menu_administrador.php"); ?>
				</ul>
			</nav>
		</nav>



		<section id="engloba_cuerpo">

			<section id="cuerpo">

				<form id="regresar" method="post" action="../index.php">
				  <input src="../../../Imagenes/regresar.png" type="image" value="Regresar"/>
				</form>

<table>
	<tr>
		
		<td> 
			<form method="post" action="Jurado/AsignacionJurado.php" target="_blank">
				<input type="hidden" value="<?php print $matricula; ?>" name="matricula">
				<section class="borde">
			   		<input type="image" src="../../../Imagenes/reportes2.png" alt="" width="125" height="125"/> 
			   	</section>
			   	<section class="subtit">Asignación de Jurado</section>
		   	</form>

		</td>
		
		<td>
			<form method="post" action="Carta/CartaCompromiso.php" target="_blank">
				<input type="hidden" value="<?php print $matricula; ?>" name="matricula">
				<section class="borde">
			   		<input type="image" src="../../../Imagenes/reportes2.png" alt="" width="125" height="125"/> 
			   	</section>
			   	<section class="subtit">Carta Compromiso</section>
		   	</form>
		</td>

		<td>
			<form method="post" action="Ficha/FichaInformativa.php" target="_blank">
				<input type="hidden" value="<?php print $matricula; ?>" name="matricula">
				<section class="borde">
			   		<input type="image" src="../../../Imagenes/reportes2.png" alt="" width="125" height="125"/> 
			   	</section>
			   	<section class="subtit">Ficha Informativa</section>
		   	</form>
		</td>
		
	</tr>


</table>












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
		document.location.href=("../../index.php? var=0");
	</script>
</html>
<?php } ?>