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
	<?php $sistema="EXP"; include('../../../Includes/ruta.php'); include('../../../Includes/title.php');  ?>


    <link href="../../../Estilos/estilo_global.css" rel="stylesheet" type="text/css"/>
	<link href="../../Estilos/estilo_alumno.css" rel="stylesheet" type="text/css"/>

	<script type="text/javascript">
		function clicksalir() {
			var confirma=confirm("¿Seguro que desea salir del Sistema?");

			if(confirma==true){
				document.location.href=("<?php print $ruta; ?>/Scripts/cerrar_sesion.php?sistema=<?php print $sistema; ?>");
			}else{ 
			}

		}
	</script>
	



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
  Reportes Estudiantes
</section>

<form method="post" action="reporte.php">
<table id="tabla" class="tabla" cellspacing="20">
	<tr>
		<td>Periodo:</td>
		<td>
			<select name="periodo">	
				<option value=''>Todos</option>
				<?php
				$consula_periodo=mysql_query("SELECT * FROM periodo WHERE estado='1' order by fecha_ini desc");
				while($fila=mysql_fetch_array($consula_periodo)){
				$periodo=$fila['periodo'];
				$id_periodo=$fila['id_periodo'];
				?>
				<option value='<?php echo $id_periodo; ?>'><?php echo $periodo; ?></option>
				<?php } ?>
			</select><br>
		</td>
	<tr>
			<td>Tipo:</td>
		<td>
			<select name="tipo">	
				<option value=''>Todos</option>
				<option value='CAT'>CAT</option>
				<option value='ER'>ER</option>
			</select>
		</td>
<tr>
		<td>Carrera:</td>
			<td>
				<select name="carrera">
				<option value=''>Todas</option>
				<option value='LA'>LA</option>
				<option value='LC'>LC</option>
				<option value='LS'>LS</option>
				<option value='LN'>LN</option>
				</select>
			</td>
	<tr>
		
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
		document.location.href=("../index.php? var=0");
	</script>
<?php } ?>
</html>
