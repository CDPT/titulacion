<?php 	
	session_start();
	error_reporting(0);
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="author" content="Víctor Javier Báez Morales">
	<meta charset="utf-8" lang="esp" http-equiv="Content-Type" content="text/html;">
	<meta name="keywords" lang="es" content="EXP, Centro, Apoyo, Titulación">

	<?php $sistema="EXP"; include('../../../Includes/ruta.php'); include('../../../Includes/title.php');  ?>
	<script type="text/javascript" src="../../../Scripts/FuncionesAjax.js"></script>
	<script type="text/javascript" src="../../../Scripts/FuncionesjQuery.js"></script>

    <link href="../../../Estilos/estilo_global.css" rel="stylesheet" type="text/css"/>
	<link href="../../Estilos/estilo_alumno.css" rel="stylesheet" type="text/css"/>



</style>



<script src="../../../Scripts/ajax.js" language="javascript"></script>
<script type="text/javascript" src="../../../Scripts/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="../../../Scripts/jconfirmaction.jquery.js">
</script>
    
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

<!--/* pestañas */-->
<!-- 
<a href="formato_agrega_cuota.php">
  <section id="engloba_pestana">
    <img src="../../Imagenes/agregacuota.png" >
  </section>
</a>
-->

<?php
  include("VentanaMod.html");
 ?>
 <section id="activa_ventana">
    <img src="../../../Imagenes/agregalicenciatura.png" >
  </section>






		<section id="engloba_cuerpo">
			<section id="cuerpo">


	<form id="regresar" method="post" action="../index.php">
	  <input src="../../../Imagenes/regresar.png" type="image" value="Regresar"/>
	</form>

<section id="titformulintro">
  LISTADO DE LICENCIATURAS
</section>


<table>

	<tr class="titulo_tabla">
		<td class="titbuscar">Abreviatura</td>

		<td class="titbuscar">Completo</td>	

		<td class="titbuscar">Editar</td>	

		<td class="titbuscar">Estado</td>	

	</tr>
<?php
	$selecciona=mysql_query("SELECT * FROM licenciaturas  ORDER BY id_licenciatura DESC");

	while ($fila=mysql_fetch_array($selecciona)) {
		$id_licenciatura=$fila['id_licenciatura'];
		$abreviatura=$fila['abreviatura'];
		$completo=$fila['completo'];
		$estado=$fila['estado'];
?>
<tbody align="center" class="cont_tabla" >
	<tr>
		<td>
           <?php print $abreviatura; ?>
		</td>

		<td>
			 <?php print $completo; ?>
		</td>	

		<td>
		<form method="post" action="formato_edita_licenciatura.php">
		<!--<a href="formato_edita_licenciatura.php? id=<?php print $id_licenciatura; ?>& abreviatura=<?php print $abreviatura; ?>& completo=<?php print $completo; ?>">-->
			<input type="hidden" value="<?php print $id_licenciatura; ?>" name="id">
			<input type="hidden" value="<?php print $abreviatura; ?>" name="abreviatura">
			<input type="hidden" value="<?php print $completo; ?>" name="completo">

			<input src="../../../Imagenes/editar.png" type="image"/>
		<!--</a>	-->
		</form>		
			
		</td>	

		<td>
			<form method="post" action="edita_estado.php">
				<input type="hidden" name="id" value="<?php print $id_licenciatura; ?>">
			<?php  
				if($estado=="1"){ ?>
				<input type="hidden" name="estado" value="<?php print "1"; ?>">
					<!--<a href="edita_estado.php? id=<?php print $id_licenciatura; ?>& estado=<?php print "1";?>">-->
						<input src="../../../Imagenes/exito.png" type="image"/>
					<!--</a>-->
						<?php }else{ ?>
						<input type="hidden" name="estado" value="<?php print "0"; ?>">
							<!--	<a href="edita_estado.php? id=<?php print $id_licenciatura; ?>& estado=<?php print "0";?>">-->
									<input src="../../../Imagenes/error.png" type="image"/>
								<!--</a>-->
						<?php   } 	?>	
			</form>			
		</td>
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
