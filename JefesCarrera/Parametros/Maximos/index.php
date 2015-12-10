<?php 	
	error_reporting(0);
	session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="author" content="Víctor Javier Báez Morales">
	<meta charset="utf-8" lang="esp" http-equiv="Content-Type" content="text/html;">
	<meta name="keywords" lang="es" content="CAT, Centro, Apoyo, Titulación">

	<?php $sistema="JEFE"; include('../../../Includes/ruta.php'); include('../../../Includes/title.php');  ?>
	<script type="text/javascript" src="../../../Scripts/FuncionesAjax.js"></script>
	<script type="text/javascript" src="../../../Scripts/FuncionesjQuery.js"></script>

    <link href="../../../Estilos/estilo_global.css" rel="stylesheet" type="text/css"/>
	<link href="../../Estilos/estilo_alumno.css" rel="stylesheet" type="text/css"/>

<script src="../../../Scripts/ajax.js" language="javascript"></script>
<script type="text/javascript" src="../../../Scripts/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="../../../Scripts/jconfirmaction.jquery.js"></script>

<?php
include("../../../Scripts/conexion.php");
?>





	<style type="text/css">
		#op5{
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
				<?php include ("../../../Menus/menu_administrador.php"); ?>
				</ul>
			</nav>
		</nav>

<style type="text/css">

#engloba_pestana{
  width:60px;
  height:50px;
  position: fixed;
  background:#a8bcfe;
  color: #fff;
  margin-top:150px;
  box-shadow: 1px 5px 5px #a4a5a6;
  text-align:center;
  border-radius: 0px 5px 5px 0px;
  padding: 5px 0px 5px 0px;
}


#result_pagado{
  background:#4ce71c;
}

#result_deudor{
  background:#f41b20;
  color: #fff;
}

#activa_ventana{
  width:60px;
  height:50px;
  position: fixed;
  background:#a8bcfe;
  color: #fff;
  margin-top:150px;
  box-shadow: 1px 5px 5px #a4a5a6;
  text-align:center;
  border-radius: 0px 5px 5px 0px;
  padding: 5px 0px 5px 0px;
}
</style>

<?php
 // include("VentanaMod.html");
 ?><!--
   <section id="activa_ventana">
    <img src="../../../Imagenes/agregaperiodo.png" >
  </section>
-->




		<section id="engloba_cuerpo">
			<section id="cuerpo">



				<form id="regresar" method="post" action="../index.php">
				  <input src="../../../Imagenes/regresar.png" type="image" value="Regresar"/>
				</form>

<section id="titformulintro">
  LISTADO DE MÁXIMOS AUTORIZADOS
</section>


<table>	
<?php
	$selecciona=mysql_query("SELECT * FROM maximo");

	while ($fila=mysql_fetch_array($selecciona)) {
		$id=$fila['id'];
		$institucion=$fila['institucion'];
		$nombre=$fila['nombre'];
		$maximo=$fila['maximo'];
		$tit=$institucion;
if($titulo != $institucion){
		?>
        <tr class="titulo_tabla">
		<td class="titbuscar" colspan="3"><?php if($tit=="ER"){$tit="Experiencia Recepcional";}elseif ($tit=="JEFE") {$tit="Directivos";} echo $tit; $titulo=$institucion;?></td>
	</tr>
	<tr>
		<td class="titbuscar">Puesto</td>	
		<td class="titbuscar">Máximo</td>
		<td class="titbuscar"></td>
	</tr>
    <?php
		}
	?>

<tbody align="center" class="cont_tabla" >
	<tr>
		<form method="post" action="editar.php">
			<input type="hidden" name="id" value="<?php echo $id;?>">
		<td><?php print $nombre; ?></td>
		<td><input type="number" name="maximo" value="<?php print $maximo; ?>"></td>
		<td><input type="submit" value="Guardar"></td>	
		</form>
	</tr>
	</tbody>
<?php } ?>

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
		document.location.href=("../../../index.html? var=0");
	</script>
<?php } ?>
</html>
