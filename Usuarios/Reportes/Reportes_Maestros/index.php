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
	<script type="text/javascript" src="../../../Scripts/FuncionesAjax.js"></script>
	<script type="text/javascript" src="../../../Scripts/FuncionesjQuery.js"></script>


    <link href="../../../Estilos/estilo_global.css" rel="stylesheet" type="text/css"/>
	<link href="../../Estilos/estilo_alumno.css" rel="stylesheet" type="text/css"/>
	



<script src="../../../Scripts/ajax.js" language="javascript"></script>
<script type="text/javascript" src="../../../Scripts/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="../../../Scripts/jconfirmaction.jquery.js">
</script>
      <script type="text/javascript">	
	  /* preguntar si desea eliminarlo  */	
			$(document).ready(function() {
				$('.ask-custom').jConfirmAction({question : "¿Dese   Eliminarlo?", yesAnswer : "Si", cancelAnswer : "Cancelar"});
				$('.ask').jConfirmAction();
			});	
		</script>

<?php

include("../../../Scripts/conexion.php");
?>

	<style type="text/css">
		#op9{
					background:#044b89;
					border-radius:0px 0px 10px 10px;
					border:3px solid #033663;
					font-weight: bold;
					box-shadow: 0 0 7px 1px #9dcaf1;
		}


		#regresar{
		  float: left;
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

		.cuadro{
			
			padding: 0px 0px 40px 0px;
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
					<?php include ("../../../Menus/menu_usuarios.php"); ?>
				</ul>
			</nav>
		</nav>

<style type="text/css">



#result_pagado{
  background:#4ce71c;
}

#result_deudor{
  background:#f41b20;
  color: #fff;
}


</style>

<!--/* pestañas */-->


		<section id="engloba_cuerpo">
			<section id="cuerpo">

				<form id="regresar" method="post" action="../index.php">
				  <input src="../../../Imagenes/regresar.png" type="image" value="Regresar"/>
				</form>

<section id="titformulintro">
  Reportes Maestros
</section>

<form method="post" action="reporte.php">
<table id="tabla" class="tabla" cellspacing="20">
	<tr>
		<td>Lugar:</td>
		<td>
			<select name="puesto">	
				<option value="director">Director</option>
                <option value="sinodal">Sinodal</option>
			</select><br>
		</td>
	</tr>
		<tr>
			<td>Nombre:</td>
		<td>
			<select name="profesor">	
				<option></option>
				<?php   
                $consulta_profesor=mysql_query("SELECT * FROM cat_profesor order by nombre");
                while($fila_profesor=mysql_fetch_array($consulta_profesor)){
          		  $nom=$fila_profesor['nombre'];
                      $pat=$fila_profesor['apellido_paterno'];
                      $mat=$fila_profesor['apellido_materno'];
            	        $director=$nom." ".$pat." ".$mat;
          			      $noper=$fila_profesor['no_personal'];
                ?>
             <option id="op" name="director" value="<?php print $noper ?>"><?php print $director ?></option>
                <?php } ?>
			</select>
		</td>
	</tr>
	<tr>
		<td>Periodo:</td>
		<td>
			<select name="periodo">	
				<option value=""></option>
				<?php
				$consula_periodo=mysql_query("SELECT * FROM periodo_cat");
				while($fila=mysql_fetch_array($consula_periodo)){
				$periodo=$fila['periodo'];
				$id_periodo=$fila['id_periodo'];
				?>
				<option value="<?php echo $id_periodo; ?>"><?php echo $periodo; ?></option>
				<?php } ?>
			</select>
		</td>
	</tr>

<tr>
	<td colspan="2"><input type="submit" value="    Enviar    "></td>
</tr>
		

</table>
</form>




			


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

<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.4.min.js"></script>



	<script type="text/javascript">
		document.location.href=("../../../index.html? var=0");
	</script>
<?php } ?>
</html>
