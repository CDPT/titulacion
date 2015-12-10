<?php 	
	session_start();
	error_reporting(0);

if($_SESSION['estatus']=='1'){
			include("../../Scripts/conexion.php");
		

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



<link href="../Estilos/estilo_alumno.css" rel="stylesheet" type="text/css"/>

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

		.subtit{
			width:auto;
			height:auto;
			background:#005baa;
			color: #fff;
			border-radius:5px 5px 5px 5px;
			
			box-shadow:0px 0px 6px 2px #83aed3;
		}

		#regresar{
			float:left;
		}

	</style>


</head>

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
	<?php

	 !@$matricula=$_REQUEST['matricula'];
     !@$nombre=$_REQUEST['nombre'];
     !@$apepat=$_REQUEST['apepat'];
     !@$apemat=$_REQUEST['apemat']; 
     !@$carrera=$_REQUEST['carrera'];
     
print '<section id="titformulintro">';	 
print "Expediente de :<strong> ".$nombre." ".$apepat." ".$apemat." "." Con Matricula"." ".$matricula."</strong>";
print '</section>';
	?>			




<table>
	<tr>

		<td> 
			<form method="post" action="Formularios/formulario_completo.php">
		        <input type="hidden" value="<?php print $matricula; ?>" name="matricula">				
				<section class="borde">
					<input type="image" src="../../Imagenes/alumnos/editar.png" alt="" width="125" height="125"/></a> 
				</section>
				<section class="subtit">Editar Datos </section>
			</form>
		</td>



		<td>
			<form method="post" action="Pagos/index.php">
				<input type="hidden" value="<?php print $matricula; ?>" name="matricula">
			<!--<a href="Pagos/index.php? matricula=<?php print $matricula; ?>">-->
				<section class="borde">
			   		<input type="image" src="../../Imagenes/alumnos/pago.png" alt="" width="125" height="125"/> 
			   	</section>
			   	<section class="subtit">Pagos de Alumno</section>
		   <!--	</a>-->
		   	</form>
		</td>



		<td>
		<form method="post" action="Impresiones/index.php">
			<!--<a href="Impresiones/index.php? matricula=<?php print $matricula; ?>">-->
				<input type="hidden" value="<?php print $matricula; ?>" name="matricula">
				<section class="borde">
			    	<input type="image" src="../../Imagenes/alumnos/impresora.png" alt="" width="125" height="125"/> 
			    </section>
			    	<section class="subtit">Imprimir Formatos</section>
		  	<!--</a>  -->
		  	</form> 
		</td>
	</tr>

</table>
<br>
<table>
	<tr>
		<td> </td>
		<td> </td>
		<td> </td>
		<td> </td>
		<td> </td>
		<td> </td>
		<td> </td>
		<td> </td>
		<td> </td>
		<td> </td>
		<td> </td>
		<td> </td>
		<td>
			<form method="post" action="Listado/elimina_alumlista.php">
				<!--<a href="Impresiones/index.php? matricula=<?php print $matricula; ?>">-->
					<input type="hidden" value="<?php print $matricula; ?>" name="matricula">
					<section class="borde">
				    	<input type="image" src="../../Imagenes/alumnos/trash.png" alt="" width="25" height="25"/> 
				    </section>
				    	<section class="subtit">Eliminar Alumno</section>
			  	<!--</a>  -->
		 	 	</form> 
		</td>
	</tr>
</table>






<form id="regresar" method="post" action="Listado/index.php">
  <input src="../../Imagenes/flecha_iz.png" type="image" value="Regresar"/>
</form>






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
