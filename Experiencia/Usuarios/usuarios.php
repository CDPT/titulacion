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

	<?php $sistema="EXP"; include('../../Includes/ruta.php'); include('../../Includes/title.php');  ?>
	<script type="text/javascript" src="../../Scripts/FuncionesAjax.js"></script>
	<script type="text/javascript" src="../../Scripts/FuncionesjQuery.js"></script>

	<link href="../../Estilos/estilo_global.css" rel="stylesheet" type="text/css"/>
	<script src="../../Scripts/jquery.js" type="text/javascript"></script> 
	<link href="../Estilos/estilo_alumno.css" rel="stylesheet" type="text/css"/>

<script src="../../Scripts/ajax.js" language="javascript"></script>
<script type="text/javascript" src="../../Scripts/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="../../Scripts/jconfirmaction.jquery.js">
</script>

	<style type="text/css">
		#op6{
					background:#044b89;
					border-radius:0px 0px 10px 10px;
					border:3px solid #033663;
					font-weight: bold;
					box-shadow: 0 0 7px 1px #9dcaf1;
		}

		#tit_existe{
			margin-left:50px;
		}

		table{
			text-align:center;
			margin-top:50px;
		}

		tr, td{
			padding: 5px 5px 5px 5px;
		}




		

		.elimina{
			padding: 5px 20px 5px 20px;
		}

		.edita{
			padding: 5px 20px 5px 20px;
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
			            <aside id="notificaciones">
			    
		<?php			            	
    	  $tipo=$_SESSION['nick'];
            if($tipo != true){
			session_destroy();
			header("Location:../../index.php");
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


<style type="text/css">

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
  right: 0px;
  background:#a8bcfe;
  color: #fff;
  top:300px;
  box-shadow: 1px 5px 5px #a4a5a6;
  text-align:center;
  border-radius: 0px 5px 5px 0px;
  padding: 5px 0px 5px 0px;
}
</style>
<?php
  include("VentanaMod.php");
 ?>
<!--<a href="formato_agrega_grupo.php">-->
   <section id="activa_ventana">
    <img src="../../Imagenes/agrega_usuario.png" >
  </section>



		<section id="engloba_cuerpo">


			<section id="cuerpo">


				<center>
					<img src="../../Imagenes/usuarios.png">
					</center>
			<?php

				$consulta=mysql_query("SELECT * FROM usuarios WHERE tipoinstitucion='EXP' "); 
				$total=mysql_num_rows($consulta);
				
				if($total > '1' || $total == '0' ){
					$text="Usuarios";
				}else{
					$text="Usuario";
				}

				?>
					<center>
				<label id="tit_existe"><?php print "Existen ".$total." ".$text; ?></label>
				</center>

				<table border="0" class="tablesorter" >
					<tr class="titulo_tabla">
						<td class="titbuscar">Nombre</td>
						<td class="titbuscar">Usuario</td>
						<td class="titbuscar">Password</td>
						<td class="titbuscar">Tipo</td>
						<!--<td class="titbuscar">Estatus</td>-->
						<td class="titbuscar">Permiso</td>
					</tr>



			<tbody align="center" class="cont_tabla" valign="top">
				<?php
				while ($fila=mysql_fetch_array($consulta)) {
					$id=$fila['id_usuario'];
					$usuario=$fila['usuario'];
					$password=$fila['password'];
					$tipo=$fila['tipo'];
					$estatus=$fila['estatus'];
					$permiso=$fila['permiso'];
					$nombre=$fila['nombre'];

					if($nombre!='Super Administrador'){

					?>
					<tr>
						<td><?php print $nombre ?></td>
						<td><?php print $usuario ?></td>
						<td><?php // print $password ?>****</td>
						<td><?php print $tipo ?></td>

						<td>
								<?php
									if($permiso=="1"){ ?>
										<!--<a href="edita_permiso.php?permiso=<?php print "activo"; ?>&id=<?php print $id; ?>">-->
											<input  src="../../Imagenes/exito.png" type="image" onclick="editusuario('activo',<?php print $id; ?>);"/>
										<!--</a>-->
									<?php }else{ ?>
										<!--<a href="edita_permiso.php?permiso=<?php print "inactivo"; ?>&id=<?php print $id; ?>">-->
											<input src="../../Imagenes/error.png" type="image" onclick="editusuario('inactivo',<?php print $id; ?>);"/>
										<!--</a>-->
								<?php }	?>
						</td>

<!--

						<td class="edita">
							<form method="post" action="formato_edita_usuario.php">
								<input type="hidden" name="id" value="<?php print $id; ?>">
								<input src="../../Imagenes/editar.png" type="image"/>
							</form>

						</td>
-->


						<td class="elimina">
							<section id="container"> 
							<!--<form method="post" action="elimina_usuario.php? id=<?php print $id ?>">-->
								<input src="../../Imagenes/basura.png" type="image"  onclick="elimusuario(<?php print $id; ?>);"/>
							<!--</form>-->
						</section>
						</td>



					</tr>					
				<?php } } ?>
	</tbody>
				</table>
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